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
				<div class="panel-title text-center">Sign Up</div>
			</div>     

			<div class="panel-body" >
				<?php echo $this->session->flashdata('message'); ?>

				<form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo site_url('Login/register') ?>">

					<div class="from-group">
						<input id="username" type="text" class="form-control" name="username" value="<?php echo set_value('username') ?>" placeholder="Username">    
						<?php echo form_error('username',' <small class="text-danger pl-3">','</small>') ?>
					</div>
					<br>
					<div class="form-group">
						<div class="col-sm-12 mb-3 mb-sm-0">
						<input id="email" type="text" class="form-control" name="email" value="<?php echo set_value('email') ?>" placeholder="Email">  
						<?php echo form_error('email',' <small class="text-danger pl-3">','</small>') ?>
					</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
							<?php echo form_error('password1',' <small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="col-sm-6">
							<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
						</div>
					</div>                                                              

					<div class="form-group">
						<!-- Button -->
						<div class="col-sm-12 controls">
							<button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Sign Up</button>                          
						</div>
						<div class="card-footer">
							<div class="text-center small">
								Alredy have an account?<a href="<?php echo site_url('Login/index') ?>">  Sign In</a>
							</div>
						</div>
					</div>

				</form>     

			</div>                     
		</div>  
	</div>
</div>

<div id="particles"></div>
