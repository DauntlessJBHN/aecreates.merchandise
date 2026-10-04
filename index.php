<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aecreates</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="public/images/aecreates.png">
        <script src="https://cdn.tailwindcss.com"></script>
    <style>

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(15px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        .animate-fade-in {
            animation: fadeInScale 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .masonry-grid {
            column-count: 1;
            column-gap: 1.5rem;
        }
        @media(min-width: 640px) {
            .masonry-grid { column-count: 2; }
        }
        @media(min-width: 1024px) {
            .masonry-grid { column-count: 3; }
        }
        .masonry-item {
            break-inside: avoid;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

<?php include __DIR__ . '/global/header.php'; ?>

<div style="margin-top: 5vh;" class="bg-brand-950 text-zinc-100 antialiased selection:bg-indigo-500 selection:text-white">

    <section class="max-w-7xl mx-auto px-6 pt-20 pb-12 text-center md:text-left flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="max-w-3xl">
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-black mb-6 leading-[1.08]">
                Your own merch that <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-400">stands out.</span>
            </h1>
            <p class="text-zinc-400 text-base sm:text-lg leading-relaxed max-w-2xl">
                Explore our curated gallery showcasing different merchandise designs.
            </p>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-10 pb-6">
            <div class="flex flex-wrap items-center gap-2" id="filter-tabs">
                <button data-filter="all" class="filter-btn active px-4 py-2 rounded-full text-xs font-semibold transition-all bg-cyan-400 text-white shadow-md">All Creations</button>
                <button data-filter="tshirts" class="filter-btn px-4 py-2 rounded-full text-xs font-semibold transition-all bg-cyan-400 bg-zinc-900 text-zinc-400 hover:text-white hover:bg-zinc-800 border border-zinc-800">T-Shirts</button>
                <button data-filter="poloshirts" class="filter-btn px-4 py-2 rounded-full text-xs font-semibold transition-all bg-cyan-400 bg-zinc-900 text-zinc-400 hover:text-white hover:bg-zinc-800 border border-zinc-800">Polo Shirts</button>
                <button data-filter="totebags" class="filter-btn px-4 py-2 rounded-full text-xs font-semibold transition-all bg-cyan-400 bg-zinc-900 text-zinc-400 hover:text-white hover:bg-zinc-800 border border-zinc-800">Totebags</button>
                <button data-filter="lanyards" class="filter-btn px-4 py-2 rounded-full text-xs font-semibold transition-all bg-cyan-400 bg-zinc-900 text-zinc-400 hover:text-white hover:bg-zinc-800 border border-zinc-800">ID Lanyards</button>
                <button data-filter="others" class="filter-btn px-4 py-2 rounded-full text-xs font-semibold transition-all bg-cyan-400 bg-zinc-900 text-zinc-400 hover:text-white hover:bg-zinc-800 border border-zinc-800">Others</button>
            </div>
            <div class="text-xs text-zinc-500 font-medium" id="gallery-counter">Showing all 14 projects</div>
        </div>

        <div id="gallery-masonry" class="masonry-grid">
            <!-- Dynamic masonry cards injected via JavaScript -->
        </div>
    </main>

    <div id="lightbox-modal" style="margin-top: 2vh;" class="fixed inset-0 z-50 bg-white/50 backdrop-blur-2xl hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-8" role="dialog" aria-modal="true">
        <div id="lightbox-close">
        </div>

        <button id="lightbox-prev" class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 z-40 w-12 h-12 rounded-full bg-zinc-900/90 hover:bg-zinc-800 text-white flex items-center justify-center transition-all border border-zinc-700/60 shadow-2xl hover:scale-105 focus:outline-none">
            <i class="fa-solid fa-chevron-left text-sm">&lt;</i>
        </button>

        <button id="lightbox-next" class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 z-40 w-12 h-12 rounded-full bg-zinc-900/90 hover:bg-zinc-800 text-white flex items-center justify-center transition-all border border-zinc-700/60 shadow-2xl hover:scale-105 focus:outline-none">
            <i class="fa-solid fa-chevron-right text-sm">&gt;</i>
        </button>

        <div class="max-w-5xl max-h-[90vh] w-full flex flex-col items-center justify-center relative">
            <div class="overflow-hidden rounded-2xl max-h-[65vh] flex items-center justify-center shadow-2xl">
                <img id="lightbox-image" src="" alt="Enlarged design work" class="max-h-[65vh] w-auto object-contain select-none transition-transform duration-300">
            </div>
            <div class="mt-6 text-center max-w-xl px-4">
                <span id="lightbox-tag" class="inline-block text-xs font-semibold px-3 py-1 rounded-full bg-cyan-400 text-white"></span>
                <h3 id="lightbox-title" class="text-2xl font-bold text-black mb-2"></h3>
                <p id="lightbox-description" class="text-sm text-zinc-900 leading-relaxed"></p>
                <div class="mt-4 text-xs font-medium text-zinc-500" id="lightbox-counter">1 / 14</div>
            </div>
        </div>
    </div>
</div>
    <section class="contact-section" id="contact">
        <h2 class="section-title">Let's Work <span>Together</span></h2>
        <p style="color: var(--text-muted); max-width: 500px; margin: 0 auto 1.5rem auto;">Have a project in mind or just want to chat? <br> Reach out through my social channels or drop a message below.</p>
        
        <!-- Social Media Links -->
        <div class="social-links">
            <a href="https://facebook.com/aecreates.by.ae" target="_blank" class="btn-primary">Facebook</a>
            <a href="https://linkedin.com/in/aerolle-sana" target="_blank" class="btn-primary">LinkedIn</a>
        </div>

        <!-- Contact Form (Tied to PHP backend) -->
        <form class="contact-form" action="mail.php" method="post">
            <div class="form-group">
                <input type="text" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Your Email Address" required>
            </div>
            <div class="form-group">
                <textarea name="message" rows="5" placeholder="Tell me about your project..." required></textarea>
            </div>
            <input type="submit" name="send" value="Send Message" class="btn-primary" style="width: 100%; border-radius: 12px; cursor: pointer;">
        </form>
    </section>

    <footer>
        <p>&copy; 2026 Aecreates Graphic Design Portfolio. All rights reserved.</p>
    </footer>

    <script>
        const portfolioWorks = [
            {
                id: 1,
                title: "SK Sta Rita Aplaya Organization Shirt",
                category: "poloshirts",
                categoryName: "Polo Shirts",
                image: "public/images/merchandise/02 Sta Rita Aplaya SK Shirt Ble.png",
                description: "An organization shirt designed for the SK Sta Rita Aplaya, featuring a clean and professional look with the organization's logo and colors."
            },
            {
                id: 2,
                title: "AGHAM Organization Shirt",
                category: "poloshirts",
                categoryName: "Polo Shirts",
                image: "public/images/merchandise/AGHAM Org shirt.png",
                description: "An organization shirt designed a school organization related to Science, Technology and Engineering."
            },
            {
                id: 3,
                title: "Boiling Rock Bandits",
                category: "tshirts",
                categoryName: "T-Shirts",
                image: "public/images/merchandise/boiling rock.png",
                description: "A vibrant jersey shirt designed for the Boiling Rock Bandits, featuring a bold graphic and energetic design."
            },
            {
                id: 4,
                title: "College of Informatics and Computing Sciences (CICS) Shirt",
                category: "poloshirts",
                categoryName: "Polo Shirts",
                image: "public/images/merchandise/cics org shirt.png",
                description: "An organization shirt designed for the College of Informatics and Computing Sciences, featuring a professional design and the institution's branding."
            },
            {
                id: 5,
                title: "College of Informatics and Computing Sciences (CICS) Shirt",
                category: "poloshirts",
                categoryName: "Polo Shirts",
                image: "public/images/merchandise/cics shirt 2.jpg",
                description: "An organization shirt designed for the College of Informatics and Computing Sciences, featuring a professional design and the institution's branding."
            },
            {
                id: 6,
                title: "EMERGE V.7.0 Event Shirt",
                category: "tshirts",
                categoryName: "T-Shirts",
                image: "public/images/merchandise/emerge shirt.jpg",
                description: "An event shirt designed for the EMERGE V.7.0, a student leadership conference."
            },
            {
                id: 7,
                title: "Emergency Service Corps Boy Scout Shirt",
                category: "poloshirts",
                categoryName: "Polo Shirts",
                image: "public/images/merchandise/ESC - Boy Scout Shirt.png",
                description: "An organization shirt that present strong and bold design for the Emergency Service Corps Boy Scout troop."
            },
            {
                id: 13,
                title: "City of Canlaon Lanyard",
                category: "lanyards",
                categoryName: "ID Lanyards",
                image: "public/images/merchandise/ID Lace - Canlaon City.png",
                description: "Designed lanyard for the City of Canlaon as part of their branding."
            },
            {
                id: 14,
                title: "Life Lace Sanitary Engineering Lanyard",
                category: "lanyards",
                categoryName: "ID Lanyards",
                image: "public/images/merchandise/Life Lace PSSE.png",
                description: "Life Lace is a student-led initiative that sells ID Lace with proceeds donated to charity."
            },
            {
                id: 15,
                title: "SAKTO Organization Shirt",
                category: "poloshirts",
                categoryName: "Polo Shirts",
                image: "public/images/merchandise/SAKTO Shirt Design.png",
                description: "Designed shirt for SAKTO Organization as part of their branding."
            },
            {
                id: 16,
                title: "Sanitary Engineering Shirt",
                category: "tshirts",
                categoryName: "T-Shirts",
                image: "public/images/merchandise/SE Shirt Design.png",
                description: "Designed shirt for passers of the Sanitary Engineering Licensure Examination."
            },
            {
                id: 17,
                title: "Supreme Student Council - BatStateU The NEU Alangilan Organization Shirt",
                category: "poloshirts",
                categoryName: "Polo Shirts",
                image: "public/images/merchandise/ssc shirt.png",
                description: "Featuring upward icons, the Supreme Student Council - BatStateU The NEU Alangilan Organization Shirt is a symbol of pride and unity."
            },
            {
                id: 18,
                title: "SK Sta Rita Aplaya Organization Shirt",
                category: "poloshirts",
                categoryName: "Polo Shirts",
                image: "public/images/merchandise/Sta Rita Aplaya SK Shirt.png",
                description: "An organization shirt designed for the SK Sta Rita Aplaya, featuring a clean and professional look with the organization's logo and colors."
            },
            {
                id: 19,
                title: "TECHNOFUSION Event Shirt",
                category: "tshirts",
                categoryName: "T-Shirts",
                image: "public/images/merchandise/technofusion shirt.jpg",
                description: "A vibrant shirt for the TECHNOFUSION event, showcasing the excitement and energy of the occasion."
            },
            {
                id: 20,
                title: "University of Batangas SHS Student Council Organization Shirt",
                category: "poloshirts",
                categoryName: "Polo Shirts",
                image: "public/images/merchandise/UB SHS Shirt.png",
                description: "An organization shirt designed for the SK Sta Rita Aplaya, featuring a clean and professional look with the organization's logo and colors."
            },
                        {
                id: 9,
                title: "FUEL'D Bucket Hat",
                category: "others",
                categoryName: "Bucket Hats",
                image: "public/images/merchandise/FUELD hat 2.png",
                description: "FUEL'D is a student-led merchandise line for petroleum engineering students."
            },
            {
                id: 10,
                title: "FUEL'D Bucket Hat",
                category: "others",
                categoryName: "Bucket Hats",
                image: "public/images/merchandise/fueld hat 3.png",
                description: "FUEL'D is a student-led merchandise line for petroleum engineering students."
            },
            {
                id: 8,
                title: "FUEL'D Bucket Hat",
                category: "others",
                categoryName: "Bucket Hats",
                image: "public/images/merchandise/fueld hat 1.png",
                description: "FUEL'D is a student-led merchandise line for petroleum engineering students."
            },
            {
                id: 11,
                title: "FUEL'D Tote Bag",
                category: "totebags",
                categoryName: "Tote Bags",
                image: "public/images/merchandise/fueld tote 1.png",
                description: "FUEL'D is a student-led merchandise line for petroleum engineering students."
            },
            {
                id: 12,
                title: "FUEL'D Wristlet Lanyard",
                category: "others",
                categoryName: "Wristlet Lanyards",
                image: "public/images/merchandise/fueld wristlet.png",
                description: "FUEL'D is a student-led merchandise line for petroleum engineering students."
            }
        ];

        let activeFilter = 'all';
        let currentFilteredWorks = [...portfolioWorks];
        let currentLightboxIndex = 0;

        const masonryGrid = document.getElementById('gallery-masonry');
        const galleryCounter = document.getElementById('gallery-counter');
        const lightboxModal = document.getElementById('lightbox-modal');
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDescription = document.getElementById('lightbox-description');
        const lightboxTag = document.getElementById('lightbox-tag');
        const lightboxCounter = document.getElementById('lightbox-counter');
        const lightboxClose = document.getElementById('lightbox-close');
        const lightboxPrev = document.getElementById('lightbox-prev');
        const lightboxNext = document.getElementById('lightbox-next');

        function renderGallery(filter) {
            activeFilter = filter;
            currentFilteredWorks = filter === 'all' 
                ? [...portfolioWorks] 
                : portfolioWorks.filter(work => work.category === filter);

            galleryCounter.textContent = `Showing ${currentFilteredWorks.length} projects`;
            masonryGrid.innerHTML = '';

            currentFilteredWorks.forEach((work, index) => {
                const item = document.createElement('div');
                item.className = 'masonry-item animate-fade-in group relative rounded-2xl overflow-hidden bg-zinc-900 cursor-pointer shadow-xl hover:shadow-cyan-300/10 hover:border-zinc-700 transition-all duration-300';
                item.style.animationDelay = `${index * 0.04}s`;

                item.innerHTML = `
                    <div class="overflow-hidden bg-zinc-950 relative">
                        <img src="${work.image}" alt="${work.title}" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-500 ease-out" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/95 via-zinc-950/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-[11px] font-semibold text-cyan-400 uppercase tracking-widest">${work.categoryName}</span>
                                    <h3 class="text-base font-bold text-white mt-1">${work.title}</h3>
                                </div>
                                <div class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center text-white transform translate-y-2 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300 shadow-lg">
                                    <i class="fa-solid fa-magnifying-glass-plus text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                item.addEventListener('click', () => openLightbox(index));
                masonryGrid.appendChild(item);
            });
        }

        function openLightbox(index) {
            currentLightboxIndex = index;
            updateLightboxContent();
            lightboxModal.classList.remove('hidden');
            setTimeout(() => {
                lightboxModal.classList.remove('opacity-0');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightboxModal.classList.add('opacity-0');
            setTimeout(() => {
                lightboxModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        function updateLightboxContent() {
            const work = currentFilteredWorks[currentLightboxIndex];
            lightboxImage.src = work.image;
            lightboxTitle.textContent = work.title;
            lightboxDescription.textContent = work.description;
            lightboxTag.textContent = work.categoryName;
            lightboxCounter.textContent = `${currentLightboxIndex + 1} / ${currentFilteredWorks.length}`;
        }

        function nextLightboxItem() {
            currentLightboxIndex = (currentLightboxIndex + 1) % currentFilteredWorks.length;
            updateLightboxContent();
        }

        function prevLightboxItem() {
            currentLightboxIndex = (currentLightboxIndex - 1 + currentFilteredWorks.length) % currentFilteredWorks.length;
            updateLightboxContent();
        }

        // Filter button event listeners
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('bg-cyan', 'text-white', 'shadow-md');
                    b.classList.add('bg-zinc-900', 'text-zinc-400', 'border', 'border-zinc-800');
                });
                e.target.classList.remove('bg-zinc-900', 'text-zinc-400', 'border', 'border-zinc-800');
                e.target.classList.add('bg-cyan', 'text-white', 'shadow-md');

                renderGallery(e.target.dataset.filter);
            });
        });

        // Lightbox events
        lightboxClose.addEventListener('click', closeLightbox);
        lightboxNext.addEventListener('click', nextLightboxItem);
        lightboxPrev.addEventListener('click', prevLightboxItem);

        lightboxModal.addEventListener('click', (e) => {
            if (e.target === lightboxModal) {
                closeLightbox();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (lightboxModal.classList.contains('hidden')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') nextLightboxItem();
            if (e.key === 'ArrowLeft') prevLightboxItem();
        });

        // Initialize gallery on load
        window.addEventListener('DOMContentLoaded', () => {
            renderGallery('all');
        });
    </script>
    </body>
</html>