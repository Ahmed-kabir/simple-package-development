<!DOCTYPE html>
<html>
   <head>
      <title>Laravel Permission Editor</title>
   </head>
   <body>
      <nav>
         <div>
            Laravel Permission Editor
            <div>
               <a href="{{ route('permission-editor.roles.index') }}">Roles</a>
               <a href="{{ route('permission-editor.permissions.index') }}">Permissions</a>
            </div>
      </nav>
      <main>
      @yield('content')
      </main>
      </div>
   </body>
</html>
