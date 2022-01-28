<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $specialties =Specialty::all();
        return view('specialties.index', compact('specialties'));
    }
    public function create(){
        return view('specialties.create');
    }

    public function edit(Specialty $specialty){
        return view('specialties.edit', compact('specialty'));
    }
    private function performValidation($request){
        $rules = [
            'name' => 'required|min:4'
        ];

        $messages = [
            'name.required' => 'Por favor escribe un nombre para la especialidad',
            'name.min' => 'El nombre debe tener más de 4 carácteres'
        ];

        $this->validate($request,$rules,$messages);

    }
    public function update(Request $request, Specialty $specialty){

        //dd($request->all()); IMPRIME VARIABLES
        $this->performValidation($request);

        //$specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); //UPDATE
        return redirect('/specialties');
    }

    public function store(Request $request){

        //dd($request->all()); IMPRIME VARIABLES
        $this->performValidation($request);

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); //INSERT
        $notification = 'La especialidad se ha registrado correctamente';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty){
        $deletename = $specialty->name;
        $specialty->delete();

        $notification = 'La especialidad '.$deletename.' se ha eliminado correctamente';
        return redirect('/specialties')->with(compact('notification'));
    }
}
