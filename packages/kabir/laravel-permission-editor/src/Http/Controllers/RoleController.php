<?php

namespace kabir\LaravelPermissionEditor\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount('permissions')->get();
        return view('permission-editor::roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::pluck('name', 'id');

        return view('permission-editor::roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles'],
            'permissions' => ['array'],
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        $role->givePermissionTo($request->input('permissions'));

        return redirect()->route('permission-editor.roles.index');
    }

    public function edit($id)
    {
        $data['role'] = Role::where('id', $id)->first();
        $data['permissions'] = Permission::pluck('name', 'id');

        return view('permission-editor::roles.edit', $data);
    }

    public function update($id)
    {
        $role = Role::where('id', $id)->first();
        request()->validate([
            'name' => ['required', 'string', 'unique:roles,name,' . $role->id],
            'permissions' => ['array'],
        ]);

        $role->update(['name' => request()->input('name')]);

        $role->syncPermissions(request()->input('permissions'));

        return redirect()->route('permission-editor.roles.index');
    }

    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        return redirect()->route('permission-editor.roles.index');
    }
}
