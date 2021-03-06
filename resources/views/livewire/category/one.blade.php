<div>
    <div
        class="min-w-0 p-4 text-white {{ Arr::random(['bg-purple-600', 'bg-red-600', 'bg-blue-600', 'bg-orange-600', 'bg-yellow-600', 'bg-green-600']) }} rounded-lg shadow-xs m-2">
        <h4 class="mb-4 font-semibold">
            <a href='/categories/{{ $category->slug }}'
                class='visited:text-white w-100 bg-transparent hover:border-gray-300 focus:shadow border-b-2 border-gray-700 transition-colors duration-500 cursor-pointer'>
                {{ $category->title }}
                <span class='bg-gray-100 text-gray-600 hover:text-gray-800 rounded-full px-2'>
                    {{ $category->projects_count ?? 0 }}
                </span>
            </a>
        </h4>
        <p class='text-gray-300'>
            {{ $category->slug }}
        </p>
        <hr class='border border-gray-300' />
        <div class='py-1'>
            <x-jet-button bg='blue' icon='fas fa-edit' wire:click.prevent="$emit('edit', '{{ $category->slug }}')">
            </x-jet-button>
            <x-jet-button bg='red' icon='fas fa-trash' wire:click.prevent="destroy">
            </x-jet-button>
        </div>
    </div>
</div>
