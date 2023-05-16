<?php

namespace App\Http\Controllers;

use App\Repositories\KendaraanRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KendaraanController extends Controller
{
    protected $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function index()
    {
        $kendaraan = $this->kendaraanRepository->all();
        return response()->json($kendaraan, Response::HTTP_OK);
    }

    public function show($id)
    {
        $kendaraan = $this->kendaraanRepository->find($id);

        if (!$kendaraan) {
            return response()->json(['message' => 'Kendaraan not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($kendaraan, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $kendaraan = $this->kendaraanRepository->create($request->all());
        return response()->json($kendaraan, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $kendaraan = $this->kendaraanRepository->find($id);

        if (!$kendaraan) {
            return response()->json(['message' => 'Kendaraan not found'], Response::HTTP_NOT_FOUND);
        }

        $kendaraan = $this->kendaraanRepository->update($id, $request->all());
        return response()->json($kendaraan, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $kendaraan = $this->kendaraanRepository->find($id);

        if (!$kendaraan) {
            return response()->json(['message' => 'Kendaraan not found'], Response::HTTP_NOT_FOUND);
        }

        $this->kendaraanRepository->delete($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
