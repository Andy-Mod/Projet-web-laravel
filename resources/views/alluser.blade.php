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
                        <li class="nav-item"><a class="nav-link" href="{{route('users.register-new')}}">Ajouter un utilisateur</a></li>
                        <li><a class="nav-link" href="{{route('home')}}"></a></li>
                        <li><a class="nav-link" href="/annonces/liste"></a></li>
                        <li><a class="nav-link" href="{{route('Annonce.create')}}"></a></li>
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
        @if(count($users) != 0)
            @foreach($users as $user)
            <section class="py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/assets/images/images.jpeg" alt="..." /></div>
                        <div class="col-md-6">
                        <div class="fs-5 mb-5">
                                <span class="text-decoration-line-through"><h2>Username</h2></span>
                                <span><h1>{{$user->name}}</h1></span>
                            </div>
                            <span><h1>User_Id</h1></span>
                            <div class="small mb-1"><h1>{{$user->id}}</h1></div>
                            <h1 class="display-5 fw-bolder">{{$user->email}}</h1>
                            <div class="fs-5 mb-5">
                            </div>
                            <div class="d-flex">
                                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" disabled/>
                                <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                    <i class="bi-cart-fill me-1"></i>
                                    
                                    <a href="{{ route('users.delete', $user->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('deleteuser{{$user->id}}').submit();">
                                        {{ __('Supprimer ') }}
                                    </a>
                                    <form id="deleteuser{{$user->id}}" action="{{ route('users.delete', $user->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE') 
                                    </form>
                                    
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
        @else
            <div class="container px-4 px-lg-5">
                :( ! <br/> Aucun utilisateur existant ! 
            </div>
        @endif


@endsection
