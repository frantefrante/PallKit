<?php
// gestione-sintomi/strumenti-performance.php
?>
<link rel="stylesheet" href="css/performance.css">
<link rel="stylesheet" href="css/pps.css">

<!-- SEZIONE PERFORMANCE -->
<section id="performance-home" class="p-4" style="display:none;">
  <div class="mb-3">
    <button class="btn btn-outline-success" onclick="navigateToSection('strumenti-valutazione-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
  </div>
  <div class="performance-container">
    <!-- Header -->
    <div class="performance-header">
      <h1><i class="fas fa-running me-2"></i>Scale di Performance</h1>
      <p>Strumenti di valutazione funzionale standardizzati per la pratica clinica in cure palliative e medicina generale</p>
    </div>

    <!-- Griglia Strumenti -->
    <div class="tools-grid performance-grid">
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


<!-- SEZIONI STRUMENTI PERFORMANCE -->

<!-- AKPS -->
<section id="akps-home" class="p-4" style="display:none;">
  <div class="mb-3">
    <button class="btn btn-outline-success me-2" onclick="navigateToSection('strumenti-valutazione-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-primary" onclick="navigateToSection('performance-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna a Performance
    </button>
  </div>
  <div class="modal-header">
    <h3>AKPS - Australia-modified Karnofsky Performance Status</h3>
    <p>Valutazione funzionale globale per pazienti in cure palliative</p>
  </div>
  <div class="modal-body">
    <div class="mode-selector">
      <button class="mode-btn active" onclick="switchPerformanceMode('akps', 'compile')">
        <i class="fas fa-edit me-2"></i>Compila
      </button>
      <button class="mode-btn" onclick="switchPerformanceMode('akps', 'view')">
        <i class="fas fa-table me-2"></i>Visualizza Scala
      </button>
    </div>

    <div id="akps-compile" class="content-section active">
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

      <div class="progress-container">
        <div class="progress-label">
          <span>Completamento valutazione</span>
          <span id="akps-progress-text">0%</span>
        </div>
        <div class="progress-bar">
          <div class="progress-fill" id="akps-progress" style="width: 0%"></div>
        </div>
      </div>

      <div class="form-section">
        <h4>Seleziona il livello funzionale del paziente</h4>
          <div class="radio-grid" id="akps-options">
            <div class="radio-option" onclick="selectAKPS(100)">
              <strong>100 – Normale; nessun disturbo, nessuna evidenza di malattia.</strong>
            </div>
            <div class="radio-option" onclick="selectAKPS(90)">
              <strong>90 – Capacità di svolgere attività normali; sintomi lievi o impercettibili.</strong>
            </div>
            <div class="radio-option" onclick="selectAKPS(80)">
              <strong>80 – Attività normali possibili con sforzo; manifestazione di sintomi.</strong>
            </div>
            <div class="radio-option" onclick="selectAKPS(70)">
              <strong>70 – Si prende cura di sè; impossibilità di svolgere attività normali o lavoro attivo.</strong>
            </div>
            <div class="radio-option" onclick="selectAKPS(60)">
              <strong>60 – Si prende cura della maggior parte dei bisogni, ma è necessaria assistenza occasionale.</strong>
            </div>
            <div class="radio-option" onclick="selectAKPS(50)">
              <strong>50 – Richiede assistenza considerevole e frequenti cure mediche.</strong>
            </div>
            <div class="radio-option" onclick="selectAKPS(40)">
              <strong>40 – A letto per più del 50% del tempo a causa di disabilità funzionale.</strong>
            </div>
            <div class="radio-option" onclick="selectAKPS(30)">
              <strong>30 – Quasi completamente costretto a letto.</strong>
            </div>
            <div class="radio-option" onclick="selectAKPS(20)">
              <strong>20 – Totalmente allettato; richiede cure infermieristiche estensive da parte di professionisti o familiari.</strong>
            </div>
            <div class="radio-option" onclick="selectAKPS(10)">
              <strong>10 – Comatoso o appena reattivo.</strong>
            </div>
            <div class="radio-option" onclick="selectAKPS(0)">
              <strong>0 – Decesso.</strong>
            </div>
          </div>
      </div>

      <div id="akps-results" class="score-display" style="display: none;">
        <div class="score-number" id="akps-score">-</div>
        <div class="score-interpretation" id="akps-interpretation">-</div>
        <div class="score-description" id="akps-description">-</div>
      </div>

      <div class="action-buttons">
        <button class="btn btn-success" onclick="printPerformanceSheet('akps')">
          <i class="fas fa-print"></i>Stampa Scheda
        </button>
        <button class="btn btn-danger" onclick="resetPerformanceForm('akps')">
          <i class="fas fa-redo"></i>Azzera
        </button>
      </div>
    </div>

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
          </tr>
        </thead>
        <tbody>
          <tr><td><strong>100</strong></td><td>Normale; nessun disturbo, nessuna evidenza di malattia.</td></tr>
          <tr><td><strong>90</strong></td><td>Capacità di svolgere attività normali; sintomi lievi o impercettibili.</td></tr>
          <tr><td><strong>80</strong></td><td>Attività normali possibili con sforzo; manifestazione di sintomi.</td></tr>
          <tr><td><strong>70</strong></td><td>Si prende cura di sè; impossibilità di svolgere attività normali o lavoro attivo.</td></tr>
          <tr><td><strong>60</strong></td><td>Si prende cura della maggior parte dei bisogni, ma è necessaria assistenza occasionale.</td></tr>
          <tr><td><strong>50</strong></td><td>Richiede assistenza considerevole e frequenti cure mediche.</td></tr>
          <tr><td><strong>40</strong></td><td>A letto per più del 50% del tempo a causa di disabilità funzionale.</td></tr>
          <tr><td><strong>30</strong></td><td>Quasi completamente costretto a letto.</td></tr>
          <tr><td><strong>20</strong></td><td>Totalmente allettato; richiede cure infermieristiche estensive da parte di professionisti o familiari.</td></tr>
          <tr><td><strong>10</strong></td><td>Comatoso o appena reattivo.</td></tr>
          <tr><td><strong>0</strong></td><td>Decesso.</td></tr>
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

      <div class="action-buttons">
        <button class="btn btn-warning" onclick="printPerformanceTemplate('akps')">
          <i class="fas fa-print"></i>Stampa Template
        </button>
      </div>
    </div>
  </div>
</section>


<!-- PPS -->
<section id="pps-home" class="p-4" style="display:none;">
  <div class="mb-3">
    <button class="btn btn-outline-success me-2" onclick="navigateToSection('strumenti-valutazione-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-primary" onclick="navigateToSection('performance-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna a Performance
    </button>
  </div>
  <div class="pps-container">
    <div class="pps-header">
      <h1>PPS - Palliative Performance Scale</h1>
      <div class="subtitle">Strumento di Valutazione Funzionale in Cure Palliative</div>
      <div class="version-badge">Versione 2 (PPSv2)</div>
    </div>

    <div class="mode-selector">
      <a href="#" class="mode-btn active" onclick="switchPerformanceMode('pps','compile')">
        📝 Compila
      </a>
      <a href="#" class="mode-btn" onclick="switchPerformanceMode('pps','view')">
        📊 Visualizza Scala
      </a>
      <a href="#" class="mode-btn" onclick="switchPerformanceMode('pps','definitions')">
        📖 Definizioni
      </a>
    </div>

    <div id="pps-compile" class="content-section active">
      <div class="patient-data">
        <h3>📋 Dati Paziente</h3>
        <div class="form-row">
          <div class="form-group">
            <label for="pps-patient-name">Nome e Cognome</label>
            <input type="text" id="pps-patient-name" placeholder="Inserisci nome paziente">
          </div>
          <div class="form-group">
            <label for="pps-date">Data Valutazione</label>
            <input type="date" id="pps-date">
          </div>
        </div>
      </div>

      <div class="pps-scale-container">
        <div class="scale-header">
          <h3>🎯 Palliative Performance Scale (PPSv2)</h3>
          <p>Seleziona la riga che corrisponde meglio alle condizioni attuali del paziente</p>
        </div>

        <div class="scale-instructions">
          <strong>Istruzioni:</strong> Il livello PPS è determinato leggendo da sinistra a destra per trovare il "migliore adattamento orizzontale". 
          Inizia dalla colonna di sinistra leggendo verso il basso fino a determinare l'attuale deambulazione, poi leggi trasversalmente 
          alla colonna successiva e verso il basso fino a determinare ogni colonna. Quindi, le colonne di "sinistra" hanno precedenza 
          sulle colonne di "destra". È sempre richiesto un giudizio clinico per il miglior adattamento orizzontale.
        </div>

        <table class="pps-table" id="pps-table">
          <thead>
            <tr>
              <th>Livello PPS</th>
              <th>Deambulazione</th>
              <th>Livello di Attività<br>& Evidenza di Malattia</th>
              <th>Auto-cura</th>
              <th>Assunzione</th>
              <th>Livello di Coscienza</th>
            </tr>
          </thead>
          <tbody>
            <tr onclick="selectPPSLevel(100)" data-level="100">
              <td class="pps-level">100%</td>
              <td>Completa</td>
              <td>Attività e lavoro normale<br>Nessuna evidenza di malattia</td>
              <td>Completa</td>
              <td>Normale</td>
              <td>Piena</td>
            </tr>
            <tr onclick="selectPPSLevel(90)" data-level="90">
              <td class="pps-level">90%</td>
              <td>Completa</td>
              <td>Attività e lavoro normale<br>Qualche evidenza di malattia</td>
              <td>Completa</td>
              <td>Normale</td>
              <td>Piena</td>
            </tr>
            <tr onclick="selectPPSLevel(80)" data-level="80">
              <td class="pps-level">80%</td>
              <td>Completa</td>
              <td>Attività e lavoro normale con sforzo<br>Qualche evidenza di malattia</td>
              <td>Completa</td>
              <td>Normale o ridotta</td>
              <td>Piena</td>
            </tr>
            <tr onclick="selectPPSLevel(70)" data-level="70">
              <td class="pps-level">70%</td>
              <td>Ridotta</td>
              <td>Incapace di attività e lavoro normale<br>Malattia significativa</td>
              <td>Completa</td>
              <td>Normale o ridotta</td>
              <td>Piena</td>
            </tr>
            <tr onclick="selectPPSLevel(60)" data-level="60">
              <td class="pps-level">60%</td>
              <td>Ridotta</td>
              <td>Incapace di hobby/lavori domestici<br>Malattia significativa</td>
              <td>Assistenza occasionale</td>
              <td>Normale o ridotta</td>
              <td>Piena o confusione</td>
            </tr>
            <tr onclick="selectPPSLevel(50)" data-level="50">
              <td class="pps-level">50%</td>
              <td>Principalmente seduto/sdraiato</td>
              <td>Incapace di qualsiasi lavoro<br>Malattia estesa</td>
              <td>Assistenza considerevole</td>
              <td>Normale o ridotta</td>
              <td>Piena o sonnolenza o confusione</td>
            </tr>
            <tr onclick="selectPPSLevel(40)" data-level="40">
              <td class="pps-level">40%</td>
              <td>Principalmente a letto</td>
              <td>Incapace della maggior parte delle attività<br>Malattia estesa</td>
              <td>Principalmente assistenza</td>
              <td>Normale o ridotta</td>
              <td>Piena o sonnolenza +/- confusione</td>
            </tr>
            <tr onclick="selectPPSLevel(30)" data-level="30">
              <td class="pps-level">30%</td>
              <td>Totalmente allettato</td>
              <td>Incapace di qualsiasi attività<br>Malattia estesa</td>
              <td>Assistenza totale</td>
              <td>Normale o ridotta</td>
              <td>Piena o sonnolenza +/- confusione</td>
            </tr>
            <tr onclick="selectPPSLevel(20)" data-level="20">
              <td class="pps-level">20%</td>
              <td>Totalmente allettato</td>
              <td>Incapace di qualsiasi attività<br>Malattia estesa</td>
              <td>Assistenza totale</td>
              <td>Sorsi minimi</td>
              <td>Piena o sonnolenza +/- confusione</td>
            </tr>
            <tr onclick="selectPPSLevel(10)" data-level="10">
              <td class="pps-level">10%</td>
              <td>Totalmente allettato</td>
              <td>Incapace di qualsiasi attività<br>Malattia estesa</td>
              <td>Assistenza totale</td>
              <td>Solo cura della bocca</td>
              <td>Sonnolenza o coma</td>
            </tr>
            <tr onclick="selectPPSLevel(0)" data-level="0">
              <td class="pps-level">0%</td>
              <td>Morto</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div id="pps-results-section" class="results-section">
        <div class="pps-score-display" id="pps-selected-score">-</div>
        <div class="score-interpretation" id="pps-interpretation">Seleziona un livello PPS</div>
        <div class="prognostic-info">
          <h4>ℹ️ Informazioni Prognostiche</h4>
          <div id="pps-description">Le informazioni prognostiche appariranno qui una volta selezionato un livello PPS.</div>
        </div>
      </div>

      <div class="action-buttons">
        <button class="btn btn-primary" onclick="printPPS()">
          🖨️ Stampa
        </button>
        <button class="btn btn-danger" onclick="resetPPSForm()">
          🔄 Reset
        </button>
      </div>
    </div>

    <div id="pps-view" class="content-section">
      <div class="scale-template">
        <div class="template-header">
          <h2>📊 Palliative Performance Scale (PPSv2)</h2>
          <p><strong>Template di Valutazione</strong></p>
        </div>

        <table class="template-table">
          <thead>
            <tr>
              <th rowspan="2">Livello<br>PPS</th>
              <th rowspan="2">Deambulazione</th>
              <th rowspan="2">Livello di Attività<br>& Evidenza di Malattia</th>
              <th rowspan="2">Auto-cura</th>
              <th rowspan="2">Assunzione</th>
              <th rowspan="2">Livello di<br>Coscienza</th>
              <th rowspan="2">Note</th>
            </tr>
          </thead>
          <tbody>
            <tr><td><strong>100%</strong></td><td>Completa</td><td>Attività e lavoro normale<br>Nessuna evidenza di malattia</td><td>Completa</td><td>Normale</td><td>Piena</td><td></td></tr>
            <tr><td><strong>90%</strong></td><td>Completa</td><td>Attività e lavoro normale<br>Qualche evidenza di malattia</td><td>Completa</td><td>Normale</td><td>Piena</td><td></td></tr>
            <tr><td><strong>80%</strong></td><td>Completa</td><td>Attività e lavoro normale con sforzo<br>Qualche evidenza di malattia</td><td>Completa</td><td>Normale o ridotta</td><td>Piena</td><td></td></tr>
            <tr><td><strong>70%</strong></td><td>Ridotta</td><td>Incapace di attività e lavoro normale<br>Malattia significativa</td><td>Completa</td><td>Normale o ridotta</td><td>Piena</td><td></td></tr>
            <tr><td><strong>60%</strong></td><td>Ridotta</td><td>Incapace di hobby/lavori domestici<br>Malattia significativa</td><td>Assistenza occasionale</td><td>Normale o ridotta</td><td>Piena o confusione</td><td></td></tr>
            <tr><td><strong>50%</strong></td><td>Principalmente seduto/sdraiato</td><td>Incapace di qualsiasi lavoro<br>Malattia estesa</td><td>Assistenza considerevole</td><td>Normale o ridotta</td><td>Piena o sonnolenza o confusione</td><td></td></tr>
            <tr><td><strong>40%</strong></td><td>Principalmente a letto</td><td>Incapace della maggior parte delle attività<br>Malattia estesa</td><td>Principalmente assistenza</td><td>Normale o ridotta</td><td>Piena o sonnolenza +/- confusione</td><td></td></tr>
            <tr><td><strong>30%</strong></td><td>Totalmente allettato</td><td>Incapace di qualsiasi attività<br>Malattia estesa</td><td>Assistenza totale</td><td>Normale o ridotta</td><td>Piena o sonnolenza +/- confusione</td><td></td></tr>
            <tr><td><strong>20%</strong></td><td>Totalmente allettato</td><td>Incapace di qualsiasi attività<br>Malattia estesa</td><td>Assistenza totale</td><td>Sorsi minimi</td><td>Piena o sonnolenza +/- confusione</td><td></td></tr>
            <tr><td><strong>10%</strong></td><td>Totalmente allettato</td><td>Incapace di qualsiasi attività<br>Malattia estesa</td><td>Assistenza totale</td><td>Solo cura della bocca</td><td>Sonnolenza o coma</td><td></td></tr>
            <tr><td><strong>0%</strong></td><td>Morto</td><td>-</td><td>-</td><td>-</td><td>-</td><td></td></tr>
          </tbody>
        </table>

        <div style="text-align: center; margin-top: 2rem; padding: 1rem; background: var(--pps-light); border-radius: 10px;">
          <p><strong>Istruzioni:</strong> Il livello PPS è determinato leggendo da sinistra a destra per trovare il "migliore adattamento orizzontale". 
          Inizia dalla colonna di sinistra leggendo verso il basso fino a determinare l'attuale deambulazione, poi leggi trasversalmente 
          alla colonna successiva e verso il basso fino a determinare ogni colonna. Quindi, le colonne di "sinistra" hanno precedenza 
          sulle colonne di "destra".</p>
          <p style="margin-top: 1rem;"><em>© Victoria Hospice Society. PPSv2 non deve essere riprodotto in alcun modo a meno che non sia ottenuto il consenso.</em></p>
        </div>
      </div>

      <div class="action-buttons">
        <button class="btn btn-secondary" onclick="printPerformanceTemplate('pps')">
          🖨️ Stampa Template Vuoto
        </button>
      </div>
    </div>

    <div id="pps-definitions" class="content-section">
      <div class="definitions-section">
        <h4>📖 Definizioni dei Termini per PPS</h4>
        <p style="margin-bottom: 2rem; font-style: italic; color: var(--pps-text);">
          Come indicato di seguito, alcuni dei termini hanno significati simili con le differenze più facilmente evidenti 
          quando si legge orizzontalmente attraverso ogni riga per trovare un "miglior adattamento" complessivo utilizzando tutte e cinque le colonne.
        </p>

        <div class="definition-item">
          <h5>1. Deambulazione (Utilizzare l'Auto-cura per aiutare a decidere il livello)</h5>
          <ul>
            <li><strong>Completa:</strong> nessuna restrizione o assistenza</li>
            <li><strong>Deambulazione ridotta:</strong> grado in cui il paziente può camminare e trasferirsi con assistenza occasionale</li>
            <li><strong>Principalmente seduto/sdraiato vs Principalmente a letto:</strong> la quantità di tempo che il paziente è in grado di stare seduto o ha bisogno di sdraiarsi</li>
            <li><strong>Totalmente allettato:</strong> incapace di uscire dal/muoversi nel letto o fare auto-cura</li>
          </ul>
        </div>

        <div class="definition-item">
          <h5>2. Attività & Evidenza di Malattia (Utilizzare la Deambulazione per aiutare a decidere il livello)</h5>
          <h6 style="color: var(--pps-secondary); margin: 1rem 0 0.5rem 0;">Attività:</h6>
          <ul>
            <li>Si riferisce alle attività normali legate alle routine quotidiane (ADL), lavori domestici e hobby/tempo libero</li>
            <li><strong>Lavoro/impiego:</strong> Si riferisce alle attività normali legate sia al lavoro retribuito che non retribuito, incluso il lavoro domestico e le attività di volontariato</li>
            <li>Entrambi includono casi in cui un paziente continua l'attività ma può ridurre il tempo o lo sforzo coinvolto</li>
          </ul>
          <h6 style="color: var(--pps-secondary); margin: 1rem 0 0.5rem 0;">Evidenza di Malattia:</h6>
          <ul>
            <li><strong>Nessuna evidenza di malattia:</strong> L'individuo è normale e sano senza evidenza fisica o investigativa di malattia</li>
            <li><strong>'Qualche,' 'significativa,' ed 'estesa' malattia:</strong> Si riferisce all'evidenza fisica o investigativa che mostra la progressione della malattia, a volte nonostante i trattamenti attivi</li>
          </ul>
          <div style="background: rgba(111, 66, 193, 0.1); padding: 1rem; border-radius: 8px; margin-top: 1rem;">
            <strong>Esempio 1: Cancro al seno:</strong><br>
            • qualche = una recidiva locale<br>
            • significativa = una o due metastasi nel polmone o osso<br>
            • estesa = metastasi multiple (polmone, osso, fegato o cervello), ipercalcemia o altre complicazioni
          </div>
          <div style="background: rgba(111, 66, 193, 0.1); padding: 1rem; border-radius: 8px; margin-top: 1rem;">
            <strong>Esempio 2: Insufficienza cardiaca congestizia:</strong><br>
            • qualche = uso regolare di diuretici e/o ACE-inibitori per controllare<br>
            • significativa = esacerbazioni di ICC, versamento o edema che necessitano aumenti o cambiamenti nella gestione farmacologica<br>
            • estesa = 1 o più ricoveri ospedalieri negli ultimi 12 mesi per ICC acuta e declino generale con versamenti, edema, dispnea
          </div>
        </div>

        <div class="definition-item">
          <h5>3. Auto-cura</h5>
          <ul>
            <li><strong>Completa:</strong> Capace di fare tutte le attività normali come trasferirsi dal letto, camminare, lavarsi, andare in bagno e mangiare senza assistenza</li>
            <li><strong>Assistenza occasionale:</strong> Richiede assistenza minore da diverse volte a settimana a una volta al giorno, per le attività indicate sopra</li>
            <li><strong>Assistenza considerevole:</strong> Richiede assistenza moderata ogni giorno, per alcune delle attività indicate sopra (andare in bagno, tagliare il cibo, ecc.)</li>
            <li><strong>Principalmente assistenza:</strong> Richiede assistenza maggiore ogni giorno, per la maggior parte delle attività indicate sopra (alzarsi, lavarsi la faccia e radersi, ecc.). Di solito può mangiare con assistenza minima o nessuna. Questo può fluttuare con il livello di affaticamento</li>
            <li><strong>Assistenza totale:</strong> Richiede sempre assistenza per tutte le cure. Può o non può essere in grado di masticare e deglutire il cibo</li>
          </ul>
        </div>

        <div class="definition-item">
          <h5>4. Assunzione</h5>
          <ul>
            <li><strong>Normale:</strong> mangia quantità normali di cibo per l'individuo come quando era sano</li>
            <li><strong>Normale o ridotta:</strong> altamente variabile per l'individuo; 'ridotta' significa che l'assunzione è inferiore alle quantità normali quando era sano</li>
            <li><strong>Sorsi minimi:</strong> quantità molto piccole, di solito frullate o liquide, e ben al di sotto dell'assunzione normale</li>
            <li><strong>Solo cura della bocca:</strong> nessuna assunzione orale</li>
          </ul>
        </div>

        <div class="definition-item">
          <h5>5. Livello di Coscienza</h5>
          <ul>
            <li><strong>Piena:</strong> completamente sveglio e orientato, con capacità cognitive normali (per il paziente) (pensiero, memoria, ecc.)</li>
            <li><strong>Piena o confusione:</strong> il livello di coscienza è pieno o può essere ridotto. Se ridotto, la confusione denota delirium o demenza che può essere lieve, moderata o severa, con multiple possibili eziologie</li>
            <li><strong>Piena o sonnolenza +/- confusione:</strong> il livello di coscienza è pieno o può essere marcatamente ridotto; a volte incluso nel termine stupor. Implica affaticamento, effetti collaterali dei farmaci, delirium o vicinanza alla morte</li>
            <li><strong>Sonnolenza o coma +/- confusione:</strong> nessuna risposta a stimoli verbali o fisici; alcuni riflessi possono rimanere o meno. La profondità del coma può fluttuare durante un periodo di 24 ore. Di solito indica morte imminente</li>
          </ul>
        </div>
      </div>

      <div class="definitions-section" style="margin-top: 2rem;">
        <h4>🎯 Punti Chiave per l'Uso Corretto del PPS</h4>
        <div class="definition-item" style="background: linear-gradient(135deg, #fff3cd, #ffeaa7); border-left-color: var(--pps-warning);">
          <h5>📍 Principi Fondamentali:</h5>
          <ul>
            <li><strong>I parametri di "sinistra" hanno precedenza</strong> su quelli di destra</li>
            <li><strong>Trovare il miglior "adattamento orizzontale"</strong> considerando tutte le colonne</li>
            <li><strong>Il giudizio clinico</strong> per il miglior adattamento orizzontale prevale su qualsiasi ambiguità</li>
            <li><strong>Non quello che il paziente sta facendo/è osservato fare, ma quello che è capace di fare</strong></li>
            <li><strong>Le definizioni sono importanti</strong> - errori comuni derivano dal non conoscere/usare le definizioni</li>
            <li><strong>PPS è semplice, ma non facile</strong> - richiede training e comprensione accurata</li>
          </ul>
        </div>
        <div class="definition-item" style="background: linear-gradient(135deg, #d1ecf1, #74b9ff); border-left-color: #0984e3; color: #000;">
          <h5>⚠️ Errori Comuni da Evitare:</h5>
          <ul>
            <li>Basarsi solo sull'osservazione invece che sulla capacità effettiva</li>
            <li>Non considerare il "miglior adattamento orizzontale"</li>
            <li>Ignorare la precedenza delle colonne di sinistra</li>
            <li>Non utilizzare le definizioni specifiche dei termini</li>
            <li>Sommare i punteggi invece di trovare l'adattamento migliore</li>
          </ul>
        </div>
      </div>
    </div>

    <details class="references-section">
      <summary>📚 Riferimenti Ufficiali</summary>
      <p><strong>Strumento Originale:</strong> Palliative Performance Scale (PPSv2)</p>
      <p><strong>Sviluppato da:</strong> Dr. G. Michael Downing, MD - Victoria Hospice Society, Canada</p>
      <p><strong>Prima Pubblicazione:</strong> Anderson F, Downing GM, Hill J, Casorso L, Lerch N. Palliative Performance Scale (PPS): a new tool. Journal of Palliative Care. 1996;12(1):5-11.</p>
      <p><strong>Revisione PPSv2:</strong> Pubblicata in "Medical Care of the Dying" 4th ed. Victoria Hospice Society; 2006.</p>
      <p><strong>Manuale Q&A:</strong> Downing GM. Q&A Manual, Instructions & Definitions for Use of Palliative Performance Scale (PPSv2). July 24, 2020. ©Victoria Hospice Society.</p>
      <p><strong>Validazione Italiana:</strong> Strumento validato e utilizzato in contesti clinici italiani per la valutazione funzionale in cure palliative.</p>
      <p><strong>Licensing:</strong> PPSv2 è liberamente disponibile ma richiede accordo scritto per l'uso. Contatto: www.victoriahospice.org</p>
      <p><strong>Copyright:</strong> © Victoria Hospice Society. PPSv2 non deve essere riprodotto senza consenso.</p>
      <div style="background: rgba(111, 66, 193, 0.1); padding: 1.5rem; border-radius: 10px; margin-top: 1.5rem;">
        <h5 style="color: var(--pps-primary);">🔬 Validazione Scientifica</h5>
        <p style="margin-bottom: 0.5rem;">PPSv2 è validato in oltre 200 studi scientifici pubblicati e utilizzato in più di 20 paesi con traduzioni validate.</p>
        <p style="margin-bottom: 0.5rem;"><strong>Affidabilità:</strong> Dimostrata in studi multicentrici (Ho et al. BMC Palliative Care 2008;7:10)</p>
        <p><strong>Valore Prognostico:</strong> Significativo predittore di sopravvivenza in più di 60 studi pubblicati</p>
      </div>
    </details>
  </div>
</section>
<!-- ADL -->
<section id="adl-home" class="p-4" style="display:none;">
  <div class="mb-3">
    <button class="btn btn-outline-success me-2" onclick="navigateToSection('strumenti-valutazione-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-primary" onclick="navigateToSection('performance-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna a Performance
    </button>
  </div>
  <div class="modal-header">
    <h3>ADL - Activities of Daily Living (Indice di Barthel)</h3>
    <p>Valutazione dell'autonomia nelle attività della vita quotidiana</p>
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
        <button class="btn btn-success" onclick="window.open('#', '_blank')">
          <i class="fas fa-external-link-alt"></i>Versione Online Completa
        </button>
      </div>
    </div>

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

      <div class="action-buttons">
        <button class="btn btn-warning" onclick="printPerformanceTemplate('adl')">
          <i class="fas fa-print"></i>Stampa Template
        </button>
      </div>
    </div>
  </div>
</section>


<!-- BADL -->
<section id="badl-home" class="p-4" style="display:none;">
  <div class="mb-3">
    <button class="btn btn-outline-success me-2" onclick="navigateToSection('strumenti-valutazione-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-primary" onclick="navigateToSection('performance-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna a Performance
    </button>
  </div>
  <div class="modal-header">
    <h3>BADL - Basic Activities of Daily Living</h3>
    <p>Valutazione rapida delle attività di base della vita quotidiana</p>
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
        <button class="btn btn-success" onclick="window.open('#', '_blank')">
          <i class="fas fa-external-link-alt"></i>Versione Online Completa
        </button>
      </div>
    </div>

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

      <div class="action-buttons">
        <button class="btn btn-warning" onclick="printPerformanceTemplate('badl')">
          <i class="fas fa-print"></i>Stampa Template
        </button>
      </div>
    </div>
  </div>
</section>


<script src="js/performance.js"></script>
<script src="js/pps.js"></script>
