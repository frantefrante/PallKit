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
  w.document.write(`<!DOCTYPE html><html><head><link rel="stylesheet" href="css/ramsey.css"></head><body>${template.outerHTML}</body></html>`);
  w.document.close();
  w.focus();
  w.print();
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

  const reportHTML = `
  <div class="print-template">
    <div class="template-header">
      <div class="template-title">Report Valutazione Ramsey</div>
      <div class="template-subtitle">Ramsey Sedation Scale</div>
    </div>
    <div class="patient-info-box">
      <strong>Paziente:</strong> ${patientName}<br>
      <strong>Data:</strong> ${date} &nbsp; <strong>Ora:</strong> ${time}<br>
      <strong>Operatore:</strong> ${operator}
    </div>
    <div class="results-display show">
      <div class="result-score">${selectedRamseyScore}</div>
      <div class="result-level">${level}</div>
      <div class="result-description">${description}</div>
    </div>
  </div>`;

  const w = window.open('', '', 'width=900,height=700');
  w.document.write(`<!DOCTYPE html><html><head><link rel="stylesheet" href="css/ramsey.css"></head><body>${reportHTML}</body></html>`);
  w.document.close();
  w.focus();
  w.print();
}

