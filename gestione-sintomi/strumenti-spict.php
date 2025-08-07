<?php
?>
<section id="spict-home" class="p-4" style="display:none;">
  <div class="bg-white p-4 rounded shadow-sm">
    <h5 class="mb-3"><i class="fas fa-id-card me-2"></i>SPICT</h5>
    <p class="mb-4">Lo SPICT™ è utilizzato per aiutare a identificare pazienti le cui condizioni di salute sono in fase di peggioramento. Valutate i loro bisogni di cure palliative e di supporto. Pianificate il percorso di assistenza e cura.</p>
    <form id="spict-form">
      <div class="accordion" id="spict-accordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-generali">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spict-generali" aria-expanded="false" aria-controls="spict-generali">Indicatori generali</button>
          </h2>
          <div id="spict-generali" class="accordion-collapse collapse" aria-labelledby="heading-generali" data-bs-parent="#spict-accordion">
            <div class="accordion-body">
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="general1">
                  <label class="form-check-label" for="general1">Ricovero (i) ospedaliero (i) non programmato (i)</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="general1" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="general2">
                  <label class="form-check-label" for="general2">Performance Status basso oppure in peggioramento, con limitata reversibilità (es. la persona rimane a letto o in poltrona per più di metà giornata)</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="general2" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="general3">
                  <label class="form-check-label" for="general3">Dipendenza dall’assistenza degli altri a causa di problemi fisici e/o cognitivi in progressivo peggioramento</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="general3" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="general4">
                  <label class="form-check-label" for="general4">La persona che assiste il paziente necessita di maggiore aiuto e supporto</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="general4" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="general5">
                  <label class="form-check-label" for="general5">Progressiva perdita di peso; persistente sottopeso; massa muscolare ridotta</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="general5" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="general6">
                  <label class="form-check-label" for="general6">Sintomi persistenti nonostante il trattamento ottimale della/e patologia/e di base</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="general6" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="general7">
                  <label class="form-check-label" for="general7">La persona (o la sua famiglia) chiede di ricevere cure palliative; sceglie di ridurre, sospendere o non iniziare nuovi trattamenti; oppure desidera concentrarsi sulla qualità di vita</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="general7" placeholder="Nota opzionale">
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-cancro">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spict-cancro" aria-expanded="false" aria-controls="spict-cancro">Cancro</button>
          </h2>
          <div id="spict-cancro" class="accordion-collapse collapse" aria-labelledby="heading-cancro" data-bs-parent="#spict-accordion">
            <div class="accordion-body">
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="cancer1">
                  <label class="form-check-label" for="cancer1">Deterioramento delle capacità funzionali dovuto alla progressione del cancro</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="cancer1" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="cancer2">
                  <label class="form-check-label" for="cancer2">Le condizioni generali non consentono di iniziare o continuare trattamenti oncologici specifici oppure la terapia in atto è finalizzata unicamente al controllo dei sintomi</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="cancer2" placeholder="Nota opzionale">
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-demenza">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spict-demenza" aria-expanded="false" aria-controls="spict-demenza">Demenza / Fragilità</button>
          </h2>
          <div id="spict-demenza" class="accordion-collapse collapse" aria-labelledby="heading-demenza" data-bs-parent="#spict-accordion">
            <div class="accordion-body">
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="dementia1">
                  <label class="form-check-label" for="dementia1">Incapacità di vestirsi, camminare o mangiare senza aiuto</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="dementia1" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="dementia2">
                  <label class="form-check-label" for="dementia2">La persona mangia e beve meno; ha difficoltà nella deglutizione</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="dementia2" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="dementia3">
                  <label class="form-check-label" for="dementia3">Incontinenza urinaria e fecale</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="dementia3" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="dementia4">
                  <label class="form-check-label" for="dementia4">Non in grado di comunicare verbalmente; interazione sociale scarsa</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="dementia4" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="dementia5">
                  <label class="form-check-label" for="dementia5">Cadute frequenti; frattura del femore</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="dementia5" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="dementia6">
                  <label class="form-check-label" for="dementia6">Episodi febbrili ricorrenti o infezioni; polmonite da aspirazione</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="dementia6" placeholder="Nota opzionale">
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-neuro">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spict-neuro" aria-expanded="false" aria-controls="spict-neuro">Patologia neurologica</button>
          </h2>
          <div id="spict-neuro" class="accordion-collapse collapse" aria-labelledby="heading-neuro" data-bs-parent="#spict-accordion">
            <div class="accordion-body">
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="neuro1">
                  <label class="form-check-label" for="neuro1">Progressivo deterioramento delle funzioni fisiche e/o cognitive, nonostante la terapia ottimale</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="neuro1" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="neuro2">
                  <label class="form-check-label" for="neuro2">Disturbi della parola con deterioramento progressivo della comunicazione e/o della deglutizione</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="neuro2" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="neuro3">
                  <label class="form-check-label" for="neuro3">Polmonite da aspirazione ricorrente; affanno o insufficienza respiratoria</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="neuro3" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="neuro4">
                  <label class="form-check-label" for="neuro4">Paralisi persistente a seguito di accidente cerebrovascolare, con significativa perdita funzionale e disabilità permanente</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="neuro4" placeholder="Nota opzionale">
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-cardiaco">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spict-cardiaco" aria-expanded="false" aria-controls="spict-cardiaco">Patologia cardiaca / vascolare</button>
          </h2>
          <div id="spict-cardiaco" class="accordion-collapse collapse" aria-labelledby="heading-cardiaco" data-bs-parent="#spict-accordion">
            <div class="accordion-body">
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="cardio1">
                  <label class="form-check-label" for="cardio1">Scompenso cardiaco o malattia coronarica estesa, non trattabile, con affanno o dolore toracico a riposo o per sforzi lievi</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="cardio1" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="cardio2">
                  <label class="form-check-label" for="cardio2">Malattia vascolare periferica severa ed inoperabile</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="cardio2" placeholder="Nota opzionale">
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-resp">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spict-resp" aria-expanded="false" aria-controls="spict-resp">Patologia respiratoria</button>
          </h2>
          <div id="spict-resp" class="accordion-collapse collapse" aria-labelledby="heading-resp" data-bs-parent="#spict-accordion">
            <div class="accordion-body">
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="resp1">
                  <label class="form-check-label" for="resp1">Patologia polmonare cronica severa con affanno a riposo o per sforzi lievi tra gli episodi di riacutizzazione</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="resp1" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="resp2">
                  <label class="form-check-label" for="resp2">Ipossia persistente, con necessità di ossigenoterapia a lungo termine</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="resp2" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="resp3">
                  <label class="form-check-label" for="resp3">Pregressa ventilazione meccanica (invasiva o non) per insufficienza respiratoria, oppure ventilazione controindicata</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="resp3" placeholder="Nota opzionale">
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-renale">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spict-renale" aria-expanded="false" aria-controls="spict-renale">Patologia renale</button>
          </h2>
          <div id="spict-renale" class="accordion-collapse collapse" aria-labelledby="heading-renale" data-bs-parent="#spict-accordion">
            <div class="accordion-body">
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="renal1">
                  <label class="form-check-label" for="renal1">Insufficienza renale cronica stadio 4 o 5 (eGFR &lt;30ml/min) con deterioramento delle condizioni cliniche</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="renal1" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="renal2">
                  <label class="form-check-label" for="renal2">Insufficienza renale che complica altre patologie a prognosi infausta oppure complica la somministrazione di altri trattamenti</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="renal2" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="renal3">
                  <label class="form-check-label" for="renal3">La dialisi viene sospesa oppure non viene iniziata</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="renal3" placeholder="Nota opzionale">
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-epatica">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spict-epatica" aria-expanded="false" aria-controls="spict-epatica">Patologia epatica</button>
          </h2>
          <div id="spict-epatica" class="accordion-collapse collapse" aria-labelledby="heading-epatica" data-bs-parent="#spict-accordion">
            <div class="accordion-body">
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="hepatic1">
                  <label class="form-check-label" for="hepatic1">Cirrosi con una o più delle seguenti complicanze nell’ultimo anno:<br>&bull; ascite resistente ai diuretici<br>&bull; encefalopatia epatica<br>&bull; sindrome epatorenale<br>&bull; peritonite batterica<br>&bull; sanguinamento ricorrente da varici</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="hepatic1" placeholder="Nota opzionale">
              </div>
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="hepatic2">
                  <label class="form-check-label" for="hepatic2">Il trapianto di fegato non è possibile</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="hepatic2" placeholder="Nota opzionale">
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading-altre">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#spict-altre" aria-expanded="false" aria-controls="spict-altre">Altre patologie</button>
          </h2>
          <div id="spict-altre" class="accordion-collapse collapse" aria-labelledby="heading-altre" data-bs-parent="#spict-accordion">
            <div class="accordion-body">
              <div class="item-card mb-3">
                <div class="form-check">
                  <input class="form-check-input spict-check" type="checkbox" id="other1">
                  <label class="form-check-label" for="other1">Peggioramento e rischio di morte a causa di altre patologie o complicanze irreversibili; qualsiasi trattamento avrà scarso beneficio</label>
                </div>
                <input type="text" class="form-control form-control-sm mt-2 spict-note" data-for="other1" placeholder="Nota opzionale">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-4">
        <h6>Riepilogo</h6>
        <p id="spict-count">Indicatori selezionati: 0</p>
        <div id="spict-selected" class="small"></div>
        <button type="button" id="spict-print" class="btn btn-secondary mt-2"><i class="fas fa-print me-2"></i>Stampa / Esporta</button>
        <button type="button" id="spict-clear" class="btn btn-outline-secondary mt-2 ms-2">Pulisci</button>
      </div>
    </form>
  </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', ()=>{
  const form = document.getElementById('spict-form');
  const checks = form.querySelectorAll('.spict-check');
  const notes = form.querySelectorAll('.spict-note');
  const countEl = document.getElementById('spict-count');
  const listEl = document.getElementById('spict-selected');
  const key = 'spict_state';

  function toggleCard(cb){
    const card = cb.closest('.item-card');
    if(card) card.classList.toggle('selected', cb.checked);
  }

  function updateSummary(){
    let c=0, html='';
    checks.forEach(cb=>{
      if(cb.checked){
        c++;
        const label = form.querySelector('label[for="'+cb.id+'"]');
        const note = form.querySelector('.spict-note[data-for="'+cb.id+'"]');
        const noteText = note.value ? ' – '+note.value : '';
        html += '<div>'+label.textContent+noteText+'</div>';
      }
    });
    countEl.textContent = 'Indicatori selezionati: '+c;
    listEl.innerHTML = html;
  }

  function save(){
    const data={};
    checks.forEach(cb=>{
      const note = form.querySelector('.spict-note[data-for="'+cb.id+'"]');
      data[cb.id]={checked:cb.checked,note:note.value};
    });
    localStorage.setItem(key, JSON.stringify(data));
  }

  function load(){
    const saved = localStorage.getItem(key);
    if(!saved) return;
    try{
      const data = JSON.parse(saved);
      checks.forEach(cb=>{
        if(data[cb.id]) cb.checked = data[cb.id].checked;
        toggleCard(cb);
      });
      notes.forEach(n=>{
        if(data[n.dataset.for]) n.value = data[n.dataset.for].note;
      });
    }catch(e){console.error(e);}
  }

  checks.forEach(cb=>{
    cb.addEventListener('change', ()=>{toggleCard(cb);save();updateSummary();});
  });
  notes.forEach(n=>{
    n.addEventListener('input', ()=>{save();updateSummary();});
  });

  document.getElementById('spict-print').addEventListener('click', ()=>window.print());
  document.getElementById('spict-clear').addEventListener('click', ()=>{
    localStorage.removeItem(key);
    checks.forEach(cb=>{cb.checked=false;toggleCard(cb);});
    notes.forEach(n=>{n.value='';});
    updateSummary();
  });

  load();
  updateSummary();
});
</script>

