<x-app-layout>
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="w-full lg:w-1/4">
                    @include('seller.partials._sidebar')
                </div>

                <div class="w-full lg:w-3/4">
                    @include('seller.partials._dashboard_stats')
                    @include('seller.partials._books_list')
                    @include('seller.partials._add_book')
                    @include('seller.partials._orders')
                </div>
            </div>
        </div>
    </section>

    <script>
        // --- Account Tab Switching Logic ---
        const tabBtns = document.querySelectorAll('.account-tab-btn');
        const tabContents = document.querySelectorAll('.account-tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // 1. Remove active state from all buttons
                tabBtns.forEach(b => {
                    b.classList.remove('active'); // bg-primary, text-white
                    b.classList.remove('bg-primary');
                    b.classList.remove('text-white');
                    // Add back hover states if needed, though CSS handles simple hover
                });

                // 2. Add active state to clicked button
                btn.classList.add('active');
                btn.classList.add('bg-primary');
                btn.classList.add('text-white');

                // 3. Hide all tab contents
                tabContents.forEach(content => content.classList.add('hidden'));

                // 4. Show target tab content
                const targetId = btn.getAttribute('data-target');
                document.getElementById(targetId).classList.remove('hidden');
            });
        });
    </script>

</x-app-layout>