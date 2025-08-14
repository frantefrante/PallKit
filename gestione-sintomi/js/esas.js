// Variabili globali
let esasScores = {
  dolore: null,
  stanchezza: null,
  nausea: null,
  depressione: null,
  ansia: null,
  sonnolenza: null,
  appetito: null,
  dispnea: null,
  benessere: null
};

// Inizializzazione
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('assessment-date').value = new Date().toISOString().split('T')[0];
  setupScaleListeners();
  animateElements();
});

// Funzione per cambiare modalità
function switchMode(mode) {
  const container = document.getElementById('esas-home');
  if (!container) return;
  container.querySelectorAll('.mode-btn').forEach(btn => btn.classList.remove('active'));
  const btn = container.querySelector(`#esas-${mode}-btn`);
  if (btn) btn.classList.add('active');
  container.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
  const section = container.querySelector(`#esas-${mode}-section`);
  if (section) section.classList.add('active');
}

// Setup event listeners per le scale numeriche
function setupScaleListeners() {
  document.querySelectorAll('.scale-numbers').forEach(scale => {
    const symptom = scale.dataset.symptom;
    scale.querySelectorAll('.scale-number').forEach(number => {
      number.addEventListener('click', function() {
        const value = parseInt(this.dataset.value);
        selectScore(symptom, value, this);
      });
    });
  });
}

// Funzione per selezionare un punteggio
function selectScore(symptom, value, element) {
  esasScores[symptom] = value;
  const scale = element.parentElement;
  scale.querySelectorAll('.scale-number').forEach(num => num.classList.remove('selected'));
  element.classList.add('selected');
  const marker = document.getElementById('marker-' + symptom);
  const percentage = (value / 10) * 100;
  marker.style.left = percentage + '%';
 updateESASResults();
}

// Funzione per aggiornare i risultati
function updateESASResults() {
  const scores = Object.values(esasScores).filter(score => score !== null);
  if (scores.length === 0) {
    document.getElementById('results-summary').style.display = 'none';
    return;
  }
  const totalScore = scores.reduce((sum, score) => sum + score, 0);
  const averageScore = (totalScore / scores.length).toFixed(1);
  const severeSymptoms = scores.filter(score => score >= 7).length;
  const moderateSymptoms = scores.filter(score => score >= 4 && score < 7).length;
  document.getElementById('total-score').textContent = totalScore;
  document.getElementById('score-interpretation').textContent = getScoreInterpretation(averageScore, severeSymptoms);
  const detailsHtml = `
    <div class="score-item">
      <div style="font-size: 1.5rem; font-weight: bold;">${averageScore}</div>
      <div>Media sintomi</div>
    </div>
    <div class="score-item">
      <div style="font-size: 1.5rem; font-weight: bold;">${severeSymptoms}</div>
      <div>Sintomi severi (≥7)</div>
    </div>
    <div class="score-item">
      <div style="font-size: 1.5rem; font-weight: bold;">${moderateSymptoms}</div>
      <div>Sintomi moderati (4-6)</div>
    </div>
    <div class="score-item">
      <div style="font-size: 1.5rem; font-weight: bold;">${scores.length}/9</div>
      <div>Sintomi valutati</div>
    </div>
  `;
  document.getElementById('score-details').innerHTML = detailsHtml;
  document.getElementById('results-summary').style.display = 'block';
}

// Funzione per interpretare il punteggio
function getScoreInterpretation(average, severeCount) {
  if (severeCount > 0) {
    return `Attenzione: ${severeCount} sintomi severi richiedono intervento immediato`;
  } else if (average >= 4) {
    return 'Carico sintomatologico moderato-alto - Valutare interventi';
  } else if (average >= 2) {
    return 'Carico sintomatologico lieve-moderato - Monitoraggio';
  } else {
    return 'Carico sintomatologico basso - Buon controllo sintomi';
  }
}

// Funzione per salvare la valutazione
function saveESAS() {
  const patientName = document.getElementById('patient-name').value;
  const assessmentDate = document.getElementById('assessment-date').value;
  if (!patientName) {
    alert('Inserire il nome del paziente');
    return;
  }
  const completedScores = Object.values(esasScores).filter(score => score !== null).length;
  if (completedScores === 0) {
    alert('Completare almeno un sintomo prima di salvare');
    return;
  }
  const data = {
    paziente: patientName,
    data: assessmentDate,
    punteggi: esasScores,
    totalScore: Object.values(esasScores).filter(s => s !== null).reduce((sum, score) => sum + score, 0),
    completato: new Date().toISOString()
  };
  const savedAssessments = JSON.parse(localStorage.getItem('esas_assessments') || '[]');
  savedAssessments.push(data);
  localStorage.setItem('esas_assessments', JSON.stringify(savedAssessments));
  alert('Valutazione ESAS salvata con successo!');
}

// Funzione per azzerare il form
function resetESAS() {
  if (confirm('Sei sicuro di voler azzerare tutti i dati?')) {
    esasScores = {
      dolore: null, stanchezza: null, nausea: null, depressione: null, ansia: null,
      sonnolenza: null, appetito: null, dispnea: null, benessere: null
    };
    document.querySelectorAll('.scale-number').forEach(num => num.classList.remove('selected'));
    document.querySelectorAll('.scale-marker').forEach(marker => marker.style.left = '0%');
    document.getElementById('results-summary').style.display = 'none';
    document.getElementById('patient-name').value = '';
    document.getElementById('patient-birth').value = '';
  }
}

// Funzione per stampare la valutazione compilata
function printESAS() {
  const patientName = document.getElementById('patient-name').value || 'Paziente';
  const assessmentDate = document.getElementById('assessment-date').value || new Date().toISOString().split('T')[0];
  let reportContent = `
    <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px;">
      <div style="text-align: center; border-bottom: 2px solid #dc3545; padding-bottom: 20px; margin-bottom: 30px;">
        <h1 style="color: #dc3545; margin-bottom: 10px;">ESAS - Valutazione Compilata</h1>
        <h3 style="color: #6c757d;">Edmonton Symptom Assessment Scale</h3>
      </div>
      <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
        <h4>Dati Paziente</h4>
        <p><strong>Nome:</strong> ${patientName}</p>
        <p><strong>Data valutazione:</strong> ${new Date(assessmentDate).toLocaleDateString('it-IT')}</p>
      </div>
      <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead>
          <tr style="background: #f8f9fa;">
            <th style="border: 1px solid #333; padding: 12px; text-align: left;">Sintomo</th>
            <th style="border: 1px solid #333; padding: 12px; text-align: center;">Punteggio</th>
            <th style="border: 1px solid #333; padding: 12px; text-align: center;">Livello</th>
          </tr>
        </thead>
        <tbody>`;
  const symptomNames = {
    dolore: 'Dolore',
    stanchezza: 'Stanchezza',
    nausea: 'Nausea',
    depressione: 'Depressione',
    ansia: 'Ansia',
    sonnolenza: 'Sonnolenza',
    appetito: 'Mancanza di appetito',
    dispnea: 'Dispnea',
    benessere: 'Mancanza di benessere'
  };
  Object.entries(esasScores).forEach(([symptom, score]) => {
    const level = score === null ? 'Non valutato' :
      score === 0 ? 'Assente' :
      score <= 3 ? 'Lieve' :
      score <= 6 ? 'Moderato' : 'Severo';
    reportContent += `
      <tr>
        <td style="border: 1px solid #333; padding: 12px;">${symptomNames[symptom]}</td>
        <td style="border: 1px solid #333; padding: 12px; text-align: center; font-weight: bold;">${score !== null ? score : '-'}</td>
        <td style="border: 1px solid #333; padding: 12px; text-align: center;">${level}</td>
      </tr>`;
  });
  const totalScore = Object.values(esasScores).filter(s => s !== null).reduce((sum, score) => sum + score, 0);
  const completedScores = Object.values(esasScores).filter(score => score !== null).length;
  const averageScore = completedScores > 0 ? (totalScore / completedScores).toFixed(1) : 0;
  reportContent += `
        </tbody>
      </table>
      <div style="background: #e3f2fd; padding: 20px; border-radius: 8px;">
        <h4 style="color: #1976d2;">Riassunto</h4>
        <p><strong>Punteggio totale:</strong> ${totalScore}/90</p>
        <p><strong>Media sintomi:</strong> ${averageScore}/10</p>
        <p><strong>Sintomi valutati:</strong> ${completedScores}/9</p>
      </div>
    </div>`;
  const printWindow = window.open('', '_blank');
  printWindow.document.write(`
    <html>
      <head>
        <title>ESAS - ${patientName}</title>
        <style>@media print { body { margin: 0; } }</style>
      </head>
      <body>${reportContent}</body>
    </html>`);
  printWindow.document.close();
  printWindow.print();
}

// Funzione per stampare il template
function printTemplate() {
  const templateContent = document.querySelector('.pdf-template').innerHTML;
  const printWindow = window.open('', '_blank');
  printWindow.document.write(`
    <html>
      <head>
        <title>ESAS - Template</title>
        <style>body { font-family: 'Times New Roman', serif; margin: 20px; } @media print { body { margin: 0; } }</style>
      </head>
      <body>${templateContent}</body>
    </html>`);
  printWindow.document.close();
  printWindow.print();
}

// Funzione per scaricare il template (simulata)
function downloadTemplate() {
  alert('Funzionalità di download PDF in sviluppo. Per ora utilizza la stampa per salvare come PDF.');
}

// Animazioni di entrata
function animateElements() {
  const elements = document.querySelectorAll('.symptom-item');
  elements.forEach((element, index) => {
    element.style.opacity = '0';
    element.style.transform = 'translateY(20px)';
    setTimeout(() => {
      element.style.transition = 'all 0.4s ease';
      element.style.opacity = '1';
      element.style.transform = 'translateY(0)';
    }, index * 100);
  });
}
