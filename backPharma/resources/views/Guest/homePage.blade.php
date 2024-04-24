@extends('Guest.guestLayout')
@section('guestContent')
    <main class="main-content">



        <!------main-slider------>
        <section class="main-slider">
            <div class="main-slider-carousel main-slider-one owl-carousel owl-theme">
                <div class="slide" style="background-image:url(assets/image/giving-madication-at-the-pharmacy-counter-2023-11-27-05-08-21-utc.jpg)">
                    <div class="container text-left">
                        <div class="content ">
                            <h1>GIVING CHILDREN<br />
                                <span>THE CARE THEY DESERVE</span>
                            </h1>
                            <div class="text">The bold mission of America’s MEDITEX Companies is to bring
                                an end to the burdens of disease, in all its forms.</div>
                            <div class="link-box">
                                <a href="#" class="theme-btn ">DEPARTMENTS</a>
                                <a href="#" class="theme-btn btn-dark">get in touch</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide" style="assets/image/giving-madication-at-the-pharmacy-counter-2023-11-27-05-08-21-utc.jpg">
                    <div class="container text-left">
                        <div class="content ">
                            <h1>Advanced Medicine,<br />
                                <span>Trusted Care.</span>
                            </h1>
                            <div class="text">The bold mission of America’s MEDITEX Companies is to bring
                                an end to the burdens of disease, in all its forms.</div>
                            <div class="link-box">
                                <a href="#" class="theme-btn ">DEPARTMENTS</a>
                                <a href="#" class="theme-btn btn-dark">get in touch</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide" style="background-image:url(assets/image/banner/home-1-banner-3.jpg)">
                    <div class="container text-left">
                        <div class="content ">
                            <h1>Enhancing Life,<br />
                                <span>Excelling in Care.</span>
                            </h1>
                            <div class="text">The bold mission of America’s MEDITEX Companies is to bring
                                an end to the burdens of disease, in all its forms.</div>
                            <div class="link-box">
                                <a href="#" class="theme-btn ">DEPARTMENTS</a>
                                <a href="#" class="theme-btn btn-dark">get in touch</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------main-slider------>

        <!-------appointment-section----->
        <section class="appointment_section hm-one">
            <div class="container">
                <div class="appointment_inner">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="appont_sec_inner">
                                <h6>EMERGENCY</h6>
                                <a href="#">(052) 611-5711</a>
                                <p>Urgent cases are always seen immediately. Always stand out In the event of an emergency,
                                    please call us as soon as like out possible we can.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="appont_sec_inner">
                                <h6>WORK HOURS</h6>
                                <ul>
                                    <li>Mon - Thu...............<span>7:00 - 17:00</span></li>
                                    <li> Friday.......................<span>7:30 - 17:00</span></li>
                                    <li> Saturday.................<span>8:00 - 16:00</span></li>
                                    <li> Sunday....................<span>9:00 - 16:00</span></li>
                                    <li> Holiday....................<span>9:00 - 11:00</span></li>
                                </ul>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </section>
        <!-------appointment-section----->


        <!-------appointment-section----->
        <section class="department_section hm-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading clearfix">
                            <h1>OUR <span>CATEGORIES</span></h1>
                            <p><a href="#"> VIEW ALL CASES</a></p>
                        </div>
                    </div>
                </div>
                <div class="department_inner">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($categories as $category)
                                <div class="department_icon_content">
                                    <a href="#"><span class="flaticon-blood dep_icon"></span></a>
                                    <a href="#">
                                        <h2>{{ $category->name }}</h2>
                                    </a>
                                    <p>In the medical field, hemato-
                                        logy includes the treatment of blood...</p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-------department-section----->


        <!---------welcomen-sec--------->
        <section class="welcome_section hme-one" style="background:url(assets/image/female-medicine-doctor-filling-patient-medical-for-2023-11-27-05-23-34-utc.jpg)">
            <div class="container">



                <div class="row">
                    <div class="col-lg-6">
                        <div class="welcme_inner">
                            <div class="heading clearfix">
                                <h1>WELCOME TO <span>MEDITEX </span></h1>
                            </div>

                            <a href="/about-us" class="theme-btn">GET IN TOUCH</a>
                        </div>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
        </section>
        <!---------welcomen-sec--------->
        <!-------------DOCTOR TO THE COMMUNITY.--------->
        <section class="doc_community">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="doc_community_text">
                            <h1>PharMa<span>STOCK.</span></h1>
                            <p>We offer extensive medical procedures to outbound and inbound patients.</p>
                        </div>
                        <div class="mak_appointment">
                            <a href="/about-us">MAKE AN APPOINTMENT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-------appointment-section----->
        <section class="testimonial_sec hm-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading clearfix">
                            <h1>WHAT <span>CLIENTS SAY</span></h1>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme two-item">

                    <div class="testimonial_content">
                        <p>"When I began looking for the "best" center for Max I chose Medicol. You are the best. Many
                            thanks to you and your warm, concerned staff for providing a safe haven for Max and giving me
                            much needed respite. We will see how his nasty disease progresses and if possible will send him
                            again next summer… "</p>
                        <div class="client_details">
                            <img src="assets/image/test-1.png" class="img-fluid" alt="test" />
                            <div class="client_in">
                                <h6>Reta Schmidt</h6>
                                <span>Patient</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_content">
                        <p>"Three and a half months ago, my family lost someone that meant the world to us: my father. We
                            made many trips to Medicol with my father for comfort care. We did have a few star employees
                            that deserve recognition. We will never take that from him, but he adored two employees and they
                            were great to him."</p>
                        <div class="client_details">
                            <img src="assets/image/test-2.png" class="img-fluid" alt="test" />
                            <div class="client_in">
                                <h6>Katlynn Pouros</h6>
                                <span>Patient's family</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="owl-carousel owl-theme client-carousel">

                    <div class="item"><img src="assets/image/client/client-hm-1.jpg" class="img-fluid"
                            alt="img" /></div>
                    <div class="item"><img src="assets/image/client/client-hm-2.jpg" class="img-fluid"
                            alt="img" /></div>
                    <div class="item"><img src="assets/image/client/client-hm-3.jpg" class="img-fluid"
                            alt="img" /></div>
                    <div class="item"><img src="assets/image/client/client-hm-4.jpg" class="img-fluid"
                            alt="img" /></div>
                    <div class="item"><img src="assets/image/client/client-hm-5.jpg" class="img-fluid"
                            alt="img" /></div>

                </div>
            </div>
        </section>

        <!--------best-doctors-------->
        <section class="best-doctors  hme-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h1>BEST PHARMACIES<span> FOR YOU</span></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel owl-theme three-item">

                            @foreach ($pharmacies as $pharmacy)
                                <div class="best-doctor-outer">
                                    <div class="image">
                                        <img src="{{ asset('storage/images/pharmacies/' . $pharmacy->logo) }}" class="img-fluid"
                                            alt="best-doctors" />
                                        <a href="#" class="link"></a>
                                    </div>
                                    <div class="content-inner">
                                        <h2> <a href="#">Ph. {{ $pharmacy->name }} </a> </h2>
                                        <span>{{ $pharmacy->city->city }}</span>
                                        <p>{{ $pharmacy->adresse }}</p>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                            <li><a href="#"><i class="fa fa fa-vimeo"></i></a></li>
                                            <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="view-more-doctors">
                            <a href="#" class="view-doctors">SEE ALL Pharmacies</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--------best-doctors-------->


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
