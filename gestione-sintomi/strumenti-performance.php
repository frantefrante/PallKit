<?php
// Sezione Performance con quattro scale
?>
<style>
.performance-card{cursor:pointer;}
.perf-modal{display:none;position:fixed;z-index:1050;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.5);} 
.perf-modal-content{background:#fff;margin:10% auto;padding:2rem;border-radius:8px;max-width:600px;position:relative;} 
.perf-modal-content .close{position:absolute;right:1rem;top:0.5rem;font-size:1.5rem;cursor:pointer;}
</style>
<section id="performance-home" class="p-4" style="display:none;">
  <h5 class="mb-3"><i class="fas fa-running me-2"></i>Scale di Performance</h5>
  <div class="row g-3">
    <div class="col-md-6 col-lg-3">
      <div class="card text-center performance-card" onclick="openPerfModal('akps')">
        <div class="card-body">
          <h5 class="card-title">AKPS</h5>
          <p class="card-text small">Australia-modified Karnofsky</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="card text-center performance-card" onclick="openPerfModal('pps')">
        <div class="card-body">
          <h5 class="card-title">PPS</h5>
          <p class="card-text small">Palliative Performance Scale</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="card text-center performance-card" onclick="openPerfModal('adl')">
        <div class="card-body">
          <h5 class="card-title">ADL</h5>
          <p class="card-text small">Activities of Daily Living</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="card text-center performance-card" onclick="openPerfModal('badl')">
        <div class="card-body">
          <h5 class="card-title">BADL</h5>
          <p class="card-text small">Basic ADL</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modali -->
<div id="modal-akps" class="perf-modal">
  <div class="perf-modal-content">
    <span class="close" onclick="closePerfModal('akps')">&times;</span>
    <h3>AKPS</h3>
    <p>Scala in costruzione.</p>
  </div>
</div>
<div id="modal-pps" class="perf-modal">
  <div class="perf-modal-content">
    <span class="close" onclick="closePerfModal('pps')">&times;</span>
    <h3>PPS</h3>
    <p>Scala in costruzione.</p>
  </div>
</div>
<div id="modal-adl" class="perf-modal">
  <div class="perf-modal-content">
    <span class="close" onclick="closePerfModal('adl')">&times;</span>
    <h3>ADL</h3>
    <p>Scala in costruzione.</p>
  </div>
</div>
<div id="modal-badl" class="perf-modal">
  <div class="perf-modal-content">
    <span class="close" onclick="closePerfModal('badl')">&times;</span>
    <h3>BADL</h3>
    <p>Scala in costruzione.</p>
  </div>
</div>

<script>
function openPerfModal(id){
  document.getElementById('modal-'+id).style.display='block';
  document.body.style.overflow='hidden';
}
function closePerfModal(id){
  document.getElementById('modal-'+id).style.display='none';
  document.body.style.overflow='auto';
}
</script>
