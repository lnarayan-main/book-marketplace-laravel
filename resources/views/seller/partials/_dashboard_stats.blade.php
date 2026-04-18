<div id="dashboard" class="account-tab-content">
    <div class="bg-white border rounded p-6">
        <h4 class="text-xl font-bold mb-6">Seller Overview</h4>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-sky-50 p-6 rounded-lg border border-sky-100">
                <span class="text-sky-600 text-sm font-semibold uppercase">Total Books</span>
                <h3 class="text-3xl font-bold text-sky-900">{{ $books->count() }}</h3>
            </div>
            <div class="bg-green-50 p-6 rounded-lg border border-green-100">
                <span class="text-green-600 text-sm font-semibold uppercase">Total Sales</span>
                <h3 class="text-3xl font-bold text-green-900">$1,250.00</h3> </div>
            <div class="bg-purple-50 p-6 rounded-lg border border-purple-100">
                <span class="text-purple-600 text-sm font-semibold uppercase">Active Orders</span>
                <h3 class="text-3xl font-bold text-purple-900">5</h3>
            </div>
        </div>

        <div class="bg-blue-50 border-l-4 border-primary p-4">
            <p>Welcome back, <strong>{{ auth()->user()->name }}</strong>! You have 3 new orders to process today.</p>
        </div>
    </div>
</div>