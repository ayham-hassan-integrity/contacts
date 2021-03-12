<?php

namespace App\Domains\Perosn\Http\Controllers\Api\Perosn;

use App\Http\Controllers\Controller;
use App\Domains\Perosn\Models\Perosn;
use Illuminate\Http\Request;

/**
 * Class PerosnController.
 */
class PerosnController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/perosn",
     * summary="Get All Perosns",
     * description="Show All Perosns",
     * operationId="getAllPerosns",
     * tags={"Perosn"},
     * @OA\Response(
     *    response=200,
     *    description="Returns when Perosn are found",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function index()
    {
        return Perosn::all();
    }



    /**
     * @OA\Get(
     * path="/api/perosn/{id}",
     * summary="Get Perosn by id",
     * description="Show one Perosn by id",
     * operationId="getOnePerosns",
     * tags={"perosn"},
     * @OA\Parameter(
     *    description="ID of perosn",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when perosn id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Perosn is found",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function show(Perosn $perosn)
    {
        return $perosn;
    }

    /**
     * @OA\Post (
     * path="/api/perosn",
     * summary="Create New Perosn",
     * description="Create One Perosn",
     * operationId="postOnePerosns",
     * tags={"perosn"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Perosn fields",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when name or description deos'nt o the RequestBody ",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="name and description field are required"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Perosn has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function store(Request $request)
    {
        $perosn = Perosn::create($request->all());
        return response()->json($perosn, 201);
    }

    /**
     * @OA\Put  (
     * path="/api/perosn/{id}",
     * summary="Edit one Perosn by id",
     * description="update One Perosn by id",
     * operationId="postOnePerosns",
     * tags={"perosn"},
     * @OA\Parameter(
     *    description="ID of perosn",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\RequestBody(
     *    required=false,
     *    description="Perosn fields",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Perosn has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:04:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function update(Request $request, Perosn $perosn)
    {
        $perosn->update($request->all());

        return response()->json($perosn, 200);
    }

    /**
     * @OA\Delete (
     * path="/api/perosn/{id}",
     * summary="delete Perosn by id",
     * description="delete one Perosn by id",
     * operationId="deleteOnePerosns",
     * tags={"perosn"},
     * @OA\Parameter(
     *    description="ID of perosn",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when perosn id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Perosns are found",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="2021-03-10T15:47:13.000000Z"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function delete(Perosn $perosn)
    {
        $perosn->delete();

        return response()->json($perosn, 200);
    }
}