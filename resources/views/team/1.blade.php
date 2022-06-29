<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team Assignment 1</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                                <a class="btn btn-sm btn-secondary" title="Logout" href="/auth/logout"><i
                                        class="fa-solid fa-right-from-bracket"></i></a>
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
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" class="form-select">
                                            @foreach ($roleList as $role)
                                            <option value="{{ $role }}">{{ ucwords($role) }}</option>
                                            @endforeach
                                        </select>
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
        var activeTab = null;
        if (activeTab = localStorage.getItem('activeTab')) {
            (new bootstrap.Tab($(`button.nav-link#${activeTab}`))).show();
        }
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }

        function viewImage(imageUrl) {
            Swal.fire({
                imageUrl,
            });
        }

        var Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000
        });

        function viewProduct(el) {
            var productModal = $("#productModal");
            productModal.one('show.bs.modal', function(event) {
                var tr = $(el).closest("tr");
                var selectedProduct = $('#table-products').DataTable().row(tr).data();

                $("#productForm").find("input").val(function(index, value) {
                    return selectedProduct[this.name];
                });

                $("#productForm").find("input").each(function(_, el) {
                    $(el).prop('disabled', true)
                });

                $(`#productForm textarea[name="description"]`).val(selectedProduct['description']);
                $(`#productForm textarea[name="description"]`).prop('disabled', true);

                $("#productModalLabel").text("View Product");
                $(`#productForm input[name="image"]`).closest("div.mb-3").hide();
                $(`#productForm button[type="submit"]`).hide();

                $("#productForm").removeData("validator");
                $("#productForm").off(".validate");
            });

            productModal.one('hidden.bs.modal', function(event) {
                $("#productModalLabel").text("Add Product");
                $(`#productForm button[type="submit"]`).text("Submit");
                $(`#productForm input`).each(function(_, el) {
                    $(el).removeAttr('disabled');
                });
                $(`#productForm textarea[name="description"]`).removeAttr('disabled');
                $(`#productForm input[name="image"]`).closest("div.mb-3").show();
                $(`#productForm button[type="submit"]`).show();
                $('#productForm').trigger('reset');
            });

            (new bootstrap.Modal(productModal)).show();
        }

        function editProduct(el) {
            var productModal = $("#productModal");
            productModal.one('show.bs.modal', function(event) {
                var tr = $(el).closest("tr");
                var selectedProduct = $('#table-products').DataTable().row(tr).data();

                $("#productForm").find("input").val(function(index, value) {
                    return selectedProduct[this.name];
                });
                $(`#productForm textarea[name="description"]`).val(selectedProduct['description']);

                $("#productModalLabel").text("Edit Product");
                $(`#productForm button[type="submit"]`).text("Save");

                $("#productForm").removeData("validator");
                $("#productForm").off(".validate");
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
                            required: false,
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
                        var formData = new FormData(form);
                        formData.append("_method", "PATCH");
                        $.ajax({
                            type: "POST",
                            url: `/rest/module/team/1/products/${selectedProduct['id']}`,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: formData,
                            processData: false,
                            contentType: false,
                            beforeSend: function(xhr) {
                                $("#productForm button[type=submit]").prop(
                                    "disabled", true);
                                $("#productForm button[type=submit]").html(`
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...
                                    `);
                            },
                            success: function() {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Product updated'
                                });
                                $('#table-products')
                                    .DataTable().ajax
                                    .reload();
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
                                    .html(`Save`);
                            }
                        })
                    }
                });
            });
            productModal.one('hidden.bs.modal', function(event) {
                $("#productModalLabel").text("Add Product");
                $(`#productForm button[type="submit"]`).text("Submit");
                $('#productForm').trigger('reset');
                $('#productForm .form-control').each(function() {
                    $(this).removeClass('is-invalid');
                });
            });

            (new bootstrap.Modal(productModal)).show();
        }

        function viewUser(el) {
            var userModal = $("#userModal");
            userModal.one('show.bs.modal', function(event) {
                var tr = $(el).closest("tr");
                var selectedUser = $('#table-users').DataTable().row(tr).data();
                selectedUser['dateOfBirth'] = formatDate(selectedUser['dateOfBirth']);

                $("#userForm").find("input").val(function(index, value) {
                    return selectedUser[this.name];
                });

                $(`#userForm select[name="gender"]`).val(selectedUser['gender']);
                $(`#userForm select[name="role"]`).val(selectedUser['role']);

                $("#userForm").find("input").each(function(_, el) {
                    $(el).prop("disabled", true);
                });

                $(`#userForm select`).prop('disabled', true);

                $("#userModalLabel").text("View User");
                $(`#userForm button[type="submit"]`).hide();
                $(`#userForm input[name="password"]`).closest("div.row").hide();

                $("#userForm").removeData("validator");
                $("#userForm").off(".validate");
            });
            userModal.one('hidden.bs.modal', function(event) {
                $("#userModalLabel").text("Add User");
                $(`#userForm button[type="submit"]`).text("Submit");

                $("#userForm").find("input").each(function(_, el) {
                    $(el).removeAttr("disabled");
                });

                $(`#userForm select`).removeAttr('disabled');

                $(`#userForm input[name="password"]`).closest("div.row").show();
                $(`#userForm button[type="submit"]`).show();
                $('#userForm').trigger('reset');
                $('#userForm .form-control').each(function() {
                    $(this).removeClass('is-invalid');
                });
            });

            (new bootstrap.Modal(userModal)).show();
        }

        function editUser(el) {
            var userModal = $("#userModal");
            userModal.one('show.bs.modal', function(event) {
                var tr = $(el).closest("tr");
                var selectedUser = $('#table-users').DataTable().row(tr).data();
                selectedUser['dateOfBirth'] = formatDate(selectedUser['dateOfBirth']);

                $("#userForm").find("input").val(function(index, value) {
                    return selectedUser[this.name];
                });

                $(`#userForm select[name="gender"]`).val(selectedUser['gender']);
                $(`#userForm select[name="role"]`).val(selectedUser['role']);

                $("#userModalLabel").text("Edit User");
                $(`#userForm button[type="submit"]`).text("Save");
                $(`#userForm input[name="email"]`).prop("disabled", true);
                $(`#userForm input[name="password"]`).prop("disabled", true);
                $(`#userForm input[name="password_confirmation"]`).prop("disabled", true);
                $(`#userForm input[name="password"]`).closest("div.row").hide();

                $("#userForm").removeData("validator");
                $("#userForm").off(".validate");
                $("#userForm").validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 3,
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
                        $.ajax({
                            type: "PATCH",
                            url: `/rest/module/team/1/users/${selectedUser['id']}`,
                            data: $(form).serialize(),
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            beforeSend: function(xhr) {
                                $("#userForm button[type=submit]").prop(
                                    "disabled", true);
                                $("#userForm button[type=submit]").html(`
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...
                                    `);
                            },
                            success: function() {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'User updated'
                                });
                                $('#table-users')
                                    .DataTable().ajax
                                    .reload();
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
                                    .html(`Save`);
                            }
                        })
                    }
                });
            });
            userModal.one('hidden.bs.modal', function(event) {
                $("#userModalLabel").text("Add User");
                $(`#userForm button[type="submit"]`).text("Submit");
                $(`#userForm input[name="email"]`).removeAttr("disabled");
                $(`#userForm input[name="password"]`).removeAttr("disabled");
                $(`#userForm input[name="password_confirmation"]`).removeAttr("disabled");
                $(`#userForm input[name="password"]`).closest("div.row").show();
                $('#userForm').trigger('reset');
                $('#userForm .form-control').each(function() {
                    $(this).removeClass('is-invalid');
                });
            });

            (new bootstrap.Modal(userModal)).show();
        }

        function deleteProduct(id) {
            var sendDeleteRequest = function(id) {
                $.ajax({
                    type: 'DELETE',
                    url: `/rest/module/team/1/products/${id}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
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
            var sendDeleteRequest = function(id) {
                $.ajax({
                    type: 'DELETE',
                    url: `/rest/module/team/1/users/${id}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
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

            $('button.nav-link').on('show.bs.tab', function () {
                localStorage.setItem('activeTab', this.id);
            });

            $("#productForm").submit(function(event) {
                event.preventDefault();
                event.stopPropagation();
            });

            $("#userForm").submit(function(event) {
                event.preventDefault();
                event.stopPropagation();
            });

            $('#table-products').DataTable({
                serverSide: true,
                stateSave: true,
                dom: 'Blfrtip',
                @can('product.create')
                buttons: {
                    buttons: [{
                        text: '<i class="fa-solid fa-plus"></i>',
                        titleAttr: 'Add a new product',
                        className: 'btn btn-success',
                        action: function(e, dt, node, config) {
                            var productModal = $("#productModal");

                            productModal.one('show.bs.modal', function(event) {
                                $("#productForm").removeData("validator");
                                $("#productForm").off(".validate");
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
                                        var formData = new FormData(form);
                                        $.ajax({
                                            type: "POST",
                                            url: "/rest/module/team/1/products",
                                            data: formData,
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            processData: false,
                                            contentType: false,
                                            beforeSend: function(
                                                xhr) {
                                                $("#productForm button[type=submit]")
                                                    .prop(
                                                        "disabled",
                                                        true);
                                                $("#productForm button[type=submit]")
                                                    .html(`
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...
                                    `);
                                            },
                                            success: function() {
                                                Toast.fire({
                                                    icon: 'success',
                                                    title: 'Product added'
                                                });
                                                $("#productForm")
                                                    .trigger(
                                                        "reset"
                                                    );
                                                $('#table-products')
                                                    .DataTable()
                                                    .ajax
                                                    .reload();
                                            },
                                            error: function() {
                                                Toast.fire({
                                                    icon: 'error',
                                                    title: 'Failed'
                                                });
                                            },
                                            complete: function() {
                                                $("#productForm button[type=submit]")
                                                    .prop(
                                                        "disabled",
                                                        false);
                                                $("#productForm button[type=submit]")
                                                    .html(
                                                        `Submit`
                                                    );
                                            }
                                        })
                                    }
                                });
                            });

                            productModal.one('hidden.bs.modal', function(event) {
                                $('#productForm .form-control').each(function() {
                                    $(this).removeClass('is-invalid');
                                });
                            });

                            (new bootstrap.Modal(productModal)).show();
                        }
                    }],
                    dom: {
                        container: {
                            className: 'dt-buttons btn-group flex-wrap float-end'
                        }
                    }
                },
                @endcan
                ajax: {
                    url: '/rest/module/team/1/products',
                    dataSrc: 'data',
                    dataFilter: function(rawJson) {
                        var json = $.parseJSON(rawJson);
                        return JSON.stringify({
                            recordsTotal: json.meta.total,
                            recordsFiltered: json.meta.total,
                            data: json.data,
                        });
                    },
                    data: function(data) {
                        var payload = {
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
                        data: 'buy_price',
                        render: function(data, type, row, meta) {
                            return `Rp${(new Intl.NumberFormat('id-ID')).format(data)}`;
                        }
                    },
                    {
                        data: 'sell_price',
                        render: function(data, type, row, meta) {
                            return `Rp${(new Intl.NumberFormat('id-ID')).format(data)}`;
                        }
                    },
                    {
                        data: 'image_url',
                        render: function(data, type, row, meta) {
                            return `
                                    <button type="button" onclick="viewImage('${data}')" title="View" class="btn btn-sm btn-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                `;
                        }
                    },
                    {
                        data: 'actions',
                        render: function(data, type, row, meta) {
                            return `
                                    <div class="d-block">
                                        @can('product.read')
                                        <button type="button" onclick="viewProduct(this)" title="View" class="btn btn-sm btn-secondary">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        @endcan
                                        @can('product.update')
                                        <button type="button" onclick="editProduct(this)" title="Edit" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        @endcan
                                        @can('product.delete')
                                        <button type="button" onclick="deleteProduct(${row.id})" title="Delete" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        @endcan
                                    </div>
                                `;
                        }
                    }
                ]
            });

            $('#table-users').DataTable({
                serverSide: true,
                stateSave: true,
                dom: 'Blfrtip',
                @can('user.create')
                buttons: {
                    buttons: [{
                        text: '<i class="fa-solid fa-plus"></i>',
                        titleAttr: 'Add a new user',
                        className: 'btn btn-success',
                        action: function(e, dt, node, config) {
                            var userModal = $("#userModal");

                            userModal.one('show.bs.modal', function(event) {
                                $("#userForm").removeData("validator");
                                $("#userForm").off(".validate");
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
                                        $.ajax({
                                            type: "POST",
                                            url: "/rest/module/team/1/users",
                                            data: $(form)
                                                .serialize(),
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            beforeSend: function(
                                                xhr) {
                                                $("#userForm button[type=submit]")
                                                    .prop(
                                                        "disabled",
                                                        true);
                                                $("#userForm button[type=submit]")
                                                    .html(`
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...
                                        `);
                                            },
                                            success: function() {
                                                Toast.fire({
                                                    icon: 'success',
                                                    title: 'User added'
                                                });
                                                $("#userForm")
                                                    .trigger(
                                                        "reset"
                                                    );
                                                $('#table-users')
                                                    .DataTable()
                                                    .ajax
                                                    .reload();
                                            },
                                            error: function() {
                                                Toast.fire({
                                                    icon: 'error',
                                                    title: 'Failed'
                                                });
                                            },
                                            complete: function() {
                                                $("#userForm button[type=submit]")
                                                    .prop(
                                                        "disabled",
                                                        false);
                                                $("#userForm button[type=submit]")
                                                    .html(
                                                        `Submit`
                                                    );
                                            }
                                        })
                                    }
                                });
                            });

                            userModal.one('hidden.bs.modal', function(event) {
                                $('#userForm .form-control').each(function() {
                                    $(this).removeClass('is-invalid');
                                });
                            });

                            (new bootstrap.Modal(userModal)).show();

                        }
                    }],
                    dom: {
                        container: {
                            className: 'dt-buttons btn-group flex-wrap float-end'
                        }
                    }
                },
                @endcan
                ajax: {
                    url: '/rest/module/team/1/users',
                    dataSrc: 'data',
                    dataFilter: function(rawJson) {
                        var json = $.parseJSON(rawJson);
                        return JSON.stringify({
                            recordsTotal: json.meta.total,
                            recordsFiltered: json.meta.total,
                            data: json.data,
                        });
                    },
                    data: function(data) {
                        var payload = {
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
                        data: 'gender',
                        render: function(data, type, row, meta) {
                            return `${data.substring(0,1).toUpperCase()}${data.substring(1)}`;
                        }
                    },
                    {
                        data: 'placeOfBirth'
                    },
                    {
                        data: 'dateOfBirth',
                        render: function(data, type, row, meta) {
                            return formatDate(data);
                        }
                    },
                    {
                        data: 'actions',
                        render: function(data, type, row, meta) {
                            return `
                                    <div class="d-block">
                                        @can('user.read')
                                        <button type="button" onclick="viewUser(this)" title="View" class="btn btn-sm btn-secondary">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        @endcan
                                        @can('user.update')
                                        <button type="button" onclick="editUser(this)" title="Edit" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        @endcan
                                        @can('user.delete')
                                        <button type="button" onclick="deleteUser(${row.id})" title="Delete" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        @endcan
                                    </div>
                                `;
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>
