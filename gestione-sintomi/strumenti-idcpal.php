<?php
// IDC-PAL: nuova interfaccia di valutazione della complessità
?>
<section id="idcpal-home" class="p-4" style="display:none;">
    <link rel="stylesheet" href="css/idcpal.css">

    <div class="main-container">
        <div class="idcpal-overview">
            <div class="idcpal-header">
                <div class="idcpal-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="idcpal-title-section">
                    <h1>IDC-PAL</h1>
                    <p class="idcpal-subtitle">Strumento Diagnostico della Complessità</p>
                </div>
            </div>
            <p class="idcpal-description">
                Il sistema IDC-PAL è uno strumento validato per identificare e classificare il livello di complessità
                assistenziale nei pazienti in cure palliative, attraverso l'analisi multidimensionale di elementi
                clinici, psico-emotivi, familiari e organizzativi che influenzano la pianificazione dell'assistenza.
            </p>
            <div class="idcpal-highlight">
                <p class="highlight-text">
                    <i class="fas fa-check-circle me-2"></i>
                    3 dimensioni di valutazione • 34 elementi specifici • Classificazione automatica
                </p>
            </div>
        </div>
        <div class="idcpal-actions">
            <div class="action-button compile-button active" onclick="openComplexityModal('compile')">
                <div class="action-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="action-title">Compila IDC-PAL</div>
                <div class="action-description">
                    Valuta la complessità del caso clinico attraverso la compilazione guidata
                    dei 34 elementi distribuiti nelle 3 dimensioni principali.
                </div>
                <span class="action-status status-active">
                    <i class="fas fa-play me-1"></i>Disponibile
                </span>
            </div>
            <div class="action-button view-button inactive">
                <div class="action-icon">
                    <i class="fas fa-table"></i>
                </div>
                <div class="action-title">Visualizza Scala</div>
                <div class="action-description">
                    Consulta la struttura completa dello strumento con tutti gli elementi
                    e i criteri di classificazione della complessità.
                </div>
                <span class="action-status status-coming-soon">
                    <i class="fas fa-clock me-1"></i>Prossimamente
                </span>
            </div>
            <div class="action-button glossary-button inactive">
                <div class="action-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="action-title">Glossario Clinico</div>
                <div class="action-description">
                    Accedi alle definizioni dettagliate e ai criteri clinici per ogni
                    elemento dello strumento IDC-PAL.
                </div>
                <span class="action-status status-coming-soon">
                    <i class="fas fa-clock me-1"></i>Prossimamente
                </span>
            </div>
        </div>
    </div>

    <div id="complexity-modal" class="complexity-modal">
        <div class="complexity-modal-content">
            <span class="modal-close" onclick="closeComplexityModal()">&times;</span>
            <div class="complexity-tabs">
                <button class="complexity-tab active" onclick="showComplexityTab('compile')">
                    <i class="fas fa-edit me-2"></i>Compila
                </button>
            </div>
            <div id="compile-tab" class="tab-content active">
                <div class="patient-info">
                    <h5 class="text-primary mb-3">
                        <i class="fas fa-user me-2"></i>Dati Paziente
                    </h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Nome e Cognome</label>
                            <input type="text" id="patient-name" class="form-control" placeholder="Inserire nome paziente">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Data di nascita</label>
                            <input type="date" id="patient-birth" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Data compilazione</label>
                            <input type="date" id="compilation-date" class="form-control">
                        </div>
                    </div>
                </div>
                <div id="complexity-sections"></div>
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
                <div class="text-center mt-4">
                    <button class="btn btn-success btn-lg me-3" onclick="generateComplexityReport()">
                        <i class="fas fa-file-pdf me-2"></i>Genera Report
                    </button>
                    <button class="btn btn-outline-secondary btn-lg" onclick="resetComplexityForm()">
                        <i class="fas fa-redo me-2"></i>Azzera
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/idcpal.js"></script>
</section>
