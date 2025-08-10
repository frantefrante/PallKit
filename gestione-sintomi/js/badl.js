function switchBADLMode(mode){
  document.querySelectorAll('#badl-home .mode-btn').forEach(b=>b.classList.remove('active'));
  document.querySelectorAll('#badl-home .content-section').forEach(s=>s.classList.remove('active'));
  const target=document.getElementById(mode+'-section');
  const btn=document.querySelector(`#badl-home .mode-btn[onclick*="${mode}"]`);
  if(btn) btn.classList.add('active');
  if(target) target.classList.add('active');
}

function printBADLTemplate(){ performanceTools.printPerformanceTemplate('badl'); }

window.switchBADLMode=switchBADLMode;
window.printBADLTemplate=printBADLTemplate;
