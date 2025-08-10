<?php
// strumenti-badl.php
?>
<link rel="stylesheet" href="css/performance-common.css">
<link rel="stylesheet" href="css/badl.css">

<section id="badl-home" class="p-4" style="display:none;">
  <div class="performance-header">
    <h1>BADL - Basic Activities of Daily Living</h1>
    <p>Valutazione semplificata delle attività di base</p>
  </div>

  <div class="mode-selector">
    <a href="#" class="mode-btn active" onclick="switchBADLMode('compile')">Template</a>
    <a href="#" class="mode-btn" onclick="switchBADLMode('view')">Informazioni</a>
    <a href="#" class="mode-btn" onclick="switchBADLMode('glossary')">Glossario</a>
  </div>

  <div id="compile-section" class="content-section active">
    <div class="info-box">
      Strumento per valutazione rapida. Usa il pulsante per stampare il template di compilazione.
    </div>
    <div class="action-buttons">
      <button class="btn btn-warning" onclick="printBADLTemplate()">Stampa Template</button>
    </div>
  </div>

  <div id="view-section" class="content-section">
    <div class="info-box">Informazioni sulla scala BADL.</div>
  </div>

  <div id="glossary-section" class="content-section">
    <div class="info-box">Glossario BADL.</div>
  </div>
</section>

<script src="js/performance-common.js"></script>
<script src="js/badl.js"></script>
