@php
    use App\Models\Stockproduct;
@endphp
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
<tbody>
    @foreach ($data as $item)
        @php
            $qtyArray = json_decode($item->totalqty, true);
            $proIdArray = json_decode($item->pro_id, true);
            $wareId = $item->ware_id;
        @endphp

        @for ($i = 0; $i < count($qtyArray); $i++)
            @php
                $productId = $proIdArray[$i];
                $quantity = $qtyArray[$i];

                // Check if a record with the same pro_id and ware_id exists
                $existingRecord = Stockproduct::where('pro_id', $productId)->where('ware_id', $wareId)->first();

                if ($existingRecord) {
                    // If record already exists, add the new quantity to the existing totalqty
                    $existingRecord->totalqty += $quantity;
                    $existingRecord->save();
                } else {
                    // If record does not exist, create a new one
                    $productName = App\Models\Product::find($productId)->p_name ?? '';
                    $product = new Stockproduct();
                    $product->p_name = $productName;
                    $product->totalqty = $quantity;
                    $product->pro_id = $productId;
                    $product->ware_id = $wareId;
                    $product->save();
                }
            @endphp
        @endfor
    @endforeach
</tbody>
