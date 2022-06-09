<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;


class DepositMoney extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return redirect('home')->with('status', 'Profile updated!');
    }


    public function send(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'amount' => 'required|numeric'
        ]);

        $sender = auth()->user();
        $recipient = User::where('email', $data['email'])->first();

        $sender->charge($data['amount']);
        $recipient->grant($data['amount']);

        return redirect('home')->with('status', "Transferred to $recipient->name");
        //return redirect()->action('HomeController@index');
            //->withStatus("${$data['amount']} sent to {$recipient->name}");
    }

}

