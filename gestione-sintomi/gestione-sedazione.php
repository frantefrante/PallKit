<?php
// gestione-sedazione.php
?>
  <div class="row">
    <div class="col-lg-6">
      <h4>Sedazione Palliativa</h4>
      <!-- 1. Dropdown farmaci -->
      <div class="mb-3">
        <label for="select-drug" class="form-label">Seleziona Farmaco</label>
        <select id="select-drug" class="form-select">
          <option value="">-- Scegli --</option>
        </select>
      </div>

      <!-- 2. Tabella schema farmaco: content loaded dynamically -->
      <div id="drug-schema" style="display:none;"></div>
    </div>

    <div class="col-lg-6">
      <!-- 3. Calcolatore dose -->
      <div id="dose-calculator" class="card mb-4" style="display:none;">
        <div class="card-body">
          <h5 class="card-title">Calcolatore Dose</h5>
          <div class="row g-2 align-items-end">
            <div class="col">
              <label class="form-label">Posologia (mg/kg)</label>
              <input type="number" id="calc-poso" class="form-control" placeholder="es. 0.03">
            </div>
            <div class="col">
              <label class="form-label">Peso (kg)</label>
              <input type="number" id="calc-weight" class="form-control" placeholder="es. 70">
            </div>
            <div class="col-auto">
              <button id="btn-calc-dose" class="btn btn-primary">Calcola</button>
            </div>
            <div class="col-12">
              <small id="calc-result" class="text-success"></small>
            </div>
          </div>
        </div>
      </div>

      <!-- 4. Aggiungi al piano cura -->
      <div id="add-to-plan" class="card" style="display:none;">
        <div class="card-body">
          <h5 class="card-title">Aggiungi al Piano Cura</h5>
          <form id="form-add-plan" class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Farmaco</label>
              <input type="text" id="plan-drug" class="form-control" readonly>
            </div>
            <div class="col-md-6">
              <label class="form-label">Dose (mg)</label>
              <input type="number" id="plan-dose" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Via</label>
              <input type="text" id="plan-via" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Note</label>
              <input type="text" id="plan-note" class="form-control">
            </div>
            <div class="col-12">
              <button id="btn-add-plan" class="btn btn-success w-100">+ Aggiungi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- 5. Riepilogo e esportazione -->
  <div class="mt-4">
    <h5>Riepilogo Sedazione</h5>
    <table class="table table-striped" id="table-plan">
      <thead>
        <tr><th>Farmaco</th><th>Dose</th><th>Via</th><th>Note</th><th>Azioni</th></tr>
      </thead>
      <tbody></tbody>
    </table>
    <button id="export-plan" class="btn btn-primary">Esporta in Word</button>
  </div>

<!-- Script: dati + logica -->
<script src="js/sedazione.data.js"></script>
<script src="js/sedazione-ui.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.forEach(function (el) {
      new bootstrap.Popover(el);
    });
    console.log("⚙️ gestione-sedazione initialized");
  });
</script>
