let current4ATScores = {1: null, 2: null, 3: null, 4: null};
let currentCAMFeatures = {1: null, 2: null, 3: null, 4: null};

document.addEventListener('DOMContentLoaded', function() {
  const today = new Date().toISOString().split('T')[0];
  document.querySelectorAll('#4at-assessment input[type="date"], #cam-assessment input[type="date"]').forEach(inp => {
    if (!inp.value) inp.value = today;
  });
});

function showMainView() {
  document.getElementById('main-view').style.display = 'block';
  document.getElementById('4at-assessment').classList.remove('active');
  document.getElementById('cam-assessment').classList.remove('active');
}

function show4ATAssessment(mode = 'compile') {
  document.getElementById('main-view').style.display = 'none';
  document.getElementById('4at-assessment').classList.add('active');
  document.getElementById('cam-assessment').classList.remove('active');
  switch4ATMode(mode);
}

function showCAMAssessment(mode = 'compile') {
  document.getElementById('main-view').style.display = 'none';
  document.getElementById('cam-assessment').classList.add('active');
  document.getElementById('4at-assessment').classList.remove('active');
  switchCAMMode(mode);
}

function switch4ATMode(mode) {
  const compile = document.getElementById('4at-compile');
  const reference = document.getElementById('4at-reference');
  const buttons = document.querySelectorAll('#4at-assessment .mode-btn');
  buttons.forEach(b => b.classList.remove('active'));
  if (mode === 'compile') {
    compile.classList.remove('hidden');
    reference.classList.add('hidden');
    buttons[0].classList.add('active');
  } else {
    compile.classList.add('hidden');
    reference.classList.remove('hidden');
    buttons[1].classList.add('active');
  }
}

function select4ATAnswer(question, score, element) {
  current4ATScores[question] = score;
  const item = document.getElementById(`4at-q${question}`);
  item.classList.add('completed');
  item.querySelectorAll('.radio-option').forEach(opt => opt.classList.remove('selected'));
  element.classList.add('selected');
  element.querySelector('input').checked = true;
  update4ATProgress();
  if (isAll4ATCompleted()) calculate4ATScore();
}

function update4ATProgress() {
  const completed = Object.values(current4ATScores).filter(s => s !== null).length;
  const total = 4;
  document.getElementById('4at-progress-text').textContent = `${completed}/${total} completati`;
  document.getElementById('4at-progress-bar').style.width = `${(completed/total)*100}%`;
}

function isAll4ATCompleted() {
  return Object.values(current4ATScores).every(s => s !== null);
}

function calculate4ATScore() {
  const total = Object.values(current4ATScores).reduce((a,b) => a + b, 0);
  let interpretation, description;
  if (total === 0) {
    interpretation = 'Delirium improbabile';
    description = 'Il punteggio suggerisce che il delirium è improbabile.';
  } else if (total >= 1 && total <= 3) {
    interpretation = 'Possibile deterioramento cognitivo';
    description = 'Valutazione più approfondita consigliata.';
  } else {
    interpretation = 'Possibile delirium';
    description = 'Valutazione clinica urgente raccomandata.';
  }
  document.getElementById('4at-score').textContent = total;
  document.getElementById('4at-interpretation').textContent = interpretation;
  document.getElementById('4at-description').textContent = description;
  document.getElementById('4at-results').classList.remove('hidden');
}

function reset4AT() {
  current4ATScores = {1: null, 2: null, 3: null, 4: null};
  document.querySelectorAll('#4at-assessment input[type="radio"]').forEach(i => i.checked = false);
  document.querySelectorAll('#4at-assessment .radio-option').forEach(o => o.classList.remove('selected'));
  document.querySelectorAll('#4at-assessment .question-item').forEach(i => i.classList.remove('completed'));
  document.querySelectorAll('#4at-assessment input[type="text"]').forEach(i => i.value = '');
  const today = new Date().toISOString().split('T')[0];
  document.querySelectorAll('#4at-assessment input[type="date"]').forEach(i => i.value = today);
  update4ATProgress();
  document.getElementById('4at-results').classList.add('hidden');
}

function print4AT() {
  const name = document.getElementById('4at-patient-name').value || '';
  const birth = document.getElementById('4at-patient-birth').value || '';
  const date = document.getElementById('4at-date').value || '';
  const total = document.getElementById('4at-score').textContent;
  const interpretation = document.getElementById('4at-interpretation').textContent;
  const description = document.getElementById('4at-description').textContent;
  const labels = {
    1: 'Allerta',
    2: 'Test di Attenzione',
    3: 'Attenzione (alternativo)',
    4: 'Cambiamento Acuto'
  };
  const w = window.open('', '_blank');
  w.document.write('<html><head><title>4AT - Stampa</title><style>body{font-family:Arial,sans-serif;margin:20px;}h2{text-align:center;}table{width:100%;border-collapse:collapse;margin-top:20px;}td,th{border:1px solid #000;padding:6px;}p{margin:4px 0;}</style></head><body>');
  w.document.write('<h2>4AT - 4 \u201CA\u2019s Test</h2>');
  w.document.write(`<p><strong>Paziente:</strong> ${name}<br><strong>Nascita:</strong> ${birth}<br><strong>Data valutazione:</strong> ${date}</p>`);
  w.document.write('<table><thead><tr><th>Parametro</th><th>Punteggio</th></tr></thead><tbody>');
  for (let i = 1; i <= 4; i++) {
    w.document.write(`<tr><td>${labels[i]}</td><td>${current4ATScores[i] ?? ''}</td></tr>`);
  }
  w.document.write(`</tbody></table><p><strong>Punteggio Totale:</strong> ${total}</p>`);
  w.document.write(`<p><strong>Interpretazione:</strong> ${interpretation}</p><p>${description}</p>`);
  w.document.write('</body></html>');
  w.document.close();
  w.print();
}

function switchCAMMode(mode) {
  const compile = document.getElementById('cam-compile');
  const reference = document.getElementById('cam-reference');
  const buttons = document.querySelectorAll('#cam-assessment .mode-btn');
  buttons.forEach(b => b.classList.remove('active'));
  if (mode === 'compile') {
    compile.classList.remove('hidden');
    reference.classList.add('hidden');
    buttons[0].classList.add('active');
  } else {
    compile.classList.add('hidden');
    reference.classList.remove('hidden');
    buttons[1].classList.add('active');
  }
}

function selectCAMAnswer(feature, present, element) {
  currentCAMFeatures[feature] = present;
  const item = document.getElementById(`cam-f${feature}`);
  item.classList.add('completed');
  item.querySelectorAll('.radio-option').forEach(opt => opt.classList.remove('selected'));
  element.classList.add('selected');
  element.querySelector('input').checked = true;
  updateCAMProgress();
  if (isAllCAMCompleted()) calculateCAMDiagnosis();
}

function updateCAMProgress() {
  const completed = Object.values(currentCAMFeatures).filter(v => v !== null).length;
  document.getElementById('cam-progress-text').textContent = `${completed}/4 completati`;
  document.getElementById('cam-progress-bar').style.width = `${(completed/4)*100}%`;
}

function isAllCAMCompleted() {
  return Object.values(currentCAMFeatures).every(v => v !== null);
}

function calculateCAMDiagnosis() {
  const f1 = currentCAMFeatures[1];
  const f2 = currentCAMFeatures[2];
  const f3 = currentCAMFeatures[3];
  const f4 = currentCAMFeatures[4];
  const deliriumPresent = f1 && f2 && (f3 || f4);
  if (deliriumPresent) {
    document.getElementById('cam-diagnosis').textContent = 'DELIRIUM PRESENTE';
    document.getElementById('cam-interpretation').textContent = 'Diagnosi Positiva';
    document.getElementById('cam-description').textContent = 'L\'algoritmo CAM indica la presenza di delirium.';
  } else {
    document.getElementById('cam-diagnosis').textContent = 'DELIRIUM ASSENTE';
    document.getElementById('cam-interpretation').textContent = 'Diagnosi Negativa';
    document.getElementById('cam-description').textContent = 'L\'algoritmo CAM non soddisfa i criteri per delirium.';
  }
  document.getElementById('cam-results').classList.remove('hidden');
}

function resetCAM() {
  currentCAMFeatures = {1: null, 2: null, 3: null, 4: null};
  document.querySelectorAll('#cam-assessment input[type="radio"]').forEach(i => i.checked = false);
  document.querySelectorAll('#cam-assessment .radio-option').forEach(o => o.classList.remove('selected'));
  document.querySelectorAll('#cam-assessment .question-item').forEach(i => i.classList.remove('completed'));
  updateCAMProgress();
  document.getElementById('cam-results').classList.add('hidden');
}

function printCAM() {
  const name = document.getElementById('cam-patient-name').value || '';
  const birth = document.getElementById('cam-patient-birth').value || '';
  const date = document.getElementById('cam-date').value || '';
  const diagnosis = document.getElementById('cam-diagnosis').textContent;
  const interpretation = document.getElementById('cam-interpretation').textContent;
  const description = document.getElementById('cam-description').textContent;
  const labels = {
    1: 'Esordio acuto e corso fluttuante',
    2: 'Disattenzione',
    3: 'Pensiero disorganizzato',
    4: 'Livello di coscienza alterato'
  };
  const w = window.open('', '_blank');
  w.document.write('<html><head><title>CAM - Stampa</title><style>body{font-family:Arial,sans-serif;margin:20px;}h2{text-align:center;}table{width:100%;border-collapse:collapse;margin-top:20px;}td,th{border:1px solid #000;padding:6px;}p{margin:4px 0;}</style></head><body>');
  w.document.write('<h2>CAM - Confusion Assessment Method</h2>');
  w.document.write(`<p><strong>Paziente:</strong> ${name}<br><strong>Nascita:</strong> ${birth}<br><strong>Data valutazione:</strong> ${date}</p>`);
  w.document.write('<table><thead><tr><th>Caratteristica</th><th>Presente</th></tr></thead><tbody>');
  for (let i = 1; i <= 4; i++) {
    const val = currentCAMFeatures[i] ? 'S\u00ec' : 'No';
    w.document.write(`<tr><td>${labels[i]}</td><td>${val}</td></tr>`);
  }
  w.document.write('</tbody></table>');
  w.document.write(`<p><strong>Risultato:</strong> ${diagnosis}</p>`);
  w.document.write(`<p><strong>Interpretazione:</strong> ${interpretation}</p><p>${description}</p>`);
  w.document.write('</body></html>');
  w.document.close();
  w.print();
}
