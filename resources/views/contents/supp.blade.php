@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Supplier
                    <a class="btn btn-sm btn-outline-primary float-end" href="/create-sub" aria-selected="false">
                        <i class="fas fa-plus-circle"></i><span class="btn-header" "> Add Supplier</span>
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
                                                    <th>Supplier Name</th>
                                                    <th>Location</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->supp_name }}</td>
                                <td>{{ $data->communeRe->name_en ?? '' }}/{{ $data->districtsRe->name_en ?? '' }}/{{ $data->provinceRe->name_en ?? '' }}</td>
                                <td>
                                    <a href="{{ url('edit-supp/' . $data->id) }}" 
                                    class="btn btn-outline-muted btn-rounded"><i class="fas fa-pen"></i></a>
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
