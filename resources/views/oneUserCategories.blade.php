<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Task Categories
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            @forelse ($categories as $item)
                <div class="col-md-6">
                    <div class=" category card p-3 my-2">
                        <div class="card-body bg-light">
                            <div class="">
                                <h6>
                                    {{ $item->title }}
                                    <a href="{{ route('passwords.create', $item->id) }}"> <i title="add Tasks"
                                            class="text-info mx-2 float-end fa-solid fa-plus"></i>
                                    </a>
                                    <a href="{{ route('passwords.index', $item->id) }}"> <i title="view Tasks"
                                            class="text-danger mx-2 float-end fa-solid fa-eye"></i></a>
                                </h6>
                                <hr>
                                <p>
                                    {{ $item->description }}

                                </p>
                                <hr>
                                @foreach ($counts as $itemConut)
                                    @if ($itemConut->id == $item->id)
                                        <span class="text-bold"> Total : {{ $itemConut->all_tasks }}</span>
                                        |
                                        <span class="text-danger ms-2"> Todo :
                                            {{ $itemConut->waiting_count }}</span>
                                        |
                                        <span class="text-info mx-3"> In Progress : {{ $itemConut->in_progress }}</span>
                                        |
                                        <span class="text-success"> Done : {{ $itemConut->done_count }}</span>
                                    @endif
                                @endforeach
                                <br>
                                <span>For : {{ $item->for_user }}</span>
                            </div>
                        </div>
                    </div>


                </div>
            @empty
                <div class="alert alert-info col-md-5 my-5 mx-auto">
                    <h1>Empty Tasks </h1>
                    {{-- <strong> <a href="{{ route('category.create') }}"> Add New Categories </a></strong> --}}
                </div>
            @endforelse

        </div>
    </div>

</x-app-layout>
