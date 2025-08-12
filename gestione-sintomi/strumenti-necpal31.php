<?php
// Strumento NECPAL 3.1 - Necesidades Paliativas
?>
<section id="necpal31-home" class="p-4" style="display:none;">
    <style>
        :root {
            --primary-green: #28a745;
            --secondary-green: #20c997;
            --light-green: rgba(40, 167, 69, 0.1);
            --border-green: rgba(40, 167, 69, 0.2);
            --dark-green: #1e7e34;
        }

        .necpal31-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .necpal31-header {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            color: white;
            padding: 2.5rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            text-align: center;
        }

        .necpal31-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .necpal31-subtitle {
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
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            color: white;
            box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
        }

        .mode-btn:hover:not(.active) {
            background: var(--light-green);
            color: var(--primary-green);
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        .patient-info-card {
            background: white;
            border: 2px solid var(--primary-green);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        .patient-info-title {
            color: var(--primary-green);
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
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
        }

        .surprise-question {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            border: 2px solid #ffc107;
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .surprise-question h4 {
            color: #856404;
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

        .surprise-option input[type="radio"] {
            display: none;
        }

        .surprise-option label {
            display: block;
            padding: 1rem 2rem;
            background: white;
            border: 2px solid #ffc107;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-align: center;
        }

        .surprise-option input:checked + label {
            background: #ffc107;
            color: #856404;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
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

        .necpal-negative h4 {
            color: #721c24;
            margin-bottom: 1rem;
        }

        .necpal-sections {
            display: none;
        }

        .necpal-section {
            background: white;
            border: 2px solid var(--border-green);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        }

        .section-header {
            background: var(--primary-green);
            color: white;
            padding: 1rem 1.5rem;
            margin: -2rem -2rem 2rem -2rem;
            border-radius: 10px 10px 0 0;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .checkbox-group {
            display: grid;
            gap: 1rem;
        }

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
            background: var(--light-green);
            border-color: var(--border-green);
        }

        .checkbox-item.selected {
            background: var(--light-green);
            border-color: var(--primary-green);
            box-shadow: 0 2px 8px rgba(40, 167, 69, 0.2);
        }

        .checkbox-item input[type="checkbox"] {
            margin-top: 0.25rem;
            transform: scale(1.2);
        }

        .checkbox-label {
            flex: 1;
            font-weight: 500;
            line-height: 1.4;
        }

        .results-section {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            color: white;
            border-radius: 12px;
            padding: 2rem;
            margin-top: 2rem;
            display: none;
        }

        .results-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
        }

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

        .result-number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .result-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn-action {
            padding: 0.875rem 2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary-necpal {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            color: white;
        }

        .btn-primary-necpal:hover {
            background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        }

        .btn-outline-necpal {
            background: white;
            color: var(--primary-green);
            border: 2px solid var(--primary-green);
        }

        .btn-outline-necpal:hover {
            background: var(--primary-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        }

        .criteria-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .criteria-card {
            background: white;
            border: 2px solid var(--border-green);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        }

        .criteria-header {
            background: var(--primary-green);
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 700;
        }

        .criteria-content {
            padding: 1.5rem;
        }

        .criteria-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .criteria-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid #e9ecef;
            position: relative;
            padding-left: 1.5rem;
        }

        .criteria-list li:last-child {
            border-bottom: none;
        }

        .criteria-list li::before {
            content: "•";
            color: var(--primary-green);
            font-weight: bold;
            position: absolute;
            left: 0;
        }

        #detailed-breakdown {
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        #detailed-breakdown .border {
            border-color: var(--primary-green) !important;
        }
        #detailed-breakdown .h5 {
            color: var(--primary-green);
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .surprise-options {
                flex-direction: column;
            }
            .action-buttons {
                flex-direction: column;
            }
            .mode-selector {
                flex-direction: column;
            }
            .results-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <div class="mb-3">
        <button class="btn btn-outline-success me-2" onclick="navigateToSection('identificazione-home')">
            <i class="fas fa-arrow-left me-2"></i>Torna a Identificazione
        </button>
        <button class="btn btn-outline-primary" onclick="navigateToSection('strumenti-valutazione-home'); showCategories();">
            <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
        </button>
    </div>

    <div class="necpal31-container">
        <div class="necpal31-header">
            <div class="necpal31-title">
                <i class="fas fa-clipboard-check me-2"></i>
                NECPAL 3.1
            </div>
            <div class="necpal31-subtitle">
                Necesidades Paliativas - Strumento di Identificazione Precoce
            </div>
        </div>

        <div class="mode-selector">
            <a href="#" class="mode-btn active" data-mode="compile" onclick="switchNecpal31Mode('compile')">
                <i class="fas fa-edit me-2"></i>Compila
            </a>
            <a href="#" class="mode-btn" data-mode="visualize" onclick="switchNecpal31Mode('visualize')">
                <i class="fas fa-eye me-2"></i>Visualizza
            </a>
            <a href="#" class="mode-btn" data-mode="glossary" onclick="switchNecpal31Mode('glossary')">
                <i class="fas fa-book me-2"></i>Glossario
            </a>
        </div>

        <div id="necpal31-compile-section" class="content-section active">
            <div class="patient-info-card">
                <h3 class="patient-info-title">
                    <i class="fas fa-user-circle"></i>
                    Dati Paziente
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="necpal31-patient-name" placeholder="Nome Cognome">
                            <label for="necpal31-patient-name">Nome e Cognome</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="necpal31-birth-date">
                            <label for="necpal31-birth-date">Data di Nascita</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="necpal31-eval-date">
                            <label for="necpal31-eval-date">Data Valutazione</label>
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
                        <input type="radio" id="surprise-yes" name="surprise" value="yes">
                        <label for="surprise-yes">
                            <i class="fas fa-check-circle me-2"></i>SÌ
                        </label>
                    </div>
                    <div class="surprise-option">
                        <input type="radio" id="surprise-no" name="surprise" value="no">
                        <label for="surprise-no">
                            <i class="fas fa-times-circle me-2"></i>NO
                        </label>
                    </div>
                </div>
            </div>

            <div class="necpal-negative" id="necpal31-negative">
                <h4>
                    <i class="fas fa-info-circle me-2"></i>
                    NECPAL Negativo
                </h4>
                <p>La domanda sorprendente è positiva. Il paziente non necessita attualmente di cure palliative specialistiche. È consigliabile rivalutare periodicamente.</p>
            </div>

            <div class="necpal-sections" id="necpal31-sections">
                <div class="necpal-section">
                    <div class="section-header">
                        <i class="fas fa-hand-holding-heart me-2"></i>
                        Richiesta o Bisogni
                    </div>
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="richiesta-scelta">
                            <label class="checkbox-label" for="richiesta-scelta">
                                <strong>Scelta/Richiesta:</strong> il paziente, i familiari o il team curante hanno richiesto, in modo implicito o esplicito, un approccio palliativo o una limitazione ai trattamenti specifici con finalità curative
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="bisogni-team">
                            <label class="checkbox-label" for="bisogni-team">
                                <strong>Bisogni:</strong> identificati dai sanitari del team curante
                            </label>
                        </div>
                    </div>
                </div>

                <div class="necpal-section">
                    <div class="section-header">
                        <i class="fas fa-stethoscope me-2"></i>
                        Indicatori Clinici Generali (ultimi 6 mesi)
                    </div>
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="declino-nutrizionale">
                            <label class="checkbox-label" for="declino-nutrizionale">
                                <strong>Declino nutrizionale:</strong> Perdita di peso > 10%
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="declino-funzionale-karnofsky">
                            <label class="checkbox-label" for="declino-funzionale-karnofsky">
                                <strong>Declino funzionale:</strong> Karnofsky o Barthel riduzione > 30%
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="declino-funzionale-adl">
                            <label class="checkbox-label" for="declino-funzionale-adl">
                                <strong>Declino funzionale:</strong> ADL riduzione > 2 funzioni
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="declino-cognitivo">
                            <label class="checkbox-label" for="declino-cognitivo">
                                <strong>Declino cognitivo:</strong> Perdita ≥ 5 punti del minimental
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="dipendenza-grave">
                            <label class="checkbox-label" for="dipendenza-grave">
                                <strong>Dipendenza grave:</strong> Karnofsky &lt; 50 o Barthel &lt; 20
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="sindromi-geriatriche">
                            <label class="checkbox-label" for="sindromi-geriatriche">
                                <strong>Sindromi geriatriche:</strong> ≥ 2 sindromi (cadute, disfagia, delirium, ulcere da decubito, infezioni ricorrenti)
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="sintomi-persistenti">
                            <label class="checkbox-label" for="sintomi-persistenti">
                                <strong>Sintomi persistenti:</strong> ESAS ≥ 2 sintomi persistenti o refrattari
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="aspetti-psicosociali">
                            <label class="checkbox-label" for="aspetti-psicosociali">
                                <strong>Aspetti psico-sociali:</strong> Distress e/o gravi disturbi dell'adattamento (DME > 9)
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="vulnerabilita-sociale">
                            <label class="checkbox-label" for="vulnerabilita-sociale">
                                <strong>Vulnerabilità sociale grave:</strong> Valutazione sociale e familiare
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="multimorbidita">
                            <label class="checkbox-label" for="multimorbidita">
                                <strong>Multi-morbidità:</strong> > 2 malattie croniche
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="utilizzo-risorse">
                            <label class="checkbox-label" for="utilizzo-risorse">
                                <strong>Utilizzo di risorse:</strong> > 2 ricoveri urgenti o non pianificati negli ultimi 6 mesi
                            </label>
                        </div>
                    </div>
                </div>

                <div class="necpal-section">
                    <div class="section-header">
                        <i class="fas fa-disease me-2"></i>
                        Indicatori Specifici di Severità/Progressione
                    </div>
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="cancro">
                            <label class="checkbox-label" for="cancro">
                                <strong>Cancro:</strong> Metastatico o avanzato a livello locoregionale, in progressione, sintomi persistenti
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="bpco">
                            <label class="checkbox-label" for="bpco">
                                <strong>Patologie polmonari croniche:</strong> Dispnea per minimi sforzi, VEMS &lt; 30%, O₂ terapia domiciliare
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="cardiache">
                            <label class="checkbox-label" for="cardiache">
                                <strong>Patologie cardiache croniche:</strong> NYHA III-IV, FE &lt; 30%, insufficienza renale associata
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="demenza">
                            <label class="checkbox-label" for="demenza">
                                <strong>Demenza:</strong> GDS ≥ 6c, progressione del declino funzionale/nutrizionale/cognitivo
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="fragilita">
                            <label class="checkbox-label" for="fragilita">
                                <strong>Fragilità:</strong> Indice di fragilità ≥ 0,5, CGA suggestiva di fragilità avanzata
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="ictus">
                            <label class="checkbox-label" for="ictus">
                                <strong>Patologie neurovascolari (ictus):</strong> Stato vegetativo &lt; 3 mesi o complicanze mediche > 3 mesi
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="neurologiche">
                            <label class="checkbox-label" for="neurologiche">
                                <strong>Patologie neurologiche:</strong> SM/SLA/Parkinson con declino progressivo, disfagia, insufficienza respiratoria
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="epatiche">
                            <label class="checkbox-label" for="epatiche">
                                <strong>Patologie epatiche croniche:</strong> Cirrosi Child C, MELD-Na > 30, epatocarcinoma C-D
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="renali">
                            <label class="checkbox-label" for="renali">
                                <strong>Patologia renale cronica:</strong> FG &lt; 15 ml/min, sospensione dialisi, fallimento trapianto
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="results-section" id="necpal31-results-section">
                <div class="results-title">
                    <i class="fas fa-chart-pie me-2"></i>
                    Risultati Valutazione NECPAL 3.1
                </div>
                <div class="results-grid">
                    <div class="result-card">
                        <div class="result-number" id="necpal31-total-items">0</div>
                        <div class="result-label">Items Selezionati</div>
                    </div>
                    <div class="result-card">
                        <div class="result-number" id="necpal31-status">-</div>
                        <div class="result-label">Stato NECPAL</div>
                    </div>
                    <div class="result-card">
                        <div class="result-number" id="necpal31-recommendation">-</div>
                        <div class="result-label">Raccomandazione</div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="btn-action btn-outline-necpal" onclick="printNecpal31()">
                        <i class="fas fa-print me-2"></i>Stampa Report
                    </button>
                    <button class="btn-action btn-outline-necpal" onclick="resetNecpal31()">
                        <i class="fas fa-redo me-2"></i>Reset
                    </button>
                </div>
            </div>
        </div>

        <div id="necpal31-visualize-section" class="content-section">
            <div class="patient-info-card">
                <h3 class="patient-info-title">
                    <i class="fas fa-file-medical me-2"></i>
                    NECPAL 3.1 - Schema di Valutazione
                </h3>
                <p class="text-muted mb-4">
                    Schema completo per l'identificazione precoce di pazienti con bisogni di cure palliative secondo i criteri NECPAL 3.1 (CCOMS-ICO © 2017).
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
                            Richiesta o Bisogni
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Scelta/Richiesta: il paziente, i familiari o il team curante hanno richiesto un approccio palliativo</li>
                                <li>Bisogni identificati dai sanitari del team curante</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-stethoscope me-2"></i>
                            Indicatori Clinici Generali
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Declino nutrizionale: Perdita di peso > 10%</li>
                                <li>Declino funzionale: Karnofsky/Barthel riduzione > 30%</li>
                                <li>Declino cognitivo: Perdita ≥ 5 punti MMSE</li>
                                <li>Dipendenza grave: Karnofsky &lt; 50</li>
                                <li>Sindromi geriatriche ≥ 2</li>
                                <li>Sintomi persistenti: ESAS ≥ 2 sintomi</li>
                                <li>Aspetti psico-sociali: DME > 9</li>
                                <li>Vulnerabilità sociale grave</li>
                                <li>Multi-morbidità > 2 malattie croniche</li>
                                <li>Utilizzo risorse: > 2 ricoveri urgenti</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-ribbon me-2"></i>
                            Cancro
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Metastatico o avanzato a livello locoregionale</li>
                                <li>Cancro in progressione (tumori solidi)</li>
                                <li>Sintomi persistenti, non controllati o refrattari</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-lungs me-2"></i>
                            Patologie Polmonari
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Dispnea per minimi sforzi</li>
                                <li>Criteri spirometrici: VEMS &lt; 30%</li>
                                <li>O₂ terapia domiciliare</li>
                                <li>Terapia corticosteroidea continuativa</li>
                                <li>Insufficienza cardiaca associata</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-heart me-2"></i>
                            Patologie Cardiache
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Insufficienza cardiaca NYHA III-IV</li>
                                <li>Ecocardiografia: FE &lt; 30%</li>
                                <li>Insufficienza renale associata (FG &lt; 30)</li>
                                <li>Iponatriemia persistente</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-brain me-2"></i>
                            Demenza
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>GDS ≥ 6c</li>
                                <li>Progressione del declino funzionale</li>
                                <li>Progressione del declino nutrizionale</li>
                                <li>Progressione del declino cognitivo</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-walking me-2"></i>
                            Fragilità
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Indice di fragilità ≥ 0,5</li>
                                <li>CGA suggestiva di fragilità avanzata</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-head-side-virus me-2"></i>
                            Patologie Neurologiche
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Declino progressivo funzioni fisiche/cognitive</li>
                                <li>Sintomi complessi o refrattari</li>
                                <li>Disfagia persistente</li>
                                <li>Difficoltà di comunicazione</li>
                                <li>Polmoniti ab ingestis ricorrenti</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-procedures me-2"></i>
                            Patologie Epatiche
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Cirrosi avanzata stadio Child C</li>
                                <li>MELD-Na score > 30</li>
                                <li>Epatocarcinoma stadio C o D</li>
                            </ul>
                        </div>
                    </div>

                    <div class="criteria-card">
                        <div class="criteria-header">
                            <i class="fas fa-kidneys me-2"></i>
                            Patologie Renali
                        </div>
                        <div class="criteria-content">
                            <ul class="criteria-list">
                                <li>Insufficienza renale grave (FG &lt; 15 ml/min)</li>
                                <li>Non candidabili a trapianto/dialisi</li>
                                <li>Sospensione della dialisi</li>
                                <li>Fallimento del trapianto</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="action-buttons mt-4">
                    <button class="btn-action btn-primary-necpal" onclick="printNecpal31Template()">
                        <i class="fas fa-print me-2"></i>Stampa Template
                    </button>
                </div>
            </div>
        </div>

        <div id="necpal31-glossary-section" class="content-section">
            <div class="patient-info-card">
                <h3 class="patient-info-title">
                    <i class="fas fa-book me-2"></i>
                    Glossario Clinico NECPAL 3.1
                </h3>
                <p class="text-muted mb-4">
                    Definizioni e criteri dettagliati per la corretta applicazione dello strumento NECPAL 3.1.
                </p>

                <div class="accordion" id="glossaryAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingDS">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDS">
                                <i class="fas fa-question-circle me-2"></i>Domanda Sorprendente
                            </button>
                        </h2>
                        <div id="collapseDS" class="accordion-collapse collapse show" data-bs-parent="#glossaryAccordion">
                            <div class="accordion-body">
                                <p><strong>Definizione:</strong> "Saresti sorpreso se questo paziente morisse entro 1 anno?"</p>
                                <p>La domanda sorprendente costituisce l'elemento preliminare e discriminante per l'identificazione dei pazienti con bisogni di cure palliative. È basata sulla percezione clinica del medico e sulla conoscenza del paziente.</p>
                                <div class="alert alert-info">
                                    <strong>Importante:</strong> Se la risposta è "SÌ", il NECPAL è considerato negativo e non è necessario procedere con la valutazione.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingScales">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseScales">
                                <i class="fas fa-chart-line me-2"></i>Scale Funzionali
                            </button>
                        </h2>
                        <div id="collapseScales" class="accordion-collapse collapse" data-bs-parent="#glossaryAccordion">
                            <div class="accordion-body">
                                <h6><strong>Australian Karnofsky Performance Status (AKPS)</strong></h6>
                                <p>Scala da 0 a 100 che valuta le capacità funzionali del paziente. Un punteggio &lt; 50 indica dipendenza grave.</p>
                                <h6><strong>Indice di Barthel</strong></h6>
                                <p>Scala che valuta l'autonomia nelle attività della vita quotidiana. Una riduzione > 30% o punteggio &lt; 20 indica compromissione significativa.</p>
                                <h6><strong>Activities of Daily Living (ADL)</strong></h6>
                                <p>Valuta 6 funzioni base: alimentazione, controllo sfinterico, trasferimenti, uso del WC, vestirsi, lavarsi.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingCognitive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCognitive">
                                <i class="fas fa-brain me-2"></i>Valutazione Cognitiva
                            </button>
                        </h2>
                        <div id="collapseCognitive" class="accordion-collapse collapse" data-bs-parent="#glossaryAccordion">
                            <div class="accordion-body">
                                <h6><strong>Mini Mental State Examination (MMSE)</strong></h6>
                                <p>Test neuropsicologico per valutare il deterioramento cognitivo. Una perdita ≥ 5 punti indica declino significativo.</p>
                                <h6><strong>Global Deterioration Scale (GDS)</strong></h6>
                                <p>Scala da 1 a 7 per valutare la progressione della demenza. GDS ≥ 6c indica demenza severa con compromissione funzionale importante.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSymptoms">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSymptoms">
                                <i class="fas fa-thermometer-half me-2"></i>Valutazione Sintomi
                            </button>
                        </h2>
                        <div id="collapseSymptoms" class="accordion-collapse collapse" data-bs-parent="#glossaryAccordion">
                            <div class="accordion-body">
                                <h6><strong>Edmonton Symptom Assessment System (ESAS)</strong></h6>
                                <p>Sistema di valutazione di 9 sintomi comuni in cure palliative su scala 0-10. La presenza di ≥ 2 sintomi persistenti o refrattari è significativa.</p>
                                <h6><strong>Distress Management Evaluation (DME)</strong></h6>
                                <p>Scala per valutare il distress psicologico. Un punteggio > 9 indica necessità di supporto psicologico specialistico.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSpecific">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSpecific">
                                <i class="fas fa-disease me-2"></i>Criteri Specifici per Patologia
                            </button>
                        </h2>
                        <div id="collapseSpecific" class="accordion-collapse collapse" data-bs-parent="#glossaryAccordion">
                            <div class="accordion-body">
                                <h6><strong>NYHA (New York Heart Association)</strong></h6>
                                <p>Classificazione funzionale dell'insufficienza cardiaca. Stadio III-IV indica limitazioni severe nell'attività fisica.</p>
                                <h6><strong>VEMS (Volume Espiratorio Massimo al 1° secondo)</strong></h6>
                                <p>Parametro spirometrico. VEMS &lt; 30% indica ostruzione grave delle vie aeree.</p>
                                <h6><strong>Child-Pugh Score</strong></h6>
                                <p>Classificazione della cirrosi epatica. Stadio C indica prognosi severa con sopravvivenza mediana 1-3 anni.</p>
                                <h6><strong>MELD-Na Score</strong></h6>
                                <p>Score prognostico per pazienti con malattia epatica. Score > 30 indica prognosi severa a breve termine.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let necpal31Data = {
            surprise: null,
            items: [],
            patientInfo: {},
            richiestaBisogni: 0,
            indicatoriGenerali: 0,
            indicatoriSpecifici: 0
        };

        (function initNecpal31() {
            function init() {
                const root = document.getElementById('necpal31-home');
                if (!root) return;
                const evalDate = root.querySelector('#necpal31-eval-date');
                if (evalDate && !evalDate.value) {
                    evalDate.value = new Date().toISOString().split('T')[0];
                }
                root.querySelectorAll('input[name="surprise"]').forEach(radio => {
                    radio.addEventListener('change', handleSurpriseQuestion);
                });
                root.querySelectorAll('#necpal31-home input[type="checkbox"]').forEach(cb => {
                    cb.addEventListener('change', function () {
                        const itemDiv = this.closest('.checkbox-item');
                        const id = this.id;
                        if (this.checked) {
                            itemDiv.classList.add('selected');
                            if (!necpal31Data.items.includes(id)) necpal31Data.items.push(id);
                        } else {
                            itemDiv.classList.remove('selected');
                            necpal31Data.items = necpal31Data.items.filter(x => x !== id);
                        }
                        updateResults();
                    });
                });
            }
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }
        })();

        function switchNecpal31Mode(mode) {
            const container = document.getElementById('necpal31-home');
            if (!container) return;
            container.querySelectorAll('.mode-btn').forEach(btn => btn.classList.remove('active'));
            const targetBtn = container.querySelector(`.mode-btn[data-mode="${mode}"]`);
            if (targetBtn) targetBtn.classList.add('active');
            container.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
            const targetSection = container.querySelector(`#necpal31-${mode}-section`);
            if (targetSection) targetSection.classList.add('active');
        }

        function handleSurpriseQuestion() {
            const surpriseRadio = document.querySelector('#necpal31-home input[name="surprise"]:checked');
            if (!surpriseRadio) return;
            const surprise = surpriseRadio.value;
            necpal31Data.surprise = surprise;
            const negativeDiv = document.getElementById('necpal31-negative');
            const sectionsDiv = document.getElementById('necpal31-sections');
            const resultsDiv = document.getElementById('necpal31-results-section');
            if (surprise === 'yes') {
                if (negativeDiv) negativeDiv.style.display = 'block';
                if (sectionsDiv) sectionsDiv.style.display = 'none';
                if (resultsDiv) resultsDiv.style.display = 'none';
                hideDetailedBreakdown();
            } else {
                if (negativeDiv) negativeDiv.style.display = 'none';
                if (sectionsDiv) sectionsDiv.style.display = 'block';
                updateResults();
            }
        }

        function updateResults() {
            const richiestaBisogni = necpal31Data.items.filter(item => ['richiesta-scelta','bisogni-team'].includes(item)).length;
            const indicatoriGenerali = necpal31Data.items.filter(item => ['declino-nutrizionale','declino-funzionale-karnofsky','declino-funzionale-adl','declino-cognitivo','dipendenza-grave','sindromi-geriatriche','sintomi-persistenti','aspetti-psicosociali','vulnerabilita-sociale','multimorbidita','utilizzo-risorse'].includes(item)).length;
            const indicatoriSpecifici = necpal31Data.items.filter(item => ['cancro','bpco','cardiache','demenza','fragilita','ictus','neurologiche','epatiche','renali'].includes(item)).length;

            necpal31Data.richiestaBisogni = richiestaBisogni;
            necpal31Data.indicatoriGenerali = indicatoriGenerali;
            necpal31Data.indicatoriSpecifici = indicatoriSpecifici;

            const totalItems = necpal31Data.items.length;
            const resultsSection = document.getElementById('necpal31-results-section');
            if (necpal31Data.surprise === 'no') {
                if (resultsSection) resultsSection.style.display = 'block';
                const totalEl = document.getElementById('necpal31-total-items');
                const statusEl = document.getElementById('necpal31-status');
                const recEl = document.getElementById('necpal31-recommendation');
                if (totalEl) totalEl.textContent = totalItems;
                if (totalItems >= 1) {
                    if (statusEl) statusEl.textContent = 'POSITIVO';
                    const recommendation = determineRecommendation31(richiestaBisogni, indicatoriGenerali, indicatoriSpecifici);
                    if (recEl) recEl.textContent = recommendation;
                    showDetailedBreakdown(richiestaBisogni, indicatoriGenerali, indicatoriSpecifici);
                } else {
                    if (statusEl) statusEl.textContent = 'NEGATIVO';
                    if (recEl) recEl.textContent = 'RIVALUTARE';
                    hideDetailedBreakdown();
                }
            } else {
                if (resultsSection) resultsSection.style.display = 'none';
                hideDetailedBreakdown();
            }
        }

        function determineRecommendation31(richiesta, generali, specifici) {
            if (specifici >= 2 || (specifici >= 1 && generali >= 3)) {
                return 'CURE SPECIALISTICHE';
            } else if (specifici >= 1 || generali >= 2 || richiesta >= 1) {
                return 'CURE PALLIATIVE';
            } else if (generali >= 1) {
                return 'MONITORAGGIO';
            } else {
                return 'RIVALUTARE';
            }
        }

        function showDetailedBreakdown(richiesta, generali, specifici) {
            let breakdownDiv = document.getElementById('detailed-breakdown');
            if (!breakdownDiv) {
                breakdownDiv = document.createElement('div');
                breakdownDiv.id = 'detailed-breakdown';
                breakdownDiv.className = 'mt-3 p-3 bg-light rounded';
                const resultsContainer = document.querySelector('#necpal31-results-section .results-grid');
                if (resultsContainer && resultsContainer.parentNode) {
                    resultsContainer.parentNode.appendChild(breakdownDiv);
                }
            }
            breakdownDiv.innerHTML = `
                <h6 class="text-dark mb-3"><i class="fas fa-chart-bar me-2" style="color: var(--primary-green);"></i>Analisi Dettagliata NECPAL 3.1</h6>
                <div class="row text-dark">
                    <div class="col-md-4">
                        <div class="text-center p-3 border rounded" style="border-color: var(--primary-green) !important; background: rgba(40,167,69,0.1);">
                            <div class="h4 mb-1" style="color: var(--primary-green); font-weight:700;">${richiesta}</div>
                            <small style="font-weight:600;">Richiesta/Bisogni</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-3 border rounded" style="border-color: var(--primary-green) !important; background: rgba(40,167,69,0.1);">
                            <div class="h4 mb-1" style="color: var(--primary-green); font-weight:700;">${generali}</div>
                            <small style="font-weight:600;">Indicatori Generali</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-3 border rounded" style="border-color: var(--primary-green) !important; background: rgba(40,167,69,0.1);">
                            <div class="h4 mb-1" style="color: var(--primary-green); font-weight:700;">${specifici}</div>
                            <small style="font-weight:600;">Indicatori Specifici</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 p-2" style="background: rgba(40,167,69,0.05); border-radius:8px;">
                    <small class="text-muted"><strong style="color: var(--primary-green);">Criteri NECPAL 3.1:</strong> Positivo se ≥1 parametro totale. Raccomandazioni basate su distribuzione e gravità degli indicatori.</small>
                </div>`;
        }

        function hideDetailedBreakdown() {
            const breakdownDiv = document.getElementById('detailed-breakdown');
            if (breakdownDiv) breakdownDiv.remove();
        }

        function printNecpal31() {
            const name = document.getElementById('necpal31-patient-name')?.value || '';
            const birth = document.getElementById('necpal31-birth-date')?.value || '';
            const evalDate = document.getElementById('necpal31-eval-date')?.value || '';
            const status = document.getElementById('necpal31-status')?.textContent || '';
            const recommendation = document.getElementById('necpal31-recommendation')?.textContent || '';
            const itemsHtml = necpal31Data.items.map(id => {
                const lbl = document.querySelector(`label[for="${id}"]`);
                const text = lbl ? lbl.textContent.trim() : id;
                return `<li>${text}</li>`;
            }).join('');
            const total = necpal31Data.items.length;
            const win = window.open('', '_blank');
            win.document.write(`<!DOCTYPE html><html lang="it"><head><meta charset="UTF-8"><title>NECPAL 3.1 - Report</title><style>body{font-family:Arial,sans-serif;margin:20px;line-height:1.4;color:#333;} .header{text-align:center;margin-bottom:30px;border-bottom:2px solid #28a745;padding-bottom:20px;} .header h1{color:#28a745;margin-bottom:10px;} .patient-info{border:2px solid #28a745;padding:20px;margin-bottom:25px;border-radius:8px;background:#f8f9fa;} .result-section{margin-top:30px;padding:20px;border:2px solid #28a745;border-radius:8px;background:#f8f9fa;} .form-row{display:flex;justify-content:space-between;margin-bottom:15px;} .form-field{flex:1;margin-right:20px;} .form-field:last-child{margin-right:0;} ul{margin-top:10px;padding-left:20px;} .footer{margin-top:40px;padding-top:20px;border-top:1px solid #ddd;font-size:12px;color:#666;text-align:center;}</style></head><body><div class="header"><h1>NECPAL 3.1</h1><p><strong>Scheda di Valutazione</strong></p><p>www.medbox.it - Strumenti per le Cure Palliative</p></div><div class="patient-info"><div class="form-row"><div class="form-field"><strong>Nome:</strong> ${name}</div><div class="form-field"><strong>Data di nascita:</strong> ${birth}</div></div><div class="form-row"><div class="form-field"><strong>Data valutazione:</strong> ${evalDate}</div></div></div><div class="result-section"><h3>Risultati</h3><div class="form-row"><div class="form-field"><strong>Totale items:</strong> ${total}</div><div class="form-field"><strong>Stato:</strong> ${status}</div></div><div class="form-row"><div class="form-field"><strong>Raccomandazione:</strong> ${recommendation}</div></div><div><strong>Items selezionati:</strong><ul>${itemsHtml}</ul></div></div><div class="footer"><p>${new Date().toLocaleDateString('it-IT')}</p></div></body></html>`);
            win.document.close();
            win.focus();
            win.onload = function(){ win.print(); };
        }

        function printNecpal31Template() {
            const content = document.getElementById('necpal31-visualize-section').innerHTML;
            const win = window.open('', '_blank');
            win.document.write(`<!DOCTYPE html><html lang="it"><head><meta charset="UTF-8"><title>NECPAL 3.1 - Template</title><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"><style>body{padding:20px;} i,[class^="fa"]{display:none !important;}</style></head><body>${content}</body></html>`);
            win.document.close();
            win.focus();
            win.onload = function(){ win.print(); };
        }

        function resetNecpal31() {
            if (!confirm('Sei sicuro di voler resettare la valutazione?')) return;
            necpal31Data = {
                surprise: null,
                items: [],
                patientInfo: {},
                richiestaBisogni: 0,
                indicatoriGenerali: 0,
                indicatoriSpecifici: 0
            };
            const nameInput = document.getElementById('necpal31-patient-name');
            const birthInput = document.getElementById('necpal31-birth-date');
            const evalInput = document.getElementById('necpal31-eval-date');
            if (nameInput) nameInput.value = '';
            if (birthInput) birthInput.value = '';
            if (evalInput) evalInput.value = new Date().toISOString().split('T')[0];
            document.querySelectorAll('#necpal31-home input[name="surprise"]').forEach(radio => { radio.checked = false; });
            document.querySelectorAll('#necpal31-home .checkbox-item').forEach(item => {
                item.classList.remove('selected');
                const cb = item.querySelector('input[type="checkbox"]');
                if (cb) cb.checked = false;
            });
            const negativeDiv = document.getElementById('necpal31-negative');
            const sectionsDiv = document.getElementById('necpal31-sections');
            const resultsDiv = document.getElementById('necpal31-results-section');
            if (negativeDiv) negativeDiv.style.display = 'none';
            if (sectionsDiv) sectionsDiv.style.display = 'none';
            if (resultsDiv) resultsDiv.style.display = 'none';
            hideDetailedBreakdown();
        }

        window.switchNecpal31Mode = switchNecpal31Mode;
        window.printNecpal31 = printNecpal31;
        window.printNecpal31Template = printNecpal31Template;
        window.resetNecpal31 = resetNecpal31;
    </script>
    <style>
        @keyframes fadeIn { from { opacity:0; transform:translateY(10px); } to { opacity:1; transform:translateY(0); } }
        #detailed-breakdown { animation: fadeIn 0.3s ease; border:2px solid var(--primary-green) !important; background:white; box-shadow:0 4px 16px rgba(40,167,69,0.1) !important; border-radius:12px; }
        #detailed-breakdown .border { border-color: var(--primary-green) !important; }
        #detailed-breakdown .h4 { color: var(--primary-green) !important; font-weight:700 !important; }
    </style>
    <!-- Fix JavaScript -->
<script src="necpal31-fix.js"></script>
</section>
