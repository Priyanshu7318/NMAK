// Animate nav links on hover
const navLinks = document.querySelectorAll('.nav-links a');
navLinks.forEach(link => {
    link.addEventListener('mouseenter', () => {
        link.style.transform = 'scale(1.15)';
        link.style.color = '#FFD700';
        link.style.transition = 'all 0.3s';
    });
    link.addEventListener('mouseleave', () => {
        link.style.transform = 'scale(1)';
        link.style.color = '';
    });
});

// Fade-in animation for service boxes and team members on scroll
function fadeInOnScroll(selector) {
    const elements = document.querySelectorAll(selector);
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    elements.forEach(el => observer.observe(el));
}

// Add fade-in to service boxes and team members
fadeInOnScroll('.service-box');
fadeInOnScroll('.team-member');

// Add CSS for fade-in effect
(function addFadeInCSS() {
    const style = document.createElement('style');
    style.innerHTML = `
    .fade-in {
        opacity: 1 !important;
        transform: translateY(0) scale(1) !important;
        transition: opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1);
    }
    .service-box, .team-member {
        opacity: 0;
        transform: translateY(40px) scale(0.98);
        transition: opacity 0.8s, transform 0.8s;
    }
    `;
    document.head.appendChild(style);
})();

// Interactive logo effect
const logo = document.querySelector('.logo');
if (logo) {
    logo.addEventListener('mouseenter', () => {
        logo.style.boxShadow = '0 0 40px 10px #FFD700, 0 0 10px 2px #fff';
        logo.style.transform = 'rotate(-8deg) scale(1.08)';
        logo.style.transition = 'all 0.4s cubic-bezier(0.4,0,0.2,1)';
    });
    logo.addEventListener('mouseleave', () => {
        logo.style.boxShadow = '';
        logo.style.transform = 'rotate(0) scale(1)';
    });
}



