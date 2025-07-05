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
  let terapie = [], editingIndex = null;

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
  if (s !== 'Sedazione Palliativa' && typeof window.resetSedationUI === 'function') {
    window.resetSedationUI();
  }
  // Mostra gestione sintomi se non Sedazione Palliativa
  if (s && s !== 'Sedazione Palliativa') {
    const homeSec = document.querySelector('.sintomo-section[data-sintomo="gestione-home"]');
    if (homeSec) homeSec.style.display = 'block';
  }
  if (s === 'Dolore') {
    populate(farmacoSelect, Object.keys(dolore));
    farmacoSelect.disabled = false;
    formulazioneGroup.style.display = 'block';
  } else if (s === 'Altro') {
    customSintomoGroup.style.display = 'block';
    customFarmacoInput.style.display = 'block';
  } else if (s === 'Sedazione Palliativa') {
    // Mostra solo la sezione selezionata
    const sec = document.querySelector(`.sintomo-section[data-sintomo="${s}"]`);
    if (sec) sec.style.display = 'block';
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
    if (editingIndex!==null) terapie[editingIndex]=rec; else terapie.push(rec);
    resetFormHome(); renderTableHome();
  }
  function renderTableHome() {
    tbody.innerHTML = '';
    terapie.forEach((t,i)=>{
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${t.sintomo}</td><td>${t.farmaco}</td><td>${t.via}</td><td>${t.dose}</td><td>${t.poso}</td><td>${t.freq}</td><td><button class="btn btn-sm btn-secondary del-btn" data-i="${i}"><i class="fas fa-trash"></i></button></td>`;
      tbody.appendChild(tr);
    });
    tbody.querySelectorAll('.del-btn').forEach(b=>b.onclick=e=>{terapie.splice(+e.currentTarget.dataset.i,1);resetFormHome();renderTableHome();});
  }
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
  let medicoData = {
    nome:         "Dott. Francesco Magnante",
    studio:       "Medico di Medicina Generale",
    codice:       "Cod Reg 257477",
    affiliazione: "c/o Casa delle Salute 'Le Piagge'",
    indirizzo:    "Via dell'Osteria 18",
    telefono:     "055 6934223",
    luogo:        "Firenze"
  };
  function saveMedicoHome() {
    medicoData.nome         = document.getElementById('medico-nome-input').value;
    medicoData.studio       = document.getElementById('medico-studio-input').value;
    medicoData.codice       = document.getElementById('medico-codice-input').value;
    medicoData.affiliazione = document.getElementById('medico-aff-input').value;
    medicoData.indirizzo    = document.getElementById('medico-indirizzo-input').value;
    medicoData.telefono     = document.getElementById('medico-tel-input').value;
    medicoData.luogo        = document.getElementById('medico-luogo-input').value;

    document.getElementById('medico-name-home').textContent   = medicoData.nome;
    document.getElementById('medico-studio-home').textContent = medicoData.studio;
    document.getElementById('location-date-home').textContent = medicoData.luogo + ', ' + new Date().toLocaleDateString('it-IT');

    bootstrap.Modal.getInstance(document.getElementById('medico-modal-home')).hide();
  }
  const saveMedicoBtn = document.getElementById('save-medico-btn');
  if (saveMedicoBtn) saveMedicoBtn.addEventListener('click', saveMedicoHome);

  // ──────────────────────────────
  // 6) ANTEPRIMA DOCUMENTO
  // ──────────────────────────────
  function showPreviewHome() {
    const pc = document.getElementById('preview-content-home'); pc.innerHTML = '';
    const h1 = document.createElement('h5'); h1.textContent = medicoData.nome; pc.appendChild(h1);
    const h2 = document.createElement('h6'); h2.textContent = medicoData.studio; pc.appendChild(h2);
    const p1 = document.createElement('p'); p1.textContent = `${medicoData.codice}  |  ${medicoData.affiliazione}`; pc.appendChild(p1);
    const p2 = document.createElement('p'); p2.textContent = `${medicoData.indirizzo}  |  ${medicoData.telefono}`; pc.appendChild(p2);
    const pDate = document.createElement('p'); pDate.textContent = `${medicoData.luogo}, ${new Date().toLocaleDateString('it-IT')}`; pDate.classList.add('text-end'); pDate.style.fontStyle='italic'; pc.appendChild(pDate);
    const tbl = document.createElement('table'); tbl.className = 'table table-bordered';
    const theadRow = tbl.createTHead().insertRow();
    ['Sintomo','Farmaco','Via','Dose','Posologia','Frequenza'].forEach(txt => {
      const th = document.createElement('th'); th.textContent = txt; theadRow.appendChild(th);
    });
    const tb = tbl.createTBody();
    terapie.forEach(t => {
      const r = tb.insertRow();
      [t.sintomo,t.farmaco,t.via,t.dose,t.poso,t.freq].forEach(v => { const c = r.insertCell(); c.textContent = v; });
    });
    pc.appendChild(tbl);
    new bootstrap.Modal(document.getElementById('preview-modal-home')).show();
  }
  const previewHomeBtn = document.getElementById('btn-preview-home');
  if (previewHomeBtn) previewHomeBtn.addEventListener('click', showPreviewHome);

  // ──────────────────────────────
  // 7) EXPORT WORD
  // ──────────────────────────────
  async function exportWordHome() {
    const { Document,Packer,Paragraph,Table,TableRow,TableCell,TextRun,AlignmentType,BorderStyle } = docx;
    const doc = new Document({ sections:[{ children: [] }] });
    const blob = await Packer.toBlob(doc);
    saveAs(blob, 'riepilogo.docx');
  }
  const exportHomeBtn = document.getElementById('btn-export-home');
  if (exportHomeBtn) exportHomeBtn.addEventListener('click', exportWordHome);

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


  document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-drug')) {
      const entry = e.target.closest('.drug-entry');
      if (document.querySelectorAll('#drug-list-home .drug-entry').length > 1) entry.remove();
    }
  });

});