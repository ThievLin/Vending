@extends('layouts.app-nav')
@section('content')
<div class="content">
<div class="container">
   <div class="page-title">
      <h3 id="myTab" role="tablist">Location
         <a class="btn btn-sm btn-outline-primary float-end" id="location-tab" data-bs-toggle="tab" href="#location"
            role="tab" aria-controls="location" aria-selected="false">
         <i class="fas fa-plus-circle"></i><span
            class="btn-header" ">Add Location</span>
         </a>
         <a class="active btn btn-sm btn-outline-primary float-end" id="general-tab" data-bs-toggle="tab"
            href="#general" role="tab" aria-controls="general" aria-selected="true">
         <i class="fas fa-angle-left"></i> <span class="btn-header">Return</span>
         </a>
      </h3>
   </div>
   <div class="box box-primary">
      <div class="box-body">
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
               <table width="100%" class="table table-hover" id="dataTables-example">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Location Adress</th>
                        <th>latitude</th>
                        <th>logtitude</th>
                        <th>Status</th>
                        <th>Action</th>

                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>1</td>
                        <td>Phum1 TonleBasak Chamkar mon Phnom penh</td>
                        <td>21213.666</td>
                        <td>9382.3333</td>
                        <td>Active</td>
                        <td class="text-end">
                           <a href="" class="btn btn-outline-muted btn-rounded"><i
                              class="fas fa-regular fa-eye "></i></a>
                           <a href="" class="btn btn-outline-info btn-rounded"><i
                              class="fas fa-pen"></i></a>
                           <a href="#" class="btn btn-outline-danger btn-rounded"
                              onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i
                              class="fas fa-trash"></i></a>
                        </td>
                     </tr>
                     <tr>
                        <td>2</td>
                        <td>Phum1 TonleBasak Chamkar mon Phnom penh</td>
                        <td>21213.666</td>
                        <td>9382.3333</td>
                        <td>Active</td>
                        <td class="text-end">
                           <a href="" class="btn btn-outline-muted btn-rounded"><i
                              class="fas fa-regular fa-eye "></i></a>
                           <a href="" class="btn btn-outline-info btn-rounded"><i
                              class="fas fa-pen"></i></a>
                           <a href="#" class="btn btn-outline-danger btn-rounded"
                              onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i
                              class="fas fa-trash"></i></a>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
               <div class="content">
                  <div class="container">
                           <div class="col-md-12">
                              <form action="{{ url('/create') }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 <div class="card">
                                    <div class="card-header">
                                       <h5>Machines Address</h5>
                                    </div>
                                    <div class="card-body">
                                       <div class="row col-md-12">
                                          <div class="col-md-6">
                                             <div class="mb-3 col-md-6>
                                                <label for="province"
                                                class=" block text-sm font-medium leading-6 text-gray-900">
                                                Province</label>
                                                <div class="relative mt-2 rounded-md shadow-sm">
                                                   <select id="province" name="province" autocomplete="country-name"
                                                      class="border-style-select">
                                                      <option value="" selected>Select Province</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="mb-3 col-md-12">
                                                <label for="districts" class=" block text-sm font-medium leading-6 text-gray-900">Districts</label>
                                                <div class="relative mt-2 rounded-md shadow-sm">
                                                   <select id="districts" name="districts" autocomplete="country-name" class="border-style-select">
                                                      <option selected>Select Districts</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="mb-3 col-md-12">
                                                <label for="communes" class="block text-sm font-medium leading-6 text-gray-900">Communes</label>
                                                <div class="relative mt-2 rounded-md shadow-sm">
                                                   <select id="communes" name="communes" autocomplete="country-name" class="border-style-select">
                                                      <option selected>Select Communes</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="col-md-12">
                                                <label for="villages" class="block text-sm font-medium leading-6 text-gray-900">village</label>
                                                <div class="relative mt-2 rounded-md shadow-sm">
                                                   <select id="villages" name="villages" autocomplete="country-name" class="border-style-select">
                                                      <option selected>Select Village</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="mb-3">
                                          <label for="address" class="form-label">Full Address</label>
                                          <textarea class="form-control" name="address"></textarea>
                                       </div>
                                       <div class="mb-3 text-end">
                                          <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
               
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection