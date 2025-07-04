@extends('permission-editor::layouts.app')

@section('content')
    <form class="space-y-4" action="{{ route('permission-editor.roles.update', $role) }}" method="post">
        @csrf
        @method('POST')

        <div class="space-y-2">
            <label class="text-base font-medium text-gray-700" for="name">{{ __('name') }}</label>
            <input class="block w-full rounded-md border border-gray-300 px-2 py-1 shadow-sm" type="text" name="name" id="name" value="{{ old('name', $role->name) }}" required />
            <input type="hidden" name="id" value="{{ $role->id }}">

            {{-- @error('name')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror --}}
        </div>

        @if($permissions->count())
            <div class="space-y-2">
                <label class="block text-base font-medium text-gray-700" for="permissions">{{ __('permissions') }}</label>
                <div class="space-x-2">
                    @foreach($permissions as $id => $name)
                        <div class="inline-flex space-x-1">
                            <input class="rounded-md border-gray-300 shadow-sm" type="checkbox" name="permissions[]" id="permission-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('permissions', [])) || $role->permissions->contains($id))>
                            <label class="text-sm font-medium text-gray-700"  for="permission-{{ $id }}">{{ $name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('permissions')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
        @endif

        <button class="rounded-md bg-gray-800 px-4 py-2 text-xs font-semibold text-white hover:bg-gray-700" type="submit">
            {{ __('permissions.global.save') }}
        </button>
    </form>
@endsection