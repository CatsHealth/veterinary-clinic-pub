<?php


// Пример контроллера
namespace App\Http\Controllers;

use App\Models\Review; // Импортируйте модель Review
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all(); // Эта строка возвращает коллекцию
        return view('reviews.index', compact(' reviews'));
    }
    
}
