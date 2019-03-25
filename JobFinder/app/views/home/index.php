<?php require APPROOT . '/views/includes/header.php'; require APPROOT . '/views/includes/navbar.php'; ?>

<div class="">
    <div class="container my-5">
        <div class="jumbotron">
            <h1 class="text-center">Job Finder</h1>      
            <p class="text-center">Job Finder is a website that helps you creating your own CV then searching for a job that fits your knowledge.</p>
        </div>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://fbnewsroomus.files.wordpress.com/2018/02/16344637_1831852097027364_8648633785480380416_n.png?w=676" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>Los Angeles</h3>
                    <p>We had such a great time in LA!</p>
                </div>   
            </div>
            <div class="carousel-item">
                <img src="https://www.cer.eu/sites/default/files/styles/spotlight/public/images/spotlight/page/2011/jobs_sl-1329305028.jpg?itok=7MyY4FfX" alt="Chicago" >
                <div class="carousel-caption">
                    <h3>Chicago</h3>
                    <p>Thank you, Chicago!</p>
                </div>   
            </div>
                <div class="carousel-item">
                    <img src="https://pbs.twimg.com/media/Dtz_cPJXcAMgofd.jpg:large" alt="New York" >
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>   
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>