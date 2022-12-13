<div class="container-fluid">
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

            <div class="pt-3 col-lg-10 col-md-9 col-12">
                <h1 class="text-center mb-4">Adding Supplier</h1>
                <form id="formAddSupplier" name="formAddSupplier" method="POST" action="/manage/supplier/add/store"
                    onsubmit="return formValid()">

                    <div class="form-group">
                        <label class="form-label font-weight-bold" for="Name">Supplier Name</label>
                        <input type="text" name="name" id="Name" class="form-control" placeholder="" required />
                    </div>

                    <div class="form-group">
                        <label class="form-label font-weight-bold" for="Telephone">Telephone</label>
                        <input type="text" name="telephone" id="Telephone" class="form-control" placeholder=""
                            required />
                    </div>

                    <div class="form-group">
                        <label for="Email" class="font-weight-bold">Email (*)</label>
                        <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="form-label font-weight-bold" for="Address">Address</label>
                        <input type="text" name="address" id="Address" class="form-control" placeholder="" required />
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-info" name="btnAdd" value="Add new" />
                        <input type="button" class="btn btn-info" name="btnIgnore" value="Cancel"
                            onclick="window.location='supplier.html'" />
                    </div>
                </form>
            </div>
        </section>
    </div>