  <!----Sec3 Content--->
  <div class="container-fluid mt-15">
      <div class="row">
          <div class="col-md-3 col-xs-12">
              <?php $this->load->view('templates/sideBar') ?>
          </div>
          <div class="col-md-9 col-xs-12">
              <div class="content">
                  <div class="block">
                      <h1>Here You Can View News And Updates About Our Company</h1>
                      <div class="blocks-in-block-container">
                          <?php if (isset($article) && !empty($article)) { ?>
                              <?php foreach ($article as $key => $value) { ?>
                                  <div class="block">
                                      <h2><?php echo $value->title ?>  </h2>
                                      <p><?php echo trim(preg_replace('/\s\s+/', ' ', $value->description)) ?></p>
                                      <p><span>Posted at: <?php echo $value->created_at ?></span></p>
                                  </div>
                              <?php } ?>
                          <?php } ?>

                      </div>

                  </div>
              </div>

          </div>

      </div>
  </div>