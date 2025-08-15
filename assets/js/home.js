// script.js


document.addEventListener("DOMContentLoaded", function() {
    // Popup banner functionality
    if (document.getElementById("popup-banner")) {
        window.onload = function() {
            document.getElementById("popup-banner").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        };

        function closePopup() {
            document.getElementById("popup-banner").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }

        document.querySelector(".close-btn").addEventListener("click", closePopup);

        // Carousel functionality for popup banner
        let currentSlide = 0;
        const slides = document.querySelectorAll(".carousel-slide");

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle("active", i === index);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        const slideInterval = setInterval(nextSlide, 3000);

        // Cleanup interval when popup is closed
        document.querySelector(".close-btn").addEventListener("click", function() {
            clearInterval(slideInterval);
        });
    }

    // Floating button scroll effect
    document.addEventListener("scroll", function() {
        const button = document.querySelector(".floating-order-btn");
        if (button) {
            if (window.scrollY > 100) {
                button.style.opacity = "1";
            } else {
                button.style.opacity = "0";
            }
        }
    });

    // Blog posts fetching
    const blogPostsContainer = document.getElementById("blog-posts");
    if (blogPostsContainer) {
        fetch("https://ambrosiaayurved.in/blog/wp-json/wp/v2/posts?_embed")
            .then(response => response.json())
            .then(posts => {
                let html = "";

                posts.slice(0, 6).forEach(post => {
                    const title = post.title.rendered;
                    const link = post.link;
                    const excerpt = post.excerpt.rendered.replace(/<[^>]+>/g, '').substring(0, 130);
                    const date = new Date(post.date).toDateString();
                    const image = post._embedded['wp:featuredmedia']?.[0]?.source_url || "https://via.placeholder.com/400x200?text=No+Image";

                    html += `
                    <div class="blog-card">
                        <a href="${link}" target="_blank">
                            <img src="${image}" alt="${title}">
                        </a>
                        <div class="blog-card-content">
                            <h3><a href="${link}" target="_blank">${title}</a></h3>
                            <p>${excerpt}...</p>
                            <small>${date}</small>
                            <br>
                            <a href="${link}" target="_blank" class="read-more-btn" style="color:white;">Read More</a>
                        </div>
                    </div>
                    `;
                });

                blogPostsContainer.innerHTML = html;

                // Scroll animation for blog cards
                const cards = document.querySelectorAll(".blog-card");
                const observer = new IntersectionObserver(entries => {
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                entry.target.classList.add("show");
                            }, index * 100);
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.4 });

                cards.forEach(card => {
                    observer.observe(card);
                });
            })
            .catch(err => {
                console.error("Error loading blogs:", err);
                blogPostsContainer.innerHTML = "<p>Unable to load latest blogs right now.</p>";
            });
    }

    // Initialize Owl Carousel if present
    if (typeof $ !== 'undefined' && $(".charter-carousel-2").length) {
        $(".charter-carousel-2").owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 3 }
            }
        });
    }
});