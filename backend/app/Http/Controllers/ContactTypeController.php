<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactType as ContactTypeResource;
use App\Models\ContactType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContactTypeResource::collection(ContactType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:60',
        ]);

        $contactType = new ContactType($request->all());

        $contactType->save();
        return response()->json([
            'tipo-contato' => $contactType,
            'created' => true
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ContactTypeResource(ContactType::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contactType = ContactType::findOrFail($id);
        $contactType->update($request->all());

        return response()->json(['tipo-contato' => $contactType], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContactType::destroy($id);
    }
}
