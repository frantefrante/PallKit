let ppsData = { score:null, patientName:'', date:'', interpretation:'', description:'' };

document.addEventListener('DOMContentLoaded',()=>{
  const today=new Date().toISOString().split('T')[0];
  const d=document.getElementById('pps-date');
  if(d && !d.value) d.value=today;
});

function switchPPSMode(mode){
  document.querySelectorAll('#pps-home .mode-btn').forEach(b=>b.classList.remove('active'));
  document.querySelectorAll('#pps-home .content-section').forEach(s=>s.classList.remove('active'));
  const target=document.getElementById(mode+'-section');
  const btn=document.querySelector(`#pps-home .mode-btn[onclick*="${mode}"]`);
  if(btn) btn.classList.add('active');
  if(target) target.classList.add('active');
}

function selectPPS(score){
  document.querySelectorAll('#pps-options .radio-option').forEach(o=>o.classList.remove('selected'));
  event.currentTarget.classList.add('selected');
  ppsData.score=score;
  showPPSResult(score);
  performanceTools.updateProgress('pps',100);
}

function showPPSResult(score){
  const res=document.getElementById('pps-results');
  const num=document.getElementById('pps-score');
  const interp=document.getElementById('pps-interpretation');
  const desc=document.getElementById('pps-description');
  if(!res||!num||!interp||!desc) return;
  num.textContent=score+'%';
  let i=''; let d='';
  if(score>=70){i='Buona prognosi';d='Funzioni globali relativamente conservate.';}
  else if(score>=50){i='Prognosi settimane-mesi';d='Necessita supporto crescente.';}
  else if(score>=30){i='Prognosi settimane';d='Condizioni compromesse.';}
  else{i='Prognosi giorni';d='Fase terminale.';}
  interp.textContent=i;desc.textContent=d;
  ppsData.interpretation=i;ppsData.description=d;
  res.style.display='block';
}

function savePPSData(){
  ppsData.patientName=document.getElementById('pps-patient-name')?.value||'';
  ppsData.date=document.getElementById('pps-date')?.value||'';
}

function generatePPSReport(){
  if(!ppsData.score){alert('Completa la valutazione PPS');return;}
  savePPSData();
  const report=performanceTools.generateReportContent('pps',ppsData.score,ppsData.patientName||'Non specificato',ppsData.date||new Date().toLocaleDateString('it-IT'),ppsData.interpretation,ppsData.description);
  const blob=new Blob([report],{type:'text/plain'});
  const a=document.createElement('a');a.href=URL.createObjectURL(blob);a.download='PPS_Report.txt';a.click();
}

function printPPSTemplate(){ performanceTools.printPerformanceTemplate('pps'); }

function resetPPS(){
  document.querySelectorAll('#pps-options .radio-option').forEach(o=>o.classList.remove('selected'));
  document.getElementById('pps-results').style.display='none';
  ppsData={score:null,patientName:'',date:'',interpretation:'',description:''};
  performanceTools.updateProgress('pps',0);
}

window.switchPPSMode=switchPPSMode;
window.selectPPS=selectPPS;
window.generatePPSReport=generatePPSReport;
window.printPPSTemplate=printPPSTemplate;
window.resetPPS=resetPPS;
