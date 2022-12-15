<script>
    //  check valid data
    function formValid() {
        var format = /[!@#$%^&*()_+\=\[\]{};':"\\|<>\/?]+/;

        f = document.formAddcategory

        if (format.test(f.name.value)) {
            alert("Category name can't contain special character, please enter again");
            f.name.focus();
            return false;
        }
        if (format.test(f.description.value)) {
            alert("Category description can't contain special character, please enter again");
            f.txtCatDesc.focus();
            return false;
        }
        return true;
    }
</script>

<section class="row">
    <?php   
    include_once 'admin/nav.php';
    ?>
    <div class="pt-3 col-lg-10 col-md-9 col-12">
        <h1 class="text-center pb-4">Adding Category</h1>
        <form id="formAddcategory" name="formAddcategory" method="POST" enctype="multipart/form-data" onsubmit="return formValid()">

            <div class="form-group">
                <label class="form-label font-weight-bold" for="txtCatId">Category ID</label>
                <input type="text" name="id" id="txtCatId" class="form-control" placeholder="" required />
            </div>

            <div class="form-group">
                <label class="form-label font-weight-bold" for="txtCatName">Category Name</label>
                <input type="text" name="name" id="txtCatName" class="form-control" placeholder="" required />
            </div>

            <div class="form-group mt-3">
                <label class="form-label font-weight-bold" for="txtCatDesc">Category Description</label>
                <input type="text" name="description" id="txtCatDesc" class="form-control" placeholder="" required />
            </div>

            <div class="form-group text-center mt-4">
                <input type="submit" class="btn btn-dark" name="btnAdd_category" value="Add new" />
                <input type="button" class="btn btn-dark" name="btnIgnore" value="Cancel" onclick="window.location='?page=category'" />
            </div>
        </form>
    </div>
</section>
<?php
if (isset($_POST['btnAdd_category'])) :
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";

    $c = new Connect();
    $dblink = $c->connectToPDO();
    $sql = "INSERT INTO `category`(`id`, `name`, `description`) VALUES(?, ?, ?)";

    $result = $dblink->prepare($sql);
    $check = $result->execute(array("$id", "$name", "$description"));


    if ($check == true) :
        // if(confirm)
        echo "<meta http-equiv='refresh' content='0;url=?page=category'>";
    else :
        echo "Failed!";
    endif;
endif;
?>