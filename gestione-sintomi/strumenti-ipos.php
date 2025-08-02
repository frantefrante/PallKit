<?php
?>
<section id="ipos-home" class="p-4" style="display:none;">
  <div class="bg-white p-4 rounded shadow-sm">
    <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>IPOS</h5>
    <a href="#" class="small text-decoration-underline float-end" data-bs-toggle="modal" data-bs-target="#guida-ipos-modal">Guida alla compilazione</a>
    <hr>
    <form id="ipos-form" class="local-save" data-tipo="IPOS" action="#" method="post">
      <div class="form-check form-switch mb-3">
        <input class="form-check-input" type="checkbox" id="ipos-use-test">
        <label class="form-check-label" for="ipos-use-test">Test</label>
      </div>
      <div class="row g-3 mb-3">
        <div class="col-md-4">
          <label class="form-label">Nome e Cognome</label>
          <input type="text" id="ipos-nome" name="nome" class="form-control" readonly>
        </div>
        <div class="col-md-4">
          <label class="form-label">Data di nascita</label>
          <input type="date" id="ipos-nascita" name="data_nascita" class="form-control" readonly>
        </div>
        <div class="col-md-4">
          <label class="form-label">Data compilazione</label>
          <input type="date" id="ipos-data" name="data_compilazione" class="form-control" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <input type="hidden" id="ipos-id" name="id_paziente">
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
        <label class="form-label" data-int="Q1. Quali sono stati i suoi problemi o le sue preoccupazioni più importanti {INT}?">Q1</label>
        <textarea name="q1" class="form-control" rows="2" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label" data-int="Q2. A seguire troverà una lista di sintomi. Indichi quanto ciascun sintomo l'ha disturbata {INT} (in caso di fluttuazioni segni un valore medio)">Q2</label>
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead>
              <tr>
                <th>Sintomo</th>
                <th class="text-center">0<br><small>No, per niente</small></th>
                <th class="text-center">1<br><small>Leggermente</small></th>
                <th class="text-center">2<br><small>Moderatamente</small></th>
                <th class="text-center">3<br><small>In modo severo</small></th>
                <th class="text-center">4<br><small>In modo intollerabile</small></th>
                <th class="text-center nv-opt">5<br><small>Non valutabile</small></th>
              </tr>
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
              <tr class="table-light">
                <td colspan="7" class="fw-light">Per favore elenchi eventuali altri sintomi non presenti nell’elenco precedente. Per ciascun sintomo, per favore, segni la casella che descrive meglio quanto quel sintomo l’ha disturbata nel corso degli ultimi tre giorni (nel caso il sintomo abbia avuto delle fluttuazioni indicare un valore medio)</td>
              </tr>
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
$domande1=[
  3=>"Q3. Si è sentito in ansia o preoccupato per la Sua malattia o per le terapie {INT}?",
  4=>"Q4. Qualcuno dei suoi cari è stato in ansia o preoccupato per Lei {INT}?",
  5=>"Q5. Si è sentito depresso {INT}?"
];
$domande2=[
  6=>"Q6. Si è sentito in pace con sé stesso {INT}?",
  7=>"Q7. Ha potuto condividere i Suoi stati d’animo con i suoi cari nel modo che desiderava {INT}?",
  8=>"Q8. Ha ricevuto tutte le informazioni che desiderava {INT}?"
];
$domanda9="Q9. Sono stati affrontati eventuali problemi pratici, personali o economici derivanti dalla malattia?";
$scale=[0,1,2,3,4];
?>
      <div class="mb-3">
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <tbody>
              <tr class="table-secondary"><th colspan="7">Domande da Q3 a Q5</th></tr>
              <tr class="table-light">
                <th></th>
                <th class="text-center">0<br><small>No, per niente</small></th>
                <th class="text-center">1<br><small>Raramente</small></th>
                <th class="text-center">2<br><small>Qualche volta</small></th>
                <th class="text-center">3<br><small>Per la maggior parte del tempo</small></th>
                <th class="text-center">4<br><small>Sempre</small></th>
                <th class="text-center nv-opt">5<br><small>Non valutabile</small></th>
              </tr>
<?php foreach($domande1 as $key=>$text): ?>
              <tr>
                <td data-int="<?php echo $text; ?>"><?php echo str_replace('{INT}','negli ultimi 3 giorni',$text); ?></td>
<?php for($v=0;$v<=4;$v++): ?>
                <td class="text-center"><input type="radio" name="q<?php echo $key; ?>" value="<?php echo $v; ?>" required></td>
<?php endfor; ?>
                <td class="text-center nv-opt"><input type="radio" name="q<?php echo $key; ?>" value="5"></td>
              </tr>
<?php endforeach; ?>
              <tr class="table-secondary"><th colspan="7">Domande da Q6 a Q8</th></tr>
              <tr class="table-light">
                <th></th>
                <th class="text-center">0<br><small>Sempre</small></th>
                <th class="text-center">1<br><small>Per la maggior parte del tempo</small></th>
                <th class="text-center">2<br><small>Qualche volta</small></th>
                <th class="text-center">3<br><small>Raramente</small></th>
                <th class="text-center">4<br><small>No, per niente</small></th>
                <th class="text-center nv-opt">5<br><small>Non valutabile</small></th>
              </tr>
<?php foreach($domande2 as $key=>$text): ?>
              <tr>
                <td data-int="<?php echo $text; ?>"><?php echo str_replace('{INT}','negli ultimi 3 giorni',$text); ?></td>
<?php for($v=0;$v<=4;$v++): ?>
                <td class="text-center"><input type="radio" name="q<?php echo $key; ?>" value="<?php echo $v; ?>" required></td>
<?php endfor; ?>
                <td class="text-center nv-opt"><input type="radio" name="q<?php echo $key; ?>" value="5"></td>
              </tr>
<?php endforeach; ?>
              <tr class="table-secondary"><th colspan="7">Domanda Q9</th></tr>
              <tr class="table-light">
                <th></th>
                <th class="text-center">0<br><small>Problemi affrontati/Assenza di problemi</small></th>
                <th class="text-center">1<br><small>Problemi in maggior parte affrontati</small></th>
                <th class="text-center">2<br><small>Problemi parzialmente affrontati</small></th>
                <th class="text-center">3<br><small>Problemi affrontati in minima parte</small></th>
                <th class="text-center">4<br><small>Problemi non affrontati</small></th>
                <th class="text-center nv-opt">5<br><small>Non valutabile</small></th>
              </tr>
              <tr>
                <td data-int="<?php echo $domanda9; ?>"><?php echo str_replace('{INT}','negli ultimi 3 giorni',$domanda9); ?></td>
<?php for($v=0;$v<=4;$v++): ?>
                <td class="text-center"><input type="radio" name="q9" value="<?php echo $v; ?>" required></td>
<?php endfor; ?>
                <td class="text-center nv-opt"><input type="radio" name="q9" value="5"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="mb-3 q10-only">
        <label class="form-label">Q10. Come ha completato il questionario?</label>
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
      <p class="fst-italic">Se si sente preoccupato per qualsiasi aspetto sollevato dal questionario per favore si senta libero di parlarne con il suo medico o infermiere.</p>
      <div class="d-grid mb-3">
        <button id="btn-riepilogo" class="btn btn-secondary">Riepilogo</button>
      </div>
      <div id="ipos-riepilogo" style="display:none;" class="mb-3">
        <h6 class="mb-2">Controlla i dati inseriti:</h6>
        <div id="ipos-summary" class="mb-2"></div>
        <button type="submit" class="btn btn-primary">Conferma e Invia</button>
      </div>
    </form>

    <div class="mb-3">
      <button type="button" class="btn btn-secondary me-2" id="ipos-view-last">Visualizza</button>
      <button type="button" class="btn btn-secondary" id="ipos-print-last">Stampa</button>
    </div>

    <div class="modal fade" id="guida-ipos-modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Guida alla compilazione</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p>Per l’IPOS STAFF</p>
            <p>L’ideale è farlo insieme, quindi alla presenza fisica o virtuale dei principali componenti dell’equipe e del caregiver, se si ritiene che possegga informazioni utili alla valutazione dei bisogni.</p>
            <p>L’obiettivo non è prevalere nella compilazione, ma trovare un accordo sui problemi-preoccupazioni maggiori sui quali fare un intervento specifico e poi rivalutarlo per capire se l’intervento stesso funziona, se no perché.</p>
            <p>Ricordiamoci che in caso di dubbio sulla intensità di un problema (il medico dice che la dispnea ha disturbato il paziente leggermente, la OSS invece dice che lo ha disturbato in modo severo) dobbiamo sapere che la letteratura dice che nelle valutazioni “proxy” tendiamo a sottostimare l’intensità dei problemi del paziente, quindi il suggerimento generale è di fidarci di chi dà il valore più alto.</p>
            <p>Se uso IPOS STAFF non per valutare i bisogni, ma per discutere di una assistenza difficile durante una riunione di equipe, l’obiettivo non è di capire chi ha più ragione, ma di accordarci su quale dimensione dei problemi facciamo più fatica a trovare il bandolo della matassa e su quelli provare a disegnare un intervento che serva a migliorare il clima assistenziale o la relazione di cura.</p>
            <p>Quando rivaluto IPOS? Mi devo dare un criterio temporale di massima. Per esempio lo valuto nel primo assessment del paziente e decido che lo rivaluterò dopo una settimana o dopo 15 giorni a domicilio, magari fra un mese in caso di paziente molto stabile.</p>
            <p>Una volta deciso questo però posso modificare il tempo di rivalutazione in base allo strumento Phase of Illness o fase di malattia. Se il paziente stabile diventa instabile allora è bene rivalutare IPOS per ripianificare l’assistenza. Al contrario se ho deciso di rivalutare IPOS ogni settimana, ma il paziente che prima era in deterioramento diventa stabile posso decidere di rifarlo dopo 15 o 21 giorni. Questa decisione va condivisa con l’equipe.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="js/ipos.js"></script>
