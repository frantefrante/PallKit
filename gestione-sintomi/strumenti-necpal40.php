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
            <a href="#" class="mode-btn active" onclick="switchNecpal40Mode('compile')">
                <i class="fas fa-edit me-2"></i>Compila
            </a>
            <a href="#" class="mode-btn" onclick="switchNecpal40Mode('visualize')">
                <i class="fas fa-eye me-2"></i>Visualizza
            </a>
            <a href="#" class="mode-btn" onclick="switchNecpal40Mode('glossary')">
                <i class="fas fa-book me-2"></i>Glossario
            </a>
        </div>

        <div id="compile-section" class="content-section active">
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
                        <div class="checkbox-item" onclick="toggleNecpal40Item(this, 'bisogni-palliativi')">
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
                        <div class="checkbox-item" onclick="toggleNecpal40Item(this, 'perdita-funzionale')">
                            <input type="checkbox" id="perdita-funzionale">
                            <label class="checkbox-label" for="perdita-funzionale">
                                <strong>Perdita funzionale:</strong> Giudizio clinico di deterioramento funzionale prolungato, grave, progressivo e irreversibile e/o perdita > 30% dell'indice di Barthel in 6 mesi
                            </label>
                        </div>
                        <div class="checkbox-item" onclick="toggleNecpal40Item(this, 'perdita-nutrizionale')">
                            <input type="checkbox" id="perdita-nutrizionale">
                            <label class="checkbox-label" for="perdita-nutrizionale">
                                <strong>Perdita nutrizionale:</strong> Giudizio clinico di calo nutrizionale/ponderale prolungato, grave, progressivo e irreversibile e/o perdita di peso > 10% in 6 mesi
                            </label>
                        </div>
                        <div class="checkbox-item" onclick="toggleNecpal40Item(this, 'multimorbidita40')">
                            <input type="checkbox" id="multimorbidita40">
                            <label class="checkbox-label" for="multimorbidita40">
                                <strong>Multimorbidità:</strong> ≥ 2 malattie croniche concomitanti alla malattia principale
                            </label>
                        </div>
                        <div class="checkbox-item" onclick="toggleNecpal40Item(this, 'utilizzo-risorse40')">
                            <input type="checkbox" id="utilizzo-risorse40">
                            <label class="checkbox-label" for="utilizzo-risorse40">
                                <strong>Utilizzo di risorse:</strong> ≥ 2 ricoveri urgenti in ospedale nell'ultimo anno e/o necessità di cure continuative complesse/intense
                            </label>
                        </div>
                        <div class="checkbox-item" onclick="toggleNecpal40Item(this, 'malattia-avanzata')">
                            <input type="checkbox" id="malattia-avanzata">
                            <label class="checkbox-label" for="malattia-avanzata">
                                <strong>Malattia avanzata:</strong> Criteri di gravità e/o progressione di malattia cronica oncologica, polmonare, cardiaca, epatica, renale o neurologica
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="results-section" id="results40-section">
                <div class="results-title">
                    <i class="fas fa-chart-pie me-2"></i>
                    Risultati Valutazione NECPAL 4.0
                </div>
                <div class="results-grid">
                    <div class="result-card">
                        <div class="result-number" id="total40-items">0</div>
                        <div class="result-label">Items Selezionati</div>
                    </div>
                    <div class="result-card">
                        <div class="result-number" id="necpal40-status">-</div>
                        <div class="result-label">Stato NECPAL</div>
                    </div>
                    <div class="result-card">
                        <div class="result-number" id="stage40">-</div>
                        <div class="result-label">Stadio Prognostico</div>
                    </div>
                    <div class="result-card">
                        <div class="result-number" id="prognosis40">-</div>
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

        <div id="visualize-section" class="content-section">
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

        <div id="glossary-section" class="content-section">
            <div class="patient-info-card">
                <h3 class="patient-info-title">
                    <i class="fas fa-book me-2"></i>
                    Glossario Clinico NECPAL 4.0
                </h3>
                <p class="text-muted mb-4">
                    Definizioni e criteri aggiornati per la corretta applicazione dello strumento NECPAL 4.0 (2021).
                </p>
                <!-- Glossary accordion as in provided code -->
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
        });

        function switchNecpal40Mode(mode) {
            document.querySelectorAll('#necpal40-home .mode-btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            document.querySelectorAll('#necpal40-home .content-section').forEach(section => section.classList.remove('active'));
            document.getElementById(mode + '-section').classList.add('active');
        }

        function handleSurprise40Question() {
            const surprise = document.querySelector('#necpal40-home input[name="surprise40"]:checked').value;
            necpal40Data.surprise = surprise;
            if (surprise === 'yes') {
                document.getElementById('necpal40-negative').style.display = 'block';
                document.getElementById('necpal40-sections').style.display = 'none';
                document.getElementById('results40-section').style.display = 'none';
            } else {
                document.getElementById('necpal40-negative').style.display = 'none';
                document.getElementById('necpal40-sections').style.display = 'block';
                updateResults40();
            }
        }

        function toggleNecpal40Item(element, itemId) {
            const checkbox = element.querySelector('input[type="checkbox"]');
            checkbox.checked = !checkbox.checked;
            if (checkbox.checked) {
                element.classList.add('selected');
                if (!necpal40Data.items.includes(itemId)) necpal40Data.items.push(itemId);
            } else {
                element.classList.remove('selected');
                necpal40Data.items = necpal40Data.items.filter(item => item !== itemId);
            }
            updateResults40();
        }

        function updateResults40() {
            const totalItems = necpal40Data.items.length;
            const resultsSection = document.getElementById('results40-section');
            if (necpal40Data.surprise === 'no') {
                resultsSection.style.display = 'block';
                document.getElementById('total40-items').textContent = totalItems;
                if (necpal40Data.items.includes('bisogni-palliativi') && totalItems >= 2) {
                    document.getElementById('necpal40-status').textContent = 'POSITIVO';
                    const clinicalItems = totalItems - 1;
                    let stage = '-', prognosis = '-';
                    if (clinicalItems >= 1 && clinicalItems <= 2) { stage = 'I'; prognosis = '38 mesi'; }
                    else if (clinicalItems >= 3 && clinicalItems <= 4) { stage = 'II'; prognosis = '17.2 mesi'; }
                    else if (clinicalItems >= 5) { stage = 'III'; prognosis = '3.6 mesi'; }
                    document.getElementById('stage40').textContent = stage;
                    document.getElementById('prognosis40').textContent = prognosis;
                } else {
                    document.getElementById('necpal40-status').textContent = 'NEGATIVO';
                    document.getElementById('stage40').textContent = '-';
                    document.getElementById('prognosis40').textContent = '-';
                }
            } else {
                resultsSection.style.display = 'none';
            }
        }

        function printNecpal40() { window.print(); }
        function printNecpal40Template() { switchNecpal40Mode('visualize'); setTimeout(() => window.print(), 100); }
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
                document.getElementById('results40-section').style.display = 'none';
            }
        }
    </script>
</section>
