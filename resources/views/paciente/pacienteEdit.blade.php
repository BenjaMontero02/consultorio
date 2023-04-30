<x-layouts.app tittle="paciente">
    @auth
        
    
    <h1>Editar Paciente</h1>

    <form action="{{route('paciente.update', $paciente->id)}}" method="POST">
        @csrf @method('PATCH')
        @include('paciente.forms-paciente')
        <button type="submit">Guardar</button>
    </form>
    @endauth
</x-layouts.app>
