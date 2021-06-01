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
                        <li><a class="nav-link" href="#">Mes annonces actives </a></li>
                        <li><a class="nav-link" href="#">Mes annonces désactivés </a></li>
                        <li><a class="nav-link" href="/annonces/liste">Les offres disponibles</a></li>

                        <li><a class="nav-link" href="{{route('Annonce.create')}}">Créer une annonce</a></li>
                        <li><a class="nav-link" href="{{route('profile')}}">Profile</a></li>
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
        @if(count(Auth::user()->annonces) != 0)
            @foreach(Auth::user()->annonces as $j)
            <section class="py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/assets/images/logement.jpg" alt="..." /></div>
                        <div class="col-md-6">
                        <div class="fs-5 mb-5">
                                <span class="text-decoration-line-through">Proposer par </span>
                                <span>{{Auth::user()->name}}</span>
                            </div>
                            <div class="small mb-1"><h1>{{$j->titre}}</h1></div>
                            <h1 class="display-5 fw-bolder">{{$j->type}}</h1>
                            <div class="fs-5 mb-5">
                                <span class="text-decoration-line-through">Prix</span>
                                <span><h2>{{$j->prix}} FCFA</h2></span>
                            </div>
                            <p class="lead">{{$j->description}}</p>
                            <div class="d-flex">
                                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" disabled/>
                                <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                    <i class="bi-cart-fill me-1"></i>
                                    
                                    <a href="{{ route('Annonce.edit', $j->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('update{{$j->id}}').submit();">
                                        {{ __('Modifier ') }}
                                    </a>
                                    <form id="update{{$j->id}}" action="{{ route('Annonce.edit', $j->id)}}" method="post" class="d-none">
                                        @csrf
                                    </form>
                                    @if( $j->active)
                                        <a href="{{ route('Annonce.down', $j->id) }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('down{{$j->id}}').submit();">
                                            {{ __('Désactiver ') }}
                                        </a>
                                        <form id="down{{$j->id}}" action="{{ route('Annonce.down', $j->id) }}" method="post" class="d-none">
                                            @csrf
                                        </form>
                                    @elseif($j->active = 'FALSE')
                                    <a href="{{ route('Annonce.up', $j->id) }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('up{{$j->id}}').submit();">
                                            {{ __('Activer ') }}
                                        </a>
                                        <form id="up{{$j->id}}" action="{{ route('Annonce.up', $j->id) }}" method="GET" class="d-none">
                                            @csrf
                                        </form>
                                    @endif
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
