<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailConfirmation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function registerview()
    {
        return view('register');
    }
    public function registerstore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
    
        Mail::to($user->email)->send(new MailConfirmation($user));
    
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('loginview');
        }
    
        return redirect()->route('welcome')->withErrors('User registration failed');
    }

    public function loginview()
    {
        return view('login');
    }
    public function loginstore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $request->session()->put('login', $request->email);
            return redirect()->route('dashboard');
        }

        return redirect('loginview')->withErrors([
            'email' => 'Invalid Details'
        ]);
    }

    public function dashboard(){
        $user = User::all();
        return view('dashboard',compact('user'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('login');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('welcome');
    }  

    public function users(Request $request)
{
    $query = $request->input('query');
    $user = User::where('name', 'LIKE', "%{$query}%")
        ->where('id', '!=', auth()->id())
        ->get();

    $loggedInUser = User::find(auth()->id());

    return view('dashboard', compact('user', 'loggedInUser'));
}

public function startChats($userId)
{
    $user = User::findOrFail($userId);
    $messages = Message::where('user_id', auth()->user()->id)
        ->where('receiver_id', $userId)
        ->orWhere('user_id', $userId)
        ->where('receiver_id', auth()->user()->id)
        ->get();
    return view('chat', compact('user', 'messages'));
}

public function sendMessage(Request $request)
{
    $message = new Message();
    $message->content = $request->input('content');
    $message->user_id = auth()->id();
    $message->receiver_id = $request->input('userId'); 
    $message->save();

    return response()->json(['success' => true]);
}


public function getMessages(Request $request)
{
    $userId = $request->input('userId');
    $loggedInUserId = auth()->id();

    $messages = Message::where(function ($query) use ($loggedInUserId, $userId) {
        $query->where('user_id', $loggedInUserId)
            ->where('receiver_id', $userId);
    })->orWhere(function ($query) use ($loggedInUserId, $userId) {
        $query->where('user_id', $userId)
            ->where('receiver_id', $loggedInUserId);
    })->with('user')->orderBy('created_at', 'asc')->get();

    return response()->json($messages);
}
public function delete()
{
    $user = Auth::user();
    if ($user) {
        $user->delete();
        Auth::logout();
        return redirect()->route('welcome')->with('success', 'Your account has been deleted.');
    }
    return redirect()->route('login');
}

}
