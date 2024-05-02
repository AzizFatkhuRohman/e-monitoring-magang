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
                                            <label for="exampleFormControlInput1" class="form-label">Nama Dosen</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="nama_dosen">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Nomor Induk
                                                Pegawai</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                                name="nomor_induk_pegawai">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Gelar</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="gelar" placeholder="S.Kom,M.Msi">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Status</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="status">
                                                <option value="Aktif">Aktif</option>
                                                <option value="Non aktif">Non aktif</option>
                                            </select>
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
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered" id="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php
                    $no=1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$item->nama_dosen}}. {{$item->gelar}}</td>
                        <td>{{$item->nomor_induk_pegawai}}</td>
                        <td>
                            @if ($item->status == 'Aktif')
                            <button class="btn btn-primary btn-sm">
                                {{$item->status}}
                            </button>
                            @else
                            <button class="btn btn-warning btn-sm">
                                {{$item->status}}
                            </button>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#t{{$item->id}}">
                                    <i class='bx bx-edit'></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="t{{$item->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{url('admin/dosen-pembimbing/'.$item->id)}}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Nama
                                                                Dosen</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1" name="nama_dosen"
                                                                value="{{$item->nama_dosen}}">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Nomor
                                                                Induk
                                                                Pegawai</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1" name="nomor_induk_pegawai"
                                                                value="{{$item->nomor_induk_pegawai}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Gelar</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1" name="gelar"
                                                                value="{{$item->gelar}}">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Status</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="status">
                                                                @if ($item->status == 'Aktif')
                                                                <option value="Aktif">Aktif</option>
                                                                <option value="Non aktif">Non aktif</option>
                                                                @else

                                                                <option value="Non aktif">Non aktif</option>
                                                                <option value="Aktif">Aktif</option>
                                                                @endif
                                                            </select>
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
                                <form action="{{url('admin/dosen-pembimbing/'.$item->id)}}" method="post" id="hpsD">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-primary btn-sm" type="button"
                                        style="margin-left: 2px" onclick="btnD()"><i class='bx bx-trash'></i></button>
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
<script>
    function btnD() {
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
              document.getElementById('hpsD').submit();
          }
      });
      
  }
</script>
@endsection