<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Team
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            @forelse ($users as $item)
            @if ($item->rule_id==2)


                <div class="col-md-6">
                    <div class=" category card p-3 my-2">
                        <div class="card-body bg-dark text-light">
                            <div class="">
                                <h6>
                           <b>     {{ $item->name }}</b>
                                    {{-- <a href="{{ route('passwords.create', $item->id) }}"> <i title="add Tasks"
                                            class="text-info mx-2 float-end fa-solid fa-plus"></i>
                                    </a> --}}
                                    <a href="{{ route('oneUserCategories', $item->name) }}"> <i title="view Tasks Category"
                                            class="text-danger mx-2 float-end fa-solid fa-eye"></i></a>
                                </h6>
                            </div>
                        </div>
                    </div>


                </div>
                @endif
            @empty
                <div class="alert alert-info col-md-5 my-5 mx-auto">
                    <h1>Empty Tasks </h1>
                    {{-- <strong> <a href="{{ route('category.create') }}"> Add New Categories </a></strong> --}}
                </div>
            @endforelse

        </div>
    </div>

</x-app-layout>
