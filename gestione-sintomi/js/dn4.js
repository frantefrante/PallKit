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
});

function switchDN4Mode(mode) {
    if (!dn4Container) return;
    dn4Container.querySelectorAll('.mode-btn').forEach(btn => btn.classList.remove('active'));
    const targetBtn = dn4Container.querySelector(`.mode-btn[data-mode="${mode}"]`);
    if (targetBtn) targetBtn.classList.add('active');
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

function printDN4() {
    const patientName = dn4Container.querySelector('#dn4-patient-name').value || 'Paziente';
    const birthDate = dn4Container.querySelector('#dn4-birth-date').value || 'Non specificata';
    const compileDate = dn4Container.querySelector('#dn4-compile-date').value || new Date().toISOString().split('T')[0];
    let score = 0;
    const answeredQuestions = [];
    
    // Calcola il punteggio e raccoglie le risposte
    for (let key in dn4Data) {
        if (dn4Data[key] !== null) {
            score += dn4Data[key];
            const questionText = getQuestionText(key);
            const answer = dn4Data[key] === 1 ? 'SÌ' : 'NO';
            answeredQuestions.push(`<li><strong>${questionText}:</strong> ${answer}</li>`);
        }
    }
    
    const interpretation = score >= 4 ? 'Dolore di origine neuropatica molto probabile' : 'Dolore di origine neuropatica improbabile';
    const interpretationClass = score >= 4 ? 'positive' : 'negative';
    
    const win = window.open('', '_blank');
    win.document.write(`
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>DN4 - Report Valutazione</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 10mm; line-height: 1.3; color: #333; font-size: 11px; }
        .header { text-align: center; margin-bottom: 15px; border-bottom: 2px solid #ffc107; padding-bottom: 10px; }
        .header h1 { color: #ffc107; margin-bottom: 5px; font-size: 1.4rem; }
        .header h2 { color: #666; font-size: 1rem; margin: 0; }
        .patient-info { border: 1px solid #ffc107; padding: 12px; margin-bottom: 15px; border-radius: 4px; background: #fff3cd; }
        .result-section { margin: 10px 0; padding: 15px; border: 2px solid #ffc107; border-radius: 4px; }
        .score-display { font-size: 2rem; font-weight: bold; text-align: center; margin: 10px 0; }
        .positive { color: #dc3545; }
        .negative { color: #28a745; }
        .interpretation { font-size: 1.1rem; font-weight: bold; text-align: center; margin: 10px 0; }
        .form-row { display: flex; justify-content: space-between; margin-bottom: 8px; }
        .form-field { flex: 1; margin-right: 15px; font-size: 11px; }
        .form-field:last-child { margin-right: 0; }
        ul { margin-top: 8px; padding-left: 15px; }
        ul li { margin-bottom: 3px; font-size: 10px; line-height: 1.2; }
        h4 { font-size: 12px; margin: 10px 0 8px 0; }
        .footer { margin-top: 20px; padding-top: 10px; border-top: 1px solid #ddd; font-size: 10px; color: #666; text-align: center; }
        .reference { margin-top: 15px; padding: 10px; background: #f8f9fa; border-left: 3px solid #ffc107; font-size: 9px; }
        .compact-section { margin: 8px 0; padding: 10px; background: #f8f9fa; border-radius: 4px; }
        @media print { 
            body { margin: 12mm; font-size: 10px; } 
            .header h1 { font-size: 1.3rem; }
            .score-display { font-size: 1.8rem; }
            .interpretation { font-size: 1rem; }
            ul li { font-size: 9px; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DN4 - Douleur Neuropathique 4 Questions</h1>
        <h2>Report di Valutazione</h2>
    </div>
    
    <div class="patient-info">
        <div class="form-row">
            <div class="form-field"><strong>Paziente:</strong> ${patientName}</div>
            <div class="form-field"><strong>Data di nascita:</strong> ${birthDate}</div>
        </div>
        <div class="form-row">
            <div class="form-field"><strong>Data valutazione:</strong> ${compileDate}</div>
        </div>
    </div>
    
    <div class="result-section">
        <div class="score-display ${interpretationClass}">${score}/10</div>
        <div class="interpretation ${interpretationClass}">${interpretation}</div>
        
        <div class="compact-section">
            <strong>Dettaglio Risposte:</strong>
            <ul>${answeredQuestions.join('')}</ul>
        </div>
        
        <div class="compact-section">
            <strong>Interpretazione:</strong> ≥ 4/10 = Neuropatico probabile | &lt; 4/10 = Improbabile<br>
            <strong>Performance:</strong> Sensibilità 82.9% | Specificità 89.9%
        </div>
    </div>
    
    <div class="reference">
        <strong>Riferimento:</strong> Bouhassira D, et al. Comparison of pain syndromes associated with nervous or somatic lesions and development of a new neuropathic pain diagnostic questionnaire (DN4). Pain 2005; 114: 29-36.
    </div>
    
    <div class="footer">
        <p>Report generato il: ${new Date().toLocaleString('it-IT')}</p>
        <p>PallKit - Strumenti per le Cure Palliative</p>
    </div>
</body>
</html>`);
    win.document.close();
    win.focus();
    win.onload = function(){ win.print(); };
}

function getQuestionText(key) {
    const questions = {
        'q1a': '1a. Il dolore presenta una o più delle seguenti caratteristiche? - Bruciore',
        'q1b': '1b. Il dolore presenta una o più delle seguenti caratteristiche? - Sensazione di freddo doloroso',
        'q1c': '1c. Il dolore presenta una o più delle seguenti caratteristiche? - Scosse elettriche',
        'q2a': '2a. Il dolore è associato a uno o più dei seguenti sintomi nella stessa area? - Formicolio',
        'q2b': '2b. Il dolore è associato a uno o più dei seguenti sintomi nella stessa area? - Punture di spilli e aghi',
        'q2c': '2c. Il dolore è associato a uno o più dei seguenti sintomi nella stessa area? - Intorpidimento',
        'q2d': '2d. Il dolore è associato a uno o più dei seguenti sintomi nella stessa area? - Prurito',
        'q3a': '3a. Il dolore è localizzato in un\'area dove l\'esame fisico può rivelare una o più delle seguenti caratteristiche? - Ipoestesia al tatto',
        'q3b': '3b. Il dolore è localizzato in un\'area dove l\'esame fisico può rivelare una o più delle seguenti caratteristiche? - Ipoestesia alla puntura di spillo',
        'q4': '4. Il dolore può essere causato o aumentato da un leggero sfioramento nell\'area dolorosa?'
    };
    return questions[key] || key;
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

function printDN4Template() {
    if (!dn4Container) return;
    const template = dn4Container.querySelector('#visualize-section .template-section');
    if (!template) return;
    
    const win = window.open('', '_blank');
    win.document.write(`
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>DN4 - Template di Valutazione</title>
    <style>
        /* CSS ottimizzato per stampa A4 */
        @page { 
            size: A4; 
            margin: 15mm; 
        }
        
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }
        
        .template-section {
            background: white;
            padding: 15px;
            margin: 0;
        }
        
        .template-header {
            text-align: center;
            border-bottom: 2px solid #ffc107;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        .template-header h2 {
            color: #ffc107;
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .template-header p {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
        }
        
        .patient-data {
            border: 1px solid #ffc107;
            padding: 12px;
            margin-bottom: 15px;
            background: #fff3cd;
        }
        
        .patient-data h4 {
            color: #ffc107;
            font-size: 16px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        
        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        
        .form-field {
            flex: 1;
            margin-right: 15px;
        }
        
        .form-field:last-child {
            margin-right: 0;
        }
        
        .form-field label {
            font-weight: bold;
            font-size: 11px;
            color: #555;
        }
        
        .form-field input {
            border-bottom: 1px solid #333;
            border-top: none;
            border-left: none;
            border-right: none;
            background: transparent;
            width: 100%;
            font-size: 12px;
            padding: 2px 0;
        }
        
        .question-section {
            margin-bottom: 20px;
        }
        
        .question-section h4 {
            color: #ffc107;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 12px;
            border-bottom: 1px solid #ffc107;
            padding-bottom: 5px;
        }
        
        .question-item {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 8px;
        }
        
        .question-text {
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 12px;
        }
        
        .answer-options {
            display: flex;
            gap: 20px;
        }
        
        .answer-option {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
        }
        
        .answer-option input[type="radio"] {
            margin: 0;
        }
        
        .scoring-info {
            border: 2px solid #ffc107;
            padding: 15px;
            margin-top: 20px;
            background: #fff3cd;
        }
        
        .scoring-info h4 {
            color: #ffc107;
            font-size: 16px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        
        .scoring-info ul {
            margin: 8px 0;
            padding-left: 20px;
        }
        
        .scoring-info li {
            margin-bottom: 4px;
            font-size: 12px;
        }
        
        .reference {
            margin-top: 15px;
            padding: 10px;
            background: #f8f9fa;
            border-left: 3px solid #ffc107;
            font-size: 10px;
            color: #666;
        }
        
        /* Nascondi elementi non necessari per stampa */
        .action-buttons, 
        .mode-selector,
        .btn,
        button {
            display: none !important;
        }
        
        /* Forza dimensioni normali per icone Font Awesome */
        i, .fas, .far, .fab, .fal, .fad {
            font-size: 12px !important;
        }
        
        /* Override per classi specifiche che potrebbero avere dimensioni grandi */
        .fa-print, .fa-redo, .fa-question-circle, .fa-info-circle {
            font-size: 12px !important;
        }
        
        /* Evita interruzioni di pagina inappropriate */
        .question-section {
            page-break-inside: avoid;
        }
        
        .scoring-info {
            page-break-before: avoid;
        }
        
        /* Ottimizzazioni per stampa */
        @media print {
            body {
                font-size: 11px;
            }
            
            .template-header h2 {
                font-size: 20px;
            }
            
            .question-section h4 {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    ${template.innerHTML}
</body>
</html>`);
    win.document.close();
    win.focus();
    win.onload = function(){ win.print(); };
}
