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

  // Container section for sedation interface
  const sedSection = document.getElementById("gestione-sedazione");

  // 1. Popola dropdown
  data.forEach(item => {
    select.add(new Option(item.nome, item.nome));
  });

  // 2. On change: render schema
  select.onchange = async () => {
    // Ensure the dynamic subsections stay inside the sedation section
    if (sedSection) {
      sedSection.appendChild(schemaDiv);
      sedSection.appendChild(calcDiv);
      sedSection.appendChild(addDiv);
    }

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
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${planDrug.value}</td>
      <td>${planDose.value}</td>
      <td>${planVia.value}</td>
      <td>${planNote.value}</td>
      <td><button class="btn btn-sm btn-danger btn-remove">×</button></td>
    `;
    tablePlan.appendChild(tr);
    tr.querySelector(".btn-remove").onclick = () => tr.remove();
    formPlan.reset();
    planDrug.value = select.value;
  });

  // 5. Export (integra nel tuo app.js)
  exportBtn.onclick = () => {
    // in app.js estrae già le tabelle, aggiungi anche #table-plan
    // oppure fai tu: html2pdf o docx qui sopra tablePlan.parentElement
  };
});
