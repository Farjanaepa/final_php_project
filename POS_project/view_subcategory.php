
<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>

<?php 
$conn = mysqli_connect('localhost','root','','pos_project');
if (isset($_GET['deleteid'])){ 
    $deleteid = $_GET['deleteid'];

     $sql = "DELETE FROM sub_category WHERE id = $deleteid";
     if(mysqli_query($conn, $sql) == TRUE){ 
        header('location:view_subcategory.php');
     }
}


?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
   <div class="container"> 
    <div class="row"> 
    <p>
     
    <span class='btn btn-success'><a href='insert_subcategory.php' class='text-white text-decoration-none'>Add New Subcategory</a></span>
    </p>
        <div class="col-sm-1"></div>
        <div class="col-sm-10 pt-4 mt-4 border border-success bg-secondary text-white"> 
           
            <h3 class="text-center p-2 m-2 bg-dark text-white">subcategory Information</h3>
           
            <?php 
            $sql = 'SELECT * FROM sub_category';
            
            $query = mysqli_query($conn, $sql);
            echo "<table class='table table-success'>
             <tr class='table-dark'>
                <th>ID</th>
                <th>SUBCATEGORY NAME</th>
                <th>ACTION</th>
             </tr>";
           while ($data = mysqli_fetch_assoc($query)){ 

            $id = $data['id'];
            $subcatname = $data['subcatname'];

            echo "<tr> 
                    <td>$id</td>
                    <td>$subcatname</td>

                    <td>
                    <span class='btn btn-success'><a href='edit_subcategory.php?id=$id'class='text-white text-decoration-none'>Edit</a></span>
                    <span class='btn btn-danger'><a href='view_subcategory.php?deleteid=$id'class='text-white text-decoration-none'>Delete</a></span>
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
