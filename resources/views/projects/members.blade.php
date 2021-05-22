<div class="bg-white p-4 mt-4 rounded shadow-sm">
    <h3 class="h3 py-3 pl-4 -ml-6 border-l-4">Project Members</h3>
    <ul>
        @forelse ($project->members as $member)
            <li>
                <span class="text-gray-500">{{ $member->name }}</span>
            </li>
        @empty
            <li>
                No Members
            </li>
        @endforelse
    </ul>
</div>
