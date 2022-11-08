<?php

namespace App\Http\Controllers;

use App\Models\PostsProject;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    public function index()
    {
        $users = User::paginate(5);
        $posts = PostsProject::paginate(5);
        $roles = Role::paginate(5);
        $permissions = Permission::paginate(5);
        // dd($users);
        return view('admin.home', compact('users', 'posts', 'permissions', 'roles'));
    }
}
