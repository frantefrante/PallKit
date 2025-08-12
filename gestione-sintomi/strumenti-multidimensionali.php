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
          <a href="ipos-templates.html" class="action-btn btn-outline-custom" target="_blank">
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
