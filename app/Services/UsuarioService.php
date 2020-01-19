<?php

namespace App\Services;
use Illuminate\Http\Request;

class UsuarioService{
    public function getDataFromRequest(Request $request){
        $data = $request->all();

        return array(
            "documento"=>(isset($data["documento"])?$data["documento"]:0),
            "nombres"=>(isset($data["nombres"])?$data["nombres"]:""),
            "apellidos"=>(isset($data["apellidos"])?$data["apellidos"]:""),
            "email"=>(isset($data["email"])?$data["email"]:"")
        );
    }
}