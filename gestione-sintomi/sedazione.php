<?php
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Strumenti di Sedazione</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
  <link href="css/strumenti-valutazione.css" rel="stylesheet">
  <link href="css/rass.css" rel="stylesheet">
  <link href="css/ramsey.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <section id="sedazione-home" class="p-4">
      <div class="mb-3">
        <a href="index.php#strumenti-valutazione-home" class="btn btn-success"><i class="fas fa-arrow-left me-2"></i>Torna alle Categorie</a>
      </div>
      <div class="valutazione-detail-section">
        <div class="page-header">
          <div class="page-icon mb-3">💤</div>
          <h1 class="page-title">Strumenti di Sedazione</h1>
          <p class="page-subtitle">Scale di valutazione del livello di sedazione e agitazione</p>
        </div>
        <div class="tools-grid">
          <div class="tool-card tool-card-compact h-100 sedazione-card">
            <div class="tool-header">
              <div class="tool-icon-large">
                <span class="tool-letters">RASS</span>
              </div>
              <div class="tool-info">
                <h4>RASS</h4>
                <div class="tool-subtitle">Richmond Agitation-Sedation Scale</div>
              </div>
            </div>
            <div class="tool-description">
              Scala validata per la valutazione del livello di sedazione e agitazione nei pazienti critici. Range da +4 (combattivo) a -5 (non risvegliabile), con particolare focus sulla risposta agli stimoli verbali e fisici.
            </div>
            <div class="tool-features">
              <span class="feature-badge">Scala a 10 livelli da +4 a -5, validata scientificamente per terapia intensiva e cure palliative</span>
            </div>
            <div class="tool-actions">
              <button class="btn btn-primary btn-action" onclick="openRASSCompile()"><i class="fas fa-edit me-2"></i>Compila</button>
              <button class="btn btn-outline-primary btn-action" onclick="openRASSVisualize()"><i class="fas fa-eye me-2"></i>Visualizza</button>
            </div>
          </div>
          <div class="tool-card tool-card-compact h-100 ramsey-card">
            <div class="tool-header">
              <div class="tool-icon-large">
                <span class="tool-letters">RAM</span>
              </div>
              <div class="tool-info">
                <h4>Ramsey</h4>
                <div class="tool-subtitle">Ramsey Sedation Scale</div>
              </div>
            </div>
            <div class="tool-description">
              Scala tradizionale per la valutazione della sedazione, ampiamente utilizzata in ambito clinico. Sei livelli progressivi che valutano lo stato di coscienza e la responsività del paziente agli stimoli esterni.
            </div>
            <div class="tool-features">
              <span class="feature-badge">Scala a 6 livelli da ansioso/agitato a non responsivo, storica e di facile utilizzo clinico</span>
            </div>
            <div class="tool-actions">
              <button class="btn btn-primary btn-action" onclick="openRamseyCompile()"><i class="fas fa-edit me-2"></i>Compila</button>
              <button class="btn btn-outline-primary btn-action" onclick="openRamseyVisualize()"><i class="fas fa-eye me-2"></i>Visualizza</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include __DIR__ . '/strumenti-rass.php'; ?>
    <?php include __DIR__ . '/strumenti-ramsey.php'; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/app.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/docx@7.1.2"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
  <script src="/js/sedazione.data.js"></script>
  <script src="/js/sedazione.js"></script>
  <script src="/js/documents.js"></script>
  <script src="/js/archivio.js"></script>
  <script src="js/strumenti-valutazione.js"></script>
  <script src="js/rass.js"></script>
  <script src="js/ramsey.js"></script>
</body>
</html>
