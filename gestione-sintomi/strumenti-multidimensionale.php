<?php
?>
<section id="multidimensionale-home" class="p-4" style="display:none;">
  <div class="multidimensional-container">
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
          <a href="#" class="action-btn btn-primary-custom" onclick="navigateToSection('esas-home')">
            <i class="fas fa-edit"></i>
            Compila
          </a>
          <a href="#" class="action-btn btn-outline-custom" onclick="alert('Visualizzazione PDF ESAS non disponibile')">
            <i class="fas fa-eye"></i>
            Visualizza
          </a>
        </div>
      </div>
    </div>
  </div>

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
            <div class="version-card" onclick="showIPOSPDF('paziente', 3)">
              <div class="version-icon"><i class="fas fa-user"></i></div>
              <div class="version-title">Paziente - 3 giorni</div>
              <div class="version-desc">Questionario auto-compilato dal paziente per valutazione degli ultimi 3 giorni</div>
            </div>
            <div class="version-card" onclick="showIPOSPDF('paziente', 7)">
              <div class="version-icon"><i class="fas fa-user-clock"></i></div>
              <div class="version-title">Paziente - 7 giorni</div>
              <div class="version-desc">Questionario auto-compilato dal paziente per valutazione dell'ultima settimana</div>
            </div>
            <div class="version-card" onclick="showIPOSPDF('staff', 3)">
              <div class="version-icon"><i class="fas fa-user-md"></i></div>
              <div class="version-title">Staff - 3 giorni</div>
              <div class="version-desc">Versione per operatori sanitari - valutazione degli ultimi 3 giorni</div>
            </div>
            <div class="version-card" onclick="showIPOSPDF('staff', 7)">
              <div class="version-icon"><i class="fas fa-stethoscope"></i></div>
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
            IPOS - Versione Originale
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body p-0">
          <iframe id="pdfViewer" src="" style="width:100%;height:80vh;" frameborder="0"></iframe>
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

  <style>
    :root {
      --primary-green: #5cb85c;
      --hover-green: #449d44;
      --light-green: #d4edda;
      --border-color: #e9ecef;
    }
    .multidimensional-container { max-width: 1200px; margin: 0 auto; padding: 2rem 1rem; }
    .page-header { text-align: center; margin-bottom: 3rem; }
    .page-title { font-size: 2.5rem; font-weight: 700; color: #2c3e50; margin-bottom: 1rem; }
    .page-subtitle { font-size: 1.2rem; color: #6c757d; max-width: 600px; margin: 0 auto; }
    .tools-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-top: 2rem; }
    .tool-card { background: white; border-radius: 16px; box-shadow: 0 6px 24px rgba(0,0,0,0.08); padding: 2rem; border: 2px solid var(--border-color); transition: all 0.3s ease; position: relative; overflow: hidden; }
    .tool-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--primary-green), var(--hover-green)); }
    .tool-card:hover { transform: translateY(-8px); box-shadow: 0 12px 36px rgba(0,0,0,0.15); border-color: var(--primary-green); }
    .tool-header { display: flex; align-items: center; margin-bottom: 1.5rem; }
    .tool-icon { width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: white; margin-right: 1rem; font-weight: bold; }
    .ipos-icon { background: linear-gradient(135deg, #007bff, #0056b3); }
    .esas-icon { background: linear-gradient(135deg, #dc3545, #c82333); }
    .tool-title { font-size: 1.6rem; font-weight: 700; color: #2c3e50; margin-bottom: 0.5rem; }
    .tool-subtitle { font-size: 1rem; color: #6c757d; font-weight: 500; }
    .tool-description { color: #495057; margin-bottom: 2rem; line-height: 1.6; }
    .tool-actions { display: flex; gap: 1rem; }
    .action-btn { flex: 1; padding: 0.75rem 1.5rem; border: none; border-radius: 8px; font-weight: 600; text-decoration: none; text-align: center; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 0.5rem; white-space: nowrap; }
    .btn-primary-custom { background: linear-gradient(135deg, var(--primary-green), var(--hover-green)); color: white; }
    .btn-primary-custom:hover { background: linear-gradient(135deg, var(--hover-green), #3e8e41); transform: translateY(-2px); box-shadow: 0 4px 12px rgba(92, 184, 92, 0.3); color: white; }
    .btn-outline-custom { background: transparent; color: var(--primary-green); border: 2px solid var(--primary-green); }
    .btn-outline-custom:hover { background: var(--primary-green); color: white; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(92, 184, 92, 0.3); }
    .badge-versions { background: var(--light-green); color: var(--hover-green); padding: 0.4rem 0.8rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-top: 1rem; display: inline-block; }
    .version-modal .modal-content { border: none; border-radius: 16px; box-shadow: 0 20px 60px rgba(0,0,0,0.2); }
    .version-modal .modal-header { background: linear-gradient(135deg, var(--primary-green), var(--hover-green)); color: white; border-radius: 16px 16px 0 0; }
    .version-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-top: 1rem; }
    .version-card { border: 2px solid var(--border-color); border-radius: 12px; padding: 1.5rem; text-align: center; transition: all 0.3s ease; cursor: pointer; }
    .version-card:hover { border-color: var(--primary-green); background: var(--light-green); transform: translateY(-2px); }
    .version-icon { font-size: 2rem; color: var(--primary-green); margin-bottom: 1rem; }
    .version-title { font-weight: 700; color: #2c3e50; margin-bottom: 0.5rem; }
    .version-desc { color: #6c757d; font-size: 0.9rem; }
    @media (max-width: 768px) {
      .tools-grid { grid-template-columns: 1fr; }
      .tool-actions { gap: 0.75rem; }
      .action-btn { font-size: 0.9rem; padding: 0.6rem 1rem; }
      .page-title { font-size: 2rem; }
    }
  </style>

  <script>
  function openIPOSCompile() {
    navigateToSection('ipos-home');
  }
  function openIPOSVisualize() {
    const modal = new bootstrap.Modal(document.getElementById('iposVersionModal'));
    modal.show();
  }
  function showIPOSPDF(tipo, giorni) {
    const versionModal = bootstrap.Modal.getInstance(document.getElementById('iposVersionModal'));
    versionModal.hide();
    const tipoText = tipo === 'paziente' ? 'Paziente' : 'Staff';
    document.getElementById('pdfModalTitle').innerHTML = `<i class="fas fa-file-pdf text-danger me-2"></i>IPOS ${tipoText} - ${giorni} giorni`;
    const fileMap = {
      'paziente3': 'IPOSv1-P3-IT.pdf',
      'paziente7': 'IPOSv1-P7-IT.pdf',
      'staff3': 'IPOSv1-S3-IT.pdf',
      'staff7': 'IPOSv1-S7-IT.pdf'
    };
    const key = tipo + giorni;
    document.getElementById('pdfViewer').src = `ipos%20pdf/${fileMap[key]}`;
    const pdfModal = new bootstrap.Modal(document.getElementById('pdfViewModal'));
    pdfModal.show();
  }
  function printPDF() {
    const iframe = document.getElementById('pdfViewer');
    if (iframe && iframe.contentWindow) {
      iframe.contentWindow.focus();
      iframe.contentWindow.print();
    }
  }
  </script>
</section>
