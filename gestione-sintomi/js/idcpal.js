const complexityData = {
    sections: [
        {
            id: 'patient',
            title: 'Elementi dipendenti dal paziente',
            color: '#28a745',
            subsections: [
                {
                    id: 'context',
                    title: '1.1 - Contesto',
                    items: [
                        {code: '1.1a', text: 'Il paziente è un bambino o un adolescente', level: 'AC', description: 'Si considera il periodo di vita dalla nascita fino ai 18 anni.'},
                        {code: '1.1b', text: 'Il paziente è un professionista sanitario', level: 'C', description: 'Essere un professionista sanitario complica l\'assistenza o il processo decisionale.'},
                        {code: '1.1c', text: 'Ruolo socio-familiare svolto dal paziente', level: 'C', description: 'Il paziente ha un ruolo chiave nel contesto familiare o sociale.'},
                        {code: '1.1d', text: 'Il paziente ha una disabilità fisica, mentale o sensoriale precedente', level: 'C', description: 'Disabilità preesistente che rende difficile comunicare o assistere.'},
                        {code: '1.1e', text: 'Il paziente ha problemi di dipendenza, recenti e/o in atto', level: 'C', description: 'Presenza attuale o recente di dipendenze che ostacolano l\'assistenza.'},
                        {code: '1.1f', text: 'Disturbi mentali preesistenti', level: 'C', description: 'Disturbi mentali pregressi che complicano la situazione.'}
                    ]
                },
                {
                    id: 'clinical',
                    title: '1.2 - Condizione clinica',
                    items: [
                        {code: '1.2a', text: 'Sintomi di difficile controllo', level: 'AC', description: 'Sintomi che richiedono interventi terapeutici complessi.'},
                        {code: '1.2b', text: 'Sintomi refrattari', level: 'AC', description: 'Sintomi non controllabili senza ridurre la coscienza.'},
                        {code: '1.2c', text: 'Condizioni di urgenza in paziente oncologico in fase terminale', level: 'AC', description: 'Urgenze in fase terminale oncologica.'},
                        {code: '1.2d', text: 'Condizione di fine vita di difficile controllo', level: 'AC', description: 'Sintomi fisici o emotivi mal controllati nella fase finale.'},
                        {code: '1.2e', text: 'Condizioni cliniche secondarie a progressione neoplastica di difficile gestione', level: 'AC', description: 'Complicazioni neoplastiche gravi.'},
                        {code: '1.2f', text: 'Scompenso acuto in insufficienza d\'organo in paziente non oncologico in fase terminale', level: 'C', description: 'Scompenso grave in insufficienze croniche non oncologiche terminali.'},
                        {code: '1.2g', text: 'Grave disturbo cognitivo', level: 'C', description: 'Delirio, demenza o disturbi cognitivi difficili da controllare.'},
                        {code: '1.2h', text: 'Improvviso cambiamento del livello di autonomia funzionale', level: 'C', description: 'Calo improvviso dell\'autonomia funzionale.'},
                        {code: '1.2i', text: 'Esistenza di comorbidità di difficile controllo', level: 'C', description: 'Comorbidità complesse oltre alla malattia principale.'},
                        {code: '1.2j', text: 'Sindrome cachessia-anoressia grave', level: 'C', description: 'Presenza di cachessia: astenia, grave calo ponderale, anoressia.'},
                        {code: '1.2k', text: 'Gestione clinica difficile per scarsa o assente aderenza terapeutica', level: 'C', description: 'Mancanza di aderenza terapeutica che ostacola la gestione clinica.'}
                    ]
                },
                {
                    id: 'psycho',
                    title: '1.3 - Condizione psico-emotiva',
                    items: [
                        {code: '1.3a', text: 'Il paziente presenta un rischio di suicidio', level: 'AC', description: 'Rischio di suicidio: tentativi passati o pensieri espressi.'},
                        {code: '1.3b', text: 'Il paziente richiede di accelerare o anticipare il processo di morte', level: 'AC', description: 'Richieste esplicite del paziente di anticipare la morte.'},
                        {code: '1.3c', text: 'Il paziente presenta angoscia esistenziale e/o sofferenza spirituale', level: 'AC', description: 'Angoscia legata alla morte o sofferenza spirituale.'},
                        {code: '1.3d', text: 'Contrasti nella comunicazione tra paziente e famiglia', level: 'C', description: 'Problemi di comunicazione tra paziente e familiari.'},
                        {code: '1.3e', text: 'Contrasti nella comunicazione tra paziente e equipe terapeutica', level: 'C', description: 'Problemi di comunicazione tra paziente ed equipe terapeutica.'},
                        {code: '1.3f', text: 'Il paziente presenta gravi e persistenti difficoltà nell\'adattamento emotivo', level: 'C', description: 'Adattamento emotivo compromesso.'}
                    ]
                }
            ]
        },
        {
            id: 'family',
            title: 'Elementi dipendenti dalla famiglia e dall\'ambiente',
            color: '#dc3545',
            subsections: [
                {
                    id: 'family_env',
                    title: '2 - Famiglia e ambiente',
                    items: [
                        {code: '2.a', text: 'Assenza o insufficienza del supporto familiare e/o del caregiver', level: 'AC', description: 'Assenza o inadeguatezza del caregiver principale.'},
                        {code: '2.b', text: 'Famiglia e/o caregiver non competenti per l\'assistenza', level: 'AC', description: 'Caregiver non competenti per ragioni emotive, fisiche o culturali.'},
                        {code: '2.c', text: 'Famiglia disfunzionale', level: 'AC', description: 'Famiglia con conflitti gravi.'},
                        {code: '2.d', text: 'Famiglia non più in grado di rispondere ai bisogni del paziente', level: 'AC', description: 'Famiglia esaurita emotivamente e incapace di sostenere il carico assistenziale.'},
                        {code: '2.e', text: 'Problemi relativi al lutto', level: 'C', description: 'Lutto anticipatorio, lutti irrisolti o rischio di lutto complicato nei familiari.'},
                        {code: '2.f', text: 'Limitazioni strutturali dell\'ambiente', level: 'AC', description: 'Barriere strutturali all\'assistenza: abitazione inadeguata, distanza, ostacoli fisici.'}
                    ]
                }
            ]
        },
        {
            id: 'organization',
            title: 'Elementi che dipendono dall\'organizzazione sanitaria',
            color: '#007bff',
            subsections: [
                {
                    id: 'professionals',
                    title: '3.1 - Professionisti e team',
                    items: [
                        {code: '3.1a', text: 'Sedazione palliativa di difficile gestione', level: 'AC', description: 'Sedazione difficile da gestire: farmaci non standard, dosi elevate, problemi emotivi.'},
                        {code: '3.1b', text: 'Difficile gestione farmacologica', level: 'C', description: 'Gestione complessa degli oppioidi o altri farmaci non convenzionali.'},
                        {code: '3.1c', text: 'Difficile gestione degli interventi', level: 'C', description: 'Difficoltà nella gestione di procedure palliative o tecniche invasive.'},
                        {code: '3.1d', text: 'Limiti nella competenza professionale per affrontare la situazione', level: 'C', description: 'Carenze di competenze palliative, conflitti tra operatori, carico emotivo o etico.'}
                    ]
                },
                {
                    id: 'resources',
                    title: '3.2 - Risorse',
                    items: [
                        {code: '3.2a', text: 'Difficoltà nella gestione di tecniche strumentali e/o materiale specifico a domicilio', level: 'C', description: 'Difficoltà nell\'uso di presidi: pompe, ossigeno, ventilazione, dispositivi complessi.'},
                        {code: '3.2b', text: 'Difficoltà nel coordinamento o nella logistica dell\'assistenza', level: 'C', description: 'Problemi logistici o di coordinamento tra professionisti o con strutture esterne.'}
                    ]
                }
            ]
        }
    ]
};

let selectedItems = new Set();
let currentCounts = { C: 0, AC: 0 };
let manualClassification = false;

function openComplexityModal(tab = 'compile') {
    document.getElementById('complexity-modal').style.display = 'block';
    document.body.style.overflow = 'hidden';
    showComplexityTab(tab);
    if (tab === 'compile') {
        initializeCompileForm();
    }
}

function closeComplexityModal() {
    document.getElementById('complexity-modal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function showComplexityTab(tabName) {
    document.querySelectorAll('.complexity-tab').forEach(tab => tab.classList.remove('active'));
    document.querySelector(`[onclick="showComplexityTab('${tabName}')"]`).classList.add('active');
    document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
    document.getElementById(`${tabName}-tab`).classList.add('active');
}

function initializeCompileForm() {
    const sectionsContainer = document.getElementById('complexity-sections');
    sectionsContainer.innerHTML = '';
    document.getElementById('compilation-date').value = new Date().toISOString().split('T')[0];

    complexityData.sections.forEach(section => {
        const sectionDiv = document.createElement('div');
        sectionDiv.className = 'complexity-section';
        sectionDiv.innerHTML = `
            <div class="section-header" style="background: linear-gradient(135deg, ${section.color}, ${adjustColor(section.color, -20)});">
                <i class="fas fa-${getSectionIcon(section.id)} me-2"></i>${section.title}
            </div>
            <div class="section-content">
                ${section.subsections.map(subsection => `
                    <h6 class="text-muted mb-3">${subsection.title}</h6>
                    ${subsection.items.map(item => `
                        <div class="complexity-item" data-code="${item.code}">
                            <input type="checkbox" class="form-check-input item-checkbox" id="item-${item.code}" onchange="toggleItem('${item.code}', '${item.level}')">
                            <div class="item-content">
                                <div class="item-code">${item.code}</div>
                                <div class="item-text">${item.text}</div>
                                <span class="item-badge badge-${item.level.toLowerCase()}">${item.level}</span>
                            </div>
                        </div>
                    `).join('')}
                `).join('')}
            </div>
        `;
        sectionsContainer.appendChild(sectionDiv);
    });

    document.querySelectorAll('.classification-option').forEach(option => {
        option.addEventListener('click', function() {
            manualClassification = true;
            document.querySelectorAll('.classification-option').forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            this.querySelector('input').checked = true;
        });
    });
}

function toggleItem(code, level) {
    const checkbox = document.getElementById(`item-${code}`);
    const itemDiv = checkbox.closest('.complexity-item');
    if (checkbox.checked) {
        selectedItems.add(code);
        itemDiv.classList.add('selected');
        currentCounts[level]++;
    } else {
        selectedItems.delete(code);
        itemDiv.classList.remove('selected');
        currentCounts[level]--;
    }
    updateCounts();
    if (!manualClassification) {
        updateAutomaticClassification();
    }
}

function updateCounts() {
    document.getElementById('count-c').textContent = `${currentCounts.C} C`;
    document.getElementById('count-ac').textContent = `${currentCounts.AC} AC`;
}

function updateAutomaticClassification() {
    const classificationOptions = document.querySelectorAll('.classification-option');
    classificationOptions.forEach(option => {
        option.classList.remove('selected');
        option.querySelector('input').checked = false;
    });

    let targetValue;
    if (currentCounts.AC > 0) targetValue = 'altamente-complessa';
    else if (currentCounts.C > 0) targetValue = 'complessa';
    else targetValue = 'non-complessa';

    const targetOption = document.querySelector(`[data-value="${targetValue}"]`);
    if (targetOption) {
        targetOption.classList.add('selected');
        targetOption.querySelector('input').checked = true;
    }
}

function generateComplexityReport() {
    const patientName = document.getElementById('patient-name').value || 'Paziente';
    const patientBirth = document.getElementById('patient-birth').value;
    const compilationDate = document.getElementById('compilation-date').value;
    const classification = document.querySelector('input[name="classification"]:checked')?.value || 'Non specificata';

    const selectedItemsList = Array.from(selectedItems).map(code => {
        let item = null;
        complexityData.sections.forEach(section => {
            section.subsections.forEach(subsection => {
                const found = subsection.items.find(i => i.code === code);
                if (found) item = found;
            });
        });
        return item;
    }).filter(Boolean);

    const reportContent = `
REPORT IDC-PAL - VALUTAZIONE COMPLESSITÀ
=====================================

DATI PAZIENTE:
- Nome: ${patientName}
- Data di nascita: ${patientBirth || 'Non specificata'}
- Data compilazione: ${compilationDate}

ELEMENTI SELEZIONATI:
${selectedItemsList.map(item => `- ${item.code}: ${item.text} (${item.level})`).join('\n')}

RIEPILOGO:
- Elementi di Complessità (C): ${currentCounts.C}
- Elementi di Alta Complessità (AC): ${currentCounts.AC}
- Totale elementi selezionati: ${selectedItems.size}

CLASSIFICAZIONE FINALE: ${classification.toUpperCase()}

Data del report: ${new Date().toLocaleDateString('it-IT')}
`;

    const blob = new Blob([reportContent], { type: 'text/plain;charset=utf-8' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `IDC-PAL_${patientName}_${compilationDate || new Date().toISOString().split('T')[0]}.txt`;
    link.click();
}

function resetComplexityForm() {
    if (confirm('Sei sicuro di voler azzerare tutti i dati inseriti?')) {
        selectedItems.clear();
        currentCounts = { C: 0, AC: 0 };
        manualClassification = false;
        document.querySelectorAll('.complexity-item').forEach(item => {
            item.classList.remove('selected');
            item.querySelector('input').checked = false;
        });
        document.querySelectorAll('.classification-option').forEach(option => {
            option.classList.remove('selected');
            option.querySelector('input').checked = false;
        });
        document.getElementById('patient-name').value = '';
        document.getElementById('patient-birth').value = '';
        document.getElementById('compilation-date').value = new Date().toISOString().split('T')[0];
        updateCounts();
    }
}

function getSectionIcon(sectionId) {
    const icons = { 'patient': 'user', 'family': 'home', 'organization': 'hospital' };
    return icons[sectionId] || 'circle';
}

function adjustColor(color, amount) {
    const usePound = color[0] === '#';
    const col = usePound ? color.slice(1) : color;
    const num = parseInt(col, 16);
    let r = (num >> 16) + amount;
    let g = ((num >> 8) & 0x00FF) + amount;
    let b = (num & 0x0000FF) + amount;
    r = r > 255 ? 255 : r < 0 ? 0 : r;
    g = g > 255 ? 255 : g < 0 ? 0 : g;
    b = b > 255 ? 255 : b < 0 ? 0 : b;
    return (usePound ? '#' : '') + (r << 16 | g << 8 | b).toString(16).padStart(6, '0');
}

window.onclick = function(event) {
    const modal = document.getElementById('complexity-modal');
    if (event.target === modal) closeComplexityModal();
};

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') closeComplexityModal();
});

document.addEventListener('DOMContentLoaded', function() {
    console.log('IDC-PAL Complexity Tool initialized');
});
