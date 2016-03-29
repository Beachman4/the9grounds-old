@extends('master.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users List</h3>
                    <div class="box-tools">
                        <form>
                            <div class="input-group" style="width: 150px">
                                <input type="text" name="search" class="form-control input-sm pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td><?php if ($user->confirmed == 1) { echo "Confirmed"; } else { echo "Not Confirmed"; } ?></td>
                                <td><a href="/admin/user/{{ $user->id }}"><i class="fa fa-user"></i>  View</a>    <a href="/admin/user/{{ $user->id }}/edit"><i class="fa fa-pencil-square-o"></i>  Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@stop