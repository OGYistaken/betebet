


<?php
function head(){
     echo ' <app-header>
                    <header class="clear" header-resize="" id="header">
                        <div class="hdr-cntr">
                            <div class="hdr-top container" id="menu-wrapper">
                                <a class="lg-cntr left" name="logo" href="index.html"><img class="lg" src="assets/images/logo.png" alt="betebet"></a>
                                <div class="mn-menu-wrapper">
                                    <div class="mn-menu">
                                        <ul data-element="mn-cont">
                                            <li data-order="1"><a class="two-rows" routerlinkactive="active" href="livecasino.html"><i class="none" aria-hidden="true"></i><span class="mn-menu-item-first">Canlı</span><span class="mn-menu-item-last">Casino </span></a></li>
                                            <li data-order="2"><a class="two-rows" routerlinkactive="active" href="casino.html"><span class="mn-menu-item-first fix-hide">SLOT</span><span class="mn-menu-item-last fix-hide">Oyunlar</span><span class="fix-show" style="display:none">Slot Oyunlar</span></a></li>
                                            <li data-order="3"><a class="two-rows" routerlinkactive="active" href="sportsbook.html"><i class="none" aria-hidden="true"></i><span class="mn-menu-item-first">Spor</span><span class="mn-menu-item-last">Bahisleri </span></a></li>
                                            <li data-order="4"><a class="two-rows" routerlinkactive="active" href="livesports.html"><i class="none" aria-hidden="true"></i><span class="mn-menu-item-first">Canlı</span><span class="mn-menu-item-last">Bahisler </span></a></li>
                                            <li data-order="5"><a class="two-rows" routerlinkactive="active" href="bingo.html"><i class="none" aria-hidden="true"></i><span class="mn-menu-item-first">Canlı</span><span class="mn-menu-item-last">Tombala </span></a></li>
                                            <li data-order="6"><a class="two-rows" routerlinkactive="active" href="aviator.html"><span class="mn-menu-item-first">Aviator</span>
                                                    <span class="mn-menu-item-last">Oyunu</span>
                                                </a>
                                            </li>
                                            <li data-order="7">
                                                <a class="two-rows virtual" data-activates="virtual-drop" materialize="dropdown">
                                                    <div class="wrapper"><i class="none" aria-hidden="true"></i><span class="mn-menu-item-first">Sanal</span><span class="mn-menu-item-last">Sporlar </span></div>
                                                    <i class="material-icons pg-icons right">arrow_drop_down</i>
                                                </a>
                                                <ul class="dropdown-content" id="virtual-drop" style="white-space: nowrap; position: absolute; top: 40px; right:14%; display: none; opacity: 1;">
                                                    <li><a href="virtual.html"><i class="svg-font-icons sport-types-1 pg-icons left"></i> Sanal Dünya Kupası </a></li>
                                                    <li><a href="virtual.html"><i class="svg-font-icons sport-types-1 pg-icons left"></i> Sanal Futbol Lig Mod </a></li>
                                                    <li><a href="virtual.html"><i class="svg-font-icons sport-types-1 pg-icons left"></i> Sanal Avrupa Kupası </a></li>
                                                    <li><a href="virtual.html"><i class="svg-font-icons sport-types-1 pg-icons left"></i> Sanal Futbol Nations Cup </a></li>
                                                    <li><a href="virtual.html"><i class="svg-font-icons sport-types-2 pg-icons left"></i> Sanal Basketbol </a></li>
                                                    <li><a href="virtual.html"><i class="st-font-icons sport-types-1 pg-icons"></i> Sanal Asian Kupası </a></li>
                                                    <li><a href="virtual.html"><i class="st-font-icons sport-types-1 pg-icons"></i> Sanal Şampiyonlar Kupası </a></li>
                                                    <li><a href="virtual.html"><i class="svg-font-icons sport-types-1005 pg-icons left"></i> Sanal Köpek Yarışı </a></li>
                                                    <li><a href="virtual.html"><i class="svg-font-icons sport-types-1004 pg-icons left"></i> Sanal At Yarışı </a></li>
                                                </ul>
                                            </li>
                                            <li data-order="8"><a class="two-rows" routerlinkactive="active" href="promotions.html"><i class="none" aria-hidden="true"></i><span class="mn-menu-item-first">Özel</span><span class="mn-menu-item-last">Bonuslar </span></a></li>
                                            <li data-order="9"><a class="two-rows" href="#" routerlinkactive="active"><span class="mn-menu-item-first fix-hide">betebet</span><span class="mn-menu-item-last fix-hide"> Ortaklık</span><span class="fix-show" style="display:none">betebet Ortaklık</span></a></li>
                                            <li class="counter" data-element="dropdown-wrapper" style="display:none">
                                                <a class="dropdown-button" data-activates="dropdown-responsive-menu" href="javascript:;" materialize="dropdown"><span class="menu-count" data-element="dropdown-button">+0</span><i class="material-icons pg-icons right">arrow_drop_down</i></a>
                                                <ul class="dropdown-content main-menu-drop" data-element="dropdown-container" id="dropdown-responsive-menu"></ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="hdr-usr-mn fix-show" data-element="usr-mn" style="display: none">
                                        <div class="wrapper">
                                                                                        <div class="logout-menu right">
                                                <ul class="customer-links">
                                                    <li><a class="forgot-password" href="#"><span>Şifremi Unuttum</span></a></li>
                                                </ul>
                                                <a class="login-btn" href="javascript:;" onclick="loginorpay()"><span><i class="material-icons">https</i> Giriş </span></a><a class="register-btn" href="register.html"><span><i class="material-icons">person</i> Üye Ol </span></a>
                                            </div>
                                                                                    </div>
                                    </div>
                                    <div class="hdr-usr-mn non-fixed fix-hide">
                                        <ul class="customer-links">
                                            <li><a class="bank fix-hide" href="#"><span><i class="material-icons">play_arrow</i> Cepbank guide </span></a></li>
                                        </ul>
                                                                                <div class="logout-menu right fix-show">
                                            <ul class="customer-links">
                                                <li><a class="forgot-password" href="#">Şifremi Unuttum</a></li>
                                            </ul>
                                            <a class="login-btn" href="javascript:;" onclick="loginorpay()"><span><i class="material-icons">https</i> Giriş </span></a><a class="register-btn" href="register.html"><span><i class="material-icons">person</i> Üye Ol </span></a>
                                        </div>
                                                                            </div>
                                </div>
                            </div>
                        </div>
                    </header>
                </app-header>';
}   
?>


<?php

function foote(){
    echo '<app-footer>
    <footer class="page-footer clear" id="fc">
        <div class="footer-top flex-container">
            <div class="footer-partner container">
                <a class="logo" href="index.html"><img src="assets/images/logo-footer.png" alt="betebet"></a>
                <div class="flex-item"><i class="pronetgaming"></i><i class="xpro"></i><i class="netent"></i><i class="evolution"></i><i class="betgames"></i><i class="ezugi"></i></div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="row container">
                <div class="footer-middle-wrapper">
                    <div class="footer-menu-wrapper col m3 s6">
                        <h5 class="footer-menu-title"> Hakkımızda </h5>
                        <ul class="footer-menu">
                            <li><a href="#us">Şirket Hakkında</a></li>
                            <li><a href="#us-gen-terms-cond">Genel Şartlar ve Kurallar</a></li>
                            <li><a href="#us-responsible-gaming">Sorumlu Oyun</a></li>
                            <li><a href="#us-privacy-policy">Gizlilik Politikası</a></li>
                            <li><a href="#us-terms-of-use">Kullanım Kuralları</a></li>
                            <li><a href="#us-contact">Bize Ulaşın</a></li>
                        </ul>
                    </div>
                    <div class="footer-menu-wrapper col m3 s6">
                        <h5 class="footer-menu-title"> Destek </h5>
                        <ul class="footer-menu">
                            <li><a href="#rules">Kurallar</a></li>
                            <li><a href="#faq">SSS (Sıkca Sorulan Sorular)</a></li>
                            <li><a href="#">Bonus</a></li>
                            <li><a href="#general-rules">Genel Bonus Kuralları</a></li>
                            <li><a href="#payments">Ödemeler</a></li>
                        </ul>
                    </div>
                    <div class="footer-menu-wrapper col m3 s6">
                        <h5 class="footer-menu-title"> Kısa Yollar </h5>
                        <ul class="footer-menu">
                            <li><a href="sportsbook.html">Spor Bahisleri</a></li>
                            <li><a href="livesports.html">Canlı Bahis</a></li>
                            <li><a href="livecasino.html">Canlı Casino</a></li>
                            <li><a href="casino.html">Casino</a></li>
                            <li><a href="bingo.html">Canlı Tombala</a></li>
                            <li><a class="two-rows" href="index.html">betebet Ortaklık</a></li>
                        </ul>
                    </div>
                    <div class="footer-menu-wrapper col m3 s6">
                        <h5 class="footer-menu-title"> Beğen </h5>
                        <social-links classes="social-links">
                            <ul class="social-links">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                                      

                            </ul>
                        </social-links>
                        <div class="license">
                            <app-static-inner-content contentcode="licence-html">
                                <div extroutelink="">
                                    <div id="apg-seal-container" data-apg-seal-id="56d2f4da-7281-4cae-8ab7-1e17de60de37" data-apg-image-size="64" data-apg-image-type="basic-small">
                                        <div style="display: block; position: relative; overflow: hidden; max-width: 64px;min-width: 32px;"> <a rel="nonoopener" id="apg-seal-link" href="#"> <img style="min-height: 100%; position: absolute; top: 0; left: 0; max-width: none; max-height: 100%;" src="assets/images/verify.png"> </a> </div>
                                    </div>
                                </div>
                                <div></div>
                                <div></div>
                            </app-static-inner-content>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-wrapper">
                    <div class="copyright">
                        <div class="brand white-txt"> © 2022 - betebet +18 </div>
                    </div>
                    <language>
                        <ul class="lang-wrapper flex-container">
                            <li><a href="javascript:;"><span class="country-cont"><i class="country pg-icons icon-32x160 active"></i></span></a></li>
                            <li><a href="javascript:;"><span class="country-cont"><i class="country pg-icons icon-32x148"></i></span></a></li>
                        </ul>
                    </language>
                </div>
            </div>
        </div>
        <div class="scroll-top-btn left animated fadeInDown" scroll-top="" style="display: none;"><i class="fa fa-arrow-up"></i></div>,


    </footer>

</app-footer>';
}

?>