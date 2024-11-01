<?php

namespace App\Http\Controllers;

use App\Models\team;
use Illuminate\Http\Request;
use Str;

class TeamController extends Controller
{
    //team_list
    function team_list(){
        $teams = team::all();
        return view('backend.team.team', [
            'teams'=>$teams,
        ]);

    }

    // team_store
    function team_store(Request $request){
        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'education' => 'required',
            'image' => '',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/team'), $fileName);
            $validatedData['image'] = $fileName;
        }

        team::create($validatedData);
        return back()->withSuccess('added successfully.');
    }


    // editteam
    public function editteam(Request $request, $id) {
        $team = team::find($id);

        if(!$team) {
            return response()->json([
                'status' => 404,
                'message' => 'team not found'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'team' => $team,
        ]);
    }


     // team_update
     function team_update(Request $request){
        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'education' => 'required',
            'image' => '',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {
            $img_del = team::where('id', $request->team_id)->first()->image;
            $delete_from = public_path('uploads/team/'.$img_del);
            if(file_exists($delete_from)){
                unlink($delete_from);
            }

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = Str::random(5) . rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('uploads/team'), $fileName);
            $validatedData['image'] = $fileName;
        }

        team::where('id', $request->team_id)->update($validatedData);

        return back()->withSuccess('Update successfully.');
    }


    // team_delete
    function team_delete($id){
        team::find($id)->delete();
        return back()->withError('Delete successfully');
    }
}
