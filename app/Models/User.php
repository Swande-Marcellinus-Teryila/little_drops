<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'username',
            'phone',
            'email',
            'state_id',
            'lga_id', 
            'bank_name',
            'account_name',
            'account_no',
            'code',
            'password',
            'referral_code'
            
    ];
    

    public function storeUser($data){
        
        $this->create($data);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function checkThreeRefferal($referral_code){
    //     if($this->where('referral_code',$referral_code)->count()>3){

    //     return true;
    //     }else{
    //         return false;
    //     }
    // }
    public  function checkThreeRefferal($referral_code){
        if($this->where('referral_code',$referral_code)->count()>2){
            return true;
           }else{
               return false;
           }
    }

    public function getSpecificLevel($level){
        return $this->where('level',$level)->orderBy('created_at', 'asc')->get();
    }
    

    public function getNextUser(){
        
        $users = $this->get();
        
        foreach($users as $user){
            
                    if($this->checkThreeRefferal($user->code)){
                    
                        continue;
                    }else{
                        return $user->code;
                    }
        }
        
        //return ($this->where('referral_code',$referral_code)->orderBy('created_at', 'asc')->count()>2);
    }  

    public function validateNextUser($code,$level){
        if(!$this->checkThreeRefferal($code)){
            return $code;
        }else{
            $code = $this->where('level',$level)->where('code','!=',$code)->orderBy('created_at', 'asc')->first()->value('code');
            return $code;
        }
    }
    public function transaction(){
        return $this->hasMany(Transaction::class);
    }


    public function countByLevel($level){
        return $this->where("level",$level)->count();
    }
    public function getStatistics(){
        return [[
            "level0"=>$this->countByLevel(0),
            "level1"=>$this->countByLevel(1),
            "level2"=>$this->countByLevel(2),
            "level3"=>$this->countByLevel(3),
            "level4"=>$this->countByLevel(4),
            "level5"=>$this->countByLevel(5),
            "level6"=>$this->countByLevel(6),
            "level7"=>$this->countByLevel(7)           

        ]];

    }
    



   
}
