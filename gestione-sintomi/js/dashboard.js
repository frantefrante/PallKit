function openCategory(category) {
    const sections = {
        identificazione: 'identificazione-home',
        complessita: 'idcpal-home',
        prognosi: 'prognosi-home',
        multidimensionale: 'multidimensionale-home',
        performance: 'performance-home'
    };
    const sectionId = sections[category];
    if (sectionId) {
        navigateToSection(sectionId);
    }
}

function openTool(tool) {
    const sections = {
        ppi: 'ppi-home',
        necpal: 'necpal40-home',
        akps: 'akps-home',
        equianalgesia: 'equianalgesia-section',
        esas: 'esas-home',
        ipos: 'ipos-home'
    };
    const sectionId = sections[tool];
    if (sectionId) {
        navigateToSection(sectionId);
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
