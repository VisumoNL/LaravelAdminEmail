<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view("admin_pages/dashboard");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($token)
    {
      if(Auth::user()->verify_token === $token) {
          if(Auth::user()->verified == 1) {
              return redirect("admin/dashboard")->with("errorh1", "Uw account is al geverifieerd.")->with("errorp", "Je kan niet nog een keer je account verifiëren.");
          } else {
            $user = User::find(Auth::user()->id);
            $user->verified = 1;
            $user->save();
            return redirect("admin/dashboard")->with("successh1", "Account geverifieerd.")->with("successp", "Je account is succesvol geverifieerd!");
        }
      } else {
        return redirect("admin/dashboard")->with("error", "Verifeer code is niet geldig of verlopen.");
      }

      return $token;
    }

    public function resendemail()
    {
        $userdata = [
          'name' => Auth::user()->name,
          'email' => Auth::user()->email,
          'token' => Auth::user()->verify_token
        ];

        $user = User::find(Auth::user()->id);
        if($user->verified === 1) {
            return redirect("admin/dashboard")->with("errorh1", "Uw account is al geverifieerd.")->with("errorp", "");
        } else {
            $emails = $user->emails_sent;
            $user->emails_sent = $emails + 1;
            $user->save();

            Mail::to(Auth::user()->email)->send(new VerifyMail($userdata));
            return redirect("admin/dashboard")->with("successh1", "Email verzonden.")->with("successp", "Er is een nieuwe email verzonden naar: ".$user->email.".");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
