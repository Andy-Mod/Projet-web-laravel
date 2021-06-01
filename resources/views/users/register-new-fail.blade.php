@extends('layouts.app')

@section('content')
<div class="container">
<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Créer un nouvel utilisateur</h1>
                    </article>

                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <hr>
                                            </div>
                                                {{ __('L\'utilisateur n'as pas pu etre créer veillez changer le nom d'utilsateur ! Appuyer') }}<a href="{{route('users.register-new-fail')}}"> ici </a> {{ __('pour continuer') }}
                                        </div>

                                    </div>
                                
                </div>		
                </header>
    
    
@endsection