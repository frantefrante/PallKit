<?php
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valutazione Complessità</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/fontawesome-all.min.css" rel="stylesheet">
  <link href="css/strumenti-valutazione.css" rel="stylesheet">
  <link href="css/idcpal.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <section id="complessita-home" class="p-4">
      <div class="mb-3">
        <a href="index.php#strumenti-valutazione-home" class="btn btn-success"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</a>
      </div>
      <div class="valutazione-detail-section">
        <div class="page-header">
          <div class="page-icon mb-3">🧠</div>
          <h1 class="page-title">Valutazione Complessità</h1>
          <p class="page-subtitle">Valutazione della complessità clinica e assistenziale attraverso strumenti validati per l'identificazione e la classificazione multidimensionale dei pazienti in cure palliative</p>
        </div>
        <div class="tools-grid justify-content-center">
          <div class="tool-card idcpal-card">
            <div class="tool-header">
              <div class="tool-icon idcpal-icon">ID</div>
              <div>
                <div class="tool-title">IDC-PAL</div>
                <div class="tool-subtitle">Instrumento Diagnóstico de Complejidad</div>
              </div>
            </div>
            <div class="tool-description">
              Strumento per valutare la complessità multidimensionale nei pazienti in cure palliative attraverso l'analisi di 34 elementi distribuiti in 3 dimensioni: paziente, famiglia e sistema sanitario.
            </div>
            <div class="tool-actions">
              <a href="#" class="action-btn btn-primary-idcpal" onclick="openIDCPALCompile()"><i class="fas fa-edit"></i>Compila</a>
              <a href="#" class="action-btn btn-outline-idcpal" onclick="openIDCPALVisualize()"><i class="fas fa-table"></i>Visualizza</a>
            </div>
            <div class="tool-extra-action">
              <a href="#" class="action-btn btn-outline-warning-custom glossary-btn" onclick="openIDCPALGlossary()"><i class="fas fa-book"></i>Glossario</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include __DIR__ . '/strumenti-idcpal.php'; ?>
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
  <script src="js/idcpal.js"></script>
</body>
</html>
