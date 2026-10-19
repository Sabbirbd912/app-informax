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
    hero_subtitle:
        "Enterprise Software Solutions from Bangladesh to the World",
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
    const baseSize = config.font_size || defaultConfig.font_size;
    const fontFamily = config.font_family || defaultConfig.font_family;
    const baseFontStack =
        'system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';

    // Apply colors
    document.body.style.backgroundColor =
        config.background_color || defaultConfig.background_color;
    document.body.style.color =
        config.text_color || defaultConfig.text_color;

    const navbar = document.getElementById("navbar");
    navbar.style.backgroundColor =
        config.surface_color || defaultConfig.surface_color;
    navbar.style.color = config.text_color || defaultConfig.text_color;

    const navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach((link) => {
        link.style.color = config.text_color || defaultConfig.text_color;
        link.style.setProperty(
            "--link-hover-color",
            config.primary_action_color || defaultConfig.primary_action_color
        );
    });

    navLinks.forEach((link) => {
        const afterStyle = window.getComputedStyle(link, "::after");
        link.style.setProperty(
            "--after-bg",
            config.primary_action_color || defaultConfig.primary_action_color
        );
    });

    const style = document.createElement("style");
    style.textContent = `
        .nav-link::after {
          background-color: ${config.primary_action_color || defaultConfig.primary_action_color
        };
        }
      `;
    document.head.appendChild(style);

    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    mobileMenuBtn.style.color =
        config.text_color || defaultConfig.text_color;

    const mobileMenu = document.getElementById("mobile-menu");
    mobileMenu.style.backgroundColor =
        config.surface_color || defaultConfig.surface_color;

    const cards = document.querySelectorAll(".card-hover");
    cards.forEach((card) => {
        card.style.backgroundColor =
            config.surface_color || defaultConfig.surface_color;
        card.style.color = config.text_color || defaultConfig.text_color;
    });

    const techBadges = document.querySelectorAll(".tech-badge");
    techBadges.forEach((badge) => {
        badge.style.backgroundColor =
            config.surface_color || defaultConfig.surface_color;
        badge.style.color = config.text_color || defaultConfig.text_color;
    });

    const ctaButton = document.getElementById("cta-button");
    ctaButton.style.backgroundColor =
        config.primary_action_color || defaultConfig.primary_action_color;
    ctaButton.style.color = "#ffffff";

    const submitButton = document.querySelector(
        '#contact-form button[type="submit"]'
    );
    submitButton.style.backgroundColor =
        config.primary_action_color || defaultConfig.primary_action_color;
    submitButton.style.color = "#ffffff";

    const inputs = document.querySelectorAll("input, textarea, select");
    inputs.forEach((input) => {
        input.style.backgroundColor =
            config.surface_color || defaultConfig.surface_color;
        input.style.color = config.text_color || defaultConfig.text_color;
        input.style.borderColor =
            config.primary_action_color || defaultConfig.primary_action_color;
    });

    const footer = document.querySelector("footer");
    footer.style.backgroundColor =
        config.surface_color || defaultConfig.surface_color;
    footer.style.color = config.text_color || defaultConfig.text_color;

    const iconContainers = document.querySelectorAll(
        ".w-16.h-16.rounded-full, .w-12.h-12.rounded-full"
    );
    iconContainers.forEach((container) => {
        container.style.backgroundColor =
            config.primary_action_color || defaultConfig.primary_action_color;
        container.style.color = "#ffffff";
    });

    // Apply fonts
    document.body.style.fontFamily = `${fontFamily}, ${baseFontStack}`;

    const heroTitle = document.getElementById("hero-title");
    heroTitle.style.fontSize = `${baseSize * 2.5}px`;
    heroTitle.style.fontFamily = `${fontFamily}, ${baseFontStack}`;

    const heroSubtitle = document.getElementById("hero-subtitle");
    heroSubtitle.style.fontSize = `${baseSize * 1.25}px`;
    heroSubtitle.style.fontFamily = `${fontFamily}, ${baseFontStack}`;

    const tagline = document.getElementById("tagline");
    tagline.style.fontSize = `${baseSize * 1.125}px`;
    tagline.style.fontFamily = `${fontFamily}, ${baseFontStack}`;

    const h2Elements = document.querySelectorAll("h2");
    h2Elements.forEach((h2) => {
        h2.style.fontSize = `${baseSize * 2}px`;
        h2.style.fontFamily = `${fontFamily}, ${baseFontStack}`;
    });

    const h3Elements = document.querySelectorAll("h3");
    h3Elements.forEach((h3) => {
        h3.style.fontSize = `${baseSize * 1.5}px`;
        h3.style.fontFamily = `${fontFamily}, ${baseFontStack}`;
    });

    const h4Elements = document.querySelectorAll("h4");
    h4Elements.forEach((h4) => {
        h4.style.fontSize = `${baseSize * 1.25}px`;
        h4.style.fontFamily = `${fontFamily}, ${baseFontStack}`;
    });

    const paragraphs = document.querySelectorAll("p");
    paragraphs.forEach((p) => {
        p.style.fontSize = `${baseSize}px`;
        p.style.fontFamily = `${fontFamily}, ${baseFontStack}`;
    });

    const labels = document.querySelectorAll("label");
    labels.forEach((label) => {
        label.style.fontSize = `${baseSize * 0.875}px`;
        label.style.fontFamily = `${fontFamily}, ${baseFontStack}`;
    });

    // Apply text content
    document.getElementById("company-name").textContent =
        config.company_name || defaultConfig.company_name;
    document.getElementById("tagline").textContent =
        config.tagline || defaultConfig.tagline;
    document.getElementById("hero-title").textContent =
        config.hero_title || defaultConfig.hero_title;
    document.getElementById("hero-subtitle").textContent =
        config.hero_subtitle || defaultConfig.hero_subtitle;
    document.getElementById("cta-button").textContent =
        config.cta_button || defaultConfig.cta_button;
    document.getElementById("about-title").textContent =
        config.about_title || defaultConfig.about_title;
    document.getElementById("mission-title").textContent =
        config.mission_title || defaultConfig.mission_title;
    document.getElementById("vision-title").textContent =
        config.vision_title || defaultConfig.vision_title;
    document.getElementById("services-title").textContent =
        config.services_title || defaultConfig.services_title;
    document.getElementById("products-title").textContent =
        config.products_title || defaultConfig.products_title;
    document.getElementById("contact-title").textContent =
        config.contact_title || defaultConfig.contact_title;
    document.getElementById("footer-text").textContent =
        config.footer_text || defaultConfig.footer_text;
}

function mapToCapabilities(config) {
    return {
        recolorables: [
            {
                get: () =>
                    config.background_color || defaultConfig.background_color,
                set: (value) => {
                    config.background_color = value;
                    window.elementSdk.setConfig({ background_color: value });
                },
            },
            {
                get: () => config.surface_color || defaultConfig.surface_color,
                set: (value) => {
                    config.surface_color = value;
                    window.elementSdk.setConfig({ surface_color: value });
                },
            },
            {
                get: () => config.text_color || defaultConfig.text_color,
                set: (value) => {
                    config.text_color = value;
                    window.elementSdk.setConfig({ text_color: value });
                },
            },
            {
                get: () =>
                    config.primary_action_color ||
                    defaultConfig.primary_action_color,
                set: (value) => {
                    config.primary_action_color = value;
                    window.elementSdk.setConfig({ primary_action_color: value });
                },
            },
            {
                get: () =>
                    config.secondary_action_color ||
                    defaultConfig.secondary_action_color,
                set: (value) => {
                    config.secondary_action_color = value;
                    window.elementSdk.setConfig({ secondary_action_color: value });
                },
            },
        ],
        borderables: [],
        fontEditable: {
            get: () => config.font_family || defaultConfig.font_family,
            set: (value) => {
                config.font_family = value;
                window.elementSdk.setConfig({ font_family: value });
            },
        },
        fontSizeable: {
            get: () => config.font_size || defaultConfig.font_size,
            set: (value) => {
                config.font_size = value;
                window.elementSdk.setConfig({ font_size: value });
            },
        },
    };
}

function mapToEditPanelValues(config) {
    return new Map([
        ["company_name", config.company_name || defaultConfig.company_name],
        ["tagline", config.tagline || defaultConfig.tagline],
        ["hero_title", config.hero_title || defaultConfig.hero_title],
        [
            "hero_subtitle",
            config.hero_subtitle || defaultConfig.hero_subtitle,
        ],
        ["cta_button", config.cta_button || defaultConfig.cta_button],
        ["about_title", config.about_title || defaultConfig.about_title],
        [
            "mission_title",
            config.mission_title || defaultConfig.mission_title,
        ],
        ["vision_title", config.vision_title || defaultConfig.vision_title],
        [
            "services_title",
            config.services_title || defaultConfig.services_title,
        ],
        [
            "products_title",
            config.products_title || defaultConfig.products_title,
        ],
        [
            "contact_title",
            config.contact_title || defaultConfig.contact_title,
        ],
        ["footer_text", config.footer_text || defaultConfig.footer_text],
    ]);
}

// Initialize SDK
if (window.elementSdk) {
    window.elementSdk.init({
        defaultConfig,
        onConfigChange,
        mapToCapabilities,
        mapToEditPanelValues,
    });
}

// Mobile menu toggle
document
    .getElementById("mobile-menu-btn")
    .addEventListener("click", () => {
        const mobileMenu = document.getElementById("mobile-menu");
        const isExpanded = mobileMenu.classList.contains("hidden");
        mobileMenu.classList.toggle("hidden");
        document
            .getElementById("mobile-menu-btn")
            .setAttribute("aria-expanded", isExpanded ? "true" : "false");
    });

// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({ behavior: "smooth", block: "start" });
            // Close mobile menu if open
            document.getElementById("mobile-menu").classList.add("hidden");
            document
                .getElementById("mobile-menu-btn")
                .setAttribute("aria-expanded", "false");
        }
    });
});

// Navbar scroll effect
let lastScroll = 0;
window.addEventListener("scroll", () => {
    const navbar = document.getElementById("navbar");
    const currentScroll = window.pageYOffset;

    if (currentScroll > 50) {
        navbar.style.boxShadow = "0 4px 6px rgba(0, 0, 0, 0.1)";
    } else {
        navbar.style.boxShadow = "none";
    }

    lastScroll = currentScroll;
});

// Contact form
document
    .getElementById("contact-form")
    .addEventListener("submit", (e) => {
        e.preventDefault();

        const formMessage = document.getElementById("form-message");
        formMessage.textContent =
            "Thank you for your message! We will get back to you soon.";
        formMessage.style.backgroundColor =
            window.elementSdk.config.surface_color ||
            defaultConfig.surface_color;
        formMessage.style.color =
            window.elementSdk.config.text_color || defaultConfig.text_color;
        formMessage.style.border = `2px solid ${window.elementSdk.config.primary_action_color ||
            defaultConfig.primary_action_color
            }`;
        formMessage.classList.remove("hidden");

        document.getElementById("contact-form").reset();

        setTimeout(() => {
            formMessage.classList.add("hidden");
        }, 5000);
    });

// CTA button action
document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("cta-button");
    const contact = document.getElementById("contact");

    if (btn && contact) {
        btn.addEventListener("click", () => {
            contact.scrollIntoView({ behavior: "smooth" });
        });
    }
});

// document.getElementById("cta-button").addEventListener("click", () => {
//     document
//         .getElementById("contact")
//         .scrollIntoView({ behavior: "smooth" });
// });

// -------------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", () => {
    if (typeof Swiper !== "undefined") {
        const heroSwiper = new Swiper(".heroSwiper", {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
        });
    } else {
        console.error("Swiper library loaded হয়নি");
    }
});
