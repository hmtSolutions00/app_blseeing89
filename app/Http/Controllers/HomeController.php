<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carousels = Carousel::all();
        $partners = Partner::all();
        return view('app.pages.index.index',[
            "carousels" => $carousels,
            "partners" => $partners
        ]);
    }
}
