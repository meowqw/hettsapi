<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\StoreRequest;
use App\Http\Requests\Personal\UpdateRequest;
use App\Http\Resources\PersonalInformation\PersonalInformationResource;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PersonalInformationController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return PersonalInformationResource
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $personal = PersonalInformation::create($data);
        return new PersonalInformationResource($personal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return PersonalInformationResource
     */
    public function update(UpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $personal = PersonalInformation::find($id);
        $personal->update($data);
        $personal->fresh();
        return new PersonalInformationResource($personal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
