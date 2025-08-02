(function(){
  // Inizializza la pagina IPOS
  function init(){
    const compilatore = document.getElementById('ipos-compilatore');
    const intervallo  = document.getElementById('ipos-intervallo');
    const form        = document.getElementById('ipos-form');
    const riepilogo   = document.getElementById('ipos-riepilogo');
    const summaryBox  = document.getElementById('ipos-summary');
    const useTest     = document.getElementById('ipos-use-test');
    const nomeField   = document.getElementById('ipos-nome');
    const nascitaField= document.getElementById('ipos-nascita');
    const idField     = document.getElementById('ipos-id');

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

    function toggleTest(){
      if(useTest && useTest.checked){
        if(nomeField){
          nomeField.value = 'Mario Rossi';
          nomeField.setAttribute('readonly', true);
        }
        if(nascitaField){
          nascitaField.value = '1945-06-04';
          nascitaField.setAttribute('readonly', true);
        }
        if(idField){
          idField.value = 'RSSMRA45T22D612H';
        }
      } else {
        if(nomeField){
          nomeField.value = '';
          nomeField.removeAttribute('readonly');
        }
        if(nascitaField){
          nascitaField.value = '';
          nascitaField.removeAttribute('readonly');
        }
        if(idField){
          idField.value = '';
        }
      }
    }
    if(useTest){
      useTest.addEventListener('change', toggleTest);
      toggleTest();
    }

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
  }

  if (document.readyState !== 'loading') {
    init();
  } else {
    document.addEventListener('DOMContentLoaded', init);
  }
})();
