<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Requests\PatientWithUserRequest;
use App\Http\Requests\PatientRequest;
use App\Models\User;

class PatientController extends Controller
{
	public function index()
	{
		$patients = Patient::with('user')->get();
		return view('patients.index', compact('patients'));
	}

	public function create()
	{
		return view('patients.create');
	}

	public function store(PatientWithUserRequest $request)
	{
		$validated = $request->validated();

		// create user for patient

		$user = User::create(['name' => $validated['first_name']. ' '.$validated['last_name'], 'email' => $validated['email'], 'password' => bcrypt($validated['password'])]);

		// create patient

		Patient::create([
			'first_name' => $validated['first_name'],
			'last_name' => $validated['last_name'],
			'phone' => $validated['phone'],
			'date_of_birth' => $validated['date_of_birth'],
			'user_id' => $user->id
		]);

		return redirect()->route('patients.index');
	}

	public function edit(Patient $patient)
	{
		return view('patients.edit', compact('patient'));
	}

	public function update(PatientRequest $request, Patient $patient)
	{
		$validated = $request->validated();
		$patient->update($validated);

		return redirect()->route('patients.index');
	}

	public function delete(Patient $patient)
	{
		$user = User::where('id', $patient->user_id)->first();
		$patient->delete();
		$user->delete();
		return redirect()->route('patients.index');
	}
}
