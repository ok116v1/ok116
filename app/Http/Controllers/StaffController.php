<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view('staff', compact('specializations'));
    }
}