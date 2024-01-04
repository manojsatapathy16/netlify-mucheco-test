<?php
session_start();
if (!isset($_SESSION["logedIn"])) {
    header("Location: page-login.php");
    exit();
}
$_SESSION["item"] = "category";
$_SESSION["page_component"] = "page-component";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Category - Mucheco</title>

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
                            <h1>Category</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item">Page Component</li>
                                    <li class="breadcrumb-item active">Category</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->
                        <div class="col-md-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
                                Add Category
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
                                            <th>Name</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td colspan="2" class="dataTables_empty">Loading data from server...</td>
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

    <!-- Add Modal -->
    <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Add Category</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-category-form">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="name"><strong>Category Name</strong></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button id="category-add" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Update Category</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-category-form">
                        <div class="row mt-3">
                            <input type="hidden" id="data_id">
                            <div class="col-md-12">
                                <label for="edit_name"><strong>Category Name</strong></label>
                                <input type="text" class="form-control" name="edit_name" id="edit_name" placeholder="Enter Category Name" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button id="category-edit" type="submit" class="btn btn-primary">Submit</button>
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
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script src="assets/js/validate.js"></script>
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
                    "url": "controller/Pages/get-category-list.php"
                },
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [1]
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

            $("#add-category-form").submit((e) => {
                e.preventDefault();

                let name = $("#name").val();

                var isValid = validator.form();

                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("request_type", "add_category");
                    formdata.append("name", name);
                    formdata.append("type", "portfolio");

                    $.ajax({
                        "url": "controller/Pages/category-operation.php",
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

            $("#edit-category-form").submit((e) => {
                e.preventDefault();
                let dataId = $("#data_id").val();
                let name = $("#edit_name").val();

                var isValid = edit_validator.form();
                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("request_type", "edit_category");
                    formdata.append("dataId", dataId);
                    formdata.append("name", name);
                    formdata.append("type", "portfolio");

                    $.ajax({
                        "url": "controller/Pages/category-operation.php",
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
                if (confirm('Are you sure want to delete')) {
                    var dataId = $(this).data('id');
                    // console.log(metaId);
                    if (dataId != '') {
                        var formdata = new FormData();
                        formdata.append("request_type", "delete_category");
                        formdata.append("dataId", dataId);

                        $.ajax({
                            "url": "controller/Pages/category-operation.php",
                            "method": "POST",
                            "timeout": 0,
                            "processData": false,
                            "mimeType": "multipart/form-data",
                            "contentType": false,
                            "data": formdata,
                            success: function(data) {
                                var responce = $.parseJSON(data);
                                alert(responce.message);
                                location.reload();
                            }
                        });
                    }
                }

            });

            $(document).on('click', '.editData', function(e) {
                e.preventDefault();
                var dataId = $(this).data('id');
                if (dataId != '') {
                    var formdata = new FormData();
                    formdata.append("request_type", "get_category_by_id");
                    formdata.append("dataId", dataId);

                    $.ajax({
                        "url": "controller/Pages/category-operation.php",
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": formdata,
                        success: function(data) {
                            var responce = $.parseJSON(data);
                            // console.log(responce);
                            if (responce.status == 1) {
                                $("#data_id").val(dataId);
                                $("#edit_name").val(responce.data.name);
                                $('#editDataModal').modal('show')
                            } else if (responce.status == 0) {
                                alert(responce.message);
                            }
                        }
                    });
                }
            });

            validator = $('#add-category-form').validate({
                rules: {
                    'name': {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    'name': {
                        required: "Name is required",
                        minlength: "Name can not be less than 3 character",
                    }
                }
            });

            edit_validator = $('#edit-category-form').validate({
                rules: {
                    'edit_name': {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    'edit_name': {
                        required: "Name is required",
                        minlength: "Name can not be less than 3 character",
                    }
                }
            });


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