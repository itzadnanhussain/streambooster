
<div class="content-wrapper">
    <div class="row">
        <style>
      
        </style>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Video Ads List </h4>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">
                                <strong>Heads up!</strong> You can add here all video ads.
                            </div>
                        </div>
                    </div>
                       <h4 class="card-title">Add New Video </h4>
                    <form  method="POST" enctype="multipart/form-data" action="<?php echo base_url('Admin/VideoAdsPageAction');?>" >
                        <div class="row">
                           <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                               <input type="file" id="file" name="uploads" accept="video/*"  onchange="videoPreview(this)"  /> 
                    <input type="submit" value="Save Video" class="btn btn-primary " ></div>
                           <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12"><div class="videoBox" id="videoBox"></div></div>
                        </div>
                    
                    </form>
                    <br>
                    <div class="row">
                        <?php if(isset($records)){
                        for($i=0;$i<count($records);$i++)
                        {?>
                          <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                            <video width="300" height="200" controls><source  src="<?php echo base_url().$records[$i]->video_path;?>" type="video/mp4"></video>
                            <button onclick="del('<?php echo base_url("admin/DeleteVideo/".$records[$i]->id);?>')">Delete</button>
                          </div>
                        <?php }
                        
                        }?>
                        
                            
                        
                    </div>
                    
                   
                  
                    
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

 
///General Form Submition
    function del(url) {
     
        $.ajax({
            type: 'POST',
            url: url,
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
    };

          function videoPreview(source) {
              $("#videoBox").empty();
            var file = source.files[0];
            console.log(source.files);

            if (window.FileReader) {
                var fr = new FileReader();
                fr.onloadend = function (e) {
                    var video = document.createElement("video");
                    video.controls = "controls";
                    video.src = e.target.result;
                    video.width = 250;
                    video.height = 150;
                    document.getElementById("videoBox").appendChild(video);
                };
                fr.readAsDataURL(file);
            }
    }
    </script>




<script>
  
  
  
  
  
$(document).on('click', '.maincontent', function() {
    var $ctrl = ' <div class="row"><div class="col-lg-7 col-sm-7 col-md-7 col-xs-7"> <div class="row"> <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 filename "><input type="file" class="file" accept="video/*" onchange="videoPreview(this)" name="uploadfile[]" /> </div></div></div> <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 rmv"><small><button type="button"  class="removebtn pull-left trashbtn" ><i style="color:red; " class="mdi mdi-image-minus menu-icon"></i></button></small></div></div>';
    $("#maincontent").append($ctrl);
});


$(document).on('click', '.removebtn', function() {
    $(this).closest(".row").remove();
});

 
</script>