<?php
include_once 'connect.php';

$submit = isset($_POST['btnSubmit']) ? $_POST['btnSubmit'] : "";
if ($submit) {

    $img = str_replace(' ', '-', $_FILES['Pro_image']['name']);
    // Lưu đường dẫn của hình ảnh
    $storedImage = "./images/";
    // src nguồn
    $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'], $storedImage.$img);
    if ($flag) :
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "INSERT INTO `product`(`id`, `name`, `status`, `imges`, `description`, `price`, `quantity`, `cate_id`, `sup_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $result = $dblink->prepare($sql);
        $check = $result->execute(array("P01", "Shirt", "Trading", "$img", "Clothing", 30.00, 5, "C001", "S001"));
        if ($check == true) {
            echo "Contrats";
        } else {
            echo "Failed!";
        }
    endif;
}
?>
<div id="main" class="container mt-4">
    <!-- enctype="multipart/form-data": để upload lên -->
    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
        <div class="form-body">
            <div class="row">

                <div class="col-12">
                    <div class="form-group">
                        <label for="image-vertical">Image</label>
                        <!-- type="file": để upload lên -->
                        <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                    </div>
                </div>
                <div class="col-12 d-flex mt-3 justify-content-center">
                    <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" name="btnSubmit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Session: -server không giới hạn, bảo mật tốt. Nhược điểm: tắt brower->mất 
    Cookie: -client     -->