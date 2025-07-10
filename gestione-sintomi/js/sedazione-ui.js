// js/sedazione-ui.js

document.addEventListener("DOMContentLoaded", () => {
  const data = window.schemiSedazione || [];
  const visibleData = data.filter(item => item.visibile !== false);
  const select = document.getElementById("select-drug");
  const schemaDiv = document.getElementById("drug-schema");
  const calcDiv = document.getElementById("dose-calculator");
  const btnCalc = document.getElementById("btn-calc-dose");
  const calcP = document.getElementById("calc-poso");
  const calcW = document.getElementById("calc-weight");
  const calcRes = document.getElementById("calc-result");

  const addDiv = document.getElementById("add-to-plan");
  const formPlan = document.getElementById("form-add-plan");
  const planDrug = document.getElementById("plan-drug");
  const planForm = document.getElementById("plan-formulazione");
  const planVia = document.getElementById("plan-via");
  const planDose = document.getElementById("plan-dose");
  const planPoso = document.getElementById("plan-posologia");
  const planFreq = document.getElementById("plan-frequenza");

  const tbodySed = document.querySelector("#table-sedazione tbody");
  window.terapieSed = window.terapieSed || [];

  function renderSedTable() {
    if (!tbodySed) return;
    tbodySed.innerHTML = "";
    window.terapieSed.forEach((t,i)=>{
      const tr = document.createElement("tr");
      tr.innerHTML = `<td>${t.farmaco}</td><td>${t.via}</td><td>${t.dose}</td><td>${t.poso}</td><td>${t.freq}</td><td><button class="btn btn-sm btn-secondary del-sed-btn" data-i="${i}"><i class="fas fa-trash"></i></button></td>`;
      tbodySed.appendChild(tr);
    });
    tbodySed.querySelectorAll('.del-sed-btn').forEach(b=>b.onclick=e=>{window.terapieSed.splice(+e.currentTarget.dataset.i,1);renderSedTable();});
  }
  window.renderSedTable = renderSedTable;

  // Move sedation sections into the main page content
  const mainContent = document.querySelector("main");
  if (mainContent) {
    mainContent.appendChild(schemaDiv);
    mainContent.appendChild(calcDiv);
    mainContent.appendChild(addDiv);
  }

  // 1. Popola dropdown solo con farmaci visibili
  visibleData.forEach(item => {
    select.add(new Option(item.nome, item.nome));
  });

  // 2. On change: render schema
  select.onchange = async () => {
    // ––––––––––––––––––––––––––––––––––––––––––––––––––––––
    // Assicura che le sezioni di sedazione siano sempre nel <main>
    if (mainContent) {
      mainContent.appendChild(schemaDiv);
      mainContent.appendChild(calcDiv);
      mainContent.appendChild(addDiv);
    }
    // ––––––––––––––––––––––––––––––––––––––––––––––––––––––

    const nome = select.value.toLowerCase().replace(/\s+/g, '_');
    if (!nome) {
      schemaDiv.style.display = calcDiv.style.display = addDiv.style.display = 'none';
      return;
    }

    try {
      const response = await fetch(`partials/${nome}.html`);
      if (!response.ok) throw new Error('Partial non trovato');
      const html = await response.text();
      schemaDiv.innerHTML = html;
      schemaDiv.style.display = 'block';
      calcDiv.style.display = addDiv.style.display = '';
      planDrug.value = select.value;
      // Scroll to therapy schema when loaded
      schemaDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } catch (err) {
      console.error(err);
      schemaDiv.innerHTML = `<p>Schema non disponibile per ${select.value}</p>`;
      schemaDiv.style.display = 'block';
      calcDiv.style.display = addDiv.style.display = 'none';
      // Scroll to show error message
      schemaDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  };

  // 3. Calcolatore
  btnCalc.onclick = () => {
    const poso = parseFloat(calcP.value) || 0;
    const weight = parseFloat(calcW.value) || 0;
    const dose = (poso * weight).toFixed(2);
    calcRes.textContent = `Dose bolus: ${dose} mg`;
  };

  // 4. Aggiungi al piano
  formPlan.addEventListener("submit", e => {
    e.preventDefault();
    const rec = {
      farmaco: planDrug.value + (planForm.value ? " " + planForm.value : ""),
      via: planVia.value,
      dose: planDose.value,
      poso: planPoso.value,
      freq: planFreq.value
    };
    if (window.terapieSed) {
      window.terapieSed.push(rec);
      if (typeof window.renderSedTable === "function") window.renderSedTable();
    }
    if (typeof window.saveSedazioneDoc === 'function') window.saveSedazioneDoc();
    formPlan.reset();
    planDrug.value = select.value;
    // torna alla schermata principale e riabilita il form
    if (typeof window.resetSedationUI === "function") window.resetSedationUI();
    document.getElementById("sedazione-home").style.display = "none";
    const home = document.getElementById("gestione-home");
    if (home) home.style.display = "block";
    const sintSelect = document.getElementById("sintomo-home");
    if (sintSelect) {
      sintSelect.value = "";
      sintSelect.dispatchEvent(new Event("change"));
    }
  });


  // Funzione globale per resettare lo stato della UI di sedazione
  window.resetSedationUI = function() {
    select.value = '';
    schemaDiv.innerHTML = '';
    schemaDiv.style.display = 'none';
    calcDiv.style.display = 'none';
    addDiv.style.display = 'none';
    calcP.value = '';
    calcW.value = '';
    calcRes.textContent = '';
    formPlan.reset();
    planDrug.value = '';
    if (typeof window.renderSedTable === 'function') window.renderSedTable();
  };

  window.buildSedazioneContent = function() {
    const cont = document.createElement('div');
    cont.className = 'doc-container';
    const tbl = document.createElement('table');
    tbl.className = 'summary-table';
    const headRow = tbl.createTHead().insertRow();
    ['Farmaco','Via','Dose','Posologia','Frequenza'].forEach(t => { const th = document.createElement('th'); th.textContent = t; headRow.appendChild(th); });
    const body = tbl.createTBody();
    (window.terapieSed || []).forEach(rec => {
      const r = body.insertRow();
      [rec.farmaco, rec.via, rec.dose, rec.poso, rec.freq].forEach(v => { const c = r.insertCell(); c.textContent = v; });
      const sep = body.insertRow(); sep.className = 'separator-row'; for(let i=0;i<5;i++) sep.insertCell();
    });
    cont.appendChild(tbl);
    return cont;
  };
});