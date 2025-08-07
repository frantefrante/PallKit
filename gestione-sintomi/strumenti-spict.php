<?php
// Form per lo strumento SPICT
$indicatori_generali = [
  'ricoveri' => 'Ricovero(i) ospedaliero(i) non programmato(i)',
  'performance' => 'Performance Status basso oppure in peggioramento, con limitata reversibilità (es. la persona rimane a letto o in poltrona per più di metà giornata).',
  'dipendenza' => 'Dipendenza dall’assistenza degli altri a causa di problemi fisici e/o cognitivi in progressivo peggioramento.',
  'caregiver' => 'La persona che assiste il paziente necessita di maggiore aiuto e supporto.',
  'peso' => 'Progressiva perdita di peso; persistente sottopeso; massa muscolare ridotta.',
  'sintomi' => 'Sintomi persistenti nonostante il trattamento ottimale della/e patologia/e di base.',
  'richiesta' => 'La persona (o la sua famiglia) chiede di ricevere cure palliative; sceglie di ridurre, sospendere o non iniziare nuovi trattamenti; oppure desidera concentrarsi sulla qualità di vita.'
];

$indicatori_patologie = [
  'Cancro' => [
    'Deterioramento delle capacità funzionali dovuto alla progressione del cancro.',
    'Le condizioni generali non consentono di iniziare o continuare trattamenti oncologici specifici oppure la terapia in atto è finalizzata unicamente al controllo dei sintomi.'
  ],
  'Demenza/Fragilità' => [
    'Incapacità di vestirsi, camminare o mangiare senza aiuto.',
    'La persona mangia e beve meno; ha difficoltà nella deglutizione.',
    'Incontinenza urinaria e fecale.',
    'Non in grado di comunicare verbalmente; interazione sociale scarsa.',
    'Cadute frequenti; frattura del femore.',
    'Episodi febbrili ricorrenti o infezioni; polmonite da aspirazione.'
  ],
  'Patologia cardiaca/vascolare' => [
    'Scompenso cardiaco o malattia coronarica estesa, non trattabile, con affanno o dolore toracico a riposo o per sforzi lievi.',
    'Malattia vascolare periferica severa ed inoperabile.'
  ],
  'Patologia respiratoria' => [
    'Patologia polmonare cronica severa con affanno a riposo o per sforzi lievi tra gli episodi di riacutizzazione.',
    'Ipossia persistente, con necessità di ossigenoterapia a lungo termine.',
    'Pregressa ventilazione meccanica (invasiva o non) per insufficienza respiratoria, oppure ventilazione controindicata.'
  ],
  'Patologia renale' => [
    'Insufficienza renale cronica stadio 4 o 5 (eGFR <30 ml/min) con deterioramento delle condizioni cliniche.',
    'Insufficienza renale che complica altre patologie a prognosi infausta oppure complica la somministrazione di altri trattamenti.',
    'La dialisi viene sospesa oppure non viene iniziata.'
  ],
  'Patologia epatica' => [
    'Cirrosi con una o più delle seguenti complicanze nell’ultimo anno: ascite resistente ai diuretici, encefalopatia epatica, sindrome epatorenale, peritonite batterica, sanguinamento ricorrente da varici.',
    'Il trapianto di fegato non è possibile.'
  ],
  'Patologia neurologica' => [
    'Progressivo deterioramento delle funzioni fisiche e/o cognitive, nonostante la terapia ottimale.',
    'Disturbi della parola con deterioramento progressivo della comunicazione e/o della deglutizione.',
    'Polmonite da aspirazione ricorrente; affanno o insufficienza respiratoria.',
    'Paralisi persistente a seguito di accidente cerebrovascolare, con significativa perdita funzionale e disabilità permanente.'
  ],
  'Altre patologie' => [
    'Peggioramento e rischio di morte a causa di altre patologie o complicanze irreversibili; qualsiasi trattamento avrà scarso beneficio.'
  ]
];
?>
<section id="spict-home" class="p-4" style="display:none;">
  <div class="bg-white p-4 rounded shadow-sm">
    <h5 class="mb-3"><i class="fas fa-id-card me-2"></i>SPICT</h5>
    <form id="spict-form" class="local-save" data-tipo="SPICT" action="#" method="post">
      <div class="row g-3 mb-3">
        <div class="col-md-4">
          <label class="form-label">Nome e Cognome</label>
          <input type="text" id="spict-nome" name="nome" class="form-control" readonly>
        </div>
        <div class="col-md-4">
          <label class="form-label">Data di nascita</label>
          <input type="date" id="spict-nascita" name="data_nascita" class="form-control" readonly>
        </div>
        <div class="col-md-4">
          <label class="form-label">Data compilazione</label>
          <input type="date" id="spict-data" name="data_compilazione" class="form-control" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <input type="hidden" id="spict-id" name="id_paziente">
      </div>

      <p class="fw-bold">Indicatori generali</p>
      <div class="row g-3 mb-4">
        <?php foreach($indicatori_generali as $id=>$text): ?>
        <div class="col-md-6">
          <div class="item-card">
            <div class="form-check">
              <input class="form-check-input item-check" type="checkbox" id="gen-<?php echo $id; ?>" name="generali[]" value="<?php echo htmlspecialchars($text, ENT_QUOTES); ?>">
              <label class="form-check-label" for="gen-<?php echo $id; ?>"><?php echo $text; ?></label>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <p class="fw-bold">Indicatori clinici specifici</p>
      <?php foreach($indicatori_patologie as $pat=>$items): ?>
        <h6 class="mt-3"><?php echo $pat; ?></h6>
        <div class="row g-3 mb-3">
          <?php foreach($items as $i=>$it): ?>
          <div class="col-md-6">
            <div class="item-card">
              <div class="form-check">
                <?php $cid = strtolower(preg_replace('/[^a-z0-9]+/i','-',$pat))."-$i"; ?>
                <input class="form-check-input item-check" type="checkbox" id="<?php echo $cid; ?>" name="patologie[<?php echo htmlspecialchars($pat, ENT_QUOTES); ?>][]" value="<?php echo htmlspecialchars($it, ENT_QUOTES); ?>">
                <label class="form-check-label" for="<?php echo $cid; ?>"><?php echo $it; ?></label>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Salva SPICT</button>
      </div>
    </form>
  </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('#spict-home .item-check').forEach(function(cb){
    const card = cb.closest('.item-card');
    function toggle(){ card.classList.toggle('selected', cb.checked); }
    cb.addEventListener('change', toggle);
    toggle();
  });
});
</script>
