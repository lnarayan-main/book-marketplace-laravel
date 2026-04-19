<x-app-layout>
    <div class="relative bg-sky-700 text-white h-64 flex items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ asset('assets/images/page-banner.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative z-10 text-center">
            <h2 class="text-4xl font-bold mb-2">Register</h2>
            <ul class="flex justify-center space-x-2 text-sm">
                <li><a href="{{ url('/') }}" class="hover:text-primary">Home</a></li>
                <li>/</li>
                <li class="text-primary">Create Account</li>
            </ul>
        </div>
    </div>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <div class="w-full lg:w-1/2">
                    <div class="bg-gray-50 border rounded-lg p-8 shadow-sm">
                        <h4 class="text-2xl font-bold text-center mb-6">Create Your Account</h4>

                        <form method="POST" action="{{ route('register') }}" class="space-y-4">
                            @csrf

                            <div>
                                <input type="text" name="name" value="{{ old('name') }}" 
                                    placeholder="Full Name *"
                                    class="w-full border p-3 rounded focus:outline-none focus:border-primary transition @error('name') border-red-500 @enderror"
                                    required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>

                            <div>
                                <input type="email" name="email" value="{{ old('email') }}" 
                                    placeholder="Email Address *"
                                    class="w-full border p-3 rounded focus:outline-none focus:border-primary transition @error('email') border-red-500 @enderror"
                                    required />
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>

                            <div>
                                <select name="role" 
                                    class="w-full border p-3 rounded focus:outline-none focus:border-primary bg-white transition @error('role') border-red-500 @enderror"
                                    required>
                                    <option value="" disabled selected>Register as a... *</option>
                                    <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Customer (I want to buy books)</option>
                                    <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Seller (I want to sell books)</option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-1" />
                            </div>

                            <div>
                                <input type="password" name="password" 
                                    placeholder="Password *"
                                    class="w-full border p-3 rounded focus:outline-none focus:border-primary transition @error('password') border-red-500 @enderror"
                                    required />
                                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                            </div>

                            <div>
                                <input type="password" name="password_confirmation" 
                                    placeholder="Confirm Password *"
                                    class="w-full border p-3 rounded focus:outline-none focus:border-primary transition"
                                    required />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                            </div>

                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full bg-sky-700 text-white font-medium py-3 rounded hover:bg-sky-800 transition shadow-lg">
                                    Create Account
                                </button>
                            </div>
                        </form>

                        <div class="mt-6 text-center text-sm">
                            <p class="text-gray-600">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-primary font-bold hover:underline">Login here.</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>