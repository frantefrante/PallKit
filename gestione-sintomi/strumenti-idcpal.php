<?php
// IDC-PAL sezione di valutazione complessità
?>
<section id="idcpal-home" class="p-4" style="display:none;">
  <div class="bg-white p-4 rounded shadow-sm">
    <h5 class="mb-3"><i class="fas fa-layer-group me-2"></i>IDC-PAL</h5>
    <form id="idcpal-form">
      <div class="row g-3 mb-3">
        <div class="col-md-4">
          <label class="form-label">Nome e Cognome</label>
          <input type="text" id="idcpal-nome" class="form-control" readonly>
        </div>
        <div class="col-md-4">
          <label class="form-label">Data di nascita</label>
          <input type="date" id="idcpal-nascita" class="form-control" readonly>
        </div>
        <div class="col-md-4">
          <label class="form-label">Data compilazione</label>
          <input type="date" id="idcpal-data" class="form-control" value="<?php echo date('Y-m-d'); ?>">
        </div>
      </div>
      <div class="accordion" id="idcpal-acc">
<?php
$sec1_1 = [
  ['1.1a','Il paziente è un bambino o un adolescente','AC','Si considera il periodo di vita dalla nascita fino ai 18 anni.'],
  ['1.1b','Il paziente è un professionista sanitario','C','Essere un professionista sanitario complica l’assistenza o il processo decisionale.'],
  ['1.1c','Ruolo socio-familiare svolto dal paziente','C','Il paziente ha un ruolo chiave nel contesto familiare o sociale (es. unico caregiver, fonte di reddito, giovane).'],
  ['1.1d','Il paziente ha una disabilità fisica, mentale o sensoriale precedente','C','Disabilità preesistente che rende difficile comunicare o assistere.'],
  ['1.1e','Il paziente ha problemi di dipendenza, recenti e/o in atto','C','Presenza attuale o recente di dipendenze che ostacolano l’assistenza.'],
  ['1.1f','Disturbi mentali preesistenti','C','Disturbi mentali pregressi che complicano la situazione (ansia, depressione, psicosi).']
];
$sec1_2 = [
  ['1.2a','Sintomi di difficile controllo','AC','Sintomi che richiedono interventi terapeutici complessi, anche psicologici o strumentali.'],
  ['1.2b','Sintomi refrattari','AC','Sintomi non controllabili senza ridurre la coscienza: possibile indicazione alla sedazione palliativa.'],
  ['1.2c','Condizioni di urgenza in paziente oncologico in fase terminale','AC','Urgenze in fase terminale oncologica: emorragie, compressioni, convulsioni, ecc.'],
  ['1.2d','Condizione di fine vita di difficile controllo','AC','Sintomi fisici o emotivi mal controllati nella fase finale (agonia protratta, ecc.).'],
  ['1.2e','Condizioni cliniche secondarie a progressione neoplastica di difficile gestione','AC','Complicazioni neoplastiche gravi: occlusioni, carcinosi, ulcere tumorali, fistole.'],
  ['1.2f','Scompenso acuto in insufficienza d’organo in paziente non oncologico in fase terminale','C','Scompenso grave in insufficienze croniche non oncologiche terminali.'],
  ['1.2g','Grave disturbo cognitivo','C','Delirio, demenza o disturbi cognitivi difficili da controllare.'],
  ['1.2h','Improvviso cambiamento del livello di autonomia funzionale','C','Calo improvviso dell’autonomia funzionale (mobilità, cura di sé, alimentazione).'],
  ['1.2i','Esistenza di comorbidità di difficile controllo','C','Comorbidità complesse oltre alla malattia principale.'],
  ['1.2j','Sindrome cachessia-anoressia grave','C','Presenza di cachessia: astenia, grave calo ponderale, anoressia.'],
  ['1.2k','Gestione clinica difficile per scarsa o assente aderenza terapeutica','C','Mancanza di aderenza terapeutica che ostacola la gestione clinica.']
];
$sec1_3 = [
  ['1.3a','Il paziente presenta un rischio di suicidio','AC','Rischio di suicidio: tentativi passati o pensieri espressi.'],
  ['1.3b','Il paziente richiede di accelerare o anticipare il processo di morte','AC','Richieste esplicite del paziente di anticipare la morte.'],
  ['1.3c','Il paziente presenta angoscia esistenziale e/o sofferenza spirituale','AC','Angoscia legata alla morte o sofferenza spirituale (mancanza di senso, rimorso, conflitti interiori).'],
  ['1.3d','Contrasti nella comunicazione tra paziente e famiglia','C','Problemi di comunicazione tra paziente e familiari su diagnosi, prognosi, trattamenti.'],
  ['1.3e','Contrasti nella comunicazione tra paziente e equipe terapeutica','C','Problemi di comunicazione tra paziente ed equipe terapeutica.'],
  ['1.3f','Il paziente presenta gravi e persistenti difficoltà nell’adattamento emotivo','C','Adattamento emotivo compromesso (negazione patologica, colpa, speranze irrealistiche, rabbia).']
];
$sec2 = [
  ['2.a','Assenza o insufficienza del supporto familiare e/o del caregiver','AC','Assenza o inadeguatezza del caregiver principale.'],
  ['2.b','Famiglia e/o caregiver non competenti per l’assistenza','AC','Caregiver non competenti: per ragioni emotive, fisiche, funzionali o culturali.'],
  ['2.c','Famiglia disfunzionale','AC','Famiglia con conflitti gravi (violenza, dipendenze, malattia psichiatrica).'],
  ['2.d','Famiglia non più in grado di rispondere ai bisogni del paziente','AC','Famiglia esaurita emotivamente e incapace di sostenere il carico assistenziale.'],
  ['2.e','Problemi relativi al lutto','C','Lutto anticipatorio, lutti irrisolti o rischio di lutto complicato nei familiari.'],
  ['2.f','Limitazioni strutturali dell’ambiente','AC','Barriere strutturali all’assistenza: abitazione inadeguata, distanza, ostacoli fisici.']
];
$sec3_1 = [
  ['3.1a','Sedazione palliativa di difficile gestione','AC','Sedazione difficile da gestire: farmaci non standard, dosi elevate, problemi emotivi.'],
  ['3.1b','Difficile gestione farmacologica','C','Gestione complessa degli oppioidi o altri farmaci non convenzionali.'],
  ['3.1c','Difficile gestione degli interventi','C','Difficoltà nella gestione di procedure palliative o tecniche invasive.'],
  ['3.1d','Limiti nella competenza professionale per affrontare la situazione','C','Carenze di competenze palliative, conflitti tra operatori, carico emotivo o etico.']
];
$sec3_2 = [
  ['3.2a','Difficoltà nella gestione di tecniche strumentali e/o materiale specifico a domicilio','C','Difficoltà nell’uso di presidi: pompe, ossigeno, ventilazione, dispositivi complessi.'],
  ['3.2b','Difficoltà nel coordinamento o nella logistica dell’assistenza','C','Problemi logistici o di coordinamento tra professionisti o con strutture esterne.']
];
?>
<?php function print_items($list){
  foreach($list as $i=>$it){
    $id='idcpal-'.str_replace(['.',' '],'',$it[0]);
    $badge=$it[2]=='AC'? 'bg-danger' : 'bg-warning text-dark';
    echo "<div class='form-check mb-2' data-bs-toggle='tooltip' data-bs-trigger='hover' data-bs-title='".htmlspecialchars($it[3])."'>";
    echo "<input class='form-check-input idcpal-check' type='checkbox' id='$id' data-class='{$it[2]}' data-label='{$it[0]} - {$it[1]}'>";
    echo "<label class='form-check-label' for='$id'><span class='fw-bold'>{$it[0]}</span> – {$it[1]} <span class='badge $badge ms-2'>{$it[2]}</span></label>";
    echo "</div>";
  }
}
?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="head-sec1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sec1" aria-expanded="true">
              Elementi dipendenti dal paziente
            </button>
          </h2>
          <div id="sec1" class="accordion-collapse collapse show" data-bs-parent="#idcpal-acc">
            <div class="accordion-body">
              <h6 class="mb-2">1.1 – Contesto</h6>
              <?php print_items($sec1_1); ?>
              <h6 class="mt-3 mb-2">1.2 – Condizione clinica</h6>
              <?php print_items($sec1_2); ?>
              <h6 class="mt-3 mb-2">1.3 – Condizione psico-emotiva</h6>
              <?php print_items($sec1_3); ?>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="head-sec2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sec2" aria-expanded="false">
              Elementi dipendenti dalla famiglia e dall’ambiente
            </button>
          </h2>
          <div id="sec2" class="accordion-collapse collapse" data-bs-parent="#idcpal-acc">
            <div class="accordion-body">
              <?php print_items($sec2); ?>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="head-sec3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sec3" aria-expanded="false">
              Elementi che dipendono dall’organizzazione sanitaria
            </button>
          </h2>
          <div id="sec3" class="accordion-collapse collapse" data-bs-parent="#idcpal-acc">
            <div class="accordion-body">
              <h6 class="mb-2">3.1 – Professionisti e team</h6>
              <?php print_items($sec3_1); ?>
              <h6 class="mt-3 mb-2">3.2 – Risorse</h6>
              <?php print_items($sec3_2); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-3">
        <span class="badge bg-warning text-dark me-2" id="idcpal-count-c">0 C</span>
        <span class="badge bg-danger" id="idcpal-count-ac">0 AC</span>
      </div>
      <div class="mt-3">
        <label class="form-label d-block">Classificazione finale</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="idcpal-esito" id="idcpal-esito1" value="Non complessa">
          <label class="form-check-label" for="idcpal-esito1">Non complessa</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="idcpal-esito" id="idcpal-esito2" value="Complessa">
          <label class="form-check-label" for="idcpal-esito2">Complessa</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="idcpal-esito" id="idcpal-esito3" value="Altamente complessa">
          <label class="form-check-label" for="idcpal-esito3">Altamente complessa</label>
        </div>
      </div>
      <div class="mt-3">
        <button type="button" id="idcpal-genera" class="btn btn-primary">Genera scheda</button>
      </div>
    </form>
  </div>
</section>
<script>
document.addEventListener('DOMContentLoaded',function(){
  let sceltaManuale=false;
  function updateCounts(){
    let c=0, ac=0;
    document.querySelectorAll('#idcpal-home .idcpal-check').forEach(cb=>{
      if(cb.checked){ if(cb.dataset.class==='C') c++; else ac++; }
    });
    document.getElementById('idcpal-count-c').textContent=c+' C';
    document.getElementById('idcpal-count-ac').textContent=ac+' AC';
    if(!sceltaManuale){
      if(ac>0) document.getElementById('idcpal-esito3').checked=true;
      else if(c>0) document.getElementById('idcpal-esito2').checked=true;
      else document.getElementById('idcpal-esito1').checked=true;
    }
  }
  document.querySelectorAll('#idcpal-home .idcpal-check').forEach(cb=>{
    cb.addEventListener('change',updateCounts);
  });
  document.querySelectorAll('input[name="idcpal-esito"]').forEach(r=>{
    r.addEventListener('change',()=>{sceltaManuale=true;});
  });
  updateCounts();
  const btn=document.getElementById('idcpal-genera');
  if(btn){
    btn.addEventListener('click',function(){
      const nome=document.getElementById('idcpal-nome').value;
      const data=document.getElementById('idcpal-data').value;
      let voce=[];
      document.querySelectorAll('#idcpal-home .idcpal-check:checked').forEach(cb=>{voce.push(cb.dataset.label);});
      const esito=document.querySelector('input[name="idcpal-esito"]:checked');
      const finale=esito?esito.value:'';
      const testo=`IDC-PAL\nPaziente: ${nome}\nData: ${data}\nVoci: ${voce.join(', ')}\nClassificazione: ${finale}`;
      alert(testo);
    });
  }
});
</script>
