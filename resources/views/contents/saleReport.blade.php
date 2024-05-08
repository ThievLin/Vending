@extends('layouts.app-nav')

@section('content')
<div class="content">
    <div class="container">
        <div class="page-title">
            <h3>Sale Report
                <button id="export-excel" class="btn btn-sm btn-outline-success float-end me-1"><i class=""></i>
                    Export to Excel</button>
                <button id="export-pdf" class="btn btn-sm btn-outline-success float-end me-1"><i class=""></i>
                    Export to Pdf</button>
            </h3>
        </div>
        <!-- Form for filtering by date -->
        <form id="filterForm">
            <div class="row">
                <div class="col-md-5">
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
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary mt-4 filter" id="filter">Filter</button>
                </div>
            </div>
        </form>
        <!-- Sales report table -->
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <table class="table" id="salesTable">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Sales Out</th>
                                <th>Expense</th>
                                <th>Income</th>
                                <th>Total Salse</th>
                                <th>Salse Date</th>
                            </tr>
                        </thead>
                        <tbody id="salesData">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('filterForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;
            // Make AJAX request to the server to fetch filtered data
            fetch(`/api/filter-data?start_date=${startDate}&end_date=${endDate}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    renderSalesData(data.data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        function renderSalesData(data) {
            var salesTable = document.getElementById('salesData');
            salesTable.innerHTML = ''; // Clear previous data
            data.forEach(item => {
                var row = document.createElement('tr');
                row.innerHTML = `
            <td>${item.Product_name} </td>
            <td>${item.Price_Out}(៛)</td>
            <td>${item.price_In}(៛)</td>
            <td>${item.Price_Out * item.Total_salse}(៛)</td>
            <td>${item.Total_salse}</td>
            <td>${item.Date}</td>
            `;
                salesTable.appendChild(row);
            });
        }
        document.getElementById('export-excel').addEventListener('click', function() {
            var element = document.getElementById('salesTable');
            var wb = XLSX.utils.table_to_book(element, {
                sheet: "Sheet 1"
            });
            XLSX.writeFile(wb, 'saledata.xlsx');
        });
        document.getElementById('export-pdf').addEventListener('click', function() {
            var element = document.getElementById('salesTable');
            var opt = {
                filename: 'saledata.pdf', // Specify the filename here
            };
            html2pdf().from(element).set(opt).save();
        });
    });
</script>
@endsection
