<x-layouts.app tittle="roles">
    @if (Auth::user()->role == 'god')
        
    
    <div class="container d-flex flex-column mt-5 justify-content-center">
        @foreach ($users as $user)
            <form action="{{route('roles.update', $user->id)}}" method="post">
                @csrf @method('PATCH')
                <div class="d-flex m-3">
                <input type="email" value="{{$user->email}}" disabled class="form">
                <input type="text" value="{{$user->role}}" required class="form" name="role">
                <input type="number" value="{{$user->id}}" class="d-none" name="id" >
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        @endforeach
    </div>
    @endif
</x-layouts.app>
