<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahnenforscher - Deutsche Plattform</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <div class="nav-brand">
                <h1><i class="fas fa-search"></i> Ahnenforscher</h1>
            </div>
            <ul class="nav-menu">
                <li><a href="#downloads" class="nav-link">Programm Download</a></li>
                <li><a href="#licenses" class="nav-link">Lizenzbestellung</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home" class="hero">
            <div class="container">
                <div class="hero-content">
                    <h2>Willkommen bei Ahnenforscher</h2>
                    <p>Die moderne Plattform für professionelle Ahnenforschung und genealogische Lösungen.</p>
                    <div class="hero-stats">
                        <?php
                        $currentTime = date('Y-m-d H:i:s');
                        $visitorCount = isset($_COOKIE['visitor_count']) ? $_COOKIE['visitor_count'] + 1 : 1;
                        setcookie('visitor_count', $visitorCount, time() + (86400 * 30), "/");
                        ?>
                        <div class="stat">
                            <span class="stat-number"><?php echo $visitorCount; ?></span>
                            <span class="stat-label">Besucher</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number"><?php echo date('Y'); ?></span>
                            <span class="stat-label">Jahr</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number"><?php echo date('H:i'); ?></span>
                            <span class="stat-label">Zeit</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="downloads" class="downloads">
            <div class="container">
                <h2><i class="fas fa-download"></i> Downloads</h2>
                <div class="download-grid">
                    <div class="download-card">
                        <div class="download-icon">
                            <i class="fas fa-file-code"></i>
                        </div>
                        <h3>Ahnenforschung Starter Kit</h3>
                        <p>Komplettes Ahnenforschungs-Tool mit modernem Design und Sicherheitsfeatures.</p>
                        <div class="download-info">
                            <span class="version">v2.1.0</span>
                            <span class="size">15.2 MB</span>
                        </div>
                        <button class="btn btn-download" onclick="downloadFile('php-starter-kit.zip')">
                            <i class="fas fa-download"></i> Herunterladen
                        </button>
                    </div>
                    
                    <div class="download-card">
                        <div class="download-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h3>Genealogie Framework</h3>
                        <p>Modernes Genealogie-Framework mit Dark Blue Theme und Responsive Design.</p>
                        <div class="download-info">
                            <span class="version">v1.8.5</span>
                            <span class="size">8.7 MB</span>
                        </div>
                        <button class="btn btn-download" onclick="downloadFile('css-framework.zip')">
                            <i class="fas fa-download"></i> Herunterladen
                        </button>
                    </div>
                    
                    <div class="download-card">
                        <div class="download-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Ahnenforschung Mobile App</h3>
                        <p>Responsive Mobile-First Ahnenforschungs-App mit PWA-Features.</p>
                        <div class="download-info">
                            <span class="version">v3.2.1</span>
                            <span class="size">22.1 MB</span>
                        </div>
                        <button class="btn btn-download" onclick="downloadFile('mobile-template.zip')">
                            <i class="fas fa-download"></i> Herunterladen
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section id="licenses" class="licenses">
            <div class="container">
                <h2><i class="fas fa-key"></i> Lizenzen & Bestellungen</h2>
                <div class="license-grid">
                    <div class="license-card">
                        <div class="license-header">
                            <h3>Basic License</h3>
                            <div class="price">€29<span>/Monat</span></div>
                        </div>
                        <ul class="license-features">
                            <li><i class="fas fa-check"></i> Persönliche Nutzung</li>
                            <li><i class="fas fa-check"></i> 5 Projekte</li>
                            <li><i class="fas fa-check"></i> E-Mail Support</li>
                            <li><i class="fas fa-check"></i> Updates</li>
                        </ul>
                        <button class="btn btn-license" onclick="orderLicense('basic')">
                            <i class="fas fa-shopping-cart"></i> Bestellen
                        </button>
                    </div>
                    
                    <div class="license-card featured">
                        <div class="license-badge">Beliebt</div>
                        <div class="license-header">
                            <h3>Professional License</h3>
                            <div class="price">€79<span>/Monat</span></div>
                        </div>
                        <ul class="license-features">
                            <li><i class="fas fa-check"></i> Kommerzielle Nutzung</li>
                            <li><i class="fas fa-check"></i> Unbegrenzte Projekte</li>
                            <li><i class="fas fa-check"></i> Prioritäts-Support</li>
                            <li><i class="fas fa-check"></i> Premium Features</li>
                            <li><i class="fas fa-check"></i> API-Zugang</li>
                        </ul>
                        <button class="btn btn-license" onclick="orderLicense('professional')">
                            <i class="fas fa-shopping-cart"></i> Bestellen
                        </button>
                    </div>
                    
                    <div class="license-card">
                        <div class="license-header">
                            <h3>Enterprise License</h3>
                            <div class="price">€199<span>/Monat</span></div>
                        </div>
                        <ul class="license-features">
                            <li><i class="fas fa-check"></i> White-Label Lösung</li>
                            <li><i class="fas fa-check"></i> Dedizierter Support</li>
                            <li><i class="fas fa-check"></i> Custom Development</li>
                            <li><i class="fas fa-check"></i> SLA Garantie</li>
                        </ul>
                        <button class="btn btn-license" onclick="orderLicense('enterprise')">
                            <i class="fas fa-shopping-cart"></i> Bestellen
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container">
                <h2><i class="fas fa-envelope"></i> Kontakt & E-Mail Generator</h2>
                <div class="contact-grid">
                    <div class="contact-form-container">
                        <form class="contact-form" method="POST" action="process.php">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail:</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">Betreff:</label>
                                <select id="subject" name="subject" required>
                                    <option value="">Bitte wählen...</option>
                                    <option value="support">Technischer Support</option>
                                    <option value="sales">Verkauf & Beratung</option>
                                    <option value="partnership">Partnerschaft</option>
                                    <option value="other">Sonstiges</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message">Nachricht:</label>
                                <textarea id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn">
                                <i class="fas fa-paper-plane"></i> Nachricht senden
                            </button>
                        </form>
                    </div>
                    
                    <div class="email-generator">
                        <h3><i class="fas fa-magic"></i> E-Mail Generator</h3>
                        <div class="generator-controls">
                            <div class="form-group">
                                <label for="emailType">E-Mail Typ:</label>
                                <select id="emailType">
                                    <option value="welcome">Willkommens-E-Mail</option>
                                    <option value="support">Support-Anfrage</option>
                                    <option value="invoice">Rechnung</option>
                                    <option value="newsletter">Newsletter</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipientName">Empfänger Name:</label>
                                <input type="text" id="recipientName" placeholder="Max Mustermann">
                            </div>
                            <button class="btn btn-generate" onclick="generateEmail()">
                                <i class="fas fa-magic"></i> E-Mail generieren
                            </button>
                        </div>
                        <div class="generated-email">
                            <h4>Generierte E-Mail:</h4>
                            <div id="emailContent" class="email-content">
                                <p>Wählen Sie einen E-Mail-Typ und klicken Sie auf "E-Mail generieren".</p>
                            </div>
                            <button class="btn btn-copy" onclick="copyEmail()">
                                <i class="fas fa-copy"></i> Kopieren
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4><i class="fas fa-search"></i> Ahnenforscher</h4>
                    <p>Professionelle Ahnenforschung und genealogische Lösungen für Familienhistoriker.</p>
                </div>
                <div class="footer-section">
                    <h4>Links</h4>
                    <ul>
                        <li><a href="#downloads">Programm Download</a></li>
                        <li><a href="#licenses">Lizenzbestellung</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Kontakt</h4>
                    <p><i class="fas fa-envelope"></i> info@ahnenforscher.de</p>
                    <p><i class="fas fa-phone"></i> +49 123 456 789</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Ahnenforscher. Alle Rechte vorbehalten.</p>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html> 