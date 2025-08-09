function openCategoryView(categoryName) {
  const categoriesGrid = document.querySelector('.categories-grid');
  const categoryDetails = document.getElementById('categoryDetails');
  const backButton = document.getElementById('backToCategories');
  const searchBar = document.querySelector('.search-tools-compact');
  const statsRow = document.querySelector('.stats-row');
  if (categoriesGrid) categoriesGrid.style.display = 'none';
  if (searchBar) searchBar.style.display = 'none';
  if (statsRow) statsRow.style.display = 'none';
  if (backButton) backButton.style.display = 'block';
  loadCategoryContent(categoryName);
  if (categoryDetails) categoryDetails.style.display = 'block';
}

function showCategories() {
  const categoriesGrid = document.querySelector('.categories-grid');
  const categoryDetails = document.getElementById('categoryDetails');
  const backButton = document.getElementById('backToCategories');
  const searchBar = document.querySelector('.search-tools-compact');
  const statsRow = document.querySelector('.stats-row');
  if (categoriesGrid) categoriesGrid.style.display = 'grid';
  if (searchBar) searchBar.style.display = 'block';
  if (statsRow) statsRow.style.display = 'block';
  if (categoryDetails) categoryDetails.style.display = 'none';
  if (backButton) backButton.style.display = 'none';
}

function loadCategoryContent(categoryName) {
  const categoryDetails = document.getElementById('categoryDetails');
  const categoryData = {
    'identificazione': {
      title: 'Strumenti di Identificazione',
      icon: '🔍',
      description: 'Strumenti per identificare pazienti eleggibili per cure palliative',
      tools: [
        { name: 'NECPAL 3.1', subtitle: 'Necessidades Paliativas', description: 'Strumento di screening per identificare pazienti con bisogni palliativi. Versione 3.1 con criteri aggiornati.', available: false },
        { name: 'NECPAL 4.0', subtitle: 'Versione Aggiornata', description: 'Ultima versione del NECPAL con criteri rivisti e maggiore specificità per diverse patologie.', available: false },
        { name: 'SPICT', subtitle: 'Supportive & Palliative Care Indicators', description: 'Tool clinico per identificare pazienti che potrebbero beneficiare di cure palliative specialistiche.', available: false }
      ]
    },
    'complessita': {
      title: 'Valutazione Complessità',
      icon: '🧠',
      description: 'Valutazione della complessità clinica e assistenziale',
      tools: [
        { 
          name: 'IDC-PAL', 
          subtitle: 'Instrumento Diagnóstico de Complejidad', 
          description: 'Strumento per valutare la complessità multidimensionale nei pazienti in cure palliative attraverso 34 elementi in 3 dimensioni.', 
          available: true, 
          actions: [
            { name: 'Compila', action: 'openIDCPALCompile()', icon: 'fas fa-edit', class: 'btn-success' },
            { name: 'Visualizza', action: 'openIDCPALVisualize()', icon: 'fas fa-table', class: 'btn-primary' },
            { name: 'Glossario', action: 'openIDCPALGlossary()', icon: 'fas fa-book', class: 'btn-warning' }
          ]
        }
      ]
    },
    'performance': {
      title: 'Scale di Performance',
      icon: '🏃',
      description: 'Scale di valutazione funzionale e performance status',
      tools: [
        { name: 'AKPS', subtitle: 'Australia-modified Karnofsky', description: 'Scala modificata del Karnofsky Performance Status, sviluppata specificamente per le cure palliative.', available: true, action: 'openPerfModal("akps")' },
        { name: 'PPS', subtitle: 'Palliative Performance Scale', description: 'Strumento multidimensionale che valuta cinque domini funzionali con valore prognostico.', available: true, action: 'openPerfModal("pps")' },
        { name: 'ADL', subtitle: 'Activities of Daily Living', description: 'Indice di Barthel per valutare l\'autonomia nelle attività della vita quotidiana.', available: true, action: 'openPerfModal("adl")' },
        { name: 'BADL', subtitle: 'Basic Activities of Daily Living', description: 'Valutazione delle attività di base della vita quotidiana con sistema di scoring automatico.', available: true, action: 'openPerfModal("badl")' }
      ]
    },
    'prognosi': {
      title: 'Strumenti Prognostici',
      icon: '📈',
      description: 'Strumenti per la valutazione prognostica',
      tools: [
        { name: 'PPI', subtitle: 'Palliative Prognostic Index', description: 'Indice prognostico per predire la sopravvivenza a 3 e 6 settimane in pazienti oncologici.', available: false },
        { name: 'PaP Score', subtitle: 'Palliative Prognostic Score', description: 'Score prognostico che combina parametri clinici e di laboratorio per la predizione di sopravvivenza.', available: false }
      ]
    },
    'multidimensionale': {
      title: 'Valutazione Multidimensionale',
      icon: '📋',
      description: 'Strumenti per assessment olistico del paziente',
      tools: [
        { name: 'IPOS', subtitle: 'Integrated Palliative care Outcome Scale', description: 'Scala integrata per la valutazione multidimensionale di outcome in cure palliative.', available: true, action: 'navigateToSection("ipos-home")' },
        { name: 'ESAS', subtitle: 'Edmonton Symptom Assessment System', description: 'Sistema di valutazione rapida dei sintomi più comuni in cure palliative.', available: true, action: 'openESASCompile()' }
      ]
    },
    'dolore': {
      title: 'Valutazione del Dolore',
      icon: '😣',
      description: 'Strumenti specializzati per la valutazione del dolore',
      tools: [
        { name: 'DN4', subtitle: 'Douleur Neuropathique en 4 questions', description: 'Questionario per lo screening del dolore neuropatico in 4 domande.', available: false }
      ]
    },
    'delirium': {
      title: 'Assessment Delirium',
      icon: '🧩',
      description: 'Strumenti per assessment e screening del delirium',
      tools: [
        { name: '4AT', subtitle: "4 'A's Test", description: 'Strumento rapido di screening per delirium e deterioramento cognitivo.', available: false },
        { name: 'CAM', subtitle: 'Confusion Assessment Method', description: 'Metodo standard per la diagnosi di delirium validato in ambito clinico.', available: false }
      ]
    },
    'sedazione': {
      title: 'Scale di Sedazione',
      icon: '💤',
      description: 'Scale per monitoraggio del livello di sedazione',
      tools: [
        { name: 'RASS', subtitle: 'Richmond Agitation-Sedation Scale', description: 'Scala per valutare il livello di agitazione e sedazione del paziente.', available: false },
        { name: 'Ramsey', subtitle: 'Ramsey Sedation Scale', description: 'Scala classica per la valutazione del livello di sedazione in 6 livelli.', available: false }
      ]
    },
    'caregiving': {
      title: 'Valutazione Caregiving',
      icon: '👥',
      description: 'Strumenti per valutare burden e soddisfazione dei caregiver',
      tools: [
        { name: 'ZCB-7', subtitle: 'Zarit Caregiver Burden - 7 items', description: 'Versione breve della scala Zarit per valutare il burden del caregiver in 7 domande.', available: false },
        { name: 'FAMCARE-2', subtitle: 'Family Satisfaction with Care', description: 'Strumento per misurare la soddisfazione delle famiglie rispetto alle cure ricevute.', available: false }
      ]
    }
  };
  const category = categoryData[categoryName];
  if (!category || !categoryDetails) return;
  let html = `<div class="category-detail"><div class="category-detail-header"><h3>${category.icon} ${category.title}</h3><p class="mb-0">${category.description}</p></div><div class="tools-detail-grid">`;
  category.tools.forEach(tool => {
    const statusBadge = tool.available ? '<span class="badge bg-success">✅ Disponibile</span>' : '<span class="badge bg-warning">In Sviluppo</span>';
    let actionButtons = '';
    if (tool.available) {
      if (tool.actions && tool.actions.length > 0) {
        tool.actions.forEach(action => {
          actionButtons += `<button class="btn ${action.class} btn-sm me-1" onclick="${action.action}"><i class="${action.icon} me-1"></i>${action.name}</button>`;
        });
      } else {
        actionButtons = `<button class="btn btn-success btn-sm" onclick="${tool.action || ''}">Apri Strumento</button>`;
      }
    } else {
      actionButtons = '<button class="btn btn-outline-secondary btn-sm" onclick="showComingSoon()">In Sviluppo</button>';
    }
    html += `<div class="tool-detail-card"><div class="tool-detail-header"><div class="tool-detail-icon">${tool.name.substring(0,2)}</div><div class="tool-detail-info"><h5>${tool.name}</h5><div class="tool-detail-subtitle">${tool.subtitle}</div></div></div><div class="tool-detail-description">${tool.description}</div><div class="tool-detail-actions">${statusBadge}${actionButtons}</div></div>`;
  });
  html += '</div></div>';
  categoryDetails.innerHTML = html;
}

function showComingSoon() {
  alert('Questo strumento è in fase di sviluppo e sarà disponibile nelle prossime versioni.');
}

function navigateToSection(sectionId) {
  showSection(sectionId);
}

function showSection(sectionId) {
  document.querySelectorAll('section[id]').forEach(section => {
    section.style.display = 'none';
  });
  const targetSection = document.getElementById(sectionId);
  if (targetSection) {
    targetSection.style.display = 'block';
  }
  document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
  const activeLink = document.querySelector(`[data-target="${sectionId}"]`);
  if (activeLink) activeLink.classList.add('active');
}

document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchCategories');
  if (searchInput) {
    searchInput.addEventListener('input', function(e) {
      const term = e.target.value.toLowerCase();
      document.querySelectorAll('.category-card').forEach(card => {
        const title = card.querySelector('h5').textContent.toLowerCase();
        const desc = card.querySelector('.category-description').textContent.toLowerCase();
        const tools = Array.from(card.querySelectorAll('.tool-badge')).map(b => b.textContent.toLowerCase()).join(' ');
        const match = title.includes(term) || desc.includes(term) || tools.includes(term);
        card.style.display = (match || term === '') ? 'block' : 'none';
      });
    });
  }

  const link = document.querySelector('[data-target="strumenti-valutazione-home"]');
  if (link) {
    link.addEventListener('click', function() {
      setTimeout(() => { showCategories(); }, 100);
    });
  }

  const valutazioneSection = document.getElementById('strumenti-valutazione-home');
  if (valutazioneSection) {
    showCategories();
    document.querySelectorAll('.category-card').forEach(card => {
      card.setAttribute('tabindex', '0');
      card.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          card.click();
        }
      });
    });
  }

  console.log('✅ Strumenti di Valutazione inizializzati correttamente');
});

function animateStats() {
  const statNumbers = document.querySelectorAll('.stat-number');
  statNumbers.forEach(stat => {
    const finalValue = stat.textContent;
    const isPercentage = finalValue.includes('%');
    const numericValue = parseInt(finalValue.replace('%', ''));
    let currentValue = 0;
    const increment = numericValue / 50;
    const timer = setInterval(() => {
      currentValue += increment;
      if (currentValue >= numericValue) {
        stat.textContent = finalValue;
        clearInterval(timer);
      } else {
        stat.textContent = Math.floor(currentValue) + (isPercentage ? '%' : '');
      }
    }, 30);
  });
}

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting && entry.target.id === 'strumenti-valutazione-home') {
      animateStats();
      observer.unobserve(entry.target);
    }
  });
});

setTimeout(() => {
  const section = document.getElementById('strumenti-valutazione-home');
  if (section) observer.observe(section);
}, 100);

function openIPOSCompile() {
  navigateToSection('ipos-home');
}

function openIPOSVisualize() {
  const modal = new bootstrap.Modal(document.getElementById('iposVersionModal'));
  modal.show();
}

function openESASCompile() {
  navigateToSection('esas-home');
  if (typeof switchMode === 'function') switchMode('compile');
}

function openESASVisualize() {
  navigateToSection('esas-home');
  if (typeof switchMode === 'function') switchMode('visualize');
}

// Funzioni IDC-PAL
function openIDCPALCompile() {
  navigateToSection('idcpal-home');
  if (typeof switchIDCPALMode === 'function') switchIDCPALMode('compile');
}

function openIDCPALVisualize() {
  navigateToSection('idcpal-home');
  if (typeof switchIDCPALMode === 'function') switchIDCPALMode('visualize');
}

function openIDCPALGlossary() {
  navigateToSection('idcpal-home');
  if (typeof switchIDCPALMode === 'function') switchIDCPALMode('glossary');
}

function showIPOSPDF(tipo, giorni) {
  const versionModal = bootstrap.Modal.getInstance(document.getElementById('iposVersionModal'));
  if (versionModal) versionModal.hide();
  const tipoText = tipo === 'paziente' ? 'Paziente' : 'Staff';
  document.getElementById('pdfModalTitle').innerHTML = `<i class="fas fa-file-pdf text-danger me-2"></i> IPOS ${tipoText} - ${giorni} giorni`;
  const fileMap = {
    'paziente_3': 'IPOSv1-P3-IT.pdf',
    'paziente_7': 'IPOSv1-P7-IT.pdf',
    'staff_3': 'IPOSv1-S3-IT.pdf',
    'staff_7': 'IPOSv1-S7-IT.pdf'
  };
  const key = `${tipo}_${giorni}`;
  const pdfPath = `ipos%20pdf/${fileMap[key]}`;
  const frame = document.getElementById('pdfFrame');
  if (frame) frame.src = pdfPath;
  const pdfModal = new bootstrap.Modal(document.getElementById('pdfViewModal'));
  pdfModal.show();
}

function printPDF() {
  const frame = document.getElementById('pdfFrame');
  if (frame && frame.contentWindow) {
    frame.contentWindow.focus();
    frame.contentWindow.print();
  }
}
