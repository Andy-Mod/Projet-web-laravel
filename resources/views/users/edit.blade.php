@extends('layouts.app')

@section('content')

<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Modifier un utilisateur</title>

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

<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Modifier le Profil d'un utilisateur</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Modification de Profil</h3>
							<hr>
							
							<form method="post" action="{{route('users.update', $user)}}">
                                @csrf
								<div class="top-margin">
									<label>Username <span class="text-danger" >*</span></label>
									<input type="text" name ="username" class="form-control" value='{{$name}}'/>
								</div>
                                <div class="top-margin">
									<label>Email <span class="text-danger">*</span></label>
									<input type="text" name="email" class="form-control" value='{{$email}}'>
								</div>
								<div class="top-margin">
                                <div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">Modifier</button>
									</div>
								<hr>
							</form>
						</div>
					</div>

				</div>
				
			</article>

            <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="/assets/js/headroom.min.js"></script>
	<script src="/assets/js/jQuery.headroom.min.js"></script>
	<script src="/assets/js/template.js"></script>
@endsection