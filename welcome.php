<style>
    /* Make the image fully responsive */
    .carousel-inner .img1 {
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(img/img1.jpg);
        background-size: cover;
        background-position: center;
    }

    .carousel-inner .img2 {
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(img/img2.jpg);
        background-size: cover;
        background-position: center;
    }

    .carousel-inner .img3 {
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(img/img3.jpg);
        background-size: cover;
        background-position: center;
    }

    .carousel-caption {
        margin: 25% 0;
        font-size: 18px/36px;
        font-weight: bold;
    }
</style>


<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="img1"></div>
            <div class="carousel-caption">
                <h2>Welcome Admin!!</h2>
                <p>Selamat Datang Admin!</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="img2"></div>
            <div class="carousel-caption">
                <h2>cara kerja</h2>
                <p>inputkan gejala yang dialami kendaraan Anda!</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="img3"></div>
            <div class="carousel-caption">
                <h2>Green Enery</h2>
                <p>can saving this planet</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>