<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Team;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class TeamControllerApi extends Controller
{

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
               return response()->json([
               "status"=>true,
               "data"=>Team::orderBy('id','desc')->paginate(15)
               ]);
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store()
    {
        $rules = [
                         'name'=>'required|string',
             'jop'=>'required|string',
             'phone'=>'required|string',
             'email'=>'nullable|sometimes',
             'facebook'=>'url|nullable|sometimes',
             'instgram'=>'url|nullable|sometimes',
             'linkedin'=>'url|nullable|sometimes',
             'image'=>'required|'.it()->image().'',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'name'=>trans('admin.name'),
             'jop'=>trans('admin.jop'),
             'phone'=>trans('admin.phone'),
             'email'=>trans('admin.email'),
             'facebook'=>trans('admin.facebook'),
             'instgram'=>trans('admin.instgram'),
             'linkedin'=>trans('admin.linkedin'),
             'image'=>trans('admin.image'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('image')){
              $data['image'] = it()->upload('image','team');
              }
        $create = Team::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('admin.added'),
            "data"=>$create
        ]);
    }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $show =  Team::find($id);
                 return response()->json([
              "status"=>true,
              "data"=> $show
              ]);  ;
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {
                $rules = [
             'name'=>'required|string',
             'jop'=>'required|string',
             'phone'=>'required|string',
             'email'=>'nullable|sometimes',
             'facebook'=>'url|nullable|sometimes',
             'instgram'=>'url|nullable|sometimes',
             'linkedin'=>'url|nullable|sometimes',
             'image'=>'required|'.it()->image().'',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'name'=>trans('admin.name'),
             'jop'=>trans('admin.jop'),
             'phone'=>trans('admin.phone'),
             'email'=>trans('admin.email'),
             'facebook'=>trans('admin.facebook'),
             'instgram'=>trans('admin.instgram'),
             'linkedin'=>trans('admin.linkedin'),
             'image'=>trans('admin.image'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('image')){
              it()->delete(Team::find($id)->image);
              $data['image'] = it()->upload('image','team');
               }
              Team::where('id',$id)->update($data);

              $Team = Team::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Team
               ]);
            }

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $team = Team::find($id);

               it()->delete($team->image);
               it()->delete('team',$id);

               @$team->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$team = Team::find($id);

                    	it()->delete($team->image);
                    	it()->delete('team',$id);
                    	@$team->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $team = Team::find($data);
 
                    	it()->delete($team->image);
                    	it()->delete('team',$data);

                    @$team->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}