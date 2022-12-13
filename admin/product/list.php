<style>
    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .page-link {
        position: relative;
        display: block;
        color: #17a2b8 !important;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #17a2b8 !important;
    }

    .page-link:hover {
        z-index: 2;
        color: #fff !important;
        background-color: #17a2b8;
        border-color: #024dbc;
    }

    .page-link:focus {
        z-index: 3;
        outline: 0;
        box-shadow: none;
    }

    .active {
        background-color: #17a2b8;
        color: #fff !important;
    }
</style>

<div class="container-fluid">
    <section class="row">
        <div class="col-lg-2 col-md-3 content-left pr-0">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-md bg-light navbar-light">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu"><span class="navbar-toggler-icon"></span></button>

                <!-- Brand -->
                <a class="nav-link px-0 text-info" href="/manage">
                    <h3 class="fw-bold">Administration</h3>
                </a>
            </nav>
            <!-- Navbar -->
            <nav id="sidebarMenu" class="collapse d-md-block bg-white">
                <div class="position-sticky">
                    <div class="list-group list-group-flush">
                        <a href="../order/order.html" class="list-group-item list-group-item-action py-4 bg-info text-light">Order
                            management</a>
                        <a href="../category/category.html" class="list-group-item list-group-item-action py-4 bg-info text-light">Category
                            management</a>
                        <a href="../supplier/supplier.html" class="list-group-item list-group-item-action py-4 bg-info text-light">Supplier
                            management</a>
                        <a href="product.html" class="list-group-item list-group-item-action py-4 bg-info text-light">Product
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
                <h1 class="text-center">Product List</h1>
                <div class="text-center mb-2 row">
                    <div class="col-6 d-flex justify-content-start align-items-center">
                        <a href="add.html" class="btn btn-outline-info"><i class="bi bi-plus-circle"></i> Add</a>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <form action="/manage/product" autocomplete="off" method="GET" class="d-flex input-group w-auto">
                            <input type="hidden" name="page" value="1">
                            <input type="search" class="form-control" id="searchAdmin" name="search" placeholder="Search by name" aria-label="Search" aria-describedby="search-addon" required />
                            <button class="btn btn-secondary searching" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                        <script>
                            var arrAdmin = document.getElementById("arr").value
                            const myArrayAdmin = arrAdmin.split(",");
                            autocomplete(document.getElementById("searchAdmin"), myArrayAdmin);

                            function autocomplete(inp, arr) {
                                /*the autocomplete function takes two arguments,
                                the text field element and an array of possible autocompleted values:*/
                                var currentFocus;
                                /*execute a function when someone writes in the text field:*/
                                inp.addEventListener("input", function(e) {
                                    var a, b, i, val = this.value;
                                    /*close any already open lists of autocompleted values*/
                                    closeAllLists();
                                    if (!val) {
                                        return false;
                                    }
                                    currentFocus = -1;
                                    /*create a DIV element that will contain the items (values):*/
                                    a = document.createElement("DIV");
                                    a.setAttribute("id", this.id + "autocomplete-list");
                                    a.setAttribute("class", "autocomplete-items");
                                    /*append the DIV element as a child of the autocomplete container:*/
                                    this.parentNode.appendChild(a);
                                    /*for each item in the array...*/
                                    for (i = 0; i < arr.length; i++) {
                                        /*check if the item starts with the same letters as the text field value:*/
                                        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                                            /*create a DIV element for each matching element:*/
                                            b = document.createElement("DIV");
                                            /*make the matching letters bold:*/
                                            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                                            b.innerHTML += arr[i].substr(val.length);
                                            /*insert a input field that will hold the current array item's value:*/
                                            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                                            /*execute a function when someone clicks on the item value (DIV element):*/
                                            b.addEventListener("click", function(e) {
                                                /*insert the value for the autocomplete text field:*/
                                                inp.value = this.getElementsByTagName("input")[0].value;
                                                /*close the list of autocompleted values,
                                                (or any other open lists of autocompleted values:*/
                                                closeAllLists();
                                            });
                                            a.appendChild(b);
                                        }
                                    }
                                });
                                /*execute a function presses a key on the keyboard:*/
                                inp.addEventListener("keydown", function(e) {
                                    var x = document.getElementById(this.id + "autocomplete-list");
                                    if (x) x = x.getElementsByTagName("div");
                                    if (e.keyCode == 40) {
                                        /*If the arrow DOWN key is pressed,
                                        increase the currentFocus variable:*/
                                        currentFocus++;
                                        /*and and make the current item more visible:*/
                                        addActive(x);
                                    } else if (e.keyCode == 38) { //up
                                        /*If the arrow UP key is pressed,
                                        decrease the currentFocus variable:*/
                                        currentFocus--;
                                        /*and and make the current item more visible:*/
                                        addActive(x);
                                    } else if (e.keyCode == 13) {
                                        /*If the ENTER key is pressed, prevent the form from being submitted,*/
                                        e.preventDefault();
                                        if (currentFocus > -1) {
                                            /*and simulate a click on the "active" item:*/
                                            if (x) x[currentFocus].click();
                                        }
                                    }
                                });

                                function addActive(x) {
                                    /*a function to classify an item as "active":*/
                                    if (!x) return false;
                                    /*start by removing the "active" class on all items:*/
                                    removeActive(x);
                                    if (currentFocus >= x.length) currentFocus = 0;
                                    if (currentFocus < 0) currentFocus = (x.length - 1);
                                    /*add class "autocomplete-active":*/
                                    x[currentFocus].classList.add("autocomplete-active");
                                }

                                function removeActive(x) {
                                    /*a function to remove the "active" class from all autocomplete items:*/
                                    for (var i = 0; i < x.length; i++) {
                                        x[i].classList.remove("autocomplete-active");
                                    }
                                }

                                function closeAllLists(elmnt) {
                                    /*close all autocomplete lists in the document,
                                    except the one passed as an argument:*/
                                    var x = document.getElementsByClassName("autocomplete-items");
                                    for (var i = 0; i < x.length; i++) {
                                        if (elmnt != x[i] && elmnt != inp) {
                                            x[i].parentNode.removeChild(x[i]);
                                        }
                                    }
                                }
                                /*execute a function when someone clicks in the document:*/
                                document.addEventListener("click", function(e) {
                                    closeAllLists(e.target);
                                });
                            }
                        </script>
                    </div>
                </div>
                <table id="tableproduct" class="table table-striped table-bordered m-0" cellspacing="0" width="100%">
                    <thead class="justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 bg-dark text-light p-3 rounded-3">
                        <tr class="text-center">
                            <th>
                                <strong>ID</strong>
                            </th>
                            <th>
                                <strong>Product Name</strong>
                            </th>
                            <th>
                                <strong>Price</strong>
                            </th>
                            <th>
                                <strong>Gender</strong>
                            </th>
                            <th>
                                <strong>Age</strong>
                            </th>
                            <th>
                                <strong>Quantity</strong>
                            </th>
                            <th>
                                <strong>Image</strong>
                            </th>
                            <th>
                                <strong>Category</strong>
                            </th>
                            <th>
                                <strong>Supplier</strong>
                            </th>
                            <th>
                                <strong>Shop</strong>
                            </th>
                            <th>
                                <strong>Edit</strong>
                            </th>
                            <th>
                                <strong>Delete</strong>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="justify-content-md-between justify-content-sm-center border-bottom border-2 my-2 bg-light p-2 rounded-3">
                        <tr>
                            <td class="text-center align-middle">
                                <a href="/view-detail/16" style="text-decoration: none;">1</a>
                            </td>
                            <td class="text-center align-middle">Red Bird toy car</td>
                            <td class="text-center align-middle">20.23</td>
                            <td class="text-center align-middle">male</td>
                            <td class="text-center align-middle">13 - 15</td>
                            <td class="text-center align-middle">0</td>
                            <td class="text-center align-middle">
                                <a href=""><img src="../images/products/1665565140182AB82502_RED_1.jpg" alt="Red Bird toy car" width="50" height="50" /></a>
                            </td>
                            <td class="text-center align-middle">Angry Birds</td>
                            <td class="text-center align-middle">13plus</td>
                            <td class="text-center align-middle">The Light Toy 1</td>
                            <td class="text-center align-middle">
                                <a href="/manage/product/show/16"><i class="bi bi-pen-fill" style="color: black;"></i></a>
                            </td>
                            <td class="text-center align-middle">
                                <form method="POST" action="product/delete/16?_method=DELETE" onsubmit="return deleteConfirm()">
                                    <button type="submit" style="border: none; cursor: pointer;"><i class="bi bi-trash-fill" style="color: red;"></i></button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle">
                                <a href="/view-detail/24" style="text-decoration: none;">2</a>
                            </td>
                            <td class="text-center align-middle">Batman and Bane Model</td>
                            <td class="text-center align-middle">20.48</td>
                            <td class="text-center align-middle">male</td>
                            <td class="text-center align-middle">all</td>
                            <td class="text-center align-middle">4</td>
                            <td class="text-center align-middle">
                                <a href=""><img src="../images/products/16655877568706055934_1.jpg" alt="Batman and Bane Model" width="50" height="50" /></a>
                            </td>
                            <td class="text-center align-middle">Batman</td>
                            <td class="text-center align-middle">teenager toy</td>
                            <td class="text-center align-middle">The Light Toy 3</td>
                            <td class="text-center align-middle">
                                <a href="/manage/product/show/24"><i class="bi bi-pen-fill" style="color: black;"></i></a>
                            </td>
                            <td class="text-center align-middle">
                                <form method="POST" action="product/delete/24?_method=DELETE" onsubmit="return deleteConfirm()">
                                    <button type="submit" style="border: none; cursor: pointer;"><i class="bi bi-trash-fill" style="color: red;"></i></button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle">
                                <a href="/view-detail/39" style="text-decoration: none;">3</a>
                            </td>
                            <td class="text-center align-middle">Assembling lego white</td>
                            <td class="text-center align-middle">22.65</td>
                            <td class="text-center align-middle">male</td>
                            <td class="text-center align-middle">13 - 15</td>
                            <td class="text-center align-middle">5</td>
                            <td class="text-center align-middle">
                                <a href=""><img src="../images/products/166559852512909_74.jpg" alt="Assembling lego white" width="50" height="50" /></a>
                            </td>
                            <td class="text-center align-middle">Lego</td>
                            <td class="text-center align-middle">teenager toy</td>
                            <td class="text-center align-middle">The Light Toy 3</td>
                            <td class="text-center align-middle">
                                <a href="/manage/product/show/39"><i class="bi bi-pen-fill" style="color: black;"></i></a>
                            </td>
                            <td class="text-center align-middle">
                                <form method="POST" action="product/delete/39?_method=DELETE" onsubmit="return deleteConfirm()">
                                    <button type="submit" style="border: none; cursor: pointer;"><i class="bi bi-trash-fill" style="color: red;"></i></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="wrapper mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link active" href="/manage/product?page=1">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="/manage/product?page=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="/manage/product?page=3">3</a></li>
                            <li class="page-item"><a class="page-link" href="/manage/product?page=2">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>