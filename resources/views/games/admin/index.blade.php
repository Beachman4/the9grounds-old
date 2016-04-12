@extends('master.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Games List</h3>
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
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Disabled</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($games as $game)
                            <tr>
                                <td>{{ $game->id }}</td>
                                <td>{{ $game->name }}</td>
                                <td><img height="100" src="/image/games/{{ $game->picture }}"/></td>
                                <td>{{ $game->disabled == 1 ? 'Disabled' : 'Active' }}</td>
                                <td><a href="/admin/games/{{ $game->id }}/edit"><i class="fa fa-pencil-square-o"></i>  Edit</a>   <a href="/admin/games/{{ $game->id }}/delete"><i class="fa fa-trash"></i>  Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{ $games->links() }}
                </div>
            </div>
        </div>
    </div>
@stop