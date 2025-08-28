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
  w.document.write(`<!DOCTYPE html><html><head><meta charset="UTF-8"><link rel="stylesheet" href="css/rass.css"><link rel="stylesheet" href="css/fontawesome-all.min.css"></head><body>${template.outerHTML}</body></html>`);
  w.document.close();
  w.onload = () => {
    w.focus();
    w.print();
    setTimeout(() => w.close(), 100);
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

  const reportHTML = `<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Report Valutazione RASS</title>
  <style>
    body { font-family: 'Times New Roman', serif; margin: 20px; line-height: 1.6; color: #333; }
    .report-header { text-align: center; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 3px solid #17a2b8; }
    .report-title { font-size: 2.2rem; color: #17a2b8; margin-bottom: 0.5rem; font-weight: 700; }
    .report-subtitle { font-size: 1.2rem; color: #6c757d; font-style: italic; }
    .patient-info { background: #f8f9fa; padding: 1.5rem; border-radius: 8px; margin: 1.5rem 0; border-left: 5px solid #17a2b8; }
    .patient-info h4 { color: #17a2b8; margin-bottom: 1rem; font-size: 1.3rem; }
    .patient-info p { margin: 0.5rem 0; font-size: 1.1rem; }
    .results-section { background: linear-gradient(135deg, #17a2b8, #138496); color: white; padding: 2rem; border-radius: 12px; text-align: center; margin: 2rem 0; page-break-inside: avoid; }
    .result-score { font-size: 4rem; font-weight: 700; margin-bottom: 1rem; text-shadow: 0 2px 4px rgba(0,0,0,0.3); }
    .result-level { font-size: 1.8rem; margin-bottom: 1rem; font-weight: 600; }
    .result-description { font-size: 1.2rem; line-height: 1.5; opacity: 0.95; }
    .scale-reference { margin-top: 2rem; padding: 1.5rem; background: #f8f9fa; border-radius: 8px; page-break-inside: avoid; }
    .scale-reference h4 { color: #17a2b8; margin-bottom: 1rem; font-size: 1.3rem; }
    .scale-reference p { margin: 0.5rem 0; padding-left: 1rem; }
    .clinical-section { margin-top: 1.5rem; padding: 1.5rem; background: #fff3cd; border-radius: 8px; border-left: 5px solid #ffc107; }
    .clinical-section h4 { color: #856404; margin-bottom: 1rem; }
    .clinical-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 1rem; }
    .clinical-item { background: white; padding: 1rem; border-radius: 6px; border: 1px solid #ffeaa7; }
    .clinical-item strong { color: #856404; display: block; margin-bottom: 0.5rem; }
    .footer { margin-top: 3rem; text-align: center; font-size: 0.9rem; color: #6c757d; border-top: 1px solid #dee2e6; padding-top: 1rem; }
    .timestamp { font-style: italic; color: #868e96; }
    @media print { body { margin: 0; -webkit-print-color-adjust: exact; print-color-adjust: exact; } .results-section { background: #17a2b8 !important; -webkit-print-color-adjust: exact; } }
  </style></head><body>
  <div class="report-header">
    <div class="report-title">Report Valutazione RASS</div>
    <div class="report-subtitle">Richmond Agitation-Sedation Scale</div>
  </div>
  <div class="patient-info">
    <h4>📋 Dati Paziente</h4>
    <p><strong>Paziente:</strong> ${patientName}</p>
    <p><strong>Data:</strong> ${date} &nbsp;&nbsp; <strong>Ora:</strong> ${time}</p>
    <p><strong>Operatore:</strong> ${operator}</p>
  </div>
  <div class="results-section">
    <div class="result-score">${score}</div>
    <div class="result-level">${level}</div>
    <div class="result-description">${description}</div>
  </div>
  <div class="scale-reference">
    <h4>📖 Scala RASS - Riferimento Completo</h4>
    <p><strong>+4:</strong> Combattivo - Apertamente combattivo, violento</p>
    <p><strong>+3:</strong> Molto agitato - Tira o rimuove tubi/cateteri, aggressivo</p>
    <p><strong>+2:</strong> Agitato - Movimenti frequenti e non finalizzati</p>
    <p><strong>+1:</strong> Irrequieto - Ansioso ma non aggressivo</p>
    <p><strong>0:</strong> Vigile e calmo</p>
    <p><strong>-1:</strong> Assonnato - Risveglio alla voce ≥10 sec</p>
    <p><strong>-2:</strong> Sedazione leggera - Risveglio alla voce <10 sec</p>
    <p><strong>-3:</strong> Sedazione moderata - Movimento alla voce senza contatto visivo</p>
    <p><strong>-4:</strong> Sedazione profonda - Risposta solo a stimoli fisici</p>
    <p><strong>-5:</strong> Non risvegliabile - Nessuna risposta</p>
  </div>
  <div class="clinical-section">
    <h4>🎯 Obiettivi Clinici</h4>
    <div class="clinical-grid">
      <div class="clinical-item"><strong>Terapia Intensiva</strong> Target: da -2 a 0</div>
      <div class="clinical-item"><strong>Ventilazione Meccanica</strong> Target: da -3 a -1</div>
      <div class="clinical-item"><strong>Cure Palliative</strong> Target personalizzato</div>
    </div>
  </div>
  <div class="footer">
    <p><strong>Richmond Agitation-Sedation Scale</strong> | Report generato il: <span class="timestamp">${new Date().toLocaleString('it-IT')}</span></p>
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

