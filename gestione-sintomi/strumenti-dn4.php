<?php
?>
<link rel="stylesheet" href="css/dn4.css">
<section id="dn4-home" class="p-4" style="display:none;">
  <div class="mb-3">
    <button class="btn btn-outline-success" onclick="navigateToSection('strumenti-valutazione-home'); showCategories();">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
  </div>
  <div class="container-fluid">
    <div class="dn4-container">
      <div class="dn4-header">
        <h1><i class="fas fa-exclamation-triangle me-3"></i>DN4</h1>
        <p>Douleur Neuropathique 4 Questions - Valutazione Dolore Neuropatico</p>
      </div>

      <div class="mode-selector">
        <a href="#" class="mode-btn active" data-mode="compile" onclick="switchDN4Mode('compile');return false;">
          <i class="fas fa-edit me-2"></i>Compila
        </a>
        <a href="#" class="mode-btn" data-mode="visualize" onclick="switchDN4Mode('visualize');return false;">
          <i class="fas fa-table me-2"></i>Visualizza Scala
        </a>
      </div>

      <div id="compile-section" class="content-section active">
        <div class="patient-info">
          <h3><i class="fas fa-user me-2"></i>Dati Paziente</h3>
          <div class="row">
            <div class="col-md-6">
              <label class="form-label fw-bold">Nome Paziente</label>
              <input type="text" class="form-control" id="dn4-patient-name" placeholder="Nome e cognome">
            </div>
            <div class="col-md-3">
              <label class="form-label fw-bold">Data di Nascita</label>
              <input type="date" class="form-control" id="dn4-birth-date">
            </div>
            <div class="col-md-3">
              <label class="form-label fw-bold">Data Compilazione</label>
              <input type="date" class="form-control" id="dn4-compile-date">
            </div>
          </div>
        </div>

        <div class="progress-section">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="fw-bold">Progresso Compilazione</span>
            <span class="fw-bold" id="progress-text">0/10 completate</span>
          </div>
          <div class="progress">
            <div class="progress-bar" id="progress-bar" style="width:0%"></div>
          </div>
        </div>

        <div class="question-section">
          <h4><i class="fas fa-brain me-2"></i>Sezione A - Sintomi (Intervista Paziente)</h4>

          <div class="question-item" data-question="q1">
            <div class="question-text">1. Il dolore presenta una o più delle seguenti caratteristiche?</div>
            <div class="answer-options">
              <div class="answer-option" onclick="selectAnswer('q1a','si',this)"><i class="fas fa-fire me-2"></i>Bruciore</div>
              <div class="answer-option" onclick="selectAnswer('q1b','si',this)"><i class="fas fa-snowflake me-2"></i>Sensazione di freddo doloroso</div>
              <div class="answer-option" onclick="selectAnswer('q1c','si',this)"><i class="fas fa-bolt me-2"></i>Scosse elettriche</div>
              <div class="answer-option" onclick="selectAnswer('q1','no',this)" data-exclude="q1a,q1b,q1c"><i class="fas fa-times me-2"></i>Nessuna</div>
            </div>
          </div>

          <div class="question-item" data-question="q2">
            <div class="question-text">2. Il dolore è associato a uno o più dei seguenti sintomi nella stessa zona?</div>
            <div class="answer-options">
              <div class="answer-option" onclick="selectAnswer('q2a','si',this)"><i class="fas fa-hand-paper me-2"></i>Formicolio</div>
              <div class="answer-option" onclick="selectAnswer('q2b','si',this)"><i class="fas fa-hand-point-up me-2"></i>Spilli e aghi</div>
              <div class="answer-option" onclick="selectAnswer('q2c','si',this)"><i class="fas fa-eye-slash me-2"></i>Intorpidimento</div>
              <div class="answer-option" onclick="selectAnswer('q2d','si',this)"><i class="fas fa-hand-rock me-2"></i>Prurito</div>
              <div class="answer-option" onclick="selectAnswer('q2','no',this)" data-exclude="q2a,q2b,q2c,q2d"><i class="fas fa-times me-2"></i>Nessuno</div>
            </div>
          </div>
        </div>

        <div class="question-section">
          <h4><i class="fas fa-stethoscope me-2"></i>Sezione B - Esame Clinico</h4>

          <div class="question-item" data-question="q3">
            <div class="question-text">3. Il dolore è localizzato in un'area dove l'esame fisico può rivelare:</div>
            <div class="answer-options">
              <div class="answer-option" onclick="selectAnswer('q3a','si',this)"><i class="fas fa-minus me-2"></i>Ipoestesia al tatto</div>
              <div class="answer-option" onclick="selectAnswer('q3b','si',this)"><i class="fas fa-thermometer-half me-2"></i>Ipoestesia alla puntura</div>
              <div class="answer-option" onclick="selectAnswer('q3','no',this)" data-exclude="q3a,q3b"><i class="fas fa-times me-2"></i>Nessuna</div>
            </div>
          </div>

          <div class="question-item" data-question="q4">
            <div class="question-text">4. Il dolore può essere causato o aumentato da spazzolamento leggero nell'area dolorosa?</div>
            <div class="answer-options">
              <div class="answer-option" onclick="selectSimpleAnswer('q4','si',this)"><i class="fas fa-check me-2"></i>Sì</div>
              <div class="answer-option" onclick="selectSimpleAnswer('q4','no',this)"><i class="fas fa-times me-2"></i>No</div>
            </div>
          </div>
        </div>

        <div class="results-section" id="dn4-results-section">
          <div class="score-display" id="dn4-total-score">0/10</div>
          <div class="score-interpretation" id="dn4-score-interpretation">Punteggio insufficiente</div>
          <div class="score-description" id="dn4-score-description">Completa la valutazione per ottenere l'interpretazione</div>
        </div>

        <div class="action-buttons">
          <button class="btn btn-outline-dn4 btn-dn4" onclick="printDN4()"><i class="fas fa-print me-2"></i>Stampa Scheda</button>
          <button class="btn btn-danger-dn4 btn-dn4" onclick="resetDN4()"><i class="fas fa-redo me-2"></i>Reset</button>
        </div>
      </div>

      <div id="visualize-section" class="content-section">
        <div class="template-section">
          <div class="template-header">
            <h2>DN4 - DOULEUR NEUROPATHIQUE 4 QUESTIONS</h2>
            <p class="text-muted">Questionario per l'identificazione del dolore neuropatico</p>
          </div>
          <div class="row mb-4">
            <div class="col-md-6"><strong>Paziente:</strong> ________________________</div>
            <div class="col-md-3"><strong>Data nascita:</strong> ___________</div>
            <div class="col-md-3"><strong>Data:</strong> ___________</div>
          </div>
          <table class="template-table">
            <thead>
              <tr><th style="width:70%">Domanda</th><th style="width:15%">Sì</th><th style="width:15%">No</th></tr>
            </thead>
            <tbody>
              <tr><td colspan="3" style="background: var(--dn4-light); font-weight:bold;"><i class="fas fa-brain me-2"></i>SEZIONE A - SINTOMI (Intervista al paziente)</td></tr>
              <tr><td><strong>1.</strong> Il dolore presenta bruciore?</td><td style="text-align:center;">☐</td><td style="text-align:center;">☐</td></tr>
              <tr><td><strong>2.</strong> Il dolore presenta sensazione di freddo doloroso?</td><td style="text-align:center;">☐</td><td style="text-align:center;">☐</td></tr>
              <tr><td><strong>3.</strong> Il dolore presenta scosse elettriche?</td><td style="text-align:center;">☐</td><td style="text-align:center;">☐</td></tr>
              <tr><td><strong>4.</strong> Il dolore è associato a formicolio nella stessa zona?</td><td style="text-align:center;">☐</td><td style="text-align:center;">☐</td></tr>
              <tr><td><strong>5.</strong> Il dolore è associato a sensazione di spilli e aghi?</td><td style="text-align:center;">☐</td><td style="text-align:center;">☐</td></tr>
              <tr><td><strong>6.</strong> Il dolore è associato a intorpidimento?</td><td style="text-align:center;">☐</td><td style="text-align:center;">☐</td></tr>
              <tr><td><strong>7.</strong> Il dolore è associato a prurito?</td><td style="text-align:center;">☐</td><td style="text-align:center;">☐</td></tr>
              <tr><td colspan="3" style="background: var(--dn4-light); font-weight:bold;"><i class="fas fa-stethoscope me-2"></i>SEZIONE B - ESAME CLINICO</td></tr>
              <tr><td><strong>8.</strong> Ipoestesia al tatto nell'area dolorosa?</td><td style="text-align:center;">☐</td><td style="text-align:center;">☐</td></tr>
              <tr><td><strong>9.</strong> Ipoestesia alla puntura nell'area dolorosa?</td><td style="text-align:center;">☐</td><td style="text-align:center;">☐</td></tr>
              <tr><td><strong>10.</strong> Il dolore può essere scatenato da spazzolamento leggero?</td><td style="text-align:center;">☐</td><td style="text-align:center;">☐</td></tr>
            </tbody>
          </table>
          <div class="score-interpretation-box">
            <h4><i class="fas fa-calculator me-2"></i>Calcolo del Punteggio</h4>
            <p><strong>Punteggio totale:</strong> _____ / 10</p>
            <h4 class="mt-4"><i class="fas fa-chart-line me-2"></i>Interpretazione</h4>
            <ul>
              <li><strong>≥ 4/10:</strong> Dolore di origine neuropatica molto probabile</li>
              <li><strong>&lt; 4/10:</strong> Dolore di origine neuropatica improbabile</li>
            </ul>
            <div class="mt-4"><strong>Sensibilità:</strong> 82.9% | <strong>Specificità:</strong> 89.9%</div>
          </div>
          <div class="mt-4">
            <p class="text-muted"><strong>Riferimento:</strong> Bouhassira D, et al. Comparison of pain syndromes associated with nervous or somatic lesions and development of a new neuropathic pain diagnostic questionnaire (DN4). Pain 2005; 114: 29-36.</p>
          </div>
          <div class="action-buttons mt-4">
            <button class="btn btn-outline-dn4 btn-dn4" onclick="printDN4Template()"><i class="fas fa-print me-2"></i>Stampa Template</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="js/dn4.js"></script>
