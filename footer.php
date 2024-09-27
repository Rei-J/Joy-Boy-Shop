<?php 
    //require_once 'includes/contact_view.php'; to check the errors
?>
<footer class="footer-main">
    <section class="footer-contact wrapper-main">
        <div class="footer-contact-1">
            <div class="value-for-money">
                <div class="value-for-money-img"></div>
                <div class="value-for-money-text">
                    <h4>value-for-money</h4>
                    <p>we offer competitive <br>prices on our movies</p>
                </div>
            </div>
            <div class="shoppers-worldwide">
                <div class="shoppers-worldwide-img"></div>
                <div class="shoppers-worldwide-text">
                    <h4>shoppers worldwide</h4>
                    <p>more than 300 millions shoppers <br> from 200+ countries & regions</p>
                </div>
            </div>
            <div class="fast-delivery">
                <div class="fast-delivery-img"></div>
                <div class="fast-delivery-text">
                    <h4>fast delivery</h4>
                    <p>faster delivery on selected movies<br>thanks to our improved logistics</p>
                </div>
            </div>
        </div>
        <div class="footer-contact-2">
            <div class="safe-payments">
                <div class="safe-payments-img"></div>
                <div class="safe-payments-text">
                    <h4>safe payments</h4>
                    <p>safe payment methods preferred <br>by international shoppers</p>
                </div>
            </div>
            <div class="buyer-protection">
                <div class="buyer-protection-img"></div>
                <div class="buyer-protection-text">
                    <h4>buyer protection</h4>
                    <p>get a refund if movies arrive late <br>or are not sent to your PC</p>
                </div>
            </div>
            <div class="download-app">
                <div class="download-app-img"></div>
                <div class="download-app-text">
                    <h4>download the app</h4>
                    <p>shop anywhere & anytime</p>
                </div>
            </div>
        </div>

        <div class="download-options">
            <p>download on: </p>
            <a href="https://play.google.com/store/games?device=windows" target="_blank" class="play-store"></a>
            <a href="https://www.apple.com/app-store/" target="_blank" class="app-store"></a>
        </div>

        <div class="pay-option">
            <p>pay with: </p>
            <div class="visa"></div>
            <div class="mastercard"></div>
            <div class="paypal"></div>
            <div class="google-pay"></div>
            <div class="apple-pay"></div>
            <div class="american-express"></div>
        </div>
    </section>

    <section class="footer-message wrapper-main">
        <form action="includes/contact.inc.php" method="post">
            <h3>we are here to help you !</h3>
            <input type="text" name="name"  class="name" placeholder="enter your name">
            <input type="email" name="email"  class="email" placeholder="enter your email">
            <input type="tel" name="no_phone"  class="no_phone" placeholder="enter your phone number">
            <textarea name="messagebox"  cols="20" rows="5" class="messagebox" placeholder="say something!"></textarea>
            <button type="submit" class="btn" name="sendMessage">send the message</button>
        </form>
        <?php //check____Errors(); ?>
    </section>
</footer>

    