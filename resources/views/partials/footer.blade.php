<footer class="bfc-footer position-relative">
    <img class="footer-shadow-icon17" src="{{ asset('./images/studio-icons/footer-shadow.png') }}" alt="Footer Background" srcset="">
    <div class="container-xxl">
        <div class="bfc-footer-card">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <!-- <a class="bfc-brand mb-3" href="{{ route('home') }}">
                        <span class="bfc-logo-mark">bfc</span>
                        <span class="bfc-logo-text">BFC Studio</span>
                    </a> -->
                    <a class="navbar-brand bfc-brand" href="{{ route('home') }}">
                        <!-- <span class="bfc-logo-mark">bfc</span>
                <span class="bfc-logo-text">BFC Studio</span> -->
                        <img src="{{ asset('images/logo.svg') }}" alt="BFC Studio Logo" class="bfc-logo">
                    </a>
                    <p class="bfc-footer-about">
                        BFC Studio is a platform that provides information about various shows,
                        including their schedules, cast, and other details.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <h3 class="bfc-footer-heading">Quick Links</h3>
                    <ul class="bfc-footer-links">
                        <li><a href="{{ route('home') }}#our-studio">About us</a></li>
                        <li><a href="{{ route('faq') }}">Policy</a></li>
                        <li><a href="{{ route('home') }}">Site Map</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <h3 class="bfc-footer-heading">Links Heading</h3>
                    <ul class="bfc-footer-links">
                        <li><a href="{{ route('home') }}#our-studio">Shows</a></li>
                        <li><a href="{{ route('faq') }}">Terms &amp; Conditions</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h3 class="bfc-footer-heading">Contact Us</h3>
                    <ul class="bfc-footer-contact">
                        <li><i class="bi bi-telephone-fill"></i> <a href="tel:+917348700888">+91 7348700888</a></li>
                        <li><i class="bi bi-envelope-fill"></i> <a
                                href="mailto:enquiry@bfcstudio.com">enquiry@bfcstudio.com</a></li>
                        <li><i class="bi bi-geo-alt-fill"></i> <span>CP-61, Viraj Khand, Gomti Nagar, Lucknow, Uttar
                                Pradesh 226010</span></li>
                    </ul>
                </div>
            </div>

            <div class="bfc-footer-bar">
                <p class="mb-0">Copyright &copy; {{ date('Y') }}. All Rights Reserved By <span>BFC Studio</span></p>
                <div class="bfc-social">
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    <a href="#" aria-label="Behance"><i class="bi bi-behance"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>