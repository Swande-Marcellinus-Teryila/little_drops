<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function login(Request $request){
    // /
    //     $user = User::where("phone",'=',$request->phone)->get();
        
    //     if($user->count()>0 && Hash::check($request->password,$user[0]->password)){
    //         $request->session()->put('user',$user[0]->id);
    //         return redirect("dashboard");
    //            }else{
    //         return redirect()->back()->with("message","Invalid details");
    //     }

    $credentials = $request->only('phone','password');
    if(Auth::attempt($credentials)){
        return redirect("/dashboard");
    }else{
       return redirect()->back()->with("message","Invalid details");
    }

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
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
