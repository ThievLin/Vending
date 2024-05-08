@extends('layouts.app-nav') @section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3> Company Information <a class="btn btn-sm btn-outline-primary float-end" href="/create-companyinfo"
                        aria-selected="false"> <i class="fas fa-plus-circle"></i><span class="btn-header" "> Add Company info</span>
                    </a>
                 </h3>
              </div>
              <div class="box box-primary">
                 <div class="box-body">
                    <div class="tab-content" id="myTabContent">
                       <div class="tab-pane fade active show" id="general" role="tabpanel"
                          aria-labelledby="general-tab">
                          <table width="100%" class="table table-hover" id="dataTables-example">
                            <thead>
                               <tr>
                                  <th>#</th>
                                  <th>Company Name</th>
                                  <th>Email</th>
                                  <th>Contact</th>
                                  <th>Province</th>
                                  {{-- <th>Status</th> --}}
                                  <td>Action</td>

                               </tr>
                            </thead>
                            <tbody>
                                 @foreach ($data as $companyinfo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $companyinfo->company_name }}</td>
                                <td>{{ $companyinfo->email }}</td>
                                <td>{{ $companyinfo->contact }}</td>
                                <td>{{ $companyinfo->villageRe->name_en ?? '' }}/{{ $companyinfo->communeRe->name_en ?? '' }}/{{ $companyinfo->districtsRe->name_en ?? '' }}/{{ $companyinfo->provinceRe->name_en ?? '' }}
                                </td>
                                {{-- <td>Active</td> --}}
                                <td class="text-end">
                                    <a href="{{ url('edit_expenseCata/' . $companyinfo->id) }}"
                                        class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                    <a href="company-info/destroy/{{ $companyinfo->id }}"
                                        class="btn btn-outline-danger btn-rounded"
                                        onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i
                                            class="fas fa-trash"></i></a>
                                </td>
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
    </div>
    </div>
    </div>
@endsection
