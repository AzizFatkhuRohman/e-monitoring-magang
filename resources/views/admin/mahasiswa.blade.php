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
                                            <label for="exampleFormControlInput1" class="form-label">Nama
                                                Mahasiswa</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="nama_mahasiswa">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Nomor Induk
                                                Mahasiswa</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                                name="nomor_induk_mahasiswa">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">No Registrasi
                                                Vokasi</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="no_registrasi_vokasi">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Batch
                                                Vokasi</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                                name="batch_vokasi">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Nama Mentor</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="nama_mentor">
                                                @foreach ($mentor as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->nama_mentor_vokasi}}
                                                    - {{$item->grupLeader->nama_grup_leader}} -
                                                    {{$item->grupLeader->sectionHead->section->section}}-
                                                    {{$item->grupLeader->sectionHead->nama_section_head}}-{{$item->grupLeader->sectionHead->departementHead->departement->departement}}
                                                    -
                                                    {{$item->grupLeader->sectionHead->departementHead->nama_departement_head}}
                                                    - {{$item->grupLeader->sectionHead->departementHead->lokasi}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Shop</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="shop">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Divisi</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="divisi">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Line</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="line">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Pos/Proses</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="pos">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Shift</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="shift">
                                                <option value="Red">Red</option>
                                                <option value="White">White</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="exampleFormControlInput1" class="form-label">Dosen
                                            Pembimbing</label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="dosen_pembimbing">
                                            @foreach ($dosen as $item)
                                            <option value="{{$item->id}}">{{$item->nama_dosen}} -
                                                {{$item->nomor_induk_pegawai}}</option>
                                            @endforeach
                                        </select>
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
                            <td>{{$item->nama_mahasiswa}} - {{$item->nomor_induk_mahasiswa}}</td>
                            <td>
                                {{$item->mentorVokasi->grupLeader->sectionHead->departementHead->departement->departement}}
                                {{$item->mentorVokasi->grupLeader->sectionHead->departementHead->lokasi}}
                            </td>
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
                                                    <form action="{{url('admin/mahasiswa/'.$item->id)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Nama
                                                                    Mahasiswa</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="nama_mahasiswa"
                                                                    value="{{$item->nama_mahasiswa}}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Nomor Induk
                                                                    Mahasiswa</label>
                                                                <input type="number" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    name="nomor_induk_mahasiswa"
                                                                    value="{{$item->nomor_induk_mahasiswa}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">No Registrasi
                                                                    Vokasi</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    name="no_registrasi_vokasi"
                                                                    value="{{$item->no_registrasi_vokasi}}" readonly>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Batch
                                                                    Vokasi</label>
                                                                <input type="number" class="form-control"
                                                                    id="exampleFormControlInput1" name="batch_vokasi"
                                                                    value="{{$item->batch_vokasi}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Nama Mentor</label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="nama_mentor">
                                                                    <option value="{{$item->mentor_vokasi_id}}">
                                                                        {{$item->mentorVokasi->nama_mentor_vokasi}} -
                                                                        {{$item->mentorVokasi->grupLeader->nama_grup_leader}}
                                                                        -
                                                                        {{$item->mentorVokasi->grupLeader->sectionHead->section->section}}
                                                                        -
                                                                        {{$item->mentorVokasi->grupLeader->sectionHead->nama_section_head}}
                                                                        -
                                                                        {{$item->mentorVokasi->grupLeader->sectionHead->departementHead->departement->departement}}
                                                                        -
                                                                        {{$item->mentorVokasi->grupLeader->sectionHead->departementHead->nama_departement_head}}
                                                                        -
                                                                        {{$item->mentorVokasi->grupLeader->sectionHead->departementHead->lokasi}}
                                                                    </option>
                                                                    @foreach ($mentor as $m)
                                                                    <option value="{{$m->id}}">
                                                                        {{$m->nama_mentor_vokasi}}
                                                                        - {{$m->grupLeader->nama_grup_leader}} -
                                                                        {{$m->grupLeader->sectionHead->section->section}}-
                                                                        {{$m->grupLeader->sectionHead->nama_section_head}}-{{$m->grupLeader->sectionHead->departementHead->departement->departement}}
                                                                        -
                                                                        {{$m->grupLeader->sectionHead->departementHead->nama_departement_head}}
                                                                        -
                                                                        {{$m->grupLeader->sectionHead->departementHead->lokasi}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Shop</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="shop"
                                                                    value="{{$item->shop}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Divisi</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="divisi"
                                                                    value="{{$item->divisi}}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Line</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="line"
                                                                    value="{{$item->line}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Pos/Proses</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="pos"
                                                                    value="{{$item->pos}}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Shift</label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example" name="shift">
                                                                    <option value="{{$item->shift}}">{{$item->shift}}
                                                                    </option>
                                                                    <option value="Red">Red</option>
                                                                    <option value="White">White</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Dosen
                                                                Pembimbing</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example"
                                                                name="dosen_pembimbing">
                                                                <option value="{{$item->dosen_pembimbing_id}}">
                                                                    {{$item->dosenPembimbing->nama_dosen}}</option>
                                                                @foreach ($dosen as $d)
                                                                <option value="{{$d->id}}">{{$d->nama_dosen}} -
                                                                    {{$d->nomor_induk_pegawai}}</option>
                                                                @endforeach
                                                            </select>
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
@endsection