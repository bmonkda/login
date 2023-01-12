<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    

    public function store(Request $request)
    {
        // return $request;
        $rules = [
            'message' => 'required|min:1|max:255'
        ];
        
        $messages = [
            'message.required' => 'Olvidó ingresar un mensaje.',
            'message.min' => 'Ingrese al menos 1 caracter',
            'message.max' => 'Ingrese como máximo 255 caracteres'
        ];

        
        $this->validate($request, $rules, $messages);

        /* $request->validate([
            // 'message' => 'required',
            'message' => 'required|min:5|max:255'
            // 'slug' => 'required|unique:subcategories'
        ]); */


        // $message = new Message();
        $message = Message::create($request->all());

        // return $message;
        return back()/* ->with('info', 'mensj exito') */;
        
    }

}
