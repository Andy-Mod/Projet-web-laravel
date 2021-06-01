@extends('layouts.app')

@section('content')
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	
	<title>Créer une annonce</title>

	<link rel="shortcut icon" href="/assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="/assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="/assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="/assets/js/html5shiv.js"></script>
	<script src="/assets/js/respond.min.js"></script>
	<![endif]-->
</head>


	<!-- container -->
	<div class="container">

	</head>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Bienvenue {{ Auth::user()->name }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"></a></li>
                        <li><a class="nav-link" href="{{route('home')}}">Mes annonces </a></li>
                        <li><a class="nav-link" href="#!">Les offres disponibles</a></li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        </head>
		

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Créer une annonce</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<hr>

							<form method="POST" action="{{route('Annonce.store')}}">
							@csrf
								<div class="top-margin">
									<label>Titre de l'annonce</label>
									<input type="text" name="titre" class="form-control" required>
								</div>
								
								<div class="top-margin">
									<label>Type de l'annonce<span class="text-danger">*</span></label>
									<select id="inputState" name="tipe" class="form-control" required>
        								<option selected>Demande de location</option>
        								<option>Demande d'achat</option>
										<option selected>Offre de location</option>
        								<option>Offre de vente</option>
								    </select>
								</div>

								<div class="top-margin">
									<label>Prix / Budjet</label>
									<input type="text" name="prix" class="form-control" required>
								</div>

								<div class="top-margin">
									<label>Description</label>
									<input type="text" name="description" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Contact</label>
									<input type="text" name="contact" class="form-control" required>
								</div>
								<br/>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">Post</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
</div>		
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="/assets/js/headroom.min.js"></script>
	<script src="/assets/js/jQuery.headroom.min.js"></script>
	<script src="/assets/js/template.js"></script>
	@endsection