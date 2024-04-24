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
                 <li class="breadcrumb-item"><a href="#">Pages</a></li>
                 <li class="breadcrumb-item active" aria-current="page"> About Us</li>
               </ol>
         </nav>
                  </div>
               </div>
            </div>
         
         </section>
         
         <!-----------------breadcrumb------------------------>
         <!-----------------welcome_section------------------------>
         <section class="welcome_section hme-one" style="background:url(assets/image/team-of-developers-2023-11-27-05-32-42-utc.jpg)"> 
            <div class="container">
         
                          
           
               <div class="row">
                  <div class="col-lg-6" style="height: 18rem">
                     
               </div>
                  <div class="col-lg-6">
         
                  </div>
               </div>
            </div>
         </section>
      <!-----------------welcome_section------------------------>
    
    
      <section class="department_section hm-one">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="welcme_inner">
                        <div class="heading clearfix">
                              <h1>WELCOME TO <span>PharmaStock </span></h1>
                        </div>
                        <h6>Our mission is to provide first-class independent healthcare for the local community in a safe, comfortable, and welcoming environment.</h6>
                        <p>In addition to delivering excellent care and service, we want to inspire people to see their health in a new way. More than doctor visits and medical tests, but a lifelong journey of small, manageable steps. These are some of the things we’ve been recognized for again and again over the years</p>
                       
                        <a href="#" class="theme-btn">GET IN TOUCH</a>
                     </div>
               </div>
                  <div class="col-lg-6">
         
                  </div>
               </div>
            </div>
         </section>
    
    
         <section class="doc_community">
                <div class="container">
                   <div class="row">
                      <div class="col-lg-12">
                         <div class="doc_community_text">
                            <h1>DOCTOR TO THE<span> COMMUNITY.</span></h1>
                            <p>We offer extensive medical procedures to outbound and inbound patients.</p>
                         </div>
                         <div class="mak_appointment">
                            <a href="#">MAKE AN APPOINTMENT</a>
                         </div>
                      </div>
                   </div>
                </div>
             </section>
    
    
             
    <!-------testimonial_sec----->
    <section class="testimonial_sec hm-one">
            <div class="container">
                  <div class="row">
                     <div class="col-lg-12">
                        <div  class="heading clearfix">
                           <h1>WHAT <span>CLIENTS SAY</span></h1>
                        </div>
                     </div>
                  </div>
                  <div class="owl-carousel owl-theme two-item">
      
                     <div class="testimonial_content">
                        <p>"When I began looking for the "best" center for Max I chose Medicol. You are the best. Many thanks to you and your warm, concerned staff for providing a safe haven for Max and giving me much needed respite. We will see how his nasty disease progresses and if possible will send him again next summer… "</p>
                        <div class="client_details">
                           <img src="assets/image/test-1.png" class="img-fluid" alt="test" />
                           <div class="client_in">
                              <h6>Reta Schmidt</h6>
                              <span>Patient</span>
                           </div>
                        </div>
                     </div>
                     <div class="testimonial_content">
                           <p>"Three and a half months ago, my family lost someone that meant the world to us: my father. We made many trips to Medicol with my father for comfort care. We did have a few star employees that deserve recognition. We will never take that from him, but he adored two employees and they were great to him."</p>
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
      
                   <div class="item"><img src="assets/image/client/client-hm-1.jpg" class="img-fluid" alt="img" /></div>
                   <div class="item"><img src="assets/image/client/client-hm-2.jpg" class="img-fluid" alt="img" /></div>
                   <div class="item"><img src="assets/image/client/client-hm-3.jpg" class="img-fluid" alt="img" /></div>
                   <div class="item"><img src="assets/image/client/client-hm-4.jpg" class="img-fluid" alt="img" /></div>
                   <div class="item"><img src="assets/image/client/client-hm-5.jpg" class="img-fluid" alt="img" /></div>
      
                  </div>
            </div>
       </section>
      
    
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