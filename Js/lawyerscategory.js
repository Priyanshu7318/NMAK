// Animation and Active State for Lawyer Category Boxes

document.addEventListener('DOMContentLoaded', function () {
    const boxes = document.querySelectorAll('.lawyer-box');
    let activeBox = null;

    boxes.forEach(box => {
        // Click to set active
        box.addEventListener('click', function (e) {
            // Prevent link navigation if clicking the box itself
            if (e.target === box) {
                e.preventDefault();
            }
            if (activeBox) {
                activeBox.classList.remove('active-lawyer');
            }
            box.classList.add('active-lawyer');
            activeBox = box;
        });

        // Optional: Animate on mouseenter/mouseleave (add/remove a class)
        box.addEventListener('mouseenter', function () {
            box.classList.add('hover-animate');
        });
        box.addEventListener('mouseleave', function () {
            box.classList.remove('hover-animate');
        });
    });
});



