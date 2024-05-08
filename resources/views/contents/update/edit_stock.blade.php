@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="card ">
                <div class="card-body">
                    <div class="col-md-12">
                        <form action="{{ url('/update_stock/' . $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <section id="invoice">
                                <div class="container my-5 ">
                                    <div class="d-md-flex justify-content-between my-5">
                                        <div>
                                            <ul class="list-unstyled m-0">
                                                <li class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="province"
                                                            class="block text-sm font-medium leading-6 text-gray-900 fw-medium">From
                                                            : {{ $data->supp->supp_name }}</label>
                                                    </div>
                                                </li>
                                                <li class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <p class="m-0"><span class="fw-medium">To Location :
                                                                {{ $data->warehouse->warehouse_name }}</span></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="mt-5 mt-md-0">
                                            {{-- <h4>William Peter</h4> --}}
                                            <ul class="list-unstyled m-0">
                                                <li class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <p class="m-0"><span class="fw-medium">Received date :
                                                                {{ $data->received_date }}</span></p>
                                                    </div>
                                                </li>
                                                <li class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <p class="m-0"><span class="fw-medium">Source :
                                                                {{ $data->source }}</span></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <table class="table table-striped border my-5" id="productTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">UOM</th>
                                                    <th scope="col">SubTotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $qtyArray = json_decode($data->qty, true);
                                                    $priceArray = json_decode($data->price, true);
                                                    $subtotalArray = json_decode($data->subtotal, true);
                                                    $uomArray = json_decode($data->uom, true);
                                                    $proIdArray = json_decode($data->pro_id, true);
                                                @endphp

                                                @for ($i = 0; $i < count($qtyArray); $i++)
                                                    <tr>
                                                        <th>
                                                            <div class="">
                                                                <select name="pro_id[]" autocomplete="off"
                                                                    class="border-style-select mb-2 col-md-8">
                                                                    <option value="{{ $proIdArray[$i] ?? '' }}" selected>
                                                                        {{ App\Models\Product::find($proIdArray[$i])->p_name ?? '' }}
                                                                    </option>
                                                                    @foreach ($pro_data as $pro_data1)
                                                                        <option value="{{ $pro_data1->id }}" data-slots="">
                                                                            {{ $pro_data1->p_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="mb-2 col-md-8">
                                                                <input type="text" name="qty[]"
                                                                    value="{{ $qtyArray[$i] ?? '' }}" class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="mb-2 col-md-8">
                                                                <input type="text" name="price[]"
                                                                    value="{{ $priceArray[$i] ?? '' }}"
                                                                    class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="mb-2 col-md-8">
                                                                <input type="text" name="uom[]"
                                                                    value="{{ $uomArray[$i] ?? '' }}" class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="mb-2 col-md-8">
                                                                <input type="text" name="subtotal[]"
                                                                    value="{{ $subtotalArray[$i] ?? '' }}"
                                                                    class="form-control">
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endfor
                                            </tbody>



                                        </table>
                                        <button type="button" class="btn btn-primary" id="addMore">Add More</button>
                                    </div>
                                </div>
                                <div class="mb-3 text-end">
                                    <button class="btn btn-danger" data-bs-dismiss="modal" onclick="" type="button"><i
                                            class="fa fa-chevron-left"></i> Return</button>
                                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i>
                                        Save</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var proData = @json($pro_data);

        document.getElementById("addMore").addEventListener("click", function() {
            var table = document.getElementById("productTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);

            var selectElement = document.createElement('select');
            selectElement.name = 'pro_id[]';
            selectElement.autocomplete = 'off';
            selectElement.className = 'border-style-select mb-2 col-md-8';

            var defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.text = '';
            defaultOption.selected = true;
            selectElement.appendChild(defaultOption);

            for (var i = 0; i < proData.length; i++) {
                var option = document.createElement('option');
                option.value = proData[i].id;
                option.text = proData[i].p_name;
                selectElement.appendChild(option);
            }

            cell1.appendChild(selectElement);

            cell2.innerHTML =
                `<div class="mb-2 col-md-8"><input type="text" name="qty[]" value="" class="form-control"></div>`;
            cell3.innerHTML =
                `<div class="mb-2 col-md-8"><input type="text" name="price[]" value="" class="form-control"></div>`;
            cell4.innerHTML =
                `<div class="mb-2 col-md-8"><input type="text" name="uom[]" value="" class="form-control"></div>`;
            cell5.innerHTML =
                `<div class="mb-2 col-md-8"><input type="text" name="subtotal[]" value="" class="form-control"></div>`;

        });
    </script>
@endsection
