<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="tr">


<!-- Mirrored from betebet486.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jul 2022 10:07:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>Betebet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/static/style.css">
    <link rel="stylesheet" href="assets/css/masterslider.css">
    <link rel="stylesheet" href="assets/css/masterslider.style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <meta name="author" content="Betebet">
    <meta name="description" itemprop="description" content="Betebet - En Güvenilir Online Bahis ve Casino Sitesi">
    <meta name="keywords" itemprop="keywords" content="bahis, canlı bahis, canlı casino, kumar, yasal bahis, iddaa, hazır kupon, tahmin, banko, oran, pronetgaming, futbol, rulet, poker, casino, maç sonuçları ,free spin , slot, papara, payfix, casino, iddia, casino, basketbol, bonus">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jQuery.easing.js"></script>
    <script src="assets/js/masterslider.min.js"></script>
    <script>
        let logged = false;
        let locate = 0;
        let phone_status = 0;
        let passport_status = 0;
    </script>
</head>

<body style="padding-top: 0px;" class="page-main">
    <app-root ng-version="8.2.14">
        <router-outlet>
            <preloader>
            </preloader>
        </router-outlet>
        <app-out-component>
            <div id="sticky-container">
                <!-- header !-->
                <?php head(); ?>
            <main>
    <router-outlet></router-outlet>
    <app-main-page>
        <slider>
        </slider>
        <app-static-inner-content contentcode="landing">
            <div extroutelink="">
                <div class="slider-container">
                    <div class="master-slider ms-skin-default" id="masterslider"></div>

                </div>
                <div class="homepage-games-container">
                    <div class="homepage-games container">
                        <div class="homepage-games-content">
                            <div class="homepage-games-title">NETENT</div>
                            <div class="homepage-games-subtitle">SLOT OYUNLARI</div>
                            <ul>
                                <li>
                                    <a href="casino.html">
                                        <img src="assets/static/img/netent/gonzosquest.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="casino.html">
                                        <img src="assets/static/img/netent/bloodsuckers.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="casino.html">
                                        <img src="assets/static/img/netent/deadoralive.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="casino.html">
                                        <img src="assets/static/img/netent/alienrobots.png">
                                    </a>
                                </li>
                            </ul>
                            <div class="homepage-games-title">CANLI CASINO</div>
                            <div class="homepage-games-subtitle">OYUNLARI</div>
                            <ul>
                                <li>
                                    <a href="livecasino.html">
                                        <img src="assets/static/img/canli-casino/canlirulet.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="livecasino.html">
                                        <img src="assets/static/img/canli-casino/canliblackjack.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="livecasino.html">
                                        <img src="assets/static/img/canli-casino/canlitombala.png">
                                    </a>
                                </li>
                                <li>
                                    <a href="livecasino.html">
                                        <img src="assets/static/img/canli-casino/canlipoker.png">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </app-static-inner-content>
    </app-main-page>
</main>
    <?php foote();?>
</div>
</app-out-component>
</app-root>
  <div id="sgn-mdl" class="modal open">
    <a class="modal-action modal-close" href="javascript:;" onclick="closemodal()"><i class="material-icons pg-icons">close</i></a>
    <div class="modal-content">
      <app-login class="ng-star-inserted">
        <form class="login-form" id="login_form">
          <div class="title"><i class="fa fa-unlock-alt pg-icons fa-fw"></i> Giriş </div>
          <div class="loginSteps lg-frm-content">
            <div id="step_1">
              <input type="text" name="login" class="validate browser-default" required="" placeholder="Kullanıcı adı">
              <div class="input-field password">
                <input type="password" name="password" class="validate browser-default" required="" placeholder="Şifreniz">
                <password-eye el="login-password">
                  <a class="btn password-eye toogle-btn"><i class="fa fa-eye show"></i><i class="fa fa-eye-slash dont-show"></i></a>
                </password-eye>
              </div>
            </div>
            <div id="step_2" class="dnone">
                                        </div>
            <button type="submit" onclick="logIn()" class="btn sgn-btn"><i class="material-icons pg-icons">send</i><span>Giriş Yap</span></button>
            <div class="flex-container ftgtpass-nwacc">
              <a class="btn flex-item ftgtpass" href="#"><i class="fa fa-key pg-icons"></i> Şifremi Unuttum </a>
              <a class="btn flex-item nwacc" href="register.html"><i class="material-icons pg-icons">content_paste</i> Yeni hesap oluştur </a>
            </div>
          </div>
        </form>
      </app-login>
    </div>
  </div>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="assets/js/app3860.js?v=1"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/static/js/betebet.custom.js"></script>

</body>


<!-- Mirrored from betebet486.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jul 2022 10:07:41 GMT -->
</html>