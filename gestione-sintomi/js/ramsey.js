let ramseyContainer;
let selectedRamseyScore = null;

document.addEventListener('DOMContentLoaded', () => {
  ramseyContainer = document.getElementById('ramsey-home');
  if (!ramseyContainer) return;
  const today = new Date();
  const dateStr = today.toISOString().split('T')[0];
  const timeStr = today.toTimeString().split(' ')[0].substring(0,5);
  ramseyContainer.querySelector('#ramsey-date').value = dateStr;
  ramseyContainer.querySelector('#ramsey-time').value = timeStr;
});

function switchRamseyMode(mode) {
  if (!ramseyContainer) return;
  ramseyContainer.querySelectorAll('.mode-btn').forEach(btn => btn.classList.remove('active'));
  ramseyContainer.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
  const targetBtn = ramseyContainer.querySelector(`.mode-btn[data-mode="${mode}"]`);
  if (targetBtn) targetBtn.classList.add('active');
  const targetSection = ramseyContainer.querySelector(`#${mode}-section`);
  if (targetSection) targetSection.classList.add('active');
}

function selectRamseyScore(score, element) {
  if (!ramseyContainer) return;
  ramseyContainer.querySelectorAll('.option-item').forEach(item => item.classList.remove('selected'));
  element.classList.add('selected');
  selectedRamseyScore = score;
  showRamseyResults(score);
}

function showRamseyResults(score) {
  if (!ramseyContainer) return;
  const resultsDiv = ramseyContainer.querySelector('#ramsey-results');
  const scoreDisplay = ramseyContainer.querySelector('#ramsey-score-display');
  const levelDisplay = ramseyContainer.querySelector('#ramsey-level-display');
  const descriptionDisplay = ramseyContainer.querySelector('#ramsey-description-display');
  scoreDisplay.textContent = score;
  let level, description;
  switch(score) {
    case 1:
      level = 'Agitazione';
      description = 'Paziente agitato e irrequieto. Necessita intervento per calmare e rassicurare.';
      break;
    case 2:
      level = 'Stato Ottimale';
      description = 'Livello ideale di coscienza. Paziente collaborativo e orientato.';
      break;
    case 3:
      level = 'Sedazione Leggera';
      description = 'Sedazione accettabile per la maggior parte delle situazioni. Risposta ai comandi.';
      break;
    case 4:
      level = 'Sedazione Moderata';
      description = 'Buon livello di sedazione per procedure. Risposta vivace agli stimoli.';
      break;
    case 5:
      level = 'Sedazione Profonda';
      description = 'Sedazione significativa. Monitoraggio attento delle funzioni vitali richiesto.';
      break;
    case 6:
      level = 'Sedazione Eccessiva';
      description = 'Possibile over-sedazione. Rivalutare farmaci e dosaggi.';
      break;
  }
  levelDisplay.textContent = level;
  descriptionDisplay.textContent = description;
  resultsDiv.classList.add('show');
}

function resetRamseyForm() {
  if (!ramseyContainer) return;
  if (confirm('Sei sicuro di voler resettare tutti i dati Ramsey?')) {
    ramseyContainer.querySelectorAll('.option-item').forEach(item => item.classList.remove('selected'));
    ramseyContainer.querySelector('#ramsey-results').classList.remove('show');
    ramseyContainer.querySelector('#ramsey-patient-name').value = '';
    ramseyContainer.querySelector('#ramsey-operator').value = '';
    selectedRamseyScore = null;
  }
}

function printRamseyTemplate() {
  if (!ramseyContainer) return;
  const template = ramseyContainer.querySelector('.print-template').cloneNode(true);
  template.querySelectorAll('.action-buttons').forEach(btn => btn.remove());
  const w = window.open('', '', 'width=900,height=700');
  w.document.write(`<!DOCTYPE html><html><head><meta charset="UTF-8"><link rel="stylesheet" href="css/ramsey.css"><link rel="stylesheet" href="css/fontawesome-all.min.css"></head><body>${template.outerHTML}</body></html>`);
  w.document.close();
  w.onload = () => {
    w.focus();
    w.print();
    setTimeout(() => w.close(), 100);
  };
}

function printRamseyReport() {
  if (!ramseyContainer || selectedRamseyScore === null) {
    alert('Seleziona un punteggio Ramsey prima di stampare il report.');
    return;
  }
  const patientName = ramseyContainer.querySelector('#ramsey-patient-name').value || 'Non specificato';
  const date = ramseyContainer.querySelector('#ramsey-date').value;
  const time = ramseyContainer.querySelector('#ramsey-time').value;
  const operator = ramseyContainer.querySelector('#ramsey-operator').value || 'Non specificato';
  const level = ramseyContainer.querySelector('#ramsey-level-display').textContent;
  const description = ramseyContainer.querySelector('#ramsey-description-display').textContent;
  const reportHTML = `<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Report Valutazione Ramsey</title>
  <style>
    body { font-family: 'Times New Roman', serif; margin: 20px; line-height: 1.6; color: #333; }
    .report-header { text-align: center; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 3px solid #6f42c1; }
    .report-title { font-size: 2.2rem; color: #6f42c1; margin-bottom: 0.5rem; font-weight: 700; }
    .report-subtitle { font-size: 1.2rem; color: #6c757d; font-style: italic; }
    .patient-info { background: #f8f9fa; padding: 1.5rem; border-radius: 8px; margin: 1.5rem 0; border-left: 5px solid #6f42c1; }
    .patient-info h4 { color: #6f42c1; margin-bottom: 1rem; font-size: 1.3rem; }
    .patient-info p { margin: 0.5rem 0; font-size: 1.1rem; }
    .results-section { background: linear-gradient(135deg, #6f42c1, #5936b4); color: white; padding: 2rem; border-radius: 12px; text-align: center; margin: 2rem 0; page-break-inside: avoid; }
    .result-score { font-size: 4rem; font-weight: 700; margin-bottom: 1rem; text-shadow: 0 2px 4px rgba(0,0,0,0.3); }
    .result-level { font-size: 1.8rem; margin-bottom: 1rem; font-weight: 600; }
    .result-description { font-size: 1.2rem; line-height: 1.5; opacity: 0.95; }
    .scale-reference { margin-top: 2rem; padding: 1.5rem; background: #f8f9fa; border-radius: 8px; page-break-inside: avoid; }
    .scale-reference h4 { color: #6f42c1; margin-bottom: 1rem; font-size: 1.3rem; }
    .scale-reference p { margin: 0.5rem 0; padding-left: 1rem; }
    .clinical-section { margin-top: 1.5rem; padding: 1.5rem; background: #fff3cd; border-radius: 8px; border-left: 5px solid #ffc107; }
    .clinical-section h4 { color: #856404; margin-bottom: 1rem; }
    .clinical-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 1rem; }
    .clinical-item { background: white; padding: 1rem; border-radius: 6px; border: 1px solid #ffeaa7; }
    .clinical-item strong { color: #856404; display: block; margin-bottom: 0.5rem; }
    .footer { margin-top: 3rem; text-align: center; font-size: 0.9rem; color: #6c757d; border-top: 1px solid #dee2e6; padding-top: 1rem; }
    .timestamp { font-style: italic; color: #868e96; }
    @media print { body { margin: 0; -webkit-print-color-adjust: exact; print-color-adjust: exact; } .results-section { background: #6f42c1 !important; -webkit-print-color-adjust: exact; } }
  </style></head><body>
  <div class="report-header">
    <div class="report-title">Report Valutazione Ramsey</div>
    <div class="report-subtitle">Ramsey Sedation Scale</div>
  </div>
  <div class="patient-info">
    <h4>📋 Dati Paziente</h4>
    <p><strong>Paziente:</strong> ${patientName}</p>
    <p><strong>Data:</strong> ${date} &nbsp;&nbsp; <strong>Ora:</strong> ${time}</p>
    <p><strong>Operatore:</strong> ${operator}</p>
  </div>
  <div class="results-section">
    <div class="result-score">${selectedRamseyScore}</div>
    <div class="result-level">${level}</div>
    <div class="result-description">${description}</div>
  </div>
  <div class="scale-reference">
    <h4>📖 Scala Ramsey - Riferimento Completo</h4>
    <p><strong>1:</strong> Paziente ansioso, agitato o irrequieto</p>
    <p><strong>2:</strong> Paziente cooperativo, orientato e tranquillo</p>
    <p><strong>3:</strong> Paziente risponde solo ai comandi</p>
    <p><strong>4:</strong> Risposta vivace al tocco glabellare o stimolo sonoro forte</p>
    <p><strong>5:</strong> Risposta debole al tocco glabellare o stimolo sonoro forte</p>
    <p><strong>6:</strong> Nessuna risposta</p>
  </div>
  <div class="clinical-section">
    <h4>🎯 Obiettivi Clinici</h4>
    <div class="clinical-grid">
      <div class="clinical-item"><strong>Target Ottimale</strong> Livello 2-3</div>
      <div class="clinical-item"><strong>Sedazione Procedurale</strong> Livello 3-4</div>
      <div class="clinical-item"><strong>Da Evitare</strong> Livello 1 e 6</div>
    </div>
    <div style="margin-top:1.5rem;"><strong>Applicazioni Cliniche:</strong><br>• Post-operatorio immediato • Sedazione procedurale • Monitoraggio in degenza</div>
  </div>
  <div class="footer">
    <p><strong>Ramsey Sedation Scale</strong> | Report generato il: <span class="timestamp">${new Date().toLocaleString('it-IT')}</span></p>
  </div>
  </body></html>`;

  const w = window.open('', '', 'width=900,height=700');
  w.document.write(reportHTML);
  w.document.close();
  w.onload = () => {
    w.focus();
    w.print();
    setTimeout(() => w.close(), 100);
  };
}

