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
                                        <select class="form-select" aria-label="Default select example">
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