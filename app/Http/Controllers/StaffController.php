<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Http\Service\StaffService;

class StaffController extends Controller
{
    protected $service;

    public function __construct()
    {
    $this->middleware(['permission:staff-list|staff-show|staff-delete|staff-update|staff-store']);

        $this->service = new StaffService;
    }
   
    public function index(){
        $staff = $this->service->index();
        
        return response()->json([
            $staff    
        ]);

    }

    public function store(StaffRequest $request){
        $staff = $this->service->store($request->validated());

        return response()->json([
            'staff' => $staff
        ]);
    }

    public function show($id){
        $staff = $this->service->show($id);
        
        return response()->json([
            'staff' => $staff
        ]);
    }

    public function update(StaffRequest $request, $id){
        $staff = $this->service->update($request->validated(), $id);
        
        return response()->json([
            'staff' => $staff
        ]);
    }

    public function destroy($id){
        $staff = $this->service->destroy($id);
         
        return response()->json([
            'message' => "enterprise deleted successfully"
        ]);
    }

}
