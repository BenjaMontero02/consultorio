<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagenPostRequest;
use App\Models\Imagen;
use App\Models\Paciente;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ImagenController{

    function getImgByPaciente($id){
        return Imagen::where('paciente_id_paciente', '=', $id)->get();
    }

    function postImg(Request $request, $paciente){

        $request->validate([
            'img' => 'required|image|max:5120',
        ]);

        $img = $request->file('img')->store('public/imgPacientes');

        $url = Storage::url($img);

        Imagen::create([
            'imagen' => $url,
            'paciente_id_paciente' => $paciente
        ]);

        return to_route('paciente.render', $paciente);
    }

    function deleteImgs($paciente){
        $urls = Imagen::where('paciente_id_paciente', $paciente->id)->get();

        foreach($urls as $url){ 
            $new = str_replace('/storage', 'public', $url->imagen); #cambio el storage por public para eliminarlo del la carpeta
            #desde la facade de storage elimino a las cartepas
            Storage::delete($new);
        }
        
        
        Imagen::where('paciente_id_paciente', '=', $paciente->id)->delete();
        
    }

    function deleteImgById(Paciente $paciente, $img) {
        $urls = Imagen::where('id_imagen', '=', $img)->get();

        $new = str_replace('/storage', 'public', $urls[0]->imagen); #cambio el storage por public para eliminarlo del la carpeta
        Storage::delete($new);

        Imagen::where('id_imagen', '=', $img)->delete();

        return to_route('paciente.render', $paciente);
    }

    function getImgById($id){
        $img = Imagen::where('id_imagen', '=', $id)->first();

        return $img;
    }
}