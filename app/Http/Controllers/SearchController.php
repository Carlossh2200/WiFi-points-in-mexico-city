<?php

namespace App\Http\Controllers;
use App\Model\Search;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(): View {
        //return view("search");
        //return view("");
        $programas = DB::select('select * from programa');

        return view('search.index',['programas'=>$programas]);
    }
    
}
