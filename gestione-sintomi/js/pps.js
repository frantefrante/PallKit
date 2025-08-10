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
  showPPSResults(level);
}

function showPPSResults(level) {
  const resultsSection = document.getElementById('pps-results-section');
  const scoreDisplay = document.getElementById('pps-selected-score');
  const interpretation = document.getElementById('pps-score-interpretation');
  const prognosticDetails = document.getElementById('pps-prognostic-details');
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
  window.print();
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
}

function printPPSTemplate() {
  const templateContent = document.getElementById('pps-view').innerHTML;
  const printWindow = window.open('', '_blank');
  printWindow.document.write(`
    <html>
    <head>
      <title>PPS Template - Palliative Performance Scale</title>
      <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 2px solid #333; padding: 8px; text-align: center; font-size: 10px; }
        th { background: #f0f0f0; font-weight: bold; }
        h2 { text-align: center; color: #333; }
        .template-header { margin-bottom: 20px; }
        @media print { body { margin: 0; } }
      </style>
    </head>
    <body>
      ${templateContent}
    </body>
    </html>
  `);
  printWindow.document.close();
  printWindow.print();
}
