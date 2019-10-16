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
					<a class="page-scroll" href="<?php echo site_url('Perjalanan/index') ?>">Create Itinerary</a>
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
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 colspan="3" class="text-center">Your Plan</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4"></h1>
                    </div><hr>
                    <form class="user" method="post" action="<?php echo base_url('perjalanan/planing') ?>">
                      <table  class="table">
                        <tr>
                          <th  class=" text-center">NO</th>
                          <th  class=" text-center">Lokasi Keberangkatan</th>
                          <th  class=" text-center">Tanggal Awal</th>
                          <th class=" text-center">Tanggal Akhir</th>

                          <th class=" text-center">Jam Awal</th>
                          <th class=" text-center">Jam Akhir</th>
                          <th class=" text-center">Opsi</th>

                        </tr>
                        <?php
                          $no = 1;
                         foreach ($plan as $key2 => $plan) { ?>
                          <tr>
                            <td class=" text-center"><?php echo $no ?></td>
                            <td class=" text-center"><?php echo " $plan[nama_wisata]" ?></td>
                            <td class=" text-center"><?php echo " $plan[tanggal_awal]" ?></td>
                            <td class=" text-center"><?php echo " $plan[tanggal_akhir]" ?></td>
                            <td class=" text-center"><?php echo " $plan[jam_awal]" ?></td>
                            <td class=" text-center"><?php echo " $plan[jam_akhir]" ?></td>
                            <td class=" text-center">
                              <a href="<?php echo site_url('perjalanan/detail_rute/').$plan['id'] ?>" class=" btn btn-primary btn-sm">Lihat Rute</a>
                              <a href="<?php echo site_url('perjalanan/delete/').$plan['id'] ?>" class=" btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>

                          </tr>
                        <?php 
                          $no++;
                        } ?>
                      
                      </table>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
<br>
<br>
<br>

  <?php $this->load->view('template/script') ?>
