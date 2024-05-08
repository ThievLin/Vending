@extends('layouts.app-nav') @section('content')
<div class="content">
   <div class="container">
      <div class="page-title">
         <h3>Update Income Category <a class="btn btn-sm btn-outline-primary float-end"
            href="/create_IncGategory" 
            aria-selected="false"> <i class="fas fa-plus-circle"></i><span class="btn-header" "> Add IncomCa</span>
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
                          <th>Type</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Action</th>

                       </tr>
                    </thead>
                    <tbody>
                       @foreach ($data as $data)
                       <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $data->type }}</td>
                          <td>{{ $data->price }}</td>
                          <td>Active</td>
                          <td class="text-end">
                             <a href="" class="btn btn-outline-muted btn-rounded"><i
                                class="fas fa-regular fa-eye "></i></a>
                             <a href="{{ url('edit_incomecategory/' . $data->id) }}"
                               class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                             <a href="incomeCa/destroy/{{ $data->id }}" class="btn btn-outline-danger btn-rounded"
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