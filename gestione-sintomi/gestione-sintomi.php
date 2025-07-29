<?php
// gestione-sintomi.php
?>
<section id="gestione-home" class="sintomo-section container p-4" data-sintomo="gestione-home" style="display:none;">
  <div class="row">
    <!-- Form Card -->
    <div class="col-12 col-md-6 col-lg-4 mb-4" id="form-col-home">
      <div class="form-card p-3 bg-white rounded shadow-sm">
        <h6>Gestione Sintomi</h6>
        <div class="mb-3">
          <label class="form-label">Sintomo</label>
          <select id="sintomo-home" class="form-select">
            <option value="">-- Seleziona --</option>
            <!-- Le opzioni verranno popolate via JS -->
          </select>
        </div>
        <div id="custom-sintomo-group-home" class="mb-3" style="display:none;">
          <input type="text" id="custom-sintomo-home" class="form-control" placeholder="Inserisci sintomo">
        </div>
        <div class="mb-3">
          <label class="form-label">Molecola</label>
          <select id="farmaco-home" class="form-select" disabled></select>
          <input type="text" id="custom-farmaco-home" class="form-control mt-2" style="display:none;"
                 placeholder="Inserisci molecola">
        </div>
        <div id="formulazione-group-home" class="mb-3" style="display:none;">
          <label class="form-label">Formulazione</label>
          <select id="formulazione-home" class="form-select">
            <option value="">--</option>
            <option value="cp">cp</option>
            <option value="gtt">gtt</option>
            <option value="fiale">fiale</option>
            <option value="cerotto">cerotto</option>
            <option value="spray">spray</option>
            <option value="supposte">supposte</option>
          </select>
          <input type="text" id="custom-formulazione-home" class="form-control mt-2" style="display:none;"
                 placeholder="Inserisci formulazione">
        </div>
        <div class="mb-3">
          <label class="form-label">Via</label>
          <select id="via-home" class="form-select" disabled>
            <option value="">--</option>
            <option value="OS">OS</option>
            <option value="EV">EV</option>
            <option value="IM">IM</option>
            <option value="SC">SC</option>
            <option value="NAS">NAS</option>
            <option value="TTS">TTS</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Dosaggio</label>
          <input type="text" id="dose-home" class="form-control" readonly>
        </div>
        <div class="mb-3">
          <label class="form-label">Posologia</label>
          <input type="text" id="posologia-home" class="form-control" placeholder="(puoi digitare qui)">
        </div>
        <div class="mb-3">
          <label class="form-label">Frequenza</label>
          <input type="text" id="frequenza-home" class="form-control" placeholder="(puoi digitare qui)">
        </div>
        <div class="d-grid gap-2">
          <button id="btn-add-home" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Aggiungi
          </button>
          
        </div>
      </div>
    </div>

    <!-- Table Card -->
    <div class="col-12 col-md-6 col-lg-8" id="terapie-container-home-wrapper">
      <div class="bg-white p-3 rounded shadow-sm" id="terapie-container-home">
        <h6>Elenco Terapie</h6>
        <table class="table table-striped mt-3" id="table-terapie-home">
          <thead>
            <tr>
              <th>Sintomo</th>
              <th>Farmaco</th>
              <th>Via</th>
              <th>Dose</th>
              <th>Posologia</th>
              <th>Freq.</th>
              <th>Azioni</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        <div class="d-flex justify-content-end">
          <button id="btn-export-pdf-home" class="btn btn-outline-secondary me-2">
            <i class="fas fa-file-pdf me-1"></i>Esporta PDF
          </button>
          <button id="btn-export-home" class="btn btn-success">
            <i class="fas fa-file-export me-1"></i>Esporta Word
          </button>
        </div>
      </div>
    </div>
  </div>
</section>