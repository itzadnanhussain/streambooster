<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Broadcast Rating</h4>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">
                                <strong>Heads up!</strong>Here you can check broadcast rating of streamer.
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                        <div id="broadcasting" style="height: 300px; width: 100%;">
                        <?php if(isset($records) && !empty($records))
                    { 
                    ?>
                    
                    
                    
                    
                    
                    
                    <div class="table-responsive">
                                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table dataTable no-footer" id="streamerTable" role="grid" aria-describedby="order-listing_info">

                                             

                                                <tbody>
                                                  
                                                            <tr>
                                                                <td>Gaming Skills</td>
                                                                <td><?php  if($records[0]->gaming_skills==0){ echo "No Rating ";}
                                                                else{echo $records[0]->gaming_skills; } ?></td>
                                                              
                                                            </tr> 
                                                            
                                                            
                                                            
                                                            <tr>
                                                                <td>Communicability</td>
                                                                <td><?php  if($records[0]->communicability==0){ echo "No Rating ";}
                                                                else{echo $records[0]->communicability; } ?></td>
                                                              
                                                            </tr>
                                                            
                                                            
                                                            
                                                            <tr>
                                                                <td>Video Settings</td>
                                                                <td><?php  if($records[0]->video_settings==0){ echo "No Rating ";}
                                                                else{echo $records[0]->video_settings;} ?></td>
                                                              
                                                            </tr>
                                                   
                                                   
                                                   
                                                   <tr>
                                                                <td>Audio Settings</td>
                                                                <td><?php  if($records[0]->audio_settings==0){ echo "No Rating ";}
                                                                else{echo $records[0]->audio_settings;} ?></td>
                                                              
                                                            </tr>


  
                                                   <tr>
                                                                <td>Webcam</td>
                                                                <td><?php  if($records[0]->webcam==0){ echo "No Rating ";}
                                                                else{echo $records[0]->webcam;} ?></td>
                                                              
                                                            </tr>
                                                            
                                                            
                                                            
                                                            <tr>
                                                                <td>Adequacy</td>
                                                                <td><?php  if($records[0]->adequacy==0){ echo "No Rating ";}
                                                                else{echo $records[0]->adequacy;} ?></td>
                                                              
                                                            </tr>
                                                            <tr>
                                                                <td>Charisma</td>
                                                                <td><?php  if($records[0]->charisma==0){ echo "No Rating ";}
                                                                else{echo $records[0]->charisma;} ?></td>
                                                              
                                                            </tr>
                                                            
                                                              <tr>
                                                                <td>Sexuality</td>
                                                                <td><?php  if($records[0]->sexuality==0){ echo "No Rating ";}
                                                                else{echo $records[0]->sexuality;} ?></td>
                                                              
                                                            </tr>
                                                            
                                                            
                                                             <tr>
                                                                <td>Streamer of the year</td>
                                                                <td><?php  if($records[0]->streamer_of_the_year==0){ echo "No Rating ";}
                                                                else{echo $records[0]->streamer_of_the_year;} ?></td>
                                                              
                                                            </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <?php }
                    
                    
                    else{
                        
                        echo "<h1 style='color:red;'>No Rating  </h1>";
                    }
                    
                    
                    
                    ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>