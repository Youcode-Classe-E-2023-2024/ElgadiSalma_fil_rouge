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
        <div class="row">
            <div class="col-lg-8 col-xlg-9">
                <div class="info-box">
                    <div class="d-flex flex-wrap">
                        <div>
                            <h5 class="text-black">Yearly Earning</h5>
                        </div>
                        <div class="ml-auto">
                            <ul class="list-inline">
                                <li class="text-aqua"> <i class="fa fa-circle"></i> Sales</li>
                                <li class="text-blue"> <i class="fa fa-circle"></i> Earning ($)</li>
                            </ul>
                        </div>
                    </div>
                    <div id="earning"></div>
                </div>
            </div>
            <div class="col-lg-4 col-xlg-3">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">
                        <h3 class="widget-user-username">Alexander Pierce</h3>
                        <h6 class="widget-user-desc">Founder &amp; CEO</h6>
                    </div>
                    <div class="widget-user-image"> <img class="img-circle" src="assets-dashboard/img/img3.jpg"
                            alt="User Avatar"> </div>
                    <div class="box-footer">
                        <div class="text-center">
                            <p> A small river named Duden flows by their place and with the necessary.</p>
                            <a href="#" class="btn btn-facebook btn-rounded margin-bottom">Follow</a>
                        </div>
                        <div class="row margin-bottom">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">3,200</h5>
                                    <span class="description-text">SALES</span>
                                </div>
                            </div>
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">13,000</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">35</h5>
                                    <span class="description-text">PRODUCTS</span>
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
                                                            <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                                                                <img class="img-fluid" src="{{ asset('storage/images/users/' . $user->photo) }}" alt="">
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
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    {{ $users->links() }}
                                </div>
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
                                                    <th>Name</th>
                                                    <th>ID No.</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Marlo Sanki</td>
                                                    <td>53425532</td>
                                                    <td>15 May 2015</td>
                                                </tr>
                                                <!-- Add more rows if needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="info-box">
                    <div class="box box-warning direct-chat direct-chat-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title text-black">Recent Chats</h3>
                        </div>
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix"> <span
                                            class="direct-chat-name pull-left">Alexander Pierce</span> <span
                                            class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span> </div>
                                    <img class="direct-chat-img" src="assets-dashboard/img/img2.jpg" alt="user image">
                                    <div class="direct-chat-text"> A small river named Duden flows by their place and
                                        supplies it with the necessary. </div>
                                </div>
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix"> <span
                                            class="direct-chat-name pull-right">Sarah Bullock</span> <span
                                            class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span> </div>
                                    <img class="direct-chat-img" src="assets-dashboard/img/img3.jpg" alt="user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text"> You better believe it! </div>
                                </div>
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix"> <span
                                            class="direct-chat-name pull-left">Alexander Pierce</span> <span
                                            class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span> </div>
                                    <img class="direct-chat-img" src="assets-dashboard/img/img4.jpg" alt="user image">
                                    <div class="direct-chat-text"> A small river named Duden flows by their place and
                                        supplies it with the necessary. </div>
                                </div>
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix"> <span
                                            class="direct-chat-name pull-right">Sarah Bullock</span> <span
                                            class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span> </div>
                                    <img class="direct-chat-img" src="assets-dashboard/img/img5.jpg" alt="user image">
                                    <div class="direct-chat-text"> I would love to. </div>
                                </div>
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix"> <span
                                            class="direct-chat-name pull-left">Alexander Pierce</span> <span
                                            class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span> </div>
                                    <img class="direct-chat-img" src="assets-dashboard/img/img6.jpg" alt="user image">
                                    <div class="direct-chat-text"> A small river named Duden flows by their place and
                                        supplies it with the necessary. </div>
                                </div>
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix"> <span
                                            class="direct-chat-name pull-right">Sarah Bullock</span> <span
                                            class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span> </div>
                                    <img class="direct-chat-img" src="assets-dashboard/img/img3.jpg" alt="user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text"> You better believe it! </div>
                                </div>
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix"> <span
                                            class="direct-chat-name pull-left">Alexander Pierce</span> <span
                                            class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span> </div>
                                    <img class="direct-chat-img" src="assets-dashboard/img/img6.jpg" alt="user image">
                                    <div class="direct-chat-text"> A small river named Duden flows by their place and
                                        supplies it with the necessary. </div>
                                </div>
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix"> <span
                                            class="direct-chat-name pull-right">Sarah Bullock</span> <span
                                            class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span> </div>
                                    <img class="direct-chat-img" src="assets-dashboard/img/img3.jpg" alt="user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text"> You better believe it! </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..."
                                        class="form-control">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-warning btn-flat">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Chat end -->
            <div class="col-lg-6">
                <div class="info-box">
                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div class="user-block"> <img class="img-circle" src="assets-dashboard/img/img1.jpg"
                                    alt="User Image"> <span class="username"><a href="#">Alexander
                                        Pierce</a></span> <span class="description">Shared publicly - 8:15 AM Today</span>
                            </div>
                        </div>
                        <div class="box-body"> <img class="img-responsive pad" src="assets-dashboard/img/img6.jpg"
                                alt="Photo">
                            <p>I took this photo this morning. What do you guys think?</p>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i>
                                Share</button>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i>
                                Like</button>
                            <span class="pull-right text-muted">153 likes - 23 comments</span>
                        </div>
                        <div class="box-footer box-comments">
                            <div class="box-comment"> <img class="img-circle img-sm" src="assets-dashboard/img/img3.jpg"
                                    alt="User Image">
                                <div class="comment-text"> <span class="username"> Maria Gonzales <span
                                            class="text-muted pull-right">12:15 PM Today</span> </span> It is a long
                                    established fact that a reader will be assets-dashboardracted. </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <form action="#" method="post">
                                <img class="img-responsive img-circle img-sm" src="assets-dashboard/img/img4.jpg"
                                    alt="Alt Text">
                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <input type="text" class="form-control input-sm"
                                        placeholder="Press enter to post comment">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Comments end -->
            <div class="col-lg-4 m-b-2">
                <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"> <img src="assets-dashboard/img/img7.jpg"
                                class="img-responsive img-rounded" alt="User Image"></div>
                        <div class="carousel-item"> <img src="assets-dashboard/img/img8.jpg"
                                class="img-responsive img-rounded" alt="User Image"> </div>
                        <div class="carousel-item"> <img src="assets-dashboard/img/img9.jpg"
                                class="img-responsive img-rounded" alt="User Image"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                            class="sr-only">Previous</span> </a> <a class="carousel-control-next"
                        href="#carouselExampleControls3" role="button" data-slide="next"> <span
                            class="carousel-control-next-icon" aria-hidden="true"></span> <span
                            class="sr-only">Next</span> </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="soci-wid-box bg-twitter m-b-3">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="col-lg-12 text-center">
                                    <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent
                                        libero sed cursus ante.</p>
                                    <p class="text-italic pt-1">- John Doe -</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-lg-12 text-center">
                                    <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent
                                        libero sed cursus ante.</p>
                                    <p class="text-italic pt-1">- John Doe -</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-lg-12 text-center">
                                    <div class="sco-icon"><i class="ti-twitter-alt"></i></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent
                                        libero sed cursus ante.</p>
                                    <p class="text-italic pt-1">- John Doe -</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                                class="sr-only">Previous</span> </a> <a class="carousel-control-next"
                            href="#carouselExampleControls" role="button" data-slide="next"> <span
                                class="carousel-control-next-icon" aria-hidden="true"></span> <span
                                class="sr-only">Next</span> </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="soci-wid-box bg-facebook m-b-3">
                    <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="col-lg-12 text-center">
                                    <div class="sco-icon"><i class="ti-facebook"></i></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent
                                        libero sed cursus ante.</p>
                                    <p class="text-italic pt-1">- John Doe -</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-lg-12 text-center">
                                    <div class="sco-icon"><i class="ti-facebook"></i></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent
                                        libero sed cursus ante.</p>
                                    <p class="text-italic pt-1">- John Doe -</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-lg-12 text-center">
                                    <div class="sco-icon"><i class="ti-facebook"></i></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio praesent
                                        libero sed cursus ante.</p>
                                    <p class="text-italic pt-1">- John Doe -</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls1" role="button"
                            data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                                class="sr-only">Previous</span> </a> <a class="carousel-control-next"
                            href="#carouselExampleControls1" role="button" data-slide="next"> <span
                                class="carousel-control-next-icon" aria-hidden="true"></span> <span
                                class="sr-only">Next</span> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
    </div>
@endsection
