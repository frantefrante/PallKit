(function(){
  document.addEventListener('DOMContentLoaded',function(){
    const compilatore = document.getElementById('ipos-compilatore');
    const intervallo  = document.getElementById('ipos-intervallo');
    const form        = document.getElementById('ipos-form');
    const riepilogo   = document.getElementById('ipos-riepilogo');
    const summaryBox  = document.getElementById('ipos-summary');
    const testBox     = document.getElementById('ipos-test');

    function updateTexts(){
      const days = intervallo.value === '3' ? 'negli ultimi 3 giorni' : 'nell\'ultima settimana';
      document.querySelectorAll('[data-int]').forEach(el=>{
        const base = el.dataset.int;
        el.textContent = base.replace('{INT}', days);
      });
      const isStaff = compilatore.value === 'staff';
      document.querySelectorAll('.nv-opt').forEach(opt=>{
        opt.style.display = isStaff ? 'inline-block' : 'none';
        if(!isStaff && opt.querySelector('input').checked){
          const inp = opt.parentElement.querySelector('input[type=radio]');
          if(inp) inp.checked = true;
        }
      });
      document.querySelectorAll('.q10-only').forEach(div=>{
        div.style.display = compilatore.value === 'paziente' ? 'block' : 'none';
      });
    }
    if(compilatore) compilatore.addEventListener('change', updateTexts);
    if(intervallo) intervallo.addEventListener('change', updateTexts);
    updateTexts();

    const btnRiep = document.getElementById('btn-riepilogo');
    if(btnRiep){
      btnRiep.addEventListener('click', function(e){
        e.preventDefault();
        const data = new FormData(form);
        let html = '<ul class="list-group">';
        data.forEach((v,k)=>{
          html += '<li class="list-group-item"><strong>'+k+':</strong> '+v+'</li>';
        });
        html += '</ul>';
        summaryBox.innerHTML = html;
        riepilogo.style.display = 'block';
        window.scrollTo({top: riepilogo.offsetTop-20, behavior:'smooth'});
      });
    }

    function fillTest(){
      const today = new Date().toISOString().slice(0,10);
      document.getElementById('ipos-nome').value = 'Mario Rossi';
      document.getElementById('ipos-nascita').value = '1970-01-01';
      document.getElementById('ipos-data').value = today;
      document.getElementById('ipos-id').value = 'TEST';
      compilatore.value = 'paziente';
      intervallo.value = '3';
      form.querySelectorAll('textarea').forEach(t=>{t.value = 'Test';});
      form.querySelectorAll('input[type=radio]').forEach(r=>{
        if(r.value === '0') r.checked = true;
      });
      const q10 = form.querySelector('input[name="q10"][value="solo"]');
      if(q10) q10.checked = true;
      updateTexts();
    }

    if(testBox){
      testBox.addEventListener('change', function(){
        if(this.checked){
          fillTest();
        }else{
          form.reset();
          updateTexts();
        }
      });
    }
  });
})();
