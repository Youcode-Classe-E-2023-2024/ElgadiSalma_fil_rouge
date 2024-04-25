@extends('Guest.guestLayout')
@section('guestContent')
    <!------main-content------>
    <main class="main-content">


        <!-----------------breadcrumb------------------------>
        <section class="ban-bread-crumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @foreach ($categories as $category)
                                    <li class="breadcrumb-item"><a href="{{ route('medicine.filter', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

        </section>

        <!-----------------breadcrumb------------------------>


        <!-----------------OUR DEPARTMENTS 3 Column------------------------>
        <div class="department_gdthre_column">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h1>OUR <span>DEPARTMENTS</span></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($medicines as $medicine)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="department_gd_inner">
                                <div class="image">
                                    <img src="{{ asset('storage/images/medicines/' . $medicine->image) }}"
                                        style="width: 16rem; height:17rem; display:flex; justify-content:center"
                                        class="img-fluid" alt="img" />
                                </div>
                                <div class="dp_content">
                                    <h2><a href="#">{{ $medicine->name }}</a></h2>
                                    <p>{{ $medicine->price }} DH</p>

                                    <a href="medicine/{{ $medicine->id }}" class="read_">Read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-----------------OUR DEPARTMENTS 3 Column------------------------>


        <!-------contact-through----->
        <div class="contact_through">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="contact_through_inner">
                            <span class="flaticon-phone-1 icon"></span>
                            <p>Emergency Cases: <br />
                                (052) 611-5711</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="contact_through_inner">
                            <span class="flaticon-placeholder icon"></span>
                            <p>E7088 Micaela Cliffs, <br />
                                Thielshire, OK 95062</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="contact_through_inner">
                            <span class="flaticon-envelope icon"></span>
                            <p>Email Address<br />
                                contact@meditex.com</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="contact_through_inner">
                            <span class="flaticon-calendar icon"></span>
                            <p>Book Online<br />
                                Appointment Now</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-------contact-through----->
    @endsection
