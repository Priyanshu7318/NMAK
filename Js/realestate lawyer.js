// WhatsApp Integration
// Add event listeners to all book buttons to open WhatsApp with a pre-filled message

document.querySelectorAll('.book-btn').forEach(button => {
    button.addEventListener('click', function() {
        const card = this.closest('.lawyer-card');
        const number = card.dataset.whatsappNumber;
        const message = encodeURIComponent("Hello, I'd like to schedule a consultation");
        window.open(`https://wa.me/${number}?text=${message}`, '_blank');
    });
});

// Initialize animations: make lawyer cards visible after DOM is loaded

document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.lawyer-card');
    cards.forEach(card => {
        card.style.visibility = 'visible';
    });
});
