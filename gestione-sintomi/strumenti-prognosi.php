<?php
// strumenti-prognosi.php
?>
<section id="prognosi-home" class="sintomo-section p-4" data-sintomo="prognosi-home" style="display:none;">
  <div class="prognosi-container">
    <h5 class="mb-3"><i class="fas fa-chart-line me-2"></i>Strumenti di Prognosi</h5>
    <p class="text-muted">Scale prognostiche validate per la valutazione dell'aspettativa di vita in cure palliative</p>
    <div class="prognosi-grid">
      <div class="prognosi-card ppi" onclick="openProgModal('ppi')">
        <div class="card-header">
          <div class="card-icon">PPI</div>
          <div>
            <div class="card-title">PPI</div>
            <div class="card-subtitle">Palliative Performance Index</div>
          </div>
        </div>
        <div class="card-description">
          Strumento prognostico per stimare la sopravvivenza nei pazienti in cure palliative, basato su 5 parametri clinici facilmente valutabili.
        </div>
      </div>
      <div class="prognosi-card pap" onclick="openProgModal('pap')">
        <div class="card-header">
          <div class="card-icon">PaP</div>
          <div>
            <div class="card-title">PaP Score</div>
            <div class="card-subtitle">Palliative Prognostic Score</div>
          </div>
        </div>
        <div class="card-description">
          Score prognostico multidimensionale che combina valutazione clinica e parametri laboratoristici per predire la sopravvivenza a 30 giorni.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal PPI -->
<div id="prog-modal-ppi" class="prog-modal">
  <div class="prog-modal-content">
    <span class="prog-close" onclick="closeProgModal('ppi')">&times;</span>
    <h3>PPI - Palliative Performance Index</h3>
    <div class="tabs">
      <button class="tab active" onclick="showProgTab('ppi','compile')">📝 Compila</button>
      <button class="tab" onclick="showProgTab('ppi','view')">📊 Visualizza Scala</button>
    </div>
    <div id="ppi-compile" class="tab-content active">
      <div class="patient-info">
        <h4>Dati Paziente</h4>
        <input type="text" id="ppi-patient-name" placeholder="Nome paziente" />
        <input type="date" id="ppi-date" />
      </div>
      <div class="form-group">
        <h4>Compila i 5 parametri del PPI:</h4>
        <div style="margin-bottom:1rem;">
          <div class="progress-bar"><div class="progress-fill" id="ppi-progress" style="width:0%"></div></div>
          <small style="color:#666;">Progresso: <span id="ppi-progress-text">0/5</span> parametri completati</small>
        </div>
        <div class="form-item" id="ppi-pps-item">
          <label>1. Palliative Performance Scale (PPS)</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPPI('pps',4)"><input type="radio" name="ppi-pps" value="4"><span>10-20% (4 punti)</span></div>
            <div class="radio-option" onclick="selectPPI('pps',2.5)"><input type="radio" name="ppi-pps" value="2.5"><span>30-50% (2.5 punti)</span></div>
            <div class="radio-option" onclick="selectPPI('pps',0)"><input type="radio" name="ppi-pps" value="0"><span>>60% (0 punti)</span></div>
          </div>
        </div>
        <div class="form-item" id="ppi-oral-item">
          <label>2. Assunzione orale</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPPI('oral',2.5)"><input type="radio" name="ppi-oral" value="2.5"><span>Severamente ridotta (2.5 punti)</span></div>
            <div class="radio-option" onclick="selectPPI('oral',1)"><input type="radio" name="ppi-oral" value="1"><span>Moderatamente ridotta (1 punto)</span></div>
            <div class="radio-option" onclick="selectPPI('oral',0)"><input type="radio" name="ppi-oral" value="0"><span>Normale (0 punti)</span></div>
          </div>
        </div>
        <div class="form-item" id="ppi-edema-item">
          <label>3. Edema</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPPI('edema',1)"><input type="radio" name="ppi-edema" value="1"><span>Presente (1 punto)</span></div>
            <div class="radio-option" onclick="selectPPI('edema',0)"><input type="radio" name="ppi-edema" value="0"><span>Assente (0 punti)</span></div>
          </div>
        </div>
        <div class="form-item" id="ppi-dyspnea-item">
          <label>4. Dispnea a riposo</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPPI('dyspnea',3.5)"><input type="radio" name="ppi-dyspnea" value="3.5"><span>Presente (3.5 punti)</span></div>
            <div class="radio-option" onclick="selectPPI('dyspnea',0)"><input type="radio" name="ppi-dyspnea" value="0"><span>Assente (0 punti)</span></div>
          </div>
        </div>
        <div class="form-item" id="ppi-delirium-item">
          <label>5. Delirium</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPPI('delirium',4)"><input type="radio" name="ppi-delirium" value="4"><span>Presente (4 punti)</span></div>
            <div class="radio-option" onclick="selectPPI('delirium',0)"><input type="radio" name="ppi-delirium" value="0"><span>Assente (0 punti)</span></div>
          </div>
        </div>
      </div>
      <div id="ppi-results" class="score-display" style="display:none;">
        <div class="score-number" id="ppi-score">0</div>
        <div class="score-interpretation" id="ppi-interpretation">Punteggio PPI</div>
        <div class="score-description" id="ppi-description">Completa tutti i parametri per la valutazione prognostica</div>
      </div>
      <div class="text-center">
        <button class="btn btn-success" onclick="generateReport('ppi')">📄 Genera Report</button>
        <button class="btn reset-btn" onclick="resetForm('ppi')">🔄 Azzera</button>
      </div>
    </div>
    <div id="ppi-view" class="tab-content">
      <h4>Palliative Performance Index (PPI)</h4>
      <table class="scale-table">
        <thead>
          <tr><th>Parametro</th><th>Valore</th><th>Punteggio</th></tr>
        </thead>
        <tbody>
          <tr><td rowspan="3"><strong>Palliative Performance Scale</strong></td><td>10-20%</td><td>4.0</td></tr>
          <tr><td>30-50%</td><td>2.5</td></tr>
          <tr><td>>60%</td><td>0</td></tr>
          <tr><td rowspan="3"><strong>Assunzione orale</strong></td><td>Severamente ridotta</td><td>2.5</td></tr>
          <tr><td>Moderatamente ridotta</td><td>1.0</td></tr>
          <tr><td>Normale</td><td>0</td></tr>
          <tr><td rowspan="2"><strong>Edema</strong></td><td>Presente</td><td>1.0</td></tr>
          <tr><td>Assente</td><td>0</td></tr>
          <tr><td rowspan="2"><strong>Dispnea a riposo</strong></td><td>Presente</td><td>3.5</td></tr>
          <tr><td>Assente</td><td>0</td></tr>
          <tr><td rowspan="2"><strong>Delirium</strong></td><td>Presente</td><td>4.0</td></tr>
          <tr><td>Assente</td><td>0</td></tr>
        </tbody>
      </table>
      <div style="background:#f8f9fa;padding:1.5rem;border-radius:8px;margin-top:1.5rem;">
        <h5 style="color:#e74c3c;margin-bottom:1rem;">📈 Interpretazione Prognostica:</h5>
        <ul style="margin:0;padding-left:1.5rem;color:#666;">
          <li><strong>PPI ≤ 4:</strong> Sopravvivenza >6 settimane (probabilità >70%)</li>
          <li><strong>PPI > 4:</strong> Sopravvivenza ≤3 settimane (probabilità >80%)</li>
          <li><strong>Punteggio totale:</strong> 0-15 punti</li>
          <li><strong>Maggiore è il punteggio, minore è la sopravvivenza attesa</strong></li>
        </ul>
      </div>
      <div class="text-center mt-3"><button class="btn btn-primary" onclick="window.print()">Stampa</button></div>
    </div>
  </div>
</div>

<!-- Modal PaP -->
<div id="prog-modal-pap" class="prog-modal">
  <div class="prog-modal-content">
    <span class="prog-close" onclick="closeProgModal('pap')">&times;</span>
    <h3>PaP Score - Palliative Prognostic Score</h3>
    <div class="tabs">
      <button class="tab active" onclick="showProgTab('pap','compile')">📝 Compila</button>
      <button class="tab" onclick="showProgTab('pap','view')">📊 Visualizza Scala</button>
    </div>
    <div id="pap-compile" class="tab-content active">
      <div class="patient-info">
        <h4>Dati Paziente</h4>
        <input type="text" id="pap-patient-name" placeholder="Nome paziente" />
        <input type="date" id="pap-date" />
      </div>
      <div class="form-group">
        <h4>Compila i 6 parametri del PaP Score:</h4>
        <div style="margin-bottom:1rem;">
          <div class="progress-bar"><div class="progress-fill" id="pap-progress" style="width:0%"></div></div>
          <small style="color:#666;">Progresso: <span id="pap-progress-text">0/6</span> parametri completati</small>
        </div>
        <div class="form-item" id="pap-dyspnea-item">
          <label>1. Dispnea</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('dyspnea',1)"><input type="radio" name="pap-dyspnea" value="1"><span>Sì (1 punto)</span></div>
            <div class="radio-option" onclick="selectPAP('dyspnea',0)"><input type="radio" name="pap-dyspnea" value="0"><span>No (0 punti)</span></div>
          </div>
        </div>
        <div class="form-item" id="pap-anorexia-item">
          <label>2. Anoressia</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('anorexia',1)"><input type="radio" name="pap-anorexia" value="1"><span>Sì (1 punto)</span></div>
            <div class="radio-option" onclick="selectPAP('anorexia',0)"><input type="radio" name="pap-anorexia" value="0"><span>No (0 punti)</span></div>
          </div>
        </div>
        <div class="form-item" id="pap-karnofsky-item">
          <label>3. Karnofsky Performance Status</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('karnofsky',2.5)"><input type="radio" name="pap-karnofsky" value="2.5"><span>10-20 (2.5 punti)</span></div>
            <div class="radio-option" onclick="selectPAP('karnofsky',0)"><input type="radio" name="pap-karnofsky" value="0"><span>30-100 (0 punti)</span></div>
          </div>
        </div>
        <div class="form-item" id="pap-wbc-item">
          <label>4. Leucociti totali</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('wbc',1.5)"><input type="radio" name="pap-wbc" value="1.5"><span>>11.000 (1.5 punti)</span></div>
            <div class="radio-option" onclick="selectPAP('wbc',0.5)"><input type="radio" name="pap-wbc" value="0.5"><span>8.501-11.000 (0.5 punti)</span></div>
            <div class="radio-option" onclick="selectPAP('wbc',0)"><input type="radio" name="pap-wbc" value="0"><span>≤8.500 (0 punti)</span></div>
          </div>
        </div>
        <div class="form-item" id="pap-lymphocytes-item">
          <label>5. Percentuale Linfociti</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('lymphocytes',2.5)"><input type="radio" name="pap-lymphocytes" value="2.5"><span>0-11.9% (2.5 punti)</span></div>
            <div class="radio-option" onclick="selectPAP('lymphocytes',1)"><input type="radio" name="pap-lymphocytes" value="1"><span>12-19.9% (1 punto)</span></div>
            <div class="radio-option" onclick="selectPAP('lymphocytes',0)"><input type="radio" name="pap-lymphocytes" value="0"><span>≥20% (0 punti)</span></div>
          </div>
        </div>
        <div class="form-item" id="pap-prediction-item">
          <label>6. Predizione clinica di sopravvivenza</label>
          <div class="radio-group">
            <div class="radio-option" onclick="selectPAP('prediction',8.5)"><input type="radio" name="pap-prediction" value="8.5"><span>1-2 settimane (8.5 punti)</span></div>
            <div class="radio-option" onclick="selectPAP('prediction',6)"><input type="radio" name="pap-prediction" value="6"><span>3-4 settimane (6 punti)</span></div>
            <div class="radio-option" onclick="selectPAP('prediction',4.5)"><input type="radio" name="pap-prediction" value="4.5"><span>5-6 settimane (4.5 punti)</span></div>
            <div class="radio-option" onclick="selectPAP('prediction',2.5)"><input type="radio" name="pap-prediction" value="2.5"><span>7-10 settimane (2.5 punti)</span></div>
            <div class="radio-option" onclick="selectPAP('prediction',0)"><input type="radio" name="pap-prediction" value="0"><span>>10 settimane (0 punti)</span></div>
          </div>
        </div>
      </div>
      <div id="pap-results" class="score-display" style="display:none;">
        <div class="score-number" id="pap-score">0</div>
        <div class="score-interpretation" id="pap-interpretation">Punteggio PaP</div>
        <div class="score-description" id="pap-description">Completa tutti i parametri per la valutazione prognostica</div>
      </div>
      <div class="text-center">
        <button class="btn btn-success" onclick="generateReport('pap')">📄 Genera Report</button>
        <button class="btn reset-btn" onclick="resetForm('pap')">🔄 Azzera</button>
      </div>
    </div>
    <div id="pap-view" class="tab-content">
      <h4>Palliative Prognostic Score (PaP)</h4>
      <table class="scale-table">
        <thead>
          <tr><th>Parametro</th><th>Valore</th><th>Punteggio</th></tr>
        </thead>
        <tbody>
          <tr><td rowspan="2"><strong>Dispnea</strong></td><td>Sì</td><td>1.0</td></tr>
          <tr><td>No</td><td>0</td></tr>
          <tr><td rowspan="2"><strong>Anoressia</strong></td><td>Sì</td><td>1.0</td></tr>
          <tr><td>No</td><td>0</td></tr>
          <tr><td rowspan="2"><strong>Karnofsky Performance Status</strong></td><td>10-20</td><td>2.5</td></tr>
          <tr><td>30-100</td><td>0</td></tr>
          <tr><td rowspan="3"><strong>Leucociti totali</strong></td><td>>11.000</td><td>1.5</td></tr>
          <tr><td>8.501-11.000</td><td>0.5</td></tr>
          <tr><td>≤8.500</td><td>0</td></tr>
          <tr><td rowspan="3"><strong>% Linfociti</strong></td><td>0-11.9%</td><td>2.5</td></tr>
          <tr><td>12-19.9%</td><td>1.0</td></tr>
          <tr><td>≥20%</td><td>0</td></tr>
          <tr><td rowspan="5"><strong>Predizione clinica</strong></td><td>1-2 settimane</td><td>8.5</td></tr>
          <tr><td>3-4 settimane</td><td>6.0</td></tr>
          <tr><td>5-6 settimane</td><td>4.5</td></tr>
          <tr><td>7-10 settimane</td><td>2.5</td></tr>
          <tr><td>>10 settimane</td><td>0</td></tr>
        </tbody>
      </table>
      <div style="background:#f8f9fa;padding:1.5rem;border-radius:8px;margin-top:1.5rem;">
        <h5 style="color:#9b59b6;margin-bottom:1rem;">📈 Interpretazione Prognostica:</h5>
        <ul style="margin:0;padding-left:1.5rem;color:#666;">
          <li><strong>Gruppo A (0-5.5 punti):</strong> Sopravvivenza >30 giorni (probabilità >70%)</li>
          <li><strong>Gruppo B (5.6-11 punti):</strong> Sopravvivenza incerta (30-70%)</li>
          <li><strong>Gruppo C (11.1-17.5 punti):</strong> Sopravvivenza <30 giorni (probabilità >70%)</li>
          <li><strong>Punteggio totale:</strong> 0-17.5 punti</li>
        </ul>
      </div>
      <div class="text-center mt-3"><button class="btn btn-primary" onclick="window.print()">Stampa</button></div>
    </div>
  </div>
</div>

<script>
let ppiData={pps:null,oral:null,edema:null,dyspnea:null,delirium:null};
let papData={dyspnea:null,anorexia:null,karnofsky:null,wbc:null,lymphocytes:null,prediction:null};
function openProgModal(type){const m=document.getElementById('prog-modal-'+type);if(m){m.style.display='block';document.body.style.overflow='hidden';const dateInput=document.getElementById(type+'-date');if(dateInput&&!dateInput.value){dateInput.value=new Date().toISOString().split('T')[0];}}}
function closeProgModal(type){const m=document.getElementById('prog-modal-'+type);if(m){m.style.display='none';document.body.style.overflow='auto';}}
function showProgTab(scale,tab){const modal=document.getElementById('prog-modal-'+scale);modal.querySelectorAll('.tab-content').forEach(c=>c.classList.remove('active'));modal.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));modal.querySelector('#'+scale+'-'+tab).classList.add('active');event.target.classList.add('active');}
function selectPPI(parameter,value){const radioGroup=event.target.closest('.radio-group');radioGroup.querySelectorAll('.radio-option').forEach(o=>{o.classList.remove('selected');o.querySelector('input').checked=false;});const option=event.target.closest('.radio-option');option.classList.add('selected');option.querySelector('input').checked=true;ppiData[parameter]=parseFloat(value);document.getElementById('ppi-'+parameter+'-item').classList.add('completed');updatePPIProgress();calculatePPI();}
function selectPAP(parameter,value){const radioGroup=event.target.closest('.radio-group');radioGroup.querySelectorAll('.radio-option').forEach(o=>{o.classList.remove('selected');o.querySelector('input').checked=false;});const option=event.target.closest('.radio-option');option.classList.add('selected');option.querySelector('input').checked=true;papData[parameter]=parseFloat(value);document.getElementById('pap-'+parameter+'-item').classList.add('completed');updatePAPProgress();calculatePAP();}
function updatePPIProgress(){const completed=Object.values(ppiData).filter(v=>v!==null).length;const total=Object.keys(ppiData).length;const perc=(completed/total)*100;document.getElementById('ppi-progress').style.width=perc+'%';document.getElementById('ppi-progress-text').textContent=`${completed}/${total}`;}
function updatePAPProgress(){const completed=Object.values(papData).filter(v=>v!==null).length;const total=Object.keys(papData).length;const perc=(completed/total)*100;document.getElementById('pap-progress').style.width=perc+'%';document.getElementById('pap-progress-text').textContent=`${completed}/${total}`;}
function calculatePPI(){const completed=Object.values(ppiData).filter(v=>v!==null).length;if(completed===Object.keys(ppiData).length){const total=Object.values(ppiData).reduce((s,v)=>s+v,0);let interp='',desc='';if(total<=4){interp='Buona prognosi';desc='Sopravvivenza >6 settimane (probabilità >70%)';}else{interp='Prognosi riservata';desc='Sopravvivenza ≤3 settimane (probabilità >80%)';}document.getElementById('ppi-score').textContent=total.toFixed(1);document.getElementById('ppi-interpretation').textContent=interp;document.getElementById('ppi-description').textContent=desc;document.getElementById('ppi-results').style.display='block';}else{document.getElementById('ppi-results').style.display='none';}}
function calculatePAP(){const completed=Object.values(papData).filter(v=>v!==null).length;if(completed===Object.keys(papData).length){const total=Object.values(papData).reduce((s,v)=>s+v,0);let interp='',desc='',group='';if(total<=5.5){group='A';interp='Buona prognosi';desc='Sopravvivenza >30 giorni (probabilità >70%)';}else if(total<=11){group='B';interp='Prognosi intermedia';desc='Sopravvivenza incerta (30-70% probabilità)';}else{group='C';interp='Prognosi riservata';desc='Sopravvivenza <30 giorni (probabilità >70%)';}document.getElementById('pap-score').textContent=total.toFixed(1);document.getElementById('pap-interpretation').textContent=`Gruppo ${group} - ${interp}`;document.getElementById('pap-description').textContent=desc;document.getElementById('pap-results').style.display='block';}else{document.getElementById('pap-results').style.display='none';}}
function resetForm(type){if(confirm('Sei sicuro di voler azzerare tutti i dati?')){if(type==='ppi'){ppiData={pps:null,oral:null,edema:null,dyspnea:null,delirium:null};document.getElementById('ppi-patient-name').value='';updatePPIProgress();document.getElementById('ppi-results').style.display='none';}else{papData={dyspnea:null,anorexia:null,karnofsky:null,wbc:null,lymphocytes:null,prediction:null};document.getElementById('pap-patient-name').value='';updatePAPProgress();document.getElementById('pap-results').style.display='none';}document.querySelectorAll(`#prog-modal-${type} .radio-option`).forEach(o=>{o.classList.remove('selected');o.querySelector('input').checked=false;});document.querySelectorAll(`#prog-modal-${type} .form-item`).forEach(i=>i.classList.remove('completed'));}}
function generateReport(type){const patientName=document.getElementById(`${type}-patient-name`).value||'Paziente non specificato';const date=document.getElementById(`${type}-date`).value||new Date().toISOString().split('T')[0];let content='';if(type==='ppi'){const completed=Object.values(ppiData).filter(v=>v!==null).length;if(completed<Object.keys(ppiData).length){alert('Completa tutti i parametri prima di generare il report');return;}const total=Object.values(ppiData).reduce((s,v)=>s+v,0);content=`REPORT PPI - PALLIATIVE PERFORMANCE INDEX\n==========================================\n\nPaziente: ${patientName}\nData valutazione: ${new Date(date).toLocaleDateString('it-IT')}\n\nPARAMETRI VALUTATI:\n• Palliative Performance Scale: ${ppiData.pps} punti\n• Assunzione orale: ${ppiData.oral} punti\n• Edema: ${ppiData.edema} punti\n• Dispnea a riposo: ${ppiData.dyspnea} punti\n• Delirium: ${ppiData.delirium} punti\n\nPUNTEGGIO TOTALE: ${total.toFixed(1)} punti\n\nINTERPRETAZIONE:\n${total<=4?'Buona prognosi - Sopravvivenza >6 settimane (probabilità >70%)':'Prognosi riservata - Sopravvivenza ≤3 settimane (probabilità >80%)'}\n\nValutato da: [Nome del medico]\nFirma: ____________________\n`; } else {const completed=Object.values(papData).filter(v=>v!==null).length;if(completed<Object.keys(papData).length){alert('Completa tutti i parametri prima di generare il report');return;}const total=Object.values(papData).reduce((s,v)=>s+v,0);let group=total<=5.5?'A':total<=11?'B':'C';content=`REPORT PAP SCORE - PALLIATIVE PROGNOSTIC SCORE\n==============================================\n\nPaziente: ${patientName}\nData valutazione: ${new Date(date).toLocaleDateString('it-IT')}\n\nPARAMETRI VALUTATI:\n• Dispnea: ${papData.dyspnea} punti\n• Anoressia: ${papData.anorexia} punti\n• Karnofsky Performance Status: ${papData.karnofsky} punti\n• Leucociti totali: ${papData.wbc} punti\n• Percentuale Linfociti: ${papData.lymphocytes} punti\n• Predizione clinica: ${papData.prediction} punti\n\nPUNTEGGIO TOTALE: ${total.toFixed(1)} punti\nGRUPPO PROGNOSTICO: ${group}\n\nINTERPRETAZIONE:\n${group==='A'?'Buona prognosi - Sopravvivenza >30 giorni (probabilità >70%)':group==='B'?'Prognosi intermedia - Sopravvivenza incerta (30-70% probabilità)':'Prognosi riservata - Sopravvivenza <30 giorni (probabilità >70%)'}\n\nValutato da: [Nome del medico]\nFirma: ____________________\n`; }
const blob=new Blob([content],{type:'text/plain;charset=utf-8'});const url=URL.createObjectURL(blob);const a=document.createElement('a');a.href=url;a.download=`Report_${type.toUpperCase()}_${patientName.replace(/\s+/g,'_')}_${date}.txt`;document.body.appendChild(a);a.click();document.body.removeChild(a);URL.revokeObjectURL(url);}
window.onclick=function(e){if(e.target.classList.contains('prog-modal')){e.target.style.display='none';document.body.style.overflow='auto';}};
document.addEventListener('keydown',function(e){if(e.key==='Escape'){document.querySelectorAll('.prog-modal').forEach(m=>m.style.display='none');document.body.style.overflow='auto';}});
document.addEventListener('DOMContentLoaded',function(){const today=new Date().toISOString().split('T')[0];const ppiDate=document.getElementById('ppi-date');if(ppiDate)ppiDate.value=today;const papDate=document.getElementById('pap-date');if(papDate)papDate.value=today;});
</script>

<style>
.prognosi-container{max-width:1200px;margin:0 auto;padding:2rem 1rem;}
.prognosi-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:2rem;margin-top:2rem;}
.prognosi-card{background:white;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,0.08);padding:2rem;transition:all 0.3s ease;border:1px solid #e9ecef;cursor:pointer;}
.prognosi-card:hover{transform:translateY(-5px);box-shadow:0 8px 30px rgba(0,0,0,0.15);border-color:#5cb85c;}
.card-header{display:flex;align-items:center;margin-bottom:1.5rem;}
.card-icon{width:50px;height:50px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:white;margin-right:1rem;font-weight:bold;}
.ppi .card-icon{background:linear-gradient(135deg,#e74c3c,#c0392b);} .pap .card-icon{background:linear-gradient(135deg,#9b59b6,#8e44ad);}
.card-title{font-size:1.4rem;font-weight:600;color:#5cb85c;margin-bottom:0.3rem;}
.card-subtitle{font-size:0.9rem;color:#6c757d;font-weight:500;}
.card-description{color:#555;margin-bottom:1.5rem;font-size:0.95rem;}
.prog-modal{display:none;position:fixed;z-index:1000;left:0;top:0;width:100%;height:100%;background-color:rgba(0,0,0,0.5);}
.prog-modal-content{background-color:white;margin:2% auto;padding:2rem;border-radius:12px;width:95%;max-width:900px;max-height:90vh;overflow-y:auto;position:relative;}
.prog-close{position:absolute;right:1rem;top:1rem;font-size:2rem;font-weight:bold;cursor:pointer;color:#aaa;}
.prog-close:hover{color:#000;}
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
.form-item{margin-bottom:1.5rem;padding:1rem;background:white;border-radius:8px;border-left:4px solid #dee2e6;}
.form-item.completed{border-left-color:#28a745;}
.radio-group{display:flex;flex-wrap:wrap;gap:1rem;margin-top:0.5rem;}
.radio-option{display:flex;align-items:center;cursor:pointer;padding:0.5rem 1rem;border:2px solid #dee2e6;border-radius:25px;transition:all 0.3s ease;min-width:150px;}
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
.progress-bar{background:#e9ecef;border-radius:10px;height:8px;margin:1rem 0;}
.progress-fill{background:linear-gradient(90deg,#28a745,#20c997);height:100%;border-radius:10px;transition:width 0.3s ease;}
@media (max-width:768px){.prognosi-grid{grid-template-columns:1fr;}.prog-modal-content{width:98%;margin:1% auto;padding:1rem;}.tabs{flex-wrap:wrap;}.tab{padding:0.75rem 1rem;font-size:0.9rem;}.radio-group{flex-direction:column;}.radio-option{min-width:auto;}}
</style>
