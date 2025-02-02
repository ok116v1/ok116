<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Specialization;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSubmitted;

class ApplicationController extends Controller
{

    public function store(Request $request)
    {
        $mailData = [
            'name' => $request->input('name'), // Получаем имя
            'surname' => $request->input('surname'), // Получаем фамилию
            'patronymic' => $request->input('patronymic'), // Получаем отчество
            'phone' => $request->input('phone'), // Получаем телефон
            'email' => $request->input('email'), // Получаем email
            'specializations' => $request->input('specialization'), // Получаем специальности
            'quantities' => $request->input('quantity'), // Получаем количество
        ];


        // Отправка почты
        Mail::to('zanozared228@gmail.com')->send(new ApplicationSubmitted($mailData));
        Mail::to('ok.116@mail.ru')->send(new ApplicationSubmitted($mailData));

        return redirect()->back()->with('success', 'Заявка успешно отправлена!');
    }


    public function showIndex()
    {
        $specializations = Specialization::all(); // Получаем все специальности

        $specializationa = Specialization::take(3)->get(); // Получаем только первые 3 специальности
        return view('index', compact('specializations', 'specializationa'));

    }
    
}
