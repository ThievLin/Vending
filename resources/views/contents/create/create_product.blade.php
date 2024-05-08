@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="col-md-12">
                <form action="{{ url('/create-product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card space-card">
                        <div class="card-header">
                            <h5>Product</h5>
                        </div>
                        <div class="card-body">
                            <div class="row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="p_name" class="form-label">Product Name</label>
                                    <input type="text" name="p_name" class="form-control">
                                    <span class="text-danger">
                                        @error('p_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="expired_date" class="form-label">Expired date</label>
                                    <input type="date" name="expiry_date" class="form-control">
                                    <span class="text-danger">
                                        @error('expiry_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row col-md-12">
                                    {{-- <div class="mb-3 col-md-6">
                                        <label for="p_name" class="form-label">Specific Code</label>
                                        <input type="text" name="specific_code" class="form-control">
                                        <span class="text-danger">
                                            @error('specific_code')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="mb-3 col-md-12"> <label for=" province"
                                            class=" block text-sm font-medium leading-6 text-gray-900">
                                            Product Categories</label>
                                            <div class="relative mt-2 rounded-md shadow-sm">
                                                <select id="id_pro_categories" name="id_pro_categories" autocomplete="off"
                                                    class="border-style-select">
                                                    <option value="" selected>Select product
                                                        Categories
                                                    </option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Machines image</label>
                                        <input class="form-control" name="p_image" type="file" id="formFile1">
                                        <small class="text-muted">The image must have a maximum size of
                                            1MB</small>
                                    </div>
                                    <div class="mb-3 text-end">
                                        <button class="btn btn-danger" onclick="window.history.back()" type="button"><i class="fa fa-chevron-left"></i> Return</button>

                                        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i>
                                            Save</button>
                                    </div>
                                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
