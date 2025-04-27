<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            {{-- Register Button --}}
            <div class="mt-4">
                <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Register New Member
                </a>
            </div>

            {{-- Users Table --}}
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Registered Users</h3>
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 mt-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b">Name</th>
                            <th class="px-4 py-2 border-b">Email</th>
                            <th class="px-4 py-2 border-b">Role</th>
                            <th class="px-4 py-2 border-b">Actions</th>
                            <th class="px-4 py-2 border-b">QR Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->Role }}</td>
                                <td class="px-4 py-2 border-b">
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                                <td class="px-4 py-2 border-b">
                                    <img src="{{ asset('storage/qrcodes/member' . $user->id . '-qrcode.png') }}" alt="QR Code" class="h-16 w-16">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
