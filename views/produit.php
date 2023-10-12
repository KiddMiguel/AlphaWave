 <section class="container">
    <div class="row" id="listeProduit">
       <?php
         $produits = $unController->getProduits();

         foreach ($produits as $produit) {
            echo '
            <div class="col-lg-3 col-md-3 m-3 col-sm-3 card" style="width: 18rem;">
            <img src="' . $produit['image'] . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">'.$produit['intitule'].'</h5>
                <p class="card-text">'.$produit['description'].'</p>
                <div class="d-flex">
                <a href="#" class="btn btn-primary">Voir</a>
                <p href="#" class="ms-auto pb-2" class="btn btn-success">'.$produit['prix'].' €</p>
                </div>            
               </div>
        </div>';
         }

         ?>
    </div>
 </section>

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
 <script src="../public/javaScript/scriptProduit.js"></script>