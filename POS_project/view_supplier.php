<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>

<?php 
$conn = mysqli_connect('localhost','root','','pos_project');
if (isset($_GET['deleteid'])){ 
    $deleteid = $_GET['deleteid'];

     $sql = "DELETE FROM  suppliers WHERE id = $deleteid";
     if(mysqli_query($conn, $sql) == TRUE){ 
        header('location:view_supplier.php');
     }
}


?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
   <div class="container"> 
    <div class="row"> 
    <p>
     
     <a href="insert.php">
        <h1 class="btn btn-success" style="text-color:#fff">Add New Data</h1></a>
    </p>
        <div class="col-sm-1"></div>
        <div class="col-sm-10 pt-4 mt-4 border border-success"> 
           
            <h3 class="text-center p-2 m-2 bg-success text-white">User Information</h3>
           
            <?php 
            $sql = 'SELECT * FROM suppliers';
            
            $query = mysqli_query($conn, $sql);
            echo "<table class='table table-success'>
             <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>MANUFACTURER_ID</th>
                <th>ACTION</th>
             </tr>";
           while ($data = mysqli_fetch_assoc($query)){ 

            $id = $data['id'];
            $name = $data['name'];
            $email = $data['email'];
            $phone = $data['phone'];
            echo "<tr> 
                    <td>$id</td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>
                    <span class='btn btn-success'><a href='edit_supplier.php?id=$id' class='text-white text-decoration-none'>Edit</a></span>
                    <span class='btn btn-danger'><a href='view_supplier.php?deleteid=$id' class='text-white text-decoration-none'>Delete</a></span>
                    </td>
                </tr>";
           }
            ?>
        </div>
        <div class="col-sm-1"></div>
    </div>
   </div>
   <?php 
    include("includes/footer.php");
?>