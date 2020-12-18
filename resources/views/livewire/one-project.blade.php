<div>
    <div
        class='group hover:bg-gray-300 transition duration-500 ease-linear relative bg-gray-700 shadow mb-4 rounded overflow-hidden'>
        <a class='appearance-none cursor-pointer' href='/projects/{{ $project->slug }}' class='text-lg'>
            <img class='w-full transition-transform duration-500 ease-in-out transform overflow-hidden hover:scale-110'
                src='{{ $project->img_path }}' />
            @if($project->completed)
                <div class='absolute top-0 left-0 bg-green-600 text-white uppercase p-1 opacity-75'>
                    <i class='fas fa-check'></i>
                    completed
                </div>
            @endif
            <div class='absolute top-0 right-0 bg-red-700 text-white px-2 font-semibold opacity-75'>
                {{ $project->todos_count ?? 0 }}
                <i class='fas fa-at'></i>
            </div>
            <div class='p-2 font-bold cursor-pointer'>
                <h3><a class='pt-1 text-teal-400 hover:text-teal-600 hover:underline group-hover:text-teal-700'
                        href='/projects/{{ $project->slug }}' class='text-lg'>{{ $project->name }}</a></h3>
                <p class='text-green-500'>${{ $project->cost }}</p>
                <p class='text-gray-300 group-hover:text-gray-800'>
                    <i class='fas fa-bookmark'></i>
                    {{ $project->category->title }}
                </p>
                <hr class='border border-gray-400 group-hover:border-gray-700 my-3' wire:ignore />
                <div class='px-2'>
                    @foreach(
                        $project->team as $team_user)
                        <img src="{{ $team_user->profile_photo_url }}"
                            class='h-10 w-10 rounded-full object-cover border-2 border-gray-300 inline group-hover:border-gray-800 -m-2'
                            alt='{{ $team_user->name }} profile photo' title='{{ $team_user->name }}' />
                    @endforeach
                </div>
                <hr class='border border-gray-400 group-hover:border-gray-700 my-3' wire:ignore />
                <div class='grid grid-cols-2 sm:grid-cols-4 gap-1 sm:gap-0 text-center'>
                    <x-jet-button class='rounded-r-none' bg='blue' clear='1' icon='fas fa-edit'
                        wire:click.prevent='edit'>
                        <span class='hidden overflow-clip overflow-hidden md:block'>
                            Edit
                        </span>
                    </x-jet-button>
                    @if($project->completed)
                        <x-jet-button bg='orange' class='' :clear='1' rounded='0' icon='fas fa-times'
                            wire:click.prevent='toggleCompleted'>
                            <span class='hidden overflow-clip overflow-hidden md:block'>complete</span>
                        </x-jet-button>
                    @else
                        <x-jet-button bg='green' class='' :clear='1' rounded='0' icon='fas fa-check'
                            wire:click.prevent='toggleCompleted'>
                            <span class='hidden overflow-clip overflow-hidden md:block'>complete</span>
                        </x-jet-button>
                    @endif
                    <x-jet-button bg='red' :clear='1' rounded='0' icon='fas fa-trash-alt'
                        wire:click.prevent='toggleModal'>
                        <span class='hidden overflow-clip overflow-hidden md:block'>delete</span>
                    </x-jet-button>
                    <x-jet-button class='rounded-l-none' bg='teal' clear='1' icon='fas fa-plus'>
                        <span class='hidden overflow-clip overflow-hidden md:block'>user</span>
                    </x-jet-button>
                </div>
            </div>
        </a>
    </div>
    <x-jet-confirmation-modal wire:model.lazy='openModal' wire:ignore>
        <x-slot name='title'>
            <h1 class='text-lg font-semibold'>
                Confirim Delete
            </h1>
        </x-slot>

        <x-slot name='content'>
            <h3 class='text-lg capitalize text-red-500'>
                <strong>are you sure want to delete</strong> <span
                    class='text-white text-sm'>{{ $project->name }}</span>
            </h3>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-button bg='red' clear='1' wire:click.prevent='destroy' icon='fas fa-trash-alt'>
                delete
            </x-jet-button>
            <x-jet-button bg='orange' wire:click.prevent='toggleModal' icon='fas fa-times'>
                cancel
            </x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
