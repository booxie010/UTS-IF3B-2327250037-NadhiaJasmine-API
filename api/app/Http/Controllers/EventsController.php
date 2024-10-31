<?php

namespace App\Http\Controllers;

use App\Models\events;
use Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = events::all();
        $data['success'] = true;
        $data['message'] = "Data berhasil disimpan";
        $data['result'] = $events;
        return response()->json($data, Response::HTTP_OK);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:events']);

        $events = events::create($validate);
        if($events){
            $response['success'] = true;
            $response['message'] = 'Events berhasil ditambahkan!';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }  
    /**
     * Display the specified resource.
     */
    public function show(events $events)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(events $events)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:events'
        ]);

        $result = Event::where ('id', operator: $id)->update($validate);
            if($result) {
                $response['success'] = true;
                $response['message'] = 'Events berhasil diubah!';
                return response()->json($response, Response::HTTP_CREATED);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $events = Event :: find($id);
        if($events){
            $events->delete(); // hapus data fakultas berdasarkan $id
            $data['success'] = true;
            $data['message'] = "Data Events Berhasil Dihapus.";
            return response()->json($data, Response::HTTP_OK);
        } else{
            $data['success'] = false;
            $data['message'] = "Data Event Tidak DItemukan.";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}