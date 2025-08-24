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
  <link href="css/avada-compat.css" rel="stylesheet">
  <!-- Document cards styles -->
  <link href="css/documents.css" rel="stylesheet">
  <!-- Sedation tables styles -->
  <link href="css/sedazione.css" rel="stylesheet">
  <link href="css/strumenti-valutazione.css" rel="stylesheet">
  <link href="css/dn4-box.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">
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
        <a href="#" class="nav-link" data-target="strumenti-valutazione-home">
          <i class="fas fa-chart-line me-2"></i>Strumenti Valutazione
        </a>
      </li>


    </ul>
  </nav>

  <!-- Main content -->
  <div class="content-wrapper flex-grow-1">


    <!-- SEZIONE Dashboard -->
    <div id="dashboard-home" class="p-4">
  <div class="dashboard-container">
    <!-- Header -->
    <div class="dashboard-header">
      <h1><i class="fas fa-notes-medical me-3"></i>PallKit Dashboard</h1>
      <p>Strumenti clinici per cure palliative moderne e patient-centered</p>
    </div>

    <!-- Quick Stats -->
    <div class="quick-stats">
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-tools"></i>
        </div>
        <div class="stat-number">20+</div>
        <div class="stat-label">Strumenti Clinici</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-layer-group"></i>
        </div>
        <div class="stat-number">9</div>
        <div class="stat-label">Aree Cliniche</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-certificate"></i>
        </div>
        <div class="stat-number">&#10003;</div>
        <div class="stat-label">Validati</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">
          <i class="fas fa-mobile-alt"></i>
        </div>
        <div class="stat-number">&#10003;</div>
        <div class="stat-label">Responsive</div>
      </div>
    </div>

    <!-- Categories Section -->
    <div class="categories-section">
      <h2><i class="fas fa-th-large me-2"></i>Aree Cliniche</h2>
      <div class="categories-grid">
        <div class="category-card category-gestione" onclick="navigateToSection('gestione-home')">
          <div class="category-icon">
            <i class="fas fa-pills"></i>
          </div>
          <div class="category-title">Gestione Sintomi</div>
          <div class="category-description">Valutazione e management dei sintomi più comuni in cure palliative</div>
          <div class="category-count">8 protocolli disponibili</div>
        </div>

        <div class="category-card category-sedazione" onclick="navigateToSection('sedazione-home')">
          <div class="category-icon">
            <i class="fas fa-procedures"></i>
          </div>
          <div class="category-title">Sedazione Palliativa</div>
          <div class="category-description">Schemi e protocolli per sedazione palliativa controllata</div>
          <div class="category-count">Protocolli e monitoraggio</div>
        </div>

        <div class="category-card category-equianalgesia" onclick="navigateToSection('equianalgesia-section')">
          <div class="category-icon">
            <i class="fas fa-balance-scale"></i>
          </div>
          <div class="category-title">Calcolo Equianalgesia</div>
          <div class="category-description">Conversione tra oppioidi con calcolo tolleranza crociata</div>
          <div class="category-count">Calcolo automatico</div>
        </div>

        <div class="category-card category-rescue" onclick="navigateToSection('rescue-section')">
          <div class="category-icon">
            <i class="fas fa-syringe"></i>
          </div>
          <div class="category-title">Dose Rescue</div>
          <div class="category-description">Calcolo dose di soccorso per dolore breakthrough</div>
          <div class="category-count">Calculator integrato</div>
        </div>

        <div class="category-card category-identificazione" onclick="openCategory('identificazione')">
          <div class="category-icon">
            <i class="fas fa-search"></i>
          </div>
          <div class="category-title">Identificazione</div>
          <div class="category-description">Strumenti per identificare pazienti eleggibili per cure palliative</div>
          <div class="category-count">3 strumenti (NECPAL, SPICT)</div>
        </div>

        <div class="category-card category-complessita" onclick="openCategory('complessita')">
          <div class="category-icon">
            <i class="fas fa-layer-group"></i>
          </div>
          <div class="category-title">Complessità</div>
          <div class="category-description">Valutazione della complessità clinica e assistenziale</div>
          <div class="category-count">1 strumento (IDC-PAL)</div>
        </div>

        <div class="category-card category-prognosi" onclick="openCategory('prognosi')">
          <div class="category-icon">
            <i class="fas fa-chart-line"></i>
          </div>
          <div class="category-title">Prognosi</div>
          <div class="category-description">Scale prognostiche per stratificazione del rischio</div>
          <div class="category-count">2 strumenti (PPI, PaP Score)</div>
        </div>

        <div class="category-card category-monitoraggio" onclick="openCategory('multidimensionale')">
          <div class="category-icon">
            <i class="fas fa-chart-bar"></i>
          </div>
          <div class="category-title">Monitoraggio</div>
          <div class="category-description">Assessment multidimensionale del paziente</div>
          <div class="category-count">2 strumenti (IPOS, ESAS)</div>
        </div>

        <div class="category-card category-performance" onclick="openCategory('performance')">
          <div class="category-icon">
            <i class="fas fa-running"></i>
          </div>
          <div class="category-title">Performance</div>
          <div class="category-description">Scale di valutazione funzionale e performance status</div>
          <div class="category-count">4 strumenti (AKPS, PPS, ADL, BADL)</div>
        </div>
      </div>
    </div>

    <!-- Featured Tools -->
    <div class="featured-tools">
      <h2><i class="fas fa-star me-2"></i>Strumenti Più Utilizzati</h2>
      <div class="tools-carousel">
        <div class="tool-preview" onclick="openTool('ppi')">
          <div class="tool-preview-icon">PPI</div>
          <div class="tool-preview-title">PPI Score</div>
          <div class="tool-preview-category">Prognosi</div>
        </div>
        <div class="tool-preview" onclick="openTool('necpal')">
          <div class="tool-preview-icon">NP</div>
          <div class="tool-preview-title">NECPAL 4.0</div>
          <div class="tool-preview-category">Identificazione</div>
        </div>
        <div class="tool-preview" onclick="openTool('akps')">
          <div class="tool-preview-icon">AK</div>
          <div class="tool-preview-title">AKPS</div>
          <div class="tool-preview-category">Performance</div>
        </div>
        <div class="tool-preview" onclick="openTool('equianalgesia')">
          <div class="tool-preview-icon">EQ</div>
          <div class="tool-preview-title">Equianalgesia</div>
          <div class="tool-preview-category">Calcolo</div>
        </div>
        <div class="tool-preview" onclick="openTool('esas')">
          <div class="tool-preview-icon">ES</div>
          <div class="tool-preview-title">ESAS</div>
          <div class="tool-preview-category">Monitoraggio</div>
        </div>
        <div class="tool-preview" onclick="openTool('ipos')">
          <div class="tool-preview-icon">IP</div>
          <div class="tool-preview-title">IPOS</div>
          <div class="tool-preview-category">Multidimensionale</div>
        </div>
      </div>
    </div>

    <!-- Educational Content -->
    <div class="educational-content">
      <div class="content-card">
        <h3><i class="fas fa-book-medical me-2"></i>Riferimenti Scientifici</h3>
        <div class="reference-item">
          <div class="reference-title">AIOM-SICP 2015</div>
          <div class="reference-description">"Cure Palliative Precoci e Simultanee" - Documento di consenso italiano</div>
        </div>
        <div class="reference-item">
          <div class="reference-title">NCCN Guidelines</div>
          <div class="reference-description">Linee guida internazionali per cure palliative in oncologia</div>
        </div>
        <div class="reference-item">
          <div class="reference-title">Gold Standard Framework</div>
          <div class="reference-description">Approccio sistematico per identificazione e care planning</div>
        </div>
        <div class="reference-item">
          <div class="reference-title">EAPC Basic Dataset</div>
          <div class="reference-description">Standard europeo per la valutazione multidimensionale</div>
        </div>
      </div>

      <div class="content-card">
        <h3><i class="fas fa-stethoscope me-2"></i>Focus Clinico</h3>
        <div class="clinical-item">
          <div class="clinical-title">Early Integration</div>
          <div class="clinical-description">Le cure palliative precoci migliorano qualità di vita e sopravvivenza globale</div>
        </div>
        <div class="clinical-item">
          <div class="clinical-title">Timing di Attivazione</div>
          <div class="clinical-description">Considera attivazione quando NECPAL ≥2 indicatori o KPS ≤70%</div>
        </div>
        <div class="clinical-item">
          <div class="clinical-title">Assessment Multidimensionale</div>
          <div class="clinical-description">Valutazione olistica del paziente: fisica, psicologica, sociale, spirituale</div>
        </div>
        <div class="clinical-item">
          <div class="clinical-title">Comunicazione</div>
          <div class="clinical-description">Colloqui graduali e patient-centered per goals of care e advance care planning</div>
        </div>
      </div>
    </div>

    <!-- Quick Start Guide -->
    <div class="quick-start">
      <h2><i class="fas fa-play-circle me-2"></i>Primo Accesso?</h2>
      <p>Inizia con la sezione Identificazione per screening dei pazienti candidati alle cure palliative</p>
      <button class="start-button" onclick="openCategory('identificazione')">
        <i class="fas fa-arrow-right me-2"></i>Inizia da Identificazione
      </button>
    </div>
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
              <button class="btn btn-success add-drug me-1" type="button" data-bs-toggle="tooltip" data-bs-title="Aggiungi molecola" style="font-size:12px; padding:2px 8px; line-height:1.2;">+</button>
              <button class="btn btn-danger remove-drug" type="button" style="font-size:12px; padding:2px 8px; line-height:1.2;">−</button>
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
          <div class="col-md-5" id="fentanil-patient-type" style="display:none;">
            <label class="form-label">
              Profilo Paziente (solo Fentanil TTS)
              <span class="ms-1 text-primary help-icon" role="button" data-bs-toggle="tooltip" data-bs-title="Stabile (100:1): dolore controllato da >1 settimana, senza breakthrough significativi. Rotazione/Fragile (150:1): anziani, compromissione organi, primo switch oppioidi forti">
                <i class="fas fa-question-circle"></i>
              </span>
            </label>
            <select class="form-select" id="patient-type">
              <option value="stable">Stabile - Dolore ben controllato (100:1)</option>
              <option value="unstable">Rotazione/Fragile - Approccio conservativo (150:1)</option>
            </select>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">
            Tolleranza crociata
            <span class="ms-1 text-primary help-icon" role="button" data-bs-toggle="tooltip" data-bs-title="La tolleranza crociata incompleta &egrave; una riduzione della dose equianalgesica quando si passa da un oppioide a un altro. La maggior parte delle linee guida raccomanda una riduzione del 25&ndash;50%.">?</span>
          </label>
          <div class="d-flex align-items-center gap-2">
            <input type="range" id="tolleranza-home" class="form-range flex-grow-1" min="0" max="50" step="5" value="25">
            <div class="input-group" style="width:140px; min-width:120px;">
              <input type="number" id="tolleranza-input" class="form-control" min="0" max="50" step="5" value="25">
              <span class="input-group-text">%</span>
            </div>
          </div>
        </div>

        <button class="btn btn-primary mb-3" type="button" onclick="calcolaEquianalgesiaHome()">Calcola</button>

        <div id="result-home"></div>

        <!-- Tabelle di conversione espandibili -->
        <div class="mb-3">
          <button class="btn btn-outline-info btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#conversion-tables" aria-expanded="false">
            <i class="fas fa-table me-2"></i>Visualizza Tabelle di Equianalgesia
          </button>
        </div>
        
        <div class="collapse" id="conversion-tables">
          <div class="card">
            <div class="card-header">
              <h6 class="mb-0">Tabelle di Equianalgesia</h6>
            </div>
            <div class="card-body">
              <!-- Tabella 1: Fattori di Conversione -->
              <div class="mb-4">
                <h6>Fattori di Conversione a Morfina OS</h6>
                <small class="text-muted">Rapporti equianalgesici per il calcolo MED</small>
                <div class="row">
                  <div class="col-md-8">
                    <table class="table table-sm table-striped">
                      <thead>
                        <tr><th>Oppioide</th><th>Via</th><th>Rapporto</th></tr>
                      </thead>
                      <tbody>
                        <tr><td>Morfina</td><td>OS</td><td>1:1</td></tr>
                        <tr><td>Morfina</td><td>EV/SC</td><td>3:1</td></tr>
                        <tr><td>Ossicodone</td><td>OS</td><td>2:1</td></tr>
                        <tr><td>Idromorfone</td><td>OS</td><td>5:1</td></tr>
                        <tr><td>Codeina</td><td>OS</td><td>0.1:1</td></tr>
                        <tr><td>Tramadolo</td><td>OS</td><td>0.2:1</td></tr>
                        <tr><td>Tapentadolo</td><td>OS</td><td>0.4:1</td></tr>
                        <tr><td>Buprenorfina</td><td>TTS</td><td>1.7:1</td></tr>
                        <tr><td>Fentanil</td><td>TTS</td><td>Tabelle RCP*</td></tr>
                        <tr><td>Metadone</td><td>OS</td><td>Algoritmo**</td></tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
              <!-- Tabella 2: Morfina → Altri Oppioidi -->
              <div class="mb-4">
                <h6>Conversione da Morfina OS ad Altri Oppioidi</h6>
                <small class="text-muted">Tabella 13 - Linee Guida Ministero della Salute</small>
                <div class="row">
                  <div class="col-md-10">
                    <table class="table table-sm table-striped">
                      <thead>
                        <tr><th>Morfina OS (mg)</th><th>Ossicodone OS (mg)</th><th>Idromorfone OS (mg)</th><th>Tramadolo OS (mg)</th><th>Tapentadolo OS (mg)</th><th>Metadone OS (mg)</th></tr>
                      </thead>
                      <tbody>
                        <tr><td>30</td><td>15</td><td>6</td><td>150</td><td>75</td><td>7,5**</td></tr>
                        <tr><td>60</td><td>30</td><td>12</td><td>300</td><td>150</td><td>15**</td></tr>
                        <tr><td>120</td><td>60</td><td>24</td><td>600</td><td>300</td><td>30**</td></tr>
                        <tr><td>180</td><td>90</td><td>36</td><td>900</td><td>450</td><td>22,5**</td></tr>
                        <tr><td>240</td><td>120</td><td>48</td><td>1200</td><td>600</td><td>30**</td></tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
              <!-- Tabella 3: Fentanil TTS -->
              <div class="mb-4">
                <h6>Morfina Orale → Fentanil TTS</h6>
                <small class="text-muted">Tabelle RCP - Due profili paziente</small>
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="small text-success">Pazienti Stabili (100:1)</h6>
                    <table class="table table-sm table-striped">
                      <thead>
                        <tr><th>Morfina OS (mg/24h)</th><th>Fentanil TTS (mcg/h)</th></tr>
                      </thead>
                      <tbody>
                        <tr><td>≤44</td><td>12</td></tr>
                        <tr><td>45-89</td><td>25</td></tr>
                        <tr><td>90-149</td><td>50</td></tr>
                        <tr><td>150-209</td><td>75</td></tr>
                        <tr><td>210-269</td><td>100</td></tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <h6 class="small text-warning">Rotazione/Fragili (150:1)</h6>
                    <table class="table table-sm table-striped">
                      <thead>
                        <tr><th>Morfina OS (mg/24h)</th><th>Fentanil TTS (mcg/h)</th></tr>
                      </thead>
                      <tbody>
                        <tr><td>≤89</td><td>12</td></tr>
                        <tr><td>90-134</td><td>25</td></tr>
                        <tr><td>135-224</td><td>50</td></tr>
                        <tr><td>225-314</td><td>75</td></tr>
                        <tr><td>315-404</td><td>100</td></tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="mt-3">
                <h6>Note Cliniche Importanti</h6>
                <ul class="small">
                  <li><strong>Tolleranza crociata:</strong> Riduzione 25-50% consigliata nel cambio di oppioide (escluso Fentanil TTS)</li>
                  <li><strong>Dose rescue:</strong> 1/6 della dose totale giornaliera (morfina equivalente)</li>
                  <li><strong>*Fentanil TTS:</strong> Le tabelle RCP forniscono già la dose iniziale raccomandata, non applicare ulteriori riduzioni</li>
                  <li><strong>**Metadone:</strong> ≤100mg ÷4, 100-300mg ÷8, >300mg ÷12 (algoritmo non lineare)</li>
                  <li><strong>Profili Fentanil:</strong> Stabile (100:1) vs Rotazione/Fragile (150:1)</li>
                  <li><strong>Fonti:</strong> Linee Guida Ministero della Salute - Gestione del Dolore</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
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
                <div class="stat-number">6</div>
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
          <div class="category-card identificazione" onclick="navigateToSection('identificazione-home')">
            <div class="category-header">
              <div class="category-icon">🔍</div>
              <div class="category-info">
                <h5>Identificazione</h5>
                <small>3 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-success">✅ Disponibile</span>
              </div>
            </div>
            <div class="category-description">
              Strumenti per identificare pazienti eleggibili per cure palliative
            </div>
            <div class="category-tools">
              <span class="tool-badge available">NECPAL 3.1</span>
              <span class="tool-badge available">NECPAL 4.0</span>
              <span class="tool-badge available">SPICT</span>
            </div>
          </div>

          <!-- COMPLESSITÀ -->
          <div class="category-card complessita" onclick="window.location.href='complessita.php'">
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
              <span class="tool-badge available">IDC-PAL</span>
            </div>
          </div>

          <!-- PERFORMANCE -->
          <div class="category-card performance" onclick="navigateToSection('performance-home')">
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
              <span class="tool-badge available">BADL</span>
              <span class="tool-badge available">IADL</span>
            </div>
          </div>

          <!-- PROGNOSI -->
          <div class="category-card prognosi" onclick="openPrognosiHome()">
            <div class="category-header">
              <div class="category-icon">📈</div>
              <div class="category-info">
                <h5>Prognosi</h5>
                <small>2 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-success">✅ Disponibile</span>
              </div>
            </div>
            <div class="category-description">
              Strumenti per la valutazione prognostica
            </div>
            <div class="category-tools">
              <span class="tool-badge available">PPI</span>
              <span class="tool-badge available">PaP Score</span>
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
          <div class="category-card dolore" onclick="window.location.href='dolore.php'">
            <div class="category-header">
              <div class="category-icon">😣</div>
              <div class="category-info">
                <h5>Dolore</h5>
                <small>1 strumento</small>
              </div>
              <div class="category-status">
                <span class="badge bg-success">✅ Disponibile</span>
              </div>
            </div>
            <div class="category-description">
              Strumenti specializzati per la valutazione del dolore
            </div>
            <div class="category-tools">
              <span class="tool-badge available">DN4</span>
            </div>
          </div>

          <!-- DELIRIUM -->
          <div class="category-card delirium" onclick="window.location.href='delirium.php'">
            <div class="category-header">
              <div class="category-icon">🧩</div>
              <div class="category-info">
                <h5>Delirium</h5>
                <small>2 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-success">✅ Disponibile</span>
              </div>
            </div>
            <div class="category-description">
              Strumenti per assessment e screening del delirium
            </div>
            <div class="category-tools">
              <span class="tool-badge available">4AT</span>
              <span class="tool-badge available">CAM</span>
            </div>
          </div>

          <!-- SEDAZIONE -->
          <div class="category-card sedazione" onclick="window.location.href='sedazione.php'">
            <div class="category-header">
              <div class="category-icon">💤</div>
              <div class="category-info">
                <h5>Sedazione</h5>
                <small>2 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-success">✅ Disponibile</span>
              </div>
            </div>
            <div class="category-description">
              Scale per monitoraggio del livello di sedazione
            </div>
            <div class="category-tools">
              <span class="tool-badge available">RASS</span>
              <span class="tool-badge available">Ramsey</span>
            </div>
          </div>

          <!-- CAREGIVING -->
          <div class="category-card caregiving" onclick="window.location.href='caregiving.php'">
            <div class="category-header">
              <div class="category-icon">👥</div>
              <div class="category-info">
                <h5>Caregiving</h5>
                <small>2 strumenti</small>
              </div>
              <div class="category-status">
                <span class="badge bg-success">✅ Disponibile</span>
              </div>
            </div>
            <div class="category-description">
              Strumenti per valutare burden e soddisfazione dei caregiver
            </div>
            <div class="category-tools">
              <span class="tool-badge available">ZCB-7</span>
              <span class="tool-badge available">FAMCARE-2</span>
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

    <!-- SEZIONE NECPAL 3.1 -->
    <?php include __DIR__ . '/strumenti-necpal31.php'; ?>

    <!-- SEZIONE NECPAL 4.0 -->
    <?php include __DIR__ . '/strumenti-necpal40.php'; ?>

    <!-- SEZIONE SPICT -->
    <?php include __DIR__ . '/strumenti-spict.php'; ?>

    <!-- SEZIONE IDC-PAL -->
    <?php include __DIR__ . '/strumenti-idcpal.php'; ?>

    <!-- SEZIONE MULTIDIMENSIONALE -->
    <?php include __DIR__ . '/strumenti-multidimensionali.php'; ?>

    <!-- SEZIONE IPOS -->
    <?php include __DIR__ . '/strumenti-ipos.php'; ?>

    <!-- SEZIONE PERFORMANCE - nuova struttura -->
    <?php include __DIR__ . '/strumenti-performance.php'; ?>

    <!-- SEZIONE PROGNOSI -->
    <?php include __DIR__ . '/strumenti-prognosi.php'; ?>

    <!-- SEZIONE ESAS -->
    <?php include __DIR__ . '/strumenti-esas.php'; ?>

    <!-- SEZIONE DN4 -->
    <?php include __DIR__ . '/strumenti-dn4.php'; ?>

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
<script src="js/dashboard.js"></script>
<script src="js/strumenti-valutazione.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const d = document.getElementById("today-date-home");
    if (d) d.textContent = new Date().toLocaleDateString("it-IT");
    const hash = window.location.hash.substring(1);
    if (hash) navigateToSection(hash);
  });
</script>
</body>
</html>
