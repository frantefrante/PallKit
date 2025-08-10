<?php
// strumenti-pps.php
?>
<link rel="stylesheet" href="css/performance-common.css">
<link rel="stylesheet" href="css/pps.css">

<section id="pps-home" class="p-4" style="display:none;">
  <div class="performance-header">
    <h1>PPS - Palliative Performance Scale</h1>
    <p>Valutazione multidimensionale con valore prognostico</p>
  </div>

  <div class="mode-selector">
    <a href="#" class="mode-btn active" onclick="switchPPSMode('compile')">Compila</a>
    <a href="#" class="mode-btn" onclick="switchPPSMode('view')">Visualizza Scala</a>
    <a href="#" class="mode-btn" onclick="switchPPSMode('glossary')">Glossario</a>
  </div>

  <div id="compile-section" class="content-section active">
    <div class="patient-info">
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Nome Paziente</label>
          <input type="text" class="form-control" id="pps-patient-name">
        </div>
        <div class="form-group">
          <label class="form-label">Data Valutazione</label>
          <input type="date" class="form-control" id="pps-date">
        </div>
      </div>
    </div>

    <div class="progress-container">
      <div class="progress-label"><span>Completamento</span><span id="pps-progress-text">0%</span></div>
      <div class="progress-bar"><div class="progress-fill" id="pps-progress"></div></div>
    </div>

    <div class="form-section">
      <h4>Seleziona il livello PPS</h4>
      <div class="radio-grid" id="pps-options">
        <div class="radio-option" onclick="selectPPS(100)">100%</div>
        <div class="radio-option" onclick="selectPPS(80)">80%</div>
        <div class="radio-option" onclick="selectPPS(60)">60%</div>
        <div class="radio-option" onclick="selectPPS(40)">40%</div>
        <div class="radio-option" onclick="selectPPS(20)">20%</div>
      </div>
    </div>

    <div id="pps-results" class="score-display" style="display:none;">
      <div class="score-number" id="pps-score">-</div>
      <div class="score-interpretation" id="pps-interpretation"></div>
      <div class="score-description" id="pps-description"></div>
    </div>

    <div class="action-buttons">
      <button class="btn btn-success" onclick="generatePPSReport()">Genera Report</button>
      <button class="btn btn-warning" onclick="printPPSTemplate()">Stampa Template</button>
      <button class="btn btn-danger" onclick="resetPPS()">Azzera</button>
    </div>
  </div>

  <div id="view-section" class="content-section">
    <div class="info-box">Tabella PPS in costruzione.</div>
  </div>

  <div id="glossary-section" class="content-section">
    <div class="info-box">Glossario PPS.</div>
  </div>
</section>

<script src="js/performance-common.js"></script>
<script src="js/pps.js"></script>
