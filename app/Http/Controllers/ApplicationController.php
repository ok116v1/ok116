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
       

        

        // Подготовка данных для email

    // Убираем валидацию и просто получаем данные из запроса
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

        return redirect()->back()->with('success', 'Заявка успешно отправлена!');
    }

    public function showIndex()
    {
        $specializations = Specialization::all(); // Получаем все специальности
        return view('index', compact('specializations'));
    }
    
}
