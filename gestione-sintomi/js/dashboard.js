function openCategory(category) {
    const routes = {
        identificazione: 'identificazione.php',
        complessita: 'strumenti-idcpal.php',
        prognosi: 'strumenti-prognosi.php',
        multidimensionale: 'strumenti-multidimensionali.php',
        performance: 'strumenti-performance.php'
    };
    const url = routes[category];
    if (url) {
        window.location.href = url;
    }
}

function openTool(tool) {
    const routes = {
        ppi: 'strumenti-prognosi.php',
        necpal: 'strumenti-necpal40.php',
        akps: 'strumenti-performance.php',
        equianalgesia: () => navigateToSection('equianalgesia-section'),
        esas: 'strumenti-esas.php',
        ipos: 'strumenti-ipos.php'
    };
    const action = routes[tool];
    if (typeof action === 'function') {
        action();
    } else if (action) {
        window.location.href = action;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.stat-card, .category-card, .tool-preview');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 50);
    });
});
