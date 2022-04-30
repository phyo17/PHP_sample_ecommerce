<?php 
    include_once "../resource/config.php";
 ?>

<?php include_once template_front.DS."header.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

<?php include_once template_front.DS."sidebar.php" ?>

            <div class="col-md-9">


<?php include_once template_front.DS."slider.php" ?>

                <div class="row">
                    
                    <?php get_product(); ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <?php include_once template_front.DS."footer.php" ?>

