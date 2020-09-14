<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Property;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class PropertiesControllerApi extends Controller
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
               "data"=>Property::orderBy('id','desc')->paginate(15)
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
             'des'=>'required|string',
             'photo'=>'required|'.it()->image().'',
             'rooms'=>'numeric|nullable|sometimes',
             'wc'=>'numeric|nullable|sometimes',
             'space'=>'nullable|sometimes|string',
             'type'=>'required',
             'place_id'=>'required',
             'badge'=>'nullable|sometimes|string',
             'video'=>'nullable|sometimes',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'name'=>trans('admin.name'),
             'des'=>trans('admin.des'),
             'photo'=>trans('admin.photo'),
             'rooms'=>trans('admin.rooms'),
             'wc'=>trans('admin.wc'),
             'space'=>trans('admin.space'),
             'type'=>trans('admin.type'),
             'place_id'=>trans('admin.place_id'),
             'badge'=>trans('admin.badge'),
             'video'=>trans('admin.video'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','properties');
              }
               if(request()->hasFile('video')){
              $data['video'] = it()->upload('video','properties');
              }
        $create = Property::create($data); 

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
                $show =  Property::find($id);
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
             'des'=>'required|string',
             'photo'=>'required|'.it()->image().'',
             'rooms'=>'numeric|nullable|sometimes',
             'wc'=>'numeric|nullable|sometimes',
             'space'=>'nullable|sometimes|string',
             'type'=>'required',
             'place_id'=>'required',
             'badge'=>'nullable|sometimes|string',
             'video'=>'nullable|sometimes',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'name'=>trans('admin.name'),
             'des'=>trans('admin.des'),
             'photo'=>trans('admin.photo'),
             'rooms'=>trans('admin.rooms'),
             'wc'=>trans('admin.wc'),
             'space'=>trans('admin.space'),
             'type'=>trans('admin.type'),
             'place_id'=>trans('admin.place_id'),
             'badge'=>trans('admin.badge'),
             'video'=>trans('admin.video'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('photo')){
              it()->delete(Property::find($id)->photo);
              $data['photo'] = it()->upload('photo','properties');
               }
               if(request()->hasFile('video')){
              it()->delete(Property::find($id)->video);
              $data['video'] = it()->upload('video','properties');
               }
              Property::where('id',$id)->update($data);

              $Property = Property::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Property
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
               $properties = Property::find($id);

               it()->delete($properties->photo);
               it()->delete('property',$id);
               it()->delete($properties->video);
               it()->delete('property',$id);

               @$properties->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$properties = Property::find($id);

                    	it()->delete($properties->photo);
                    	it()->delete('property',$id);
                    	it()->delete($properties->video);
                    	it()->delete('property',$id);
                    	@$properties->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $properties = Property::find($data);
 
                    	it()->delete($properties->photo);
                    	it()->delete('property',$data);
                    	it()->delete($properties->video);
                    	it()->delete('property',$data);

                    @$properties->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}