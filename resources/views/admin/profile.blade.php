@extends('admin.master')

@section('title', __("lang.profile"))

@section('header')
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/kchat.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.7.95/css/materialdesignicons.min.css">
@endsection

@section('body')
<div class="col-md-10 mb-10 pt-3">
   <div class="card">
      <div class="card-body">
         <div class="e-profile">
            <div class="row">
               <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;" data-toggle="modal" data-target="#view_info">
                     <div class="d-flex justify-content-center align-items-center rounded" id="profileimage" style="background-image: url('{{ $profile->photo }}');"></div>
                  </div>
               </div>
               <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                     <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $profile->first_name }} {{ $profile->last_name }}</h4>
                     <div class="text-muted"><small class="timestamp">{{ $profile->updated_at }}</small></div>
                     <div class="mt-2"><input type="file" name="profile" id="photo" accept="image/*" class="btn btn-primary profile"></div>
                  </div>
                  <div class="text-center text-sm-right">
                     <span class="badge badge-secondary">
                     @if($profile->role == 0)
                         {{ __("lang.superadmin") }}
                     @else
                        {{ $role }}
                     @endif
					 </span>
                     <div class="text-muted"><small class="timestamp">{{ $profile->created_at }}</small></div>
                  </div>
               </div>
            </div>
            <ul class="nav nav-tabs">
               <li class="nav-item"><a href="" class="active nav-link">{{ __("lang.settings") }}</a></li>
            </ul>
            <div class="tab-content pt-3">
               <div class="tab-pane active">
                     <div class="row">
                        <div class="col">
                           <div class="row">
                              <div class="col">
                                 <div class="form-group"> <label>{{ __("lang.name") }}</label> <input class="form-control profile" type="text" name="first_name" placeholder="First {{ __("lang.name") }}" id="first_name" value="{{ $profile->first_name }}"></div>
                              </div>
                              <div class="col">
                                 <div class="form-group"> <label>Apellido</label> <input class="form-control profile" type="text" name="last_name" placeholder="Last {{ __("lang.name") }}" id="last_name" value="{{ $profile->last_name }}"></div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col">
                                 <div class="form-group"> <label>{{ __("lang.email") }}</label> <input class="form-control profile" type="text" placeholder="admin@admin.com" id="email" value="{{ $profile->email }}"></div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col">
                                 <div class="form-group"> <label>{{ __("lang.department") }}</label>
									<select class="form-control profile" type="text" placeholder="admin@admin.com" id="department" multiple>
									@foreach($departments as $department)
										<option value="{{ $department->department }}">{{ $department->department }}</option>
									@endforeach
									</select>
                                    <script> $("#department").val( @json($profile->department) ); </script>
								</div>
							    </div>
                           </div>
                           <div class="row">
                              <div class="col mb-3">
                                 <div class="form-group"> <label>Acerca de mí</label><textarea class="form-control profile" rows="5" placeholder="Mi descripción" id="about">{{ $profile->about }}</textarea></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                           <div class="mb-2"><b>{{ __("lang.change-password") }}</b></div>
                           <div class="row">
                              <div class="col">
                                 <div class="form-group"> <label>Nueva contraseña</label> <input class="form-control profile" type="password" placeholder="••••••" id="password" ></div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col">
                                 <div class="form-group"> <label>Confirmar <span class="d-none d-xl-inline">contraseña</span></label> <input class="form-control profile" type="password" id="repassword" placeholder="••••••"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col d-flex justify-content-end"> <button class="btn btn-primary" type="submit" ajax_post data-msg="Are you sure you want to update your profile?" action="/profile" form="profile" >Save Changes</button></div>
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="view_info" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __("lang.close") }}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-0">
            <img id="photo" src="{{ $profile->photo }}" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("lang.close") }}</button>
      </div>
    </div>
  </div>
</div>
@endsection
				  
@section('script')

@endsection
