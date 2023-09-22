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
    Registration - little drops
@endsection


@section('content')
@auth 
    

  <div class="container mt-70">
    <div class="row justify-content-center">
      <div class="col-6 reg_form shadow-lg">
        
        <p><i class="fa fa-user fa-4x"></i><span class="ml-1"><b class="text-dark">
            {{auth()->user()->username}}</b></span></p>
      </div>
      <div class="col-6 reg_form shadow-lg">
        
        <b>@if(auth()->user()->level==0)
          N 0.00 Awaiting member
        @elseif(auth()->user()->level==1) 
        N 3000.00
          @endif
    </b>
      </div>

      <div class="col-md-12 ">
        
      <p><button class="h5 btn-info ">Notifications <i  class="fa fa-bell text-danger"></i></button></p>
          <div>
            <div id="transactions">
              
            </div>
          </div>
      </div>
      <div class="col-6 justify-content-center shadow-lg">
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#fancyModal">
            Invest
          </button>
        <!-- Fancy Modal -->
<div class="modal fade" id="fancyModal" tabindex="-1" aria-labelledby="fancyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="fancyModalLabel">Make Investment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><h6>You have indicated your desire to lend
             out money to another member. Please hold on while we merge
             you with a member who is ready to receive from you. Thank you.
          </h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel Request</button>
          <button type="button" class="btn btn-primary" id="invest_btn">OK</button>
        </div>
      </div>
    </div>
  </div>


  
        <p>My Referral code: {{auth()->user()->code}}</p>
      </div>
      
      <div class="col-6   shadow-lg justify-content-center">
        
        <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#cashout">
            Cashout
          </button>
        <!-- Fancy Modal -->
<div class="modal fade" id="cashout" tabindex="-1" aria-labelledby="fancyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="fancyModalLabel">Make Investment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><h6>You have indicated your desire to withdraw all the money in your wallet.
             Please hold on for the specified mumber
             of hours or days while we merge you to get paid in full. Thank you.
          </h6>
            </p>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel Request</button>
          <button type="button" class="btn btn-primary" id="cashout_btn">OK</button>
        </div>
      </div>
    </div>
  </div>
      </div>

      <div class="col-md-6"></div>

    </div>
  </div>
  

  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
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
                                       
                                    </div>
                                </div>
                            </div>

                                <div class="col-12 b " style="margin-top:10px">
                                  <p>
                                    Register with Little Drops to become an awaiting member.
                                    
                                    Invest N1,000 by clicking on the invest button on your dashboard,
                                     and refer a minimum of 3 persons to Little Drops to get promoted to Level 1,
                                       where you can cashout #3,000 after being merged with your first three 
                                       referrals who will pay you N1, 000 each. After this, you can invest and 
                                       cash out as you continue from Level 1 through level 7, making a
                                        total sum of N87, 000 at the end of your journey in Little Drops.
                                    </p>
                                    <button class="btn btn-dark">PLease Note</button>
                                   <br>
                                    <div id="stat">

                                    </div>
                                </div>

                                <div class="col-12">
                                </br>
                                <p>
                                  <button class="bg bg-dark text-white">Note</button></p>
                                <p>

                                  <ol style="list-style:circle">
                                    <li>1. N1, 000 is all you need to participate in Little Drops.</li>
                                    <li>2. It is compulsory to invite and register three (3) persons to Little Drops using your referral code.</li>
                                    <li>3. There are no losers here, just do your part and leave the rest to us.</li>
                                    <li>4. Do not fall for the temptation of registering another account for yourself or referring yourself as this will ultimately work against you by slowing you down or permanently freezing your account.</li>
                                    <li>5.  Do not click the invest button if you are not ready to make payment, very important.</li>
                                    <li>6. It is important that you call whomever is to pay you, or you are to make payment to, and inform them in time.</li>
                                    <li>7. Once you make payment, it is expedient that you click on the " I have paid " button on your dashboard.</li>
                                    <li>8. Once you receive payment, it is equally expedient that you click on the " He/She has paid " button on your dashboard or confirm payment as the case may be.</li>
                                    <li>9. Always remember to screenshot evidence of payment so you can present it to us when the need arises.</li>
                                    <li>10.  If someone fails to pay into your account after 12 hours of waiting, be calm, relaxed, and wait as we merge you with another member to pay you, and punish the previous for failing to pay you in time.</li>
                                    <li>11.  If you wish to erase your account and leave Little Drops permanently, simply go-to your profile & scroll down to the bottom of the page and click on  " Leave Little Drops permanently ".</li>
                                    
                                </ol>
                              </p>

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
@endauth
@endsection