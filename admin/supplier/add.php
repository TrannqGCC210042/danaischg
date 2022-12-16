<script>
    // Function to check valid data
    function formValid() {
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var validname = /^[A-Za-z]+|(\s)$/;
        var phone_pattern = /^(\(0\d{1,3}\)\d{7})|(0\d{9,10})$/;

        f = document.formAddSupplier

        if (format.test(f.name.value)) {
            alert("Supplier name can't contain special character, please enter again");
            f.name.focus();
            return false;
        }

        if (format.test(f.address.value)) {
            alert("Supplier's address can't contain special character, please enter again");
            f.address.focus();
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

<section class="row">
    <!-- Menu on the right -->
    <?php
    include_once 'admin/nav.php';
    ?>

    <div class="pt-3 col-lg-10 col-md-9 col-12">
        <h1 class="text-center mb-4">Adding Supplier</h1>
        <form id="formAddSupplier" name="formAddSupplier" method="POST" onsubmit="return formValid()">

            <div class="form-group">
                <label class="form-label font-weight-bold" for="Name">Supplier ID</label>
                <input type="text" name="id" id="id" class="form-control" placeholder="" required />
            </div>

            <div class="form-group">
                <label class="form-label font-weight-bold" for="Name">Supplier Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="" required />
            </div>

            <div class="form-group">
                <label class="form-label font-weight-bold" for="Telephone">Telephone</label>
                <input type="text" name="telephone" id="Telephone" class="form-control" placeholder="" required />
            </div>
    
            <div class="form-group">
                <label class="form-label font-weight-bold" for="Address">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="" required />
            </div>

            <div class="form-group text-center mt-4">
                <input type="submit" class="btn btn-dark" name="btnAdd_supplier" value="Add new" />
                <input type="button" class="btn btn-dark" name="btnCancel_supplier" value="Cancel" onclick="window.location='?page=supplier'" />
            </div>
        </form>
    </div>
</section>

<?php
if (isset($_POST['btnAdd_supplier'])) :
    $id = $_POST['id'];
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];

    $c = new Connect();
    $dblink = $c->connectToPDO();
    $sql = "INSERT INTO `supplier`(`id`, `name`, `phone`, `address`) VALUES (?, ?, ?, ?)";

    $result = $dblink->prepare($sql);
    $check = $result->execute(array("$id", "$name", "$telephone", "$address"));

    if ($check == true) :
        header("Location: ?page=supplier");
        else :
        echo "Failed!";
    endif;
endif;
?>