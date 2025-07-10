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

  const tableContainer = document.getElementById("terapie-container-home");
  const tableOrigParent = tableContainer ? tableContainer.parentElement : null;
  const sedWrapper = document.getElementById("sedation-table-wrapper");

  function moveTableToSedation() {
    if (sedWrapper && tableContainer && tableContainer.parentElement !== sedWrapper) {
      sedWrapper.appendChild(tableContainer);
    }
  }

  function moveTableToHome() {
    if (tableOrigParent && tableContainer && tableContainer.parentElement !== tableOrigParent) {
      tableOrigParent.appendChild(tableContainer);
    }
  }

  window.moveTableToSedation = moveTableToSedation;
  window.moveTableToHome = moveTableToHome;

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
      sintomo: "Sedazione Palliativa",
      farmaco: planDrug.value + (planForm.value ? " " + planForm.value : ""),
      via: planVia.value,
      dose: planDose.value,
      poso: planPoso.value,
      freq: planFreq.value
    };
    if (window.terapie) {
      window.terapie.push(rec);
      if (typeof window.renderTableHome === "function") window.renderTableHome();
    }
    if (typeof window.saveRiepilogoDoc === 'function') window.saveRiepilogoDoc();
    formPlan.reset();
    planDrug.value = select.value;
    // torna alla schermata principale e riabilita il form
    if (typeof window.resetSedationUI === "function") window.resetSedationUI();
    document.getElementById("gestione-sedazione").style.display = "none";
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
    moveTableToHome();
    if (typeof window.renderTableHome === 'function') window.renderTableHome();
  };
});