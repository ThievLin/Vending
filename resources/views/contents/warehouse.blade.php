@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Warehouse
                    <a class="btn btn-sm btn-outline-primary float-end" href="/create-warehouse" aria-selected="false">
                        <i class="fas fa-plus-circle"></i><span class="btn-header" "> Add New Warehouse</span>
                                    </a>
                                </h3>
                                <div class="box box-primary">
                            <div class="container">
                                <div class="row">
                                    @foreach ($data as $item)
                                        <div class="col-sm-3">
                                            <div class="box-container">
                                                <div class="box-img">
                                                </div>
                                                <h4 class="box-title">{{ $item->warehouse_name }}</h4>
                                                <div class="box-heading text-uppercase">warehouse</div>
                                                <div class="box-btns">
                                                    <a href="{{ url('warehouse-list/' . $item->id) }}"
                                                        class="btn btn-primary text-uppercase">view</a>
                                                </div>
                                                <div class="box-id">{{ $item->id }}</div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    <style>
        .box-container {
            text-align: center;
            width: 100%;
            border: 1px solid #999;
            margin: 25px 0;
            margin-top: 50px;
            padding: 6px 15px 0;

            .box-id {
                background-color: #eee;
                display: block;
                padding: 6px 15px;
                margin-top: 10px;
            }

            .box-img {
                margin-top: -35px;
                position: relative;
            }

            .box-price {
                display: inline-block;
                background-color: #3498db;
                border-radius: 0px;
                padding: 4px 10px;
                margin: 15px auto 0;
                color: #fff;
                position: absolute;
                top: 0;
                left: 0;

            }

            .box-title {
                font-size: 14px;
                text-transform: uppercase;
                font-weight: bold;
            }

            .box-heading {
                margin: 10px 0;
            }

            .btn {
                font-size: 13px;
            }

            img {
                display: block;
                max-width: 100%;
            }

        }
    </style>
@endsection
