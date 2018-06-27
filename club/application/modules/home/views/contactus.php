<div class="wrapper row3">
	<div class="rounded">
		<main class="container clear"> 
			<!-- main body --> 
			<!-- ################################################################################################ -->
			<div id="portfolio">
				
				<div class="container-contact100">
					<div class="wrap-contact100">
						<form class="contact100-form validate-form" enctype="multipart/form-data" action="<?php echo base_url().'contactus/add_edit'?>" method="post">
							
							<label class="label-input100" for="first-name">
							أدخل الأسم*</label>
							<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
								<input id="first-name" class="input100" type="text" name="first-name" placeholder="الأسم الأخير">
								<span class="focus-input100"></span>
							</div>
							<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
								<input class="input100" type="text" name="contactus_name" placeholder="الأسم الأول">
								<span class="focus-input100"></span>
							</div>

							<label class="label-input100" for="email">
								أدخل البريد الألكتروني*  
							</label>
							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input id="email" class="input100" type="text" name="contactus_email" placeholder="Eg. example@email.com">
								<span class="focus-input100"></span>
							</div>

							<label class="label-input100" for="phone">أدخل رقم الهاتف  </label>
							<div class="wrap-input100">
								<input id="phone" class="input100" type="text" name="contactus_phone" placeholder="Eg. +2 000 000000">
								<span class="focus-input100"></span>
							</div>

							<label class="label-input100" for="message">الرساله* </label>
							<div class="wrap-input100 validate-input" data-validate = "Message is required">
								<textarea id="message" class="input100" name="contactus_dess" placeholder="أكتب الرساله"></textarea>
								<span class="focus-input100"></span>
							</div>

							<div class="container-contact100-form-btn">
								<button class="contact100-form-btn" type="submit" name="submit" value="submit">
									أرسال
								</button>
							</div>
						</form>

						<div class="contact100-more flex-col-c-m" style="background-image: url('<?php echo base_url();?>assets/css2/bg-01.jpg');">
							<div class="flex-w size1 p-b-47">
								<div class="txt1 p-r-25">
									<span class="lnr lnr-map-marker"></span>
								</div>

								<div class="flex-col size2" style="text-align:left">
									<span class="txt1 p-b-20">
										العنوان
									</span>

									<span class="txt2">
										Mada Center 8th floor, 379 streetname St, Town name, NY 10018 
									</span>
								</div>
							</div>

							<div class="dis-flex size1 p-b-47" style="text-align:left">
								<div class="txt1 p-r-25">
									<span class="lnr lnr-phone-handset"></span>
								</div>

								<div class="flex-col size2">
									<span class="txt1 p-b-20">
										رقم التليفون
									</span>

									<span class="txt3">
										+2 xxx xxxxxxx
									</span>
								</div>
							</div>

							<div class="dis-flex size1 p-b-47" style="text-align:left">
								<div class="txt1 p-r-25">
									<span class="lnr lnr-envelope"></span>
								</div>

								<div class="flex-col size2">
									<span class="txt1 p-b-20">
										الايميل
									</span>

									<span class="txt3">
										Sport@example.com
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="dropDownSelect1"></div>

				
			</div>
			<!-- ################################################################################################ --> 
			
			<!-- ################################################################################################ --> 
			<!-- / main body -->
			<div class="clear"></div>
		</main>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css2/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css2/main.css">
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-23581568-13');
</script>