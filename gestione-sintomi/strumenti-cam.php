<?php
?>
<link rel="stylesheet" href="css/delirium.css">
<section id="cam-home" class="p-4 delirium-section" style="display:none;">
  <div class="mb-3">
    <button class="btn btn-outline-success me-2" onclick="navigateToSection('strumenti-valutazione-home'); showCategories();">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-secondary" style="border-color:#6f42c1;color:#6f42c1;" onclick="navigateToSection('strumenti-valutazione-home'); openCategoryView('delirium');">
      <i class="fas fa-arrow-left me-2"></i>Torna a Delirium
    </button>
  </div>

  <div id="cam-assessment" class="assessment-section">
    <div class="assessment-header">
      <h2>CAM - Confusion Assessment Method</h2>
      <p>Algoritmo diagnostico per delirium</p>
    </div>

    <div class="mode-selector">
      <button class="mode-btn active" onclick="switchCAMMode('compile')">📝 Compila</button>
      <button class="mode-btn" onclick="switchCAMMode('reference')">📊 Algoritmo Diagnostico</button>
    </div>

    <div id="cam-compile" class="content-section">
      <div class="patient-info">
        <h4><i class="fas fa-user me-2"></i>Dati Paziente</h4>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Nome Paziente</label>
            <input type="text" class="form-control" id="cam-patient-name" placeholder="Nome e cognome">
          </div>
          <div class="col-md-3">
            <label class="form-label">Data di Nascita</label>
            <input type="date" class="form-control" id="cam-patient-birth">
          </div>
          <div class="col-md-3">
            <label class="form-label">Data Valutazione</label>
            <input type="date" class="form-control" id="cam-date">
          </div>
        </div>
      </div>

      <div class="progress-container">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span><strong>Progresso Compilazione</strong></span>
          <span id="cam-progress-text">0/4 completati</span>
        </div>
        <div class="progress">
          <div class="progress-bar" id="cam-progress-bar" role="progressbar" style="width:0%"></div>
        </div>
      </div>

      <div class="question-item" id="cam-f1">
        <div class="question-title">
          <div class="question-number">1</div>
          <div>Esordio Acuto e Corso Fluttuante</div>
        </div>
        <div class="question-description">
          C'è evidenza di un cambiamento acuto nello stato mentale rispetto alla baseline? Il comportamento varia durante il giorno?
        </div>
        <div class="radio-options">
          <label class="radio-option" onclick="selectCAMAnswer(1,false,this)">
            <input type="radio" name="cam-f1" value="false">
            <span class="radio-label">Assente</span>
            <span class="radio-score">No</span>
          </label>
          <label class="radio-option" onclick="selectCAMAnswer(1,true,this)">
            <input type="radio" name="cam-f1" value="true">
            <span class="radio-label">Presente</span>
            <span class="radio-score">Sì</span>
          </label>
        </div>
      </div>

      <div class="question-item" id="cam-f2">
        <div class="question-title">
          <div class="question-number">2</div>
          <div>Disattenzione</div>
        </div>
        <div class="question-description">
          Il paziente ha difficoltà a focalizzare l'attenzione?
        </div>
        <div class="radio-options">
          <label class="radio-option" onclick="selectCAMAnswer(2,false,this)">
            <input type="radio" name="cam-f2" value="false">
            <span class="radio-label">Assente</span>
            <span class="radio-score">No</span>
          </label>
          <label class="radio-option" onclick="selectCAMAnswer(2,true,this)">
            <input type="radio" name="cam-f2" value="true">
            <span class="radio-label">Presente</span>
            <span class="radio-score">Sì</span>
          </label>
        </div>
      </div>

      <div class="question-item" id="cam-f3">
        <div class="question-title">
          <div class="question-number">3</div>
          <div>Pensiero Disorganizzato</div>
        </div>
        <div class="question-description">
          Il pensiero del paziente è disorganizzato o incoerente?
        </div>
        <div class="radio-options">
          <label class="radio-option" onclick="selectCAMAnswer(3,false,this)">
            <input type="radio" name="cam-f3" value="false">
            <span class="radio-label">Assente</span>
            <span class="radio-score">No</span>
          </label>
          <label class="radio-option" onclick="selectCAMAnswer(3,true,this)">
            <input type="radio" name="cam-f3" value="true">
            <span class="radio-label">Presente</span>
            <span class="radio-score">Sì</span>
          </label>
        </div>
      </div>

      <div class="question-item" id="cam-f4">
        <div class="question-title">
          <div class="question-number">4</div>
          <div>Livello di Coscienza Alterato</div>
        </div>
        <div class="question-description">
          Nel complesso, come valuta il livello di coscienza del paziente?
        </div>
        <div class="radio-options">
          <label class="radio-option" onclick="selectCAMAnswer(4,false,this)">
            <input type="radio" name="cam-f4" value="false">
            <span class="radio-label">Allerta (normale)</span>
            <span class="radio-score">No</span>
          </label>
          <label class="radio-option" onclick="selectCAMAnswer(4,true,this)">
            <input type="radio" name="cam-f4" value="true">
            <span class="radio-label">Vigile, letargico o stupor</span>
            <span class="radio-score">Sì</span>
          </label>
        </div>
      </div>

      <div id="cam-results" class="results-container hidden">
        <div class="score-display" id="cam-diagnosis"></div>
        <div class="score-interpretation" id="cam-interpretation"></div>
        <div class="score-description" id="cam-description"></div>
        <div class="action-buttons">
          <button class="btn btn-warning" onclick="printCAM()"><i class="fas fa-print me-2"></i>Stampa</button>
          <button class="btn btn-secondary" onclick="resetCAM()"><i class="fas fa-redo me-2"></i>Reset</button>
        </div>
      </div>
    </div>

    <div id="cam-reference" class="content-section hidden">
      <h3 class="text-center mb-4">Algoritmo Diagnostico CAM</h3>
      <div class="mb-3 p-3 bg-light rounded">
        Il delirium è diagnosticato dalla presenza di: <strong>Caratteristica 1 e Caratteristica 2</strong> e <strong>(Caratteristica 3 o Caratteristica 4)</strong>
      </div>
      <table class="scale-table">
        <thead>
          <tr><th>Caratteristica</th><th>Descrizione</th><th>Necessaria</th></tr>
        </thead>
        <tbody>
          <tr><td><strong>1. Esordio Acuto e Corso Fluttuante</strong></td><td>Cambiamento acuto dello stato mentale rispetto alla baseline e/o comportamento che varia durante il giorno</td><td>Richiesta</td></tr>
          <tr><td><strong>2. Disattenzione</strong></td><td>Difficoltà a focalizzare l'attenzione</td><td>Richiesta</td></tr>
          <tr><td><strong>3. Pensiero Disorganizzato</strong></td><td>Pensiero incoerente o conversazione sconnessa</td><td>3 o 4</td></tr>
          <tr><td><strong>4. Livello di Coscienza Alterato</strong></td><td>Diverso da allerta (vigile, letargico, stupor)</td><td>3 o 4</td></tr>
        </tbody>
      </table>
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="p-3 bg-success text-white rounded">DELIRIUM PRESENTE se 1 e 2 e (3 o 4)</div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-danger text-white rounded">DELIRIUM ASSENTE se manca 1 o 2 o entrambe 3 e 4</div>
        </div>
      </div>
    </div>
  </div>
</section>
