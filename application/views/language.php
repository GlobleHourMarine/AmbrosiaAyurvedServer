<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Instant Language Switcher</title>
    <style>
        #google_translate_element {
            display: none;
        }

        .goog-te-banner-frame.skiptranslate,
        .goog-logo-link,
        .goog-te-gadget span,
        .goog-te-menu-value {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

        nav {
            padding: 10px;
            background-color: #f0f0f0;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav li {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        button {
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Language Switcher -->
    <nav>
        <ul>
            <li>
                🌐 Language:
                <button onclick="translateNow('en')">English</button>
                <button onclick="translateNow('hi')">Hindi</button>
                <button onclick="translateNow('ar')">Arabic</button>
                <button onclick="translateNow('ms')">Malay</button>
            </li>
        </ul>
    </nav>

    <h1>Welcome to the Website</h1>
    <p>This is a demo of instant dynamic language switching.</p>

    <!-- Hidden Google Translate Element -->
    <div id="google_translate_element"></div>

    <!-- Google Translate Script -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,hi,ar,ms',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }

        (function () {
            const gt = document.createElement('script');
            gt.type = 'text/javascript';
            gt.async = true;
            gt.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
            document.head.appendChild(gt);
        })();
    </script>

    <!-- Improved Translator -->
    <script>
        function translateNow(langCode) {
            const languageMap = {
                en: "English",
                hi: "Hindi",
                ar: "Arabic",
                ms: "Malay"
            };

            const langName = languageMap[langCode];
            if (!langName) {
                console.warn("Unsupported language code:", langCode);
                return;
            }

            let retries = 30;
            const interval = setInterval(() => {
                const iframe = document.querySelector('iframe.goog-te-menu-frame');
                if (iframe) {
                    try {
                        const innerDoc = iframe.contentDocument || iframe.contentWindow.document;
                        const items = innerDoc.querySelectorAll('.goog-te-menu2-item span.text');
                        for (let item of items) {
                            if (item.innerText.trim().toLowerCase() === langName.toLowerCase()) {
                                item.click();
                                clearInterval(interval);
                                return;
                            }
                        }
                    } catch (err) {
                        console.warn("Waiting for iframe to be ready...");
                    }
                }
                if (--retries < 0) {
                    clearInterval(interval);
                    alert("Translation engine took too long to respond. Please try again.");
                }
            }, 200);
        }
    </script>

</body>

</html>
