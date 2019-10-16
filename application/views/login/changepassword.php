<?php $this->load->view('template/plugins') ?>
<?php $this->load->view('template/script') ?>
<div class="container">    

	<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 

		<div class="row">                
			<div class="icon text-center">
				<a href="<?php echo site_url('Home/index') ?>"><img width="90%" src="<?php echo base_url('assets/img/baru.jpg') ?>"><a>
			</div>
		</div>


		<div class="panel panel-default" >
			<div class="panel-heading">
				<div class="panel-title text-center">Change your password For</div>
				<h5 class="text-center"><?php echo $this->session->userdata('reset_email'); ?></h5>
			</div>     

			<div class="panel-body" >
				<?php echo $this->session->flashdata('message'); ?>


				<form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo site_url('Login/changepassword') ?>">

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password1" type="password" class="form-control" name="password1" placeholder="Enter your new password...">    
						<?php echo form_error('password1',' <small class="text-danger pl-3">','</small>') ?>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password2" type="password" class="form-control" name="password2" placeholder="Reset your password">    
						<?php echo form_error('password2',' <small class="text-danger pl-3">','</small>') ?>
					</div>
<br>
				                                                               

					<div class="form-group">
						<!-- Button -->
						<div class="col-sm-12 controls">
							<button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Change Password</button>                          
						</div>
						<div class="card-footer">
							<div class="text-center small">
								<a href="<?php echo site_url('Login/index') ?>"></a>
							</div>
						</div>
					</div>

				</form>     

			</div>                     
		</div>  
	</div>
</div>

<div id="particles"></div>
