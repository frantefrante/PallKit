// archivio.js
// Gestione delle schede salvate localmente

document.addEventListener('DOMContentLoaded', function(){
  const tbody = document.querySelector('#archivio-table tbody');
  const filtroTipo = document.getElementById('filtro-tipo');
  const filtroDal = document.getElementById('filtro-dal');
  const filtroAl  = document.getElementById('filtro-al');

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

  function applyFilter(list){
    const tipo = filtroTipo ? filtroTipo.value : '';
    const dal = filtroDal && filtroDal.value ? new Date(filtroDal.value) : null;
    const al  = filtroAl && filtroAl.value ? new Date(filtroAl.value) : null;
    return list.filter(e=>{
      const t = new Date(e.timestamp);
      if(tipo && e.tipo.toLowerCase()!==tipo) return false;
      if(dal && t < dal) return false;
      if(al && t > new Date(al.getTime()+86400000-1)) return false;
      return true;
    });
  }

  function render(){
    if(!tbody) return;
    tbody.innerHTML='';
    const entries = applyFilter(getAllEntries());
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

  [filtroTipo, filtroDal, filtroAl].forEach(el=>{ if(el) el.addEventListener('change', render); });

  document.addEventListener('click', function(e){
    if(e.target.dataset.view){
      const key = e.target.dataset.view;
      const entry = JSON.parse(localStorage.getItem(key));
      if(!entry) return;
      const modalBody = document.getElementById('scheda-contenuto');
      const title = document.getElementById('scheda-title');
      title.textContent = `${entry.tipo} - ${new Date(entry.timestamp).toLocaleString('it-IT')}`;
      let html = '<ul class="list-group">';
      for(const k in entry.contenuto){
        html += `<li class="list-group-item"><strong>${k}:</strong> ${entry.contenuto[k]}</li>`;
      }
      html += '</ul>';
      modalBody.innerHTML = html;
      const btnStampa = document.getElementById('scheda-stampa');
      if(btnStampa) btnStampa.dataset.key = key;
      const modal = new bootstrap.Modal(document.getElementById('scheda-modal'));
      modal.show();
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

  function stampaScheda(key){
    const entry = JSON.parse(localStorage.getItem(key));
    if(!entry) return;
    const w = window.open('', '_blank');
    w.document.write('<html><head><title>Stampa</title></head><body>');
    w.document.write(`<h3>${entry.tipo}</h3>`);
    w.document.write(`<p>Data: ${new Date(entry.timestamp).toLocaleString('it-IT')}</p>`);
    w.document.write('<ul>');
    for(const k in entry.contenuto){
      w.document.write(`<li><strong>${k}:</strong> ${entry.contenuto[k]}</li>`);
    }
    w.document.write('</ul>');
    w.document.write('</body></html>');
    w.document.close();
    w.print();
  }

  document.querySelectorAll('form.local-save').forEach(form=>{
    form.addEventListener('submit', function(ev){
      ev.preventDefault();
      const tipo = form.dataset.tipo || 'Scheda';
      const fd = new FormData(form);
      const obj = {};
      fd.forEach((v,k)=>{ obj[k] = v; });
      const now = new Date().toISOString();
      const data = { tipo: tipo.toUpperCase(), timestamp: now, contenuto: obj };
      localStorage.setItem(tipo.toLowerCase() + '_' + now, JSON.stringify(data));
      alert('Scheda salvata localmente');
      form.reset();
      render();
    });
  });

  render();
});
