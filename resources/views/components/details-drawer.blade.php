<details class="mt-2 group flex flex-col gap-4 self-stretch [&_svg]:open:rotate-0" open>
    <summary class="flex cursor-pointer items-center justify-between">
        <p class="text-3xl font-serif text-indigo-800 flex justify-between pr-2">
            {{ $title }}
        </p>
        <svg class="h-6 w-6 transition-all duration-500" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg" transform="rotate(180)">
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path d="M18 15L12 9L6 15" stroke="#33363F" stroke-width="2"></path>
            </g>
        </svg>
    </summary>
    {{ $slot }}
</details>
