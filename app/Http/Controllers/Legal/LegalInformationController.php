<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Legal\StoreRequest;
use App\Http\Requests\Legal\UpdateRequest;
use App\Http\Resources\LegalInformation\LegalInformationResource;
use App\Models\LegalInformation;
use Illuminate\Http\Request;

class LegalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return LegalInformationResource
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $legal = LegalInformation::create($data);
        return new LegalInformationResource($legal);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return LegalInformationResource
     */
    public function update(UpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $legal = LegalInformation::find($id);
        $legal->update($data);
        $legal->fresh();
        return new LegalInformationResource($legal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
