<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Service\CompanyService;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new CompanyService;
    }

    public function index(){
        $company = $this->servie->index();
        return response()->json([
            'company' => $company
        ]);
    }

    public function store(CompanyRequest $request){
        $company = $this->service->store($request->validated());

        return response()->json([
            'company' => $company
        ]);
    }

    public function show($id){
        $servie = new CompanyService;
        $company = $servie->show($id);
        return response()->json([
            'company' => $company
        ]);
    }

    public function update(CompanyRequest $request, $id){
        $company = $this->servie->update($request->validated(), $id);

        return response()->json([
            'company' => $company
        ]);
    }

    public function destroy($id){
        $company = $this->servie->destroy($id);
        return response()->json([
            'message' => "company deleted successfully"
        ]);
    }
}
