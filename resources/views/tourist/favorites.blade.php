<x-app-layout>



    <div class="container">
        <h1 class="text-2xl font-bold mb-4">My Favorite Listings</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="bg-yellow-500 text-white p-2 rounded mb-4">
                {{ session('info') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($favorites as $listing)
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:translate-y-[-4px] group">
                    <div class="relative h-56 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('storage/' . $listing->image) }}" alt="{{ $listing->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-3 right-3 bg-teal-500 text-white px-3 py-1.5 rounded-lg text-sm font-semibold shadow-md">
                            €{{ number_format($listing->price, 2) }} / night
                        </div>
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
            @empty
                <p>No favorites yet.</p>
            @endforelse
        </div>
    </div>






</x-app-layout>