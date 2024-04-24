@extends('Guest.guestLayout')
@section('guestContent')
    <main class="main-content" style="margin:2rem 7rem ">

        <div class="blog_single_post_right">

            <div class="blog-single_post-inner">

                <div class="blog-content">
                    <p>{{ $medicine->category->name }} . <span>{{ $medicine->created_at->diffForHumans() }}</span></p>
                    <h2><a href="#">{{ $medicine->name }}</a></h2>
                </div>

                <div class="authour_quotes">
                    <div class="quotes_inner">
                        <span class="flaticon-quote"></span>
                        <p>{{ $medicine->description }}</p>
                        <h6 class="authour_name">{{ $medicine->price }} DH</h6>
                    </div>
                    <div class="image blog_sub_ban">
                        <img src="{{ asset('storage/images/medicines/' . $medicine->image) }}" style="height: 35rem"
                            class="img-fluid" alt="case" />
                    </div>
                    <div class="authour_desc">

                        <p>As the nation struggles with the opioid epidemic and a spike in fentanyl-related overdoses,
                            emergency departments are often on the front line in treating patients with addiction. These
                            patients often return to the emergency department again and again, and without an interventional
                            program like SBIRT, could see their addiction and overall health worsen.<br /> <br />
                            Under the program, which is conducted in partnership with Mosaic Group, a Maryland healthcare
                            consulting firm, all patients in the emergency department are screened for risky substance abuse
                            behaviors. If the screening indicates a moderate or high risk, a peer recovery coach uses
                            motivational interviewing techniques in an attempt to promote the patient’s own desire to
                            change. The peer recovery coach then offers additional evaluation and referral services for
                            high-risk patients.
                        </p>
                    </div>

                    <div class="tage_and_share clearfix">
                        <div class="tags">
                            <ul>
                                <li>Tags:</li>
                                <li><a href="#"> Health,</a></li>
                                <li><a href="#"> Lifestyle, </a></li>
                                <li><a href="#">Experience</a></li>
                            </ul>
                        </div>
                        <div class="share">
                            <ul>
                                <li>Share on:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="suggesstions">
                        <h1>You May <span>Also Like</span></h1>
                        <div class="row">

                            @foreach ($relatedMedicines as $relatedMedicine)
                                <div class="col-lg-6">
                                    <div class="popular_articles_content">
                                        <div class="image">
                                            <img src="{{ asset('storage/images/medicines/' . $relatedMedicine->image) }}" style="width: 20rem" class="img-fluid"
                                                alt="articles">
                                            <a href="#" class="link"></a>
                                        </div>
                                        <div class="articles_content">
                                            <p> {{ $relatedMedicine->category->name }} . <span>{{ $relatedMedicine->created_at->diffForHumans() }}</span></p>
                                            <h6><a href="#">{{ $relatedMedicine->name }}
                                                </a></h6>
                                            <a href="{{ $relatedMedicine->id }}" class="read_">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>




                </div>
            </div>

    </main>
@endsection
