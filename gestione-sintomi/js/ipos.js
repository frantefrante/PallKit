(function(){
  document.addEventListener('DOMContentLoaded',function(){
    const compilatore = document.getElementById('ipos-compilatore');
    const intervallo  = document.getElementById('ipos-intervallo');
    const form        = document.getElementById('ipos-form');
    const riepilogo   = document.getElementById('ipos-riepilogo');
    const summaryBox  = document.getElementById('ipos-summary');
    const testFill    = document.getElementById('ipos-test-fill');

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

    function fillTest(){
      if(!form) return;
      const today = new Date().toISOString().split('T')[0];
      const set = (id,val)=>{ const el=document.getElementById(id); if(el) el.value=val; };
      set('ipos-nome','Mario Rossi');
      set('ipos-nascita','1970-01-01');
      set('ipos-id','TEST123');
      set('ipos-data',today);
      if(compilatore) compilatore.value='paziente';
      if(intervallo) intervallo.value='3';
      updateTexts();
      if(form.q1) form.q1.value='Test automatico';
      document.querySelectorAll('input[name^="q2["][value="2"]').forEach(r=>r.checked=true);
      for(let i=3;i<=9;i++){
        const inp=form.querySelector('input[name="q'+i+'"][value="2"]');
        if(inp) inp.checked=true;
      }
      const q10=form.querySelector('input[name="q10"][value="solo"]');
      if(q10) q10.checked=true;
    }

    if(testFill){
      testFill.addEventListener('change',function(){ if(this.checked) fillTest(); });
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

    const resultBox = document.getElementById('ipos-result');
    const previewBox = document.getElementById('ipos-preview');
    const viewBtn = document.getElementById('btn-view-ipos');
    const pdfBtn = document.getElementById('btn-save-pdf-ipos');

    function buildIposHtml(fd){
      let html = '<div style="font-family: Helvetica, Arial, sans-serif; font-size:11pt;">';
      html += '<div style="background:#f7f7f7; padding:8px; margin-top:10px;">';
      html += '<strong>Nome paziente:</strong> '+(fd.get('nome')||'')+'<br>';
      html += '<strong>Data di nascita:</strong> '+(fd.get('data_nascita')||'')+'<br>';
      html += '<strong>Data compilazione:</strong> '+(fd.get('data_compilazione')||'')+'</div>';
      html += '<h4 style="background:#e0e0e0; padding:4px; margin-top:20px; font-size:1rem;">Risposte IPOS</h4><ul>';
      fd.forEach((v,k)=>{
        if(['nome','data_nascita','data_compilazione','id_paziente','ajax'].includes(k)) return;
        html += '<li><strong>'+k+':</strong> '+v+'</li>';
      });
      html += '</ul></div>';
      return html;
    }

    if(form){
      form.addEventListener('submit', function(e){
        e.preventDefault();
        const fd = new FormData(form);
        fd.append('ajax','1');
        fetch(form.getAttribute('action') || 'process-ipos.php', { method:'POST', body: fd })
          .then(r => r.ok ? r.json() : Promise.reject())
          .then(res => {
            if(res.success){
              const html = buildIposHtml(fd);
              if(resultBox) resultBox.style.display = 'block';
              if(previewBox){
                previewBox.innerHTML = html;
                previewBox.style.display = 'block';
              }
              if(typeof addPatientDoc === 'function'){
                const dateStr = typeof formatDateIt === 'function' ? formatDateIt(fd.get('data_compilazione')) : fd.get('data_compilazione');
                addPatientDoc({
                  title: 'IPOS',
                  date: dateStr,
                  desc: 'Questionario IPOS',
                  type: 'ipos',
                  html: html
                });
              }
              alert('Questionario IPOS salvato. Il documento è disponibile in dashboard.');
            } else {
              const msg = res.errors ? res.errors.join('\n') : (res.error || 'Errore durante il salvataggio');
              alert(msg);
            }
          })
          .catch(err => {
            alert('Errore durante il salvataggio');
            console.error('IPOS save error', err);
          });
      });
    }

    if(viewBtn && previewBox){
      viewBtn.addEventListener('click', () => {
        const html = previewBox.innerHTML.trim();
        if(!html) return alert('Anteprima non disponibile.');
        const modalBody = document.getElementById('preview-content-home');
        if(!modalBody) return alert('Anteprima non disponibile.');
        modalBody.innerHTML = html;
        new bootstrap.Modal(document.getElementById('preview-modal-home')).show();
      });
    }

    if(pdfBtn && previewBox){
      pdfBtn.addEventListener('click', () => {
        const html = previewBox.innerHTML.trim();
        if(!html) return alert('Anteprima non disponibile.');
        const tmp = document.createElement('div');
        tmp.innerHTML = html;
        const opt = {
          margin: 0.5,
          filename: 'IPOS.pdf',
          image: { type: 'jpeg', quality: 0.98 },
          html2canvas: { scale: 2 },
          jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        };
        html2pdf().set(opt).from(tmp).save();
      });
    }
  });
})();
