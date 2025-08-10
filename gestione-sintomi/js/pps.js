let selectedPPSLevel = null;

document.addEventListener('DOMContentLoaded', function() {
  const dateInput = document.getElementById('pps-date');
  if (dateInput && !dateInput.value) {
    dateInput.value = new Date().toISOString().split('T')[0];
  }
});

function selectPPSLevel(level) {
  document.querySelectorAll('#pps-table tr').forEach(row => {
    row.classList.remove('selected');
  });
  const row = document.querySelector(`#pps-table tr[data-level="${level}"]`);
  if (row) row.classList.add('selected');
  selectedPPSLevel = level;
  if (typeof performanceData !== 'undefined') {
    performanceData.pps.score = level;
  }
  showPPSResults(level);
}

function showPPSResults(level) {
  const resultsSection = document.getElementById('pps-results-section');
  const scoreDisplay = document.getElementById('pps-selected-score');
  const interpretation = document.getElementById('pps-interpretation');
  const prognosticDetails = document.getElementById('pps-description');
  if (!resultsSection) return;

  scoreDisplay.textContent = level + '%';

  let interpretationText = '';
  let prognosticInfo = '';

  if (level === 100) {
    interpretationText = 'Performance normale - Nessuna evidenza di malattia';
    prognosticInfo = 'Il paziente mantiene piena capacità funzionale. Appropriato per trattamenti attivi e follow-up di routine.';
  } else if (level >= 80) {
    interpretationText = 'Performance elevata - Malattia presente ma buona funzionalità';
    prognosticInfo = 'Prognosi favorevole. Il paziente mantiene buona autonomia. Candidato per terapie attive e cure simultanee.';
  } else if (level >= 60) {
    interpretationText = 'Performance moderata - Limitazioni funzionali significative';
    prognosticInfo = 'Prognosi intermedia (settimane-mesi). Valutare introduzione cure palliative specialistiche e pianificazione avanzata.';
  } else if (level >= 40) {
    interpretationText = 'Performance compromessa - Dipendenza significativa';
    prognosticInfo = 'Prognosi limitata (settimane). Cure palliative intensive, supporto domiciliare esteso o ricovero in hospice.';
  } else if (level >= 20) {
    interpretationText = 'Performance molto compromessa - Dipendenza totale';
    prognosticInfo = 'Prognosi a breve termine (giorni-settimane). Cure di fine vita, comfort care, supporto alla famiglia.';
  } else if (level === 10) {
    interpretationText = 'Performance terminale - Fase pre-morte';
    prognosticInfo = 'Prognosi a brevissimo termine (ore-giorni). Cure di fine vita intensive, gestione sintomi, supporto spirituale.';
  } else if (level === 0) {
    interpretationText = 'Decesso';
    prognosticInfo = 'Il paziente è deceduto.';
  }

  interpretation.textContent = interpretationText;
  prognosticDetails.innerHTML = `<p><strong>Indicazioni Cliniche:</strong></p><p>${prognosticInfo}</p><p style="margin-top: 1rem; font-size: 0.9rem; opacity: 0.8;"><em>Nota: Le indicazioni prognostiche sono basate su dati di popolazione. Ogni paziente è individuale e richiede sempre valutazione clinica specifica.</em></p>`;

  resultsSection.classList.add('show');
}

function printPPS() {
  if (!selectedPPSLevel) {
    alert('Seleziona prima un livello PPS.');
    return;
  }
  printPerformanceSheet('pps');
}

function resetPPSForm() {
  if (!confirm('Sei sicuro di voler resettare il form? Tutti i dati inseriti andranno persi.')) return;
  const nameInput = document.getElementById('pps-patient-name');
  const dateInput = document.getElementById('pps-date');
  if (nameInput) nameInput.value = '';
  if (dateInput) dateInput.value = new Date().toISOString().split('T')[0];
  document.querySelectorAll('#pps-table tr').forEach(row => row.classList.remove('selected'));
  const resultsSection = document.getElementById('pps-results-section');
  if (resultsSection) resultsSection.classList.remove('show');
  selectedPPSLevel = null;
  if (typeof performanceData !== 'undefined') {
    performanceData.pps.score = null;
  }
}
