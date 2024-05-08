@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="col-md-12">
                <form action="{{ url('/create_incomList') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card space-card">
                        <div class="card-header">
                            <h5> Create Income </h5>
                        </div>
                        <div class="card-body">
                            <div class="row col-md-12">
                                <div class="mb-3 col-md-6"> <label for=""
                                        class=" block text-sm font-medium leading-6 text-gray-900">Machines</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <select id="id_income_categories" name="id_income_categories" autocomplete="off"
                                            class="border-style-select">
                                            <option value="" selected>Select income category
                                            </option>
                                            @foreach ($incomCa as $incomcategory)
                                                <option value="{{ $incomcategory->id }}">
                                                    {{ $incomcategory->type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6"> <label for=""
                                        class=" block text-sm font-medium leading-6 text-gray-900">Machines</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <select id="id_vending_machine" name="id_vending_machine" autocomplete="off"
                                            class="border-style-select">
                                            <option value="" selected>Select machines
                                            </option>
                                            @foreach ($machin as $machins)
                                                <option value="{{ $machins->id }}">
                                                    {{ $machins->m_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" ></textarea>
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
