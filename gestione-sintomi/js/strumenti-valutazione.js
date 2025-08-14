function openCategoryView(categoryName) {
  const categoriesGrid = document.querySelector('.categories-grid');
  const categoryDetails = document.getElementById('categoryDetails');
  const backButton = document.getElementById('backToCategories');
  const searchBar = document.querySelector('.search-tools-compact');
  const statsRow = document.querySelector('.stats-row');
  const mainHeader = document.querySelector('.valutazione-header');
  if (categoriesGrid) categoriesGrid.style.display = 'none';
  if (searchBar) searchBar.style.display = 'none';
  if (statsRow) statsRow.style.display = 'none';
  if (mainHeader) mainHeader.style.display = 'none';
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
  const mainHeader = document.querySelector('.valutazione-header');
  if (categoriesGrid) categoriesGrid.style.display = 'grid';
  if (searchBar) searchBar.style.display = 'block';
  if (statsRow) statsRow.style.display = 'block';
  if (categoryDetails) categoryDetails.style.display = 'none';
  if (backButton) backButton.style.display = 'none';
  if (mainHeader) mainHeader.style.display = 'block';
  const dn4 = document.getElementById('dn4-home');
  if (dn4) dn4.style.display = 'none';
}

function loadCategoryContent(categoryName) {
  const categoryDetails = document.getElementById('categoryDetails');
  if (!categoryDetails) return;

  if (categoryName === 'complessita') {
    categoryDetails.innerHTML = `
<div class="valutazione-detail-section">
  <div class="page-header">
    <div class="page-icon mb-3">🧠</div>
    <h1 class="page-title">Valutazione Complessità</h1>
    <p class="page-subtitle">Valutazione della complessità clinica e assistenziale attraverso strumenti validati per l'identificazione e la classificazione multidimensionale dei pazienti in cure palliative</p>
  </div>

  <div class="tools-grid justify-content-center">
    <div class="tool-card idcpal-card">
      <div class="tool-header">
        <div class="tool-icon idcpal-icon">ID</div>
        <div>
          <div class="tool-title">IDC-PAL</div>
          <div class="tool-subtitle">Instrumento Diagnóstico de Complejidad</div>
        </div>
      </div>
      <div class="tool-description">
        Strumento per valutare la complessità multidimensionale nei pazienti in cure palliative attraverso l'analisi di 34 elementi distribuiti in 3 dimensioni: paziente, famiglia e sistema sanitario.
      </div>
      <div class="tool-actions">
        <a href="#" class="action-btn btn-primary-idcpal" onclick="openIDCPALCompile()"><i class="fas fa-edit"></i>Compila</a>
        <a href="#" class="action-btn btn-outline-idcpal" onclick="openIDCPALVisualize()"><i class="fas fa-table"></i>Visualizza</a>
      </div>
      <div class="tool-extra-action">
        <a href="#" class="action-btn btn-outline-warning-custom glossary-btn" onclick="openIDCPALGlossary()"><i class="fas fa-book"></i>Glossario</a>
      </div>
    </div>
  </div>
</div>`;
    return;
  }

  if (categoryName === 'dolore') {
    categoryDetails.innerHTML = `
<div class="valutazione-detail-section">
  <div class="page-header mb-2">
    <div class="page-icon mb-3">😣</div>
    <h1 class="page-title">Valutazione del Dolore</h1>
    <p class="page-subtitle">Strumenti specializzati per la valutazione del dolore</p>
  </div>
  <div class="d-flex justify-content-start mt-n2">
    <div class="dn4-box">
      <div class="dn4-box-header">
        <div class="dn4-box-icon">
          <span class="dn4-box-letters">DN4</span>
        </div>
        <h1 class="dn4-box-title">DN4</h1>
        <div class="dn4-box-subtitle">Douleur Neuropathique 4 Questions</div>
        <div class="dn4-box-description">
          Questionario diagnostico validato per l'identificazione del dolore neuropatico attraverso 4 domande specifiche su caratteristiche del dolore e segni clinici.
        </div>
      </div>
      <div class="dn4-box-features">
        <p class="dn4-box-feature-text">10 items, Cut-off ≥4/10, Sensibilità 82.9% - Specificità 89.9%</p>
      </div>
      <div class="dn4-box-actions">
        <a href="#" class="btn btn-primary-dn4 btn-dn4" onclick="openDN4Compile()"><i class="fas fa-edit"></i>Compila</a>
        <a href="#" class="btn btn-outline-dn4 btn-dn4" onclick="openDN4Visualize()"><i class="fas fa-eye"></i>Visualizza</a>
      </div>
    </div>
  </div>
</div>`;
    const box = categoryDetails.querySelector('.dn4-box');
    if (box) box.scrollIntoView({behavior: 'smooth', block: 'start'});
    return;
  }

  if (categoryName === 'sedazione') {
    categoryDetails.innerHTML = `
<div class="valutazione-detail-section">
  <div class="page-header">
    <div class="page-icon mb-3">💤</div>
    <h1 class="page-title">Strumenti di Sedazione</h1>
    <p class="page-subtitle">Scale di valutazione del livello di sedazione e agitazione</p>
  </div>
  <div class="tools-grid">
    <div class="tool-card sedazione-card">
      <div class="tool-header">
        <div class="tool-icon-large"><span class="tool-letters">RASS</span></div>
        <div class="tool-info">
          <h4>RASS</h4>
          <div class="tool-subtitle">Richmond Agitation-Sedation Scale</div>
        </div>
      </div>
      <div class="tool-description">
        Scala validata per la valutazione del livello di sedazione e agitazione nei pazienti critici.
      </div>
      <div class="tool-features">
        <span class="feature-badge">Scala a 10 livelli da +4 a -5</span>
      </div>
      <div class="tool-actions">
        <button class="btn btn-primary action-btn" onclick="openRASSCompile()"><i class="fas fa-edit me-2"></i>Compila</button>
        <button class="btn btn-outline-primary action-btn" onclick="openRASSVisualize()"><i class="fas fa-eye me-2"></i>Visualizza</button>
      </div>
    </div>
    <div class="tool-card sedazione-card">
      <div class="tool-header">
        <div class="tool-icon-large"><span class="tool-letters">RAM</span></div>
        <div class="tool-info">
          <h4>Ramsey</h4>
          <div class="tool-subtitle">Ramsey Sedation Scale</div>
        </div>
      </div>
      <div class="tool-description">
        Scala tradizionale per la valutazione della sedazione in sei livelli progressivi.
      </div>
      <div class="tool-features">
        <span class="feature-badge">Scala a 6 livelli da ansioso a non responsivo</span>
      </div>
      <div class="tool-actions">
        <button class="btn btn-primary action-btn" onclick="openRamseyCompile()"><i class="fas fa-edit me-2"></i>Compila</button>
        <button class="btn btn-outline-primary action-btn" onclick="openRamseyVisualize()"><i class="fas fa-eye me-2"></i>Visualizza</button>
      </div>
    </div>
  </div>
</div>`;
    animateToolCards(categoryDetails);
    return;
  }

  if (categoryName === 'delirium') {
    categoryDetails.innerHTML = `
<div class="valutazione-detail-section">
  <div class="page-header">
    <div class="page-icon mb-3">🧩</div>
    <h1 class="page-title">Assessment Delirium</h1>
    <p class="page-subtitle">Strumenti per assessment e screening del delirium</p>
  </div>
  <div class="tools-grid">
    <div class="tool-card delirium-card">
      <div class="tool-header">
        <div class="tool-icon-large"><span class="tool-letters">4AT</span></div>
        <div class="tool-info">
          <h4>4AT</h4>
          <div class="tool-subtitle">4 'A's Test</div>
        </div>
      </div>
      <div class="tool-description">
        Strumento rapido di screening per delirium e deterioramento cognitivo.
      </div>
      <div class="tool-features">
        <span class="feature-badge">Screening rapido, non richiede formazione specialistica</span>
      </div>
      <div class="tool-actions">
        <button class="btn btn-primary action-btn" onclick="open4ATCompile()"><i class="fas fa-edit me-2"></i>Compila</button>
        <button class="btn btn-outline-primary action-btn" onclick="open4ATVisualize()"><i class="fas fa-eye me-2"></i>Visualizza</button>
      </div>
    </div>
    <div class="tool-card delirium-card">
      <div class="tool-header">
        <div class="tool-icon-large"><span class="tool-letters">CAM</span></div>
        <div class="tool-info">
          <h4>CAM</h4>
          <div class="tool-subtitle">Confusion Assessment Method</div>
        </div>
      </div>
      <div class="tool-description">
        Metodo standard per la diagnosi di delirium validato in ambito clinico.
      </div>
      <div class="tool-features">
        <span class="feature-badge">Diagnosi accurata con osservazione clinica</span>
      </div>
      <div class="tool-actions">
        <button class="btn btn-primary action-btn" onclick="openCAMCompile()"><i class="fas fa-edit me-2"></i>Compila</button>
        <button class="btn btn-outline-primary action-btn" onclick="openCAMVisualize()"><i class="fas fa-eye me-2"></i>Visualizza</button>
      </div>
    </div>
  </div>
</div>`;
    animateToolCards(categoryDetails);
    return;
  }


  const categoryData = {
    'identificazione': {
      title: 'Strumenti di Identificazione',
      icon: '🔍',
      description: 'Strumenti per identificare pazienti eleggibili per cure palliative',
      tools: [
        { name: 'NECPAL 3.1', subtitle: 'Necessidades Paliativas', description: 'Strumento di screening per identificare pazienti con bisogni palliativi. Versione 3.1 con criteri aggiornati.', available: true,
          actions:[{name:'Compila',class:'btn-success',icon:'fas fa-edit',action:'openNecpal31Compile()'},{name:'Visualizza',class:'btn-outline-success',icon:'fas fa-eye',action:'openNecpal31Visualize()'},{name:'Glossario',class:'btn-outline-secondary',icon:'fas fa-book',action:'openNecpal31Glossary()'}] },
        { name: 'NECPAL 4.0', subtitle: 'Versione Aggiornata', description: 'Ultima versione del NECPAL con criteri rivisti e maggiore specificità per diverse patologie.', available: true,
          actions:[{name:'Compila',class:'btn-success',icon:'fas fa-edit',action:'openNecpal40Compile()'},{name:'Visualizza',class:'btn-outline-success',icon:'fas fa-eye',action:'openNecpal40Visualize()'},{name:'Glossario',class:'btn-outline-secondary',icon:'fas fa-book',action:'openNecpal40Glossary()'}] },
        { name: 'SPICT', subtitle: 'Supportive & Palliative Care Indicators', description: 'Tool clinico per identificare pazienti che potrebbero beneficiare di cure palliative specialistiche.', available: true,
          actions:[{name:'Compila',class:'btn-primary',icon:'fas fa-edit',action:'openSpictCompile()'},{name:'Visualizza',class:'btn-outline-primary',icon:'fas fa-eye',action:'openSpictVisualize()'}] }
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
    'delirium': {
      title: 'Assessment Delirium',
      icon: '🧩',
      description: 'Strumenti per assessment e screening del delirium',
      tools: [
        { name: '4AT', subtitle: "4 'A's Test", description: 'Strumento rapido di screening per delirium e deterioramento cognitivo.', available: true,
          actions:[{name:'Compila',class:'btn-success',icon:'fas fa-edit',action:'open4ATCompile()'},{name:'Visualizza',class:'btn-outline-success',icon:'fas fa-eye',action:'open4ATVisualize()'}] },
        { name: 'CAM', subtitle: 'Confusion Assessment Method', description: 'Metodo standard per la diagnosi di delirium validato in ambito clinico.', available: true,
          actions:[{name:'Compila',class:'btn-success',icon:'fas fa-edit',action:'openCAMCompile()'},{name:'Visualizza',class:'btn-outline-success',icon:'fas fa-eye',action:'openCAMVisualize()'}] }
      ]
    },
    'sedazione': {
      title: 'Scale di Sedazione',
      icon: '💤',
      description: 'Scale per monitoraggio del livello di sedazione',
      tools: [
        { name: 'RASS', subtitle: 'Richmond Agitation-Sedation Scale', description: 'Scala per valutare il livello di agitazione e sedazione del paziente.', available: true,
          actions:[{name:'Compila',class:'btn-success',icon:'fas fa-edit',action:'openRASSCompile()'},{name:'Visualizza',class:'btn-outline-success',icon:'fas fa-eye',action:'openRASSVisualize()'}] },
        { name: 'Ramsey', subtitle: 'Ramsey Sedation Scale', description: 'Scala classica per la valutazione del livello di sedazione in 6 livelli.', available: true,
          actions:[{name:'Compila',class:'btn-success',icon:'fas fa-edit',action:'openRamseyCompile()'},{name:'Visualizza',class:'btn-outline-success',icon:'fas fa-eye',action:'openRamseyVisualize()'}] }
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
  document.querySelectorAll('section[id], #dashboard-home').forEach(section => {
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

function openESASCompile() {
  navigateToSection('esas-home');
  if (typeof switchMode === 'function') switchMode('compile');
}

function openNecpal31Compile() {
  navigateToSection('necpal31-home');
  if (typeof switchNecpal31Mode === 'function') switchNecpal31Mode('compile');
}

function openNecpal31Visualize() {
  navigateToSection('necpal31-home');
  if (typeof switchNecpal31Mode === 'function') switchNecpal31Mode('visualize');
}

function openNecpal31Glossary() {
  navigateToSection('necpal31-home');
  if (typeof switchNecpal31Mode === 'function') switchNecpal31Mode('glossary');
}

function openNecpal40Compile() {
  navigateToSection('necpal40-home');
  if (typeof switchNecpal40Mode === 'function') switchNecpal40Mode('compile');
}

function openNecpal40Visualize() {
  navigateToSection('necpal40-home');
  if (typeof switchNecpal40Mode === 'function') switchNecpal40Mode('visualize');
}

function openNecpal40Glossary() {
  navigateToSection('necpal40-home');
  if (typeof switchNecpal40Mode === 'function') switchNecpal40Mode('glossary');
}

function openSpictCompile() {
  navigateToSection('spict-home');
  if (typeof switchSpictMode === 'function') switchSpictMode('compile');
}

function openSpictVisualize() {
  navigateToSection('spict-home');
  if (typeof switchSpictMode === 'function') switchSpictMode('visualize');
}

function openESASVisualize() {
  navigateToSection('esas-home');
  if (typeof switchMode === 'function') switchMode('visualize');
}


// Funzioni per PPI
function openPPICompile() {
  navigateToSection('ppi-home');
  if (typeof switchPPIMode === 'function') switchPPIMode('compile');
}

function openPPIVisualize() {
  navigateToSection('ppi-home');
  if (typeof switchPPIMode === 'function') switchPPIMode('visualize');
}

// Funzioni per PaP Score
function openPAPCompile() {
  navigateToSection('pap-home');
  if (typeof switchPAPMode === 'function') switchPAPMode('compile');
}

function openPAPVisualize() {
  navigateToSection('pap-home');
  if (typeof switchPAPMode === 'function') switchPAPMode('visualize');
}

// Funzioni per Prognosi
function openPrognosiHome() {
  navigateToSection('prognosi-home');
  if (typeof switchPrognosiMode === 'function') switchPrognosiMode('tools');
}

function openPrognosiReference() {
  navigateToSection('prognosi-home');
  if (typeof switchPrognosiMode === 'function') switchPrognosiMode('reference');
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

// Funzioni Performance per navigazione dai box
function openAKPSCompile() {
  navigateToSection('akps-home');
  if (typeof switchPerformanceMode === 'function') {
    switchPerformanceMode('akps', 'compile');
  }
}

function openAKPSVisualize() {
  navigateToSection('akps-home');
  if (typeof switchPerformanceMode === 'function') {
    switchPerformanceMode('akps', 'view');
  }
}

function openPPSCompile() {
  navigateToSection('pps-home');
  if (typeof switchPerformanceMode === 'function') {
    switchPerformanceMode('pps', 'compile');
  }
}

function openPPSVisualize() {
  navigateToSection('pps-home');
  if (typeof switchPerformanceMode === 'function') {
    switchPerformanceMode('pps', 'view');
  }
}

function openIADLCompile() {
  navigateToSection('iadl-home');
  if (typeof switchPerformanceMode === 'function') {
    switchPerformanceMode('iadl', 'compile');
  }
}

function openIADLVisualize() {
  navigateToSection('iadl-home');
  if (typeof switchPerformanceMode === 'function') {
    switchPerformanceMode('iadl', 'view');
  }
}

function openBADLCompile() {
  navigateToSection('badl-home');
  if (typeof switchPerformanceMode === 'function') {
    switchPerformanceMode('badl', 'compile');
  }
}

function openBADLVisualize() {
  navigateToSection('badl-home');
  if (typeof switchPerformanceMode === 'function') {
    switchPerformanceMode('badl', 'view');
  }
}

function openDN4Compile() {
  navigateToSection('dn4-home');
  if (typeof switchDN4Mode === 'function') switchDN4Mode('compile');
}

function openDN4Visualize() {
  navigateToSection('dn4-home');
  if (typeof switchDN4Mode === 'function') switchDN4Mode('visualize');
}

function openRASSCompile() {
  navigateToSection('rass-home');
  if (typeof switchRASSMode === 'function') switchRASSMode('compile');
}

function openRASSVisualize() {
  navigateToSection('rass-home');
  if (typeof switchRASSMode === 'function') switchRASSMode('visualize');
}

function openRamseyCompile() {
  navigateToSection('ramsey-home');
  if (typeof switchRamseyMode === 'function') switchRamseyMode('compile');
}

function openRamseyVisualize() {
  navigateToSection('ramsey-home');
  if (typeof switchRamseyMode === 'function') switchRamseyMode('visualize');
}

function open4ATCompile() {
  navigateToSection('4at-home');
}

function open4ATVisualize() {
  navigateToSection('4at-home');
}

function openCAMCompile() {
  navigateToSection('cam-home');
}

function openCAMVisualize() {
  navigateToSection('cam-home');
}

function animateToolCards(container) {
  const cards = container.querySelectorAll('.tool-card');
  cards.forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    setTimeout(() => {
      card.style.transition = 'all 0.6s ease';
      card.style.opacity = '1';
      card.style.transform = 'translateY(0)';
    }, index * 200);
  });
}
