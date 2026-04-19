<div id="books-list" class="account-tab-content hidden">
    <div class="bg-white border rounded p-6">
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-xl font-bold">My Books</h4>
            <button class="account-tab-btn bg-green-600 text-white px-4 py-2 rounded text-sm hover:bg-green-700" data-target="add-book">
                + Add New Book
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <tbody class="divide-y">
                    @foreach($books as $book)
                    <tr>
                        <td class="p-4">{{ $loop->iteration }}</td>
                        <td class="p-4">{{ $book->title }}</td>
                        <td class="p-4">{{ $book->author }}</td>
                        <td class="p-4">
                            <span class="px-2 py-1 rounded text-xs {{ $book->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($book->status) }}
                            </span>
                        </td>
                        <td class="p-4">${{ $book->price }}</td>
                        <td class="p-4">
                            <button class="text-primary hover:underline">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>