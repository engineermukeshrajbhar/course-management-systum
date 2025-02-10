<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


</head>

<body class="font-inter bg-gray-100">

    <div class="flex h-screen">

        <!-- Sidebar (User Profile Section) -->
        <div class="w-80 bg-white shadow-md p-6 space-y-8 sticky top-0">

            <!-- Logo and Text -->
            <a href="#" class="flex items-center">
                <img class="w-12 h-12 rounded-full" src="https://placehold.co/100x100?text=Logo" alt="Logo">
                <p class="ml-3 text-xl font-semibold text-gray-800">Prinlans</p>
            </a>
            <hr />

            <!-- Profile Section -->
            <a href="#" class="flex items-center">
                <img class="w-12 h-12 rounded-full" src="https://placehold.co/600x600" alt="Profile Image">
                <div class="ml-4">
                    <p class="text-sm font-semibold text-gray-800">Mukesh Rajbhar</p>
                    <p class="text-xs text-gray-500">mukeshrajbhar@gmail.com</p>
                </div>
                <!-- Select Icon -->
                <i class="fas fa-chevron-down text-gray-600 ml-auto cursor-pointer"></i>
            </a>
            <hr />

            <!-- Navigation -->
            <nav class="mt-8">
                <!-- Small Menu Title -->
                <p class="text-xs font-semibold text-gray-500 uppercase mb-2">Menu</p>
                <br />

                <ul class="space-y-6">
                    <li>
                        <a href="#" class="flex items-center space-x-4 text-sm bg-gray-200 text-gray-800 px-2 pr-6 py-2 rounded-md">
                            <i class="fas fa-search text-gray-800"></i>
                            <span>Find courses</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-4 text-sm text-gray-700">
                            <i class="fas fa-users text-gray-600"></i>
                            <span>Find Instructor</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-4 text-sm text-gray-700">
                            <i class="fas fa-building text-gray-600"></i>
                            <span>Companies</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-4 text-sm text-gray-700">
                            <i class="fas fa-file-signature text-gray-600"></i>
                            <span>My Proposal</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-4 text-sm text-gray-700">
                            <i class="fas fa-comment text-gray-600"></i>
                            <span>Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-4 text-sm text-gray-700">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span>Notification</span>
                        </a>
                    </li>
                </ul>
            </nav>


            <br /> <br />


            <!-- Preferences Section -->
            <div class="mt-10">
                <p class="text-xs font-semibold text-gray-500">PREFERENCES</p>
                <div class="flex items-center text-sm text-gray-700 space-x-2 mt-2">
                    <i class="fas fa-cog text-gray-500"></i>
                    <span>Settings</span>
                </div>
                <div class="flex items-center text-sm text-gray-700 space-x-2 mt-2">
                    <i class="fas fa-question-circle text-gray-500"></i>
                    <span>Help</span>
                </div>
            </div>
        </div>


        <!-- Main Content -->
        <div class="flex-1 p-8 space-y-6">

            <!-- Header Section -->
            <div class="space-y-2">
                <h1 class="text-2xl font-semibold text-gray-800">Find Millions of Course Here!</h1>
                <p class="text-sm text-gray-600">Explore our newest Course opportunities and apply for the top positions available today.</p>
            </div>

            <!-- Search Section -->
            <div class="flex justify-between items-center space-x-6 mb-8">
                <!-- Course Search -->

                <input type="text" class="bg-gray-200 text-sm px-4 py-2 rounded-full w-1/2" placeholder="Search Courses...">

                <!-- City or Pincode Search -->
                <input type="text" class="bg-gray-200 text-sm px-4 py-2 rounded-full w-1/3" placeholder="Search City State or Zip code">

                <button class="bg-black text-white px-4 py-2 rounded-full text-sm flex items-center">
                    Find Course
                </button>
            </div>

            <!-- Filters and Results Section -->
            <div class="flex space-x-6">

                <!-- Filters Section -->
                <div class="w-1/4 bg-white shadow-md rounded-lg p-6">
                    <form id="filterForm" method="GET" action="{{ route('courses.index') }}">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-semibold text-gray-800 flex items-center">
                                <i class="fa-solid fa-filter mr-2"></i> Filters
                            </h3>
                            <a href="{{ route('courses.index') }}" class="text-[#b4eb34] text-xs font-semibold px-2 py-1 rounded hover:underline">
                                Reset
                            </a>
                        </div>
                        <!-- Category Filter -->
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-800">Category</h3>
                            <select name="category_id" class="w-full mt-2 bg-gray-100 text-sm px-4 py-2 rounded-md">
                                <option value="">Select categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <hr />
                        <br />

                        <!-- Price Filter -->
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-800">Price</h3>
                            <div class="flex flex-col space-y-3 mt-2">
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="radio" name="price" value="free" {{ request('price') === 'free' ? 'checked' : '' }} class="mr-2"> Free
                                </label>
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="radio" name="price" value="paid" {{ request('price') === 'paid' ? 'checked' : '' }} class="mr-2"> Paid
                                </label>
                            </div>
                        </div>

                        <hr />
                        <br />
                        <!-- Difficulty Level Filter -->
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-800">Difficulty Level</h3>
                            <div class="flex flex-col space-y-3 mt-2">
                                @foreach($difficultyLevels as $difficulty)
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" name="difficulty_level_id[]" value="{{ $difficulty->id }}"
                                        {{ in_array($difficulty->id, (array)request('difficulty_level_id')) ? 'checked' : '' }} class="mr-2">
                                    {{ $difficulty->level }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <hr />
                        <br />

                        <!-- Filter 4: Duration -->
                        <!-- Filter 4: Duration -->
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-800">Duration</h3>
                            <div class="flex flex-col space-y-3 mt-2">
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" name="duration[]" value="2h"
                                        {{ in_array('2h', (array)request('duration')) ? 'checked' : '' }} class="mr-2">
                                    &lt; 2 hours
                                </label>
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" name="duration[]" value="2-5h"
                                        {{ in_array('2-5h', (array)request('duration')) ? 'checked' : '' }} class="mr-2">
                                    2–5 hours
                                </label>
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" name="duration[]" value="5-10h"
                                        {{ in_array('5-10h', (array)request('duration')) ? 'checked' : '' }} class="mr-2">
                                    5–10 hours
                                </label>
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" name="duration[]" value="10h+"
                                        {{ in_array('10h+', (array)request('duration')) ? 'checked' : '' }} class="mr-2">
                                    &gt; 10 hours
                                </label>
                            </div>
                        </div>
                        <hr />
                        <br />

                        <!-- Filter 5: Ratings -->
                        <!-- <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-800">Ratings</h3>
                            <div class="flex flex-col space-y-3 mt-2">
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" class="mr-2"> 4+ stars
                                </label>
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" class="mr-2"> 3+ stars
                                </label>
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" class="mr-2"> 2 stars and below
                                </label>
                            </div>
                        </div> -->
                        <!-- <hr />
                        <br /> -->

                        <!-- Filter 6: Course Format -->
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-800">Course Format</h3>
                            <div class="flex flex-col space-y-3 mt-2">
                                @foreach($courseFormats as $format)
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" class="mr-2" value="{{ $format->id }}"> {{ $format->format }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <hr />
                        <br />

                        <!-- Filter 7: Certification -->
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-800">Certification</h3>
                            <div class="flex flex-col space-y-3 mt-2">
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" class="mr-2"> Certification Available
                                </label>
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" class="mr-2"> No Certification
                                </label>
                            </div>
                        </div>
                        <hr />
                        <br />

                        <!-- Filter 8: Release Date -->
                        <!-- <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-800">Release Date</h3>
                            <div class="flex flex-col space-y-3 mt-2">
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" class="mr-2"> Last 30 days
                                </label>
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" class="mr-2"> Last 6 months
                                </label>
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox" class="mr-2"> Last 1 year
                                </label>
                            </div>
                        </div> -->
                        <!-- <hr />
                        <br /> -->

                        <!-- Filter 9: Popularity -->
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-800">Popularity</h3>
                            <div class="flex flex-col space-y-3 mt-2">
                                @foreach($popularities as $popularity)
                                <label class="flex items-center text-sm text-gray-600">
                                    <input type="checkbox"
                                        name="popularity[]"
                                        value="{{ $popularity->id }}"
                                        {{ in_array($popularity->id, (array)request('popularity')) ? 'checked' : '' }}
                                        class="mr-2">
                                    {{ $popularity->name }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
                <hr />
                <br />

                <!-- Projects Section (Filter Results) -->
                <div class="w-3/4">

                    <div id="loading" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center">
                        <div class="bg-white p-4 rounded-lg">
                            <i class="fas fa-spinner fa-spin"></i> Loading...
                        </div>
                    </div>
                    <p class="text-sm text-gray-700 mb-4">Showing Results ({{ $courses->total() }})</p>

                    <div class="grid grid-cols-2 gap-6">
                        @foreach($courses as $course)
                        
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white relative p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-green-200 text-green-800 text-xs font-semibold px-2 py-1 rounded">
                                    {{ $course->difficultyLevel->level }}
                                </span>
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-500 text-xs">
                                        {{ number_format($course->duration / 60, 1) }} hours
                                    </span>
                                    <button class="text-gray-500 hover:text-gray-700">&#x22EE;</button>
                                </div>
                            </div>

                            <div class="px-2 py-2">
                                <div class="font-bold text-xl mb-2">{{ $course->title }}</div>
                                <p class="text-gray-700 text-xs">

                                    @if($course->certification == 1)
                                    <span class="text-[#0a95f2] text-xs font-semibold px-2 py-1 rounded inline-flex items-center gap-1">
                                        <i class="fa-solid fa-check"></i> Certificate Available
                                    </span>
                                    @endif

                                    | <i class='fas fa-map-marker-alt'></i> {{ $course->formet_id }} |
                                    <span class="text-[#b4eb34] text-xs font-semibold px-2 py-1 rounded">
                                        {{ $course->experience_level }}
                                    </span>
                                </p>
                                <p class="text-gray-600 text-sm mt-2">{{ Str::limit($course->description, 100) }}</p>

                                <div class="mt-2">
                                @if($course->tag)
                                    <span class="inline-block border border-gray-300 rounded-full px-2 py-0.5 text-xs font-semibold text-gray-800 mr-1">
                                    {{ $course->tag }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="px-2 pt-4 pb-2 flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="text-purple-500 text-xs">${{ number_format($course->price, 2) }}/hour</span>


                                    @if($course->popularity)
                                    <span class="text-purple-500 text-xs">
                                        <i class="fa-solid fa-chart-line"></i> {{ $course->popularity->name }}
                                    </span>
                                    @endif
                                </div>
                                <button class="bg-black text-white px-4 py-2 rounded-full text-sm flex items-center">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $courses->appends(request()->query())->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('filterForm');
            const courseContainer = document.querySelector('.grid.grid-cols-2');
            const resultCount = document.querySelector('.text-sm.text-gray-700.mb-4');

            function debounce(func, timeout = 300) {
                let timer;
                return (...args) => {
                    clearTimeout(timer);
                    timer = setTimeout(() => {
                        func.apply(this, args);
                    }, timeout);
                };
            }

            function updateResults() {
                const formData = new FormData(filterForm);
                const queryString = new URLSearchParams(formData).toString();

                fetch(`/courses?${queryString}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');

                        // Update course cards
                        const newContent = doc.querySelector('.grid.grid-cols-2').innerHTML;
                        courseContainer.innerHTML = newContent;

                        // Update result count
                        const newCount = doc.querySelector('.text-sm.text-gray-700.mb-4').innerHTML;
                        resultCount.innerHTML = newCount;
                    });
            }

            // Add event listeners to all filter inputs
            filterForm.querySelectorAll('input, select').forEach(element => {
                element.addEventListener('change', debounce(updateResults));
            });

            // Handle pagination clicks
            document.addEventListener('click', function(e) {
                if (e.target.closest('.pagination a')) {
                    e.preventDefault();
                    const url = e.target.closest('a').href;

                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');

                            // Update course cards
                            const newContent = doc.querySelector('.grid.grid-cols-2').innerHTML;
                            courseContainer.innerHTML = newContent;

                            // Update result count
                            const newCount = doc.querySelector('.text-sm.text-gray-700.mb-4').innerHTML;
                            resultCount.innerHTML = newCount;
                        });
                }
            });
        });
    </script>
</body>

</html>