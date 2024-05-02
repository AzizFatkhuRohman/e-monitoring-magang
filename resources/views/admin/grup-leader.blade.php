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
                                            <label for="exampleFormControlInput1" class="form-label">Nama Grup
                                                Leader</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="nama_grup_leader">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Section
                                                Head</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="section_head">
                                                @foreach ($data_section_head as $i)
                                                <option value="{{$i->id}}">{{$i->nama_section_head}} -
                                                    {{$i->section->section}} -
                                                    {{$i->departementHead->departement->departement}} -
                                                    {{$i->departementHead->nama_departement_head}} -
                                                    {{$i->departementHead->lokasi}}</option>
                                                @endforeach
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
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Section</th>
                            <th scope="col">Departement</th>
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
                            <td>{{$item->nama_grup_leader}}</td>
                            <td>{{$item->sectionHead->section->section}} - {{$item->sectionHead->nama_section_head}}
                            </td>
                            <td>{{$item->sectionHead->departementHead->departement->departement}} -
                                {{$item->sectionHead->departementHead->lokasi}}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal{{$item->id}}">
                                        <i class='bx bx-edit'></i>
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
                                                    <form action="{{url('admin/grup-leader/'.$item->id)}}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Nama
                                                                    Grup
                                                                    Leader</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    name="nama_grup_leader"
                                                                    value="{{$item->nama_grup_leader}}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Section
                                                                    Head</label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="section_head">
                                                                    <option value="{{$item->section_head_id}}">
                                                                        {{$item->sectionHead->nama_section_head}} -
                                                                        {{$item->sectionHead->section->section}} -
                                                                        {{$item->sectionHead->departementHead->departement->departement}}
                                                                        -
                                                                        {{$item->sectionHead->departementHead->nama_departement_head}}
                                                                        -
                                                                        {{$item->sectionHead->departementHead->lokasi}}
                                                                    </option>
                                                                    @foreach ($data_section_head as $i)
                                                                    <option value="{{$i->id}}">{{$i->nama_section_head}}
                                                                        -
                                                                        {{$i->section->section}} -
                                                                        {{$i->departementHead->departement->departement}}
                                                                        -
                                                                        {{$i->departementHead->nama_departement_head}} -
                                                                        {{$i->departementHead->lokasi}}</option>
                                                                    @endforeach
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
                                    <form action="{{url('admin/grup-leader/'.$item->id)}}" method="post" id="delGrup">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-primary btn-sm" style="margin-left: 2px" type="button"
                                            onclick="clickGrup()"><i class='bx bx-trash'></i></button>
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
    function clickGrup() {
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
              document.getElementById('delGrup').submit();
          }
      });
      
  }
</script>
@endsection