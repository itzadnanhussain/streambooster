<div class="content-wrapper">
    <div class="row">
        <style>
            .dataTable thead>tr>th {
                font-size: 11px;
                background-color: darkblue !important;
                color: white;
            }

            .actions-links a>i {
                font-size: 20px !important;
                color: darkblue;
                margin-right: 15px;
            }
        </style>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Total Number Of articles <div class="badge badge-pill badge-success"><?php echo (isset($articles) && (!empty($articles))) ? count($articles) : 0  ?></div>
                            </h4>

                        </div>
                        <div class="col-sm-6">
                            <h6 class="text-right" style="margin-top: -11px;"><button data-toggle="modal" class="btn btn-primary" data-target="#AddNewArticle">Add New </button></h6>

                        </div>

                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">


                                            <table class="table dataTable no-footer" id="table-articles" role="grid" aria-describedby="order-listing_info">
                                                <thead>
                                                    <tr>
                                                        <th>#id</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Date</th>
                                                        <th>Actions</th>
                                                    </tr>

                                                </thead>
                                                <tbody>

                                                    <?php if (isset($article) && !empty($article)) { ?>  
                                                        <?php foreach ($article as $key => $value) { ?> 
                                                            <tr>
                                                                <td><?php echo $value->article_id ?></td>
                                                                <td><?php echo $value->title ?></td>
                                                                <td><?php echo $value->description ?></td>
                                                                <td><?php echo $value->created_at ?></td>
                                                                <td class="actions-links_client">
                                                                    <a data-toggle="modal" data-target="#EditArticle" data-whatever="<?php echo $value->article_id ?>"><i class="mdi mdi-pencil-box"></i></a>
                                                                    <a href="javascript:void(0)" onclick="DeleteRecord(<?php echo $value->article_id ?>)"><i class="mdi mdi-delete" style="color: orangered;"></i></a>
                                                                </td>
                                                            </tr> 
                                                        <?php } ?>

                                                    <?php } ?>


                                                </tbody>

                                            </table>

                                        </div>
                                    </div>

                                    <style>
                                        .actions-links_client a>i {
                                            font-size: 23px !important;
                                            color: darkblue;
                                            margin-right: 15px;
                                            margin: 15px;
                                        }
                                    </style>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- -Model--->
<div class="modal fade" id="AddNewArticle" tabindex="-1" role="dialog" aria-labelledby="AddNewArticle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="submit-form" action="<?php echo base_url('posts/AddNewPost') ?>" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="20" class="form-control summernote"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-sbmit-model">Submit Record</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>



<!-- -Model--->
<div class="modal fade" id="EditArticle" tabindex="-1" role="dialog" aria-labelledby="EditArticle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="submit-form" action="<?php echo base_url('posts/UpdateArticles') ?>" enctype="multipart/form-data">

                    

                    <div class="form-group">
                        <label>Title</label>
                        <input type="hidden" name="article_id" id="article_id">
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description"  id="summernote1" class="form-control "></textarea>
                    </div> 
                   

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-sbmit-model">Submit Record</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>




<script>
    ///load Data Table
    let table = $('#table-articles').DataTable();

    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Here You Can Add Discription',
            height: 200
        });
        $('#summernote1').summernote({
            height: 200
        });
    });

    ///Submit Form 
    $('.submit-form').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        var formData = new FormData(this); 
        let url = $(this).attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 3500);
                        break;
                    case 'warning':
                        showWarningToast(res.message);
                        break;
                    case 'error':
                        res.message.forEach(function(error) {
                            $('[name=' + error[0] + ']').parent().append('<span style="color:red; font-size:11px">' + error[1] + '</span>');
                        })
                        break;


                }
            }

        });
    })



    //Model 
    $('#EditArticle').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('whatever');
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('Posts/GetArticlesTableRecordById') ?>",
            data: {
                article_id: id
            },
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':

                        ///enter values in form 
                        $('#article_id').val(res.data[0]['article_id']);
                        $('#user_id').val(res.data[0]['user_id']);
                        $('#title').val(res.data[0]['title']);
                        $("#summernote1").summernote('code' , res.data[0]['description']);
                        



                        break;
                    case 'warning':
                        showWarningSwal(res.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 3500);

                        break;

                }
            }
        });

    });


    ///Error Removing Process
    $(document).on("keypress", "form input", function(e) {
        $("span").html("");
    });


    ///Delete Record 
    function DeleteRecord(id) {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Record!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url('Partial/DeleteByAjax') ?>",
                        data: {
                            value: id,
                            field: 'article_id',
                            table: 'article',

                        },
                        dataType: 'html',
                        success: function(data) {
                            let res = JSON.parse(data);
                            switch (res.code) {
                                case 'success':
                                    swal("Poof! Your Record File has been deleted!", {
                                        icon: "success",
                                        button: false,
                                        timer: 3000,
                                    });
                                    // showSuccessToast(res.message);
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 2500)
                                    break;
                                case 'warning':
                                    swal("Poof! Your Record File Not Delete", {
                                        icon: "warning",
                                    });

                            }
                        }
                    });
                } else {
                    swal("Your Record File is safe!");
                }
            });
    }

    
</script>