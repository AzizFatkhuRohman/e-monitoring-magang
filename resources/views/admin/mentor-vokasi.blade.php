@extends('layouts.app')
@section('main')
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
<div class="card border border-primary">
    <div class="card-header d-flex justify-content-between">
        <h5>Data {{$title}}</h5>
        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ImportModal">
                <i class="ti ti-files"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="ImportModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <i class="ti ti-plus"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Mentor</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="nama_mentor">
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Alamat email</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            name="alamat_email_mentor">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="no_telp_mentor">
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Grup
                                            Leader</label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="nama_grup_leader">
                                            @foreach ($data_grup_leader as $item)
                                            <option value="{{$item->id}}">{{$item->nama_grup_leader}} -
                                                {{$item->sectionHead->section->section}} -
                                                {{$item->sectionHead->nama_section_head}} -
                                                {{$item->sectionHead->departementHead->departement->departement}} -
                                                {{$item->sectionHead->departementHead->nama_departement_head}} -
                                                {{$item->sectionHead->departementHead->lokasi}}</option>
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
    <div class="card-body table-responsive">
        <table class="table table-hover table-bordered border-primary" id="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Grup Leader</th>
                    <th scope="col">Section</th>
                    <th scope="col">Departement</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$item->nama_mentor_vokasi}}</td>
                    <td>{{$item->grupLeader->nama_grup_leader}}</td>
                    <td>{{$item->grupLeader->sectionHead->section->section}} -
                        {{$item->grupLeader->sectionHead->nama_section_head}}</td>
                    <td>{{$item->grupLeader->sectionHead->departementHead->departement->departement}} -
                        {{$item->grupLeader->sectionHead->departementHead->nama_departement_head}} -
                        {{$item->grupLeader->sectionHead->departementHead->lokasi}}</td>
                    <td>
                        <div class="d-flex">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal{{$item->id}}">
                                <i class="ti ti-pencil"></i>
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
                                            <form action="{{url('admin/mentor-vokasi/'.$item->id)}}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="exampleFormControlInput1" class="form-label">Nama
                                                            Mentor</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleFormControlInput1" name="nama_mentor"
                                                            value="{{$item->nama_mentor_vokasi}}">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="exampleFormControlInput1" class="form-label">Alamat
                                                            email</label>
                                                        <input type="email" class="form-control"
                                                            id="exampleFormControlInput1" name="alamat_email_mentor"
                                                            value="{{$item->alamat_email_mentor}}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="exampleFormControlInput1" class="form-label">No
                                                            Telp</label>
                                                        <input type="number" class="form-control"
                                                            id="exampleFormControlInput1" name="no_telp_mentor"
                                                            value="{{$item->no_telp_mentor}}">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="exampleFormControlInput1" class="form-label">Nama
                                                            Grup
                                                            Leader</label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="nama_grup_leader">
                                                            <option value="{{$item->grup_leader_id}}">
                                                                {{$item->grupLeader->nama_grup_leader}} -
                                                                {{$item->grupLeader->sectionHead->section->section}} -
                                                                {{$item->grupLeader->sectionHead->nama_section_head}} -
                                                                {{$item->grupLeader->sectionHead->departementHead->departement->departement}}
                                                                -
                                                                {{$item->grupLeader->sectionHead->departementHead->nama_departement_head}}
                                                                -
                                                                {{$item->grupLeader->sectionHead->departementHead->lokasi}}
                                                            </option>
                                                            @foreach ($data_grup_leader as $i)
                                                            <option value="{{$i->id}}">{{$i->nama_grup_leader}} -
                                                                {{$i->sectionHead->section->section}} -
                                                                {{$i->sectionHead->nama_section_head}} -
                                                                {{$i->sectionHead->departementHead->departement->departement}}
                                                                -
                                                                {{$i->sectionHead->departementHead->nama_departement_head}}
                                                                -
                                                                {{$i->sectionHead->departementHead->lokasi}}</option>
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
                            <form action="{{url('admin/mentor-vokasi/'.$item->id)}}" method="post" id="DelMen">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" type="button" onclick="clickMen()" style="margin-left: 2px"><i class="ti ti-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function clickMen() {
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
              document.getElementById('DelMen').submit();
          }
      });
      
  }
</script>
@endsection