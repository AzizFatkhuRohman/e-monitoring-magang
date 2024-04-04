@extends('layouts.app')
@section('main')
<div class="container-xxl">
    <h4 class="fw-bold py-3">{{$title}}</h4>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h5><i>Data Logbook</i></h5>
            </div>
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class='bx bx-plus'></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Logbook</h1>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    @method('POST')
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Tools Used</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="tools_used">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Safety
                                                Point</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="safety_point">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Problem Solf/Kaizen
                                                Point</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="problem_solf_kaizen_point">
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Hyarihatto</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                name="hyarihatto">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                                            name="description"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Cancle</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#staticBack">
                    <i class='bx bxs-download'></i>
                </button>
                <div class="modal fade" id="staticBack" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Download Logbook</h1>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('download-logbook')}}" method="post">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Download by</option>
                                        <option value="All">All</option>
                                        <option value="This Month">This Month</option>
                                        <option value="This Week">This Week</option>
                                        <option value="Today">Today</option>
                                    </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Cancle</button>
                                <button type="submit" class="btn btn-primary">Download</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover" id="table">
                    <thead class="table-primary">
                        <tr>
                            <th>Date</th>
                            <th>Tools</th>
                            <th>Safety</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
                            <td>Barry Hunter</td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                        <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                        <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="Christina Parker">
                                        <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <span class="badge bg-label-success me-1">Reviewed</span>
                                <span class="badge bg-label-warning me-1">Pending</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class='bx bxs-detail'></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">View</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Tools Used</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1" name="tools_used">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Safety Point</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1" name="safety_point">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Problem Solf/Kaizen Point</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1"
                                                                name="problem_solf_kaizen_point">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Hyarihatto</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1" name="hyarihatto">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label">Description</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3" name="description"></textarea>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label">Point To Remember</label>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input class="form-control" type="text" value="1.Poor"
                                                                    readonly>
                                                            </div>
                                                            <div class="col-9">
                                                                <textarea class="form-control"
                                                                    id="exampleFormControlTextarea1" rows="1"
                                                                    name="point_to_remember"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label">Mentor Comments</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3" name="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{url('logbook/delete/')}}" method="post" id="delLog">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="button" onclick="funcDelLog()">
                                            <i class='bx bxs-trash'></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    new DataTable('#table')
</script>
@endsection