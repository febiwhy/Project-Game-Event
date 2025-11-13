<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Event Game</title>

	<!-- Global stylesheets -->
	<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/material/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/game_event.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/datatables.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<style>
		 body {
            background-color: #191c24;
            color: white;
        }
		  h1 {
            font-family: 'Bungee', sans-serif;
            color: #ffffff;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.5);
		}
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --dark-color: #5a5c69;
            --ml-color: #ff5722;
            --pokemon-color: #fbc02d;
            --digimon-color: #7b1fa2;
        }          
        .leaderboard-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            transition: transform 0.3s;
        }
        
        .leaderboard-card:hover {
            transform: translateY(-5px);
        }
        
        .leaderboard-header {
            background: linear-gradient(135deg, #2c3e50 0%, #4ca1af 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 1.5rem;
        }
        
        .table-leaderboard {
            margin-bottom: 0;
        }
        
        .table-leaderboard thead th {
            border-bottom: 2px solid #e3e6f0;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            color: var(--dark-color);
        }
        
        .table-leaderboard tbody tr {
            transition: all 0.3s;
        }
        
        .table-leaderboard tbody tr:hover {
            background-color: #f8f9fa;
            transform: scale(1.01);
        }
        
        .rank-1 {
            background-color: rgba(255, 215, 0, 0.1);
        }
        
        .rank-2 {
            background-color: rgba(192, 192, 192, 0.1);
        }
        
        .rank-3 {
            background-color: rgba(205, 127, 50, 0.1);
        }
        
        .badge-rank {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
        }
        
        .rank-1 .badge-rank {
            background-color: gold;
            color: #000;
        }
        
        .rank-2 .badge-rank {
            background-color: silver;
            color: #000;
        }
        
        .rank-3 .badge-rank {
            background-color: #cd7f32;
            color: #fff;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .game-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 5px;
            margin-bottom: 5px;
            display: inline-block;
        }
        
        .badge-ml {
            background-color: var(--ml-color);
            color: white;
        }
        
        .badge-pokemon {
            background-color: var(--pokemon-color);
            color: white;
        }
        
        .badge-digimon {
            background-color: var(--digimon-color);
            color: white;
        }
        
        .progress {
            height: 10px;
            border-radius: 5px;
        }
        
        .progress-bar {
            background-color: var(--secondary-color);
        }
    </style>


</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-light navbar-static">
		<div class="navbar-brand" style="display: flex; align-items: center;">
			<a href="#" class="d-inline-block" style="display: flex; align-items: center; text-decoration: none; color: #fff;">
				<img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;">
				<span style="font-size: 18px; font-weight: bold; margin-left: 10px; vertical-align: middle;"> Loop Tourney</span>
			</a>
		</div>


		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-demo1-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbarmobile">
			<ul class="navbar-nav">
				@if (auth()->check() && auth()->user()->status == 'pending')
					<li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
					<li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link ">Status Akun</a></li>
					<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
				@elseif (auth()->check() && auth()->user()->status == 'approved')
					<li class="nav-item"><a href="{{route('landing')}}" class="navbar-nav-link ">Home</a></li>
					<li class="nav-item"><a href="{{route('status-user.index')}}" class="navbar-nav-link ">Status Akun</a></li>
					<li class="nav-item"><a href="{{route('leaderboard')}}" class="navbar-nav-link active">leaderboard</a></li>
					<li class="nav-item"><a href="{{route('article.game')}}" class="navbar-nav-link">Artikel</a></li>
					<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Hubungi Kami</a></li>
				@elseif (auth()->check() && !auth()->user()->hasRole('admin'))
					<li class="nav-item"><a href="{{ route('admin.index') }}" class="navbar-nav-link">Admin</a></li>
				@endif
			</ul>

			<ul class="navbar-nav ml-xl-auto">

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
						<h4>
							<span class="font-weight-semibold"></span></h4>
					</div>
				</div>
			</div>
			<!-- /page header -->

				<div class="card" >
					<div class="card-header header-elements-inline">
						<h1 class="card-title">leaderboard yang paling banyak penggemarnya</h1>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
								<a class="list-icons-item" data-action="reload"></a>
								<a class="list-icons-item" data-action="remove"></a>
								<div class="col-md-3 col-sm-4">
								</div>
							</div>
						</div>
					</div>

                    <div class="container py-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card leaderboard-card mb-4">
                                    <div class="card-header leaderboard-header text-center">
                                        <h2 class="mb-0"><i class="fas fa-gamepad me-2"></i><br>GAME TOURNAMENT LEADERBOARD</h2>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-leaderboard table-hover align-middle">
                                                <thead>
                                                    <tr>
                                                        <th width="60">Rank</th>
                                                        <th>Nama Turnamen</th>
                                                        <th>Rekomendasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($leaderboards as $index => $leaderboard)  
                                                        <tr class="rank-{{ $index+1 }}">
                                                            <td><span class="badge-rank">{{ $loop->iteration }}</span></td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="{{asset($leaderboard->thumbnail)}}" alt="User" class="avatar me-3">
                                                                    <div>
                                                                        <h6 class="mb-0">{{$leaderboard->name}}</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><strong class="h5">{{$leaderboard->slot_filled}}</strong></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                

				</div>

			<!-- Footer -->
			<div class="navbar navbar-expand-xl navbar-dark rounded-bottom">
				<div class="navbar-collapse collapse">
					<span class="navbar-text">
						&copy; 2015 - 2025. <img src="{{ asset('global_assets/images/logo.png') }}" alt="Logo" style="height: 35px; width: auto; display: inline-block; vertical-align: middle;">Loop Tourney</a>
					</span>
					<ul class="navbar-nav ml-xl-auto">
						<li class="nav-item"><a href="{{route('contact.index')}}" class="navbar-nav-link">Pusat Batuan</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>  
    <script>
        // Set current date
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
        document.getElementById('current-date').textContent = now.toLocaleDateString('en-US', options);
    </script>
	</body>
</html>
