// js/app.js
// Logica principale per Dashboard, Gestione Sintomi, Identificazione NECPAL, modali e export

document.addEventListener("DOMContentLoaded", function() {
  // ──────────────────────────────
  // 1) NAVIGAZIONE TRA LE SEZIONI
  // ──────────────────────────────
  document.querySelectorAll('.sidebar .nav-link[data-target]').forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const sections = ['dashboard-home','gestione-home','gestione-sedazione','identificazione-home','equianalgesia-section','rescue-section'];
      sections.forEach(id => {
        const sec = document.getElementById(id);
        if (sec) sec.style.display = 'none';
      });
      if (this.dataset.target !== 'gestione-sedazione' && typeof window.resetSedationUI === 'function') {
        window.resetSedationUI();
        const sintSelect = document.getElementById('sintomo-home');
        if (sintSelect) sintSelect.value = '';
      }
      const tgt = this.dataset.target;
      const targetEl = document.getElementById(tgt);
      if (targetEl) {
        targetEl.style.display = 'block';
        targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
      document.querySelectorAll('.sidebar .nav-link').forEach(x=>x.classList.remove('active'));
      this.classList.add('active');
    });
  });
  document.getElementById('dashboard-home').style.display = 'block';

  // ──────────────────────────────
  // 2) DATA ODIERNA NEL HEADER
  // ──────────────────────────────
  const dateHome = document.getElementById('today-date-home');
  if (dateHome) dateHome.textContent = new Date().toLocaleDateString('it-IT');

  // ──────────────────────────────
  // 3) GESTIONE SINTOMI
  // ──────────────────────────────
  const dolore = {
    "Morfina": {
      "Oramorph gocce": ["Orale", "5–10 mg (4–8 gtt)", "Ogni 4 ore"],
      "Morfina SC":     ["SC",    "5–10 mg",           "Ogni 4 ore"],
      "MST RP":         ["Orale", "10–20 mg",          "Ogni 12 ore"]
    },
    "Ossicodone": {
      "Oxynorm gocce":  ["Orale", "5–10 mg",           "Ogni 4–6 ore"],
      "Oxycontin RP":   ["Orale", "10–20 mg",          "Ogni 12 ore"],
      "Targin RP":      ["Orale", "10/5 mg",           "Ogni 12 ore"]
    },
    "Fentanil": {
      "Cerotto": ["TTS",   "12–25 mcg/h", "72h"],
      "Spray":   ["Nasale","100–400 mcg", "Al bisogno"]
    }
  };
  const altriSintomi = {
    "Dispnea": {
      "Ossigeno":   ["Nasale", "1–4 L/min", "Continuo"],
      "Morfina SC": ["SC",     "1–2 mg",    "Ogni 4h"]
    },
    "Delirio": {
      "Aloperidolo": ["SC", "0,5–1 mg", "Ogni 8–12h"]
    },
    "Nausea": {
      "Metoclopramide": ["SC", "10 mg", "Ogni 8h"],
      "Ondansetron":    ["OS", "4 mg",  "Ogni 8h"]
    },
    "Ansia": {
      "Lorazepam": ["OS", "0,5–1 mg",  "Ogni 8–12h"],
      "Diazepam":  ["OS", "2–5 mg",   "1–2 volte"]
    },
    "Stipsi": {
      "Macrogol": ["OS", "1–3 bustine", "1 volta"],
      "Senna":    ["OS", "2–4 cp",      "La sera"]
    }
  };
  const sintomi = ["Dolore", ...Object.keys(altriSintomi),"Sedazione Palliativa","Altro" ];
  window.terapie = window.terapie || [];
  let editingIndex = null;

  // Riferimenti al DOM
  const sintomoSelect      = document.getElementById('sintomo-home');
  const farmacoSelect      = document.getElementById('farmaco-home');
  const formulazioneSelect = document.getElementById('formulazione-home');
  const customSintomoGroup = document.getElementById('custom-sintomo-group-home');
  const customSintomoInput = document.getElementById('custom-sintomo-home');
  const customFarmacoInput = document.getElementById('custom-farmaco-home');
  const customFormInput    = document.getElementById('custom-formulazione-home');
  const formulazioneGroup  = document.getElementById('formulazione-group-home');
  const viaInput           = document.getElementById('via-home');
  const doseInput          = document.getElementById('dose-home');
  const posologiaInput     = document.getElementById('posologia-home');
  const frequenzaInput     = document.getElementById('frequenza-home');
  const tbody              = document.querySelector('#table-terapie-home tbody');
  const formCol            = document.getElementById('form-col-home');

  // Popola Sintomi
  sintomoSelect.innerHTML = '<option value="">-- Seleziona --</option>';
  sintomi.forEach(s => {
    const o = document.createElement('option'); o.value = s; o.textContent = s;
    sintomoSelect.appendChild(o);
  });

  // Funzioni di gestione form
  function populate(sel, items) {
    sel.innerHTML = '<option value="">--</option>';
    items.forEach(i => { const opt = document.createElement('option'); opt.value = i; opt.textContent = i; sel.appendChild(opt); });
  }
  function resetFormHome() {
    farmacoSelect.innerHTML = '';
    formulazioneSelect.innerHTML = '';
    farmacoSelect.disabled = true;
    formulazioneSelect.disabled = true;
    customSintomoGroup.style.display = 'none';
    customFarmacoInput.style.display = 'none';
    customFormInput.style.display = 'none';
    formulazioneGroup.style.display = 'none';
    viaInput.value = doseInput.value = posologiaInput.value = frequenzaInput.value = '';
    viaInput.readOnly = doseInput.readOnly = true;
    editingIndex = null;
    document.getElementById('btn-add-home').textContent = 'Aggiungi';
  }
  function onSintomoChangeHome() {
  resetFormHome();
  // Nascondi tutte le sezioni di sintomo
  document.querySelectorAll('.sintomo-section').forEach(sec => sec.style.display = 'none');
  const s = sintomoSelect.value;
  if (typeof window.resetSedationUI === 'function' && s !== 'Sedazione Palliativa') {
    window.resetSedationUI();
  }
  const homeSec = document.querySelector('.sintomo-section[data-sintomo="gestione-home"]');
  if (homeSec) homeSec.style.display = 'block';
  if (formCol) formCol.style.display = s === 'Sedazione Palliativa' ? 'none' : '';
  if (s === 'Sedazione Palliativa') {
    const sec = document.querySelector('.sintomo-section[data-sintomo="Sedazione Palliativa"]');
    if (sec) sec.style.display = 'block';
    if (typeof window.moveTableToSedation === 'function') window.moveTableToSedation();
  } else if (s === 'Dolore') {
    populate(farmacoSelect, Object.keys(dolore));
    farmacoSelect.disabled = false;
    formulazioneGroup.style.display = 'block';
  } else if (s === 'Altro') {
    customSintomoGroup.style.display = 'block';
    customFarmacoInput.style.display = 'block';
  } else if (s) {
    populate(farmacoSelect, Object.keys(altriSintomi[s]));
    farmacoSelect.disabled = false;
  }
}
  function onFarmacoChangeHome() {
    const s = sintomoSelect.value;
    if (s === 'Dolore') {
      populate(formulazioneSelect, Object.keys(dolore[farmacoSelect.value]));
      formulazioneSelect.disabled = false;
    } else if (s && s !== 'Altro') {
      const arr = altriSintomi[s][farmacoSelect.value];
      viaInput.readOnly = doseInput.readOnly = false;
      viaInput.value = arr[0] || '';
      doseInput.value = arr[1] || '';
      if (!posologiaInput.value) posologiaInput.value = arr[2] || '';
      if (!frequenzaInput.value) frequenzaInput.value = arr[3] || '';
    }
  }
  function onFormulazioneChangeHome() {
    const arr = dolore[farmacoSelect.value][formulazioneSelect.value];
    viaInput.readOnly = doseInput.readOnly = false;
    viaInput.value = arr[0] || '';
    doseInput.value = (arr[1]||'').split('(')[0].trim();
    if (!posologiaInput.value) {
      const m = (arr[1]||'').match(/\(([^)]+)\)/);
      posologiaInput.value = m ? m[1] : '';
    }
    if (!frequenzaInput.value) frequenzaInput.value = arr[2] || '';
  }
  function addTerapiaHome() {
    const s = sintomoSelect.value;
    let sint = s, farm = '', frm = '';
    if (s === 'Altro') {
      sint = customSintomoInput.value.trim();
      farm = customFarmacoInput.value.trim();
      if (!sint||!farm) return alert('Inserisci sintomo e farmaco');
    } else if (s === 'Dolore') {
      farm = farmacoSelect.value;
      frm  = formulazioneSelect.value;
      if (!farm||!frm) return alert('Seleziona farmaco e formulazione');
    } else {
      farm = farmacoSelect.value;
      if (!farm) return alert('Seleziona farmaco');
    }
    const rec = { sintomo:sint, farmaco:frm||farm, via:viaInput.value, dose:doseInput.value, poso:posologiaInput.value, freq:frequenzaInput.value };
    if (editingIndex!==null) window.terapie[editingIndex]=rec; else window.terapie.push(rec);
    resetFormHome(); renderTableHome();
  }
  function renderTableHome() {
    tbody.innerHTML = '';
    window.terapie.forEach((t,i)=>{
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${t.sintomo}</td><td>${t.farmaco}</td><td>${t.via}</td><td>${t.dose}</td><td>${t.poso}</td><td>${t.freq}</td><td><button class="btn btn-sm btn-secondary del-btn" data-i="${i}"><i class="fas fa-trash"></i></button></td>`;
      tbody.appendChild(tr);
    });
    tbody.querySelectorAll('.del-btn').forEach(b=>b.onclick=e=>{window.terapie.splice(+e.currentTarget.dataset.i,1);resetFormHome();renderTableHome();});
  }
  window.renderTableHome = renderTableHome;
  sintomoSelect.onchange       = onSintomoChangeHome;
  farmacoSelect.onchange       = onFarmacoChangeHome;
  formulazioneSelect.onchange  = onFormulazioneChangeHome;
  document.getElementById('btn-add-home').onclick = addTerapiaHome;
  resetFormHome(); renderTableHome();

  // ──────────────────────────────
  // 4) DOSE RESCUE
  // ──────────────────────────────
  function calculateRescueHome() {
    const totEl  = document.getElementById('rescue-total');
    const typeEl = document.getElementById('rescue-type');
    const resEl  = document.getElementById('rescue-result');
    if (!totEl||!typeEl||!resEl) return;
    const tot = parseFloat(totEl.value);
    if (isNaN(tot)) return alert('Valore non valido');
    const facMap = { 'Morfina orale':1, 'Morfina SC':2, 'Ossicodone orale':1.5, 'Fentanil TTS':0.03 };
    const fac = facMap[typeEl.value]||1;
    resEl.value = Math.round((tot/6)/fac*100)/100 + ' mg';
  }
  const calculateRescueBtn = document.getElementById('calculate-rescue-btn');
  if (calculateRescueBtn) calculateRescueBtn.addEventListener('click', calculateRescueHome);

  // ──────────────────────────────
  // 5) DATI MEDICO
  // ──────────────────────────────
  // Dati del medico, inizialmente vuoti. Verranno compilati tramite la modale
  // "Dati Medico" e usati nell'anteprima e nell'esportazione Word.
  let medicoData = {
    titolo:       '',
    nome:         '',
    studio:       '',
    specializzazioni: [],
    codice:       '',
    indirizzi:    [],
    telefoni:     [],
    mails:        [],
    luogo:        '',
    data:         ''
  };

  const medicoTestData = {
    titolo: 'Dott.',
    nome: 'Mario Rossi',
    studio: 'ASL Roma 1',
    specializzazioni: ['Medico di medicina generale'],
    codice: '123456',
    indirizzi: ['via delle Rose 10 - Roma'],
    telefoni: ['3331234567'],
    mails: ['mario.rossi@example.com'],
    luogo: 'Roma',
    data: '2025-07-06'
  };

  // Popola i campi della modale con i valori correnti quando viene aperta
  const medicoModal = document.getElementById('medico-modal-home');
  const titoloSelect = document.getElementById('medico-titolo-select');
  const titoloCustom = document.getElementById('medico-titolo-custom');
  const specList = document.getElementById('spec-list');
  const indirizzoList = document.getElementById('indirizzo-list');
  const telList = document.getElementById('tel-list');
  const mailList = document.getElementById('mail-list');
  const useTestCheckbox = document.getElementById('medico-use-test');

  function setMedicoFormValues(data) {
    const titoliPredef = ['Dott.','Dott.ssa','Prof.','Prof.ssa'];
    if (data.titolo && titoliPredef.includes(data.titolo)) {
      titoloSelect.value = data.titolo;
      titoloCustom.value = '';
    } else if (data.titolo) {
      titoloSelect.value = 'custom';
      titoloCustom.value = data.titolo;
    } else {
      titoloSelect.value = '';
      titoloCustom.value = '';
    }
    updateTitoloVisibility();
    document.getElementById('medico-nome-input').value   = data.nome || '';
    document.getElementById('medico-studio-input').value = data.studio || '';
    fillList(specList, data.specializzazioni || [], '.spec-input');
    document.getElementById('medico-codice-input').value = data.codice || '';
    fillList(indirizzoList, data.indirizzi || [], '.indirizzo-input');
    fillList(telList, data.telefoni || [], '.tel-input');
    fillList(mailList, data.mails || [], '.mail-input');
    document.getElementById('medico-luogo-input').value  = data.luogo || '';
    document.getElementById('medico-data-input').value   = data.data || '';
  }

  function toggleMedicoTestData() {
    if (useTestCheckbox && useTestCheckbox.checked) {
      setMedicoFormValues(medicoTestData);
    } else {
      setMedicoFormValues({titolo:'',nome:'',studio:'',specializzazioni:[],codice:'',indirizzi:[],telefoni:[],mails:[],luogo:'',data:''});
    }
  }

  if (useTestCheckbox) useTestCheckbox.addEventListener('change', toggleMedicoTestData);
  function updateTitoloVisibility() {
    if (!titoloSelect) return;
    if (titoloSelect.value === 'custom') {
      titoloCustom.classList.remove('d-none');
    } else {
      titoloCustom.classList.add('d-none');
    }
  }
  if (titoloSelect) titoloSelect.addEventListener('change', updateTitoloVisibility);
  function fillList(container, values, inputSelector) {
    if (!container) return;
    const template = container.querySelector(':scope > div');
    container.innerHTML = '';
    (values && values.length ? values : ['']).forEach(v => {
      const clone = template.cloneNode(true);
      const input = clone.querySelector('input');
      if (input) input.value = v;
      container.appendChild(clone);
    });
  }
  function getListValues(container, selector) {
    if (!container) return [];
    return Array.from(container.querySelectorAll(selector)).map(i => i.value.trim()).filter(Boolean);
  }

  function formatDateIt(dateStr) {
    if (!dateStr) return new Date().toLocaleDateString('it-IT');
    const d = new Date(dateStr);
    if (isNaN(d)) return dateStr;
    return d.toLocaleDateString('it-IT');
  }
  if (medicoModal) {
    medicoModal.addEventListener('shown.bs.modal', () => {
      const titoliPredef = ['Dott.','Dott.ssa','Prof.','Prof.ssa'];
      if (!medicoData.titolo) {
        titoloSelect.value = '';
        titoloCustom.value = '';
      } else if (titoliPredef.includes(medicoData.titolo)) {
        titoloSelect.value = medicoData.titolo;
        titoloCustom.value = '';
      } else {
        titoloSelect.value = 'custom';
        titoloCustom.value = medicoData.titolo;
      }
      updateTitoloVisibility();
      document.getElementById('medico-nome-input').value   = medicoData.nome;
      document.getElementById('medico-studio-input').value = medicoData.studio;
      fillList(specList, medicoData.specializzazioni, '.spec-input');
      document.getElementById('medico-codice-input').value = medicoData.codice;
      fillList(indirizzoList, medicoData.indirizzi, '.indirizzo-input');
      fillList(telList, medicoData.telefoni, '.tel-input');
      fillList(mailList, medicoData.mails, '.mail-input');
      document.getElementById('medico-luogo-input').value = medicoData.luogo;
      document.getElementById('medico-data-input').value  = medicoData.data || new Date().toISOString().split('T')[0];
      if (useTestCheckbox && useTestCheckbox.checked) toggleMedicoTestData();
    });
  }
  function saveMedicoHome() {
    medicoData.titolo = (titoloSelect.value === 'custom') ? titoloCustom.value.trim() : titoloSelect.value;
    medicoData.nome     = document.getElementById('medico-nome-input').value;
    medicoData.studio   = document.getElementById('medico-studio-input').value;
    medicoData.specializzazioni = getListValues(specList, '.spec-input');
    medicoData.codice   = document.getElementById('medico-codice-input').value;
    medicoData.indirizzi= getListValues(indirizzoList, '.indirizzo-input');
    medicoData.telefoni = getListValues(telList, '.tel-input');
    medicoData.mails    = getListValues(mailList, '.mail-input');
    medicoData.luogo    = document.getElementById('medico-luogo-input').value;
    medicoData.data     = document.getElementById('medico-data-input').value;

    // Chiude la modale dopo il salvataggio
    bootstrap.Modal.getInstance(document.getElementById('medico-modal-home')).hide();
  }
  const saveMedicoBtn = document.getElementById('save-medico-btn');
  if (saveMedicoBtn) saveMedicoBtn.addEventListener('click', saveMedicoHome);

  // ──────────────────────────────

// 6) GENERAZIONE CONTENUTO DOCUMENTO
function buildPreviewContent() {
  const cont = document.createElement('div');
  cont.className = 'doc-container';
  const header = document.createElement('div');
  header.className = 'header-left';
  const h1 = document.createElement('h5');
  h1.textContent = `${medicoData.titolo} ${medicoData.nome}`.trim();
  h1.style.color = '#000';
  header.appendChild(h1);
  const h2 = document.createElement('h6');
  h2.textContent = 'Medico Chirurgo';
  h2.style.fontStyle = 'italic';
  h2.style.color = '#000';
  header.appendChild(h2);
  cont.appendChild(header);
  medicoData.specializzazioni.forEach(sp => { const p = document.createElement('p'); p.textContent = sp; cont.appendChild(p); });
  if (medicoData.studio) { const p = document.createElement('p'); p.textContent = medicoData.studio; cont.appendChild(p); }
  if (medicoData.codice) { const p = document.createElement('p'); p.textContent = `Cod. Reg.: ${medicoData.codice}`; cont.appendChild(p); }
  medicoData.indirizzi.forEach(a => { const p = document.createElement('p'); p.textContent = a; cont.appendChild(p); });
  medicoData.telefoni.forEach(t => { const p = document.createElement('p'); p.textContent = `Tel. ${t}`; cont.appendChild(p); });
  medicoData.mails.forEach(m => { const p = document.createElement('p'); p.textContent = m; cont.appendChild(p); });
  const pDate = document.createElement('p');
  const loc = medicoData.luogo ? medicoData.luogo + ', ' : '';
  pDate.textContent = loc + formatDateIt(medicoData.data);
  pDate.classList.add('text-end');
  pDate.style.fontStyle = 'italic';
  cont.appendChild(pDate);
  const tbl = document.createElement('table'); tbl.className = 'summary-table';
  tbl.style.marginTop = '4rem';
  const theadRow = tbl.createTHead().insertRow();
  ['Sintomo','Farmaco','Via','Dose','Posologia','Frequenza'].forEach(txt => { const th = document.createElement('th'); th.textContent = txt; theadRow.appendChild(th); });
  const tb = tbl.createTBody();
  window.terapie.forEach(t => {
    const r = tb.insertRow();
    [t.sintomo,t.farmaco,t.via,t.dose,t.poso,t.freq].forEach((v,i) => { const c = r.insertCell(); c.textContent = v; if(i===0) c.style.fontWeight = 'bold'; });
    const sep = tb.insertRow(); sep.className = 'separator-row'; for(let i=0;i<6;i++) sep.insertCell();
  });
  cont.appendChild(tbl);
  const footer = document.createElement('div');
  footer.className = 'doc-footer';
  const psal = document.createElement('p'); psal.textContent = 'Cordiali saluti'; footer.appendChild(psal);
  const pfirma = document.createElement('p'); pfirma.textContent = `${medicoData.titolo} ${medicoData.nome}`.trim(); footer.appendChild(pfirma);
  cont.appendChild(footer);
  return cont;
}

function showPreviewHome() {
  const pc = document.getElementById('preview-content-home');
  pc.innerHTML = '';
  pc.appendChild(buildPreviewContent());
  new bootstrap.Modal(document.getElementById('preview-modal-home')).show();
}
  // ──────────────────────────────
  // 7) EXPORT WORD
  // ──────────────────────────────
  async function exportWordHome() {
    const { Document, Packer, Paragraph, Table, TableRow, TableCell, AlignmentType } = docx;

    const { BorderStyle, WidthType, TextRun, VerticalAlign } = docx;
    const header = [];
    if (medicoData.nome || medicoData.titolo) {
      header.push(new Paragraph({ alignment: AlignmentType.LEFT, children:[new TextRun({ text:`${medicoData.titolo} ${medicoData.nome}`.trim(), bold:true, size:26 })] }));
    }
    header.push(new Paragraph({ alignment: AlignmentType.LEFT, children:[new TextRun({ text:'Medico Chirurgo', italics:true, size:22 })] }));
    medicoData.specializzazioni.forEach(sp => header.push(new Paragraph({ text: sp }))); 
    if (medicoData.studio) header.push(new Paragraph({ text: medicoData.studio }));
    if (medicoData.codice) header.push(new Paragraph({ text:`Cod. Reg.: ${medicoData.codice}` }));
    medicoData.indirizzi.forEach(a => header.push(new Paragraph({ text:a }))); 
    medicoData.telefoni.forEach(t => header.push(new Paragraph({ text:`Tel. ${t}` }))); 
    medicoData.mails.forEach(m => header.push(new Paragraph({ text:m }))); 
    const locDate = (medicoData.luogo ? medicoData.luogo + ', ' : '') + formatDateIt(medicoData.data);
    header.push(new Paragraph({ text: locDate, alignment: AlignmentType.RIGHT, italics: true, spacing:{ after:200 } }));

    const rows = [];
    const headCells = ['Sintomo','Farmaco','Via','Dose','Posologia','Frequenza'].map(t => new TableCell({ children:[new Paragraph({ text:t, bold:true })], verticalAlign:VerticalAlign.CENTER }));
    rows.push(new TableRow({ children: headCells }));
    window.terapie.forEach(t => {
      rows.push(new TableRow({ children: [t.sintomo, t.farmaco, t.via, t.dose, t.poso, t.freq].map((v,i) => new TableCell({ children:[new Paragraph({ text:v, bold:i===0 })], verticalAlign:VerticalAlign.CENTER })) }));
      rows.push(new TableRow({ children: Array(6).fill(0).map(()=> new TableCell({ children:[], shading:{fill:'f0f0f0'} })) }));
    });
    const table = new Table({
      rows,
      width:{ size:100, type:WidthType.PERCENTAGE },
      borders:{
        top:{style:BorderStyle.NONE, size:0, color:'FFFFFF'},
        bottom:{style:BorderStyle.NONE, size:0, color:'FFFFFF'},
        left:{style:BorderStyle.NONE, size:0, color:'FFFFFF'},
        right:{style:BorderStyle.NONE, size:0, color:'FFFFFF'},
        insideH:{style:BorderStyle.SINGLE, size:1, color:'CCCCCC'},
        insideV:{style:BorderStyle.NONE, size:0, color:'FFFFFF'}
      }
    });

    const closing = [
      new Paragraph({ text:'Cordiali saluti', spacing:{ before:400 } }),
      new Paragraph({ text:`${medicoData.titolo} ${medicoData.nome}`.trim() })
    ];

    const doc = new Document({ sections:[{ children: [...header, table, ...closing] }] });
    const blob = await Packer.toBlob(doc);
    saveAs(blob, 'riepilogo.docx');
  }
  const exportHomeBtn = document.getElementById('btn-export-home');
  if (exportHomeBtn) exportHomeBtn.addEventListener('click', exportWordHome);
  window.exportWordHome = exportWordHome;

function exportPdfHome() {
  const element = buildPreviewContent();
  const opt = {
    margin: 0.5,
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
  };
  html2pdf().set(opt).from(element).toPdf().get('pdf').then(pdf => {
    const url = pdf.output('bloburl');
    window.open(url, '_blank');
  });
}
const exportPdfBtn = document.getElementById('btn-export-pdf-home');
if (exportPdfBtn) exportPdfBtn.addEventListener('click', exportPdfHome);
  // ──────────────────────────────
  // 8) POPUP NEC PAL
  // ──────────────────────────────
  document.querySelectorAll('.link-indicatore').forEach(el => el.addEventListener('click', function() {
    const p = document.getElementById(this.dataset.target); if (p) p.style.display='flex';
  }));
  document.querySelectorAll('.popup-indicatore .close-popup').forEach(b => b.addEventListener('click', () => b.closest('.popup-indicatore').style.display='none'));
  document.querySelectorAll('.popup-indicatore').forEach(ov => ov.addEventListener('click', e => { if (e.target===ov) ov.style.display='none'; }));
// Genera PDF per la sezione Identificazione
const savePdfBtn = document.getElementById('btn-save-pdf');
if (savePdfBtn) {
  savePdfBtn.addEventListener('click', () => {
    // Seleziona l'intera sezione di Identificazione
    const element = document.getElementById('identificazione-home');
    if (!element) return alert('Sezione identificazione non trovata.');

    // Opzioni PDF
    const opt = {
      margin:       0.5,               // margini in pollici
      filename:     'identificazione.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 },       // migliore risoluzione
      jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
    };

    // Genera e avvia il download
    html2pdf().set(opt).from(element).save();
  });
}

  // ──────────────────────────────
  // 9) EQUIANALGESIA
  // ──────────────────────────────
  const equivalenze = {
    morfina_orale: 1,
    ossicodone_orale: 1.5,
    morfina_ev: 3,
    fentanil_tts: 0.03 // esempio: 1 mcg/h ≈ 3 mg morfina orale
  };

  function getEquivalentDose(drug, dose) {
    const coeff = equivalenze[drug] || 1;
    return dose * coeff;
  }

  function calcolaEquianalgesiaHome() {
    const entries = document.querySelectorAll('#drug-list-home .drug-entry');
    let totale = 0;

    entries.forEach(entry => {
      const drug = entry.querySelector('.drug-select').value;
      const dose = parseFloat(entry.querySelector('.dose-input').value) || 0;
      totale += getEquivalentDose(drug, dose);
    });

    const riduzione = parseFloat(document.getElementById('tolleranza-home').value) || 0;
    const target = document.getElementById('conversion-target-home').value;
    const coeffTarget = equivalenze[target] || 1;

    const doseFinale = (totale * (1 - riduzione / 100)) / coeffTarget;
    const rescue = doseFinale / 6;

    const result = `
      <strong>Dose target:</strong> ${doseFinale.toFixed(2)} mg/24h<br>
      <strong>Dose rescue:</strong> ${rescue.toFixed(2)} mg ogni 4h se necessario<br>
      <strong>Totale MED calcolato:</strong> ${totale.toFixed(2)} mg
    `;

    document.getElementById('result-home').innerHTML = result;
  }

  // Rende la funzione disponibile globalmente
  window.calcolaEquianalgesiaHome = calcolaEquianalgesiaHome;

  const addDrugBtn = document.getElementById('add-drug-home');
  if (addDrugBtn) {
    addDrugBtn.addEventListener('click', () => {
      const container = document.getElementById('drug-list-home');
      const baseEntry = container.querySelector('.drug-entry');
      const clone = baseEntry.cloneNode(true);

      // resetta i campi
      const select = clone.querySelector('.drug-select');
      const input = clone.querySelector('.dose-input');
      if (select) select.selectedIndex = 0;
      if (input) input.value = '';

      // rimuove eventuali ID duplicati
      clone.querySelectorAll('[id]').forEach(el => el.removeAttribute('id'));

      container.appendChild(clone);
    });
  }

  function addEntry(list, entryClass) {
    if (!list) return;
    const base = list.querySelector('.' + entryClass);
    const clone = base.cloneNode(true);
    const input = clone.querySelector('input');
    if (input) input.value = '';
    list.appendChild(clone);
  }



  document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-drug')) {
      const entry = e.target.closest('.drug-entry');
      if (document.querySelectorAll('#drug-list-home .drug-entry').length > 1) entry.remove();
    }
    ['spec','indirizzo','tel','mail'].forEach(cls => {
      if (e.target.classList.contains('remove-' + cls)) {
        const lists = {spec:specList, indirizzo:indirizzoList, tel:telList, mail:mailList};
        const list = lists[cls];
        const entry = e.target.closest('.' + cls + '-entry');
        if (list && list.querySelectorAll('.' + cls + '-entry').length > 1) entry.remove();
      }
      if (e.target.classList.contains('add-' + cls)) {
        const lists = {spec:specList, indirizzo:indirizzoList, tel:telList, mail:mailList};
        addEntry(lists[cls], cls + '-entry');
      }
    });
  });

});