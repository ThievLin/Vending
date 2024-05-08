@extends('layouts.app-nav')
@section('content')
    <div class="container-fluid" id="formbg">
        <div class="row">
            <div class="card-body myForm">
                <ul id="savaform_errlist"></ul>
                <div class="row g-3">
                    <div class="content">
                        <div class="container">
                            <div class="col-md-12">
                                <form action="{{ url('update_machine/' . $data->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="card space-card">
                                        <div class="card-header">
                                            <h5>Machines Information</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="mb-3 col-md-6">
                                                    <label for="m_name" class="form-label">Machines name</label>
                                                    <input type="text" name="m_name" class="form-control"
                                                        value="{{ $data->m_name }}">
                                                    @error('m_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="slot" class="form-label">Slot</label>
                                                    <input type="text" name="slot" class="form-control"
                                                        value="{{ $data->slot }}">
                                                    @error('slot')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row col-md-12">
                                                <div class="mb-3 col-md-6">
                                                    <label for="installation_date" class="form-label">Installation
                                                        date</label>
                                                    <input type="date" name="installation_date" class="form-control"
                                                        value="{{ $data->installation_date }}">
                                                    @error('installation_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="expired_date" class="form-label">Expired
                                                        date</label>
                                                    <input type="date" name="expiry_date" class="form-control"
                                                        value="{{ $data->expiry_date }}">
                                                    @error('expiry_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <div class="mb-3">
                                                <label class="form-label">Machines image</label>
                                                <input class="form-control" name="m_image" type="file" id="formFile1">
                                                <small class="text-muted">The image must have a maximum size of
                                                    1MB</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Machines Address</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="col-md-6">
                                                    <div class="mb-3 col-md-6>
                                                    <label for="province"
                                                        class=" block text-sm font-medium leading-6 text-gray-900">
                                                        Province</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="province" name="province"
                                                                autocomplete="country-name" class="border-style-select">
                                                                <option value="{{ $data->provinceRe->id }}" selected>{{ $data->provinceRe->name_en ?? '' }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 col-md-12">
                                                        <label for="districts"
                                                            class=" block text-sm font-medium leading-6 text-gray-900">Districts</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="districts" name="districts"
                                                                autocomplete="country-name" class="border-style-select">
                                                                <option value="{{ $data->districtsRe->id }}" selected>{{ $data->districtsRe->name_en ?? '' }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 col-md-12">
                                                        <label for="communes"
                                                            class="block text-sm font-medium leading-6 text-gray-900">Communes</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="communes" name="communes"
                                                                autocomplete="country-name" class="border-style-select">
                                                                <option value="{{ $data->communeRe->id }}" selected>{{ $data->communeRe->name_en ?? '' }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <label for="villages"
                                                            class="block text-sm font-medium leading-6 text-gray-900">village</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="villages" name="villages"
                                                                autocomplete="country-name" class="border-style-select">
                                                                <option value="{{ $data->villageRe->id }}" selected>{{ $data->villageRe->name_en ?? '' }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 text-end">
                                                <button class="btn btn-danger" onclick="window.history.back()" type="button"><i class="fa fa-chevron-left"></i> Return</button>

                                                <button class="btn btn-success" type="submit"><i
                                                        class="fas fa-check"></i>
                                                    Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
