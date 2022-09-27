<?php

namespace App\Http\Service;

use App\Models\Company;
use App\Models\Staff;

class StaffService {

    public function index(){
    $user = auth()->user();
    if($user->hasRole('company')){
        return $user->staff;
    }else{
        return Company::get();
      }
    }

    public function store(array $data){
        $staff = Staff::create($data);
        return $staff;
    }

    public function show($id){
        return Staff::findOrFail($id);
    }

    public function update(array $data, $id){
        $staff = Staff::findOrFail($id);
        $staff->update($data);
        return $staff;
    }

    public function destroy($id){
        $staff = Staff::findOrFail($id);
        $staff->delete();
    }
}