@extends('layouts.app')


@section('content')
<style type="text/css">
  .card-img{width:50%;height:50%;}

        @media (max-width: 1240px) {

         
          .card-img{width:auto;height:auto;}
          
        }
</style>
<div class="container">
    


<!----- view Profile Modal start ---->
        <div class="modal fade" id="viewProfileModal" tabindex="-1" role="dialog" aria-labelledby="viewProfileCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> View / Edit Details </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="user_profile_content">

              </div>
              
            </div>
          </div>
        </div>
<!------ Modal end  ------>




    <div class="col-md-15">
      <div class="row">
        <div class="col">
          <div class="float-right">
          {{ $users->withQueryString()->links()}} 
          </div>  
        </div>
      </div>


        <div class="card">
            <div class="card-header text-white" style="background: #130f40;">
                <h4 style="display:inline;"><span class="fa fa-address-book mr-2"></span> Manage User</h4>
                <div class="float-right">
                    <button class="btn btn-primary"><span class="fa fa-filter"></span> Filter</button>
                    {{--
                    <button class="btn btn-success"><span class="fa fa-user-plus"></span> Add user</button>


                      --}}
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Role</th>
                        <th scopr="col">State</th>
                        <th scopr="col">Options</th>
                        
                      </tr>
                    </thead>
                    <tbody>        
                        @foreach ($users as $user)
                        <tr>
                          <td>{{$loop->index}}</td>
                          <td>{{$user->id }}</td>
                          <td class="text-capitalize">{{ $user->fname }}</td>
                          <td class="text-capitalize">{{ $user->role }}</td>
                          <td>
                            @if($user->active==1)
                              <span class="badge badge-success">ON</span>
                            @else
                              <span class="badge badge-warning">OFF</span>
                            @endif
                          </td>
                          <td>  
                            <button href="/home" class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#viewProfileModal" onclick="make_request('users/profile?id={{$user->id}}', render_profile);"><span class="fa fa-eye"></span> View</button> 

                                <a href="/admin/add/{{ $user->id }}" class="btn btn-warning btn-sm m-1"><span class="fa fa-user-o m-1"></span> Account</a>
                                
                          </td>
                        </tr>
                        @endforeach                
                    </tbody>
                    
                </table>
                
            </div>


        </div>
    </div>
<script type="text/javascript">
  function render_profile(){

  if (this.readyState == 4){
        start_loader();
        console.log(this.responseText);
        document.getElementById('user_profile_content').innerHTML=this.responseText;
        stop_loader();

    }
  }
</script>
</div>

@endsection
