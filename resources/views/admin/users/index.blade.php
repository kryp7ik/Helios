@extends('layouts.app')
@section('title', 'All users')
@section('content')
    <div class="container col-md-10 col-md-offset-1">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2>
                    <i class="fa fa-users" aria-hidden="true"></i>
                    All users
                    <a href="/admin/users/create" class="btn btn-raised btn-success pull-right">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> Create a new User
                    </a>
                    <a href="/admin/roles" class="btn btn-raised btn-warning pull-right">
                        <i class="fa fa-id-card" aria-hidden="true"></i> Manage Roles
                    </a>
                </h2>
            </div>
            @if ($users->isEmpty())
                <p> There is no user.</p>
            @else
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <table class="table table-hover clickable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Joined at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr data-id="{{ $user->id }}">
                                    <td>{!! $user->id !!}</td>
                                    <td>
                                        <a href="{!! action('Admin\UsersController@edit', $user->id) !!}">{!! $user->name !!} </a>
                                    </td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->created_at !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
