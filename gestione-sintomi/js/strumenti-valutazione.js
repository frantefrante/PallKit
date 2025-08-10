// gestione-sintomi/js/strumenti-valutazione.js

// Funzione per caricare contenuti della categoria
function loadCategoryContent(cat) {
  switch (cat) {
    case 'performance':
      return `
    <div class="tools-grid">
      <div class="tool-card tool-card-compact h-100">
        <div class="tool-header">
          <div class="tool-icon-large performance-icon">
            <span class="tool-letters">AK</span>
          </div>
          <div class="tool-info">
            <h4>AKPS</h4>
            <div class="tool-subtitle">Australia-modified Karnofsky Performance Status</div>
          </div>
        </div>
        <div class="tool-description">
          Scala modificata del Karnofsky Performance Status, sviluppata specificamente per pazienti in cure palliative. Valuta il livello funzionale globale del paziente su scala 0-100.
        </div>
        <div class="tool-features">
          <span class="feature-badge">Scala 0-100, 10 livelli funzionali, validata per cure palliative</span>
        </div>
        <div class="tool-actions">
          <button class="btn btn-primary btn-action" onclick="openAKPSCompile()">
            <i class="fas fa-edit me-2"></i>Compila
          </button>
          <button class="btn btn-outline-primary btn-action" onclick="openAKPSVisualize()">
            <i class="fas fa-eye me-2"></i>Visualizza
          </button>
        </div>
      </div>
      <div class="tool-card tool-card-compact h-100">
        <div class="tool-header">
          <div class="tool-icon-large performance-icon">
            <span class="tool-letters">PPS</span>
          </div>
          <div class="tool-info">
            <h4>PPS</h4>
            <div class="tool-subtitle">Palliative Performance Scale</div>
          </div>
        </div>
        <div class="tool-description">
          Strumento multidimensionale che valuta cinque domini funzionali: deambulazione, attività, auto-cura, assunzione cibo e coscienza. Correlazione prognostica validata.
        </div>
        <div class="tool-features">
          <span class="feature-badge">5 domini funzionali: deambulazione, attività, auto-cura, assunzione cibo, coscienza</span>
        </div>
        <div class="tool-actions">
          <button class="btn btn-primary btn-action" onclick="openPPSCompile()">
            <i class="fas fa-edit me-2"></i>Compila
          </button>
          <button class="btn btn-outline-primary btn-action" onclick="openPPSVisualize()">
            <i class="fas fa-eye me-2"></i>Visualizza
          </button>
        </div>
      </div>
      <div class="tool-card tool-card-compact h-100">
        <div class="tool-header">
          <div class="tool-icon-large performance-icon">
            <span class="tool-letters">ADL</span>
          </div>
          <div class="tool-info">
            <h4>ADL</h4>
            <div class="tool-subtitle">Activities of Daily Living (Indice di Barthel)</div>
          </div>
        </div>
        <div class="tool-description">
          Indice di Barthel per valutare l'autonomia nelle attività della vita quotidiana. Strumento gold standard per la valutazione funzionale con 10 domini specifici.
        </div>
        <div class="tool-features">
          <span class="feature-badge">10 attività valutate: alimentazione, bagno, cura personale, vestirsi, controllo sfinterico, mobilità</span>
        </div>
        <div class="tool-actions">
          <button class="btn btn-primary btn-action" onclick="openADLCompile()">
            <i class="fas fa-edit me-2"></i>Compila
          </button>
          <button class="btn btn-outline-primary btn-action" onclick="openADLVisualize()">
            <i class="fas fa-eye me-2"></i>Visualizza
          </button>
        </div>
      </div>
      <div class="tool-card tool-card-compact h-100">
        <div class="tool-header">
          <div class="tool-icon-large performance-icon">
            <span class="tool-letters">BD</span>
          </div>
          <div class="tool-info">
            <h4>BADL</h4>
            <div class="tool-subtitle">Basic Activities of Daily Living</div>
          </div>
        </div>
        <div class="tool-description">
          Valutazione delle attività di base della vita quotidiana con sistema di scoring automatico. Versione semplificata per screening rapido e monitoraggio nel tempo.
        </div>
        <div class="tool-features">
          <span class="feature-badge">6 attività di base: igiene, vestirsi, alimentarsi, trasferimenti, mobilità nel letto, controllo sfinterico</span>
        </div>
        <div class="tool-actions">
          <button class="btn btn-primary btn-action" onclick="openBADLCompile()">
            <i class="fas fa-edit me-2"></i>Compila
          </button>
          <button class="btn btn-outline-primary btn-action" onclick="openBADLVisualize()">
            <i class="fas fa-eye me-2"></i>Visualizza
          </button>
        </div>
      </div>
    </div>
  `;
    default:
      return '';
  }
}

// Funzione di navigazione generica
function navigateToSection(id) {
  const sections = [
    'dashboard-home','gestione-home','sedazione-home',
    'identificazione-home','necpal4-home','spict-home',
    'idcpal-home','ppi-home','ipos-home','performance-home',
    'equianalgesia-section','rescue-section'
  ];
  sections.forEach(secId => {
    const el = document.getElementById(secId);
    if (el) el.style.display = (secId === id) ? 'block' : 'none';
  });
}

// Funzioni Performance per navigazione dai box
function openAKPSCompile() {
  navigateToSection('performance-home');
  setTimeout(() => {
    if (typeof openPerformanceModal === 'function') {
      openPerformanceModal('akps', 'compile');
    }
  }, 100);
}

function openAKPSVisualize() {
  navigateToSection('performance-home');
  setTimeout(() => {
    if (typeof openPerformanceModal === 'function') {
      openPerformanceModal('akps', 'view');
    }
  }, 100);
}

function openPPSCompile() {
  navigateToSection('performance-home');
  setTimeout(() => {
    if (typeof openPerformanceModal === 'function') {
      openPerformanceModal('pps', 'compile');
    }
  }, 100);
}

function openPPSVisualize() {
  navigateToSection('performance-home');
  setTimeout(() => {
    if (typeof openPerformanceModal === 'function') {
      openPerformanceModal('pps', 'view');
    }
  }, 100);
}

function openADLCompile() {
  navigateToSection('performance-home');
  setTimeout(() => {
    if (typeof openPerformanceModal === 'function') {
      openPerformanceModal('adl', 'compile');
    }
  }, 100);
}

function openADLVisualize() {
  navigateToSection('performance-home');
  setTimeout(() => {
    if (typeof openPerformanceModal === 'function') {
      openPerformanceModal('adl', 'view');
    }
  }, 100);
}

function openBADLCompile() {
  navigateToSection('performance-home');
  setTimeout(() => {
    if (typeof openPerformanceModal === 'function') {
      openPerformanceModal('badl', 'compile');
    }
  }, 100);
}

function openBADLVisualize() {
  navigateToSection('performance-home');
  setTimeout(() => {
    if (typeof openPerformanceModal === 'function') {
      openPerformanceModal('badl', 'view');
    }
  }, 100);
}
