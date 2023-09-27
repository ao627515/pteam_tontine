@extends('layout')
{{-- @section('title', 'Tontine') --}}

@section('css')
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endsection


@section('content')
<div class="container">   
<div class="row">
    <div class="col-md-6" ><h2>tontine</h2>
        
    </div> 
       <div class="col-sm-6 col-md-4 text-right">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
            Ajouter un nouveau
          </button>
    </div>

</div>
    <!-- Vérifiez s'il y a un message SweetAlert dans la session -->
         @if(session('sweet_alert'))
         <script>
             Swal.fire({
                 icon: '{{ session('sweet_alert.icon') }}',
                 title: '{{ session('sweet_alert.title') }}',
                 text: '{{ session('sweet_alert.text') }}',
             });
         </script>
        @endif
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


@section('script')
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
@endsection