@extends('Moderateur.moderateurLayout')
@section('moderateurContent')
    <!-- Main content -->
    <div class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="info-box">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-xs-12">
                            <div> <i class="ti-face-smile f-20 text-blue"></i>
                                <div class="info-box-content">
                                    <h1 class="f-25 text-black">{{ $data['totalCategories'] }}</h1>
                                    <span class="progress-description">Total Categories</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:40%; height:6px;"> <span
                                            class="sr-only">40% Complete</span> </div>
                                </div>
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-lg-3 col-sm-6 col-xs-12">
                            <div> <i class="ti-bar-chart f-20 text-danger"></i>
                                <div class="info-box-content">
                                    <h1 class="f-25 text-black">2,030</h1>
                                    <span class="progress-description">New Orders</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span
                                            class="sr-only">50% Complete</span> </div>
                                </div>
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-lg-3 col-sm-6 col-xs-12">
                            <div> <i class="ti-panel f-20 text-info"></i>
                                <div class="info-box-content">
                                    <h1 class="f-25 text-black">{{ $data['totalMedicines'] }}</h1>
                                    <span class="progress-description">Total Medicament</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:65%; height:6px;"> <span
                                            class="sr-only">65% Complete</span> </div>
                                </div>
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-lg-3 col-sm-6 col-xs-12">
                            <div> <i class="ti-wallet f-20 text-green"></i>
                                <div class="info-box-content">
                                    <h1 class="f-25 text-black">{{ $capitale[0]->number }} DH
                                    </h1>
                                    <span class="progress-description">Total Budget</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width:85%; height:6px;"> <span
                                            class="sr-only">85% Complete</span> </div>
                                </div>
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-lg-8">
                <div class="ml-3">
                    <div class="info-box">
                        <div class="col-12">
                            <div class="d-flex flex-wrap">
                                <div>
                                    <h5>Yearly Earning</h5>
                                </div>
                                <div class="ml-auto">
                                    <ul class="list-inline">
                                        <li class="text-aqua"> <i class="fa fa-circle"></i> Sales</li>
                                        <li class="text-blue"> <i class="fa fa-circle"></i> Earning ($)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <canvas id="stockChart" class="w-100" height="150"></canvas>
                        </div>
                    </div>
                </div>


                <div class="">

                    <div class="w-100 m-3">
                        <div class="box box-widget widget-user">
                            <div class="widget-user-header " style="background-color: #8AA79F">
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
            </div>

            <div class="col-lg-4 gap-10">
                <div>

                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header" style="background-color: #8bcbba">
                            <h3> Employees ({{ $data['totalUsers'] }})</h3>
                        </div>
                        <ul class="products-list product-list-in-box">
                            @foreach ($employees as $employee)
                                <li class="item">
                                    <form action="{{ route('user.edit', ['id' => $employee->id]) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="product-img"> <img
                                                src="{{ asset('storage/images/users/' . $employee->photo) }}"
                                                alt="Product Image">
                                        </div>
                                        <div class="product-info w-9">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <input class="product-title" name="name" value="{{ $employee->name }}"
                                                style="background: none; border: none; color:rgb(21, 64, 94)" />
                                            <span class="product-description">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <input name="email" value="{{ $employee->email }}"
                                                    style="background: none; border: none; color:rgb(102, 107, 111)" />
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-around p-1 gap-5">
                                            <button type="submit" class="buttonEdit">
                                                <span>Edit</span>
                                            </button>
                                    </form>
                                    <form action="{{ route('user.delete', ['id' => $employee->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="buttonDelete">
                                            <span>Delete</span>
                                        </button>
                                    </form>
                    </div>


                    </li>
                    @endforeach

                    </ul>
                </div>

                <div class="mt-3">

                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header"  style="background-color: #8bcbba">
                            <h3> Commandes suggestées ({{ $data['totalCommande'] }})</h3>
                        </div>
                        <ul class="products-list product-list-in-box">
                            @foreach ($commandes as $commande)
                                <li class="item">
                                    <form action="{{ route('commande.approuve', ['id' => $commande->id]) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="product-img"> <img
                                                src="{{ asset('storage/images/medicines/' . $commande->medicine->image) }}"
                                                alt="Product Image">
                                        </div>
                                        <div class="product-info w-9">
                                            
                                            <h5 class="product-title"  style="background: none; border: none; color:rgb(21, 64, 94)"> {{ $commande->medicine->name }}
                                            </h5>
                                            <span class="product-description d-flex ">
                                                <h6 style="background: none; border: none; color:rgb(102, 107, 111)">{{ $commande->number }} pièces</h6>
                                                <h6 style="background: none; border: none; color:rgb(102, 107, 111); padding-left:7rem">{{ $commande->number * $commande->medicine->price }} DH</h6>
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-around p-1 gap-5">
                                            <button type="submit" class="buttonEdit">
                                                <span>Approuve</span>
                                            </button>
                                    </form>
                                    <form action="{{ route('commande.delete', ['id' => $commande->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="buttonDelete">
                                            <span>Decline</span>
                                        </button>
                                    </form>
                    </div>


                    </li>
                    @endforeach

                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
    </div>


    </div>

    <script>
        const stockDates = @json($stockStatistics->pluck('date'));
        const stockCounts = @json($stockStatistics->pluck('stock_count'));


        const stockCtx = document.getElementById('stockChart').getContext('2d');
        const stockChart = new Chart(stockCtx, {
            type: 'bar',
            data: {
                labels: stockDates,
                datasets: [{
                    label: 'Nombre de médicaments ajoutés',
                    data: stockCounts,
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
