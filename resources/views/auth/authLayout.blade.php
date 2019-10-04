<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Face Work Login
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="../assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="../assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="../../../assets/demo/default/media/img/logo/favicon.ico" />
	</head>
    <!-- end::Head -->
    <!-- end::Body -->
	<body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" >
				<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img style="border-radius: 40px;" src="../assets/app/media/img//logos/logo-1.png">
							</a>
						</div>
    
    @yield('content')

    		</div>
					</div>
				</div>
			</div>
		
        <!-- end:: Page -->
        
    
    <!--begin::Base Scripts -->
    <script src="../../../assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="../../../assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Base Scripts -->   
    <!--begin::Page Snippets -->
    <script src="../../../assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>
    <!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>