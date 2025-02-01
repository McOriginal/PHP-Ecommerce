
<?php 
    $title = "A Propos du site";
    css_link("./assets/css/about.css");
?>


    <!-- Section Header -->
    <header class="about-header text-white text-center">
        <div class="container">
            <h1 class="h1">À Propos de Notre Boutique</h1>
            <p class="p">Découvrez notre histoire et nos valeurs</p>
        </div>
    </header>

    <!-- Header Contenuur -->

    <div class="future-image">
        <div class="row mt-5 future">
            <div class="col-sm-3">
                <img src="./assets/images/pomme.jpeg" alt="" srcset="" class="img-fluid product-card">
            </div>
            <div class="col-sm-3">
                <img src="./assets/images/orange.jpeg" alt="Image d'accueil" class="img-fluid product-card">
            </div>
            <div class="col-sm-3">
                <img src="./assets/images/oignon.jpeg" alt="Image d'accueil" class="img-fluid product-card">
            </div>
            <div class="col-sm-3">
                <img src="./assets/images/auberge.jpeg" alt="Image d'accueil" class="img-fluid product-card">
            </div>
        </div>
    </div>


    <!-- Section Présentation -->
    <section class="presentation my-5">
        <div class="row align-items-center slice1">
            <div class="col-md-6">
                <h2>Qui sommes-nous ?</h2>
                <hr class="divider">
                <p>Nous sommes une boutique en ligne passionnée par la qualité et la satisfaction client. Depuis notre création, nous nous efforçons d'offrir les meilleurs produits avec un excellent service.</p>
                <p>Notre mission est de rendre le shopping en ligne agréable, sûr et accessible à tous.</p>
            </div>
            <div class="col-md-6">
                <img src="./assets/images/recolte.jpeg" class="img-fluid rounded" alt="Notre équipe">
            </div>
        </div>
    </section>

    <!-- Chiffres Clés -->
    <section class="stats-section text-center text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 counter-parent">
                    <h2 class="counter" data-target="5000">0</h2>
                    <p>Clients satisfaits</p>
                </div>
                <div class="col-md-4 counter-parent">
                    <h2 class="counter" data-target="150">0</h2>
                    <p>Produits en stock</p>
                </div>
                <div class="col-md-4 counter-parent">
                    <h2 class="counter" data-target="10">0</h2>
                    <p>Années d'expérience</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Contact -->
    <section class="contact-section my-5">
        <div class="container contact">
            <h2 class="h2 text-center my-3">Contactez-Nous</h2>
            <form action="#" method="post">
                <div class="form-group py-2">
                    <input type="text" class="form-control py-2" placeholder="Votre nom">
                </div>
                <div class="form-group py-2">
                    <input type="email" class="form-control py-2" placeholder="Votre adresse email">
                </div>
                <div class="form-group py-2">
                    <textarea class="form-control py-2" rows="3" placeholder="Votre message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="container my-5">
        <h2 class="text-center">Nos Clients Témoignent</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="testimonial">
                        <p>"Service client exceptionnel et produits de qualité !"</p>
                        <h5>- Papejr</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial">
                        <p>"Livraison rapide et soignée, je recommande fortement."</p>
                        <h5>- Karim</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial">
                        <p>"Meilleure boutique en ligne, toujours satisfaite de mes achats."</p>
                        <h5>- Mohamed Cissé</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial">
                        <p>"Je vous recommande leurs services !"</p>
                        <h5>- Fatoumata Traoré</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial">
                        <p>"Plus que jamais d'être sûr de la qualité de leurs produits"</p>
                        <h5>- Mr Soumbounou</h5>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/about.js"></script>

</body>
</html>