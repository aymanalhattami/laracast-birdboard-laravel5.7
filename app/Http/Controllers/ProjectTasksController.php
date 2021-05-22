<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $this->authorize('update', $project);

        // if (auth()->user()->isNot($project->owner)) {
        //     abort(403);
        // }

        request()->validate(['body' => 'required']);

        $project->addTask(request('body'));

        return redirect($project->path());
    }

    public function update(Project $project, Task $task)
    {
        $this->authorize('update', $task->project);

        // if (auth()->user()->isNot($task->project->owner)) {
        //     abort(403);
        // }

        request()->validate(['body' => 'required']);

        $task->update([
            'body' => request('body')
        ]);

        // if (request()->has('completed'))
        //     $task->complete();

        request('completed') ? $task->complete() : $task->incomplete();

        return redirect($project->path());
    }
}
