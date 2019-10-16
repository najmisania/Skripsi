<?php $this->load->view('template/plugins') ?>
<?php $this->load->view('template/head') ?>


<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

<?php $this->load->view('template/slide') ?> 
<?php $this->load->view('template/about') ?> 



  <!-- Start Service area -->
  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        
          
      </div>
    </div>
  </div>
 
  <!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row" action="<?php echo base_url('Home/wisata') ?>">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Kategori Wisata Bogor</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Portfolio -page -->
        <div class="awesome-project-1 fix">
          <div class="col-lg-12">
            <div class="awesome-menu ">
              <ul class="project-menu">
                <li>
                  <a href="#" class="active" data-filter="*">All</a>
                </li>
                <li>
                  <a href="#" data-filter=".alam">Alam</a>
                </li>
                <li>
                  <a href="#" data-filter=".rekreasi">Rekreasi</a>
                </li>
                <li>
                  <a href="#" data-filter=".musium">Musium</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="awesome-project-content">
          <!-- single-awesome-project start -->
          <?php 
			foreach ($wisata_bogor as $data => $value) {  
				if($value->jenis_wisata =='Wisata Alam'){
					?>
          <div class="col-md-4 col-sm-4 col-md-12 alam">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a><img src="<?php echo base_url('assets/img/wisata/').$value->image ?>" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo base_url('assets/img/wisata/').$value->informasi ?>">
                      <h4><?php echo $value->nama_wisata ?> </h4>
                      <span><?php echo $value->jenis_wisata ?></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } }?>
          <!-- single-awesome-project start -->
            <?php 
			foreach ($wisata_bogor as $data => $value) {  
				if($value->jenis_wisata =='Tempat Rekreasi'){
					?>
          <div class="col-md-4 col-sm-4 col-md-12 rekreasi">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a><img src="<?php echo base_url('assets/img/wisata/').$value->image ?>" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo base_url('assets/img/wisata/').$value->informasi ?>">
                      <h4><?php echo $value->nama_wisata ?> </h4>
                      <span><?php echo $value->jenis_wisata ?></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } }?>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <?php 
			foreach ($wisata_bogor as $data => $value) {  
				if($value->jenis_wisata =='Musium'){
					?>
          <div class="col-md-4 col-sm-4 col-md-12 musium">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo base_url('assets/img/wisata/').$value->image ?>" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo base_url('assets/img/wisata/').$value->informasi ?>">
                      <h4><?php echo $value->nama_wisata ?> </h4>
                      <span><?php echo $value->jenis_wisata ?></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } }?>
        </div>
      </div>
    </div>
  </div>
  <!-- awesome-portfolio end -->
  <!-- start pricing area -->
 
  <!-- End pricing table area -->
  <!-- Start Testimonials -->
 
  <!-- End Testimonials -->
  <!-- Start Blog Area -->
 
          <!-- End Left Blog-->
          <!-- Start Left Blog -->
         
            <!-- Start single blog -->
     
          <!-- End Left Blog-->
          <!-- Start Right Blog-->
         
          <!-- End Right Blog-->
        
  <!-- End Blog -->
  <!-- Start Suscrive Area -->
  
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contact us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  Call: 083872595279<br>
                  
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: wisatabogor@gmail.com<br>
                  
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
              <br>
                  <span>Bogor, Indonesia</span>
                
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->

            <!-- End Map -->
         
          <!-- End Google Map -->

          <!-- Start  contact -->
        
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

 
				

<?php $this->load->view('template/footer') ?> 
<?php $this->load->view('template/script') ?>		