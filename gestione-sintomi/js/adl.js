function switchADLMode(mode){
  document.querySelectorAll('#adl-home .mode-btn').forEach(b=>b.classList.remove('active'));
  document.querySelectorAll('#adl-home .content-section').forEach(s=>s.classList.remove('active'));
  const target=document.getElementById(mode+'-section');
  const btn=document.querySelector(`#adl-home .mode-btn[onclick*="${mode}"]`);
  if(btn) btn.classList.add('active');
  if(target) target.classList.add('active');
}

function printADLTemplate(){ performanceTools.printPerformanceTemplate('adl'); }

window.switchADLMode=switchADLMode;
window.printADLTemplate=printADLTemplate;
