<?php
?>
<link rel="stylesheet" href="css/delirium.css">
<section id="4at-home" class="p-4 delirium-section" style="display:none;">
  <div class="mb-3">
    <button class="btn btn-outline-success me-2" onclick="navigateToSection('strumenti-valutazione-home'); showCategories();">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-secondary" style="border-color:#6f42c1;color:#6f42c1;" onclick="navigateToSection('strumenti-valutazione-home'); openCategoryView('delirium');">
      <i class="fas fa-arrow-left me-2"></i>Torna a Delirium
    </button>
  </div>

  <div id="4at-assessment" class="assessment-section">
    <div class="assessment-header">
      <h2>4AT - 4 'A's Test</h2>
      <p>Screening rapido per delirium</p>
    </div>

    <div class="mode-selector">
      <button class="mode-btn active" onclick="switch4ATMode('compile')">📝 Compila</button>
      <button class="mode-btn" onclick="switch4ATMode('reference')">📊 Scala di Riferimento</button>
    </div>

    <div id="4at-compile" class="content-section">
      <div class="patient-info">
        <h4><i class="fas fa-user me-2"></i>Dati Paziente</h4>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Nome Paziente</label>
            <input type="text" class="form-control" id="4at-patient-name" placeholder="Nome e cognome">
          </div>
          <div class="col-md-3">
            <label class="form-label">Data di Nascita</label>
            <input type="date" class="form-control" id="4at-patient-birth">
          </div>
          <div class="col-md-3">
            <label class="form-label">Data Valutazione</label>
            <input type="date" class="form-control" id="4at-date">
          </div>
        </div>
      </div>

      <div class="progress-container">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span><strong>Progresso Compilazione</strong></span>
          <span id="4at-progress-text">0/4 completati</span>
        </div>
        <div class="progress">
          <div class="progress-bar" id="4at-progress-bar" role="progressbar" style="width:0%"></div>
        </div>
      </div>

      <div class="question-item" id="4at-q1">
        <div class="question-title">
          <div class="question-number">1</div>
          <div>Allerta (Alertness)</div>
        </div>
        <div class="question-description">
          Valutare il livello di allerta del paziente. Se addormentato, cercare di svegliarlo normalmente.
        </div>
        <div class="radio-options">
          <label class="radio-option" onclick="select4ATAnswer(1,0,this)">
            <input type="radio" name="4at-q1" value="0">
            <span class="radio-label">Normale (completamente allerta o facile da svegliare)</span>
            <span class="radio-score">0</span>
          </label>
          <label class="radio-option" onclick="select4ATAnswer(1,4,this)">
            <input type="radio" name="4at-q1" value="4">
            <span class="radio-label">Alterata (chiaramente anomala, soporoso/stupor)</span>
            <span class="radio-score">4</span>
          </label>
        </div>
      </div>

      <div class="question-item" id="4at-q2">
        <div class="question-title">
          <div class="question-number">2</div>
          <div>Test di Attenzione</div>
        </div>
        <div class="question-description">
          Dire al paziente: "Ora dirò alcune lettere. Ogni volta che sente la lettera 'A', batta le mani".<br>
          Sequenza: SAVEAHAART.
        </div>
        <div class="radio-options">
          <label class="radio-option" onclick="select4ATAnswer(2,0,this)">
            <input type="radio" name="4at-q2" value="0">
            <span class="radio-label">Nessun errore</span>
            <span class="radio-score">0</span>
          </label>
          <label class="radio-option" onclick="select4ATAnswer(2,1,this)">
            <input type="radio" name="4at-q2" value="1">
            <span class="radio-label">1 errore</span>
            <span class="radio-score">1</span>
          </label>
          <label class="radio-option" onclick="select4ATAnswer(2,2,this)">
            <input type="radio" name="4at-q2" value="2">
            <span class="radio-label">2 o più errori / non testabile</span>
            <span class="radio-score">2</span>
          </label>
        </div>
      </div>

      <div class="question-item" id="4at-q3">
        <div class="question-title">
          <div class="question-number">3</div>
          <div>Attenzione (test alternativo)</div>
        </div>
        <div class="question-description">
          Se il paziente non riesce a completare il test precedente, chiedere: "Può dirmi tutti i mesi dell'anno all'indietro, partendo da dicembre?"
        </div>
        <div class="radio-options">
          <label class="radio-option" onclick="select4ATAnswer(3,0,this)">
            <input type="radio" name="4at-q3" value="0">
            <span class="radio-label">7 o più mesi corretti</span>
            <span class="radio-score">0</span>
          </label>
          <label class="radio-option" onclick="select4ATAnswer(3,1,this)">
            <input type="radio" name="4at-q3" value="1">
            <span class="radio-label">Meno di 7 mesi / si rifiuta di iniziare</span>
            <span class="radio-score">1</span>
          </label>
          <label class="radio-option" onclick="select4ATAnswer(3,2,this)">
            <input type="radio" name="4at-q3" value="2">
            <span class="radio-label">Non testabile</span>
            <span class="radio-score">2</span>
          </label>
        </div>
      </div>

      <div class="question-item" id="4at-q4">
        <div class="question-title">
          <div class="question-number">4</div>
          <div>Cambiamento Acuto o Corso Fluttuante</div>
        </div>
        <div class="question-description">
          C'è evidenza di cambiamento significativo nello stato mentale rispetto alla baseline? Il comportamento varia durante il giorno?
        </div>
        <div class="radio-options">
          <label class="radio-option" onclick="select4ATAnswer(4,0,this)">
            <input type="radio" name="4at-q4" value="0">
            <span class="radio-label">No</span>
            <span class="radio-score">0</span>
          </label>
          <label class="radio-option" onclick="select4ATAnswer(4,4,this)">
            <input type="radio" name="4at-q4" value="4">
            <span class="radio-label">Sì</span>
            <span class="radio-score">4</span>
          </label>
        </div>
      </div>

      <div id="4at-results" class="results-container hidden">
        <div class="score-display" id="4at-score">0</div>
        <div class="score-interpretation" id="4at-interpretation"></div>
        <div class="score-description" id="4at-description"></div>
        <div class="action-buttons">
          <button class="btn btn-warning" onclick="print4AT()"><i class="fas fa-print me-2"></i>Stampa</button>
          <button class="btn btn-secondary" onclick="reset4AT()"><i class="fas fa-redo me-2"></i>Reset</button>
        </div>
      </div>
    </div>

    <div id="4at-reference" class="content-section hidden">
      <h3 class="text-center mb-4">Scala di Riferimento 4AT</h3>
      <table class="scale-table">
        <thead>
          <tr><th>Parametro</th><th>Punteggio</th><th>Descrizione</th></tr>
        </thead>
        <tbody>
          <tr><td><strong>1. Allerta</strong></td><td>0</td><td>Normale (completamente allerta o facile da svegliare)</td></tr>
          <tr><td></td><td>4</td><td>Alterata (chiaramente anomala, soporoso/stupor)</td></tr>
          <tr><td><strong>2. Test Attenzione</strong></td><td>0</td><td>Nessun errore</td></tr>
          <tr><td></td><td>1</td><td>1 errore</td></tr>
          <tr><td></td><td>2</td><td>2 o più errori / non testabile</td></tr>
          <tr><td><strong>3. Attenzione (alternativo)</strong></td><td>0</td><td>7 o più mesi corretti all'indietro</td></tr>
          <tr><td></td><td>1</td><td>Meno di 7 mesi / si rifiuta</td></tr>
          <tr><td></td><td>2</td><td>Non testabile</td></tr>
          <tr><td><strong>4. Cambiamento Acuto</strong></td><td>0</td><td>Nessun cambiamento significativo</td></tr>
          <tr><td></td><td>4</td><td>Cambiamento acuto o corso fluttuante</td></tr>
        </tbody>
      </table>
      <div class="mt-4 p-3 bg-light rounded">
        <h5 class="mb-2">Interpretazione Punteggi:</h5>
        <ul class="mb-0">
          <li><strong>0 punti:</strong> Delirium improbabile</li>
          <li><strong>1-3 punti:</strong> Possibile deterioramento cognitivo</li>
          <li><strong>4+ punti:</strong> Possibile delirium ± deterioramento cognitivo</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<script src="js/delirium.js"></script>
