<!-- Footer area start -->
<div class="footer-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="footer-menu">
                    <ul>                            
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Community guidline</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="footer-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="footer-cp-text">
                    <p>&copy; <?= date('Y') ?> - All rights are reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer area End -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/Popper.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/jquery.meanmenu.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="http://cdn.craig.is/js/rainbow-custom.min.js"></script>
<script src="https://cdn.plyr.io/3.5.2/plyr.polyfilled.js"></script>
<!-- <script type="text/javascript" src="assets/plugin/plyr/plyr.js"></script> -->
<script type="text/javascript">
    const player0 = new Plyr('#player0', {
        /*title: "Video",
        enabled: true,
        debug: true,
        controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'],
        settings: ['captions', 'quality', 'speed', 'loop'],
        blankVideo: 'https://cdn.plyr.io/static/blank.mp4',
        autoplay: false,
        displayDuration: true,
        speed: { 
            selected: 1, 
            options: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2] 
        },
        seekTime: 10,
        volume: 1,
        muted: false,
        clickToPlay: true,
        disableContextMenu: true,
        hideControls: false,
        resetOnEnd: false,
        keyboard: { 
            focused: true, 
            global: false 
        },
        tootips: { 
            controls: false, 
            seek: true 
        },
        duration: null,
        displayDuration: false,
        invertTime: true,
        captions: { 
            active: false, 
            language: 'auto', 
            update: false 
        },
        fullscreen: { 
            enabled: true, 
            fallback: true, 
            iosNative: false 
        },
        ratio: '16:9',
        previewThumbnails: { 
            enabled: false, 
            src: '' 
        }*/
    });

    const player1 = new Plyr('#player1', {
    });

    const player2 = new Plyr('#player2', {
    });

    const player3 = new Plyr('#player3', {
    });

    const player4 = new Plyr('#player4', {
    });

    const player5 = new Plyr('#player5', {
    });

    const player6 = new Plyr('#player6', {
    });

    const player7 = new Plyr('#player7', {
    });

    const player8 = new Plyr('#player8', {
    });

    const player9 = new Plyr('#player9', {
    });

    const player10 = new Plyr('#player10', {
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $.datetimepicker.setLocale('en');
        $('#datetimepicker').datetimepicker({
            format:'Y-m-d h:i:s a'
        });
    });
</script>