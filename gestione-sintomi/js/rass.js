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

function printRASSReport() {
  if (!rassContainer || selectedRASSScore === null) {
    alert('Seleziona un punteggio RASS prima di scaricare il report.');
    return;
  }
  
  const patientName = rassContainer.querySelector('#rass-patient-name').value || 'Non specificato';
  const date = rassContainer.querySelector('#rass-date').value;
  const time = rassContainer.querySelector('#rass-time').value;
  const operator = rassContainer.querySelector('#rass-operator').value || 'Non specificato';
  const level = rassContainer.querySelector('#rass-level-display').textContent;
  const description = rassContainer.querySelector('#rass-description-display').textContent;
  
  const reportContent = `
REPORT VALUTAZIONE RASS
========================

DATI PAZIENTE:
Nome: ${patientName}
Data: ${date}
Ora: ${time}
Operatore: ${operator}

RISULTATI:
Punteggio RASS: ${selectedRASSScore > 0 ? '+' : ''}${selectedRASSScore}
Livello: ${level}
Interpretazione: ${description}

Report generato il: ${new Date().toLocaleString('it-IT')}
  `.trim();
  
  const blob = new Blob([reportContent], {type: 'text/plain;charset=utf-8'});
  const link = document.createElement('a');
  link.href = URL.createObjectURL(blob);
  link.download = `RASS_Report_${patientName.replace(/\s+/g, '_')}_${date}.txt`;
  link.click();
}

