<!--  -->
<?php
include_once 'connect.php';

if (isset($_POST['btnSubmit'])) {
    
    $img = str_replace('', '-', $_FILES['Pro_image']['name']);
    $storedImage = "./images/"; //Chỗ lưu đường dẫn hình ảnh
    $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'], $storedImage . $img); //Tham số 1 là source của hình, tham số thứ 2
    if ($flag) {
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "INSERT INTO `product`(`id`, `name`, `status`, `images`, `description`, `price`, `for_gender`, `cate_id`, `sup_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $result = $dblink->prepare($sql);
        $check = $result->execute(array("P02", "Shirt", 0, "$img", "Clothing", 30, 1, "C01", "SP01"));



        if ($check == TRUE) {
            echo "Successful!!!!";
        } else {
            echo "Failed!!!!!";
        }
    }


    // $c = new Connect();
    // $dblink = $c->connectToPDO();
    // $sql = "INSERT INTO `users`(`fullname`, `gender`, `address`, `phone`, `birthday`, `email`, `role`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    // $re = $dblink->prepare($sql);
    // $stmt = $re->execute(array("$fname", $male, "Cantho", "$phone", "$dateBirthday", "$email", "user", "$password"));
    // if($stmt == TRUE){
    //     echo "Successful!!!!"; 
    // }
    // else{
    //     echo "Failed!!!!!";
    // }
}
?>

<div id="main" class="container mt-4">
    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
        <div class="form-body">
            <div class="row">

                <div class="col-12">
                    <div class="form-group">
                        <label for="image-vertical">Image</label>
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