
@extends('layouts.mainAdmin')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>
                    @if (@$project->exists)
                        Edit
                        @php
                            $aksi = 'Edit';
                        @endphp
                    @else
                        Tambah
                        @php
                            $aksi = 'Tambah';
                        @endphp
                    @endif
                    Data Kategori Project
                </h1>
            </div>


            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (@$project->exists)
                                <form id="modalForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                                    action="{{ route('project.update', $kategoriBerita) }}">
                                    @method('put')
                                @else
                                    <form id="modalForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                                        action="{{ route('kategori.store') }}">
                            @endif
                            @csrf

                            <div class="card-header">
                                <h4>Data Kategori Berita</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kode_kategori" class="col-sm-3 col-form-label">Kode Kategori <sup
                                            class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="kode_kategori" name="kode_kategori"
                                            placeholder="Kode Kategori" required
                                            value="{{ old('kode_kategori', @$project->kategori) }}">
                                        @if ($errors->has('kode_kategori'))
                                            <span class="text-danger">{{ $errors->first('kode_kategori') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <label for="name" class="col-sm-3 col-form-label">Kategori <sup
                                            class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Kategori Berita " required
                                            value="{{ old('name', @$kategoriBerita->kategori) }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-12 ">
                                        <a href="{{ route('project.index') }}" class="btn btn-light mr-2">
                                            Kembali</a>
                                        <button type="submit" class="btn btn-primary"> {{ $aksi }}</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.textarea').summernote({
                dialogsInBody: true,
                minHeight: 250,
            });

        });
    </script>
@endsection

