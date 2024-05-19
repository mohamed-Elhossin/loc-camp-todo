<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List Notes for Add

        </h2>
    </x-slot>


    <div class=" listCategory container mt-5 col-md-7">
        @if (Session::has('done'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Notes</strong> {{ Session::get('done') }}.
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
                        <th> Status </th>

                        <th> Deadline </th>
                        <th colspan="3">Action</th>
                    </tr>
                    @foreach ($passwords as $item)
                        <tr>
                            <td>{{ $loop->iteration }} </td>
                            <th>{{ $item->title }}</th>
                            <th>{{ $item->description }}</th>
                            <th>{{ $item->deadline }}</th>

                            <th>
                                <a onclick="confirm('sure ? ')" href="{{ route('passwords.edit', $item->id) }}">
                                    {{ $item->status }}
                                </a>
                            </th>

                            <th><a href="{{ route('passwords.showPassword', $item->id) }}"><i
                                        class="fa-solid fa-eye"></i>
                                </a></th>
                            <th><a onclick="return confirm('are You Sure ?')"
                                    href="{{ route('passwords.destroy', $item->id) }}"><i title="delete"
                                        class="text-danger fa-solid fa-trash-can"></i></a></th>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>



</x-app-layout>
