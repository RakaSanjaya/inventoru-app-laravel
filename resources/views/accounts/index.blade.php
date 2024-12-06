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
                    <th class="py-3 px-4 font-medium">No</th> <!-- Added No column -->
                    <th class="py-3 px-4 font-medium">Name</th>
                    <th class="py-3 px-4 font-medium">Email</th>
                    <th class="py-3 px-4 font-medium">Role</th>
                    @if(auth()->user()->role == 'super_admin')
                    <th class="py-3 px-4 font-medium">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr class="hover:bg-gray-100 bg-white border-b border-gray-200">
                    <td class="py-3 px-4">{{ $index + 1 }}</td> <!-- Display user number -->
                    <td class="py-3 px-4">{{ $user->name }}</td>
                    <td class="py-3 px-4">
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'user')
                        {{ substr($user->email, 0, 3) . '***@***' }}
                        @else
                        {{ $user->email }}
                        @endif
                    </td>
                    <td class="py-3 px-4 capitalize">{{ $user->role }}</td>
                    @if(auth()->user()->role == 'super_admin')
                    <td class="flex items-center justify-center py-3 px-4">
                        <a href="{{ route('accounts.edit', $user->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5
                            ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                        <a href="{{ route('accounts.show', $user->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition-all ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5
                            ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                        <form action="{{ route('accounts.destroy', $user->id) }}" method="POST" style="display:inline;" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition-all ml-2" onclick="return confirm('Are you sure you want to delete this account?')"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5
                            ">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
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