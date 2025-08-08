<?php
// strumenti-performance.php
?>
<section id="performance-home" class="p-4" style="display:none;">
  <div class="performance-container">
    <h5 class="mb-3"><i class="fas fa-running me-2"></i>Scale di Performance</h5>
    <p class="text-muted">Strumenti di valutazione funzionale compilabili per la pratica clinica</p>
    <div class="performance-grid">
      <div class="performance-card akps" onclick="openPerfModal('akps')">
        <div class="card-header">
          <div class="card-icon">AK</div>
          <div>
            <div class="card-title">AKPS</div>
            <div class="card-subtitle">Australia-modified Karnofsky Performance Status</div>
          </div>
        </div>
        <div class="card-description">
          Scala modificata del Karnofsky Performance Status, sviluppata per le cure palliative.
        </div>
      </div>
      <div class="performance-card pps" onclick="openPerfModal('pps')">
        <div class="card-header">
          <div class="card-icon">PPS</div>
          <div>
            <div class="card-title">PPS</div>
            <div class="card-subtitle">Palliative Performance Scale</div>
          </div>
        </div>
        <div class="card-description">
          Strumento multidimensionale che valuta cinque domini funzionali.
        </div>
      </div>
      <div class="performance-card adl" onclick="openPerfModal('adl')">
        <div class="card-header">
          <div class="card-icon">ADL</div>
          <div>
            <div class="card-title">ADL</div>
            <div class="card-subtitle">Activities of Daily Living</div>
          </div>
        </div>
        <div class="card-description">
          Indice di Barthel per valutare l'autonomia nelle attività della vita quotidiana.
        </div>
      </div>
      <div class="performance-card badl" onclick="openPerfModal('badl')">
        <div class="card-header">
          <div class="card-icon">BD</div>
          <div>
            <div class="card-title">BADL</div>
            <div class="card-subtitle">Basic Activities of Daily Living</div>
          </div>
        </div>
        <div class="card-description">
          Valutazione delle attività di base della vita quotidiana con sistema di scoring automatico.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modale AKPS -->
<div id="perf-modal-akps" class="perf-modal">
  <div class="perf-modal-content">
    <span class="perf-close" onclick="closePerfModal('akps')">&times;</span>
    <h3>AKPS - Australia-modified Karnofsky Performance Status</h3>
    <div class="tabs">
      <button class="tab active" onclick="showPerfTab('akps','compile')">📝 Compila</button>
      <button class="tab" onclick="showPerfTab('akps','view')">📊 Visualizza Scala</button>
    </div>
    <div id="akps-compile" class="tab-content active">
      <div class="patient-info">
        <h4>Dati Paziente</h4>
        <input type="text" id="akps-patient-name" placeholder="Nome paziente" />
        <input type="date" id="akps-date" />
      </div>
      <div class="form-group">
        <h4>Seleziona il livello funzionale del paziente:</h4>
        <div class="radio-group">
          <div class="radio-option" onclick="selectAKPS(100)"><label>100 - Normale, nessuna evidenza di malattia</label></div>
          <div class="radio-option" onclick="selectAKPS(90)"><label>90 - Normale attività, segni e sintomi minori</label></div>
          <div class="radio-option" onclick="selectAKPS(80)"><label>80 - Attività normale con sforzo</label></div>
          <div class="radio-option" onclick="selectAKPS(70)"><label>70 - Si prende cura di sé, incapace di attività normale</label></div>
          <div class="radio-option" onclick="selectAKPS(60)"><label>60 - Richiede assistenza occasionale</label></div>
          <div class="radio-option" onclick="selectAKPS(50)"><label>50 - Richiede assistenza considerevole</label></div>
          <div class="radio-option" onclick="selectAKPS(40)"><label>40 - Disabile, richiede cure speciali</label></div>
          <div class="radio-option" onclick="selectAKPS(30)"><label>30 - Severamente disabile</label></div>
          <div class="radio-option" onclick="selectAKPS(20)"><label>20 - Molto malato</label></div>
          <div class="radio-option" onclick="selectAKPS(10)"><label>10 - Moribondo</label></div>
        </div>
      </div>
      <div id="akps-results" class="score-display" style="display:none;">
        <div class="score-number" id="akps-score">-</div>
        <div class="score-interpretation" id="akps-interpretation">-</div>
        <div class="score-description" id="akps-description">-</div>
      </div>
      <div class="text-center">
        <button class="btn btn-success" onclick="generatePerfReport('akps')">📄 Genera Report</button>
        <button class="btn reset-btn" onclick="resetPerfForm('akps')">🔄 Azzera</button>
      </div>
    </div>
    <div id="akps-view" class="tab-content">
      <h4>Scala di Valutazione AKPS</h4>
      <table class="scale-table">
        <thead><tr><th>Punteggio</th><th>Descrizione</th></tr></thead>
        <tbody>
          <tr><td><strong>100</strong></td><td>Normale, nessuna evidenza di malattia</td></tr>
          <tr><td><strong>90</strong></td><td>Normale attività, segni e sintomi minori</td></tr>
          <tr><td><strong>80</strong></td><td>Attività normale con sforzo, segni e sintomi di malattia</td></tr>
          <tr><td><strong>70</strong></td><td>Si prende cura di sé, incapace di attività normale o lavoro attivo</td></tr>
          <tr><td><strong>60</strong></td><td>Richiede assistenza occasionale, ma riesce a prendersi cura delle necessità</td></tr>
          <tr><td><strong>50</strong></td><td>Richiede assistenza considerevole e cure mediche frequenti</td></tr>
          <tr><td><strong>40</strong></td><td>Disabile, richiede cure speciali e assistenza</td></tr>
          <tr><td><strong>30</strong></td><td>Severamente disabile, ricovero indicato</td></tr>
          <tr><td><strong>20</strong></td><td>Molto malato, ricovero e trattamento attivo necessari</td></tr>
          <tr><td><strong>10</strong></td><td>Moribondo, processo di morte rapidamente progressivo</td></tr>
          <tr><td><strong>0</strong></td><td>Morto</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="perf-modal-pps" class="perf-modal">
  <div class="perf-modal-content">
    <span class="perf-close" onclick="closePerfModal('pps')">&times;</span>
    <h3>PPS - Palliative Performance Scale</h3>
    <div class="tabs">
      <button class="tab active" onclick="showPerfTab('pps','compile')">📝 Compila</button>
      <button class="tab" onclick="showPerfTab('pps','view')">📊 Visualizza Scala</button>
    </div>
    <div id="pps-compile" class="tab-content active">
      <div class="patient-info">
        <h4>Dati Paziente</h4>
        <input type="text" id="pps-patient-name" placeholder="Nome paziente" />
        <input type="date" id="pps-date" />
      </div>
      <div class="form-group">
        <h4>Seleziona il livello PPS del paziente:</h4>
        <div class="radio-group">
          <div class="radio-option" onclick="selectPPS(100)"><label>100% - Attività normale completa</label></div>
          <div class="radio-option" onclick="selectPPS(90)"><label>90% - Attività normale, malattia evidente</label></div>
          <div class="radio-option" onclick="selectPPS(80)"><label>80% - Attività normale con sforzo</label></div>
          <div class="radio-option" onclick="selectPPS(70)"><label>70% - Deambulazione ridotta</label></div>
          <div class="radio-option" onclick="selectPPS(60)"><label>60% - Deambulazione ridotta, assistenza occasionale</label></div>
          <div class="radio-option" onclick="selectPPS(50)"><label>50% - Principalmente seduto/sdraiato</label></div>
          <div class="radio-option" onclick="selectPPS(40)"><label>40% - Principalmente a letto</label></div>
          <div class="radio-option" onclick="selectPPS(30)"><label>30% - Totalmente allettato</label></div>
          <div class="radio-option" onclick="selectPPS(20)"><label>20% - Totalmente allettato, assunzione minima</label></div>
          <div class="radio-option" onclick="selectPPS(10)"><label>10% - Totalmente allettato, cura della bocca</label></div>
        </div>
      </div>
      <div id="pps-results" class="score-display" style="display:none;">
        <div class="score-number" id="pps-score">-</div>
        <div class="score-interpretation" id="pps-interpretation">-</div>
        <div class="score-description" id="pps-description">-</div>
      </div>
      <div class="text-center">
        <button class="btn btn-success" onclick="generatePerfReport('pps')">📄 Genera Report</button>
        <button class="btn reset-btn" onclick="resetPerfForm('pps')">🔄 Azzera</button>
      </div>
    </div>
    <div id="pps-view" class="tab-content">
      <h4>Scala di Valutazione PPS</h4>
      <table class="scale-table">
        <thead>
          <tr>
            <th>PPS%</th><th>Deambulazione</th><th>Attività</th><th>Auto-cura</th><th>Assunzione cibo</th><th>Coscienza</th>
          </tr>
        </thead>
        <tbody>
          <tr><td><strong>100%</strong></td><td>Completa</td><td>Normale, nessuna evidenza</td><td>Completa</td><td>Normale</td><td>Piena</td></tr>
          <tr><td><strong>90%</strong></td><td>Completa</td><td>Normale, evidenza malattia</td><td>Completa</td><td>Normale</td><td>Piena</td></tr>
          <tr><td><strong>80%</strong></td><td>Completa</td><td>Normale con sforzo</td><td>Completa</td><td>Normale/ridotta</td><td>Piena</td></tr>
          <tr><td><strong>70%</strong></td><td>Ridotta</td><td>Incapace attività normale</td><td>Completa</td><td>Normale/ridotta</td><td>Piena</td></tr>
          <tr><td><strong>60%</strong></td><td>Ridotta</td><td>Incapace hobby/lavoro</td><td>Assistenza occasionale</td><td>Normale/ridotta</td><td>Piena/confusione</td></tr>
          <tr><td><strong>50%</strong></td><td>Seduto/sdraiato</td><td>Incapace qualsiasi lavoro</td><td>Assistenza considerevole</td><td>Normale/ridotta</td><td>Piena/confusione</td></tr>
          <tr><td><strong>40%</strong></td><td>Principalmente a letto</td><td>Incapace auto-cura</td><td>Principalmente assistenza</td><td>Normale/ridotta</td><td>Piena/sonnolenza</td></tr>
          <tr><td><strong>30%</strong></td><td>Totalmente allettato</td><td>Incapace auto-cura</td><td>Assistenza totale</td><td>Ridotta</td><td>Piena/sonnolenza</td></tr>
          <tr><td><strong>20%</strong></td><td>Totalmente allettato</td><td>Incapace auto-cura</td><td>Assistenza totale</td><td>Assunzione minima</td><td>Piena/sonnolenza</td></tr>
          <tr><td><strong>10%</strong></td><td>Totalmente allettato</td><td>Incapace auto-cura</td><td>Assistenza totale</td><td>Solo cura bocca</td><td>Sonnolenza/coma</td></tr>
        </tbody>
      </table>
      <div style="background:#f8f9fa;padding:1.5rem;border-radius:8px;margin-top:1.5rem;">
        <h5 style="color:#dc3545;margin-bottom:1rem;">📈 Indicazioni prognostiche:</h5>
        <ul style="margin:0;padding-left:1.5rem;color:#666;">
          <li><strong>PPS ≥70%:</strong> Prognosi in mesi-anni, candidato per terapie attive</li>
          <li><strong>PPS 50-60%:</strong> Prognosi in settimane-mesi, valutare cure palliative</li>
          <li><strong>PPS 30-40%:</strong> Prognosi in settimane, cure palliative intensive</li>
          <li><strong>PPS ≤20%:</strong> Prognosi in giorni-settimane, cure di fine vita</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="perf-modal-adl" class="perf-modal">
  <div class="perf-modal-content">
    <span class="perf-close" onclick="closePerfModal('adl')">&times;</span>
    <h3>ADL - Activities of Daily Living (Indice di Barthel)</h3>
    <div class="tabs">
      <button class="tab active" onclick="showPerfTab('adl','compile')">📝 Compila</button>
      <button class="tab" onclick="showPerfTab('adl','view')">📊 Visualizza Scala</button>
    </div>
    <div id="adl-compile" class="tab-content active">
      <div class="patient-info">
        <h4>Dati Paziente</h4>
        <input type="text" id="adl-patient-name" placeholder="Nome paziente" />
        <input type="date" id="adl-date" />
      </div>
      <div class="form-group">
        <h4>Compila le 10 attività dell'Indice di Barthel:</h4>
        <div style="margin-bottom:1.5rem;">
          <label style="font-weight:600;color:#495057;">1. Alimentazione</label>
          <div class="radio-group" id="adl-feeding-group">
            <div class="radio-option" onclick="selectADL('feeding',0,this)"><label>0 - Necessita assistenza</label></div>
            <div class="radio-option" onclick="selectADL('feeding',1,this)"><label>1 - Assistenza per tagliare</label></div>
            <div class="radio-option" onclick="selectADL('feeding',2,this)"><label>2 - Indipendente</label></div>
          </div>
        </div>
        <div style="margin-bottom:1.5rem;">
          <label style="font-weight:600;color:#495057;">2. Bagno</label>
          <div class="radio-group" id="adl-bathing-group">
            <div class="radio-option" onclick="selectADL('bathing',0,this)"><label>0 - Dipendente</label></div>
            <div class="radio-option" onclick="selectADL('bathing',1,this)"><label>1 - Indipendente</label></div>
          </div>
        </div>
        <div style="margin-bottom:1.5rem;">
          <label style="font-weight:600;color:#495057;">3. Cura personale</label>
          <div class="radio-group" id="adl-grooming-group">
            <div class="radio-option" onclick="selectADL('grooming',0,this)"><label>0 - Necessita assistenza</label></div>
            <div class="radio-option" onclick="selectADL('grooming',1,this)"><label>1 - Indipendente</label></div>
          </div>
        </div>
        <div style="margin-bottom:1.5rem;">
          <label style="font-weight:600;color:#495057;">4. Vestirsi</label>
          <div class="radio-group" id="adl-dressing-group">
            <div class="radio-option" onclick="selectADL('dressing',0,this)"><label>0 - Dipendente</label></div>
            <div class="radio-option" onclick="selectADL('dressing',1,this)"><label>1 - Necessita assistenza</label></div>
            <div class="radio-option" onclick="selectADL('dressing',2,this)"><label>2 - Indipendente</label></div>
          </div>
        </div>
        <div style="margin-bottom:1.5rem;">
          <label style="font-weight:600;color:#495057;">5. Controllo intestinale</label>
          <div class="radio-group" id="adl-bowel-group">
            <div class="radio-option" onclick="selectADL('bowel',0,this)"><label>0 - Incontinente</label></div>
            <div class="radio-option" onclick="selectADL('bowel',1,this)"><label>1 - Incidenti occasionali</label></div>
            <div class="radio-option" onclick="selectADL('bowel',2,this)"><label>2 - Continente</label></div>
          </div>
        </div>
      </div>
      <div id="adl-results" class="score-display" style="display:none;">
        <div class="score-number" id="adl-score">0</div>
        <div class="score-interpretation" id="adl-interpretation">Punteggio parziale</div>
        <div class="score-description" id="adl-description">Completa tutte le attività per il punteggio finale</div>
      </div>
      <div class="text-center">
        <button class="btn btn-success" onclick="generatePerfReport('adl')">📄 Genera Report</button>
        <button class="btn reset-btn" onclick="resetPerfForm('adl')">🔄 Azzera</button>
      </div>
    </div>
    <div id="adl-view" class="tab-content">
      <h4>Indice di Barthel - Scala Completa</h4>
      <table class="scale-table">
        <thead>
          <tr><th>Attività</th><th>Punteggio</th><th>Descrizione</th></tr>
        </thead>
        <tbody>
          <tr><td>Alimentazione</td><td>0-2</td><td>0=assistenza; 1=aiuto tagliare; 2=indipendente</td></tr>
          <tr><td>Bagno</td><td>0-1</td><td>0=dipendente; 1=indipendente</td></tr>
          <tr><td>Cura personale</td><td>0-1</td><td>0=assistenza; 1=indipendente</td></tr>
          <tr><td>Vestirsi</td><td>0-2</td><td>0=dipendente; 1=assistenza; 2=indipendente</td></tr>
          <tr><td>Controllo intestinale</td><td>0-2</td><td>0=incontinente; 1=occasionale; 2=continente</td></tr>
          <tr><td>Controllo vescicale</td><td>0-2</td><td>0=incontinente; 1=occasionale; 2=continente</td></tr>
          <tr><td>Uso WC</td><td>0-2</td><td>0=dipendente; 1=assistenza; 2=indipendente</td></tr>
          <tr><td>Trasferimento</td><td>0-3</td><td>0=incapace; 1=assistenza maggiore; 2=minore; 3=indipendente</td></tr>
          <tr><td>Mobilità</td><td>0-3</td><td>0=immobile; 1=sedia rotelle; 2=aiuto; 3=indipendente</td></tr>
          <tr><td>Scale</td><td>0-2</td><td>0=incapace; 1=assistenza; 2=indipendente</td></tr>
        </tbody>
      </table>
      <div style="background:#f8f9fa;padding:1.5rem;border-radius:8px;margin-top:1.5rem;">
        <h5 style="color:#007bff;margin-bottom:1rem;">📊 Interpretazione Punteggi:</h5>
        <ul style="margin:0;padding-left:1.5rem;color:#666;">
          <li><strong>0-20:</strong> Dipendenza totale</li>
          <li><strong>21-60:</strong> Dipendenza severa</li>
          <li><strong>61-90:</strong> Dipendenza moderata</li>
          <li><strong>91-99:</strong> Dipendenza lieve</li>
          <li><strong>100:</strong> Indipendenza completa</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="perf-modal-badl" class="perf-modal">
  <div class="perf-modal-content">
    <span class="perf-close" onclick="closePerfModal('badl')">&times;</span>
    <h3>BADL - Basic Activities of Daily Living</h3>
    <div class="tabs">
      <button class="tab active" onclick="showPerfTab('badl','compile')">📝 Compila</button>
      <button class="tab" onclick="showPerfTab('badl','view')">📊 Visualizza Scala</button>
    </div>
    <div id="badl-compile" class="tab-content active">
      <div class="patient-info">
        <h4>Dati Paziente</h4>
        <input type="text" id="badl-patient-name" placeholder="Nome paziente" />
        <input type="date" id="badl-date" />
      </div>
      <div class="form-group">
        <h4>Valuta le 6 attività di base (scala 0-3):</h4>
        <div style="margin-bottom:1.5rem;">
          <label style="font-weight:600;color:#495057;">1. Igiene personale</label>
          <div class="radio-group" id="badl-hygiene-group">
            <div class="radio-option" onclick="selectBADL('hygiene',0,this)"><label>0 - Nessuna difficoltà</label></div>
            <div class="radio-option" onclick="selectBADL('hygiene',1,this)"><label>1 - Qualche difficoltà</label></div>
            <div class="radio-option" onclick="selectBADL('hygiene',2,this)"><label>2 - Grande difficoltà</label></div>
            <div class="radio-option" onclick="selectBADL('hygiene',3,this)"><label>3 - Impossibile</label></div>
          </div>
        </div>
        <div style="margin-bottom:1.5rem;">
          <label style="font-weight:600;color:#495057;">2. Vestirsi</label>
          <div class="radio-group" id="badl-dressing-group">
            <div class="radio-option" onclick="selectBADL('dressing',0,this)"><label>0 - Nessuna difficoltà</label></div>
            <div class="radio-option" onclick="selectBADL('dressing',1,this)"><label>1 - Qualche difficoltà</label></div>
            <div class="radio-option" onclick="selectBADL('dressing',2,this)"><label>2 - Grande difficoltà</label></div>
            <div class="radio-option" onclick="selectBADL('dressing',3,this)"><label>3 - Impossibile</label></div>
          </div>
        </div>
        <div style="margin-bottom:1.5rem;">
          <label style="font-weight:600;color:#495057;">3. Alimentarsi</label>
          <div class="radio-group" id="badl-feeding-group">
            <div class="radio-option" onclick="selectBADL('feeding',0,this)"><label>0 - Nessuna difficoltà</label></div>
            <div class="radio-option" onclick="selectBADL('feeding',1,this)"><label>1 - Qualche difficoltà</label></div>
            <div class="radio-option" onclick="selectBADL('feeding',2,this)"><label>2 - Grande difficoltà</label></div>
            <div class="radio-option" onclick="selectBADL('feeding',3,this)"><label>3 - Impossibile</label></div>
          </div>
        </div>
      </div>
      <div id="badl-results" class="score-display" style="display:none;">
        <div class="score-number" id="badl-score">0</div>
        <div class="score-interpretation" id="badl-interpretation">Punteggio parziale</div>
        <div class="score-description" id="badl-description">Completa tutte le attività per il punteggio finale</div>
      </div>
      <div class="text-center">
        <button class="btn btn-success" onclick="generatePerfReport('badl')">📄 Genera Report</button>
        <button class="btn reset-btn" onclick="resetPerfForm('badl')">🔄 Azzera</button>
      </div>
    </div>
    <div id="badl-view" class="tab-content">
      <h4>Scala di Valutazione BADL</h4>
      <table class="scale-table">
        <thead><tr><th>Attività</th><th>Scala 0-3</th></tr></thead>
        <tbody>
          <tr><td><strong>Igiene personale</strong></td><td>0=Nessuna difficoltà; 1=Qualche; 2=Grande; 3=Impossibile</td></tr>
          <tr><td><strong>Vestirsi</strong></td><td>0=Nessuna difficoltà; 1=Qualche; 2=Grande; 3=Impossibile</td></tr>
          <tr><td><strong>Alimentarsi</strong></td><td>0=Nessuna difficoltà; 1=Qualche; 2=Grande; 3=Impossibile</td></tr>
          <tr><td><strong>Trasferimenti</strong></td><td>0=Nessuna difficoltà; 1=Qualche; 2=Grande; 3=Impossibile</td></tr>
          <tr><td><strong>Mobilità nel letto</strong></td><td>0=Nessuna difficoltà; 1=Qualche; 2=Grande; 3=Impossibile</td></tr>
          <tr><td><strong>Controllo sfinterico</strong></td><td>0=Nessuna difficoltà; 1=Qualche; 2=Grande; 3=Impossibile</td></tr>
        </tbody>
      </table>
      <div style="background:#f8f9fa;padding:1.5rem;border-radius:8px;margin-top:1.5rem;">
        <h5 style="color:#6c757d;margin-bottom:1rem;">📋 Interpretazione Punteggio Totale (0-18):</h5>
        <ul style="margin:0;padding-left:1.5rem;color:#666;">
          <li><strong>0-3:</strong> Autonomia elevata</li>
          <li><strong>4-9:</strong> Autonomia moderata</li>
          <li><strong>10-15:</strong> Dipendenza significativa</li>
          <li><strong>16-18:</strong> Dipendenza totale</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<script>
let currentPerfScore = null;
let adlScores = { feeding: null, bathing: null, grooming: null, dressing: null, bowel: null };
let badlScores = { hygiene: null, dressing: null, feeding: null };
function openPerfModal(id){
  const m = document.getElementById('perf-modal-' + id);
  if(m){ m.style.display='block'; document.body.style.overflow='hidden';
    const dateInput = document.getElementById(id + '-date');
    if(dateInput && !dateInput.value){ dateInput.value = new Date().toISOString().split('T')[0]; }
  }
}
function closePerfModal(id){
  const m = document.getElementById('perf-modal-' + id);
  if(m){ m.style.display='none'; document.body.style.overflow='auto'; }
}
function showPerfTab(modalId, tab){
  const modal = document.getElementById('perf-modal-' + modalId);
  modal.querySelectorAll('.tab-content').forEach(c=>c.classList.remove('active'));
  modal.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
  modal.querySelector('#' + modalId + '-' + tab).classList.add('active');
  event.target.classList.add('active');
}
function selectAKPS(score){
  document.querySelectorAll('#perf-modal-akps .radio-option').forEach(o=>o.classList.remove('selected'));
  event.currentTarget.classList.add('selected');
  currentPerfScore = score;
  showAKPSResult(score);
}
function showAKPSResult(score){
  const resultsDiv=document.getElementById('akps-results');
  const scoreNum=document.getElementById('akps-score');
  const interpretation=document.getElementById('akps-interpretation');
  const description=document.getElementById('akps-description');
  scoreNum.textContent=score;
  let interp,desc;
  if(score>=80){interp='Buone condizioni funzionali';desc='Il paziente mantiene un livello di autonomia elevato.';}
  else if(score>=60){interp='Condizioni funzionali moderate';desc='Necessita di assistenza occasionale.';}
  else if(score>=40){interp='Condizioni funzionali compromesse';desc='Richiede assistenza significativa.';}
  else if(score>=20){interp='Condizioni funzionali severe';desc='Necessita di cure intensive.';}
  else{interp='Condizioni critiche';desc='Fase terminale con prognosi riservata.';}
  interpretation.textContent=interp;
  description.textContent=desc;
  resultsDiv.style.display='block';
}
function selectPPS(score){
  document.querySelectorAll('#perf-modal-pps .radio-option').forEach(o=>o.classList.remove('selected'));
  event.currentTarget.classList.add('selected');
  currentPerfScore = score;
  showPPSResult(score);
}
function showPPSResult(score){
  const resultsDiv=document.getElementById('pps-results');
  const scoreNum=document.getElementById('pps-score');
  const interpretation=document.getElementById('pps-interpretation');
  const description=document.getElementById('pps-description');
  scoreNum.textContent=score + '%';
  let interp,desc;
  if(score>=70){interp='Buona performance funzionale';desc='Il paziente mantiene un buon livello di autonomia. Prognosi: mesi-anni.';}
  else if(score>=50){interp='Performance funzionale ridotta';desc='Il paziente necessita di assistenza significativa. Prognosi: settimane-mesi.';}
  else if(score>=30){interp='Performance funzionale compromessa';desc='Il paziente è prevalentemente allettato. Prognosi: settimane.';}
  else{interp='Performance funzionale molto compromessa';desc='Il paziente è in fase avanzata di malattia. Prognosi: giorni-settimane.';}
  interpretation.textContent=interp;
  description.textContent=desc;
  resultsDiv.style.display='block';
}
function selectADL(domain, score, el){
  adlScores[domain]=parseInt(score);
  document.querySelectorAll('#adl-' + domain + '-group .radio-option').forEach(o=>o.classList.remove('selected'));
  el.classList.add('selected');
  calculateADLScore();
}
function calculateADLScore(){
  let total=0; let completed=0;
  for(let d in adlScores){ if(adlScores[d]!==null){ total+=adlScores[d]; completed++; } }
  const resultsDiv=document.getElementById('adl-results');
  const scoreNum=document.getElementById('adl-score');
  const interpretation=document.getElementById('adl-interpretation');
  const description=document.getElementById('adl-description');
  const scaled=Math.round((total/8)*100);
  currentPerfScore=scaled;
  if(completed===Object.keys(adlScores).length){
    scoreNum.textContent=scaled;
    let desc;
    if(scaled<=20){desc='Dipendenza totale';}
    else if(scaled<=60){desc='Dipendenza severa';}
    else if(scaled<=90){desc='Dipendenza moderata';}
    else if(scaled<=99){desc='Dipendenza lieve';}
    else{desc='Indipendenza completa';}
    interpretation.textContent='Punteggio finale';
    description.textContent=desc;
  }else{
    scoreNum.textContent=scaled;
    interpretation.textContent='Punteggio parziale';
    description.textContent='Completa tutte le attività per il punteggio finale';
  }
  resultsDiv.style.display='block';
}
function selectBADL(domain, score, el){
  badlScores[domain]=parseInt(score);
  document.querySelectorAll('#badl-' + domain + '-group .radio-option').forEach(o=>o.classList.remove('selected'));
  el.classList.add('selected');
  calculateBADLScore();
}
function calculateBADLScore(){
  let total=0; let completed=0;
  for(let d in badlScores){ if(badlScores[d]!==null){ total+=badlScores[d]; completed++; } }
  const resultsDiv=document.getElementById('badl-results');
  const scoreNum=document.getElementById('badl-score');
  const interpretation=document.getElementById('badl-interpretation');
  const description=document.getElementById('badl-description');
  const scaled=total*2;
  currentPerfScore=scaled;
  if(completed===Object.keys(badlScores).length){
    scoreNum.textContent=scaled;
    let desc;
    if(scaled<=3){desc='Autonomia elevata';}
    else if(scaled<=9){desc='Autonomia moderata';}
    else if(scaled<=15){desc='Dipendenza significativa';}
    else{desc='Dipendenza totale';}
    interpretation.textContent='Punteggio finale';
    description.textContent=desc;
  }else{
    scoreNum.textContent=scaled;
    interpretation.textContent='Punteggio parziale';
    description.textContent='Completa tutte le attività per il punteggio finale';
  }
  resultsDiv.style.display='block';
}
function generatePerfReport(type){
  if(!currentPerfScore){ alert('Seleziona un punteggio prima di generare il report.'); return; }
  const patientName=document.getElementById(type+'-patient-name').value;
  const date=document.getElementById(type+'-date').value;
  const interpretation=document.getElementById(type+'-interpretation').textContent;
  const description=document.getElementById(type+'-description').textContent;
  const report=`REPORT ${type.toUpperCase()}\nPunteggio: ${currentPerfScore}/100\nInterpretazione: ${interpretation}\nDescrizione: ${description}`;
  const blob=new Blob([report],{type:'text/plain;charset=utf-8'});
  const link=document.createElement('a');
  link.href=URL.createObjectURL(blob);
  link.download=`${type.toUpperCase()}_Report_${patientName||'Paziente'}_${date||new Date().toISOString().split('T')[0]}.txt`;
  link.click();
}
function resetPerfForm(type){
  document.querySelectorAll('#perf-modal-'+type+' .radio-option').forEach(o=>o.classList.remove('selected'));
  document.getElementById(type+'-results').style.display='none';
  document.getElementById(type+'-patient-name').value='';
  if(type==='adl'){ adlScores={feeding:null,bathing:null,grooming:null,dressing:null,bowel:null}; }
  if(type==='badl'){ badlScores={hygiene:null,dressing:null,feeding:null}; }
  currentPerfScore=null;
}
window.onclick=function(e){ if(e.target.classList.contains('perf-modal')){ e.target.style.display='none'; document.body.style.overflow='auto'; }};
document.addEventListener('keydown', function(e){ if(e.key==='Escape'){ document.querySelectorAll('.perf-modal').forEach(m=>m.style.display='none'); document.body.style.overflow='auto'; }});
</script>

<style>
.performance-container{max-width:1200px;margin:0 auto;padding:2rem 1rem;}
.performance-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:2rem;margin-top:2rem;}
.performance-card{background:white;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,0.08);padding:2rem;transition:all 0.3s ease;border:1px solid #e9ecef;cursor:pointer;}
.performance-card:hover{transform:translateY(-5px);box-shadow:0 8px 30px rgba(0,0,0,0.15);border-color:#5cb85c;}
.card-header{display:flex;align-items:center;margin-bottom:1.5rem;}
.card-icon{width:50px;height:50px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:white;margin-right:1rem;font-weight:bold;}
.akps .card-icon{background:linear-gradient(135deg,#28a745,#20c997);} .pps .card-icon{background:linear-gradient(135deg,#dc3545,#fd7e14);} .adl .card-icon{background:linear-gradient(135deg,#007bff,#6f42c1);} .badl .card-icon{background:linear-gradient(135deg,#6c757d,#495057);}
.card-title{font-size:1.4rem;font-weight:600;color:#5cb85c;margin-bottom:0.3rem;}
.card-subtitle{font-size:0.9rem;color:#6c757d;font-weight:500;}
.card-description{color:#555;margin-bottom:1.5rem;font-size:0.95rem;}
.perf-modal{display:none;position:fixed;z-index:1000;left:0;top:0;width:100%;height:100%;background-color:rgba(0,0,0,0.5);}
.perf-modal-content{background-color:white;margin:2% auto;padding:2rem;border-radius:12px;width:95%;max-width:900px;max-height:90vh;overflow-y:auto;position:relative;}
.perf-close{position:absolute;right:1rem;top:1rem;font-size:2rem;font-weight:bold;cursor:pointer;color:#aaa;}
.perf-close:hover{color:#000;}
.tabs{display:flex;margin-bottom:2rem;border-bottom:2px solid #e9ecef;}
.tab{padding:1rem 2rem;cursor:pointer;border:none;background:none;font-size:1rem;color:#6c757d;border-bottom:2px solid transparent;transition:all 0.3s ease;}
.tab.active{color:#5cb85c;border-bottom-color:#5cb85c;}
.tab:hover{color:#5cb85c;}
.tab-content{display:none;}
.tab-content.active{display:block;}
.patient-info{background:#f8f9fa;padding:1.5rem;border-radius:8px;margin-bottom:2rem;}
.patient-info h4{color:#5cb85c;margin-bottom:1rem;}
.patient-info input{width:100%;padding:0.5rem;border:1px solid #dee2e6;border-radius:4px;margin-bottom:1rem;}
.form-group{margin-bottom:1.5rem;padding:1rem;background:#f8f9fa;border-radius:8px;}
.form-group h4{color:#5cb85c;margin-bottom:1rem;}
.radio-group{display:flex;flex-wrap:wrap;gap:1rem;margin-top:0.5rem;}
.radio-option{display:flex;align-items:center;cursor:pointer;padding:0.5rem 1rem;border:2px solid #dee2e6;border-radius:25px;transition:all 0.3s ease;min-width:200px;}
.radio-option:hover{border-color:#5cb85c;background:#f0f7ff;}
.radio-option.selected{border-color:#28a745;background:#d4edda;color:#155724;}
.score-display{background:linear-gradient(135deg,#5cb85c,#449d44);color:white;padding:2rem;border-radius:12px;text-align:center;margin:2rem 0;}
.score-number{font-size:3rem;font-weight:bold;margin-bottom:0.5rem;}
.score-interpretation{font-size:1.2rem;margin-bottom:1rem;}
.score-description{font-size:1rem;opacity:0.9;}
.scale-table{width:100%;border-collapse:collapse;margin:1rem 0;font-size:0.9rem;}
.scale-table th,.scale-table td{border:1px solid #dee2e6;padding:0.75rem;text-align:left;}
.scale-table th{background-color:#f8f9fa;font-weight:600;color:#495057;}
.scale-table tbody tr:nth-child(even){background-color:#f8f9fa;}
.btn-success{background:#28a745;color:white;}
.btn-success:hover{background:#218838;}
.reset-btn{background:#dc3545;color:white;}
.reset-btn:hover{background:#c82333;}
@media (max-width:768px){.performance-grid{grid-template-columns:1fr;}.perf-modal-content{width:98%;margin:1% auto;padding:1rem;}.tabs{flex-wrap:wrap;}.tab{padding:0.75rem 1rem;font-size:0.9rem;}.radio-group{flex-direction:column;}.radio-option{min-width:auto;}}
</style>

