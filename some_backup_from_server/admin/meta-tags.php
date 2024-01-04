<?php
session_start();
if (!isset($_SESSION["logedIn"])) {
    header("Location: page-login.php");
    exit();
}
$_SESSION["item"] = "meta-tags";
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

    <title>Meta Tags - Mucheco</title>

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
                            <h1>Meta Tags</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item">Page Components</li>
                                    <li class="breadcrumb-item active">Meta Tags</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->
                        <div class="col-md-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMetaModal">
                                Add Meta Tag
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
                                            <th>Page</th>
                                            <th>Meta Title</th>
                                            <th>Meta Description</th>
                                            <th>Meta Keywords</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td colspan="5" class="dataTables_empty">Loading data from server...</td>
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
    <div class="modal fade modal-fullscreen" id="addMetaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Add Meta Tag</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-meta-form">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="page"><strong>Page</strong></label>
                                <select name="page" id="page" class="form-control">
                                    <option value="" selected>-Select Page-</option>
                                    <!-- <option value="video">Video</option> -->
                                </select>
                            </div>
                            <div id="sub-page-col" class="col-md-4 hide">
                                <label for="sub_page"><strong>Sub Page</strong></label>
                                <select name="sub_page" id="sub_page" class="form-control">
                                    <option value="" selected>-Select Sub Page-</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="meta_title"><strong>Meta Title</strong></label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="meta_keyword"><strong>Meta Keywords</strong></label>
                                <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Enter Meta Keywords" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="meta_description"><strong>Meta Description</strong></label>
                                <textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" value="" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button id="meta-tag-add" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade modal-fullscreen" id="editMetaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Update Meta Tag</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-meta-form">
                        <div class="row">
                            <input type="hidden" id="meta_id">
                            <!-- <div class="col-md-4">
                                <label for="edit_page"><strong>Page</strong></label>
                                <select id="edit_page" class="form-control">
                                    <option value="" selected>-Select Page-</option>
                                </select>
                            </div>
                            <div id="sub-page-col" class="col-md-4 hide">
                                <label for="edit_sub_page"><strong>Sub Page</strong></label>
                                <select id="edit_sub_page" class="form-control">
                                    <option value="" selected>-Select Sub Page-</option>
                                </select>
                            </div> -->
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="edit_meta_title"><strong>Meta Title</strong></label>
                                <input type="text" class="form-control" name="edit_meta_title" id="edit_meta_title" placeholder="Enter Meta Title" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="edit_meta_keyword"><strong>Meta Keywords</strong></label>
                                <input type="text" class="form-control" name="edit_meta_keyword" id="edit_meta_keyword" placeholder="Enter Meta Keywords" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="edit_meta_description"><strong>Meta Description</strong></label>
                                <textarea class="form-control" name="edit_meta_description" id="edit_meta_description" placeholder="Enter Meta Description" value="" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button id="meta-edit" type="submit" class="btn btn-primary">Submit</button>
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
                    "url": "controller/Pages/get-meta-tag-list.php"
                },
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [4]
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
                formdata.append("request_type", "get_pages");
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
                            let html = '';
                            $.each(responce.data, function(index, value) {
                                html = html + `<option value="${value.id}">${value.name}</option>`;
                            });
                            $('#page').html(html);
                        } else if (responce.status == 0) {
                            console.log(responce.message);
                        }
                    }
                });
            });

            $("#page").change(() => {
                let value = $('#page option:selected').val();
                var formdata = new FormData();
                formdata.append("request_type", "get_pages");
                formdata.append("pageId", value);
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
                        // console.log(responce);
                        if (responce.status == 1) {
                            let html = '';
                            $.each(responce.data, function(index, value) {
                                html = html + `<option value="${value.id}">${value.name}</option>`;
                            });
                            $('#sub_page').html(html);
                            $('#sub-page-col').show();
                        } else if (responce.status == 0) {
                            $('#sub_page').html("<option value='' selected>-Select Sub Page-</option>");
                            $('#sub-page-col').hide();
                        }
                    }
                });

            })

            $("#add-meta-form").submit((e) => {
                e.preventDefault();

                let main_page = $('#page option:selected').val();
                let sub_page = $('#sub_page option:selected').val();
                let meta_title = $("#meta_title").val();
                let meta_description = $("#meta_description").val();
                let meta_keyword = $("#meta_keyword").val();
                let page = sub_page != '' ? sub_page : main_page;

                var isValid = validator.form();
                // console.log(isValid);
                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("request_type", "add_meta_tag");
                    formdata.append("pageId", page);
                    formdata.append("meta_title", meta_title);
                    formdata.append("meta_description", meta_description);
                    formdata.append("meta_keyword", meta_keyword);

                    $.ajax({
                        "url": "controller/Pages/meta-tag-operation.php",
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

            $("#edit-meta-form").submit((e) => {
                e.preventDefault();
                let metaId = $("#meta_id").val();
                let meta_title = $("#edit_meta_title").val();
                let meta_description = $("#edit_meta_description").val();
                let meta_keyword = $("#edit_meta_keyword").val();

                var isValid = edit_validator.form();
                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("request_type", "edit_meta_tag");
                    formdata.append("metaId", metaId);
                    formdata.append("meta_title", meta_title);
                    formdata.append("meta_description", meta_description);
                    formdata.append("meta_keyword", meta_keyword);

                    $.ajax({
                        "url": "controller/Pages/meta-tag-operation.php",
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

            $(document).on('click', '.deleteMeta', function(e) {
                e.preventDefault();
                var metaId = $(this).data('id');
                // console.log(metaId);
                if (metaId != '') {
                    if (confirm('Are you sure want to delete')) {
                        var formdata = new FormData();
                        formdata.append("request_type", "delete_meta_tag");
                        formdata.append("metaId", metaId);

                        $.ajax({
                            "url": "controller/Pages/meta-tag-operation.php",
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

            $(document).on('click', '.editMeta', function(e) {
                e.preventDefault();
                var metaId = $(this).data('id');
                console.log(metaId);
                if (metaId != '') {
                    var formdata = new FormData();
                    formdata.append("request_type", "get_meta_tag_by_id");
                    formdata.append("metaId", metaId);

                    $.ajax({
                        "url": "controller/Pages/meta-tag-operation.php",
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
                                $("#meta_id").val(metaId);
                                $("#edit_meta_title").val(responce.data.meta_title);
                                $("#edit_meta_description").val(responce.data.meta_description);
                                $("#edit_meta_keyword").val(responce.data.meta_keyword);
                                $('#editMetaModal').modal('show')
                            } else if (responce.status == 0) {
                                alert(responce.message);
                            }
                        }
                    });
                }
            });

            validator = $('#add-meta-form').validate({
                rules: {
                    'meta_title': {
                        required: true,
                        minlength: 3,
                        maxlength: 70
                    },
                    'meta_description': {
                        required: true,
                        minlength: 10,
                        maxlength: 180
                    },
                    // 'meta_keyword': {
                    //     required: true,
                    //     minlength: 2
                    // },
                },
                messages: {
                    'meta_title': {
                        required: "Meta Title is required",
                        minlength: "Meta Title can not be less than 3 characters.",
                        maxlength: "Meta Title can not be greater than 70 characters.",
                    },
                    'meta_description': {
                        required: "Meta Description is required",
                        minlength: "Meta Description can not be less than 10 character",
                        maxlength: "Meta Description can not be greater than 180 character",
                    },
                    // 'meta_keyword': {
                    //     required: "Meta Keywords is required",
                    //     minlength: "Meta Keywords can not be less than 2 character",
                    // },
                }
            });

            edit_validator = $('#edit-meta-form').validate({
                rules: {
                    'edit_meta_title': {
                        required: true,
                        minlength: 3,
                        maxlength: 70
                    },
                    'edit_meta_description': {
                        required: true,
                        minlength: 10,
                        maxlength: 180
                    },
                    // 'edit_meta_keyword': {
                    //     required: true,
                    //     minlength: 2
                    // },
                },
                messages: {
                    'edit_meta_title': {
                        required: "Meta Title is required",
                        minlength: "Meta Title can not be less than 3 characters.",
                        maxlength: "Meta Title can not be greater than 70 characters."
                    },
                    'edit_meta_description': {
                        required: "Meta Description is required",
                        minlength: "Meta Description can not be less than 10 character",
                        maxlength: "Meta Description can not be greater than 180 character",
                    },
                    // 'edit_meta_keyword': {
                    //     required: "Meta Keywords is required",
                    //     minlength: "Meta Keywords can not be less than 2 character",
                    // },
                }
            });

            $('#addMetaModal,#editMetaModal').on('hidden.bs.modal', function() {
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