<?php require_once 'header.php' ?>



<header>
        <nav class="navbar">
            <div class="logo">MyShop</div>
            <ul class="nav-links">
                <li><a href="home.html">Accueil</a></li>
                <li><a href="#apropos">À propos</a></li>
                <li><a href="#produits">Produits</a></li>
            </ul>
            <div class="cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>
            </div>
        </nav>
    </header>

    <section id="cart" class="section">
        <h2>Votre Panier</h2>
        <div class="cart-list">
            <div class="cart-item">
                <img src="https://via.placeholder.com/100" alt="Produit 1">
                <div class="item-details">
                    <h3>Produit 1</h3>
                    <p>Prix : $20</p>
                    <div class="item-controls">
                        <button class="btn decrease">-</button>
                        <span class="quantity">1</span>
                        <button class="btn increase">+</button>
                    </div>
                </div>
                <button class="btn remove">Retirer</button>
            </div>
            <div class="cart-item">
                <img src="https://via.placeholder.com/100" alt="Produit 2">
                <div class="item-details">
                    <h3>Produit 2</h3>
                    <p>Prix : $35</p>
                    <div class="item-controls">
                        <button class="btn decrease">-</button>
                        <span class="quantity">2</span>
                        <button class="btn increase">+</button>
                    </div>
                </div>
                <button class="btn remove">Retirer</button>
            </div>
        </div>
        <div class="cart-summary">
            <h3>Total : $90</h3>
            <button class="btn checkout">Passer à la caisse</button>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 MyShop. Tous droits réservés.</p>
    </footer>
</body>
</html>
