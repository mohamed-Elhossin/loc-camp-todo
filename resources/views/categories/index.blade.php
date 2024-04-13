<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List Categories
        </h2>
    </x-slot>


    <div class=" listCategory container mt-5 col-md-7">
        @if (Session::has('done'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Categories</strong> {{ Session::get('done') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th> ID </th>
                        <th> Title </th>
                        <th> Description </th>
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $loop->iteration }} </td>
                            <th>{{ $item->title }}</th>
                            <th>{{ $item->description }}</th>
                            <th><a onclick="return confirm('are You Sure ?')"
                                    href="{{ route('category.destroy', $item->id) }}"><i title="delete"
                                        class="text-danger fa-solid fa-trash-can"></i></a></th>
                            <th><a href="{{ route('category.edit', $item->id) }}"><i title="edit"
                                        class="text-warning fa-solid fa-pen-to-square"></i></a></th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>



</x-app-layout>
