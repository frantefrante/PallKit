// Variabili globali
let dn4Data = {
    q1a: null, q1b: null, q1c: null,
    q2a: null, q2b: null, q2c: null, q2d: null,
    q3a: null, q3b: null, q4: null
};

let questionStatus = {
    q1: false,
    q2: false,
    q3: false,
    q4: false
};

let dn4Container;

document.addEventListener('DOMContentLoaded', function() {
    dn4Container = document.getElementById('dn4-home');
    if (!dn4Container) return;
    const today = new Date().toISOString().split('T')[0];
    dn4Container.querySelector('#dn4-compile-date').value = today;
    updateProgress();

    const autoSave = localStorage.getItem('dn4_autosave');
    if (autoSave) {
        const data = JSON.parse(autoSave);
        if (confirm('🔄 Trovata valutazione non salvata. Vuoi ripristinarla?')) {
            dn4Container.querySelector('#dn4-patient-name').value = data.patient.name || '';
            dn4Container.querySelector('#dn4-birth-date').value = data.patient.birthDate || '';
            dn4Container.querySelector('#dn4-compile-date').value = data.patient.compileDate || '';
            dn4Data = { ...dn4Data, ...data.answers };
            Object.keys(dn4Data).forEach(key => {
                if (dn4Data[key] !== null) {
                    const el = dn4Container.querySelector(`[onclick*="${key}"]`);
                    if (el) {
                        el.classList.add('selected');
                        if (dn4Data[key] === 1) {
                            el.classList.add('si');
                        } else {
                            el.classList.add('no');
                        }
                    }
                }
            });
            recomputeQuestionStatusFromState();
            updateProgress();
            calculateScore();
        }
        localStorage.removeItem('dn4_autosave');
    }
});

function switchDN4Mode(e, mode) {
    e.preventDefault();
    dn4Container.querySelectorAll('.mode-btn').forEach(btn => btn.classList.remove('active'));
    e.currentTarget.classList.add('active');
    dn4Container.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
    const target = dn4Container.querySelector(`#${mode}-section`);
    if (target) target.classList.add('active');
}

function selectSimpleAnswer(questionId, value, element) {
    const questionItem = element.closest('.question-item');
    const allOptions = questionItem.querySelectorAll('.answer-option');
    const mainQuestion = questionItem.dataset.question;
    allOptions.forEach(opt => opt.classList.remove('selected', 'si', 'no'));
    element.classList.add('selected');
    dn4Data[questionId] = value === 'si' ? 1 : 0;
    if (value === 'si') {
        element.classList.add('si');
    } else {
        element.classList.add('no');
    }
    questionStatus[mainQuestion] = true;
    questionItem.classList.add('answered');
    updateProgress();
    calculateScore();
}

function selectAnswer(questionId, value, element) {
    const questionItem = element.closest('.question-item');
    const allOptions = questionItem.querySelectorAll('.answer-option');
    const mainQuestion = questionItem.dataset.question;

    if (element.dataset.exclude) {
        const excludeList = element.dataset.exclude.split(',');
        excludeList.forEach(id => {
            dn4Data[id] = 0;
            const opt = dn4Container.querySelector(`[onclick*="${id}"]`);
            if (opt) opt.classList.remove('selected', 'si', 'no');
        });
    } else {
        const noneOption = questionItem.querySelector('[data-exclude]');
        if (noneOption) noneOption.classList.remove('selected', 'si', 'no');
    }

    if (element.classList.contains('selected')) {
        element.classList.remove('selected', 'si', 'no');
        if (dn4Data.hasOwnProperty(questionId)) dn4Data[questionId] = null;
    } else {
        element.classList.add('selected');
        if (value === 'si') {
            element.classList.add('si');
            if (dn4Data.hasOwnProperty(questionId)) dn4Data[questionId] = 1;
        } else {
            element.classList.add('no');
            if (dn4Data.hasOwnProperty(questionId)) dn4Data[questionId] = 0;
        }
    }

    const hasSelection = [...allOptions].some(opt => opt.classList.contains('selected'));
    questionStatus[mainQuestion] = hasSelection;
    if (hasSelection) {
        questionItem.classList.add('answered');
    } else {
        questionItem.classList.remove('answered');
    }
    updateProgress();
    calculateScore();
}

function updateProgress() {
    const totalQuestions = 4;
    let answeredCount = 0;
    for (let key in questionStatus) {
        if (questionStatus[key]) answeredCount++;
    }
    const percentage = (answeredCount / totalQuestions) * 100;
    dn4Container.querySelector('#progress-bar').style.width = percentage + '%';
    dn4Container.querySelector('#progress-text').textContent = `${answeredCount}/${totalQuestions} domande completate`;
}

function calculateScore() {
    const allAnswered = Object.values(questionStatus).every(status => status === true);
    if (allAnswered) {
        let score = 0;
        for (let key in dn4Data) {
            if (dn4Data[key] === 1) score++;
        }
        showResults(score);
    } else {
        dn4Container.querySelector('#dn4-results-section').classList.remove('show');
    }
}

function showResults(score) {
    const resultsSection = dn4Container.querySelector('#dn4-results-section');
    const scoreDisplay = dn4Container.querySelector('#dn4-total-score');
    const interpretation = dn4Container.querySelector('#dn4-score-interpretation');
    const description = dn4Container.querySelector('#dn4-score-description');
    scoreDisplay.textContent = `${score}/10`;
    if (score >= 4) {
        interpretation.textContent = '🚨 Dolore di Origine Neuropatica Molto Probabile';
        description.innerHTML = `<div class="mb-3"><strong>Punteggio ≥ 4/10:</strong> Il dolore presenta caratteristiche suggestive per origine neuropatica.</div>`;
        resultsSection.style.background = 'linear-gradient(135deg, #dc3545, #c82333)';
    } else {
        interpretation.textContent = '✅ Dolore di Origine Neuropatica Improbabile';
        description.innerHTML = `<div class="mb-3"><strong>Punteggio < 4/10:</strong> Il dolore non presenta caratteristiche tipiche del dolore neuropatico.</div>`;
        resultsSection.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
    }
    resultsSection.classList.add('show');
    resultsSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
}

function saveDN4() {
    const patientName = dn4Container.querySelector('#dn4-patient-name').value;
    const birthDate = dn4Container.querySelector('#dn4-birth-date').value;
    const compileDate = dn4Container.querySelector('#dn4-compile-date').value;
    if (!patientName) {
        alert('Inserire il nome del paziente prima di salvare.');
        return;
    }
    const saveData = {
        patient: { name: patientName, birthDate: birthDate, compileDate: compileDate },
        answers: { ...dn4Data },
        score: Object.values(dn4Data).reduce((sum, val) => sum + (val || 0), 0),
        timestamp: new Date().toISOString()
    };
    const saved = JSON.parse(localStorage.getItem('dn4_evaluations') || '[]');
    saved.push(saveData);
    localStorage.setItem('dn4_evaluations', JSON.stringify(saved));
    alert('✅ Valutazione DN4 salvata con successo!');
}

function printDN4() {
    const patientName = dn4Container.querySelector('#dn4-patient-name').value || 'Paziente';
    const birthDate = dn4Container.querySelector('#dn4-birth-date').value || 'Non specificata';
    const compileDate = dn4Container.querySelector('#dn4-compile-date').value || new Date().toISOString().split('T')[0];
    let score = 0;
    for (let key in dn4Data) {
        if (dn4Data[key] !== null) score += dn4Data[key];
    }
    const interpretation = score >= 4 ? 'Dolore di origine neuropatica molto probabile' : 'Dolore di origine neuropatica improbabile';
    let report = `REPORT DN4 - DOULEUR NEUROPATHIQUE 4 QUESTIONS\n===============================================================\n\nDATI PAZIENTE\nPaziente: ${patientName}\nData di nascita: ${birthDate}\nData compilazione: ${compileDate}\n\nPUNTEGGIO TOTALE: ${score}/10\nINTERPRETAZIONE: ${interpretation}\n\nReport generato il: ${new Date().toLocaleString('it-IT')}\n===============================================================`;
    const blob = new Blob([report], { type: 'text/plain;charset=utf-8' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `DN4_Report_${patientName.replace(/\s+/g, '_')}_${compileDate}.txt`;
    link.click();
}

function resetDN4() {
    if (confirm('⚠️ Sei sicuro di voler azzerare la valutazione? Tutti i dati inseriti andranno persi.')) {
        dn4Data = {
            q1a: null, q1b: null, q1c: null,
            q2a: null, q2b: null, q2c: null, q2d: null,
            q3a: null, q3b: null, q4: null
        };
        questionStatus = { q1: false, q2: false, q3: false, q4: false };
        dn4Container.querySelectorAll('.answer-option').forEach(opt => opt.classList.remove('selected', 'si', 'no'));
        dn4Container.querySelectorAll('.question-item').forEach(item => item.classList.remove('answered'));
        dn4Container.querySelector('#dn4-results-section').classList.remove('show');
        dn4Container.querySelector('#dn4-patient-name').value = '';
        dn4Container.querySelector('#dn4-birth-date').value = '';
        dn4Container.querySelector('#dn4-compile-date').value = new Date().toISOString().split('T')[0];
        updateProgress();
        alert('✅ Valutazione azzerata con successo!');
    }
}

setInterval(function() {
    const patientName = dn4Container.querySelector('#dn4-patient-name').value;
    if (patientName && Object.values(dn4Data).some(val => val !== null)) {
        const autoSave = {
            patient: {
                name: patientName,
                birthDate: dn4Container.querySelector('#dn4-birth-date').value,
                compileDate: dn4Container.querySelector('#dn4-compile-date').value
            },
            answers: { ...dn4Data },
            isAutoSave: true,
            timestamp: new Date().toISOString()
        };
        localStorage.setItem('dn4_autosave', JSON.stringify(autoSave));
    }
}, 30000);

function recomputeQuestionStatusFromState() {
    questionStatus = { q1: false, q2: false, q3: false, q4: false };
    dn4Container.querySelectorAll('.question-item').forEach(item => {
        const main = item.dataset.question;
        const hasSel = item.querySelector('.answer-option.selected') !== null;
        if (hasSel) {
            questionStatus[main] = true;
            item.classList.add('answered');
        }
    });
}


function printDN4Template() {
    window.print();
}
