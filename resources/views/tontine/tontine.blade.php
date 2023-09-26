@extends('layout')
@section('title', 'Tontine')
@section('content')

<div class="container">   
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
        Ajouter une tontine
      </button>
    <div class="row">
        @foreach ($tontines as $tontine )
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$tontine->name}}</h3>
                    <h4>{{$tontine->number_of_members}} participants</h4>

                    <p>{{$tontine->amount}}fcfa</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('tontine.show', $tontine->id) }}" class="small-box-footer">
                    detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    @endforeach
    </div>

    @include('tontine.create')

 
    </div>

@endsection
