<section class="row">
    <?php
    include_once 'admin/nav.php';
    ?>

    <script>
        function deleteConfirm() {
            if (confirm("Are you sure to delete!")) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <div class="col-lg-10 col-md-9 col-12">
        <div class="mb-2">
            <h1 class="font-family text-center ">Order List</h1>
            <!-- 
            <div class="text-center mb-2 d-flex justify-content-around">
                <form action="/manage/order" name="formOrder" method="GET">
                    <div class="row">
                        <div class="form-group col-9 mb-0">
                            <input type="date" name="search" class="form-control" value="" required>
                        </div>
                        <button class="btn btn-secondary col-2 p-0" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div> -->

            <table id="tableorder" class="table table-striped table-bordered m-0" cellspacing="0" width="100%">
                <thead class=" font-family justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 text-light bg-dark p-3 rounded-3">
                    <tr class="text-center">
                        <th>
                            <strong>No.</strong>
                        </th>
                        <th>
                            <strong>Order date</strong>
                        </th>
                        <th>
                            <strong>Delivery date</strong>
                        </th>
                        <th>
                            <strong>Customer Name</strong>
                        </th>
                        <th>
                            <strong>Telephone</strong>
                        </th>
                        <th>
                            <strong>Address</strong>
                        </th>
                        <th>
                            <strong>Total Price</strong>
                        </th>
                        <th>
                            <strong>Status</strong>
                        </th>
                    </tr>
                </thead>

                <tbody class="justify-content-md-between justify-content-sm-center border-bottom border-2 my-2 bg-light p-2 rounded-3">

                    <?php
                    $c = new Connect();
                    $dblink = $c->connectToMySQL();

                    $sql = "SELECT * FROM `order`";
                    $re = $dblink->query($sql);

                    while ($row = $re->fetch_assoc()) :
                    ?>
                        <tr>
                            <td class="text-center">
                                <a href="?page=orderDetail&id=<?= $row['id'] ?>" style="text-decoration: none;"><?= $row['id'] ?></a>
                            </td>

                            <td class="text-center"><?= $row['date'] ?></td>
                            <td class="text-center"><?= $row['delivery_date'] ?></td>

                            <td class="text-center"><?= $row['cust_name'] ?></td>
                            <td class="text-center"><?= $row['cust_phone'] ?></td>
                            <td><?= $row['delivery_local'] ?></td>
                            <td class="text-center"><b>$<?= $row['total'] ?></b></td>
                            <td class="text-center">
                                <form action="?page=order" method="POST">
                                    <?php
                                    if ($row['status'] == 0) :
                                    ?>
                                        <input type="hidden" name="status" value="1" />
                                        <input type="hidden" name="order_id" value="<?= $row['id'] ?>" />
                                        <button type="submit" class="btn btn-danger" width="10" name="btnChangeStatus" height="10"><i class="bi bi-x-lg"></i></button>
                                    <?php
                                    else :
                                    ?>
                                        <input type="hidden" name="status" value="0" />
                                        <input type="hidden" name="order_id" value="<?= $row['id'] ?>" />
                                        <button type="submit" class="btn btn-success" width="10" name="btnChangeStatus" height="10"><i class="fa-solid fa-check"></i></i></button>
                                    <?php
                                    endif;
                                    ?>
                                </form>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php
if (isset($_POST['btnChangeStatus'])) :
    $status = $_POST['status'];
    $order_id = $_POST['order_id'];

    $c = new Connect();
    $dblink = $c->connectToPDO();

    $sql = "UPDATE `order` SET `status` = ? WHERE id = ?";

    $re = $dblink->prepare($sql);
    $re->execute([$status, $order_id]);

    header("Location: ?page=order");
endif;

?>