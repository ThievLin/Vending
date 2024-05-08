{{-- @extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3>User Permissions
                    <a href="roles.html" class="btn btn-sm btn-outline-info float-end"><i class="fas fa-angle-left"></i> <span
                            class="btn-header">Return</span></a>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <form accept-charset="utf-8">
                        <div class="mb-3">
                            <label for="email" class="form-label text-uppercase"><small>Dashboard</small></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch1">
                                <label class="form-check-label" for="switch1">Open dashboard page</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="text-uppercase"><small>Users</small></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch2">
                                <label class="form-check-label" for="switch2">Add User</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch3">
                                <label class="form-check-label" for="switch3">Edit User</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch4">
                                <label class="form-check-label" for="switch4">Delete User</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="text-uppercase"><small>Roles & Permissions</small></label>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch5">
                                <label class="form-check-label" for="switch5">Add Roles</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch6">
                                <label class="form-check-label" for="switch6">Edit Roles</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch7">
                                <label class="form-check-label" for="switch7">Delete Roles</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch8">
                                <label class="form-check-label" for="switch8">Update Permissions</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save</button>
                    <a href="roles.html" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@extends('layouts.app-nav')

@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3>User Permissions
                    {{-- <a href="roles.html" class="btn btn-sm btn-outline-info float-end"><i class="fas fa-angle-left"></i> <span
                            class="btn-header">Return</span></a> --}}
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <form id="permissionForm" action="{{ url('update_roleuser/' . $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="switch1" class="form-label text-uppercase"><small>Dashboard</small></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch1" name="per_dash" value="1" {{ $data->per_dash == 1 ? 'checked' : '' }} onchange="this.value = this.checked ? 1 : 0;">
                                <label class="form-check-label" for="switch1">Open dashboard page</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="switch2" class="form-label text-uppercase"><small>Vending Machine</small></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch2" name="per_ven" value="1" {{ $data->per_ven == 1 ? 'checked' : '' }} onchange="this.value = this.checked ? 1 : 0;">
                                <label class="form-check-label" for="switch2">Open Vending Machine page</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="switch3" class="form-label text-uppercase"><small>Product</small></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch3" name="per_pro" value="1" {{ $data->per_pro == 1 ? 'checked' : '' }} onchange="this.value = this.checked ? 1 : 0;">
                                <label class="form-check-label" for="switch3">Open product page</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="switch4" class="form-label text-uppercase"><small>Income</small></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch4" name="per_in" value="1" {{ $data->per_in == 1 ? 'checked' : '' }} onchange="this.value = this.checked ? 1 : 0;">
                                <label class="form-check-label" for="switch4">Open income page</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="switch5" class="form-label text-uppercase"><small>Inventory</small></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch5" name="per_inv" value="1" {{ $data->per_inv == 1 ? 'checked' : '' }} onchange="this.value = this.checked ? 1 : 0;">
                                <label class="form-check-label" for="switch5">Open inventory page</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="switch6" class="form-label text-uppercase"><small>Report</small></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch6" name="per_rep" value="1" {{ $data->per_rep == 1 ? 'checked' : '' }} onchange="this.value = this.checked ? 1 : 0;">
                                <label class="form-check-label" for="switch6">Open report page</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="switch7" class="form-label text-uppercase"><small>User</small></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch7" name="per_user" value="1" {{ $data->per_user == 1 ? 'checked' : '' }} onchange="this.value = this.checked ? 1 : 0;">
                                <label class="form-check-label" for="switch7">Open user page</label>
                            </div>
                        </div>
                        <!-- Other permission checkboxes -->
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success" id="saveButton"><i class="fas fa-check"></i> Save</button>
                    <a href="roles.html" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
