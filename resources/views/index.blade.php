@extends('mylayouts.app')
@section('meta_tags')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
@endsection
@section('title')
    home - little drops
@endsection


@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body text-center">

                                                <h4 class="card-text text-info">Invest ₦1,000 and get ₦87,000 In</h4>
                                                <h3 class="text text-success">21 DAYS!</h3>
                                                <p>  <a href="{{ url('register') }}" class="btn btn-primary btn-md">Join Now</a></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h4 class="text-white bg-danger">HOW IT WORKS</h4>
                                               
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 ">
                                        <div class="card shadow-lg">
                                            <div class="card-body text-center  border border-primary">
                                                <p class="text-dark h6 border-primary">
                                                    Invest  ₦1,000 & refer three(3) people to Little Drops</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 ">
                                        <P class="h5 text-center mt-3 text-primary">LEVEL 1</P>
                                        <div class="card shadow-lg">
                                            <div class="card-body text-center">
                                                
                                                <p class="text-dark h6">Cash out ₦3,000 in 24 hrs or less. Then invest ₦3,000 to cashout ₦6,000 at level 2 
                                                    <br><br>.</p>
                                                <p class="text-dark">No referral needed</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <P class="h5 text-primary mt-3 text-center">LEVEL 2</P>
                                        <div class="card shadow-lg">
                                            <div class="card-body text-center">
                                                <p class="text-dark h6">Cash out ₦6,000 in 2 days or less.
                                                     Then invest ₦3,000 to cashout ₦6,000
                                                    (₦5,000 + ₦1,000) to cash out ₦10,000 at level 3</p>
                                                <p class="text-dark">No referral needed</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <P class="h5 text-primary mt-3 text-center">LEVEL 3</P>
                                        <div class="card shadow-lg">
                                            <div class="card-body text-center">
                                                <p class="text-dark h6">Cash out ₦10,000 in 3 days or less.
                                                     Then invest ₦10,000 to cashout ₦20,000 at level 4</p>
                                                <p class="text-dark">No referral needed</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <P class="h5 text-primary mt-3 text-center">LEVEL 4</P>
                                        <div class="card shadow-lg">
                                            <div class="card-body text-center">
                                                <p class="text-dark h6">Cash out ₦20,000 in 3 days or less.
                                                     Then invest ₦18,000 
                                                    (₦15,000 + ₦3,000) to cash out ₦30,000 at level 5</p>
                                                <p class="text-dark">No referral needed</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <P class="h5 text-primary mt-3 text-center">LEVEL 5</P>
                                        <div class="card shadow-lg">
                                            <div class="card-body text-center">
                                                <p class="text-dark h6">Cash out ₦30,000 in 3 days or less. 
                                                    Then invest ₦25,000
                                                    (₦20,000 + ₦5,000) to cash out ₦40,000 at level 6</p>
                                                <p class="text-dark">No referral needed</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <P class="h5 text-primary mt-3 text-center">LEVEL 6</P>
                                        <div class="card shadow-lg">
                                            <div class="card-body text-center">
                                                <p class="text-dark h6">Cash out ₦40,000 in 4 days or less.
                                                     Then invest ₦40,000 to cashout ₦80,000 to cash out ₦30,000 at level 7</p>
                                                <p class="text-dark">No referral needed</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <P class="h5 text-primary mt-3 text-center">LEVEL 7</P>
                                        <div class="card shadow-lg">
                                            <div class="card-body text-center">
                                                <p class="text-dark h6">Cash out ₦80,000 in 5 days or less.</p>
                                                <p class="text-dark">No referral needed</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 border border-primary">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text text-dark h6">
                            Little Drops is a
                            member-to-member lending and borrowing platform that
                            affords you the opportunity for financial liberty through
                            cooperate efforts. Risk ₦1,000 only, and make a guaranteed
                            sum of ₦ 87,000 in 21 days or less</p>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
@endsection
