<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Target;

class TargetFrontController extends Controller
{
    public function index()
    {
       $target_sirmis = Target::first();
       return view('target', compact('target_sirmis'));
    }
}
