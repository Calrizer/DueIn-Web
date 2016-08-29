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
            $username = Auth::user()->username;
            return redirect()->route('user.profile', $username);
        }

        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function showProfile($username){

        $user = Auth::user();

        if ($user->username === $username){

            $setTasks = $this->fetchTasks($user->set);
            $dueTasks = $this->fetchTasks($user->due);

            return view('user.profile', ['user' => $user, 'dueTasks' => array_reverse($dueTasks), 'setTasks' => array_reverse($setTasks)]);

        }else{

            $user = DB::table('users')->where('username', $username)->first();

            $setTasks = $this->fetchTasks($user->set);

            if ($setTasks === false){
                return view('user.foreign', ['user' => $user, 'setTasks' => $setTasks]);
            }else{
                return view('user.foreign', ['user' => $user, 'setTasks' => array_reverse($setTasks)]);
            }
        }
    }

    private function fetchTasks($method){

        if($method === ""){

            $none = false;

            return $none;

        }else{

            $ids = explode(".", $method, -1);

            $tasks = [count($ids)];

            for($current = 0; $current < count($ids); $current++){
                $tasks[$current] = DB::table('tasks')->where('TaskID', $ids[$current])->first();
            }

            return $tasks;
        }
    }
}
