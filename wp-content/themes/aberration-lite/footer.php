<?php
$siteurl = site_url();
?>
    </div>
    </div>
    </div>
    </div>   
    <div class="mobileonly mobileapp" style="<?php echo ($_GET['device']=='app')?'display:none;':''; ?>">
    <div class="container">
        <div class="row">       
            <div class="col-xs-12">                
                    <table class="mobileappbg" style="width: 100%">
                        <tr style="padding:5px">
                            <td style="padding:10px"><a href="https://www.travpart.com/mobileapp/"><img src="https://www.travpart.com/English/wp-content/themes/bali/images/android.png" alt="Download our app" class="androidicon"></a></td>                    
                            <td style="padding:10px"><a href="https://www.travpart.com/mobileapp/">Download our mobile app ★★★★★</a></td>
                            <td id="closemobileapp" style="vertical-align: middle;text-align: right"><span style="padding:10px;border:1px solid white; -webkit-border-radius: 50%;-moz-border-radius: 50%;border-radius: 50%;">X</span></td>
                        </tr>
                    </table>               
            </div>               
        </div>
    </div>
</div>
    <?php if($_GET['device']!='app') { ?>
    <div id="footer">
        <div class="container">
            <div class="row mobilefooter mobilemargintop">
                <div class="col-md-3 col-sm-12">
                    <b>Powered By TourFromBali</b>
                    <br>
                    <img src="https://www.travpart.com/English/wp-content/uploads/2018/08/tourfrombaliimg.png" width="auto" style="height:60px!important" />
                    <br>
                    <a href="https://www.travpart.com/English/wp-content/themes/bali/App/travpart_english.apk"><img src="https://www.travpart.com/wp-content/themes/aberration-lite/images/dl-our-app.png" alt="download our app" width="170"></a>
                </div>
                <div class="col-md-3 mobilenone"><b>DISCOVER</b>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo $siteurl; ?>#">Americas</a></li>
                        <li><a href="<?php echo $siteurl; ?>#">Europe</a></li>
                        <li><a href="<?php echo $siteurl; ?>#">South East Asia</a></li>
                        <li><a href="<?php echo $siteurl; ?>#">Middle East</a></li>
                        </ul>
                </div>
                <div class="col-md-3 mobilenone"><b>ABOUT US</b>
                    <ul class="list-unstyled">
                        <li><a href="https://www.travpart.com/English/about-us/" target="_blank">About us</a></li>
                        <li><a href="https://www.travpart.com/blog-design/" target="_blank">Blog</a></li>
                        <li><a class="contact_us" href="https://www.travpart.com/English/contact/" target="_blank">Custom</a></li>
                        <li><a href="<?php echo $siteurl; ?>/English/travchat/">Travchat</a></li>
                        <li><a href="<?php echo $siteurl; ?>/English/Travcust">Travcust</a></li>
                           </ul>
                </div>
                <div class="col-md-3 mobilenone"><b>HELP CENTER</b>
                    <ul class="list-unstyled">
                        <li><a href="https://www.travpart.com/English/contact/" target="_blank">Contact</a></li>
                        <li><a href="https://www.travpart.com/English/termsofuse/" target="_blank">Privacy Policy and Terms of Service</a></li>
                        <li><a href="https://www.travpart.com/English/sitemap/" target="_blank">Sitemap</a></li>
                        </ul>
                </div>

                <div class="col-md-12 mobilenone">
                <table class="footertable">
                    <tr>
                        <td>INDONESIA Bali Office :</td>
                        <td>I Alamanda Office 5th floor, Jl. By Pass Ngurah Rai No. 67, Br. Kerthayasa, Kedonganan, Kuta, Kedonganan, Kuta, Badung Regency, Bali 80361, Indonesia</td>
                    </tr>
                    <tr>
                        <td>INDONESIA Jakarta Office:</td>
                        <td>Wisma 46, Jl. Jend. Sudirman, Karet Tengsin, Tanah Abang, Central Jakarta City, Jakarta 10250, Indonesia</td>
                    </tr>
                    <tr>
                        <td>CHINA Office:</td>
                        <td>9th Floor, Office 960, No. 525 Xizang Middle Road, Huangpu District, Shanghai</td>
                    </tr>
                </table>
                </div>
            </div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div class="row mobilefooter">
                <div class="col-md-8 col-sm-12">
                    All rights reserved © 2019 travpart.com
                </div>
                <div class="col-md-4 mobilenone">
                    <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
                </div>
            </div>
            <div class="mobileonly">
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
            </div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div>
         <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=tyEgx3sntsb8OZeInQTX2HmAHKe5I2PrWE4pSD3ROhLDokhHsHIOc6nqY6He"></script></span>
    </div>
    <?php } ?>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQ4N2X6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php wp_footer(); ?>
        <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 1044452724;
            var google_custom_params = window.google_tag_params;
            var google_remarketing_only = true;
            /* ]]> */

            // mobile app - traven
            $(document).ready(function() {
                $('#closemobileapp').click(function() {
                    $('.mobileapp').hide();
                    $('.mobileonly').addClass('mobilenone');
                });
            });
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
        <noscript>
            <div style="display:inline;">
                <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1044452724/?value=0&amp;guid=ON&amp;script=0" />
            </div>
        </noscript>
		</body>
        </html>