@extends('layouts.app-nav')
@section('content')
<div class="content">
    <div class="container">
        <div class="col-md-12">
            <form action="{{ url('/create-proCategory') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card space-card">
                    <div class="card-header">
                        <h5>Create Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <div class="row col-md-12">
                            <div class="mb-3 col-md-6"> <label for="type"
                                    class="form-label">Type</label> <input type="text" name="type"
                                    class="form-control"> </div>
                                    <span class="text-danger">
                                        @error('type')
                                            {{$message}}
                                        @enderror
                                    </span>
                        </div> <br>
                        <div class="mb-3 text-end"> 
                            <button class="btn btn-danger" onclick="window.history.back()" type="button"><i class="fa fa-chevron-left"></i> Return</button>

                            <button class="btn btn-success" type="submit"><i
                                    class="fas fa-check"></i> Save</button> </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
    @endsection
