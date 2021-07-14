<div class="content-wrapper">
          <div class="alert alert-success" role="alert">
                <strong>Heads up!</strong> Request From Streamers For Promotion.
            </div>
    <div class="row">
   
            

       <!--coin at once -->
                <div class="col-6 grid-margin stretch-card">
                 
                    <div class="card">
                        <div class="card-body">
                            <form class="form-ranks submit-form"  action="<?php echo base_url('Admin/AllUserUpdateCoins') ?>">
          
                           <h2 class="card-title">Add Coins</h2>
                           <p>Enter coins which you want to add/remove for <b style="color:red ; margin-left:0;">All</b> users.</p>
                             <div class="form-group">
                             <label >Select Action</label>
                             <select class="form-control" name="action_type"  >
                             <option value="add">Add</option>
                             <option value="remove" >Remove</option>
                            </select>
                            </div>
                            <div class="form-group">
                              <label for="" > Enter Coins </label>
                              <input class="form-control" type="number" name="coins"  min="0" >
                               </div>
                               <input type="submit" class="btn btn-primary mr-2" value="Update">
                               
                               
                          </form> 
                        </div>
                    </div>
                </div>
                
                
                <!--coin for watch tv -->
                
                 <div class="col-6 grid-margin stretch-card">
                 
                    <div class="card">
                        <div class="card-body">
                            <form class=" form-ranks submit-form"  action="<?php echo base_url('Admin/AllUserUpdateCoins') ?>">
          
                           <h2 class="card-title">Add Coins</h2>
                           <p>Enter coins which you want to add/remove for <b style="color:red ; margin-left:0;">All</b> users.</p>
                             <div class="form-group">
                             <label >Select Action</label>
                             <select class="form-control" name="action_type"  >
                             <option value="add">Add</option>
                             <option value="remove" >Remove</option>
                            </select>
                            </div>
                            <div class="form-group">
                              <label for="" > Enter Coins </label>
                              <input class="form-control" type="number" name="coins"  min="0" >
                               </div>
                               <input type="submit" class="btn btn-primary mr-2" value="Update">
                               
                               
                          </form> 
                        </div>
                    </div>
                </div>
                
                
                
                <!--coin for ads-->
                 <div class="col-6 grid-margin stretch-card">
                 
                    <div class="card">
                        <div class="card-body">
                            <form class="submit-form"  action="<?php echo base_url('Admin/AllUserUpdateCoins') ?>">
          
                           <h2 class="card-title">Add Coins</h2>
                           <p>Enter coins which you want to add/remove for <b style="color:red ; margin-left:0;">All</b> users.</p>
                             <div class="form-group">
                             <label >Select Action</label>
                             <select class="form-control" name="action_type"  >
                             <option value="add">Add</option>
                             <option value="remove" >Remove</option>
                            </select>
                            </div>
                            <div class="form-group">
                              <label for="" > Enter Coins </label>
                              <input class="form-control" type="number" name="coins"  min="0" >
                               </div>
                               <input type="submit" class="btn btn-primary mr-2" value="Update">
                               
                               
                          </form> 
                        </div>
                    </div>
                </div>
                
                
           

    </div>


</div>

<script>
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