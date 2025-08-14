let rassContainer;
let selectedRASSScore = null;

document.addEventListener('DOMContentLoaded', () => {
  rassContainer = document.getElementById('rass-home');
  if (!rassContainer) return;
  
  const today = new Date();
  const dateStr = today.toISOString().split('T')[0];
  const timeStr = today.toTimeString().split(' ')[0].substring(0,5);
  
  rassContainer.querySelector('#rass-date').value = dateStr;
  rassContainer.querySelector('#rass-time').value = timeStr;
});

function switchRASSMode(mode) {
  if (!rassContainer) return;
  
  rassContainer.querySelectorAll('.mode-btn').forEach(btn => btn.classList.remove('active'));
  rassContainer.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
  
  const targetBtn = rassContainer.querySelector(`.mode-btn[data-mode="${mode}"]`);
  if (targetBtn) targetBtn.classList.add('active');
  
  const targetSection = rassContainer.querySelector(`#${mode}-section`);
  if (targetSection) targetSection.classList.add('active');
}

function selectRASSScore(score, element) {
  if (!rassContainer) return;
  
  rassContainer.querySelectorAll('.option-item').forEach(item => item.classList.remove('selected'));
  element.classList.add('selected');
  selectedRASSScore = score;
  showRASSResults(score);
}

function showRASSResults(score) {
  if (!rassContainer) return;
  
  const resultsDiv = rassContainer.querySelector('#rass-results');
  const scoreDisplay = rassContainer.querySelector('#rass-score-display');
  const levelDisplay = rassContainer.querySelector('#rass-level-display');
  const descriptionDisplay = rassContainer.querySelector('#rass-description-display');
  
  scoreDisplay.textContent = score > 0 ? `+${score}` : score;
  
  let level, description;
  if (score >= 3) {
    level = 'Agitazione Severa';
    description = 'Richiede intervento immediato per sicurezza del paziente e dello staff.';
  } else if (score >= 1) {
    level = 'Agitazione Moderata';
    description = 'Monitorare attentamente, considerare interventi calmanti.';
  } else if (score === 0) {
    level = 'Stato Ottimale';
    description = 'Paziente vigile e calmo, condizione ideale.';
  } else if (score >= -2) {
    level = 'Sedazione Leggera';
    description = 'Livello di sedazione accettabile per la maggior parte dei pazienti.';
  } else if (score >= -3) {
    level = 'Sedazione Moderata';
    description = 'Sedazione appropriata per procedure invasive.';
  } else {
    level = 'Sedazione Profonda';
    description = 'Monitoraggio intensivo richiesto.';
  }
  
  levelDisplay.textContent = level;
  descriptionDisplay.textContent = description;
  resultsDiv.classList.add('show');
}

function resetRASSForm() {
  if (!rassContainer) return;
  if (confirm('Sei sicuro di voler resettare tutti i dati RASS?')) {
    rassContainer.querySelectorAll('.option-item').forEach(item => item.classList.remove('selected'));
    rassContainer.querySelector('#rass-results').classList.remove('show');
    rassContainer.querySelector('#rass-patient-name').value = '';
    rassContainer.querySelector('#rass-operator').value = '';
    selectedRASSScore = null;
  }
}

function printRASSTemplate() {
  if (!rassContainer) return;
  const template = rassContainer.querySelector('.print-template').cloneNode(true);
  template.querySelectorAll('.action-buttons').forEach(btn => btn.remove());
  const w = window.open('', '', 'width=900,height=700');
  w.document.write(`<!DOCTYPE html><html><head><meta charset="UTF-8"><link rel="stylesheet" href="css/rass.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"></head><body>${template.outerHTML}</body></html>`);
  w.document.close();
  w.onload = () => {
    w.focus();
    w.print();
    w.onafterprint = () => w.close();
  };
}

function printRASSReport() {
  if (!rassContainer || selectedRASSScore === null) {
    alert('Seleziona un punteggio RASS prima di stampare il report.');
    return;
  }

  const patientName = rassContainer.querySelector('#rass-patient-name').value || 'Non specificato';
  const date = rassContainer.querySelector('#rass-date').value;
  const time = rassContainer.querySelector('#rass-time').value;
  const operator = rassContainer.querySelector('#rass-operator').value || 'Non specificato';
  const level = rassContainer.querySelector('#rass-level-display').textContent;
  const description = rassContainer.querySelector('#rass-description-display').textContent;
  const score = selectedRASSScore > 0 ? `+${selectedRASSScore}` : selectedRASSScore;

  const reportHTML = `
  <div class="print-template">
    <div class="template-header">
      <div class="template-title">Report Valutazione RASS</div>
      <div class="template-subtitle">Richmond Agitation-Sedation Scale</div>
    </div>
    <div class="patient-info-box">
      <strong>Paziente:</strong> ${patientName}<br>
      <strong>Data:</strong> ${date} &nbsp; <strong>Ora:</strong> ${time}<br>
      <strong>Operatore:</strong> ${operator}
    </div>
    <div class="results-display show">
      <div class="result-score">${score}</div>
      <div class="result-level">${level}</div>
      <div class="result-description">${description}</div>
    </div>
  </div>`;

  const w = window.open('', '', 'width=900,height=700');
  w.document.write(`<!DOCTYPE html><html><head><meta charset="UTF-8"><link rel="stylesheet" href="css/rass.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"></head><body>${reportHTML}</body></html>`);
  w.document.close();
  w.onload = () => {
    w.focus();
    w.print();
    w.onafterprint = () => w.close();
  };
}

