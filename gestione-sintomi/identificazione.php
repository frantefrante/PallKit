<?php
/**
 * File: identificazione.php
 * Form NECPAL “standalone” ricostruito dal JSON di Forminator
 */
?>
<section id="identificazione-home" class="p-4" style="display:none;">
  <div class="bg-white p-4 rounded shadow-sm">
    <h5 class="mb-3"><i class="fas fa-id-card me-2"></i>Modulo Identificazione (NECPAL)</h5>
    <form id="necpal-form" class="local-save" data-tipo="NECPAL" action="#" method="post">
      <!-- Data compilazione -->
      <div class="mb-3">
        <label for="date-1" class="form-label">Data compilazione <span class="text-danger">*</span></label>
        <input type="date" id="date-1" name="date_1" class="form-control" required value="<?php echo date('Y-m-d'); ?>">
      </div>

      <!-- Nome e Cognome -->
      <div class="mb-3">
        <label for="text-1" class="form-label">Nome e Cognome <span class="text-danger">*</span></label>
        <input type="text" id="text-1" name="text_1" class="form-control" readonly required>
      </div>

      <!-- Data di nascita -->
      <div class="mb-3">
        <label for="date-2" class="form-label">Data di nascita <span class="text-danger">*</span></label>
        <input type="date" id="date-2" name="date_2" class="form-control" readonly required>
      </div>

      <!-- Surprise question -->
      <fieldset class="mb-3">
        <legend class="form-label">Saresti sorpreso se il paziente morisse entro 6 mesi? <span class="text-danger">*</span></legend>
        <div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="radio_1" id="radio-1-yes" value="one" required>
            <label class="form-check-label" for="radio-1-yes">Sì</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="radio_1" id="radio-1-no"  value="two">
            <label class="form-check-label" for="radio-1-no">No</label>
          </div>
        </div>
        <div class="form-text">test_necpal</div>
      </fieldset>

      <!-- Messaggio NECPAL negativo (show if “Sì”) -->
      <div id="html-1" class="alert alert-danger" style="display:none;">
        <strong>Domanda sorprendente negativa:</strong><br>
        Il paziente non necessita di cure palliative, non è quindi necessario procedere con la compilazione.
      </div>

      <!-- Tutto il blocco successivo compare solo se risposta “No” -->
      <div id="conditional-no" style="display:none;">

        <!-- Scelta/Richiesta palliativo -->
        <div class="mb-3">
          <label class="form-label">
            Scelta/Richiesta: il paziente o i familiari hanno richiesto un approccio palliativo o una limitazione ai trattamenti?
          </label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="checkbox_1" id="checkbox-1" value="one">
            <label class="form-check-label" for="checkbox-1">Sì</label>
          </div>
        </div>

        <!-- Bisogni identificati -->
        <div class="mb-3">
          <label class="form-label">Bisogni: identificati dai sanitari del team curante</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="checkbox_2" id="checkbox-2" value="one">
            <label class="form-check-label" for="checkbox-2">Sì</label>
          </div>
        </div>

        <!-- Indicatori Clinici Generali -->
        <div class="mb-3">
          <label class="form-label">Indicatori Clinici Generali (ultimi 6 mesi) – Spunta tutti quelli che si applicano:</label>
          <?php
          $gen = [
            "Perdita di peso > 10%",
            "Declino funzionale: Australian Karnofsky riduzione > 30%",
            "Declino funzionale: ADL riduzione > 2 funzioni",
            "Declino cognitivo: Perdita ≥ 5 punti MMSE",
            "Dipendenza grave: Australian Karnofsky (AKPS) < 50",
            "Sindromi geriatriche ≥ 2 (cadute, disfagia, delirium, ulcere da decubito, infezioni)",
            "Sintomi persistenti: Dolore, Astenia, Anoressia o ESAS/IPOS ≥ 2 sintomi",
            "Aspetti psico-sociali: DME > 9 o 2 items IPOS ≥ 3",
            "Vulnerabilità sociale grave (valutazione sociale/familiare)",
            "Comorbidità > 2 malattie croniche",
            "Utilizzo risorse: > 2 ricoveri urgenti/non pianificati ultimi 6 mesi",
            "Utilizzo risorse: Aumento domanda/interventi"
          ];
          foreach($gen as $i=>$label): ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="checkbox_3[]" id="checkbox-3-<?php echo $i ?>" value="<?php echo htmlspecialchars($label) ?>">
              <label class="form-check-label" for="checkbox-3-<?php echo $i ?>"><?php echo $label ?></label>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Indicatori Specifici di gravità/progressione -->
        <div class="mb-3">
          <label class="form-label">Indicatori Specifici di gravità/progressione di malattia – Spunta se applica:</label>
          <?php
          $spec = [
            ['Cancro','popup-indicatore-cancro'],
            ['Patologie polmonari croniche','popup-indicatore-bpco'],
            ['Patologie cardiache croniche','popup-indicatore-cardiache'],
            ['Demenza','popup-indicatore-demenza'],
            ['Fragilità','popup-indicatore-fragilita'],
            ['Patologie neurovascolari croniche (ictus)','popup-indicatore-ictus'],
            ['Patologie neurologiche croniche: SM/SLA/Parkinson','popup-indicatore-neuro'],
            ['Patologie epatiche croniche','popup-indicatore-epatiche'],
            ['Patologia renale cronica','popup-indicatore-renale']
          ];
          foreach($spec as $i=>$item): ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="checkbox_4[]" id="checkbox-4-<?php echo $i ?>" value="<?php echo htmlspecialchars($item[0]) ?>">
              <label class="form-check-label" for="checkbox-4-<?php echo $i ?>">
                <span class="link-indicatore" data-target="<?php echo $item[1] ?>"><?php echo $item[0] ?></span>
              </label>
            </div>
          <?php endforeach; ?>
        </div>

      </div><!-- /#conditional-no -->

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save me-2"></i>Salva Identificazione
        </button>
      </div>
    </form>
    <!-- Risultato salvataggio -->
    <div id="necpal-result" class="mt-4" style="display:none;">
      <div class="mb-2">
        <button type="button" id="btn-view-necpal" class="btn btn-outline-secondary me-2">Visualizza</button>
        <button type="button" id="btn-save-pdf" class="btn btn-success">Scarica PDF</button>
      </div>
      <div id="necpal-preview" class="mt-2" style="display:none;"></div>
    </div>
  </div>
</section>

<script>
// logica di show/hide condizionale
document.addEventListener('DOMContentLoaded', function(){
  const yes = document.getElementById('radio-1-yes');
  const no  = document.getElementById('radio-1-no');
  const msgNeg = document.getElementById('html-1');
  const cond   = document.getElementById('conditional-no');

  function update() {
    if(yes.checked) {
      msgNeg.style.display = 'block';
      cond.style.display  = 'none';
    }
    else if(no.checked) {
      msgNeg.style.display = 'none';
      cond.style.display  = 'block';
    }
    else {
      msgNeg.style.display = cond.style.display = 'none';
    }
  }

  [ yes, no ].forEach(radio => {
    radio.addEventListener('change', update);
  });
  update();
});
</script>