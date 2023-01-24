<?php

use App\Models\ProjectTask;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Index or Home page
 */
Route::get('/', function () {
    if (!session('user_id')) return redirect('/login');
    
    $project_tasks = ProjectTask::where('user_id', session('user_id'))->orderBy('end_date', 'desc')->get();

    return view('index', compact('project_tasks'));
});


/**
 * Authentication
 */
Route::get('/login', function () {  
    return view('login');
});
Route::post('/login', function () {  
    // extract form request inputs and sanitize
    $username = request('username');
    $password = request('password');
 
    $user = User::where(['username' => $username, 'password' => md5($password)])->first();
    
    $error = '';
    if ($user) {
        session(['user_id' => $user->id]);
        return redirect('/');
    } 
    else $error = "Your Login credentials are incorrect!";

    return view('login', compact('error'));
});
Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
})->name('logout');


/**
 * Manage Tasks
 */
Route::get('/manage_tasks', function () {
    $project_tasks = ProjectTask::where('user_id', session('user_id'))->orderBy('start_date', 'desc')->get();

    return view('manage_tasks', compact('project_tasks'));
});

Route::get('/add_task', function () {
    return view('add_task');
});
Route::post('/add_task', function () {
    // extract request input
    $user_id = session('user_id');
    $name =  request('name');
    $start_date = request('start_date');
    $end_date = request('end_date');

    try {
        $project_task = ProjectTask::create(compact('user_id', 'name', 'start_date', 'end_date'));
        echo "Task added successfully";
    } catch (\Throwable $th) {
        //throw $th;
        echo "<span style='color:red'>Error while adding task</span>";
        exit;
    }
    
    return redirect('/manage_tasks');
});

Route::get('/edit_task/{task_id}/edit', function ($task_id) {
    $project_task = ProjectTask::find($task_id);

    return view('edit_task', ['data' => $project_task]);
});

Route::post('/edit_task/{task_id}', function ($task_id) {
  
    $name = request('name');
    $start_date = request('start_date');
    $end_date = request('end_date');
    $status = request('status');
    
    try {
        $project_task = ProjectTask::find($task_id);
        $result = $project_task->update(compact('name', 'start_date', 'end_date', 'status'));
    } catch (\Throwable $th) {
        //throw $th;
        echo 'Error updating record!';
    }

    return redirect('/manage_tasks');
});

Route::get('/delete_task/{task_id}', function ($task_id) {

    try {
        $project_task = ProjectTask::find($task_id);
        $project_task->delete();
    } catch (\Throwable $th) {
        //throw $th;
        echo 'Error deleting record!';
        exit;
    }

    echo 'Task Deleted Successfully';
    return redirect('/manage_tasks');
});



/**
 * Add User
 */
Route::get('/add_user', function() {
    return view('add_user');
});

Route::post('/add_user', function() {
    $username =  request('username');
    $password = md5(request('password'));
    // dd(compact('username', 'password'));

    try {
        $user = User::create(compact('username', 'password'));
        echo "User registered successfully";
    } catch (\Throwable $th) {
        //throw $th;
        echo "<span style='color:red'>Error while adding new user</span>";
        return redirect('/add_user');
    }

   return redirect('/login');
});





/**
 * Account
 */
Route::get('/account', function () {
    $users = User::select(DB::raw("CONCAT(first_name, ' ',last_name) as name,  email"))
        ->where('id', session('user_id'))->get();

   //Ensure the user is logged in
    if (empty(session('user_id'))) return redirect('/login');

    $user_check = session('user_id');
    if ($user_check) {
        $user = User::where('email', $user_check)->first();
        session(['user_id' => $user->id]);
    }

    if (!session('user_id')) return redirect('/login');
   
    return view('accounts', compact('users'));
});

Route::post('/account', function () {
    $currentPassword=md5(request('currentPassword')); 
    $newPassword=md5(request('newPassword'));  
    $confirmPassword=md5(request('confirmPassword')); 

    $user = User::where(['password' => $currentPassword])->first();

    if (empty ($currentPassword)){
        echo "The Current Password field can't be empty";
    } else if (!$user) {
        echo "The Current Password is incorrect";
    } else if (empty ($newPassword)){
        echo "The New Password field can't be empty";
    } else if (empty ($confirmPassword)){
        echo "The Confirm Password field can't be empty";
    } else if ($newPassword != $confirmPassword) {
        echo "The two passwords don't match.";
    } else {
        $user->update(['password' => $newPassword]);
        echo "Your password has been changed successfully!";
    }

    return redirect('/account');
});

/**
 * Calendar
 */
Route::get('/calendar', function() {
    $project_tasks = ProjectTask::select(DB::raw('name as title, end_date as start, end_date as end'))
        ->get()->toArray();

    return view('calendar', compact('project_tasks'));
});


/**
 * Visualization
 */
Route::get('/visualization', function() {
    // fetch project statuses
    $project_tasks = ProjectTask::get(['status'])->toArray();
    // dd($project_tasks);

    // count initializer for each status type
    $init_status_count = [['current', 0], ['completed', 0], ['suspended', 0]];

    // dynamically count and update status type
    $status_type_count = array_reduce($project_tasks, function($init, $row) {
        return array_map(function ($v) use($row) {
            if ($row['status'] == $v[0]) $v[1] += 1; 
            return $v;
        }, $init);
    }, $init_status_count);

    return view('visualization', compact('status_type_count'));
});