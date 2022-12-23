<script>
    // function to check valid data
    function formValid() {
        var format = /[!@#$%^&*()_+\=\[\]{};':"\\|<>\/?]+/;

        f = document.formUpdatecategory

        if (format.test(f.name.value)) {
            alert("Invalid Category Name, please enter again");
            f.name.focus();
            return false;
        }
        if (format.test(f.description.value)) {
            alert("Invalid Category description, please enter again");
            f.txtCatDesc.focus();
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

    $sql = "SELECT * FROM `category` WHERE id = ?";

    $stmt = $dblink->prepare($sql);
    $stmt->execute(array("$id"));

    // Check the id exists in DB or not.
    if ($stmt->rowCount() > 0) :
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $cate_name = $row['name'];
    else :
        header("Location: ?page=category");
    endif;

?>
    <section class="row">
        <?php
        include_once 'admin/nav.php';
        ?>
        <div class="pt-3 col-lg-10 col-md-9 col-12">
            <h1 class="text-center pb-4">Update Category</h1>
            <form id="formUpdatecategory" name="formUpdatecategory" method="POST" enctype="multipart/form-data" onsubmit="return formValid()">
                <div class="form-group">
                    <label class="form-label font-weight-bold" for="txtCatId">Category ID</label>
                    <input type="text" name="id" id="txtCatId" readonly class="form-control" placeholder="" required value="<?= $row['id'] ?>" />
                </div>

                <div class="form-group">
                    <label class="form-label font-weight-bold" for="txtCatName">Category Name</label>
                    <input type="text" name="name" id="txtCatName" class="form-control" placeholder="" required value="<?= $row['name'] ?>" />
                </div>

                <div class="form-group mt-3">
                    <label class="form-label font-weight-bold" for="txtCatDesc">Category Description</label>
                    <input type="text" name="description" id="txtCatDesc" class="form-control" placeholder="" required value="<?= $row['description'] ?>" />
                </div>

                <div class="form-group text-center mt-4">
                    <input type="submit" class="btn btn-dark" name="btnUpdate_category" value="Update" />
                    <input type="button" class="btn btn-dark" name="btnCancel_category" value="Cancel" onclick="window.location='?page=category'" />
                </div>
            </form>
        </div>
    </section>
<?php
    // Check if the user clicks the update button or not.
    if (isset($_POST['btnUpdate_category'])) :
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $description = isset($_POST['description']) ? $_POST['description'] : "";

        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "UPDATE `category` SET `name`= ?,`description`= ? WHERE `id` = ?";

        $result = $dblink->prepare($sql);
        $execute = $result->execute(array("$name", "$description", "$id"));

        if ($execute == true) :
            header("Location: ?page=category");
        else :
            echo "Failed!" . $execute;
        endif;

    endif;
else: 
    header("Location: ?page=category");
endif;
?>