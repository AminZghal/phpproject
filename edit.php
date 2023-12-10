<?php
include_once "header.php";
include_once "connect.php";

/*if (empty($_SESSION['username'])) {
    header("Location: login.php");
}*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission (update the database)
    $existingImagePath = isset($_POST['image']) ? $_POST['image'] : '';
    // Add your code here to update the database with the new values
} else {
    // Fetch existing values from the database
    if (isset($_GET['edit'])) {
        $editProductId = $_GET['edit'];
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $editProductId, PDO::PARAM_INT);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_OBJ);
                   
        $stmt->closeCursor();
            $product_name = $row->name;
            $unit_price = $row->price;
            $Designiation = $row->Designiation;
            $imagePath =$row->image ;
            // You might need to adjust the column names based on your actual database structure

            // Display the form with the fetched values
       
        }
    } 

?>

<body>
    <div class="container-xl">
        <div class="form-container">
            <h2>Edit Product</h2>
            <form action=<?php echo 'edit_product.php?edit=' . $_GET['edit']; ?> method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $product_name; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="unit_price">Unit Price:</label>
                    <input type="number" id="price" name="price" class="form-control" value="<?php echo $unit_price; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Designiation">Designiation</label>
                    <!-- Utilize a dropdown to retrieve values from the "categorie" table -->
                    <input type="text" id="Designiation" name="Designiation" class="form-control"value="<?php echo $Designiation; ?>" required>

                    <div class="form-group">
                    <label for="image">Product Image:</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    <?php if (!empty($imagePath)) : ?>
                     <p>Existing Image: <?php echo $imagePath; ?></p>
                     <?php endif; ?>
                    </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
    <?php
    include_once "footer.php";
    ?>
