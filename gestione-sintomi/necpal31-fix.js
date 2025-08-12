// ===============================================
// NECPAL 3.1 - FIX DEFINITIVO AUTONOMO
// ===============================================

console.log('🔥 NECPAL FIX CARICATO - necpal31-fix.js');

// Crea dati propri se non esistono
if (!window.necpal31Data) {
    window.necpal31Data = {
        surprise: null,
        items: [],
        patientInfo: {},
        richiestaBisogni: 0,
        indicatoriGenerali: 0,
        indicatoriSpecifici: 0
    };
    console.log('📦 necpal31Data creato dal fix');
}

// Attendi che il DOM sia pronto
document.addEventListener('DOMContentLoaded', function() {
    console.log('📋 Inizializzazione fix NECPAL 3.1...');
    
    // Aspetta un po' per essere sicuri che tutto sia caricato
    setTimeout(function() {
        initNecpalFix();
    }, 500);
});

function initNecpalFix() {
    console.log('🛠️ Applicazione fix NECPAL 3.1...');
    
    // Override funzione updateResults
    window.updateResults = function() {
        console.log('🔥 updateResults() - VERSIONE FIX');
        console.log('🔍 Surprise attuale:', window.necpal31Data.surprise);
        console.log('🔍 Items attuali:', window.necpal31Data.items);
        
        if (window.necpal31Data.surprise !== 'no') {
            console.log('⏸️ Surprise non è "no", attuale:', window.necpal31Data.surprise);
            return;
        }
        
        var totalItems = window.necpal31Data.items.length;
        console.log('📊 Total items:', totalItems);
        
        // Mostra sezione risultati
        var resultsSection = document.getElementById('necpal31-results-section');
        if (resultsSection) {
            resultsSection.style.display = 'block';
            resultsSection.style.visibility = 'visible';
            console.log('✅ Sezione risultati mostrata');
        }
        
        // Aggiorna valori
        updateElementText('necpal31-total-items', totalItems);
        
        if (totalItems >= 1) {
            updateElementText('necpal31-status', 'POSITIVO');
            updateElementText('necpal31-recommendation', 'CURE PALLIATIVE');
            console.log('✅ Stato: POSITIVO, Items:', totalItems);
        } else {
            updateElementText('necpal31-status', 'NEGATIVO');
            updateElementText('necpal31-recommendation', 'RIVALUTARE');
            console.log('❌ Stato: NEGATIVO');
        }
        
        console.log('🎯 updateResults() FIX completato');
    };
    
    // Funzione helper per aggiornare testo
    function updateElementText(id, text) {
        var element = document.getElementById(id);
        if (element) {
            element.textContent = text;
            console.log('📝 Aggiornato', id, ':', text);
        } else {
            console.warn('⚠️ Elemento non trovato:', id);
        }
    }
    
    // Setup event listeners per domanda sorprendente
    setupSurpriseHandlers();
    
    // Fix event listeners per checkbox
    var checkboxes = document.querySelectorAll('#necpal31-home input[type="checkbox"]');
    console.log('🔍 Trovati', checkboxes.length, 'checkbox');
    
    checkboxes.forEach(function(checkbox) {
        // Rimuovi vecchi listeners (se esistenti)
        checkbox.removeEventListener('change', handleCheckboxChangeFix);
        
        // Aggiungi nuovo listener
        checkbox.addEventListener('change', handleCheckboxChangeFix);
    });
    
    console.log('✅ Fix NECPAL 3.1 applicato con successo!');
}

// Setup gestori domanda sorprendente
function setupSurpriseHandlers() {
    var surpriseRadios = document.querySelectorAll('input[name="surprise"]');
    console.log('🎯 Setup domanda sorprendente, trovati', surpriseRadios.length, 'radio');
    
    surpriseRadios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            window.necpal31Data.surprise = this.value;
            console.log('🤔 Domanda sorprendente:', this.value);
            
            var negativeDiv = document.getElementById('necpal31-negative');
            var sectionsDiv = document.getElementById('necpal31-sections');
            var resultsDiv = document.getElementById('necpal31-results-section');
            
            if (this.value === 'yes') {
                // NECPAL Negativo
                if (negativeDiv) negativeDiv.style.display = 'block';
                if (sectionsDiv) sectionsDiv.style.display = 'none';
                if (resultsDiv) resultsDiv.style.display = 'none';
                console.log('❌ NECPAL Negativo - nascondo sezioni');
            } else {
                // Procedi con valutazione
                if (negativeDiv) negativeDiv.style.display = 'none';
                if (sectionsDiv) sectionsDiv.style.display = 'block';
                updateResults(); // Aggiorna subito i risultati
                console.log('✅ Procedo con valutazione - mostro sezioni');
            }
        });
    });
}

// Gestore eventi checkbox
function handleCheckboxChangeFix(event) {
    var checkbox = event.target;
    var id = checkbox.id;
    var itemDiv = checkbox.closest('.checkbox-item');
    
    console.log('📋 Checkbox', id, ':', checkbox.checked ? 'ON' : 'OFF');
    
    // Aggiorna array items
    if (checkbox.checked) {
        if (itemDiv) itemDiv.classList.add('selected');
        if (!window.necpal31Data.items.includes(id)) {
            window.necpal31Data.items.push(id);
        }
    } else {
        if (itemDiv) itemDiv.classList.remove('selected');
        window.necpal31Data.items = window.necpal31Data.items.filter(function(x) { return x !== id; });
    }
    
    console.log('📊 Items aggiornati:', window.necpal31Data.items);
    
    // Aggiorna risultati se condizioni OK
    if (window.necpal31Data.surprise === 'no') {
        console.log('🔄 Chiamo updateResults...');
        updateResults();
    } else {
        console.log('⏸️ Non chiamo updateResults, surprise =', window.necpal31Data.surprise);
    }
}

// Log di caricamento
console.log('💾 necpal31-fix.js caricato completamente');

// Fix funzione reset
window.resetNecpal31 = function() {
    if (!confirm('Sei sicuro di voler resettare la valutazione?')) return;
    
    console.log('🔄 Reset NECPAL 3.1 - VERSIONE FIX...');
    
    // Reset dati
    window.necpal31Data = {
        surprise: null,
        items: [],
        patientInfo: {},
        richiestaBisogni: 0,
        indicatoriGenerali: 0,
        indicatoriSpecifici: 0
    };
    
    // Reset campi paziente
    var nameInput = document.getElementById('necpal31-patient-name');
    var birthInput = document.getElementById('necpal31-birth-date');
    var evalInput = document.getElementById('necpal31-eval-date');
    
    if (nameInput) nameInput.value = '';
    if (birthInput) birthInput.value = '';
    if (evalInput) evalInput.value = new Date().toISOString().split('T')[0];
    
    // Reset radio buttons
    document.querySelectorAll('#necpal31-home input[name="surprise"]').forEach(function(radio) {
        radio.checked = false;
    });
    
    // Reset checkbox
    document.querySelectorAll('#necpal31-home .checkbox-item').forEach(function(item) {
        item.classList.remove('selected');
        var cb = item.querySelector('input[type="checkbox"]');
        if (cb) cb.checked = false;
    });
    
    // Nascondi sezioni
    var negativeDiv = document.getElementById('necpal31-negative');
    var sectionsDiv = document.getElementById('necpal31-sections');
    var resultsDiv = document.getElementById('necpal31-results-section');
    
    if (negativeDiv) negativeDiv.style.display = 'none';
    if (sectionsDiv) sectionsDiv.style.display = 'none';
    if (resultsDiv) resultsDiv.style.display = 'none';
    
    console.log('✅ Reset completato con successo');
};

console.log('🔄 Funzione reset override applicata');