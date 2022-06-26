<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team Assignment 1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/b-2.2.3/datatables.min.css" />

</head>

<body class="bg-light bg-gradient">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="products-tab" data-bs-toggle="tab"
                                    data-bs-target="#products-tab-pane" type="button" role="tab"
                                    aria-controls="products-tab-pane" aria-selected="true">Product List</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="users-tab" data-bs-toggle="tab"
                                    data-bs-target="#users-tab-pane" type="button" role="tab"
                                    aria-controls="users-tab-pane" aria-selected="false">User List</button>
                            </li>
                            <li class="nav-item ms-auto">
                                <a class="btn btn-sm btn-secondary" title="Logout" href="/auth/logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="products-tab-pane" role="tabpanel"
                                aria-labelledby="products-tab" tabindex="0">
                                <table class="table table-striped dataTable w-100" id="table-products">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Buy Price</th>
                                            <th>Sell Price</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="users-tab-pane" role="tabpanel" aria-labelledby="users-tab"
                                tabindex="0">
                                <table class="table table-striped dataTable w-100" id="table-users">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Place of Birth</th>
                                            <th>Date of Birth</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel">Add Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="productForm" novalidate>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control"></textarea>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 pe-lg-1">
                                            <div class="mb-3">
                                                <label for="buy_price" class="form-label">Buy Price</label>
                                                <input type="number" name="buy_price" class="form-control">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 ps-lg-1">
                                            <div class="mb-3">
                                                <label for="sell_price" class="form-label">Sell Price</label>
                                                <input type="number" name="sell_price" class="form-control">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="userModalLabel">Add User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="userForm" novalidate>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 pe-lg-1">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 ps-lg-1">
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm
                                                    Password</label>
                                                <input type="password" name="password_confirmation"
                                                    class="form-control">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 pe-lg-1">
                                            <div class="mb-3">
                                                <label for="placeOfBirth" class="form-label">Place of Birth</label>
                                                <input type="text" name="placeOfBirth" class="form-control">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 ps-lg-1">
                                            <div class="mb-3">
                                                <label for="dateOfBirth" class="form-label">Date of Birth</label>
                                                <input type="date" name="dateOfBirth" class="form-control">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"
        integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/b-2.2.3/datatables.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"
        integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js"
        integrity="sha512-XJiEiB5jruAcBaVcXyaXtApKjtNie4aCBZ5nnFDIEFrhGIAvitoqQD6xd9ayp5mLODaCeaXfqQMeVs1ZfhKjRQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"
        integrity="sha512-4+OQqM/O4AkUlCzcn4hcNN7nFwYTYiuMQlhPjdi0Vcpn2ALkrIStJZkxCNauh9WiY6Fkc0FbelhU13feOuX5/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('/');
        }

        function viewImage(imageUrl) {
            Swal.fire({
                imageUrl,
            });
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000
        });

        function editProduct(id) {
            const productModal = $("#productModal");
            $("#productModalLabel").text("Edit Product");
            productModal.on('hidden.bs.modal', function(event) {
                $("#productModalLabel").text("Add Product");
            });
            (new bootstrap.Modal(productModal)).show();
        }

        function editUser(id) {
            console.log(this);
            console.log($("#table-products").DataTable().row(this).data());
            const userModal = $("#userModal");
            $("#userModalLabel").text("Edit User");
            $("#userModalSubmit").text("Save");
            userModal.on('show.bs.modal', function(event) {

            });
            userModal.on('hidden.bs.modal', function(event) {
                $("#userModalLabel").text("Add User");
                $("#userModalSubmit").text("Submit");
            });
            (new bootstrap.Modal(userModal)).show();
        }

        function deleteProduct(id) {
            const sendDeleteRequest = function(id) {
                $.ajax({
                    type: 'DELETE',
                    url: `/rest/module/team/1/products/${id}`,
                    success: function() {
                        $('#table-products').DataTable().ajax.reload();
                        Toast.fire({
                            icon: 'success',
                            title: 'Product deleted'
                        });
                    },
                    error: function() {
                        Toast.fire({
                            icon: 'error',
                            title: 'Failed'
                        });
                    }
                });
            }

            if (localStorage.getItem('deleteProductNoConfirm') === 'true' ?? false) {
                sendDeleteRequest(id);
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                input: "checkbox",
                inputPlaceholder: "Don't show this again",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                preConfirm: function() {
                    sendDeleteRequest(id);
                }
            }).then((result) => {
                localStorage.setItem('deleteProductNoConfirm', !!result.value);
            })
        }

        function deleteUser(id) {
            const sendDeleteRequest = function(id) {
                $.ajax({
                    type: 'DELETE',
                    url: `/rest/module/team/1/users/${id}`,
                    success: function() {
                        $('#table-users').DataTable().ajax.reload();
                        Toast.fire({
                            icon: 'success',
                            title: 'User deleted'
                        });
                    },
                    error: function() {
                        Toast.fire({
                            icon: 'error',
                            title: 'Failed'
                        });
                    }
                });
            }

            if (localStorage.getItem('deleteUserNoConfirm') === 'true' ?? false) {
                sendDeleteRequest(id);
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                input: "checkbox",
                inputPlaceholder: "Don't show this again",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                preConfirm: function() {
                    sendDeleteRequest(id);
                }
            }).then((result) => {
                localStorage.setItem('deleteUserNoConfirm', !!result.value);
            })
        }

        $(document).ready(function() {

            $.extend($.fn.dataTable.defaults, {
                searching: false,
                ordering: false,
            });

            $('#table-products').DataTable({
                serverSide: true,
                stateSave: true,
                dom: 'Blfrtip',
                buttons: {
                    buttons: [{
                        text: '<i class="fa-solid fa-plus"></i>',
                        titleAttr: 'Add a new product',
                        className: 'btn btn-success',
                        action: function(e, dt, node, config) {
                            (new bootstrap.Modal($("#productModal"))).show();

                            $("#productForm").submit(function(event) {
                                event.preventDefault();
                                event.stopPropagation();
                            });

                            $("#productForm").validate({
                                rules: {
                                    name: {
                                        required: true,
                                        minlength: 3,
                                    },
                                    description: {
                                        required: true,
                                        minlength: 3,
                                    },
                                    buy_price: {
                                        required: true,
                                        number: true,
                                        min: 1,
                                    },
                                    sell_price: {
                                        required: true,
                                        number: true,
                                        min: 1,
                                    },
                                    image: {
                                        required: true,
                                        accept: "image/*"
                                    }
                                },
                                highlight: function(input) {
                                    $(input).addClass('is-invalid');
                                },
                                unhighlight: function(input) {
                                    $(input).removeClass('is-invalid');
                                },
                                errorPlacement: function(error, element) {
                                    $(element).next().append(error);
                                },
                                submitHandler: function(form) {
                                    $("#productForm button[type=submit]").prop(
                                        "disabled", true);
                                    $("#productForm button[type=submit]").html(`
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...
                                    `);
                                    const formData = new FormData(form);
                                    $.ajax({
                                        type: "POST",
                                        url: "/rest/module/team/1/products",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function() {
                                            Toast.fire({
                                                icon: 'success',
                                                title: 'Product added'
                                            });
                                            $("#productForm").trigger(
                                                "reset");
                                        },
                                        error: function() {
                                            Toast.fire({
                                                icon: 'error',
                                                title: 'Failed'
                                            });
                                        },
                                        complete: function() {
                                            $("#productForm button[type=submit]")
                                                .prop("disabled",
                                                    false);
                                            $("#productForm button[type=submit]")
                                                .html(`Submit`);
                                        }
                                    })
                                }
                            });
                        }
                    }],
                    dom: {
                        container: {
                            className: 'dt-buttons btn-group flex-wrap float-end'
                        }
                    }
                },
                ajax: {
                    url: '/rest/module/team/1/products',
                    dataSrc: function(json) {
                        const data = [];
                        json.data.forEach(item => {
                            data.push({
                                id: item.id,
                                name: item.name,
                                sell_price: `Rp${(new Intl.NumberFormat('id-ID')).format(item.sell_price)}`,
                                buy_price: `Rp${(new Intl.NumberFormat('id-ID')).format(item.buy_price)}`,
                                image_url: `
                                    <button type="button" onclick="viewImage('${item.image_url}')" title="View" class="btn btn-sm btn-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                `,
                                actions: `
                                    <div class="d-block">
                                        <button type="button" onclick="editProduct(${item.id})" title="Edit" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" onclick="deleteProduct(${item.id})" title="Delete" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                `
                            });
                        });

                        return data;
                    },
                    dataFilter: function(rawJson) {
                        const json = $.parseJSON(rawJson);
                        return JSON.stringify({
                            recordsTotal: json.meta.total,
                            recordsFiltered: json.meta.total,
                            data: json.data,
                        });
                    },
                    data: function(data) {
                        const payload = {
                            page: Math.floor(data.start / data.length) + 1,
                            limit: data.length,
                        };
                        return payload;
                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'buy_price'
                    },
                    {
                        data: 'sell_price'
                    },
                    {
                        data: 'image_url'
                    },
                    {
                        data: 'actions'
                    }
                ]
            });

            $('#table-users').DataTable({
                serverSide: true,
                stateSave: true,
                dom: 'Blfrtip',
                buttons: {
                    buttons: [{
                        text: '<i class="fa-solid fa-plus"></i>',
                        titleAttr: 'Add a new user',
                        className: 'btn btn-success',
                        action: function(e, dt, node, config) {
                            (new bootstrap.Modal($("#userModal"))).show();

                            $("#userForm").submit(function(event) {
                                event.preventDefault();
                                event.stopPropagation();
                            });

                            $("#userForm").validate({
                                rules: {
                                    email: {
                                        required: true,
                                        email: true,
                                    },
                                    name: {
                                        required: true,
                                        minlength: 3,
                                    },
                                    password: {
                                        required: true,
                                        minlength: 3,
                                    },
                                    password_confirmation: {
                                        required: true,
                                        equalTo: `#userForm input[name="password"]`
                                    },
                                    gender: {
                                        required: true,
                                    },
                                    placeOfBirth: {
                                        required: true,
                                        minlength: 3
                                    },
                                    dateOfBirth: {
                                        required: true,
                                        dateISO: true,
                                    }
                                },
                                highlight: function(input) {
                                    $(input).addClass('is-invalid');
                                },
                                unhighlight: function(input) {
                                    $(input).removeClass('is-invalid');
                                },
                                errorPlacement: function(error, element) {
                                    $(element).next().append(error);
                                },
                                submitHandler: function(form) {
                                    $("#userForm button[type=submit]").prop(
                                        "disabled", true);
                                    $("#userForm button[type=submit]").html(`
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...
                                    `);
                                    $.ajax({
                                        type: "POST",
                                        url: "/rest/module/team/1/users",
                                        data: $(form).serialize(),
                                        success: function() {
                                            Toast.fire({
                                                icon: 'success',
                                                title: 'User added'
                                            });
                                            $("#userForm").trigger(
                                                "reset");
                                        },
                                        error: function() {
                                            Toast.fire({
                                                icon: 'error',
                                                title: 'Failed'
                                            });
                                        },
                                        complete: function() {
                                            $("#userForm button[type=submit]")
                                                .prop("disabled",
                                                    false);
                                            $("#userForm button[type=submit]")
                                                .html(`Submit`);
                                        }
                                    })
                                }
                            });
                        }
                    }],
                    dom: {
                        container: {
                            className: 'dt-buttons btn-group flex-wrap float-end'
                        }
                    }
                },
                ajax: {
                    url: '/rest/module/team/1/users',
                    dataSrc: function(json) {
                        const data = [];
                        json.data.forEach(item => {
                            data.push({
                                id: item.id,
                                email: item.email,
                                name: item.name,
                                gender: `${item.gender.substring(0,1).toUpperCase()}${item.gender.substring(1)}`,
                                placeOfBirth: item.placeOfBirth,
                                dateOfBirth: formatDate(new Date(item.dateOfBirth)),
                                actions: `
                                    <div class="d-block">
                                        <button type="button" onclick="editUser(${item.id})" title="Edit" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" onclick="deleteUser(${item.id})" title="Delete" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                `
                            });
                        });

                        return data;
                    },
                    dataFilter: function(rawJson) {
                        const json = $.parseJSON(rawJson);
                        return JSON.stringify({
                            recordsTotal: json.meta.total,
                            recordsFiltered: json.meta.total,
                            data: json.data,
                        });
                    },
                    data: function(data) {
                        const payload = {
                            page: Math.floor(data.start / data.length) + 1,
                            limit: data.length,
                        };
                        return payload;
                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'gender'
                    },
                    {
                        data: 'placeOfBirth'
                    },
                    {
                        data: 'dateOfBirth'
                    },
                    {
                        data: 'actions'
                    }
                ]
            });
        });
    </script>
</body>

</html>
