<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorWithUserRequest;
use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\User;

class DoctorController extends Controller{
  public function index()
  {
    $doctors = Doctor::with('user')->get();
    return view('doctors.index', compact('doctors'));
  }

  public function create()
  {
    return view('doctors.create');
  }

  public function store(DoctorWithUserRequest $request)
  {
    $validated = $request->validated();

    // create user for doctor

    $user = User::create(['name' => $validated['first_name']. ' '.$validated['last_name'], 'email' => $validated['email'], 'password' => bcrypt($validated['password'])]);

    // create doctor

    Doctor::create([
      'first_name' => $validated['first_name'],
      'last_name' => $validated['last_name'],
      'phone' => $validated['phone'],
      'date_of_birth' => $validated['date_of_birth'],
      'user_id' => $user->id
    ]);

    return redirect()->route('doctors.index')->with('success', 'Lekarz został dodany.');
  }

  public function edit(Doctor $doctor)
  {
    return view('doctors.edit', compact('doctor'));
  }

  public function update(DoctorRequest $request, Doctor $doctor)
  {
    $validated = $request->validated();
    $doctor->update($validated);

    return redirect()->route('doctors.index')->with('success', 'Lekarz został zaktualizowany.');
  }
}
