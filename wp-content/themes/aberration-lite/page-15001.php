<?php
/**
 * A template for the blog home page.
 *
 * This template is used when a home.php file exists, otherwise it uses the index.php template.
 * This template will load your blog post summaries.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Senses
 */
get_header();
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
    div#footer
    {
        margin-top:auto!important;
    }
    .serch_package {
        margin: 0;
        /* visibility: visible; */
        padding: 0;
        border: 5px solid #ccc;
        border-radius: 10px;
        margin: 25px 0px;
        position:relative;
    }
    .serch_package:hover
    {
        border-color: #158e88;
    }
    .serch_info_box {
        padding: 25px;

    }
    i.fa.fa-calendar {
        font-size: 25px;

        margin-left: 23px;
        /* margin-top: 21px; */
        line-height: 70px;
    }
    .round-icon {
        width: 70px;
        height: 70px;
        background-color:#2b8084;
        color: #fff;
        border-radius: 50%;
        position: absolute;
        top: -35px;
        left: 38%;
    }
    .round-icon:hover
    {
        background-color: #52b287;
        color: #f7e9d2;
        cursor: pointer;
    }
    .user_image img
    {
        height: 200px;
        width: 200px;
    }
    .user_image {
        text-align: center;
        margin-bottom: 30px;
        margin-top: 30px;
    }
    a.btn.btn-default.btn_agent_name {
        width: 100%;
        padding: 12px;
        margin-top: 25px;
        border-radius: 4px;
        font-weight: 700;
        color: #fff;
        font-size: 15px;
        background-color: #61ce70;
        border-color: #61ce70;
    }
    a.btn.btn-default.btn_agent_name:hover
    {
        background-color: #61ce70;
        border-color: #61ce70;
    }
    span.divider-separator {
        /* height: 100%; */
        height: 2px;
        border: 1px solid #e5e5e5;
        width: 100%;
        margin: 0 auto;
        display: block;
        background-color: #e5e5e5;
        margin-bottom: 40px;
        margin-top: 40px;
    }
    .info_booking {
        font-size: 14px;
        color: #999;
        margin-bottom: 35px;
    }
    .w3-content
    {
        max-width:200px;
        margin-top:30px;
    }
    .w3-button:hover
    {
        color:#fff!important;
        backgroung-color:transparent!important;
    }
    .w3-display-left,.w3-display-right
    {
        color:#fff;
    }
    img.mySlides {
        width: 200px;
        height: 200px;
    }
</style>

<div id="primary" class="content-area">
    <h1>Package For Sale</h1>
    <main id="main" class="site-main" itemprop="mainEntityOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="serch_package">
                        <div class="serch_info_box">
                            <div class="round-icon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <!-- slider  -->

                            <div class=" w3-content w3-display-container">
                                <img class="mySlides" src="https://www.travpart.com/English/wp-content/uploads/2018/10/Edi.jpeg">
                                <img class="mySlides" src="https://www.travpart.com/English/wp-content/uploads/2018/08/12-seats-elf.jpg">
                                <img class="mySlides" src="https://www.travpart.com/English/wp-content/uploads/2018/10/Edi.jpeg">
                                <img class="mySlides" src="https://www.travpart.com/English/wp-content/uploads/2018/08/12-seats-elf.jpg">

                                <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                                <button class="w3-button w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                            </div>

                            <!-- slider -->

                            <div class="divider">
                                <span class="divider-separator"></span>
                            </div>
                            <div class="info_booking">
                                <div class="row">
                                    <div class="col-md-6">Days</div>
                                    <div class="col-md-6">1</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Hotel Stars</div>
                                    <div class="col-md-6">***</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Location</div>
                                    <div class="col-md-6">Ahmedabad shyamal cross road , near SBI Bank ,21420</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Price per pax</div>
                                    <div class="col-md-6">$230</div>
                                </div>
                            </div>
                            <div class="agent_name_button">
                                <a href="#javascript" class="btn btn-default btn_agent_name">Sales Agent:Josafe</span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="serch_package">
                        <div class="serch_info_box">
                            <div class="round-icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="user_image">
                                <img src="https://www.travpart.com/English/wp-content/uploads/2018/10/Edi.jpeg" alt="user_img">
                            </div>
                            <div class="divider">
                                <span class="divider-separator"></span>
                            </div>
                            <div class="info_booking">
                                <div class="row">
                                    <div class="col-md-6">Days</div>
                                    <div class="col-md-6">1</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Hotel Stars</div>
                                    <div class="col-md-6">***</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Location</div>
                                    <div class="col-md-6">Ahmedabad shyamal cross road , near SBI Bank ,21420</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Price per pax</div>
                                    <div class="col-md-6">$230</div>
                                </div>
                            </div>
                            <div class="agent_name_button">
                                <a href="#javascript" class="btn btn-default btn_agent_name">Sales Agent:Josafe</span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="serch_package">
                        <div class="serch_info_box">
                            <div class="round-icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="user_image">
                                <img src="https://www.travpart.com/English/wp-content/uploads/2018/10/Edi.jpeg" alt="user_img">
                            </div>
                            <div class="divider">
                                <span class="divider-separator"></span>
                            </div>
                            <div class="info_booking">
                                <div class="row">
                                    <div class="col-md-6">Days</div>
                                    <div class="col-md-6">1</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Hotel Stars</div>
                                    <div class="col-md-6">***</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Location</div>
                                    <div class="col-md-6">Ahmedabad shyamal cross road , near SBI Bank ,21420</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Price per pax</div>
                                    <div class="col-md-6">$230</div>
                                </div>
                            </div>
                            <div class="agent_name_button">
                                <a href="#javascript" class="btn btn-default btn_agent_name">Sales Agent:Josafe</span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
</div>
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
    }
</script>

<?php get_footer(); ?>
