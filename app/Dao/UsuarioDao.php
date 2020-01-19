<?php

namespace App\Dao;
use App\Usuario;
class UsuarioDao{
    public function save(array $data){
        $usuario = new Usuario;
        $usuario->documento  = $data["documento"];
        $usuario->nombres  = $data["nombres"];
        $usuario->apellidos  = $data["apellidos"];
        $usuario->email  = $data["email"];
        return $usuario->save();
    }

    public function getAll(){
        $usuarios = Usuario::all();
        return $usuarios->toArray();
    }

    public function getUsuarioByDocumento($documento){
        $usuario = Usuario::where("documento",$documento)->take(1)->get();
        return $usuario->toArray();
    }

    public function getUsuarioByEmail($email){
        $usuario = Usuario::where("email",$email)->take(1)->get();
        return $usuario->toArray();
    }

    public function deleteByDocument($document){
        $usuario = Usuario::where("documento",$document);
        return $usuario->delete();
    }

    public function deleteByEmail($email){
        $usuario = Usuario::where("email",$email);
        return $usuario->delete();
    }

    public function updateByDocument($document,array $data){
        $usuario = Usuario::where("documento",$document);
        $data = arraY(
            "documento"=>$data["documento"],
            "nombres"=>$data["nombres"],
            "apellidos"=>$data["apellidos"],
            "email"=>$data["email"]
        );
        return $usuario->update($data);
    }

    public function updateByEmail($email,array $data){
        $usuario = Usuario::where("email",$email);
        $data = arraY(
            "documento"=>$data["documento"],
            "nombres"=>$data["nombres"],
            "apellidos"=>$data["apellidos"],
            "email"=>$data["email"]
        );
        return $usuario->update($data);
    }
}
