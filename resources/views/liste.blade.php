@extends('layouts.app')

@section('content')

<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Immob-Porto</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
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
                        <li><a class="nav-link" href="{{route('Annonce.create')}}">Créer une annonce</a></li>
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
        <!-- Product section-->
        @if(count($annonces) != 0)
            @foreach($annonces as $j)
            <section class="py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/assets/images/logement.jpg" alt="..." /></div>
                        <div class="col-md-6">
                        <div class="fs-5 mb-5">
                                <span class="text-decoration-line-through">Proposer par </span>
                                <span>{{App\Models\Annonce::user($j->user_id)}}</span>
                            </div>
                            <div class="small mb-1">{{$j->name}}</div>
                            <h1 class="display-5 fw-bolder">{{$j->type}}</h1>
                            <div class="fs-5 mb-5">
                                <span class="text-decoration-line-through">Prix</span>
                                <span><h2>{{$j->prix}} FCFA</h2></span>
                            </div>
                            <p class="lead">{{$j->description}}</p>
                            <div class="d-flex">
                                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                    
                                    <a href="https://api.whatsapp.com/send?phone=+{{$j->contact}}&text=Bonjour ! Je  vous contact par rapport à votr    e annonce sur Immob-Porto" >
                                    {{ __('Joindre par Whatsapp ') }}</a>
                                </button>
                                <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                    
                                <a href="https://{{App\Models\Annonce::getMail($j->id)}}">
                                    {{ __('Joindre par email ') }}</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
        @else
            <div class="container px-4 px-lg-5">
                :( ! <br/> Annonce / Demandes / Offres existante ! 
            </div>
        @endif
@endsection
