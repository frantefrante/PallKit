<?php
// index.php
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pallkit – Dashboard</title>
  <!-- CSS di Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
  <!-- Avada compatibility styles -->
  <link href="/css/avada-compat.css" rel="stylesheet">
  <!-- Document cards styles -->
  <link href="/css/documents.css" rel="stylesheet">
  <!-- Sedation tables styles -->
  <link href="css/sedazione.css" rel="stylesheet">
  <link href="css/strumenti-valutazione.css" rel="stylesheet">
</head>
<body>

<header class="mobile-header d-md-none">
  <button id="menu-toggle" class="btn btn-link text-white fs-4"><i class="fas fa-bars"></i></button>
  <span class="ms-2">Pallkit</span>
</header>

<div class="d-flex flex-wrap">
  <!-- Sidebar -->
  <nav class="sidebar p-3">
    <h4 class="text-white mb-4"><i class="fas fa-notes-medical me-2"></i>Pallkit</h4>
    <ul class="nav flex-column" id="clinical-menu">
      <li class="nav-item mb-2">
        <a href="#" class="nav-link active" data-target="dashboard-home">
          <i class="fas fa-tachometer-alt me-2"></i>Dashboard
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="#" class="nav-link" data-target="gestione-home">
          <i class="fas fa-pills me-2"></i>Gestione Sintomi
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="#" class="nav-link" data-target="sedazione-home">
          <i class="fas fa-procedures me-2"></i>Sedazione Palliativa
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="#" class="nav-link" data-target="equianalgesia-section">
          <i class="fas fa-balance-scale me-2"></i>Calcolo Equianalgesia
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="#" class="nav-link" data-target="rescue-section">
          <i class="fas fa-syringe me-2"></i>Calcola Dose Rescue
        </a>
      </li>

      <li class="nav-item mb-2">
      <li class="nav-item mb-2">
        <a href="#" class="nav-link" data-target="strumenti-valutazione-home">
          <i class="fas fa-chart-line me-2"></i>Strumenti Valutazione
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#medico-modal-home">
          <i class="fas fa-user-md me-2"></i>Dati Medico
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#paziente-modal-home">
          <i class="fas fa-user me-2"></i>Dati Paziente
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main content -->
  <div class="content-wrapper flex-grow-1">


    <!-- SEZIONE Dashboard -->
    <div id="dashboard-home" class="p-4">
      <h4>Benvenuto nella dashboard</h4>
      <p>Da qui puoi accedere a Gestione Sintomi o Identificazione.</p>

      <h5 class="mt-4 mb-3">Documenti paziente</h5>
      <div id="documenti-container" class="dashboard-cards mb-4"></div>
      <h5 class="mt-4 mb-3">Sedazione Palliativa</h5>
      <div id="documenti-sedazione" class="dashboard-cards"></div>

      <h5 class="mt-4 mb-3">Archivio Locale</h5>
      <div class="table-responsive">
        <table class="table table-sm" id="archivio-table">
          <thead><tr><th>Data</th><th>Tipo</th><th>Visualizza</th><th>Stampa</th><th>Cancella</th></tr></thead>
          <tbody></tbody>
        </table>
      </div>
    </div>

    <!-- SEZIONE Gestione Sintomi -->
    <?php include __DIR__ . '/gestione-sintomi.php'; ?>

     <!-- SEZIONE Sedazione Palliativa -->
     <section id="sedazione-home" class="p-4" style="display:none;">
       <?php include __DIR__ . '/gestione-sedazione.php'; ?>
     </section>

    <!-- SEZIONE Calcolo Equianalgesia -->
    <section id="equianalgesia-section" class="p-4" style="display:none;">
      <div class="card card-body">
        <div class="mb-2"><strong>Da</strong></div>
        <div id="drug-list-home">
          <div class="row align-items-end mb-2 drug-entry">
            <div class="col-md-4">
              <label class="form-label">Molecola</label>
              <select class="form-select drug-select"></select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Dosaggio</label>
              <div class="input-group">
                <input type="number" class="form-control dose-input">
                <span class="input-group-text dose-unit">mg/24h</span>
              </div>
            </div>
            <div class="col-md-3">
              <label class="form-label">Via</label>
              <select class="form-select route-select"></select>
            </div>
            <div class="col-md-2 text-nowrap">
              <button class="btn btn-success add-drug me-1" type="button" data-bs-toggle="tooltip" data-bs-title="Aggiungi molecola">+</button>
              <button class="btn btn-danger remove-drug" type="button">−</button>
            </div>
          </div>
        </div>

        <div class="mt-3"><strong>A</strong></div>
        <div class="row align-items-end mb-3">
          <div class="col-md-4">
            <label class="form-label">Molecola</label>
            <select class="form-select" id="conversion-target-drug"></select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Via</label>
            <select class="form-select" id="conversion-target-route"></select>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">
            Tolleranza crociata
            <span class="ms-1 text-primary help-icon" role="button" data-bs-toggle="tooltip" data-bs-title="La tolleranza crociata incompleta &egrave; una riduzione della dose equianalgesica quando si passa da un oppioide a un altro. La maggior parte delle linee guida raccomanda una riduzione del 25&ndash;50%.">?</span>
          </label>
          <div class="d-flex align-items-center gap-2">
            <input type="range" id="tolleranza-home" class="form-range flex-grow-1" min="0" max="50" step="5" value="25">
            <div class="input-group" style="width:120px">
              <input type="number" id="tolleranza-input" class="form-control" min="0" max="50" step="5" value="25">
              <span class="input-group-text">%</span>
            </div>
          </div>
        </div>

        <button class="btn btn-primary mb-3" type="button" onclick="calcolaEquianalgesiaHome()">Calcola</button>

        <div id="result-home"></div>
      </div>
    </section>

    <!-- SEZIONE Calcolo Dose Rescue -->
    <section id="rescue-section" class="p-4" style="display:none;">
      <div class="card">
        <div class="card-header">Calcolatore Dose Rescue</div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Dose giornaliera totale (mg)</label>
            <input type="number" class="form-control" id="rescue-total">
          </div>
          <div class="mb-3">
            <label class="form-label">Tipo oppioide</label>
            <select class="form-select" id="rescue-type">
              <option>Morfina orale</option>
              <option>Morfina SC</option>
              <option>Ossicodone orale</option>
              <option>Fentanil TTS</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Dose rescue</label>
            <input type="text" class="form-control" id="rescue-result" readonly>
          </div>
          <button type="button" id="calculate-rescue-btn" class="btn btn-primary">Calcola</button>
        </div>
      </div>
    </section>
    <!-- SEZIONE Strumenti di Valutazione -->
    <section id="strumenti-valutazione-home" class="p-4" style="display:none;">
      <div class="valutazione-container">
        <!-- Header -->
        <div class="valutazione-header mb-4">
          <h4><i class="fas fa-chart-line me-2"></i>Strumenti di Valutazione Clinica</h4>
          <p class="text-muted">Raccolta completa di scale e strumenti validati per la valutazione multidimensionale in cure palliative</p>
        </div>

        <!-- Search Bar -->
        <div class="search-tools-compact mb-4">
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" id="searchCategories" placeholder="Cerca categoria o strumento...">
          </div>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-row mb-4">
          <div class="row g-3">
            <div class="col-6 col-md-4">
              <div class="stat-card">
                <div class="stat-number">18</div>
                <div class="stat-label">Strumenti</div>
              </div>
            </div>
            <div class="col-6 col-md-4">
              <div class="stat-card">
                <div class="stat-number">7</div>
                <div class="stat-label">Implementati</div>
              </div>
            </div>
            <div class="col-6 col-md-4">
              <div class="stat-card">
                <div class="stat-number">9</div>
                <div class="stat-label">Categorie</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Categories Grid -->
        <div class="categories-grid">
          <!-- IDENTIFICAZIONE -->
          <div class="category-card identificazione" onclick="openCategoryView('identificazione')">
            <div class="category-header">
              <div class="category-icon">🔍</div>
              <div class="category-info">
                <h5>Identificazione</h5>
                <small>3 strumenti</small>
              </div>
                <div class="category-status">
                  <span class="badge bg-warning">In Sviluppo</span>
                </div>
            </div>
            <div class="category-description">
              Strumenti per identificare pazienti eleggibili per cure palliative
            </div>
            <div class="category-tools">
              <span class="tool-badge">NECPAL 3.1</span>
              <span class="tool-badge">NECPAL 4.0</span>
              <span class="tool-badge">SPICT</span>
            </div>
          </div>

          <!-- COMPLESSITÀ -->
          <div class="category-card complessita" onclick="openCategoryView('complessita')">
            <div class="category-header">
              <div class="category-icon">🧠</div>
              <div class="category-info">
                <h5>Complessità</h5>
                <small>1 strumento</small>
              </div>
                <div class="category-status">
                  <span class="badge bg-success">✅ Disponibile</span>
                </div>
            </div>
            <div class="category-description">
              Valutazione della complessità clinica e assistenziale
            </div>
            <div class="category-tools">
              <span class="tool-badge">IDC-PAL</span>
            </div>
          </div>

          <!-- PERFORMANCE -->
          <div class="category-card performance" onclick="openCategoryView('performance')">
            <div class="category-header">
              <div class="category-icon">🏃</div>
              <div class="category-info">
                <h5>Performance</h5>
                <small>4 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-success">✅ Disponibile</span>
              </div>
            </div>
            <div class="category-description">
              Scale di valutazione funzionale e performance status
            </div>
            <div class="category-tools">
              <span class="tool-badge available">AKPS</span>
              <span class="tool-badge available">PPS</span>
              <span class="tool-badge available">ADL</span>
              <span class="tool-badge available">BADL</span>
            </div>
          </div>

          <!-- PROGNOSI -->
          <div class="category-card prognosi" onclick="openCategoryView('prognosi')">
            <div class="category-header">
              <div class="category-icon">📈</div>
              <div class="category-info">
                <h5>Prognosi</h5>
                <small>2 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-warning">In Sviluppo</span>
              </div>
            </div>
            <div class="category-description">
              Strumenti per la valutazione prognostica
            </div>
            <div class="category-tools">
              <span class="tool-badge">PPI</span>
              <span class="tool-badge">PaP Score</span>
            </div>
          </div>

          <!-- MULTIDIMENSIONALE -->
          <div class="category-card multidimensionale" onclick="navigateToSection('multidimensionale-home')">
            <div class="category-header">
              <div class="category-icon">📋</div>
              <div class="category-info">
                <h5>Multidimensionale</h5>
                <small>2 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-success">✅ Disponibile</span>
              </div>
            </div>
            <div class="category-description">
              Strumenti per assessment olistico del paziente
            </div>
            <div class="category-tools">
              <span class="tool-badge available">IPOS</span>
              <span class="tool-badge available">ESAS</span>
            </div>
          </div>

          <!-- DOLORE -->
          <div class="category-card dolore" onclick="openCategoryView('dolore')">
            <div class="category-header">
              <div class="category-icon">😣</div>
              <div class="category-info">
                <h5>Dolore</h5>
                <small>1 strumento</small>
              </div>
              <div class="category-status">
                <span class="badge bg-warning">In Sviluppo</span>
              </div>
            </div>
            <div class="category-description">
              Strumenti specializzati per la valutazione del dolore
            </div>
            <div class="category-tools">
              <span class="tool-badge">DN4</span>
            </div>
          </div>

          <!-- DELIRIUM -->
          <div class="category-card delirium" onclick="openCategoryView('delirium')">
            <div class="category-header">
              <div class="category-icon">🧩</div>
              <div class="category-info">
                <h5>Delirium</h5>
                <small>2 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-warning">In Sviluppo</span>
              </div>
            </div>
            <div class="category-description">
              Strumenti per assessment e screening del delirium
            </div>
            <div class="category-tools">
              <span class="tool-badge">4AT</span>
              <span class="tool-badge">CAM</span>
            </div>
          </div>

          <!-- SEDAZIONE -->
          <div class="category-card sedazione" onclick="openCategoryView('sedazione')">
            <div class="category-header">
              <div class="category-icon">💤</div>
              <div class="category-info">
                <h5>Sedazione</h5>
                <small>2 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-warning">In Sviluppo</span>
              </div>
            </div>
            <div class="category-description">
              Scale per monitoraggio del livello di sedazione
            </div>
            <div class="category-tools">
              <span class="tool-badge">RASS</span>
              <span class="tool-badge">Ramsey</span>
            </div>
          </div>

          <!-- CAREGIVING -->
          <div class="category-card caregiving" onclick="openCategoryView('caregiving')">
            <div class="category-header">
              <div class="category-icon">👥</div>
              <div class="category-info">
                <h5>Caregiving</h5>
                <small>2 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-warning">In Sviluppo</span>
              </div>
            </div>
            <div class="category-description">
              Strumenti per valutare burden e soddisfazione dei caregiver
            </div>
            <div class="category-tools">
              <span class="tool-badge">ZCB-7</span>
              <span class="tool-badge">FAMCARE-2</span>
            </div>
          </div>
        </div>

        <!-- Back to Categories Button (hidden initially) -->
        <div class="back-to-categories" id="backToCategories" style="display:none;">
          <button class="btn btn-outline-success" onclick="showCategories()">
            <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
          </button>
        </div>

        <!-- Category Detail Views (hidden initially) -->
        <div id="categoryDetails" style="display:none;">
          <!-- Content will be dynamically loaded here -->
        </div>
      </div>
    </section>

    <!-- SEZIONE Identificazione -->
    <?php include __DIR__ . '/identificazione.php'; ?>

    <!-- SEZIONE NECPAL 4.0 -->
    <?php include __DIR__ . '/strumenti-necpal4.php'; ?>

    <!-- SEZIONE SPICT -->
    <?php include __DIR__ . '/strumenti-spict.php'; ?>

    <!-- SEZIONE IDC-PAL -->
    <?php include __DIR__ . '/strumenti-idcpal.php'; ?>

    <!-- SEZIONE MULTIDIMENSIONALE -->
    <?php include __DIR__ . '/strumenti-multidimensionali.php'; ?>

    <!-- SEZIONE IPOS -->
    <?php include __DIR__ . '/strumenti-ipos.php'; ?>

    <!-- SEZIONE PERFORMANCE -->
    <?php include __DIR__ . '/strumenti-performance.php'; ?>

    <!-- SEZIONE PROGNOSI -->
    <?php include __DIR__ . '/strumenti-prognosi.php'; ?>

    <!-- SEZIONE ESAS -->
    <?php include __DIR__ . '/strumenti-esas.php'; ?>

    <!-- SEZIONE DN4 -->
    <?php include __DIR__ . '/strumenti-dn4.php'; ?>

    <!-- SEZIONE 4AT -->
    <?php include __DIR__ . '/strumenti-4at.php'; ?>

    <!-- SEZIONE CAM -->
    <?php include __DIR__ . '/strumenti-cam.php'; ?>

    <!-- SEZIONE RASS -->
    <?php include __DIR__ . '/strumenti-rass.php'; ?>

    <!-- SEZIONE RAMSEY -->
    <?php include __DIR__ . '/strumenti-ramsey.php'; ?>

    <!-- SEZIONE ZCB 7 -->
    <?php include __DIR__ . '/strumenti-zcb7.php'; ?>

    <!-- SEZIONE FAMCARE 2 -->
    <?php include __DIR__ . '/strumenti-famcare2.php'; ?>
  </div>
</div>

<!-- POPUP: Cancro -->
<div id="popup-indicatore-cancro" class="popup-indicatore">
  <div class="popup-indicatore-contenuto">
    <button class="btn-close close-popup mb-2"></button>
    <h5>Cancro</h5>
    <ul>
      <li>Metastatico o avanzato a livello locoregionale</li>
      <li>Cancro in progressione (tumori solidi)</li>
      <li>Sintomi persistenti, non controllati o refrattari nonostante l’ottimizzazione del trattamento specifico</li>
    </ul>
  </div>
</div>

<!-- POPUP: Patologie polmonari croniche -->
<div id="popup-indicatore-bpco" class="popup-indicatore">
  <div class="popup-indicatore-contenuto">
    <button class="btn-close close-popup mb-2"></button>
    <h5>Patologie polmonari croniche</h5>
    <ul>
      <li>Dispnea per minimi sforzi</li>
      <li>Paziente confinato a casa con gravi limitazioni</li>
      <li>Criteri spirometrici di ostruzione grave (VEMS &lt; 30%) o di restrizione severa (CV &lt; 40% / DLCO &lt; 40%)</li>
      <li>Criteri emogasanalitici predisponenti per O₂ terapia domiciliare</li>
      <li>Necessità di terapia corticosteroidea continuativa</li>
      <li>Insufficienza cardiaca sintomatica associata</li>
    </ul>
  </div>
</div>

<!-- POPUP: Patologie cardiache croniche -->
<div id="popup-indicatore-cardiache" class="popup-indicatore">
  <div class="popup-indicatore-contenuto">
    <button class="btn-close close-popup mb-2"></button>
    <h5>Patologie cardiache croniche</h5>
    <ul>
      <li>Dispnea a riposo o per minimi sforzi</li>
      <li>Insufficienza cardiaca NYHA stadio III o IV, malattia valvolare grave non operabile o malattia coronarica avanzata non operabile</li>
      <li>Ecocardiografia basale: FE &lt; 30% o HTPA grave (PAPs &gt; 60)</li>
      <li>Insufficienza renale associata (FG &lt; 30 ml/min)</li>
      <li>Associazione con insufficienza renale e iponatriemia persistente</li>
    </ul>
  </div>
</div>

<!-- POPUP: Demenza -->
<div id="popup-indicatore-demenza" class="popup-indicatore">
  <div class="popup-indicatore-contenuto">
    <button class="btn-close close-popup mb-2"></button>
    <h5>Demenza</h5>
    <ul>
      <li>GDS ≥ 6c</li>
      <li>Progressione del declino funzionale, nutrizionale e/o cognitivo</li>
    </ul>
  </div>
</div>

<!-- POPUP: Fragilità -->
<div id="popup-indicatore-fragilita" class="popup-indicatore">
  <div class="popup-indicatore-contenuto">
    <button class="btn-close close-popup mb-2"></button>
    <h5>Fragilità</h5>
    <ul>
      <li>Indice di fragilità ≥ 0,5 (Rockwood K et al, 2005)</li>
      <li>CGA (comprehensive geriatric assessment) suggestiva di fragilità avanzata (Stuck A et al, 2011)</li>
    </ul>
  </div>
</div>

<!-- POPUP: Patologie neurovascolari croniche (ictus) -->
<div id="popup-indicatore-ictus" class="popup-indicatore">
  <div class="popup-indicatore-contenuto">
    <button class="btn-close close-popup mb-2"></button>
    <h5>Patologie neurovascolari croniche (ictus)</h5>
    <ul>
      <li>In fase acuta e subacuta (&lt; 3 mesi post-ictus): stato vegetativo o livello minimo di coscienza</li>
      <li>In fase cronica (&gt; 3 mesi post-ictus): complicanze mediche ripetute (o grave demenza post-ictale)</li>
    </ul>
  </div>
</div>

<!-- POPUP: Patologie neurologiche croniche (SM/SLA/Parkinson) -->
<div id="popup-indicatore-neuro" class="popup-indicatore">
  <div class="popup-indicatore-contenuto">
    <button class="btn-close close-popup mb-2"></button>
    <h5>Patologie neurologiche croniche: SM/SLA/Parkinson</h5>
    <ul>
      <li>Declino progressivo delle funzionalità fisiche e/o cognitive</li>
      <li>Sintomi complessi o refrattari</li>
      <li>Disfagia persistente</li>
      <li>Aumento delle difficoltà di comunicazione</li>
      <li>Frequenti polmoniti ab ingestis, dispnea o insufficienza respiratoria</li>
    </ul>
  </div>
</div>

<!-- POPUP: Patologie epatiche croniche -->
<div id="popup-indicatore-epatiche" class="popup-indicatore">
  <div class="popup-indicatore-contenuto">
    <button class="btn-close close-popup mb-2"></button>
    <h5>Patologie epatiche croniche</h5>
    <ul>
      <li>Cirrosi avanzata: stadio Child C, MELD-Na score &gt; 30 o con complicanze refrattarie</li>
      <li>Epatocarcinoma stadio C o D</li>
    </ul>
  </div>
</div>

<!-- POPUP: Patologia renale cronica -->
<div id="popup-indicatore-renale" class="popup-indicatore">
  <div class="popup-indicatore-contenuto">
    <button class="btn-close close-popup mb-2"></button>
    <h5>Patologia renale cronica</h5>
    <ul>
      <li>Insufficienza renale grave (FG &lt; 15 ml/min) in pazienti non candidabili o che rifiutino trapianto/dialisi</li>
      <li>Sospensione della dialisi o fallimento del trapianto</li>
    </ul>
  </div>
</div>

<!-- Modale: Visualizza Scheda -->
<div class="modal fade" id="scheda-modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scheda-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="scheda-contenuto"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="scheda-stampa">Stampa</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

<!-- Modale: Dati Medico -->
<div class="modal fade" id="medico-modal-home" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Dati Medico</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="form-medico" class="row g-3">
          <div class="col-12 form-check">
            <input class="form-check-input" type="checkbox" id="medico-use-test">
            <label class="form-check-label" for="medico-use-test">Usa dati di test</label>
          </div>
          <div class="col-md-3">
            <label class="form-label">Titolo</label>
            <select class="form-select" id="medico-titolo-select">
              <option value="">--</option>
              <option>Dott.</option>
              <option>Dott.ssa</option>
              <option>Prof.</option>
              <option>Prof.ssa</option>
              <option value="custom">Altro…</option>
            </select>
            <input type="text" class="form-control mt-2 d-none" id="medico-titolo-custom" placeholder="Titolo personalizzato">
          </div>
          <div class="col-md-9">
            <label class="form-label">Nome e Cognome</label>
            <input type="text" class="form-control" id="medico-nome-input">
          </div>
          <div class="col-md-6">
            <label class="form-label">Studio/Ente</label>
            <input type="text" class="form-control" id="medico-studio-input">
          </div>
          <div class="col-md-6">
            <label class="form-label">Specializzazione</label>
            <div id="spec-list">
              <div class="row mb-2 spec-entry align-items-center">
                <div class="col-10"><input type="text" class="form-control spec-input"></div>
                <div class="col-2 d-flex justify-content-end gap-1">
                  <button class="btn btn-secondary btn-sm add-spec" type="button">+</button>
                  <button class="btn btn-danger btn-sm remove-spec" type="button">−</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <label class="form-label">Codice Reg.</label>
            <input type="text" class="form-control" id="medico-codice-input">
          </div>
          <div class="col-md-8">
            <label class="form-label">Indirizzo</label>
            <div id="indirizzo-list">
              <div class="row mb-2 indirizzo-entry align-items-center">
                <div class="col-10"><input type="text" class="form-control indirizzo-input"></div>
                <div class="col-2 d-flex justify-content-end gap-1">
                  <button class="btn btn-secondary btn-sm add-indirizzo" type="button">+</button>
                  <button class="btn btn-danger btn-sm remove-indirizzo" type="button">−</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Telefono</label>
            <div id="tel-list">
              <div class="row mb-2 tel-entry align-items-center">
                <div class="col-10"><input type="text" class="form-control tel-input"></div>
                <div class="col-2 d-flex justify-content-end gap-1">
                  <button class="btn btn-secondary btn-sm add-tel" type="button">+</button>
                  <button class="btn btn-danger btn-sm remove-tel" type="button">−</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <div id="mail-list">
              <div class="row mb-2 mail-entry align-items-center">
                <div class="col-10"><input type="email" class="form-control mail-input"></div>
                <div class="col-2 d-flex justify-content-end gap-1">
                  <button class="btn btn-secondary btn-sm add-mail" type="button">+</button>
                  <button class="btn btn-danger btn-sm remove-mail" type="button">−</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Luogo</label>
            <input type="text" class="form-control" id="medico-luogo-input">
          </div>
          <div class="col-md-6">
            <label class="form-label">Data</label>
            <input type="date" class="form-control" id="medico-data-input">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="save-medico-btn" class="btn btn-primary">Salva</button>
      </div>
    </div>
  </div>
</div>
</div>
    </div></div>
</div>

<!-- Modale: Dati Paziente -->
<div class="modal fade" id="paziente-modal-home" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Dati Paziente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="form-paziente" class="row g-3">
          <div class="col-12 form-check">
            <input class="form-check-input" type="checkbox" id="paziente-use-test">
            <label class="form-check-label" for="paziente-use-test">Usa dati di test</label>
          </div>
          <div class="col-md-8">
            <label class="form-label">Nome e Cognome</label>
            <input type="text" class="form-control" id="paziente-nome-input">
          </div>
          <div class="col-md-4">
            <label class="form-label">Cod. Fiscale</label>
            <input type="text" class="form-control" id="paziente-cf-input">
          </div>
          <div class="col-md-4">
            <label class="form-label">Data di nascita</label>
            <input type="date" class="form-control" id="paziente-data-input">
          </div>
          <div class="col-md-8">
            <label class="form-label">Luogo di nascita</label>
            <input type="text" class="form-control" id="paziente-luogo-input">
          </div>
          <div class="col-md-8">
            <label class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="paziente-indirizzo-input">
          </div>
          <div class="col-md-4">
            <label class="form-label">Telefono</label>
            <input type="text" class="form-control" id="paziente-tel-input">
          </div>
          <div class="col-12">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" id="paziente-mail-input">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="save-paziente-btn" class="btn btn-primary">Salva</button>
      </div>
    </div>
  </div>
</div>

<!-- Modale: Anteprima -->
<div class="modal fade" id="preview-modal-home" tabindex="-1">
  <div class="modal-dialog modal-xl"><div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Anteprima Documento</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <div class="modal-body" id="preview-content-home"></div>
    <div class="modal-footer">
      <button class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
    </div>
  </div></div>
</div>

<!-- JS: Bootstrap, Docx, script custom -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/docx@7.1.2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script src="/js/sedazione.data.js"></script>
<script src="/js/sedazione.js"></script>
<script src="/js/documents.js"></script>
<script src="/js/archivio.js"></script>
<script src="js/strumenti-valutazione.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const d = document.getElementById("today-date-home");
    if (d) d.textContent = new Date().toLocaleDateString("it-IT");
  });
</script>
</body>
</html>
