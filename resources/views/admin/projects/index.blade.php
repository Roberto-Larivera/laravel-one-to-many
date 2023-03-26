@extends('layouts.admin')
@section('head-title', 'Projects | ')
@section('content')
    <div class="container-fluid mt-4">

        <div class="row mb-4">
            <div class="col">
                <h1>
                    Tutti i Progetti
                </h1>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-primary">
                    Aggiungi Progetto
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
            
        </div>
        <div class="row mb-5">
            <div class="col-auto">
                <form action="{{ route('admin.projects.index') }}" method="get">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <button type="submit" class="btn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </span>
                        <input type="search" class="form-control" name="text" value="{{ request('text') }}" placeholder="Cerca: Progetto...">
                      </div>
                </form>
            </div>
        </div>
        @include('admin.partials.errors')
        @include('admin.partials.success')
        @include('admin.partials.warning')
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-info">N°</th>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Nome Repo</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $index => $project)
                            <tr>
                                <th scope="row" class="text-info">{{ $index + 1 }}</th>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->type->name?? 'Nessuna Tipologia' }}</td>
                                <td>{{ $project->name_repo }}</td>
                                <td>
                                    <a href="{{ route('admin.projects.show', $project->id) }}"
                                        class="btn btn-outline-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}"
                                        class="btn btn-outline-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    @include('admin.projects.partials.delete')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
