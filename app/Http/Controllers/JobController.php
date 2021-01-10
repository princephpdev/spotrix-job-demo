<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostrequest;
use App\Http\Requests\JobUpdateRequest;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allJobs = Job::withCount('users')->latest()->paginate(10);
        return view('jobs.index', compact('allJobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobPostrequest $request)
    {
        $validate = $request->validated();
        $slug = Str::slug(($request->input('title')),'-');
        $slug = ['slug'=> $slug];
        $newValidate = array_merge($validate, $slug);
        Job::create($newValidate);
        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($job)
    {
        $singleJob = Job::where('slug', $job)->with('users')->get();
        return view('jobs.show', compact('singleJob'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($job)
    {
        $singleJob = Job::where('slug', $job)->first();
        return view('jobs.edit', compact('singleJob'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobUpdateRequest $request, $job)
    {
        $validate = $request->validated();
        $findjob = Job::where('slug',$job)->firstOrFail();
        $slug = Str::slug(($request->input('title')),'-');
        $slug = ['slug'=> $slug];
        $newValidate = array_merge($validate, $slug);
        Job::where('id',$findjob->id)->Update($newValidate);
        return redirect()->route('job.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($job)
    {
        Job::where('slug',$job)->delete();
        return redirect()->route('job.index');
    }
}
