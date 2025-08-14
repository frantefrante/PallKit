<?php
?>
<link rel="stylesheet" href="css/ramsey.css">
<section id="ramsey-home" class="p-4" style="display:none;">
  <div class="mb-3 print-hide">
    <button class="btn btn-outline-secondary" onclick="window.location.href='index.php#strumenti-valutazione-home';">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-secondary ms-2" onclick="window.location.href='sedazione.php';">
      <i class="fas fa-arrow-left me-2"></i>Torna a Sedazione
    </button>
  </div>
  <div class="section-container">
      <div class="ramsey-header">
        <h1>Ramsey</h1>
        <p>Ramsey Sedation Scale - Scala tradizionale per la valutazione della sedazione</p>
        <div class="mode-selector">
          <a href="#" class="mode-btn active" data-mode="compile" onclick="switchRamseyMode('compile');return false;">
            📝 Compila Scala
          </a>
          <a href="#" class="mode-btn" data-mode="visualize" onclick="switchRamseyMode('visualize');return false;">
            👁️ Visualizza Template
          </a>
        </div>
      </div>

    <div id="compile-section" class="content-section active">
      <div class="compile-container">
        <div class="patient-data">
          <h4>👤 Dati Paziente</h4>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Nome Paziente</label>
              <input type="text" class="form-control" id="ramsey-patient-name" placeholder="Nome e cognome">
            </div>
            <div class="form-group">
              <label class="form-label">Data Valutazione</label>
              <input type="date" class="form-control" id="ramsey-date">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Ora</label>
              <input type="time" class="form-control" id="ramsey-time">
            </div>
            <div class="form-group">
              <label class="form-label">Operatore</label>
              <input type="text" class="form-control" id="ramsey-operator" placeholder="Nome operatore">
            </div>
          </div>
        </div>

        <div class="scale-section">
          <div class="scale-title">Seleziona il livello Ramsey corrispondente:</div>
          <div class="option-item" data-score="1" onclick="selectRamseyScore(1, this)">
            <div class="option-score">1</div>
            <div class="option-description"><strong>Paziente ansioso, agitato o irrequieto</strong></div>
          </div>
          <div class="option-item" data-score="2" onclick="selectRamseyScore(2, this)">
            <div class="option-score">2</div>
            <div class="option-description"><strong>Paziente cooperativo, orientato e tranquillo</strong></div>
          </div>
          <div class="option-item" data-score="3" onclick="selectRamseyScore(3, this)">
            <div class="option-score">3</div>
            <div class="option-description"><strong>Paziente risponde solo ai comandi</strong></div>
          </div>
          <div class="option-item" data-score="4" onclick="selectRamseyScore(4, this)">
            <div class="option-score">4</div>
            <div class="option-description"><strong>Risposta vivace al tocco glabellare o stimolo sonoro forte</strong></div>
          </div>
          <div class="option-item" data-score="5" onclick="selectRamseyScore(5, this)">
            <div class="option-score">5</div>
            <div class="option-description"><strong>Risposta debole al tocco glabellare o stimolo sonoro forte</strong></div>
          </div>
          <div class="option-item" data-score="6" onclick="selectRamseyScore(6, this)">
            <div class="option-score">6</div>
            <div class="option-description"><strong>Nessuna risposta</strong></div>
          </div>
        </div>

        <div id="ramsey-results" class="results-display">
          <div class="result-score" id="ramsey-score-display">-</div>
          <div class="result-level" id="ramsey-level-display">-</div>
          <div class="result-description" id="ramsey-description-display">-</div>
        </div>

          <div class="action-buttons">
            <button class="btn btn-danger" onclick="resetRamseyForm();return false;">
              🔄 Reset
            </button>
            <button class="btn btn-primary" onclick="printRamseyReport();return false;">
              🖨️ Stampa Report
            </button>
          </div>
      </div>
    </div>

    <div id="visualize-section" class="content-section">
      <div class="print-template">
        <div class="template-header">
          <div class="template-title">Ramsey Sedation Scale</div>
          <div class="template-subtitle">Scala di Valutazione della Sedazione</div>
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
              <th style="width: 80px;">Livello</th>
              <th>Descrizione</th>
              <th style="width: 200px;">Note Cliniche</th>
              <th style="width: 60px;">✓</th>
            </tr>
          </thead>
          <tbody>
            <tr style="background: #ffe6e6;"><td><strong>1</strong></td><td>Paziente ansioso, agitato o irrequieto</td><td>Richiede intervento calmante</td><td>☐</td></tr>
            <tr style="background: #f0fff0;"><td><strong>2</strong></td><td>Paziente cooperativo, orientato e tranquillo</td><td>Stato ottimale</td><td>☐</td></tr>
            <tr style="background: #e6f3ff;"><td><strong>3</strong></td><td>Paziente risponde solo ai comandi</td><td>Sedazione leggera</td><td>☐</td></tr>
            <tr style="background: #e6f0ff;"><td><strong>4</strong></td><td>Risposta vivace al tocco glabellare o stimolo sonoro forte</td><td>Sedazione moderata</td><td>☐</td></tr>
            <tr style="background: #e6ecff;"><td><strong>5</strong></td><td>Risposta debole al tocco glabellare o stimolo sonoro forte</td><td>Sedazione profonda</td><td>☐</td></tr>
            <tr style="background: #e6e6ff;"><td><strong>6</strong></td><td>Nessuna risposta</td><td>Potenziale over-sedazione</td><td>☐</td></tr>
          </tbody>
        </table>
        <div class="instructions">
          <h4>📋 Istruzioni per la valutazione Ramsey:</h4>
          <ol>
            <li><strong>Livelli 1-3:</strong> Valutare paziente sveglio in base al comportamento spontaneo</li>
            <li><strong>Livelli 4-6:</strong> Valutare paziente addormentato utilizzando stimoli progressivi</li>
            <li><strong>Tocco glabellare:</strong> Leggero tocco ripetuto tra le sopracciglia</li>
            <li><strong>Stimolo sonoro:</strong> Chiamare il paziente ad alta voce per nome</li>
            <li><strong>Progressione:</strong> Iniziare sempre con stimoli meno invasivi</li>
          </ol>
        </div>
        <div class="clinical-notes">
          <h4>🩺 Note Cliniche</h4>
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
            <div>
              <strong>Obiettivi Target:</strong><br>
              <span style="color: #495057;">
                • Sedazione ottimale: <strong>Livello 2-3</strong><br>
                • Sedazione procedurale: <strong>Livello 3-4</strong><br>
                • Evitare: Livello 1 (agitazione) e 6 (non responsivo)
              </span>
            </div>
            <div>
              <strong>Applicazioni Cliniche:</strong><br>
              <span style="color: #495057;">
                • Post-operatorio immediato<br>
                • Sedazione procedurale<br>
                • Monitoraggio in degenza<br>
                • Terapia intensiva (scala storica)
              </span>
            </div>
            <div>
              <strong>Limitazioni:</strong><br>
              <span style="color: #495057;">
                • Meno specifica di RASS<br>
                • Non valuta agitazione severa<br>
                • Soggettività nella valutazione<br>
                • Meno validata scientificamente
              </span>
            </div>
          </div>
        </div>
        <div style="background: #d1ecf1; border: 1px solid #bee5eb; padding: 1rem; border-radius: 8px; margin-top: 2rem;">
          <h4 style="color: #0c5460; margin-bottom: 1rem;">💡 Confronto con RASS</h4>
          <p style="margin: 0; color: #495057;">
            La scala Ramsey è stata storicamente utilizzata prima dello sviluppo della RASS. Mentre rimane utile per valutazioni rapide, la RASS offre maggiore precisione e validazione scientifica, particolarmente per pazienti critici e agitati.
          </p>
        </div>
          <div class="action-buttons" style="margin-top: 2rem; page-break-inside: avoid;">
            <button class="btn btn-primary" onclick="printRamseyTemplate();return false;">
              🖨️ Stampa Template
            </button>
            <button class="btn" style="background: white; color: var(--ramsey-primary); border: 2px solid var(--ramsey-primary);" onclick="switchRamseyMode('compile');return false;">
              ✏️ Torna a Compila
            </button>
          </div>
      </div>
    </div>
  </div>
</section>
<script src="js/ramsey.js"></script>
