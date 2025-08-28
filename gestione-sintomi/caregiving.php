<?php
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valutazione Caregiving</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/fontawesome-all.min.css" rel="stylesheet">
  <link href="css/strumenti-valutazione.css" rel="stylesheet">
  <link href="css/zcb7.css" rel="stylesheet">
  <link href="css/famcare2.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <section id="caregiving-home" class="p-4">
      <div class="mb-3">
        <a href="index.php#strumenti-valutazione-home" class="btn btn-success"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</a>
      </div>
      <div class="valutazione-detail-section">
        <div class="page-header">
          <div class="page-icon mb-3">👥</div>
          <h1 class="page-title">Valutazione Caregiving</h1>
          <p class="page-subtitle">Strumenti per valutare burden e soddisfazione dei caregiver</p>
        </div>
        <div class="tools-grid">
          <div class="tool-card tool-card-compact h-100">
            <div class="tool-header">
              <div class="tool-icon-large" style="background: linear-gradient(135deg, #e83e8c, #d91a72);">
                <span class="tool-letters">ZC</span>
              </div>
              <div class="tool-info">
                <h4>ZCB-7</h4>
                <div class="tool-subtitle">Zarit Caregiver Burden - 7 items</div>
              </div>
            </div>
            <div class="tool-description">
              Versione breve della scala Zarit per valutare il burden del caregiver in 7 domande. Validata in ambito palliativo con ottima accuratezza (AUC ~0,98).
            </div>
            <div class="tool-features">
              <span class="feature-badge">7 item scala 0-4, punteggio 0-28, tempo 3-5 minuti, correlazione ZBI-22 ρ≈0,90</span>
            </div>
            <div class="tool-actions">
              <button class="btn btn-primary btn-action" onclick="openZCB7Compile()"><i class="fas fa-edit me-2"></i>Compila</button>
              <button class="btn btn-outline-primary btn-action" onclick="openZCB7Visualize()"><i class="fas fa-eye me-2"></i>Visualizza</button>
            </div>
          </div>
          <div class="tool-card tool-card-compact h-100">
            <div class="tool-header">
              <div class="tool-icon-large" style="background: linear-gradient(135deg, #e83e8c, #d91a72);">
                <span class="tool-letters">FC</span>
              </div>
              <div class="tool-info">
                <h4>FAMCARE-2</h4>
                <div class="tool-subtitle">Family Satisfaction with Care</div>
              </div>
            </div>
            <div class="tool-description">
              Scala di 17 item per misurare la soddisfazione dei familiari rispetto alle cure palliative ricevute dal paziente.
            </div>
            <div class="tool-features">
              <span class="feature-badge">17 item Likert 1-5, punteggio 17-85, 4 domini clinici</span>
            </div>
            <div class="tool-actions">
              <button class="btn btn-primary btn-action" onclick="openFAMCARE2Compile()"><i class="fas fa-edit me-2"></i>Compila</button>
              <button class="btn btn-outline-primary btn-action" onclick="openFAMCARE2Visualize()"><i class="fas fa-eye me-2"></i>Visualizza</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include __DIR__ . '/strumenti-zcb7.php'; ?>
    <?php include __DIR__ . '/strumenti-famcare2.php'; ?>
  </div>
  <script src="js/fontawesome-all.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/app.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/docx@7.1.2"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
  <script src="/js/documents.js"></script>
  <script src="/js/archivio.js"></script>
  <script src="js/strumenti-valutazione.js"></script>
  <script src="js/zcb7.js"></script>
  <script src="js/famcare2.js"></script>
</body>
</html>
