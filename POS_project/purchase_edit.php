<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>

<?php 
$conn = mysqli_connect('localhost','root','','pos_project');
if(isset($_GET['id'])){ 
    $getid = $_GET['id'];
   $sql = "SELECT * FROM products WHERE id=$getid";
   $query = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($query);
   $id = $data['id'];
   $name = $_POST['name'];
    $category = $_POST['category'];
     $product_source = $_POST['product_source'];
     $quantity = $_POST['quantity'];

     if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
         $product_source = $_POST['product_source'];
         $quantity = $_POST['quantity'];
     $sql1 = "UPDATE products SET name='$name',
                                category='$category',
                                product_source='$product_source',
                                quantity='$quantity' where id = '$id' ";
     if(mysqli_query($conn, $sql1) == TRUE){ 
        header('location:purchase_view.php');
        echo "DATA update";
     }else{ 
        echo $sqli1. "Data not update";
     }
    }
    


?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>


   <div class="container"> 
   <center>  
    <div class="row">
    
        <div class="col-sm-3"></div>
       
        <div class="col-sm-6 pt-4 mt-4 border border-success bg-dark text-white ">
            
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" > 
        Name:<br>
        <input type ="text" name ="name" value="<?php echo $name ?>"><br><br>
        category:<br>
        <input type ="text" name ="category" value="<?php echo $category ?>"><br><br>
        product_source:<br>
        <input type ="text" name ="product_source" value="<?php echo $product_source ?>"><br><br>
        quantity:<br>
        <input type ="text" name ="quantity" value="<?php echo $quantity ?>"><br><br>
        <input type ="text" name ="id" value =" <?php echo $id ?>" hidden><br>
        <input type ="submit" name ="edit" value="Edit" class="btn btn-info"><br><br>
    </form>
   
    </div>
    
        <div class="col-sm-3"></div>
    </div>
    </center>
   </div>
   
<?php 
    include("includes/footer.php");
