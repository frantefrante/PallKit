<?php
?>
<section id="ipos-home" class="p-4" style="display:none;">
  <div class="bg-white p-4 rounded shadow-sm">
    <h5 class="mb-3"><i class="fas fa-chart-line me-2"></i>IPOS</h5>
    <form id="ipos-form" action="process-ipos.php" method="post">
      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Nome paziente</label>
          <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">ID paziente</label>
          <input type="text" name="id_paziente" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Data compilazione</label>
          <input type="date" name="data_compilazione" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
        </div>
      </div>
      <div class="row g-3 mt-3">
        <div class="col-md-6">
          <label class="form-label">Chi compila</label>
          <select id="ipos-compilatore" name="compilatore" class="form-select" required>
            <option value="paziente">Paziente</option>
            <option value="staff">Staff</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Intervallo</label>
          <select id="ipos-intervallo" name="intervallo" class="form-select" required>
            <option value="3">Ultimi 3 giorni</option>
            <option value="7">Ultima settimana</option>
          </select>
        </div>
      </div>

      <hr class="my-4">
      <div class="mb-3">
        <label class="form-label" data-int="Elenca le principali problematiche incontrate {INT}">Domanda 1</label>
        <textarea name="q1" class="form-control" rows="2" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label" data-int="Indica l'intensità dei seguenti sintomi {INT}">Domanda 2</label>
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead>
              <tr><th>Sintomo</th><th colspan="6" class="text-center">Intensità</th></tr>
            </thead>
            <tbody>
<?php
$sintomi=["Dolore","Mancanza di fiato","Debolezza o mancanza di energia","Nausea","Vomito","Scarso appetito","Stitichezza","Problemi al cavo orale","Sonnolenza","Problemi di mobilizzazione"];
foreach($sintomi as $i=>$s):?>
              <tr>
                <td><?php echo $s; ?></td>
                <?php for($v=0;$v<=4;$v++): ?>
                <td class="text-center"><input type="radio" name="q2[<?php echo $i; ?>]" value="<?php echo $v; ?>" required></td>
                <?php endfor; ?>
                <td class="nv-opt text-center"><input type="radio" name="q2[<?php echo $i; ?>]" value="5"></td>
              </tr>
<?php endforeach; ?>
<?php for($j=0;$j<3;$j++): ?>
              <tr>
                <td><input type="text" name="q2_extra[<?php echo $j; ?>][nome]" class="form-control"></td>
                <?php for($v=0;$v<=4;$v++): ?>
                <td class="text-center"><input type="radio" name="q2_extra[<?php echo $j; ?>][val]" value="<?php echo $v; ?>"></td>
                <?php endfor; ?>
                <td class="nv-opt text-center"><input type="radio" name="q2_extra[<?php echo $j; ?>][val]" value="5"></td>
              </tr>
<?php endfor; ?>
            </tbody>
          </table>
        </div>
      </div>
<?php
$domande=[
  3=>"Quanto ti sei sentito ansioso o preoccupato {INT}?",
  4=>"Quanto ti sei sentito depresso {INT}?",
  5=>"Quanto familiari o caregiver sono stati preoccupati per te {INT}?",
  6=>"Ti sei sentito in pace con te stesso {INT}?",
  7=>"Hai condiviso i tuoi stati d'animo con i tuoi cari {INT}?",
  8=>"Hai ricevuto tutte le informazioni che desideravi {INT}?",
  9=>"Eventuali problemi pratici o economici sono stati affrontati?" ,
];
$scale=[0,1,2,3,4];
?>
<?php for($q=3;$q<=9;$q++): ?>
      <div class="mb-3">
        <label class="form-label" data-int="<?php echo $domande[$q]; ?>">Domanda <?php echo $q; ?></label>
        <div>
          <?php foreach($scale as $v): ?>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q<?php echo $q; ?>" value="<?php echo $v; ?>" required>
            <label class="form-check-label"><?php echo $v; ?></label>
          </div>
          <?php endforeach; ?>
          <div class="form-check form-check-inline nv-opt">
            <input class="form-check-input" type="radio" name="q<?php echo $q; ?>" value="5">
            <label class="form-check-label">Non valutabile</label>
          </div>
        </div>
      </div>
<?php endfor; ?>
      <div class="mb-3 q10-only">
        <label class="form-label">Come è stato compilato il questionario?</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="q10" value="solo" required>
          <label class="form-check-label">Da solo</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="q10" value="familiare">
          <label class="form-check-label">Con l'aiuto di un familiare/amico</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="q10" value="staff">
          <label class="form-check-label">Con l'aiuto di un membro dello staff</label>
        </div>
      </div>
      <div class="d-grid mb-3">
        <button id="btn-riepilogo" class="btn btn-secondary">Riepilogo</button>
      </div>
      <div id="ipos-riepilogo" style="display:none;" class="mb-3">
        <h6 class="mb-2">Controlla i dati inseriti:</h6>
        <div id="ipos-summary" class="mb-2"></div>
        <button type="submit" class="btn btn-primary">Conferma e Invia</button>
      </div>
    </form>

    <hr>
    <h6 class="mt-4">Compilazioni recenti</h6>
<?php
require_once __DIR__ . '/config.php';
try {
  $pdo = getPDO();
  $stmt = $pdo->query("SELECT * FROM ipos_submissions ORDER BY data_compilazione DESC");
  $rows = $stmt->fetchAll();
} catch (Exception $e) {
  $rows = [];
}
if($rows): ?>
    <div class="table-responsive mb-4">
      <table class="table table-sm">
        <thead><tr><th>Nome</th><th>ID Paziente</th><th>Data</th><th>Punteggio</th></tr></thead>
        <tbody>
<?php foreach($rows as $r): ?>
          <tr><td><?php echo htmlspecialchars($r['nome_paziente']); ?></td><td><?php echo htmlspecialchars($r['id_paziente']); ?></td><td><?php echo htmlspecialchars($r['data_compilazione']); ?></td><td><?php echo $r['punteggio_totale']; ?></td></tr>
<?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php endif; ?>
    <canvas id="ipos-chart" height="200"></canvas>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/ipos.js"></script>
<script>
(function(){
  const data = <?php echo json_encode($rows ?? []); ?>;
  if(!data.length) return;
  const ctx = document.getElementById('ipos-chart').getContext('2d');
  const labels = data.map(r=>r.data_compilazione);
  const scores = data.map(r=>parseInt(r.punteggio_totale,10));
  new Chart(ctx,{type:'line',data:{labels:labels,datasets:[{label:'Punteggio IPOS',data:scores,fill:false,borderColor:'blue'}]}});
})();
</script>
