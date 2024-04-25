@extends('layouts.app')
@section('main')
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
                                        <label for="exampleFormControlInput1" class="form-label">Nama Mahasiswa</label>
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
                                        <label for="exampleFormControlInput1" class="form-label">Batch Vokasi</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="batch_vokasi">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Mentor</label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="nama_mentor">
                                            <option value="TOPKR">TOPKR</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Shop</label>
                                        <select class="form-select" aria-label="Default select example" name="shop">
                                            <option value="TOPKR">TOPKR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Divisi</label>
                                        <select class="form-select" aria-label="Default select example" name="divisi">
                                            <option value="TOPKR">TOPKR</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Line</label>
                                        <select class="form-select" aria-label="Default select example" name="line">
                                            <option value="TOPKR">TOPKR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Pos/Proses</label>
                                        <select class="form-select" aria-label="Default select example" name="pos">
                                            <option value="TOPKR">TOPKR</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Shift</label>
                                        <select class="form-select" aria-label="Default select example" name="shift">
                                            <option value="Red">Red</option>
                                            <option value="White">White</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Dosen Pembimbing</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="dosen_pembimbing">
                                        <option value="Red">Red</option>
                                        <option value="White">White</option>
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
        <table class="table table-hover table-bordered border-primary" id="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection