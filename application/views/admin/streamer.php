<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Streamer List </h4>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">
                                <strong>Heads up!</strong> List of all your registered stremers.
                            </div>
                        </div>
                    </div>
                    <style>
                        .submit-form *{
                           margin-left:27px;
                            
                        }
                        .submit-form{
                            margin-bottom:50px;
                        }
                    </style>
                    <!-- <div class="row">
                          <div  class="col-12" style="display:flex;width:100%" > 
                              <form class="submit-form"  action="<?php echo base_url('Admin/AllUserUpdateCoins') ?>">
          
                           <h2>Add Coins</h2>
                           <p>Enter coins which you want to add/remove for <b style="color:red ; margin-left:0;">All</b> users.</p>
                             <label ><small>Select Action</small>
                             <select name="action_type"  >
                             <option value="add">Add</option>
                             <option value="remove" >Remove</option>
                            </select></label>
                              <label for="" > <small>Enter Coins </small>
                              <input type="number" name="coins"  min="0" ></label>
                               <input type="submit" class="btn btn-primary " value="Update Coins">
                               
                               
                          </form> </div>
                         
                    </div>
                    -->
                    
                    
                    
                    

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table dataTable no-footer" id="streamerTable" role="grid" aria-describedby="order-listing_info">

                                                <thead>
                                                    <tr class="bg-primary text-white" role="row">
                                                        <th>User Id</th>
                                                        <th>Username</th>
                                                        <th>Total Coins</th>
                                                        <th>Level</th>
                                                        <th>Twitch Followers</th>
                                                        <th>Registered Since</th>
                                                        <th class="text-center">Profile</th>
                                                    </tr>
                                                </thead> 

                                                <tbody>
                                                    <?php if (isset($records) && !empty($records)) { ?>
                                                        <?php foreach ($records as $key => $value) { ?>
                                                            <tr>
                                                                <td><?php echo $value->id; ?></td>
                                                                <td><?php echo $value->username; ?></td>
                                                                <td><?php echo $value->coins; ?></td>
                                                                <td><?php echo $value->level; ?></td>
                                                                <td><?php echo $value->followers; ?></td>
                                                                
                                                                <td>
                                                                    <?php echo $value->created_at; ?>
                                                                </td> 

                                                                <td class="text-center">
                                                                    <button tpye="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                                        <a href="<?php echo base_url('en/admin/streamer/' . $value->id) ?>">
                                                                            <i class="mdi mdi-airplay text-primary" style="margin-left: -7px;"></i>
                                                                        </a>
                                                                    </button>
                                                                </td> 
                                                            </tr> 
                                                        <?php } ?>

                                                    <?php    } ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
///Table initialize 
$('#streamerTable').DataTable();
 ///General Form Submition
    $('.submit-form').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let form = $(this).serialize();
        var url = $(this).attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 3500)
                        break;
                    case 'warning':
                        showWarningToast(res.message);
                        break;

                }
            }
        });
    });


</script>