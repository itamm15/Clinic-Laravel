<?php

class DoctorController extends Controller
{
  public function index()
  {
    $doctors = Doctor::with('user')->get();
    return view('doctors.index', compact('doctors'));
  }
}
