<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function showIndex() {
        return view('index');
    }

    public function saveApplication(Request $request) {
        $request -> validate([
            'name' => 'required',
            'surname' => 'required',
            'patronymic' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'specialization' => 'required',
            'quantity' => 'required',
        ]);

        Application::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'phone' => $request->phone,
            'email' => $request->email,
            'specialization' => $request->specialization,
            'quantity' => $request->quantity,
            'user_id' => Auth::id()
        ]);

        return redirect('/')->with('success', 'Заявка успешно отправлена!');
    }
}
