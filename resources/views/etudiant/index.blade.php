@extends('layouts.app');
@section('title', 'Liste etudiants')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <div class="display-5 mt-2">
                    {{ config('app.name') }}
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Liste étudiants
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse($etudiants as $etudiant)
                                <li><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->nom }}</a></li>

                                @empty
                                <li>Aucun étudiant sélectionné</li>
                            @endforelse
                        </ul>
                    </div>
                </div class="card-footer">
                <?php

                    // <a href="{{ route('etudiant.create') }}" class="btn btn-success">
                    // </a>
                    ?>

            </div>
        </div>
    </div>
@endsection
