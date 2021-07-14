 <!-----Sec2 slider--->
 <div class="container-fluid" id="page-content">
     <div class="row">
         <div class="col-lg-12 stretch-card">
             <div class="card">
                 <div class="card-body pad-10">
                     <!-- <h4 class="card-title">Basic carousel</h4> -->
                     <div class="owl-carousel">
                         <div class="item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557204140/banner_12.jpg" alt="image" /> </div>
                         <div class="item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557204172/banner_2.jpg" alt="image" /> </div>
                         <div class="item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557204663/park-4174278_640.jpg" alt="image" /> </div>
                         <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                         <div class="item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557204172/banner_2.jpg" alt="image" /> </div>
                         <div class="item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557204663/park-4174278_640.jpg" alt="image" /> </div>
                         <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                         <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                         <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                         <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                         <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!----Sec3 Content--->
 <div class="container-fluid mt-15">
     <div class="row">
         <div class="col-md-9 col-xs-12">
             <div class="content">
                 <div class="block">
                     <h1>Users Rating</h1>

                     <div class="table-responsive">
                         <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                             <div class="row">
                                 <div class="col-sm-12">
                                     <table id="dt-table" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                         <thead>
                                             <tr class="bg-primary text-white" role="row">
                                                 <!-- <th style="background-color: #1b2630">#</th> -->
                                                 <th style="background-color: #1b2630">Profile</th>
                                                 <th style="background-color: #1b2630">Username</th>
                                                 <th style="background-color: #1b2630">Total Coins</th>
                                                 <th style="background-color: #1b2630">Level</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php if (isset($records) && !empty($records)) { ?>
                                                 <?php foreach ($records as $key => $value) { ?>

                                                     <tr>
                                                         <!-- <td><?php echo (isset($value->id) ? $value->id : 'Nothing') ?></td> -->
                                                         <td class="userpic">
                                                             <div class="user-logo-container medium"><a href="<?php echo base_url('en/user/'.$value->username) ?>"><img src="<?php echo $value->userprofile ?>" class="user-logo"></a></div>
                                                         </td>
                                                         <td><?php echo (isset($value->username) ? $value->username : 'Nothing') ?></td>
                                                         <td><?php echo (isset($value->coins) ? $value->coins : 'Nothing') ?></td>
                                                         <td>
                                                             <?php if ($value->level <= 10) { ?>
                                                                 <div class="transform-075  circle-level c-help">
                                                                     <div class="inner"><?php echo (isset($value->level) ? $value->level : 'Nothing') ?></div>
                                                                 </div>
                                                             <?php } elseif ($value->level >= 11) {  ?>
                                                                 <div class="transform-075  circle-level max-level c-help">
                                                                     <div class="inner"><?php echo (isset($value->level) ? $value->level : 'Nothing') ?></div>
                                                                 </div>
                                                             <?php } ?>
                                                         </td>

                                                     </tr>
                                                 <?php } ?>
                                             <?php } ?>

                                         </tbody>
                                     </table>
                                 </div>
                             </div>

                         </div>
                     </div>

                 </div>
             </div>

         </div>
         <div class="col-md-3 col-xs-12">
             <?php $this->load->view('templates/sideBar') ?>

         </div>


     </div>

 </div>