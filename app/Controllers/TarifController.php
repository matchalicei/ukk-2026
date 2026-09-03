<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\Tarif;

class TarifController extends Controller
{
    public function index(Request $request)
    {
        $data= Tarif::paginate(5);
        return view('tarif.index', compact('data'));
    }
}
