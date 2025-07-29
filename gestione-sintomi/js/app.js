// js/app.js
// Logica principale per Dashboard, Gestione Sintomi, Identificazione NECPAL, modali e export

document.addEventListener("DOMContentLoaded", function() {
  // Inizializza tooltip Bootstrap
  if (window.bootstrap) {
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));
  }
  // Gestione menu mobile
  const menuToggle = document.getElementById('menu-toggle');
  const sidebar = document.querySelector('.sidebar');
  if (menuToggle && sidebar) {
    menuToggle.addEventListener('click', () => sidebar.classList.toggle('active'));
  }
  // ──────────────────────────────
  // 1) NAVIGAZIONE TRA LE SEZIONI
  // ──────────────────────────────
  document.querySelectorAll('.sidebar .nav-link[data-target]').forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const sections = ['dashboard-home','gestione-home','sedazione-home','identificazione-home','equianalgesia-section','rescue-section'];
      sections.forEach(id => {
        const sec = document.getElementById(id);
        if (sec) sec.style.display = 'none';
      });
      if (this.dataset.target !== 'sedazione-home' && typeof window.resetSedationUI === 'function') {
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
      if (window.innerWidth <= 768 && sidebar) sidebar.classList.remove('active');
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
      "gtt":    ["OS",  "5–10 mg (4–8 gtt)", "Ogni 4 ore"],
      "fiale":  ["SC",  "5–10 mg",            "Ogni 4 ore"],
      "cp":     ["OS",  "10–20 mg",           "Ogni 12 ore"]
    },
    "Ossicodone": {
      "gtt": ["OS", "5–10 mg",  "Ogni 4–6 ore"],
      "cp":  ["OS", "10–20 mg", "Ogni 12 ore"]
    },
    "Fentanil": {
      "cerotto": ["TTS", "12–25 mcg/h", "72h"],
      "spray":   ["NAS", "100–400 mcg", "Al bisogno"]
    }
  };
  const altriSintomi = {
    "Dispnea": {
      "Ossigeno":   ["NAS", "1–4 L/min", "Continuo"],
      "Morfina SC": ["SC",  "1–2 mg",  "Ogni 4h"]
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
  const sintomi = ["Dolore", ...Object.keys(altriSintomi), "Altro" ];
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
  // Ensure Sedazione Palliativa is not present in the dropdown
  const sedOpt = sintomoSelect.querySelector('option[value="Sedazione Palliativa"]');
  if (sedOpt) sedOpt.remove();

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
    viaInput.value = '';
    doseInput.value = posologiaInput.value = frequenzaInput.value = '';
    viaInput.disabled = true;
    doseInput.readOnly = true;
    editingIndex = null;
    document.getElementById('btn-add-home').textContent = 'Aggiungi';
  }
  function onSintomoChangeHome() {
  resetFormHome();
  // Nascondi tutte le sezioni di sintomo
  document.querySelectorAll('.sintomo-section').forEach(sec => sec.style.display = 'none');
  const s = sintomoSelect.value;
  if (typeof window.resetSedationUI === 'function') {
    window.resetSedationUI();
  }
  const homeSec = document.querySelector('.sintomo-section[data-sintomo="gestione-home"]');
  if (homeSec) homeSec.style.display = 'block';
  if (formCol) formCol.style.display = '';
  if (s === 'Dolore') {
    populate(farmacoSelect, Object.keys(dolore));
    farmacoSelect.disabled = false;
    formulazioneGroup.style.display = 'block';
  } else if (s === 'Altro') {
    customSintomoGroup.style.display = 'block';
    customFarmacoInput.style.display = 'block';
  } else if (s) {
    populate(farmacoSelect, Object.keys(altriSintomi[s]));
    farmacoSelect.disabled = false;
    formulazioneGroup.style.display = 'block';
  }
}
  function onFarmacoChangeHome() {
    const s = sintomoSelect.value;
    if (s === 'Dolore') {
      populate(formulazioneSelect, Object.keys(dolore[farmacoSelect.value]));
      formulazioneSelect.disabled = false;
    } else if (s && s !== 'Altro') {
      const arr = altriSintomi[s][farmacoSelect.value];
      viaInput.disabled = false;
      doseInput.readOnly = false;
      viaInput.value = arr[0] || '';
      doseInput.value = arr[1] || '';
      if (!posologiaInput.value) posologiaInput.value = arr[2] || '';
      if (!frequenzaInput.value) frequenzaInput.value = arr[3] || '';
    }
  }
  function onFormulazioneChangeHome() {
    const arr = dolore[farmacoSelect.value][formulazioneSelect.value];
    viaInput.disabled = false;
    doseInput.readOnly = false;
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
      if (!sint||!farm) return alert('Inserisci sintomo e molecola');
    } else if (s === 'Dolore') {
      farm = farmacoSelect.value;
      frm  = formulazioneSelect.value;
      if (!farm||!frm) return alert('Seleziona molecola e formulazione');
    } else {
      farm = farmacoSelect.value;
      if (!farm) return alert('Seleziona molecola');
    }
    const rec = { sintomo:sint, farmaco:frm||farm, via:viaInput.value, dose:doseInput.value, poso:posologiaInput.value, freq:frequenzaInput.value };
    if (editingIndex!==null) window.terapie[editingIndex]=rec; else window.terapie.push(rec);
    resetFormHome(); renderTableHome();
    if (typeof window.saveRiepilogoDoc === 'function') window.saveRiepilogoDoc();
  }
  function renderTableHome() {
    tbody.innerHTML = '';
    window.terapie.forEach((t,i)=>{
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${t.sintomo}</td><td>${t.farmaco}</td><td>${t.via}</td><td>${t.dose}</td><td>${t.poso}</td><td>${t.freq}</td><td><button class="btn btn-sm btn-danger del-btn" data-i="${i}"><i class="fas fa-trash"></i></button></td>`;
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
  // 5b) DATI PAZIENTE
  // ──────────────────────────────
  let pazienteData = {
    nome: '',
    codFiscale: '',
    dataNascita: '',
    luogoNascita: '',
    indirizzo: '',
    telefono: '',
    mail: ''
  };

  const pazienteTestData = {
    nome: 'Mario Rossi',
    codFiscale: 'rssmra45t22d612h',
    dataNascita: '1945-06-04',
    luogoNascita: 'Firenze (FI)',
    indirizzo: 'via La rocca n.12',
    telefono: '347823432',
    mail: 'mariorossi@palkit.it'
  };

  const pazienteModal = document.getElementById('paziente-modal-home');
  const pazienteUseTest = document.getElementById('paziente-use-test');

  function setPazienteFormValues(data) {
    document.getElementById('paziente-nome-input').value = data.nome || '';
    document.getElementById('paziente-cf-input').value   = data.codFiscale || '';
    document.getElementById('paziente-data-input').value = data.dataNascita || '';
    document.getElementById('paziente-luogo-input').value = data.luogoNascita || '';
    document.getElementById('paziente-indirizzo-input').value = data.indirizzo || '';
    document.getElementById('paziente-tel-input').value  = data.telefono || '';
    document.getElementById('paziente-mail-input').value = data.mail || '';
  }

  function togglePazienteTestData() {
    if (pazienteUseTest && pazienteUseTest.checked) {
      setPazienteFormValues(pazienteTestData);
    } else {
      setPazienteFormValues({nome:'',codFiscale:'',dataNascita:'',luogoNascita:'',indirizzo:'',telefono:'',mail:''});
    }
  }
  if (pazienteUseTest) {
    pazienteUseTest.addEventListener('change', togglePazienteTestData);
    // Some browsers only update checkbox state on click, so listen for both
    pazienteUseTest.addEventListener('click', togglePazienteTestData);
  }

  if (pazienteModal) {
    pazienteModal.addEventListener('shown.bs.modal', () => {
      setPazienteFormValues(pazienteData);
      if (pazienteUseTest && pazienteUseTest.checked) togglePazienteTestData();
    });
  }

  function savePazienteHome() {
    pazienteData.nome        = document.getElementById('paziente-nome-input').value;
    pazienteData.codFiscale  = document.getElementById('paziente-cf-input').value;
    pazienteData.dataNascita = document.getElementById('paziente-data-input').value;
    pazienteData.luogoNascita= document.getElementById('paziente-luogo-input').value;
    pazienteData.indirizzo   = document.getElementById('paziente-indirizzo-input').value;
    pazienteData.telefono    = document.getElementById('paziente-tel-input').value;
    pazienteData.mail        = document.getElementById('paziente-mail-input').value;

    bootstrap.Modal.getInstance(pazienteModal).hide();
    updatePazienteFields();
  }
  const savePazienteBtn = document.getElementById('save-paziente-btn');
  if (savePazienteBtn) savePazienteBtn.addEventListener('click', savePazienteHome);

  function updatePazienteFields() {
    const nameEl = document.getElementById('text-1');
    const dateEl = document.getElementById('date-2');
    if (nameEl) nameEl.value = pazienteData.nome || '';
    if (dateEl) dateEl.value = pazienteData.dataNascita || '';
  }
  updatePazienteFields();

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
window.buildPreviewContent = buildPreviewContent;

function showPreviewHome() {
  const pc = document.getElementById('preview-content-home');
  pc.innerHTML = '';
  pc.appendChild(buildPreviewContent());
  new bootstrap.Modal(document.getElementById('preview-modal-home')).show();
}
window.showPreviewHome = showPreviewHome;
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
    const headCells = ['Sintomo','Farmaco','Via','Dose','Posologia','Frequenza'].map(t =>
      new TableCell({
        children: [
          new Paragraph({
            children: [
              new TextRun({ text: t, bold: true })
            ]
          })
        ],
        verticalAlign: VerticalAlign.CENTER
      })
    );
    rows.push(new TableRow({ children: headCells }));
    window.terapie.forEach(t => {
      rows.push(new TableRow({ children: [t.sintomo, t.farmaco, t.via, t.dose, t.poso, t.freq].map((v,i) => new TableCell({ children:[new Paragraph({ children:[ new TextRun({ text:v, bold:i===0 }) ] })], verticalAlign:VerticalAlign.CENTER })) }));
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
      new Paragraph({
        text: 'Cordiali saluti',
        spacing: { before: 400, after: 100 },
        style: 'FooterText'
      }),
      new Paragraph({
        text: `${medicoData.titolo} ${medicoData.nome}`.trim(),
        style: 'FooterText'
      })
    ];

    const docStyles = {
      paragraphStyles: [
        {
          id: 'FooterText',
          name: 'FooterText',
          run: { size: 20 },
          paragraph: { spacing: { line: 360 } }
        }
      ]
    };

    const doc = new Document({
      styles: docStyles,
      sections: [{ children: [...header, table, ...closing] }]
    });
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
window.exportPdfHome = exportPdfHome;
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

  // ──────────────────────────────
  // 9) EQUIANALGESIA
  // ──────────────────────────────
  const oppioidi = {
    morfina: {
      label: 'Morfina',
      forms: { OS:{unit:'mg/24h', coeff:1}, EV:{unit:'mg/24h', coeff:3}, SC:{unit:'mg/24h', coeff:3} }
    },
    ossicodone: {
      label: 'Ossicodone',
      forms: { OS:{unit:'mg/24h', coeff:1.5} }
    },
    fentanil: {
      label: 'Fentanil TTS',
      forms: { TTS:{unit:'mcg/h', coeff:0.03} }
    },
    buprenorfina: {
      label: 'Buprenorfina TTS',
      forms: { TTS:{unit:'mcg/h', coeff:0.01} }
    },
    tapentadolo: {
      label: 'Tapentadolo',
      forms: { OS:{unit:'mg/24h', coeff:0.4} }
    },
    metadone: {
      label: 'Metadone',
      forms: { OS:{unit:'mg/24h', coeff:0.5} }
    }
  };

  function populateDrugSelect(sel) {
    if(!sel) return;
    sel.innerHTML = '';
    Object.keys(oppioidi).forEach(k=>{
      const o = document.createElement('option');
      o.value = k; o.textContent = oppioidi[k].label; sel.appendChild(o);
    });
  }

  function populateRoute(sel, drug) {
    if(!sel||!oppioidi[drug]) return;
    sel.innerHTML = '';
    Object.keys(oppioidi[drug].forms).forEach(v=>{
      const o = document.createElement('option');
      o.value = v; o.textContent = v; sel.appendChild(o);
    });
  }

  function updateUnit(entry){
    if(!entry) return;
    const drug = entry.querySelector('.drug-select').value;
    const route = entry.querySelector('.route-select').value;
    const span = entry.querySelector('.dose-unit');
    if(span && oppioidi[drug] && oppioidi[drug].forms[route]) span.textContent = oppioidi[drug].forms[route].unit;
  }

  function initEntry(entry){
    const dSel = entry.querySelector('.drug-select');
    const rSel = entry.querySelector('.route-select');
    populateDrugSelect(dSel);
    populateRoute(rSel, dSel.value);
    updateUnit(entry);
  }

  const firstEntry = document.querySelector('#drug-list-home .drug-entry');
  if(firstEntry) initEntry(firstEntry);

  const targetDrugSel = document.getElementById('conversion-target-drug');
  const targetRouteSel = document.getElementById('conversion-target-route');
  if(targetDrugSel){
    populateDrugSelect(targetDrugSel);
    populateRoute(targetRouteSel, targetDrugSel.value);
  }

  function addEntry(list, entryClass){
    if(!list) return;
    const base = list.querySelector('.'+entryClass);
    const clone = base.cloneNode(true);
    const input = clone.querySelector('input');
    if(input) input.value='';
    list.appendChild(clone);
  }

  document.addEventListener('change', e=>{
    if(e.target.classList.contains('drug-select')){
      const entry = e.target.closest('.drug-entry');
      populateRoute(entry.querySelector('.route-select'), e.target.value);
      updateUnit(entry);
    }
    if(e.target.classList.contains('route-select')){
      updateUnit(e.target.closest('.drug-entry'));
    }
    if(e.target===targetDrugSel){
      populateRoute(targetRouteSel, e.target.value);
    }
  });

  const tolRange = document.getElementById('tolleranza-home');
  const tolInput = document.getElementById('tolleranza-input');
  function syncTolerance(val){
    tolRange.value = val;
    tolInput.value = val;
    document.getElementById('tolleranza-value').textContent = val + '%';
  }
  tolRange.addEventListener('input', () => syncTolerance(tolRange.value));
  tolInput.addEventListener('input', () => syncTolerance(tolInput.value));

  document.addEventListener('click', function(e){
    if(e.target.classList.contains('add-drug')){
      const container = document.getElementById('drug-list-home');
      const base = container.querySelector('.drug-entry');
      const clone = base.cloneNode(true);
      clone.querySelectorAll('input').forEach(i=>i.value='');
      container.appendChild(clone);
      initEntry(clone);
    }
    if(e.target.classList.contains('remove-drug')){
      const entry = e.target.closest('.drug-entry');
      if(document.querySelectorAll('#drug-list-home .drug-entry').length>1) entry.remove();
    }
    ['spec','indirizzo','tel','mail'].forEach(cls => {
      if(e.target.classList.contains('remove-'+cls)){
        const lists = {spec:specList, indirizzo:indirizzoList, tel:telList, mail:mailList};
        const list = lists[cls];
        const entry = e.target.closest('.'+cls+'-entry');
        if(list && list.querySelectorAll('.'+cls+'-entry').length>1) entry.remove();
      }
      if(e.target.classList.contains('add-'+cls)){
        const lists = {spec:specList, indirizzo:indirizzoList, tel:telList, mail:mailList};
        addEntry(lists[cls], cls+'-entry');
      }
    });
  });

  function calcolaEquianalgesiaHome(){
    const entries = document.querySelectorAll('#drug-list-home .drug-entry');
    let totaleMED = 0;
    const rows = [];
    const principi = new Set();
    entries.forEach(entry=>{
      const drug = entry.querySelector('.drug-select').value;
      const route = entry.querySelector('.route-select').value;
      const dose = parseFloat(entry.querySelector('.dose-input').value) || 0;
      const coeff = oppioidi[drug].forms[route].coeff;
      const med = dose * coeff;
      totaleMED += med;
      principi.add(drug);
      rows.push({drug:oppioidi[drug].label, route, dose, med});
    });

    const targetDrug = targetDrugSel.value;
    const targetRoute = targetRouteSel.value;
    let rid = parseFloat(tolRange.value) || 0;
    if(principi.size===1 && principi.has(targetDrug)){
      alert('Non è opportuno applicare una riduzione per tolleranza crociata usando lo stesso oppioide');
      rid = 0;
      syncTolerance(0);
    }
    const totaleRidotto = totaleMED * (1 - rid/100);
    const coeffTarget = oppioidi[targetDrug].forms[targetRoute].coeff;
    const doseTarget = totaleRidotto / coeffTarget;
    const rescueOS = totaleRidotto / 6;
    const rescueEV = rescueOS / 3;

    let html = '<table class="table table-bordered table-sm">';
    html += '<thead><tr><th>Farmaco</th><th>Via</th><th>Dose</th><th><span class="text-success med-tooltip" data-bs-toggle="tooltip" data-bs-title="Dose equivalente di morfina per via orale">MED</span> mg OS</th></tr></thead><tbody>';
    rows.forEach(r=>{ html += `<tr><td>${r.drug}</td><td>${r.route}</td><td>${r.dose}</td><td>${r.med.toFixed(2)}</td></tr>`; });
    html += `<tr class="table-secondary"><td colspan="3"><strong>TOTALE MED</strong></td><td><strong>${totaleMED.toFixed(2)}</strong></td></tr>`;
    html += '</tbody></table>';
    html += `<p><strong>Dose equivalente di ${oppioidi[targetDrug].label} (${targetRoute}):</strong> ${doseTarget.toFixed(2)} ${oppioidi[targetDrug].forms[targetRoute].unit}</p>`;
    html += `<p><strong>Dose rescue (Morfina OS):</strong> ${rescueOS.toFixed(2)} mg</p>`;
    html += `<p><strong>Dose rescue (Morfina EV/SC):</strong> ${rescueEV.toFixed(2)} mg</p>`;

    const resultEl = document.getElementById('result-home');
    resultEl.innerHTML = html;
    if (window.bootstrap) {
      resultEl.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));
    }
  }

  window.calcolaEquianalgesiaHome = calcolaEquianalgesiaHome;


});