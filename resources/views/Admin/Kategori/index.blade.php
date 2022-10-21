@extends('layouts.mainAdmin')

@section('content')

<div class="card mt-4">
  <div class="card-header">
    <h2>Kategori Project</h2>
  </div>
  <div class="card-body">
      <div class="d-flex justify-content-between w-100">
        <h4>Tambah Kategori Project</h4>
        <a href="{{ route('project.create') }}"
            class="btn btn-outline-success btn-lg d-flex align-items-center ">
            <i class="fa fa-plus pr-2"></i>
            Tambah
        </a>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kategori</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection