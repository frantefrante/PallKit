<?php
// Scheda SPICT - versione con grafica dettagliata
?>
<section id="spict-home" class="p-4" style="display:none;">
    <style>
        #spict-home * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        #spict-home {
            font-family: Arial, sans-serif;
            line-height: 1.4;
            background-color: #f5f5f5;
            padding: 20px;
        }
        #spict-home .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        #spict-home .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #2c5aa0;
            padding-bottom: 20px;
        }
        #spict-home .header h1 {
            color: #2c5aa0;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        #spict-home .header .subtitle {
            color: #666;
            font-size: 16px;
            margin-bottom: 10px;
        }
        #spict-home .header .date {
            color: #888;
            font-size: 14px;
        }
        #spict-home .intro {
            background: #e8f4f8;
            padding: 20px;
            border-left: 4px solid #2c5aa0;
            margin-bottom: 30px;
        }
        #spict-home .intro p {
            margin-bottom: 10px;
            font-weight: 500;
        }
        #spict-home .section {
            margin-bottom: 30px;
        }
        #spict-home .section-title {
            background: #2c5aa0;
            color: white;
            padding: 12px 20px;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
        }
        #spict-home .general-indicators {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        #spict-home .indicator-item {
            display: flex;
            align-items: flex-start;
            padding: 12px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: all 0.2s ease;
        }
        #spict-home .indicator-item:hover {
            background: #f0f8ff;
        }
        #spict-home .indicator-item.selected {
            background: #e3f2fd;
            border-color: #2c5aa0;
            box-shadow: 0 2px 4px rgba(44,90,160,0.2);
        }
        #spict-home .indicator-item input[type="checkbox"] {
            margin-right: 12px;
            margin-top: 2px;
            transform: scale(1.2);
        }
        #spict-home .indicator-text {
            flex: 1;
            font-size: 14px;
            line-height: 1.4;
        }
        #spict-home .pathology-section {
            margin-bottom: 25px;
        }
        #spict-home .pathology-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        #spict-home .pathology-card {
            border: 2px solid #2c5aa0;
            border-radius: 6px;
            overflow: hidden;
        }
        #spict-home .pathology-header {
            background: #2c5aa0;
            color: white;
            padding: 12px 15px;
            font-weight: bold;
            font-size: 15px;
        }
        #spict-home .pathology-content {
            padding: 15px;
        }
        #spict-home .pathology-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
            padding: 8px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }
        #spict-home .pathology-item:last-child {
            margin-bottom: 0;
        }
        #spict-home .pathology-item:hover {
            background: #f0f8ff;
        }
        #spict-home .pathology-item.selected {
            background: #e3f2fd;
            border: 1px solid #2c5aa0;
            box-shadow: 0 2px 4px rgba(44,90,160,0.2);
        }
        #spict-home .pathology-item input[type="checkbox"] {
            margin-right: 10px;
            margin-top: 2px;
            transform: scale(1.1);
        }
        #spict-home .pathology-text {
            flex: 1;
            font-size: 13px;
            line-height: 1.3;
        }
        #spict-home .action-section {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 20px;
            border-radius: 6px;
            margin-top: 30px;
        }
        #spict-home .action-section h3 {
            color: #856404;
            margin-bottom: 15px;
            font-size: 16px;
        }
        #spict-home .action-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        #spict-home .action-item {
            display: flex;
            align-items: flex-start;
            padding: 10px;
            background: white;
            border-radius: 4px;
        }
        #spict-home .action-item input[type="checkbox"] {
            margin-right: 10px;
            margin-top: 2px;
            transform: scale(1.1);
        }
        #spict-home .summary {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 6px;
            border: 1px solid #dee2e6;
        }
        #spict-home .summary h3 {
            color: #2c5aa0;
            margin-bottom: 15px;
        }
        #spict-home .summary-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        #spict-home .stat-box {
            background: white;
            padding: 15px;
            border-radius: 4px;
            text-align: center;
            border: 1px solid #ddd;
        }
        #spict-home .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #2c5aa0;
        }
        #spict-home .stat-label {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
        #spict-home .actions-button {
            text-align: center;
            margin-top: 30px;
        }
        #spict-home .btn {
            background: #2c5aa0;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        #spict-home .btn:hover {
            background: #1e3d6f;
        }
        @media (max-width: 768px) {
            #spict-home .container {
                padding: 20px;
            }
            #spict-home .pathology-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Stili per modalità visualizza */
        .spict-mode-selector {
            background: white;
            border-radius: 12px;
            padding: 0.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            gap: 0.5rem;
        }
        .spict-mode-btn {
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
        .spict-mode-btn.active {
            background: linear-gradient(135deg, #2c5aa0, #1e3d6f);
            color: white;
            box-shadow: 0 2px 8px rgba(44,90,160,0.3);
        }
        .spict-mode-btn:hover:not(.active) {
            background: rgba(44,90,160,0.1);
            color: #2c5aa0;
        }
        .spict-content-section { display: none; }
        .spict-content-section.active { display: block; }
    </style>

    <div class="mb-3">
        <button class="btn btn-outline-success me-2" onclick="navigateToSection('identificazione-home')">
            <i class="fas fa-arrow-left me-2"></i>Torna a Identificazione
        </button>
        <button class="btn btn-outline-primary" onclick="navigateToSection('strumenti-valutazione-home')">
            <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
        </button>
    </div>

    <div class="spict-mode-selector">
        <a href="#" class="spict-mode-btn active" data-mode="compile" onclick="switchSpictMode('compile')"><i class="fas fa-edit me-2"></i>Compila</a>
        <a href="#" class="spict-mode-btn" data-mode="visualize" onclick="switchSpictMode('visualize')"><i class="fas fa-eye me-2"></i>Visualizza</a>
    </div>

    <div id="spict-compile-section" class="spict-content-section active">
    <div class="container">
        <div class="header">
            <h1>Supportive and Palliative Care Indicators Tool (SPICT™)</h1>
            <div class="subtitle">SPICT™, Maggio 2019</div>
            <div class="date">Please register on the SPICT website (www.spict.org.uk) for information and updates.</div>
        </div>

        <div class="intro">
            <p>Lo SPICT™ è utilizzato per aiutare a identificare pazienti le cui condizioni di salute sono in fase di peggioramento. Valutate i loro bisogni di cure palliative e di supporto. Pianificate il percorso di assistenza e cura.</p>
        </div>

        <div class="section">
            <div class="section-title">Ricercate la presenza di indicatori generali di grave compromissione o di peggioramento delle condizioni di salute.</div>
            <div class="general-indicators">
                <div class="indicator-item">
                    <input type="checkbox" id="gen1">
                    <div class="indicator-text">
                        <label for="gen1">Ricovero(i) ospedaliero(i) non programmato(i)</label>
                    </div>
                </div>
                <div class="indicator-item">
                    <input type="checkbox" id="gen2">
                    <div class="indicator-text">
                        <label for="gen2">Performance Status basso oppure in peggioramento, con limitata reversibilità (es. la persona rimane a letto o in poltrona per più di metà giornata).</label>
                    </div>
                </div>
                <div class="indicator-item">
                    <input type="checkbox" id="gen3">
                    <div class="indicator-text">
                        <label for="gen3">Dipendenza dall'assistenza degli altri a causa di problemi fisici e/o cognitivi in progressivo peggioramento.</label>
                    </div>
                </div>
                <div class="indicator-item">
                    <input type="checkbox" id="gen4">
                    <div class="indicator-text">
                        <label for="gen4">La persona che assiste il paziente necessita di maggiore aiuto e supporto.</label>
                    </div>
                </div>
                <div class="indicator-item">
                    <input type="checkbox" id="gen5">
                    <div class="indicator-text">
                        <label for="gen5">Progressiva perdita di peso; persistente sottopeso; massa muscolare ridotta.</label>
                    </div>
                </div>
                <div class="indicator-item">
                    <input type="checkbox" id="gen6">
                    <div class="indicator-text">
                        <label for="gen6">Sintomi persistenti nonostante il trattamento ottimale della/e patologia/e di base.</label>
                    </div>
                </div>
                <div class="indicator-item">
                    <input type="checkbox" id="gen7">
                    <div class="indicator-text">
                        <label for="gen7">La persona (o la sua famiglia) chiede di ricevere cure palliative; sceglie di ridurre, sospendere o non iniziare nuovi trattamenti; oppure desidera concentrarsi sulla qualità di vita.</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Ricercate la presenza di indicatori clinici di una o più patologie a prognosi infausta.</div>
            
            <div class="pathology-section">
                <div class="pathology-grid">
                    <div class="pathology-card">
                        <div class="pathology-header">Cancro</div>
                        <div class="pathology-content">
                            <div class="pathology-item">
                                <input type="checkbox" id="canc1">
                                <div class="pathology-text">
                                    <label for="canc1">Deterioramento delle capacità funzionali dovuto alla progressione del cancro.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="canc2">
                                <div class="pathology-text">
                                    <label for="canc2">Le condizioni generali non consentono di iniziare o continuare trattamenti oncologici specifici oppure la terapia in atto è finalizzata unicamente al controllo dei sintomi.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pathology-card">
                        <div class="pathology-header">Demenza/Fragilità</div>
                        <div class="pathology-content">
                            <div class="pathology-item">
                                <input type="checkbox" id="dem1">
                                <div class="pathology-text">
                                    <label for="dem1">Incapacità di vestirsi, camminare o mangiare senza aiuto.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="dem2">
                                <div class="pathology-text">
                                    <label for="dem2">La persona mangia e beve meno; ha difficoltà nella deglutizione.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="dem3">
                                <div class="pathology-text">
                                    <label for="dem3">Incontinenza urinaria e fecale.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="dem4">
                                <div class="pathology-text">
                                    <label for="dem4">Non in grado di comunicare verbalmente; interazione sociale scarsa.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="dem5">
                                <div class="pathology-text">
                                    <label for="dem5">Cadute frequenti; frattura del femore.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="dem6">
                                <div class="pathology-text">
                                    <label for="dem6">Episodi febbrili ricorrenti o infezioni; polmonite da aspirazione.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pathology-card">
                        <div class="pathology-header">Patologia cardiaca/vascolare</div>
                        <div class="pathology-content">
                            <div class="pathology-item">
                                <input type="checkbox" id="card1">
                                <div class="pathology-text">
                                    <label for="card1">Scompenso cardiaco o malattia coronarica estesa, non trattabile, con affanno o dolore toracico a riposo o per sforzi lievi.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="card2">
                                <div class="pathology-text">
                                    <label for="card2">Malattia vascolare periferica severa ed inoperabile.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pathology-card">
                        <div class="pathology-header">Patologia respiratoria</div>
                        <div class="pathology-content">
                            <div class="pathology-item">
                                <input type="checkbox" id="resp1">
                                <div class="pathology-text">
                                    <label for="resp1">Patologia polmonare cronica severa con affanno a riposo o per sforzi lievi tra gli episodi di riacutizzazione.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="resp2">
                                <div class="pathology-text">
                                    <label for="resp2">Ipossia persistente, con necessità di ossigenoterapia a lungo termine.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="resp3">
                                <div class="pathology-text">
                                    <label for="resp3">Pregressa ventilazione meccanica (invasiva o non) per insufficienza respiratoria, oppure ventilazione controindicata.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pathology-card">
                        <div class="pathology-header">Patologia renale</div>
                        <div class="pathology-content">
                            <div class="pathology-item">
                                <input type="checkbox" id="ren1">
                                <div class="pathology-text">
                                    <label for="ren1">Insufficienza renale cronica stadio 4 o 5 (eGFR &lt;30ml/min) con deterioramento delle condizioni cliniche.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="ren2">
                                <div class="pathology-text">
                                    <label for="ren2">Insufficienza renale che complica altre patologie a prognosi infausta oppure complica la somministrazione di altri trattamenti.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="ren3">
                                <div class="pathology-text">
                                    <label for="ren3">La dialisi viene sospesa oppure non viene iniziata.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pathology-card">
                        <div class="pathology-header">Patologia epatica</div>
                        <div class="pathology-content">
                            <div class="pathology-item">
                                <input type="checkbox" id="ep1">
                                <div class="pathology-text">
                                    <label for="ep1">Cirrosi con una o più delle seguenti complicanze nell'ultimo anno:<br>
                                    • ascite resistente ai diuretici<br>
                                    • encefalopatia epatica<br>
                                    • sindrome epatorenale<br>
                                    • peritonite batterica<br>
                                    • sanguinamento ricorrente da varici.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="ep2">
                                <div class="pathology-text">
                                    <label for="ep2">Il trapianto di fegato non è possibile.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pathology-card">
                        <div class="pathology-header">Patologia neurologica</div>
                        <div class="pathology-content">
                            <div class="pathology-item">
                                <input type="checkbox" id="neur1">
                                <div class="pathology-text">
                                    <label for="neur1">Progressivo deterioramento delle funzioni fisiche e/o cognitive, nonostante la terapia ottimale.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="neur2">
                                <div class="pathology-text">
                                    <label for="neur2">Disturbi della parola con deterioramento progressivo della comunicazione e/o della deglutizione.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="neur3">
                                <div class="pathology-text">
                                    <label for="neur3">Polmonite da aspirazione ricorrente; affanno o insufficienza respiratoria.</label>
                                </div>
                            </div>
                            <div class="pathology-item">
                                <input type="checkbox" id="neur4">
                                <div class="pathology-text">
                                    <label for="neur4">Paralisi persistente a seguito di accidente cerebrovascolare, con significativa perdita funzionale e disabilità permanente.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pathology-card">
                        <div class="pathology-header">Altre patologie</div>
                        <div class="pathology-content">
                            <div class="pathology-item">
                                <input type="checkbox" id="alt1">
                                <div class="pathology-text">
                                    <label for="alt1">Peggioramento e rischio di morte a causa di altre patologie o complicanze irreversibili; qualsiasi trattamento avrà scarso beneficio.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="action-section">
            <h3>Rivalutate l'assistenza e le cure in atto. Pianificate il percorso di assistenza e cura.</h3>
            <div class="action-list">
                <div class="action-item">
                    <input type="checkbox" id="act1">
                    <div class="indicator-text">
                        <label for="act1">Rivalutate i trattamenti in atto (farmacologici e non) affinché il paziente riceva cure ottimali; minimizzate la polifarmacoterapia.</label>
                    </div>
                </div>
                <div class="action-item">
                    <input type="checkbox" id="act2">
                    <div class="indicator-text">
                        <label for="act2">Considerate la possibilità di richiedere una valutazione specialistica se i sintomi o gli altri problemi sono complessi e difficili da gestire.</label>
                    </div>
                </div>
                <div class="action-item">
                    <input type="checkbox" id="act3">
                    <div class="indicator-text">
                        <label for="act3">Condividete con il paziente e la sua famiglia il percorso di assistenza e cura, attuale e futuro. Supportate i familiari che assistono il paziente.</label>
                    </div>
                </div>
                <div class="action-item">
                    <input type="checkbox" id="act4">
                    <div class="indicator-text">
                        <label for="act4">Pianificate precocemente il percorso di assistenza e cura, se prevedete la perdita della capacità decisionale.</label>
                    </div>
                </div>
                <div class="action-item">
                    <input type="checkbox" id="act5">
                    <div class="indicator-text">
                        <label for="act5">Registrate in cartella clinica, comunicate e coordinate il percorso di assistenza e cura.</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="summary">
            <h3>Riepilogo Valutazione</h3>
            <p>Selezionare i checkbox corrispondenti agli indicatori presenti nel paziente. Il numero di indicatori selezionati può aiutare nella valutazione del bisogno di cure palliative.</p>
            <div class="summary-stats">
                <div class="stat-box">
                    <div class="stat-number" id="general-count">0</div>
                    <div class="stat-label">Indicatori Generali</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number" id="pathology-count">0</div>
                    <div class="stat-label">Indicatori Patologie</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number" id="action-count">0</div>
                    <div class="stat-label">Azioni Pianificate</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number" id="total-count">0</div>
                    <div class="stat-label">Totale Selezionati</div>
                </div>
            </div>
        </div>

        <div class="actions-button">
            <button class="btn" onclick="printResults()">Stampa/Salva Risultati</button>
        </div>
    </div>
    </div>

    <div id="spict-visualize-section" class="spict-content-section">
        <div class="spict-template-card">
            <h3 class="spict-template-title">
                <i class="fas fa-file-medical me-2"></i>
                SPICT™ - Schema di Valutazione Template
            </h3>
            <p class="text-muted mb-4">
                Supportive and Palliative Care Indicators Tool (SPICT™) - Strumento per identificare pazienti con bisogni di cure palliative e di supporto. Template vuoto per stampa e uso clinico.
            </p>

        <!-- Indicatori Generali -->
        <div class="spict-general-indicators">
            <div class="spict-general-title">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Indicatori Generali di Compromissione o Peggioramento
            </div>
            <div class="spict-criteria-list">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label">Ricovero(i) ospedaliero(i) non programmato(i)</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label">Performance Status basso o in peggioramento</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label">Dipendenza crescente dall'assistenza</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label">Caregiver necessita di maggiore supporto</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label">Perdita di peso progressiva</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label">Sintomi persistenti nonostante trattamento</label>
                        </div>
        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label">Richiesta di cure palliative</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Indicatori Specifici -->
        <div class="spict-criteria-grid">
            <div class="spict-criteria-card">
                <div class="spict-criteria-header"><i class="fas fa-ribbon me-2"></i>Cancro</div>
                <div class="spict-criteria-content">
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Deterioramento funzionale per progressione</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Condizioni non permettono terapie oncologiche</label></div>
                </div>
            </div>

            <div class="spict-criteria-card">
                <div class="spict-criteria-header"><i class="fas fa-brain me-2"></i>Demenza/Fragilità</div>
                <div class="spict-criteria-content">
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Incapacità di vestirsi, camminare o mangiare</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Difficoltà nella deglutizione</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Incontinenza urinaria e fecale</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Comunicazione verbale compromessa</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Cadute frequenti</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Infezioni ricorrenti</label></div>
                </div>
            </div>

            <div class="spict-criteria-card">
                <div class="spict-criteria-header"><i class="fas fa-heart me-2"></i>Patologia Cardiaca/Vascolare</div>
                <div class="spict-criteria-content">
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Scompenso cardiaco non trattabile</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Malattia vascolare periferica severa</label></div>
                </div>
            </div>

            <div class="spict-criteria-card">
                <div class="spict-criteria-header"><i class="fas fa-lungs me-2"></i>Patologia Respiratoria</div>
                <div class="spict-criteria-content">
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Patologia polmonare severa con dispnea</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Ipossia persistente</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Ventilazione meccanica pregressa</label></div>
                </div>
            </div>

            <div class="spict-criteria-card">
                <div class="spict-criteria-header"><i class="fas fa-kidneys me-2"></i>Patologia Renale</div>
                <div class="spict-criteria-content">
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Insufficienza renale stadio 4-5</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Insufficienza renale complicante</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Dialisi sospesa o non iniziata</label></div>
                </div>
            </div>

            <div class="spict-criteria-card">
                <div class="spict-criteria-header"><i class="fas fa-procedures me-2"></i>Patologia Epatica</div>
                <div class="spict-criteria-content">
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Cirrosi con complicanze multiple</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Trapianto di fegato non possibile</label></div>
                </div>
            </div>

            <div class="spict-criteria-card">
                <div class="spict-criteria-header"><i class="fas fa-head-side-virus me-2"></i>Patologia Neurologica</div>
                <div class="spict-criteria-content">
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Deterioramento progressivo funzioni</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Disturbi della parola e deglutizione</label></div>
                    <div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Polmonite da aspirazione ricorrente</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Paralisi persistente post-ictus</label></div>
                </div>
            </div>

            <div class="spict-criteria-card">
                <div class="spict-criteria-header"><i class="fas fa-ellipsis-h me-2"></i>Altre Patologie</div>
                <div class="spict-criteria-content">
                    <div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Peggioramento e rischio di morte per altre patologie irreversibili</label></div>
                </div>
            </div>
        </div>

        <!-- Raccomandazioni -->
        <div class="spict-action-recommendations">
            <div class="spict-action-title">
                <i class="fas fa-clipboard-list me-2"></i>
                Raccomandazioni per l'Assistenza
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Rivalutare i trattamenti in atto</label></div>
                    <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Considerare valutazione specialistica</label></div>
                    <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Condividere percorso con paziente/famiglia</label></div>
                </div>
                <div class="col-md-6">
                    <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Pianificare precocemente le cure</label></div>
                    <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Registrare e comunicare il percorso</label></div>
                </div>
            </div>
        </div>

        <!-- Dati paziente -->
        <div class="mt-4 p-3 border rounded">
            <h5 class="mb-3">Dati Paziente</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nome e Cognome:</label>
                        <div class="border-bottom" style="height: 2rem;"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data di nascita:</label>
                        <div class="border-bottom" style="height: 2rem;"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Data valutazione:</label>
                        <div class="border-bottom" style="height: 2rem;"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Medico valutatore:</label>
                        <div class="border-bottom" style="height: 2rem;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button class="spict-btn-template" onclick="printSpictTemplate()">
                <i class="fas fa-print me-2"></i>Stampa Template
            </button>
        </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('#spict-home input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const item = this.closest('.indicator-item, .pathology-item, .action-item');
                    if (item) {
                        item.classList.toggle('selected', this.checked);
                    }
                    updateCounters();
                });
            });

            function updateCounters() {
                const generalChecked = document.querySelectorAll('#spict-home .general-indicators input[type="checkbox"]:checked').length;
                const pathologyChecked = document.querySelectorAll('#spict-home .pathology-content input[type="checkbox"]:checked').length;
                const actionChecked = document.querySelectorAll('#spict-home .action-list input[type="checkbox"]:checked').length;
                const totalChecked = generalChecked + pathologyChecked + actionChecked;

                document.getElementById('general-count').textContent = generalChecked;
                document.getElementById('pathology-count').textContent = pathologyChecked;
                document.getElementById('action-count').textContent = actionChecked;
                document.getElementById('total-count').textContent = totalChecked;
            }
        });

        function printResults() {
            window.print();
        }
    </script>
    <script>
        function switchSpictMode(mode) {
            const container = document.getElementById('spict-home');
            container.querySelectorAll('.spict-mode-btn').forEach(btn => btn.classList.remove('active'));
            const btn = container.querySelector(`.spict-mode-btn[data-mode="${mode}"]`);
            if (btn) btn.classList.add('active');
            container.querySelectorAll('.spict-content-section').forEach(sec => sec.classList.remove('active'));
            const target = container.querySelector('#spict-' + mode + '-section');
            if (target) target.classList.add('active');
        }

        function printSpictTemplate() {
            switchSpictMode('visualize');
            setTimeout(() => window.print(), 100);
        }

        document.addEventListener('DOMContentLoaded', function() {
            switchSpictMode('compile');
        });
    </script>
</section>
