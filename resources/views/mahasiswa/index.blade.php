@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3">{{$title}}</h4>
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang Mahasiswa! 🎉</h5>
                            <p class="mb-4">
                                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                                your profile.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Total Logbook</span>
                            <h3 class="card-title mb-2">18</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Logbook Review</span>
                            <h3 class="card-title text-nowrap mb-1">4</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="padding-right:3px; padding-left:3px; padding-bottom:3px">
        <h5 class="card-header">Logbook Recent</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-hover">
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
                                                        <label for="exampleFormControlInput1" class="form-label">Tools
                                                            Used</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleFormControlInput1" name="tools_used">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="exampleFormControlInput1" class="form-label">Safety
                                                            Point</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleFormControlInput1" name="safety_point">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="exampleFormControlInput1" class="form-label">Problem
                                                            Solf/Kaizen Point</label>
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
                                                    <label for="exampleFormControlTextarea1" class="form-label">Point To
                                                        Remember</label>
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
                                                    <label for="exampleFormControlTextarea1" class="form-label">Mentor
                                                        Comments</label>
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
<!-- / Content -->
@endsection