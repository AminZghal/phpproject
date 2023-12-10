<?php
include_once "header.php";
include "connect.php";
if(empty($_SESSION['email'])){
    header("Location: ../index.php");
}
?>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customer <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mb-3">
                <a href="add_product.php" class="btn btn-primary">Add Product</a>
            </div>
            
            <table class="table table-striped table-hover table-bordered">
                
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Prix </th>
                        <th>Designiation</th>
                        <th>Image</th>
                        
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                   <?php
                   if (isset($_GET["del"])){
                    $sql="DELETE FROM products WHERE`id` =".$_GET['del'];
                    $res=$con->query($sql);
                    header("Location: crudProduit.php");
                    }
                    $req="SELECT * FROM `products` WHERE 1";                   
                    $result=$pdo->query($req);
                   $rows = $result->fetchAll(PDO::FETCH_OBJ);
                   
                   $result->closeCursor();
                   
                   
                  if (!(empty($_SESSION['email']))){
                    
                   
                    foreach($rows as $row){
                        echo "<tr>";
                        echo "<td>$row->id</td>";
                        echo "<td>$row->name</td>";
                        echo "<td>$row->price</td>";
                        echo "<td>$row->Designiation</td>";

                        echo "<td><img src='../images/$row->image' style='height: 50px;''></td>";
                        

                    echo"
                   <td>
                       <a href='#' class='view' title='View' data-toggle='tooltip'><i class='material-icons'>&#xE417;</i></a>
                       <a href='edit.php?edit=$row->id' class='edit' title='Edit' data-toggle='tooltip'><i class='material-icons'>&#xE254;</i></a>
                       <a href='?del=$row->id' class='delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>&#xE872;</i></a>
                   </td>";
                    echo"</tr>";
                    }
                }
                   
                   ?>
                </tbody>
                
            </table>
            <!--<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>-->
        </div>
    </div>  
</div>  

