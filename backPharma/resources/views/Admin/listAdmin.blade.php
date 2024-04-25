@extends('Admin.adminLayout')
@section('adminContent')


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

                                <div class="d-flex justify-content-center">
                                    <a href="/editMedicine/{{ $medicine->id }}">
                                    <input type="submit" name="buyItem" value=">" class="input"
                                        style="background-color: green">
                                    </a>
                                    <form action="{{ route('medicine.delete', ['id' => $medicine->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" name="respondItem" value="X" class="input"
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
@endsection
