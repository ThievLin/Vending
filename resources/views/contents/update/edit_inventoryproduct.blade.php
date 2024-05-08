@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="col-md-12">
                <form action="{{ url('update_inventoryproduct/' . $producData->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card space-card">
                        <div class="card-header">
                            <h5> Update Product </h5>
                        </div>
                        <div class="card-body">
                            <div class="row col-md-12">
                                <div class="mb-3 col-md-6"> <label for=""
                                        class=" block text-sm font-medium leading-6 text-gray-900">Product Name</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <select id="pro_id" name="pro_id" autocomplete="off"
                                            class="border-style-select">
                                            <option value="" selected>Select product
                                                name
                                            </option>
                                            @foreach ($product_ca as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->p_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="mb-3 text-end">
                                <button class="btn btn-danger" onclick="window.history.back()" type="button"><i class="fa fa-chevron-left"></i> Return</button>

                                <button class="btn btn-success" type="submit"><i class="fas fa-check"></i>
                                    Save</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form>
    </div>
    </div>
    </div>
@endsection
