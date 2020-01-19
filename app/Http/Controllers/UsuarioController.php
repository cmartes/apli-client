<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;
use App\Dao\UsuarioDao;

class UsuarioController extends Controller
{
    public function save(Request $request){
        try{
            $data = (new UsuarioService())->getDataFromRequest($request);
            $rtn = (new UsuarioDao())->save($data);
            if($rtn){
                return response('Usuario Creado', 200)
                ->header('Content-Type','application/json');
            }else{
                return response('Error al crear el usuario', 500)
                    ->header('Content-Type', 'application/json');
            }
        }catch(\Exception $e){
            return response('Error al crear el usuario', 500)
            ->header('Content-Type', 'application/json');
        }
    }

    public function getUsuarios(){
        try{
            $data = (new UsuarioDao())->getAll();
            return response($data, 200)
            ->header('Content-Type', 'application/json');
        }catch(\Exception $e){
            return response('Error consultando los usuarios', 500)
            ->header('Content-Type', 'application/json');
        }
    }

    public function getUsuarioByDocument($document){
        try{
            $data = (new UsuarioDao())->getUsuarioByDocumento($document);
            return response($data, 200)
            ->header('Content-Type', 'application/json');
        }catch(\Exception $e){
            return response('Error consultando el usuario', 500)
            ->header('Content-Type', 'application/json');
        }
    }

    public function getUsuarioByEmail($email){
        try{
            $data = (new UsuarioDao())->getUsuarioByEmail($email);
            return response($data, 200)
            ->header('Content-Type', 'application/json');
        }catch(\Exception $e){
            return response('Error consultando el usuario', 500)
            ->header('Content-Type', 'application/json');
        }
    }

    public function deleteUsuarioByDocument($document){
        try{
            $data = (new UsuarioDao())->deleteByDocument($document);
            $message = "Usuario borrado";
            if(!$data){
                $message = "No se pudo borrar el usuario";
            }
            return response($message, 200)
            ->header('Content-Type', 'application/json');
        }catch(\Exception $e){
            return response('Error borrando el usuario', 500)
            ->header('Content-Type', 'application/json');
        }
    }

    public function deleteUsuarioByEmail($email){
        try{
            $data = (new UsuarioDao())->deleteByEmail($email);
            $message = "Usuario borrado";
            if(!$data){
                $message = "No se pudo borrar el usuario";
            }
            return response($message, 200)
            ->header('Content-Type', 'application/json');
        }catch(\Exception $e){
            return response('Error borrando el usuario', 500)
            ->header('Content-Type', 'application/json');
        }
    }

    public function updateByDocument($document,Request $request){
        try{
            $data = (new UsuarioService())->getDataFromRequest($request);
            $rtn = (new UsuarioDao())->updateByDocument($document,$data);
            if($rtn){
                return response('Usuario Actualizado', 200)
                ->header('Content-Type','application/json');
            }else{
                return response('Error al actualizar el usuario', 500)
                    ->header('Content-Type', 'application/json');
            }
        }catch(\Exception $e){
            return response('Error al actualizar el usuario '.$e->getMessage(), 500)
            ->header('Content-Type', 'application/json');
        }
    }

    public function updateByEmail($email,Request $request){
        try{
            $data = (new UsuarioService())->getDataFromRequest($request);
            $rtn = (new UsuarioDao())->updateByEmail($email,$data);
            if($rtn){
                return response('Usuario Actualizado', 200)
                ->header('Content-Type','application/json');
            }else{
                return response('Error al actualizar el usuario', 500)
                    ->header('Content-Type', 'application/json');
            }
        }catch(\Exception $e){
            return response('Error al actualizar el usuario '.$e->getMessage(), 500)
            ->header('Content-Type', 'application/json');
        }
    }
}
