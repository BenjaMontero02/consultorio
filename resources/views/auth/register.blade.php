<x-layouts.app tittle="register">
    @guest
        <div class="container">
            <div class="text-center">

                @error('password')
                    <br>
                    <small style="color:red">{{$message}}</small>
                @enderror
                @error('password_confirmation')
                    <br>
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-center mt-5 mb-5">
                <div class="login-box shadow-lg">
                    <h2 class="text-primary">Registro</h2>
                    <form action="{{route('register')}}" method="post" >
                        @csrf
                        <div class="user-box">
                            <label  class="text-primary">Email</label>
                            <input type="email" name="email" required value="{{old('email')}}" class="mb-2">
                                    @error('email')
                                        <br>
                                        <small style="color:red">{{$message}}</small>
                                    @enderror
                        </div>
                        <div class="user-box">
                            <label class="text-primary">Contraseña</label>
                            <input type="password" name="password" required class="mb-2">
                        </div><div class="user-box">
                            <label class="text-primary">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" required class="mb-2">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('login')}}" class="text-secondary text-decoration-none">Iniciar Sesion</a>
                            <div>
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endguest
</x-layouts.app>
