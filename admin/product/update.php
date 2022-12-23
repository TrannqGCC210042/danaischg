<script>
    // Function to check valid data
    function formValid() {
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var phone_pattern = /^(\(0\d{1,2}\)\d{7})|(0\d{9})$/;

        f = document.formUpdateproduct

        if (format.test(f.name.value)) {
            alert("Invalid Product name , please enter again");
            f.name.focus();
            return false;
        }

        if (f.price.value <= 0) {
            alert("Price must be greater than 0, please enter again");
            f.price.focus();
            return false;
        }

        if (f.quantity.value <= 0) {
            alert("Quantity must be greater than 0, please enter again");
            f.quantity.focus();
            return false;
        }

        if (f.cat_id.value == 0) {
            alert("Please choose category");
            return false;
        }
        if (f.sup_id.value == 0) {
            alert("Please choose supplier");
            return false;
        }

        if (f.status.checked == false) {
            alert("Please choose status");
            return false;
        }
        
        return true;
    }
</script>
<?php
// Check the id exists or not.
if (isset($_GET['id'])) :
    $id = $_GET['id'];

    $c = new Connect();
    $dblink = $c->connectToPDO();

    $sql = "SELECT * FROM `product` WHERE id = ?";

    $stmt = $dblink->prepare($sql);
    $stmt->execute(array("$id"));

    if ($stmt->rowCount() > 0) :
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $pro_name = $row['name'];
    else :
        header("Location: ?page=productManagement");
    endif;
?>

    <section class="row">
        <!-- Menu on the right -->
        <?php
        include_once 'admin/nav.php';
        ?>
        <!-- Form of product -->
        <div class="pt-3 col-lg-10 col-md-9 col-12">
            <h1 class="text-center pb-4">Update Product</h1>
            <form id="formUpdateproduct" name="formUpdateproduct" method="POST" enctype="multipart/form-data" onsubmit="return formValid()" style="margin: 0 10% 0 10%">
                <div class="form-group mt-3">
                    <label class="form-label font-weight-bold" for="ID">Product ID</label>
                    <input type="text" name="id" id="id" class="form-control" placeholder="" readonly value="<?= $row['id'] ?>" />
                </div>

                <div class="form-group mt-3">
                    <label class="form-label font-weight-bold" for="Name">Product Name</label>
                    <input type="text" name="name" id="Name" class="form-control" placeholder="" required value="<?= $row['name'] ?>" />
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-3 mt-3">
                    <h6 class=" mb-3 mb-lg-0 me-5">Status:</h6>

                    <?php
                    if ($row['status'] == 0) :
                    ?>
                        <div class="form-check form-check-inline mb-0 ml-4 mr-5 ps-3">
                            <input class="form-check-input" type="radio" name="status" id="status" value="0" checked>
                            <label class="form-check-label" for="sale">Sale&nbsp;&nbsp;</label>
                        </div>
                        <div class="form-check form-check-inline mb-0 ml-4">
                            <input class="form-check-input" type="radio" name="status" id="status" value="1">
                            <label class="form-check-label" for="notSale">Not Sale&nbsp;</label>
                        </div>
                    <?php
                    else :
                    ?>
                        <div class="form-check form-check-inline mb-0 ml-4 mr-5 ps-3">
                            <input class="form-check-input" type="radio" name="status" id="status" value="0">
                            <label class="form-check-label" for="sale">Sale&nbsp;&nbsp;</label>
                        </div>
                        <div class="form-check form-check-inline mb-0 ml-4">
                            <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                            <label class="form-check-label" for="notSale">Not Sale&nbsp;</label>
                        </div>
                    <?php
                    endif
                    ?>

                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-3 mt-3">
                    <h6 class="font-weight-bold mb-3 mb-lg-0 me-5">Gender:</h6>

                    <?php
                    if ($row['for_gender'] == 0) :
                    ?>
                        <div class="form-check form-check-inline mb-0 ml-4 mr-5 ps-2">
                            <input class="form-check-input" type="radio" name="for_gender" id="for_gender" value="0" checked>
                            <label class="form-check-label" for="male">Male&nbsp;&nbsp;</label>
                        </div>

                        <div class="form-check form-check-inline mb-0 ml-4 ps-3">
                            <input class="form-check-input" type="radio" name="for_gender" id="for_gender" value="1">
                            <label class="form-check-label" for="female">Female&nbsp;</label>
                        </div>
                    <?php
                    else :
                    ?>
                        <div class="form-check form-check-inline mb-0 ml-4 mr-5 ps-2">
                            <input class="form-check-input" type="radio" name="for_gender" id="for_gender" value="0">
                            <label class="form-check-label" for="male">Male&nbsp;&nbsp;</label>
                        </div>

                        <div class="form-check form-check-inline mb-0 ml-4 ps-3">
                            <input class="form-check-input" type="radio" name="for_gender" id="for_gender" value="1" checked>
                            <label class="form-check-label" for="female">Female&nbsp;</label>
                        </div>
                    <?php
                    endif
                    ?>

                </div>

                <div class="form-group mt-3">
                    <label class="form-label font-weight-bold" for="ChooseCategory">Choose Category</label>
                    <div name="slcategory" id="ChooseCategory">
                        <select name='cat_id' class='form-control' required>
                            <option value='0'>Please choose category</option>
                            <!-- Display all category into option-->
                            <?php
                            $c = new Connect();
                            $dblink = $c->connectToMySQL();

                            $sql = "SELECT `id`, `name` FROM `category`";
                            $re = $dblink->query($sql);

                            while ($row_cat = $re->fetch_assoc()) :
                                if ($row_cat['id'] = $row['cate_id']) :
                            ?>
                                    <option value="<?= $row_cat['id'] ?>" selected><?= $row_cat['name'] ?></option>
                                <?php
                                else :
                                ?>
                                    <option value="<?= $row_cat['id'] ?>"><?= $row_cat['name'] ?></option>;
                            <?php
                                endif;
                            endwhile;
                            ?>

                        </select>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label class="form-label font-weight-bold" for="ChooseSupplier">Choose Supplier</label>
                    <div name="slsupplier" id=" ">
                        <select name='sup_id' class='form-control' required>
                            <option value='0'>Please choose supplier</option>
                            <!-- Display all supplier into option-->
                            <?php
                            $c = new Connect();
                            $dblink = $c->connectToMySQL();

                            $sql = "SELECT `id`, `name` FROM `supplier`";
                            $re = $dblink->query($sql);

                            while ($row_sup = $re->fetch_assoc()) :
                                if ($row_sup['id'] = $row['sup_id']) :
                            ?>
                                    <option value="<?= $row_sup['id'] ?>" selected><?= $row_sup['name'] ?></option>
                                <?php
                                else :
                                ?>
                                    <option value="<?= $row_sup['id'] ?>"><?= $row_sup['name'] ?></option>;
                            <?php
                                endif;
                            endwhile;
                            ?>

                        </select>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label class="form-label font-weight-bold" for="Price">Price</label>
                    <input type="number" name="price" id="price" step="0.01" class="form-control" placeholder="" required value="<?= $row['price'] ?>" />
                </div>

                <div class="form-group mt-3">
                    <label class="form-label font-weight-bold" for="Price">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="" required value="<?= $row['quantity'] ?>" />
                </div>

                <div class="form-group mt-3">
                    <label class="form-label font-weight-bold" for="description">Description </label>
                    <textarea name="description" id="description" class="form-control" placeholder="" rows="10" required><?= $row['description'] ?></textarea>
                </div>

                <div class="form-group mt-3">
                    <label for="Image" class="form-label font-weight-bold">Product Image</label>
                    <br>
                    <img src="images/<?= $row['image'] ?>" alt="" class="mb-3" height="150" width="100">
                    <br>
                    <input type="file" name="file_image" id="Image" class="form-control-file" />
                </div>

                <div class="form-group text-center mt-4 mt-3">
                    <input type="submit" class="btn btn-dark" name="btnUpdate_product" value="Update" />
                    <input type="button" class="btn btn-dark" name="btnCacel_product" value="Cancel" onclick="window.location='?page=productManagement'" />
                </div>
            </form>
        </div>
    </section>

<?php
    // Check if the user clicks the update button or not.
    if (isset($_POST['btnUpdate_product'])) :
        $id = $_POST['id'];
        $name = $_POST['name'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $gender = $_POST['for_gender'];
        $cate_id = $_POST['cat_id'];
        $sup_id = $_POST['sup_id'];

        $c = new Connect();
        $dblink = $c->connectToPDO();

        if ($_FILES['file_image']['name']) :
            // remove ''
            $img = str_replace('', '-', $_FILES['file_image']['name']);
            $storedImage = "./images/";
            move_uploaded_file($_FILES['file_image']['tmp_name'], $storedImage . $img);

            $sql = "UPDATE `product` SET `name`= ?,`status`= ?,`description`= ?,`price`= ?,`for_gender`= ?,`quantity`= ?, `image` = ?, `cate_id`= ?,`sup_id`= ? WHERE `id`= ?";
            $result = $dblink->prepare($sql);
            $execute = $result->execute(array("$name", "$status", "$description", "$price", "$gender", "$quantity", "$img", "$cate_id", "$sup_id", "$id"));
        else :
            $sql = "UPDATE `product` SET `name`= ?,`status`= ?,`description`= ?,`price`= ?,`for_gender`= ?,`quantity`= ?,`cate_id`= ?,`sup_id`= ? WHERE `id`= ?";

            $result = $dblink->prepare($sql);
            $execute = $result->execute(array("$name", $status, "$description", $price, $gender, $quantity, "$cate_id", "$sup_id", "$id"));
        endif;

        if ($execute) :
            header("Location: ?page=productManagement");
        else :
            echo "Failed!" . $execute;
        endif;

    endif;
else :
    header("Location: ?page=supplier");
endif;
?>