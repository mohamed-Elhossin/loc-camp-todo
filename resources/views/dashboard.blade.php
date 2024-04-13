<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your Categories And Brand
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
                                    <a href="{{ route('passwords.create', $item->id) }}"> <i title="add Password"
                                            class="text-info mx-2 float-end fa-solid fa-plus"></i>
                                    </a>
                                    <a href="{{ route('passwords.index', $item->id) }}"> <i title="view Passwords"
                                            class="text-danger mx-2 float-end fa-solid fa-eye"></i></a>
                                </h6>
                                <hr>
                                <p>
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            @empty
                <div class="alert alert-info col-md-5 my-5 mx-auto">
                    <h1>There are no data here</h1>
                    <strong> <a href="{{ route('category.create') }}"> Add New Categories </a></strong>
                </div>
            @endforelse

        </div>
    </div>

</x-app-layout>
