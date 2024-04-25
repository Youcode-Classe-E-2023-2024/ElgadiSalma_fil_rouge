@extends('Moderateur.moderateurLayout')
@section('moderateurContent')
<div class="content-header sty-one">
    <h1>Ventes</h1>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard </li>
    </ol>
</div>

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
                                style="height: 100%; filter: blur(15px);                ;
                ">
                        </div>

                        <div class="front-content">
                            <small class="badge">{{ $medicine->category->name }}</small>
                            <div class="description">
                                <div class="title">
                                    <p class="title">
                                        <strong>{{ $medicine->name }}</strong>
                                    </p>
                                    <p>{{ $medicine->price }} MAD</p>
                                    <a href="medicine/{{ $medicine->id }}"> <svg fill-rule="nonzero" height="15px" width="15px"
                                            viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink"
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

    {{-- <script>
    $(document).ready(function() {
        $('#buyBtn, #respondBtn').click(function() {
            var formData = $('#buyForm').serialize();

            $.ajax({
                url: $('#buyForm').attr('action'),
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Check if response contains an error
                    if (response.error) {
                        // Display error message on the page
                        alert(response.error);
                    } else {
                        // Success, do something else
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error
                    console.error(error);
                }
            });
        });
    });
</script> --}}
@endsection
