<?php

namespace App\Http\Controllers;
use App\Rules\checkThreeReferrals;

use App\Http\Requests\StoreUserRequest;
use App\Models\State;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::all();
        
        return view('register',['states'=>$states]);
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
        $user = new User();
        $referral_code =$request->referral_code;
        
 if(strlen($request->referral_code)<1){
    $referral_code = "";
 }
            $validatedData = $request->validate([
                'phone' => 'required|unique:users|regex:/^\d{11}$/',
                'username' => 'required|unique:users',
                'lga_id' =>'required',

                ''
            ],[
                "phone.regex"=>"Invalid phone number",
                "phone.unique"=>"Phone number already used",
                "lga_id.required"=>"Please select your local government"
            ]);
            
            
            
            if(!User::where("code",$request->referral_code)->exists()  && strlen($request->referral_code)>0){
                return redirect()->back()->with("message","Invalid referral code");
            }

            $code = rand(10000,99999);


            $data = [
                 'role_id'=>1,
                 'username'=>$request->username,
                 'phone'=>$request->phone,
                 'email'=>$request->email,
                 'state_id'=>$request->state_id,
                 'lga_id'=>$request->lga_id, 
                 'bank_name'=>$request->bank_name,
                 'account_name'=>$request->account_name,
                 'account_no'=>$request->account_no,
                 'code'=>$code,
                 'referral_code'=>$referral_code,
                 'password'=>$request->password
     
            ];
        
            if($user->checkThreeRefferal($request->referral_code)|| strlen($request->referral_code)<1){
                
                // $code = $user->getNextUser(1,$request->referral_code);
                //  dd($code);
                // $referral_code  = $user->validateNextUser($code,1);
              
               $data['referral_code']=$user->getNextUser();
        
            }else{
                
               
            }
             $user->storeUser($data);
            
           
   
           
            
         
            $credentials = $request->only('phone','password');
            if(Auth::attempt($credentials)){
                return redirect("/dashboard");
            }else{
                redirect()->back()->with("message","Sorry something went wrong");
            };
    
    }
    /**
     * Display the specified resource.
     */
    public function statistics(){
        $user = new User();
        return  view("components.stat",["stat"=>$user->getStatistics()]);
    }
    public function show()
    { 
            return view("dashboard");
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        return response(['message'=>"Your account is automatically deleted by little drops"]);
        return response()->redirect("register");
    }
}
