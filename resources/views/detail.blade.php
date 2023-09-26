@extends('layout')
@section('title', 'Tontine')
@section('content')

<div class="container">
        <!-- Widget: user widget style 2 -->
        <div class="row">
            <div class="col-12">
                <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-warning">
                    <!-- /.widget-user-image -->
                    <h2 class="widget-user-username">Tontine Pagne</h2>
                    <h5 class="widget-user-desc">Débuté le 10/09/2023</h5>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        Participants <span class="float-right badge bg-primary">10</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        Cotisation <span class="float-right badge bg-info">5000 FCFA</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        Bénéfice <span class="float-right badge bg-success"> 2000 FCFA</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        Followers <span class="float-right badge bg-danger">842</span>
                        </a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <!-- /.widget-user -->
          <div class="row">
            <div class="col-12">
                    <h2 class="alert alert-warning">Liste des participants </h2>
                <div class="card-body">
                  <table id="example1" class="table table-bordered">
                    <thead>
                    <tr>
                      <th>Rang</th>
                      <th>Bras</th>
                      <th>Participants</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>2</td>
                      <td>jonasdev</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>1</td>
                      <td>elisimpore</td>
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

@endsection
