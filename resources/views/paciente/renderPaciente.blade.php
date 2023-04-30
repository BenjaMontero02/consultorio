<x-layouts.app tittle="paciente">

    @auth
    @if (Auth::user()->role == 'god' || Auth::user()->role == 'admin')
    <div class="container">

        @if(session('status'))
            <p class="text-center h5 mt-2 fw-lighter medium text-primary">{{session('status')}}</p>
        @endif
            <form action="{{route('paciente.update', $paciente->id)}}" method="POST" class="row g-3 mt-3">
                @csrf @method('PATCH')
                @include('paciente.forms-paciente')
                <div class="col-3">
                    
                    <button type="submit" class="btn btn-primary mt-4"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
                    </svg>Guardar</button>
                    <a class="navbar-brand" href="{{route('paciente.delete' ,$paciente)}}"><button type="button" class="btn btn-danger mt-4"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>Eliminar</button></a>
                </div>
            </form>        
    </div>
            <div class="container">
                    <form action="{{route('paciente.addImg', $paciente)}}" method="POST" enctype="multipart/form-data" class="row g-3 mt-3 mb-3">
                        @csrf
                            <div class="col-6">
                                <input class="form-control shadow" type="file" name="img" id="" accept="image/*">
                            </div>
                        @error('img')
                            <p class="small text-danger">Solo se permiten imagenes menores a 5mb</p>
                        @enderror
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary " id="btn-submit-file"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up-fill" viewBox="0 0 16 16">
                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.354 9.854a.5.5 0 0 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 8.707V12.5a.5.5 0 0 1-1 0V8.707L6.354 9.854z"/>
                                  </svg></button>
                            </div>
                    </form>
            </div>
            <div class="container mb-5">
                <div class="d-sm-flex align-items-center flex-wrap">
                    @foreach ($imgs as $img)
                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <img src="{{$img->imagen}}" class="m-2 shadow" alt="imagen_paciente_{{$img->paciente_id_paciente}}" width="150px" height="200px">
                                    <div>  
                                        <a class="navbar-brand" href="{{route('paciente.showImg', ['paciente'=>$paciente, 'img' => $img->id_imagen])}}"><button type="button" class="btn btn-link shadow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg></button></a>
                                        <a class="navbar-brand" href="{{route('paciente.deleteImgById', ['paciente'=>$paciente->id, 'img' => $img->id_imagen])}}"><button type="button" class="btn btn-danger shadow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg></button></a>
                                    </div>  
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
    @endauth

</x-layouts.app>
