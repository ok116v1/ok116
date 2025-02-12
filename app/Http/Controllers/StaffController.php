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

    public function sendEmail(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'email' => 'required|email',
        ]);

        Mail::to('zanozared228@gmail.com')->send(new ContactMail($request));

        return back()->with('success', 'Ваше сообщение отправлено!');
    }
}