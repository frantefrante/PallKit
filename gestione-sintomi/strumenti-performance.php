<?php
// gestione-sintomi/strumenti-performance.php
?>
<link rel="stylesheet" href="css/performance.css">

<!-- SEZIONE PERFORMANCE -->
<section id="performance-home" class="p-4" style="display:none;">
  <div class="performance-container">
    <!-- Header -->
    <div class="performance-header">
      <h1><i class="fas fa-running me-2"></i>Scale di Performance</h1>
      <p>Strumenti di valutazione funzionale standardizzati per la pratica clinica in cure palliative e medicina generale</p>
    </div>

    <!-- Griglia Strumenti -->
    <div class="tools-grid">
      <!-- AKPS Card -->
      <div class="tool-card tool-card-compact h-100 akps-card">
        <div class="tool-header">
          <div class="tool-icon-large">
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
          <span class="feature-badge">Scala 0-100</span>
          <span class="feature-badge">10 livelli</span>
          <span class="feature-badge">Cure palliative</span>
        </div>
        
        <div class="tool-actions">
          <button class="btn btn-primary btn-action" onclick="openAKPSCompile()">
            <i class="fas fa-edit me-2"></i>Compila
          </button>
          <button class="btn btn-outline-primary btn-action" onclick="openAKPSVisualize()">
            <i class="fas fa-table me-2"></i>Visualizza
          </button>
        </div>
      </div>

      <!-- PPS Card -->
      <div class="tool-card tool-card-compact h-100 pps-card">
        <div class="tool-header">
          <div class="tool-icon-large">
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
          <span class="feature-badge">Scala 0-100%</span>
          <span class="feature-badge">5 domini</span>
          <span class="feature-badge">Prognosi</span>
        </div>
        
        <div class="tool-actions">
          <button class="btn btn-primary btn-action" onclick="openPPSCompile()">
            <i class="fas fa-edit me-2"></i>Compila
          </button>
          <button class="btn btn-outline-primary btn-action" onclick="openPPSVisualize()">
            <i class="fas fa-table me-2"></i>Visualizza
          </button>
        </div>
      </div>

      <!-- ADL Card -->
      <div class="tool-card tool-card-compact h-100 adl-card">
        <div class="tool-header">
          <div class="tool-icon-large">
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
          <span class="feature-badge">10 attività</span>
          <span class="feature-badge">Scala 0-100</span>
          <span class="feature-badge">Gold standard</span>
        </div>
        
        <div class="tool-actions">
          <button class="btn btn-primary btn-action" onclick="openADLCompile()">
            <i class="fas fa-edit me-2"></i>Compila
          </button>
          <button class="btn btn-outline-primary btn-action" onclick="openADLVisualize()">
            <i class="fas fa-table me-2"></i>Visualizza
          </button>
        </div>
      </div>

      <!-- BADL Card -->
      <div class="tool-card tool-card-compact h-100 badl-card">
        <div class="tool-header">
          <div class="tool-icon-large">
            <span class="tool-letters">BD</span>
          </div>
          <div class="tool-info">
            <h4>BADL</h4>
            <div class="tool-subtitle">Basic Activities of Daily Living</div>
          </div>
        </div>
        
        <div class="tool-description">
          Valutazione delle attività di base della vita quotidiana con sistema di scoring automatico. Versione semplificata per screening rapido e monitoraggio.
        </div>
        
        <div class="tool-features">
          <span class="feature-badge">6 attività</span>
          <span class="feature-badge">Scala 0-3</span>
          <span class="feature-badge">Screening</span>
        </div>
        
        <div class="tool-actions">
          <button class="btn btn-primary btn-action" onclick="openBADLCompile()">
            <i class="fas fa-edit me-2"></i>Compila
          </button>
          <button class="btn btn-outline-primary btn-action" onclick="openBADLVisualize()">
            <i class="fas fa-table me-2"></i>Visualizza
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MODALI PERFORMANCE -->

<!-- Modal AKPS -->
<div id="modal-akps" class="performance-modal">
  <div class="modal-content">
    <div class="modal-header">
      <h3>AKPS - Australia-modified Karnofsky Performance Status</h3>
      <p>Valutazione funzionale globale per pazienti in cure palliative</p>
      <button class="modal-close" onclick="closePerformanceModal('akps')">
        <i class="fas fa-times"></i>
      </button>
    </div>
    
    <div class="modal-body">
      <!-- Mode Selector -->
      <div class="mode-selector">
        <button class="mode-btn active" onclick="switchPerformanceMode('akps', 'compile')">
          <i class="fas fa-edit me-2"></i>Compila
        </button>
        <button class="mode-btn" onclick="switchPerformanceMode('akps', 'view')">
          <i class="fas fa-table me-2"></i>Visualizza Scala
        </button>
      </div>

      <!-- Sezione Compila -->
      <div id="akps-compile" class="content-section active">
        <!-- Dati Paziente -->
        <div class="patient-info">
          <h4><i class="fas fa-user me-2"></i>Dati Paziente</h4>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Nome Paziente</label>
              <input type="text" class="form-control" id="akps-patient-name" placeholder="Inserisci nome paziente">
            </div>
            <div class="form-group">
              <label class="form-label">Data Valutazione</label>
              <input type="date" class="form-control" id="akps-date">
            </div>
          </div>
        </div>

        <!-- Progress -->
        <div class="progress-container">
          <div class="progress-label">
            <span>Completamento valutazione</span>
            <span id="akps-progress-text">0%</span>
          </div>
          <div class="progress-bar">
            <div class="progress-fill" id="akps-progress" style="width: 0%"></div>
          </div>
        </div>

        <!-- Form AKPS -->
        <div class="form-section">
          <h4>Seleziona il livello funzionale del paziente</h4>
          <div class="radio-grid" id="akps-options">
            <div class="radio-option" onclick="selectAKPS(100)">
              <strong>100 - Normale, nessuna evidenza di malattia</strong><br>
              <small>Attività normale, nessun sintomo o segno di malattia</small>
            </div>
            <div class="radio-option" onclick="selectAKPS(90)">
              <strong>90 - Normale attività, segni e sintomi minori</strong><br>
              <small>Normale attività, evidenza minore di malattia</small>
            </div>
            <div class="radio-option" onclick="selectAKPS(80)">
              <strong>80 - Attività normale con sforzo</strong><br>
              <small>Normale attività con sforzo, alcuni segni o sintomi di malattia</small>
            </div>
            <div class="radio-option" onclick="selectAKPS(70)">
              <strong>70 - Si prende cura di sé, incapace di attività normale</strong><br>
              <small>Cura di sé, incapace di attività normale o lavoro attivo</small>
            </div>
            <div class="radio-option" onclick="selectAKPS(60)">
              <strong>60 - Richiede assistenza occasionale</strong><br>
              <small>Richiede assistenza occasionale, ma riesce a prendersi cura della maggior parte delle necessità</small>
            </div>
            <div class="radio-option" onclick="selectAKPS(50)">
              <strong>50 - Richiede assistenza considerevole</strong><br>
              <small>Richiede assistenza considerevole e cure mediche frequenti</small>
            </div>
            <div class="radio-option" onclick="selectAKPS(40)">
              <strong>40 - Disabile, richiede cure speciali</strong><br>
              <small>Disabile, richiede cure speciali e assistenza</small>
            </div>
            <div class="radio-option" onclick="selectAKPS(30)">
              <strong>30 - Severamente disabile</strong><br>
              <small>Severamente disabile, ricovero indicato</small>
            </div>
            <div class="radio-option" onclick="selectAKPS(20)">
              <strong>20 - Molto malato</strong><br>
              <small>Molto malato, ricovero e trattamento attivo necessari</small>
            </div>
            <div class="radio-option" onclick="selectAKPS(10)">
              <strong>10 - Moribondo</strong><br>
              <small>Moribondo, processo di morte rapidamente progressivo</small>
            </div>
          </div>
        </div>

        <!-- Risultati AKPS -->
        <div id="akps-results" class="score-display" style="display: none;">
          <div class="score-number" id="akps-score">-</div>
          <div class="score-interpretation" id="akps-interpretation">-</div>
          <div class="score-description" id="akps-description">-</div>
        </div>

        <!-- Bottoni Azione -->
        <div class="action-buttons">
          <button class="btn btn-success" onclick="generatePerformanceReport('akps')">
            <i class="fas fa-file-download"></i>Genera Report
          </button>
          <button class="btn btn-warning" onclick="printPerformanceTemplate('akps')">
            <i class="fas fa-print"></i>Stampa Template
          </button>
          <button class="btn btn-danger" onclick="resetPerformanceForm('akps')">
            <i class="fas fa-redo"></i>Azzera
          </button>
        </div>
      </div>

      <!-- Sezione Visualizza -->
      <div id="akps-view" class="content-section">
        <div class="info-box">
          <h5><i class="fas fa-info-circle"></i>Informazioni AKPS</h5>
          <p>L'Australia-modified Karnofsky Performance Status (AKPS) è una scala modificata del tradizionale KPS, sviluppata specificamente per pazienti in cure palliative.</p>
        </div>

        <table class="scale-table">
          <thead>
            <tr>
              <th>Punteggio</th>
              <th>Descrizione</th>
              <th>Caratteristiche cliniche</th>
            </tr>
          </thead>
          <tbody>
            <tr><td><strong>100</strong></td><td>Normale, nessuna evidenza di malattia</td><td>Attività normale, nessun sintomo</td></tr>
            <tr><td><strong>90</strong></td><td>Normale attività, segni e sintomi minori</td><td>Attività normale, evidenza minore di malattia</td></tr>
            <tr><td><strong>80</strong></td><td>Attività normale con sforzo</td><td>Alcuni segni o sintomi di malattia</td></tr>
            <tr><td><strong>70</strong></td><td>Si prende cura di sé, incapace di attività normale</td><td>Incapace di attività normale o lavoro attivo</td></tr>
            <tr><td><strong>60</strong></td><td>Richiede assistenza occasionale</td><td>Riesce a prendersi cura della maggior parte delle necessità</td></tr>
            <tr><td><strong>50</strong></td><td>Richiede assistenza considerevole</td><td>Richiede cure mediche frequenti</td></tr>
            <tr><td><strong>40</strong></td><td>Disabile, richiede cure speciali</td><td>Richiede cure speciali e assistenza</td></tr>
            <tr><td><strong>30</strong></td><td>Severamente disabile</td><td>Ricovero indicato</td></tr>
            <tr><td><strong>20</strong></td><td>Molto malato</td><td>Ricovero e trattamento attivo necessari</td></tr>
            <tr><td><strong>10</strong></td><td>Moribondo</td><td>Processo di morte rapidamente progressivo</td></tr>
            <tr><td><strong>0</strong></td><td>Morto</td><td>-</td></tr>
          </tbody>
        </table>

        <div class="info-box">
          <h5><i class="fas fa-clinical-notes"></i>Indicazioni cliniche</h5>
          <ul>
            <li><strong>AKPS ≥80:</strong> Buone condizioni funzionali, candidato per terapie attive</li>
            <li><strong>AKPS 60-70:</strong> Condizioni moderate, valutare supporto domiciliare</li>
            <li><strong>AKPS 40-50:</strong> Condizioni compromesse, cure palliative intensive</li>
            <li><strong>AKPS ≤30:</strong> Condizioni severe, cure di fine vita</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal PPS -->
<div id="modal-pps" class="performance-modal">
  <div class="modal-content">
    <div class="modal-header">
      <h3>PPS - Palliative Performance Scale</h3>
      <p>Strumento multidimensionale per valutazione prognostica</p>
      <button class="modal-close" onclick="closePerformanceModal('pps')">
        <i class="fas fa-times"></i>
      </button>
    </div>
    
    <div class="modal-body">
      <div class="mode-selector">
        <button class="mode-btn active" onclick="switchPerformanceMode('pps', 'compile')">
          <i class="fas fa-edit me-2"></i>Compila
        </button>
        <button class="mode-btn" onclick="switchPerformanceMode('pps', 'view')">
          <i class="fas fa-table me-2"></i>Visualizza Scala
        </button>
      </div>

      <!-- Sezione Compila PPS -->
      <div id="pps-compile" class="content-section active">
        <div class="patient-info">
          <h4><i class="fas fa-user me-2"></i>Dati Paziente</h4>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Nome Paziente</label>
              <input type="text" class="form-control" id="pps-patient-name" placeholder="Inserisci nome paziente">
            </div>
            <div class="form-group">
              <label class="form-label">Data Valutazione</label>
              <input type="date" class="form-control" id="pps-date">
            </div>
          </div>
        </div>

        <div class="progress-container">
          <div class="progress-label">
            <span>Completamento valutazione</span>
            <span id="pps-progress-text">0%</span>
          </div>
          <div class="progress-bar">
            <div class="progress-fill" id="pps-progress" style="width: 0%"></div>
          </div>
        </div>

        <div class="form-section">
          <h4>Seleziona il livello PPS del paziente</h4>
          <div class="radio-grid" id="pps-options">
            <div class="radio-option" onclick="selectPPS(100)">
              <strong>100% - Attività normale completa</strong><br>
              <small>Deambulazione completa, attività normale, auto-cura completa</small>
            </div>
            <div class="radio-option" onclick="selectPPS(90)">
              <strong>90% - Attività normale, malattia evidente</strong><br>
              <small>Deambulazione completa, attività normale con evidenza di malattia</small>
            </div>
            <div class="radio-option" onclick="selectPPS(80)">
              <strong>80% - Attività normale con sforzo</strong><br>
              <small>Deambulazione completa, attività normale con sforzo</small>
            </div>
            <div class="radio-option" onclick="selectPPS(70)">
              <strong>70% - Deambulazione ridotta</strong><br>
              <small>Deambulazione ridotta, incapace di attività normale</small>
            </div>
            <div class="radio-option" onclick="selectPPS(60)">
              <strong>60% - Deambulazione ridotta, assistenza occasionale</strong><br>
              <small>Deambulazione ridotta, incapace di hobby/lavoro</small>
            </div>
            <div class="radio-option" onclick="selectPPS(50)">
              <strong>50% - Principalmente seduto/sdraiato</strong><br>
              <small>Seduto/sdraiato, incapace di qualsiasi lavoro</small>
            </div>
            <div class="radio-option" onclick="selectPPS(40)">
              <strong>40% - Principalmente a letto</strong><br>
              <small>Principalmente a letto, incapace di auto-cura</small>
            </div>
            <div class="radio-option" onclick="selectPPS(30)">
              <strong>30% - Totalmente allettato</strong><br>
              <small>Totalmente allettato, assistenza totale</small>
            </div>
            <div class="radio-option" onclick="selectPPS(20)">
              <strong>20% - Totalmente allettato, assunzione minima</strong><br>
              <small>Totalmente allettato, assunzione minima di cibo</small>
            </div>
            <div class="radio-option" onclick="selectPPS(10)">
              <strong>10% - Totalmente allettato, cura della bocca</strong><br>
              <small>Totalmente allettato, solo cura della bocca</small>
            </div>
          </div>
        </div>

        <div id="pps-results" class="score-display" style="display: none;">
          <div class="score-number" id="pps-score">-</div>
          <div class="score-interpretation" id="pps-interpretation">-</div>
          <div class="score-description" id="pps-description">-</div>
        </div>

        <div class="action-buttons">
          <button class="btn btn-success" onclick="generatePerformanceReport('pps')">
            <i class="fas fa-file-download"></i>Genera Report
          </button>
          <button class="btn btn-warning" onclick="printPerformanceTemplate('pps')">
            <i class="fas fa-print"></i>Stampa Template
          </button>
          <button class="btn btn-danger" onclick="resetPerformanceForm('pps')">
            <i class="fas fa-redo"></i>Azzera
          </button>
        </div>
      </div>

      <!-- Sezione Visualizza PPS -->
      <div id="pps-view" class="content-section">
        <div class="info-box">
          <h5><i class="fas fa-info-circle"></i>Informazioni PPS</h5>
          <p>La Palliative Performance Scale (PPS) è uno strumento multidimensionale che valuta cinque domini funzionali per determinare la prognosi in pazienti con malattie avanzate.</p>
        </div>

        <table class="scale-table">
          <thead>
            <tr>
              <th>PPS%</th>
              <th>Deambulazione</th>
              <th>Attività</th>
              <th>Auto-cura</th>
              <th>Assunzione cibo</th>
              <th>Coscienza</th>
            </tr>
          </thead>
          <tbody>
            <tr><td><strong>100%</strong></td><td>Completa</td><td>Normale, nessuna evidenza</td><td>Completa</td><td>Normale</td><td>Piena</td></tr>
            <tr><td><strong>90%</strong></td><td>Completa</td><td>Normale, evidenza malattia</td><td>Completa</td><td>Normale</td><td>Piena</td></tr>
            <tr><td><strong>80%</strong></td><td>Completa</td><td>Normale con sforzo</td><td>Completa</td><td>Normale/ridotta</td><td>Piena</td></tr>
            <tr><td><strong>70%</strong></td><td>Ridotta</td><td>Incapace attività normale</td><td>Completa</td><td>Normale/ridotta</td><td>Piena</td></tr>
            <tr><td><strong>60%</strong></td><td>Ridotta</td><td>Incapace hobby/lavoro</td><td>Assistenza occasionale</td><td>Normale/ridotta</td><td>Piena/confusione</td></tr>
            <tr><td><strong>50%</strong></td><td>Seduto/sdraiato</td><td>Incapace qualsiasi lavoro</td><td>Assistenza considerevole</td><td>Normale/ridotta</td><td>Piena/confusione</td></tr>
            <tr><td><strong>40%</strong></td><td>Principalmente a letto</td><td>Incapace auto-cura</td><td>Principalmente assistenza</td><td>Normale/ridotta</td><td>Piena/sonnolenza</td></tr>
            <tr><td><strong>30%</strong></td><td>Totalmente allettato</td><td>Incapace auto-cura</td><td>Assistenza totale</td><td>Ridotta</td><td>Piena/sonnolenza</td></tr>
            <tr><td><strong>20%</strong></td><td>Totalmente allettato</td><td>Incapace auto-cura</td><td>Assistenza totale</td><td>Assunzione minima</td><td>Piena/sonnolenza</td></tr>
            <tr><td><strong>10%</strong></td><td>Totalmente allettato</td><td>Incapace auto-cura</td><td>Assistenza totale</td><td>Solo cura bocca</td><td>Sonnolenza/coma</td></tr>
          </tbody>
        </table>

        <div class="info-box">
          <h5><i class="fas fa-chart-line"></i>Indicazioni prognostiche</h5>
          <ul>
            <li><strong>PPS ≥70%:</strong> Prognosi in mesi-anni, candidato per terapie attive</li>
            <li><strong>PPS 50-60%:</strong> Prognosi in settimane-mesi, valutare cure palliative</li>
            <li><strong>PPS 30-40%:</strong> Prognosi in settimane, cure palliative intensive</li>
            <li><strong>PPS ≤20%:</strong> Prognosi in giorni-settimane, cure di fine vita</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal ADL -->
<div id="modal-adl" class="performance-modal">
  <div class="modal-content">
    <div class="modal-header">
      <h3>ADL - Activities of Daily Living (Indice di Barthel)</h3>
      <p>Valutazione dell'autonomia nelle attività della vita quotidiana</p>
      <button class="modal-close" onclick="closePerformanceModal('adl')">
        <i class="fas fa-times"></i>
      </button>
    </div>
    
    <div class="modal-body">
      <div class="mode-selector">
        <button class="mode-btn active" onclick="switchPerformanceMode('adl', 'compile')">
          <i class="fas fa-edit me-2"></i>Compila
        </button>
        <button class="mode-btn" onclick="switchPerformanceMode('adl', 'view')">
          <i class="fas fa-table me-2"></i>Visualizza Scala
        </button>
      </div>

      <!-- Sezione Compila ADL -->
      <div id="adl-compile" class="content-section active">
        <div class="patient-info">
          <h4><i class="fas fa-user me-2"></i>Dati Paziente</h4>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Nome Paziente</label>
              <input type="text" class="form-control" id="adl-patient-name" placeholder="Inserisci nome paziente">
            </div>
            <div class="form-group">
              <label class="form-label">Data Valutazione</label>
              <input type="date" class="form-control" id="adl-date">
            </div>
          </div>
        </div>

        <div class="info-box">
          <h5><i class="fas fa-info-circle"></i>Istruzioni</h5>
          <p>L'Indice di Barthel valuta 10 attività della vita quotidiana. Per una valutazione completa e accurata, si consiglia di utilizzare il template stampabile.</p>
        </div>

        <div class="form-section">
          <h4>Attività da valutare</h4>
          <p><strong>Nota:</strong> Questa è una versione semplificata. Per la valutazione completa utilizzare il modulo cartaceo o la versione online dedicata.</p>
          
          <div class="info-box">
            <h5><i class="fas fa-list"></i>Le 10 attività del Barthel Index</h5>
            <ul>
              <li><strong>Alimentazione</strong> (0-2 punti) - Capacità di portare il cibo alla bocca</li>
              <li><strong>Bagno</strong> (0-1 punto) - Capacità di lavarsi completamente</li>
              <li><strong>Cura personale</strong> (0-1 punto) - Igiene di base, denti, capelli</li>
              <li><strong>Vestirsi</strong> (0-2 punti) - Indossare e togliere i vestiti</li>
              <li><strong>Controllo intestinale</strong> (0-2 punti) - Continenza fecale</li>
              <li><strong>Controllo vescicale</strong> (0-2 punti) - Continenza urinaria</li>
              <li><strong>Uso del WC</strong> (0-2 punti) - Transfert e igiene al WC</li>
              <li><strong>Trasferimento letto-sedia</strong> (0-3 punti) - Capacità di spostarsi</li>
              <li><strong>Mobilità</strong> (0-3 punti) - Deambulazione su superfici piane</li>
              <li><strong>Scale</strong> (0-2 punti) - Salire e scendere le scale</li>
            </ul>
          </div>
        </div>

        <div class="progress-container">
          <div class="progress-label">
            <span>Per valutazione completa</span>
            <span>Utilizza template</span>
          </div>
          <div class="progress-bar">
            <div class="progress-fill" style="width: 0%"></div>
          </div>
        </div>

        <div class="action-buttons">
          <button class="btn btn-warning" onclick="printPerformanceTemplate('adl')">
            <i class="fas fa-print"></i>Stampa Template Completo
          </button>
          <button class="btn btn-success" onclick="window.open('#', '_blank')">
            <i class="fas fa-external-link-alt"></i>Versione Online Completa
          </button>
        </div>
      </div>

      <!-- Sezione Visualizza ADL -->
      <div id="adl-view" class="content-section">
        <div class="info-box">
          <h5><i class="fas fa-info-circle"></i>Informazioni ADL (Indice di Barthel)</h5>
          <p>L'Indice di Barthel è lo strumento gold standard per valutare l'autonomia nelle attività della vita quotidiana. Punteggio massimo: 100 punti.</p>
        </div>

        <table class="scale-table">
          <thead>
            <tr>
              <th>Attività</th>
              <th>Punteggio</th>
              <th>Criteri di valutazione</th>
            </tr>
          </thead>
          <tbody>
            <tr><td><strong>Alimentazione</strong></td><td>0-2</td><td>0=assistenza; 1=aiuto tagliare; 2=indipendente</td></tr>
            <tr><td><strong>Bagno</strong></td><td>0-1</td><td>0=dipendente; 1=indipendente</td></tr>
            <tr><td><strong>Cura personale</strong></td><td>0-1</td><td>0=assistenza; 1=indipendente</td></tr>
            <tr><td><strong>Vestirsi</strong></td><td>0-2</td><td>0=dipendente; 1=assistenza; 2=indipendente</td></tr>
            <tr><td><strong>Controllo intestinale</strong></td><td>0-2</td><td>0=incontinente; 1=occasionale; 2=continente</td></tr>
            <tr><td><strong>Controllo vescicale</strong></td><td>0-2</td><td>0=incontinente; 1=occasionale; 2=continente</td></tr>
            <tr><td><strong>Uso WC</strong></td><td>0-2</td><td>0=dipendente; 1=assistenza; 2=indipendente</td></tr>
            <tr><td><strong>Trasferimento</strong></td><td>0-3</td><td>0=incapace; 1=assistenza maggiore; 2=minore; 3=indipendente</td></tr>
            <tr><td><strong>Mobilità</strong></td><td>0-3</td><td>0=immobile; 1=sedia rotelle; 2=aiuto; 3=indipendente</td></tr>
            <tr><td><strong>Scale</strong></td><td>0-2</td><td>0=incapace; 1=assistenza; 2=indipendente</td></tr>
          </tbody>
        </table>

        <div class="info-box">
          <h5><i class="fas fa-chart-bar"></i>Interpretazione Punteggi</h5>
          <ul>
            <li><strong>0-20:</strong> Dipendenza totale - Necessita assistenza completa</li>
            <li><strong>21-60:</strong> Dipendenza severa - Richiede assistenza maggiore</li>
            <li><strong>61-90:</strong> Dipendenza moderata - Necessita supporto parziale</li>
            <li><strong>91-99:</strong> Dipendenza lieve - Quasi indipendente</li>
            <li><strong>100:</strong> Indipendenza completa - Totalmente autonomo</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal BADL -->
<div id="modal-badl" class="performance-modal">
  <div class="modal-content">
    <div class="modal-header">
      <h3>BADL - Basic Activities of Daily Living</h3>
      <p>Valutazione rapida delle attività di base della vita quotidiana</p>
      <button class="modal-close" onclick="closePerformanceModal('badl')">
        <i class="fas fa-times"></i>
      </button>
    </div>
    
    <div class="modal-body">
      <div class="mode-selector">
        <button class="mode-btn active" onclick="switchPerformanceMode('badl', 'compile')">
          <i class="fas fa-edit me-2"></i>Compila
        </button>
        <button class="mode-btn" onclick="switchPerformanceMode('badl', 'view')">
          <i class="fas fa-table me-2"></i>Visualizza Scala
        </button>
      </div>

      <!-- Sezione Compila BADL -->
      <div id="badl-compile" class="content-section active">
        <div class="patient-info">
          <h4><i class="fas fa-user me-2"></i>Dati Paziente</h4>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Nome Paziente</label>
              <input type="text" class="form-control" id="badl-patient-name" placeholder="Inserisci nome paziente">
            </div>
            <div class="form-group">
              <label class="form-label">Data Valutazione</label>
              <input type="date" class="form-control" id="badl-date">
            </div>
          </div>
        </div>

        <div class="info-box">
          <h5><i class="fas fa-info-circle"></i>Istruzioni BADL</h5>
          <p>Valuta le 6 attività di base usando la scala 0-3 per ogni attività. Tempo di compilazione: 5-10 minuti. Versione completa disponibile tramite template.</p>
        </div>

        <div class="form-section">
          <h4>Attività di base da valutare</h4>
          <p><strong>Scala:</strong> 0 = Nessuna difficoltà | 1 = Qualche difficoltà | 2 = Grande difficoltà | 3 = Impossibile</p>
          
          <div class="info-box">
            <h5><i class="fas fa-tasks"></i>Le 6 attività BADL</h5>
            <ul>
              <li><strong>Igiene personale</strong> - Lavarsi, cura denti, capelli, rasarsi</li>
              <li><strong>Vestirsi</strong> - Indossare e togliere vestiti, scarpe</li>
              <li><strong>Alimentarsi</strong> - Portare cibo alla bocca, masticare, deglutire</li>
              <li><strong>Trasferimenti</strong> - Alzarsi, sedersi, spostarsi da letto a sedia</li>
              <li><strong>Mobilità nel letto</strong> - Girarsi, alzarsi, posizionarsi</li>
              <li><strong>Controllo sfinterico</strong> - Controllo vescica e intestino</li>
            </ul>
          </div>
        </div>

        <div class="progress-container">
          <div class="progress-label">
            <span>Per valutazione completa</span>
            <span>Utilizza template</span>
          </div>
          <div class="progress-bar">
            <div class="progress-fill" style="width: 0%"></div>
          </div>
        </div>

        <div class="action-buttons">
          <button class="btn btn-warning" onclick="printPerformanceTemplate('badl')">
            <i class="fas fa-print"></i>Stampa Template
          </button>
          <button class="btn btn-success" onclick="window.open('#', '_blank')">
            <i class="fas fa-external-link-alt"></i>Versione Online Completa
          </button>
        </div>
      </div>

      <!-- Sezione Visualizza BADL -->
      <div id="badl-view" class="content-section">
        <div class="info-box">
          <h5><i class="fas fa-info-circle"></i>Informazioni BADL</h5>
          <p>Le Basic Activities of Daily Living rappresentano un rapido screening delle funzioni essenziali per l'autonomia personale. Punteggio totale: 0-18 punti.</p>
        </div>

        <table class="scale-table">
          <thead>
            <tr>
              <th>Attività</th>
              <th>Scala 0-3</th>
              <th>Descrizione dettagliata</th>
            </tr>
          </thead>
          <tbody>
            <tr><td><strong>Igiene personale</strong></td><td>0-3</td><td>Lavarsi, denti, capelli, rasarsi</td></tr>
            <tr><td><strong>Vestirsi</strong></td><td>0-3</td><td>Indossare e togliere vestiti, scarpe</td></tr>
            <tr><td><strong>Alimentarsi</strong></td><td>0-3</td><td>Portare cibo alla bocca, masticare</td></tr>
            <tr><td><strong>Trasferimenti</strong></td><td>0-3</td><td>Alzarsi, sedersi, spostarsi</td></tr>
            <tr><td><strong>Mobilità nel letto</strong></td><td>0-3</td><td>Girarsi, alzarsi dal letto</td></tr>
            <tr><td><strong>Controllo sfinterico</strong></td><td>0-3</td><td>Controllo vescica e intestino</td></tr>
          </tbody>
        </table>

        <div class="info-box">
          <h5><i class="fas fa-chart-pie"></i>Interpretazione Punteggio Totale (0-18)</h5>
          <ul>
            <li><strong>0-3:</strong> Autonomia elevata - paziente sostanzialmente indipendente</li>
            <li><strong>4-9:</strong> Autonomia moderata - necessita supporto limitato</li>
            <li><strong>10-15:</strong> Dipendenza significativa - richiede assistenza regolare</li>
            <li><strong>16-18:</strong> Dipendenza totale - necessita assistenza continua</li>
          </ul>
        </div>

        <div class="info-box">
          <h5><i class="fas fa-lightbulb"></i>Utilizzo clinico</h5>
          <ul>
            <li>Screening rapido in ambito geriatrico e riabilitativo</li>
            <li>Valutazione iniziale in cure palliative</li>
            <li>Monitoraggio dell'evoluzione funzionale nel tempo</li>
            <li>Pianificazione assistenziale domiciliare</li>
            <li>Valutazione per inserimento in strutture residenziali</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/performance.js"></script>
