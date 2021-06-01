@extends('layouts.app')

@section('content')
<div class="container">
<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Créer une annonce</h1>
                    </article>

                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <hr>
                                            </div>
                                                {{ __('L\'annonce a été enregistrer avec succes! Appuyer') }}<a href="{{route('home')}}"> ici </a> {{ __('pour continuer') }}
                                        </div>

                                    </div>
                                
                </div>		
                </header>
    
    
@endsection