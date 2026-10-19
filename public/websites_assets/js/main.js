/**
 * 1. Default Configuration & SDK Logic
 * (আপনার অরিজিনাল কোড অপরিবর্তিত রাখা হয়েছে)
 */
const defaultConfig = {
    background_color: "#0f172a",
    surface_color: "#ffffff",
    text_color: "#1e293b",
    primary_action_color: "#5b21d0",
    secondary_action_color: "#ff5b00",
    font_family: "system-ui, -apple-system, sans-serif",
    font_size: 16,
    company_name: "SoftPolli",
    tagline: "Innovating Digital Solutions Globally",
    hero_title: "Building Tomorrow's Technology Today",
    hero_subtitle: "Enterprise Software Solutions from Bangladesh to the World",
    cta_button: "Get Started",
    about_title: "About SoftPolli",
    mission_title: "Our Mission",
    vision_title: "Our Vision",
    services_title: "Our Services",
    products_title: "Our Products",
    contact_title: "Get In Touch",
    footer_text: "© 2024 SoftPolli. All rights reserved.",
};

async function onConfigChange(config) {
    const settings = { ...defaultConfig, ...config };
    const baseSize = settings.font_size;
    const fontFamily = settings.font_family;
    const baseFontStack = 'system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';

    // Apply Colors & Styles
    document.body.style.backgroundColor = settings.background_color;
    document.body.style.color = settings.text_color;
    document.body.style.fontFamily = `${fontFamily}, ${baseFontStack}`;

    const navbar = document.getElementById("navbar");
    if (navbar) {
        navbar.style.backgroundColor = settings.surface_color;
        navbar.style.color = settings.text_color;
    }

    // Dynamic Style Generation for Nav Links
    const styleId = "dynamic-theme-styles";
    let styleTag = document.getElementById(styleId);
    if (!styleTag) {
        styleTag = document.createElement("style");
        styleTag.id = styleId;
        document.head.appendChild(styleTag);
    }
    styleTag.textContent = `
        .nav-link { color: ${settings.text_color} !important; }
        .nav-link::after { background-color: ${settings.primary_action_color}; }
        .tech-badge, .card-hover {
            background-color: ${settings.surface_color} !important;
            color: ${settings.text_color} !important;
        }
    `;

    // Apply Text Content
    const textIds = [
        "company-name", "tagline", "hero-title", "hero-subtitle", "cta-button",
        "about-title", "mission-title", "vision-title", "services-title",
        "products-title", "contact-title", "footer-text"
    ];
    textIds.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.textContent = settings[id.replace("-", "_")];
    });

    // Typography Scaling
    document.querySelectorAll("h2").forEach(h2 => h2.style.fontSize = `${baseSize * 2}px`);
    document.querySelectorAll("p").forEach(p => p.style.fontSize = `${baseSize}px`);
}

/**
 * 2. Swiper & UI Interactions
 * (Slider এবং Scroll Effect ঠিক করা হয়েছে)
 */
document.addEventListener("DOMContentLoaded", () => {

    // Swiper Initialization
    if (typeof Swiper !== "undefined") {
        const heroSwiper = new Swiper(".heroSwiper", {
            loop: true,
            speed: 800,
            autoplay: { delay: 5000, disableOnInteraction: false },
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            effect: "fade",
            fadeEffect: { crossFade: true },
        });
    }







    // Mobile Menu Toggle
    const menuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener("click", () => {
            const isHidden = mobileMenu.classList.toggle("hidden");
            menuBtn.setAttribute("aria-expanded", !isHidden);
        });
    }

    // Navbar Scroll Effect
    const navbar = document.getElementById("navbar");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar.classList.add("shadow-lg", "backdrop-blur-md");
            navbar.style.backgroundColor = "rgba(0, 0, 0, 0.8)"; // Black Transparent
            navbar.style.color = "#ffffff";
        } else {
            navbar.classList.remove("shadow-lg", "backdrop-blur-md");
            navbar.style.backgroundColor = defaultConfig.surface_color;
            navbar.style.color = defaultConfig.text_color;
        }
    });

    // Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({ behavior: "smooth" });
                mobileMenu?.classList.add("hidden");
            }
        });
    });

    // CTA Button
    document.getElementById("cta-button")?.addEventListener("click", () => {
        document.getElementById("contact")?.scrollIntoView({ behavior: "smooth" });
    });
});




// SDK Init
if (window.elementSdk) {
    window.elementSdk.init({
        defaultConfig,
        onConfigChange,
        mapToCapabilities: (c) => ({}), // Fill if needed
        mapToEditPanelValues: (c) => new Map(Object.entries(c)),
    });
}
