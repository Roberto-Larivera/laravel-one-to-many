@extends('layouts.admin')
@section('head-title', 'Types | ')
@section('content')
    <div class="container-fluid mt-4">
        <div class="row mb-5">
            <div class="col">
                <h1>
                    Tutte le Tipologie
                </h1>
                <a href="{{ route('admin.types.create') }}" class="btn btn-outline-primary">
                    Aggiungi Tipologia
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        </div>
        @include('admin.types.partials.warning')
        @include('admin.types.partials.success')
        @include('admin.types.partials.errors')
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-info">N°</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">?</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $index => $type)
                            <tr>
                                <th scope="row" class="text-info">{{ $index + 1 }}</th>
                                <td>{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td>?</td>
                                <td>
                                    <a href="{{ route('admin.types.show', $type->id) }}"
                                        class="btn btn-outline-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.types.edit', $type->id) }}"
                                        class="btn btn-outline-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    {{-- @include('admin.types.partials.delete') --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
