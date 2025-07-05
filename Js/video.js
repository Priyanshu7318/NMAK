// Fade-in animation for video cards on scroll
function fadeInOnScroll(selector) {
  const elements = document.querySelectorAll(selector);
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });
  elements.forEach(el => observer.observe(el));
}

document.addEventListener('DOMContentLoaded', () => {
  fadeInOnScroll('.video-card');

  // Double-tap/double-click to seek video
  document.querySelectorAll('.video-card').forEach(card => {
    let lastTap = 0;
    card.addEventListener('click', function(e) {
      const now = Date.now();
      if (now - lastTap < 300) { // Double-tap detected
        const video = card.querySelector('video');
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        if (x < rect.width / 2) {
          // Left half: rewind 10s
          video.currentTime = Math.max(0, video.currentTime - 10);
        } else {
          // Right half: forward 10s
          video.currentTime = Math.min(video.duration, video.currentTime + 10);
        }
        // Optional: show a quick visual feedback
        card.classList.add('seek-flash');
        setTimeout(() => card.classList.remove('seek-flash'), 200);
      }
      lastTap = now;
    });
  });
});



