<div class="container-fluid">
        <section class="row">
            <div class="col-lg-2 col-md-3 content-left pr-0">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-md bg-light navbar-light">
                    <!-- Toggle button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu"><span
                            class="navbar-toggler-icon"></span></button>

                    <!-- Brand -->
                    <a class="nav-link px-0 text-info" href="/manage">
                        <h3 class="fw-bold">Administration</h3>
                    </a>
                </nav>
                <!-- Navbar -->
                <nav id="sidebarMenu" class="collapse d-md-block bg-white">
                    <div class="position-sticky">
                        <div class="list-group list-group-flush">
                            <a href="../order/order.html"
                                class="list-group-item list-group-item-action py-4 bg-info text-light">Order
                                management</a>
                            <a href="../category/category.html"
                                class="list-group-item list-group-item-action py-4 bg-info text-light">Category
                                management</a>
                            <a href="supplier.html"
                                class="list-group-item list-group-item-action py-4 bg-info text-light">Supplier
                                management</a>
                            <a href="../product/product.html"
                                class="list-group-item list-group-item-action py-4 bg-info text-light">Product
                                management</a>
                        </div>
                    </div>
                </nav>
            </div>

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
                    <h1 class="text-center">Supplier List</h1>
                    <div class="text-center mb-2 row">
                        <div class="col-6 d-flex justify-content-start align-items-center">
                            <a href="add.html" class="btn btn-outline-info"><i class="bi bi-plus-circle"></i>
                                Add</a>
                        </div>
                        <div class="col-6 d-flex justify-content-end align-items-center">
                            <form action="/manage/supplier" method="GET" class="d-flex input-group w-auto">
                                <input name="search" type="search" class="form-control" placeholder="Search by name"
                                    aria-label="Search" aria-describedby="search-addon" />
                                <button class="btn btn-secondary searching" type="submit"><i
                                        class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered m-0" cellspacing="0" width="100%">
                        <thead
                            class="justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 bg-dark text-light p-3 rounded-3">
                            <tr class="text-center">
                                <th>
                                    <strong>ID</strong>
                                </th>
                                <th>
                                    <strong>Supplier Name</strong>
                                </th>
                                <th>
                                    <strong>Telephone</strong>
                                </th>
                                <th>
                                    <strong>Email</strong>
                                </th>
                                <th>
                                    <strong>Address</strong>
                                </th>
                                <th>
                                    <strong>Edit</strong>
                                </th>
                                <th>
                                    <strong>Delete</strong>
                                </th>
                            </tr>
                        </thead>

                        <tbody
                            class="justify-content-md-between justify-content-sm-center border-bottom border-2 my-2 bg-light p-2 rounded-3">
                            <tr>
                                <td class="text-center align-middle">
                                    <a href="/shop?sid=9&page=1" style="text-decoration: none;">1</a>
                                </td>
                                <td class="text-center align-middle">Chodosi</td>
                                <td class="text-center align-middle">0846446531</td>
                                <td class="text-center align-middle">Chodosi@gmail.vn</td>
                                <td class="align-middle">Ho Chi Minh city</td>
                                <td class="text-center align-middle">
                                    <a href="supplier/show/9"><i class="bi bi-pen-fill" style="color: black;"></i></a>
                                </td>
                                <td class="text-center align-middle">
                                    <form method="POST" action="supplier/delete/9?_method=DELETE"
                                        onsubmit="return deleteConfirm()">
                                        <button type="submit" style="border: none; cursor: pointer;"><i
                                                class="bi bi-trash-fill" style="color: red;"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">
                                    <a href="/shop?sid=10&page=1" style="text-decoration: none;">2</a>
                                </td>
                                <td class="text-center align-middle">bachhoasi</td>
                                <td class="text-center align-middle">0156845621</td>
                                <td class="text-center align-middle">bachhoasi@gmail.com</td>
                                <td class="align-middle">Vinh Long city</td>
                                <td class="text-center align-middle">
                                    <a href="supplier/show/10"><i class="bi bi-pen-fill" style="color: black;"></i></a>
                                </td>
                                <td class="text-center align-middle">
                                    <form method="POST" action="supplier/delete/10?_method=DELETE"
                                        onsubmit="return deleteConfirm()">
                                        <button type="submit" style="border: none; cursor: pointer;"><i
                                                class="bi bi-trash-fill" style="color: red;"></i></button>
                                    </form>
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>