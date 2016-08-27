<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Mail;
use DB;

class UserController extends Controller
{
    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:8',
            'username' => 'required|unique:users',
            'country' => 'required'
        ]);

        $verify = "";

        for ($current = 1; $current <= 6; $current++){
            $verify .= rand(0, 9);
        }

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'username' => $request->input('username'),
            'country' => $request->input('country'),
            'verify' => $verify
        ]);

        $user->save();

        //$this->sendEmail($user);

        return view('verify.sent', ['user' => $user]);
    }

    /*public function sendEmail($user){

        Mail::send('verify.email', ['user' => $user], function ($m) use ($user) {
            $m->from('verify@localhost', 'Due In');

            $m->to($user->email, $user->name)->subject('Verify Your Account • Due In');
        });
    }*/

    public function verify($id){

        $user = DB::table('users')->where('verify', $id)->first();

        if ($user === null){
            return view('verify.error');
        }else{
            if ($user->confirmed === 0){
                DB::table('users')->where('verify', $id)->update(['confirmed' => true]);
                return view('verify.success', ['user' => $user]);
            }else{
                return view('verify.already', ['user' => $user]);
            }
        }
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('nav.landing');
        }

        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function showProfile(){

        $user = Auth::user();

        $ids = explode(".", $user->due, -1);

        $dueTasks = [count($ids)];

        for($current = 0; $current < count($ids); $current++){
            $dueTasks[$current] = DB::table('tasks')->where('TaskID', $ids[$current])->first();
        }

        $ids = explode(".", $user->set, -1);

        $setTasks = [count($ids)];

        for($current = 0; $current < count($ids); $current++){
            $setTasks[$current] = DB::table('tasks')->where('TaskID', $ids[$current])->first();
        }

        return view('user.profile', ['user' => $user, 'dueTasks' => array_reverse($dueTasks), 'setTasks' => array_reverse($setTasks)]);
    }
}
