<x-layout>
    <div class="max-w-6xl mx-auto mt-8 p-6">
        <h1 class="text-2xl font-bold mb-6">Admin panel</h1>

        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Id</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Description</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Action</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($games as $game)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $game->id }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $game->title }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $game->description }}</td>
                        <td class="px-4 py-3 text-sm">
                                <span class="inline-flex rounded-full px-2 py-1 text-xs font-medium
                                    {{ $game->status ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $game->status ? 'Hidden' : 'Active' }}
                                </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <form action="{{ route('admin.status', $game) }}" method="post">
                                    @csrf
                                    <button type="submit"
                                            class="rounded bg-blue-500 px-3 py-2 text-sm font-medium text-white hover:bg-blue-600">
                                        Active
                                    </button>
                                </form>

                                <form action="{{ route('admin.destroy', $game) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="rounded bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700">
                                        Delete game
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
