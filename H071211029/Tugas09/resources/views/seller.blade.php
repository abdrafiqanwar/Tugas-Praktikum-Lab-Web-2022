@extends('layout.main')

@section('nav')
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/index">
            <span data-feather="home"></span>
            Pivot
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/product">
            <span data-feather="file"></span>
            Product
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/category">
            <span data-feather="shopping-cart"></span>
            Category
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/seller">
            <span data-feather="users"></span>
            Seller
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/permission">
            <span data-feather="bar-chart-2"></span>
            Permission
          </a>
        </li>
      </ul>

    </div>
  </nav>
  @endsection

  @section('data')
  @if(session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
  <a href="/viewseller" type="button" class="btn btn-success">Tambah +</a>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No. HP</th>
                <th scope="col">Status</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Diupdate</th>
                <th scope="col">Action</th>
                <th scope="col">Permission</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ Str::lower($row->nama) }}</td>
                  <td>{{ $row->address }}</td>
                  <td>{{ $row->gender }}</td>
                  <td>{{ $row->no_hp }}</td>
                  <td>{{ $row->status }}</td>
                  <td>{{ $row->created_at->format('D-M-Y') }}</td>
                  <td>{{ $row->updated_at->format('D-M-Y') }}</td>
                  <td>
                    <a href="/editseller/{{ $row->id }}" class="btn btn-warning">Edit</a>
                    <a href="/deleteseller/{{ $row->id }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                  </td>
                    <td>
                      @foreach($row->permission as $item)
                        -   {{ $item->nama }} <br>
                      @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    @endsection