<div id="add-book" class="account-tab-content hidden">
    <div class="bg-white border rounded p-6">
        <div class="flex items-center gap-4 mb-6">
            <button class="account-tab-btn text-gray-500 hover:text-primary" data-target="books-list">
                <i class="fa fa-arrow-left"></i> Back
            </button>
            <h4 class="text-xl font-bold">Add New Book</h4>
        </div>
        
        <form action="{{ route('seller.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 text-sm">Book Title</label>
                    <input type="text" name="title" required class="w-full border p-3 rounded focus:border-primary">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Category</label>
                    <select name="category_id" class="w-full border p-3 rounded">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="block mb-1 text-sm">Cover Image</label>
                <input type="file" name="cover_image" class="w-full border p-3 rounded">
            </div>
            <button type="submit" class="bg-primary text-white px-6 py-3 rounded shadow">Publish Book</button>
        </form>
    </div>
</div>