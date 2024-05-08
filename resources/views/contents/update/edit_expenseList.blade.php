@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="col-md-12">
                <form action="{{url('update_expenseList/' . $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card space-card">
                        <div class="card-header">
                            <h5> Update Expense List </h5>
                        </div>
                        <div class="card-body">
                            <div class="row col-md-12">
                                <div class="mb-3 col-md-6"> <label for=""
                                        class=" block text-sm font-medium leading-6 text-gray-900">Machines</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <select id="id_expense_categories" name="id_expense_categories" autocomplete="off"
                                            class="border-style-select">
                                            <option value="{{ $data->expense_category->id }}" selected>
                                                {{ $data->expense_category->type ?? '' }}
                                            </option>
                                            </option>
                                            @foreach ($expense as $incomcategory)
                                                <option value="{{ $incomcategory->id }}">
                                                    {{ $incomcategory->type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6"> <label for=""
                                        class=" block text-sm font-medium leading-6 text-gray-900">Machines</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <select id="id_vending_machine" name="id_vending_machine" autocomplete="off"
                                            class="border-style-select">
                                            <option value="{{ $data->machin->id }}" selected>
                                                {{ $data->machin->m_name ?? '' }}
                                            </option>
                                            @foreach ($machin as $machins)
                                                <option value="{{ $machins->id }}">
                                                    {{ $machins->m_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{ $data->description }}</textarea>
                            </div>
                            <br>
                            <div class="mb-3 text-end">
                                <button class="btn btn-danger" onclick="window.history.back()" type="button"><i class="fa fa-chevron-left"></i> Return</button>

                                <button class="btn btn-success" type="submit"><i class="fas fa-check"></i>
                                    Save</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    <script>
        function removePlaceholderOption() {
            var select = document.getElementById('id_vending_machine');
            var placeholderOption = select.querySelector('option[value=""]');

            if (placeholderOption) {
                placeholderOption.remove();
            }
        }
    </script>
@endsection
