<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminOurTeam;

class AdminOurTeamPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $data = [];
        $inc = 1;
        $title = 'Our Team Control Panel';
        $Our_Team = AdminOurTeam::paginate(10);

        $data = [
            'title' => $title,
            'inc' => $inc,
            'Our_Team' => $Our_Team,
            
        ];
        return view('AdminPages.AdminOurTeam.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Add New Team Member Entry Start
        if($request->input('team_member_name') != null){

             //Save Images Start
             if($request->hasfile('file')){
                 $file = $request->file('file');
                    $name=  time(). $file->getClientOriginalName();
                    $file->storeAs('public/images/OurTeamMember/', $name);                  
                    $filePath = $file->storeAs('public/images/OurTeamMember/', $name);
                    $filePathdb = 'storage/images/OurTeamMember/'.$name;
                    $filesize = $file->getClientSize();
                    $filetype = $file->getClientOriginalExtension();
             }
             //Save Images End

            $add_Customer = New AdminOurTeam([
                'name' => $request->input('team_member_name'),
                'mobile' => $request->input('team_member_mobile'),
                'email' => $request->input('team_member_email'),
                'facebook' => $request->input('team_member_facebook'),
                'designation' => $request->input('team_member_designation'),
                'profile_image' => $filePathdb,
                ]);    
            $add_Customer->save();
            return \Redirect::back();
        }
        //Add New Team Member Entry End


        //Delete Team Member Entry Start
       if($request->input('delete_team_member_id') != null){

        $delete_requested_id = AdminOurTeam::where('id','=',$request->input('delete_team_member_id'))->first();
        \File::delete($delete_requested_id->profile_image);
        $delete_requested_id->delete();
        return \Redirect::back();   
        }
        //Delete Team Member Entry End





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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
