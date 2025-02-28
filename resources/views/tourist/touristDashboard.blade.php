<x-app-layout>



    <section style="background-image: url('{{ asset('assets/img/loginBg.jpg') }}')"
        class="bg-cover py-20 px-12 overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl text-white">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">Find your ideal accommodation for the
                    2030 World Cup</h1>
                <p class="text-xl opacity-90 mb-10">Discover thousands of accommodations in Morocco, Spain, and Portugal
                    to fully experience the 2030 World Cup.</p>

                <div class="bg-transparent border-white  border rounded-lg shadow-xl p-6 mb-10">
                    <form method="GET" action="{{ route('search') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="block text-white font-medium">Country</label>
                                <input type="text" name="country" placeholder="Enter the country"
                                    class="w-full text-black p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                            </div>
                    
                        </div>
                        <button type="submit" class="bg-teal-500 text-white p-3 rounded-lg">Search</button>
                    </form>

                    <div>
                        <h2 class="text-white">Search Results</h2>
                        @if(request()->has('country'))
                            @if($listings->isEmpty())
                                <p class="text-white">No listings found.</p>
                            @else
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach ($listings as $listing)
                                        <div class="border border-gray-300 p-4 rounded-lg">
                                            <h3 class="font-medium">{{ $listing->title }}</h3>
                                            <p>{{ $listing->country }}</p>
                                            <p>Available from:
                                                @if($listing->available_from)
                                                    {{ \Carbon\Carbon::parse($listing->available_from)->format('d/m/Y') }}
                                                @else
                                                    Not available
                                                @endif
                                            </p>


                                            <form action="{{ route('favorites.store', $listing->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-teal-500 text-white p-2 rounded-lg">Add to
                                                    Favorites</button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <p class="text-white">Please enter search criteria.</p>
                        @endif
                    </div>
                </div>



                <div class="flex flex-wrap -mx-2">
                    <div class="px-2 w-full sm:w-auto mb-4">
                        <div class="flex items-center bg-white bg-opacity-20 rounded-full px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-300 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>+10,000 listings</span>
                        </div>
                    </div>
                    <div class="px-2 w-full sm:w-auto mb-4">
                        <div class="flex items-center bg-white bg-opacity-20 rounded-full px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-300 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                            <span>Near the stadiums</span>
                        </div>
                    </div>
                    <div class="px-2 w-full sm:w-auto mb-4">
                        <div class="flex items-center bg-white bg-opacity-20 rounded-full px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-300 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span>Secure reservation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- About Section -->
    <section id="about" class="py-24 px-4 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto max-w-7xl">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <!-- Left Content -->
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <div class="space-y-6">
                        <div class="inline-block">
                            <span class="bg-teal-100 text-teal-800 text-xs font-medium px-3 py-1 rounded-full">About
                                Us</span>
                        </div>
                        <h2 class="text-4xl font-bold text-gray-800 leading-tight">About <span
                                class="text-teal-600">DARHORIZON</span></h2>
                        <div class="w-20 h-1 bg-teal-500 rounded"></div>

                        <p class="text-lg text-gray-600 leading-relaxed">
                            TouriStay 2030 is a platform that facilitates the rental of houses and apartments, offering
                            a simple and quick solution for tourists attending the 2030 World Cup
                            "Morocco-Spain-Portugal" events.
                        </p>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            Our mission is to connect travelers with local hosts in the host cities of the 2030 World
                            Cup, for an authentic and comfortable experience.
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mt-12">
                            <div
                                class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
                                <div
                                    class="bg-teal-50 p-4 rounded-xl inline-flex mb-4 group-hover:bg-teal-100 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-teal-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <h3 class="font-bold text-lg mb-2 text-gray-800">Verified Accommodations</h3>
                                <p class="text-gray-600">All our accommodations are thoroughly inspected and verified
                                    for quality</p>
                            </div>

                            <div
                                class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
                                <div
                                    class="bg-teal-50 p-4 rounded-xl inline-flex mb-4 group-hover:bg-teal-100 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-teal-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <h3 class="font-bold text-lg mb-2 text-gray-800">Strategic Locations</h3>
                                <p class="text-gray-600">Conveniently located near stadiums and popular attractions</p>
                            </div>

                            <div
                                class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
                                <div
                                    class="bg-teal-50 p-4 rounded-xl inline-flex mb-4 group-hover:bg-teal-100 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-teal-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                                <h3 class="font-bold text-lg mb-2 text-gray-800">Secure Payment</h3>
                                <p class="text-gray-600">Protected and guaranteed transactions for peace of mind</p>
                            </div>

                            <div
                                class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
                                <div
                                    class="bg-teal-50 p-4 rounded-xl inline-flex mb-4 group-hover:bg-teal-100 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-teal-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <h3 class="font-bold text-lg mb-2 text-gray-800">24/7 Support</h3>
                                <p class="text-gray-600">Dedicated assistance available whenever you need it</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="md:w-1/2 relative">
                    <div class="relative z-10">
                        <img src="{{ asset('assets/img/bggggggggggg.jpg') }}" alt="TouriStay Experience"
                            class="rounded-2xl  shadow-xl object-cover w-full h-72 transform hover:scale-[1.02] transition-transform duration-500">

                        <!-- Decorative elements -->
                        <div class="absolute -top-6 -right-6 w-24 h-24 bg-teal-100 rounded-full opacity-70 z-[-1]">
                        </div>
                        <div class=" absolute -bottom-6 -left-6 w-32 h-32 bg-teal-200 rounded-full opacity-50 z-[-1]">
                        </div>

                        <!-- Stats Card -->
                        <div
                            class="absolute -bottom-16 -left-8 bg-white p-6 rounded-2xl shadow-xl max-w-xs transform hover:translate-y-[-8px] transition-transform duration-300">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="flex -space-x-3">
                                    <img src="https://tse3.mm.bing.net/th?id=OIP.uykrwxWXpq2T7hv1xRTVsQHaFe&pid=Api&P=0&h=180"
                                        alt="User" class="w-12 h-12 rounded-full border-2 border-white object-cover">
                                    <img src="https://tse4.mm.bing.net/th?id=OIP.Q_vZZcSYOaPMcxnXMQQ99QHaE8&pid=Api&P=0&h=180"
                                        alt="User" class="w-12 h-12 rounded-full border-2 border-white object-cover">
                                    <img src="https://tse4.mm.bing.net/th?id=OIP.c0GTqHSPgp9rz7Pn2Aw_8wHaF7&pid=Api&P=0&h=180"
                                        alt="User" class="w-12 h-12 rounded-full border-2 border-white object-cover">
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-500">Already used by</div>
                                    <div class="text-teal-600 font-bold text-lg">+15,000 travelers</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="text-yellow-400 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium ml-3">4.5/5 <span
                                        class="text-gray-500 text-sm">(2,300+ reviews)</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mx-auto p-6 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-4">Explore Listings</h1>

        <!-- Filters and Pagination Selector -->
        <div
            class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-4 rounded-lg shadow-sm">
            <form method="GET" action="{{ route('tourist.listings') }}" class="flex items-center space-x-3">
                <label for="per_page" class="text-gray-700 font-medium">Show per page:</label>
                <select name="per_page" id="per_page"
                    class="border rounded-lg px-8 py-2 bg-white focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all"
                    onchange="this.form.submit()">
                    <option value="4" {{ $perPage == 4 ? 'selected' : '' }}>4</option>
                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                </select>
            </form>
        </div>

        <!-- Listings Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($listings as $listing)
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:translate-y-[-4px] group">
                    <div class="relative h-56 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('storage/' . $listing->image) }}" alt="{{ $listing->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-3 right-3 bg-teal-500 text-white px-3 py-1.5 rounded-lg text-sm font-semibold shadow-md">
                            €{{ number_format($listing->price, 2) }} / night
                        </div>
                        <form action="{{ route('favorites.store', $listing->id) }}" method="POST">
                            @csrf
                            @if(auth()->user()->favorites->contains('listing_id', $listing->id))

                                <button type="submit"
                                    class="absolute top-3 left-3 bg-white/80 backdrop-blur-sm hover:bg-white text-gray-700 hover:text-red-500 p-2 rounded-full shadow-md transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            @else

                                <button type="submit"
                                    class="absolute top-3 left-3 bg-white/80 backdrop-blur-sm hover:bg-white text-gray-700 hover:text-red-500 p-2 rounded-full shadow-md transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            @endif
                        </form>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-xl mb-2 text-gray-800">{{ $listing->title }}</h3>
                        <div class="flex items-center text-gray-600 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-teal-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm font-medium">{{ $listing->location }}</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $listing->description }}</p>
                        <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                            <span class="bg-gray-100 rounded-full px-3 py-1.5 text-xs font-medium text-gray-600">
                                {{ $listing->available_from }} - {{ $listing->available_until }}
                            </span>
                            <a href="#" class="text-teal-600 hover:text-teal-800 text-sm font-medium transition-colors">
                                View Details →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if(count($listings) === 0)
            <div class="flex flex-col items-center justify-center py-12 bg-white rounded-xl shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <h3 class="text-lg font-medium text-gray-700 mb-1">No listings found</h3>
                <p class="text-gray-500 text-sm">Try adjusting your search criteria</p>
            </div>
        @endif


        <!-- Pagination Links -->
        <div class="mt-10 flex justify-center">
            <div class="bg-white rounded-lg shadow-sm p-2 inline-flex">
                {{ $listings->appends(['per_page' => $perPage])->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>







</x-app-layout>