@extends('layout')
@section('title', 'Tontine')
@section('content')
    <div class="container">
        <!-- Widget: user widget style 2 -->
        <div class="row">
            <div class="col-12">
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-secondary">
                        <!-- /.widget-user-image -->
                        <h2 class="widget-user-username">Tontine de 5000fr</h2>
                        <h5 class="widget-user-desc">Débuté le 10/09/2023</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link text-secondary">
                                    Participants <span class="float-right badge bg-primary">10</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-secondary">
                                    Cotisation <span class="float-right badge bg-info">5000 FCFA</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-secondary">
                                    Bénéfice <span class="float-right badge bg-success"> 2000 FCFA</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-secondary">
                                    Adhérants <span class="float-right badge bg-danger">10/10</span>
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
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            Ajouter un nouveau
                          </button>
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
                            <tr>
                                <td>SO kevin</td>
                                <td>2</td>
                                <td>1</td>
                                <td>5/10</td>
                            </tr>
                            <tr>
                                <td>elisimpore</td>
                                <td>2</td>
                                <td>9</td>
                                <td>2/10</td>
                            </tr>
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
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection