<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\PropertiesDataTable;
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
class PropertiesController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(PropertiesDataTable $properties)
            {
               return $properties->render('admin.properties.index',['title'=>trans('admin.properties')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.properties.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
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
             'address'=>'nullable|sometimes|string',
             'type'=>'required',
             'place_id'=>'required',
             'badge'=>'nullable|sometimes|string',
             'video'=>'nullable|sometimes',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'des'=>trans('admin.des'),
             'photo'=>trans('admin.photo'),
             'rooms'=>trans('admin.rooms'),
             'wc'=>trans('admin.wc'),
             'space'=>trans('admin.space'),
             'address'=>trans('admin.address'),
             'type'=>trans('admin.type'),
             'place_id'=>trans('admin.place_id'),
             'badge'=>trans('admin.badge'),
             'video'=>trans('admin.video'),

              ]);
		
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','properties');
              }
               if(request()->hasFile('video')){
              $data['video'] = it()->upload('video','properties');
              }
              Property::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('properties'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $properties =  Property::find($id);
                return view('admin.properties.show',['title'=>trans('admin.show'),'properties'=>$properties]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $properties =  Property::find($id);
                return view('admin.properties.edit',['title'=>trans('admin.edit'),'properties'=>$properties]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
             'address'=>'nullable|sometimes|string',
             'type'=>'required',
             'place_id'=>'required',
             'badge'=>'nullable|sometimes|string',
             'video'=>'nullable|sometimes',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'des'=>trans('admin.des'),
             'photo'=>trans('admin.photo'),
             'rooms'=>trans('admin.rooms'),
             'wc'=>trans('admin.wc'),
             'space'=>trans('admin.space'),
             'address'=>trans('admin.address'),
             'type'=>trans('admin.type'),
             'place_id'=>trans('admin.place_id'),
             'badge'=>trans('admin.badge'),
             'video'=>trans('admin.video'),
                   ]);
               if(request()->hasFile('photo')){
              it()->delete(Property::find($id)->photo);
              $data['photo'] = it()->upload('photo','properties');
               }
               if(request()->hasFile('video')){
              it()->delete(Property::find($id)->video);
              $data['video'] = it()->upload('video','properties');
               }
              Property::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('properties'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
               session()->flash('success',trans('admin.deleted'));
               return back();
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
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $properties = Property::find($data);
 
                    	it()->delete($properties->photo);
                    	it()->delete('property',$data);
                    	it()->delete($properties->video);
                    	it()->delete('property',$data);

                    @$properties->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}