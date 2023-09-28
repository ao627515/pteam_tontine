@extends('layout')

@section('title', 'Tontine')

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
                        <button class="text-danger">Status : Non Démarré</button>
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
                        <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                            Ajouter un nouveau
                        </button>
                    @else
                        <button type="submit" class="btn btn-danger">
                            Lancer la tontine
                        </button>
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
                </table>
                </tbody>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nouveau Participation(s)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('tontine.addParticipant', $tontine) }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom:</label>
                                    <input type="text" class="form-control" name="last_name" id="exampleInputEmail1"
                                        placeholder="Entrer un prenom" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Prenom (s) :</label>
                                    <input type="text" class="form-control" name="first_name" id="exampleInputPassword1"
                                        placeholder="Entrer un prenom" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputFile1"> CNIB Recto
                                    </label>
                                    <input class="form-control" type="file" name="identity_document_front"
                                        id="exampleInputFile1" >
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputFile1"> CNIB Verso</label>
                                    <input class="form-control" type="file" name="identity_document_back"
                                        id="exampleInputFile1" >
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre de bras (Nombre de place occupé)</label>
                                    <input type="number" name="nombre_bras" class="form-control" id="exampleInputEmail1"
                                         value="1" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Téléphone</label>
                                    <input type="number" name="phone_number" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter le tel" required>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="reset" class="btn btn-default">Annuler</button>
                            <button type="submit" class="btn btn-success">Enregistré</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endsection
    @section('script')
        <!-- Vérifiez s'il y a un message SweetAlert dans la session -->
        @if (session('sweet_alert'))
            <script>
                Swal.fire({
                    icon: '{{ session('sweet_alert.icon') }}',
                    title: '{{ session('sweet_alert.title') }}',
                    text: '{{ session('sweet_alert.text') }}',
                });
            </script>
        @endif
    @endsection
