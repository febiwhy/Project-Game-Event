<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Event Game</title>
    

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/material/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

	<!-- /global stylesheets -->
	

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
	<script src="{{asset('assets/js/app.js')}}"></script>
	<!-- /theme JS files -->

	<style>
		 body {
            background-color: #191c24;
            color: white;
        }
        .event-card {
            background-color: #2a2d3e;
            border-radius: 10px;
            padding: 15px;
            color: white;
            width: 230px;
        }
        .event-card img {
            width: 100%;
            border-radius: 10px;
        }

		.event-tag {
            display: inline-block;
            background-color: #09093b; /* Warna latar belakang biru */
            color: white; /* Warna teks putih */
            padding: 8px 16px; /* Jarak dalam tag */
            border-radius: 20px; /* Sudut yang melengkung */
            font-weight: bold; /* Teks tebal */
            font-size: 14px; /* Ukuran font */
            text-transform: uppercase; /* Menjadikan teks kapital */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan di sekitar tag */
            transition: all 0.3s ease; /* Animasi transisi */
			margin-right: 10px;
        }
		

        /* Efek hover untuk interaksi */
        .event-tag:hover {
            background-color: #0056b3; /* Warna latar belakang lebih gelap saat hover */
            transform: translateY(-2px); /* Efek gerakan sedikit ke atas */
        }
        .lounge-tag {
            background-color: orange;
        }
        .event-title {
            font-weight: bold;
        }
        .event-info {
            font-size: 14px;
        }

		h1 {
			font-family: 'Bungee', sans-serif;
			color: #ffffff;
			text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);
		}

		 select.form-select {
            text-align: center;
            text-align-last: center;
			font-size: 0.9rem;
		}

		    .not-found-img {
            max-width: 250px;
        }


	</style>


</head>

<body >

	<!-- Main navbar -->
	<div class="navbar navbar-dark navbar-expand-xl">
		<div class="navbar-brand">
			<a href="#" class="d-inline-block">
				<img src="{{asset('global_assets/images/logo_light.png')}}" alt="">
			</a>
		</div>

		<div class="d-xl-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-demo1-mobile">
				<i class="icon-grid3"></i>
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-demo1-mobile">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link">Home</a></li>

				<li class="nav-item dropdown ">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-paragraph-justify3"></i></a>
					<div class="dropdown-menu dropdown-menu-right ">
						<a href="#" class="dropdown-item">
							<i class="mi-games fa-sm mr-2"></i>Event</a>
						<a href="{{route('article')}}" class="dropdown-item">
							<i class="mi-web fa-sm mr-2"></i>Artikel</a>
							<div class="dropdown-submenu">
								<a href="#" class="dropdown-item dropdown-toggle"><i class="icon-headphones fa-sm mr-2"></i> Hubungi Kami </a>
								<div class="dropdown-menu">
									<a href="{{route('contact.index')}}" class="dropdown-item"><i class="icon-android"></i> Kontak </a>
								</div>
							</div>
						<a href="#" class="dropdown-item disabled">
							<i class="icon-alarm fa-sm mr-2 "></i>Akan Datang</a>
					</div>
				</li>
			</ul>

			<span class="navbar-text ml-xl-3">
				<span class="badge bg-success">Online</span>
			</span>

			<ul class="navbar-nav ml-xl-auto">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link">
						<i class="icon-bell2"></i>
						<span class="d-xl-none ml-2">Notifications</span>
						<span class="badge badge-pill bg-warning-400 ml-auto ml-xl-0">2</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="navbar-nav-link">
						<i class="icon-bubbles4"></i>
						<span class="d-xl-none ml-2">Messages</span>
					</a>
				</li>
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle mr-2" height="34" alt="User Avatar">
						<span class="navbar-text">
							@if (auth()->check())
								Halo, {{ auth()->user()->name }}
							@else
								Guest
							@endif
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						@if (auth()->check())
							<a href="{{ route('logout') }}" class="dropdown-item">
								<i class="icon-switch2"></i> Logout
							</a>
						@else
							<a href="{{ route('login') }}" class="dropdown-item">
								<i class="icon-switch2"></i> Login
							</a>
						@endif
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header border-bottom-0">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Event Game</span></h4>
					</div>
				</div>
			</div>
			<!-- /page header -->

				<div class="card bg-dark text-white p-3 mb-4" >
					<div class="card-header header-elements-inline">
						<h1 class="card-title">Temukan Artikel <br> untuk Game Favoritmu!</h1>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

				<!-- Search Bar Full Width -->
				<div class="input-group my-4 w-100">
					<span class="input-group-text event-tag border-0">
						<i class="bi bi-search text-white"></i> <!-- Ikon Search -->
					</span>
					<input type="text" class="form-control event-tag text-white border-0" placeholder="Search article...">
				</div>

				<!-- Filter Buttons -->
				<div class="d-flex flex-wrap gap-2">
					<button class="event-tag">Semua</button>
					<button class="event-tag">Panduan Pokemon</button>
					<button class="event-tag">Panduan Digimon</button>
					<button class="event-tag">Panduan Bayblade</button>
				</div>

				<div class="mt-4">
					<select class="form-select w-100 event-tag">
						<option class="text-center">Minggu ini</option>
						<option class="text-center">Bulan ini</option>
						<option class="text-center">Semua Waktu</option>
					</select>
        		</div>

				<div class="container text-center mt-5">
					<img src="{{asset('global_assets/images/not_found.png')}}" class="not-found-img" alt="Not Found">
					<h5 class="mt-3">Artikel Kosong</h5>
   				</div>

				</div>

			<div class="card bg-dark text-white">
				<div class="card-header header-elements-inline">
					<div class="header-elements">
						<div class="list-icons">
		            		<a class="list-icons-item" data-action="collapse"></a>
		            		<a class="list-icons-item" data-action="reload"></a>
		            		<a class="list-icons-item" data-action="remove"></a>
		            	</div>
	            	</div>
				</div>

                


							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

			<!-- Footer -->
			<div class="navbar navbar-expand-xl navbar-dark rounded-bottom">
				<div class="navbar-collapse collapse">
					<span class="navbar-text">
						&copy; 2015 - 2025. <a href="#">Event Game</a>
					</span>
					<ul class="navbar-nav ml-xl-auto">
						<li class="nav-item"><a href="#" class="navbar-nav-link">Help Center</a></li>
						<li class="nav-item"><a href="#" class="navbar-nav-link">Policy</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
