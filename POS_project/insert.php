<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");

$conn = mysqli_connect('localhost','root','','pos_project');
if (isset($_POST['submit'])){ 
    $name = $_POST['name'];
    $category = $_POST['category'];
     $product_source = $_POST['product_source'];
     $quantity = $_POST['quantity'];
     $subcategory = $_POST['subcategory'];
   
     $product = $_FILES['image']['name'];
     $temp =$_FILES['image']['temp_name'];
     move_uploaded_file($temp,"image/$product");
 


     $sql = "INSERT INTO products(name,category,product_source,quantity,subcategory,image) VALUES ('$name','$category','$product_source','$quantity','$subcategory','$product')";
     if(mysqli_query($conn, $sql) == TRUE){ 
        echo "DATA INSERTED";
        header("Location:view.php");
     }else{ 
        echo "not inserted";
     }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


   <div class="container  border border-success bg-white"> 

    <div class="row">


            <center>
            <div class="content-header">
                    <div class="container-fluid">
                        <div class="row"> 
                            <div class="col-md-6"></div>
                                <div class="col-md-6"> 
                                    <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="">Home</a></li>
                                    <li class="breadcrumb-item">Dashboard</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
            </div>

          <section class="content">
            <div class="container-fluid">
              <!-- .row -->
               <div class="card">
                    <div class="card-header bg-white">
                         <h3 class="card-title"><b>Add a new product</b></h3>


                    </div>
                </div>
    
                    <form action="insert.php" method="POST" >
                    <br> 
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group"> 
                            <label for="name"> Product_Name :</label>
                                <input type ="text" name ="name" class="form-control" id="name" placeholder="Product name" ><br><br>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                 <label for="product_source"> Product_Source :</label>
                            <select name="product_source" id="product_source" class="form-control select2">
                             <option value="factory">Factory</option>
                              <option value="buy">Buying</option>
                            </select>
                             
                            </div>
                        </div>
                    </div>
                <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                    
                           

                            <label for="category">Product Category :</label>
                                <select  class="form-control select2" name="category" id="category">
                                 <option disabled selected>Select a catagory</option>
                        
                                    <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'pos_project');
                                        $query = "SELECT * FROM category ";
                                        $query_run = mysqli_query($conn,  $query);
                                        if (mysqli_num_rows($query_run)>0) {
                                        foreach ($query_run as $row) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row ['catname']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                         </div>
                         </div>

                         <div class="col-md-6">
                             <div class="form-group">
                            <label for="subcategory">sub-category</label>
                            <select  class="form-control select2" name="subcategory" id="subcategory">
                                 <option disabled selected>Select a catagory</option>
                        
                                    <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'pos_project');
                                        $query = "SELECT * FROM sub_category ";
                                        $query_run = mysqli_query($conn,  $query);
                                        if (mysqli_num_rows($query_run)>0) {
                                        foreach ($query_run as $row) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row ['subcatname']?></option>
                                        <?php
                                        }
                                        }
                                    ?>
                                </select>
                           </div>
                         </div>

                       
                </div>
                <br>
                <div class="row">

                <div class="col-md-6">
                        <div class="form-group">
                            <label for="quantity">Quantity :</label>
                            <input name="quantity" type="text" id="quantity" class="form-control select2" >
                        </div>
                        </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="unit">Unit :</label>
                                    <select name="unit" id="unit" class="form-control select2">
                                        <option value="KG">KG</option>
                                        <option value="Pound">Pound</option>
                                        <option value="Piece">Piece</option>
                                    </select>
                                </div>
                            </div>
                </div>

               
            </div>
                         <br><br>
                         <label for="image">Image</label>
            <input type="file" id="image" name="image"><br><br> 
                
                         <div class="row text-center  buttons">
                            <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                           
                <input type ="submit" name ="submit" value="insert" class="btn btn-info">
                <a href="view.php" class="btn btn-info">Viewresult</a>
                <br><br>
            
                            </div>
                          </div>
                
                <br> <br>
               
            </form>
   
        <div class="col-sm-2 "></div>
        
    

    </center>

 </div>
   
    

</div>

<?php 
    include("includes/footer.php");
?>