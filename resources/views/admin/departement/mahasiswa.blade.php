@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('create'))
    <script>
        // Tampilkan pesan dengan SweetAlert
    Swal.fire({
        title: 'Success',
        text: '{{ session('create') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    </script>
    @endif
    @if(session('update'))
    <script>
        // Tampilkan pesan dengan SweetAlert
    Swal.fire({
        title: 'Update',
        text: '{{ session('update') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    </script>
    @endif
    @if(session('delete'))
    <script>
        // Tampilkan pesan dengan SweetAlert
    Swal.fire({
        title: 'Delete',
        text: '{{ session('delete') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    </script>
    @endif
    <div class="card shadow p-3 mb-5 rounded border">
        <div class="card-header d-flex justify-content-between">
            <h5>Table {{$title}}</h5>
            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ImportModal">
                    <i class='bx bx-import'></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="ImportModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload file</label>
                                        <input class="form-control" type="file" id="formFile">
                                        <div id="emailHelp" class="form-text">Format file wajib xls atau xlsx.
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class='bx bx-add-to-queue'></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Nama Department
                                                Head</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="nama_departement_head">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Nomor Induk
                                                Pegawai</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                                name="nomor_induk_pegawai">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">Departement</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="departement">
                                                    @foreach ($departement as $item)
                                                    <option value="{{$item->id}}">{{$item->departement}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="exampleFormControlInput1" class="form-label">Lokasi</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="lokasi">
                                                    <option value="Sunter#1">Sunter#1</option>
                                                    <option value="Karawang#1">Karawang#1</option>
                                                    <option value="Karawang#2">Karawang#2</option>
                                                    <option value="Karawang#3">Karawang#3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Section</th>
                            <th scope="col">Mentor</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$item->user->nama}}</td>
                            <td>{{$item->mentor->section->section}} | {{$item->mentor->section->user->nama}}</td>
                            <td>{{$item->mentor->user->nama}}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal{{$item->id}}">
                                        <i class='bx bxs-edit'></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{$item->id}}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('/admin/departement-head/'.$item->id)}}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Nama
                                                                    Department
                                                                    Head</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    name="nama_departement_head"
                                                                    value="{{$item->nama_departement_head}}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Nomor Induk Pegawai</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    name="nomor_induk_pegawai"
                                                                    value="{{$item->nomor_induk_pegawai}}" readonly>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label for="exampleFormControlInput1"
                                                                        class="form-label">Departement</label>
                                                                    <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        name="departement">
                                                                        <option value="{{$item->departement_id}}">
                                                                            {{$item->departement->departement}}</option>
                                                                        @foreach ($departement as $col)
                                                                        <option value="{{$col->id}}">
                                                                            {{$col->departement}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="exampleFormControlInput1"
                                                                        class="form-label">Lokasi</label>
                                                                    <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        name="lokasi">
                                                                        <option value="{{$item->lokasi}}">
                                                                            {{$item->lokasi}}
                                                                        </option>
                                                                        <option value="Sunter#1">Sunter#1</option>
                                                                        <option value="Karawang#1">Karawang#1</option>
                                                                        <option value="Karawang#2">Karawang#2</option>
                                                                        <option value="Karawang#3">Karawang#3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{url('/admin/departement-head/'.$item->id)}}" method="post"
                                        id="departement_head">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="ClickdHead()" style="margin-left: 2px"><i
                                                class='bx bx-trash'></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function ClickdHead() {
      Swal.fire({
          title: 'Konfirmasi',
          text: 'Apakah Anda yakin ingin menghapus ini?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('departement_head').submit();
          }
      });
      
  }
</script>
@endsection