@extends('admin.dashboard')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Manage Notices</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('notices.create') }}" class="bg-orange-600 text-white px-4 py-2 rounded shadow hover:bg-orange-700">
            + New Notice
        </a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="p-3">Title</th>
                <th class="p-3">Message</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notices as $notice)
                <tr class="border-b">
                    <td class="p-3">{{ $notice->title }}</td>
                    <td class="p-3">{{ Str::limit($notice->message, 50) }}</td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('notices.edit', $notice) }}" class="bg-blue-600 text-white px-3 py-1 rounded shadow hover:bg-blue-700 focus:outline-none">Edit</a>
                        <form action="{{ route('notices.destroy', $notice) }}" method="POST" onsubmit="return confirm('Delete this notice?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded shadow hover:bg-red-700 focus:outline-none">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="p-3 text-center">No notices found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $notices->links() }}
    </div>
</div>
@endsection
