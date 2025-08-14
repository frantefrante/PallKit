function openCategory(category) {
    console.log(`Apertura categoria: ${category}`);
}

function openTool(tool) {
    console.log(`Apertura strumento: ${tool}`);
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
