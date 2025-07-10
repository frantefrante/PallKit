// documents.js
// Gestione dinamica dei documenti del paziente

const CLINICI = [
    "Perdita di peso > 10%",
    "Declino funzionale: Australian Karnofsky riduzione > 30%",
    "Declino funzionale: ADL riduzione > 2 funzioni",
    "Declino cognitivo: Perdita ≥ 5 punti MMSE",
    "Dipendenza grave: Australian Karnofsky (AKPS) < 50",
    "Sindromi geriatriche ≥ 2 (cadute, disfagia, delirium, ulcere da decubito, infezioni)",
    "Sintomi persistenti: Dolore, Astenia, Anoressia o ESAS/IPOS ≥ 2 sintomi",
    "Aspetti psico-sociali: DME > 9 o 2 items IPOS ≥ 3",
    "Vulnerabilità sociale grave (valutazione sociale/familiare)",
    "Comorbidità > 2 malattie croniche",
    "Utilizzo risorse: > 2 ricoveri urgenti/non pianificati ultimi 6 mesi",
    "Utilizzo risorse: Aumento domanda/interventi"
  ];

const SPECIFICI = [
    "Cancro",
    "Patologie polmonari croniche",
    "Patologie cardiache croniche",
    "Demenza",
    "Fragilità",
    "Patologie neurovascolari croniche (ictus)",
    "Patologie neurologiche croniche: SM/SLA/Parkinson",
    "Patologie epatiche croniche",
    "Patologia renale cronica"
  ];

function formatDateIt(str) {
  if (!str) return '';
  if (str.includes('/')) return str;
  const parts = str.split('-');
  if (parts.length === 3) {
    return `${parts[2].padStart(2,'0')}/${parts[1].padStart(2,'0')}/${parts[0]}`;
  }
  return str;
}

document.addEventListener('DOMContentLoaded', function () {
  const container = document.getElementById('documenti-container');
  const sedContainer = document.getElementById('documenti-sedazione');
  if (!container && !sedContainer) return;

  window.patientDocs = [];
  window.sedationDocs = [];

  function renderList(el, docs) {
    if (!el) return;
    el.innerHTML = '';
    if (docs.length === 0) {
      const p = document.createElement('p');
      p.className = 'text-muted';
      p.textContent = 'Nessun documento disponibile.';
      el.appendChild(p);
      return;
    }
    docs.forEach((doc, idx) => {
      const card = document.createElement('div');
      card.className = 'doc-card';
      card.innerHTML = `
        <button class="delete-btn" data-index="${idx}">&times;</button>
        <div class="doc-type">${doc.title}</div>
        <div class="doc-date">${doc.date}</div>
        <div class="doc-desc">${doc.desc}</div>
        <div class="card-actions">
          <button class="view-btn" data-index="${idx}">Visualizza</button>
          <button class="pdf-btn" data-index="${idx}">Scarica PDF</button>
        </div>`;
      el.appendChild(card);
    });
  }

  function render() {
    renderList(container, patientDocs);
    renderList(sedContainer, sedationDocs);
  }

  window.addPatientDoc = function(doc) {
    if (doc.type === 'sedazione') {
      sedationDocs.push(doc);
    } else {
      patientDocs.push(doc);
    }
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
      case 'sedazione':
        if (doc.html) pdfFromHtml(doc.html, 'sedazione.pdf');
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

  function attachHandlers(el, list) {
    if (!el) return;
    el.addEventListener('click', function(e) {
      if (e.target.classList.contains('view-btn')) {
        const doc = list[e.target.dataset.index];
        if (doc) showDoc(doc);
      } else if (e.target.classList.contains('pdf-btn')) {
        const doc = list[e.target.dataset.index];
        if (doc) downloadDoc(doc);
      } else if (e.target.classList.contains('delete-btn')) {
        const idx = parseInt(e.target.dataset.index, 10);
        if (!isNaN(idx)) {
          if (confirm('Eliminare il documento?')) {
            list.splice(idx, 1);
            render();
          }
        }
      }
    });
  }

  attachHandlers(container, patientDocs);
  attachHandlers(sedContainer, sedationDocs);

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

window.saveRiepilogoDoc = function() {
  let html = '';
  if (window.buildPreviewContent) {
    const el = window.buildPreviewContent();
    html = el.outerHTML || '';
  }
  addPatientDoc({
    title: 'Riepilogo farmaci',
    date: formatDateIt(new Date().toISOString().slice(0,10)),
    desc: 'Farmaci sintomatici attuali',
    type: 'riepilogo',
    html: html
  });
};

window.saveSedazioneDoc = function() {
  let html = '';
  if (window.buildSedazioneContent) {
    const el = window.buildSedazioneContent();
    html = el.outerHTML || '';
  }
  addPatientDoc({
    title: 'Riepilogo sedazione',
    date: formatDateIt(new Date().toISOString().slice(0,10)),
    desc: 'Sedazione palliativa',
    type: 'sedazione',
    html: html
  });
};

document.addEventListener('DOMContentLoaded', function () {

  const savePdfBtn = document.getElementById('btn-save-pdf');
  if (savePdfBtn) {
    savePdfBtn.addEventListener('click', downloadNecpalPdf);
  }

  const necpalForm = document.getElementById('necpal-form');
  const resultBox = document.getElementById('necpal-result');
  const previewBox = document.getElementById('necpal-preview');
  const viewBtn = document.getElementById('btn-view-necpal');

  function buildNecpalHtml(fd) {
    const date1 = formatDateIt(fd.get('date_1'));
    const name  = fd.get('text_1');
    const dob   = formatDateIt(fd.get('date_2'));
    const q     = fd.get('radio_1');
    const cb1   = fd.get('checkbox_1') ? true : false;
    const cb2   = fd.get('checkbox_2') ? true : false;
    const cb3Sel = new Set(fd.getAll('checkbox_3[]'));
    const cb4Sel = new Set(fd.getAll('checkbox_4[]'));
    const items = [];
    items.push(['Scelta/Richiesta approccio palliativo', cb1]);
    items.push(['Bisogni identificati dai sanitari', cb2]);
    CLINICI.forEach(l => items.push([l, cb3Sel.has(l)]));
    SPECIFICI.forEach(l => items.push([l, cb4Sel.has(l)]));
    const rows = items.map((it, i) => {
      const bg = i % 2 ? '#f2f2f2' : '#ffffff';
      return `<tr style="background:${bg};">
                <td style="width:40px;text-align:center;border:1px solid #ccc;">${it[1] ? 'X' : ''}</td>
                <td style="border:1px solid #ccc;padding:4px 6px;">${it[0]}</td>
              </tr>`;
    }).join('');
    const positive = q === 'two' && items.some(i => i[1]) ? 'POSITIVO' : 'NEGATIVO';
    const medicoName = (window.medicoData && (medicoData.nome || medicoData.titolo))
      ? `${medicoData.titolo || ''} ${medicoData.nome || ''}`.trim()
      : '';
    const header = medicoName ?
        `<div style="background:#e0e0e0; padding:6px; text-align:center; font-weight:bold;">Ambulatorio MMG – ${medicoName}</div>`
        : '';
    return `
      <div style="font-family: Helvetica, Arial, sans-serif; font-size:11pt;">
        ${header}
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
      const url = necpalForm.getAttribute('action') || 'process-necpal.php';
      fetch(url, { method: 'POST', body: fd })
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
              date: formatDateIt(new Date().toISOString().slice(0,10)),
              desc: 'Score NECPAL completo',
              type: 'necpal',
              html: html
            });
          } else {
            const msg = res.errors ? res.errors.join('\n') : (res.error || 'Errore durante il salvataggio');
            alert(msg);
          }
        })
        .catch(err => {
          alert('Errore durante il salvataggio');
          console.error('NECPAL save error', err);
        });
    });
  }

  if (viewBtn && previewBox) {
    viewBtn.addEventListener('click', () => {
      const html = previewBox.innerHTML.trim();
      if (!html) return alert('Anteprima non disponibile.');
      const modalBody = document.getElementById('preview-content-home');
      if (!modalBody) return alert('Anteprima non disponibile.');
      modalBody.innerHTML = html;
      new bootstrap.Modal(document.getElementById('preview-modal-home')).show();
    });
  }
});
