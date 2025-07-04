@extends('permission-editor::layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 font-weight-bold text-primary">Create Role</h1>
{{-- 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}

    <form action="{{ route('permission-editor.roles.store') }}" method="POST" class="form-horizontal">
        @csrf

        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        @if ($permissions->count())
        <div class="form-group">
            <label>Permissions</label>
            <div>
                @foreach ($permissions as $id => $name)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="permissions[]" id="permission-{{ $id }}"
                            value="{{ $id }}" @checked(in_array($id, old('permissions', [])))>
                        {{ $name }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
