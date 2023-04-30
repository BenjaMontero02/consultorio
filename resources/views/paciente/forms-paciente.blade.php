<div class="col-6">
    <label class="form-label">Nombre</label>
        <input class="form-control shadow"  type="text" name="nombre" required placeholder="Nombre" value="{{old('nombre', $paciente->nombre)}}">
        @error('nombre')
            <br>
            <small style="color:red">{{$message}}</small>
        @enderror
</div>
<div class="col-6">
    <label class="form-label">Apellido</label>
        <input class="form-control shadow" type="text" class="form__field" name="apellido" required placeholder="Apellido" value="{{old('apellido', $paciente->apellido)}}">
        @error('apellido')
            <br>
            <small style="color:red" value="{{old('nombre')}}">{{$message}}</small>
        @enderror
</div>
<div class="col-6">
    <label class="form-label">Dni</label>
        <input class="form-control shadow " type="text" name="dni" required placeholder="Dni" value="{{old('dni', $paciente->dni)}}">
        @error('dni')
            <br>
            <small style="color:red">{{$message}}</small>
        @enderror
</div>
<div class="col-6">
    <label class="form-label">Cuil</label>
        <input class="form-control shadow" type="text" name="cuil" placeholder="Cuil" value="{{old('cuil', $paciente->cuil)}}">
        @error('dni')
            <br>
            <small style="color:red">{{$message}}</small>
        @enderror
</div>
<div class="col-6">
    <label class="form-label">Fecha de Nacimiento</label>
        <input class="form-control shadow" type="date" name="fecha_nac" placeholder="Fecha de Nacimiento" value="{{old('fecha_nac', $paciente->fecha_nac)}}">
        @error('fecha_nac')
            <br>
            <small style="color:red">{{$message}}</small>
        @enderror
</div>
<div class="col-6">
    <label class="form-label">Direccion</label>
        <input class="form-control shadow" type="text" name="direccion" placeholder="Direccion" value="{{old('direccion', $paciente->direccion)}}">
        @error('direccion')
            <br>
            <small style="color:red">{{$message}}</small>
        @enderror
</div>
<div class="col-6">
    <label class="form-label">Telefono</label>
        <input class="form-control shadow" type="text" name="telefono" placeholder="Telefono" value="{{old('telefono', $paciente->telefono)}}">
        @error('telefono')
            <br>
            <small style="color:red">{{$message}}</small>
        @enderror
</div>
<div class="col-6">
    <label class="form-label">Ultima Visita</label>
        <input class="form-control shadow" type="date" name="ult_visita" placeholder="Ultima Visita" value="{{old('ult_visita', $paciente->ult_visita)}}">
        @error('ult_visita')
            <br>
            <small style="color:red">{{$message}}</small>
        @enderror
</div>
<div class="col-6 mb-5">
    <label class="form-label">Obra social</label>
        <input type="text" class="form-control shadow" name="obra_social" placeholder="Obra Social" value="{{old('obra_social', $paciente->obra_social)}}">
    @error('obra_social')
        <br>
        <small style="color:red">{{$message}}</small>
    @enderror
</div>