
<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>


<?php
// ProDuct Table
$conn = mysqli_connect('localhost', 'root', '', 'pos_project');
if (isset($_POST['add_product'])) {

    // $product = $_FILES['image']['name'];
    // $temp = $_FILES['image']['tmp_name'];
    // move_uploaded_file($temp,"image/$product");
    
    
        
    $name = $_POST['name'];
    $previous_price = $_POST['previous_price'];
    $discount = $_POST['discount'];
    // $present_price = $previous_price*$discount/100;
   
    $cname = $_POST['cname'];
    $sname = $_POST['sname'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $coupon = $_POST['qupon'];
    $sql = "INSERT INTO product ( name, previous_price, discount, present_price, cname, sname, quantity, unit, qupon)
    VALUES ( '$product', '$name',' $previous_price','$discount', '$present_price', '$cname', '$sname', '$quantity', '$unit', '$qupon')";
    $query_run = mysqli_query($conn, $sql);


    if ($query_run) {
        header('Location:index.php?page=purchase_view');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['update'])) {
    $id = $_POST["id"];
   
    $name = $_POST['name'];
    $previous_price = $_POST['previous_price'];
    $discount = $_POST['discount'];
    $present_price = $previous_price*$discount/100;
   
    $cname = $_POST['cname'];
    $sname = $_POST['sname'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $coupon = $_POST['qupon'];

    $sql = "UPDATE product SET name='$name' , previous_price='$previous_price' ,discount='$discount' ,present_price='$present_price' ,cname='$cname' ,sname='$sub_csnameat_id' ,quantity='$quantity' ,unit='$unit' ,qupon='$coupon' WHERE id='$id'";
    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {
        header('Location:index.php?page=purchase_view');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
if (isset($_POST["delete"])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM product WHERE id='$id'";
    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {

        header('Location:index.php?page=purchase_view');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}





// Brand Table
if (isset($_POST['add_brand'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
  
    $sql = "INSERT INTO brand ( id, name)
    VALUES ( '$id', '$name')";
    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
        header('Location:index.php?page=brand');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['update_brand'])) {
    $id = $_POST["id"];
    $name = $_POST['name'];

    $sql = "UPDATE brand SET name='$name' WHERE id='$id'";
    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {
        header('Location:index.php?page=brand');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST["delete_brand"])) {
    $id = $_POST['delete_brand'];
    $sql = "DELETE FROM brand WHERE id='$id'";
    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {

        header('Location:index.php?page=brand');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}






// Category Table
if (isset($_POST['add_category'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand_id = $_POST['brand_id'];
  
    $sql = "INSERT INTO category ( id, name, brand_id)
    VALUES ( '$id', '$name', '$brand_id')";
    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
        header('Location:index.php?page=category');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['update_category'])) {
    $id = $_POST["id"];
    $name = $_POST['name'];
    $brand_id = $_POST['brand_id'];

    $sql = "UPDATE category SET name='$name', brand_id='$brand_id' WHERE id='$id'";
    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {
        header('Location:index.php?page=category');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST["delete_cat"])) {
    $id = $_POST['delete_cat'];
    $sql = "DELETE FROM category WHERE id='$id'";
    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {

        header('Location:index.php?page=category');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}





// Sub Category Table
if (isset($_POST['add_sub_category'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand_id = $_POST['brand_id'];
    $cat_id = $_POST['cat_id'];
  
    $sql = "INSERT INTO sub_category ( id, name, brand_id, cat_id)
    VALUES ( '$id', '$name', '$brand_id', '$cat_id')";
    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
        header('Location:index.php?page=sub_category');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['update_sub_category'])) {
    $id = $_POST["id"];
    $name = $_POST['name'];
    $brand_id = $_POST['brand_id'];
    $cat_id = $_POST['cat_id'];

    $sql = "UPDATE sub_category SET name='$name', brand_id='$brand_id', cat_id='$cat_id' WHERE id='$id'";
    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {
        header('Location:index.php?page=sub_category');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST["delete_sub_cat"])) {
    $id = $_POST['delete_sub_cat'];
    $sql = "DELETE FROM sub_category WHERE id='$id'";
    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {

        header('Location:index.php?page=sub_category');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

<?php 
    include("includes/footer.php");
?>