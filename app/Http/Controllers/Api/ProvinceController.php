<?php

namespace App\Http\Controllers;

use Uatthaphon\ThaiAddress\Models\ThailandProvince;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the provinces.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $provinces = ThailandProvince::with('districts')->get();
        return response()->json($provinces);
    }

    /**
     * Display the specified province.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $province = ThailandProvince::with('districts')->find($id);

        if (!$province) {
            return response()->json(['message' => 'Province not found'], 404);
        }

        return response()->json($province);
    }

    /**
     * Store a newly created province in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'code' => 'required|integer|unique:provinces,code',
            'name_in_thai' => 'required|string|max:150',
            'name_in_english' => 'nullable|string|max:150',
        ]);

        $province = ThailandProvince::create($request->all());
        return response()->json($province, 201);
    }
}
