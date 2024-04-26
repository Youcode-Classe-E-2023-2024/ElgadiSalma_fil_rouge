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
        <div class="row" style="margin-bottom: 60px;margin-top:50px; ">
            <div class="col">
                <div class="page-content page-container" id="page-content">
                    <div class="d-flex">
                        <div class="grid-margin stretch-card" style="width: 33%; margin:0 5px">
                            <div class="card w-100">
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
                                                    <th>Email</th>
                                                    <th>Actions</th>
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
                                                        <td>{{ $user->email }}</td>
                                                        <td class="d-flex gap-2">
                                                           
                                                            <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                    <button type="submit" class="buttonD">
                                                                        <p></p>
                                                                    </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $Users->links('pagination::bootstrap-4') }}

                            </div>

                        </div>
                        <div class="grid-margin stretch-card"  style="width: 33%;margin:0 5px">
                            <div class="card w-100">
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
                        <div class="grid-margin stretch-card"  style="width: 33%;margin:0 5px">
                            <div class="card w-100">
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
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->id }}</td>
                                                        <form action="{{ route('category.edit', ['id' => $category->id]) }}" method="POST">
                                                            @csrf
                                                            @method('put')
                                                        <td><input type="text" name="name" placeholder="Category" value="{{ $category->name }}" style="background: none; border: none;"></td>
                                                        <td class="d-flex gap-2">
                                                            <button type="submit" class="buttonE">
                                                                <p></p>
                                                            </button>
                                                        </form>
                                                            <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                    <button type="submit" class="buttonD">
                                                                        <p></p>
                                                                    </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <!-- Add more rows if needed -->
                                            </tbody>
                                        </table>
                                        </div>                                
                                        {{ $categories->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center ">
            <div class="w-100 col-lg-5 m-b-2">
                <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">

                    <div id="default-carousel" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            <!-- Item 1 -->
                            @foreach ($Medicines as $medicine)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('storage/images/medicines/' . $medicine->image) }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                                data-carousel-slide-to="0"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                aria-label="Slide 2" data-carousel-slide-to="1"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                aria-label="Slide 4" data-carousel-slide-to="3"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                aria-label="Slide 5" data-carousel-slide-to="4"></button>
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
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
