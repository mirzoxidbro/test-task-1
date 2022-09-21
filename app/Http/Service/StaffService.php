<?php

namespace App\Http\Service;

use App\Models\Staff;

class StaffService {

    public function index(){
        return Staff::get();
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

        return $staff->update($data);
    }

    public function destroy($id){
        $staff = Staff::findOrFail($id);
        $staff->delete();
    }
}