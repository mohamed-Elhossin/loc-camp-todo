<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List passwords
        </h2>
    </x-slot>


    <div class=" listCategory container mt-5 col-md-6">
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
                        <th>  Note Title : </th>
                        <th>{{ $password->title }} </th>
                    </tr>
                    <tr>
                        <th>  Notes :</th>
                        <th>     {!! nl2br( $password->description) !!}</th>

                    </tr>
                </table>
            </div>
        </div>
    </div>



</x-app-layout>
