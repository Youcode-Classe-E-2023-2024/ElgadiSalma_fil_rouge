@extends('Moderateur.moderateurLayout')
@section('moderateurContent')
    <div class="content-header d-flex sty-one">
        <h1>Ventes</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Dashboard </li>
        </ol>
    </div>


    <!-----------------breadcrumb------------------------>
    <section class="ban-bread-crumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @foreach ($categories as $category)
                                <li class="breadcrumb-item">
                                    <a style="@if (Request::path() === 'venteMedicines/' . $category->id) color: #15616D; @endif"
                                        href="{{ route('filter.user', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

    </section>

    <!-----------------breadcrumb------------------------>


    <div class="cards">
        @foreach ($medicines as $medicine)
            <div class="card">
                <div class="content">
                    <div class="back">
                        <img src="{{ asset('storage/images/medicines/' . $medicine->image) }}" alt="test"
                            style="height: 100%">
                    </div>
                    <div class="front">
                        <div class="img">
                            <img src="{{ asset('storage/images/medicines/' . $medicine->image) }}" alt="test"
                                style="height: 100%; filter: blur(15px);">
                        </div>
                        <div class="front-content">
                            <small class="badge">{{ $medicine->category->name }}</small>
                            <div class="d-flex justify-content-center">
                                <h3
                                    style="text-shadow: 0 0 5px #15616D, 0 0 10px #15616D, 0 0 20px #15616D, 0 0 30px #15616D, 0 0 40px #15616D, 0 0 55px #15616D, 0 0 75px #15616D;">
                                    {{ $stockTotals[$medicine->id] ?? 0 }}</h3>
                            </div>
                            <div class="description">
                                <div class="title">
                                    <p class="title">
                                        <strong>{{ $medicine->name }}</strong>
                                    </p>
                                    <p>{{ $medicine->price }} MAD</p>
                                    <a href="medicine/{{ $medicine->id }}"> <svg fill-rule="nonzero" height="15px"
                                            width="15px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g style="mix-blend-mode: normal" text-anchor="none" font-size="none"
                                                font-weight="none" font-family="none" stroke-dashoffset="0"
                                                stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter"
                                                stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero"
                                                fill="#20c997">
                                                <g transform="scale(8,8)">
                                                    <path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <form action="{{ route('medicine.buy', ['id' => $medicine->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="d-flex justify-content-center">
                                        <input type="submit" name="buyItem" value="--" class="input"
                                            style="background-color: green">
                                        <input type="number" class="input" name="number" value="1">
                                        <input type="submit" name="respondItem" value="+" class="input"
                                            style="background-color: red">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        let error = "{{ session('error') }}";
        let success = "{{ session('success') }}";
    
        if (error) {
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: error
            });
        } else if (success) {
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: success
            });
        }
    </script>
    
@endsection
