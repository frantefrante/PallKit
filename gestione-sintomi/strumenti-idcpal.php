<?php
$idcpal_sections = [
  '1' => [
    'icon' => 'fas fa-user',
    'title' => 'Elementi dipendenti dal paziente',
    'subsections' => [
      '1.1' => [
        'title' => 'Contesto',
        'items' => [
          ['code' => '1.1a', 'text' => 'Il paziente è un bambino o un adolescente', 'level' => 'AC', 'description' => "Si considera il periodo di vita dalla nascita al completo sviluppo dell'organismo (infanzia e adolescenza fino a 18 anni). L'assistenza pediatrica presenta complessità specifiche."],
          ['code' => '1.1b', 'text' => 'Il paziente è un professionista sanitario', 'level' => 'C', 'description' => 'Quando il fatto di essere un professionista della salute aggiunge difficoltà alla situazione o al processo decisionale.'],
          ['code' => '1.1c', 'text' => 'Barriere linguistiche o culturali', 'level' => 'C', 'description' => 'Difficoltà di comunicazione dovute a differenze linguistiche o culturali che compromettono la comprensione delle cure.'],
          ['code' => '1.1d', 'text' => 'Problemi socio-economici', 'level' => 'C', 'description' => 'Condizioni economiche precarie che limitano l\'accesso alle cure o l\'acquisto di dispositivi necessari.'],
          ['code' => '1.1e', 'text' => 'Difficoltà di accesso ai servizi sanitari', 'level' => 'AC', 'description' => 'Ostacoli geografici, logistici o organizzativi che impediscono l\'accesso tempestivo ai servizi sanitari specialistici.'],
        ],
      ],
      '1.2' => [
        'title' => 'Sintomi',
        'items' => [
          ['code' => '1.2a', 'text' => 'Sintomi di difficile controllo', 'level' => 'AC', 'description' => 'Sintomi che non rispondono ai trattamenti standard o richiedono misure eccezionali.'],
          ['code' => '1.2b', 'text' => 'Sintomi che interferiscono con il sonno', 'level' => 'C', 'description' => 'Disturbi che impediscono un riposo adeguato e generano affaticamento.'],
          ['code' => '1.2c', 'text' => 'Sintomi che interferiscono con la capacità comunicativa', 'level' => 'C', 'description' => 'Deficit che impediscono al paziente di esprimersi o comprendere.'],
          ['code' => '1.2d', 'text' => 'Presenza di ulcere cutanee maleodoranti', 'level' => 'C', 'description' => 'Lesioni cutanee con odore sgradevole che provocano disagio.'],
        ],
      ],
      '1.3' => [
        'title' => 'Aspetti psicologici',
        'items' => [
          ['code' => '1.3a', 'text' => 'Presenza di delirium', 'level' => 'AC', 'description' => "Stato confusionale acuto con disturbi dell'attenzione e percezioni alterate."],
          ['code' => '1.3b', 'text' => 'Presenza di ansia o depressione clinicamente significativa', 'level' => 'C', 'description' => 'Sintomi psicologici che richiedono intervento specialistico.'],
          ['code' => '1.3c', 'text' => 'Manifestazioni di collera o aggressività', 'level' => 'C', 'description' => 'Reazioni emotive intense dirette verso sé o gli altri.'],
          ['code' => '1.3d', 'text' => 'Paura o negazione della morte', 'level' => 'AC', 'description' => 'Rifiuto persistente o timore paralizzante del processo di fine vita.'],
          ['code' => '1.3e', 'text' => 'Richiesta di eutanasia o suicidio assistito', 'level' => 'AC', 'description' => 'Domanda esplicita di anticipare la morte con assistenza medica.'],
        ],
      ],
      '1.4' => [
        'title' => 'Aspetti spirituali',
        'items' => [
          ['code' => '1.4a', 'text' => 'Sofferenza spirituale', 'level' => 'C', 'description' => 'Senso di perdita di significato o disperazione esistenziale.'],
          ['code' => '1.4b', 'text' => 'Conflitti con le proprie credenze religiose', 'level' => 'C', 'description' => 'Dissonanze tra il percorso di cura e le convinzioni spirituali personali.'],
        ],
      ],
    ],
  ],
  '2' => [
    'icon' => 'fas fa-users',
    'title' => 'Elementi dipendenti dalla famiglia',
    'subsections' => [
      '2.1' => [
        'title' => 'Contesto familiare',
        'items' => [
          ['code' => '2.1a', 'text' => 'Assenza di supporto familiare', 'level' => 'AC', 'description' => 'Il paziente non dispone di una rete familiare di sostegno.'],
          ['code' => '2.1b', 'text' => 'Famiglia monoparentale o single parent', 'level' => 'C', 'description' => 'Responsabilità assistenziale concentrata su una sola persona.'],
          ['code' => '2.1c', 'text' => 'Presenza di minori nel nucleo familiare', 'level' => 'C', 'description' => 'Presenza di figli piccoli che necessitano di attenzioni dedicate.'],
          ['code' => '2.1d', 'text' => 'Caregiver principale con età avanzata o malato', 'level' => 'C', 'description' => 'Il caregiver presenta limitazioni fisiche o patologiche.'],
        ],
      ],
      '2.2' => [
        'title' => 'Dinamiche familiari',
        'items' => [
          ['code' => '2.2a', 'text' => 'Conflitti familiari maggiori', 'level' => 'AC', 'description' => 'Disaccordi significativi che compromettono l\'assistenza.'],
          ['code' => '2.2b', 'text' => 'Difficoltà nella comunicazione familiare', 'level' => 'C', 'description' => 'Incapacità di condividere informazioni o emozioni in modo efficace.'],
          ['code' => '2.2c', 'text' => 'Rifiuto di accettazione della prognosi', 'level' => 'AC', 'description' => 'La famiglia non riconosce la gravità della malattia.'],
          ['code' => '2.2d', 'text' => 'Claudicatio familiare o burnout del caregiver', 'level' => 'C', 'description' => 'Esaurimento fisico o emotivo del caregiver principale.'],
        ],
      ],
      '2.3' => [
        'title' => 'Aspetti psico-sociali familiari',
        'items' => [
          ['code' => '2.3a', 'text' => 'Storia di perdite multiple o traumatiche', 'level' => 'C', 'description' => 'Eventi lutti precedenti che aumentano la vulnerabilità emotiva.'],
          ['code' => '2.3b', 'text' => 'Problemi di salute mentale in familiari', 'level' => 'C', 'description' => 'Presenza di disturbi psichiatrici che interferiscono con l\'assistenza.'],
        ],
      ],
    ],
  ],
  '3' => [
    'icon' => 'fas fa-hospital',
    'title' => 'Elementi dipendenti dal sistema sanitario',
    'subsections' => [
      '3.1' => [
        'title' => 'Aspetti organizzativi',
        'items' => [
          ['code' => '3.1a', 'text' => 'Necessità di interventi urgenti o emergenze ricorrenti', 'level' => 'AC', 'description' => 'Situazioni cliniche che richiedono risposte rapide e frequenti.'],
          ['code' => '3.1b', 'text' => 'Necessità di coordinamento tra più servizi', 'level' => 'C', 'description' => 'Coinvolgimento simultaneo di diversi livelli assistenziali.'],
          ['code' => '3.1c', 'text' => 'Necessità di dispositivi o procedure complesse', 'level' => 'C', 'description' => 'Richiesta di tecnologie avanzate o procedure specialistiche.'],
          ['code' => '3.1d', 'text' => 'Difficoltà nel reperimento di risorse', 'level' => 'C', 'description' => 'Scarsa disponibilità di mezzi o personale adeguato.'],
        ],
      ],
      '3.2' => [
        'title' => 'Aspetti professionali',
        'items' => [
          ['code' => '3.2a', 'text' => "Conflitti etici nell'équipe di cura", 'level' => 'AC', 'description' => 'Dilemmi etici che generano tensione tra i professionisti.'],
          ['code' => '3.2b', 'text' => "Disaccordo nell'équipe sul piano di cura", 'level' => 'C', 'description' => 'Mancanza di consenso tra i membri del team terapeutico.'],
        ],
      ],
      '3.3' => [
        'title' => 'Aspetti legali',
        'items' => [
          ['code' => '3.3a', 'text' => 'Questioni medico-legali complesse', 'level' => 'AC', 'description' => 'Aspetti legali che richiedono consulenza specialistica.'],
          ['code' => '3.3b', 'text' => 'Problemi di consenso informato', 'level' => 'C', 'description' => 'Difficoltà nel ottenere o validare il consenso del paziente.'],
        ],
      ],
    ],
  ],
];
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
      <a href="#" class="mode-btn active" onclick="switchIDCPALMode('compile')" id="idcpal-compile-btn">
        <i class="fas fa-edit"></i>
        Compila IDC-PAL
      </a>
      <a href="#" class="mode-btn" onclick="switchIDCPALMode('visualize')" id="idcpal-visualize-btn">
        <i class="fas fa-table"></i>
        Visualizza Scala
      </a>
      <a href="#" class="mode-btn" onclick="switchIDCPALMode('glossary')" id="idcpal-glossary-btn">
        <i class="fas fa-book"></i>
        Glossario
      </a>
    </div>

    <!-- SEZIONE COMPILA -->
    <div id="idcpal-compile-section" class="content-section active">
      <div class="compile-form">
        <div class="patient-info">
          <h4 class="mb-3">
            <i class="fas fa-user me-2"></i>
            Dati Paziente
          </h4>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Nome e Cognome</label>
              <input type="text" class="form-control" id="idcpal-patient-name" placeholder="Inserisci nome paziente">
            </div>
            <div class="col-md-4">
              <label class="form-label">Data di nascita</label>
              <input type="date" class="form-control" id="idcpal-patient-birth">
            </div>
            <div class="col-md-4">
              <label class="form-label">Data compilazione</label>
              <input type="date" class="form-control" id="idcpal-compilation-date">
            </div>
          </div>
        </div>

<?php foreach ($idcpal_sections as $num => $section): ?>
        <div class="complexity-section">
          <div class="section-header">
            <i class="<?= $section['icon']; ?> me-2"></i><?= $num . '. ' . $section['title']; ?>
          </div>
          <div class="section-content">
<?php $firstSub = true; foreach ($section['subsections'] as $subnum => $sub): ?>
            <h6 class="text-muted mb-3<?= $firstSub ? '' : ' mt-4'; ?>"><?= $subnum . ' - ' . $sub['title']; ?></h6>
<?php $firstSub = false; foreach ($sub['items'] as $item): ?>
            <div class="complexity-item" data-code="<?= $item['code']; ?>" onclick="toggleGlossaryInline('<?= $item['code']; ?>')">
              <div class="item-main">
                <input type="checkbox" class="form-check-input item-checkbox" id="item-<?= $item['code']; ?>" onchange="toggleIDCPALItem('<?= $item['code']; ?>', '<?= $item['level']; ?>')" onclick="event.stopPropagation()">
                <div class="item-content">
                  <div class="item-code"><?= $item['code']; ?> <i class="fas fa-info-circle text-primary ms-1" title="Clicca per info"></i></div>
                  <div class="item-text"><?= $item['text']; ?></div>
                  <span class="item-badge <?= $item['level'] === 'AC' ? 'badge-ac' : 'badge-c'; ?>"><?= $item['level']; ?></span>
                </div>
              </div>
              <div class="inline-glossary" id="glossary-<?= $item['code']; ?>" style="display:none;">
                <div class="inline-glossary-content">
                  <strong>Descrizione:</strong> <?= $item['description']; ?>
                </div>
              </div>
            </div>
<?php endforeach; endforeach; ?>
          </div>
        </div>
<?php endforeach; ?>

        <div class="complexity-summary">
          <h5 class="text-primary mb-3">
            <i class="fas fa-chart-pie me-2"></i>Riepilogo Valutazione
          </h5>
          <div class="summary-counts">
            <div class="count-item">
              <span class="count-badge badge-c" id="idcpal-count-c">0 C</span>
              <span class="text-muted">Elementi di Complessità</span>
            </div>
            <div class="count-item">
              <span class="count-badge badge-ac" id="idcpal-count-ac">0 AC</span>
              <span class="text-muted">Elementi di Alta Complessità</span>
            </div>
          </div>
          
          <div class="final-classification">
            <label class="form-label fw-bold">Classificazione Finale</label>
            <div class="classification-options">
              <div class="classification-option" data-value="non-complessa">
                <input type="radio" name="idcpal-classification" value="non-complessa" class="me-2">
                <span>Non Complessa</span>
              </div>
              <div class="classification-option" data-value="complessa">
                <input type="radio" name="idcpal-classification" value="complessa" class="me-2">
                <span>Complessa</span>
              </div>
              <div class="classification-option" data-value="altamente-complessa">
                <input type="radio" name="idcpal-classification" value="altamente-complessa" class="me-2">
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
    <div id="idcpal-visualize-section" class="content-section">
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
<?php foreach ($idcpal_sections as $secNum => $section): ?>
<?php foreach ($section['subsections'] as $sub): ?>
<?php foreach ($sub['items'] as $item): ?>
            <tr><td><strong><?= $item['code']; ?></strong></td><td><?= $item['text']; ?></td><td><span class="<?= $item['level'] === 'AC' ? 'badge-ac' : 'badge-c'; ?>"><?= $item['level']; ?></span></td><td>☐</td></tr>
<?php endforeach; ?>
<?php endforeach; ?>
<?php endforeach; ?>
          </tbody>
        </table>
        <div style="font-size:0.8rem;color:#666;">LC*: Livello di Complessità (C = Complessità, AC = Alta Complessità)</div>
      </div>
      <div class="action-buttons">
        <button type="button" class="btn-custom btn-primary-custom" onclick="printIDCPALTemplate()">
          <i class="fas fa-print me-2"></i>
          Stampa Template
        </button>
        <button type="button" class="btn-custom btn-outline-custom" onclick="downloadIDCPALTemplate()">
          <i class="fas fa-download me-2"></i>
          Scarica PDF
        </button>
      </div>
    </div>

  <!-- SEZIONE GLOSSARIO -->
<div id="glossary-section" class="content-section">
  <div class="mb-4">
    <div class="input-group">
      <span class="input-group-text"><i class="fas fa-search"></i></span>
      <input type="text" id="glossary-search" class="form-control"
             oninput="filterIDCPALGlossary()"
             placeholder="Cerca nel glossario...">
    </div>
  </div>
  <div id="glossary-content">
    <!-- voci del glossario qui -->
  </div>
</div>
<?php foreach ($idcpal_sections as $section): ?>
<?php foreach ($section['subsections'] as $sub): ?>
<?php foreach ($sub['items'] as $item): ?>
        <div class="glossary-item">
          <div class="glossary-header" onclick="toggleIDCPALGlossary(this)">
            <span class="glossary-code"><?= $item['code']; ?></span>
            <i class="fas fa-chevron-right"></i>
          </div>
          <div class="glossary-content">
            <p><strong><?= $item['text']; ?></strong></p>
            <p><?= $item['description']; ?></p>
          </div>
        </div>
<?php endforeach; ?>
<?php endforeach; ?>
<?php endforeach; ?>
      </div>
    </div>

  </div>
</section>
<script src="js/idcpal.js"></script>
