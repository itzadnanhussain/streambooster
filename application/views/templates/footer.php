<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="f-left">
                    © 2020 Stream Booster — Free Twitch Channels Promotion.
                    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/images') ?>/i/logo-white.png" class="footer-logo" alt="Stream Booster"></a>
                </div>

            </div>

            <div class="col-md-6 col-xs-12">
                <div class="f-right right">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="<?php echo base_url('en/about') ?>">About Us</a></li>
                            <li><a href="<?php echo base_url('en/games') ?>">Popular Games</a></li>
                            <li><a href="<?php echo base_url('en/news') ?>">News and Updates</a></li>
                            <li><a href="<?php echo base_url('en/news') ?>">Top Articles</a></li>

                        </ul>
                    </div>
                    <p>Technical support: streambooster.ru@gmail.com</p>
                    <noindex>
                        <div class="google-recaptcha-policy">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank" rel="nofollow">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank" rel="nofollow">Terms of Service</a> apply.</div>
                    </noindex>
                </div>

            </div>

        </div>


        <div class="clear"></div>
    </div>
</div>

<?php
$url = current_url();
?>
<!-- <script src="<?php echo base_url('assests/admin/') ?>vendors/base/vendor.bundle.base.js"></script> -->
<!-----Js Files--->

<script src="<?php echo base_url() ?>assets/vendors/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/jquery.barrating.min.js"></script>
<!-- Load the Twitch embed script -->
<script src="<?php echo base_url() ?>assets/vendors/dataTables.bootstrap4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<script src="<?php echo base_url('assets/admin/') ?>vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
<script src="<?php echo base_url('assets/admin/') ?>js/toastDemo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/jquery.barrating.min.js" ></script>


<?php $this->load->view('templates/scripts.php') ?>
<?php $this->load->view('templates/partial_scripts.php') ?>
<?php if (strpos($url, 'products') == true) { ?>

    <?php $this->load->view('templates/stripeScript.php') ?>

<?php } ?>




<?php if (strpos($url, 'watch') == true) { ?>
    <?php $this->load->view('templates/videoScript.php') ?>

<?php } ?>





</body>

</html>