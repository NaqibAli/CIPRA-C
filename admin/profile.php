<?php 

session_start();

if(!($_SESSION['isloged']==1))
{
  header("Location:./login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>CIPRA - Companies And Intellectual Property Registration Agency</title>

	<!-- Site favicon -->
	<link
      rel="apple-touch-icon"
      sizes="180x180"
      href="../assets/img/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="../assets/img/favicon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/img/favicon.png"
    />

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/cropperjs/dist/cropper.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/sweetalert2/sweetalert2.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>

	      <!--Top bar include here -->
<?php
    include("include/Topheader.php");
  ?>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

  <!--sidebar included here-->
  <?php

  include("include/sidebar.php");
  
  ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				
				<div class="row align-items-start">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<div class="profile-photo">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body pd-5">
												<div>
													<img id="image" src="vendors/images/photo2.jpg" alt="Picture" id="profile_image">
												</div>
											</div>
											<div class="modal-footer">
												<input type="submit" value="Update" class="btn btn-primary">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<h5 class="text-center h5 mb-0" id="profile_name"><?php echo $_SESSION['name'] ?></h5>
							<p class="text-center text-muted font-14">
						<?php if($_SESSION['usertype']==3) 
						echo($_SESSION['proffession']);
						else 
						echo("Mss/Mrs Welcome Your Profile"); ?>	
							</p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
			
									<li>
										<span>Email Address:</span>
										<?php echo $_SESSION['email'] ?>
									</li>
									<?php if($_SESSION['usertype']==2){?>
									<li>
										<span>Phone Number:</span>
										<?php echo $_SESSION['phone'] ?>
									</li>
									<?php } ?>
									<li class="mt-2">
									<a href='./profile.php?action=updateprofile' class="btn btn-success">
									<i class="m-icon dw dw-edit"></i>
									Edit Profile
									</a>
									</li>
									<!-- when Completed Profile it will Add This -->
								</ul>
							</div>
						</div>
					</div>
					<?php if (isset($_GET['action'])) { 
						if($_GET['action']=='completeprofile' or $_GET['action']=='updateprofile') {
						?>
					
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									
									<div class="tab-content">
										
										<div class="tab-pane fade height-100-p show active" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form id="profile">
													<ul class="profile-edit-list">
														<li class="weight-500">
															<h4 class="text-blue h5 mb-20">Edit Your Personal Information</h4>
															<div class="row">
																<div class="col-6"><div class="form-group">
																	<label>Full Name</label>
																	<input class="form-control form-control" name="Full_Name"type="text">
																</div></div>
																<div class="col-6">
																	<div class="form-group">
																	<label>Nationality</label>
																	<select name="nationality" class="selectpicker form-control nationality"></select>
																</div>
															</div>
																<div class="col-6"><div class="form-group">
																	<label>Date of birth</label>
																	<input class="form-control form-control date-picker" name="Date_of_birth" type="text">
																</div></div>
																
																<div class="col-6">
																	<div class="form-group">
																		<label>Gender</label>
																		<div class="d-flex">
																		<div class="custom-control custom-radio mb-5 mr-20">
																			<input type="radio" 
																			value="Male"
																			id="maleid" name="gender" class="custom-control-input">
																			<label class="custom-control-label weight-400" for="maleid">Male</label>
																		</div>
																		<div class="custom-control custom-radio mb-5">
																			<input type="radio" 
																			value="Female"
																			id="femaleid" name="gender" class="custom-control-input">
																			<label class="custom-control-label weight-400" for="femaleid">Female</label>
																		</div>
																		</div>
																	</div></div>
																<div class="col-6">	<div class="form-group">
																	<label>ID type</label>
																	<select class="selectpicker form-control" name="idtype">
																		<option value="Passport">Passport</option>
																		<option value="Driver_License">Driver License</option>
																	</select>
																</div></div>
																<div class="col-6"><div class="form-group">
																	<label>ID Number</label>
																	<input class="form-control form-control" name="ID_Number" type="text">
																</div></div>
																<div class="col-6"><div class="form-group">
																	<label>Race</label>
																	<input class="form-control form-control" name="Race" type="text">
																</div></div>
																<div class="col-6"><div class="form-group">
																	<label>Phone Number</label>
																	<input class="form-control form-control" name="Phone_Number" type="text">
																</div></div>
																<div class="col-6"><div class="form-group">
																	<label>Home Number</label>
																	<input class="form-control form-control" name="Home Number" type="text">
																</div></div>
																<div class="col-6"><div class="form-group">
																	<label>Office Number</label>
																	<input class="form-control form-control" name="Office_Number" type="text">
																</div></div>
																
																	<div class="col-4 form-group">
																	<label>Country</label>
																	<input class="form-control form-control" name="Country" type="text">
																	</div>
																	<div class="col-4 form-group">
																	<label>State</label>
																	<input class="form-control form-control" name="State" type="text">
																	</div>
																	<div class="col-4 form-group">
																	<label>City</label>
																	<input class="form-control form-control" name="City" type="text">
																	</div>

																
																
																<div class="col-6">	<div class="form-group">
																	<div class="custom-control custom-checkbox mb-5">
																		<input type="checkbox" class="custom-control-input" id="customCheck1-1">
																		<label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification emails</label>
																	</div>
																</div></div>
															</div>
														
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Update Profile">
															</div>
														</li>
													
													</ul>
												</form>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
			CIPRA - Companies And Intellectual Property Registration Agency,
          	Developed by <a href="javascript:" target="_blank">HanTech</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/cropperjs/dist/cropper.js"></script>
	<script src="src/scripts/helper.js"></script>
	<script src="./scripts/Profile.js"></script>
    <script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script>
		
		window.addEventListener('DOMContentLoaded', function () {
			loadcountries();
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
</body>
</html>