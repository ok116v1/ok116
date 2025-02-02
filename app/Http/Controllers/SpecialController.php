<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecialController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view('special', compact('specializations'));
    }
}