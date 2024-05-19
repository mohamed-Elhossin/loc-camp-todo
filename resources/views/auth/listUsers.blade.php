<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List Users
        </h2>
    </x-slot>


    <div class=" listCategory container mt-5 col-md-7">
        @if (Session::has('done'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Users</strong> {{ Session::get('done') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th> ID </th>
                        <th> Name </th>
                        <th> Email </th>

                    </tr>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }} </td>
                            <th>{{ $item->name }}</th>
                            <th>{{ $item->email }}</th>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>



</x-app-layout>
