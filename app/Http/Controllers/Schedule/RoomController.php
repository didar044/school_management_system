<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule\Room;

class RoomController extends Controller
{
   
    public function index()
    {    


        //$rooms=DB::table('rooms')->get();
        $rooms = Room::latest()->paginate(10);       
        return view('pages.schedule.room.index',["rooms"=>$rooms]);
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
        $count=Room::count();
        $room_id=$count+100;
        return view('pages.schedule.room.create',["room_id"=>$room_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rooms=new Room();
        $rooms->id=$request->id;
        $rooms->capacity=$request->capacity;
        $rooms->description=$request->description;
        $rooms->description=$request->description;
        $rooms->building=$request->building;
        $rooms->save();
        return redirect('/rooms');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rooms=Room::find($id);
        return view('pages.schedule.room.edit',["rooms"=>$rooms]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
      
        $room->capacity=$request->capacity;
        $room->description=$request->description;
        $room->description=$request->description;
        $room->building=$request->building;
        $room->update();
        return redirect('/rooms');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rooms=Room::find($id);
        $rooms->delete();
        return redirect('/rooms');

    }
}
