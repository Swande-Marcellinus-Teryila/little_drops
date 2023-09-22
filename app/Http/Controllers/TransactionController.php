<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function invest(){
       $transaction  = new Transaction();
       
        if(!$transaction->iHavePayed(auth()->user()->id) || !$transaction->isPaymentConfirmed()){

            return response(["message"=>"Sorry, you have at least one unfinished transactions. 
            Try again when all transactions are completed. Thank you."]);
        }

        if(!$transaction->isUserCashout()){
            return response(["message"=>"Please make sure your cashout before  you  make your next investment"]);
        }
          
     
        if(is_null($transaction->getCurrentTransaction())){
           $transaction->invest();
            

        }else{
        if($transaction->getCurrentTransaction()->i_have_payed==0 ||$transaction->getCurrentTransaction()->is_payment_confirmed==0){
            return response(["message"=>"Sorry, you have at least one unfinished transactions. 
            Try again when all transactions are completed. Thank you."]);
        }
        elseif($transaction->getCurrentTransaction()->cash_out_status==0 &&$transaction->getCurrentTransaction()->user->level>0){
        
            return response(["message"=>"Sorry, you have to withdraw all your money first.Click the cash out button. Thank you."]);
        }
        else{
        if($transaction->UserAlreadyTransacted()){
            $level = $transaction->checkUserLevel();
            $level =$level[0]->level+1;
            $users_to_invest = $transaction->getUserToInvest($level);

        
            $user_id = $transaction->getValidUserToInvest($users_to_invest);
            if(is_null($user_id)){
                $transaction->invest(" "); 
                return response(["message"=>"Thank you, We will soon merge you with another user"]);
            }else{
                $user_code =$transaction->getUser($user_id)->code;
                $transaction->invest($user_code); 
            }
        }else{
            $transaction->invest(); 
        }
        
         
            
        }
    }
    }


    public function cashout(){
        $transaction = new Transaction();
        $user = new User();
        if(!$user->checkThreeRefferal(auth()->user()->code)){
            return response(["message"=>"Sorry, you must refer at least three (3) persons to Little Drops before you can start to cash out. Thank you"]);     
        }
        if(!$transaction->iHavePayed(auth()->user()->code) || !$transaction->isPaymentConfirmed()){
            return response(["message"=>"Sorry, you have at least one unfinished transactions. 
            Try again when all transactions are completed. Thank you."]);
           
        }

        if(auth()->user()->level == 2 && $transaction->little_drop_payment_status==0){
            return response(["message"=>"Sorry, Your payment  to little drop have not being confirmed
            Please try again later"]);     
        }
        elseif((auth()->user()->level == 4 && $transaction->little_drop_payment_status==0)){
            return response(["message"=>"Sorry, Your payment  to little drop have not being confirmed
            Please try again later"]);     
        }
        elseif((auth()->user()->level == 5 && $transaction->little_drop_payment_status==0)){
            return response(["message"=>"Sorry, Your payment  to little drop have not being confirmed
            Please try again later"]);     
        }
        
     
        if($transaction->cashout()==0){
            return response(["message"=>"Please click on the invest button to start your investment."]);
        }else{
            
          // $transaction->cashout();
           $transaction->updateLevel();
           if($transaction->UserAlreadyTransacted()){
            $level = $transaction->checkUserLevel();
            $level =$level[0]->level;
        
            $transaction->filterUnmergedUsers($level);

        }
            }
        
        }
    


    public function getUnFinishedTransactions(){
        $transaction = new Transaction();
        $unfinished_transactions =$transaction->getUnfinishedTransactions();
        $my_member_info = $transaction->getPaymentConfirmation();
        return view('components.unfinished-transactions',
        [
            'unfinished_transactions'=>$unfinished_transactions,
            'my_member_info' =>$my_member_info
        ]);

    } 

    public function i_have_paid(){
        $transaction = new Transaction();
        $transaction->signifyPayment();
        
       
    }
    public function confirm_payment($member_id)
    {   $transaction = new Transaction();
        $transaction->confirmPayment($member_id);  
    }

    public function downliners(){
        $transaction = new Transaction(); 
       
       $result = $transaction->getDownliners(auth()->user()->code);
    
        return json_encode($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
