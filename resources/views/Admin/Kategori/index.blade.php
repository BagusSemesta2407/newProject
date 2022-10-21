@extends('layouts.mainAdmin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h2>Kategori Project</h2>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between w-100">
                <h4>Tambah Kategori Project</h4>
                <a href="{{ route('kategori.create') }}" class="btn btn-outline-success btn-lg d-flex align-items-center ">
                    <i class="fa fa-plus pr-2"></i>
                    Tambah
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Kategori</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $item->kode_kategori }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', $item->id) }}"
                                        class="btn btn-info bi bi-pen">
                                    </a>
                                    <form action="/kategori/{{ $item->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-warning bi bi-trash3 border-0"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
