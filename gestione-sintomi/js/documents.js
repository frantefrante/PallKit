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

  function pdfFromHtml(html, filename) {
    const tmp = document.createElement('div');
    tmp.innerHTML = html;
    const opt = {
      margin: 0.5,
      filename: filename,
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
    };
    html2pdf().set(opt).from(tmp).save();
  }

  function downloadDoc(doc) {
    switch(doc.type) {
      case 'riepilogo':
        if (window.exportPdfHome) window.exportPdfHome();
        break;
      case 'necpal':
        if (doc.html) pdfFromHtml(doc.html, 'NECPAL.pdf');
        else if (window.downloadNecpalPdf) window.downloadNecpalPdf();
        break;
      default:
        alert('Download non disponibile');
    }
  }

  function showDoc(doc) {
    if (!doc.html) return alert('Anteprima non disponibile.');
    const modalBody = document.getElementById('preview-content-home');
    if (!modalBody) return alert('Anteprima non disponibile.');
    modalBody.innerHTML = doc.html;
    new bootstrap.Modal(document.getElementById('preview-modal-home')).show();
  }

  container.addEventListener('click', function(e) {
    if (e.target.classList.contains('view-btn')) {
      const doc = patientDocs[e.target.dataset.index];
      if (doc) showDoc(doc);
    } else if (e.target.classList.contains('pdf-btn')) {
      const doc = patientDocs[e.target.dataset.index];
      if (doc) downloadDoc(doc);
    }
  });

  render();
});

// Funzione per scaricare nuovamente il PDF NECPAL
function downloadNecpalPdf() {
  const preview = document.getElementById('necpal-preview');
  if (!preview || !preview.innerHTML.trim()) return alert('Anteprima non disponibile.');
  const tmp = document.createElement('div');
  tmp.innerHTML = preview.innerHTML;
  const opt = {
    margin: 0.5,
    filename: 'NECPAL.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
  };
  html2pdf().set(opt).from(tmp).save();
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

  function buildNecpalHtml(fd) {
    const date1 = fd.get('date_1');
    const name  = fd.get('text_1');
    const dob   = fd.get('date_2');
    const q     = fd.get('radio_1');
    const cb1   = fd.get('checkbox_1') ? true : false;
    const cb2   = fd.get('checkbox_2') ? true : false;
    const cb3   = fd.getAll('checkbox_3[]');
    const cb4   = fd.getAll('checkbox_4[]');
    const items = [];
    items.push(['Scelta/Richiesta approccio palliativo', cb1]);
    items.push(['Bisogni identificati dai sanitari', cb2]);
    cb3.forEach(t => items.push([t, true]));
    cb4.forEach(t => items.push([t, true]));
    const rows = items.map((it, i) => {
      const bg = i % 2 ? '#f2f2f2' : '#ffffff';
      return `<tr style="background:${bg};">
                <td style="width:40px;text-align:center;border:1px solid #ccc;">${it[1] ? 'X' : ''}</td>
                <td style="border:1px solid #ccc;padding:4px 6px;">${it[0]}</td>
              </tr>`;
    }).join('');
    const positive = q === 'two' && items.some(i => i[1]) ? 'POSITIVO' : 'NEGATIVO';
    return `
      <div style="font-family: Helvetica, Arial, sans-serif; font-size:11pt;">
        <div style="background:#e0e0e0; padding:6px; text-align:center; font-weight:bold;">
          Ambulatorio MMG – Dr. Francesco Magnante
        </div>
        <div style="background:#f7f7f7; padding:8px; margin-top:10px;">
          <strong>Nome paziente:</strong> ${name}<br>
          <strong>Data di nascita:</strong> ${dob}<br>
          <strong>Data di compilazione:</strong> ${date1}
        </div>
        <h4 style="background:#e0e0e0; padding:4px; margin-top:20px; font-size:1rem;">Item NECPAL</h4>
        <table style="width:100%; border-collapse:collapse; font-size:11pt;">${rows}</table>
        <div style="background:#cccccc; padding:6px; margin-top:20px; font-weight:bold;">
          Esito finale: ${positive}
        </div>
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
            const html = buildNecpalHtml(fd);
            if (resultBox) resultBox.style.display = 'block';
            if (previewBox) {
              previewBox.innerHTML = html;
              previewBox.style.display = 'block';
            }
            addPatientDoc({
              title: 'NECPAL',
              date: new Date().toLocaleDateString('it-IT'),
              desc: 'Score NECPAL completo',
              type: 'necpal',
              html: html
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
