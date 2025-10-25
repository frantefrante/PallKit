<?php
// gestione-sedazione.php - CALCOLATORE SEDAZIONE PALLIATIVA SICP 2023
?>
<link href="css/sedazione-calculator.css" rel="stylesheet">

<div class="sedazione-container">
  <!-- Header Informativo -->
  <div class="alert alert-info mb-4">
    <div class="d-flex align-items-center">
      <i class="fas fa-info-circle me-3 fs-4"></i>
      <div>
        <h5 class="mb-1">Calcolatore Sedazione Palliativa</h5>
        <p class="mb-0">Strumento guidato per il calcolo personalizzato dei dosaggi in sedazione palliativa basato su evidenze cliniche validate.</p>
      </div>
    </div>
  </div>

  <!-- Avviso Prima Scelta -->
  <div class="alert alert-success mb-4">
    <div class="d-flex align-items-center">
      <i class="fas fa-star me-2"></i>
      <strong>Midazolam è la prima scelta</strong> nelle linee guida internazionali per sedazione palliativa
    </div>
  </div>

  <!-- Link rapido alle tabelle complete -->
  <div class="mb-4">
    <div class="alert alert-light border border-primary">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <h6 class="mb-1"><i class="fas fa-table me-2"></i>Tabelle Complete Farmaci</h6>
          <p class="mb-0 small text-muted">Consulta tutti i protocolli e dosaggi di sedazione palliativa</p>
        </div>
        <a href="tabelle-farmaci-sedazione.html" target="_blank" class="btn btn-primary btn-sm">
          <i class="fas fa-external-link-alt me-1"></i>Visualizza Tabelle
        </a>
      </div>
    </div>
  </div>

  <!-- Container principale calcolatore -->
  <div class="row">
    <!-- Placeholder per il calcolatore - sostituito da JavaScript -->
    <div id="drug-schema">
      <div class="text-center p-5">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Caricamento calcolatore...</span>
        </div>
        <p class="mt-3">Inizializzazione Calcolatore Sedazione Palliativa...</p>
      </div>
    </div>
  </div>

  <!-- Sezione Informativa -->
  <div class="mt-5">
    <div class="row">
      <div class="col-md-6">
        <div class="info-card">
          <h6><i class="fas fa-book-medical me-2"></i>Evidenze Cliniche</h6>
          <p class="small">Questo calcolatore implementa raccomandazioni basate su evidenze cliniche validate per la sedazione palliativa.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="info-card">
          <h6><i class="fas fa-exclamation-triangle me-2"></i>Uso Clinico</h6>
          <p class="small">I dosaggi calcolati sono indicativi e devono sempre essere valutati dal medico in base al quadro clinico specifico del paziente.</p>
        </div>
      </div>
    </div>
  </div>

  
  <!-- Nota finale con riferimenti -->
  <div class="mt-4">
    <div class="alert alert-light border">
      <h6><i class="fas fa-file-alt me-2"></i>Documento di Riferimento</h6>
      <p class="small mb-0">
        Questo calcolatore è basato sulle raccomandazioni delle 
        <strong><a href="https://www.iss.it/documents/20126/8657013/LG+429+SIAARTI_SICP_Sedazione+Palliativa_v2.pdf/bf691c4c-bb39-2067-435e-cbc044fb82ff?t=1684925965384" target="_blank" class="text-decoration-none">
          Linee Guida SICP 2023 - Sedazione Palliativa <i class="fas fa-external-link-alt ms-1"></i>
        </a></strong>
        del Sistema Nazionale Linee Guida - Istituto Superiore di Sanità.
      </p>
    </div>
  </div>
</div>

<!-- Script: dati + logica -->
<script src="js/sedazione-ui.js"></script>
<script src="js/sedation-tooltips.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    console.log("⚙️ gestione-sedazione initialized");
  });
  
  
  // Aggiungi stili per info-card e ottimizzazione mobile
  const style = document.createElement('style');
  style.textContent = `
    .info-card {
      background: #f8f9fa;
      border-left: 4px solid #007bff;
      padding: 1rem;
      border-radius: 0 6px 6px 0;
      margin-bottom: 1rem;
    }
    .info-card h6 {
      color: #495057;
      margin-bottom: 0.5rem;
    }
    .info-card p {
      color: #6c757d;
      margin-bottom: 0;
      line-height: 1.4;
    }
    
    /* Ottimizzazione mobile per il box tabelle */
    @media (max-width: 768px) {
      .alert .d-flex {
        flex-direction: column !important;
        align-items: flex-start !important;
        text-align: left;
      }
      .alert .btn {
        margin-top: 0.75rem;
        width: 100%;
        justify-content: center;
      }
    }
  `;
  document.head.appendChild(style);
</script>