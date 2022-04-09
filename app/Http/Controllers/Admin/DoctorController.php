<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Url;
use Illuminate\Http\Request;

class DoctorController extends Controller

{
    public function _construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function performValidation($request){

        $rules = [
            'name'=> 'required|min:4',
            'email'=> 'required|email',
            'address'=> 'nullable|min:5',
            'dni'=> 'between:6,10',
            'phone'=> 'min:8'
        ];
        $messages = [
            'name,required'=> 'Por favor escriba un nombre para el médico',
            'name.min' => 'El nombre debe tener mínimo 4 carácteres',
            'email.required' => 'Por favor escriba una dirección de correo',
            'email.email'=> 'Por favor escriba una dirección de correo válida',
            'address'=> 'La dirección debe contar con al menos 5 carácteres',
            'dni'=> 'El DNI debe tener entre 6 y 10 dígitos',
            'phone'=> 'El teléfono debe tener al menos 8 dígitos'

        ];
        $this->validate($request,$rules,$messages);

    }
    public function index()
    {
        //$doctors = User::where('role','doctor')->get();
        $doctors = User::doctors()->get();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->performValidation($request);

        User::create($request->only('name','email','dni','address','phone')
            + [
                'role'=>'doctor',
                'password' => bcrypt($request->input('password'))
               ]
        );
        $notification = 'El médico se ha registrado correctamente.';
        return redirect('/doctors')->with(compact('notification'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = User::doctors()->findOrFail($id);
        return view('doctors.edit')->with(compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->performValidation($request);

        $user = User::doctors()->findOrFail($id);
        $data = $request->only('name','email','dni','address','phone',);
        $password = $request->input('password');
            if($password)
                $data['password'] = bcrypt($password);


        $user->fill($data);
        $user->save();
        $notification = 'La información del médico se ha actualizado correctamente.';
        return redirect('/doctors')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $doctor)
    {
        $doctorName = $doctor->name;
        $doctor->delete();
        $notification = 'El médico '.$doctorName.' ha sido eliminado correctamente.';
        return redirect('/doctors')->with(compact('notification'));
    }
}
