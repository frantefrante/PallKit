<?php
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valutazione del Dolore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
  <link href="css/strumenti-valutazione.css" rel="stylesheet">
  <link href="css/dn4-box.css" rel="stylesheet">
  <link href="css/dn4.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <section id="dolore-home" class="p-4">
      <div class="mb-3">
        <a href="index.php#strumenti-valutazione-home" class="btn btn-success"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</a>
      </div>
      <div class="valutazione-detail-section">
        <div class="page-header mb-2">
          <div class="page-icon mb-3">😣</div>
          <h1 class="page-title">Valutazione del Dolore</h1>
          <p class="page-subtitle">Strumenti specializzati per la valutazione del dolore</p>
        </div>
        <div class="d-flex justify-content-start mt-n2">
          <div class="dn4-box">
            <div class="dn4-box-header">
              <div class="dn4-box-icon">
                <span class="dn4-box-letters">DN4</span>
              </div>
              <h1 class="dn4-box-title">DN4</h1>
              <div class="dn4-box-subtitle">Douleur Neuropathique 4 Questions</div>
              <div class="dn4-box-description">
                Questionario diagnostico validato per l'identificazione del dolore neuropatico attraverso 4 domande specifiche su caratteristiche del dolore e segni clinici.
              </div>
            </div>
            <div class="dn4-box-features">
              <p class="dn4-box-feature-text">10 items, Cut-off ≥4/10, Sensibilità 82.9% - Specificità 89.9%</p>
            </div>
            <div class="dn4-box-actions">
              <a href="#" class="btn btn-primary-dn4 btn-dn4" onclick="openDN4Compile()"><i class="fas fa-edit"></i>Compila</a>
              <a href="#" class="btn btn-outline-dn4 btn-dn4" onclick="openDN4Visualize()"><i class="fas fa-eye"></i>Visualizza</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include __DIR__ . '/strumenti-dn4.php'; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/app.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/docx@7.1.2"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
  <script src="/js/documents.js"></script>
  <script src="/js/archivio.js"></script>
  <script src="js/strumenti-valutazione.js"></script>
  <script src="js/dn4.js"></script>
</body>
</html>
