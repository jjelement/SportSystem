<footer id="footer" class="footer-2">
    <!-- Footer Top-->
    <div class="top-footer">

        <!-- Logo Footer-->
        <div class="col-lg-12">
            <div class="logo-footer">
                <h2>Sport System Social</h2>
            </div>
        </div>
        <!-- End Logo Footer-->

        <!-- Social Icons-->
        <ul class="social">
            <li>
                <a href="{{ $configs['facebook_url'] }}" class="facebook" data-toggle="tooltip" title="FB: {{ $configs['facebook_name'] }}">
                    <div>
                        <i class="fa fa-facebook"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ $configs['instagram_url'] }}" data-toggle="tooltip" title="IG: {{ $configs['instagram_name'] }}">
                    <div>
                        <i class="fa fa-instagram"></i>
                    </div>
                </a>
            </li>
            <li>
                <div>
                    <a href="//line.me/ti/p/~{{ $configs['line_id'] }}" data-toggle="tooltip" title="Line ID: {{ $configs['line_id'] }}">
                        <div>
                            <i>
                                <img src="{{ asset('assets/img/line.png') }}" width="22" height="22" style="margin-top: -4px; margin-left: -2px">
                            </i>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
        <!-- End Social Icons-->
    </div>
    <!-- End Footer Top-->

    <!-- footer Down-->
    <div class="footer-down">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&copy; 2018 Sport System . All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer Down-->
</footer>