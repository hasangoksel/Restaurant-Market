<?php

namespace App\Http\Controllers;

use App\Models\UserMessage;
use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subject      = $request->input('subject');
        $email        = $request->input('email');
        $message      = $request->input('message');

        //Validation işlemleri.
       if (empty($subject)) {
            return response()->json(['error' => 'Konu zorunludur!'], 400);
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['error' => 'Geçerli bir e-posta adresi giriniz!'], 400);
        }elseif (empty($message)) {
            return response()->json(['error' => 'Bu alan boş bırakılamaz!'], 400);
        } else {
            $newMessage = new UserMessage();
            $newMessage -> subject     = $subject;
            $newMessage -> mail       = $email;
            $newMessage -> message     = $message;
            $newMessage -> save();

            return response()->json(['success' => 'Mesaj başarı ile gönderildi!', 'newMessage' => $newMessage], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserMessage $userMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserMessage $userMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserMessage $userMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserMessage $userMessage)
    {
        //
    }
}
