@extends('layout')
@section('title', '')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Liste de mes participants</h2>
            </div>
            <div class="col-sm-6 col-md-4 text-right">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Ajouter un nouveau
                </button>
            </div>

        </div>
        <div class="row mt-3">
            <!-- Profile Image -->
            @forelse ($users as $user)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card card-primary text-start card-outline">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="profile-username"> {{ $user->last_name . ' ' . $user->first_name }} </h3>
                                <p class="text-muted">Tel: {{ $user->phone_number }}</p>
                            </div>
                            <div class="text">
                                <a href="#" class="btn btn-primary"><b>Voir</b></a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            @empty
                <h2 class="text-center text-warning">Aucun utilisateur (s)</h2>
            @endforelse
            <!-- /.card -->
        </div>
    </div>
    <!-- Vérifiez s'il y a un message SweetAlert dans la session -->

    @include('user.create')
@endsection

@section('script')
    {{-- @if (session('sweet_alert'))
        <script>
            Swal.fire({
                icon: '{{ session('sweet_alert.icon') }}',
                title: '{{ session('sweet_alert.title') }}',
                text: '{{ session('sweet_alert.text') }}',
            });
        </script>
    @endif --}}
@endsection
