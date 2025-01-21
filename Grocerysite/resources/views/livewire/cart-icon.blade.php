<div class="relative">
    <!-- Icon Container -->
    <div
        class="hover:scale-110 transition-transform duration-300 cursor-pointer
               hover:animate-wiggle"
        title="View Cart"
    >
        <!-- Example Cart Icon -->
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 text-gray-700"
            fill="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                d="M3,3H5l1,2H20a1,1,0,0,1,1,1l-2,9a1,1,0,0,1-1,1H8a1,1,0,0,1-1-.8L5.2,5H3ZM7.8,12H17l1.3-6H7.2Zm2.7,6a1.5,1.5,0,1,1-1.5-1.5A1.49,1.49,0,0,1,10.5,18Zm7,0a1.5,1.5,0,1,1-1.5-1.5A1.49,1.49,0,0,1,17.5,18Z"
            />
        </svg>
    </div>

    @if($cartCount > 0)
        <span
            class="absolute -top-2 -right-3 bg-red-600 text-white
                   text-xs px-2 py-1 rounded-full font-bold"
        >
            {{ $cartCount }}
        </span>
    @endif
</div>
