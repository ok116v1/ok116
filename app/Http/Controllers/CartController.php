<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session; // Добавьте эту строку
use App\Mail\OrderPlaced;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $specializationId = $request->input('specialization_id');
        $quantity = $request->input('quantity'); // Получаем количество из формы
        $specialization = Specialization::find($specializationId); // Находим специальность

        if (!$specialization) {
            return redirect()->back()->with('error', 'Специальность не найдена.');
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$specializationId])) {
            // Если специальность уже в корзине, увеличиваем количество
            $cart[$specializationId]['quantity'] += $quantity;
        } else {
            // Если нет, добавляем новую запись
            $cart[$specializationId] = [
                "name" => $specialization->name,
                "quantity" => $quantity,
                "photo" => $specialization->photo_url,
            ];
        }

        Session::put('cart', $cart); // Обновляем сессию
        return redirect()->back()->with('success', 'Специальность добавлена в корзину.');
    }

    public function index()
    {
        return view('cart');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $order = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'items' => session('cart')
        ];

        // Use a valid email address here
        Mail::to('zanozared228@gmail.com')->send(new OrderPlaced($order));

        session()->forget('cart');
        return redirect('/')->with('success', 'Заявка отправлена!');
    }
}