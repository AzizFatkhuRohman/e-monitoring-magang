@extends('layouts.app')
@section('main')
<div class="container-xxl">
    <h4 class="fw-bold py-3">{{$title}}</h4>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"><i>Monthly Performance</i></h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleMonthly">
                            <i class='bx bxs-spreadsheet'></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleMonthly" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered table-hover">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Tools</th>
                                                        <th>Safety</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                                            <strong>React
                                                                Project</strong>
                                                        </td>
                                                        <td>Barry Hunter</td>
                                                        <td>
                                                            <ul
                                                                class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-bs-placement="top"
                                                                    class="avatar avatar-xs pull-up"
                                                                    title="Lilian Fuller">
                                                                    <img src="../assets/img/avatars/5.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </li>
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-bs-placement="top"
                                                                    class="avatar avatar-xs pull-up"
                                                                    title="Sophia Wilkerson">
                                                                    <img src="../assets/img/avatars/6.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </li>
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-bs-placement="top"
                                                                    class="avatar avatar-xs pull-up"
                                                                    title="Christina Parker">
                                                                    <img src="../assets/img/avatars/7.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-label-success me-1">Reviewed</span>
                                                            <span class="badge bg-label-warning me-1">Pending</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="MonthlyChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"><i>Four Months Of Performance</i></h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleFour">
                            <i class='bx bxs-spreadsheet'></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleFour" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered table-hover">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Tools</th>
                                                        <th>Safety</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                                            <strong>React
                                                                Project</strong>
                                                        </td>
                                                        <td>Barry Hunter</td>
                                                        <td>
                                                            <ul
                                                                class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-bs-placement="top"
                                                                    class="avatar avatar-xs pull-up"
                                                                    title="Lilian Fuller">
                                                                    <img src="../assets/img/avatars/5.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </li>
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-bs-placement="top"
                                                                    class="avatar avatar-xs pull-up"
                                                                    title="Sophia Wilkerson">
                                                                    <img src="../assets/img/avatars/6.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </li>
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-bs-placement="top"
                                                                    class="avatar avatar-xs pull-up"
                                                                    title="Christina Parker">
                                                                    <img src="../assets/img/avatars/7.png" alt="Avatar"
                                                                        class="rounded-circle" />
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-label-success me-1">Reviewed</span>
                                                            <span class="badge bg-label-warning me-1">Pending</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="FourMonthChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const Monthly = document.getElementById('MonthlyChart');
    new Chart(Monthly, {
      type: 'bar',
      data: {
        labels: ['January', 
                'February', 
                'March', 
                'April', 
                'May', 
                'June', 
                'July', 
                'August', 
                'September', 
                'October', 
                'November', 
                'December'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3,7,5,6,9,11,3],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>
<script>
    const Four = document.getElementById('FourMonthChart');
    new Chart(Four, {
      type: 'bar',
      data: {
        labels: ['First cycle', 'Second cycle', 'Last cycle'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>
@endsection