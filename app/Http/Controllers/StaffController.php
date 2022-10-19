<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Http\Service\StaffService;

class StaffController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new StaffService;
    }

    /**
     * @OA\Get(
     *      path="/api/staff",
     *      operationId="getStaffList",
     *      tags={"Staff"},
     *      summary="Get list of staff documents",
     *      description="Returns list of staff documents",
     *      security={{ "apiAuth": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */


    public function index(){
        $staff = $this->service->index();
        
        return response()->json([
            $staff    
        ]);

    }

    /**
     * @OA\Post(
     *      path="/api/staff",
     *      operationId="storeStaffdocuments",
     *      tags={"Staff"},
     *      summary="Store new staff",
     *      description="Returns staff data",
     *      security={{ "apiAuth": {} }},
     * 
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                  type="object",
     *                      @OA\Property(
     *                      property="company_id",
     *                      type = "integer"
     *                  ),
     *                      @OA\Property(
     *                      property="name",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="surname",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="father_name",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="position",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="address",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="phone_number",
     *                      type = "string",
     *                  ),
     *              ),
     *          )
     *      )
     * ),
     * 
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * )
     */


    public function store(StaffRequest $request){
        $staff = $this->service->store($request->validated());

        return response()->json([
            'staff' => $staff
        ]);
    }

     /**
     * @OA\Get(
     *      path="/api/staff/{id}",
     *      operationId="getByIdStaff",
     *      tags={"Staff"},
     *      summary="Get staff information",
     *      description="Returns staff data",
     *      security={{ "apiAuth": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="staff id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */


    public function show($id){
        $staff = $this->service->show($id);
        
        return response()->json([
            'staff' => $staff
        ]);
    }

    /**
     * @OA\Put(
     *      path="/api/staff/{id}",
     *      operationId="updatestaff",
     *      tags={"Staff"},
     *      summary="Update existing staff",
     *      description="Returns updated staff data",
     *      security={{ "apiAuth": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                  type="object",
     *                      @OA\Property(
     *                      property="company_id",
     *                      type = "integer"
     *                  ),
     *                      @OA\Property(
     *                      property="name",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="surname",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="father_name",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="position",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="address",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="phone_number",
     *                      type = "string",
     *                  ),
     *              ),
     *          )
     *      )
     * ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    public function update(StaffRequest $request, $id){
        $staff = $this->service->update($request->validated(), $id);
        
        return response()->json([
            'staff' => $staff
        ]);
    }

    /**
     * @OA\Delete(
     *      path="/staff/{id}",
     *      operationId="deleteStaff",
     *      tags={"Staff"},
     *      summary="Delete existing staff",
     *      description="Deletes a record and returns no content",
     *      security={{ "apiAuth": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="staff id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */


    public function destroy($id){
        $staff = $this->service->destroy($id);
         
        return response()->json([
            'message' => "enterprise deleted successfully"
        ]);
    }

}
