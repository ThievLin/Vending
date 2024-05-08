@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Stock list
                    <a class="btn btn-sm btn-outline-primary float-end" href="/create-stock" aria-selected="false">
                        <i class="fas fa-plus-circle"></i><span class="btn-header" "> Add To Stock</span>
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
                                                    <th>Source</th>
                                                    <th>Received Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach ($data as $item)
                                                    <tr class="edit-row" data-id="{{ $item->id }}">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->supp->supp_name }}</td>
                                                        <td>{{ $item->warehouse->warehouse_name }}</td>
                                                        <td>{{ $item->source }}</td>
                                                        <td>{{ $item->received_date }}</td>
                                                        <td>Active</td>

                                                    </tr>
                                                @endforeach
                            </tbody>
                            </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rows = document.querySelectorAll('.edit-row');
            rows.forEach(function(row) {
                row.addEventListener('click', function() {
                    var id = row.dataset.id;
                    window.location.href = "{{ url('edit_stock') }}/" + id;
                });
            });
        });
    </script>
@endsection
