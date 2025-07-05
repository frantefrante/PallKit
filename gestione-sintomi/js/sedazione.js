// js/sedazione.js

document.addEventListener("DOMContentLoaded", () => {
  const tbodyInd = document.querySelector("#table-induzione tbody");
  const tbodyMan = document.querySelector("#table-mantenimento tbody");
  if (!tbodyInd || !tbodyMan) return;

  const data = window.schemiSedazione || [];
  console.log("schemiSedazione:", data);

  // Helper per creare <td>
  const td = txt => {
    const cell = document.createElement("td");
    cell.innerText = txt;
    return cell;
  };

  // 1) Popola Induzione
  const tbodyInd = document.querySelector("#table-induzione tbody");
  data.forEach(item => {
    if (!item.induzione) return;
    const tr = document.createElement("tr");
    tr.appendChild(td(item.nome));
    tr.appendChild(td(item.vie.join("/")));
    // dose bolo
    let dose = item.induzione.dose_per_kg
      ? (item.induzione.dose_per_kg * 70).toFixed(2) + " mg"
      : item.induzione.dose + " mg";
    tr.appendChild(td(dose));
    tr.appendChild(td(item.note));
    tbodyInd.appendChild(tr);
  });

  // 2) Popola Mantenimento
  const tbodyMan = document.querySelector("#table-mantenimento tbody");
  data.forEach(item => {
    if (!item.mantenimento) return;
    const tr = document.createElement("tr");
    tr.appendChild(td(item.nome));
    const { min, max } = item.mantenimento;
    const unit = (item.nome === "Fentanyl" || item.nome === "Dexmedetomidina")
      ? "mcg/kg/h" : "mg/h";
    tr.appendChild(td(`${min}–${max} ${unit}`));
    tr.appendChild(td(item.note));
    tbodyMan.appendChild(tr);
  });

  // 3) Setup calcoli (facoltativo per ora ...)
});
