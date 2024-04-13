<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Passwords
        </h2>
    </x-slot>


    <div class=" listCategory container mt-5 col-md-4">

        @if (Session::has('done'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Categories</strong> {{ Session::get('done') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">

            <div class="card-body">
                <form action="{{ route('category.update',$category->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Title </label>
                        <input type="text" name="title"
                        value="{{$category->title}}"
                            class="form-control @error('title')
                            is-invalid
                        @enderror "
                            placeholder="Title">
                        @error('title')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="">Category Description </label>
                        <textarea rows="4" type="text" name="description"
                            class=" @error('description')
                        is-invalid
                    @enderror form-control"
                            placeholder="Description">
                         {{$category->description}}
                        </textarea>
                        @error('description')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-warning">Edit </button>
                    </div>

                </form>
            </div>
        </div>
    </div>



</x-app-layout>
