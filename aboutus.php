<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/aboutus.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<div class="container text-center my-5">
        <h1>About Us</h1>
        <p class="lead">Meet the team behind our success.</p>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="image/Tou.jpg" alt="Vitou">
                    <div class="card-body">
                        <h5 class="card-title">Vitou Raksmey</h5>
                        <p class="card-text">FOUNDER</p>
                    </div>
                </div>
            </div>
            <!-- Add other team members similarly -->
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="image/navy.jpg" alt="Navy">
                    <div class="card-body">
                        <h5 class="card-title">Navy Him</h5>
                        <p class="card-text">CEO</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="image/manin.jpg" alt="Manin">
                    <div class="card-body">
                        <h5 class="card-title">Manin Samat</h5>
                        <p class="card-text">OWNER</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="image/kimiy.jpg" alt="Kimiy">
                    <div class="card-body">
                        <h5 class="card-title">Kim I Sok</h5>
                        <p class="card-text">TESTER</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center my-5">
        <h2 class="section-title">Our Journey</h2>
        <p class="lead">Our website has been published for 5 years and has helped thousands of users achieve their goals. With over 50,000 users having taken the exam, we are committed to providing the best educational resources and support.</p>
    </div>
    <div class="container text-center my-5">
        <h2 class="section-title">What We Offer</h2>
        <p class="lead">At REAN PHEASA, we offer a variety of services designed to help you succeed. Our comprehensive courses, expert instructors, and community support ensure that you have all the tools you need to achieve your dreams.</p>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">High-Quality Courses</h5>
                        <p class="card-text">Our courses are designed by experts and cover a wide range of topics to ensure you have the knowledge and skills needed to succeed.</p>
                    </div>
                </div>
            </div>
            <!-- Add other services similarly -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Expert Instructors</h5>
                        <p class="card-text">Learn from the best in the industry. Our instructors are highly qualified and have years of experience in their respective fields.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Community Support</h5>
                        <p class="card-text">Join a community of learners and get the support you need to stay motivated and on track. Our forums and study groups are here to help you succeed.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center my-5">
        <h2 class="section-title">Contact Us</h2>
        <p class="lead">Feel free to reach out to us via phone or follow us on social media:</p>
        <p>Tel: +855 96 122 343 | +855 11 343 344</p>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
            <!-- Add other social media links -->
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.card').hover(function(){
                $(this).toggleClass('shadow-lg');
            });
        });

    </script>

<?php include 'bfooter.php'; ?>   