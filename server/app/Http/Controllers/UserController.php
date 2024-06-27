<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    //Yeni kişi kayıt olur
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',  
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:14',
            'privacyConfirm' => 'required|boolean',
            'notification' => 'required|boolean',
        ]);

        if (!$validatedData['name']) {
            return response()->json(['error' => 'The name must be in required and appropriate conditions'],422);
        }
        if (!$validatedData['surname']) {
            return response()->json(['error' => 'The surname must be in required and appropriate conditions'],422);
        }
        if (!$validatedData['email']) {
            return response()->json(['error' => 'The email must be in required and appropriate conditions'],422);
        }
        if (!$validatedData['password']) {
            return response()->json(['error' => 'The password must be in required and appropriate conditions'],422);
        }
        if (!$validatedData['phone']) {
            return response()->json(['error' => 'The phone must be in required and appropriate conditions'],422);
        }
        if (!$validatedData['privacyConfirm']) {
            return response()->json(['error' => 'Privacy policy must be accepted.'], 422);
        }
        if (!$validatedData['notification']) {
            return response()->json(['error' => 'The notification must be in required'],422);
        }

        //Random 7 haneli sayı
        $scartNumber = str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->phone = $validatedData['phone'];
        $user->privacyConfirm = $validatedData['privacyConfirm'];
        $user->notification = $validatedData['notification'];
        $user->SCartNumber = $scartNumber;
        $user->save();

        return response()->json($user, 201);
    }

    //İstenilen kişi bilgileri görüntülenir.
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    //Kişi bilgileri güncellenir.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:14',
            'privacyConfirm' => 'required|boolean',
            'notification' => 'required|boolean',
        ]);

        $user = User::findOrFail($id);

        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->phone = $validatedData['phone'];
        $user->privacyConfirm = $validatedData['privacyConfirm'];
        $user->notification = $validatedData['notification'];
        
        $user->save();

        return response()->json($user,201);
    }

    //İstenilen kişi silinir.
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }

    //Login işlemi
    public function login(Request $request)
    {
        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {

            $loggedUser = User::where('email', $user['email'])->first();

            return response()->json([
                'isLogin' => true,
                'user'    => $loggedUser,
            ]);
        } else {
            return response()->json(['isLogin' => false]);
        }
    }

    //Logout işlemi
    public function logout(){
        Auth::logout();
        return response()->json(['isLogout' => true]);
    }
}
