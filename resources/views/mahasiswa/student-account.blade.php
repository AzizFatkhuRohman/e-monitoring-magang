@extends('layouts.app')
@section('main')
<div class="container-xxl">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Basic with Icons</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Change Password
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('student-account/change-password/')}}" method="post">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Password</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class='bx bx-key'></i></span>
                                        <input type="password" id="basic-icon-default-company" class="form-control"
                                            name="password" aria-label="ACME Inc."
                                            aria-describedby="basic-icon-default-company2" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Password
                                        Confirmation</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class='bx bx-key'></i></span>
                                        <input type="password" id="basic-icon-default-company" class="form-control"
                                            name="password_confirmation" aria-label="ACME Inc."
                                            aria-describedby="basic-icon-default-company2" />
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class='bx bxs-save'></i></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{url('student-account/update/')}}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">ID Student (NIM)</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                class="bx bx-buildings"></i></span>
                        <input type="text" id="basic-icon-default-company" class="form-control" placeholder="432570750"
                            aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                        <input type="email" id="basic-icon-default-email" class="form-control"
                            placeholder="yourname@mail.com" name="email" aria-label="john.doe"
                            aria-describedby="basic-icon-default-email2" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class='bx bxs-save'></i></button>
            </form>
        </div>
    </div>
</div>
@endsection