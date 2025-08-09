// Variabili globali IDC-PAL
let idcpalCounts = { C: 0, AC: 0 };
let selectedItems = new Set();

// Inizializzazione
document.addEventListener('DOMContentLoaded', function() {
  const today = new Date().toISOString().split('T')[0];
  const compilationDate = document.getElementById('idcpal-compilation-date');
  if (compilationDate) compilationDate.value = today;
  
  setupIDCPALListeners();
  animateIDCPALElements();
});

// Funzione per cambiare modalità (come switchMode in ESAS)
function switchIDCPALMode(mode) {
  const container = document.getElementById('idcpal-home');
  if (!container) return;
  container.querySelectorAll('.mode-btn').forEach(btn => btn.classList.remove('active'));
  const btn = container.querySelector('#idcpal-' + mode + '-btn');
  if (btn) btn.classList.add('active');
  container.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
  const section = container.querySelector('#idcpal-' + mode + '-section');
  if (section) section.classList.add('active');
}

// Setup event listeners
function setupIDCPALListeners() {
  // Gestione click sulle opzioni di classificazione
  document.querySelectorAll('.classification-option').forEach(opt => {
    opt.addEventListener('click', () => {
      document.querySelectorAll('.classification-option').forEach(o => o.classList.remove('selected'));
      opt.classList.add('selected');
      const radio = opt.querySelector('input[type="radio"]'); 
      if (radio) radio.checked = true;
    });
  });
}

// Funzione per toggle degli elementi (come selectScore in ESAS)
function toggleIDCPALItem(code, level) {
  const row = document.querySelector(`.complexity-item[data-code="${code}"]`);
  const cb = document.getElementById(`item-${code}`);
  if (!row || !cb) return;
  
  if (cb.checked) { 
    row.classList.add('selected'); 
    selectedItems.add(code);
    idcpalCounts[level] = (idcpalCounts[level] || 0) + 1; 
  } else { 
    row.classList.remove('selected'); 
    selectedItems.delete(code);
    idcpalCounts[level] = Math.max(0, (idcpalCounts[level] || 0) - 1); 
  }
  
  updateIDCPALCounts();
}

// Funzione per aggiornare i conteggi (come updateResults in ESAS)
function updateIDCPALCounts() {
  const c = document.getElementById('idcpal-count-c');
  const ac = document.getElementById('idcpal-count-ac');
  if (c) c.textContent = `${idcpalCounts.C || 0} C`;
  if (ac) ac.textContent = `${idcpalCounts.AC || 0} AC`;
  
  // Auto-classificazione basata sui conteggi
  autoClassifyComplexity();
}

// Classificazione automatica
function autoClassifyComplexity() {
  const totalAC = idcpalCounts.AC || 0;
  const totalC = idcpalCounts.C || 0;
  
  let suggestedClass = '';
  if (totalAC > 0) {
    suggestedClass = 'altamente-complessa';
  } else if (totalC > 0) {
    suggestedClass = 'complessa';
  } else {
    suggestedClass = 'non-complessa';
  }
  
  // Suggerimento visivo senza forzare la selezione
  document.querySelectorAll('.classification-option').forEach(opt => {
    opt.style.border = opt.dataset.value === suggestedClass ? 
      '2px solid #28a745' : '2px solid #e9ecef';
  });
}

// Funzione per salvare la valutazione (come saveESAS)
function saveIDCPAL() {
  const patientName = document.getElementById('idcpal-patient-name')?.value || '';
  const compilationDate = document.getElementById('idcpal-compilation-date')?.value || '';
  
  if (!patientName) {
    alert('Inserire il nome del paziente');
    return;
  }
  
  if (selectedItems.size === 0) {
    alert('Selezionare almeno un elemento prima di salvare');
    return;
  }
  
  const finalClassification = document.querySelector('input[name="idcpal-classification"]:checked')?.value || '';
  
  const data = {
    paziente: patientName,
    data: compilationDate,
    elementiSelezionati: Array.from(selectedItems),
    conteggi: idcpalCounts,
    classificazione: finalClassification,
    completato: new Date().toISOString()
  };
  
  // Salvataggio localStorage (come ESAS)
  const savedAssessments = JSON.parse(localStorage.getItem('idcpal_assessments') || '[]');
  savedAssessments.push(data);
  localStorage.setItem('idcpal_assessments', JSON.stringify(savedAssessments));
  
  alert('Valutazione IDC-PAL salvata con successo!');
}

// Funzione per azzerare il form (come resetESAS)
function resetIDCPAL() {
  if (confirm('Sei sicuro di voler azzerare tutti i dati?')) {
    idcpalCounts = { C: 0, AC: 0 };
    selectedItems.clear();
    
    document.querySelectorAll('.item-checkbox').forEach(cb => cb.checked = false);
    document.querySelectorAll('.complexity-item').forEach(el => el.classList.remove('selected'));
    updateIDCPALCounts();
    
    ['idcpal-patient-name', 'idcpal-patient-birth', 'idcpal-compilation-date'].forEach(id => {
      const el = document.getElementById(id);
      if (el && id !== 'idcpal-compilation-date') el.value = '';
    });

    document.querySelectorAll('input[name="idcpal-classification"]').forEach(r => r.checked = false);
    document.querySelectorAll('.classification-option').forEach(o => {
      o.classList.remove('selected');
      o.style.border = '2px solid #e9ecef';
    });
  }
}

// Funzione per stampare la valutazione compilata (come printESAS)
function printIDCPAL() {
  const patientName = document.getElementById('idcpal-patient-name')?.value || 'Paziente';
  const compilationDate = document.getElementById('idcpal-compilation-date')?.value || new Date().toISOString().split('T')[0];
  const finalClassification = document.querySelector('input[name="idcpal-classification"]:checked')?.value || 'Non specificata';
  
  // Raccolta elementi selezionati con dettagli
  const selectedItemsDetails = [];
  document.querySelectorAll('.item-checkbox:checked').forEach(cb => {
    const item = cb.closest('.complexity-item');
    const code = item.querySelector('.item-code').textContent;
    const text = item.querySelector('.item-text').textContent;
    const level = item.querySelector('.item-badge').textContent;
    selectedItemsDetails.push({ code, text, level });
  });
  
  let reportContent = `
    <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px;">
      <div style="text-align: center; border-bottom: 2px solid #5cb85c; padding-bottom: 20px; margin-bottom: 30px;">
        <h1 style="color: #5cb85c; margin-bottom: 10px;">IDC-PAL - Valutazione Compilata</h1>
        <h3 style="color: #6c757d;">Instrumento Diagnóstico de Complejidad</h3>
      </div>
      
      <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
        <h4>Dati Paziente</h4>
        <p><strong>Nome:</strong> ${patientName}</p>
        <p><strong>Data compilazione:</strong> ${new Date(compilationDate).toLocaleDateString('it-IT')}</p>
        <p><strong>Classificazione:</strong> <span style="font-weight: bold; color: #5cb85c;">${finalClassification.replace('-', ' ').toUpperCase()}</span></p>
      </div>
      
      <div style="background: #e7f3ff; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
        <h4 style="color: #1976d2;">Riepilogo Valutazione</h4>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
          <div><strong>Elementi C:</strong> ${idcpalCounts.C || 0}</div>
          <div><strong>Elementi AC:</strong> ${idcpalCounts.AC || 0}</div>
        </div>
      </div>`;
  
  if (selectedItemsDetails.length > 0) {
    reportContent += `
      <h5>Elementi Selezionati</h5>
      <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead>
          <tr style="background: #f8f9fa;">
            <th style="border: 1px solid #333; padding: 12px; text-align: left;">Codice</th>
            <th style="border: 1px solid #333; padding: 12px; text-align: left;">Descrizione</th>
            <th style="border: 1px solid #333; padding: 12px; text-align: center;">Livello</th>
          </tr>
        </thead>
        <tbody>`;
    
    selectedItemsDetails.forEach(item => {
      const badgeColor = item.level === 'AC' ? '#f8d7da' : '#fff3cd';
      const textColor = item.level === 'AC' ? '#721c24' : '#856404';
      reportContent += `
        <tr>
          <td style="border: 1px solid #333; padding: 12px;"><strong>${item.code}</strong></td>
          <td style="border: 1px solid #333; padding: 12px;">${item.text}</td>
          <td style="border: 1px solid #333; padding: 12px; text-align: center;">
            <span style="background: ${badgeColor}; color: ${textColor}; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">${item.level}</span>
          </td>
        </tr>`;
    });
    
    reportContent += `</tbody></table>`;
  }
  
  reportContent += `
      <div style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid #dee2e6; color: #666; font-size: 0.8rem; text-align: center;">
        Report generato automaticamente dal sistema IDC-PAL - ${new Date().toLocaleDateString('it-IT')}
      </div>
    </div>`;
  
  const printWindow = window.open('', '_blank');
  printWindow.document.write(`
    <html>
      <head>
        <title>IDC-PAL - ${patientName}</title>
        <style>@media print { body { margin: 0; } }</style>
      </head>
      <body>${reportContent}</body>
    </html>`);
  printWindow.document.close();
  printWindow.print();
}

// Funzione per stampare il template (come printTemplate in ESAS)
function printIDCPALTemplate() {
  const templateContent = document.querySelector('#idcpal-visualize-section .pdf-template').innerHTML;
  const printWindow = window.open('', '_blank');
  printWindow.document.write(`
    <html>
      <head>
        <title>IDC-PAL - Template</title>
        <style>
          body { font-family: 'Times New Roman', serif; margin: 20px; }
          .badge-c { background: #fff3cd; color: #856404; border: 1px solid #ffeaa7; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
          .badge-ac { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
          @media print { body { margin: 0; } }
        </style>
      </head>
      <body>${templateContent}</body>
    </html>`);
  printWindow.document.close();
  printWindow.print();
}

// Funzione per scaricare il template (simulata, come in ESAS)
function downloadIDCPALTemplate() {
  alert('Funzionalità di download PDF in sviluppo. Per ora utilizza la stampa per salvare come PDF.');
}

// Funzioni per il glossario inline
function toggleGlossaryInline(code) {
  const glossary = document.getElementById(`glossary-${code}`);
  if (!glossary) return;
  
  document.querySelectorAll('.inline-glossary').forEach(g => {
    if (g.id !== `glossary-${code}`) {
      g.style.display = 'none';
    }
  });
  
  if (glossary.style.display === 'none' || !glossary.style.display) {
    glossary.style.display = 'block';
  } else {
    glossary.style.display = 'none';
  }
}

// Funzioni per il glossario
function filterIDCPALGlossary() {
  const query = (document.getElementById('idcpal-glossary-search')?.value || '').toLowerCase();
  document.querySelectorAll('#idcpal-glossary-content .glossary-item').forEach(item => {
    const text = item.textContent.toLowerCase();
    item.style.display = text.includes(query) ? '' : 'none';
  });
}

function toggleIDCPALGlossary(header) {
  const content = header.nextElementSibling;
  if (!content) return;
  
  content.classList.toggle('show');
  const chevron = header.querySelector('.fa-chevron-right');
  if (chevron) {
    chevron.style.transform = content.classList.contains('show') ? 'rotate(90deg)' : 'rotate(0)';
  }
}

// Animazioni di entrata (come animateElements in ESAS)
function animateIDCPALElements() {
  const elements = document.querySelectorAll('.complexity-item');
  elements.forEach((element, index) => {
    element.style.opacity = '0';
    element.style.transform = 'translateY(20px)';
    setTimeout(() => {
      element.style.transition = 'all 0.4s ease';
      element.style.opacity = '1';
      element.style.transform = 'translateY(0)';
    }, index * 100);
  });
}

// Gestione chiusura con ESC (opzionale, per consistenza con altri moduli)
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    // Eventuale logica per chiudere modal se necessario
  }
});

console.log('✅ IDC-PAL JavaScript caricato correttamente');
