@extends('layout')
@section('title', 'Tontine')
@section('content')
    <div class="container">
        <!-- Widget: user widget style 2 -->
        <div class="row">
            <div class="col-12">
                <div class="widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-secondary d-flex justify-content-between align-items-center">
                      <!-- Left Side: User Information -->
                      <div class="text-start">
                          <h2 class="widget-user-username">{{ $tontine->name }}</h2>
                          <h5 class="widget-user-desc">Créé le {{ $tontine->created_at }}</h5>
                      </div>                 
                      <!-- Right Side: Tontine Status -->
                      <div class="text-end mt-3">
                          <p class="bg-warning p-2 ">En cours</p>
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
                                        class="float-right badge bg-danger">{{ $tontine->participation->count() }}/{{ $tontine->number_of_members }}</span>
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
                <div class="row mb-2">
                    <div class="col-sm-6 col-md-8">
                        <h1>Liste des Participants</h1>
                    </div>
                    <div class="col-sm-6 col-md-4 text-right">
                        @if ($tontine->participation->count() < $tontine->number_of_members)
                            <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                Ajouter un nouveau
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
                            {{-- {{dd($tontine,$tontine->participation,$tontine->number_of_members)}} --}}
                            @foreach ($tontine->participation as $participation)
                                <tr>
                                    <td>{{ $participation->user->last_name . ' ' . $participation->user->first_name }}</td>
                                    <td>{{ $tontine->participation->count() }}/{{ $tontine->number_of_members }}</td>
                                    <td>1</td>
                                    <td>5/10</td>
                                </tr>
                            @endforeach
                            </tfoot>
                    </table>
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
                    <form method="POST" enctype="multipart/form-data" action="{{route('user.store')}}">
                      @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom:</label>
                                    <input type="text" class="form-control" name="last_name" id="exampleInputEmail1"
                                        placeholder="Entrer un prenom">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Prenom (s) :</label>
                                    <input type="text" class="form-control" name="first_name" id="exampleInputPassword1"
                                        placeholder="Entrer un prenom">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputFile1"> CNIB Recto
                                    </label>
                                    <input class="form-control" type="file" name="identity_document_front"
                                        id="exampleInputFile1">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputFile1"> CNIB Verso</label>
                                    <input class="form-control" type="file" name="identity_document_back"
                                        id="exampleInputFile1">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Téléphone</label>
                                    <input type="email" name="phone_number" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    <div class="modal-footer justify-content-between">
                        <button type="reset" class="btn btn-default">Annuler</button>
                        <button type="button" class="btn btn-success">Enregistré</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endsection
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
