<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller

{
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::patients()->paginate(5);
        //$patients = User::where('role','patient')->get();
        //$patients = User::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->performValidation($request);

        User::create($request->only('name','email','dni','address','phone')
            + [
                'role'=>'patient',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'El paciente se ha registrado correctamente.';
        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = User::patients()->findOrFail($id);
        return view('patients.edit')->with(compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->performValidation($request);

        $user = User::patients()->findOrFail($id);
        $data = $request->only('name','email','dni','address','phone',);
        $password = $request->input('password');
        if($password)
            $data['password'] = bcrypt($password);


        $user->fill($data);
        $user->save();
        $notification = 'La información del paciente se ha actualizado correctamente.';
        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $patient)
    {
        $patientName = $patient->name;
        $patient->delete();
        $notification = 'El paciente '.$patientName.' se ha eliminado correctamente.';
        return redirect('/patients')->with(compact('notification'));
    }
}



