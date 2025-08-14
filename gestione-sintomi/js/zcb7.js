let zcb7Responses = {};

document.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toISOString().split('T')[0];
    const zcb7Date = document.getElementById('zcb7-date');
    if (zcb7Date && !zcb7Date.value) zcb7Date.value = today;
});

function switchZCB7Mode(mode) {
    document.querySelectorAll('#zcb7-home .content-section').forEach(section => {
        section.classList.remove('active');
    });
    document.querySelectorAll('#zcb7-home .mode-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    document.getElementById(`zcb7-${mode}-section`).classList.add('active');
    const target = document.querySelector(`#zcb7-home .mode-btn[href="#"]`);
    const buttons = document.querySelectorAll('#zcb7-home .mode-btn');
    buttons.forEach(btn => {
        if (btn.textContent.toLowerCase().includes(mode === 'compile' ? 'compila' : mode === 'visualizza' ? 'visualizza' : 'glossario')) {
            btn.classList.add('active');
        }
    });
}

function selectZCB7Option(question, value, element) {
    const group = element.closest('.radio-group');
    group.querySelectorAll('.radio-option').forEach(opt => opt.classList.remove('selected'));
    element.classList.add('selected');
    element.querySelector('input[type="radio"]').checked = true;
    zcb7Responses[question] = parseInt(value);
    updateZCB7Progress();
    if (Object.keys(zcb7Responses).length === 7) {
        calculateZCB7Score();
    }
}

function updateZCB7Progress() {
    const completed = Object.keys(zcb7Responses).length;
    const total = 7;
    const percentage = (completed / total) * 100;
    document.getElementById('zcb7-progress').style.width = percentage + '%';
    document.getElementById('zcb7-progress-text').textContent = `${completed} di ${total} domande completate`;
}

function calculateZCB7Score() {
    const totalScore = Object.values(zcb7Responses).reduce((sum, score) => sum + score, 0);
    document.getElementById('zcb7-score').textContent = totalScore + '/28';
    let interpretationText, descriptionText;
    if (totalScore <= 10) {
        interpretationText = 'Burden Lieve';
        descriptionText = 'Il caregiver mostra un carico assistenziale contenuto. Monitorare nel tempo e fornire supporto preventivo.';
    } else if (totalScore <= 18) {
        interpretationText = 'Burden Moderato';
        descriptionText = 'Il caregiver presenta un carico assistenziale significativo. Valutare interventi di supporto mirati.';
    } else {
        interpretationText = 'Burden Elevato';
        descriptionText = 'Il caregiver mostra un carico assistenziale importante. Necessari interventi di supporto intensivi e multidisciplinari.';
    }
    document.getElementById('zcb7-interpretation').textContent = interpretationText;
    document.getElementById('zcb7-description').textContent = descriptionText;
    document.getElementById('zcb7-results').classList.add('show');
}

function saveZCB7() {
    if (Object.keys(zcb7Responses).length !== 7) {
        alert('Completa tutte le domande prima di salvare.');
        return;
    }
    printZCB7();
}

function printZCB7() {
    if (Object.keys(zcb7Responses).length !== 7) {
        alert('Completa tutte le domande prima di stampare.');
        return;
    }
    const totalScore = Object.values(zcb7Responses).reduce((sum, s) => sum + s, 0);
    const caregiverName = document.getElementById('zcb7-caregiver-name').value || 'Non specificato';
    const patientName = document.getElementById('zcb7-patient-name').value || 'Non specificato';
    const date = document.getElementById('zcb7-date').value || new Date().toISOString().split('T')[0];
    const questions = [
        'Tempo per sé',
        'Pressione responsabilità',
        'Influenza relazioni',
        'Tensione con paziente',
        'Incertezza come aiutare',
        'Perdita controllo vita',
        'Sovraccarico globale'
    ];
    let report = `REPORT ZCB-7 - ZARIT CAREGIVER BURDEN\n`;
    report += `========================================\n\n`;
    report += `Caregiver: ${caregiverName}\n`;
    report += `Paziente: ${patientName}\n`;
    report += `Data: ${date}\n\n`;
    report += `PUNTEGGIO TOTALE: ${totalScore}/28\n\n`;
    report += `DETTAGLIO RISPOSTE:\n`;
    questions.forEach((q, i) => {
        report += `${i + 1}. ${q}: ${zcb7Responses[`q${i + 1}`]}/4\n`;
    });
    report += `\nINTERPRETAZIONE:\n`;
    if (totalScore <= 10) {
        report += 'Burden Lieve - Carico assistenziale contenuto\n';
    } else if (totalScore <= 18) {
        report += 'Burden Moderato - Carico assistenziale significativo\n';
    } else {
        report += 'Burden Elevato - Carico assistenziale importante\n';
    }
    const blob = new Blob([report], { type: 'text/plain;charset=utf-8' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `ZCB7_Report_${caregiverName.replace(/\s+/g, '_')}_${date}.txt`;
    link.click();
}

function printZCB7Template() {
    window.print();
}

function resetZCB7() {
    if (!confirm('Sei sicuro di voler resettare tutte le risposte?')) return;
    zcb7Responses = {};
    document.querySelectorAll('#zcb7-home .radio-option').forEach(opt => opt.classList.remove('selected'));
    document.querySelectorAll('#zcb7-home input[type="radio"]').forEach(input => input.checked = false);
    document.getElementById('zcb7-progress').style.width = '0%';
    document.getElementById('zcb7-progress-text').textContent = '0 di 7 domande completate';
    document.getElementById('zcb7-results').classList.remove('show');
    document.getElementById('zcb7-caregiver-name').value = '';
    document.getElementById('zcb7-patient-name').value = '';
}
