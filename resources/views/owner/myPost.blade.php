<x-app-layout>
    <section class="py-20 px-4 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto max-w-3xl">
            <!-- Header -->
            <div class="text-center mb-12">
                <span class="bg-teal-100 text-teal-800 text-xs font-medium px-3 py-1 rounded-full">Owner Dashboard</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-4 mb-2">Add Your Property</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">List your accommodation for the 2030 World Cup and connect with travelers from around the world.</p>
            </div>
            {{ $errors->first() }}
            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-10">
                <!-- The form posts to the 'listings.store' route -->
                <form action="{{ route('listings.store') }}" method="POST" class="space-y-8">
                    @csrf <!-- CSRF token for security -->
                    
                    <!-- Title -->
                    <div class="space-y-2">
                        <label for="title" class="block text-sm font-medium text-gray-700">Property Title <span class="text-red-500">*</span></label>
                        <input type="text" id="title" name="title" placeholder="e.g. Luxury Apartment Near Stadium" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
                        <textarea id="description" name="description" rows="4" placeholder="Describe your property, amenities, and what makes it special..." 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required></textarea>
                    </div>

                    <!-- Location -->
                    <div class="space-y-2">
                        <label for="location" class="block text-sm font-medium text-gray-700">Location <span class="text-red-500">*</span></label>
                        <input type="text" id="location" name="location" placeholder="e.g. Casablanca, Barcelona, Lisbon" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                    </div>

                    <!-- Price -->
                    <div class="space-y-2">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price per Night (USD) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500">$</span>
                            </div>
                            <input type="number" id="price" name="price" min="1" placeholder="150" 
                                class="w-full pl-8 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                        </div>
                    </div>

                    <!-- Availability Dates -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="available_from" class="block text-sm font-medium text-gray-700">Available From <span class="text-red-500">*</span></label>
                            <input type="date" id="available_from" name="available_from" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                        </div>

                        <div class="space-y-2">
                            <label for="available_until" class="block text-sm font-medium text-gray-700">Available Until <span class="text-red-500">*</span></label>
                            <input type="date" id="available_until" name="available_until" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                        </div>
                    </div>

                    <!-- Country -->
                    <div class="space-y-2">
                        <label for="country" class="block text-sm font-medium text-gray-700">Country <span class="text-red-500">*</span></label>
                        <select id="country" name="country" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                            <option value="" disabled selected>Select a country</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Spain">Spain</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white py-3 px-6 rounded-lg transition flex items-center justify-center font-medium text-lg">
                            List Your Property
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
