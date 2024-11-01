<?php

namespace App\Http\Controllers;

use Uatthaphon\ThaiAddress\Models\ThailandSubDistrict;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SubDistrictController extends Controller
{
    /**
     * Display a listing of the sub-districts.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $subDistricts = ThailandSubDistrict::with(['district', 'district.province'])->get();
        return response()->json($subDistricts);
    }

    /**
     * Display the specified sub-district.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $subDistrict = ThailandSubDistrict::with(['district', 'district.province'])->find($id);

        if (!$subDistrict) {
            return response()->json(['message' => 'Sub-district not found'], 404);
        }

        return response()->json($subDistrict);
    }

    /**
     * Store a newly created sub-district in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'code' => 'required|integer|unique:sub_districts,code',
            'name_in_thai' => 'required|string|max:150',
            'name_in_english' => 'nullable|string|max:150',
            'district_id' => 'required|exists:districts,id',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'zip_code' => 'required|string|max:10',
        ]);

        $subDistrict = ThailandSubDistrict::create($request->all());
        return response()->json($subDistrict, 201);
    }
}
