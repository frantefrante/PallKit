<?php
// NECPAL 4.0 - Form semplificato
?>
<section id="necpal4-home" class="p-4" style="display:none;">
  <div class="bg-white p-4 rounded shadow-sm">
    <h5 class="mb-3"><i class="fas fa-id-card me-2"></i>NECPAL 4.0</h5>
    <form id="necpal4-form" action="process-necpal4.php" method="post">
      <div class="mb-3">
        <label class="form-label">Data compilazione</label>
        <input type="date" id="necpal4-data" name="date_1" class="form-control" value="<?php echo date('Y-m-d'); ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Nome e Cognome</label>
        <input type="text" id="necpal4-nome" name="text_1" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Data di nascita</label>
        <input type="date" id="necpal4-nascita" name="date_2" class="form-control" readonly>
      </div>
      <fieldset class="mb-3">
        <legend class="form-label">Ti sorprenderebbe se questo paziente morisse nell'arco dei prossimi 12 mesi?</legend>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sq" id="necpal4-yes" value="yes" required>
          <label class="form-check-label" for="necpal4-yes">Sì</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sq" id="necpal4-no" value="no">
          <label class="form-check-label" for="necpal4-no">No</label>
        </div>
      </fieldset>
      <div id="necpal4-neg" class="alert alert-danger" style="display:none;">NECPAL negativo</div>
      <div id="necpal4-cond" style="display:none;">
        <div class="mb-3">
          <label class="form-label">Bisogni palliativi</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="bisogni-pall" name="bisogni_pall">
            <label class="form-check-label" for="bisogni-pall">Presente</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Perdita funzionale</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="perdita-funz" name="perdita_funz">
            <label class="form-check-label" for="perdita-funz">Presente</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Perdita nutrizionale</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="perdita-nutr" name="perdita_nutr">
            <label class="form-check-label" for="perdita-nutr">Presente</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Multimorbidità</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="multi-morbid" name="multimorbidita">
            <label class="form-check-label" for="multi-morbid">Presente</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Utilizzo di risorse</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="uso-risorse" name="uso_risorse">
            <label class="form-check-label" for="uso-risorse">Presente</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Malattia avanzata</label>
<?php
$patologie = [
  ['Cancro','popup-indicatore-cancro'],
  ['Patologie polmonari croniche','popup-indicatore-bpco'],
  ['Patologie cardiache croniche','popup-indicatore-cardiache'],
  ['Demenza','popup-indicatore-demenza'],
  ['Fragilità geriatrica','popup-indicatore-fragilita'],
  ['Patologie neurovascolari (ictus)','popup-indicatore-ictus'],
  ['Patologie neurologiche croniche (SLA, SM, Parkinson, motoneurone)','popup-indicatore-neuro'],
  ['Patologie epatiche croniche','popup-indicatore-epatiche'],
  ['Patologie renali croniche','popup-indicatore-renale']
];
foreach($patologie as $i=>$p): ?>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="patologie[]" id="patologia-<?php echo $i; ?>" value="<?php echo htmlspecialchars($p[0]); ?>">
            <label class="form-check-label" for="patologia-<?php echo $i; ?>">
              <?php echo $p[0]; ?> <sup class="link-indicatore text-primary" role="button" data-target="<?php echo $p[1]; ?>">i</sup>
            </label>
          </div>
<?php endforeach; ?>
        </div>
        <div class="mb-3">
          <label class="form-label">Stima prognostica</label>
          <div id="necpal4-prognosi" class="alert alert-info" style="display:none;"></div>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Salva NECPAL 4</button>
        </div>
        <div id="necpal4-result" class="mt-4" style="display:none;">
          <div class="mb-2">
            <button type="button" id="btn-view-necpal4" class="btn btn-outline-secondary me-2">Visualizza</button>
            <button type="button" id="btn-save-pdf4" class="btn btn-success">Scarica PDF</button>
          </div>
          <div id="necpal4-preview" class="mt-2" style="display:none;"></div>
        </div>
      </div>
    </form>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded',function(){
  const yes=document.getElementById('necpal4-yes');
  const no=document.getElementById('necpal4-no');
  const neg=document.getElementById('necpal4-neg');
  const cond=document.getElementById('necpal4-cond');
  const prognosi=document.getElementById('necpal4-prognosi');

  function update(){
    if(yes.checked){
      neg.style.display='block';
      cond.style.display='none';
    }else if(no.checked){
      neg.style.display='none';
      cond.style.display='block';
    }else{
      neg.style.display='none';
      cond.style.display='none';
    }
  }

  [yes,no].forEach(r=>r.addEventListener('change',()=>{update();calcPrognosi();}));

  function countItems(){
    let c=0;
    if(document.getElementById('bisogni-pall').checked) c++;
    if(document.getElementById('perdita-funz').checked) c++;
    if(document.getElementById('perdita-nutr').checked) c++;
    if(document.getElementById('multi-morbid').checked) c++;
    if(document.getElementById('uso-risorse').checked) c++;
    let mal=false;
    document.querySelectorAll('input[name="patologie[]"]').forEach(cb=>{if(cb.checked) mal=true;});
    if(mal) c++;
    return c;
  }

  function calcPrognosi(){
    if(!no.checked){ prognosi.style.display='none'; return; }
    const n=countItems();
    if(n===0){ prognosi.style.display='none'; return; }
    let stadio='', mesi='';
    if(n<=2){ stadio='I'; mesi='38 mesi'; }
    else if(n<=4){ stadio='II'; mesi='17.2 mesi'; }
    else{ stadio='III'; mesi='3.6 mesi'; }
    prognosi.textContent=`Stadio ${stadio} – mediana ${mesi}`;
    prognosi.style.display='block';
  }

  document.querySelectorAll('#necpal4-cond input[type=checkbox]').forEach(cb=>cb.addEventListener('change',calcPrognosi));

  update();
});
</script>
