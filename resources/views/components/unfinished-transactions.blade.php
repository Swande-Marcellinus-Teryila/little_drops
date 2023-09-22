<script src="{{asset('assets/js/unfinished-transactions.js')}}"></script>
<div style="margin-bottom:30px;">
@foreach($unfinished_transactions as $unfinished_trans)
@if($unfinished_trans->user_id==auth()->user()->id)

@if($unfinished_trans->i_have_payed==0 && $unfinished_trans->merge_status==1)
<div class="alert alert-success">
<P class="text-dark">

<p>Pay
  @if($unfinished_trans->get_my_referral->level==0) ₦1,000
  @elseif($unfinished_trans->get_my_referral->level==1) ₦10,000 
  @elseif($unfinished_trans->get_my_referral->level==2) ₦10,000  
  @elseif($unfinished_trans->get_my_referral->level==3) ₦20,000
  @elseif($unfinished_trans->get_my_referral->level==3) ₦30,000
  @elseif($unfinished_trans->get_my_referral->level==3) ₦40,000
  @elseif($unfinished_trans->get_my_referral->level==3) ₦87,000
 
  @endif  to {{$unfinished_trans->get_my_referral->account_name}}</p>
<p>Bank: {{$unfinished_trans->get_my_referral->bank_name}}</p>
<p>Account Number: {{$unfinished_trans->get_my_referral->account_no}}</p>
<p>Contact: {{$unfinished_trans->get_my_referral->phone}}</p>
<p class="alert alert-warning">You have 12 hours to make this payment. Click on the "I have paid" button after making payment. Thank you. </p>
<span><button class="btn btn-primary" id="i_have_paid_btn">I have Paid</button>
  

  
  <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#cantpay">
    I can't Pay
  </button>
<!-- Fancy Modal -->
<div class="modal fade" id="cantpay" tabindex="-1" aria-labelledby="fancyModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header bg-primary">
  <h5 class="modal-title text-white" id="fancyModalLabel">Can't Pay</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
  <p><h6>Are you sure?
  </h6>
    </p>
  
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-danger" onclick="cantPay({{auth()->user()->id}})" data-bs-dismiss="modal">Yes</button>
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go back</button>
</div>
</div>
</div>
</div>
  @endif

@if($unfinished_trans->i_have_payed==1&& $unfinished_trans->merge_status==1 && $unfinished_trans->is_payment_confirmed== 0)
<div class="alert alert-success">
  Please hold on for the receiver to confirm your payment, or better still, 
  call him/her to confirm your payment now. Thank you.
 <div> Username: {{$unfinished_trans->get_my_referral->username}}</div>
 <div>Phone: {{$unfinished_trans->get_my_referral->phone}}</div>
 <div>            <p>
  <a href="https://api.whatsapp.com/send?phone=234{{$unfinished_trans->get_my_referral->phone}}" target="_blank">
  <i class=" text text-success fa-3x fa fa-whatsapp"></i> click to chat with {{$unfinished_trans->get_my_referral->username}}
</a>
</p></div>
 
</div>
@elseif($unfinished_trans->i_have_payed==1  && $unfinished_trans->is_payment_confirmed== 1)
<div class="alert alert-success">

  {{$unfinished_trans->get_my_referral->username}}, confirmed your payment successfully.
</div>
@endif

@endif
@endforeach

@foreach($my_member_info as $confirm_payment)
@if($confirm_payment->referral_code== auth()->user()->code && $confirm_payment->is_payment_confirmed==0 && $confirm_payment->i_have_payed==1)
<div class="alert alert-info">
 <b>Please confirm payment from {{$confirm_payment->get_my_member->username}}</b>
 <br>
   <button class="btn btn-primary" onclick="confirmPayment('{{$confirm_payment->get_my_member->id}}')">Confirm payment</button>
</div>
@endif

 @endforeach

</div>

</div>