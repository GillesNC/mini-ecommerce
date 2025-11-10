<footer>
    <section class="reassurance">
        <div class="reassurance_item">
            <i class="fa-solid fa-truck-fast"></i>
            <p>Livraison rapide</p>
        </div>
        <div class="reassurance_item">
            <i class="fa-solid fa-industry"></i>
            <p>Produit 100% français</p>
        </div>        
        <div class="reassurance_item">
            <i class="fa-solid fa-credit-card"></i>
            <p>Paiement sécurisé</p>
        </div>
        <div class="reassurance_item">
            <i class="fa-solid fa-headset"></i>
            <p>Garantie et SAV</p>
        </div>
    </section>
    <section class="menu">
        <div class="logo_footer">
            <a href="index.php"><img src="assets/logo.svg" alt="Logo Mini Ecommerce"></a>
            <div class="social_media">
                <a href="#"><i class="fa-brands fa-instagram"></i></a>                
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
        <div class="nav">
            <div class="nav_section">
                <h3>Tous nos produits</h3>
                <ul>
                    <li><a href="#">Nos meilleurs produits</a></li>
                    <li><a href="#">Promotions</a></li>
                    <li><a href="#">Nouveautés</a></li>
                </ul>
            </div>
            <div class="nav_section">
                <h3>Mini-Ecommerce</h3>
                <ul>
                    <li><a href="#">Qui sommes nous ?</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="nav_section">
                <h3>Mon compte</h3>
                <ul>

                <?php
                    if (isset($_SESSION['user'])) {
                        echo '<li><a href="?route=profil">Mon profil</a></li>';
                        echo '<li><a href="?route=seller">Gérer mes produits</a></li>';
                        echo '<li><a href="?route=logout">Déconnexion</a></li>';
                    } else {
                        echo '<li><a href="?route=register">S\'inscrire</a></li>';
                    }
                ?>

                </ul>
            </div>
        </div>
    </section>
    <section class="legacy">
        <div>
            <p>©mini-ecommerce2025 | CGV | Mentions légales</p>
            <p>18-19 Place des Reflets Tour Aurore 92400 Paris La Défense</p>    
        </div>
    </section>
</footer>
</body>
</html>