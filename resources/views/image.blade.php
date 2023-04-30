<x-layouts.app tittle="about">
    @if(Auth::user()->role == 'adimn' || Auth::user()->role == 'god')
        <div class="container d-flex flex-column mt-5">
            <div class="container d-flex justify-content-start">
                <a href="{{route('paciente.render', $paciente)}}"><button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                  </svg></button></a>
            </div>
            <p class="display-5 fw-normal text-center text-primary"><span class="text-dark"> Paciente: </span>{{$paciente->nombre}}, {{$paciente->apellido}}</p>
            <div class="d-flex justify-content-center mt-4">
                <img src="{{$img->imagen}}" alt="Imagen_de_{{$paciente->nombre}}" class="img mb-5" width="300px" height="300px">
            </div>
        </div>
    @endif
</x-layouts.app>
