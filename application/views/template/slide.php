 <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="<?php echo base_url ('assets/img/slider/gunung.jpg') ?>" alt="" title="#slider-direction-1" />
        <img src="<?php echo base_url ('assets/img/slider/curug.jpg') ?>" alt="" title="#slider-direction-2" />
        <img src="<?php echo base_url ('assets/img/slider/pancar.jpg') ?>" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                 <h4 style="color: white;font-weight: bold;">JELAJAHI INDAHNYA KOTA BOGOR </h4>

                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">PETUALANGAN BARU </h1>
                  <p style="color: white">Serunya berpetualang di Kota Bogor</p>
                </div>
                <!-- layer 3 -->
                <?php if(isset($_SESSION['email'])) { ?>
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="<?php echo site_url('perjalanan/index') ?>">Create Your Itinerary</a>
                </div>
                <?php } ?>
                <?php if(!isset($_SESSION['email'])) { ?>
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="<?php echo site_url('Login/index') ?>">Create Your Itinerary</a>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h4 style="color: white;font-weight: bold;">JELAJAHI INDAHNYA KOTA BOGOR </h4>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">PENGALAMAN BARU </h1>
                  <p style="color: white">Temukan banyak pengalaman baru yang tidak anda dapatkan selain di Bogor <br>
										or Segerakan berkunjung ke Kota Bogor</p>
                </div>
                <!-- layer 3 -->
                <?php if(isset($_SESSION['email'])) { ?>
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="<?php echo site_url('perjalanan/index') ?>">Create Your Itinerary</a>
                </div>
                <?php } ?>
                <?php if(!isset($_SESSION['email'])) { ?>
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="<?php echo site_url('Login/index') ?>">Create Your Itinerary</a>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                 <h4 style="color: white;font-weight: bold;">JELAJAHI INDAHNYA KOTA BOGOR </h4>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">PERJALANAN BARU </h1>
                 <p style="color: white">Nikmati serunya perjalanan baru yang tidak mudah untuk dilupakan <br>
										Indahnya alam dipadu dengan keramahan penduduk sekitar</p>
                </div>
                <!-- layer 3 -->
                <?php if(isset($_SESSION['email'])) { ?>
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="<?php echo site_url('perjalanan/index') ?>">Create Your Itinerary</a>
                </div>
                <?php } ?>
                <?php if(!isset($_SESSION['email'])) { ?>
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="<?php echo site_url('Login/index') ?>">Create Your Itinerary</a>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->