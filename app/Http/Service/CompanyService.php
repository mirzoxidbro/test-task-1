<?php

namespace App\Http\Service;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyService{

    public function index(){
    $user = auth()->user();
    if($user->hasRole('company')){
        return $user->company;
    }else{
        return Company::get();
      }
    }

    public function store(array $data){
        return Company::create($data);
    }

    public function show($id){
        return Company::findOrFail($id);
    }

    public function update(array $data, $id){
        $company = Company::findOrFail($id);
        $company->update($data);
        return $company;
    }

    public function destroy($id){
        $company = Company::findOrFail($id);
        $company->delete();
    }

}