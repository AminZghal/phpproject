<?php
include_once "header.php";
include_once "connect.php";



//if (empty($_SESSION['username'])) {
   // header("Location: login.php");
//}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Gérer la soumission du formulaire ici, y compris le téléchargement d'image si nécessaire
    // Vous pouvez utiliser $_FILES['image'] pour accéder au fichier image téléchargé
}

?>

<body>
    <div class="container-xl">
        <div class="form-container">
            <h2>Add Product</h2>
            <form action="addproduct.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="unit_price">Price:</label>
                    <input type="number" id="price" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Designiation">Designiation</label>
                    <!-- Utilisez une liste déroulante pour récupérer les valeurs de la table "categorie" -->
                    <input type="text" id="Designiation" name="Designiation" class="form-control" required>
                
                </div>
                <div class="form-group">
                    <label for="image">Product Image:</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <?php
    include_once "footer.php";
    ?>
</body>
