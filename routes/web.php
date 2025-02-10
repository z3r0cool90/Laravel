<?php
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionUserController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('home');
});
//index
Route::get('jobs', [JobController::class, 'index']);
//Route::get('/jobs', function () {
   // $jobs = Job::with('employer')->latest()->simplePaginate(3);
   // return view('jobs.index', ['jobs' => $jobs]);
//});

//create
Route::get('/jobs/create', [JobController::class, 'create']);
//Route::get('/jobs/create', function () {
   // return view('jobs.create');
//});

Route::get('/contact', function () {
    return view('contact');
});

//show
Route::get('/jobs/{job}', [JobController::class, 'show']);
//Route::get('/jobs/{job}', function ( Job $job) {
    //wildcard and paratemerer must identical, its the same
    //Route::get('/jobs/{id}', function ($job)
   // $job=Job::find($id);
    //return view('jobs.show', ['job'=> $job]);
//});


//store
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
//Route::post('/jobs', function () {
   // request()->validate(['title'=>['required','min:3'], 'salary'=>['required']]);



 //   Job::create(['title' => request('title'),
              //  'salary'=> request('salary'),
               // 'employer_id' => 1]);
    
   // return redirect('/jobs');

//});

//update
Route::patch('/jobs/{job}', [JobController::class, 'update']);
//Route::patch('/jobs/{job}', function (Job $job) {
    //Route::patch('/jobs/{id}', function ($id)
  //  request()->validate(['title'=>['required','min:3'], 'salary'=>['required']]);
   // $job = Job::findOrFail($id);

   // $job->update(['title' => request('title'),
   // 'salary'=> request('salary')]);

    //return redirect('/jobs/' . $job->id);

//});

//edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit-job','job'); //authorize the wildcard {job}
//Route::get('/jobs/{job}/edit', function ( Job $job) {
   // Route::get('/jobs/{id}/edit', function ($id)
   // $job = Job::find($id);

    //return view('jobs.edit', ['job' => $job]);
//});

//delete
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
//Route::delete('/jobs/{job}', function ( Job $job) {
    //Route::delete('/jobs/{id}', function ($id)
   // $job = Job::findOrFail($id);
    //$job -> delete();

    //return redirect('/jobs');


//});
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/login', [SessionUserController::class, 'login']);
Route::post('/login', [SessionUserController::class, 'store']);
Route::post('/logout', [SessionUserController::class, 'destroy']);


