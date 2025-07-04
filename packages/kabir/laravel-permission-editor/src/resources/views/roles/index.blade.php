{{-- @extends('layouts.app') --}}
@extends('permission-editor::layouts.app')
@section('content')
<h1 class="text-xl font-semibold text-gray-900">Roles</h1>
<a href="{{ route('permission-editor.roles.create') }}">Add Role</a>

<h1 class="text-xl font-semibold text-gray-900">Permissions</h1>
<a href="{{ route('permission-editor.permissions.create') }}">Add Permission</a>
<table class="min-w-full divide-y divide-gray-300">
   <thead class="bg-gray-50">
      <tr>
         <th>Name</th>
         <th>Permissions</th>
         <th scope="col"></th>
      </tr>
   </thead>
   <tbody class="divide-y divide-gray-200 bg-white">
      @forelse ($roles as $role)
      <tr>
         <td>{{ $role->name }}</td>
         <td>{{ $role->permissions_count }}</td>
         <td>
            <a href="{{ route('permission-editor.roles.edit', $role) }}">Edit</a>
            <form action="{{ route('permission-editor.roles.destroy', $role->id) }}"
               method="POST"
               onsubmit="return confirm('Are you sure?')"
               class="inline-block">
               @csrf
               @method('POST')
               <button type="submit">Delete</button>
            </form>
         </td>
      </tr>
      @empty
      <tr>
         <td colspan="3">No roles found.</td>
      </tr>
      @endforelse
   </tbody>
</table>
@endsection
