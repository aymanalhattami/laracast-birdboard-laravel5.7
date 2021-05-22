<div class="bg-white p-4 mt-4 rounded shadow-sm">
    <h3 class="h3 py-3 pl-4 -ml-6 border-l-4">Project Activities</h3>
    <ul>
        @forelse ($project->activity as $activity)
            <li>
                @include("projects.activity.{$activity->description}")
                <span class="text-gray-500">{{ $activity->created_at->diffForHumans(null, true) }}</span>
            </li>
        @empty
            <li>
                No Activities
            </li>
        @endforelse
    </ul>
</div>
