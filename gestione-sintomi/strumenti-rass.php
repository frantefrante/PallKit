<?php
?>
<link rel="stylesheet" href="css/rass.css">
<section id="rass-home" class="p-4" style="display:none;">
  <div class="mb-3 print-hide">
    <button class="btn btn-outline-secondary" onclick="navigateToSection('strumenti-valutazione-home'); showCategories();">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-secondary ms-2" onclick="navigateToSection('strumenti-valutazione-home'); openCategoryView('sedazione');">
      <i class="fas fa-arrow-left me-2"></i>Torna a Sedazione
    </button>
  </div>
  <div class="section-container">
    <div class="rass-header">
      <h1><i class="fas fa-stethoscope me-3"></i>RASS</h1>
      <p>Richmond Agitation-Sedation Scale - Valutazione del livello di sedazione</p>
      <div class="mode-selector">
        <a href="#" class="mode-btn active" data-mode="compile" onclick="switchRASSMode('compile');return false;">
          <i class="fas fa-edit me-2"></i>Compila Scala
        </a>
        <a href="#" class="mode-btn" data-mode="visualize" onclick="switchRASSMode('visualize');return false;">
          <i class="fas fa-eye me-2"></i>Visualizza Scala
        </a>
      </div>
    </div>

    <div id="compile-section" class="content-section active">
      <div class="compile-container">
        <div class="patient-data">
          <h4><i class="fas fa-user me-2"></i>Dati Paziente</h4>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Nome Paziente</label>
              <input type="text" class="form-control" id="rass-patient-name" placeholder="Nome e cognome">
            </div>
            <div class="form-group">
              <label class="form-label">Data Valutazione</label>
              <input type="date" class="form-control" id="rass-date">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Ora</label>
              <input type="time" class="form-control" id="rass-time">
            </div>
            <div class="form-group">
              <label class="form-label">Operatore</label>
              <input type="text" class="form-control" id="rass-operator" placeholder="Nome operatore">
            </div>
          </div>
        </div>

        <div class="scale-section">
          <div class="scale-title">Seleziona il livello RASS corrispondente:</div>
          <div class="option-item" data-score="4" onclick="selectRASSScore(4, this)">
            <div class="option-score">+4</div>
            <div class="option-description"><strong>Combattivo:</strong> Apertamente combattivo, violento, pericolo immediato per lo staff</div>
          </div>
          <div class="option-item" data-score="3" onclick="selectRASSScore(3, this)">
            <div class="option-score">+3</div>
            <div class="option-description"><strong>Molto agitato:</strong> Tira o rimuove tubi/cateteri, aggressivo</div>
          </div>
          <div class="option-item" data-score="2" onclick="selectRASSScore(2, this)">
            <div class="option-score">+2</div>
            <div class="option-description"><strong>Agitato:</strong> Movimenti frequenti e non finalizzati, combatte il ventilatore</div>
          </div>
          <div class="option-item" data-score="1" onclick="selectRASSScore(1, this)">
            <div class="option-score">+1</div>
            <div class="option-description"><strong>Irrequieto:</strong> Ansioso ma movimenti non aggressivi né vigorosi</div>
          </div>
          <div class="option-item" data-score="0" onclick="selectRASSScore(0, this)">
            <div class="option-score">0</div>
            <div class="option-description"><strong>Vigile e calmo</strong></div>
          </div>
          <div class="option-item" data-score="-1" onclick="selectRASSScore(-1, this)">
            <div class="option-score">-1</div>
            <div class="option-description"><strong>Assonnato:</strong> Non completamente vigile ma mantiene risveglio alla voce (≥10 sec)</div>
          </div>
          <div class="option-item" data-score="-2" onclick="selectRASSScore(-2, this)">
            <div class="option-score">-2</div>
            <div class="option-description"><strong>Sedazione leggera:</strong> Si risveglia brevemente alla voce (<10 sec)</div>
          </div>
          <div class="option-item" data-score="-3" onclick="selectRASSScore(-3, this)">
            <div class="option-score">-3</div>
            <div class="option-description"><strong>Sedazione moderata:</strong> Movimento/apertura occhi alla voce ma senza contatto visivo</div>
          </div>
          <div class="option-item" data-score="-4" onclick="selectRASSScore(-4, this)">
            <div class="option-score">-4</div>
            <div class="option-description"><strong>Sedazione profonda:</strong> Nessuna risposta alla voce, movimento/apertura occhi alla stimolazione fisica</div>
          </div>
          <div class="option-item" data-score="-5" onclick="selectRASSScore(-5, this)">
            <div class="option-score">-5</div>
            <div class="option-description"><strong>Non risvegliabile:</strong> Nessuna risposta alla voce o stimolazione fisica</div>
          </div>
        </div>

        <div id="rass-results" class="results-display">
          <div class="result-score" id="rass-score-display">-</div>
          <div class="result-level" id="rass-level-display">-</div>
          <div class="result-description" id="rass-description-display">-</div>
        </div>

        <div class="action-buttons">
          <button class="btn btn-danger" onclick="resetRASSForm()">
            <i class="fas fa-undo me-2"></i>Reset
          </button>
          <button class="btn btn-primary" onclick="printRASS('compile');return false;">
            <i class="fas fa-print me-2"></i>Stampa Scheda
          </button>
          <button class="btn btn-outline-primary" onclick="printRASSReport();return false;">
            <i class="fas fa-file-arrow-down me-2"></i>Scarica Report
          </button>
        </div>
      </div>
    </div>

    <div id="visualize-section" class="content-section">
      <div class="print-template">
        <div class="template-header">
          <div class="template-title">RASS - Richmond Agitation-Sedation Scale</div>
          <div class="template-subtitle">Scala di Valutazione della Sedazione e Agitazione</div>
        </div>
        <div class="patient-info-box">
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
            <div>
              <strong>Paziente:</strong> ____________________<br>
              <strong>Data:</strong> ____________________
            </div>
            <div>
              <strong>Ora:</strong> ____________________<br>
              <strong>Operatore:</strong> ____________________
            </div>
          </div>
        </div>
        <table class="scale-table">
          <thead>
            <tr>
              <th style="width: 80px;">Punteggio</th>
              <th>Termine</th>
              <th>Descrizione</th>
              <th style="width: 60px;">✓</th>
            </tr>
          </thead>
          <tbody>
            <tr style="background: #ffe6e6;"><td><strong>+4</strong></td><td><strong>Combattivo</strong></td><td>Apertamente combattivo, violento, pericolo immediato per lo staff</td><td>☐</td></tr>
            <tr style="background: #fff2e6;"><td><strong>+3</strong></td><td><strong>Molto agitato</strong></td><td>Tira o rimuove tubi/cateteri, aggressivo</td><td>☐</td></tr>
            <tr style="background: #fff9e6;"><td><strong>+2</strong></td><td><strong>Agitato</strong></td><td>Movimenti frequenti e non finalizzati, combatte il ventilatore</td><td>☐</td></tr>
            <tr style="background: #fffff0;"><td><strong>+1</strong></td><td><strong>Irrequieto</strong></td><td>Ansioso ma movimenti non aggressivi né vigorosi</td><td>☐</td></tr>
            <tr style="background: #f0fff0;"><td><strong>0</strong></td><td><strong>Vigile e calmo</strong></td><td>Completamente vigile e calmo</td><td>☐</td></tr>
            <tr style="background: #e6f3ff;"><td><strong>-1</strong></td><td><strong>Assonnato</strong></td><td>Non completamente vigile ma mantiene risveglio alla voce (≥10 sec)</td><td>☐</td></tr>
            <tr style="background: #e6f0ff;"><td><strong>-2</strong></td><td><strong>Sedazione leggera</strong></td><td>Si risveglia brevemente alla voce (<10 sec)</td><td>☐</td></tr>
            <tr style="background: #e6ecff;"><td><strong>-3</strong></td><td><strong>Sedazione moderata</strong></td><td>Movimento/apertura occhi alla voce ma senza contatto visivo</td><td>☐</td></tr>
            <tr style="background: #e6e9ff;"><td><strong>-4</strong></td><td><strong>Sedazione profonda</strong></td><td>Nessuna risposta alla voce, movimento/apertura occhi alla stimolazione fisica</td><td>☐</td></tr>
            <tr style="background: #e6e6ff;"><td><strong>-5</strong></td><td><strong>Non risvegliabile</strong></td><td>Nessuna risposta alla voce o stimolazione fisica</td><td>☐</td></tr>
          </tbody>
        </table>
        <div class="instructions">
          <h4><i class="fas fa-info-circle me-2"></i>Istruzioni per la valutazione RASS:</h4>
          <ol>
            <li><strong>Osservare il paziente:</strong> Se vigile, calmo e non agitato = Punteggio 0</li>
            <li><strong>Se non vigile:</strong> Chiamare il paziente per nome e dire di aprire gli occhi e guardare chi parla</li>
            <li><strong>Se non risponde alla voce:</strong> Stimolare fisicamente (scuotere le spalle o strofinare lo sterno)</li>
            <li><strong>Assegnare il punteggio</strong> basato sulla migliore risposta ottenuta</li>
          </ol>
        </div>
        <div style="background: #fff3cd; border: 1px solid #ffeaa7; padding: 1rem; border-radius: 8px; margin-top: 2rem;">
          <h4 style="color: #856404; margin-bottom: 1rem;"><i class="fas fa-target me-2"></i>Obiettivi Clinici RASS</h4>
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
            <div><strong>Terapia Intensiva:</strong><br><span style="color: #495057;">Target: da -2 a 0<br>V evitare: +2 o superiore</span></div>
            <div><strong>Ventilazione Meccanica:</strong><br><span style="color: #495057;">Target: da -3 a -1<br>Sedazione controllata</span></div>
            <div><strong>Cure Palliative:</strong><br><span style="color: #495057;">Target: personalizzato<br>Comfort del paziente</span></div>
          </div>
        </div>
        <div class="action-buttons" style="margin-top: 2rem; page-break-inside: avoid;">
          <button class="btn btn-primary" onclick="printRASS('visualize');return false;">
            <i class="fas fa-print me-2"></i>Stampa Template
          </button>
          <button class="btn" style="background: white; color: var(--rass-primary); border: 2px solid var(--rass-primary);" onclick="switchRASSMode('compile');return false;">
            <i class="fas fa-edit me-2"></i>Torna a Compila
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="js/rass.js"></script>
