<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Tasks : {{ $category->title }}
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
                <form action="{{ route('passwords.update', $category->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Task Title </label>
                        <input type="text" name="title"
                            class="form-control @error('title')
                            is-invalid
                        @enderror "
                            placeholder="Title">
                        @error('title')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <p for=""> Discription

                            <i id="showPassword" title="Show Password" class="mt-2 float-end fa-solid fa-eye"></i>
                        </p>

                        <textarea id="passwordCreation" rows="4" type="text" name="password"
                            class=" @error('password')
                        is-invalid
                    @enderror form-control"
                            placeholder="Password">
                        </textarea>

                        @error('password')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Task Title </label>
                        <select type="text" name="deadline"
                            class="form-control @error('deadline')
                            is-invalid
                        @enderror "
                            placeholder="deadline">
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }} Day , Start :
                                {{ date('Y-m-d') }}">{{ $i }} Day , Start :
                                    {{ date('Y-m-d') }}
                                </option>
                            @endfor

                        </select>
                        @error('deadline')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror

                    </div>

                    <input type="hidden" value="{{ $category->id }}" name="categoryId">
                    <div class="d-grid">
                        <button class="btn btn-info">Create </button>
                    </div>

                </form>
            </div>
        </div>
    </div>



</x-app-layout>
