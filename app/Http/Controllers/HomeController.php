<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Review;

class HomeController extends Controller
{
    public function index(){
        $reviews = Review::all(); 
        $services = Service::take(4)->get();

        return view('home/home', compact('reviews', 'services'));

    }
}
