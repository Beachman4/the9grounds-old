@extends('master.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add Game</h3>
                </div>
                <style>
                    .input-group, button {
                        margin-bottom: 1rem;
                        margin-left: 3rem;
                    }
                </style>
                <form method="post" action="/admin/games" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="input-group">
                            <label>Name
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </label>
                        </div>
                        <div class="input-group">
                            <label>Picture
                                <input type="file" name="picture">
                            </label>
                        </div>
                        <div class="input-group">
                            <label>Disabled
                                <input type="checkbox" name="disabled">
                            </label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{ $update ? 'Update Game' : 'Add Game' }}</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@stop