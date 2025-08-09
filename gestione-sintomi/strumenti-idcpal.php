<?php
?>
<link rel="stylesheet" href="css/idcpal.css">
<section id="idcpal-home" class="p-4" style="display:none;">
  <div class="mb-3">
    <button class="btn btn-outline-success me-2" onclick="navigateToSection('strumenti-valutazione-home'); showCategories();">
      <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
    </button>
    <button class="btn btn-outline-primary" onclick="navigateToSection('strumenti-valutazione-home'); openCategoryView('complessita');">
      <i class="fas fa-arrow-left me-2"></i>Torna a Complessità
    </button>
  </div>
  
  <div class="idcpal-container">
    <div class="idcpal-header">
      <h1 class="idcpal-title">
        <i class="fas fa-layer-group me-3"></i>
        IDC-PAL
      </h1>
      <p class="idcpal-subtitle">Instrumento Diagnóstico de Complejidad</p>
      <p class="idcpal-description">
        Strumento validato per identificare e classificare il livello di complessità assistenziale 
        nei pazienti in cure palliative attraverso l'analisi di 34 elementi in 3 dimensioni.
      </p>
    </div>

    <div class="mode-selector">
      <a href="#" class="mode-btn active" onclick="switchIDCPALMode('compile')" id="compile-btn">
        <i class="fas fa-edit"></i>
        Compila IDC-PAL
      </a>
      <a href="#" class="mode-btn" onclick="switchIDCPALMode('visualize')" id="visualize-btn">
        <i class="fas fa-table"></i>
        Visualizza Scala
      </a>
      <a href="#" class="mode-btn" onclick="switchIDCPALMode('glossary')" id="glossary-btn">
        <i class="fas fa-book"></i>
        Glossario
      </a>
    </div>

    <!-- SEZIONE COMPILA -->
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
              <label class="form-label">Data compilazione</label>
              <input type="date" class="form-control" id="compilation-date">
            </div>
          </div>
        </div>

        <!-- Sezione 1: Paziente -->
        <div class="complexity-section">
          <div class="section-header">
            <i class="fas fa-user me-2"></i>1. Elementi dipendenti dal paziente
          </div>
          <div class="section-content">
            <h6 class="text-muted mb-3">1.1 - Contesto</h6>
            <div class="complexity-item" data-code="1.1a">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-1.1a" onchange="toggleIDCPALItem('1.1a', 'AC')">
              <div class="item-content">
                <div class="item-code">1.1a</div>
                <div class="item-text">Il paziente è un bambino o un adolescente</div>
                <span class="item-badge badge-ac">AC</span>
              </div>
            </div>
            <div class="complexity-item" data-code="1.1b">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-1.1b" onchange="toggleIDCPALItem('1.1b', 'C')">
              <div class="item-content">
                <div class="item-code">1.1b</div>
                <div class="item-text">Il paziente è un professionista sanitario</div>
                <span class="item-badge badge-c">C</span>
              </div>
            </div>

            <h6 class="text-muted mb-3 mt-4">1.2 - Sintomi</h6>
            <div class="complexity-item" data-code="1.2a">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-1.2a" onchange="toggleIDCPALItem('1.2a', 'AC')">
              <div class="item-content">
                <div class="item-code">1.2a</div>
                <div class="item-text">Sintomi di difficile controllo</div>
                <span class="item-badge badge-ac">AC</span>
              </div>
            </div>
            <div class="complexity-item" data-code="1.2b">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-1.2b" onchange="toggleIDCPALItem('1.2b', 'C')">
              <div class="item-content">
                <div class="item-code">1.2b</div>
                <div class="item-text">Sintomi che interferiscono con il sonno</div>
                <span class="item-badge badge-c">C</span>
              </div>
            </div>
            <div class="complexity-item" data-code="1.2c">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-1.2c" onchange="toggleIDCPALItem('1.2c', 'C')">
              <div class="item-content">
                <div class="item-code">1.2c</div>
                <div class="item-text">Sintomi che interferiscono con la capacità comunicativa</div>
                <span class="item-badge badge-c">C</span>
              </div>
            </div>

            <h6 class="text-muted mb-3 mt-4">1.3 - Aspetti psicologici</h6>
            <div class="complexity-item" data-code="1.3a">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-1.3a" onchange="toggleIDCPALItem('1.3a', 'AC')">
              <div class="item-content">
                <div class="item-code">1.3a</div>
                <div class="item-text">Presenza di delirium</div>
                <span class="item-badge badge-ac">AC</span>
              </div>
            </div>
            <div class="complexity-item" data-code="1.3b">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-1.3b" onchange="toggleIDCPALItem('1.3b', 'C')">
              <div class="item-content">
                <div class="item-code">1.3b</div>
                <div class="item-text">Presenza di ansia o depressione clinicamente significativa</div>
                <span class="item-badge badge-c">C</span>
              </div>
            </div>
            <div class="complexity-item" data-code="1.3c">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-1.3c" onchange="toggleIDCPALItem('1.3c', 'C')">
              <div class="item-content">
                <div class="item-code">1.3c</div>
                <div class="item-text">Manifestazioni di collera o aggressività</div>
                <span class="item-badge badge-c">C</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Sezione 2: Famiglia -->
        <div class="complexity-section">
          <div class="section-header">
            <i class="fas fa-users me-2"></i>2. Elementi dipendenti dalla famiglia
          </div>
          <div class="section-content">
            <h6 class="text-muted mb-3">2.1 - Contesto familiare</h6>
            <div class="complexity-item" data-code="2.1a">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-2.1a" onchange="toggleIDCPALItem('2.1a', 'AC')">
              <div class="item-content">
                <div class="item-code">2.1a</div>
                <div class="item-text">Assenza di supporto familiare</div>
                <span class="item-badge badge-ac">AC</span>
              </div>
            </div>
            <div class="complexity-item" data-code="2.1b">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-2.1b" onchange="toggleIDCPALItem('2.1b', 'C')">
              <div class="item-content">
                <div class="item-code">2.1b</div>
                <div class="item-text">Famiglia monoparentale o single parent</div>
                <span class="item-badge badge-c">C</span>
              </div>
            </div>
            <div class="complexity-item" data-code="2.1c">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-2.1c" onchange="toggleIDCPALItem('2.1c', 'C')">
              <div class="item-content">
                <div class="item-code">2.1c</div>
                <div class="item-text">Presenza di minori nel nucleo familiare</div>
                <span class="item-badge badge-c">C</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Sezione 3: Sistema Sanitario -->
        <div class="complexity-section">
          <div class="section-header">
            <i class="fas fa-hospital me-2"></i>3. Elementi dipendenti dal sistema sanitario
          </div>
          <div class="section-content">
            <h6 class="text-muted mb-3">3.1 - Aspetti organizzativi</h6>
            <div class="complexity-item" data-code="3.1a">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-3.1a" onchange="toggleIDCPALItem('3.1a', 'AC')">
              <div class="item-content">
                <div class="item-code">3.1a</div>
                <div class="item-text">Necessità di interventi urgenti o emergenze ricorrenti</div>
                <span class="item-badge badge-ac">AC</span>
              </div>
            </div>
            <div class="complexity-item" data-code="3.1b">
              <input type="checkbox" class="form-check-input item-checkbox" id="item-3.1b" onchange="toggleIDCPALItem('3.1b', 'C')">
              <div class="item-content">
                <div class="item-code">3.1b</div>
                <div class="item-text">Necessità di coordinamento tra più servizi</div>
                <span class="item-badge badge-c">C</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Riepilogo -->
        <div class="complexity-summary">
          <h5 class="text-primary mb-3">
            <i class="fas fa-chart-pie me-2"></i>Riepilogo Valutazione
          </h5>
          <div class="summary-counts">
            <div class="count-item">
              <span class="count-badge badge-c" id="count-c">0 C</span>
              <span class="text-muted">Elementi di Complessità</span>
            </div>
            <div class="count-item">
              <span class="count-badge badge-ac" id="count-ac">0 AC</span>
              <span class="text-muted">Elementi di Alta Complessità</span>
            </div>
          </div>
          
          <div class="final-classification">
            <label class="form-label fw-bold">Classificazione Finale</label>
            <div class="classification-options">
              <div class="classification-option" data-value="non-complessa">
                <input type="radio" name="classification" value="non-complessa" class="me-2">
                <span>Non Complessa</span>
              </div>
              <div class="classification-option" data-value="complessa">
                <input type="radio" name="classification" value="complessa" class="me-2">
                <span>Complessa</span>
              </div>
              <div class="classification-option" data-value="altamente-complessa">
                <input type="radio" name="classification" value="altamente-complessa" class="me-2">
                <span>Altamente Complessa</span>
              </div>
            </div>
          </div>
        </div>

        <div class="action-buttons">
          <button type="button" class="btn-custom btn-primary-custom" onclick="saveIDCPAL()">
            <i class="fas fa-save me-2"></i>
            Salva Valutazione
          </button>
          <button type="button" class="btn-custom btn-outline-custom" onclick="resetIDCPAL()">
            <i class="fas fa-undo me-2"></i>
            Azzera
          </button>
          <button type="button" class="btn-custom btn-outline-custom" onclick="printIDCPAL()">
            <i class="fas fa-print me-2"></i>
            Stampa
          </button>
        </div>

      </div>
    </div>

    <!-- SEZIONE VISUALIZZA -->
    <div id="visualize-section" class="content-section">
      <div class="pdf-template">
        <div class="pdf-header">
          <div class="pdf-title">IDC-PAL</div>
          <div class="pdf-subtitle">Instrumento Diagnóstico de Complejidad</div>
          <div style="font-style: italic; color: #666;">
            Strumento per la valutazione della complessità in cure palliative
          </div>
        </div>
        <div class="mb-4">
          <p><strong>Paziente:</strong> _______________________________________________________________  <strong>Data:</strong> _________________</p>
        </div>
        <table class="pdf-table">
          <thead>
            <tr style="background:#28a745;color:white;">
              <th colspan="4">1. Elementi dipendenti dal paziente</th>
            </tr>
            <tr>
              <th width="10%">Elementi</th>
              <th width="70%">Descrizione</th>
              <th width="10%">LC*</th>
              <th width="10%">✓</th>
            </tr>
          </thead>
          <tbody>
            <tr><td><strong>1.1a</strong></td><td>Il paziente è un bambino o un adolescente</td><td><span class="badge-ac">AC</span></td><td>☐</td></tr>
            <tr><td><strong>1.1b</strong></td><td>Il paziente è un professionista sanitario</td><td><span class="badge-c">C</span></td><td>☐</td></tr>
            <tr><td><strong>1.2a</strong></td><td>Sintomi di difficile controllo</td><td><span class="badge-ac">AC</span></td><td>☐</td></tr>
            <tr><td><strong>1.2b</strong></td><td>Sintomi che interferiscono con il sonno</td><td><span class="badge-c">C</span></td><td>☐</td></tr>
            <tr><td><strong>1.2c</strong></td><td>Sintomi che interferiscono con la capacità comunicativa</td><td><span class="badge-c">C</span></td><td>☐</td></tr>
            <tr><td><strong>1.3a</strong></td><td>Presenza di delirium</td><td><span class="badge-ac">AC</span></td><td>☐</td></tr>
            <tr><td><strong>1.3b</strong></td><td>Presenza di ansia o depressione clinicamente significativa</td><td><span class="badge-c">C</span></td><td>☐</td></tr>
            <tr><td><strong>1.3c</strong></td><td>Manifestazioni di collera o aggressività</td><td><span class="badge-c">C</span></td><td>☐</td></tr>
            <tr><td><strong>2.1a</strong></td><td>Assenza di supporto familiare</td><td><span class="badge-ac">AC</span></td><td>☐</td></tr>
            <tr><td><strong>2.1b</strong></td><td>Famiglia monoparentale o single parent</td><td><span class="badge-c">C</span></td><td>☐</td></tr>
            <tr><td><strong>2.1c</strong></td><td>Presenza di minori nel nucleo familiare</td><td><span class="badge-c">C</span></td><td>☐</td></tr>
            <tr><td><strong>3.1a</strong></td><td>Necessità di interventi urgenti o emergenze ricorrenti</td><td><span class="badge-ac">AC</span></td><td>☐</td></tr>
            <tr><td><strong>3.1b</strong></td><td>Necessità di coordinamento tra più servizi</td><td><span class="badge-c">C</span></td><td>☐</td></tr>
          </tbody>
        </table>
        <p class="text-muted"><small>* LC: Livello di Complessità (C = Complesso, AC = Alta Complessità)</small></p>
      </div>
      <div class="action-buttons">
        <button type="button" class="btn-custom btn-outline-custom" onclick="printIDCPALTemplate()">
          <i class="fas fa-print me-2"></i>Stampa Template
        </button>
        <button type="button" class="btn-custom btn-outline-custom" onclick="downloadIDCPALTemplate()">
          <i class="fas fa-download me-2"></i>Scarica PDF
        </button>
      </div>
    </div>

    <!-- SEZIONE GLOSSARIO -->
    <div id="glossary-section" class="content-section">
      <div class="mb-3">
        <input type="text" id="glossary-search" class="form-control" placeholder="Cerca nel glossario..." onkeyup="filterIDCPALGlossary()">
      </div>
      <div id="glossary-content">
        <div class="glossary-item">
          <div class="glossary-header" onclick="toggleIDCPALGlossary(this)">
            <span class="glossary-code">1.1a</span>
            <i class="fas fa-chevron-right"></i>
          </div>
          <div class="glossary-content">
            Il paziente è un bambino o un adolescente.
          </div>
        </div>
        <div class="glossary-item">
          <div class="glossary-header" onclick="toggleIDCPALGlossary(this)">
            <span class="glossary-code">1.2a</span>
            <i class="fas fa-chevron-right"></i>
          </div>
          <div class="glossary-content">
            Sintomi di difficile controllo.
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<script src="js/idcpal.js"></script>
