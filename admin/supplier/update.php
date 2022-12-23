<script>
    // Function to check valid data
    function formValid() {
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var phone_pattern = /^(\(0\d{1,2}\)\d{7})|(0\d{9})$/;

        f = document.formUpdateSupplier

        if (format.test(f.name.value)) {
            alert("Invalid Supplier name , please enter again");
            f.name.focus();
            return false;
        }

        if (phone_pattern.test(f.telephone.value) == false) {
            alert("Invalid phone number, please enter again");
            f.telephone.focus();
            return false;
        }
        return true;
    }
</script>

<?php
// Check the id exists on URL or not.
if (isset($_GET['id'])) :
    $id = $_GET['id'];

    $c = new Connect();
    $dblink = $c->connectToPDO();

    $sql = "SELECT * FROM `supplier` WHERE id = ?";

    $stmt = $dblink->prepare($sql);
    $stmt->execute(array("$id"));

    // Check the id exists in DB or not.
    if ($stmt->rowCount() > 0) :
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    else :
        header("Location: ?page=supplier");
    endif;

?>
    <section class="row">
        <!-- Menu on the right -->
        <?php
        include_once 'admin/nav.php';
        ?>

        <div class="pt-3 col-lg-10 col-md-9 col-12">
            <h1 class="text-center mb-4">Update Supplier</h1>
            <form id="formUpdateSupplier" name="formUpdateSupplier" method="POST" onsubmit="return formValid()">
                <!-- Display information in update supplier table-->
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
    // Check if the user clicks the update button or not.
    if (isset($_POST['btnUpdate_supplier'])) :
        $id = $_POST['id'];
        $name = $_POST['name'];
        $telephone = $_POST['telephone'];
        $address = $_POST['address'];

        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "UPDATE `supplier` SET `name`= ?,`phone`= ?,`address`= ? WHERE `id` = ?";

        $result = $dblink->prepare($sql);
        $execute = $result->execute(array("$name", "$telephone", "$address", "$id"));

        if ($execute == true) :
            header("Location: ?page=supplier");
        else :
            echo "Failed!" . $execute;
        endif;

    endif;
else: 
    header("Location: ?page=supplier");
endif;
?>