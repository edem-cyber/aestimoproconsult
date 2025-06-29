/**
 * Website Security Protection - Client Side
 * Aestimo Pro Consult - Advanced Protection System
 */

(function () {
    'use strict';

    // Anti-debugging and developer tools detection
    let devtools = {
        open: false,
        orientation: null
    };

    // Disable right-click context menu
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
        e.stopPropagation();
        showSecurityWarning('Right-click disabled for security purposes');
        return false;
    }, true);

    // Disable text selection
    document.addEventListener('selectstart', function (e) {
        e.preventDefault();
        return false;
    }, false);

    // Disable drag and drop
    document.addEventListener('dragstart', function (e) {
        e.preventDefault();
        return false;
    }, false);

    // Disable printing
    window.addEventListener('beforeprint', function (e) {
        e.preventDefault();
        showSecurityWarning('Printing is disabled for security purposes');
        return false;
    });

    // Disable common keyboard shortcuts
    document.addEventListener('keydown', function (e) {
        // Disable F12 (Developer Tools)
        if (e.keyCode === 123) {
            e.preventDefault();
            showSecurityWarning('Developer tools access blocked');
            return false;
        }

        // Disable Ctrl+Shift+I (Inspector)
        if (e.ctrlKey && e.shiftKey && e.keyCode === 73) {
            e.preventDefault();
            showSecurityWarning('Developer tools access blocked');
            return false;
        }

        // Disable Ctrl+Shift+J (Console)
        if (e.ctrlKey && e.shiftKey && e.keyCode === 74) {
            e.preventDefault();
            showSecurityWarning('Console access blocked');
            return false;
        }

        // Disable Ctrl+U (View Source)
        if (e.ctrlKey && e.keyCode === 85) {
            e.preventDefault();
            showSecurityWarning('View source disabled');
            return false;
        }

        // Disable Ctrl+S (Save Page)
        if (e.ctrlKey && e.keyCode === 83) {
            e.preventDefault();
            showSecurityWarning('Save page disabled');
            return false;
        }

        // Disable Ctrl+A (Select All)
        if (e.ctrlKey && e.keyCode === 65) {
            e.preventDefault();
            showSecurityWarning('Select all disabled');
            return false;
        }

        // Disable Ctrl+P (Print)
        if (e.ctrlKey && e.keyCode === 80) {
            e.preventDefault();
            showSecurityWarning('Printing disabled');
            return false;
        }

        // Disable Ctrl+C (Copy)
        if (e.ctrlKey && e.keyCode === 67) {
            e.preventDefault();
            showSecurityWarning('Copy disabled');
            return false;
        }

        // Disable Ctrl+X (Cut)
        if (e.ctrlKey && e.keyCode === 88) {
            e.preventDefault();
            showSecurityWarning('Cut disabled');
            return false;
        }

        // Disable Ctrl+V (Paste)
        if (e.ctrlKey && e.keyCode === 86) {
            e.preventDefault();
            return false;
        }
    }, true);

    // Developer tools detection
    function detectDevTools() {
        let threshold = 160;
        let detected = false;

        if (window.outerHeight - window.innerHeight > threshold ||
            window.outerWidth - window.innerWidth > threshold) {
            detected = true;
        }

        if (detected && !devtools.open) {
            devtools.open = true;
            showSecurityWarning('Developer tools detected - Access monitored');

            // Redirect or block access
            setTimeout(function () {
                if (confirm('Unauthorized access detected. Continue to homepage?')) {
                    window.location.href = '/';
                } else {
                    window.close();
                }
            }, 2000);
        }

        if (!detected && devtools.open) {
            devtools.open = false;
        }
    }

    // Check for developer tools every 500ms
    setInterval(detectDevTools, 500);

    // Console warning
    if (typeof console !== 'undefined') {
        console.clear();
        console.log('%cSTOP!', 'color: red; font-size: 50px; font-weight: bold;');
        console.log('%cThis is a browser feature intended for developers. Unauthorized access to this website\'s code is prohibited.', 'color: red; font-size: 16px;');
        console.log('%cAestimo Pro Consult - All rights reserved', 'color: #66b0df; font-size: 14px;');
    }

    // Clear console periodically
    setInterval(function () {
        if (typeof console !== 'undefined') {
            console.clear();
        }
    }, 3000);

    // Disable image dragging
    document.addEventListener('DOMContentLoaded', function () {
        let images = document.querySelectorAll('img');
        images.forEach(function (img) {
            img.addEventListener('dragstart', function (e) {
                e.preventDefault();
                return false;
            });

            // Disable right-click on images specifically
            img.addEventListener('contextmenu', function (e) {
                e.preventDefault();
                showSecurityWarning('Image protection active');
                return false;
            });
        });
    });

    // Detect automated tools
    function detectAutomatedTools() {
        // Check for common automation indicators
        if (window.navigator.webdriver ||
            window.document.documentElement.getAttribute('webdriver') ||
            window.navigator.plugins.length === 0 ||
            window.document.$cdc_asdjflasutopfhvcZLmcfl_ ||
            window.document.$chrome_asyncScriptInfo ||
            window.__nightmare ||
            window._phantom ||
            window.callPhantom) {

            // Automated tool detected
            showSecurityWarning('Automated access detected');
            window.location.href = 'about:blank';
            return;
        }
    }

    // Check for automation on load
    detectAutomatedTools();

    // Monitor for suspicious activity
    let mouseMovements = 0;
    let keystrokes = 0;
    let startTime = Date.now();

    document.addEventListener('mousemove', function () {
        mouseMovements++;
    });

    document.addEventListener('keydown', function () {
        keystrokes++;
    });

    // Check human activity every 30 seconds
    setInterval(function () {
        let timeElapsed = (Date.now() - startTime) / 1000;

        if (timeElapsed > 30 && mouseMovements < 5 && keystrokes < 3) {
            // Possible bot behavior
            showSecurityWarning('Suspicious activity detected');
        }

        // Reset counters
        mouseMovements = 0;
        keystrokes = 0;
        startTime = Date.now();
    }, 30000);

    // Obfuscate page content
    function obfuscateContent() {
        // Add invisible characters and scramble text content
        let textNodes = document.createTreeWalker(
            document.body,
            NodeFilter.SHOW_TEXT,
            null,
            false
        );

        let node;
        while (node = textNodes.nextNode()) {
            if (node.nodeValue.trim() !== '') {
                // Add invisible zero-width characters
                node.nodeValue = node.nodeValue.replace(/\s/g, '\u200B \u200C');
            }
        }
    }

    // Apply content obfuscation after page load
    window.addEventListener('load', function () {
        setTimeout(obfuscateContent, 1000);
    });

    // Show security warning
    function showSecurityWarning(message) {
        // Create and show warning popup
        if (document.getElementById('security-warning')) return;

        let warning = document.createElement('div');
        warning.id = 'security-warning';
        warning.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #ff4444, #cc0000);
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: bold;
            z-index: 99999;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            border: 2px solid #ff0000;
        `;
        warning.innerHTML = '⚠️ ' + message;

        document.body.appendChild(warning);

        setTimeout(function () {
            if (document.getElementById('security-warning')) {
                document.body.removeChild(warning);
            }
        }, 3000);
    }

    // Disable iframe embedding
    if (window.top !== window.self) {
        window.top.location = window.self.location;
    }

    // Monitor for URL changes (back button, etc.)
    let currentUrl = window.location.href;
    setInterval(function () {
        if (window.location.href !== currentUrl) {
            currentUrl = window.location.href;
            // Reapply protections on URL change
            setTimeout(function () {
                detectAutomatedTools();
                obfuscateContent();
            }, 100);
        }
    }, 1000);

    // Disable clipboard access
    document.addEventListener('copy', function (e) {
        e.clipboardData.setData('text/plain', 'Copyright © Aestimo Pro Consult - Unauthorized copying prohibited');
        e.preventDefault();
    });

    // Add protection CSS
    let protectionCSS = document.createElement('style');
    protectionCSS.textContent = `
        * {
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none !important;
            -webkit-touch-callout: none !important;
            -webkit-tap-highlight-color: transparent !important;
        }
        
        body {
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none !important;
        }
        
        @media print {
            body { display: none !important; }
        }
        
        img {
            pointer-events: none !important;
            -webkit-user-drag: none !important;
            -khtml-user-drag: none !important;
            -moz-user-drag: none !important;
            -o-user-drag: none !important;
            user-drag: none !important;
        }
    `;
    document.head.appendChild(protectionCSS);

    console.clear();

})(); 