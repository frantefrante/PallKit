// Variabili globali per i punteggi
let ppiData = {
  pps: null,
  oral: null,
  edema: null,
  dyspnea: null,
  delirium: null
};

let papData = {
  dyspnea: null,
  anorexia: null,
  karnofsky: null,
  wbc: null,
  lymphocytes: null,
  prediction: null
};

// Inizializzazione
document.addEventListener('DOMContentLoaded', function() {
  const today = new Date().toISOString().split('T')[0];
  const ppiDate = document.getElementById('ppi-date');
  const papDate = document.getElementById('pap-date');
  
  if (ppiDate) ppiDate.value = today;
  if (papDate) papDate.value = today;
});

// Funzioni per navigazione principale
function switchPrognosiMode(mode) {
  // Rimuove active da tutti i bottoni
  document.querySelectorAll('#prognosi-home .mode-btn').forEach(btn => {
    btn.classList.remove('active');
  });
  
  // Nasconde tutte le sezioni
  document.querySelectorAll('#prognosi-home .content-section').forEach(section => {
    section.classList.remove('active');
  });
  
  // Attiva il bottone selezionato
  event.target.classList.add('active');
  
  // Mostra la sezione corrispondente
  document.getElementById(`${mode}-section`).classList.add('active');
}

// Funzioni per aprire strumenti specifici
function openPPICompile() {
  navigateToSection('ppi-home');
  switchPPIMode('compile');
}

function openPPIVisualize() {
  navigateToSection('ppi-home');
  switchPPIMode('visualize');
}

function openPAPCompile() {
  navigateToSection('pap-home');
  switchPAPMode('compile');
}

function openPAPVisualize() {
  navigateToSection('pap-home');
  switchPAPMode('visualize');
}

// Funzioni per navigazione PPI
function switchPPIMode(mode) {
  // Rimuove active da tutti i bottoni
  document.querySelectorAll('#ppi-home .mode-btn').forEach(btn => {
    btn.classList.remove('active');
  });
  
  // Nasconde tutte le sezioni
  document.querySelectorAll('#ppi-home .content-section').forEach(section => {
    section.classList.remove('active');
  });
  
  // Attiva il bottone selezionato
  event.target.classList.add('active');
  
  // Mostra la sezione corrispondente
  document.getElementById(`${mode}-section`).classList.add('active');
}

// Funzioni per navigazione PaP
function switchPAPMode(mode) {
  // Rimuove active da tutti i bottoni
  document.querySelectorAll('#pap-home .mode-btn').forEach(btn => {
    btn.classList.remove('active');
  });
  
  // Nasconde tutte le sezioni
  document.querySelectorAll('#pap-home .content-section').forEach(section => {
    section.classList.remove('active');
  });
  
  // Attiva il bottone selezionato
  event.target.classList.add('active');
  
  // Mostra la sezione corrispondente
  document.getElementById(`${mode}-section`).classList.add('active');
}

// Funzione per selezionare opzioni PPI
function selectPPI(parameter, value) {
  // Rimuove la selezione precedente nel gruppo
  const currentItem = document.getElementById(`ppi-${parameter}-item`);
  const radioGroup = currentItem.querySelector('.radio-group');
  
  radioGroup.querySelectorAll('.radio-option').forEach(option => {
    option.classList.remove('selected');
  });
  
  // Seleziona l'opzione corrente
  event.target.closest('.radio-option').classList.add('selected');
  
  // Salva il valore
  ppiData[parameter] = parseFloat(value);
  
  // Marca il form item come completato
  currentItem.classList.add('completed');
  
  // Aggiorna il progresso e calcola il punteggio
  updatePPIProgress();
  calculatePPI();
}

// Funzione per selezionare opzioni PaP
function selectPAP(parameter, value) {
  // Rimuove la selezione precedente nel gruppo
  const currentItem = document.getElementById(`pap-${parameter}-item`);
  const radioGroup = currentItem.querySelector('.radio-group');
  
  radioGroup.querySelectorAll('.radio-option').forEach(option => {
    option.classList.remove('selected');
  });
  
  // Seleziona l'opzione corrente
  event.target.closest('.radio-option').classList.add('selected');
  
  // Salva il valore
  papData[parameter] = parseFloat(value);
  
  // Marca il form item come completato
  currentItem.classList.add('completed');
  
  // Aggiorna il progresso e calcola il punteggio
  updatePAPProgress();
  calculatePAP();
}

// Aggiorna il progresso PPI
function updatePPIProgress() {
  const completed = Object.values(ppiData).filter(val => val !== null).length;
  const total = Object.keys(ppiData).length;
  const percentage = (completed / total) * 100;
  
  const progressBar = document.getElementById('ppi-progress');
  const progressText = document.getElementById('ppi-progress-text');
  
  if (progressBar) progressBar.style.width = percentage + '%';
  if (progressText) progressText.textContent = `${completed}/${total}`;
}

// Aggiorna il progresso PaP
function updatePAPProgress() {
  const completed = Object.values(papData).filter(val => val !== null).length;
  const total = Object.keys(papData).length;
  const percentage = (completed / total) * 100;
  
  const progressBar = document.getElementById('pap-progress');
  const progressText = document.getElementById('pap-progress-text');
  
  if (progressBar) progressBar.style.width = percentage + '%';
  if (progressText) progressText.textContent = `${completed}/${total}`;
}

// Calcola il punteggio PPI
function calculatePPI() {
  const completed = Object.values(ppiData).filter(val => val !== null).length;
  const resultsDiv = document.getElementById('ppi-results');
  
  if (completed === Object.keys(ppiData).length) {
    const totalScore = Object.values(ppiData).reduce((sum, val) => sum + val, 0);
    
    let interpretation = '';
    let description = '';
    
    if (totalScore <= 4) {
      interpretation = 'Buona prognosi';
      description = 'Sopravvivenza >6 settimane (probabilità >70%)';
    } else {
      interpretation = 'Prognosi riservata';
      description = 'Sopravvivenza ≤3 settimane (probabilità >80%)';
    }
    
    document.getElementById('ppi-score').textContent = totalScore.toFixed(1);
    document.getElementById('ppi-interpretation').textContent = interpretation;
    document.getElementById('ppi-description').textContent = description;
    
    if (resultsDiv) {
      resultsDiv.style.display = 'block';
      resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  } else {
    if (resultsDiv) resultsDiv.style.display = 'none';
  }
}

// Calcola il punteggio PaP
function calculatePAP() {
  const completed = Object.values(papData).filter(val => val !== null).length;
  const resultsDiv = document.getElementById('pap-results');
  
  if (completed === Object.keys(papData).length) {
    const totalScore = Object.values(papData).reduce((sum, val) => sum + val, 0);
    
    let interpretation = '';
    let description = '';
    let group = '';
    
    if (totalScore <= 5.5) {
      group = 'A';
      interpretation = 'Buona prognosi';
      description = 'Sopravvivenza >30 giorni (probabilità >70%)';
    } else if (totalScore <= 11) {
      group = 'B';
      interpretation = 'Prognosi intermedia';
      description = 'Sopravvivenza incerta (30-70% probabilità)';
    } else {
      group = 'C';
      interpretation = 'Prognosi riservata';
      description = 'Sopravvivenza <30 giorni (probabilità >70%)';
    }
    
    document.getElementById('pap-score').textContent = totalScore.toFixed(1);
    document.getElementById('pap-interpretation').textContent = `Gruppo ${group} - ${interpretation}`;
    document.getElementById('pap-description').textContent = description;
    
    if (resultsDiv) {
      resultsDiv.style.display = 'block';
      resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  } else {
    if (resultsDiv) resultsDiv.style.display = 'none';
  }
}

// Reset del form PPI
function resetPPI() {
  if (confirm('Sei sicuro di voler azzerare tutti i dati del PPI?')) {
    // Reset dei dati
    ppiData = { pps: null, oral: null, edema: null, dyspnea: null, delirium: null };
    
    // Reset del nome paziente
    const patientName = document.getElementById('ppi-patient-name');
    if (patientName) patientName.value = '';
    
    // Reset del progresso
    updatePPIProgress();
    
    // Nasconde i risultati
    const resultsDiv = document.getElementById('ppi-results');
    if (resultsDiv) resultsDiv.style.display = 'none';
    
    // Rimuove tutte le selezioni
    document.querySelectorAll('#ppi-home .radio-option').forEach(option => {
      option.classList.remove('selected');
    });
    
    // Rimuove il completed dai form items
    document.querySelectorAll('#ppi-home .form-item').forEach(item => {
      item.classList.remove('completed');
    });
  }
}

// Reset del form PaP
function resetPAP() {
  if (confirm('Sei sicuro di voler azzerare tutti i dati del PaP Score?')) {
    // Reset dei dati
    papData = { dyspnea: null, anorexia: null, karnofsky: null, wbc: null, lymphocytes: null, prediction: null };
    
    // Reset del nome paziente
    const patientName = document.getElementById('pap-patient-name');
    if (patientName) patientName.value = '';
    
    // Reset del progresso
    updatePAPProgress();
    
    // Nasconde i risultati
    const resultsDiv = document.getElementById('pap-results');
    if (resultsDiv) resultsDiv.style.display = 'none';
    
    // Rimuove tutte le selezioni
    document.querySelectorAll('#pap-home .radio-option').forEach(option => {
      option.classList.remove('selected');
    });
    
    // Rimuove il completed dai form items
    document.querySelectorAll('#pap-home .form-item').forEach(item => {
      item.classList.remove('completed');
    });
  }
}

// Genera report PPI
function generatePPIReport() {
  const patientName = document.getElementById('ppi-patient-name').value || 'Paziente non specificato';
  const date = document.getElementById('ppi-date').value || new Date().toISOString().split('T')[0];
  
  const completed = Object.values(ppiData).filter(val => val !== null).length;
  if (completed < Object.keys(ppiData).length) {
    alert('Completa tutti i parametri prima di generare il report');
    return;
  }
  
  const totalScore = Object.values(ppiData).reduce((sum, val) => sum + val, 0);
  const interpretation = totalScore <= 4 ? 
    'Buona prognosi - Sopravvivenza >6 settimane (probabilità >70%)' : 
    'Prognosi riservata - Sopravvivenza ≤3 settimane (probabilità >80%)';
  
  const reportContent = `
REPORT PPI - PALLIATIVE PERFORMANCE INDEX
==========================================

Paziente: ${patientName}
Data valutazione: ${new Date(date).toLocaleDateString('it-IT')}

PARAMETRI VALUTATI:
• Palliative Performance Scale: ${ppiData.pps} punti
• Assunzione orale: ${ppiData.oral} punti  
• Edema: ${ppiData.edema} punti
• Dispnea a riposo: ${ppiData.dyspnea} punti
• Delirium: ${ppiData.delirium} punti

PUNTEGGIO TOTALE: ${totalScore.toFixed(1)} punti

INTERPRETAZIONE:
${interpretation}

Report generato da Medbox.it - Strumenti di Prognosi
Data di generazione: ${new Date().toLocaleDateString('it-IT')}

Valutato da: [Nome del medico]
Firma: ____________________
  `;
  
  downloadReport(reportContent, `Report_PPI_${patientName.replace(/\s+/g, '_')}_${date}.txt`);
}

// Genera report PaP
function generatePAPReport() {
  const patientName = document.getElementById('pap-patient-name').value || 'Paziente non specificato';
  const date = document.getElementById('pap-date').value || new Date().toISOString().split('T')[0];
  
  const completed = Object.values(papData).filter(val => val !== null).length;
  if (completed < Object.keys(papData).length) {
    alert('Completa tutti i parametri prima di generare il report');
    return;
  }
  
  const totalScore = Object.values(papData).reduce((sum, val) => sum + val, 0);
  let group = totalScore <= 5.5 ? 'A' : totalScore <= 11 ? 'B' : 'C';
  
  const interpretation = group === 'A' ? 'Buona prognosi - Sopravvivenza >30 giorni (probabilità >70%)' :
    group === 'B' ? 'Prognosi intermedia - Sopravvivenza incerta (30-70% probabilità)' :
    'Prognosi riservata - Sopravvivenza <30 giorni (probabilità >70%)';
  
  const reportContent = `
REPORT PAP SCORE - PALLIATIVE PROGNOSTIC SCORE
==============================================

Paziente: ${patientName}
Data valutazione: ${new Date(date).toLocaleDateString('it-IT')}

PARAMETRI VALUTATI:
• Dispnea: ${papData.dyspnea} punti
• Anoressia: ${papData.anorexia} punti
• Karnofsky Performance Status: ${papData.karnofsky} punti
• Leucociti totali: ${papData.wbc} punti
• Percentuale Linfociti: ${papData.lymphocytes} punti
• Predizione clinica: ${papData.prediction} punti

PUNTEGGIO TOTALE: ${totalScore.toFixed(1)} punti
GRUPPO PROGNOSTICO: ${group}

INTERPRETAZIONE:
${interpretation}

Report generato da Medbox.it - Strumenti di Prognosi
Data di generazione: ${new Date().toLocaleDateString('it-IT')}

Valutato da: [Nome del medico]
Firma: ____________________
  `;
  
  downloadReport(reportContent, `Report_PaP_${patientName.replace(/\s+/g, '_')}_${date}.txt`);
}

// Funzione per scaricare il report
function downloadReport(content, filename) {
  const blob = new Blob([content], { type: 'text/plain;charset=utf-8' });
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = filename;
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  URL.revokeObjectURL(url);
}

// Funzioni di stampa
function printPPI() {
  const patientName = document.getElementById('ppi-patient-name').value || 'Paziente non specificato';
  const date = document.getElementById('ppi-date').value || new Date().toISOString().split('T')[0];
  
  const completed = Object.values(ppiData).filter(val => val !== null).length;
  if (completed < Object.keys(ppiData).length) {
    alert('Completa tutti i parametri prima di stampare');
    return;
  }
  
  const totalScore = Object.values(ppiData).reduce((sum, val) => sum + val, 0);
  const interpretation = totalScore <= 4 ? 
    'Buona prognosi - Sopravvivenza >6 settimane (probabilità >70%)' : 
    'Prognosi riservata - Sopravvivenza ≤3 settimane (probabilità >80%)';
  
  const printContent = `
    <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px;">
      <h1 style="color: #fd7e14; text-align: center; margin-bottom: 30px;">
        PPI - Palliative Performance Index
      </h1>
      
      <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
        <h3>Dati Paziente</h3>
        <p><strong>Nome:</strong> ${patientName}</p>
        <p><strong>Data valutazione:</strong> ${new Date(date).toLocaleDateString('it-IT')}</p>
      </div>
      
      <div style="margin-bottom: 30px;">
        <h3>Parametri Valutati</h3>
        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
          <thead>
            <tr style="background: #fd7e14; color: white;">
              <th style="padding: 10px; border: 1px solid #ddd;">Parametro</th>
              <th style="padding: 10px; border: 1px solid #ddd;">Punteggio</th>
            </tr>
          </thead>
          <tbody>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Palliative Performance Scale</td><td style="padding: 10px; border: 1px solid #ddd;">${ppiData.pps}</td></tr>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Assunzione orale</td><td style="padding: 10px; border: 1px solid #ddd;">${ppiData.oral}</td></tr>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Edema</td><td style="padding: 10px; border: 1px solid #ddd;">${ppiData.edema}</td></tr>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Dispnea a riposo</td><td style="padding: 10px; border: 1px solid #ddd;">${ppiData.dyspnea}</td></tr>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Delirium</td><td style="padding: 10px; border: 1px solid #ddd;">${ppiData.delirium}</td></tr>
            <tr style="background: #fff3e0; font-weight: bold;">
              <td style="padding: 10px; border: 1px solid #ddd;">TOTALE</td>
              <td style="padding: 10px; border: 1px solid #ddd;">${totalScore.toFixed(1)}</td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <div style="background: #e8f5e8; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
        <h3>Interpretazione</h3>
        <p><strong>${interpretation}</strong></p>
      </div>
      
      <div style="margin-top: 50px;">
        <p>Data di stampa: ${new Date().toLocaleDateString('it-IT')}</p>
        <p>Valutato da: ________________________</p>
        <p>Firma: ________________________</p>
      </div>
    </div>
  `;
  
  openPrintWindow(printContent);
}

function printPAP() {
  const patientName = document.getElementById('pap-patient-name').value || 'Paziente non specificato';
  const date = document.getElementById('pap-date').value || new Date().toISOString().split('T')[0];
  
  const completed = Object.values(papData).filter(val => val !== null).length;
  if (completed < Object.keys(papData).length) {
    alert('Completa tutti i parametri prima di stampare');
    return;
  }
  
  const totalScore = Object.values(papData).reduce((sum, val) => sum + val, 0);
  let group = totalScore <= 5.5 ? 'A' : totalScore <= 11 ? 'B' : 'C';
  
  const interpretation = group === 'A' ? 'Buona prognosi - Sopravvivenza >30 giorni (probabilità >70%)' :
    group === 'B' ? 'Prognosi intermedia - Sopravvivenza incerta (30-70% probabilità)' :
    'Prognosi riservata - Sopravvivenza <30 giorni (probabilità >70%)';
  
  const printContent = `
    <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px;">
      <h1 style="color: #9b59b6; text-align: center; margin-bottom: 30px;">
        PaP Score - Palliative Prognostic Score
      </h1>
      
      <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
        <h3>Dati Paziente</h3>
        <p><strong>Nome:</strong> ${patientName}</p>
        <p><strong>Data valutazione:</strong> ${new Date(date).toLocaleDateString('it-IT')}</p>
      </div>
      
      <div style="margin-bottom: 30px;">
        <h3>Parametri Valutati</h3>
        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
          <thead>
            <tr style="background: #9b59b6; color: white;">
              <th style="padding: 10px; border: 1px solid #ddd;">Parametro</th>
              <th style="padding: 10px; border: 1px solid #ddd;">Punteggio</th>
            </tr>
          </thead>
          <tbody>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Dispnea</td><td style="padding: 10px; border: 1px solid #ddd;">${papData.dyspnea}</td></tr>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Anoressia</td><td style="padding: 10px; border: 1px solid #ddd;">${papData.anorexia}</td></tr>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Karnofsky Performance Status</td><td style="padding: 10px; border: 1px solid #ddd;">${papData.karnofsky}</td></tr>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Leucociti totali</td><td style="padding: 10px; border: 1px solid #ddd;">${papData.wbc}</td></tr>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Percentuale Linfociti</td><td style="padding: 10px; border: 1px solid #ddd;">${papData.lymphocytes}</td></tr>
            <tr><td style="padding: 10px; border: 1px solid #ddd;">Predizione clinica</td><td style="padding: 10px; border: 1px solid #ddd;">${papData.prediction}</td></tr>
            <tr style="background: #f3e5f5; font-weight: bold;">
              <td style="padding: 10px; border: 1px solid #ddd;">TOTALE</td>
              <td style="padding: 10px; border: 1px solid #ddd;">${totalScore.toFixed(1)}</td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <div style="background: #e8f5e8; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
        <h3>Interpretazione</h3>
        <p><strong>Gruppo ${group} - ${interpretation}</strong></p>
      </div>
      
      <div style="margin-top: 50px;">
        <p>Data di stampa: ${new Date().toLocaleDateString('it-IT')}</p>
        <p>Valutato da: ________________________</p>
        <p>Firma: ________________________</p>
      </div>
    </div>
  `;
  
  openPrintWindow(printContent);
}

// Funzione per aprire finestra di stampa
function openPrintWindow(content) {
  const printWindow = window.open('', '_blank');
  printWindow.document.write(`
    <!DOCTYPE html>
    <html>
    <head>
      <title>Stampa - Medbox.it</title>
      <style>
        @media print {
          body { margin: 0; }
          .no-print { display: none; }
        }
      </style>
    </head>
    <body>
      ${content}
      <script>
        window.onload = function() {
          window.print();
          window.onafterprint = function() {
            window.close();
          }
        }
      </script>
    </body>
    </html>
  `);
  printWindow.document.close();
}

// Salvataggio automatico in localStorage
function savePPIData() {
  const data = {
    ...ppiData,
    patientName: document.getElementById('ppi-patient-name').value,
    date: document.getElementById('ppi-date').value,
    timestamp: new Date().toISOString()
  };
  localStorage.setItem('medbox_ppi_data', JSON.stringify(data));
}

function savePAPData() {
  const data = {
    ...papData,
    patientName: document.getElementById('pap-patient-name').value,
    date: document.getElementById('pap-date').value,
    timestamp: new Date().toISOString()
  };
  localStorage.setItem('medbox_pap_data', JSON.stringify(data));
}

// Caricamento dati salvati
function loadPPIData() {
  const saved = localStorage.getItem('medbox_ppi_data');
  if (saved) {
    const data = JSON.parse(saved);
    
    // Carica i dati paziente
    if (data.patientName) document.getElementById('ppi-patient-name').value = data.patientName;
    if (data.date) document.getElementById('ppi-date').value = data.date;
    
    // Carica i valori dei parametri
    Object.keys(ppiData).forEach(key => {
      if (data[key] !== null && data[key] !== undefined) {
        ppiData[key] = data[key];
        // Trova e seleziona l'opzione corrispondente
        const item = document.getElementById(`ppi-${key}-item`);
        if (item) {
          const options = item.querySelectorAll('.radio-option');
          options.forEach(option => {
            const span = option.querySelector('span');
            if (span && span.textContent.includes(`(${data[key]} punt`)) {
              option.classList.add('selected');
              item.classList.add('completed');
            }
          });
        }
      }
    });
    
    updatePPIProgress();
    calculatePPI();
  }
}

function loadPAPData() {
  const saved = localStorage.getItem('medbox_pap_data');
  if (saved) {
    const data = JSON.parse(saved);
    
    // Carica i dati paziente
    if (data.patientName) document.getElementById('pap-patient-name').value = data.patientName;
    if (data.date) document.getElementById('pap-date').value = data.date;
    
    // Carica i valori dei parametri
    Object.keys(papData).forEach(key => {
      if (data[key] !== null && data[key] !== undefined) {
        papData[key] = data[key];
        // Trova e seleziona l'opzione corrispondente
        const item = document.getElementById(`pap-${key}-item`);
        if (item) {
          const options = item.querySelectorAll('.radio-option');
          options.forEach(option => {
            const span = option.querySelector('span');
            if (span && span.textContent.includes(`(${data[key]} punt`)) {
              option.classList.add('selected');
              item.classList.add('completed');
            }
          });
        }
      }
    });
    
    updatePAPProgress();
    calculatePAP();
  }
}

// Event listeners per salvataggio automatico
document.addEventListener('DOMContentLoaded', function() {
  // Carica dati salvati all'avvio
  setTimeout(() => {
    loadPPIData();
    loadPAPData();
  }, 100);
  
  // Salva automaticamente quando si cambia il nome paziente o la data
  const ppiPatientName = document.getElementById('ppi-patient-name');
  const ppiDate = document.getElementById('ppi-date');
  const papPatientName = document.getElementById('pap-patient-name');
  const papDate = document.getElementById('pap-date');
  
  if (ppiPatientName) ppiPatientName.addEventListener('input', savePPIData);
  if (ppiDate) ppiDate.addEventListener('change', savePPIData);
  if (papPatientName) papPatientName.addEventListener('input', savePAPData);
  if (papDate) papDate.addEventListener('change', savePAPData);
});

// Override delle funzioni di selezione per includere il salvataggio
const originalSelectPPI = selectPPI;
selectPPI = function(parameter, value) {
  originalSelectPPI(parameter, value);
  savePPIData();
};

const originalSelectPAP = selectPAP;
selectPAP = function(parameter, value) {
  originalSelectPAP(parameter, value);
  savePAPData();
};

