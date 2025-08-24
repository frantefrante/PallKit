// js/sedazione-ui.js - CALCOLATORE SEDAZIONE PALLIATIVA SICP 2023
// Interfaccia guidata step-by-step per calcolatore sedazione

document.addEventListener("DOMContentLoaded", () => {
  console.log("🔥 Caricamento Calcolatore Sedazione SICP 2023...");
  
  // Inizializzazione stato calcolatore
  window.sedazioneState = {
    currentStep: 1,
    maxSteps: 6,
    selectedDrug: null,
    selectedPhase: null,
    selectedMode: null,
    selectedRoute: null,
    patientData: {},
    calculationResult: null
  };
  
  initSedazioneCalculator();
});

function initSedazioneCalculator() {
  // Inserisci il calcolatore guidato nel DOM
  const targetDiv = document.getElementById("drug-schema");
  if (!targetDiv) {
    console.error("❌ Elemento drug-schema non trovato");
    return;
  }
  
  // Sostituisci l'interfaccia esistente
  const mainContainer = targetDiv.closest('.row') || targetDiv.parentElement;
  if (mainContainer) {
    mainContainer.innerHTML = createCalculatorHTML();
    setupCalculatorEvents();
    showStep(1);
    console.log("✅ Calcolatore Sedazione SICP 2023 inizializzato");
  }
}

function createCalculatorHTML() {
  return `
  <div class="col-12">
    <div class="calculator-container">
      <!-- Header -->
      <div class="calculator-header mb-4">
        <h3><i class="fas fa-calculator me-2"></i>Calcolatore Sedazione Palliativa</h3>
        <p class="text-muted mb-0">Basato su evidenze cliniche validate per la sedazione palliativa</p>
        
        <!-- Breadcrumb -->
        <nav class="breadcrumb-nav mt-3">
          <ol class="breadcrumb">
            <li class="breadcrumb-item step-1 active">1. Farmaco</li>
            <li class="breadcrumb-item step-2">2. Fase</li>
            <li class="breadcrumb-item step-3">3. Modalità</li>
            <li class="breadcrumb-item step-4">4. Via</li>
            <li class="breadcrumb-item step-5">5. Paziente</li>
            <li class="breadcrumb-item step-6">6. Risultato</li>
          </ol>
          <div class="selected-drug-info" id="selected-drug-info" style="display: none; margin-top: 10px;">
            <small class="text-muted">
              Farmaco selezionato: <strong id="current-drug-name"></strong>
              <a href="#" id="current-drug-table-link" target="_blank" class="ms-2 text-decoration-none">
                <i class="fas fa-table me-1"></i>Tabella Completa
              </a>
            </small>
          </div>
        </nav>
      </div>
      
      <!-- Progresso -->
      <div class="progress mb-4">
        <div class="progress-bar" id="calculator-progress" role="progressbar" style="width: 16.6%"></div>
      </div>
      
      <!-- Step 1: Selezione Farmaco -->
      <div class="step-content" id="step-1">
        <div class="step-card">
          <h4><i class="fas fa-pills me-2"></i>Seleziona Farmaco</h4>
          <div class="drug-selection-grid">
            ${createDrugSelectionHTML()}
          </div>
        </div>
      </div>
      
      <!-- Step 2: Fase -->
      <div class="step-content" id="step-2" style="display: none;">
        <div class="step-card">
          <h4><i class="fas fa-clock me-2"></i>Seleziona Fase</h4>
          <div class="phase-selection">
            <div class="btn-group-vertical w-100" role="group">
              <button type="button" class="btn btn-outline-primary phase-btn" data-phase="induzione">
                <i class="fas fa-play me-2"></i>
                <strong>Induzione</strong>
                <small class="d-block text-muted">Inizio della sedazione</small>
              </button>
              <button type="button" class="btn btn-outline-primary phase-btn" data-phase="mantenimento">
                <i class="fas fa-pause me-2"></i>
                <strong>Mantenimento</strong>
                <small class="d-block text-muted">Mantenimento del livello di sedazione</small>
              </button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Step 3: Modalità -->
      <div class="step-content" id="step-3" style="display: none;">
        <div class="step-card">
          <h4><i class="fas fa-cogs me-2"></i>Seleziona Modalità</h4>
          <div class="mode-selection" id="mode-selection">
            <!-- Popolato dinamicamente -->
          </div>
        </div>
      </div>
      
      <!-- Step 4: Via di Somministrazione -->
      <div class="step-content" id="step-4" style="display: none;">
        <div class="step-card">
          <h4><i class="fas fa-syringe me-2"></i>Seleziona Via di Somministrazione</h4>
          <div class="route-selection" id="route-selection">
            <!-- Popolato dinamicamente -->
          </div>
        </div>
      </div>
      
      <!-- Step 5: Dati Paziente -->
      <div class="step-content" id="step-5" style="display: none;">
        <div class="step-card">
          <h4><i class="fas fa-user me-2"></i>Dati Paziente</h4>
          <form class="patient-form" id="patient-form">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Peso (kg) *</label>
                <input type="number" class="form-control" id="patient-weight" min="1" max="200" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Età (anni) *</label>
                <input type="number" class="form-control" id="patient-age" min="1" max="120" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Funzione Renale</label>
                <select class="form-select" id="patient-renal">
                  <option value="normal">Normale</option>
                  <option value="mild">Lieve compromissione</option>
                  <option value="moderate">Moderata compromissione</option>
                  <option value="severe">Severa compromissione</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Stato Generale</label>
                <select class="form-select" id="patient-condition">
                  <option value="stable">Stabile</option>
                  <option value="unstable">Instabile</option>
                  <option value="critical">Critico</option>
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
      
      <!-- Step 6: Risultato -->
      <div class="step-content" id="step-6" style="display: none;">
        <div class="step-card">
          <h4><i class="fas fa-chart-line me-2"></i>Risultato Calcolato</h4>
          <div class="calculation-result" id="calculation-result">
            <!-- Popolato dinamicamente -->
          </div>
        </div>
      </div>
      
      <!-- Controlli Navigazione -->
      <div class="calculator-controls mt-4">
        <div class="d-flex justify-content-between">
          <button class="btn btn-secondary" id="btn-prev" onclick="previousStep()" style="display: none;">
            <i class="fas fa-arrow-left me-2"></i>Indietro
          </button>
          <div class="flex-grow-1"></div>
          <button class="btn btn-success" id="btn-calculate" onclick="calculateDose()" style="display: none;">
            <i class="fas fa-calculator me-2"></i>Calcola
          </button>
          <button class="btn btn-info" id="btn-add-plan" onclick="addToPlan()" style="display: none;">
            <i class="fas fa-plus me-2"></i>Aggiungi al Piano
          </button>
        </div>
      </div>
      
      <!-- Reset -->
      <div class="mt-3 text-center">
        <button class="btn btn-outline-secondary btn-sm" onclick="resetCalculator()">
          <i class="fas fa-redo me-2"></i>Ricomincia
        </button>
      </div>
    </div>
  </div>
  
  <!-- Elenco Terapie -->
  <div class="mt-4 sedation-table-wrapper" id="sedation-table-wrapper">
    <div class="bg-white p-3 rounded shadow-sm">
      <h6>Piano Sedazione</h6>
      <table class="table table-striped mt-3" id="table-sedazione">
        <thead>
          <tr>
            <th>Farmaco</th>
            <th>Fase</th>
            <th>Via</th>
            <th>Dose</th>
            <th>Note</th>
            <th>Azioni</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>`;
}

function createDrugSelectionHTML() {
  const drugs = window.schemiSedazione.filter(drug => drug.visibile);
  let html = '';
  
  drugs.forEach(drug => {
    const primeScelteBadge = drug.prima_scelta ? '<span class="badge bg-success">Prima Scelta</span>' : '';
    
    html += `
    <div class="drug-card" data-drug="${drug.nome}">
      <div class="drug-header">
        <h5>${drug.nome} ${primeScelteBadge}</h5>
        <span class="drug-class">${drug.classe}</span>
      </div>
      <div class="drug-info">
        <p><strong>Vie:</strong> ${drug.vie.join(', ')}</p>
        <p class="drug-note">${drug.note}</p>
        ${drug.warning ? `<div class="alert alert-warning p-2 small"><i class="fas fa-exclamation-triangle me-2"></i>${drug.warning}</div>` : ''}
        <div class="mt-2">
          <a href="tabelle-farmaci-sedazione.html#${drug.nome.toLowerCase()}" target="_blank" class="btn btn-outline-info btn-sm">
            <i class="fas fa-table me-1"></i>Vedi Tabella Completa
          </a>
        </div>
      </div>
    </div>`;
  });
  
  return html;
}

function setupCalculatorEvents() {
  // Drug selection with auto-navigation
  document.querySelectorAll('.drug-card').forEach(card => {
    card.addEventListener('click', function(e) {
      // Prevent auto-navigation if clicking on table link
      if (e.target.closest('a')) {
        e.stopPropagation();
        return;
      }
      
      document.querySelectorAll('.drug-card').forEach(c => c.classList.remove('selected'));
      this.classList.add('selected');
      window.sedazioneState.selectedDrug = this.dataset.drug;
      
      // Update selected drug info in header
      updateSelectedDrugInfo();
      
      // Auto-navigate to next step
      setTimeout(() => {
        nextStep();
      }, 300);
    });
  });
  
  // Prevent propagation on table links within drug cards
  document.querySelectorAll('.drug-card a').forEach(link => {
    link.addEventListener('click', function(e) {
      e.stopPropagation();
    });
  });
  
  // Phase selection with auto-navigation
  document.querySelectorAll('.phase-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.phase-btn').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      window.sedazioneState.selectedPhase = this.dataset.phase;
      
      // Auto-navigate to next step
      setTimeout(() => {
        nextStep();
      }, 300);
    });
  });
  
  // Patient form validation with real-time feedback
  const patientForm = document.getElementById('patient-form');
  if (patientForm) {
    patientForm.addEventListener('input', function(e) {
      validatePatientInput(e.target);
      updateCalculateButton();
    });
  }
  
  window.terapieSed = window.terapieSed || [];
  renderSedTable();
}

function showStep(stepNumber) {
  // Pulisci warning e validazioni precedenti quando cambi step
  document.querySelectorAll('.text-warning, .invalid-feedback').forEach(el => el.remove());
  document.querySelectorAll('input').forEach(input => {
    input.classList.remove('is-invalid', 'is-valid');
  });
  
  // Nascondi tutti gli step
  document.querySelectorAll('.step-content').forEach(step => {
    step.style.display = 'none';
  });
  
  // Mostra step corrente
  document.getElementById(`step-${stepNumber}`).style.display = 'block';
  
  // Aggiorna breadcrumb
  document.querySelectorAll('.breadcrumb-item').forEach((item, index) => {
    item.classList.toggle('active', index + 1 === stepNumber);
  });
  
  // Aggiorna progress bar
  const progress = (stepNumber / window.sedazioneState.maxSteps) * 100;
  document.getElementById('calculator-progress').style.width = `${progress}%`;
  
  // Aggiorna stato
  window.sedazioneState.currentStep = stepNumber;
  updateNavigationButtons();
  
  // Popola contenuto dinamico per step specifici
  if (stepNumber === 2) {
    populatePhaseSelection();
  } else if (stepNumber === 3) {
    populateModeSelection();
  } else if (stepNumber === 4) {
    populateRouteSelection();
  }
}

function populatePhaseSelection() {
  const drug = window.schemiSedazione.find(d => d.nome === window.sedazioneState.selectedDrug);
  const container = document.querySelector('#step-2 .phase-selection .btn-group-vertical');
  
  if (!drug) {
    container.innerHTML = '<p class="text-danger">Farmaco non selezionato.</p>';
    return;
  }
  
  let html = '';
  
  // Controlla se induzione è disponibile
  if (drug.induzione && Object.keys(drug.induzione).length > 0) {
    html += `
      <button type="button" class="btn btn-outline-primary phase-btn" data-phase="induzione">
        <i class="fas fa-play me-2"></i>
        <strong>Induzione</strong>
        <small class="d-block text-muted">Inizio della sedazione</small>
      </button>
    `;
  }
  
  // Controlla se mantenimento è disponibile
  if (drug.mantenimento && Object.keys(drug.mantenimento).length > 0) {
    html += `
      <button type="button" class="btn btn-outline-primary phase-btn" data-phase="mantenimento">
        <i class="fas fa-pause me-2"></i>
        <strong>Mantenimento</strong>
        <small class="d-block text-muted">Mantenimento del livello di sedazione</small>
      </button>
    `;
  }
  
  if (html === '') {
    container.innerHTML = `<div class="alert alert-warning">
      <i class="fas fa-exclamation-triangle me-2"></i>
      <strong>Nessuna fase disponibile</strong><br>
      Il farmaco ${drug.nome} non ha dati disponibili per nessuna fase.
      <div class="mt-2">
        <button class="btn btn-outline-secondary btn-sm" onclick="previousStep()">
          <i class="fas fa-arrow-left me-1"></i>Cambia Farmaco
        </button>
      </div>
    </div>`;
    return;
  }
  
  container.innerHTML = html;
  
  // Re-aggiungi event listeners
  document.querySelectorAll('.phase-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.phase-btn').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      window.sedazioneState.selectedPhase = this.dataset.phase;
      
      // Auto-navigate to next step
      setTimeout(() => {
        nextStep();
      }, 300);
    });
  });
}

function populateModeSelection() {
  const drug = window.schemiSedazione.find(d => d.nome === window.sedazioneState.selectedDrug);
  const phase = window.sedazioneState.selectedPhase;
  const container = document.getElementById('mode-selection');
  
  if (!drug || !phase || !drug[phase]) {
    container.innerHTML = '<p class="text-danger">Nessuna modalità disponibile per questa combinazione.</p>';
    return;
  }
  
  let html = '<div class="btn-group-vertical w-100" role="group">';
  
  // Modalità disponibili in base alla fase
  const modes = Object.keys(drug[phase]);
  
  modes.forEach(mode => {
    const modeData = drug[phase][mode];
    if (typeof modeData === 'object' && Object.keys(modeData).length > 0) {
      let description = '';
      switch(mode) {
        case 'bolo':
          description = 'Somministrazione singola rapida';
          break;
        case 'bolo_refratto':
          description = 'Boli ripetuti fino al livello desiderato';
          break;
        case 'infusione':
          description = 'Infusione continua endovenosa';
          break;
        case 'boli_fissi':
          description = 'Boli a intervalli regolari';
          break;
        case 'rescue':
          description = 'Dose di soccorso per breakthrough';
          break;
      }
      
      html += `
      <button type="button" class="btn btn-outline-primary mode-btn" data-mode="${mode}">
        <strong>${mode.replace('_', ' ').toUpperCase()}</strong>
        <small class="d-block text-muted">${description}</small>
      </button>`;
    }
  });
  
  html += '</div>';
  container.innerHTML = html;
  
  // Aggiungi event listeners con auto-navigation
  document.querySelectorAll('.mode-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.mode-btn').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      window.sedazioneState.selectedMode = this.dataset.mode;
      
      // Auto-navigate to next step
      setTimeout(() => {
        nextStep();
      }, 300);
    });
  });
}

function populateRouteSelection() {
  const drug = window.schemiSedazione.find(d => d.nome === window.sedazioneState.selectedDrug);
  const phase = window.sedazioneState.selectedPhase;
  const mode = window.sedazioneState.selectedMode;
  const container = document.getElementById('route-selection');
  
  if (!drug || !drug.vie) {
    container.innerHTML = '<p class="text-danger">Nessuna via disponibile.</p>';
    return;
  }
  
  // Filtra le vie in base alla modalità selezionata
  const modeData = drug[phase] && drug[phase][mode];
  let availableRoutes = drug.vie;
  
  if (modeData && modeData.vie) {
    // Se la modalità ha vie specifiche definite, usa quelle
    if (typeof modeData.vie === 'object' && !Array.isArray(modeData.vie)) {
      // Oggetto con chiavi per ogni via (es. {EV: {onset: "..."}, SC: {...}})
      availableRoutes = drug.vie.filter(via => modeData.vie[via]);
    } else if (Array.isArray(modeData.vie)) {
      // Array di vie (es. ["SC", "EV"])
      availableRoutes = drug.vie.filter(via => modeData.vie.includes(via));
    }
  } else if (modeData && Object.keys(modeData).some(key => drug.vie.includes(key))) {
    // Se la modalità ha dosi specifiche per via (es. bolo_refratto: {EV: {...}, SC: {...}})
    availableRoutes = drug.vie.filter(via => modeData[via]);
  } else {
    // Se non ci sono restrizioni specifiche, usa tutte le vie del farmaco
    availableRoutes = drug.vie;
  }
  
  if (availableRoutes.length === 0) {
    container.innerHTML = `<div class="alert alert-warning">
      <i class="fas fa-exclamation-triangle me-2"></i>
      <strong>Nessuna via di somministrazione disponibile</strong><br>
      La modalità "${translateMode(mode)}" non supporta nessuna delle vie disponibili per ${drug.nome}.
      <div class="mt-2">
        <button class="btn btn-outline-secondary btn-sm" onclick="previousStep()">
          <i class="fas fa-arrow-left me-1"></i>Cambia Modalità
        </button>
      </div>
    </div>`;
    return;
  }
  
  let html = '<div class="btn-group-vertical w-100" role="group">';
  
  availableRoutes.forEach(via => {
    let description = '';
    switch(via) {
      case 'EV':
        description = 'Endovenosa - rapida, controllabile';
        break;
      case 'IV':
        description = 'Intravenosa - rapida, controllabile';
        break;
      case 'SC':
        description = 'Sottocutanea - più lenta, continua';
        break;
      case 'IM':
        description = 'Intramuscolare - intermedia';
        break;
    }
    
    html += `
    <button type="button" class="btn btn-outline-primary route-btn" data-route="${via}">
      <strong>${via}</strong>
      <small class="d-block text-muted">${description}</small>
    </button>`;
  });
  
  html += '</div>';
  container.innerHTML = html;
  
  // Aggiungi event listeners con auto-navigation
  document.querySelectorAll('.route-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.route-btn').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      window.sedazioneState.selectedRoute = this.dataset.route;
      
      // Auto-navigate to next step
      setTimeout(() => {
        nextStep();
      }, 300);
    });
  });
}

function updateNextButton() {
  const nextBtn = document.getElementById('btn-next');
  const currentStep = window.sedazioneState.currentStep;
  let canProceed = false;
  
  switch(currentStep) {
    case 1:
      canProceed = !!window.sedazioneState.selectedDrug;
      break;
    case 2:
      canProceed = !!window.sedazioneState.selectedPhase;
      break;
    case 3:
      canProceed = !!window.sedazioneState.selectedMode;
      break;
    case 4:
      canProceed = !!window.sedazioneState.selectedRoute;
      break;
  }
  
  nextBtn.disabled = !canProceed;
}

function validatePatientInput(input) {
  const value = parseFloat(input.value);
  const fieldId = input.id;
  let isValid = true;
  let message = '';
  
  // Rimuovi validazione precedente
  input.classList.remove('is-invalid', 'is-valid');
  const existingFeedback = input.parentNode.querySelector('.invalid-feedback');
  if (existingFeedback) existingFeedback.remove();
  
  // Rimuovi anche i warning precedenti
  const existingWarnings = input.parentNode.querySelectorAll('.text-warning');
  existingWarnings.forEach(warning => warning.remove());
  
  switch(fieldId) {
    case 'patient-weight':
      if (value < 1 || value > 200) {
        isValid = false;
        message = 'Il peso deve essere compreso tra 1 e 200 kg';
      }
      break;
      
    case 'patient-age':
      if (value < 1 || value > 120) {
        isValid = false;
        message = 'L\'età deve essere compresa tra 1 e 120 anni';
      } else if (value > 75) {
        message = 'Paziente anziano: valutare attentamente il dosaggio secondo giudizio clinico';
        showWarning(input, message);
      }
      break;
  }
  
  if (!isValid) {
    input.classList.add('is-invalid');
    const feedback = document.createElement('div');
    feedback.className = 'invalid-feedback';
    feedback.textContent = message;
    input.parentNode.appendChild(feedback);
  } else if (input.value) {
    input.classList.add('is-valid');
  }
  
  return isValid;
}

function showWarning(input, message) {
  const warning = document.createElement('div');
  warning.className = 'text-warning small mt-1';
  warning.innerHTML = `<i class="fas fa-exclamation-triangle me-1"></i>${message}`;
  input.parentNode.appendChild(warning);
}

function updateCalculateButton() {
  const weight = document.getElementById('patient-weight');
  const age = document.getElementById('patient-age');
  const calculateBtn = document.getElementById('btn-calculate');
  
  const weightValid = weight.value && validatePatientInput(weight);
  const ageValid = age.value && validatePatientInput(age);
  
  calculateBtn.disabled = !weightValid || !ageValid;
}

function updateNavigationButtons() {
  const prevBtn = document.getElementById('btn-prev');
  const calculateBtn = document.getElementById('btn-calculate');
  const addBtn = document.getElementById('btn-add-plan');
  
  const currentStep = window.sedazioneState.currentStep;
  
  // Mostra indietro solo se non siamo al primo step
  prevBtn.style.display = currentStep === 1 ? 'none' : 'inline-block';
  
  if (currentStep === 5) {
    calculateBtn.style.display = 'inline-block';
    addBtn.style.display = 'none';
  } else if (currentStep === 6) {
    calculateBtn.style.display = 'none';
    addBtn.style.display = 'inline-block';
  } else {
    calculateBtn.style.display = 'none';
    addBtn.style.display = 'none';
  }
}

function nextStep() {
  if (window.sedazioneState.currentStep < window.sedazioneState.maxSteps) {
    showStep(window.sedazioneState.currentStep + 1);
  }
}

function previousStep() {
  if (window.sedazioneState.currentStep > 1) {
    showStep(window.sedazioneState.currentStep - 1);
  }
}

function calculateDose() {
  // Raccogli dati paziente
  const weight = parseFloat(document.getElementById('patient-weight').value);
  const age = parseInt(document.getElementById('patient-age').value);
  const renalFunction = document.getElementById('patient-renal').value;
  const condition = document.getElementById('patient-condition').value;
  
  window.sedazioneState.patientData = { weight, age, renalFunction, condition };
  
  // Trova farmaco e calcola dosaggio
  const drug = window.schemiSedazione.find(d => d.nome === window.sedazioneState.selectedDrug);
  const phase = window.sedazioneState.selectedPhase;
  const mode = window.sedazioneState.selectedMode;
  const route = window.sedazioneState.selectedRoute;
  
  const result = performCalculation(drug, phase, mode, route, window.sedazioneState.patientData);
  window.sedazioneState.calculationResult = result;
  
  // Mostra risultato
  displayResult(result);
  showStep(6);
}

function performCalculation(drug, phase, mode, route, patientData) {
  const modeData = drug[phase][mode];
  const calculator = window.sedazioneCalculator;
  
  let result = {
    farmaco: drug.nome,
    classe: drug.classe,
    fase: phase,
    modalita: mode,
    via: route,
    doseOriginale: null,
    doseAggiustata: null,
    note: drug.note,
    warning: drug.warning,
    onset: null,
    aggiustamenti: [],
    alerts: [],
    controindicazioni: []
  };
  
  // Controlli di sicurezza pre-calcolo
  const safetyChecks = performSafetyChecks(drug, route, patientData);
  result.alerts = safetyChecks.alerts;
  result.controindicazioni = safetyChecks.controindicazioni;
  
  // Calcolo dose base - PREFERIRE SEMPRE il calcolo weight-based quando disponibile
  if (modeData.dose_kg) {
    const weightDose = calculator.calculateWeightBasedDose(modeData.dose_kg, patientData.weight);
    const unita = modeData.unita || 'mg';
    result.doseOriginale = `${weightDose.min}-${weightDose.max} ${unita} (${modeData.dose_kg} per ${patientData.weight}kg)`;
    
    // Aggiungi esempio di riferimento se presente
    if (modeData.esempio_70kg) {
      result.doseEsempio = `Esempio 70kg: ${modeData.esempio_70kg}`;
    }
    
  } else if (modeData.dose) {
    const doseRange = calculator.parseDoseRange(modeData.dose);
    if (doseRange) {
      const unita = modeData.unita || 'mg';
      result.doseOriginale = `${doseRange.min}-${doseRange.max} ${unita}`;
    }
  } else if (modeData[route]) {
    // Dose specifica per via (es. bolo_refratto)
    const routeData = modeData[route];
    if (routeData.dose) {
      result.doseOriginale = routeData.dose;
    }
  }
  
  // Aggiustamenti basati sulle Linee Guida SICP 2023
  let adjustmentFactor = 1;
  
  // Le Linee Guida SICP 2023 non specificano aggiustamenti posologici standardizzati
  // I parametri del paziente servono per le note cliniche e gli alert di sicurezza
  
  // Note: Le Linee Guida SICP 2023 non specificano aggiustamenti standardizzati per età o peso
  // Gli aggiustamenti devono essere valutati caso per caso dal medico
  
  // Dose aggiustata
  if (result.doseOriginale && adjustmentFactor !== 1) {
    const originalRange = calculator.parseDoseRange(result.doseOriginale);
    if (originalRange) {
      const adjustedMin = (originalRange.min * adjustmentFactor).toFixed(2);
      const adjustedMax = (originalRange.max * adjustmentFactor).toFixed(2);
      result.doseAggiustata = `${adjustedMin}-${adjustedMax} mg`;
    }
  }
  
  // Onset
  if (modeData.vie && modeData.vie[route] && modeData.vie[route].onset) {
    result.onset = modeData.vie[route].onset;
  }
  
  // Aggiunge note cliniche specifiche per compromissione renale
  addRenalNotes(result, drug, patientData);
  
  return result;
}

function addRenalNotes(result, drug, patientData) {
  if (patientData.renalFunction === 'normal') return;
  
  const renalNotes = {
    'Midazolam': {
      'mild': 'Compromissione renale lieve: generalmente non richiede aggiustamenti, ma monitorare per accumulo di metaboliti attivi.',
      'moderate': 'Compromissione renale moderata: ridurre dose del 25% per rischio accumulo di metaboliti attivi (1-OH-midazolam).',
      'severe': 'Compromissione renale severa: ridurre dose del 50%. I metaboliti attivi si accumulano significativamente.'
    },
    'Lorazepam': {
      'mild': 'Compromissione renale lieve: monitorare per sedazione prolungata.',
      'moderate': 'Compromissione renale moderata: considerare riduzione dose 25% se clearance <30 ml/min.',
      'severe': 'Compromissione renale severa: ridurre dose 50%. Eliminazione predominantemente renale.'
    },
    'Diazepam': {
      'mild': 'Compromissione renale lieve: monitorare accumulo metaboliti attivi (desmetildiazepam).',
      'moderate': 'Compromissione renale moderata: ridurre dose 25% per accumulo metaboliti a lunga emivita.',
      'severe': 'Compromissione renale severa: ridurre dose 50%. Metaboliti attivi con emivita >100h.'
    },
    'Clorpromazina': {
      'mild': 'Compromissione renale lieve: monitorare effetti extrapiramidali.',
      'moderate': 'Compromissione renale moderata: attenzione a ipotensione e sedazione prolungata.',
      'severe': 'Compromissione renale severa: monitoraggio intensivo. Ridotta clearance di metaboliti attivi.'
    },
    'Aloperidolo': {
      'mild': 'Compromissione renale lieve: monitorare QT e funzione cardiaca.',
      'moderate': 'Compromissione renale moderata: attenzione ad aritmie e sedazione prolungata.',
      'severe': 'Compromissione renale severa: evitare se possibile. Alto rischio aritmie ventricolari.'
    },
    'Morfina': {
      'mild': 'Compromissione renale lieve: monitorare sedazione per accumulo morfina-6-glucuronide.',
      'moderate': 'Compromissione renale moderata: ridurre dose 25-50%. Metaboliti attivi neurotossici.',
      'severe': 'Compromissione renale severa: controindicata o ridurre >75%. Alto rischio mioclono e convulsioni.'
    }
  };
  
  const drugNotes = renalNotes[drug.nome];
  if (drugNotes && drugNotes[patientData.renalFunction]) {
    result.alerts.push(`💡 NOTA CLINICA: ${drugNotes[patientData.renalFunction]}`);
  }
}

function performSafetyChecks(drug, route, patientData) {
  const alerts = [];
  const controindicazioni = [];
  
  // Controlli specifici per farmaco
  switch(drug.nome) {
    case 'Aloperidolo':
      if (route === 'IV') {
        controindicazioni.push('ATTENZIONE: Aloperidolo EV controindicato in scheda tecnica per rischio aritmie ventricolari');
      }
      break;
      
    case 'Diazepam':
      if (route === 'SC') {
        controindicazioni.push('ERRORE: Diazepam non indicato per via sottocutanea secondo Linee Guida SICP 2023');
      }
      break;
      
    case 'Morfina':
      alerts.push('IMPORTANTE: Morfina non da utilizzare a scopo sedativo - sempre associare a benzodiazepina/sedativo');
      break;
      
    case 'Clorpromazina':
      if (route === 'IV') {
        alerts.push('ATTENZIONE: Clorpromazina EV deve essere infusa lentamente');
      }
      break;
      
    case 'Lorazepam':
      if (route === 'IV') {
        alerts.push('ATTENZIONE: Lorazepam EV infondere massimo 2 mg/minuto');
      }
      break;
  }
  
  // Controlli età paziente
  if (patientData.age < 18) {
    alerts.push('PEDIATRICO: Dosaggi pediatrici non implementati nelle Linee Guida SICP 2023 - consultare letteratura specifica');
  }
  
  if (patientData.age > 85) {
    alerts.push('ANZIANO FRAGILE: Età > 85 anni - considerare ulteriore riduzione oltre al 25% automatico');
  }
  
  // Controlli peso paziente
  if (patientData.weight < 10) {
    alerts.push('PESO CRITICO: Peso < 10 kg - verificare dosaggi pediatrici specifici');
  }
  
  if (patientData.weight > 120) {
    alerts.push('OBESITÀ: Peso > 120 kg - considerare dosaggio basato su peso ideale');
  }
  
  // Controlli funzione renale e condizione
  if (patientData.renalFunction === 'severe' && patientData.condition === 'critical') {
    alerts.push('ALTA COMPLESSITÀ: Insufficienza renale severa + stato critico - monitoraggio intensivo necessario');
  }
  
  return { alerts, controindicazioni };
}

function updateSelectedDrugInfo() {
  const drugInfo = document.getElementById('selected-drug-info');
  const drugName = document.getElementById('current-drug-name');
  const drugLink = document.getElementById('current-drug-table-link');
  
  if (window.sedazioneState.selectedDrug) {
    drugName.textContent = window.sedazioneState.selectedDrug;
    drugLink.href = `tabelle-farmaci-sedazione.html#${window.sedazioneState.selectedDrug.toLowerCase()}`;
    drugInfo.style.display = 'block';
  } else {
    drugInfo.style.display = 'none';
  }
}

function displayResult(result) {
  const container = document.getElementById('calculation-result');
  
  // Blocca se ci sono controindicazioni
  if (result.controindicazioni.length > 0) {
    container.innerHTML = `
    <div class="alert alert-danger">
      <h5><i class="fas fa-ban me-2"></i>CONTROINDICAZIONE</h5>
      ${result.controindicazioni.map(c => `<p class="mb-1"><strong>${c}</strong></p>`).join('')}
      <hr>
      <p class="mb-0">Non è possibile procedere con questa combinazione secondo le Linee Guida SICP 2023.</p>
    </div>
    <div class="text-center">
      <button class="btn btn-secondary" onclick="previousStep()">
        <i class="fas fa-arrow-left me-2"></i>Torna Indietro
      </button>
    </div>`;
    return;
  }
  
  const doseFinale = result.doseAggiustata || result.doseOriginale;
  const aggiustamentiHtml = result.aggiustamenti.length > 0 ? 
    `<div class="alert alert-info">
      <strong>Aggiustamenti applicati:</strong>
      <ul class="mb-0">${result.aggiustamenti.map(a => `<li>${a}</li>`).join('')}</ul>
    </div>` : '';
  
  const alertsHtml = result.alerts.length > 0 ? 
    `<div class="alert alert-warning">
      <h6><i class="fas fa-exclamation-triangle me-2"></i>Alert Clinici</h6>
      ${result.alerts.map(a => `<p class="mb-1">${a}</p>`).join('')}
    </div>` : '';
  
  const warningHtml = result.warning ? 
    `<div class="alert alert-warning">
      <i class="fas fa-exclamation-triangle me-2"></i><strong>Linee Guida SICP 2023:</strong> ${result.warning}
    </div>` : '';
  
  container.innerHTML = `
  <div class="result-summary">
    <div class="row">
      <div class="col-md-6">
        <h5>Prescrizione Calcolata</h5>
        <table class="table table-bordered">
          <tr><td><strong>Farmaco</strong></td><td>${result.farmaco} (${result.classe})</td></tr>
          <tr><td><strong>Fase</strong></td><td>${result.fase}</td></tr>
          <tr><td><strong>Modalità</strong></td><td>${result.modalita.replace('_', ' ')}</td></tr>
          <tr><td><strong>Via</strong></td><td>${result.via}</td></tr>
          <tr><td><strong>Dose</strong></td><td class="text-primary"><strong>${doseFinale}</strong></td></tr>
          ${result.doseEsempio ? `<tr><td><strong>Riferimento</strong></td><td class="text-muted small">${result.doseEsempio}</td></tr>` : ''}
          ${result.onset ? `<tr><td><strong>Onset</strong></td><td>${result.onset}</td></tr>` : ''}
        </table>
      </div>
      <div class="col-md-6">
        <h5>Paziente</h5>
        <table class="table table-bordered">
          <tr><td><strong>Peso</strong></td><td>${window.sedazioneState.patientData.weight} kg</td></tr>
          <tr><td><strong>Età</strong></td><td>${window.sedazioneState.patientData.age} anni</td></tr>
          <tr><td><strong>Funzione Renale</strong></td><td>${translatePatientData(window.sedazioneState.patientData).renalFunction}</td></tr>
          <tr><td><strong>Stato</strong></td><td>${translatePatientData(window.sedazioneState.patientData).condition}</td></tr>
        </table>
      </div>
    </div>
    
    ${alertsHtml}
    ${aggiustamentiHtml}
    ${warningHtml}
    
    <div class="alert alert-success">
      <i class="fas fa-info-circle me-2"></i><strong>Note cliniche SICP 2023:</strong> ${result.note}
    </div>
    
    <div class="alert alert-light border">
      <h6><i class="fas fa-clipboard-list me-2"></i>Interpretazione dei Dosaggi SICP 2023</h6>
      <div class="small">
        <p class="mb-2"><strong>Importante:</strong></p>
        <ul class="mb-2">
          <li>I valori riportati come <strong>dosi medie</strong> sono da intendersi come dosi comunemente somministrate e riportate in letteratura</li>
          <li>Le dosi riportate come <strong>"minime-massime"</strong> non devono intendersi come valori assoluti o range tra valore «minimo e massimo»</li>
          <li>I range rappresentano <strong>«dosi medie-minime e dosi medie-massime»</strong> desunte dalla letteratura analizzata</li>
          <li>Ogni dosaggio deve essere <strong>individualizzato</strong> secondo risposta clinica del paziente</li>
        </ul>
      </div>
    </div>
    
    <div class="alert alert-light border">
      <small><strong>Disclaimer:</strong> Questo calcolatore implementa le Linee Guida SICP 2023. I dosaggi sono indicativi e devono essere sempre valutati dal medico in base al quadro clinico specifico del paziente.</small>
    </div>
  </div>`;
}

function addToPlan() {
  const result = window.sedazioneState.calculationResult;
  if (!result) return;
  
  const therapy = {
    farmaco: result.farmaco,
    fase: result.fase,
    via: result.via,
    dose: result.doseAggiustata || result.doseOriginale,
    note: `${result.modalita} - ${result.onset ? 'Onset: ' + result.onset : ''}`
  };
  
  window.terapieSed.push(therapy);
  renderSedTable();
  
  // Conferma
  alert(`${result.farmaco} aggiunto al piano sedazione!`);
}

function renderSedTable() {
  const tbody = document.querySelector("#table-sedazione tbody");
  if (!tbody) return;
  
  tbody.innerHTML = "";
  window.terapieSed.forEach((t, i) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${t.farmaco}</td>
      <td>${t.fase}</td>
      <td>${t.via}</td>
      <td><strong>${t.dose}</strong></td>
      <td><small>${t.note}</small></td>
      <td>
        <button class="btn btn-sm btn-danger del-sed-btn" data-i="${i}">
          <i class="fas fa-trash"></i>
        </button>
      </td>`;
    tbody.appendChild(tr);
  });
  
  // Event listeners per eliminazione
  tbody.querySelectorAll('.del-sed-btn').forEach(btn => {
    btn.onclick = e => {
      const index = parseInt(e.currentTarget.dataset.i);
      window.terapieSed.splice(index, 1);
      renderSedTable();
    };
  });
}

function resetCalculator() {
  if (confirm('Sei sicuro di voler ricominciare? Tutti i dati inseriti andranno persi.')) {
    window.sedazioneState = {
      currentStep: 1,
      maxSteps: 6,
      selectedDrug: null,
      selectedPhase: null,
      selectedMode: null,
      selectedRoute: null,
      patientData: {},
      calculationResult: null
    };
    
    // Pulisci completamente warning e validazioni
    document.querySelectorAll('.text-warning, .invalid-feedback').forEach(el => el.remove());
    
    // Reset form
    const patientForm = document.getElementById('patient-form');
    if (patientForm) patientForm.reset();
    
    // Reset selections
    document.querySelectorAll('.selected, .active').forEach(el => {
      el.classList.remove('selected', 'active');
    });
    
    // Reset input states
    document.querySelectorAll('input, select').forEach(input => {
      input.classList.remove('is-invalid', 'is-valid');
    });
    
    // Hide drug info
    updateSelectedDrugInfo();
    
    showStep(1);
  }
}

// Funzioni di traduzione per messaggi di errore
function translatePhase(phase) {
  const translations = {
    'induzione': 'induzione',
    'mantenimento': 'mantenimento'
  };
  return translations[phase] || phase;
}

function translateMode(mode) {
  const translations = {
    'bolo': 'bolo',
    'bolo_refratto': 'bolo refratto',
    'infusione': 'infusione continua',
    'boli_fissi': 'boli fissi',
    'rescue': 'rescue'
  };
  return translations[mode] || mode;
}

function translatePatientData(patientData) {
  const renalTranslations = {
    'normal': 'normale',
    'mild': 'lieve compromissione',
    'moderate': 'moderata compromissione', 
    'severe': 'severa compromissione'
  };
  
  const conditionTranslations = {
    'stable': 'stabile',
    'unstable': 'instabile',
    'critical': 'critico'
  };
  
  return {
    ...patientData,
    renalFunction: renalTranslations[patientData.renalFunction] || patientData.renalFunction,
    condition: conditionTranslations[patientData.condition] || patientData.condition
  };
}

// Export functions for global access
window.nextStep = nextStep;
window.previousStep = previousStep;
window.calculateDose = calculateDose;
window.addToPlan = addToPlan;
window.resetCalculator = resetCalculator;