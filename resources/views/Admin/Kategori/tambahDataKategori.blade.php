
@extends('layouts.mainAdmin')

@section('content')
    
    
<div class="card mt-4">
    <div class="card-header">
      <h2>Kategori Project</h2>
    </div>
    <div class="card-body">
        <form method="post" action="/project">
            <div class="mb-3">
                <label for="name" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="name" placeholder="Kategori Project">
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-sm-12 ">
                    <a href="{{ route('project.index') }}" class="btn btn-light mr-2">
                        Kembali</a>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
