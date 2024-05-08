@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Inventory
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <div class="table-responsive">
                                <form action="{{ url('/products-refill') }}" method="post" enctype="multipart/form-data">
                                    <div class="text-end">
                                        <button class="btn btn-sm btn-outline-primary float-end" type="submit"><i
                                                class="fas fa-plus-circle"></i> Add Or
                                            Update</button>
                                    </div>
                                    @csrf
                                    <table width="100%" class="table table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Slot</th>
                                                <th>Product Name</th>
                                                <th>Total</th>
                                                <th>Available</th>
                                                <th>To Refill</th>
                                                {{-- <th>Warehouse</th> --}}
                                                <th>Created At</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $slotCounts = [];
                                                foreach ($syncedData as $slot) {
                                                    if (isset($slot['slot'])) {
                                                        $slotNumber = $slot['slot'];
                                                        $slotCounts[$slotNumber] = isset($slotCounts[$slotNumber])
                                                            ? $slotCounts[$slotNumber] + 1
                                                            : 1;
                                                    }
                                                }
                                            @endphp
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->product->p_name }}</td>
                                                    <td>{{ $item->QTY }}</td>
                                                    <td>
                                                        @php
                                                            $uniqueSlot = $item->slot_num;
                                                            $countAll = $slotCounts[$uniqueSlot] ?? 0;
                                                            $quantity = $item->QTY - $countAll;
                                                        @endphp
                                                        @if ($quantity != $item->QTY)
                                                            {{ $quantity + ($item->to_refill ?? 0) }}
                                                        @else
                                                            @php
                                                                $matchingSlot = null;
                                                                foreach ($syncedData as $slot) {
                                                                    if (
                                                                        isset($slot['slot']) &&
                                                                        $slot['slot'] == $uniqueSlot
                                                                    ) {
                                                                        $matchingSlot = $slot;
                                                                        break;
                                                                    }
                                                                }
                                                            @endphp
                                                            @if ($matchingSlot && $item->updated_at > $matchingSlot['date'])
                                                                {{ $quantity }}
                                                            @else
                                                                {{ $item->QTY }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="mb-3 col-md-8">
                                                            <input type="hidden" name="inventory_id[]"
                                                                value="{{ $item->id }}">
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text">{{ $item->QTY - ($quantity + ($item->to_refill ?? 0)) }}</span>
                                                                <input type="number" name="to_refill[]" value=""
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>active</td>
                                                    <td>
                                                    <a href="{{ url('edit_inventoryproduct/' . $item->id) }}"
                                                        class="btn btn-outline-info btn-rounded"><i
                                                            class="fas fa-pen"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
