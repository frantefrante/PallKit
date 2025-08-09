<?php
?>
<link rel="stylesheet" href="css/esas.css">
<section id="esas-home" class="p-4" style="display:none;">
  <div class="mb-3">
    <button class="btn btn-outline-success me-2" onclick="navigateToSection('strumenti-valutazione-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-primary" onclick="navigateToSection('multidimensionale-home')">
      <i class="fas fa-arrow-left me-2"></i>Torna a Multidimensionale
    </button>
  </div>
  <div class="esas-container">
    <div class="esas-header">
      <h1 class="esas-title">
        <i class="fas fa-chart-bar me-3"></i>
        ESAS
      </h1>
      <p class="esas-subtitle">Edmonton Symptom Assessment Scale</p>
      <p class="esas-description">
        Strumento di valutazione rapida per 9 sintomi comuni nei pazienti oncologici e in cure palliative.
        Scala numerica 0-10 per monitoraggio sintomatologico standardizzato.
      </p>
    </div>

    <div class="mode-selector">
      <a href="#" class="mode-btn active" onclick="switchMode('compile')" id="compile-btn">
        <i class="fas fa-edit"></i>
        Compila ESAS
      </a>
      <a href="#" class="mode-btn" onclick="switchMode('visualize')" id="visualize-btn">
        <i class="fas fa-eye"></i>
        Visualizza Template
      </a>
    </div>

    <div id="compile-section" class="content-section active">
      <div class="compile-form">
        <div class="patient-info">
          <h4 class="mb-3">
            <i class="fas fa-user me-2"></i>
            Dati Paziente
          </h4>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Nome e Cognome</label>
              <input type="text" class="form-control" id="patient-name" placeholder="Inserisci nome paziente">
            </div>
            <div class="col-md-4">
              <label class="form-label">Data di nascita</label>
              <input type="date" class="form-control" id="patient-birth">
            </div>
            <div class="col-md-4">
              <label class="form-label">Data valutazione</label>
              <input type="date" class="form-control" id="assessment-date">
            </div>
          </div>
        </div>

        <form id="esas-form">
          <h5 class="mb-4">
            <i class="fas fa-thermometer-three-quarters me-2"></i>
            Valutazione Sintomi (0 = Assente, 10 = Peggiore possibile)
          </h5>

          <!-- Dolore -->
          <div class="symptom-item">
            <div class="symptom-label">
              <i class="fas fa-exclamation-triangle text-warning"></i>
              Dolore
            </div>
            <div class="symptom-scale">
              <div class="scale-label">Assente</div>
              <div class="scale-numbers" data-symptom="dolore">
                <div class="scale-number" data-value="0">0</div>
                <div class="scale-number" data-value="1">1</div>
                <div class="scale-number" data-value="2">2</div>
                <div class="scale-number" data-value="3">3</div>
                <div class="scale-number" data-value="4">4</div>
                <div class="scale-number" data-value="5">5</div>
                <div class="scale-number" data-value="6">6</div>
                <div class="scale-number" data-value="7">7</div>
                <div class="scale-number" data-value="8">8</div>
                <div class="scale-number" data-value="9">9</div>
                <div class="scale-number" data-value="10">10</div>
              </div>
              <div class="scale-label">Peggiore possibile</div>
            </div>
            <div class="visual-scale">
              <div class="scale-marker" id="marker-dolore" style="left: 0%"></div>
            </div>
          </div>

          <!-- Stanchezza -->
          <div class="symptom-item">
            <div class="symptom-label">
              <i class="fas fa-battery-quarter text-danger"></i>
              Stanchezza
            </div>
            <div class="symptom-scale">
              <div class="scale-label">Assente</div>
              <div class="scale-numbers" data-symptom="stanchezza">
                <div class="scale-number" data-value="0">0</div>
                <div class="scale-number" data-value="1">1</div>
                <div class="scale-number" data-value="2">2</div>
                <div class="scale-number" data-value="3">3</div>
                <div class="scale-number" data-value="4">4</div>
                <div class="scale-number" data-value="5">5</div>
                <div class="scale-number" data-value="6">6</div>
                <div class="scale-number" data-value="7">7</div>
                <div class="scale-number" data-value="8">8</div>
                <div class="scale-number" data-value="9">9</div>
                <div class="scale-number" data-value="10">10</div>
              </div>
              <div class="scale-label">Peggiore possibile</div>
            </div>
            <div class="visual-scale">
              <div class="scale-marker" id="marker-stanchezza" style="left: 0%"></div>
            </div>
          </div>

          <!-- Nausea -->
          <div class="symptom-item">
            <div class="symptom-label">
              <i class="fas fa-dizzy text-success"></i>
              Nausea
            </div>
            <div class="symptom-scale">
              <div class="scale-label">Assente</div>
              <div class="scale-numbers" data-symptom="nausea">
                <div class="scale-number" data-value="0">0</div>
                <div class="scale-number" data-value="1">1</div>
                <div class="scale-number" data-value="2">2</div>
                <div class="scale-number" data-value="3">3</div>
                <div class="scale-number" data-value="4">4</div>
                <div class="scale-number" data-value="5">5</div>
                <div class="scale-number" data-value="6">6</div>
                <div class="scale-number" data-value="7">7</div>
                <div class="scale-number" data-value="8">8</div>
                <div class="scale-number" data-value="9">9</div>
                <div class="scale-number" data-value="10">10</div>
              </div>
              <div class="scale-label">Peggiore possibile</div>
            </div>
            <div class="visual-scale">
              <div class="scale-marker" id="marker-nausea" style="left: 0%"></div>
            </div>
          </div>

          <!-- Depressione -->
          <div class="symptom-item">
            <div class="symptom-label">
              <i class="fas fa-frown text-primary"></i>
              Depressione
            </div>
            <div class="symptom-scale">
              <div class="scale-label">Assente</div>
              <div class="scale-numbers" data-symptom="depressione">
                <div class="scale-number" data-value="0">0</div>
                <div class="scale-number" data-value="1">1</div>
                <div class="scale-number" data-value="2">2</div>
                <div class="scale-number" data-value="3">3</div>
                <div class="scale-number" data-value="4">4</div>
                <div class="scale-number" data-value="5">5</div>
                <div class="scale-number" data-value="6">6</div>
                <div class="scale-number" data-value="7">7</div>
                <div class="scale-number" data-value="8">8</div>
                <div class="scale-number" data-value="9">9</div>
                <div class="scale-number" data-value="10">10</div>
              </div>
              <div class="scale-label">Peggiore possibile</div>
            </div>
            <div class="visual-scale">
              <div class="scale-marker" id="marker-depressione" style="left: 0%"></div>
            </div>
          </div>

          <!-- Ansia -->
          <div class="symptom-item">
            <div class="symptom-label">
              <i class="fas fa-heartbeat text-info"></i>
              Ansia
            </div>
            <div class="symptom-scale">
              <div class="scale-label">Assente</div>
              <div class="scale-numbers" data-symptom="ansia">
                <div class="scale-number" data-value="0">0</div>
                <div class="scale-number" data-value="1">1</div>
                <div class="scale-number" data-value="2">2</div>
                <div class="scale-number" data-value="3">3</div>
                <div class="scale-number" data-value="4">4</div>
                <div class="scale-number" data-value="5">5</div>
                <div class="scale-number" data-value="6">6</div>
                <div class="scale-number" data-value="7">7</div>
                <div class="scale-number" data-value="8">8</div>
                <div class="scale-number" data-value="9">9</div>
                <div class="scale-number" data-value="10">10</div>
              </div>
              <div class="scale-label">Peggiore possibile</div>
            </div>
            <div class="visual-scale">
              <div class="scale-marker" id="marker-ansia" style="left: 0%"></div>
            </div>
          </div>

          <!-- Sonnolenza -->
          <div class="symptom-item">
            <div class="symptom-label">
              <i class="fas fa-bed text-secondary"></i>
              Sonnolenza
            </div>
            <div class="symptom-scale">
              <div class="scale-label">Assente</div>
              <div class="scale-numbers" data-symptom="sonnolenza">
                <div class="scale-number" data-value="0">0</div>
                <div class="scale-number" data-value="1">1</div>
                <div class="scale-number" data-value="2">2</div>
                <div class="scale-number" data-value="3">3</div>
                <div class="scale-number" data-value="4">4</div>
                <div class="scale-number" data-value="5">5</div>
                <div class="scale-number" data-value="6">6</div>
                <div class="scale-number" data-value="7">7</div>
                <div class="scale-number" data-value="8">8</div>
                <div class="scale-number" data-value="9">9</div>
                <div class="scale-number" data-value="10">10</div>
              </div>
              <div class="scale-label">Peggiore possibile</div>
            </div>
            <div class="visual-scale">
              <div class="scale-marker" id="marker-sonnolenza" style="left: 0%"></div>
            </div>
          </div>

          <!-- Appetito -->
          <div class="symptom-item">
            <div class="symptom-label">
              <i class="fas fa-utensils text-warning"></i>
              Mancanza di appetito
            </div>
            <div class="symptom-scale">
              <div class="scale-label">Assente</div>
              <div class="scale-numbers" data-symptom="appetito">
                <div class="scale-number" data-value="0">0</div>
                <div class="scale-number" data-value="1">1</div>
                <div class="scale-number" data-value="2">2</div>
                <div class="scale-number" data-value="3">3</div>
                <div class="scale-number" data-value="4">4</div>
                <div class="scale-number" data-value="5">5</div>
                <div class="scale-number" data-value="6">6</div>
                <div class="scale-number" data-value="7">7</div>
                <div class="scale-number" data-value="8">8</div>
                <div class="scale-number" data-value="9">9</div>
                <div class="scale-number" data-value="10">10</div>
              </div>
              <div class="scale-label">Peggiore possibile</div>
            </div>
            <div class="visual-scale">
              <div class="scale-marker" id="marker-appetito" style="left: 0%"></div>
            </div>
          </div>

          <!-- Dispnea -->
          <div class="symptom-item">
            <div class="symptom-label">
              <i class="fas fa-lungs text-danger"></i>
              Dispnea (mancanza di fiato)
            </div>
            <div class="symptom-scale">
              <div class="scale-label">Assente</div>
              <div class="scale-numbers" data-symptom="dispnea">
                <div class="scale-number" data-value="0">0</div>
                <div class="scale-number" data-value="1">1</div>
                <div class="scale-number" data-value="2">2</div>
                <div class="scale-number" data-value="3">3</div>
                <div class="scale-number" data-value="4">4</div>
                <div class="scale-number" data-value="5">5</div>
                <div class="scale-number" data-value="6">6</div>
                <div class="scale-number" data-value="7">7</div>
                <div class="scale-number" data-value="8">8</div>
                <div class="scale-number" data-value="9">9</div>
                <div class="scale-number" data-value="10">10</div>
              </div>
              <div class="scale-label">Peggiore possibile</div>
            </div>
            <div class="visual-scale">
              <div class="scale-marker" id="marker-dispnea" style="left: 0%"></div>
            </div>
          </div>

          <!-- Benessere -->
          <div class="symptom-item">
            <div class="symptom-label">
              <i class="fas fa-smile text-success"></i>
              Mancanza di benessere
            </div>
            <div class="symptom-scale">
              <div class="scale-label">Assente</div>
              <div class="scale-numbers" data-symptom="benessere">
                <div class="scale-number" data-value="0">0</div>
                <div class="scale-number" data-value="1">1</div>
                <div class="scale-number" data-value="2">2</div>
                <div class="scale-number" data-value="3">3</div>
                <div class="scale-number" data-value="4">4</div>
                <div class="scale-number" data-value="5">5</div>
                <div class="scale-number" data-value="6">6</div>
                <div class="scale-number" data-value="7">7</div>
                <div class="scale-number" data-value="8">8</div>
                <div class="scale-number" data-value="9">9</div>
                <div class="scale-number" data-value="10">10</div>
              </div>
              <div class="scale-label">Peggiore possibile</div>
            </div>
            <div class="visual-scale">
              <div class="scale-marker" id="marker-benessere" style="left: 0%"></div>
            </div>
          </div>

        </form>

        <div id="results-summary" class="results-summary" style="display: none;">
          <h4>
            <i class="fas fa-chart-pie me-2"></i>
            Risultati ESAS
          </h4>
          <div class="total-score" id="total-score">0</div>
          <div class="score-interpretation" id="score-interpretation">Completa la valutazione</div>
          <div class="score-details" id="score-details"></div>
        </div>

        <div class="action-buttons">
          <button type="button" class="btn-custom btn-primary-custom" onclick="saveESAS()">
            <i class="fas fa-save me-2"></i>
            Salva Valutazione
          </button>
          <button type="button" class="btn-custom btn-outline-custom" onclick="resetESAS()">
            <i class="fas fa-undo me-2"></i>
            Azzera
          </button>
          <button type="button" class="btn-custom btn-outline-custom" onclick="printESAS()">
            <i class="fas fa-print me-2"></i>
            Stampa
          </button>
        </div>

      </div>
    </div>

    <div id="visualize-section" class="content-section">
      <div class="pdf-template">
        <div class="pdf-header">
          <div class="pdf-title">ESAS</div>
          <div class="pdf-subtitle">Edmonton Symptom Assessment Scale</div>
          <div style="font-style: italic; color: #666;">
            Scala di valutazione sintomi per pazienti oncologici e in cure palliative
          </div>
        </div>
        <div class="pdf-info">
          <h5 style="margin-bottom: 1rem; color: var(--esas-red);">
            <i class="fas fa-user me-2"></i>
            Dati Paziente
          </h5>
          <div class="pdf-form-grid">
            <div class="form-field">
              <label class="form-label">Nome e Cognome:</label>
              <div class="form-line"></div>
            </div>
            <div class="form-field">
              <label class="form-label">Data di nascita:</label>
              <div class="form-line"></div>
            </div>
            <div class="form-field">
              <label class="form-label">Data valutazione:</label>
              <div class="form-line"></div>
            </div>
            <div class="form-field">
              <label class="form-label">Medico/Operatore:</label>
              <div class="form-line"></div>
            </div>
          </div>
        </div>

        <div style="background: #e3f2fd; padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem; border-left: 4px solid #2196f3;">
          <h6 style="color: #1976d2; margin-bottom: 1rem;">
            <i class="fas fa-info-circle me-2"></i>
            Istruzioni per la compilazione
          </h6>
          <p style="margin: 0; color: #1976d2; line-height: 1.6;">
            Per ogni sintomo, indichi il numero da <strong>0 a 10</strong> che meglio descrive l'intensità
            del sintomo nelle <strong>ultime 24 ore</strong>.<br>
            <strong>0 = Sintomo assente</strong> | <strong>10 = Sintomo peggiore possibile</strong>
          </p>
        </div>

        <table class="symptom-table">
          <thead>
            <tr>
              <th rowspan="2" class="symptom-name">SINTOMO</th>
              <th colspan="11">INTENSITÀ (ultime 24 ore)</th>
            </tr>
            <tr>
              <th class="checkbox-cell">0</th>
              <th class="checkbox-cell">1</th>
              <th class="checkbox-cell">2</th>
              <th class="checkbox-cell">3</th>
              <th class="checkbox-cell">4</th>
              <th class="checkbox-cell">5</th>
              <th class="checkbox-cell">6</th>
              <th class="checkbox-cell">7</th>
              <th class="checkbox-cell">8</th>
              <th class="checkbox-cell">9</th>
              <th class="checkbox-cell">10</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="symptom-name"><strong>Dolore</strong></td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
            </tr>
            <tr>
              <td class="symptom-name"><strong>Stanchezza (fatica)</strong></td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
            </tr>
            <tr>
              <td class="symptom-name"><strong>Nausea</strong></td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
            </tr>
            <tr>
              <td class="symptom-name"><strong>Depressione</strong></td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
            </tr>
            <tr>
              <td class="symptom-name"><strong>Ansia</strong></td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
            </tr>
            <tr>
              <td class="symptom-name"><strong>Sonnolenza</strong></td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
            </tr>
            <tr>
              <td class="symptom-name"><strong>Mancanza di appetito</strong></td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
            </tr>
            <tr>
              <td class="symptom-name"><strong>Dispnea (mancanza di fiato)</strong></td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
            </tr>
            <tr>
              <td class="symptom-name"><strong>Mancanza di benessere</strong></td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
              <td class="checkbox-cell">☐</td>
            </tr>
          </tbody>
        </table>

        <div style="margin: 3rem 0;">
          <h6 style="color: var(--esas-red); margin-bottom: 2rem;">
            <i class="fas fa-ruler-horizontal me-2"></i>
            Scale Analogiche Visive Alternative
          </h6>

          <div class="visual-analog-scale">
            <p><strong>Dolore</strong></p>
            <div class="vas-line"></div>
            <div class="vas-labels">
              <span>Nessun dolore</span>
              <span>Dolore peggiore possibile</span>
            </div>
          </div>

          <div class="visual-analog-scale">
            <p><strong>Stanchezza</strong></p>
            <div class="vas-line"></div>
            <div class="vas-labels">
              <span>Nessuna stanchezza</span>
              <span>Stanchezza peggiore possibile</span>
            </div>
          </div>

          <div class="visual-analog-scale">
            <p><strong>Benessere generale</strong></p>
            <div class="vas-line"></div>
            <div class="vas-labels">
              <span>Benessere ottimale</span>
              <span>Benessere peggiore possibile</span>
            </div>
          </div>
        </div>

        <div style="background: #f8f9fa; padding: 2rem; border-radius: 8px; margin: 2rem 0;">
          <h6 style="color: #495057; margin-bottom: 1.5rem;">
            <i class="fas fa-calculator me-2"></i>
            Calcolo Punteggio Totale
          </h6>

          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1.5rem;">
            <div style="text-align: center;">
              <div style="border: 2px solid #333; padding: 1rem; border-radius: 8px;">
                <div style="font-size: 0.9rem; color: #666; margin-bottom: 0.5rem;">Punteggio Totale</div>
                <div style="font-size: 2rem; font-weight: bold; border-bottom: 1px solid #333; height: 3rem; display: flex; align-items: center; justify-content: center;">___ / 90</div>
              </div>
            </div>
            <div style="text-align: center;">
              <div style="border: 2px solid #333; padding: 1rem; border-radius: 8px;">
                <div style="font-size: 0.9rem; color: #666; margin-bottom: 0.5rem;">Media Sintomi</div>
                <div style="font-size: 2rem; font-weight: bold; border-bottom: 1px solid #333; height: 3rem; display: flex; align-items: center; justify-content: center;">___ / 10</div>
              </div>
            </div>
            <div style="text-align: center;">
              <div style="border: 2px solid #333; padding: 1rem; border-radius: 8px;">
                <div style="font-size: 0.9rem; color: #666; margin-bottom: 0.5rem;">Sintomi Severi (≥7)</div>
                <div style="font-size: 2rem; font-weight: bold; border-bottom: 1px solid #333; height: 3rem; display: flex; align-items: center; justify-content: center;">___</div>
              </div>
            </div>
          </div>

          <div style="border: 1px solid #dee2e6; padding: 1rem; border-radius: 8px; background: white;">
            <div style="font-weight: bold; margin-bottom: 0.5rem;">Interpretazione clinica:</div>
            <div style="margin-bottom: 0.5rem;">• <strong>Punteggio ≥4:</strong> Sintomo moderato-severo che richiede intervento</div>
            <div style="margin-bottom: 0.5rem;">• <strong>Punteggio ≥7:</strong> Sintomo severo che richiede intervento immediato</div>
            <div>• <strong>Variazione ≥2 punti:</strong> Cambiamento clinicamente significativo</div>
          </div>
        </div>

        <div style="margin: 2rem 0;">
          <h6 style="color: #495057; margin-bottom: 1rem;">
            <i class="fas fa-notes-medical me-2"></i>
            Note cliniche e osservazioni
          </h6>
          <div style="border: 1px solid #333; min-height: 100px; padding: 1rem; border-radius: 8px;"></div>
        </div>

        <div style="margin-top: 3rem; display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
          <div>
            <div style="border-bottom: 1px solid #333; margin-bottom: 0.5rem; height: 30px;"></div>
            <div style="text-align: center; font-size: 0.9rem; color: #666;">Data e firma paziente</div>
          </div>
          <div>
            <div style="border-bottom: 1px solid #333; margin-bottom: 0.5rem; height: 30px;"></div>
            <div style="text-align: center; font-size: 0.9rem; color: #666;">Data e firma medico/operatore</div>
          </div>
        </div>

        <div style="text-align: center; margin-top: 2rem; padding-top: 1rem; border-top: 1px solid #dee2e6; color: #666; font-size: 0.8rem;">
          ESAS - Edmonton Symptom Assessment Scale | Template per Medbox.it | Versione italiana validata
        </div>
      </div>

      <div class="action-buttons">
        <button type="button" class="btn-custom btn-primary-custom" onclick="printTemplate()">
          <i class="fas fa-print me-2"></i>
          Stampa Template
        </button>
        <button type="button" class="btn-custom btn-outline-custom" onclick="downloadTemplate()">
          <i class="fas fa-download me-2"></i>
          Scarica PDF
        </button>
      </div>
    </div>
  </div>
</section>
<script src="js/esas.js"></script>
