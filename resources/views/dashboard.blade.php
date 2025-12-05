<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ផ្នែកទី ១: 3 Categories / Stats Cards (Design from React) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Card 1: Total Posts (Blue) --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group cursor-pointer h-full">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-xs font-bold tracking-wider uppercase mb-1">TOTAL POSTS</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2 mb-2 group-hover:text-indigo-600 transition-colors">10</h3>
                            <div class="flex items-center text-xs text-gray-500 font-medium">
                                <span class="flex items-center text-blue-500 bg-blue-100 bg-opacity-10 px-2 py-0.5 rounded-full mr-2">
                                    {{-- ArrowUpRight Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                    + Active
                                </span>
                                <span>Active Posts</span>
                            </div>
                        </div>
                        <div class="p-3 rounded-xl bg-blue-100 text-blue-500 bg-opacity-20 group-hover:scale-110 transition-transform duration-300">
                            {{-- FileText Icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                        </div>
                    </div>
                    <div class="h-1 w-full mt-4 rounded-full bg-gray-100 overflow-hidden">
                        <div class="h-full bg-blue-500 w-2/3 rounded-full"></div>
                    </div>
                </div>


                {{-- Card 2: Categories (Green) --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group cursor-pointer h-full">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-xs font-bold tracking-wider uppercase mb-1">CATEGORIES</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2 mb-2 group-hover:text-indigo-600 transition-colors">3</h3>
                            <div class="flex items-center text-xs text-gray-500 font-medium">
                                <span class="flex items-center text-green-500 bg-green-100 bg-opacity-10 px-2 py-0.5 rounded-full mr-2">
                                    {{-- ArrowUpRight Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                    + All
                                </span>
                                <span>Total Categories</span>
                            </div>
                        </div>
                        <div class="p-3 rounded-xl bg-green-100 text-green-500 bg-opacity-20 group-hover:scale-110 transition-transform duration-300">
                            {{-- Layers Icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        </div>
                    </div>
                    <div class="h-1 w-full mt-4 rounded-full bg-gray-100 overflow-hidden">
                        <div class="h-full bg-green-500 w-2/3 rounded-full"></div>
                    </div>
                </div>


                {{-- Card 3: Users (Orange) --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group cursor-pointer h-full">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-xs font-bold tracking-wider uppercase mb-1">USERS</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2 mb-2 group-hover:text-indigo-600 transition-colors">1</h3>
                            <div class="flex items-center text-xs text-gray-500 font-medium">
                                <span class="flex items-center text-orange-500 bg-orange-100 bg-opacity-10 px-2 py-0.5 rounded-full mr-2">
                                    {{-- ArrowUpRight Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                    + New
                                </span>
                                <span>Registered Users</span>
                            </div>
                        </div>
                        <div class="p-3 rounded-xl bg-orange-100 text-orange-500 bg-opacity-20 group-hover:scale-110 transition-transform duration-300">
                            {{-- Users Icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                    <div class="h-1 w-full mt-4 rounded-full bg-gray-100 overflow-hidden">
                        <div class="h-full bg-orange-500 w-2/3 rounded-full"></div>
                    </div>
                </div>

            </div>

            {{-- ផ្នែកទី ២: Recent Posts Table (Design from React) --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/30">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Recent Posts</h3>
                    </div>
                    <button class="text-sm font-medium text-indigo-600 hover:text-indigo-800 flex items-center group transition-all">
                        View All
                        {{-- ChevronRight Icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1 group-hover:translate-x-1 transition-transform"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </button>
                </div>


                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 text-gray-400 text-xs uppercase tracking-wider">
                                <th class="py-4 px-4 font-semibold">Title</th>
                                <th class="py-4 px-4 font-semibold">Created</th>
                                <th class="py-4 px-4 font-semibold text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @php
                                $posts = [
                                    ['title' => 'kkkkk', 'date' => 'Dec 04, 2025'],
                                    ['title' => '113', 'date' => 'Dec 03, 2025'],
                                    ['title' => '12312312412412', 'date' => 'Dec 03, 2025'],
                                    ['title' => 'new POST', 'date' => 'Dec 03, 2025'],
                                    ['title' => '2134423', 'date' => 'Dec 03, 2025'],
                                ];
                            @endphp

                            @foreach($posts as $post)
                            <tr class="hover:bg-indigo-50/50 transition-colors border-b border-gray-50 last:border-b-0 group">
                                <td class="py-4 px-4">
                                    <div class="font-medium text-gray-800 group-hover:text-indigo-600 transition-colors">{{ $post['title'] }}</div>
                                </td>
                                <td class="py-4 px-4 text-gray-500 text-sm">
                                    <div class="flex items-center">
                                        <div class="w-1.5 h-1.5 rounded-full bg-green-400 mr-2"></div>
                                        {{ $post['date'] }}
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <button class="p-2 text-indigo-500 hover:bg-indigo-100 rounded-full transition-all hover:scale-110 active:scale-95 shadow-sm">
                                        {{-- Eye Icon --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
