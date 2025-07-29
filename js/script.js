// Smooth scrolling for navigation links
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Form validation and submission
    const contactForm = document.querySelector('.contact-form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const name = formData.get('name');
            const email = formData.get('email');
            const subject = formData.get('subject');
            const message = formData.get('message');
            
            // Basic validation
            if (!name || !email || !subject || !message) {
                showNotification('Bitte füllen Sie alle Felder aus.', 'error');
                return;
            }
            
            if (!isValidEmail(email)) {
                showNotification('Bitte geben Sie eine gültige E-Mail-Adresse ein.', 'error');
                return;
            }
            
            // Simulate form submission
            showNotification('Nachricht erfolgreich gesendet!', 'success');
            this.reset();
        });
    }

    // Add scroll effect to header
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.header');
        if (window.scrollY > 100) {
            header.style.background = 'rgba(15, 23, 42, 0.98)';
            header.style.backdropFilter = 'blur(20px)';
        } else {
            header.style.background = 'rgba(15, 23, 42, 0.95)';
            header.style.backdropFilter = 'blur(20px)';
        }
    });

    // Add animation to download cards on scroll
    const downloadCards = document.querySelectorAll('.download-card');
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    downloadCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    // Add animation to license cards on scroll
    const licenseCards = document.querySelectorAll('.license-card');
    licenseCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    // Add typing effect to hero title
    const heroTitle = document.querySelector('.hero-content h2');
    if (heroTitle) {
        const text = heroTitle.textContent;
        heroTitle.textContent = '';
        
        let i = 0;
        const typeWriter = () => {
            if (i < text.length) {
                heroTitle.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, 100);
            }
        };
        
        setTimeout(typeWriter, 500);
    }
});

// Download functionality - now using direct links
function downloadFile(filename) {
    // This function is kept for compatibility but downloads are now handled by direct links
    showNotification(`Download von ${filename} gestartet...`, 'info');
}

// License ordering functionality
function orderLicense(licenseType) {
    const licenseNames = {
        'basic': 'Basic License',
        'professional': 'Professional License',
        'enterprise': 'Enterprise License'
    };
    
    showNotification(`${licenseNames[licenseType]} wird bestellt...`, 'info');
    
    // Simulate order processing
    setTimeout(() => {
        showNotification(`${licenseNames[licenseType]} erfolgreich bestellt! Sie erhalten eine Bestätigung per E-Mail.`, 'success');
    }, 1500);
}

// Email generation functionality
function generateEmail() {
    const emailType = document.getElementById('emailType').value;
    const recipientName = document.getElementById('recipientName').value || 'Max Mustermann';
    const emailContent = document.getElementById('emailContent');
    
    const emailTemplates = {
        'welcome': {
            subject: 'Willkommen bei Ahnenforscher!',
            content: `Hallo ${recipientName},

vielen Dank für Ihr Interesse an Ahnenforscher!

Wir freuen uns, Sie als neuen Kunden begrüßen zu dürfen. Unser Team steht Ihnen gerne zur Verfügung, um Ihnen bei der Erforschung Ihrer Familiengeschichte zu unterstützen.

Falls Sie Fragen haben oder Unterstützung benötigen, erreichen Sie uns unter:
📧 info@ahnenforscher.de
📞 +49 123 456 789

Mit freundlichen Grüßen
Ihr Ahnenforscher Team`
        },
        'support': {
            subject: 'Support-Anfrage - Ahnenforscher',
            content: `Hallo ${recipientName},

vielen Dank für Ihre Support-Anfrage.

Unser genealogisches Team wird sich innerhalb von 24 Stunden mit Ihnen in Verbindung setzen, um Ihr Anliegen zu klären.

Ihre Anfrage wurde mit der Referenznummer #${Math.floor(Math.random() * 10000)} registriert.

Für dringende Angelegenheiten erreichen Sie uns unter:
📞 +49 123 456 789

Mit freundlichen Grüßen
Ihr Ahnenforscher Support Team`
        },
        'invoice': {
            subject: 'Rechnung - Ahnenforscher',
            content: `Hallo ${recipientName},

anbei erhalten Sie Ihre Rechnung für die erbrachten Ahnenforschungsdienstleistungen.

Rechnungsnummer: INV-${Math.floor(Math.random() * 100000)}
Rechnungsdatum: ${new Date().toLocaleDateString('de-DE')}
Fälligkeitsdatum: ${new Date(Date.now() + 14 * 24 * 60 * 60 * 1000).toLocaleDateString('de-DE')}

Zahlungsinformationen:
IBAN: DE89 3704 0044 0532 0130 00
BIC: COBADEFFXXX
Verwendungszweck: Rechnungsnummer

Vielen Dank für Ihr Vertrauen!

Mit freundlichen Grüßen
Ihr Ahnenforscher Team`
        },
        'newsletter': {
            subject: 'Ahnenforscher Newsletter - Neueste Updates',
            content: `Hallo ${recipientName},

hier sind die neuesten Updates und Features von Ahnenforscher:

🚀 Neue Features:
• Verbesserte Ahnenforschungs-Tools
• Dark Blue Theme für genealogische Plattformen
• Erweiterte E-Mail-Generator-Funktionen

📦 Neue Downloads verfügbar:
• Ahnenforschung Starter Kit v2.1.0
• Genealogie Framework v1.8.5
• Ahnenforschung Mobile App v3.2.1

💡 Tipp der Woche:
Nutzen Sie unseren E-Mail-Generator für professionelle genealogische Kommunikation!

Bleiben Sie auf dem Laufenden und folgen Sie uns auf unseren Social Media Kanälen.

Mit freundlichen Grüßen
Ihr Ahnenforscher Team`
        }
    };
    
    if (emailTemplates[emailType]) {
        const template = emailTemplates[emailType];
        emailContent.innerHTML = `
            <div style="margin-bottom: 1rem;">
                <strong>Betreff:</strong> ${template.subject}
            </div>
            <div style="white-space: pre-line;">${template.content}</div>
        `;
        showNotification('E-Mail erfolgreich generiert!', 'success');
    } else {
        showNotification('Bitte wählen Sie einen E-Mail-Typ aus.', 'error');
    }
}

// Copy email content to clipboard
function copyEmail() {
    const emailContent = document.getElementById('emailContent');
    const textToCopy = emailContent.textContent || emailContent.innerText;
    
    navigator.clipboard.writeText(textToCopy).then(() => {
        showNotification('E-Mail-Inhalt in die Zwischenablage kopiert!', 'success');
    }).catch(() => {
        showNotification('Fehler beim Kopieren. Bitte manuell kopieren.', 'error');
    });
}

// Email validation function
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Notification system
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 1rem 2rem;
        border-radius: 8px;
        color: white;
        font-weight: 500;
        z-index: 10000;
        animation: slideIn 0.3s ease;
        max-width: 300px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    `;
    
    // Set background color based on type
    if (type === 'success') {
        notification.style.background = '#10b981';
    } else if (type === 'error') {
        notification.style.background = '#ef4444';
    } else if (type === 'info') {
        notification.style.background = '#3b82f6';
    }
    
    // Add to page
    document.body.appendChild(notification);
    
    // Remove after 4 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 300);
    }, 4000);
}

// Add CSS animations for notifications
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Add parallax effect to hero section
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const hero = document.querySelector('.hero');
    
    if (hero) {
        const rate = scrolled * -0.5;
        hero.style.transform = `translateY(${rate}px)`;
    }
});

// Add counter animation to stats
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);
    
    const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(start);
        }
    }, 16);
}

// Animate counters when they come into view
const stats = document.querySelectorAll('.stat-number');
const statsObserver = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const target = parseInt(entry.target.textContent);
            animateCounter(entry.target, target);
            statsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

stats.forEach(stat => {
    statsObserver.observe(stat);
});

// Add hover effects to download cards
document.addEventListener('DOMContentLoaded', function() {
    const downloadCards = document.querySelectorAll('.download-card');
    
    downloadCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Add hover effects to license cards
    const licenseCards = document.querySelectorAll('.license-card');
    
    licenseCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            if (!this.classList.contains('featured')) {
                this.style.transform = 'translateY(-5px) scale(1.02)';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            if (!this.classList.contains('featured')) {
                this.style.transform = 'translateY(0) scale(1)';
            }
        });
    });
}); 