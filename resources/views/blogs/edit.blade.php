<x-main-layout>
    <x-slot:title>
        Blog edit
        </x-slot>
        <style>
            .header-bottom {
                margin-bottom: 0;
            }
        </style>
        <x-nav-status>
            Blog edit / Edit > "{{ $blog->title }}"
        </x-nav-status>
        <div class="page-section mt-60 mb-60">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 mx-auto">
                        <form action="{{ route('blogs.update', ['blog' => $blog->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="login-form">
                                <h4 class="login-title">Edit a Product</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Title</label>
                                        <input class="mb-0" type="text" placeholder="Title"
                                            value="{{ $blog->title }}" name="title">
                                        @error('title')
                                            <p class="alert text-danger p-0 m-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Categories</label>

                                        <select name="category_id">
                                            <option value="">{{$blog->category->name}}</option>

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Short text</label>
                                        <input class="mb-0" type="text" placeholder="Last Name"
                                            value="{{ $blog->short_text }}" name="short_text">
                                        @error('short_text')
                                            <p class="alert text-danger p-0 m-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Content</label>
                                        <input class="mb-0" type="text" placeholder="Last Name"
                                            value="{{ $blog->content }}" name="content">
                                        @error('content')
                                            <p class="alert text-danger p-0 m-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-20">
                                        <label>Text headline</label>
                                        <input class="mb-0" type="text"
                                            placeholder="Stive Jobs's chosen this product"
                                            value="{{ $blog->text_headline }}" name="text_headline">
                                        @error('text_headline')
                                            <p class="alert text-danger p-0 m-0">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 col-6 mb-20">
                                        <label>Tags</label>
                                        <select name="tags[]" multiple>
                                            @foreach ($tags as $tag)
                                                <option value="{{$tag->id}}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-20">
                                        <label>image</label>
                                        <input class="mb-0 p-0" style="height:auto; width:auto" type="file"
                                            name="image">
                                        @error('image')
                                            <p class="alert text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        {{-- <a href="{{ route('blogs.show', ['blog' => $blog->id]) }}">
                                            <button class="btn btn-outline-danger px-5 mt-0">Cancel</button>
                                        </a> --}}
                                        {{-- <a class="btn btn-default btn-close" href="{{ route('home') }}">Cancel</a> --}}
                                        <a href="{{url()->previous()}}" class="btn btn-default btn-close px-5 mt-0">Cancel</a>
                                        <button type="submit"
                                            class="btn btn-primary px-5 mt-0 float-right">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-main-layout>
