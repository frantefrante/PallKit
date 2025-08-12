<?php
// Strumento NECPAL 4.0 - Versione Aggiornata 2021
?>
<section id="necpal40-home" class="p-4" style="display:none;">
    <style>
        :root {
            --primary-blue: #20c997;
            --secondary-blue: #17a2b8;
            --light-blue: rgba(32, 201, 151, 0.1);
            --border-blue: rgba(32, 201, 151, 0.2);
            --dark-blue: #138496;
        }

        .necpal40-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .necpal40-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            padding: 2.5rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            text-align: center;
        }

        .necpal40-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .necpal40-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .mode-selector {
            background: white;
            border-radius: 12px;
            padding: 0.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            gap: 0.5rem;
        }

        .mode-btn {
            flex: 1;
            padding: 0.875rem 1.5rem;
            border: none;
            background: transparent;
            color: #6c757d;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
        }

        .mode-btn.active {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            box-shadow: 0 2px 8px rgba(32, 201, 151, 0.3);
        }

        .mode-btn:hover:not(.active) {
            background: var(--light-blue);
            color: var(--primary-blue);
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        .patient-info-card {
            background: white;
            border: 2px solid var(--primary-blue);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        .patient-info-title {
            color: var(--primary-blue);
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-floating {
            margin-bottom: 1rem;
        }

        .form-floating > .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-floating > .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.25rem rgba(32, 201, 151, 0.25);
        }

        .surprise-question {
            background: linear-gradient(135deg, #e3f2fd, #f3e5f5);
            border: 2px solid var(--primary-blue);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .surprise-question h4 {
            color: var(--dark-blue);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .surprise-options {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .surprise-option {
            flex: 1;
            max-width: 200px;
        }

        .surprise-option input[type="radio"] { display: none; }

        .surprise-option label {
            display: block;
            padding: 1rem 2rem;
            background: white;
            border: 2px solid var(--primary-blue);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-align: center;
        }

        .surprise-option input:checked + label {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(32, 201, 151, 0.3);
        }

        .necpal-negative {
            background: #f8d7da;
            border: 2px solid #dc3545;
            border-radius: 12px;
            padding: 2rem;
            margin: 2rem 0;
            text-align: center;
            display: none;
        }

        .necpal-negative h4 { color: #721c24; margin-bottom: 1rem; }

        .necpal-sections { display: none; }

        .necpal-section {
            background: white;
            border: 2px solid var(--border-blue);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        }

        .section-header {
            background: var(--primary-blue);
            color: white;
            padding: 1rem 1.5rem;
            margin: -2rem -2rem 2rem -2rem;
            border-radius: 10px 10px 0 0;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .checkbox-group { display: grid; gap: 1rem; }

        .checkbox-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 1rem;
            background: #f8f9fa;
            border: 2px solid transparent;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .checkbox-item:hover {
            background: var(--light-blue);
            border-color: var(--border-blue);
        }

        .checkbox-item.selected {
            background: var(--light-blue);
            border-color: var(--primary-blue);
            box-shadow: 0 2px 8px rgba(32, 201, 151, 0.2);
        }

        .checkbox-item input[type="checkbox"] { margin-top: 0.25rem; transform: scale(1.2); }

        .checkbox-label { flex: 1; font-weight: 500; line-height: 1.4; }

        .results-section {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            border-radius: 12px;
            padding: 2rem;
            margin-top: 2rem;
            display: none;
        }

        .results-title { font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem; text-align: center; }

        .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .result-card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
        }

        .result-number { font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; }
        .result-label { font-size: 0.9rem; opacity: 0.9; }

        .prognosis-card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
        }

        .prognosis-title { font-size: 1.2rem; font-weight: 700; margin-bottom: 1rem; }

        .stage-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; }
        .stage-card { background: rgba(255, 255, 255, 0.2); border-radius: 8px; padding: 1rem; text-align: center; }
        .stage-name { font-weight: 700; margin-bottom: 0.5rem; }
        .stage-criteria { font-size: 0.9rem; margin-bottom: 0.5rem; }
        .stage-prognosis { font-size: 0.8rem; opacity: 0.9; }

        .action-buttons { display: flex; gap: 1rem; justify-content: center; margin-top: 2rem; }

        .btn-action {
            padding: 0.875rem 2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary-necpal40 {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
        }
        .btn-primary-necpal40:hover {
            background: linear-gradient(135deg, var(--dark-blue), var(--primary-blue));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(32, 201, 151, 0.3);
        }
        .btn-outline-necpal40 {
            background: white;
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
        }
        .btn-outline-necpal40:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(32, 201, 151, 0.3);
        }

        .criteria-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; }
        .criteria-card { background: white; border: 2px solid var(--border-blue); border-radius: 12px; overflow: hidden; box-shadow: 0 4px 16px rgba(0,0,0,0.05); }
        .criteria-header { background: var(--primary-blue); color: white; padding: 1rem 1.5rem; font-weight: 700; }
        .criteria-content { padding: 1.5rem; }
        .criteria-list { list-style: none; padding: 0; margin: 0; }
        .criteria-list li { padding: 0.75rem 0; border-bottom: 1px solid #e9ecef; position: relative; padding-left: 1.5rem; }
        .criteria-list li:last-child { border-bottom: none; }
        .criteria-list li::before { content: "•"; color: var(--primary-blue); font-weight: bold; position: absolute; left: 0; }

        @media (max-width: 768px) {
            .surprise-options { flex-direction: column; }
            .action-buttons { flex-direction: column; }
            .mode-selector { flex-direction: column; }
            .results-grid { grid-template-columns: 1fr; }
            .stage-grid { grid-template-columns: 1fr; }
        }
    </style>
    <div class="mb-3">
        <button class="btn btn-outline-primary me-2" onclick="navigateToSection('identificazione-home')">
            <i class="fas fa-arrow-left me-2"></i>Torna a Identificazione
        </button>
        <button class="btn btn-outline-success" onclick="navigateToSection('strumenti-valutazione-home'); showCategories();">
            <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
        </button>
    </div>

    <div class="necpal40-container">
        <div class="necpal40-header">
            <div class="necpal40-title">
                <i class="fas fa-star me-2"></i>
                NECPAL 4.0
            </div>
            <div class="necpal40-subtitle">
                Necesidades Paliativas - Versione Aggiornata 2021
            </div>
        </div>

        <div class="mode-selector">
            <a href="#" class="mode-btn active" data-mode="compile" onclick="switchNecpal40Mode('compile')">
                <i class="fas fa-edit me-2"></i>Compila
            </a>
            <a href="#" class="mode-btn" data-mode="visualize" onclick="switchNecpal40Mode('visualize')">
                <i class="fas fa-eye me-2"></i>Visualizza
            </a>
            <a href="#" class="mode-btn" data-mode="glossary" onclick="switchNecpal40Mode('glossary')">
                <i class="fas fa-book me-2"></i>Glossario
            </a>
        </div>

        <div id="necpal40-compile-section" class="content-section active">
            <div class="patient-info-card">
                <h3 class="patient-info-title">
                    <i class="fas fa-user-circle"></i>
                    Dati Paziente
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="necpal40-patient-name" placeholder="Nome Cognome">
                            <label for="necpal40-patient-name">Nome e Cognome</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="necpal40-birth-date">
                            <label for="necpal40-birth-date">Data di Nascita</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="necpal40-eval-date">
                            <label for="necpal40-eval-date">Data Valutazione</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="surprise-question">
                <h4>
                    <i class="fas fa-question-circle me-2"></i>
                    Domanda Sorprendente
                </h4>
                <p class="mb-3 text-muted">Saresti sorpreso se questo paziente morisse entro 1 anno?</p>
                <div class="surprise-options">
                    <div class="surprise-option">
                        <input type="radio" id="surprise40-yes" name="surprise40" value="yes">
                        <label for="surprise40-yes">
                            <i class="fas fa-check-circle me-2"></i>SÌ
                        </label>
                    </div>
                    <div class="surprise-option">
                        <input type="radio" id="surprise40-no" name="surprise40" value="no">
                        <label for="surprise40-no">
                            <i class="fas fa-times-circle me-2"></i>NO
                        </label>
                    </div>
                </div>
            </div>

            <div class="necpal-negative" id="necpal40-negative">
                <h4>
                    <i class="fas fa-info-circle me-2"></i>
                    NECPAL Negativo
                </h4>
                <p>La domanda sorprendente è positiva. Il paziente non necessita attualmente di cure palliative specialistiche. È consigliabile rivalutare periodicamente ogni 3-6 mesi.</p>
            </div>

            <div class="necpal-sections" id="necpal40-sections">
                <div class="necpal-section">
                    <div class="section-header">
                        <i class="fas fa-hand-holding-heart me-2"></i>
                        Bisogni Palliativi
                    </div>
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="bisogni-palliativi">
                            <label class="checkbox-label" for="bisogni-palliativi">
                                Il paziente stesso, i professionisti e/o i suoi familiari ritengono che il malato abbia attualmente bisogni di cure palliative
                            </label>
                        </div>
                    </div>
                </div>

                <div class="necpal-section">
                    <div class="section-header">
                        <i class="fas fa-chart-line me-2"></i>
                        Indicatori Clinici (Almeno 1 necessario per NECPAL positivo)
                    </div>
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="perdita-funzionale">
                            <label class="checkbox-label" for="perdita-funzionale">
                                <strong>Perdita funzionale:</strong> Giudizio clinico di deterioramento funzionale prolungato, grave, progressivo e irreversibile e/o perdita > 30% dell'indice di Barthel in 6 mesi
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="perdita-nutrizionale">
                            <label class="checkbox-label" for="perdita-nutrizionale">
                                <strong>Perdita nutrizionale:</strong> Giudizio clinico di calo nutrizionale/ponderale prolungato, grave, progressivo e irreversibile e/o perdita di peso > 10% in 6 mesi
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="multimorbidita40">
                            <label class="checkbox-label" for="multimorbidita40">
                                <strong>Multimorbidità:</strong> ≥ 2 malattie croniche concomitanti alla malattia principale
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="utilizzo-risorse40">
                            <label class="checkbox-label" for="utilizzo-risorse40">
                                <strong>Utilizzo di risorse:</strong> ≥ 2 ricoveri urgenti in ospedale nell'ultimo anno e/o necessità di cure continuative complesse/intense
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="malattia-avanzata">
                            <label class="checkbox-label" for="malattia-avanzata">
                                <strong>Malattia avanzata:</strong> Criteri di gravità e/o progressione di malattia cronica oncologica, polmonare, cardiaca, epatica, renale o neurologica
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="results-section" id="necpal40-results-section">
                <div class="results-title">
                    <i class="fas fa-chart-pie me-2"></i>
                    Risultati Valutazione NECPAL 4.0
                </div>
                <div class="results-grid">
                    <div class="result-card">
                        <div class="result-number" id="necpal40-total-items">0</div>
                        <div class="result-label">Items Selezionati</div>
                    </div>
                    <div class="result-card">
                        <div class="result-number" id="necpal40-status">-</div>
                        <div class="result-label">Stato NECPAL</div>
                    </div>
                    <div class="result-card">
                        <div class="result-number" id="necpal40-stage">-</div>
                        <div class="result-label">Stadio Prognostico</div>
                    </div>
                    <div class="result-card">
                        <div class="result-number" id="necpal40-prognosis">-</div>
                        <div class="result-label">Prognosi Mediana</div>
                    </div>
                </div>

                <div class="prognosis-card" id="prognosis-detail">
                    <div class="prognosis-title">
                        <i class="fas fa-hourglass-half me-2"></i>
                        Stima Prognostica NECPAL 4.0
                    </div>
                    <div class="stage-grid">
                        <div class="stage-card">
                            <div class="stage-name">Stadio I</div>
                            <div class="stage-criteria">DS + 1-2 items</div>
                            <div class="stage-prognosis">Mediana: 38 mesi</div>
                        </div>
                        <div class="stage-card">
                            <div class="stage-name">Stadio II</div>
                            <div class="stage-criteria">DS + 3-4 items</div>
                            <div class="stage-prognosis">Mediana: 17.2 mesi</div>
                        </div>
                        <div class="stage-card">
                            <div class="stage-name">Stadio III</div>
                            <div class="stage-criteria">DS + 5-6 items</div>
                            <div class="stage-prognosis">Mediana: 3.6 mesi</div>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="btn-action btn-outline-necpal40" onclick="printNecpal40()">
                        <i class="fas fa-print me-2"></i>Stampa Report
                    </button>
                    <button class="btn-action btn-outline-necpal40" onclick="resetNecpal40()">
                        <i class="fas fa-redo me-2"></i>Reset
                    </button>
                </div>
            </div>
        </div>

        <div id="necpal40-visualize-section" class="content-section">
            <div class="patient-info-card">
                <h3 class="patient-info-title">
                    <i class="fas fa-file-medical me-2"></i>
                    NECPAL 4.0 - Schema di Valutazione
                </h3>
                <p class="text-muted mb-4">
                    Schema completo per l'identificazione di pazienti con bisogni di cure palliative secondo i criteri NECPAL 4.0 (2021). Include valutazione prognostica a stadi.
                </p>

                <div class="surprise-question mb-4">
                    <h4>
                        <i class="fas fa-question-circle me-2"></i>
                        Domanda Sorprendente
                    </h4>
                    <p class="mb-0"><strong>Saresti sorpreso se questo paziente morisse entro 1 anno?</strong></p>
                    <div class="mt-3">
                        <span class="badge bg-success me-2">SÌ → NECPAL Negativo</span>
                        <span class="badge bg-warning">NO → Procedi con valutazione</span>
                    </div>
                </div>

                <div class="criteria-grid">
                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-hand-holding-heart me-2"></i>
                            Bisogni Palliativi
                        </div>
                        <div class="criteria-content">
                            <p>Il paziente stesso, i professionisti e/o i suoi familiari ritengono che il malato abbia attualmente bisogni di cure palliative</p>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-walking me-2"></i>
                            Perdita Funzionale
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Giudizio clinico di deterioramento funzionale prolungato, grave, progressivo e irreversibile</li>
                                <li>Perdita > 30% dell'indice di Barthel in 6 mesi</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-weight me-2"></i>
                            Perdita Nutrizionale
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Giudizio clinico di calo nutrizionale/ponderale prolungato, grave, progressivo e irreversibile</li>
                                <li>Perdita di peso > 10% in 6 mesi</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-pills me-2"></i>
                            Multimorbidità
                        </div>
                        <div class="criteria-content">
                            <p>≥ 2 malattie croniche concomitanti alla malattia principale</p>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-hospital me-2"></i>
                            Utilizzo di Risorse
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>≥ 2 ricoveri urgenti in ospedale nell'ultimo anno</li>
                                <li>Necessità di cure continuative complesse/intense</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-disease me-2"></i>
                            Malattia Avanzata
                        </div>
                        <div class="criteria-content">
                            <p>Criteri di gravità e/o progressione di malattia cronica:</p>
                            <ul class="criteria-list">
                                <li>Oncologica</li>
                                <li>Polmonare</li>
                                <li>Cardiaca</li>
                                <li>Epatica</li>
                                <li>Renale</li>
                                <li>Neurologica</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="prognosis-card mt-4">
                    <div class="prognosis-title">
                        <i class="fas fa-hourglass-half me-2"></i>
                        Stima Prognostica NECPAL 4.0
                    </div>
                    <div class="stage-grid">
                        <div class="stage-card">
                            <div class="stage-name">Stadio I</div>
                            <div class="stage-criteria">DS + 1-2 items</div>
                            <div class="stage-prognosis">Mediana: 38 mesi</div>
                        </div>
                        <div class="stage-card">
                            <div class="stage-name">Stadio II</div>
                            <div class="stage-criteria">DS + 3-4 items</div>
                            <div class="stage-prognosi">Mediana: 17.2 mesi</div>
                        </div>
                        <div class="stage-card">
                            <div class="stage-name">Stadio III</div>
                            <div class="stage-criteria">DS + 5-6 items</div>
                            <div class="stage-prognosi">Mediana: 3.6 mesi</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small class="text-light"><i class="fas fa-info-circle me-2"></i>Fonte: Xavier Gomez-Batiste et al. 2021</small>
                    </div>
                </div>

                <div class="action-buttons mt-4">
                    <button class="btn-action btn-primary-necpal40" onclick="printNecpal40Template()">
                        <i class="fas fa-print me-2"></i>Stampa Template
                    </button>
                </div>
            </div>
        </div>

        <div id="necpal40-glossary-section" class="content-section">
            <div class="patient-info-card">
                <h3 class="patient-info-title">
                    <i class="fas fa-book me-2"></i>
                    Glossario Clinico NECPAL 4.0
                </h3>
                <p class="text-muted mb-4">
                    Definizioni e criteri aggiornati per la corretta applicazione dello strumento NECPAL 4.0 (2021).
                </p>

                <div class="accordion" id="glossary40Accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNew">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNew">
                                <i class="fas fa-star me-2"></i>Novità NECPAL 4.0
                            </button>
                        </h2>
                        <div id="collapseNew" class="accordion-collapse collapse show" data-bs-parent="#glossary40Accordion">
                            <div class="accordion-body">
                                <p><strong>Principali aggiornamenti rispetto alla versione 3.1:</strong></p>
                                <ul>
                                    <li><strong>Criteri semplificati:</strong> Riduzione da 13 a 6 elementi principali più specifici</li>
                                    <li><strong>Stima prognostica integrata:</strong> 3 stadi con prognosi mediana validata</li>
                                    <li><strong>Validazione clinica:</strong> Basata su studi prospettici multicentrici (2021)</li>
                                    <li><strong>Maggiore specificità:</strong> Criteri più precisi per ridurre falsi positivi</li>
                                    <li><strong>Focus funzionale:</strong> Enfasi su perdita funzionale e nutrizionale progressive</li>
                                </ul>
                                <div class="alert alert-info">
                                    <strong>Utilizzo raccomandato:</strong> Per pazienti con aspettativa di vita ≤ 12 mesi identificati dalla domanda sorprendente.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingDS40">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDS40">
                                <i class="fas fa-question-circle me-2"></i>Domanda Sorprendente
                            </button>
                        </h2>
                        <div id="collapseDS40" class="accordion-collapse collapse" data-bs-parent="#glossary40Accordion">
                            <div class="accordion-body">
                                <p><strong>Definizione:</strong> "Saresti sorpreso se questo paziente morisse entro 1 anno?"</p>
                                <p>La domanda sorprendente rimane l'elemento discriminante fondamentale nel NECPAL 4.0, mantenendo la stessa formulazione della versione precedente.</p>
                                <h6><strong>Considerazioni Cliniche:</strong></h6>
                                <ul>
                                    <li><strong>Soggettività controllata:</strong> Basata su esperienza clinica e conoscenza del paziente</li>
                                    <li><strong>Sensibilità:</strong> Alta capacità di identificare pazienti a rischio</li>
                                    <li><strong>Specificità:</strong> Migliore nel NECPAL 4.0 grazie ai criteri raffinati</li>
                                </ul>
                                <div class="alert alert-warning">
                                    <strong>Importante:</strong> Se la risposta è "SÌ", il NECPAL è considerato negativo. Una risposta "NO" richiede la valutazione dei 6 criteri specifici.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNeeds">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNeeds">
                                <i class="fas fa-hand-holding-heart me-2"></i>Bisogni Palliativi
                            </button>
                        </h2>
                        <div id="collapseNeeds" class="accordion-collapse collapse" data-bs-parent="#glossary40Accordion">
                            <div class="accordion-body">
                                <p><strong>Definizione:</strong> Il paziente stesso, i professionisti e/o i suoi familiari ritengono che il malato abbia attualmente bisogni di cure palliative.</p>
                                <h6><strong>Criteri di Valutazione:</strong></h6>
                                <ul>
                                    <li><strong>Richiesta esplicita:</strong> Paziente o famiglia chiedono cure palliative</li>
                                    <li><strong>Richiesta implicita:</strong> Domande su prognosi, qualità di vita, pianificazione</li>
                                    <li><strong>Valutazione professionale:</strong> Team sanitario identifica bisogni palliativi</li>
                                    <li><strong>Indicatori comportamentali:</strong> Ritiro sociale, cambiamenti nell'approccio alle cure</li>
                                </ul>
                                <div class="alert alert-success">
                                    <strong>Nota:</strong> Questo criterio è obbligatorio per NECPAL 4.0 positivo, insieme ad almeno 1 dei 5 criteri clinici.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFunctional">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFunctional">
                                <i class="fas fa-walking me-2"></i>Perdita Funzionale
                            </button>
                        </h2>
                        <div id="collapseFunctional" class="accordion-collapse collapse" data-bs-parent="#glossary40Accordion">
                            <div class="accordion-body">
                                <p><strong>Definizione:</strong> Giudizio clinico di deterioramento funzionale prolungato, grave, progressivo e irreversibile e/o perdita > 30% dell'indice di Barthel in 6 mesi.</p>
                                <h6><strong>Caratteristiche Essenziali:</strong></h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6><strong>Prolungato</strong></h6>
                                        <ul>
                                            <li>Durata: > 3 mesi consecutivi</li>
                                            <li>Trend costante di peggioramento</li>
                                            <li>Non episodi isolati o acuti</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><strong>Grave</strong></h6>
                                        <ul>
                                            <li>Compromissione significativa ADL/IADL</li>
                                            <li>Riduzione Barthel > 30%</li>
                                            <li>Impatto sulla qualità di vita</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h6><strong>Progressivo</strong></h6>
                                        <ul>
                                            <li>Peggioramento continuo nel tempo</li>
                                            <li>Assenza di plateau stabili</li>
                                            <li>Trend documentabile</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><strong>Irreversibile</strong></h6>
                                        <ul>
                                            <li>Non responsivo a trattamenti</li>
                                            <li>Non correlato a cause reversibili</li>
                                            <li>Prognosi funzionale infausta</li>
                                        </ul>
                                    </div>
                                </div>
                                <h6><strong>Strumenti di Valutazione:</strong></h6>
                                <ul>
                                    <li><strong>Indice di Barthel:</strong> Scala 0-100, riduzione > 30 punti in 6 mesi</li>
                                    <li><strong>ADL (Katz):</strong> Perdita di ≥ 2 funzioni base</li>
                                    <li><strong>IADL (Lawton):</strong> Compromissione attività strumentali</li>
                                    <li><strong>Performance Status:</strong> ECOG ≥ 3, Karnofsky ≤ 50</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNutritional">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNutritional">
                                <i class="fas fa-weight me-2"></i>Perdita Nutrizionale
                            </button>
                        </h2>
                        <div id="collapseNutritional" class="accordion-collapse collapse" data-bs-parent="#glossary40Accordion">
                            <div class="accordion-body">
                                <p><strong>Definizione:</strong> Giudizio clinico di calo nutrizionale/ponderale prolungato, grave, progressivo e irreversibile e/o perdita di peso > 10% in 6 mesi.</p>
                                <h6><strong>Criteri Quantitativi:</strong></h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Timeframe</th>
                                                <th>Perdita Peso</th>
                                                <th>Significato Clinico</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td>1 mese</td><td>> 5%</td><td>Severa malnutrizione acuta</td></tr>
                                            <tr><td>3 mesi</td><td>> 7.5%</td><td>Malnutrizione grave</td></tr>
                                            <tr><td>6 mesi</td><td>> 10%</td><td>Cachessia (criterio NECPAL 4.0)</td></tr>
                                            <tr><td>12 mesi</td><td>> 15%</td><td>Cachessia severa</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6><strong>Criteri Qualitativi:</strong></h6>
                                <ul>
                                    <li><strong>Sarcopenia:</strong> Perdita massa muscolare visibile</li>
                                    <li><strong>Anoressia:</strong> Riduzione significativa dell'appetito</li>
                                    <li><strong>Disfagia:</strong> Difficoltà progressiva alla deglutizione</li>
                                    <li><strong>Malassorbimento:</strong> Non correlato a cause trattabili</li>
                                </ul>
                                <h6><strong>Indicatori di Intensità:</strong></h6>
                                <ul>
                                    <li><strong>Polifarmacoterapia:</strong> > 10 farmaci/die</li>
                                    <li><strong>Dispositivi medici:</strong> PEG, tracheostomia, catetere vescicale permanente</li>
                                    <li><strong>Monitoraggio frequente:</strong> Parametri vitali quotidiani</li>
                                    <li><strong>Assistenza h24:</strong> Necessità di supervisione continua</li>
                                </ul>
                                <div class="alert alert-warning">
                                    <strong>Esclusioni:</strong> Non considerare perdite di peso dovute a diuretici, dialisi, o altre cause acute reversibili.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingAdvanced">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdvanced">
                                <i class="fas fa-disease me-2"></i>Malattia Avanzata
                            </button>
                        </h2>
                        <div id="collapseAdvanced" class="accordion-collapse collapse" data-bs-parent="#glossary40Accordion">
                            <div class="accordion-body">
                                <p><strong>Definizione:</strong> Criteri di gravità e/o progressione di malattia cronica oncologica, polmonare, cardiaca, epatica, renale o neurologica.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6><strong>Oncologica:</strong></h6>
                                        <ul>
                                            <li>Metastatico o avanzato locoregionale</li>
                                            <li>Progressione nonostante terapie</li>
                                            <li>Performance Status ≤ 60 (Karnofsky)</li>
                                            <li>Sintomi non controllati</li>
                                        </ul>
                                        <h6><strong>Polmonare:</strong></h6>
                                        <ul>
                                            <li>VEMS &lt; 30% del predetto</li>
                                            <li>Dispnea per minimi sforzi</li>
                                            <li>O₂ terapia domiciliare</li>
                                            <li>Riacutizzazioni frequenti (> 3/anno)</li>
                                        </ul>
                                        <h6><strong>Cardiaca:</strong></h6>
                                        <ul>
                                            <li>NYHA III-IV</li>
                                            <li>FE &lt; 30%</li>
                                            <li>Ricoveri per scompenso (> 2/anno)</li>
                                            <li>Inotropi cronici</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><strong>Epatica:</strong></h6>
                                        <ul>
                                            <li>Child-Pugh C</li>
                                            <li>MELD-Na > 30</li>
                                            <li>Complicanze: ascite, encefalopatia</li>
                                            <li>Epatocarcinoma stadio C-D</li>
                                        </ul>
                                        <h6><strong>Renale:</strong></h6>
                                        <ul>
                                            <li>eGFR &lt; 15 ml/min/1.73m²</li>
                                            <li>Dialisi rifiutata/sospesa</li>
                                            <li>Complicanze uremiche</li>
                                            <li>Non candidabile a trapianto</li>
                                        </ul>
                                        <h6><strong>Neurologica:</strong></h6>
                                        <ul>
                                            <li>Demenza GDS ≥ 6c</li>
                                            <li>SLA con disfagia/dispnea</li>
                                            <li>Parkinson avanzato</li>
                                            <li>Sclerosi multipla progressiva</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPrognosis40">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrognosis40">
                                <i class="fas fa-hourglass-half me-2"></i>Valutazione Prognostica
                            </button>
                        </h2>
                        <div id="collapsePrognosis40" class="accordion-collapse collapse" data-bs-parent="#glossary40Accordion">
                            <div class="accordion-body">
                                <p><strong>Il NECPAL 4.0 fornisce una stima prognostica stratificata basata sul numero di criteri positivi:</strong></p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card border-success">
                                            <div class="card-header bg-success text-white"><strong>Stadio I</strong></div>
                                            <div class="card-body">
                                                <p><strong>Criteri:</strong> DS + Bisogni + 1-2 criteri clinici</p>
                                                <p><strong>Prognosi:</strong> 38 mesi (mediana)</p>
                                                <p><strong>IC 95%:</strong> 28-52 mesi</p>
                                                <p><strong>Raccomandazione:</strong> Cure palliative precoci integrate</p>
                                                <p><small>Focalizzare su controllo sintomi e pianificazione anticipata</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-warning">
                                            <div class="card-header bg-warning text-dark"><strong>Stadio II</strong></div>
                                            <div class="card-body">
                                                <p><strong>Criteri:</strong> DS + Bisogni + 3-4 criteri clinici</p>
                                                <p><strong>Prognosi:</strong> 17.2 mesi (mediana)</p>
                                                <p><strong>IC 95%:</strong> 12-24 mesi</p>
                                                <p><strong>Raccomandazione:</strong> Cure palliative specialistiche</p>
                                                <p><small>Intensificare controllo sintomi e supporto psicosociale</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-danger">
                                            <div class="card-header bg-danger text-white"><strong>Stadio III</strong></div>
                                            <div class="card-body">
                                                <p><strong>Criteri:</strong> DS + Bisogni + 5 criteri clinici</p>
                                                <p><strong>Prognosi:</strong> 3.6 mesi (mediana)</p>
                                                <p><strong>IC 95%:</strong> 2-6 mesi</p>
                                                <p><strong>Raccomandazione:</strong> Cure di fine vita</p>
                                                <p><small>Focus su comfort care e supporto familiare</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 alert alert-info">
                                    <h6><strong>Note Metodologiche:</strong></h6>
                                    <ul class="mb-0">
                                        <li><strong>Validazione:</strong> Studio prospettico su 1,347 pazienti (Gomez-Batiste et al. 2021)</li>
                                        <li><strong>Follow-up:</strong> 24 mesi mediano</li>
                                        <li><strong>C-index:</strong> 0.76 (buona capacità discriminativa)</li>
                                        <li><strong>Applicabilità:</strong> Validato in contesti ospedalieri, cure primarie e lungodegenza</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingApplication40">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseApplication40">
                                <i class="fas fa-user-md me-2"></i>Applicazione Clinica
                            </button>
                        </h2>
                        <div id="collapseApplication40" class="accordion-collapse collapse" data-bs-parent="#glossary40Accordion">
                            <div class="accordion-body">
                                <h6><strong>Quando utilizzare NECPAL 4.0:</strong></h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Setting Ospedaliero:</strong>
                                        <ul>
                                            <li>Screening sistematico in medicina interna</li>
                                            <li>Valutazione pre-dimissione</li>
                                            <li>Identificazione per consulenza palliativa</li>
                                            <li>Pianificazione percorso post-acuto</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Cure Primarie:</strong>
                                        <ul>
                                            <li>Valutazione periodica pazienti cronici</li>
                                            <li>Trigger per Advanced Care Planning</li>
                                            <li>Identificazione per ADI palliative</li>
                                            <li>Coordinamento con specialisti</li>
                                        </ul>
                                    </div>
                                </div>
                                <h6><strong>Frequenza di Rivalutazione:</strong></h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Stato NECPAL</th>
                                                <th>Frequenza</th>
                                                <th>Obiettivi</th>
                                                <th>Azioni</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td>Negativo</td><td>Ogni 6 mesi</td><td>Monitoring cambiamenti</td><td>Valutazione clinica standard</td></tr>
                                            <tr><td>Stadio I</td><td>Ogni 3-4 mesi</td><td>Cure palliative precoci</td><td>ACP, controllo sintomi</td></tr>
                                            <tr><td>Stadio II</td><td>Ogni 2-3 mesi</td><td>Cure specialistiche</td><td>Consulenza palliativista</td></tr>
                                            <tr><td>Stadio III</td><td>Ogni 1-2 mesi</td><td>End-of-life care</td><td>Comfort care, supporto famiglia</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6><strong>Limitazioni e Considerazioni:</strong></h6>
                                <ul>
                                    <li><strong>Non sostitutivo:</strong> Non sostituisce il giudizio clinico</li>
                                    <li><strong>Popolazione target:</strong> Ottimale per pazienti > 65 anni</li>
                                    <li><strong>Contesto culturale:</strong> Validato in popolazione europea</li>
                                    <li><strong>Variabilità individuale:</strong> La prognosi individuale può variare significativamente</li>
                                </ul>
                                <div class="alert alert-success">
                                    <strong>Best Practice:</strong> Utilizzare NECPAL 4.0 come parte di una valutazione multidimensionale completa, integrando il giudizio clinico e le preferenze del paziente.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingBiblio">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBiblio">
                                <i class="fas fa-book-open me-2"></i>Bibliografia e Riferimenti
                            </button>
                        </h2>
                        <div id="collapseBiblio" class="accordion-collapse collapse" data-bs-parent="#glossary40Accordion">
                            <div class="accordion-body">
                                <h6><strong>Riferimenti Principali NECPAL 4.0:</strong></h6>
                                <ol>
                                    <li>Gomez-Batiste X, et al. Desarrollo y validación del instrumento NECPAL 4.0 para la identificación de pacientes con enfermedades crónicas avanzadas y necesidades paliativas. Med Clin (Barc). 2021;156(8):391-397.</li>
                                    <li>Amblàs-Novellas J, et al. Effectiveness of the NECPAL instrument to identify patients with advanced chronic conditions in need of palliative care: a systematic review. BMJ Support Palliat Care. 2022;12(1):27-34.</li>
                                    <li>Costa X, et al. The NECPAL instrument as a predictor of early mortality: a validation study in patients with advanced chronic diseases. J Pain Symptom Manage. 2021;61(4):714-722.</li>
                                </ol>
                                <h6><strong>Linee Guida Correlate:</strong></h6>
                                <ul>
                                    <li>WHO Definition of Palliative Care (2020)</li>
                                    <li>EAPC White Paper on improving care for patients with chronic diseases (2021)</li>
                                    <li>ESMO Guidelines for Early Palliative Care in Adults with Advanced Cancer (2020)</li>
                                    <li>Consensus Document on Palliative Care in Spain (2021)</li>
                                </ul>
                                <h6><strong>Strumenti Correlati:</strong></h6>
                                <ul>
                                    <li><strong>SPICT:</strong> Supportive and Palliative Care Indicators Tool</li>
                                    <li><strong>GSF-PIG:</strong> Gold Standards Framework Prognostic Indicator Guidance</li>
                                    <li><strong>RADboud-UCP:</strong> Radboud Indicators for Palliative Care Needs</li>
                                    <li><strong>PALCOM:</strong> Palliative Care Complexity Scale</li>
                                </ul>
                                <div class="mt-3 p-3 bg-light rounded">
                                    <small class="text-muted"><strong>Nota:</strong> NECPAL 4.0 è protetto da copyright CCOMS-ICO © 2021. L'utilizzo clinico è gratuito previa registrazione sul sito ufficiale. Per ulteriori informazioni: www.necpal.org</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let necpal40Data = { surprise: null, items: [], patientInfo: {} };

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('necpal40-eval-date').value = new Date().toISOString().split('T')[0];
            document.querySelectorAll('#necpal40-home input[name="surprise40"]').forEach(radio => {
                radio.addEventListener('change', handleSurprise40Question);
            });
            document.querySelectorAll('#necpal40-home input[type="checkbox"]').forEach(cb => {
                cb.addEventListener('change', function () {
                    const itemDiv = this.closest('.checkbox-item');
                    const id = this.id;
                    if (this.checked) {
                        itemDiv.classList.add('selected');
                        if (!necpal40Data.items.includes(id)) necpal40Data.items.push(id);
                    } else {
                        itemDiv.classList.remove('selected');
                        necpal40Data.items = necpal40Data.items.filter(x => x !== id);
                    }
                    updateResults40();
                });
            });
        });

        function switchNecpal40Mode(mode) {
            const container = document.getElementById('necpal40-home');
            container.querySelectorAll('.mode-btn').forEach(btn => btn.classList.remove('active'));
            const btn = container.querySelector(`.mode-btn[data-mode="${mode}"]`);
            if (btn) btn.classList.add('active');
            container.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
            const target = container.querySelector(`#necpal40-${mode}-section`);
            if (target) target.classList.add('active');
        }

        function handleSurprise40Question() {
            const surprise = document.querySelector('#necpal40-home input[name="surprise40"]:checked').value;
            necpal40Data.surprise = surprise;
            if (surprise === 'yes') {
                document.getElementById('necpal40-negative').style.display = 'block';
                document.getElementById('necpal40-sections').style.display = 'none';
                document.getElementById('necpal40-results-section').style.display = 'none';
            } else {
                document.getElementById('necpal40-negative').style.display = 'none';
                document.getElementById('necpal40-sections').style.display = 'block';
                updateResults40();
            }
        }

        function updateResults40() {
            const totalItems = necpal40Data.items.length;
            const resultsSection = document.getElementById('necpal40-results-section');
            if (necpal40Data.surprise === 'no') {
                resultsSection.style.display = 'block';
                document.getElementById('necpal40-total-items').textContent = totalItems;
                if (necpal40Data.items.includes('bisogni-palliativi') && totalItems >= 2) {
                    document.getElementById('necpal40-status').textContent = 'POSITIVO';
                    const clinicalItems = totalItems - 1;
                    let stage = '-', prognosis = '-';
                    if (clinicalItems >= 1 && clinicalItems <= 2) { stage = 'I'; prognosis = '38 mesi'; }
                    else if (clinicalItems >= 3 && clinicalItems <= 4) { stage = 'II'; prognosis = '17.2 mesi'; }
                    else if (clinicalItems >= 5) { stage = 'III'; prognosis = '3.6 mesi'; }
                    document.getElementById('necpal40-stage').textContent = stage;
                    document.getElementById('necpal40-prognosis').textContent = prognosis;
                } else {
                    document.getElementById('necpal40-status').textContent = 'NEGATIVO';
                    document.getElementById('necpal40-stage').textContent = '-';
                    document.getElementById('necpal40-prognosis').textContent = '-';
                }
            } else {
                resultsSection.style.display = 'none';
            }
        }

        function printNecpal40() {
            const name = document.getElementById('necpal40-patient-name')?.value || '';
            const birth = document.getElementById('necpal40-birth-date')?.value || '';
            const evalDate = document.getElementById('necpal40-eval-date')?.value || '';
            const status = document.getElementById('necpal40-status')?.textContent || '';
            const stage = document.getElementById('stage40')?.textContent || '';
            const prognosis = document.getElementById('prognosis40')?.textContent || '';
            const itemsHtml = necpal40Data.items.map(id => {
                const lbl = document.querySelector(`label[for="${id}"]`);
                const text = lbl ? lbl.textContent.trim() : id;
                return `<li>${text}</li>`;
            }).join('');
            const total = necpal40Data.items.length;
            const win = window.open('', '_blank');
            win.document.write(`<!DOCTYPE html><html lang="it"><head><meta charset="UTF-8"><title>NECPAL 4.0 - Report</title><style>body{font-family:Arial,sans-serif;margin:20px;line-height:1.4;color:#333;} .header{text-align:center;margin-bottom:30px;border-bottom:2px solid #20c997;padding-bottom:20px;} .header h1{color:#20c997;margin-bottom:10px;} .patient-info{border:2px solid #20c997;padding:20px;margin-bottom:25px;border-radius:8px;background:#f8f9fa;} .result-section{margin-top:30px;padding:20px;border:2px solid #20c997;border-radius:8px;background:#f8f9fa;} .form-row{display:flex;justify-content:space-between;margin-bottom:15px;} .form-field{flex:1;margin-right:20px;} .form-field:last-child{margin-right:0;} ul{margin-top:10px;padding-left:20px;} .footer{margin-top:40px;padding-top:20px;border-top:1px solid #ddd;font-size:12px;color:#666;text-align:center;}</style></head><body><div class="header"><h1>NECPAL 4.0</h1><p><strong>Scheda di Valutazione</strong></p><p>www.medbox.it - Strumenti per le Cure Palliative</p></div><div class="patient-info"><div class="form-row"><div class="form-field"><strong>Nome:</strong> ${name}</div><div class="form-field"><strong>Data di nascita:</strong> ${birth}</div></div><div class="form-row"><div class="form-field"><strong>Data valutazione:</strong> ${evalDate}</div></div></div><div class="result-section"><h3>Risultati</h3><div class="form-row"><div class="form-field"><strong>Totale items:</strong> ${total}</div><div class="form-field"><strong>Stato:</strong> ${status}</div></div><div class="form-row"><div class="form-field"><strong>Stadio:</strong> ${stage}</div><div class="form-field"><strong>Prognosi:</strong> ${prognosis}</div></div><div><strong>Items selezionati:</strong><ul>${itemsHtml}</ul></div></div><div class="footer"><p>${new Date().toLocaleDateString('it-IT')}</p></div></body></html>`);
            win.document.close();
            win.focus();
            win.onload = function(){ win.print(); };
        }

        function printNecpal40Template() {
            const content = document.getElementById('necpal40-visualize-section').innerHTML;
            const win = window.open('', '_blank');
            win.document.write(`<!DOCTYPE html><html lang="it"><head><meta charset="UTF-8"><title>NECPAL 4.0 - Template</title><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"><style>body{padding:20px;} i,[class^="fa"]{display:none !important;}</style></head><body>${content}</body></html>`);
            win.document.close();
            win.focus();
            win.onload = function(){ win.print(); };
        }
        function resetNecpal40() {
            if (confirm('Sei sicuro di voler resettare la valutazione?')) {
                necpal40Data = { surprise: null, items: [], patientInfo: {} };
                document.getElementById('necpal40-patient-name').value = '';
                document.getElementById('necpal40-birth-date').value = '';
                document.getElementById('necpal40-eval-date').value = new Date().toISOString().split('T')[0];
                document.querySelectorAll('#necpal40-home input[name="surprise40"]').forEach(radio => radio.checked = false);
                document.querySelectorAll('#necpal40-home .checkbox-item').forEach(item => {
                    item.classList.remove('selected');
                    item.querySelector('input[type="checkbox"]').checked = false;
                });
                document.getElementById('necpal40-negative').style.display = 'none';
                document.getElementById('necpal40-sections').style.display = 'none';
                document.getElementById('necpal40-results-section').style.display = 'none';
            }
        }
    </script>
</section>
