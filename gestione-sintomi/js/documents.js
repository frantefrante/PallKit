// documents.js
// Gestione dinamica dei documenti del paziente

document.addEventListener('DOMContentLoaded', function () {
  const container = document.getElementById('documenti-container');
  if (!container) return;

  window.patientDocs = [];

  function render() {
    container.innerHTML = '';
    if (patientDocs.length === 0) {
      const p = document.createElement('p');
      p.className = 'text-muted';
      p.textContent = 'Nessun documento disponibile.';
      container.appendChild(p);
      return;
    }
    patientDocs.forEach((doc, idx) => {
      const card = document.createElement('div');
      card.className = 'doc-card';
      card.innerHTML = `
        <div class="doc-type">${doc.title}</div>
        <div class="doc-date">${doc.date}</div>
        <div class="doc-desc">${doc.desc}</div>
        <div class="card-actions">
          <button class="view-btn" data-index="${idx}">Visualizza</button>
          <button class="pdf-btn" data-index="${idx}">Scarica PDF</button>
        </div>`;
      container.appendChild(card);
    });
  }

  window.addPatientDoc = function(doc) {
    patientDocs.push(doc);
    render();
  };

  function downloadDoc(doc) {
    switch(doc.type) {
      case 'riepilogo':
        if (window.exportPdfHome) window.exportPdfHome();
        break;
      case 'necpal':
        if (window.downloadNecpalPdf) window.downloadNecpalPdf();
        break;
      default:
        alert('Download non disponibile');
    }
  }

  container.addEventListener('click', function(e) {
    if (e.target.classList.contains('view-btn')) {
      alert('Anteprima non disponibile.');
    } else if (e.target.classList.contains('pdf-btn')) {
      const doc = patientDocs[e.target.dataset.index];
      if (doc) downloadDoc(doc);
    }
  });

  render();
});

// Funzione per scaricare nuovamente il PDF NECPAL
function downloadNecpalPdf() {
  const element = document.getElementById('identificazione-home');
  if (!element) return alert('Sezione identificazione non trovata.');
  const opt = {
    margin: 0.5,
    filename: 'identificazione.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
  };
  html2pdf().set(opt).from(element).save();
}
window.downloadNecpalPdf = downloadNecpalPdf;

document.addEventListener('DOMContentLoaded', function () {
  const exportPdfBtn = document.getElementById('btn-export-pdf-home');
  if (exportPdfBtn) {
    exportPdfBtn.addEventListener('click', () => {
      addPatientDoc({
        title: 'Riepilogo farmaci',
        date: new Date().toLocaleDateString('it-IT'),
        desc: 'Farmaci sintomatici attuali',
        type: 'riepilogo'
      });
    });
  }

  const savePdfBtn = document.getElementById('btn-save-pdf');
  if (savePdfBtn) {
    savePdfBtn.addEventListener('click', downloadNecpalPdf);
  }

  const necpalForm = document.getElementById('necpal-form');
  const resultBox = document.getElementById('necpal-result');
  const previewBox = document.getElementById('necpal-preview');
  const viewBtn = document.getElementById('btn-view-necpal');

  function buildNecpalPreview(fd) {
    const q = fd.get('radio_1') === 'one' ? 'Sì' : 'No';
    return `
      <div class="card card-body">
        <p><strong>Data compilazione:</strong> ${fd.get('date_1')}</p>
        <p><strong>Nome e Cognome:</strong> ${fd.get('text_1')}</p>
        <p><strong>Data di nascita:</strong> ${fd.get('date_2')}</p>
        <p><strong>Surprise question:</strong> ${q}</p>
      </div>`;
  }

  if (necpalForm) {
    necpalForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const fd = new FormData(necpalForm);
      fd.append('ajax', '1');
      fetch('process-necpal.php', { method: 'POST', body: fd })
        .then(r => r.ok ? r.json() : Promise.reject())
        .then(res => {
          if (res.success) {
            if (resultBox) resultBox.style.display = 'block';
            if (previewBox) {
              previewBox.innerHTML = buildNecpalPreview(fd);
              previewBox.style.display = 'block';
            }
            addPatientDoc({
              title: 'NECPAL',
              date: new Date().toLocaleDateString('it-IT'),
              desc: 'Score NEC PAL completo',
              type: 'necpal'
            });
          } else {
            alert('Errore durante il salvataggio');
          }
        })
        .catch(() => alert('Errore durante il salvataggio'));
    });
  }

  if (viewBtn && previewBox) {
    viewBtn.addEventListener('click', () => {
      previewBox.style.display = previewBox.style.display === 'none' ? 'block' : 'none';
    });
  }
});
