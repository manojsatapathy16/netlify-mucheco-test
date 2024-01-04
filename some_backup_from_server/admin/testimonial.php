<?php
session_start();
if (!isset($_SESSION["logedIn"])) {
    header("Location: page-login.php");
    exit();
}
$_SESSION["item"] = "testimonial";
$_SESSION["page_component"] = "about-us";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tstimonial - Mucheco</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/vendor/datatables/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- loder -->
    <img src="assets/images/ajax-loader.gif" id="loading-image" style="display: none;position: absolute;width: 80px;top: 50%;left: 50%;transform: translate(-50px, -50px);z-index: 9999;">
    <!-- End of loder -->

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once('views/Elements/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php require_once('views/Elements/header.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="pagetitle col-md-10">
                            <h1>Testimonial</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item">About Us</li>
                                    <li class="breadcrumb-item active">Testimonial</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->
                        <div class="col-md-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
                                Add Testimonial
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <span class="label label-success btn-xs" id="spandatatable-responsive_info"></span><br><br>
                                <div class="table-responsive">
                                    <table id="datatable-responsive" class="display nowrap table table-hover table-striped table-bordered">
                                        <thead>
                                            <th>Customer Name</th>
                                            <th>Company</th>
                                            <th>Profile</th>
                                            <th>Key Point</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td colspan="6" class="dataTables_empty">Loading data from server...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="row">

                    </div>
                    <!-- End Main Content -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once('views/Elements/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Modal -->
    <div class="modal fade modal-fullscreen" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Add New Testimonial</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-testimonial-form">
                        <div class="row">
                            <div class="col-md-4" id="media-file-set">
                                <label for="customer_name"><strong>Customer Name</strong></label>
                                <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Enter Customer Name" value="">
                            </div>
                            <div class="col-md-4" id="media-file-set">
                                <label for="company"><strong>Company</strong></label>
                                <input type="text" class="form-control" name="company" id="company" placeholder="Enter Company" value="">
                            </div>
                            <div class="col-md-4" id="media-file-set">
                                <label for="profile"><strong>Profile Image</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg,.webp" name="profile" id="profile">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <label for="key_point"><strong>Key Point</strong></label>
                                <input type="text" class="form-control" name="key_point" id="key_point" placeholder="Enter key point" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="description"><strong>Description</strong></label>
                                <textarea name="description" id="description" class="form-control" style="height: 100px" placeholder="Enter description" value=""></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button id="testimonial-add" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade modal-fullscreen" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Testimonial</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-testimonial-form">
                        <div class="row">
                            <input type="hidden" id="data_id">
                            <div class="col-md-4" id="media-file-set">
                                <label for="edit_customer_name"><strong>Customer Name</strong></label>
                                <input type="text" class="form-control" name="edit_customer_name" id="edit_customer_name" placeholder="Enter Customer Name" value="">
                            </div>
                            <div class="col-md-4" id="media-file-set">
                                <label for="edit_company"><strong>Company</strong></label>
                                <input type="text" class="form-control" name="edit_company" id="edit_company" placeholder="Enter Company" value="">
                            </div>
                            <div class="col-md-4" id="media-file-set">
                                <label for="edit_profile"><strong>Profile Image</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg,.webp" name="edit_profile" id="edit_profile">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <label for="edit_key_point"><strong>Key Point</strong></label>
                                <input type="text" class="form-control" name="edit_key_point" id="edit_key_point" placeholder="Enter key point" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="edit_description"><strong>Description</strong></label>
                                <textarea name="edit_description" id="edit_description" class="form-control" style="height: 100px" placeholder="Enter description" value=""></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button id="testimonial-edit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/validate.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready(() => {
            var oTable = $('#datatable-responsive').dataTable({
                "bProcessing": true,
                "fixedHeader": {
                    header: true
                },
                "bServerSide": true,
                "bPaginate": true,
                "ajax": {
                    "type": "POST",
                    "url": "controller/Pages/get-testimonial-list.php"
                },
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [2, 5]
                }],
                "aLengthMenu": [
                    [10, 20, 50, 100],
                    [10, 20, 50, 100]
                ],
                "order": [],
                "iDisplayLength": 10,
                "drawCallback": function() {
                    var totalrecords = oTable.fnSettings().fnRecordsTotal();
                    $('.counttotalrecords').html('<i class="icon-ok"></i>Total Records ' + totalrecords);
                    $("span#spandatatable-responsive_info").html('<i class="icon-ok"></i> ' + $("#datatable-responsive_info").text());
                    $("#datatable-responsive_info").hide();
                }
            });


            $("#add-testimonial-form").submit((e) => {
                e.preventDefault();
                let customer_name = $("#customer_name").val();
                let company = $("#company").val();
                let key_point = $("#key_point").val();
                let description = $("#description").val();
                var profile_data = $("#profile").prop("files")[0];

                var isValid = validator.form();
                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("request_type", "add_testimonial");
                    formdata.append("customer_name", customer_name);
                    formdata.append("company", company);
                    formdata.append("key_point", key_point);
                    formdata.append("description", description);
                    formdata.append("profile", profile_data);

                    $.ajax({
                        "url": "controller/Pages/testimonial-operation.php",
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": formdata,
                        success: function(response) {
                            response = JSON.parse(response);
                            if (response.status == 1) {
                                alert(response.message);
                                window.location.reload();
                            } else if (response.status == 0) {
                                alert(response.message);
                            }
                        },
                    });
                }

            })

            $("#edit-testimonial-form").submit((e) => {
                e.preventDefault();
                let dataId = $("#data_id").val();
                let customer_name = $("#edit_customer_name").val();
                let company = $("#edit_company").val();
                let key_point = $("#edit_key_point").val();
                let description = $("#edit_description").val();
                var profile_data = $("#edit_profile").prop("files")[0];

                var isValid = edit_validator.form();
                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("request_type", "edit_testimonial");
                    formdata.append("dataId", dataId);
                    formdata.append("customer_name", customer_name);
                    formdata.append("company", company);
                    formdata.append("key_point", key_point);
                    formdata.append("description", description);
                    formdata.append("profile", profile_data);

                    $.ajax({
                        "url": "controller/Pages/testimonial-operation.php",
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": formdata,
                        success: function(response) {
                            response = JSON.parse(response);
                            if (response.status == 1) {
                                alert(response.message);
                                window.location.reload();
                            } else if (response.status == 0) {
                                alert(response.message);
                            }
                        },
                    });
                }

            })

            $(document).on('click', '.deleteData', function(e) {
                e.preventDefault();
                var dataId = $(this).data('id');
                console.log(dataId);
                if (dataId != '') {
                    if (confirm('Are you sure want to delete')) {
                        var formdata = new FormData();
                        formdata.append("request_type", "delete_testimonial");
                        formdata.append("dataId", dataId);

                        $.ajax({
                            "url": "controller/Pages/testimonial-operation.php",
                            "method": "POST",
                            "timeout": 0,
                            "processData": false,
                            "mimeType": "multipart/form-data",
                            "contentType": false,
                            "data": formdata,
                            success: function(data) {
                                var responce = $.parseJSON(data);
                                if (responce.status == 1) {
                                    alert(responce.message);
                                    location.reload();
                                }
                                if (responce.status == 0) {
                                    alert(responce.message);
                                }

                            }
                        });
                    }
                }
            });

            $(document).on('click', '.editData', function(e) {
                e.preventDefault();
                var dataId = $(this).data('id');
                // console.log(dataId);
                if (dataId != '') {
                    var formdata = new FormData();
                    formdata.append("request_type", "get_testimonial_by_id");
                    formdata.append("dataId", dataId);

                    $.ajax({
                        "url": "controller/Pages/testimonial-operation.php",
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": formdata,
                        success: function(data) {
                            var responce = $.parseJSON(data);
                            if (responce.status == 1) {
                                $("#data_id").val(dataId);
                                $("#edit_customer_name").val(responce.data.customer_name);
                                $("#edit_company").val(responce.data.company);
                                $("#edit_key_point").val(responce.data.key_point);
                                $("#edit_description").val(responce.data.description);
                                $('#editDataModal').modal('show')
                            } else if (responce.status == 0) {
                                alert(responce.message);
                            }
                        }
                    });
                }
            });

            validator = $('#add-testimonial-form').validate({
                rules: {
                    'customer_name': {
                        required: true,
                        minlength: 5,
                        maxlength: 30
                    },
                    'company': {
                        required: true,
                        minlength: 5
                    },
                    'key_point': {
                        required: true,
                        minlength: 5
                    },
                    'description': {
                        required: true,
                        minlength: 10
                    },
                },
                messages: {
                    'customer_name': {
                        required: "Customer Name is required",
                        minlength: "Customer Name can not be less than 5 character",
                        maxlength: "First name can not be cannot greater than 30 character"
                    },
                    'company': {
                        required: "company is required",
                        minlength: "company can not be less than 5 character",
                    },
                    'key_point': {
                        required: "Key Point is required",
                        minlength: "Key Point can not be less than 5 character",
                    },
                    'description': {
                        required: "Description is required",
                        minlength: "Description can not be less than 10 character",
                    },
                }
            });

            edit_validator = $('#edit-testimonial-form').validate({
                rules: {
                    'edit_customer_name': {
                        required: true,
                        minlength: 5,
                        maxlength: 30
                    },
                    'edit_company': {
                        required: true,
                        minlength: 5
                    },
                    'edit_key_point': {
                        required: true,
                        minlength: 5
                    },
                    'edit_description': {
                        required: true,
                        minlength: 10
                    },
                },
                messages: {
                    'edit_customer_name': {
                        required: "Customer Name is required",
                        minlength: "Customer Name can not be less than 5 character",
                        maxlength: "First name can not be cannot greater than 30 character"
                    },
                    'edit_company': {
                        required: "company is required",
                        minlength: "company can not be less than 5 character",
                    },
                    'edit_key_point': {
                        required: "Key Point is required",
                        minlength: "Key Point can not be less than 5 character",
                    },
                    'edit_description': {
                        required: "Description is required",
                        minlength: "Description can not be less than 10 character",
                    },
                }
            });

            // CKEDITOR.replace('description');
            // CKEDITOR.replace('edit_description');

            $('#addDataModal,#editDataModal').on('hidden.bs.modal', function() {
                $(this).find('form').trigger('reset');
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).ajaxStart(function() {
                $('#loading-image').css("display", "block");
            });
            $(document).ajaxComplete(function() {
                $('#loading-image').css("display", "none");
            });

            $(document).ajaxStart(function() {
                $('#loading-image').css("display", "block");
            });
            $(document).ajaxComplete(function() {
                $('#loading-image').css("display", "none");
            });
        })
    </script>
</body>

</html>