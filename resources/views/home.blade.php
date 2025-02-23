
@extends("layouts.master")


@section("contenu")

<div class="row">
    <div class="col-12 p-8">
        <div class="jumbotron ">
                <h1 class="display-3">Bienvenu, <strong>{{auth()->user()->nom}} {{auth()->user()->prenom}} </strong></h1>          
        </div>
    </div>
</div>

@endsection