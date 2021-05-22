<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RecordActivity;

class Task extends Model
{
    use RecordActivity;

    protected $guarded = [];

    // update the relationship updated_at column
    protected $touches = ['project'];

    public static $recordableEvents = ['created', 'deleted'];

    protected $casts = [
        'completed' => 'boolean'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function path()
    {
        return "/projects/" . $this->project->id . "/tasks/" . $this->id;
    }

    public function complete()
    {
        $this->update([
            'completed' => true
        ]);

        $this->recordActivity('completed_task');
    }

    public function incomplete()
    {
        $this->update([
            'completed' => false
        ]);

        $this->recordActivity('incompleted_task');
    }
}
