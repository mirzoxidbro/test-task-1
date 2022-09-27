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
        $this->middleware(['permission:company-list|company-show|company-delete|company-update|company-store']);
        $this->service = new CompanyService;
    }

    
     /**
     * @OA\Get(
     *      path="/api/company",
     *      operationId="getcomapnyList",
     *      tags={"Company"},
     *      summary="Get list of company documents",
     *      description="Returns list of company documents",
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
        $company = $this->service->index();
        return response()->json([
            'company' => $company
        ]);
    }

    /**
     * @OA\Post(
     *      path="/api/company",
     *      operationId="storeCompanydocuments",
     *      tags={"Company"},
     *      summary="Store new company documents",
     *      description="Returns company documents data",
     *      security={{ "apiAuth": {} }},
     * 
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                  type="object",
     *                      @OA\Property(
     *                      property="user_id",
     *                      type = "integer"
     *                  ),
     *                      @OA\Property(
     *                      property="name",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="director",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="address",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="email",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="website",
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



    public function store(CompanyRequest $request){
        $company = $this->service->store($request->validated());

        return response()->json([
            'company' => $company
        ]);
    }

    /**
     * @OA\Get(
     *      path="/api/company/{id}",
     *      operationId="getByIdCompany",
     *      tags={"Company"},
     *      summary="Get cmpany information",
     *      description="Returns cmpany data",
     *      security={{ "apiAuth": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="bonus documents id",
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
        $company = $this->service->show($id);
        return response()->json([
            'company' => $company
        ]);
    }

    /**
     * @OA\Put(
     *      path="/api/company/{id}",
     *      operationId="updatecompany",
     *      tags={"Company"},
     *      summary="Update existing company",
     *      description="Returns updated company data",
     *      security={{ "apiAuth": {} }},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                  type="object",
     *                      @OA\Property(
     *                      property="user_id",
     *                      type = "integer"
     *                  ),
     *                      @OA\Property(
     *                      property="name",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="director",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="address",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="email",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="website",
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

    public function update(CompanyRequest $request, $id){
        $company = $this->service->update($request->validated(), $id);

        return response()->json([
            'company' => $company
        ]);
    }

    /**
     * @OA\Delete(
     *      path="/company/{id}",
     *      operationId="deleteCompany",
     *      tags={"Company"},
     *      summary="Delete existing company",
     *      description="Deletes a record and returns no content",
     *      security={{ "apiAuth": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="company id",
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
        $company = $this->service->destroy($id);
        return response()->json([
            'message' => "company deleted successfully"
        ]);
    }
}
