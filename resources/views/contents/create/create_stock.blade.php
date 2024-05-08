@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="card ">
                <div class="card-body">
                    <div class="col-md-12">
                        <form action="{{ url('/add-stock') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <section id="invoice">
                                {{-- <div
                                    class=" d-md-flex justify-content-between align-items-center border-top border-bottom border-primary my-5 py-3">
                                    <h2 class="display-6 fw-bold m-0 ali">Product Order</h2>
                                    <div>
                                        <p class="m-0"> <span class="fw-medium">Invoice No:</span> 12345</p>
                                        <p class="m-0"> <span class="fw-medium">Invoice Date:</span> 20 May, 2024</p>
                                        <p class="m-0"> <span class="fw-medium">Due Date:</span> 20 June, 2024</p>
                                    </div>
                    
                                </div> --}}
                                <div class="container my-5 ">

                                    {{-- <div class="text-center pb-5">
                                            <img src="images/logo_dark.png" alt="">
                                        </div> --}}

                                    <div class="d-md-flex justify-content-between my-5">
                                        <div>
                                            <ul class="list-unstyled m-0">
                                                <li class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <label for="province"
                                                            class="block text-sm font-medium leading-6 text-gray-900 fw-medium">From
                                                            :</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <select id="supp_id" name="supp_id" autocomplete="off"
                                                                class="border-style-select">
                                                                <option value="" selected></option>
                                                                @foreach ($supp_data as $supp_data)
                                                                    <option value="{{ $supp_data->id }}" data-slots="">
                                                                        {{ $supp_data->supp_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <p class="m-0"><span class="fw-medium">To Location:</span></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <select id="ware_id" name="ware_id" autocomplete="off"
                                                                class="border-style-select">
                                                                @foreach ($ware as $supp_data)
                                                                    <option value="{{ $supp_data->id }}" data-slots="">
                                                                        {{ $supp_data->warehouse_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="mt-5 mt-md-0">
                                            {{-- <h4>William Peter</h4> --}}
                                            <ul class="list-unstyled m-0">
                                                <li class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <p class="m-0"><span class="fw-medium">Received date:</span></p>
                                                    </div>
                                                    <div class="mb-2 col-md-6">
                                                        <input type="date" name="received_date" value=""
                                                            class="form-control">
                                                    </div>
                                                </li>
                                                <li class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <p class="m-0"><span class="fw-medium">Source:</span></p>
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <input type="text" name="source" value=""
                                                            class="form-control">
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
                                                <tr>
                                                    <th>
                                                        <div class="">
                                                            <select name="pro_id[]" autocomplete="off"
                                                                class="border-style-select mb-2 col-md-8">
                                                                <option value="" selected></option>
                                                                @foreach ($pro_data as $pro_data1)
                                                                    <option value="{{ $pro_data1->id }}" data-slots="">
                                                                        {{ $pro_data1->p_name }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </th>
                                                    <td>
                                                        <div class="mb-2 col-md-8">
                                                            <input type="text" name="qty[]" value=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mb-2 col-md-8">
                                                            <input type="text" name="price[]" value=""
                                                                class="form-control">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="mb-2 col-md-8">
                                                            <input type="text" name="uom[]" value=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="mb-2 col-md-8">
                                                            <input type="text" name="subtotal[]" value=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" id="addMore">Add More</button>
                                    </div>
                                </div>
                                <div class="mb-3 text-end">
                                    <button class="btn btn-danger" onclick="window.history.back()" type="button"><i class="fa fa-chevron-left"></i> Return</button>

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
                `<div class="mb-2 col-md-8"><input type="text" name="subtotal[]" value="" class="form-control"></div>`;
            cell5.innerHTML =
                `<div class="mb-2 col-md-8"><input type="text" name="uom[]" value="" class="form-control"></div>`;
        });
    </script>
@endsection
