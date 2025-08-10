<?php
// strumenti-adl.php
?>
<link rel="stylesheet" href="css/performance-common.css">
<link rel="stylesheet" href="css/adl.css">

<section id="adl-home" class="p-4" style="display:none;">
  <div class="performance-header">
    <h1>ADL - Activities of Daily Living</h1>
    <p>Indice di Barthel per le attività quotidiane</p>
  </div>

  <div class="mode-selector">
    <a href="#" class="mode-btn active" onclick="switchADLMode('compile')">Template</a>
    <a href="#" class="mode-btn" onclick="switchADLMode('view')">Informazioni</a>
    <a href="#" class="mode-btn" onclick="switchADLMode('glossary')">Glossario</a>
  </div>

  <div id="compile-section" class="content-section active">
    <div class="info-box">
      Questo strumento è previsto per la compilazione cartacea. Usa il pulsante per stampare il template.
    </div>
    <div class="action-buttons">
      <button class="btn btn-warning" onclick="printADLTemplate()">Stampa Template</button>
    </div>
  </div>

  <div id="view-section" class="content-section">
    <div class="info-box">Informazioni sulla scala ADL.</div>
  </div>

  <div id="glossary-section" class="content-section">
    <div class="info-box">Glossario ADL.</div>
  </div>
</section>

<script src="js/performance-common.js"></script>
<script src="js/adl.js"></script>
