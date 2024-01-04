<?php
session_start();
if (!isset($_SESSION["logedIn"])) {
    header("Location: page-login.php");
    exit();
}
$_SESSION["item"] = "portfolio";
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

    <title>Portfolio - Mucheco</title>

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
                            <h1>Portfolio</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item">Page Component</li>
                                    <li class="breadcrumb-item active">Portfolio</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->
                        <div class="col-md-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
                                Add Portfolio
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
                                            <th>Site Name</th>
                                            <th>Site Link</th>
                                            <th>Technology Used</th>
                                            <th>Category</th>
                                            <th>Image</th>
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
    <!--ADD Modal -->
    <div class="modal fade modal-fullscreen" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Add New Portfolio</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-portfolio-form">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="site_name"><strong>Site Name</strong></label>
                                <input type="text" class="form-control" name="site_name" id="site_name" placeholder="Enter Site Name" value="">
                            </div>
                            <div class="col-md-8">
                                <label for="site_link"><strong>Site Link</strong></label>
                                <input type="text" class="form-control" name="site_link" id="site_link" placeholder="Enter Site Link" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="image"><strong>Image</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg,.webp" name="image" id="image" required>
                            </div>
                            <div class="col-md-4">
                                <label for="technology"><strong>Technology Used</strong></label>
                                <input type="text" class="form-control" name="technology" id="technology" placeholder="Enter Technology Used" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="category"><strong>Category</strong></label>
                                <select name="category" id="category" class="form-control">
                                    <option value="" selected>-Select Category-</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 text-center mt-3">
                                <button id="portfolio-add" type="submit" class="btn btn-primary">Submit</button>
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
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Portfolio</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-portfolio-form">
                        <div class="row">
                            <input type="hidden" id="data_id">
                            <div class="col-md-4">
                                <label for="edit_site_name"><strong>Site Name</strong></label>
                                <input type="text" class="form-control" name="edit_site_name" id="edit_site_name" placeholder="Enter Site Name" value="">
                            </div>
                            <div class="col-md-8">
                                <label for="edit_site_link"><strong>Site Link</strong></label>
                                <input type="text" class="form-control" name="edit_site_link" id="edit_site_link" placeholder="Enter Site Link" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="edit_image"><strong>Image</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg,.webp" name="edit_image" id="edit_image">
                            </div>
                            <div class="col-md-4">
                                <label for="edit_technology"><strong>Technology Used</strong></label>
                                <input type="text" class="form-control" name="edit_technology" id="edit_technology" placeholder="Enter Technology Used" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="edit_category"><strong>Category</strong></label>
                                <select name="edit_category" id="edit_category" class="form-control">
                                    <option value="" selected>-Select Category-</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 text-center mt-3">
                                <button id="portfolio-edit" type="submit" class="btn btn-primary">Submit</button>
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
                    "url": "controller/Pages/get-portfolio-list.php"
                },
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [3, 4, 5]
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

            $(function() {
                var formdata = new FormData();
                formdata.append("request_type", "get_category");
                $.ajax({
                    url: "controller/User/get-assets.php",
                    "method": "POST",
                    "timeout": 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "data": formdata,
                    success: function(data) {
                        var responce = $.parseJSON(data);
                        if (responce.status == 1) {
                            let html = '<option value="" selected>-Select Category-</option>';
                            $.each(responce.data, function(index, value) {
                                html = html + `<option value="${value.id}">${value.name}</option>`;
                            });
                            $('#category').html(html);
                        } else if (responce.status == 0) {
                            console.log(responce.message);
                        }
                    }
                });
            });

            $("#add-portfolio-form").submit((e) => {
                e.preventDefault();
                let site_name = $("#site_name").val();
                let site_link = $("#site_link").val();
                let technology = $("#technology").val();
                let category = $("#category option:selected").val();
                var image = $("#image").prop("files")[0];

                var isValid = validator.form();
                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("request_type", "add_portfolio");
                    formdata.append("site_name", site_name);
                    formdata.append("site_link", site_link);
                    formdata.append("technology", technology);
                    formdata.append("category", category);
                    formdata.append("image", image);

                    $.ajax({
                        "url": "controller/Pages/portfolio-operation.php",
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

            $("#edit-portfolio-form").submit((e) => {
                e.preventDefault();
                let dataId = $("#data_id").val();
                let site_name = $("#edit_site_name").val();
                let site_link = $("#edit_site_link").val();
                let technology = $("#edit_technology").val();
                let category = $("#edit_category option:selected").val();
                var image = $("#edit_image").prop("files")[0];

                var isValid = edit_validator.form();
                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("request_type", "edit_portfolio");
                    formdata.append("dataId", dataId);
                    formdata.append("site_name", site_name);
                    formdata.append("site_link", site_link);
                    formdata.append("technology", technology);
                    formdata.append("category", category);
                    formdata.append("image", image);

                    $.ajax({
                        "url": "controller/Pages/portfolio-operation.php",
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
                        formdata.append("request_type", "delete_portfolio");
                        formdata.append("dataId", dataId);

                        $.ajax({
                            "url": "controller/Pages/portfolio-operation.php",
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
                    formdata.append("request_type", "get_portfolio_by_id");
                    formdata.append("dataId", dataId);

                    $.ajax({
                        "url": "controller/Pages/portfolio-operation.php",
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
                                $("#edit_site_name").val(responce.data.site_name);
                                $("#edit_site_link").val(responce.data.site_link);
                                $("#edit_technology").val(responce.data.language);
                                $("#edit_category").html(responce.data.categories);
                                $('#editDataModal').modal('show')
                            } else if (responce.status == 0) {
                                alert(responce.message);
                            }
                        }
                    });
                }
            });

            validator = $('#add-portfolio-form').validate({
                rules: {
                    'site_name': {
                        required: true,
                        minlength: 3,
                    },
                    'site_link': {
                        required: true,
                        minlength: 5
                    },
                    'technology': {
                        required: true
                    },
                    'category': {
                        required: true
                    },
                },
                messages: {
                    'site_name': {
                        required: "Site Name is required",
                        minlength: "Site Name can not be less than 3 character",
                    },
                    'site_link': {
                        required: "Site Link is required",
                        minlength: "Site Link can not be less than 5 character",
                    },
                    'technology': {
                        required: "Technology Used is required",
                    },
                    'category': {
                        required: "Category is required",
                    },
                }
            });

            edit_validator = $('#edit-portfolio-form').validate({
                rules: {
                    'edit_site_name': {
                        required: true,
                        minlength: 3,
                    },
                    'edit_site_link': {
                        required: true,
                        minlength: 5
                    },
                    'edit_technology': {
                        required: true
                    },
                    'edit_category': {
                        required: true
                    },
                },
                messages: {
                    'edit_site_name': {
                        required: "Site Name is required",
                        minlength: "Site Name can not be less than 3 character",
                    },
                    'edit_site_link': {
                        required: "Site Link is required",
                        minlength: "Site Link can not be less than 5 character",
                    },
                    'edit_technology': {
                        required: "Technology Used is required",
                    },
                    'edit_category': {
                        required: "Category is required",
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