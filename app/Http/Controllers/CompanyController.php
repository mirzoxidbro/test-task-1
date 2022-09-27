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
        // $this->middleware('company-list')->only('index');
        // $this->middleware('company-show')->only('show');
        // $this->middleware('company-delete')->only('destroy');
        // $this->middleware('company-update')->only('update');
        // $this->middleware('company-store')->only('store');
        // $this->middleware(['permission:company-list|company-show|company-delete|company-update|company-store']);
        $this->service = new CompanyService;
    }

    public function index(){
        $company = $this->service->index();
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
        $company = $this->service->show($id);
        return response()->json([
            'company' => $company
        ]);
    }

    public function update(CompanyRequest $request, $id){
        $company = $this->service->update($request->validated(), $id);

        return response()->json([
            'company' => $company
        ]);
    }

    public function destroy($id){
        $company = $this->service->destroy($id);
        return response()->json([
            'message' => "company deleted successfully"
        ]);
    }
}
