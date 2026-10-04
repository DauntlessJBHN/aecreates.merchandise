document.addEventListener("DOMContentLoaded", () => {
    // 1. Interactive Loading Screen Animation
    const loader = document.getElementById("loader");
    setTimeout(() => {
        loader.style.opacity = "0";
        loader.style.visibility = "hidden";
    }, 1000); // Fades out smoothly after 1 second

    // 2. Interactive Spotlight Follower on Banner
    const banner = document.getElementById("interactiveBanner");
    const spotlight = document.getElementById("spotlight");

    if (banner && spotlight) {
        banner.addEventListener("mousemove", (e) => {
            const rect = banner.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            spotlight.style.left = `${x}px`;
            spotlight.style.top = `${y}px`;
        });
    }

    // 3. Contact Form Interactive Feedback
    const contactForm = document.getElementById("contactForm");
    if (contactForm) {
        contactForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const submitBtn = contactForm.querySelector("button");
            const originalText = submitBtn.textContent;

            submitBtn.textContent = "✨ Message Sent Successfully!";
            submitBtn.style.background = "#10b981";
            contactForm.reset();

            setTimeout(() => {
                submitBtn.textContent = originalText;
                submitBtn.style.background = "var(--accent)";
            }, 4000);
        });
    }
});

        const galleryItems = document.querySelectorAll('.gallery-item');
        const modal = document.getElementById('lightboxModal');
        const closeModal = document.getElementById('closeModal');
        
        const modalImg = document.getElementById('modalImg');
        const modalTitle = document.getElementById('modalTitle');
        const modalCategory = document.getElementById('modalCategory');
        const modalDesc = document.getElementById('modalDesc');
        const modalLink = document.getElementById('modalLink'); // <-- 1. Select the modal button

        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                const title = item.getAttribute('data-title');
                const category = item.getAttribute('data-category');
                const desc = item.getAttribute('data-description');
                const imgSrc = item.getAttribute('data-img');
                const projectUrl = item.getAttribute('data-link'); // <-- 2. Read the specific link

                modalTitle.textContent = title;
                modalCategory.textContent = category;
                modalDesc.textContent = desc;
                modalImg.src = imgSrc;
                modalLink.href = projectUrl; // <-- 3. Dynamically set the button's href

                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        const closeLightbox = () => {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        };

        closeModal.addEventListener('click', closeLightbox);

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeLightbox();
            }
        });

        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeLightbox();
            }
        });