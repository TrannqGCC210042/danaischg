<script>
    function formValid() {
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var validname = /^[A-Za-z]+|(\s)$/;
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var phone_pattern = /^(\(0\d{1,3}\)\d{7})|(0\d{9,10})$/;
        f = document.formAddSupplier
        if (format.test(f.name.value)) {
            alert("Supplier name can't contain special character, please enter again");
            f.name.focus();
            return false;
        }
        // Telephone validation
        if (phone_pattern.test(f.telephone.value) == false) {
            alert("Invalid phone number, please enter again");
            f.telephone.focus();
            return false;
        }
        return true;
    }
</script>
<?php
if (isset($_GET['id'])) :
    $id = $_GET['id'];

    $c = new Connect();
    $dblink = $c->connectToPDO();

    $sql = "SELECT * FROM `supplier` WHERE id = ?";

    $result = $dblink->prepare($sql);
    $result->execute(array("$id"));

    $row = $result->fetch(PDO::FETCH_ASSOC);

?>
    <section class="row">
        <?php
        include_once 'admin/nav.php';
        ?>

        <div class="pt-3 col-lg-10 col-md-9 col-12">
            <h1 class="text-center mb-4">Adding Supplier</h1>
            <form id="formUpdateSupplier" name="formUpdateSupplier" method="POST" onsubmit="return formValid()">

                <div class="form-group">
                    <label class="form-label font-weight-bold" for="Name">Supplier ID</label>
                    <input type="text" name="id" id="id" class="form-control" placeholder="" required readonly value="<?= $row['id'] ?>" />
                </div>

                <div class="form-group">
                    <label class="form-label font-weight-bold" for="Name">Supplier Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="" required value="<?= $row['name'] ?>" />
                </div>

                <div class="form-group">
                    <label class="form-label font-weight-bold" for="Telephone">Telephone</label>
                    <input type="text" name="telephone" id="Telephone" class="form-control" placeholder="" required value="<?= $row['phone'] ?>" />
                </div>

                <div class="form-group">
                    <label class="form-label font-weight-bold" for="Address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="" required value="<?= $row['address'] ?>" />
                </div>

                <div class="form-group text-center mt-4">
                    <input type="submit" class="btn btn-dark" name="btnUpdate_supplier" value="Update" />
                    <input type="button" class="btn btn-dark" name="btnCancel_supplier" value="Cancel" onclick="window.location='?page=supplier'" />
                </div>
            </form>
        </div>
    </section>

<?php
    if (isset($_POST['btnUpdate_supplier'])) :
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";
        $address = isset($_POST['address']) ? $_POST['address'] : "";

        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "UPDATE `supplier` SET `name`= ?,`phone`= ?,`address`= ? WHERE `id` = ?";

        $result = $dblink->prepare($sql);
        $check = $result->execute(array("$name", "$telephone", "$address", "$id"));

        if ($check == true) :
            echo "<meta http-equiv='refresh' content='0;url=?page=supplier'>";
        else :
            echo "Failed!";
        endif;
    endif;
else :
    echo "<meta http-equiv='refresh' content='0;url=?page=supplier'>";
endif;
?>