<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD APP</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('global/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/index.css') }}">
    {{-- <style>
        body {
            background-image: url({{ asset('global/images/bg-main.webp') }});
            overflow: hidden;
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style> --}}
</head>

<body>
    {{-- add new employee modal start --}}
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="First Name"
                                    required>
                            </div>
                            <div class="col-lg">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name"
                                    required>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                        </div>
                        <div class="my-2">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
                        </div>
                        <div class="my-2">
                            <label for="post">Post</label>
                            <input type="text" name="post" class="form-control" placeholder="Post" required>
                        </div>
                        <div class="my-2">
                            <label for="avatar">Select Avatar</label>
                            <input type="file" name="avatar" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_employee_btn" class="btn btn-primary">Add Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add new employee modal end --}}

    {{-- edit employee modal start --}}
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="emp_id" id="emp_id">
                    <input type="hidden" name="emp_avatar" id="emp_avatar">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control"
                                    placeholder="First Name" required>
                            </div>
                            <div class="col-lg">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control"
                                    placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="E-mail" required>
                        </div>
                        <div class="my-2">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                placeholder="Phone" required>
                        </div>
                        <div class="my-2">
                            <label for="post">Post</label>
                            <input type="text" name="post" id="post" class="form-control"
                                placeholder="Post" required>
                        </div>
                        <div class="my-2">
                            <label for="avatar">Select Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                        <div class="mt-2" id="avatar">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_employee_btn" class="btn btn-success">Update
                            Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit employee modal end --}}

    <body class="bg-light">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between align-items-center nav-bar">
                            <div class="logo">
                                <h2>Manage Employees</h2>
                            </div>
                            <button class="btn btn-light" data-bs-toggle="modal"
                                data-bs-target="#addEmployeeModal"><i class="bi-plus-circle me-2"></i>Add New
                                Employee</button>
                        </div>
                        <div class="card-body" id="show_all_employees">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('global/jqeury.js') }}"></script>
        <script src="{{ asset('global/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('global/datatables.min.js') }}"></script>
        <script src="{{ asset('global/sweetalert.js') }}"></script>
        <script>
            $(function() {
                // add new employee ajax request
                $("#add_employee_form").submit(function(e) {
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#add_employee_btn").text('Adding...');
                    $.ajax({
                        url: '{{ route('store') }}',
                        method: 'post',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            console.log(response, 'res');
                            if (response.status == 200) {
                                Swal.fire(
                                    'Added!',
                                    'Employee Added Successfully!',
                                    'success'
                                )
                                fetchAllEmployees();
                            }
                            $("#add_employee_btn").text('Add Employee');
                            $("#add_employee_form")[0].reset();
                            $("#addEmployeeModal").modal('hide');
                        }
                    });
                });

                // edit employee ajax request
                $(document).on('click', '.editIcon', function(e) {
                    e.preventDefault();
                    let id = $(this).attr('id');
                    $.ajax({
                        url: '{{ route('edit') }}',
                        method: 'get',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response, 'edit');
                            $("#fname").val(response.first_name);
                            $("#lname").val(response.last_name);
                            $("#email").val(response.email);
                            $("#phone").val(response.phone);
                            $("#post").val(response.post);
                            $("#avatar").html(
                                `<img src="storage/images/${response.avatar}" width="100" class="img-fluid img-thumbnail">`
                            );
                            $("#emp_id").val(response.id);
                            $("#emp_avatar").val(response.avatar);
                        }
                    });
                });

                // update employee ajax request
                $("#edit_employee_form").submit(function(e) {
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#edit_employee_btn").text('Updating...');
                    $.ajax({
                        url: '{{ route('update') }}',
                        method: 'post',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire(
                                    'Updated!',
                                    'Employee Updated Successfully!',
                                    'success'
                                )
                                fetchAllEmployees();
                            }
                            $("#edit_employee_btn").text('Update Employee');
                            $("#edit_employee_form")[0].reset();
                            $("#editEmployeeModal").modal('hide');
                        }
                    });
                });

                // delete employee ajax request
                $(document).on('click', '.deleteIcon', function(e) {
                    e.preventDefault();
                    let id = $(this).attr('id');
                    let csrf = '{{ csrf_token() }}';
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '{{ route('delete') }}',
                                method: 'delete',
                                data: {
                                    id: id,
                                    _token: csrf
                                },
                                success: function(response) {
                                    console.log(response);
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                    fetchAllEmployees();
                                }
                            });
                        }
                    })
                });

                // fetch all employees ajax request
                fetchAllEmployees();

                function fetchAllEmployees() {
                    $.ajax({
                        url: '{{ route('fetchAll') }}',
                        method: 'get',
                        success: function(response) {
                            // console.log(JSON.parse(response), 'fetch');
                            $("#show_all_employees").html(response);
                            $("table").DataTable({
                                order: [0, 'asc'],
                                columnDefs: [{
                                    targets: [1, 2, 3, 4, 5, 6],
                                    orderable: false
                                }]
                            });
                        }
                    });
                }
            });
        </script>

        <footer>
            <div class="footer text-center mb-6">
                <p>&copy; Engr. Jezreel Abella </p>
            </div>
        </footer>
    </body>

</html>
