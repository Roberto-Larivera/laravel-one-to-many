@extends('layouts.admin')
@section('head-title', 'Projects | ')
@section('content')
    <div class="container-fluid mt-4">
        <div class="row mb-5">
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
        @include('admin.projects.partials.warning')
        @include('admin.projects.partials.success')
        @include('admin.projects.partials.errors')
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-info">n°</th>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Name Repo</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $index => $project)
                            <tr>
                                <th scope="row" class="text-info">{{ $index + 1 }}</th>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->title }}</td>
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
