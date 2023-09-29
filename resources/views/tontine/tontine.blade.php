@extends('layout')
@section('title', 'MES TONTINES')

@section('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-md-center justify-content-xs-center justify-content-lg-end">
            <div class="col-sm-6 col-md-4 text-center">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Ajouter un nouveau
                </button>
                @include('tontine.create')
            </div>
        </div>
        <div class="row mt-5">
            @foreach ($tontines as $tontine)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="{{ route('tontine.show', $tontine->id) }}" class="text-decoration-none">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $tontine->name }}</h3>
                                <h4>Participants: {{ $tontine->number_of_members }}</h4>
                                <b>Participations : {{ $tontine->amount }}fcfa</b>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            // Désactiver le bouton "Enregistrer" par défaut
            $('#save-button').prop('disabled', true);

            // Écouter les événements de saisie dans les champs requis
            $('.required-field').on('input', function() {
                // Vérifier si tous les champs requis (sauf Description) sont remplis ou saisis
                var allFieldsFilled = true;

                $('.required-field').each(function() {
                    if ($(this).val().trim() === '') {
                        allFieldsFilled = false;
                        return false; // Sortir de la boucle each si un champ est vide
                    }
                });

                // Activer ou désactiver le bouton "Enregistrer" en fonction de l'état des champs
                $('#save-button').prop('disabled', !allFieldsFilled);
            });
        });
    </script>
@endsection
