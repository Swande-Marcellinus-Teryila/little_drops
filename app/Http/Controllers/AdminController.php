<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function users(){

        $users =User::with('transaction')->paginate(20);
        //return json_encode($users);
        return  view('admin.users',["users"=>$users]);
    }

    public function showMerge(){
        
        return view('admin.merge');
    }
    public function merge(){
        $transactions = new Transaction();
       $number = $transactions->mergeUsers();
       if($number<1){
        return response(["message"=>"Hello Admin, there are no customers to merge at this time 🤷‍♂️😎"]);
       }else{
        return response(["message"=>"You have successfully merged ".$number. " Customer(s) 👍👍"]);
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
