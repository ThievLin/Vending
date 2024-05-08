@extends('layouts.app-nav')
@section('content')
<div class="content">
    <div class="container">
        <div class="page-title">
        <h3 id="myTab" role="tablist">Vending Machines
            <a class="btn btn-sm btn-outline-primary float-end" href="/create_machin" aria-selected="false">
            <i class="fas fa-plus-circle"></i><span class="btn-header" "> Add Machines</span>
            </a>
        </h3>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="tab-content" id="myTabContent">
                    <div class="table-responsive">
                        <table width="100%" class="table table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Machine Image</th>
                                <th>Slot</th>
                                <th>Installation Date</th>
                                {{-- <th>Expired Date</th> --}}
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->m_name }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $data->m_image) }}" alt="{{ $data->m_name }}"
                                    style="max-width: 60px; max-height: 69px;">
                                </td>
                                <td>{{ $data->slot }}</td>
                                <td>{{ $data->installation_date }}</td>
                                {{-- <td>{{ $data->expiry_date }}</td> --}}
                                <td>{{ $data->communeRe->name_en ?? '' }}/{{ $data->districtsRe->name_en ?? '' }}/{{ $data->provinceRe->name_en ?? '' }}</td>
                                <td>Active</td>
                                <td class="text-end">
                                    <a href="{{ url('show_machines/' . $data->id) }}" class="btn btn-outline-muted btn-rounded" ">
                                        <i class="fas fa-regular fa-eye"></i>
                                    </a>
                                    <a href="{{ url('edit_machine/' . $data->id) }}" 
                                    class="btn btn-outline-muted btn-rounded"><i class="fas fa-pen"></i></a>
                                    <a href="/destroy/{{ $data->id }}" class="btn btn-outline-danger btn-rounded"
                                    onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i
                                    class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection