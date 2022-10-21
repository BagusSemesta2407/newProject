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

@section('script')
    <script type="text/javascript">
        $("#mytable").dataTable();


        @if (session('success'))
            iziToast.success({
                message: "{{ session('success') }}",
                position: 'topRight'
            });
        @endif ()


        $(document).on('click', '.delete', function() {
            let url = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            Swal.fire({
                    title: 'Hapus?',
                    text: "Setelah dihapus, tidak akan bisa dibatalkan!",
                    icon: 'error',
                    showCancelButton: true
                })
                .then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        $(this).parent('div').parent('div').parent('td').parent('tr').remove();
                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            dataType: 'json',
                            success: function(data) {
                                Swal.fire('Deleted!', 'Data Berhasil Dihapus!', 'success')
                                    .then(
                                        function() {
                                            location.reload();
                                        })
                            },
                            error: function(data) {
                                console.log('Error :' + data);
                            }
                        })
                    }
                });

        })
    </script>
@endsection