@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="card ">
                <div class="card-body">
                    <div class="col-md-12">
                        <form action="{{ url('/add_companyinfor') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card space-card">
                                <div class="card-header">
                                    <h5>Create Company information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row col-md-12">
                                        <div class="mb-3 col-md-6">
                                            <label for="m_name" class="form-label">Company name</label>
                                            <input type="text" name="company_name" class="form-control">
                                            <span class="text-danger">
                                                @error('company_name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="slot" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control">
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="mb-3 col-md-6">
                                            <label for="installation_date" class="form-label">Contact</label>
                                            <input type="text" name="contact" class="form-control">
                                            <span class="text-danger">
                                                @error('contact')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Company Address</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="mb-3 col-md-6>
                                 <label for="province"
                                                class=" block text-sm font-medium leading-6 text-gray-900">
                                                Province</label>
                                                <div class="relative mt-2 rounded-md shadow-sm">
                                                    <select id="province" name="province" autocomplete="country-name"
                                                        class="border-style-select">
                                                        <option value="" selected>Select Province</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 col-md-12">
                                                <label for="districts"
                                                    class=" block text-sm font-medium leading-6 text-gray-900">Districts</label>
                                                <div class="relative mt-2 rounded-md shadow-sm">
                                                    <select id="districts" name="districts" autocomplete="country-name"
                                                        class="border-style-select">
                                                        <option selected>Select Districts</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 col-md-12">
                                                <label for="communes"
                                                    class="block text-sm font-medium leading-6 text-gray-900">Communes</label>
                                                <div class="relative mt-2 rounded-md shadow-sm">
                                                    <select id="communes" name="communes" autocomplete="country-name"
                                                        class="border-style-select">
                                                        <option selected>Select Communes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <label for="villages"
                                                    class="block text-sm font-medium leading-6 text-gray-900">Village</label>
                                                <div class="relative mt-2 rounded-md shadow-sm">
                                                    <select id="villages" name="villages" autocomplete="country-name"
                                                        class="border-style-select">
                                                        <option selected>Select Village</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="address" class="form-label">Full Address</label>
                                        <textarea class="form-control" name="address"></textarea>
                                        <span class="text-danger">
                                            @error('address')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div> --}}
                                    <div class="mb-3 text-end">
                                        <button class="btn btn-danger" onclick="window.history.back()" type="button"><i class="fa fa-chevron-left"></i> Return</button>

                                        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i>
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
    <script>

    </script>
@endsection
