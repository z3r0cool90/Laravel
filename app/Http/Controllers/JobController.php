<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;

class JobController extends Controller
{
    public function index(){
         $jobs = Job::with('employer')->latest()->simplePaginate(3);
         return view('jobs.index', ['jobs' => $jobs]);
    }


    public function show(Job $job) {
        return view('jobs.show', ['job'=> $job]);
    }


    public function create(){
        return view('jobs.create');

    }

    public function store() {

        request()->validate(['title'=>['required','min:3'], 'salary'=>['required']]);



        $job = Job::create(['title' => request('title'),
                    'salary'=> request('salary'),
                    'employer_id' => 1]);


                    Mail::to($job->employer->user)->send(new JobPosted($job));

        
        
        return redirect('/jobs');
    
    }


    public function edit(Job $job) {
       // Gate::define('edit-job', function(User $user, Job $job){
           // return $job->employer->user->is($user);
     //   }); For efficiency, we moved it to AppServiceProider

        
       // Gate::authorize('edit-job',$job); for efficiency, we apply similar implementation in web.php

       // if ($job->employer->user->isNot(Auth::user())){
           // abort(403);
            
      //  } Also, we can implement this with Gate

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job) {
        request()->validate(['title'=>['required','min:3'], 'salary'=>['required']]);

        $job->update(['title' => request('title'),
        'salary'=> request('salary')]);
    
        return redirect('/jobs/' . $job->id);
    

    }

    public function destroy(Job $job) {

        $job -> delete();

        return redirect('/jobs');
    
    }
}
