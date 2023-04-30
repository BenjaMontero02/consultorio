<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacientePostRequest;
use App\Models\Imagen;
use App\Models\Paciente;
use App\Http\Controllers\ImagenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PacienteController{

    public function __construct()
    {
        new ImagenController();
    }

    function getPacientes(){
        $pacientes = Paciente::get();
        return view('paciente.paciente', ['pacientes' => $pacientes]);
    }

    function getPacienteById($paciente, ImagenController $img){
        $paciente = Paciente::findOrFail($paciente);
        $imgs = $img->getImgByPaciente($paciente->id);
        return view('paciente.renderPaciente', ['paciente' => $paciente, 'imgs' => $imgs]);
    }

    function renderForm(){
        return view('paciente.formInsertPaciente', ['paciente' => new Paciente]);
    }

    function addPaciente(PacientePostRequest $request){

        //funcion old tittle sirve para poner en el value del form en caso de que falle el valor q se puso anterior mente

        Paciente::create($request->validated());

        //muestro mensaje si se añadio el paciente
        session()->flash('status', 'Paciente añadido');
 
        //muestro vista con el to_Route que es simil a un redirect
        return to_route('paciente');
    }

    function pacienteEdit(Paciente $paciente) {
        return view('paciente.pacienteEdit', ['paciente' => $paciente]);
    }

    function pacienteUpdate(PacientePostRequest $request, Paciente $paciente){

        $paciente->update($request->validated());

        session()->flash('agregado', 'Paciente editado');
    
        return to_route('paciente.render', $paciente);
        
    }

    function pacienteDelete(Paciente $paciente, ImagenController $img){
        
        $img->deleteImgs($paciente);
        $paciente->delete();
        session()->flash('eliminado', 'Paciente Eliminado');
        return to_route('paciente');
        
    }

    function showImg(Paciente $paciente, $img ){
        $constructor = new ImagenController();
        $img = $constructor->getImgById($img);
        return view('image', ['paciente' => $paciente, 'img' => $img]);
    }
}