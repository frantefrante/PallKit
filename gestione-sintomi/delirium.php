<?php
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scale di Valutazione Delirium - 4AT e CAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link href="css/delirium.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <!-- Main View -->
        <div id="main-view">
            <div class="mb-3 no-print">
                <a href="index.php#strumenti-valutazione-home" class="btn btn-success"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</a>
            </div>
            <div class="delirium-header">
                <h1><i class="fas fa-brain me-3"></i>Scale di Valutazione Delirium</h1>
                <p>Strumenti clinici per la diagnosi e il monitoraggio del delirium in ambito sanitario</p>
            </div>
            <div class="tools-grid">
                <div class="tool-card">
                    <div class="tool-header">
                        <div class="tool-icon-large"><span class="tool-letters">4AT</span></div>
                        <div class="tool-info">
                            <h4>4AT</h4>
                            <div class="tool-subtitle">4 'A's Test</div>
                        </div>
                    </div>
                    <div class="tool-description">
                        Test di screening rapido per il delirium, validato in diversi setting clinici. Valuta 4 domini cognitivi: allerta, attenzione, cognizione acuta e pensiero disorganizzato.
                    </div>
                    <div class="tool-features">
                        <div class="feature-text">4 parametri: Allerta, Attenzione, Pensiero disorganizzato, Fluttuazione acuta - Punteggio 0-12 - Screening rapido</div>
                    </div>
                    <div class="tool-actions">
                        <button class="btn btn-primary btn-action" onclick="show4ATAssessment()"><i class="fas fa-edit me-2"></i>Compila</button>
                        <a href="strumenti-4at.php" class="btn btn-outline-primary btn-action"><i class="fas fa-eye me-2"></i>Visualizza</a>
                    </div>
                </div>
                <div class="tool-card">
                    <div class="tool-header">
                        <div class="tool-icon-large"><span class="tool-letters">CAM</span></div>
                        <div class="tool-info">
                            <h4>CAM</h4>
                            <div class="tool-subtitle">Confusion Assessment Method</div>
                        </div>
                    </div>
                    <div class="tool-description">
                        Algoritmo diagnostico gold standard per il delirium. Valuta 4 caratteristiche principali con alta sensibilità e specificità per la diagnosi di delirium.
                    </div>
                    <div class="tool-features">
                        <div class="feature-text">4 caratteristiche: Esordio acuto, Attenzione, Pensiero disorganizzato, Livello di coscienza - Algoritmo diagnostico - Gold standard</div>
                    </div>
                    <div class="tool-actions">
                        <button class="btn btn-primary btn-action" onclick="showCAMAssessment()"><i class="fas fa-edit me-2"></i>Compila</button>
                        <a href="strumenti-cam.php" class="btn btn-outline-primary btn-action"><i class="fas fa-eye me-2"></i>Visualizza</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4AT Assessment Section -->
        <div id="4at-assessment" class="assessment-section delirium-section">
            <div class="mb-3 no-print">
                <a href="index.php#strumenti-valutazione-home" class="btn btn-success me-2"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</a>
                <button class="btn btn-outline-secondary" style="border-color:#6f42c1;color:#6f42c1;" onclick="showMainView()"><i class="fas fa-arrow-left me-2"></i>Torna a Delirium</button>
            </div>
            <div class="assessment-header">
                <h2>4AT - 4 'A's Test</h2>
                <p>Screening rapido per delirium</p>
            </div>
            <div class="mode-selector">
                <button class="mode-btn active" onclick="switch4ATMode('compile')">📝 Compila</button>
                <a href="strumenti-4at.php" class="mode-btn">📊 Scala di Riferimento</a>
            </div>
            <div id="4at-compile" class="content-section">
                <div class="progress-container">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span><strong>Progresso Compilazione</strong></span>
                        <span id="4at-progress-text">0/4 completati</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" id="4at-progress-bar" role="progressbar" style="width:0%"></div>
                    </div>
                </div>
                <div class="question-item" id="4at-q1">
                    <div class="question-title">
                        <div class="question-number">1</div>
                        <div>Allerta (Alertness)</div>
                    </div>
                    <div class="question-description">
                        Valutare il livello di allerta del paziente. Se addormentato, cercare di svegliarlo normalmente.
                    </div>
                    <div class="radio-options">
                        <label class="radio-option" onclick="select4ATAnswer(1,0,this)">
                            <input type="radio" name="4at-q1" value="0">
                            <span class="radio-label">Normale (completamente allerta o facile da svegliare)</span>
                            <span class="radio-score">0</span>
                        </label>
                        <label class="radio-option" onclick="select4ATAnswer(1,4,this)">
                            <input type="radio" name="4at-q1" value="4">
                            <span class="radio-label">Alterata (chiaramente anomala, soporoso/stupor)</span>
                            <span class="radio-score">4</span>
                        </label>
                    </div>
                </div>
                <div class="question-item" id="4at-q2">
                    <div class="question-title">
                        <div class="question-number">2</div>
                        <div>Test di Attenzione</div>
                    </div>
                    <div class="question-description">
                        Dire al paziente: "Ora dirò alcune lettere. Ogni volta che sente la lettera 'A', batta le mani".<br>Sequenza: SAVEAHAART.
                    </div>
                    <div class="radio-options">
                        <label class="radio-option" onclick="select4ATAnswer(2,0,this)">
                            <input type="radio" name="4at-q2" value="0">
                            <span class="radio-label">Nessun errore</span>
                            <span class="radio-score">0</span>
                        </label>
                        <label class="radio-option" onclick="select4ATAnswer(2,1,this)">
                            <input type="radio" name="4at-q2" value="1">
                            <span class="radio-label">1 errore</span>
                            <span class="radio-score">1</span>
                        </label>
                        <label class="radio-option" onclick="select4ATAnswer(2,2,this)">
                            <input type="radio" name="4at-q2" value="2">
                            <span class="radio-label">2 o più errori / non testabile</span>
                            <span class="radio-score">2</span>
                        </label>
                    </div>
                </div>
                <div class="question-item" id="4at-q3">
                    <div class="question-title">
                        <div class="question-number">3</div>
                        <div>Attenzione (test alternativo)</div>
                    </div>
                    <div class="question-description">
                        Se il paziente non riesce a completare il test precedente, chiedere: "Può dirmi tutti i mesi dell'anno all'indietro, partendo da dicembre?"
                    </div>
                    <div class="radio-options">
                        <label class="radio-option" onclick="select4ATAnswer(3,0,this)">
                            <input type="radio" name="4at-q3" value="0">
                            <span class="radio-label">7 o più mesi corretti</span>
                            <span class="radio-score">0</span>
                        </label>
                        <label class="radio-option" onclick="select4ATAnswer(3,1,this)">
                            <input type="radio" name="4at-q3" value="1">
                            <span class="radio-label">Meno di 7 mesi / si rifiuta di iniziare</span>
                            <span class="radio-score">1</span>
                        </label>
                        <label class="radio-option" onclick="select4ATAnswer(3,2,this)">
                            <input type="radio" name="4at-q3" value="2">
                            <span class="radio-label">Non testabile</span>
                            <span class="radio-score">2</span>
                        </label>
                    </div>
                </div>
                <div class="question-item" id="4at-q4">
                    <div class="question-title">
                        <div class="question-number">4</div>
                        <div>Cambiamento Acuto o Corso Fluttuante</div>
                    </div>
                    <div class="question-description">
                        C'è evidenza di cambiamento significativo nello stato mentale rispetto alla baseline? Il comportamento varia durante il giorno?
                    </div>
                    <div class="radio-options">
                        <label class="radio-option" onclick="select4ATAnswer(4,0,this)">
                            <input type="radio" name="4at-q4" value="0">
                            <span class="radio-label">No</span>
                            <span class="radio-score">0</span>
                        </label>
                        <label class="radio-option" onclick="select4ATAnswer(4,4,this)">
                            <input type="radio" name="4at-q4" value="4">
                            <span class="radio-label">Sì</span>
                            <span class="radio-score">4</span>
                        </label>
                    </div>
                </div>
                <div id="4at-results" class="results-container hidden">
                    <div class="score-display" id="4at-score">0</div>
                    <div class="score-interpretation" id="4at-interpretation"></div>
                    <div class="score-description" id="4at-description"></div>
                    <div class="action-buttons">
                        <button class="btn btn-warning" onclick="print4AT()"><i class="fas fa-print me-2"></i>Stampa</button>
                        <button class="btn btn-secondary" onclick="reset4AT()"><i class="fas fa-redo me-2"></i>Reset</button>
                    </div>
                </div>
            </div>
            <div id="4at-reference" class="content-section hidden">
                <div class="alert alert-info">Consulta la scala di riferimento completa nella scheda <em>Visualizza</em>.</div>
            </div>
        </div>

        <!-- CAM Assessment Section -->
        <div id="cam-assessment" class="assessment-section delirium-section">
            <div class="mb-3 no-print">
                <a href="index.php#strumenti-valutazione-home" class="btn btn-success me-2"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</a>
                <button class="btn btn-outline-secondary" style="border-color:#6f42c1;color:#6f42c1;" onclick="showMainView()"><i class="fas fa-arrow-left me-2"></i>Torna a Delirium</button>
            </div>
            <div class="assessment-header">
                <h2>CAM - Confusion Assessment Method</h2>
                <p>Algoritmo diagnostico per delirium</p>
            </div>
            <div class="mode-selector">
                <button class="mode-btn active" onclick="switchCAMMode('compile')">📝 Compila</button>
                <a href="strumenti-cam.php" class="mode-btn">📊 Algoritmo Diagnostico</a>
            </div>
            <div id="cam-compile" class="content-section">
                <div class="progress-container">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span><strong>Progresso Compilazione</strong></span>
                        <span id="cam-progress-text">0/4 completati</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" id="cam-progress-bar" role="progressbar" style="width:0%"></div>
                    </div>
                </div>
                <div class="question-item" id="cam-f1">
                    <div class="question-title">
                        <div class="question-number">1</div>
                        <div>Esordio Acuto e Corso Fluttuante</div>
                    </div>
                    <div class="question-description">
                        C'è evidenza di un cambiamento acuto nello stato mentale rispetto alla baseline? Il comportamento varia durante il giorno?
                    </div>
                    <div class="radio-options">
                        <label class="radio-option" onclick="selectCAMAnswer(1,false,this)">
                            <input type="radio" name="cam-f1" value="false">
                            <span class="radio-label">Assente</span>
                            <span class="radio-score">No</span>
                        </label>
                        <label class="radio-option" onclick="selectCAMAnswer(1,true,this)">
                            <input type="radio" name="cam-f1" value="true">
                            <span class="radio-label">Presente</span>
                            <span class="radio-score">Sì</span>
                        </label>
                    </div>
                </div>
                <div class="question-item" id="cam-f2">
                    <div class="question-title">
                        <div class="question-number">2</div>
                        <div>Disattenzione</div>
                    </div>
                    <div class="question-description">
                        Il paziente ha difficoltà a focalizzare l'attenzione?
                    </div>
                    <div class="radio-options">
                        <label class="radio-option" onclick="selectCAMAnswer(2,false,this)">
                            <input type="radio" name="cam-f2" value="false">
                            <span class="radio-label">Assente</span>
                            <span class="radio-score">No</span>
                        </label>
                        <label class="radio-option" onclick="selectCAMAnswer(2,true,this)">
                            <input type="radio" name="cam-f2" value="true">
                            <span class="radio-label">Presente</span>
                            <span class="radio-score">Sì</span>
                        </label>
                    </div>
                </div>
                <div class="question-item" id="cam-f3">
                    <div class="question-title">
                        <div class="question-number">3</div>
                        <div>Pensiero Disorganizzato</div>
                    </div>
                    <div class="question-description">
                        Il pensiero del paziente è disorganizzato o incoerente?
                    </div>
                    <div class="radio-options">
                        <label class="radio-option" onclick="selectCAMAnswer(3,false,this)">
                            <input type="radio" name="cam-f3" value="false">
                            <span class="radio-label">Assente</span>
                            <span class="radio-score">No</span>
                        </label>
                        <label class="radio-option" onclick="selectCAMAnswer(3,true,this)">
                            <input type="radio" name="cam-f3" value="true">
                            <span class="radio-label">Presente</span>
                            <span class="radio-score">Sì</span>
                        </label>
                    </div>
                </div>
                <div class="question-item" id="cam-f4">
                    <div class="question-title">
                        <div class="question-number">4</div>
                        <div>Livello di Coscienza Alterato</div>
                    </div>
                    <div class="question-description">
                        Nel complesso, come valuta il livello di coscienza del paziente?
                    </div>
                    <div class="radio-options">
                        <label class="radio-option" onclick="selectCAMAnswer(4,false,this)">
                            <input type="radio" name="cam-f4" value="false">
                            <span class="radio-label">Allerta (normale)</span>
                            <span class="radio-score">No</span>
                        </label>
                        <label class="radio-option" onclick="selectCAMAnswer(4,true,this)">
                            <input type="radio" name="cam-f4" value="true">
                            <span class="radio-label">Vigile, letargico o stupor</span>
                            <span class="radio-score">Sì</span>
                        </label>
                    </div>
                </div>
                <div id="cam-results" class="results-container hidden">
                    <div class="score-display" id="cam-diagnosis"></div>
                    <div class="score-interpretation" id="cam-interpretation"></div>
                    <div class="score-description" id="cam-description"></div>
                    <div class="action-buttons">
                        <button class="btn btn-warning" onclick="printCAM()"><i class="fas fa-print me-2"></i>Stampa</button>
                        <button class="btn btn-secondary" onclick="resetCAM()"><i class="fas fa-redo me-2"></i>Reset</button>
                    </div>
                </div>
            </div>
            <div id="cam-reference" class="content-section hidden">
                <div class="alert alert-info">Consulta l'algoritmo diagnostico completo nella scheda <em>Visualizza</em>.</div>
            </div>
        </div>
    </div>
    <script src="js/delirium.js"></script>
</body>
</html>
