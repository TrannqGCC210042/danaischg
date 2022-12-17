<script>
    function formValid() {
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        f = document.formAddproduct

        if (f.cat_id.value == 0) {
            alert("Please choose category");
            return false;
        }
        if (f.sup_id.value == 0) {
            alert("Please choose supplier");
            return false;
        }
        if (f.shop_id.value == 0) {
            alert("Please choose shop");
            return false;
        }
        return true;
    }
</script>

<!-- Add into table -->
<section class="row">
    <?php
    include_once 'admin/nav.php';
    ?>
    <div class="pt-3 col-lg-10 col-md-9 col-12">
        <h1 class="text-center pb-4">Adding Product</h1>
        <form id="formAddproduct" name="formAddproduct" method="POST" enctype="multipart/form-data" onsubmit="return formValid()" style="margin: 0 10% 0 10%">
            <div class="form-group mt-3">
                <label class="form-label font-weight-bold" for="ID">Product ID</label>
                <input type="text" name="id" id="id" class="form-control" placeholder="" required />
            </div>

            <div class="form-group mt-3">
                <label class="form-label font-weight-bold" for="Name">Product Name</label>
                <input type="text" name="name" id="Name" class="form-control" placeholder="" required />
            </div>

            <div class="d-md-flex justify-content-start align-items-center mb-3 mt-3">
                <h6 class=" mb-3 mb-lg-0 me-5">Status:</h6>

                <div class="form-check form-check-inline mb-0 ml-4 mr-5 ps-3">
                    <input class="form-check-input" type="radio" name="status" id="status" value="0" required>
                    <label class="form-check-label" for="sale">Sale&nbsp;&nbsp;</label>
                </div>

                <div class="form-check form-check-inline mb-0 ml-4">
                    <input class="form-check-input" type="radio" name="status" id="status" value="1" required>
                    <label class="form-check-label" for="notSale">Not Sale&nbsp;</label>
                </div>
            </div>

            <div class="d-md-flex justify-content-start align-items-center mb-3 mt-3">
                <h6 class="font-weight-bold mb-3 mb-lg-0 me-5">Gender:</h6>

                <div class="form-check form-check-inline mb-0 ml-4 mr-5 ps-2">
                    <input class="form-check-input" type="radio" name="for_gender" id="for_gender" value="0" required>
                    <label class="form-check-label" for="male">Male&nbsp;&nbsp;</label>
                </div>

                <div class="form-check form-check-inline mb-0 ml-4 ps-3">
                    <input class="form-check-input" type="radio" name="for_gender" id="for_gender" value="1" required>
                    <label class="form-check-label" for="female">Female&nbsp;</label>
                </div>
            </div>

            <div class="form-group mt-3">
                <label class="form-label font-weight-bold" for="ChooseCategory">Choose Category</label>
                <div name="slcategory" id="ChooseCategory">
                    <select name='cat_id' class='form-control' required>
                        <option value='0'>Please choose category</option>

                        <?php
                        $c = new Connect();
                        $dblink = $c->connectToMySQL();

                        $sql = "SELECT `id`, `name` FROM `category`";
                        $re = $dblink->query($sql);

                        while ($row = $re->fetch_assoc()) :
                        ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                        <?php
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

                        <?php
                        $c = new Connect();
                        $dblink = $c->connectToMySQL();

                        $sql = "SELECT `id`, `name` FROM `supplier`";
                        $re = $dblink->query($sql);

                        while ($row = $re->fetch_assoc()) :
                        ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                        <?php
                        endwhile;
                        ?>

                    </select>
                    </select>
                </div>
            </div>

            <div class="form-group mt-3">
                <label class="form-label font-weight-bold" for="Price">Price</label>
                <input type="number" name="price" id="price" step="0.01" min="1" class="form-control" placeholder="" required />
            </div>

            <div class="form-group mt-3">
                <label class="form-label font-weight-bold" for="Price">Quantity</label>
                <input type="number" name="quantity" id="quantity" min="1" class="form-control" placeholder="" required />
            </div>

            <div class="form-group mt-3">
                <label class="form-label font-weight-bold" for="description">Description </label>
                <textarea name="description" id="description" class="form-control" placeholder="" rows="10" required></textarea>
            </div>

            <div class="form-group mt-3">
                <label for="Image" class="form-label font-weight-bold">Product Image</label>
                <input type="file" name="file_image" id="Image" class="form-control-file" required />
            </div>

            <div class="form-group text-center mt-4 mt-3">
                <input type="submit" class="btn btn-dark" name="btnAdd_product" value="Add new" />
                <input type="button" class="btn btn-dark" name="btnCacel_product" value="Cancel" onclick="window.location='?page=productManagement'" />
            </div>
        </form>
    </div>
</section>

<?php
if (isset($_POST['btnAdd_product'])) :
    $images = str_replace(' ', '-', $_FILES['file_image']['name']);
    // Save the path of the image.
    $storedImage = "./images/";
    // src
    $flag = move_uploaded_file($_FILES['file_image']['tmp_name'], $storedImage . $images);
    

    if ($flag) :
        $c = new Connect();
        $dblink = $c->connectToPDO();

        $id = $_POST['id'];
        $name = $_POST['name'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $gender = $_POST['for_gender'];
        $cate_id = $_POST['cat_id'];
        $sup_id = $_POST['sup_id'];


        $sql_pro = "INSERT INTO `product`(`id`, `name`, `status`, `description`, `price`, `for_gender`. `quantity`, `image`, `cate_id`, `sup_id`) VALUES (?, ?, ?, ? ,?, ?, ?,? ,?, ?)";

        $re_pro = $dblink->prepare($sql_pro);

        $check_pro = $re_pro->execute(array("$id", "$name", $status, "$description", $price, "$gender", "$quantity", "$images", "$cate_id", "$sup_id"));

        if ($check_pro == true) :
            echo "<meta http-equiv='refresh' content='0;url=?page=productManagement'>";
        else :
            echo "Failed!";
        endif;
    endif;
endif;
?>