@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Accounts</h1>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4 text-center">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="bg-red-100 text-red-800 p-4 rounded-md mb-4 text-center">
        {{ session('error') }}
    </div>
    @endif

    <div class="overflow-x-auto shadow-md border border-gray-200">
        <table class="min-w-full table-auto text-sm text-center">
            <thead>
                <tr class="bg-emerald-700 text-white">
                    <th class="py-3 px-4 border-b font-medium">No</th> <!-- Added No column -->
                    <th class="py-3 px-4 border-b font-medium">Name</th>
                    <th class="py-3 px-4 border-b font-medium">Email</th>
                    <th class="py-3 px-4 border-b font-medium">Role</th>
                    @if(auth()->user()->role == 'super_admin')
                    <th class="py-3 px-4 border-b font-medium">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr class="hover:bg-gray-100">
                    <td class="py-3 px-4 border-b">{{ $index + 1 }}</td> <!-- Display user number -->
                    <td class="py-3 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-3 px-4 border-b">
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'user')
                        <!-- Masking email if the user is admin -->
                        {{ substr($user->email, 0, 3) . '***@***' }}
                        @else
                        <!-- Display full email for other roles -->
                        {{ $user->email }}
                        @endif
                    </td>
                    <td class="py-3 px-4 border-b capitalize">{{ $user->role }}</td>
                    @if(auth()->user()->role == 'super_admin')
                    <td class="py-3 px-4 border-b">
                        <a href="{{ route('accounts.edit', $user->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition-all">Edit</a>
                        <a href="{{ route('accounts.show', $user->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition-all ml-2">Details</a>
                        <form action="{{ route('accounts.destroy', $user->id) }}" method="POST" style="display:inline;" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition-all ml-2" onclick="return confirm('Are you sure you want to delete this account?')">Delete</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection