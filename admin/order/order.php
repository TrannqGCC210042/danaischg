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
        <div class="pt-2 mb-2">
            <h1 class="font-family text-center mb-4">Order List</h1>

            <div class="text-center mb-2 d-flex justify-content-around">
                <form action="/manage/order" name="formOrder" method="GET">
                    <div class="row">
                        <div class="form-group col-9 mb-0">
                            <input type="date" name="search" class="form-control" value="" required>
                        </div>
                        <button class="btn btn-secondary col-2 p-0" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>

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
                        <th>
                            <strong>Delete</strong>
                        </th>
                    </tr>
                </thead>

                <tbody class="justify-content-md-between justify-content-sm-center border-bottom border-2 my-2 bg-light p-2 rounded-3">
                    <tr>
                        <td class="text-center">
                            <a href="/manage/order/detail/29" style="text-decoration: none;">3</a>
                        </td>

                        <td class="text-center">2022-10-24, 08:56:39</td>
                        <td class="text-center">2022-10-24, 08:56:39</td>

                        <td class="text-center">Tran Kim Khanh</td>
                        <td class="text-center">0656498898</td>
                        <td>Ninh Kieu District, Can Tho City</td>
                        <td class="text-center"><b>$95.76</b></td>
                        <td class="text-center">
                            <form action="/manage/order/status" method="POST">
                                <input type="hidden" name="status" value="false" />
                                <input type="hidden" name="order_id" value="29" />
                                <button type="submit" class="btn btn-danger" width="10" height="10"><i class="bi bi-x-lg"></i></button>
                            </form>
                        </td>
                        <td class="text-center">
                            <form method="POST" action="order/delete/29?_method=DELETE" onsubmit="return deleteConfirm()">
                                <button type="submit" style="border: none; cursor: pointer;"><i class="bi bi-trash-fill" style="color: red;"></i></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="/manage/order/detail/28" style="text-decoration: none;">4</a>
                        </td>

                        <td class="text-center">2022-10-22, 18:41:43</td>
                        <td class="text-center">2022-10-23, 17:43:16</td>

                        <td class="text-center">Nguyen Que Tran</td>
                        <td class="text-center">0916843367</td>
                        <td>No. 160, 30/4 Street, An Phu Ward, Ninh Kieu District, Can Tho City</td>
                        <td class="text-center"><b>$41.6</b></td>
                        <td class="text-center">
                            <form action="/manage/order/status" method="POST">
                                <input type="hidden" name="status" value="true" />
                                <input type="hidden" name="order_id" value="28" />
                                <button type="submit" class="btn btn-success" width="10" height="10"><i class="bi bi-check-lg"></i></button>
                            </form>
                        </td>
                        <td class="text-center">
                            <form method="POST" action="order/delete/28?_method=DELETE" onsubmit="return deleteConfirm()">
                                <button type="submit" style="border: none; cursor: pointer;"><i class="bi bi-trash-fill" style="color: red;"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>