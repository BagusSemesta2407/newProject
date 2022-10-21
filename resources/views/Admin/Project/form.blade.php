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
                            $url_foto = asset('foto/' . $project->image);
                            $aksi = 'Edit';
                        @endphp
                    @else
                        Tambah
                        @php
                            $aksi = 'Tambah';
                        @endphp
                    @endif
                    Data project
                </h1>
            </div>


            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (@$project->exists)
                                <form id="modalForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                                    action="{{ route('project.update', $project) }}">
                                    @method('put')
                                @else
                                    <form id="modalForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                                        action="{{ route('project.store') }}">
                            @endif

                            {{ csrf_field() }}
                            <div class="card-header">
                                <h4>Data project</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">
                                        Kategori project <sup class="text-danger">*</sup>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select name="kategori_id"
                                                class="form-control @error('kategori_id') is-invalid @enderror">
                                                <option value="" selected="" disabled="">Pilih Kategori Project
                                                </option>
                                                @foreach ($kategoris as $kat)
                                                    <option value="{{ $kat->id }}"
                                                        {{ old('kategori_id', @$project->kategori_id) == $kat->id ? 'selected' : '' }}>
                                                        {{ $kat->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('kategori_id')
                                            <span class="text-danger">{{ $errors->first('kategori_id') }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <label for="name" class="col-sm-3 col-form-label">Nama project <sup
                                            class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nama project " value="{{ old('name', @$project->name) }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="file" class="col-sm-3 col-form-label">Gambar project <sup
                                            class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="file" class="dropify" name='file' data-height='250'
                                            data-default-file="{{ @$url_foto }}"
                                            @if (@!$project->exists)  @endif>
                                        @if ($errors->has('file'))
                                            <span class="text-danger">{{ $errors->first('file') }}</span>
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
