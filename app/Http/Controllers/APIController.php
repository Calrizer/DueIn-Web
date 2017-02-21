<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Mail;
use DB;

class APIController extends Controller
{
    public function getUser(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            return $user;
        }else{
            return "Incorrect Details";
        }
    }

    public function getUserInfo(Request $request){

        $user = DB::table('users')->where('username', $request->input('username'))->first();

        unset($user->id);
        unset($user->email);
        unset($user->password);
        unset($user->due);
        unset($user->complete);
        unset($user->online);
        unset($user->country);
        unset($user->created_at);
        unset($user->updated_at);
        unset($user->remember_token);
        unset($user->verify);
        unset($user->confirmed);

        return json_encode($user);

    }

    public function getTask(Request $request)
    {

        $task = DB::table('tasks')->where('TaskID', $request->input('id'))->first();

        return json_encode($task);

    }

    public function getUserTasks(Request $request){

        $user = DB::table('users')->where('username', $request->input('username'))->first();

        return $user->set;

    }

    public function addTask(Request $request){

        $user = DB::table('users')->where('username', $request->input('username'))->first();

        if ($user->verify === $request->verify){

            $tasks = DB::table('users')->where('username', $user->username)->first()->due;

            if ($tasks === null){
                DB::table('users')->where('username', $user->username)->update(['due' => $request->id . "."]);
            }else{
                $tasks .= $request->id.".";
                DB::table('users')->where('username', $user->username)->update(['due' => $tasks]);
            }

            return "Task Added";

        } else{

            return "Invalid Token";

        }

    }

    public function removeTask(Request $request){

        $user = DB::table('users')->where('username', $request->input('username'))->first();

        if ($user->verify === $request->verify){

            $tasks = DB::table('users')->where('username', $user->username)->first()->due;

            DB::table('users')->where('username', $user->username)->update(['due' => str_replace($request->id . ".", "", $tasks)]);
            return "Task Removed";

        }else{

            return "Invalid Token";

        }

    }

    public function deleteTask(Request $request){

        $user = DB::table('users')->where('username', $request->input('username'))->first();

        if ($user->verify === $request->verify){

            $task = DB::table('tasks')->where('TaskID', '=', $request->id)->first();

            if ($user->username === $task->owner){

                $tasks = DB::table('users')->where('username', $user->username)->first()->set;

                DB::table('users')->where('username', $user->username)->update(['set' => str_replace($request->id.".", "", $tasks)]);

                $users = User::all();

                foreach ($users as $row) {
                    if (strpos($row->due, $request->id) !== false){
                        DB::table('users')->where('username', $row->username)->update(['due' => str_replace($request->id . ".", "", $row->due)]);
                    }
                }

                DB::table('tasks')->where('TaskID', '=', $request->id)->delete();

                return "Task Deleted";

            }else{

                return "Not Owner";

            }

        }else{

            return "Invalid Token";

        }

    }

    public function completeTask(Request $request){

        $user = DB::table('users')->where('username', $request->input('username'))->first();

        if ($user->verify === $request->verify) {

            $tasks = DB::table('users')->where('username', $user->username)->first()->due;

            DB::table('users')->where('username', $user->username)->update(['due' => str_replace($request->id . ".", "", $tasks)]);

            $tasks = DB::table('users')->where('username', $user->username)->first()->complete;

            if ($tasks === null) {
                DB::table('users')->where('username', $user->username)->update(['complete' => $request->id . "."]);
            } else {
                $tasks .= $request->id . ".";
                DB::table('users')->where('username', $user->username)->update(['complete' => $tasks]);
            }

            return "Task Complete";

        }else{

            return "Invalid Token";

        }

    }

    public function uncompleteTask(Request $request){

        $user = DB::table('users')->where('username', $request->input('username'))->first();

        if ($user->verify === $request->verify) {

            $tasks = DB::table('users')->where('username', $user->username)->first()->complete;

            DB::table('users')->where('username', $user->username)->update(['complete' => str_replace($request->id . ".", "", $tasks)]);

            $tasks = DB::table('users')->where('username', $user->username)->first()->due;

            if ($tasks === null){
                DB::table('users')->where('username', $user->username)->update(['due' => $request->id . "."]);
            }else{
                $tasks .= $request->id.".";
                DB::table('users')->where('username', $user->username)->update(['due' => $tasks]);
            }

            return "Task Uncompleted";

        }else{

            return "Invalid Token";

        }

    }

}
