// js/sedazione-ui.js
function initializePopovers(){
  document.querySelectorAll('[data-bs-toggle="popover"]')
    .forEach(el => new bootstrap.Popover(el));
}

document.addEventListener("DOMContentLoaded", () => {
  const data = window.schemiSedazione || [];
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
  const planDose = document.getElementById("plan-dose");
  const planVia = document.getElementById("plan-via");
  const planNote = document.getElementById("plan-note");
  const tablePlan = document.querySelector("#table-plan tbody");
  const exportBtn = document.getElementById("export-plan");

  function renderPlanTable() {
    tablePlan.innerHTML = "";
    if (!window.terapie) return;
    window.terapie
      .filter(t => t.sintomo === "Sedazione Palliativa")
      .forEach(rec => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${rec.farmaco}</td>
          <td>${rec.dose}</td>
          <td>${rec.via}</td>
          <td>${rec.freq}</td>
          <td><button class="btn btn-sm btn-danger btn-remove">×</button></td>
        `;
        tr.querySelector(".btn-remove").onclick = () => {
          const i = window.terapie.indexOf(rec);
          if (i > -1) {
            window.terapie.splice(i, 1);
            if (typeof window.renderTableHome === "function") window.renderTableHome();
            renderPlanTable();
          }
        };
        tablePlan.appendChild(tr);
      });
  }
  window.renderSedationTable = renderPlanTable;

  // Move sedation sections into the main page content
  const mainContent = document.querySelector("main");
  if (mainContent) {
    mainContent.appendChild(schemaDiv);
    mainContent.appendChild(calcDiv);
    mainContent.appendChild(addDiv);
  }

  // 1. Popola dropdown
  data.forEach(item => {
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
      initializePopovers();
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
      farmaco: planDrug.value,
      via: planVia.value,
      dose: planDose.value,
      poso: "",
      freq: planNote.value
    };
    if (window.terapie) {
      window.terapie.push(rec);
      if (typeof window.renderTableHome === "function") window.renderTableHome();
    }
    renderPlanTable();
    formPlan.reset();
    planDrug.value = select.value;
  });

  // 5. Export tramite la funzione principale di gestione sintomi
  exportBtn.onclick = () => {
    if (typeof window.exportWordHome === "function") {
      window.exportWordHome();
    }
  };

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
    tablePlan.innerHTML = '';
    if (typeof window.renderTableHome === 'function') window.renderTableHome();
  };
});