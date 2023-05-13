
@extends('admin.master')

@section('title', 'Member\'s')

@section('javascript')
<script src="js/members.js"></script>
@endsection

@section('header')
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/kchat.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.7.95/css/materialdesignicons.min.css">
@endsection

@section('body')
<div class="col-md-7 pt-3">
   <div class="card">
      <div class="card-header pb-0">
         <div class="card-actions float-right">
            <div class="dropdown show">
               <a href="#" data-toggle="dropdown" data-display="static">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                     <circle cx="12" cy="12" r="1"></circle>
                     <circle cx="19" cy="12" r="1"></circle>
                     <circle cx="5" cy="12" r="1"></circle>
                  </svg>
               </a>
               <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" onclick="SelectAll()" >{{ __("lang.select-all") }}</a>
                  <a class="dropdown-item" onclick="delete_users()" >{{ __("lang.delete") }}</a>
                  <a class="dropdown-item" onclick="set_inactive_users()" >{{ __("lang.set-inactive") }}</a>
                  <a class="dropdown-item" onclick="set_active_users()" >{{ __("lang.set-active") }}</a>
                  <a class="dropdown-item" onclick="block_users()" >{{ __("lang.block") }}</a>
                  <a class="dropdown-item" onclick="unblock_users()" >{{ __("lang.unblock") }}</a>
                  <a class="dropdown-item" onclick="make_admins()" >{{ __("lang.make-admin") }}</a>
                  <a class="dropdown-item" onclick="revoke_admins()" >{{ __("lang.revoke-admin-power") }}</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#createnewconversatoin" >{{ __("lang.create-new-conversation") }}</a>
               </div>
            </div>
         </div>
         <h5 class="card-title mb-0">{{ __("lang.members") }}</h5>
      </div>
      <div class="card-body">
		<script>
			json = @json($jsonusers);
		</script>
         <table class="table"style="width:100%">
            <thead>
               <tr>
                    <i class="fa fa-users"></i>
                    <span class="badge badge-pill badge-success ml-1" id="Selected">0</span>
                    <select class="pages mb-3 float-right">
                        @foreach($pages as $page)
                        <option value="{{ $page }}" >{{ $page }}</option>
                        @endforeach
                    </select>
                    <input class="w-20 mr-3 float-right" type="search" placeholder="{{ __("lang.search-using-mail") }}" id="Member-rearch" value="{{ $ms }}" >
               </tr>
            </thead>
            <thead>
               <tr>
                  <th>#</th>
                  <th>{{ __("lang.name") }}</th>
                  <th>{{ __("lang.departement") }}</th>
                  <th>{{ __("lang.email") }}</th>
                  <th>{{ __("lang.status") }}</th>
               </tr>
            </thead>
            <tbody id="member_table" >
			@foreach($users as $user)
               <tr class="select member" id="{{ $user->id }}" >
                  <td><img src="{{ $user->photo }}" width="32" height="32" class="rounded-circle my-n1" alt="[Photo]" onerror="this.onerror=null; this.src='/logo/KChat.svg';"></td>
                  <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                  <td>{{ $user->department }}</td>
                  <td>{{ $user->email }}</td>
                  <td><span class="badge bg-{{ $user->status }}">{{ $user->status }}</span></td>
               </tr>
			@endforeach
            </tbody>
         </table>
		<select class="pages mb-3 float-right">
			@foreach($pages as $page)
			<option value="{{ $page }}" >{{ $page }}</option>
			@endforeach
		</select>
      </div>
   </div>
</div>
<div class="col-md-3 pt-3">
   <div class="card">
      <div class="card-header">
         <div class="card-actions float-right">
            <div class="dropdown show">
               <a href="#" data-toggle="dropdown" data-display="static">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle">
                     <circle cx="12" cy="12" r="1"></circle>
                     <circle cx="19" cy="12" r="1"></circle>
                     <circle cx="5" cy="12" r="1"></circle>
                  </svg>
               </a>
               <div class="dropdown-menu dropdown-menu-right">
				  <input type="hidden" value="" id="m_user" />
                  <a class="dropdown-item" onclick="delete_user()" >{{ __("lang.delete") }}</a>
                  <a class="dropdown-item" onclick="set_inactive_user()" >{{ __("lang.set-inactive") }}</a>
                  <a class="dropdown-item" onclick="set_active_user()" >{{ __("lang.set-active") }}</a>
                  <a class="dropdown-item" onclick="block_user()" >{{ __("lang.block") }}</a>
                  <a class="dropdown-item" onclick="unblock_user()" >{{ __("lang.unblock") }}</a>
                  <a class="dropdown-item" onclick="make_admin()" >{{ __("lang.make-admin") }}</a>
                  <a class="dropdown-item" onclick="revoke_admin()" >{{ __("lang.revoke-admin-power") }}</a>
               </div>
            </div>
         </div>
         <h5 class="card-title mb-0 m_name">[name]</h5>
      </div>
      <div class="card-body">
         <div class="row g-0">
            <div class="col-sm-3 col-xl-12 col-xxl-3 text-center">
               <img class="m_photo" src="/logo/KChat.svg" onerror="this.src='/logo/KChat.svg'" class="rounded-circle mt-2" alt="">
            </div>
            <div class="col-sm-9 col-xl-12 col-xxl-9">
               <strong>{{ __("lang.about-me") }}</strong>
               <p class="m_about"></p>
            </div>
         </div>
         <table class="table table-sm mt-2 mb-4">
            <tbody>
               <tr>
                  <th>{{ __("lang.name") }}</th>
                  <td class="m_name"></td>
               </tr>
               <tr>
                  <th>{{ __("lang.department") }}</th>
                  <td class="m_department"></td>
               </tr>
               <tr>
                  <th>{{ __("lang.email") }}</th>
                  <td class="m_email"></td>
               </tr>
               <tr>
                  <th>Phone</th>
                  <td class="m_phone"></td>
               </tr>
               <tr>
                  <th>{{ __("lang.status") }}</th>
                  <td><span class="badge m_status"></span></td>
               </tr>
                  <th>{{ __("lang.created-at") }}</th>
                  <td><span class="timestamp badge m_created_at"></span></td>
               </tr>
                  <th>{{ __("lang.updated-at") }}</th>
                  <td><span class="timestamp badge m_updated_at"></span></td>
               </tr>
            </tbody>
         </table>
         <!--strong>{{ __("lang.activity") }}</strong-->
         <!--ul class="timeline mt-2 mb-0">
            <li class="timeline-item">
               <strong>Signed out</strong>
               <span class="float-right text-muted text-sm">30m ago</span>
               <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit...</p>
            </li>
            <li class="timeline-item">
               <strong>Created invoice #1204</strong>
               <span class="float-right text-muted text-sm">2h ago</span>
               <p>Sed aliquam ultrices mauris. Integer ante arcu...</p>
            </li>
            <li class="timeline-item">
               <strong>Discarded invoice #1147</strong>
               <span class="float-right text-muted text-sm">3h ago</span>
               <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit...</p>
            </li>
            <li class="timeline-item">
               <strong>Signed in</strong>
               <span class="float-right text-muted text-sm">3h ago</span>
               <p>Curabitur ligula sapien, tincidunt non, euismod vitae...</p>
            </li>
            <li class="timeline-item">
               <strong>Signed up</strong>
               <span class="float-right text-muted text-sm">2d ago</span>
               <p>Sed aliquam ultrices mauris. Integer ante arcu...</p>
            </li>
         </ul-->
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="createnewconversatoin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Create Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __("lang.close") }}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-0">
           <input id="grpname" type="text" class="form-control" placeholder="Enter Group Title"/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("lang.close") }}</button>
        <button type="button" onclick="NewConversation()" class="btn btn-primary">Create Group</button>
      </div>
    </div>
  </div>
</div>
@endsection
				  
@section('script')
<!-- No Script -->
@endsection
