@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card shadow p-3 mb-5 rounded border">
        <h5 class="card-header">Table {{$title}}</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Section</th>
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
                                {{$item->mentorVokasi->grupLeader->sectionHead->nama_section_head}} -
                                {{$item->mentorVokasi->grupLeader->sectionHead->section->section}}
                            </td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal{{$item->id}}">
                                        <i class='bx bx-detail'></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{$item->id}}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Nama
                                                                    Mahasiswa</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="nama_mahasiswa"
                                                                    value="{{$item->nama_mahasiswa}}" readonly>
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
                                                                    value="{{$item->batch_vokasi}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Nama Mentor</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="nama_mentor"
                                                                    value="{{$item->mentorVokasi->nama_mentor_vokasi}}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Shop</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="shop"
                                                                    value="{{$item->shop}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Divisi</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="divisi"
                                                                    value="{{$item->divisi}}" readonly>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Line</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="line"
                                                                    value="{{$item->line}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Pos/Proses</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="pos"
                                                                    value="{{$item->pos}}" readonly>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Shift</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="shift"
                                                                    value="{{$item->shift}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Dosen
                                                                    Pembimbing</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="batch_vokasi"
                                                                    value="{{$item->dosenPembimbing->nama_dosen}}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Section</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1" name="batch_vokasi"
                                                                    value="{{$item->mentorVokasi->grupLeader->sectionHead->nama_section_head}} - {{$item->mentorVokasi->grupLeader->sectionHead->section->section}}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Departement</label>
                                                            <input type="text" class="form-control text-center"
                                                                id="exampleFormControlInput1" name="batch_vokasi"
                                                                value="{{$item->mentorVokasi->grupLeader->sectionHead->departementHead->nama_departement_head}} -{{$item->mentorVokasi->grupLeader->sectionHead->departementHead->departement->departement}} - {{$item->mentorVokasi->grupLeader->sectionHead->departementHead->lokasi}}"
                                                                readonly>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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