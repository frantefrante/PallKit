// gestione-sintomi/js/performance.js

// === VARIABILI GLOBALI ===
let performanceData = {
  akps: { score: null, patientName: '', date: '' },
  pps: { score: null, patientName: '', date: '' },
  adl: { scores: {}, total: 0, patientName: '', date: '' },
  badl: { scores: {}, total: 0, patientName: '', date: '' }
};

// ADL scores specifici
let adlScores = {
  feeding: null, bathing: null, grooming: null, dressing: null, 
  bowel: null, bladder: null, toilet: null, transfer: null, 
  mobility: null, stairs: null
};

// BADL scores specifici  
let badlScores = {
  hygiene: null, dressing: null, feeding: null, 
  transfer: null, mobility: null, continence: null
};

// === INIZIALIZZAZIONE ===
document.addEventListener('DOMContentLoaded', function() {
  // Imposta data odierna
  const today = new Date().toISOString().split('T')[0];
  document.querySelectorAll('input[type="date"]').forEach(input => {
    if (!input.value) input.value = today;
  });

  // Chiudi modal con ESC
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      document.querySelectorAll('.performance-modal').forEach(modal => {
        closePerformanceModal(modal.id.replace('modal-', ''));
      });
    }
  });

  // Chiudi modal cliccando fuori
  window.onclick = function(e) {
    if (e.target.classList.contains('performance-modal')) {
      const modalId = e.target.id.replace('modal-', '');
      closePerformanceModal(modalId);
    }
  };

  // Inizializza tooltips se disponibili
  if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
    new bootstrap.Tooltip(document.body, {
      selector: '[data-bs-toggle="tooltip"]'
    });
  }
});

// === GESTIONE MODALI ===
function openPerformanceModal(toolId, mode = 'compile') {
  const modal = document.getElementById('modal-' + toolId);
  if (modal) {
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
    switchPerformanceMode(toolId, mode);
    
    // Animazione di apertura
    setTimeout(() => {
      modal.querySelector('.modal-content').style.animation = 'modalSlideIn 0.3s ease-out';
    }, 10);
  }
}

function closePerformanceModal(toolId) {
  const modal = document.getElementById('modal-' + toolId);
  if (modal) {
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
  }
}

function switchPerformanceMode(toolId, mode) {
  // Rimuovi active da tutti i bottoni e sezioni nel modal specifico
  const modal = document.getElementById('modal-' + toolId);
  if (!modal) return;

  modal.querySelectorAll('.mode-btn').forEach(btn => {
    btn.classList.remove('active');
  });
  modal.querySelectorAll('.content-section').forEach(section => {
    section.classList.remove('active');
  });

  // Attiva il bottone e la sezione selezionati
  const targetBtn = modal.querySelector(`[onclick*="${mode}"]`);
  if (targetBtn) targetBtn.classList.add('active');
  
  const section = document.getElementById(`${toolId}-${mode}`);
  if (section) section.classList.add('active');
}

// === AKPS FUNCTIONS ===
function selectAKPS(score) {
  // Rimuovi selezione precedente
  document.querySelectorAll('#akps-options .radio-option').forEach(option => {
    option.classList.remove('selected');
  });

  // Seleziona l'opzione corrente
  event.currentTarget.classList.add('selected');
  
  // Salva il punteggio
  performanceData.akps.score = score;
  
  // Aggiorna progress
  updateProgress('akps', 100);
  
  // Mostra risultati
  showAKPSResult(score);
}

function showAKPSResult(score) {
  const resultsDiv = document.getElementById('akps-results');
  const scoreNum = document.getElementById('akps-score');
  const interpretation = document.getElementById('akps-interpretation');
  const description = document.getElementById('akps-description');
  
  if (!resultsDiv || !scoreNum || !interpretation || !description) return;
  
  scoreNum.textContent = score;
  
  let interp, desc;
  if (score >= 80) {
    interp = "Buone condizioni funzionali";
    desc = "Il paziente mantiene un livello di autonomia elevato con capacità di svolgere la maggior parte delle attività quotidiane.";
  } else if (score >= 60) {
    interp = "Condizioni funzionali moderate";
    desc = "Il paziente necessita di assistenza occasionale ma mantiene una discreta autonomia nelle attività di base.";
  } else if (score >= 40) {
    interp = "Condizioni funzionali compromesse";
    desc = "Il paziente richiede assistenza significativa e cure mediche regolari per le attività quotidiane.";
  } else if (score >= 20) {
    interp = "Condizioni funzionali severe";
    desc = "Il paziente è gravemente compromesso e necessita di cure intensive e assistenza continua.";
  } else {
    interp = "Condizioni critiche";
    desc = "Il paziente è in fase terminale con prognosi molto riservata a breve termine.";
  }
  
  interpretation.textContent = interp;
  description.textContent = desc;
  resultsDiv.style.display = 'block';
}

// === PPS FUNCTIONS ===
function selectPPS(score) {
  document.querySelectorAll('#pps-options .radio-option').forEach(option => {
    option.classList.remove('selected');
  });

  event.currentTarget.classList.add('selected');
  performanceData.pps.score = score;
  updateProgress('pps', 100);
  showPPSResult(score);
}

function showPPSResult(score) {
  const resultsDiv = document.getElementById('pps-results');
  const scoreNum = document.getElementById('pps-score');
  const interpretation = document.getElementById('pps-interpretation');
  const description = document.getElementById('pps-description');
  
  if (!resultsDiv || !scoreNum || !interpretation || !description) return;
  
  scoreNum.textContent = score + '%';
  
  let interp, desc;
  if (score >= 70) {
    interp = "Buona performance funzionale";
    desc = "Il paziente mantiene un buon livello di autonomia. Prognosi: mesi-anni.";
  } else if (score >= 50) {
    interp = "Performance funzionale ridotta";
    desc = "Il paziente necessita di assistenza significativa. Prognosi: settimane-mesi.";
  } else if (score >= 30) {
    interp = "Performance funzionale compromessa";
    desc = "Il paziente è prevalentemente allettato. Prognosi: settimane.";
  } else {
    interp = "Performance funzionale molto compromessa";
    desc = "Il paziente è in fase avanzata di malattia. Prognosi: giorni-settimane.";
  }
  
  interpretation.textContent = interp;
  description.textContent = desc;
  resultsDiv.style.display = 'block';
}

// === ADL FUNCTIONS ===
function selectADL(domain, score, element) {
  adlScores[domain] = parseInt(score);
  
  // Visual feedback
  const domainGroup = document.getElementById(`adl-${domain}-group`);
  if (domainGroup) {
    domainGroup.querySelectorAll('.radio-option').forEach(option => {
      option.classList.remove('selected');
    });
  }
  
  if (element) element.classList.add('selected');
  
  calculateADLScore();
}

function calculateADLScore() {
  let totalScore = 0;
  let completedItems = 0;
  const totalItems = Object.keys(adlScores).length;
  
  for (let domain in adlScores) {
    if (adlScores[domain] !== null) {
      totalScore += adlScores[domain];
      completedItems++;
    }
  }
  
  // Calcola percentuale completamento
  const progressPercentage = Math.round((completedItems / totalItems) * 100);
  updateProgress('adl', progressPercentage);
  
  // Mostra risultati se completato
  if (completedItems === totalItems) {
    showADLResult(totalScore);
  } else {
    showPartialADLResult(totalScore, completedItems, totalItems);
  }
}

function showADLResult(totalScore) {
  const resultsDiv = document.getElementById('adl-results');
  const scoreNum = document.getElementById('adl-score');
  const interpretation = document.getElementById('adl-interpretation');
  const description = document.getElementById('adl-description');
  
  if (!resultsDiv || !scoreNum || !interpretation || !description) return;
  
  // Il punteggio totale massimo per ADL è 20, convertiamo in scala 0-100
  const scaledScore = Math.round((totalScore / 20) * 100);
  
  scoreNum.textContent = scaledScore;
  performanceData.adl.total = scaledScore;
  
  let interp, desc;
  if (scaledScore >= 91) {
    interp = "Indipendenza completa";
    desc = "Il paziente è completamente autonomo in tutte le attività della vita quotidiana.";
  } else if (scaledScore >= 61) {
    interp = "Dipendenza moderata";
    desc = "Il paziente necessita di assistenza limitata per alcune attività.";
  } else if (scaledScore >= 21) {
    interp = "Dipendenza severa";
    desc = "Il paziente richiede assistenza significativa per la maggior parte delle attività.";
  } else {
    interp = "Dipendenza totale";
    desc = "Il paziente necessita di assistenza completa per tutte le attività quotidiane.";
  }
  
  interpretation.textContent = interp;
  description.textContent = desc;
  resultsDiv.style.display = 'block';
}

function showPartialADLResult(currentScore, completed, total) {
  const resultsDiv = document.getElementById('adl-results');
  const scoreNum = document.getElementById('adl-score');
  const interpretation = document.getElementById('adl-interpretation');
  const description = document.getElementById('adl-description');
  
  if (!resultsDiv || !scoreNum || !interpretation || !description) return;
  
  scoreNum.textContent = currentScore;
  interpretation.textContent = `Valutazione parziale (${completed}/${total})`;
  description.textContent = "Completa tutte le attività per ottenere il punteggio finale.";
  resultsDiv.style.display = 'block';
}

// === BADL FUNCTIONS ===
function selectBADL(domain, score, element) {
  badlScores[domain] = parseInt(score);
  
  // Visual feedback
  const domainGroup = document.getElementById(`badl-${domain}-group`);
  if (domainGroup) {
    domainGroup.querySelectorAll('.radio-option').forEach(option => {
      option.classList.remove('selected');
    });
  }
  
  if (element) element.classList.add('selected');
  
  calculateBADLScore();
}

function calculateBADLScore() {
  let totalScore = 0;
  let completedItems = 0;
  const totalItems = Object.keys(badlScores).length;
  
  for (let domain in badlScores) {
    if (badlScores[domain] !== null) {
      totalScore += badlScores[domain];
      completedItems++;
    }
  }
  
  // Calcola percentuale completamento
  const progressPercentage = Math.round((completedItems / totalItems) * 100);
  updateProgress('badl', progressPercentage);
  
  // Mostra risultati
  if (completedItems === totalItems) {
    showBADLResult(totalScore);
  } else {
    showPartialBADLResult(totalScore, completedItems, totalItems);
  }
}

function showBADLResult(totalScore) {
  const resultsDiv = document.getElementById('badl-results');
  const scoreNum = document.getElementById('badl-score');
  const interpretation = document.getElementById('badl-interpretation');
  const description = document.getElementById('badl-description');
  
  if (!resultsDiv || !scoreNum || !interpretation || !description) return;
  
  scoreNum.textContent = totalScore;
  performanceData.badl.total = totalScore;
  
  let interp, desc;
  if (totalScore <= 3) {
    interp = "Autonomia elevata";
    desc = "Il paziente è sostanzialmente indipendente nelle attività di base.";
  } else if (totalScore <= 9) {
    interp = "Autonomia moderata";
    desc = "Il paziente necessita di supporto limitato per alcune attività.";
  } else if (totalScore <= 15) {
    interp = "Dipendenza significativa";
    desc = "Il paziente richiede assistenza regolare per le attività quotidiane.";
  } else {
    interp = "Dipendenza totale";
    desc = "Il paziente necessita di assistenza continua per tutte le attività di base.";
  }
  
  interpretation.textContent = interp;
  description.textContent = desc;
  resultsDiv.style.display = 'block';
}

function showPartialBADLResult(currentScore, completed, total) {
  const resultsDiv = document.getElementById('badl-results');
  const scoreNum = document.getElementById('badl-score');
  const interpretation = document.getElementById('badl-interpretation');
  const description = document.getElementById('badl-description');
  
  if (!resultsDiv || !scoreNum || !interpretation || !description) return;
  
  scoreNum.textContent = currentScore;
  interpretation.textContent = `Valutazione parziale (${completed}/${total})`;
  description.textContent = "Completa tutte le attività per ottenere il punteggio finale.";
  resultsDiv.style.display = 'block';
}

// === UTILITY FUNCTIONS ===
function updateProgress(toolId, percentage) {
  const progressBar = document.getElementById(`${toolId}-progress`);
  const progressText = document.getElementById(`${toolId}-progress-text`);
  
  if (progressBar) {
    progressBar.style.width = percentage + '%';
    progressBar.style.transition = 'width 0.5s ease';
  }
  if (progressText) {
    progressText.textContent = percentage + '%';
  }
}

function resetPerformanceForm(toolId) {
  if (!confirm('Sei sicuro di voler azzerare tutti i dati inseriti?')) return;
  
  // Reset selezioni radio
  document.querySelectorAll(`#${toolId}-options .radio-option, #modal-${toolId} .radio-option`).forEach(option => {
    option.classList.remove('selected');
  });
  
  // Reset risultati
  const results = document.getElementById(`${toolId}-results`);
  if (results) results.style.display = 'none';
  
  // Reset dati specifici per strumento
  if (toolId === 'adl') {
    adlScores = {
      feeding: null, bathing: null, grooming: null, dressing: null, 
      bowel: null, bladder: null, toilet: null, transfer: null, 
      mobility: null, stairs: null
    };
  } else if (toolId === 'badl') {
    badlScores = {
      hygiene: null, dressing: null, feeding: null, 
      transfer: null, mobility: null, continence: null
    };
  }
  
  // Reset dati generali
  performanceData[toolId] = { score: null, patientName: '', date: '' };
  
  // Reset progress
  updateProgress(toolId, 0);
  
  // Reset form inputs
  const patientName = document.getElementById(`${toolId}-patient-name`);
  if (patientName) patientName.value = '';
  
  const dateInput = document.getElementById(`${toolId}-date`);
  if (dateInput) dateInput.value = new Date().toISOString().split('T')[0];
}

// === REPORT GENERATION ===
function generatePerformanceReport(toolId) {
  const data = performanceData[toolId];
  if (!data.score && !data.total) {
    alert('Completa la valutazione prima di generare il report.');
    return;
  }
  
  const patientName = document.getElementById(`${toolId}-patient-name`).value || 'Non specificato';
  const date = document.getElementById(`${toolId}-date`).value || new Date().toLocaleDateString('it-IT');
  const interpretation = document.getElementById(`${toolId}-interpretation`).textContent;
  const description = document.getElementById(`${toolId}-description`).textContent;
  
  const score = data.score || data.total;
  const report = generateReportContent(toolId, score, patientName, date, interpretation, description);
  
  // Download del file
  const blob = new Blob([report], { type: 'text/plain;charset=utf-8' });
  const link = document.createElement('a');
  link.href = URL.createObjectURL(blob);
  link.download = `${toolId.toUpperCase()}_Report_${patientName.replace(/\s+/g, '_')}_${date.replace(/\//g, '-')}.txt`;
  
  // Compatibilità browser
  if (navigator.msSaveBlob) {
    navigator.msSaveBlob(blob, link.download);
  } else {
    link.click();
  }
  
  // Salva in localStorage
  saveToLocalStorage(toolId, {
    score: score,
    patientName,
    date,
    interpretation,
    description,
    timestamp: new Date().toISOString()
  });
}

function generateReportContent(toolId, score, patientName, date, interpretation, description) {
  const toolNames = {
    'akps': 'AKPS - Australia-modified Karnofsky Performance Status',
    'pps': 'PPS - Palliative Performance Scale',
    'adl': 'ADL - Activities of Daily Living (Indice di Barthel)',
    'badl': 'BADL - Basic Activities of Daily Living'
  };
  
  const currentDate = new Date().toLocaleString('it-IT');
  
  return `
REPORT ${toolNames[toolId]}
${'='.repeat(80)}

DATI PAZIENTE:
Nome: ${patientName}
Data valutazione: ${date}
Data generazione report: ${currentDate}

RISULTATI:
Punteggio: ${score}${toolId === 'pps' ? '%' : (toolId === 'badl' ? '/18' : '/100')}
Interpretazione: ${interpretation}

DESCRIZIONE CLINICA:
${description}

RACCOMANDAZIONI CLINICHE:
${getRecommendations(toolId, score)}

${getAdditionalInfo(toolId)}

NOTE:
- Questo report è stato generato automaticamente dal sistema Medbox.it
- Per informazioni cliniche complete consultare sempre il medico specialista
- La valutazione funzionale deve essere integrata con il quadro clinico complessivo
- Si raccomanda di ripetere la valutazione periodicamente per monitorare l'evoluzione

BIBLIOGRAFIA ESSENZIALE:
${getBibliography(toolId)}

Report generato da: www.medbox.it - Strumenti per le Cure Palliative
Versione software: 2.0 | Data: ${currentDate}
  `.trim();
}

function getRecommendations(toolId, score) {
  if (toolId === 'akps') {
    if (score >= 80) return "• Mantenimento autonomia attuale\n• Controlli periodici programmati\n• Incoraggiare attività fisica moderata\n• Valutazione bisogni psicosociali";
    if (score >= 60) return "• Valutazione assistenza domiciliare\n• Supporto per attività strumentali\n• Monitoraggio sintomi\n• Coinvolgimento caregiver";
    if (score >= 40) return "• Assistenza domiciliare integrata\n• Controllo sintomi intensivo\n• Valutazione bisogni familiari\n• Pianificazione cure palliative";
    if (score >= 20) return "• Cure palliative specialistiche\n• Assistenza continua H24\n• Supporto psicologico famiglia\n• Controllo dolore e sintomi";
    return "• Cure di fine vita\n• Comfort care esclusivo\n• Accompagnamento spirituale\n• Supporto lutto anticipatorio";
  }
  
  if (toolId === 'pps') {
    if (score >= 70) return "• Candidato per terapie attive\n• Follow-up regolare\n• Mantenimento qualità di vita\n• Pianificazione anticipata delle cure";
    if (score >= 50) return "• Valutazione cure palliative precoci\n• Supporto sintomatico\n• Pianificazione assistenziale\n• Coinvolgimento team multidisciplinare";
    if (score >= 30) return "• Cure palliative intensive\n• Controllo sintomi avanzato\n• Supporto famiglia\n• Valutazione setting di cura";
    return "• Cure di fine vita\n• Comfort care esclusivo\n• Accompagnamento famiglia\n• Gestione transizione";
  }
  
  if (toolId === 'adl') {
    if (score >= 91) return "• Mantenimento autonomia\n• Prevenzione decline funzionale\n• Attività fisica adattata";
    if (score >= 61) return "• Ausili per autonomia\n• Riabilitazione mirata\n• Valutazione ambientale";
    if (score >= 21) return "• Assistenza domiciliare\n• Ausili maggiori\n• Supporto caregiver";
    return "• Assistenza continua\n• Valutazione istituzionalizzazione\n• Supporto famiglia";
  }
  
  if (toolId === 'badl') {
    if (score <= 3) return "• Mantenimento autonomia\n• Monitoraggio periodico\n• Prevenzione cadute";
    if (score <= 9) return "• Supporto domiciliare limitato\n• Ausili di base\n• Training caregiver";
    if (score <= 15) return "• Assistenza domiciliare integrata\n• Ausili complessi\n• Valutazione sociale";
    return "• Assistenza continua\n• Valutazione long-term care\n• Supporto intensivo famiglia";
  }
  
  return "• Valutazione multidisciplinare\n• Pianificazione assistenziale\n• Monitoraggio periodico";
}

function getAdditionalInfo(toolId) {
  const info = {
    'akps': `
INTERPRETAZIONE AKPS:
- 80-100: Buone condizioni, terapie attive appropriate
- 60-70: Condizioni moderate, valutare cure palliative precoci
- 40-50: Condizioni compromesse, cure palliative intensive
- 20-30: Condizioni severe, cure di fine vita
- 0-10: Fase terminale

FREQUENZA RIVALUTAZIONE:
- AKPS >60: ogni 2-4 settimane
- AKPS 40-60: ogni 1-2 settimane  
- AKPS <40: ogni 3-7 giorni`,

    'pps': `
CORRELAZIONE PROGNOSTICA PPS:
- PPS ≥70%: Prognosi mesi-anni
- PPS 50-60%: Prognosi settimane-mesi
- PPS 30-40%: Prognosi settimane
- PPS ≤20%: Prognosi giorni-settimane

DOMINI VALUTATI:
1. Deambulazione
2. Attività e lavoro
3. Auto-cura
4. Assunzione di cibo
5. Livello di coscienza`,

    'adl': `
DOMINI BARTHEL INDEX:
1. Alimentazione (0-2 punti)
2. Bagno (0-1 punto)
3. Cura personale (0-1 punto)
4. Vestirsi (0-2 punti)
5. Controllo intestinale (0-2 punti)
6. Controllo vescicale (0-2 punti)
7. Uso WC (0-2 punti)
8. Trasferimento (0-3 punti)
9. Mobilità (0-3 punti)
10. Scale (0-2 punti)

VALIDITÀ: Gold standard per valutazione ADL`,

    'badl': `
DOMINI BADL (scala 0-3 ciascuno):
1. Igiene personale
2. Vestirsi
3. Alimentarsi
4. Trasferimenti
5. Mobilità nel letto
6. Controllo sfinterico

UTILIZZO: Screening rapido, monitoraggio, pianificazione assistenziale`
  };
  
  return info[toolId] || '';
}

function getBibliography(toolId) {
  const biblio = {
    'akps': '- Abernethy AP, et al. J Pain Symptom Manage. 2005;29(3):224-7\n- Currow DC, et al. J Clin Oncol. 2008;26(23):3883-8',
    'pps': '- Anderson F, et al. J Palliat Care. 1996;12(4):5-11\n- Virik K, Glare P. J Clin Oncol. 2002;20(21):4376-80',
    'adl': '- Mahoney FI, Barthel DW. Md State Med J. 1965;14:61-5\n- Collin C, et al. Int Disabil Stud. 1988;10(2):64-7',
    'badl': '- Katz S, et al. JAMA. 1963;185:914-9\n- Lawton MP, Brody EM. Gerontologist. 1969;9(3):179-86'
  };
  
  return biblio[toolId] || 'Bibliografia disponibile nella documentazione completa';
}

// === TEMPLATE PRINTING ===
function printPerformanceTemplate(toolId) {
  const printWindow = window.open('', '_blank');
  const templateContent = generatePrintTemplate(toolId);
  
  printWindow.document.write(templateContent);
  printWindow.document.close();
  printWindow.focus();
  
  // Stampa automatica dopo caricamento
  printWindow.onload = function() {
    printWindow.print();
  };
}

function generatePrintTemplate(toolId) {
  const toolNames = {
    'akps': 'AKPS - Australia-modified Karnofsky Performance Status',
    'pps': 'PPS - Palliative Performance Scale', 
    'adl': 'ADL - Activities of Daily Living (Indice di Barthel)',
    'badl': 'BADL - Basic Activities of Daily Living'
  };
  
  return `
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>${toolNames[toolId]} - Template di Valutazione</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
            line-height: 1.4;
            color: #333;
        }
        .header { 
            text-align: center; 
            margin-bottom: 30px; 
            border-bottom: 2px solid #6f42c1;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #6f42c1;
            margin-bottom: 10px;
        }
        .header p {
            color: #666;
            margin: 5px 0;
        }
        .patient-info { 
            border: 2px solid #6f42c1; 
            padding: 20px; 
            margin-bottom: 25px; 
            border-radius: 8px;
            background: #f8f5fc;
        }
        .patient-info h3 {
            color: #6f42c1;
            margin-top: 0;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .form-field {
            flex: 1;
            margin-right: 20px;
        }
        .form-field:last-child {
            margin-right: 0;
        }
        .scale-items { 
            margin-bottom: 25px; 
        }
        .scale-items h3 {
            color: #6f42c1;
            border-bottom: 1px solid #6f42c1;
            padding-bottom: 10px;
        }
        .scale-item { 
            margin-bottom: 12px; 
            padding: 12px; 
            border: 1px solid #ddd; 
            border-radius: 5px;
            background: #fafafa;
        }
        .checkbox { 
            display: inline-block; 
            width: 18px; 
            height: 18px; 
            border: 2px solid #6f42c1; 
            margin-right: 12px; 
            vertical-align: middle;
        }
        .result-section {
            margin-top: 30px;
            padding: 20px;
            border: 2px solid #6f42c1;
            border-radius: 8px;
            background: #f8f5fc;
        }
        .result-section h3 {
            color: #6f42c1;
            margin-top: 0;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
        @media print { 
            body { margin: 10px; }
            .header { page-break-after: avoid; }
            .scale-item { page-break-inside: avoid; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>${toolNames[toolId]}</h1>
        <p><strong>Template di Valutazione Funzionale</strong></p>
        <p>www.medbox.it - Strumenti per le Cure Palliative</p>
    </div>
    
    <div class="patient-info">
        <h3>📋 Dati Paziente</h3>
        <div class="form-row">
            <div class="form-field">
                <strong>Nome e Cognome:</strong><br>
                ___________________________________________
            </div>
            <div class="form-field">
                <strong>Data di nascita:</strong><br>
                _________________________
            </div>
        </div>
        <div class="form-row">
            <div class="form-field">
                <strong>Codice Fiscale:</strong><br>
                ___________________________________________
            </div>
            <div class="form-field">
                <strong>Data valutazione:</strong><br>
                _________________________
            </div>
        </div>
        <div class="form-row">
            <div class="form-field">
                <strong>Medico valutatore:</strong><br>
                ___________________________________________
            </div>
            <div class="form-field">
                <strong>Contesto:</strong><br>
                _________________________
            </div>
        </div>
    </div>
    
    <div class="scale-items">
        <h3>🔍 ${toolNames[toolId]} - Elementi di Valutazione</h3>
        ${getTemplateItems(toolId)}
    </div>
    
    <div class="result-section">
        <h3>📊 Risultati della Valutazione</h3>
        <div class="form-row">
            <div class="form-field">
                <strong>Punteggio totale:</strong><br>
                ___________________________
            </div>
            <div class="form-field">
                <strong>Interpretazione:</strong><br>
                ___________________________
            </div>
        </div>
        <div style="margin-top: 20px;">
            <strong>Note cliniche:</strong><br>
            ________________________________________________________________________<br>
            ________________________________________________________________________<br>
            ________________________________________________________________________<br>
        </div>
        <div style="margin-top: 20px;">
            <strong>Raccomandazioni:</strong><br>
            ________________________________________________________________________<br>
            ________________________________________________________________________<br>
            ________________________________________________________________________<br>
        </div>
        <div style="margin-top: 20px;">
            <strong>Prossima rivalutazione:</strong> _____________________ 
            <strong>Firma medico:</strong> _____________________
        </div>
    </div>
    
    <div class="footer">
        <p>Template generato da <strong>www.medbox.it</strong> - Strumenti digitali per le Cure Palliative</p>
        <p>Data generazione: ${new Date().toLocaleDateString('it-IT')} - Versione 2.0</p>
    </div>
</body>
</html>
  `;
}

function getTemplateItems(toolId) {
  if (toolId === 'akps') {
    return `
        <div class="scale-item"><span class="checkbox"></span> <strong>100</strong> - Normale, nessuna evidenza di malattia</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>90</strong> - Normale attività, segni e sintomi minori</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>80</strong> - Attività normale con sforzo</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>70</strong> - Si prende cura di sé, incapace di attività normale</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>60</strong> - Richiede assistenza occasionale</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>50</strong> - Richiede assistenza considerevole</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>40</strong> - Disabile, richiede cure speciali</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>30</strong> - Severamente disabile</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>20</strong> - Molto malato</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>10</strong> - Moribondo</div>
    `;
  }
  
  if (toolId === 'pps') {
    return `
        <div class="scale-item"><span class="checkbox"></span> <strong>100%</strong> - Attività normale completa</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>90%</strong> - Attività normale, malattia evidente</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>80%</strong> - Attività normale con sforzo</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>70%</strong> - Deambulazione ridotta</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>60%</strong> - Deambulazione ridotta, assistenza occasionale</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>50%</strong> - Principalmente seduto/sdraiato</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>40%</strong> - Principalmente a letto</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>30%</strong> - Totalmente allettato</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>20%</strong> - Totalmente allettato, assunzione minima</div>
        <div class="scale-item"><span class="checkbox"></span> <strong>10%</strong> - Totalmente allettato, cura della bocca</div>
    `;
  }
  
  if (toolId === 'adl') {
    return `
        <div class="scale-item">
            <strong>1. Alimentazione</strong><br>
            <span class="checkbox"></span> 0 - Necessita assistenza &nbsp;&nbsp;
            <span class="checkbox"></span> 1 - Assistenza per tagliare &nbsp;&nbsp;
            <span class="checkbox"></span> 2 - Indipendente
        </div>
        <div class="scale-item">
            <strong>2. Bagno</strong><br>
            <span class="checkbox"></span> 0 - Dipendente &nbsp;&nbsp;
            <span class="checkbox"></span> 1 - Indipendente
        </div>
        <div class="scale-item">
            <strong>3. Cura personale</strong><br>
            <span class="checkbox"></span> 0 - Necessita assistenza &nbsp;&nbsp;
            <span class="checkbox"></span> 1 - Indipendente
        </div>
        <div class="scale-item">
            <strong>4. Vestirsi</strong><br>
            <span class="checkbox"></span> 0 - Dipendente &nbsp;&nbsp;
            <span class="checkbox"></span> 1 - Necessita assistenza &nbsp;&nbsp;
            <span class="checkbox"></span> 2 - Indipendente
        </div>
        <div class="scale-item">
            <strong>5. Controllo intestinale</strong><br>
            <span class="checkbox"></span> 0 - Incontinente &nbsp;&nbsp;
            <span class="checkbox"></span> 1 - Incidenti occasionali &nbsp;&nbsp;
            <span class="checkbox"></span> 2 - Continente
        </div>
        <div class="scale-item">
            <strong>6. Controllo vescicale</strong><br>
            <span class="checkbox"></span> 0 - Incontinente &nbsp;&nbsp;
            <span class="checkbox"></span> 1 - Incidenti occasionali &nbsp;&nbsp;
            <span class="checkbox"></span> 2 - Continente
        </div>
        <div class="scale-item">
            <strong>7. Uso del WC</strong><br>
            <span class="checkbox"></span> 0 - Dipendente &nbsp;&nbsp;
            <span class="checkbox"></span> 1 - Necessita assistenza &nbsp;&nbsp;
            <span class="checkbox"></span> 2 - Indipendente
        </div>
        <div class="scale-item">
            <strong>8. Trasferimento letto-sedia</strong><br>
            <span class="checkbox"></span> 0 - Incapace &nbsp;&nbsp;
            <span class="checkbox"></span> 1 - Assistenza maggiore &nbsp;&nbsp;
            <span class="checkbox"></span> 2 - Assistenza minore &nbsp;&nbsp;
            <span class="checkbox"></span> 3 - Indipendente
        </div>
        <div class="scale-item">
            <strong>9. Mobilità (su superfici piane)</strong><br>
            <span class="checkbox"></span> 0 - Immobile &nbsp;&nbsp;
            <span class="checkbox"></span> 1 - Sedia a rotelle &nbsp;&nbsp;
            <span class="checkbox"></span> 2 - Deambula con aiuto &nbsp;&nbsp;
            <span class="checkbox"></span> 3 - Indipendente
        </div>
        <div class="scale-item">
            <strong>10. Scale</strong><br>
            <span class="checkbox"></span> 0 - Incapace &nbsp;&nbsp;
            <span class="checkbox"></span> 1 - Necessita assistenza &nbsp;&nbsp;
            <span class="checkbox"></span> 2 - Indipendente
        </div>
    `;
  }
  
  if (toolId === 'badl') {
    return `
        <p><em>Valutare ogni attività su scala 0-3: 0=Nessuna difficoltà, 1=Qualche difficoltà, 2=Grande difficoltà, 3=Impossibile</em></p>
        <div class="scale-item">
            <strong>1. Igiene personale</strong> (lavarsi, denti, capelli)<br>
            <span class="checkbox"></span> 0 &nbsp;&nbsp; <span class="checkbox"></span> 1 &nbsp;&nbsp; <span class="checkbox"></span> 2 &nbsp;&nbsp; <span class="checkbox"></span> 3
        </div>
        <div class="scale-item">
            <strong>2. Vestirsi</strong> (indossare e togliere vestiti)<br>
            <span class="checkbox"></span> 0 &nbsp;&nbsp; <span class="checkbox"></span> 1 &nbsp;&nbsp; <span class="checkbox"></span> 2 &nbsp;&nbsp; <span class="checkbox"></span> 3
        </div>
        <div class="scale-item">
            <strong>3. Alimentarsi</strong> (portare il cibo alla bocca)<br>
            <span class="checkbox"></span> 0 &nbsp;&nbsp; <span class="checkbox"></span> 1 &nbsp;&nbsp; <span class="checkbox"></span> 2 &nbsp;&nbsp; <span class="checkbox"></span> 3
        </div>
        <div class="scale-item">
            <strong>4. Trasferimenti</strong> (alzarsi, sedersi, spostarsi)<br>
            <span class="checkbox"></span> 0 &nbsp;&nbsp; <span class="checkbox"></span> 1 &nbsp;&nbsp; <span class="checkbox"></span> 2 &nbsp;&nbsp; <span class="checkbox"></span> 3
        </div>
        <div class="scale-item">
            <strong>5. Mobilità nel letto</strong> (girarsi, alzarsi dal letto)<br>
            <span class="checkbox"></span> 0 &nbsp;&nbsp; <span class="checkbox"></span> 1 &nbsp;&nbsp; <span class="checkbox"></span> 2 &nbsp;&nbsp; <span class="checkbox"></span> 3
        </div>
        <div class="scale-item">
            <strong>6. Controllo sfinterico</strong> (vescica e intestino)<br>
            <span class="checkbox"></span> 0 &nbsp;&nbsp; <span class="checkbox"></span> 1 &nbsp;&nbsp; <span class="checkbox"></span> 2 &nbsp;&nbsp; <span class="checkbox"></span> 3
        </div>
    `;
  }
  
  return '';
}

function saveToLocalStorage(toolId, data) {
  try {
    localStorage.setItem(`performance_${toolId}`, JSON.stringify(data));
  } catch (e) {
    console.warn('Salvataggio non riuscito', e);
  }
}
