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
                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                 <li class="breadcrumb-item"><a href="#">Department</a></li>
                 <li class="breadcrumb-item active" aria-current="page"> Grid 3 Column</li>
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
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="department_gd_inner">
                         <div class="image">
                            <img src="assets/image/departments/department-1.jpg" class="img-fluid" alt="img" />
                         </div>
                         <div class="dp_content">
                            <h2><a href="#">Psychiatry</a></h2>
                            <p>In its ongoing attempts to define, 
                                  understand, and categorize disorders...</p>
                            <a href="#"  class="read_" >Read more</a>
                         </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="department_gd_inner">
                         <div class="image">
                            <img src="assets/image/departments/department-2.jpg" class="img-fluid" alt="img" />
                         </div>
                         <div class="dp_content">
                            <h2><a href="#">Ophthalmology</a></h2>
                            <p>Our mission is to improve quality of life through the enhancement...
                             </p>
                            <a href="#"  class="read_">Read more</a>
                         </div>
                      </div>
                  </div>
                  
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="department_gd_inner">
                         <div class="image">
                            <img src="assets/image/departments/department-3.jpg" class="img-fluid" alt="img" />
                         </div>
                         <div class="dp_content">
                            <h2><a href="#">Cardiology</a></h2>
                            <p>​Our areas of expertise make the depart- ment a national cardiac referral centre...</p>
                            <a href="#" class="read_">Read more</a>
                         </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="department_gd_inner">
                         <div class="image">
                            <img src="assets/image/departments/department-4.jpg" class="img-fluid" alt="img" />
                         </div>
                         <div class="dp_content">
                            <h2><a href="#">Immunology</a></h2>
                            <p>The immune system provides the defense for an organism to repel invasion...</p>
                            <a href="#" class="read_">Read more</a>
                         </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="department_gd_inner">
                         <div class="image">
                            <img src="assets/image/departments/department-5.jpg" class="img-fluid" alt="img" />
                         </div>
                         <div class="dp_content">
                            <h2><a href="#">Hematology</a></h2>
                            <p>With nationally and internationally known experts in gastroenterology...</p>
                            <a href="#"  class="read_">Read more</a>
                         </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="department_gd_inner">
                         <div class="image">
                            <img src="assets/image/departments/department-6.jpg" class="img-fluid" alt="img" />
                         </div>
                         <div class="dp_content">
                            <h2><a href="#">Gastroenterology</a></h2>
                            <p>We have a diverse team of clinicians, 
                                  administrators, and researchers...</p>
                            <a href="#"  class="read_">Read more</a>
                         </div>
                      </div>
                  </div>
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
                      <p>Emergency Cases: <br/>
                         (052) 611-5711</p>
                   </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                   <div class="contact_through_inner">
                      <span class="flaticon-placeholder icon"></span>
                      <p>E7088 Micaela Cliffs, <br/>
                         Thielshire, OK 95062</p>
                   </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                   <div class="contact_through_inner">
                      <span class="flaticon-envelope icon"></span>
                      <p>Email Address<br/>
                         contact@meditex.com</p>
                   </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                   <div class="contact_through_inner">
                      <span class="flaticon-calendar icon"></span>
                      <p>Book Online<br/>
                         Appointment Now</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-------contact-through----->
@endsection    