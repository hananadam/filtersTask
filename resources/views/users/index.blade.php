@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">user</div>

                <div class="panel-body">
                   <!-- Default box -->
			        <div class="box">
			            <div class="box-header with-border">
			                <h3 class="box-title">Show all users</h3>
			            </div>
			            <div class="box-body">
			                <div class="margin-bottom inline-block" style="margin-bottom:30px;">
			                    <div class="addNew ">
			                        <a href="{{ url('users/add') }}" class="btn btn-success btn-sm">
			                            <i class="fa fa-plus"></i>
			                            Add new User
			                        </a>
			                    </div>
			                </div>

			      
			                <div class="table-responsive">
			                    <table id="example" class="table table-bordered table-striped table-responsive">
			                        <thead>
			                        <tr>
			                            <th>Name</th>
			                            <th>Mobile</th>
			                            <th>Created at</th>
			                            <th>Operations</th>
			                        </tr>
			                        </thead>
			                        <tbody>
			                            @foreach($users as $user)
			                                <tr>
			                                    <td>{{$user->name}}</td>
			                                    <td>{{$user->mobile}}</td>
			                                    <td>{{$user->created_at->format('d-m-y')}}</td>
			                                  
			                                    <td>
			                                         <a href="{{ url('users/edit/'. $user->id ) }}" class="btn-sm btn btn-success"  >
			                                                Edit
			                                        </a>
			                                        <a data-url="{{ route('users.delete' , ['id' => $user->id ]) }}" class="btn btn-danger btndelet btn-sm">
			                                                Delete
			                                        </a>
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
@endsection
