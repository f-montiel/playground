<?php

namespace App\Repositories\Job;

use App\Repositories\Job\EloquentJobRepository;
use App\Job;

class EloquentJobRepository implements IJobRepository
{
	public function get()
	{
		$jobs = Job::get();

        return $jobs;
	}

	public function store($request)
	{
		$job = job::create([
            'name' => $request->name,
            'done' => 0
        ]);

        return $job;
	}

	public function update($request, $id)
	{
		$job = Job::where('id', $id)->first();

        $job->done = $request->done;

        $job->save();

        return $job;
	}

	public function destroy($id)
	{
		job::destroy($id);
	}
}