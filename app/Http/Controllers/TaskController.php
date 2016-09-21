<?php

namespace App\Http\Controllers;

use App\Task as Task;
use App\User as User;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use DB;

use Log;

class TaskController extends Controller
{
    public function getTask($id){

        $task = DB::table('tasks')->where('TaskID', $id)->first();

        if ($task === null){
            return view('errors.tasknotfound', ['id' => $id]);
        }else{
            return view('task', ['task' => $task]);
        }
    }

    public function createTask(Request $request){

        $this->validate($request, [
            'title' => 'required|min:2',
            'description' => 'required|min:2',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required'
        ]);

        if (not($request->input('hour')) === null){
            if (not($request->input('minute')) === null){
                $due = $request->input('year')."-".$request->input('month')."-".$request->input('day')." ".$request->input('hour').":".$request->input('minute').":00";
            }else{
                $due = $request->input('year')."-".$request->input('month')."-".$request->input('day')." ".$request->input('hour').":00:00";
            }
        }else{
            $due = $request->input('year')."-".$request->input('month')."-".$request->input('day')." 12:00:00";
        }

        define("chars", "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789", true);

        do {

            $good = false;
            $TaskID = "";

            for ($current = 1; $current <= 6; $current++){
                $TaskID .= chars[rand(0, 61)];
            }

            $test = DB::table('tasks')->where('TaskID', $TaskID)->first();

            if ($test === null) {
                $good = true;
            }

        } while ($good = false);

        date_default_timezone_set('Europe/London');
        $set = date('y/m/d H:i:s', time());

        $user = Auth::user()->username;

        $task = new Task([
            'TaskID' => $TaskID,
            'title' => $request->input('title'),
            'description' => str_replace("\n", "&#13&#10", $request->input('description')),
            'due' => $due,
            'set' => $set,
            'owner' => $user
        ]);

        $task->save();

        $tasks = DB::table('users')->where('username', $user)->first()->set;

        if ($tasks === null){
            DB::table('users')->where('username', $user)->update(['set' => $TaskID]);
        }else{
            $tasks .= $TaskID.".";
            DB::table('users')->where('username', $user)->update(['set' => $tasks]);
        }

        return redirect()->route('task.get', $TaskID);
    }

    public function addTask($id){

        $user = Auth::user()->username;

        $tasks = DB::table('users')->where('username', $user)->first()->due;

        if ($tasks === null){
            DB::table('users')->where('username', $user)->update(['due' => $id]);
        }else{
            $tasks .= $id.".";
            DB::table('users')->where('username', $user)->update(['due' => $tasks]);
        }

        return redirect()->route('user.profile', $user);
    }

    public function deleteTask($id){

        $task = DB::table('tasks')->where('TaskID', '=', $id)->first();

        $user = Auth::user()->username;

        if ($user === $task->owner){

            $tasks = DB::table('users')->where('username', $user)->first()->set;

            DB::table('users')->where('username', $user)->update(['set' => str_replace($id.".", "", $tasks)]);

            $users = User::all();

            foreach ($users as $row) {
                if (strpos($row->due, $id) !== false){
                    DB::table('users')->where('username', $row->username)->update(['due' => str_replace($id . ".", "", $row->due)]);
                }
            }

            DB::table('tasks')->where('TaskID', '=', $id)->delete();
        }

        return redirect()->route('user.profile', $user);
    }

    public function removeTask($id){

        $user = Auth::user();

        DB::table('users')->where('username', $user->username)->update(['due' => str_replace($id . ".", "", $user->due)]);

        return redirect()->route('user.profile', $user->username);
    }
}