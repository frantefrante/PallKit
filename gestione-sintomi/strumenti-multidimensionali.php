<?php
// Strumenti Multidimensionali
?>
<section id="multidimensionale-home" class="p-4" style="display:none;">
  <div class="multidimensional-container">
    <div class="mb-3">
      <button class="btn btn-outline-success" onclick="navigateToSection('strumenti-valutazione-home')">
        <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
      </button>
    </div>

    <div class="page-header">
      <h1 class="page-title">
        <i class="fas fa-chart-line me-3"></i>
        Strumenti Multidimensionali
      </h1>
      <p class="page-subtitle">
        Valutazione integrata dei bisogni del paziente attraverso strumenti validati per il monitoraggio multidimensionale in cure palliative
      </p>
    </div>

    <div class="tools-grid">
      <!-- Card IPOS -->
      <div class="tool-card">
        <div class="tool-header">
          <div class="tool-icon ipos-icon">IP</div>
          <div>
            <div class="tool-title">IPOS</div>
            <div class="tool-subtitle">Integrated Patient-Outcome Scale</div>
          </div>
        </div>
        <div class="tool-description">
          Scala di valutazione multidimensionale dei problemi e delle preoccupazioni del paziente, sviluppata specificamente per le cure palliative. Comprende 10 sintomi principali e domini psicosociali.
          <div class="badge-versions">
            4 versioni disponibili: Staff/Paziente × 3/7 giorni
          </div>
        </div>
        <div class="tool-actions">
          <a href="#" class="action-btn btn-primary-custom" onclick="openIPOSCompile()">
            <i class="fas fa-edit"></i>
            Compila
          </a>
          <a href="#" class="action-btn btn-outline-custom" onclick="openIPOSVisualize()">
            <i class="fas fa-eye"></i>
            Visualizza
          </a>
        </div>
      </div>

      <!-- Card ESAS -->
      <div class="tool-card">
        <div class="tool-header">
          <div class="tool-icon esas-icon">ES</div>
          <div>
            <div class="tool-title">ESAS</div>
            <div class="tool-subtitle">Edmonton Symptom Assessment Scale</div>
          </div>
        </div>
        <div class="tool-description">
          Scala per la valutazione rapida di 9 sintomi comuni nei pazienti oncologici e in cure palliative. Strumento semplice e veloce per il monitoraggio sintomatologico.
          <div class="badge-versions">
            Versione standard 0-10 con scala visiva
          </div>
        </div>
        <div class="tool-actions">
          <a href="#" class="action-btn btn-primary-custom" onclick="openESASCompile()">
            <i class="fas fa-edit"></i>
            Compila
          </a>
          <a href="#" class="action-btn btn-outline-custom" onclick="openESASVisualize()">
            <i class="fas fa-eye"></i>
            Visualizza
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal per selezione versione IPOS -->
<div class="modal fade version-modal" id="iposVersionModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fas fa-file-alt me-2"></i>
          Seleziona versione IPOS
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="text-muted mb-4">Scegli la versione del questionario IPOS più appropriata per il tuo caso clinico:</p>
        <div class="version-grid">
          <div class="version-card" onclick="showIPOSPDF('paziente',3)">
            <div class="version-icon">
              <i class="fas fa-user"></i>
            </div>
            <div class="version-title">Paziente - 3 giorni</div>
            <div class="version-desc">Questionario auto-compilato dal paziente per valutazione degli ultimi 3 giorni</div>
          </div>
          <div class="version-card" onclick="showIPOSPDF('paziente',7)">
            <div class="version-icon">
              <i class="fas fa-user-clock"></i>
            </div>
            <div class="version-title">Paziente - 7 giorni</div>
            <div class="version-desc">Questionario auto-compilato dal paziente per valutazione dell'ultima settimana</div>
          </div>
          <div class="version-card" onclick="showIPOSPDF('staff',3)">
            <div class="version-icon">
              <i class="fas fa-user-md"></i>
            </div>
            <div class="version-title">Staff - 3 giorni</div>
            <div class="version-desc">Versione per operatori sanitari - valutazione degli ultimi 3 giorni</div>
          </div>
          <div class="version-card" onclick="showIPOSPDF('staff',7)">
            <div class="version-icon">
              <i class="fas fa-stethoscope"></i>
            </div>
            <div class="version-title">Staff - 7 giorni</div>
            <div class="version-desc">Versione per operatori sanitari - valutazione dell'ultima settimana</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal per visualizzazione PDF -->
<div class="modal fade" id="pdfViewModal" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="pdfModalTitle">
          <i class="fas fa-file-pdf text-danger me-2"></i>
          IPOS - Versione
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-0">
        <iframe id="pdfFrame" src="" style="width:100%;height:80vh;" frameborder="0"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="printPDF()">
          <i class="fas fa-print me-2"></i>
          Stampa
        </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Chiudi
        </button>
      </div>
    </div>
  </div>
</div>

