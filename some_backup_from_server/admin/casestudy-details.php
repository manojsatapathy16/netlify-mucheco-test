<?php
session_start();
if (!isset($_SESSION["logedIn"])) {
    header("Location: page-login.php");
    exit();
}
$_SESSION["item"] = "case-study";
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

    <title>Case Study Details - Mucheco</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/vendor/datatables/jquery.dataTables.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet">
    <style>
        #result-image-gallery img {
            width: inherit;
            margin-top: 10px;
        }

        #result-image-gallery span {
            position: absolute;
            top: 6px;
            right: 9px;
            font-size: 15px;
            background: #ff0000;
            border-radius: 66px;
            height: 21px;
            width: 21px;
            text-align: center;
            color: #fff;
            cursor: pointer;
        }

        #result-image-gallery span i {
            position: relative;
            left: 1px;
            bottom: 1px;
        }
    </style>
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
                            <h1>Case Study Details</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item">About Us</li>
                                    <li class="breadcrumb-item active">Case Study Details</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->
                        <div class="col-md-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
                                Add Case Study
                            </button>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <span class="label label-success btn-xs" id="spandatatable-responsive_info"></span><br><br>
                                <div class="table-responsive">
                                    <table id="datatable-responsive" class="display nowrap table table-hover table-striped table-bordered">
                                        <thead>
                                            <th>Site Name</th>
                                            <th>Site Work</th>
                                            <th>Description</th>
                                            <th>Requirements</th>
                                            <th>Challenges</th>
                                            <th>Solutions</th>
                                            <th>Result</th>
                                            <th>Card Image</th>
                                            <th>Banner Image</th>
                                            <th>Result Image</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td colspan="11" class="dataTables_empty">Loading data from server...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
    <div class="modal fade modal-fullscreen" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Upload Case Study</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-casetudy-form">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="site_name"><strong>Site Name</strong></label>
                                <input type="text" class="form-control" name="site_name" id="site_name" placeholder="Enter Site Name" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="site_work"><strong>Site Work</strong></label>
                                <input type="text" class="form-control" name="site_work" id="site_work" placeholder="Enter Site Work" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="card_image"><strong>Card Image</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg,.webp" name="card_image" id="card_image" required>
                            </div>
                            <div class="col-md-6">
                                <label for="banner_image"><strong>Banner Image</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg,.webp" name="banner_image" id="banner_image" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="description"><strong>Description</strong></label>
                                <div style="height: 200px" id="description"></div>
                                <label id="desc_error" for="description" style="color: red;"></label>
                            </div>
                            <div class="col-md-6">
                                <label for="requirements"><strong>Requirements</strong></label>
                                <div style="height: 200px" id="requirements"></div>
                                <label id="req_error" for="requirements" style="color: red;"></label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="challenges"><strong>Challenges</strong></label>
                                <div style="height: 200px" id="challenges"></div>
                                <label id="chal_error" for="challenges" style="color: red;"></label>
                            </div>
                            <div class="col-md-6">
                                <label for="solutions"><strong>Solutions</strong></label>
                                <div style="height: 200px" id="solutions"></div>
                                <label id="solu_error" for="solutions" style="color: red;"></label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="result"><strong>Result</strong></label>
                                <div style="height: 150px" id="result"></div>
                                <label id="res_error" for="result" style="color: red;"></label>
                            </div>
                            <div class="col-md-6">
                                <label for="result_image"><strong>Result Image</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg,.webp" name="result_image[]" id="result_image" multiple>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button id="casetudy-add" type="submit" class="btn btn-primary">Submit</button>
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
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Update Case Study</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-casetudy-form">
                        <div class="row mt-3">
                            <input type="hidden" name="data_id" id="data_id">
                            <div class="col-md-6">
                                <label for="edit_site_name"><strong>Site Name</strong></label>
                                <input type="text" class="form-control" name="edit_site_name" id="edit_site_name" placeholder="Enter Site Name" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_site_work"><strong>Site Work</strong></label>
                                <input type="text" class="form-control" name="edit_site_work" id="edit_site_work" placeholder="Enter Site Work" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="edit_card_image"><strong>Card Image</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg,.webp" name="edit_card_image" id="edit_card_image">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_banner_image"><strong>Banner Image</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg,.webp" name="edit_banner_image" id="edit_banner_image">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="edit_description"><strong>Description</strong></label>
                                <div style="height: 200px" id="edit_description"></div>
                                <label id="edit_desc_error" for="edit_description" style="color: red;"></label>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_requirements"><strong>Requirements</strong></label>
                                <div style="height: 200px" id="edit_requirements"></div>
                                <label id="edit_req_error" for="edit_requirements" style="color: red;"></label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="edit_challenges"><strong>Challenges</strong></label>
                                <div style="height: 200px" id="edit_challenges"></div>
                                <label id="edit_chal_error" for="edit_challenges" style="color: red;"></label>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_solutions"><strong>Solutions</strong></label>
                                <div style="height: 200px" id="edit_solutions"></div>
                                <label id="edit_solu_error" for="edit_solutions" style="color: red;"></label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="edit_result"><strong>Result</strong></label>
                                <div style="height: 150px" id="edit_result"></div>
                                <label id="edit_res_error" for="edit_result" style="color: red;"></label>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_result_image"><strong>Result Image</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg,.webp" name="edit_result_image[]" id="edit_result_image" multiple>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button id="casetudy-edit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Resut Image Modal -->
    <div class="modal fade modal-fullscreen" id="resultImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Result Images</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="result-image-gallery"></div>
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
    <script src="assets/vendor/quill/quill.min.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script src="assets/js/validate.js"></script>
    <script>
        $(document).ready(() => {
            function setTable() {
                if ($.fn.DataTable.isDataTable('#datatable-responsive')) {
                    $('#datatable-responsive').DataTable().destroy();
                }
                var oTable = $('#datatable-responsive').dataTable({
                    "bProcessing": true,
                    "fixedHeader": {
                        header: true
                    },
                    "bServerSide": true,
                    "bPaginate": true,
                    "ajax": {
                        "type": "POST",
                        "url": "controller/Pages/get-case-study-list.php"
                    },
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [7, 8, 9, 10]
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
            }
            setTable();

            var toolbarOptions = [
                [{
                    font: []
                }, {
                    size: []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ["bold", "italic", "underline", "strike"],
                [{
                    color: []
                }, {
                    background: []
                }],
                [{
                    script: "super"
                }, {
                    script: "sub"
                }],
                [{
                    list: "ordered"
                }, {
                    list: "bullet"
                }, {
                    indent: "-1"
                }, {
                    indent: "+1"
                }],
                ["direction", {
                    align: []
                }],
                ["link", "image", "video"],
                ["clean"]
            ]

            var desc_quill = new Quill('#description', {
                modules: { toolbar: toolbarOptions },
                theme: 'snow'
            });
            var req_quill = new Quill('#requirements', {
                modules: {toolbar: toolbarOptions},
                theme: 'snow'
            });
            var chal_quill = new Quill('#challenges', {
                modules: {toolbar: toolbarOptions},
                theme: 'snow'
            });
            var solu_quill = new Quill('#solutions', {
                modules: {toolbar: toolbarOptions},
                theme: 'snow'
            });
            var res_quill = new Quill('#result', {
                modules: {toolbar: toolbarOptions},
                theme: 'snow'
            });

            var edit_desc_quill = new Quill('#edit_description', {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
            var edit_req_quill = new Quill('#edit_requirements', {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
            var edit_chal_quill = new Quill('#edit_challenges', {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
            var edit_solu_quill = new Quill('#edit_solutions', {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
            var edit_res_quill = new Quill('#edit_result', {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });

            // Form submit
            $("#add-casetudy-form").submit((e) => {
                e.preventDefault();
                let is_error = 0;

                let site_name = $("#site_name").val();
                let site_work = $("#site_work").val();
                let description = desc_quill.container.firstChild.innerHTML;
                let requirements = req_quill.container.firstChild.innerHTML;
                let challenges = chal_quill.container.firstChild.innerHTML;
                let solutions = solu_quill.container.firstChild.innerHTML;
                let result = res_quill.container.firstChild.innerHTML;
                var card_image = $("#card_image").prop("files")[0];
                var banner_image = $("#banner_image").prop("files")[0];

                if (desc_quill.getLength() == 1) {
                    $("#desc_error").text("Description required");
                    is_error = 1;
                } else {
                    $("#desc_error").text("");
                    is_error = 0;
                }
                if (req_quill.getLength() == 1) {
                    $("#req_error").text("Requirements required");
                    is_error = 1;
                } else {
                    $("#req_error").text("");
                    is_error = 0;
                }
                if (chal_quill.getLength() == 1) {
                    $("#chal_error").text("Challenges required");
                    is_error = 1;
                } else {
                    $("#chal_error").text("");
                    is_error = 0;
                }
                if (solu_quill.getLength() == 1) {
                    $("#solu_error").text("Solutions required");
                    is_error = 1;
                } else {
                    $("#solu_error").text("");
                    is_error = 0;
                }
                if (res_quill.getLength() == 1) {
                    $("#res_error").text("Result required");
                    is_error = 1;
                } else {
                    $("#res_error").text("");
                    is_error = 0;
                }

                var isValid = validator.form();

                if (isValid && !is_error) {
                    var formdata = new FormData();
                    formdata.append("request_type", "add_casestudy");
                    formdata.append("site_name", site_name);
                    formdata.append("site_work", site_work);
                    formdata.append("description", description);
                    formdata.append("requirements", requirements);
                    formdata.append("challenges", challenges);
                    formdata.append("solutions", solutions);
                    formdata.append("result", result);
                    formdata.append("card_image", card_image);
                    formdata.append("banner_image", banner_image);

                    var totalfiles = $('#result_image').prop("files").length;
                    for (var index = 0; index < totalfiles; index++) {
                        formdata.append("result_image[]", $('#result_image').prop("files")[index]);
                    }

                    $.ajax({
                        "url": "controller/Pages/case-study-operation.php",
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

            $("#edit-casetudy-form").submit((e) => {
                e.preventDefault();
                let dataId = $("#data_id").val();
                let is_error = 0;

                let site_name = $("#edit_site_name").val();
                let site_work = $("#edit_site_work").val();
                let description = edit_desc_quill.container.firstChild.innerHTML;
                let requirements = edit_req_quill.container.firstChild.innerHTML;
                let challenges = edit_chal_quill.container.firstChild.innerHTML;
                let solutions = edit_solu_quill.container.firstChild.innerHTML;
                let result = edit_res_quill.container.firstChild.innerHTML;
                var card_image = $("#edit_card_image").prop("files")[0];
                var banner_image = $("#edit_banner_image").prop("files")[0];

                if (edit_desc_quill.getLength() == 1) {
                    $("#edit_desc_error").text("Description required");
                    is_error = 1;
                } else {
                    $("#edit_desc_error").text("");
                    is_error = 0;
                }
                if (edit_req_quill.getLength() == 1) {
                    $("#edit_req_error").text("Requirements required");
                    is_error = 1;
                } else {
                    $("#edit_req_error").text("");
                    is_error = 0;
                }
                if (edit_chal_quill.getLength() == 1) {
                    $("#edit_chal_error").text("Challenges required");
                    is_error = 1;
                } else {
                    $("#edit_chal_error").text("");
                    is_error = 0;
                }
                if (edit_solu_quill.getLength() == 1) {
                    $("#edit_solu_error").text("Solutions required");
                    is_error = 1;
                } else {
                    $("#edit_solu_error").text("");
                    is_error = 0;
                }
                if (edit_res_quill.getLength() == 1) {
                    $("#edit_res_error").text("Result required");
                    is_error = 1;
                } else {
                    $("#edit_res_error").text("");
                    is_error = 0;
                }

                var isValid = edit_validator.form();

                if (isValid && !is_error) {
                    var formdata = new FormData();
                    formdata.append("request_type", "edit_casestudy");
                    formdata.append("dataId", dataId);
                    formdata.append("site_name", site_name);
                    formdata.append("site_work", site_work);
                    formdata.append("description", description);
                    formdata.append("requirements", requirements);
                    formdata.append("challenges", challenges);
                    formdata.append("solutions", solutions);
                    formdata.append("result", result);
                    formdata.append("card_image", card_image);
                    formdata.append("banner_image", banner_image);

                    let totalfiles = $('#edit_result_image').prop("files").length;
                    for (let index = 0; index < totalfiles; index++) {
                        formdata.append("result_image[]", $('#edit_result_image').prop("files")[index]);
                    }

                    $.ajax({
                        "url": "controller/Pages/case-study-operation.php",
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
                // console.log(metaId);
                if (dataId != '') {
                    if (confirm('Are you sure want to delete')) {
                        var formdata = new FormData();
                        formdata.append("request_type", "delete_casestudy");
                        formdata.append("dataId", dataId);

                        $.ajax({
                            "url": "controller/Pages/case-study-operation.php",
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
                    formdata.append("request_type", "get_casestudy_by_id");
                    formdata.append("dataId", dataId);

                    $.ajax({
                        "url": "controller/Pages/case-study-operation.php",
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
                                $("#edit_site_name").val(responce.data.site_name);
                                $("#edit_site_work").val(responce.data.site_work);
                                edit_desc_quill.setContents([{
                                    insert: '\n'
                                }]);
                                edit_req_quill.setContents([{
                                    insert: '\n'
                                }]);
                                edit_chal_quill.setContents([{
                                    insert: '\n'
                                }]);
                                edit_solu_quill.setContents([{
                                    insert: '\n'
                                }]);
                                edit_res_quill.setContents([{
                                    insert: '\n'
                                }]);

                                edit_desc_quill.container.firstChild.innerHTML = responce.data.description;
                                edit_req_quill.container.firstChild.innerHTML = responce.data.requirements;
                                edit_chal_quill.container.firstChild.innerHTML = responce.data.challenges;
                                edit_solu_quill.container.firstChild.innerHTML = responce.data.solutions;
                                edit_res_quill.container.firstChild.innerHTML = responce.data.result;
                                $('#editDataModal').modal('show')
                            } else if (responce.status == 0) {
                                alert(responce.message);
                            }
                        }
                    });
                }
            });

            // Result Image Modal show
            $(document).on('click', '.editResultImage', function(e) {
                e.preventDefault();
                var dataId = $(this).data('id');

                if (dataId != '') {
                    var formdata = new FormData();
                    formdata.append("request_type", "get_result_image");
                    formdata.append("dataId", dataId);

                    $.ajax({
                        "url": "controller/Pages/case-study-operation.php",
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": formdata,
                        success: function(data) {
                            var responce = $.parseJSON(data);
                            if (responce.status == 1) {
                                let html = '';
                                $.each(responce.data.result_image, function(index, value) {
                                    html = html + `<div class="col-md-6" id="i${index}">
                                                <img src="${value}" alt="Result Image">
                                                <span class="deleteImage" id="si${index}" data-id="${dataId}" data-img="${value}"><i class="fa fa-times" aria-hidden="true"></i></span>
                                            </div>`;
                                });
                                $('#result-image-gallery').html(html);
                                $('#resultImageModal').modal('show');
                            } else if (responce.status == 0) {
                                alert(responce.message);
                            }
                        }
                    });
                }
            });

            // Result Image Delete
            $(document).on('click', '.deleteImage', function(e) {
                e.preventDefault();
                var dataId = $(this).data('id');
                var dataImg = $(this).data('img');
                var id = $(this).attr('id').replace('si', '');

                if (dataId != '') {
                    var formdata = new FormData();
                    formdata.append("request_type", "delete_result_image");
                    formdata.append("dataId", dataId);
                    formdata.append("dataImg", dataImg);

                    $.ajax({
                        "url": "controller/Pages/case-study-operation.php",
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
                                setTable();
                                $("#i" + id).remove();
                            } else if (responce.status == 0) {
                                alert(responce.message);
                            }
                        }
                    });
                }
            });

            // Form Validator
            validator = $('#add-casetudy-form').validate({
                rules: {
                    'site_name': {
                        required: true,
                        minlength: 3
                    },
                    'site_work': {
                        required: true,
                        minlength: 5
                    },
                },
                messages: {
                    'site_name': {
                        required: "Site Name is required",
                        minlength: "Site Name can not be less than 3 character",
                    },
                    'site_work': {
                        required: "Site Work is required",
                        minlength: "Site Work can not be less than 5 character",
                    },
                }
            });

            edit_validator = $('#edit-casetudy-form').validate({
                rules: {
                    'edit_site_name': {
                        required: true,
                        minlength: 3
                    },
                    'edit_site_work': {
                        required: true,
                        minlength: 5
                    },
                },
                messages: {
                    'edit_site_name': {
                        required: "Site Name is required",
                        minlength: "Site Name can not be less than 3 character",
                    },
                    'edit_site_work': {
                        required: "Site Work is required",
                        minlength: "Site Work can not be less than 5 character",
                    },
                }
            });

            // Reset Form After modal close
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