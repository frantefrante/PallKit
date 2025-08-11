<?php
// Strumenti di Identificazione
?>
<section id="identificazione-home" class="p-4" style="display:none;">
  <div class="multidimensional-container">
    <div class="mb-3">
      <button class="btn btn-outline-success" onclick="navigateToSection('strumenti-valutazione-home')">
        <i class="fas fa-arrow-left me-2"></i>Torna alle Categorie
      </button>
    </div>

    <div class="page-header">
      <h1 class="page-title">
        <i class="fas fa-search me-3"></i>
        Strumenti di Identificazione
      </h1>
      <p class="page-subtitle">
        Strumenti per identificare precocemente pazienti eleggibili a cure palliative
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6">
      <div class="tool-card">
        <div class="tool-header">
          <div class="tool-icon">31</div>
          <div>
            <div class="tool-title">NECPAL 3.1</div>
            <div class="tool-subtitle">Necesidades Paliativas</div>
          </div>
        </div>
        <div class="tool-description">
          Strumento di identificazione precoce secondo i criteri originali NECPAL 3.1.
        </div>
        <div class="tool-actions">
          <a href="#" class="action-btn btn-primary-custom" onclick="openNecpal31Compile()"><i class="fas fa-edit"></i>Compila</a>
          <a href="#" class="action-btn btn-outline-custom" onclick="openNecpal31Visualize()"><i class="fas fa-eye"></i>Visualizza</a>
          <a href="#" class="action-btn btn-outline-warning-custom glossary-btn" onclick="openNecpal31Glossary()"><i class="fas fa-book"></i>Glossario</a>
        </div>
      </div>
      </div>

      <div class="col-md-6">
      <div class="tool-card">
        <div class="tool-header">
          <div class="tool-icon">40</div>
          <div>
            <div class="tool-title">NECPAL 4.0</div>
            <div class="tool-subtitle">Versione Aggiornata 2021</div>
          </div>
        </div>
        <div class="tool-description">
          Ultima versione del NECPAL con stima prognostica integrata a stadi.
        </div>
        <div class="tool-actions">
          <a href="#" class="action-btn btn-primary-custom" onclick="openNecpal40Compile()"><i class="fas fa-edit"></i>Compila</a>
          <a href="#" class="action-btn btn-outline-custom" onclick="openNecpal40Visualize()"><i class="fas fa-eye"></i>Visualizza</a>
          <a href="#" class="action-btn btn-outline-warning-custom glossary-btn" onclick="openNecpal40Glossary()"><i class="fas fa-book"></i>Glossario</a>
        </div>
      </div>
      </div>

      <div class="col-md-6 mx-auto">
      <div class="tool-card">
        <div class="tool-header">
          <div class="tool-icon">SP</div>
          <div>
            <div class="tool-title">SPICT</div>
            <div class="tool-subtitle">Supportive & Palliative Care Indicators</div>
          </div>
        </div>
        <div class="tool-description">
          Tool clinico per identificare pazienti che potrebbero beneficiare di cure palliative specialistiche.
        </div>
        <div class="tool-actions">
          <a href="#" class="action-btn btn-primary-custom" onclick="openSPICTCompile()"><i class="fas fa-edit"></i>Compila</a>
          <a href="#" class="action-btn btn-outline-custom" onclick="openSPICTVisualize()"><i class="fas fa-eye"></i>Visualizza</a>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>
