<div id="content" style="min-height:87vh">
    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center pt-5">
            <div class="col-lg-7">
                <!-- <img class="d-blobk w-100 feature" src="<?= BASE_URL; ?>/assets/img/barangays.jpg" height="400px" alt="..." /> -->
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <a class="nav-link" href="#"><img src="<?= BASE_URL . "assets/home/img.jpg"; ?>" style="height:400px;" class="d-block w-100" alt="" /> </a>
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <a class="nav-link" href="#"><img src="<?= BASE_URL . "assets/home/img2.jpg"; ?>" style="height:400px;" class="d-block w-100" alt="" /> </a>
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <a class="nav-link" href="#"><img src="<?= BASE_URL . "assets/home/img3.jpg"; ?>" style="height:400px;" class="d-block w-100" alt="" /> </a>
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Welcome to E-Barangay Site!</h1>
                <a class="btn btn-success btn-view" href="#!" name="landing_page/register">Signup</a>
            </div>
        </div>
        <!-- Call to Action-->
        <!-- <div class="card text-white bg-dark my-5 text-center">
            <div class="card-body">
                <p class="text-white m-0">This call to action card is a great place to showcase some important information or display a clever tagline!</p>
            </div>
        </div> -->
        <div class="d-flex flex-col flex-wrap text-center">

            <div class="flex flex-col flex-fill mt-5 mb-4">
                <h2 class="fw-normal">Get in Touch</h2>
                Barangay Wawa is devoted to satisfying your expectations. Do you have any queries, feedback, complaints and/or recommendations? We'd be delighted to know your thoughts, so please feel free to contact us anytime.
            </div>

            <div class="align-items-center my-4" style="width: 100%;">
                <h4 class="fw-normal">NEW BARANGAY HALL</h4>
                DAMA DE NOCHE ST. WAWA, TAGUIG CITY
            </div>
            <div class="w-50 align-items-center my-4">
                <h4 class="fw-normal">BARANGAY WAWA HOTLINE</h4>
                Cel. No.: 0945 849 0538
            </div>
            <div class="w-50 align-items-center my-4">
                <h4 class="fw-normal">PEACE AND ORDER</h4>
                Cel. No.: 0926 730 0576

            </div>
        </div>

        <div class="mapouter w-100 my-3">
            <div class="gmap_canvas">
                <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=G3CG+P2F,%20Taguig,%20Metro%20Manila&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2piratebay.org"></a><br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 500px;
                        width: 100%;
                    }

                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 500px;
                        width: 100%;
                    }

                    .footer-icons>a>i {
                        padding: 10px;
                        width: 50px;
                        font-size: 30px;
                        margin: 5px 2px;
                        color: white;
                        cursor: pointer;
                    }

                    .footer-icons>a>i.fa-twitter {
                        background: #55ACEE;
                    }

                    .footer-icons>a>i.fa-facebook {
                        background: #3B5998;
                    }

                    .footer-icons>a>i.fa-instagram {
                        background: #125688;
                    }

                    .footer-icons>a>i:hover {
                        opacity: 0.7;
                    }
                </style>
            </div>
        </div>
        <div class="d-flex footer-icons justify-content-center">
            <a href="https://twitter.com/IloveTaguig1" target="_blank"><i class="fa fa-twitter"> </i></a>
            <a href="https://www.facebook.com/barangay.wawa.73" target="_blank"><i class="fa fa-facebook"> </i></a>
            <a href="#"><i class="fa fa-instagram"> </i></a>
        </div>
    </div>
</div>