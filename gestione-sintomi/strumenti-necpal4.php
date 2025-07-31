<?php
// NECPAL 4.0 - Form semplificato
?>
<section id="necpal4-home" class="p-4" style="display:none;">
  <div class="bg-white p-4 rounded shadow-sm">
    <h5 class="mb-3"><i class="fas fa-id-card me-2"></i>NECPAL 4.0</h5>
    <form id="necpal4-form">
      <div class="mb-3">
        <label class="form-label">Data compilazione</label>
        <input type="date" id="necpal4-data" class="form-control" value="<?php echo date('Y-m-d'); ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Nome e Cognome</label>
        <input type="text" id="necpal4-nome" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Data di nascita</label>
        <input type="date" id="necpal4-nascita" class="form-control">
      </div>
      <fieldset class="mb-3">
        <legend class="form-label">Saresti sorpreso se il paziente morisse entro 12 mesi?</legend>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sq" id="necpal4-yes" value="yes">
          <label class="form-check-label" for="necpal4-yes">Sì</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sq" id="necpal4-no" value="no">
          <label class="form-check-label" for="necpal4-no">No</label>
        </div>
      </fieldset>
      <div id="msgNeg4" class="alert alert-danger" style="display:none;">NECPAL negativo</div>
      <div id="tree4" style="display:none;">
        <div class="mb-3">
          <label class="form-label">Scelta/Richiesta di cure palliative</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="richiesta-cp">
            <label class="form-check-label" for="richiesta-cp">Sì</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Bisogni identificati dal team curante</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="bisogni-cp">
            <label class="form-check-label" for="bisogni-cp">Sì</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Malattia avanzata</label>
<?php
$patologie = [
  ['Patologia oncologica','info-oncologia'],
  ['Malattia polmonare cronica','info-polmonare'],
  ['Malattia cardiaca cronica','info-cardiaca'],
  ['Demenza o malattia neurologica','info-demenza'],
  ['Patologia epatica','info-epatica'],
  ['Patologia renale','info-renale']
];
foreach($patologie as $i=>$p): ?>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="patologia-<?php echo $i; ?>">
            <label class="form-check-label" for="patologia-<?php echo $i; ?>">
              <?php echo $p[0]; ?> <sup class="link-indicatore text-primary" role="button" data-target="<?php echo $p[1]; ?>">i</sup>
            </label>
          </div>
<?php endforeach; ?>
        </div>
        <button type="button" id="necpal4-calc" class="btn btn-primary">Valuta</button>
        <div id="necpal4-output" class="mt-3"></div>
      </div>
    </form>
  </div>
</section>

<?php foreach($patologie as $p): ?>
<div id="<?php echo $p[1]; ?>" class="popup-indicatore">
  <div class="popup-indicatore-contenuto">
    <button class="btn-close close-popup mb-2"></button>
    <h5><?php echo $p[0]; ?></h5>
    <p>Informazioni sulla patologia.</p>
  </div>
</div>
<?php endforeach; ?>

<script>
document.addEventListener('DOMContentLoaded', function(){
  const yes = document.getElementById('necpal4-yes');
  const no = document.getElementById('necpal4-no');
  const msgNeg = document.getElementById('msgNeg4');
  const tree = document.getElementById('tree4');
  const output = document.getElementById('necpal4-output');
  function update(){
    if(yes.checked){
      msgNeg.style.display='block';
      tree.style.display='none';
    } else if(no.checked){
      msgNeg.style.display='none';
      tree.style.display='block';
    } else {
      msgNeg.style.display='none';
      tree.style.display='none';
    }
  }
  [yes,no].forEach(r=>r.addEventListener('change',update));
  update();
  document.getElementById('necpal4-calc').addEventListener('click',function(){
    let positivo = false;
    document.querySelectorAll('#tree4 input[type=checkbox]').forEach(cb=>{ if(cb.checked) positivo = true; });
    output.className = 'alert mt-3 ' + (positivo ? 'alert-success' : 'alert-danger');
    output.textContent = positivo ? 'NECPAL positivo' : 'NECPAL negativo';
  });
  document.querySelectorAll('.link-indicatore').forEach(el => el.addEventListener('click',function(){
    const pop = document.getElementById(this.dataset.target);
    if(pop) pop.style.display='flex';
  }));
  document.querySelectorAll('.popup-indicatore .close-popup').forEach(btn => btn.addEventListener('click',()=>btn.closest('.popup-indicatore').style.display='none'));
  document.querySelectorAll('.popup-indicatore').forEach(p => p.addEventListener('click',e=>{if(e.target===p) p.style.display='none';}));
});
</script>
