<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::orderBy('created_at', 'desc')->get();

        return view('backend.pages.customer.index', compact('customers'));
    }

    public function show(User $user)
    {
       $orders = $user->orders;
       $collection = collect($orders);

       $en_attentes =  $collection->filter(function($value, $key){
           return $value->status == 0;
       })->all();

        $en_cours = $collection->filter(function($value, $key){
            return $value->status == 1;
        })->all();

        $livres = $collection->filter(function($value, $key){
            return $value->status == 2;
        })->all();

       return view('backend.pages.customer.show', compact('user', 'orders', 'en_attentes', 'en_cours', 'livres'));
    }


    public function delete(User $user)
    {
        $user->delete();

        return redirect()->back()->with('error', 'Client supprimé avec succès');
    }
}
