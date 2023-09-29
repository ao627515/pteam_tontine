@extends('layout')
@section('title', 'Tontine')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="container">
        <!-- Widget: user widget style 2 -->
        <div class="row">
            <div class="col">
                <div class="widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-secondary">
                        <h2 class="widget-user-username">{{ $tontine->name }}</h2>
                        <h5 class="widget-user-desc">Créé le {{ $tontine->created_at }}</h5>
                        <button class="text-danger">Status : {{ $tontine->status }}</button>
                    </div>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="" class="nav-link text-secondary">
                                Participants <span
                                    class="float-right badge bg-primary">{{ $tontine->number_of_members }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-secondary">
                                Cotisation <span class="float-right badge bg-info">{{ $tontine->amount }} FCFA</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-secondary">
                                Bénéfice <span class="float-right badge bg-success"> {{ $tontine->profit }} FCFA</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-secondary">
                                Adhérants <span
                                    class="float-right badge bg-danger">{{ $tontine->currentMembersNumber() }}/{{ $tontine->number_of_members }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /.widget-user -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <h1>Liste des Participants</h1>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-5 text-end mt-2">
                    @if (!$tontine->isFull())
                        @include('tontine.recherche-participant')
                    @else
                        @unless ($tontine->isStart())
                            <form action="{{ route('tontine.start', $tontine) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Lancer la tontine
                                </button>
                            </form>
                        @endunless
                    @endif
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom (s)</th>
                            <th>Bras</th>
                            <th>Rang</th>
                            <th>Cotisation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tontine->participation as $participation)
                            {{-- {{dd($tontine,$tontine->participation,$tontine->number_of_members)}} --}}
                            <tr>
                                <td><a
                                        href="#">{{ $participation->user->last_name . ' ' . $participation->user->first_name }}</a>
                                </td>
                                <td><a href="#">{{ $participation->nombre_bras }}</a></td>
                                <td> {{ $participation->rank }} </td>
                                <td>{{ $tontine->participation->count() }}/{{ $tontine->number_of_members }}</td>
                            </tr>
                        @empty
                            <b class="text-warning">Aucun participant n'a été ajouté </b>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.col -->
    </div>

@endsection
@section('script')
    <!-- Inclure les fichiers JavaScript de Bootstrap (jQuery requis) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
   <script>
    $(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var tontineId = getTontineIdFromUrl();

    function getTontineIdFromUrl() {
        var url = window.location.href;
        var parts = url.split('/');
        return parts[parts.length - 1];
    }

    $('#searchText').on('input', function() {
        var term = $(this).val();

        $.ajax({
            url: '{{ route('tontine.rechercheParticipant') }}',
            type: 'POST',
            data: {
                term: term,
                '_token': csrfToken
            },
            success: function(response) {
                var tbody = $('#resultsTable tbody');
                tbody.empty();

                response.resultats.forEach(function(participant) {
                    var row = `<tr>
                        <td>${participant.last_name} ${participant.first_name}</td>
                        <td>${participant.phone_number}</td>
                        <td><button type="button" class="btn btn-success" data-user-id="${participant.id}">Ajouter</button></td>
                    </tr>`;
                    tbody.append(row);
                });

                $('form').submit(function() {
                    $(this).find(':submit').attr('disabled', 'disabled');
                });

                $('body').on('click', '.btn-success', function() {
                    var userId = $(this).data('user-id');
                    $(this).attr('disabled', 'disabled');
                    
                    $.ajax({
                        url: '{{ route('tontine.ajaxnewParticipant') }}',
                        type: 'POST',
                        data: {
                            user_id: userId,
                            tontine_id: tontineId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            location.reload(true); // Rechargez la page
                            if (response.msg) {
                                swal("Succès!", response.message, "success");
                            } else {
                                swal("Erreur!", response.message, "error");
                            }
                            console.log(response.message);
                        },
                        complete: function() {
                            $('.btn-success').removeAttr('disabled');
                        }
                    });
                });

                var searchResultsInput = $('#searchResults');
                searchResultsInput.val(response.resultats.length + ' résultat(s) trouvé(s)');
            }
        });
    });
});

   </script>
@endsection
