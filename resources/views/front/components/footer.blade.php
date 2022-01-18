<!--====== Footer Start ======-->

<footer class="footer-area-2">
    <div class="footer-text-2">
        <div class="container">
            <div class="footer-text-wrapper d-flex flex-wrap align-items-center justify-content-between">
                <div class="footer-copyright-2">
                    <p>{{ siteSetting()['copyright'] ?? '' }}</p>
                </div>
                <div class="footer-social-2">
                    <span class="label">{{ siteSetting()['home_footer_follow_us_text'] ?? '' }}</span>
                    <ul class="socia">
                        <li><a href="{{ siteSetting()['twitter'] ?? '' }}"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="{{ siteSetting()['facebook'] ?? '' }}"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="{{ siteSetting()['instagram'] ?? '' }}"><i class="ion-social-instagram-outline"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--====== Footer Ends ======-->
