<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Transaction extends Model
{ 

    use HasFactory;
    public $fillable =['user_id',
    'invest',
    'referral_code',
    'invest'];

    public  function checkTwoRefferal($referral_code){
        if($this->where('referral_code',$referral_code)->count()>2){
            return true;
           }else{
               return false;
           }
    }


    
    public function invest($referral_code=""){
        
        $referral_code=($referral_code=="")?auth()->user()->referral_code:$referral_code;
        $this->create([
            'user_id'=>auth()->user()->id,
            'referral_code'=>$referral_code,
            'invest'=>1
        ]);

    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function get_referral(){
        return $this->belongsTo(User::class,'user_id','code');
    }

    public function getCurrentTransaction(){
       return $this->with('user')->where("user_id",auth()->user()->id)->orderby('created_at','desc')->get()->first();
    }

    public function getPendingTransactions($code){
        return $this->where('referral_code',$code)->get();
    }
    public function isPaymentConfirmed(){
        if($this->where("user_id",auth()->user()->id)->where('is_payment_confirmed',0)->exists()){
            return false;
        }else{
            return true;
        }
    }

     public function iHavePayed($user_id){
        if($this->where("user_id",$user_id)->where('i_have_payed',0)->exists()){
            return false;
        }else{
            return true;
        }
    }
    public function signifyPayment(){
        $result =$this->where('user_id',auth()->user()->id)->update([
            'i_have_payed'=>1
        ]);
    }

    

    public function updateLevel(){
        User::where('id',auth()->user()->id)->update([
            'level'=>auth()->user()->level+1
        ]);
    }
    public function cashOut(){
        $result =$this->where('user_id',auth()->user()->id)
        ->where('cash_out_status',0)
        ->update([
            'cash_out_status'=>1
        ]);
    return $result;
        
    }

    public function isUserCashout(){
        if($this->where('user_id',auth()->user()->id)->where('cash_out_status',0)->exists()){
            return false;
        }else{
            return true;
        }
    }

    public function get_my_referral(){
        return $this->belongsTo(User::class,'referral_code','code');
    }

    public function get_my_member(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getUnfinishedTransactions(){

    return $this->with('get_my_referral')
    ->where('user_id',auth()->user()->id)
    ->orwhere('referral_code',auth()->user()->code)->get();
    }

    public function getPaymentConfirmation(){

        return $this->with('get_my_member')
        ->where('referral_code',auth()->user()->code)
        ->get();
        }

     public function confirmPayment($member_id){
        return $this->where('referral_code',auth()->user()->code)
        ->where("user_id",$member_id)
        ->update(['is_payment_confirmed'=>1]);
     }   

     public function UserAlreadyTransacted(){
       if($this->where('user_id',auth()->user()->id)->exists()){
        return true;
       }else{
        return false;
       }
    }
       public function checkUserLevel(){
       return  User::where('id',auth()->user()->id)->get(['level']);
       }   

       public function getUserToInvest($level){
        return User::with('transaction')->where('level',$level)->orderby('created_at','asc')->get();
        
       }
       public function getUser($id){
        return User::where('id',$id)->first(['code']);
       }

       public function getValidUserToInvest($users_to_invest){
            foreach($users_to_invest as $user){
                //return $user->code;
                foreach($user->transaction as $validuser){
                    if($validuser->cash_out_status==1){
                        return $validuser->user_id;
                    }
                }
            }
       }


     public function getUnmergedUsers(){
        return $this->with('user')->where("referral_code"," ")
        ->orderby('created_at','asc')->get();
     }  

     public function mergeUsers(){
        return $this->where('invest',1)
        ->where('referral_code','!=','')
        ->where('cash_out_status',0)
        ->where('merge_status',0)
        ->update(["merge_status"=>1]);
     }
    
     public function filterUnmergedUsers($current_user_level){
   
        $un_merged_users = $this->getUnmergedUsers();
        foreach($un_merged_users as $un_merged_user){
            
            if($un_merged_user->user->level==$current_user_level-1){
             
                $this->where("id",$un_merged_user->id)->update(
                    ['referral_code'=>auth()->user()->code]);
            }
        }
     }

       public function getValidUserToAttachReferralCode($users_to_invest){
        foreach($users_to_invest as $user){
            foreach($user->transaction as $validuser){
                if($validuser->referral_code==" "){
                    return $validuser->user_id;
                }
            }
        }
   }

       public function setReferralCode($user_id,$referral_code){
        return $this->where('user_id',$user_id)
        ->where("referral_code"," ")
        ->update([
            'referral_code'=>$referral_code]);
       }

  
       public function getDownliners($code){
    
       $results = User::where("referral_code",$code)->get();
        $count =0;
        if(!is_null($results)){
            foreach($results as $result){
        
               $user_code = $this->getUser($result->id);
               
                $count++;
                $count+=$this->getDownliners($user_code['code']);
               
            }
             return $count;
        }else{
            return $count;
        }   
        
    }

    
  
 

     }  
     
     
    

   

