<?php
// strumenti-prognosi.php
?>
<link rel="stylesheet" href="css/prognosi.css">

<section id="prognosi-home" class="p-4" style="display:none;">
  <div class="prognosi-container">
    <div class="prognosi-header">
      <h1><i class="fas fa-hourglass-half me-2"></i>Strumenti di Prognosi</h1>
      <p class="text-muted">Scale prognostiche validate per la valutazione dell'aspettativa di vita in cure palliative</p>
    </div>

    <div class="mode-selector mb-4">
      <a href="#" class="mode-btn active" onclick="switchPrognosiMode('tools')">
        <i class="fas fa-calculator me-2"></i>Strumenti
      </a>
      <a href="#" class="mode-btn" onclick="switchPrognosiMode('reference')">
        <i class="fas fa-book-medical me-2"></i>Riferimenti
      </a>
    </div>

    <!-- Sezione Strumenti -->
    <div id="tools-section" class="content-section active">
      <div class="prognosi-grid">
        <div class="tool-card tool-card-compact h-100">
          <div class="tool-header">
            <div class="tool-icon-large ppi-icon">
              <span class="tool-letters">PPI</span>
            </div>
            <div class="tool-info">
              <h4>PPI</h4>
              <div class="tool-subtitle">Palliative Performance Index</div>
            </div>
          </div>
          
          <div class="tool-description">
            Strumento prognostico per stimare la sopravvivenza nei pazienti in cure palliative, basato su 5 parametri clinici facilmente valutabili.
          </div>
          
          <div class="tool-features">
            <span class="feature-badge">5 parametri</span>
            <span class="feature-badge">Predizione 3-6 settimane</span>
            <span class="feature-badge">Validato</span>
          </div>
          
          <div class="tool-actions">
            <button class="btn btn-primary btn-action" onclick="openPPICompile()">
              <i class="fas fa-edit me-2"></i>Compila
            </button>
            <button class="btn btn-outline-primary btn-action" onclick="openPPIVisualize()">
              <i class="fas fa-table me-2"></i>Visualizza
            </button>
          </div>
        </div>

        <div class="tool-card tool-card-compact h-100">
          <div class="tool-header">
            <div class="tool-icon-large pap-icon">
              <span class="tool-letters">PaP</span>
            </div>
            <div class="tool-info">
              <h4>PaP Score</h4>
              <div class="tool-subtitle">Palliative Prognostic Score</div>
            </div>
          </div>
          
          <div class="tool-description">
            Score prognostico multidimensionale che combina valutazione clinica e parametri laboratoristici per predire la sopravvivenza a 30 giorni.
          </div>
          
          <div class="tool-features">
            <span class="feature-badge">6 parametri</span>
            <span class="feature-badge">3 gruppi rischio</span>
            <span class="feature-badge">30 giorni</span>
          </div>
          
          <div class="tool-actions">
            <button class="btn btn-primary btn-action" onclick="openPAPCompile()">
              <i class="fas fa-edit me-2"></i>Compila
            </button>
            <button class="btn btn-outline-primary btn-action" onclick="openPAPVisualize()">
              <i class="fas fa-table me-2"></i>Visualizza
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Sezione Riferimenti -->
    <div id="reference-section" class="content-section">
      <div class="reference-content">
        <h3>Riferimenti Scientifici</h3>
        <div class="reference-grid">
          <div class="reference-card">
            <h5>Documento AIOM-SICP 2015</h5>
            <p>"Cure Palliative Precoci e Simultanee" - Linee guida nazionali per l'implementazione delle cure palliative.</p>
          </div>
          <div class="reference-card">
            <h5>Linee Guida NCCN</h5>
            <p>National Comprehensive Cancer Network guidelines per le cure palliative in oncologia.</p>
          </div>
          <div class="reference-card">
            <h5>Gold Standard Framework</h5>
            <p>Framework per l'identificazione precoce dei pazienti che necessitano di cure palliative.</p>
          </div>
          <div class="reference-card">
            <h5>EAPC Basic Dataset</h5>
            <p>Dataset europeo per la valutazione multidimensionale in cure palliative.</p>
          </div>
        </div>

        <div class="clinical-criteria mt-4">
          <h4>Criteri di Eleggibilità per Cure Palliative</h4>
          <div class="criteria-list">
            <div class="criteria-item">
              <i class="fas fa-check-circle text-success"></i>
              <div>
                <strong>Neoplasia metastatica</strong>
                <p>Malattia oncologica in stadio avanzato con metastasi</p>
              </div>
            </div>
            <div class="criteria-item">
              <i class="fas fa-check-circle text-success"></i>
              <div>
                <strong>Performance Status compromesso</strong>
                <p>ECOG ≥3 o Karnofsky ≤50%</p>
              </div>
            </div>
            <div class="criteria-item">
              <i class="fas fa-check-circle text-success"></i>
              <div>
                <strong>Aspettativa di vita limitata</strong>
                <p>Prognosi &lt;6-12 mesi</p>
              </div>
            </div>
            <div class="criteria-item">
              <i class="fas fa-check-circle text-success"></i>
              <div>
                <strong>Sintomi non controllati</strong>
                <p>Alto carico sintomatologico refrattario</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sezione PPI -->
<section id="ppi-home" class="p-4" style="display:none;">
  <div class="ppi-container">
    <div class="ppi-header">
      <h1><i class="fas fa-hourglass-half me-2"></i>PPI - Palliative Performance Index</h1>
      <p class="text-muted">Strumento prognostico per stimare la sopravvivenza nei pazienti in cure palliative</p>
    </div>

    <div class="mode-selector mb-4">
      <a href="#" class="mode-btn active" onclick="switchPPIMode('compile')">
        <i class="fas fa-edit me-2"></i>Compila
      </a>
      <a href="#" class="mode-btn" onclick="switchPPIMode('visualize')">
        <i class="fas fa-table me-2"></i>Visualizza
      </a>
    </div>

    <!-- Tab Compila -->
    <div id="compile-section" class="content-section active">
      <div class="patient-info-card">
        <h4><i class="fas fa-user me-2"></i>Dati Paziente</h4>
        <div class="row">
          <div class="col-md-6">
            <input type="text" class="form-control" id="ppi-patient-name" placeholder="Nome paziente">
          </div>
          <div class="col-md-6">
            <input type="date" class="form-control" id="ppi-date">
          </div>
        </div>
      </div>

      <div class="form-card">
        <h4><i class="fas fa-list-check me-2"></i>Parametri PPI</h4>
        <div class="progress-indicator mb-4">
          <div class="progress-bar">
            <div class="progress-fill" id="ppi-progress" style="width: 0%"></div>
          </div>
          <small class="text-muted">Progresso: <span id="ppi-progress-text">0/5</span> parametri completati</small>
        </div>
        
        <div class="form-item" id="ppi-pps-item">
          <label class="form-label">1. Palliative Performance Scale (PPS)</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPPI('pps', 4)">
              <span>10-20% (4 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPPI('pps', 2.5)">
              <span>30-50% (2.5 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPPI('pps', 0)">
              <span>&gt;60% (0 punti)</span>
            </div>
          </div>
        </div>

        <div class="form-item" id="ppi-oral-item">
          <label class="form-label">2. Assunzione orale</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPPI('oral', 2.5)">
              <span>Severamente ridotta (2.5 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPPI('oral', 1)">
              <span>Moderatamente ridotta (1 punto)</span>
            </div>
            <div class="radio-option" onclick="selectPPI('oral', 0)">
              <span>Normale (0 punti)</span>
            </div>
          </div>
        </div>

        <div class="form-item" id="ppi-edema-item">
          <label class="form-label">3. Edema</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPPI('edema', 1)">
              <span>Presente (1 punto)</span>
            </div>
            <div class="radio-option" onclick="selectPPI('edema', 0)">
              <span>Assente (0 punti)</span>
            </div>
          </div>
        </div>

        <div class="form-item" id="ppi-dyspnea-item">
          <label class="form-label">4. Dispnea a riposo</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPPI('dyspnea', 3.5)">
              <span>Presente (3.5 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPPI('dyspnea', 0)">
              <span>Assente (0 punti)</span>
            </div>
          </div>
        </div>

        <div class="form-item" id="ppi-delirium-item">
          <label class="form-label">5. Delirium</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPPI('delirium', 4)">
              <span>Presente (4 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPPI('delirium', 0)">
              <span>Assente (0 punti)</span>
            </div>
          </div>
        </div>
      </div>

      <div id="ppi-results" class="score-display" style="display: none;">
        <div class="score-header">
          <h3>Risultato PPI</h3>
        </div>
        <div class="score-content">
          <div class="score-number" id="ppi-score">0</div>
          <div class="score-interpretation" id="ppi-interpretation">Punteggio PPI</div>
          <div class="score-description" id="ppi-description">Completa tutti i parametri per la valutazione prognostica</div>
        </div>
      </div>

      <div class="action-buttons">
        <button class="btn btn-success" onclick="generatePPIReport()">
          <i class="fas fa-download me-2"></i>Genera Report
        </button>
        <button class="btn btn-outline-secondary" onclick="resetPPI()">
          <i class="fas fa-redo me-2"></i>Azzera
        </button>
        <button class="btn btn-outline-primary" onclick="printPPI()">
          <i class="fas fa-print me-2"></i>Stampa
        </button>
      </div>
    </div>

    <!-- Tab Visualizza -->
    <div id="visualize-section" class="content-section">
      <div class="scale-reference">
        <h4>Palliative Performance Index (PPI) - Scala Completa</h4>
        <div class="table-responsive">
          <table class="scale-table">
            <thead>
              <tr>
                <th>Parametro</th>
                <th>Valore</th>
                <th>Punteggio</th>
              </tr>
            </thead>
            <tbody>
              <tr><td rowspan="3"><strong>Palliative Performance Scale</strong></td><td>10-20%</td><td>4.0</td></tr>
              <tr><td>30-50%</td><td>2.5</td></tr>
              <tr><td>&gt;60%</td><td>0</td></tr>
              <tr><td rowspan="3"><strong>Assunzione orale</strong></td><td>Severamente ridotta</td><td>2.5</td></tr>
              <tr><td>Moderatamente ridotta</td><td>1.0</td></tr>
              <tr><td>Normale</td><td>0</td></tr>
              <tr><td rowspan="2"><strong>Edema</strong></td><td>Presente</td><td>1.0</td></tr>
              <tr><td>Assente</td><td>0</td></tr>
              <tr><td rowspan="2"><strong>Dispnea a riposo</strong></td><td>Presente</td><td>3.5</td></tr>
              <tr><td>Assente</td><td>0</td></tr>
              <tr><td rowspan="2"><strong>Delirium</strong></td><td>Presente</td><td>4.0</td></tr>
              <tr><td>Assente</td><td>0</td></tr>
            </tbody>
          </table>
        </div>
        
        <div class="interpretation-box">
          <h5><i class="fas fa-info-circle me-2"></i>Interpretazione Prognostica</h5>
          <ul>
            <li><strong>PPI ≤ 4:</strong> Sopravvivenza &gt;6 settimane (probabilità &gt;70%)</li>
            <li><strong>PPI &gt; 4:</strong> Sopravvivenza ≤3 settimane (probabilità &gt;80%)</li>
            <li><strong>Punteggio totale:</strong> 0-15 punti</li>
            <li><strong>Maggiore è il punteggio, minore è la sopravvivenza attesa</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sezione PaP Score -->
<section id="pap-home" class="p-4" style="display:none;">
  <div class="pap-container">
    <div class="pap-header">
      <h1><i class="fas fa-chart-line me-2"></i>PaP Score - Palliative Prognostic Score</h1>
      <p class="text-muted">Score prognostico multidimensionale per la predizione della sopravvivenza a 30 giorni</p>
    </div>

    <div class="mode-selector mb-4">
      <a href="#" class="mode-btn active" onclick="switchPAPMode('compile')">
        <i class="fas fa-edit me-2"></i>Compila
      </a>
      <a href="#" class="mode-btn" onclick="switchPAPMode('visualize')">
        <i class="fas fa-table me-2"></i>Visualizza
      </a>
    </div>

    <!-- Tab Compila -->
    <div id="compile-section" class="content-section active">
      <div class="patient-info-card">
        <h4><i class="fas fa-user me-2"></i>Dati Paziente</h4>
        <div class="row">
          <div class="col-md-6">
            <input type="text" class="form-control" id="pap-patient-name" placeholder="Nome paziente">
          </div>
          <div class="col-md-6">
            <input type="date" class="form-control" id="pap-date">
          </div>
        </div>
      </div>

      <div class="form-card">
        <h4><i class="fas fa-list-check me-2"></i>Parametri PaP Score</h4>
        <div class="progress-indicator mb-4">
          <div class="progress-bar">
            <div class="progress-fill" id="pap-progress" style="width: 0%"></div>
          </div>
          <small class="text-muted">Progresso: <span id="pap-progress-text">0/6</span> parametri completati</small>
        </div>
        
        <div class="form-item" id="pap-dyspnea-item">
          <label class="form-label">1. Dispnea</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('dyspnea', 1)">
              <span>Sì (1 punto)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('dyspnea', 0)">
              <span>No (0 punti)</span>
            </div>
          </div>
        </div>

        <div class="form-item" id="pap-anorexia-item">
          <label class="form-label">2. Anoressia</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('anorexia', 1)">
              <span>Sì (1 punto)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('anorexia', 0)">
              <span>No (0 punti)</span>
            </div>
          </div>
        </div>

        <div class="form-item" id="pap-karnofsky-item">
          <label class="form-label">3. Karnofsky Performance Status</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('karnofsky', 2.5)">
              <span>10-20 (2.5 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('karnofsky', 0)">
              <span>30-100 (0 punti)</span>
            </div>
          </div>
        </div>

        <div class="form-item" id="pap-wbc-item">
          <label class="form-label">4. Leucociti totali</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('wbc', 1.5)">
              <span>&gt;11.000 (1.5 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('wbc', 0.5)">
              <span>8.501-11.000 (0.5 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('wbc', 0)">
              <span>&le;8.500 (0 punti)</span>
            </div>
          </div>
        </div>

        <div class="form-item" id="pap-lymphocytes-item">
          <label class="form-label">5. Percentuale Linfociti</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('lymphocytes', 2.5)">
              <span>0-11.9% (2.5 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('lymphocytes', 1)">
              <span>12-19.9% (1 punto)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('lymphocytes', 0)">
              <span>&ge;20% (0 punti)</span>
            </div>
          </div>
        </div>

        <div class="form-item" id="pap-prediction-item">
          <label class="form-label">6. Predizione clinica di sopravvivenza</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('prediction', 8.5)">
              <span>1-2 settimane (8.5 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('prediction', 6)">
              <span>3-4 settimane (6 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('prediction', 4.5)">
              <span>5-6 settimane (4.5 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('prediction', 2.5)">
              <span>7-10 settimane (2.5 punti)</span>
            </div>
            <div class="radio-option" onclick="selectPAP('prediction', 0)">
              <span>&gt;10 settimane (0 punti)</span>
            </div>
          </div>
        </div>
      </div>

      <div id="pap-results" class="score-display" style="display: none;">
        <div class="score-header">
          <h3>Risultato PaP Score</h3>
        </div>
        <div class="score-content">
          <div class="score-number" id="pap-score">0</div>
          <div class="score-interpretation" id="pap-interpretation">Punteggio PaP</div>
          <div class="score-description" id="pap-description">Completa tutti i parametri per la valutazione prognostica</div>
        </div>
      </div>

      <div class="action-buttons">
        <button class="btn btn-success" onclick="generatePAPReport()">
          <i class="fas fa-download me-2"></i>Genera Report
        </button>
        <button class="btn btn-outline-secondary" onclick="resetPAP()">
          <i class="fas fa-redo me-2"></i>Azzera
        </button>
        <button class="btn btn-outline-primary" onclick="printPAP()">
          <i class="fas fa-print me-2"></i>Stampa
        </button>
      </div>
    </div>

    <!-- Tab Visualizza -->
    <div id="visualize-section" class="content-section">
      <div class="scale-reference">
        <h4>Palliative Prognostic Score (PaP) - Scala Completa</h4>
        <div class="table-responsive">
          <table class="scale-table">
            <thead>
              <tr>
                <th>Parametro</th>
                <th>Valore</th>
                <th>Punteggio</th>
              </tr>
            </thead>
            <tbody>
              <tr><td rowspan="2"><strong>Dispnea</strong></td><td>Sì</td><td>1.0</td></tr>
              <tr><td>No</td><td>0</td></tr>
              <tr><td rowspan="2"><strong>Anoressia</strong></td><td>Sì</td><td>1.0</td></tr>
              <tr><td>No</td><td>0</td></tr>
              <tr><td rowspan="2"><strong>Karnofsky Performance Status</strong></td><td>10-20</td><td>2.5</td></tr>
              <tr><td>30-100</td><td>0</td></tr>
              <tr><td rowspan="3"><strong>Leucociti totali</strong></td><td>&gt;11.000</td><td>1.5</td></tr>
              <tr><td>8.501-11.000</td><td>0.5</td></tr>
              <tr><td>&le;8.500</td><td>0</td></tr>
              <tr><td rowspan="3"><strong>% Linfociti</strong></td><td>0-11.9%</td><td>2.5</td></tr>
              <tr><td>12-19.9%</td><td>1.0</td></tr>
              <tr><td>&ge;20%</td><td>0</td></tr>
              <tr><td rowspan="5"><strong>Predizione clinica</strong></td><td>1-2 settimane</td><td>8.5</td></tr>
              <tr><td>3-4 settimane</td><td>6.0</td></tr>
              <tr><td>5-6 settimane</td><td>4.5</td></tr>
              <tr><td>7-10 settimane</td><td>2.5</td></tr>
              <tr><td>&gt;10 settimane</td><td>0</td></tr>
            </tbody>
          </table>
        </div>
        
        <div class="interpretation-box">
          <h5><i class="fas fa-info-circle me-2"></i>Interpretazione Prognostica</h5>
          <ul>
            <li><strong>Gruppo A (0-5.5 punti):</strong> Sopravvivenza &gt;30 giorni (probabilità &gt;70%)</li>
            <li><strong>Gruppo B (5.6-11 punti):</strong> Sopravvivenza incerta (30-70%)</li>
            <li><strong>Gruppo C (11.1-17.5 punti):</strong> Sopravvivenza &lt;30 giorni (probabilità &gt;70%)</li>
            <li><strong>Punteggio totale:</strong> 0-17.5 punti</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="js/prognosi.js"></script>

