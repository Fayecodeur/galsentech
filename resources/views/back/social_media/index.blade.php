@extends('back.app')

@section('title', 'Réseaux sociaux')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Réseaux sociaux</h4>
                <a href="{{ route('social.create') }}" class="btn btn-primary float-right veiwbutton">
                    Ajouter un réseau social
                </a>
            </div>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <div class="table-responsive">
                        <table class="datatable table table-striped table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>ID Media</th>
                                <th>Icône</th>
                                <th>Nom</th>
                                <th>Lien</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($socials as $social)
                                <tr>
                                    <td>LIEN-{{ $social->id }}</td>
                                    <td><i class="{{ $social->icon }}"></i></td>
                                    <td>{{ $social->name }}</td>
                                    <td>
                                        <a href="{{ $social->link }}" target="_blank">
                                            {{ $social->link }}
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v ellipse_color"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('social.edit',$social)}}">
                                                    <i class="fas fa-pencil-alt m-r-5"></i> Modifier
                                                </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset">
                                                    <form method="POST" action="{{route('social.destroy', $social)}}">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button style="border: none; background: none; padding: 0; cursor: pointer;">
                                                            <i class="fas fa-trash-alt m-r-5"></i> Supprimer
                                                        </button>


                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
