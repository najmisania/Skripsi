<?php $this->load->view('template/plugins') ?>
<header>
    <!-- header-area start --> 
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="<?php echo site_url('Home/index') ?>">
                  <h1><span>T</span>ravelBeMine</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  
                <li>
                  <?php if(isset($_SESSION['email'])) { ?>
                    <a class="page-scroll" href="<?php echo site_url('Perjalanan/yourplan') ?>">Your Plan</a>
                  <?php }?> 
                </li>
                
                <li>
                 <?php if(isset($_SESSION['email'])) { ?>
                  <a class="page-scroll" href="<?php echo site_url('Login/logout') ?>">Logout</a>
                </li>
              <?php }?>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
</header>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-15 col-lg-12 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="card">

          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center section_title">
                <h3 class="text-center">Create an Itinerary!</h3>
              </div><hr>
              <form class="user" method="POST" action="<?php echo site_url('perjalanan/test_algo') ?>">
                <div class="form-group row">
                  <div class="col-sm-1">
                  <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                    <path fill="#989898" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                  </svg>
                </div>
                  <div class="col-sm-11">
                    <select class="form-control" name="titik_awal">
                      <?php foreach ($wisata_bogor as $key => $value) { ?>
                        <option value="<?php echo $value->id ?>"><?php echo $value->nama_wisata ?></option>
                      <?php } ?>
                      
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-1">
                    <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                      <path fill="#989898" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                    </svg>
                  </div>
                  <div class="col-sm-5">
                    <input type="text" class="datepicker form-control form-control-user" autocomplete="off" id="start_date" name="start_date" placeholder="  Start Date">
                  </div>
                  <div class="col-sm-1">
                    <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                      <path fill="#989898" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                    </svg>
                  </div>
                  <div class="col-sm-5">
                    <input type="text" class="datepicker form-control form-control-user" autocomplete="off" id="end_date" name="end_date" placeholder="  End Date">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-1">
                  <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                    <path fill="#989898" d="M15,12H16.5V16.25L19.36,17.94L18.61,19.16L15,17V12M23,16A7,7 0 0,1 16,23C13,23 10.4,21.08 9.42,18.4L8,17.9L2.66,19.97L2.5,20A0.5,0.5 0 0,1 2,19.5V4.38C2,4.15 2.15,3.97 2.36,3.9L8,2L14,4.1L19.34,2H19.5A0.5,0.5 0 0,1 20,2.5V10.25C21.81,11.5 23,13.62 23,16M9,16C9,12.83 11.11,10.15 14,9.29V6.11L8,4V15.89L9,16.24C9,16.16 9,16.08 9,16M16,11A5,5 0 0,0 11,16A5,5 0 0,0 16,21A5,5 0 0,0 21,16A5,5 0 0,0 16,11Z" />
                  </svg>
                </div>
                  <div class="col-sm-5">
                  <input type="text" class="form-control form-control-user" autocomplete="off" id="start_time" name="start_time" placeholder="Start Time">
                   <p align="justify"><font style="font-style : italic;" color="#A9A9A9" size="2"> example 08:00</font></p>
                  </div>
                  <div class="col-sm-1">
                  <svg style="width:30px;height:30px" viewBox="0 0 24 24">
                    <path fill="#989898" d="M15,12H16.5V16.25L19.36,17.94L18.61,19.16L15,17V12M23,16A7,7 0 0,1 16,23C13,23 10.4,21.08 9.42,18.4L8,17.9L2.66,19.97L2.5,20A0.5,0.5 0 0,1 2,19.5V4.38C2,4.15 2.15,3.97 2.36,3.9L8,2L14,4.1L19.34,2H19.5A0.5,0.5 0 0,1 20,2.5V10.25C21.81,11.5 23,13.62 23,16M9,16C9,12.83 11.11,10.15 14,9.29V6.11L8,4V15.89L9,16.24C9,16.16 9,16.08 9,16M16,11A5,5 0 0,0 11,16A5,5 0 0,0 16,21A5,5 0 0,0 21,16A5,5 0 0,0 16,11Z" />
                  </svg>
                </div>
                  <div class="col-sm-5">
                    <input type="text" class=" form-control form-control-user" id="end_time" autocomplete="off" name="end_time" placeholder="End Time">
                    <p align="justify"><font style="font-style : italic;" color="#A9A9A9" size="2"> example 18:00</font></p>
                  </div>
                </div>
                <br>
                <div class="text-center section_title">
                  <h3>
                    Katergori Wisata
                  </h3>
                </div><hr>
                <div class="form-inline">
                  <table class="table">
                    <h4>Wisata Alam</h4>
                    <?php 
                    foreach ($wisata_bogor as $data => $value) { 
                      if($value->jenis_wisata =='Wisata Alam'){
                        ?>
                        <tr>
                          <td width="12%">
                            <div class="checkbox row">
                             <label><input type="checkbox" name="id_wisata[]"  value="<?php echo $value->id ?>">&nbsp;&nbsp;&nbsp;<?php echo $value->nama_wisata ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

                           </div>
                         </td>
                        <td width="12%"><input type="text" autocomplete="off" class="form-control form-control-user col-sm-2" id="menit" name="menit[]" placeholder="menit" value=""></td>
                       </tr>
                     <?php } }?>
                   </table>
                   <table class="table">
                     <h4>Tempat Rekreasi</h4>
                     <?php 
                     foreach ($wisata_bogor as $data => $value) { 
                      if($value->jenis_wisata =='Tempat Rekreasi'){
                        ?>
                        <tr>
                          <td width="12%">
                            <div class="checkbox row">
                              <label><input type="checkbox" name="id_wisata[]"  value="<?php echo $value->id ?>">&nbsp;&nbsp;&nbsp;<?php echo $value->nama_wisata ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                          </td>
                          <td width="12%"><input type="text" autocomplete="off" class="form-control form-control-user col-sm-2" id="menit" name="menit[]" placeholder="menit" value=""></td>
                        </tr>
                      <?php } }?>
                    </table>
                    <h4>Musium</h4>
                    <table class="table">
                     <?php 
                     foreach ($wisata_bogor as $data => $value) { 
                       if($value->jenis_wisata =='Musium'){
                        ?>
                        <tr>
                          <td width="12%">
                            <div class="checkbox row">
                              <label>
                                <input type="checkbox" name="id_wisata[]" value="<?php echo $value->id ?>">&nbsp;&nbsp;&nbsp;<?php echo $value->nama_wisata ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                          </td>
                          <td width="12%">
                            <div class="col-sm-1">
                            <input type="text" class="form-control form-control-user col-sm-3 " autocomplete="off"  id="menit" name="menit[]" placeholder="menit" value="">
                          </div>
                        </td>
                          </tr>
                        <?php } }?>
                      </table>
                    </div>

                    <br>
                    <br>
                    <br>
                    <div class="text-center">
                      <input class="btn btn-primary btn-lg btn-block"  type="submit" name="button" value="Submit">
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
<br>
<br>
<br>
<br>
<br>
<br>
<?php $this->load->view('template/script') ?>

  <script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'mm/dd/yyyy',
      todayHighlight: true,
  });
$('.times').timepicker({
    timeFormat: 'hh:mm p',
    interval: 30,
    minTime: '8',
    maxTime: '23',
    defaultTime: '8',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

 });
</script>
