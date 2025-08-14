let famcare2Responses = {};

document.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toISOString().split('T')[0];
    const famcare2Date = document.getElementById('famcare2-date');
    if (famcare2Date && !famcare2Date.value) famcare2Date.value = today;
});

function switchFAMCARE2Mode(mode) {
    document.querySelectorAll('#famcare2-home .content-section').forEach(section => {
        section.classList.remove('active');
    });
    document.querySelectorAll('#famcare2-home .mode-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    document.getElementById(`famcare2-${mode}-section`).classList.add('active');
    const buttons = document.querySelectorAll('#famcare2-home .mode-btn');
    buttons.forEach(btn => {
        if (btn.textContent.toLowerCase().includes(mode === 'compile' ? 'compila' : mode === 'visualizza' ? 'visualizza' : 'glossario')) {
            btn.classList.add('active');
        }
    });
}

function selectFAMCARE2Option(question, value, element) {
    const scale = element.closest('.likert-scale');
    scale.querySelectorAll('.likert-option').forEach(opt => opt.classList.remove('selected'));
    element.classList.add('selected');
    famcare2Responses[question] = parseInt(value);
    updateFAMCARE2Progress();
    if (Object.keys(famcare2Responses).length === 17) {
        calculateFAMCARE2Score();
    }
}

function updateFAMCARE2Progress() {
    const completed = Object.keys(famcare2Responses).length;
    const total = 17;
    const percentage = (completed / total) * 100;
    document.getElementById('famcare2-progress').style.width = percentage + '%';
    document.getElementById('famcare2-progress-text').textContent = `${completed} di ${total} domande completate`;
}

function calculateFAMCARE2Score() {
    const totalScore = Object.values(famcare2Responses).reduce((sum, score) => sum + score, 0);
    const domain1 = ['q1','q2','q3','q4'].map(q => famcare2Responses[q]).reduce((s, v) => s + v, 0) / 4;
    const domain2 = ['q5','q6','q7','q8'].map(q => famcare2Responses[q]).reduce((s, v) => s + v, 0) / 4;
    const domain3 = ['q9','q10','q11','q12'].map(q => famcare2Responses[q]).reduce((s, v) => s + v, 0) / 4;
    const domain4 = ['q13','q14','q15','q16','q17'].map(q => famcare2Responses[q]).reduce((s, v) => s + v, 0) / 5;
    document.getElementById('famcare2-score').textContent = totalScore + '/85';
    document.getElementById('domain1-score').textContent = domain1.toFixed(1);
    document.getElementById('domain2-score').textContent = domain2.toFixed(1);
    document.getElementById('domain3-score').textContent = domain3.toFixed(1);
    document.getElementById('domain4-score').textContent = domain4.toFixed(1);
    document.getElementById('famcare2-domain-scores').style.display = 'block';
    const averageScore = totalScore / 17;
    let interpretationText, descriptionText;
    if (averageScore >= 4.5) {
        interpretationText = 'Soddisfazione Elevata';
        descriptionText = 'La famiglia esprime un alto livello di soddisfazione per le cure ricevute. Mantenere gli standard qualitativi.';
    } else if (averageScore >= 3.5) {
        interpretationText = 'Soddisfazione Buona';
        descriptionText = 'La famiglia è generalmente soddisfatta delle cure. Identificare aree di possibile miglioramento.';
    } else if (averageScore >= 2.5) {
        interpretationText = 'Soddisfazione Moderata';
        descriptionText = 'La famiglia mostra una soddisfazione parziale. Necessario approfondire le criticità e implementare miglioramenti.';
    } else {
        interpretationText = 'Soddisfazione Limitata';
        descriptionText = 'La famiglia esprime insoddisfazione significativa. Richiede interventi immediati e revisione dell\'approccio assistenziale.';
    }
    document.getElementById('famcare2-interpretation').textContent = interpretationText;
    document.getElementById('famcare2-description').textContent = descriptionText;
    document.getElementById('famcare2-results').classList.add('show');
}

function saveFAMCARE2() {
    if (Object.keys(famcare2Responses).length !== 17) {
        alert('Completa tutte le domande prima di salvare.');
        return;
    }
    const data = {
        familyName: document.getElementById('famcare2-family-name').value,
        patientName: document.getElementById('famcare2-patient-name').value,
        relationship: document.getElementById('famcare2-relationship').value,
        setting: document.getElementById('famcare2-setting').value,
        date: document.getElementById('famcare2-date').value,
        responses: famcare2Responses,
        totalScore: Object.values(famcare2Responses).reduce((sum, score) => sum + score, 0),
        timestamp: new Date().toISOString()
    };
    const saved = JSON.parse(localStorage.getItem('famcare2_assessments') || '[]');
    saved.push(data);
    localStorage.setItem('famcare2_assessments', JSON.stringify(saved));
    alert('Valutazione FAMCARE-2 salvata con successo!');
}

function printFAMCARE2() {
    if (Object.keys(famcare2Responses).length !== 17) {
        alert('Completa tutte le domande prima di stampare.');
        return;
    }
    const totalScore = Object.values(famcare2Responses).reduce((sum, score) => sum + score, 0);
    const familyName = document.getElementById('famcare2-family-name').value || 'Non specificato';
    const patientName = document.getElementById('famcare2-patient-name').value || 'Non specificato';
    const relationship = document.getElementById('famcare2-relationship').value || 'Non specificata';
    const setting = document.getElementById('famcare2-setting').value || 'Non specificato';
    const date = document.getElementById('famcare2-date').value || new Date().toISOString().split('T')[0];
    const domain1 = ['q1','q2','q3','q4'].map(q => famcare2Responses[q]).reduce((s, v) => s + v, 0) / 4;
    const domain2 = ['q5','q6','q7','q8'].map(q => famcare2Responses[q]).reduce((s, v) => s + v, 0) / 4;
    const domain3 = ['q9','q10','q11','q12'].map(q => famcare2Responses[q]).reduce((s, v) => s + v, 0) / 4;
    const domain4 = ['q13','q14','q15','q16','q17'].map(q => famcare2Responses[q]).reduce((s, v) => s + v, 0) / 5;
    let report = `REPORT FAMCARE-2 - FAMILY SATISFACTION WITH CARE\n`;
    report += `==============================================\n\n`;
    report += `Familiare: ${familyName}\n`;
    report += `Paziente: ${patientName}\n`;
    report += `Relazione: ${relationship}\n`;
    report += `Setting: ${setting}\n`;
    report += `Data: ${date}\n\n`;
    report += `PUNTEGGIO TOTALE: ${totalScore}/85 (Media: ${(totalScore/17).toFixed(1)}/5)\n\n`;
    report += `PUNTEGGI PER DOMINIO:\n`;
    report += `1. Informazione e Comunicazione: ${domain1.toFixed(1)}/5\n`;
    report += `2. Disponibilità del Team: ${domain2.toFixed(1)}/5\n`;
    report += `3. Gestione Sintomi Fisici: ${domain3.toFixed(1)}/5\n`;
    report += `4. Supporto Psicosociale: ${domain4.toFixed(1)}/5\n\n`;
    const questions = [
        'Velocità risposta domande', 'Informazioni condizione', 'Chiarezza informazioni', 'Sincerità informazioni',
        'Disponibilità medico', 'Disponibilità infermieri', 'Frequenza visite', 'Coordinazione cure',
        'Controllo dolore', 'Controllo altri sintomi', 'Gestione effetti collaterali', 'Velocità gestione sintomi',
        'Supporto emotivo paziente', 'Supporto emotivo famiglia', 'Coinvolgimento decisioni', 'Bisogni spirituali', 'Soddisfazione globale'
    ];
    report += `DETTAGLIO RISPOSTE:\n`;
    questions.forEach((q, i) => {
        report += `${i + 1}. ${q}: ${famcare2Responses[`q${i + 1}`]}/5\n`;
    });
    report += `\nINTERPRETAZIONE:\n`;
    const averageScore = totalScore / 17;
    if (averageScore >= 4.5) {
        report += 'Soddisfazione Elevata - Alto livello di soddisfazione\n';
    } else if (averageScore >= 3.5) {
        report += 'Soddisfazione Buona - Generalmente soddisfatti\n';
    } else if (averageScore >= 2.5) {
        report += 'Soddisfazione Moderata - Soddisfazione parziale\n';
    } else {
        report += 'Soddisfazione Limitata - Insoddisfazione significativa\n';
    }
    const blob = new Blob([report], { type: 'text/plain;charset=utf-8' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `FAMCARE2_Report_${familyName.replace(/\s+/g, '_')}_${date}.txt`;
    link.click();
}

function printFAMCARE2Template() {
    window.print();
}

function resetFAMCARE2() {
    if (!confirm('Sei sicuro di voler resettare tutte le risposte?')) return;
    famcare2Responses = {};
    document.querySelectorAll('#famcare2-home .likert-option').forEach(opt => opt.classList.remove('selected'));
    document.getElementById('famcare2-progress').style.width = '0%';
    document.getElementById('famcare2-progress-text').textContent = '0 di 17 domande completate';
    document.getElementById('famcare2-results').classList.remove('show');
    document.getElementById('famcare2-domain-scores').style.display = 'none';
    document.getElementById('famcare2-family-name').value = '';
    document.getElementById('famcare2-patient-name').value = '';
    document.getElementById('famcare2-relationship').value = '';
    document.getElementById('famcare2-setting').value = '';
}
