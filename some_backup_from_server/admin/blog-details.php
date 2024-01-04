<?php
session_start();
if (!isset($_SESSION["logedIn"])) {
    header("Location: page-login.php");
    exit();
}
$_SESSION["item"] = "blog-details";
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

    <title>Blog Details - Mucheco</title>

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
                            <h1>Blog Details</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item">Page Components</li>
                                    <li class="breadcrumb-item active">Blog Details</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->
                        <div class="col-md-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBlogModal">
                                Add Blog
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
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Meta Title</th>
                                            <th>Meta Description</th>
                                            <th>Meta Keywords</th>
                                            <th>Media File</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td colspan="7" class="dataTables_empty">Loading data from server...</td>
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
    <div class="modal fade modal-fullscreen" id="addBlogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Upload Blog</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-blog-form">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="title"><strong>Heading</strong></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="media_type"><strong>Media Type</strong></label>
                                <select id="media_type" class="form-control">
                                    <option value="image" selected>Image</option>
                                    <!-- <option value="video">Video</option> -->
                                </select>
                            </div>
                            <div class="col-md-4" id="media-file-set">
                                <label for="media_file"><strong>Media File</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg" id="media_file">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4" id="media-file-set">
                                <label for="meta_title"><strong>Meta Title</strong></label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title" value="">
                            </div>
                            <div class="col-md-4" id="media-file-set">
                                <label for="meta_description"><strong>Meta Description</strong></label>
                                <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" value="">
                            </div>
                            <div class="col-md-4" id="media-file-set">
                                <label for="meta_keyword"><strong>Meta Keywords</strong></label>
                                <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Enter Meta Keywords" value="">
                            </div>
                            <div class="col-md-12">
                                <label for="description"><strong>Description</strong></label>
                                <textarea name="description" id="description" class="form-control" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button id="blog-add" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade modal-fullscreen" id="editBlogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Update Blog</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-blog-form">
                        <div class="row">
                            <input type="hidden" id="blog_id">
                            <div class="col-md-4">
                                <label for="edit_title"><strong>Heading</strong></label>
                                <input type="text" class="form-control" name="edit_title" id="edit_title" placeholder="Enter Title" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="edit_media_type"><strong>Media Type</strong></label>
                                <select id="edit_media_type" class="form-control">
                                    <option value="image" selected>Image</option>
                                    <!-- <option value="video">Video</option> -->
                                </select>
                            </div>
                            <div class="col-md-4" id="media-file-set">
                                <label for="edit_media_file"><strong>Media File</strong></label>
                                <input class="form-control" type="file" accept=".png,.gif,.jpeg,.jpg" id="edit_media_file">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4" id="media-file-set">
                                <label for="edit_meta_title"><strong>Meta Title</strong></label>
                                <input type="text" class="form-control" name="edit_meta_title" id="edit_meta_title" placeholder="Enter Meta Title" value="">
                            </div>
                            <div class="col-md-4" id="media-file-set">
                                <label for="edit_meta_description"><strong>Meta Description</strong></label>
                                <input type="text" class="form-control" name="edit_meta_description" id="edit_meta_description" placeholder="Enter Meta Description" value="">
                            </div>
                            <div class="col-md-4" id="media-file-set">
                                <label for="edit_meta_keyword"><strong>Meta Keywords</strong></label>
                                <input type="text" class="form-control" name="edit_meta_keyword" id="edit_meta_keyword" placeholder="Enter Meta Keywords" value="">
                            </div>
                            <div class="col-md-12">
                                <label for="edit_description"><strong>Description</strong></label>
                                <textarea name="description" id="edit_description" class="form-control" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button id="blog-edit" type="submit" class="btn btn-primary">Submit</button>
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
                    "url": "controller/User/get-blog-details.php"
                },
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [5, 6]
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

            $("#media_type").change(() => {
                let value = $('#media_type option:selected').val();
                // console.log(value);
                if (value == 'image') {
                    $('#media-file-set').html("<label for='media_file'>Media File</label><input class='form-control' type='file' accept='.png,.gif,.jpeg,.jpg' id='media_file'>")
                } else {
                    $('#media-file-set').html("<label for='media_file'>Media File</label><input class='form-control' type='file' accept='.mpeg,.ogg,.mp4,.webm,.3gp,.mov,.flv,.avi,.wmv' id='media_file'>")
                }
            })

            $("#add-blog-form").submit((e) => {
                e.preventDefault();
                let title = $("#title").val();
                let media_type = $('#media_type option:selected').val();
                let meta_title = $("#meta_title").val();
                let meta_description = $("#meta_description").val();
                let meta_keyword = $("#meta_keyword").val();
                let description = CKEDITOR.instances.description.getData();
                var file_data = $("#media_file").prop("files")[0];

                var isValid = validator.form();
                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("request_type", "add_blog");
                    formdata.append("title", title);
                    formdata.append("media_type", media_type);
                    formdata.append("meta_title", meta_title);
                    formdata.append("meta_description", meta_description);
                    formdata.append("meta_keyword", meta_keyword);
                    formdata.append("description", description);
                    formdata.append("media_file", file_data);

                    $.ajax({
                        "url": "controller/User/blog-post.php",
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

            $("#edit-blog-form").submit((e) => {
                e.preventDefault();
                let blogId = $("#blog_id").val();
                let title = $("#edit_title").val();
                let media_type = $('#edit_media_type option:selected').val();
                let meta_title = $("#edit_meta_title").val();
                let meta_description = $("#edit_meta_description").val();
                let meta_keyword = $("#edit_meta_keyword").val();
                let description = CKEDITOR.instances.edit_description.getData();
                var file_data = $("#edit_media_file").prop("files")[0];

                var isValid = edit_validator.form();
                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("request_type", "edit_blog");
                    formdata.append("blogId", blogId);
                    formdata.append("title", title);
                    formdata.append("media_type", media_type);
                    formdata.append("meta_title", meta_title);
                    formdata.append("meta_description", meta_description);
                    formdata.append("meta_keyword", meta_keyword);
                    formdata.append("description", description);
                    formdata.append("media_file", file_data);

                    $.ajax({
                        "url": "controller/User/blog-post.php",
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

            $(document).on('click', '.deleteBlog', function(e) {
                e.preventDefault();
                var blogId = $(this).data('id');
                if (blogId != '') {
                    if (confirm('Are you sure want to delete')) {
                        var formdata = new FormData();
                        formdata.append("request_type", "delete_blog");
                        formdata.append("blogId", blogId);

                        $.ajax({
                            "url": "controller/User/blog-post.php",
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

            $(document).on('click', '.editBlog', function(e) {
                e.preventDefault();
                var blogId = $(this).data('id');
                console.log(blogId);
                if (blogId != '') {
                    var formdata = new FormData();
                    formdata.append("request_type", "get_blog_by_id");
                    formdata.append("blogId", blogId);

                    $.ajax({
                        "url": "controller/User/blog-post.php",
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": formdata,
                        success: function(data) {
                            var responce = $.parseJSON(data);
                            if (responce.status == 1) {
                                $("#blog_id").val(blogId);
                                $("#edit_title").val(responce.data.title);
                                // $('#edit_media_type option:selected').val();
                                $("#edit_meta_title").val(responce.data.meta_title);
                                $("#edit_meta_description").val(responce.data.meta_description);
                                $("#edit_meta_keyword").val(responce.data.meta_keyword);
                                CKEDITOR.instances.edit_description.setData(responce.data.description);
                                $('#editBlogModal').modal('show')
                            } else if (responce.status == 0) {
                                alert(responce.message);
                            }
                        }
                    });
                }
            });

            validator = $('#add-blog-form').validate({
                rules: {
                    'title': {
                        required: true,
                        minlength: 5
                    },
                    'meta_title': {
                        required: true,
                        minlength: 3
                    },
                    'meta_description': {
                        required: true,
                        minlength: 10
                    },
                    'meta_keyword': {
                        required: true,
                        minlength: 2
                    },
                    'description': {
                        required: true,
                        minlength: 10
                    },
                },
                messages: {
                    'title': {
                        required: "Heading is required",
                        minlength: "Heading can not be less than 5 character",
                    },
                    'meta_title': {
                        required: "Meta Title is required",
                        minlength: "Meta Title can not be less than 5 character",
                    },
                    'meta_description': {
                        required: "Meta Description is required",
                        minlength: "Meta Description can not be less than 10 character",
                    },
                    'meta_keyword': {
                        required: "Meta Keywords is required",
                        minlength: "Meta Keywords can not be less than 2 character",
                    },
                    'description': {
                        required: "Description is required",
                        minlength: "Description can not be less than 10 character",
                    },
                }
            });

            edit_validator = $('#edit-blog-form').validate({
                rules: {
                    'edit_title': {
                        required: true,
                        minlength: 5
                    },
                    'edit_meta_title': {
                        required: true,
                        minlength: 3
                    },
                    'edit_meta_description': {
                        required: true,
                        minlength: 10
                    },
                    'edit_meta_keyword': {
                        required: true,
                        minlength: 2
                    },
                    'edit_description': {
                        required: true,
                        minlength: 10
                    },
                },
                messages: {
                    'edit_title': {
                        required: "Heading is required",
                        minlength: "Heading can not be less than 5 character",
                    },
                    'edit_meta_title': {
                        required: "Meta Title is required",
                        minlength: "Meta Title can not be less than 5 character",
                    },
                    'edit_meta_description': {
                        required: "Meta Description is required",
                        minlength: "Meta Description can not be less than 10 character",
                    },
                    'edit_meta_keyword': {
                        required: "Meta Keywords is required",
                        minlength: "Meta Keywords can not be less than 2 character",
                    },
                    'edit_description': {
                        required: "Description is required",
                        minlength: "Description can not be less than 10 character",
                    },
                }
            });

            CKEDITOR.replace('description');
            CKEDITOR.replace('edit_description');

            $('#addBlogModal,#editBlogModal').on('hidden.bs.modal', function() {
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