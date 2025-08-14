let current4ATScores = {1: null, 2: null, 3: null, 4: null};
let currentCAMFeatures = {1: null, 2: null, 3: null, 4: null};

document.addEventListener('DOMContentLoaded', function() {
  const today = new Date().toISOString().split('T')[0];
  document.querySelectorAll('#4at-home input[type="date"], #cam-home input[type="date"]').forEach(inp => {
    if (!inp.value) inp.value = today;
  });
});

function switch4ATMode(mode) {
  const compile = document.getElementById('4at-compile');
  const reference = document.getElementById('4at-reference');
  const buttons = document.querySelectorAll('#4at-home .mode-btn');
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
  document.querySelectorAll('#4at-home input[type="radio"]').forEach(i => i.checked = false);
  document.querySelectorAll('#4at-home .radio-option').forEach(o => o.classList.remove('selected'));
  document.querySelectorAll('#4at-home .question-item').forEach(i => i.classList.remove('completed'));
  update4ATProgress();
  document.getElementById('4at-results').classList.add('hidden');
}

function print4AT() {
  window.print();
}

function switchCAMMode(mode) {
  const compile = document.getElementById('cam-compile');
  const reference = document.getElementById('cam-reference');
  const buttons = document.querySelectorAll('#cam-home .mode-btn');
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
  document.querySelectorAll('#cam-home input[type="radio"]').forEach(i => i.checked = false);
  document.querySelectorAll('#cam-home .radio-option').forEach(o => o.classList.remove('selected'));
  document.querySelectorAll('#cam-home .question-item').forEach(i => i.classList.remove('completed'));
  updateCAMProgress();
  document.getElementById('cam-results').classList.add('hidden');
}

function printCAM() {
  window.print();
}
