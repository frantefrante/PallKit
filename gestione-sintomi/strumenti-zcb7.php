<?php
?>
<link rel="stylesheet" href="css/zcb7.css">
<section id="zcb7-home" class="zcb7-container" style="display:none;">
  <div class="mb-3 print-hide">
    <button class="btn btn-outline-secondary" onclick="window.location.href='index.php#strumenti-valutazione-home';">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-secondary ms-2" onclick="window.location.href='caregiving.php';">
      <i class="fas fa-arrow-left me-2"></i>Torna a Caregiving
    </button>
  </div>

  <div class="zcb7-header">
    <h1><i class="fas fa-heart-pulse me-3"></i>ZCB-7</h1>
    <p>Zarit Caregiver Burden - 7 items</p>
  </div>

  <div class="mode-selector">
    <a href="#" class="mode-btn active" onclick="switchZCB7Mode('compile')"><i class="fas fa-edit me-2"></i>Compila</a>
    <a href="#" class="mode-btn" onclick="switchZCB7Mode('visualize')"><i class="fas fa-eye me-2"></i>Visualizza</a>
    <a href="#" class="mode-btn" onclick="switchZCB7Mode('glossary')"><i class="fas fa-book me-2"></i>Glossario</a>
  </div>

  <div id="zcb7-compile-section" class="content-section active">
    <div class="patient-info-card">
      <h3><i class="fas fa-user me-2"></i>Dati Caregiver</h3>
      <div class="row">
        <div class="col-md-4">
          <label class="form-label">Nome Caregiver</label>
          <input type="text" class="form-control" id="zcb7-caregiver-name" placeholder="Nome caregiver">
        </div>
        <div class="col-md-4">
          <label class="form-label">Nome Paziente</label>
          <input type="text" class="form-control" id="zcb7-patient-name" placeholder="Nome paziente">
        </div>
        <div class="col-md-4">
          <label class="form-label">Data Compilazione</label>
          <input type="date" class="form-control" id="zcb7-date">
        </div>
      </div>
    </div>

    <div class="progress-container">
      <h4><i class="fas fa-chart-line me-2"></i>Progresso Compilazione</h4>
      <div class="progress">
        <div class="progress-bar" role="progressbar" id="zcb7-progress" style="width: 0%"></div>
      </div>
      <div class="text-center mt-2">
        <span id="zcb7-progress-text">0 di 7 domande completate</span>
      </div>
    </div>

    <div class="form-group">
      <div class="item-question">
        <span class="item-number">1</span>
        Sente di non avere abbastanza tempo per sé a causa dell'assistenza che fornisce?
      </div>
      <div class="radio-group" data-question="q1">
        <div class="radio-option" onclick="selectZCB7Option('q1', 0, this)">
          <input type="radio" name="q1" value="0">
          <label>0 - Mai</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q1', 1, this)">
          <input type="radio" name="q1" value="1">
          <label>1 - Raramente</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q1', 2, this)">
          <input type="radio" name="q1" value="2">
          <label>2 - Qualche volta</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q1', 3, this)">
          <input type="radio" name="q1" value="3">
          <label>3 - Abbastanza spesso</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q1', 4, this)">
          <input type="radio" name="q1" value="4">
          <label>4 - Quasi sempre</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="item-question">
        <span class="item-number">2</span>
        Si sente sotto pressione nel dover conciliare l'assistenza con le altre responsabilità (famiglia/lavoro)?
      </div>
      <div class="radio-group" data-question="q2">
        <div class="radio-option" onclick="selectZCB7Option('q2', 0, this)">
          <input type="radio" name="q2" value="0">
          <label>0 - Mai</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q2', 1, this)">
          <input type="radio" name="q2" value="1">
          <label>1 - Raramente</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q2', 2, this)">
          <input type="radio" name="q2" value="2">
          <label>2 - Qualche volta</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q2', 3, this)">
          <input type="radio" name="q2" value="3">
          <label>3 - Abbastanza spesso</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q2', 4, this)">
          <input type="radio" name="q2" value="4">
          <label>4 - Quasi sempre</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="item-question">
        <span class="item-number">3</span>
        Sente che l'assistenza che fornisce influisce negativamente sulle sue relazioni con gli altri?
      </div>
      <div class="radio-group" data-question="q3">
        <div class="radio-option" onclick="selectZCB7Option('q3', 0, this)">
          <input type="radio" name="q3" value="0">
          <label>0 - Mai</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q3', 1, this)">
          <input type="radio" name="q3" value="1">
          <label>1 - Raramente</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q3', 2, this)">
          <input type="radio" name="q3" value="2">
          <label>2 - Qualche volta</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q3', 3, this)">
          <input type="radio" name="q3" value="3">
          <label>3 - Abbastanza spesso</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q3', 4, this)">
          <input type="radio" name="q3" value="4">
          <label>4 - Quasi sempre</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="item-question">
        <span class="item-number">4</span>
        Si sente teso/a quando è con la persona di cui si prende cura?
      </div>
      <div class="radio-group" data-question="q4">
        <div class="radio-option" onclick="selectZCB7Option('q4', 0, this)">
          <input type="radio" name="q4" value="0">
          <label>0 - Mai</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q4', 1, this)">
          <input type="radio" name="q4" value="1">
          <label>1 - Raramente</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q4', 2, this)">
          <input type="radio" name="q4" value="2">
          <label>2 - Qualche volta</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q4', 3, this)">
          <input type="radio" name="q4" value="3">
          <label>3 - Abbastanza spesso</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q4', 4, this)">
          <input type="radio" name="q4" value="4">
          <label>4 - Quasi sempre</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="item-question">
        <span class="item-number">5</span>
        Si sente incerto/a su cosa fare o dire per aiutare la persona di cui si prende cura?
      </div>
      <div class="radio-group" data-question="q5">
        <div class="radio-option" onclick="selectZCB7Option('q5', 0, this)">
          <input type="radio" name="q5" value="0">
          <label>0 - Mai</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q5', 1, this)">
          <input type="radio" name="q5" value="1">
          <label>1 - Raramente</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q5', 2, this)">
          <input type="radio" name="q5" value="2">
          <label>2 - Qualche volta</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q5', 3, this)">
          <input type="radio" name="q5" value="3">
          <label>3 - Abbastanza spesso</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q5', 4, this)">
          <input type="radio" name="q5" value="4">
          <label>4 - Quasi sempre</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="item-question">
        <span class="item-number">6</span>
        Sente di aver perso il controllo della sua vita da quando ha iniziato a prendersi cura della persona?
      </div>
      <div class="radio-group" data-question="q6">
        <div class="radio-option" onclick="selectZCB7Option('q6', 0, this)">
          <input type="radio" name="q6" value="0">
          <label>0 - Mai</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q6', 1, this)">
          <input type="radio" name="q6" value="1">
          <label>1 - Raramente</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q6', 2, this)">
          <input type="radio" name="q6" value="2">
          <label>2 - Qualche volta</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q6', 3, this)">
          <input type="radio" name="q6" value="3">
          <label>3 - Abbastanza spesso</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q6', 4, this)">
          <input type="radio" name="q6" value="4">
          <label>4 - Quasi sempre</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="item-question">
        <span class="item-number">7</span>
        Nel complesso, quanto si sente sovraccaricato/a dal prendersi cura della persona?
      </div>
      <div class="radio-group" data-question="q7">
        <div class="radio-option" onclick="selectZCB7Option('q7', 0, this)">
          <input type="radio" name="q7" value="0">
          <label>0 - Per niente</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q7', 1, this)">
          <input type="radio" name="q7" value="1">
          <label>1 - Poco</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q7', 2, this)">
          <input type="radio" name="q7" value="2">
          <label>2 - Moderatamente</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q7', 3, this)">
          <input type="radio" name="q7" value="3">
          <label>3 - Molto</label>
        </div>
        <div class="radio-option" onclick="selectZCB7Option('q7', 4, this)">
          <input type="radio" name="q7" value="4">
          <label>4 - Estremamente</label>
        </div>
      </div>
    </div>

    <div class="results-container" id="zcb7-results">
      <div class="score-display" id="zcb7-score">-</div>
      <div class="score-interpretation" id="zcb7-interpretation">Punteggio ZCB-7</div>
      <div class="score-description" id="zcb7-description">Completa tutte le domande per vedere l'interpretazione</div>
    </div>

    <div class="action-buttons">
      <button class="btn btn-primary" onclick="saveZCB7()">
        <i class="fas fa-save me-2"></i>Salva Valutazione
      </button>
      <button class="btn btn-outline-primary" onclick="printZCB7()">
        <i class="fas fa-print me-2"></i>Stampa Report
      </button>
      <button class="btn btn-outline-primary" onclick="resetZCB7()">
        <i class="fas fa-redo me-2"></i>Reset
      </button>
    </div>
  </div>

  <div id="zcb7-visualize-section" class="content-section">
    <div class="template-section">
      <h3><i class="fas fa-table me-2"></i>Scala ZCB-7 Completa</h3>
      <table class="scale-table">
        <thead>
          <tr>
            <th>Item</th>
            <th>Domanda</th>
            <th>Scala</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>1</strong></td>
            <td>Tempo per sé</td>
            <td>0=Mai, 1=Raramente, 2=Qualche volta, 3=Abbastanza spesso, 4=Quasi sempre</td>
          </tr>
          <tr>
            <td><strong>2</strong></td>
            <td>Pressione conciliare responsabilità</td>
            <td>0=Mai, 1=Raramente, 2=Qualche volta, 3=Abbastanza spesso, 4=Quasi sempre</td>
          </tr>
          <tr>
            <td><strong>3</strong></td>
            <td>Influenza relazioni</td>
            <td>0=Mai, 1=Raramente, 2=Qualche volta, 3=Abbastanza spesso, 4=Quasi sempre</td>
          </tr>
          <tr>
            <td><strong>4</strong></td>
            <td>Tensione con paziente</td>
            <td>0=Mai, 1=Raramente, 2=Qualche volta, 3=Abbastanza spesso, 4=Quasi sempre</td>
          </tr>
          <tr>
            <td><strong>5</strong></td>
            <td>Incertezza come aiutare</td>
            <td>0=Mai, 1=Raramente, 2=Qualche volta, 3=Abbastanza spesso, 4=Quasi sempre</td>
          </tr>
          <tr>
            <td><strong>6</strong></td>
            <td>Perdita controllo vita</td>
            <td>0=Mai, 1=Raramente, 2=Qualche volta, 3=Abbastanza spesso, 4=Quasi sempre</td>
          </tr>
          <tr>
            <td><strong>7</strong></td>
            <td>Sovraccarico globale</td>
            <td>0=Per niente, 1=Poco, 2=Moderatamente, 3=Molto, 4=Estremamente</td>
          </tr>
        </tbody>
      </table>

      <div style="background:#f8f9fa;padding:2rem;border-radius:15px;margin-top:2rem;">
        <h4 style="color:#e83e8c;">📊 Interpretazione Punteggio</h4>
        <ul style="margin:0;padding-left:1.5rem;color:#666;">
          <li><strong>Punteggio totale:</strong> 0-28 punti (somma di tutti i 7 item)</li>
          <li><strong>Punteggio più alto = maggior burden del caregiver</strong></li>
          <li><strong>Non esistono cut-off universali:</strong> usare come misura continua</li>
          <li><strong>Correlazione con ZBI-22:</strong> ρ ≈ 0,90 (ottima accuratezza)</li>
          <li><strong>Tempo di compilazione:</strong> 3-5 minuti</li>
        </ul>
      </div>

      <div class="action-buttons">
        <button class="btn btn-outline-primary" onclick="printZCB7Template()">
          <i class="fas fa-print me-2"></i>Stampa Template
        </button>
      </div>
    </div>
  </div>

  <div id="zcb7-glossary-section" class="content-section">
    <div class="template-section">
      <h3><i class="fas fa-book me-2"></i>Glossario Clinico ZCB-7</h3>

      <div class="mb-4">
        <h5 style="color:#e83e8c;">Cos'è il Burden del Caregiver</h5>
        <p>Il burden (carico/peso) del caregiver rappresenta l'impatto fisico, emotivo, sociale ed economico che deriva dal prendersi cura di una persona con malattia cronica o disabilità. Include stress, affaticamento, isolamento sociale e perdita di autonomia personale.</p>
      </div>

      <div class="mb-4">
        <h5 style="color:#e83e8c;">Validazione ZCB-7</h5>
        <p>Lo ZCB-7 è stato validato da Higginson et al. su caregiver di persone con condizioni avanzate in ambito palliativo. Mostra un'ottima accuratezza (AUC ~0,98) nel discriminare il burden elevato rispetto alla scala completa ZBI-22.</p>
      </div>

      <div class="mb-4">
        <h5 style="color:#e83e8c;">Utilizzo Clinico</h5>
        <ul>
          <li><strong>Screening rapido</strong> del burden del caregiver</li>
          <li><strong>Monitoraggio longitudinale</strong> dell'impatto assistenziale</li>
          <li><strong>Identificazione di caregiver a rischio</strong> di burnout</li>
          <li><strong>Pianificazione interventi di supporto</strong> personalizzati</li>
        </ul>
      </div>

      <div class="mb-4">
        <h5 style="color:#e83e8c;">Interpretazione Risultati</h5>
        <p>Non esistendo cut-off universali, il punteggio va interpretato considerando il contesto clinico, la fase di malattia e le risorse disponibili. Punteggi più elevati indicano maggior necessità di supporto e interventi mirati.</p>
      </div>

      <div style="background:#fff3cd;padding:1.5rem;border-radius:12px;border-left:4px solid #ffc107;">
        <h6 style="color:#856404;"><i class="fas fa-exclamation-triangle me-2"></i>Nota Importante</h6>
        <p style="color:#856404;margin:0;">Il ZCB-7 è uno strumento di screening. Per valutazioni dettagliate o decisioni cliniche complesse, considerare l'utilizzo della scala completa ZBI-22 o ZBI-12.</p>
      </div>
    </div>
  </div>
</section>
<script src="js/zcb7.js"></script>
