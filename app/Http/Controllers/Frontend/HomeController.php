<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(20)->inRandomOrder()->get();
       
        $banners = Media::orderBy('created_at', 'desc')->get();
       
        return view('frontend.pages.home', compact('products', 'banners'));
    }

    public function setDevise($code, Request $request)
    {
        $devise = \DB::table('currencies')->where('code', $code)->first();

        if(!$devise){
            return redirect()->back()->with('error', 'Dévise introuvable');
        }

        $request->getSession()->put([
            'currency' => $devise->code
        ]);

        return redirect()->back();
    }
}
