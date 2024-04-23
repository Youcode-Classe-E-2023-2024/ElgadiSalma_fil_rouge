@extends('Admin.adminLayout')
@section('adminContent')
    <!-- Main content -->
    <div class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="icon-briefcase"></i></span>
                    <div class="info-box-content"> <span class="info-box-number">{{ $data['totalUsers'] }}</span> <span
                            class="info-box-text">Total Users</span> </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-lg-3 col-xs-6">
                <div class="info-box"> <span class="info-box-icon bg-green"><i class="icon-pencil"></i></span>
                    <div class="info-box-content"> <span class="info-box-number">{{ $data['totalPharmacies'] }}</span> <span
                            class="info-box-text">Total Pharmacies</span></div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-lg-3 col-xs-6">
                <div class="info-box"> <span class="info-box-icon bg-yellow"><i class="icon-wallet"></i></span>
                    <div class="info-box-content"> <span class="info-box-number">{{ $data['totalMedicines'] }}</span> <span
                            class="info-box-text">Total Medicines</span></div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-lg-3 col-xs-6">
                <div class="info-box"> <span class="info-box-icon bg-red"><i class="icon-layers"></i></span>
                    <div class="info-box-content"> <span class="info-box-number">{{ $data['totalCategories'] }}</span> <span
                            class="info-box-text">Total Categories</span></div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row d-flex flex-wrap">
            <div class="d-flex w-100">
                <div class="col-lg-6">
                    <div class="info-box">
                        <div class="d-flex flex-wrap">
                            <div>
                                <h5 class="text-black">Yearly Earning</h5>
                            </div>
                        </div>
                        <canvas id="pharmaChart" class="w-100" height="150"></canvas>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-box">
                        <div class="d-flex flex-wrap">
                            <div>
                                <h5 class="text-black">Yearly Earning</h5>
                            </div>
                        </div>
                        <canvas id="medicineChart" class="w-100" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="w-100 m-3">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">
                        <h3 class="widget-user-username">PharmaStock</h3>
                        <h6 class="widget-user-desc">ElGadi Salma -> Founder &amp; CEO</h6>
                    </div>
                    <div class="widget-user-image"> <img class="img-circle"
                            src="{{ asset('storage/images/users/' . $me->photo) }}" alt="User Avatar"> </div>
                    <div class="box-footer">
                        <div class="text-center">
                            <p> A small river named Duden flows by their place and with the necessary.</p>
                            <a href="#" class="btn btn-facebook btn-rounded margin-bottom">Follow</a>
                        </div>
                        <div class="row margin-bottom">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $data['totalPharmacies'] }}</h5>
                                    <span class="description-text">SALES</span>
                                </div>
                            </div>
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $data['totalUsers'] }}</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $data['totalMedicines'] }}</h5>
                                    <span class="description-text">Medicines</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 60px;margin-top:50px">
            <div class="col">
                <div class="page-content page-container" id="page-content">
                    <div class="d-flex">
                        <div class="col-lg-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Users</h4>
                                    <p class="card-description">
                                        Basic table with all users
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <!-- Table 1 content goes here -->
                                            <thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Users as $user)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                                                                    <img class="img-fluid"
                                                                        src="{{ asset('storage/images/users/' . $user->photo) }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $Users->links('pagination::bootstrap-4') }}

                            </div>

                        </div>
                        <div class="col-lg-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Pharmacies</h4>
                                    <p class="card-description">
                                        Basic table with all pharmacies
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <!-- Table 2 content goes here -->
                                            <thead>
                                                <tr>
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Pharmacies as $pharmacy)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                                                                    <img class="img-fluid"
                                                                        src="{{ asset('storage/images/pharmacies/' . $pharmacy->logo) }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $pharmacy->name }}</td>
                                                        <td>{{ $pharmacy->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                                <!-- Add more rows if needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $Pharmacies->links('pagination::bootstrap-4') }}

                            </div>
                        </div>
                        <div class="col-lg-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Categories</h4>
                                    <p class="card-description">
                                        Basic table with card
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <!-- Table 3 content goes here -->
                                            <thead>
                                                <tr>
                                                    <th>ID No.</th>
                                                    <th>Name</th>
                                                    <th>Created On</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>John ryte</td>
                                                    <td>53275533</td>
                                                    <td>14 May 2017</td>
                                                </tr>
                                                <!-- Add more rows if needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $categories->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center ">
            <div class="w-100 col-lg-5 m-b-2">
                <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($Pharmacies as $pharmacie)
                            <div class="carousel-item active"> <img
                                    src="{{ asset('storage/images/pharmacies/' . $pharmacie->logo) }}"
                                    class="img-responsive img-rounded" alt="Pharma Logo"></div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                            class="sr-only">Previous</span> </a> <a class="carousel-control-next"
                        href="#carouselExampleControls3" role="button" data-slide="next"> <span
                            class="carousel-control-next-icon" aria-hidden="true"></span> <span
                            class="sr-only">Next</span> </a>
                </div>
            </div>
            <div class="w-100 col-lg-5 m-b-2">
                <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($Medicines as $medicine)
                            <div class="carousel-item active"> <img
                                    src="{{ asset('storage/images/medicines/' . $medicine->image) }}"
                                    class="img-responsive img-rounded" alt="Medicine Image"></div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                            class="sr-only">Previous</span> </a> <a class="carousel-control-next"
                        href="#carouselExampleControls3" role="button" data-slide="next"> <span
                            class="carousel-control-next-icon" aria-hidden="true"></span> <span
                            class="sr-only">Next</span> </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.content -->
    </div>

    <script>
        const pharmaDates = @json($pharmaStatistics->pluck('date'));
        const pharmaCounts = @json($pharmaStatistics->pluck('pharma_count'));

        const medicineDates = @json($medicineStatistics->pluck('date'));
        const medicineCounts = @json($medicineStatistics->pluck('medicine_count'));

        const pharmaCtx = document.getElementById('pharmaChart').getContext('2d');
        const pharmaChart = new Chart(pharmaCtx, {
            type: 'line',
            data: {
                labels: pharmaDates,
                datasets: [{
                    label: 'Nombre de pharmacies ajoutées',
                    data: pharmaCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre de pharmacies'
                        }
                    }
                }
            }
        });

        const medicineCtx = document.getElementById('medicineChart').getContext('2d');
        const medicineChart = new Chart(medicineCtx, {
            type: 'bar',
            data: {
                labels: medicineDates,
                datasets: [{
                    label: 'Nombre de médicaments ajoutés',
                    data: medicineCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre de médicaments'
                        }
                    }
                }
            }
        });
    </script>
@endsection
