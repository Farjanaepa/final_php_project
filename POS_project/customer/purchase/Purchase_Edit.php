

<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>
 

    <?php require("include/navbar.php"); ?>
    <div class="flex">
        <div class="w-[22%] min-h-screen bg-[#0E1428]">
            <?php require("include/sidebar.php") ?>
        </div>

        <div class=" w-full mx-4 py-5">
            <div class="w-3/6 mx-auto">
                <?php
                if (isset($_GET['id'])) {
                    $pID = $_GET['id'];
                    $conn = mysqli_connect('localhost', 'root', '', 'pos_project');
                    $query = "SELECT * FROM product WHERE id= '$pID' LIMIT 1";
                    $query_run = mysqli_query($conn,  $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {
                ?>
                            <form action="purchase.php" method="post">

                                <input name="id" value="<?php echo $row["id"] ?>" type="hidden" class="input-field"><br>

<!-- 
                                <label for="image">Product Image</label><br>
                                <input name="image" value="<?php echo $row["image"] ?>" type="text" id="image" class="input-field"><br> -->


                                <label for="name">Product Name</label><br>
                                <input name="name" value="<?php echo $row["name"] ?>" type="text" id="name" class="input-field"><br>


                                
                                <label for="previous_price">Previous Price</label><br>
                                <input name="previous_price" value="<?php echo $row["previous_price"] ?>" type="text" id="previous_price" class="input-field"><br>


                                <label for="discount">Discount</label><br>
                                <input name="discount" value="<?php echo $row["discount"] ?>" type="text" id="discount" class="input-field"><br>


                                <label for="present_price">Present Price</label><br>
                                <input name="present_price" value="<?php echo $row["present_price"] ?>" type="text" id="present_price" class="input-field"><br>


                                <label for="quantity">Quantity</label><br>
                                <input name="quantity" value="<?php echo $row["quantity"] ?>" type="text" id="quantity" class="input-field" style="width:50px"><br>


                                <label for="unit">Unit</label><br>
                                <select name="unit" id="unit" class="select-field">
                                    <option value="KG">KG</option>
                                    <option value="Pound">Pound</option>
                                    <option value="Piece">Piece</option>
                                </select><br>


                                <label for="qupon">Coupon</label><br>
                                <input name="qupon" value="<?php echo $row['qupon']?>" type="text" id="qupon" class="input-field"><br>


                                <!-- <label for="brand_id">Brand</label><br>
                                <select  class="select-field" name="brand_id" id="brand_id">
                                    <!-- <?php
                                        // $conn = mysqli_connect('localhost', 'root', '', 'pos_project');
                                        // $query = "SELECT * FROM brand";
                                        // $query_run = mysqli_query($conn,  $query);
                                        // if (mysqli_num_rows($query_run)>0) {
                                        // foreach ($query_run as $row) {
                                        // ?>
                                        // <option value="<?php echo $row['id']?>"><?php echo $row ['name']?></option>
                                        <?php
                                    }
                                    }
                                    ?> -->
                                
                                </select><br> -->

            
                                <label for="cname">Category</label><br>
                                <select  class="select-field" name="cname" id="cname">
                                    <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'pos_project');
                                        $query = "SELECT * FROM category";
                                        $query_run = mysqli_query($conn,  $query);
                                        if (mysqli_num_rows($query_run)>0) {
                                        foreach ($query_run as $row) {
                                        ?>
                                        <option value="<?php echo $row['id']?>"><?php echo $row ['catname']?></option>
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

                                <div class="modal-action modal_btn">
                                    <button class="btn" type="submit" name="update">Update</button>
                                </div>

                            </form>
               
            </div>
        </div>
    </div>


    <?php 
    include("includes/footer.php");
?>
