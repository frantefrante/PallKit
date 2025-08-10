let akpsData = { score:null, patientName:'', date:'', interpretation:'', description:'' };

document.addEventListener('DOMContentLoaded',()=>{
  const today=new Date().toISOString().split('T')[0];
  const d=document.getElementById('akps-date');
  if(d && !d.value) d.value=today;
});

function switchAKPSMode(mode){
  document.querySelectorAll('#akps-home .mode-btn').forEach(b=>b.classList.remove('active'));
  document.querySelectorAll('#akps-home .content-section').forEach(s=>s.classList.remove('active'));
  const target = document.getElementById(mode+'-section');
  const btn = document.querySelector(`#akps-home .mode-btn[onclick*="${mode}"]`);
  if(btn) btn.classList.add('active');
  if(target) target.classList.add('active');
}

function selectAKPS(score){
  document.querySelectorAll('#akps-options .radio-option').forEach(o=>o.classList.remove('selected'));
  event.currentTarget.classList.add('selected');
  akpsData.score=score;
  showAKPSResult(score);
  performanceTools.updateProgress('akps',100);
}

function showAKPSResult(score){
  const res=document.getElementById('akps-results');
  const num=document.getElementById('akps-score');
  const interp=document.getElementById('akps-interpretation');
  const desc=document.getElementById('akps-description');
  if(!res||!num||!interp||!desc) return;
  num.textContent=score;
  let i=''; let d='';
  if(score>=80){i='Buone condizioni funzionali';d='Il paziente mantiene autonomia elevata.';}
  else if(score>=60){i='Condizioni moderate';d='Necessita assistenza occasionale.';}
  else if(score>=40){i='Condizioni compromesse';d='Richiede supporto regolare.';}
  else{i='Condizioni critiche';d='Cure intensive necessarie.';}
  interp.textContent=i;desc.textContent=d;
  akpsData.interpretation=i;akpsData.description=d;
  res.style.display='block';
}

function saveAKPSData(){
  akpsData.patientName=document.getElementById('akps-patient-name')?.value||'';
  akpsData.date=document.getElementById('akps-date')?.value||'';
}

function generateAKPSReport(){
  if(!akpsData.score){alert('Completa la valutazione AKPS');return;}
  saveAKPSData();
  const report=performanceTools.generateReportContent('akps',akpsData.score,akpsData.patientName||'Non specificato',akpsData.date||new Date().toLocaleDateString('it-IT'),akpsData.interpretation,akpsData.description);
  const blob=new Blob([report],{type:'text/plain'});
  const a=document.createElement('a');a.href=URL.createObjectURL(blob);a.download='AKPS_Report.txt';a.click();
}

function printAKPSTemplate(){ performanceTools.printPerformanceTemplate('akps'); }

function resetAKPS(){
  document.querySelectorAll('#akps-options .radio-option').forEach(o=>o.classList.remove('selected'));
  document.getElementById('akps-results').style.display='none';
  akpsData={score:null,patientName:'',date:'',interpretation:'',description:''};
  performanceTools.updateProgress('akps',0);
}

window.switchAKPSMode=switchAKPSMode;
window.selectAKPS=selectAKPS;
window.generateAKPSReport=generateAKPSReport;
window.printAKPSTemplate=printAKPSTemplate;
window.resetAKPS=resetAKPS;
