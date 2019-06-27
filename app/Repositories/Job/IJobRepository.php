<?php

namespace App\Repositories\Job;


interface IJobRepository
{
	public function get();

	public function store($request);

	public function update($request, $id);

	public function destroy($id);
}