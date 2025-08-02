// archivio.js
// Gestione delle schede salvate localmente

document.addEventListener('DOMContentLoaded', function(){
  const tbody = document.querySelector('#archivio-table tbody');

  function printHtml(html){
    const w = window.open('', '_blank');
    w.document.write('<html><head><title>Stampa</title><style>body{font-family:Arial,sans-serif;font-size:12px;}table{width:100%;border-collapse:collapse;}th,td{border:1px solid #000;padding:4px;}@page{size:A4;margin:15mm;}@media print{table{page-break-inside:auto;}tr{page-break-inside:avoid;}}</style></head><body>');
    w.document.write(html);
    w.document.write('</body></html>');
    w.document.close();
    w.print();
  }

  function getAllEntries(){
    const arr = [];
    for(let i=0;i<localStorage.length;i++){
      const key = localStorage.key(i);
      if(/^ipos_|^sintomo_|^necpal_/.test(key)){
        try{
          const item = JSON.parse(localStorage.getItem(key));
          arr.push(Object.assign({key:key}, item));
        }catch(e){}
      }
    }
    arr.sort((a,b)=> new Date(b.timestamp) - new Date(a.timestamp));
    return arr;
  }

  function buildIposHtml(entry){
    if(entry.html) return entry.html;
    const form = document.getElementById('ipos-form');
    if(!form) return '<p>Modulo IPOS non disponibile.</p>';
    const clone = form.cloneNode(true);
    clone.id='';
    clone.classList.remove('local-save');
    clone.querySelectorAll('input, textarea, select').forEach(el=>{
      const name = el.name;
      const val = entry.contenuto[name];
      if(val !== undefined){
        if(el.type==='radio' || el.type==='checkbox'){
          if(el.value == val){
            el.checked = true;
            el.setAttribute('checked','checked');
          }
        }else if(el.tagName === 'TEXTAREA'){
          el.value = val;
          el.textContent = val;
        }else{
          el.value = val;
          el.setAttribute('value', val);
        }
      }
      el.disabled = true;
    });
    clone.querySelectorAll('button').forEach(b=>b.remove());
    const dataStr = new Date(entry.timestamp).toLocaleString('it-IT');
    const tipo = `${entry.contenuto.compilatore} ${entry.contenuto.intervallo} giorni`;
    const nome = entry.contenuto.nome || '';
    const nasc = entry.contenuto.data_nascita ? new Date(entry.contenuto.data_nascita).toLocaleDateString('it-IT') : '';
    const wrapper = document.createElement('div');
    wrapper.innerHTML = `<h3>IPOS</h3><p>Nome: ${nome}<br>Data di nascita: ${nasc}<br>Data compilazione: ${dataStr}<br>Tipo: ${tipo}</p>`;
    wrapper.appendChild(clone);
    return wrapper.innerHTML;
  }

  function render(){
    if(tbody){
      tbody.innerHTML='';
      const entries = getAllEntries();
      entries.forEach(e=>{
        const tr = document.createElement('tr');
        const dataStr = new Date(e.timestamp).toLocaleString('it-IT');
        tr.innerHTML = `<td>${dataStr}</td><td>${e.tipo}</td>`+
          `<td><button class="btn btn-sm btn-primary" data-view="${e.key}">Visualizza</button></td>`+
          `<td><button class="btn btn-sm btn-secondary" data-print="${e.key}">Stampa</button></td>`+
          `<td><button class="btn btn-sm btn-danger" data-del="${e.key}">Cancella</button></td>`;
        tbody.appendChild(tr);
      });
    }
    if(window.patientDocs && window.addPatientDoc){
      for(let i=window.patientDocs.length-1;i>=0;i--){
        if(window.patientDocs[i].type === 'ipos') window.patientDocs.splice(i,1);
      }
      const iposEntries = getAllEntries().filter(e=> e.tipo === 'IPOS');
      iposEntries.forEach(e=>{
        if(!e.html){
          e.html = buildIposHtml(e);
          localStorage.setItem(e.key, JSON.stringify(e));
        }
        const dataStr = new Date(e.timestamp).toLocaleDateString('it-IT');
        const desc = `${e.contenuto.compilatore} ${e.contenuto.intervallo} giorni`;
        addPatientDoc({title:'IPOS', date:dataStr, desc:desc, type:'ipos', html:e.html});
      });
    }
  }

  function mostraScheda(key){
    const entry = JSON.parse(localStorage.getItem(key));
    if(!entry) return;
    const modalBody = document.getElementById('scheda-contenuto');
    const title = document.getElementById('scheda-title');
    title.textContent = `${entry.tipo} - ${new Date(entry.timestamp).toLocaleString('it-IT')}`;
    if(entry.tipo === 'IPOS'){
      modalBody.innerHTML = buildIposHtml(entry);
    }else{
      let html = '<ul class="list-group">';
      for(const k in entry.contenuto){
        html += `<li class="list-group-item"><strong>${k}:</strong> ${entry.contenuto[k]}</li>`;
      }
      html += '</ul>';
      modalBody.innerHTML = html;
    }
    const btnStampa = document.getElementById('scheda-stampa');
    if(btnStampa) btnStampa.dataset.key = key;
    new bootstrap.Modal(document.getElementById('scheda-modal')).show();
  }

  function stampaScheda(key){
    const entry = JSON.parse(localStorage.getItem(key));
    if(!entry) return;
    let html;
    if(entry.tipo === 'IPOS'){
      html = buildIposHtml(entry);
    }else{
      html = `<h3>${entry.tipo}</h3><p>Data: ${new Date(entry.timestamp).toLocaleString('it-IT')}</p><ul>`;
      for(const k in entry.contenuto){
        html += `<li><strong>${k}:</strong> ${entry.contenuto[k]}</li>`;
      }
      html += '</ul>';
    }
    printHtml(html);
  }

  document.addEventListener('click', function(e){
    if(e.target.dataset.view){
      mostraScheda(e.target.dataset.view);
    }
    if(e.target.dataset.print){
      stampaScheda(e.target.dataset.print);
    }
    if(e.target.dataset.del){
      if(confirm('Confermi la cancellazione?')){
        localStorage.removeItem(e.target.dataset.del);
        render();
      }
    }
    if(e.target.id === 'scheda-stampa'){
      stampaScheda(e.target.dataset.key);
    }
  });

  document.querySelectorAll('form.local-save').forEach(form=>{
    form.addEventListener('submit', function(ev){
      ev.preventDefault();
      const tipo = form.dataset.tipo || 'Scheda';
      const fd = new FormData(form);
      const obj = {};
      fd.forEach((v,k)=>{ obj[k] = v; });
      const now = new Date().toISOString();
      const entry = { tipo: tipo.toUpperCase(), timestamp: now, contenuto: obj };
      entry.html = buildIposHtml(entry);
      localStorage.setItem(tipo.toLowerCase() + '_' + now, JSON.stringify(entry));
      alert('Scheda salvata localmente');
      form.reset();
      render();
    });
  });

  function getLatestKey(prefix){
    let latest=null, latestTime=0;
    for(let i=0;i<localStorage.length;i++){
      const k = localStorage.key(i);
      if(k.startsWith(prefix)){
        const t = Date.parse(k.substring(prefix.length));
        if(t>latestTime){ latestTime=t; latest=k; }
      }
    }
    return latest;
  }

  const btnViewLast = document.getElementById('ipos-view-last');
  const btnPrintLast = document.getElementById('ipos-print-last');
  if(btnViewLast){
    btnViewLast.addEventListener('click', ()=>{
      const key = getLatestKey('ipos_');
      if(key) mostraScheda(key);
    });
  }
  if(btnPrintLast){
    btnPrintLast.addEventListener('click', ()=>{
      const key = getLatestKey('ipos_');
      if(key) stampaScheda(key);
    });
  }

  window.mostraScheda = mostraScheda;
  window.stampaScheda = stampaScheda;
  window.printHtml = printHtml;

  render();
});
