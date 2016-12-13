<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Auth\Role;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\UserRepositoryContract;

class UsersController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryContract $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAll();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->userRepo->create($request->all());
        return redirect('/admin/users');
    }

    public function edit($id)
    {
        $user = $this->userRepo->findById($id);
        $roles = Role::all();
        $selectedRoles = $user->roles->pluck('id')->toArray();
        return view('admin.users.edit', compact('user', 'roles', 'selectedRoles'));
    }

    public function update($id, Request $request)
    {
        $this->userRepo->update($id, $request->all());
        return redirect('/admin/users');
    }

    public function delete($id)
    {
        $this->userRepo->delete($id);
        return redirect('/admin/users');
    }
}
