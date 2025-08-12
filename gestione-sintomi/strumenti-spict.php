<?php
// Strumento SPICT - Supportive and Palliative Care Indicators Tool
?>
<section id="spict-home" class="p-4" style="display:none;">
    <style>
        :root { --primary-spict:#2c5aa0; --secondary-spict:#1e3d6f; --light-spict:rgba(44,90,160,0.1); --border-spict:rgba(44,90,160,0.2); }
        .spict-container{max-width:1200px;margin:0 auto;padding:2rem 1rem;font-family:Arial,sans-serif;line-height:1.4;}
        .spict-header{background:linear-gradient(135deg,var(--primary-spict),var(--secondary-spict));color:white;padding:2.5rem;border-radius:16px;margin-bottom:2rem;text-align:center;}
        .spict-title{font-size:2rem;font-weight:700;margin-bottom:0.5rem;}
        .spict-subtitle{font-size:1.1rem;opacity:0.9;}
        .mode-selector{background:white;border-radius:12px;padding:0.5rem;margin-bottom:2rem;box-shadow:0 2px 8px rgba(0,0,0,0.1);display:flex;gap:0.5rem;}
        .mode-btn{flex:1;padding:0.875rem 1.5rem;border:none;background:transparent;color:#6c757d;font-weight:600;border-radius:8px;transition:all 0.3s ease;text-decoration:none;text-align:center;cursor:pointer;}
        .mode-btn.active{background:linear-gradient(135deg,var(--primary-spict),var(--secondary-spict));color:white;box-shadow:0 2px 8px rgba(44,90,160,0.3);}
        .mode-btn:hover:not(.active){background:var(--light-spict);color:var(--primary-spict);}
        .content-section{display:none;}
        .content-section.active{display:block;}
        .spict-card{background:white;padding:30px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,0.1);margin-bottom:2rem;}
        .intro{background:#e8f4f8;padding:20px;border-left:4px solid var(--primary-spict);margin-bottom:30px;border-radius:0 8px 8px 0;}
        .intro p{margin-bottom:10px;font-weight:500;}
        .section-title{background:var(--primary-spict);color:white;padding:12px 20px;font-weight:bold;font-size:16px;margin-bottom:15px;border-radius:4px;}
        .general-indicators{display:flex;flex-direction:column;gap:8px;}
        .indicator-item{display:flex;align-items:flex-start;padding:12px;background:#f9f9f9;border:1px solid #ddd;border-radius:4px;transition:all 0.2s ease;cursor:pointer;}
        .indicator-item:hover{background:#f0f8ff;}
        .indicator-item.selected{background:#e3f2fd;border-color:var(--primary-spict);box-shadow:0 2px 4px rgba(44,90,160,0.2);}
        .indicator-item input[type="checkbox"]{margin-right:12px;margin-top:2px;transform:scale(1.2);}
        .indicator-text{flex:1;font-size:14px;line-height:1.4;}
        .pathology-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:20px;}
        .pathology-card{border:2px solid var(--primary-spict);border-radius:6px;overflow:hidden;}
        .pathology-header{background:var(--primary-spict);color:white;padding:12px 15px;font-weight:bold;font-size:15px;}
        .pathology-content{padding:15px;}
        .pathology-item{display:flex;align-items:flex-start;margin-bottom:12px;padding:8px;border-radius:4px;transition:all 0.2s ease;cursor:pointer;}
        .pathology-item:last-child{margin-bottom:0;}
        .pathology-item:hover{background:#f0f8ff;}
        .pathology-item.selected{background:#e3f2fd;border:1px solid var(--primary-spict);box-shadow:0 2px 4px rgba(44,90,160,0.2);}
        .pathology-item input[type="checkbox"]{margin-right:10px;margin-top:2px;transform:scale(1.1);}
        .pathology-text{flex:1;font-size:13px;line-height:1.3;}
        .action-section{background:#fff3cd;border:1px solid #ffeaa7;padding:20px;border-radius:6px;margin-top:30px;}
        .action-section h3{color:#856404;margin-bottom:15px;font-size:16px;}
        .action-item{display:flex;align-items:flex-start;padding:10px;background:white;border-radius:4px;margin-bottom:8px;cursor:pointer;}
        .action-item:hover{background:#f8f9fa;}
        .action-item.selected{background:#e3f2fd;border:1px solid var(--primary-spict);}
        .action-item input[type="checkbox"]{margin-right:10px;margin-top:2px;transform:scale(1.1);}
        .summary{margin-top:30px;padding:20px;background:#f8f9fa;border-radius:6px;border:1px solid #dee2e6;}
        .summary h3{color:var(--primary-spict);margin-bottom:15px;}
        .summary-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:15px;margin-top:15px;}
        .stat-box{background:white;padding:15px;border-radius:4px;text-align:center;border:1px solid #ddd;}
        .stat-number{font-size:24px;font-weight:bold;color:var(--primary-spict);}
        .stat-label{font-size:12px;color:#666;margin-top:5px;}
        .btn-spict{background:var(--primary-spict);color:white;padding:12px 30px;border:none;border-radius:4px;font-size:16px;cursor:pointer;transition:background 0.3s ease;margin:10px 5px;}
        .btn-spict:hover{background:var(--secondary-spict);}
        .template-card{background:white;border:2px solid var(--primary-spict);border-radius:12px;padding:2rem;margin-bottom:2rem;box-shadow:0 4px 16px rgba(0,0,0,0.1);}
        .template-title{color:var(--primary-spict);font-size:1.3rem;font-weight:700;margin-bottom:1.5rem;display:flex;align-items:center;gap:0.5rem;}
        .criteria-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.5rem;margin-top:2rem;}
        .criteria-card{background:white;border:2px solid var(--border-spict);border-radius:12px;overflow:hidden;box-shadow:0 4px 16px rgba(0,0,0,0.05);}
        .criteria-header{background:var(--primary-spict);color:white;padding:1rem 1.5rem;font-weight:700;}
        .criteria-content{padding:1.5rem;}
        .general-indicators-template{background:linear-gradient(135deg,#e8f4f8,#f0f8ff);border:2px solid var(--primary-spict);border-radius:12px;padding:2rem;margin-bottom:2rem;}
        .general-title{color:var(--primary-spict);font-size:1.2rem;font-weight:700;margin-bottom:1.5rem;text-align:center;}
        .action-recommendations{background:linear-gradient(135deg,#fff3cd,#ffeaa7);border:2px solid #ffc107;border-radius:12px;padding:2rem;margin-top:2rem;}
        .action-title{color:#856404;font-size:1.2rem;font-weight:700;margin-bottom:1.5rem;}
        @media(max-width:768px){.pathology-grid{grid-template-columns:1fr;} .mode-selector{flex-direction:column;} .summary-stats{grid-template-columns:1fr;}}
    </style>
    <div class="mb-3">
        <button class="btn btn-outline-primary me-2" onclick="navigateToSection('identificazione-home')"><i class="fas fa-arrow-left me-2"></i>Torna a Identificazione</button>
        <button class="btn btn-outline-success" onclick="navigateToSection('strumenti-valutazione-home')"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</button>
    </div>
    <div class="spict-container">
        <div class="spict-header">
            <div class="spict-title"><i class="fas fa-clipboard-list me-2"></i>SPICT™</div>
            <div class="spict-subtitle">Supportive and Palliative Care Indicators Tool</div>
        </div>
        <div class="mode-selector">
            <button class="mode-btn active" data-mode="compile" onclick="switchSpictMode('compile')"><i class="fas fa-edit me-2"></i>Compila</button>
            <button class="mode-btn" data-mode="visualize" onclick="switchSpictMode('visualize')"><i class="fas fa-eye me-2"></i>Visualizza</button>
        </div>
        <div id="spict-compile-section" class="content-section active">
            <div class="spict-card">
                <div class="intro"><p>Lo SPICT™ è utilizzato per aiutare a identificare pazienti le cui condizioni di salute sono in fase di peggioramento. Valutate i loro bisogni di cure palliative e di supporto. Pianificate il percorso di assistenza e cura.</p></div>
                <div class="row mb-4">
                    <div class="col-md-6"><div class="form-floating"><input type="text" class="form-control" id="spict-patient-name" placeholder="Nome Cognome"><label for="spict-patient-name">Nome e Cognome</label></div></div>
                    <div class="col-md-3"><div class="form-floating"><input type="date" class="form-control" id="spict-birth-date"><label for="spict-birth-date">Data di Nascita</label></div></div>
                    <div class="col-md-3"><div class="form-floating"><input type="date" class="form-control" id="spict-eval-date"><label for="spict-eval-date">Data Valutazione</label></div></div>
                </div>
                <div class="section-title">Ricercate la presenza di indicatori generali di grave compromissione o di peggioramento delle condizioni di salute.</div>
                <div class="general-indicators">
                    <div class="indicator-item"><input type="checkbox" id="gen1"><div class="indicator-text"><label for="gen1">Ricovero(i) ospedaliero(i) non programmato(i)</label></div></div>
                    <div class="indicator-item"><input type="checkbox" id="gen2"><div class="indicator-text"><label for="gen2">Performance Status basso oppure in peggioramento, con limitata reversibilità (es. la persona rimane a letto o in poltrona per più di metà giornata).</label></div></div>
                    <div class="indicator-item"><input type="checkbox" id="gen3"><div class="indicator-text"><label for="gen3">Dipendenza dall'assistenza degli altri a causa di problemi fisici e/o cognitivi in progressivo peggioramento.</label></div></div>
                    <div class="indicator-item"><input type="checkbox" id="gen4"><div class="indicator-text"><label for="gen4">La persona che assiste il paziente necessita di maggiore aiuto e supporto.</label></div></div>
                    <div class="indicator-item"><input type="checkbox" id="gen5"><div class="indicator-text"><label for="gen5">Progressiva perdita di peso; persistente sottopeso; massa muscolare ridotta.</label></div></div>
                    <div class="indicator-item"><input type="checkbox" id="gen6"><div class="indicator-text"><label for="gen6">Sintomi persistenti nonostante il trattamento ottimale della/e patologia/e di base.</label></div></div>
                    <div class="indicator-item"><input type="checkbox" id="gen7"><div class="indicator-text"><label for="gen7">La persona (o la sua famiglia) chiede di ricevere cure palliative; sceglie di ridurre, sospendere o non iniziare nuovi trattamenti; oppure desidera concentrarsi sulla qualità di vita.</label></div></div>
                </div>
                <div class="section-title mt-4">Ricercate la presenza di indicatori clinici di una o più patologie a prognosi infausta.</div>
                <div class="pathology-grid">
                    <div class="pathology-card"><div class="pathology-header">Cancro</div><div class="pathology-content"><div class="pathology-item"><input type="checkbox" id="canc1"><div class="pathology-text"><label for="canc1">Deterioramento delle capacità funzionali dovuto alla progressione del cancro.</label></div></div><div class="pathology-item"><input type="checkbox" id="canc2"><div class="pathology-text"><label for="canc2">Le condizioni generali non consentono di iniziare o continuare trattamenti oncologici specifici oppure la terapia in atto è finalizzata unicamente al controllo dei sintomi.</label></div></div></div></div>
                    <div class="pathology-card"><div class="pathology-header">Demenza/Fragilità</div><div class="pathology-content"><div class="pathology-item"><input type="checkbox" id="dem1"><div class="pathology-text"><label for="dem1">Incapacità di vestirsi, camminare o mangiare senza aiuto.</label></div></div><div class="pathology-item"><input type="checkbox" id="dem2"><div class="pathology-text"><label for="dem2">La persona mangia e beve meno; ha difficoltà nella deglutizione.</label></div></div><div class="pathology-item"><input type="checkbox" id="dem3"><div class="pathology-text"><label for="dem3">Incontinenza urinaria e fecale.</label></div></div><div class="pathology-item"><input type="checkbox" id="dem4"><div class="pathology-text"><label for="dem4">Non in grado di comunicare verbalmente; interazione sociale scarsa.</label></div></div><div class="pathology-item"><input type="checkbox" id="dem5"><div class="pathology-text"><label for="dem5">Cadute frequenti; frattura del femore.</label></div></div><div class="pathology-item"><input type="checkbox" id="dem6"><div class="pathology-text"><label for="dem6">Episodi febbrili ricorrenti o infezioni; polmonite da aspirazione.</label></div></div></div></div>
                    <div class="pathology-card"><div class="pathology-header">Patologia cardiaca/vascolare</div><div class="pathology-content"><div class="pathology-item"><input type="checkbox" id="card1"><div class="pathology-text"><label for="card1">Scompenso cardiaco o malattia coronarica estesa, non trattabile, con affanno o dolore toracico a riposo o per sforzi lievi.</label></div></div><div class="pathology-item"><input type="checkbox" id="card2"><div class="pathology-text"><label for="card2">Malattia vascolare periferica severa ed inoperabile.</label></div></div></div></div>
                    <div class="pathology-card"><div class="pathology-header">Patologia respiratoria</div><div class="pathology-content"><div class="pathology-item"><input type="checkbox" id="resp1"><div class="pathology-text"><label for="resp1">Patologia polmonare cronica severa con affanno a riposo o per sforzi lievi tra gli episodi di riacutizzazione.</label></div></div><div class="pathology-item"><input type="checkbox" id="resp2"><div class="pathology-text"><label for="resp2">Ipossia persistente, con necessità di ossigenoterapia a lungo termine.</label></div></div><div class="pathology-item"><input type="checkbox" id="resp3"><div class="pathology-text"><label for="resp3">Pregressa ventilazione meccanica (invasiva o non) per insufficienza respiratoria, oppure ventilazione controindicata.</label></div></div></div></div>
                    <div class="pathology-card"><div class="pathology-header">Patologia renale</div><div class="pathology-content"><div class="pathology-item"><input type="checkbox" id="ren1"><div class="pathology-text"><label for="ren1">Insufficienza renale cronica stadio 4 o 5 (eGFR <30ml/min) con deterioramento delle condizioni cliniche.</label></div></div><div class="pathology-item"><input type="checkbox" id="ren2"><div class="pathology-text"><label for="ren2">Insufficienza renale che complica altre patologie a prognosi infausta oppure complica la somministrazione di altri trattamenti.</label></div></div><div class="pathology-item"><input type="checkbox" id="ren3"><div class="pathology-text"><label for="ren3">La dialisi viene sospesa oppure non viene iniziata.</label></div></div></div></div>
                    <div class="pathology-card"><div class="pathology-header">Patologia epatica</div><div class="pathology-content"><div class="pathology-item"><input type="checkbox" id="ep1"><div class="pathology-text"><label for="ep1">Cirrosi con una o più delle seguenti complicanze nell'ultimo anno: ascite resistente ai diuretici; encefalopatia epatica; sindrome epatorenale; peritonite batterica; sanguinamento ricorrente da varici.</label></div></div><div class="pathology-item"><input type="checkbox" id="ep2"><div class="pathology-text"><label for="ep2">Il trapianto di fegato non è possibile.</label></div></div></div></div>
                    <div class="pathology-card"><div class="pathology-header">Patologia neurologica</div><div class="pathology-content"><div class="pathology-item"><input type="checkbox" id="neur1"><div class="pathology-text"><label for="neur1">Progressivo deterioramento delle funzioni fisiche e/o cognitive, nonostante la terapia ottimale.</label></div></div><div class="pathology-item"><input type="checkbox" id="neur2"><div class="pathology-text"><label for="neur2">Disturbi della parola con deterioramento progressivo della comunicazione e/o della deglutizione.</label></div></div><div class="pathology-item"><input type="checkbox" id="neur3"><div class="pathology-text"><label for="neur3">Polmonite da aspirazione ricorrente; affanno o insufficienza respiratoria.</label></div></div><div class="pathology-item"><input type="checkbox" id="neur4"><div class="pathology-text"><label for="neur4">Paralisi persistente a seguito di accidente cerebrovascolare, con significativa perdita funzionale e disabilità permanente.</label></div></div></div></div>
                    <div class="pathology-card"><div class="pathology-header">Altre patologie</div><div class="pathology-content"><div class="pathology-item"><input type="checkbox" id="alt1"><div class="pathology-text"><label for="alt1">Peggioramento e rischio di morte a causa di altre patologie o complicanze irreversibili; qualsiasi trattamento avrà scarso beneficio.</label></div></div></div></div>
                </div>
                <div class="action-section">
                    <h3>Rivalutate l'assistenza e le cure in atto. Pianificate il percorso di assistenza e cura.</h3>
                    <div class="action-item"><input type="checkbox" id="act1"><div class="indicator-text"><label for="act1">Rivalutate i trattamenti in atto (farmacologici e non) affinché il paziente riceva cure ottimali; minimizzate la polifarmacoterapia.</label></div></div>
                    <div class="action-item"><input type="checkbox" id="act2"><div class="indicator-text"><label for="act2">Considerate la possibilità di richiedere una valutazione specialistica se i sintomi o gli altri problemi sono complessi e difficili da gestire.</label></div></div>
                    <div class="action-item"><input type="checkbox" id="act3"><div class="indicator-text"><label for="act3">Condividete con il paziente e la sua famiglia il percorso di assistenza e cura, attuale e futuro. Supportate i familiari che assistono il paziente.</label></div></div>
                    <div class="action-item"><input type="checkbox" id="act4"><div class="indicator-text"><label for="act4">Pianificate precocemente il percorso di assistenza e cura, se prevedete la perdita della capacità decisionale.</label></div></div>
                    <div class="action-item"><input type="checkbox" id="act5"><div class="indicator-text"><label for="act5">Registrate in cartella clinica, comunicate e coordinate il percorso di assistenza e cura.</label></div></div>
                </div>
                <div class="summary">
                    <h3>Riepilogo Valutazione</h3>
                    <p>Selezionare i checkbox corrispondenti agli indicatori presenti nel paziente. Il numero di indicatori selezionati può aiutare nella valutazione del bisogno di cure palliative.</p>
                    <div class="summary-stats">
                        <div class="stat-box"><div class="stat-number" id="general-count">0</div><div class="stat-label">Indicatori Generali</div></div>
                        <div class="stat-box"><div class="stat-number" id="pathology-count">0</div><div class="stat-label">Indicatori Patologie</div></div>
                        <div class="stat-box"><div class="stat-number" id="action-count">0</div><div class="stat-label">Azioni Pianificate</div></div>
                        <div class="stat-box"><div class="stat-number" id="total-count">0</div><div class="stat-label">Totale Selezionati</div></div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn-spict" onclick="printSpictResults()"><i class="fas fa-print me-2"></i>Stampa Report</button>
                    <button class="btn-spict" onclick="resetSpictForm()"><i class="fas fa-redo me-2"></i>Reset</button>
                </div>
            </div>
        </div>
        <div id="spict-visualize-section" class="content-section">
            <div class="template-card">
                <h3 class="template-title"><i class="fas fa-file-medical me-2"></i>SPICT™ - Schema di Valutazione Template</h3>
                <p class="text-muted mb-4">Supportive and Palliative Care Indicators Tool (SPICT™) - Strumento per identificare pazienti con bisogni di cure palliative e di supporto. Template vuoto per stampa e uso clinico.</p>
                <div class="general-indicators-template">
                    <div class="general-title"><i class="fas fa-exclamation-triangle me-2"></i>Indicatori Generali di Compromissione o Peggioramento</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Ricovero(i) ospedaliero(i) non programmato(i)</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Performance Status basso o in peggioramento</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Dipendenza crescente dall'assistenza</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Caregiver necessita di maggiore supporto</label></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Perdita di peso progressiva</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Sintomi persistenti nonostante trattamento</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Richiesta di cure palliative</label></div>
                        </div>
                    </div>
                </div>
                <div class="criteria-grid">
                    <div class="criteria-card"><div class="criteria-header"><i class="fas fa-ribbon me-2"></i>Cancro</div><div class="criteria-content"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Deterioramento funzionale per progressione</label></div><div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Condizioni non permettono terapie oncologiche</label></div></div></div>
                    <div class="criteria-card"><div class="criteria-header"><i class="fas fa-brain me-2"></i>Demenza/Fragilità</div><div class="criteria-content"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Incapacità di vestirsi, camminare o mangiare</label></div><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Difficoltà nella deglutizione</label></div><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Incontinenza urinaria e fecale</label></div><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Comunicazione verbale compromessa</label></div><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Cadute frequenti</label></div><div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Infezioni ricorrenti</label></div></div></div>
                    <div class="criteria-card"><div class="criteria-header"><i class="fas fa-heart me-2"></i>Patologia Cardiaca/Vascolare</div><div class="criteria-content"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Scompenso cardiaco non trattabile</label></div><div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Malattia vascolare periferica severa</label></div></div></div>
                    <div class="criteria-card"><div class="criteria-header"><i class="fas fa-lungs me-2"></i>Patologia Respiratoria</div><div class="criteria-content"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Patologia polmonare severa con dispnea</label></div><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Ipossia persistente</label></div><div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Ventilazione meccanica pregressa</label></div></div></div>
                    <div class="criteria-card"><div class="criteria-header"><i class="fas fa-kidneys me-2"></i>Patologia Renale</div><div class="criteria-content"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Insufficienza renale stadio 4-5</label></div><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Insufficienza renale complicante</label></div><div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Dialisi sospesa o non iniziata</label></div></div></div>
                    <div class="criteria-card"><div class="criteria-header"><i class="fas fa-procedures me-2"></i>Patologia Epatica</div><div class="criteria-content"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Cirrosi con complicanze multiple</label></div><div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Trapianto di fegato non possibile</label></div></div></div>
                    <div class="criteria-card"><div class="criteria-header"><i class="fas fa-head-side-virus me-2"></i>Patologia Neurologica</div><div class="criteria-content"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Deterioramento progressivo funzioni</label></div><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Disturbi della parola e deglutizione</label></div><div class="form-check mb-2"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Polmonite da aspirazione ricorrente</label></div><div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Paralisi persistente post-ictus</label></div></div></div>
                    <div class="criteria-card"><div class="criteria-header"><i class="fas fa-ellipsis-h me-2"></i>Altre Patologie</div><div class="criteria-content"><div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">Peggioramento e rischio di morte per altre patologie irreversibili</label></div></div></div>
                </div>
                <div class="action-recommendations">
                    <div class="action-title"><i class="fas fa-clipboard-list me-2"></i>Raccomandazioni per l'Assistenza</div>
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
                <div class="mt-4 p-3 border rounded">
                    <h5 class="mb-3">Dati Paziente</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label">Nome e Cognome:</label><div class="border-bottom" style="height:2rem;"></div></div>
                            <div class="mb-3"><label class="form-label">Data di nascita:</label><div class="border-bottom" style="height:2rem;"></div></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3"><label class="form-label">Data valutazione:</label><div class="border-bottom" style="height:2rem;"></div></div>
                            <div class="mb-3"><label class="form-label">Medico valutatore:</label><div class="border-bottom" style="height:2rem;"></div></div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4"><button class="btn-spict" onclick="printSpictTemplate()"><i class="fas fa-print me-2"></i>Stampa Template</button></div>
            </div>
        </div>
    </div>
    <script>
        let spictData = { general: [], pathology: [], actions: [], patientInfo: {} };
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('spict-eval-date').value = new Date().toISOString().split('T')[0];
            document.querySelectorAll('#spict-home .indicator-item label, #spict-home .pathology-item label, #spict-home .action-item label').forEach(lbl => {
                lbl.addEventListener('click', e => e.stopPropagation());
            });
            document.querySelectorAll('#spict-home .indicator-item input[type="checkbox"], #spict-home .pathology-item input[type="checkbox"], #spict-home .action-item input[type="checkbox"]').forEach(cb => {
                cb.addEventListener('click', e => e.stopPropagation());
                cb.addEventListener('change', e => {
                    const item = e.target.closest('.indicator-item, .pathology-item, .action-item');
                    if (e.target.checked) item.classList.add('selected'); else item.classList.remove('selected');
                    updateCounters();
                });
            });
        });
        function switchSpictMode(mode) {
            const container = document.getElementById('spict-home');
            container.querySelectorAll('.mode-btn').forEach(btn => btn.classList.remove('active'));
            const btn = container.querySelector(`.mode-btn[data-mode="${mode}"]`);
            if (btn) btn.classList.add('active');
            container.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
            container.querySelector('#spict-' + mode + '-section').classList.add('active');
        }
        function updateCounters() {
            const generalChecked = document.querySelectorAll('#spict-home .general-indicators input[type="checkbox"]:checked').length;
            const pathologyChecked = document.querySelectorAll('#spict-home .pathology-content input[type="checkbox"]:checked').length;
            const actionChecked = document.querySelectorAll('#spict-home .action-section input[type="checkbox"]:checked').length;
            const totalChecked = generalChecked + pathologyChecked + actionChecked;
            document.getElementById('general-count').textContent = generalChecked;
            document.getElementById('pathology-count').textContent = pathologyChecked;
            document.getElementById('action-count').textContent = actionChecked;
            document.getElementById('total-count').textContent = totalChecked;
            spictData.general = Array.from(document.querySelectorAll('#spict-home .general-indicators input[type="checkbox"]:checked')).map(cb => cb.id);
            spictData.pathology = Array.from(document.querySelectorAll('#spict-home .pathology-content input[type="checkbox"]:checked')).map(cb => cb.id);
            spictData.actions = Array.from(document.querySelectorAll('#spict-home .action-section input[type="checkbox"]:checked')).map(cb => cb.id);
        }
        function printSpictResults() {
            const name = document.getElementById('spict-patient-name')?.value || '';
            const birth = document.getElementById('spict-birth-date')?.value || '';
            const evalDate = document.getElementById('spict-eval-date')?.value || '';
            const general = document.getElementById('general-count')?.textContent || '0';
            const pathology = document.getElementById('pathology-count')?.textContent || '0';
            const action = document.getElementById('action-count')?.textContent || '0';
            const total = document.getElementById('total-count')?.textContent || '0';
            const selected = Array.from(document.querySelectorAll('#spict-compile-section input[type="checkbox"]:checked')).map(cb => {
                const lbl = document.querySelector(`label[for="${cb.id}"]`);
                const text = lbl ? lbl.textContent.trim() : cb.id;
                return `<li>${text}</li>`;
            }).join('');
            const win = window.open('', '_blank');
            win.document.write(`<!DOCTYPE html><html lang="it"><head><meta charset="UTF-8"><title>SPICT - Report</title><style>body{font-family:Arial,sans-serif;margin:20px;line-height:1.4;color:#333;} .header{text-align:center;margin-bottom:30px;border-bottom:2px solid #2c5aa0;padding-bottom:20px;} .header h1{color:#2c5aa0;margin-bottom:10px;} .patient-info{border:2px solid #2c5aa0;padding:20px;margin-bottom:25px;border-radius:8px;background:#f8f9fa;} .result-section{margin-top:30px;padding:20px;border:2px solid #2c5aa0;border-radius:8px;background:#f8f9fa;} .form-row{display:flex;justify-content:space-between;margin-bottom:15px;} .form-field{flex:1;margin-right:20px;} .form-field:last-child{margin-right:0;} ul{margin-top:10px;padding-left:20px;} .footer{margin-top:40px;padding-top:20px;border-top:1px solid #ddd;font-size:12px;color:#666;text-align:center;}</style></head><body><div class="header"><h1>SPICT™</h1><p><strong>Scheda di Valutazione</strong></p><p>www.medbox.it - Strumenti per le Cure Palliative</p></div><div class="patient-info"><div class="form-row"><div class="form-field"><strong>Nome:</strong> ${name}</div><div class="form-field"><strong>Data di nascita:</strong> ${birth}</div></div><div class="form-row"><div class="form-field"><strong>Data valutazione:</strong> ${evalDate}</div></div></div><div class="result-section"><h3>Risultati</h3><div class="form-row"><div class="form-field"><strong>Indicatori generali:</strong> ${general}</div><div class="form-field"><strong>Indicatori patologie:</strong> ${pathology}</div></div><div class="form-row"><div class="form-field"><strong>Azioni pianificate:</strong> ${action}</div><div class="form-field"><strong>Totale:</strong> ${total}</div></div><div><strong>Items selezionati:</strong><ul>${selected}</ul></div></div><div class="footer"><p>${new Date().toLocaleDateString('it-IT')}</p></div></body></html>`);
            win.document.close();
            win.focus();
            win.onload = function(){ win.print(); };
        }

        function printSpictTemplate() {
            const content = document.getElementById('spict-visualize-section').innerHTML;
            const win = window.open('', '_blank');
            win.document.write(`<!DOCTYPE html><html lang="it"><head><meta charset="UTF-8"><title>SPICT - Template</title><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"><style>body{padding:20px;} i,[class^="fa"]{display:none !important;}</style></head><body>${content}</body></html>`);
            win.document.close();
            win.focus();
            win.onload = function(){ win.print(); };
        }
        function resetSpictForm() {
            if (confirm('Sei sicuro di voler resettare la valutazione?')) {
                spictData = { general: [], pathology: [], actions: [], patientInfo: {} };
                document.getElementById('spict-patient-name').value = '';
                document.getElementById('spict-birth-date').value = '';
                document.getElementById('spict-eval-date').value = new Date().toISOString().split('T')[0];
                document.querySelectorAll('#spict-home input[type="checkbox"]').forEach(checkbox => { if (!checkbox.disabled) checkbox.checked = false; });
                document.querySelectorAll('#spict-home .indicator-item, #spict-home .pathology-item, #spict-home .action-item').forEach(item => item.classList.remove('selected'));
                updateCounters();
            }
        }
    </script>
</section>
