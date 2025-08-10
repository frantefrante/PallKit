<?php
// strumenti-akps.php
?>
<link rel="stylesheet" href="css/performance-common.css">
<link rel="stylesheet" href="css/akps.css">

<section id="akps-home" class="p-4" style="display:none;">
  <div class="performance-header">
    <h1>AKPS - Australia-modified Karnofsky</h1>
    <p>Scala per valutare la performance funzionale del paziente</p>
  </div>

  <div class="mode-selector">
    <a href="#" class="mode-btn active" onclick="switchAKPSMode('compile')">Compila</a>
    <a href="#" class="mode-btn" onclick="switchAKPSMode('view')">Visualizza Scala</a>
    <a href="#" class="mode-btn" onclick="switchAKPSMode('glossary')">Glossario</a>
  </div>

  <div id="compile-section" class="content-section active">
    <div class="patient-info">
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Nome Paziente</label>
          <input type="text" class="form-control" id="akps-patient-name">
        </div>
        <div class="form-group">
          <label class="form-label">Data Valutazione</label>
          <input type="date" class="form-control" id="akps-date">
        </div>
      </div>
    </div>

    <div class="progress-container">
      <div class="progress-label"><span>Completamento</span><span id="akps-progress-text">0%</span></div>
      <div class="progress-bar"><div class="progress-fill" id="akps-progress"></div></div>
    </div>

    <div class="form-section">
      <h4>Seleziona il livello funzionale</h4>
      <div class="radio-grid" id="akps-options">
        <div class="radio-option" onclick="selectAKPS(100)">100 - Normale</div>
        <div class="radio-option" onclick="selectAKPS(80)">80 - Attività con sforzo</div>
        <div class="radio-option" onclick="selectAKPS(60)">60 - Assistenza occasionale</div>
        <div class="radio-option" onclick="selectAKPS(40)">40 - Disabile</div>
        <div class="radio-option" onclick="selectAKPS(20)">20 - Molto malato</div>
      </div>
    </div>

    <div id="akps-results" class="score-display" style="display:none;">
      <div class="score-number" id="akps-score">-</div>
      <div class="score-interpretation" id="akps-interpretation"></div>
      <div class="score-description" id="akps-description"></div>
    </div>

    <div class="action-buttons">
      <button class="btn btn-success" onclick="generateAKPSReport()">Genera Report</button>
      <button class="btn btn-warning" onclick="printAKPSTemplate()">Stampa Template</button>
      <button class="btn btn-danger" onclick="resetAKPS()">Azzera</button>
    </div>
  </div>

  <div id="view-section" class="content-section">
    <div class="info-box">Tabella AKPS in costruzione.</div>
  </div>

  <div id="glossary-section" class="content-section">
    <div class="info-box">Glossario AKPS.</div>
  </div>
</section>

<script src="js/performance-common.js"></script>
<script src="js/akps.js"></script>
