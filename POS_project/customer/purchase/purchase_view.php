<!-- Modals -->
<!-- Add products modal -->

<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>

<dialog id="my_modal_1" class="modal ">
    <div class="modal-box " style="max-width:800px;">
        <form method="post" action="purchase.php">
            <!-- Image -->
            <label for="product-image">Product Image</label><br>
            <input name="image" type="text" id="product-image" class="input-field"><br>
            <label for="product-name">Product Name</label><br>
            <input name="name" type="text" id="product-name" class="input-field"><br>
            <label for="previous-price">Previous Price</label><br>
            <input name="previous_price" type="text" id="previous-price" class="input-field"><br>
            <label for="discount">Discount</label><br>
            <input name="discount" type="text" id="discount" class="input-field"><br>
            <label for="present-price">Present Price</label><br>
            <input name="present_price" type="text" id="present-price" class="input-field"><br>

          
            <label for="cat_id">Category</label><br>
            <select  class="select-field" name="cat_id" id="cat_id">
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
            </select><br>

            <label for="sname">Sub-Category</label><br>
            <select name="sname" id="sname" class="select-field">
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
            </select><br>

            <label for="quantity">Quantity</label><br>
            <input name="quantity" type="text" id="quantity" class="input-field" style="width:50px"><br>

            <label for="unit">Unit</label><br>
            <select name="unit" id="unit" class="select-field">
                <option value="KG">KG</option>
                <option value="Pound">Pound</option>
                <option value="Piece">Piece</option>
            </select><br>

            <label for="coupon">Coupon</label><br>
            <input name="coupon" type="text" id="coupon" class="input-field"><br>

            <div class="modal-action modal_btn">
                <input type="text" name="test">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn" type="submit" name="add_product">ADD</button>
            </div>

        </form>
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
    </div>
</dialog>
<!-- Add products modal end-->
<!-- Modals End-->
<!-- -------------------------------------Content start form here---------------------------------------------- -->
<!-- Products table header -->
<div class="flex gap-3 items-center justify-center my-5">
    <div class="border-t flex-grow "></div>
    <h1 class="text-center font-bold text-2xl">Products Table</h1>
    <div class="border-t flex-grow "></div>
</div>
<!-- Add Product -->
<div class="flex justify-end my-4">
    <button class="btn btn-md btn-secondary view-details " onclick="my_modal_1.showModal()">
        <i class="fa-regular fa-square-plus"></i> Add Product
    </button>
</div>
<!-- Products Table -->
<div class="">
    <table class="custom-table">
        <thead>
            <tr>
                <th>#ID</th>
               
                <th>Name</th>
                <th>Previous Price</th>
                <th>Discount</th>
                <th>Present Price</th>
              
                <th>Category</th>
                <th>Sub Category</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Coupon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'pos_project');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $query = "SELECT product.id, product.name , product.previous_price, product.discount, product.present_price, category.catname cname, sub_category.subcatname sname, product.quantity, product.unit, product.qupon from product, category, sub_category where product.cname = category.id and product.sname = sub_category.id";

            $query_run = mysqli_query($conn,  $query);
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $row) {
            ?>
                    <tr>
                        <th><?php echo $row["id"] ?></th>
                        <td class="max-w-40">

                            <img class="w-full rounded-lg" src="<?php echo $row["image"] ?>" alt="product image">

                        </td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["previous_price"] ?></td>
                        <td><?php echo $row["discount"] ?></td>
                        <td><?php echo $row["present_price"] ?></td>
                       
                        <td><?php echo $row["cname"] ?></td>
                        <td><?php echo $row["sname"] ?></td>
                        <td><?php echo $row["quantity"] ?></td>
                        <td><?php echo $row["unit"] ?></td>
                        <td><?php echo $row["qupon"] ?></td>
                        <td>
                            <!-- You can open the modal using ID.showModal() method -->
                            <div class="tooltip" data-tip="Edit">

                                <a href="purchase_edit.php?id=<?php echo $row["id"] ?>"><i style="color:green; font-size:20px;" class="fa-regular fa-pen-to-square"></i></a>

                            </div>
                            <!-- Delete Button -->
                            <div class="tooltip" data-tip="Delete">
                                <form action="purchase.php" method="post">
                                    <button type="submit" name="delete" value="<?php echo $row['id'] ?>"><i style="color:red; font-size:20px;" class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </div>
                            <!-- View details button -->
                            <!-- <div class="tooltip" data-tip="Details">
                                <button onclick="my_modal_2.showModal()">
                                    <i style="color:#007bff; font-size:20px; margin-left:10px;" class="fa-regular fa-eye"></i>
                                </button>
                            </div> -->
                        </td>
                    </tr>

            <?php
                }
            } else {

                echo "<h1>No records found</h1>";
            }
            ?>

        </tbody>
    </table>
</div>

<?php 
    include("includes/footer.php");
?>