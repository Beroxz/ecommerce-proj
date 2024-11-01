<?php

namespace App\Http\Controllers;

use Uatthaphon\ThaiAddress\Models\ThailandDistrict;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DistrictController extends Controller
{
    /**
     * Display a listing of the districts.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $districts = ThailandDistrict::with('province')->get();
        return response()->json($districts);
    }

    /**
     * Display the specified district.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $district = ThailandDistrict::with('province')->find($id);

        if (!$district) {
            return response()->json(['message' => 'District not found'], 404);
        }

        return response()->json($district);
    }

    /**
     * Store a newly created district in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'code' => 'required|integer',
            'name_in_thai' => 'required|string|max:150',
            'name_in_english' => 'nullable|string|max:150',
            'province_id' => 'required|exists:provinces,id',
        ]);

        $district = ThailandDistrict::create($request->all());
        return response()->json($district, 201);
    }
}
