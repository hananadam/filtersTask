@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Users</div>

                <div class="panel-body">
                    <form action="{{ route('users.edit' , ['id' => $user->id ])}}" onsubmit="return false;"
                     method="post" id="add-form"  enctype="multipart/form-data" >
                     
                                    {!! csrf_field() !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-sm-9 col-md-9">
                                    <label class="col-md-3 control-label"> Name</label>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                </div>

                                 <div class="form-group col-sm-9 col-md-9">
                                    <label class="col-md-3 control-label"> Mobile Number</label>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}">
                                    </div>
                                </div>

                                 <div class="form-group col-sm-9 col-md-9">
                                    <label class="col-md-3 control-label"> Password</label>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="password" class="form-control" name="password" value="{{old('password' , $user->password)}}">
                                    </div>
                                </div>

                                <div class="form-group col-sm-9 col-md-9">
                                    <label class="col-md-3 control-label"> Repassword</label>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="password" class="form-control" name="repassword" placeholder="repassword" value="{{old('password' , $user->password)}}">
                                    </div>
                                </div>
                              
                            </div>
                               
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="text-center ">
                                    <button type="submit" class="btn btn-primary addBtn">  
                                     <i class="spinner fa fa-spinner fa-spin hidden"></i> Save</button>
                                    <a href="{{route('users')}}" class="btn btn-default"> Back</a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
