@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 page-header ">
                    {{-- <div class="page-pretitle">Overview</div> --}}
                    <h2 class="page-title">Dashboard</h2>
                    {{-- <input type="text" name="date" class="form-control" placeholder="Select Date" > --}}
                </div>
                <form id="filterForm">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary filter">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- <div id="total_price_result">HHHH</div> --}}
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="machine fas fa-fax"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">Devices</p>
                                        <span class="number">{{ $machinesByOwner }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="fas fa-calendar"></i> For this Week
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="machine fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail filter-date">
                                        <p class="detail-subtitle">Daily Income</p>
                                        <span class="number" id="totalmoney">
                                            @php
                                                use App\Models\Machines;
                                                $totalPriceSum = 0;
                                                $startDate =  Machines::orderBy('created_at', 'desc')->value('created_at');
                                                $endDate = date('Y-m-d');

                                                foreach ($resultsApi as $value) {
                                                    if ($value->date >= $startDate && $value->date <= $endDate) {
                                                        $totalPriceSum += $value->total_price;
                                                    }
                                                }

                                                echo number_format($totalPriceSum, 2) . ' (៛)';
                                            @endphp

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <span>
                                    <div class="stats">
                                        <i class="fas fa-calendar"></i> For this Week
                                    </div>
                                    {{-- <input type="text" name="date" class="form-control" placeholder="Select Date"> --}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="machine fas fa-award"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">Top Product</p>
                                        <span id="productData" class="number"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="fas fa-calendar"></i> For this week
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="machine fas fa-sort-amount-up"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">Sales Transection
                                        </p>
                                        <span class="number" id="transectionCount">{{ $getTransection }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="fas fa-calendar"></i> For this week
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Sales By Categories</h5>
                                        <p class="text-muted">Current year website visitor data</p>
                                    </div>
                                    <div class="canvas-wrapper ">
                                        <canvas class="chart" id="pieChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Income And Expense</h5>
                                        <p class="text-muted">Current year expense data</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="sales"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <div class="head">
                                <h5 class="mb-0">Product Instock</h5>
                                <p class="text-muted">Current year website visitor data</p>
                            </div>
                            <div class="canvas-wrapper">
                                <table class="table table-striped" id="dataTables-example">
                                    <thead class="success">
                                        <tr>
                                            <th>SLOT</th>
                                            <th>IMAGE</th>
                                            <th>PRODUCT</th>
                                            <th>AVAILAABLE</th>
                                            <th>PRICE OUT</th>
                                            <th class="text-end">CREATED AT </th>
                                        </tr>
                                    </thead>
                                    <tbody class="img-size">
                                        @php
                                            $slotCounts = [];
                                            $dateThreshold = '2024-04-08'; // Threshold date
                                            foreach ($dataslot as $slot) {
                                                if (
                                                    isset($slot['slot']) &&
                                                    isset($slot['date']) &&
                                                    strtotime($slot['date']) > strtotime($dateThreshold)
                                                ) {
                                                    $slotNumber = $slot['slot'];
                                                    $slotCounts[$slotNumber] = isset($slotCounts[$slotNumber])
                                                        ? $slotCounts[$slotNumber] + 1
                                                        : 1;
                                                }
                                            }
                                        @endphp

                                        @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $data->product->p_image) }}"
                                                        alt="{{ $data->product->p_image }}"
                                                        style="max-width: 60px; max-height: 69px;">
                                                </td>
                                                <td>{{ $data->product->p_name }}</td>
                                                <td>
                                                    @php
                                                        $uniqueSlot = $data->slot_num;
                                                        $countAll = $slotCounts[$uniqueSlot] ?? 0;
                                                        $quantity = $data->QTY - $countAll;
                                                        // if ($sortDate >= $todayDate) {
                                                        //     $quantity = $item->QTY - $countAll;
                                                        // } else {
                                                        //     $quantity = $item->QTY; // or any other default value you want
                                                        // }
                                                    @endphp
                                                    @if ($quantity != $data->QTY)
                                                        {{ $quantity + ($data->to_refill ?? 0) }}
                                                    @else
                                                        @php
                                                            $matchingSlot = null;
                                                            foreach ($dataslot as $slot) {
                                                                if (
                                                                    isset($slot['slot']) &&
                                                                    $slot['slot'] == $uniqueSlot
                                                                ) {
                                                                    $matchingSlot = $slot;
                                                                    break;
                                                                }
                                                            }
                                                        @endphp
                                                        @if ($matchingSlot && $data->updated_at > $matchingSlot['date'])
                                                            {{ $quantity }}
                                                        @else
                                                            {{ $data->QTY }}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{ $data->product->producPrice->price_out ?? 0 }}(៛)</td>
                                                <td class="text-end">{{ $data->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('filterForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;

        // If end date is not defined, set it to today's date
        if (!endDate) {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            var yyyy = today.getFullYear();

            endDate = yyyy + '-' + mm + '-' + dd;
        }

        fetch(`/api/filter-data-dashboard?start_date=${startDate}&end_date=${endDate}`)
            .then(response => response.json()) // Parse response as JSON
            .then(data => {
                if (data && data.total_sales) {
                    // console.log(data);
                    document.getElementById('transectionCount').textContent = data.total_sales;
                } else {
                    console.log('Invalid response format');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        var totalPriceSum = 0;

        // Assuming resultsApi is available as a JavaScript array
        var resultsApi = <?php echo json_encode($resultsApi); ?>;

        // Iterate through the resultsApi array and calculate the total price sum within the specified date range
        resultsApi.forEach(function(value) {
            // Ensure value.date is within the selected date range
            if (value.date >= startDate && value.date <= endDate) {
                totalPriceSum += value.total_price;
            }
        });

        // Display the total price sum in the designated element by its ID
        document.getElementById('totalmoney').textContent = totalPriceSum.toFixed(2) + ' (៛)';
            });
        });

        setTimeout(function() {
            location.reload();
        }, 15 * 60 * 1000);
</script>


    <script src="{{ asset('assets/vendor/chartsjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard-charts.js') }}"></script>
@endsection
