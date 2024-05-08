@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="card ">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="card space-card">
                            <div class="card-header">
                                <h5>MACHINES INFORMATION</h5>
                            </div>
                            <div class="card-body">
                                <div class="row col-md-12">
                                    <div class="mb-3 col-md-4 text-center">
                                        <img src="{{ asset('storage/' . $data->m_image) }}" alt="{{ $data->m_name }}"
                                            style="max-width: 350px; max-height: 350px;">
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <div class="mb-3">
                                            <span><strong>Vending Machine Name : </strong> {{ $data->m_name }} </span>
                                        </div>
                                        <div class="mb-3">
                                            
                                            <span><strong>Slot quantity : </strong> {{ $data->slot }} </span>
                                        </div>
                                        <div class="mb-3">
                                            <span><strong>Install Date : </strong> {{ $data->installation_date }} </span>
                                        </div>
                                        <div class="mb-3">
                                            <span><strong>Expiry Date : </strong> {{ $data->expiry_date }} </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="card space-card">
                            <div class="card-header">
                                <h5>ADRESS INFORMATION</h5>
                            </div>
                            <div class="card-body">
                                <div class="row col-md-12">
                                    <div class="mb-3 col-md-8">
                                        <div class="mb-3">
                                            <span><strong>Village : </strong> {{ $data->villageRe->name_en ?? '' }} </span>
                                        </div>
                                        <div class="mb-3">
                                            <span><strong>Commune : </strong> {{ $data->communeRe->name_en ?? ''}} </span>
                                        </div>
                                        <div class="mb-3">
                                            <span><strong>Districts : </strong> {{ $data->districtsRe->name_en ?? ''  }} </span>
                                        </div>
                                        <div class="mb-3">
                                            <span><strong>Province : </strong> {{ $data->provinceRe->name_en ?? '' }} </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script></script>
@endsection
