<?php
// Call the separate router file
require_once __DIR__ . '/../router.php';

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aecreates</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo $asset_base; ?>/css/style.css">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="<?php echo $asset_base; ?>/images/aecreates.png">   
</head>

<body> 

    <div id="loader">
        <div class="loader-content">
            <div class="spinner"></div>
            <div class="loader-text">Sending message...</div>
        </div>
    </div>

    <?php include __DIR__ . '/../global/header.php'; ?>

    <section class="banner" id="interactiveBanner">
        <!-- MAIN TITLE -->
         
    <div class="main=box">
    <div class="bounding-box-wrapper" id="boundingBox">
        <!-- Selection Handles -->
        <div class="handle handle-tl"></div>
        <div class="handle handle-tc"></div>
        <div class="handle handle-tr"></div>
        <div class="handle handle-ml"></div>
        <div class="handle handle-mr"></div>
        <div class="handle handle-bl"></div>
        <div class="handle handle-bc"></div>
        <div class="handle handle-br"></div>

        <h1 class="tagline" id="typedText"></h1><span class="cursor" id="cursor"></span>
    </div>

    <script>
        const textTarget = document.getElementById('typedText');
        const plainText = 'Thank you';
        
        let charIndex = 0;
        let isDeleting = false;
        const typingSpeed = 120;
        const deletingSpeed = 80;
        const holdTime = 5000; // Pause for 5 seconds before backspacing

        function loopTyping() {
            if (!isDeleting) {
                // Forward typing animation
                if (charIndex <= plainText.length) {
                    if (charIndex <= 5) {
                        textTarget.innerHTML = plainText.substring(0, charIndex);
                    } else {
                        textTarget.innerHTML = 'Thank<span>' + plainText.substring(5, charIndex) + '</span>';
                    }
                    charIndex++;
                    setTimeout(loopTyping, typingSpeed);
                } else {
                    // Fully typed out, pause for 5 seconds then switch to deleting state
                    isDeleting = true;
                    setTimeout(loopTyping, holdTime);
                }
            } else {
                // Backward backspace animation
                if (charIndex >= 0) {
                    if (charIndex <= 5) {
                        textTarget.innerHTML = plainText.substring(0, charIndex);
                    } else {
                        textTarget.innerHTML = 'Thank<span>' + plainText.substring(5, charIndex) + '</span>';
                    }
                    charIndex--;
                    setTimeout(loopTyping, deletingSpeed);
                } else {
                    // Fully backspaced, reset states and restart typing loop
                    isDeleting = false;
                    charIndex = 0;
                    setTimeout(loopTyping, 400);
                }
            }
        }

        // Start loop on load
        setTimeout(loopTyping, 600);
    </script>

    <!-- END OF MAIN TITLE -->
    </div>
    <p>We have received your email. Expect a reply from us within the day to discuss your inquiry. Kindly check your email (spam messages). For the meantime, you can reach out to us through our Facebook page.</p>
    <a href="https://www.facebook.com/aecreates.by.ae" target="_blank" class="btn-primary">Aecreates Facebook Page</a>
    </section>

    
    <footer>
        <p>&copy; 2026 Aecreates Graphic Design Portfolio. All rights reserved.</p>
    </footer>

    <script src="<?php echo $asset_base; ?>/js/script.js"></script>
</body>

</html>