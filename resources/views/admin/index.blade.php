@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                        </div>
                    </div>
                    <span class="d-block mb-1">Mahasiswa</span>
                    <h3 class="card-title text-nowrap mb-2">$2,453</h3>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                        </div>

                    </div>
                    <span class="fw-semibold d-block mb-1">Mentor</span>
                    <h3 class="card-title mb-2">$14,857</h3>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                                class="rounded" />
                        </div>

                    </div>
                    <span class="fw-semibold d-block mb-1">Section Head</span>
                    <h3 class="card-title mb-2">$12,328</h3>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                        </div>

                    </div>
                    <span>Departement</span>
                    <h3 class="card-title text-nowrap mb-1">$4,379</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection