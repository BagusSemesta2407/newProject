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
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $item->kode_kategori }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('kategori.edit', $item->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger delete"
                                        value="{{ route('kategori.destroy', $item->id) }}"
                                        title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
