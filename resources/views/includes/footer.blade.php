<footer id="footer" class="mt-4">
    <div class="container">
        <div class="row pt-3 mt-4">
            <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 pt-3">


                <h5 class="text-3 mb-3">Tentang Kami {{$about->title}}</h5>
                <p>{{ str_limit($about->description, $limit = 250 ) }}</p>
                <p class="mb-0"><a href="{{ route('about') }}" class="btn-flat btn-xs text-color-light p-relative top-5"><strong class="text-2">Lihat Selengkapnya</strong><i class="fas fa-angle-right p-relative top-1 pl-2"></i></a></p>
            </div>
            <div class="col-md-5 col-lg-3 mb-5 mb-lg-0 pt-3">
                <h5 class="text-3 mb-2">Hubungi Kami</h5>
                <p class="text-5 text-color-light font-weight-bold">(+62) {{$about->whatsapp}}</p>
                <ul class="list list-icons list-icons-lg">
                    <li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i>
                        <p class="m-0">{{$about->address}}</p>
                    </li>
                    <li class="mb-1"><i class="far fa-envelope text-color-primary"></i>
                        <p class="m-0">{{$about->email}}</p>
                    </li>
                    <li class="mb-1"><i class="fab fa-facebook text-color-primary"></i>
                        <p class="m-0"><a href="{{$about->fb}}">Sedekah Jariah</a></p>
                    </li>
                </ul>
                <!-- <ul class="social-icons mt-4">
                    <li class="social-icons-facebook"><a href="{{$about->fb}}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                </ul> -->
            </div>

            <div class="col-lg-5 pt-3">
                <h5 class="text-3 mb-3 pb-1"></h5>

                <div style="text-align: center;" class="mt-1">
                    <img alt="SedekahJariah" width="300" height="150" src="{{ url('img/logo11.png') }}" />
                </div>
                <!-- <form id="contactForm" class="contact-form" action="php/contact-form.php" method="POST">
                    <input type="hidden" value="Contact Form" name="subject" id="subject">
                    <div class="contact-form-success alert alert-success d-none" id="contactSuccess">
                        Message has been sent to us.
                    </div>

                    <div class="contact-form-error alert alert-danger d-none" id="contactError">
                        Error sending your message.
                        <span class="mail-error-message text-1 d-block" id="mailErrorMessage"></span>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control py-2" placeholder="Your Name..." name="name" id="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control py-2" placeholder="Your Email Address..." name="email" id="email" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="4" class="form-control" placeholder="Your Message..." name="message" id="message" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="submit" value="SUBMIT" class="btn btn-xl btn-outline btn-primary text-1 font-weight-bold text-uppercase" data-loading-text="Loading...">
                        </div>
                    </div>
                </form> -->
                <?php 
                $year = \Carbon\Carbon::now('Asia/Jakarta')->format('Y');
                ?>

                <p class="text-3 mb-3 pb-1" style="text-align: center;">SedekahJariah © Copyright {{ $year }}. All Rights Reserved.</p>
                <br><br>
            </div>


        </div>

    </div>
    <!-- <div class="footer-copyright">
        <div class="container py-2">
            <div class="row py-4">
                <div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                    <a href="index.html" class="logo pr-0 pr-lg-3">
                        <img alt="Porto Website Template" src="img/logo-footer.png" class="opacity-5" height="33">
                    </a>
                </div>
                <div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                    <p>© Copyright 2019. All Rights Reserved.</p>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                    <nav id="sub-menu">
                        <ul>
                            <li><i class="fas fa-angle-right"></i><a href="page-faq.html" class="ml-1 text-decoration-none"> FAQ's</a></li>
                            <li><i class="fas fa-angle-right"></i><a href="sitemap.html" class="ml-1 text-decoration-none"> Sitemap</a></li>
                            <li><i class="fas fa-angle-right"></i><a href="contact-us.html" class="ml-1 text-decoration-none"> Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
</footer>