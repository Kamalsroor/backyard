<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\PlacesDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Place;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class PlacesController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(PlacesDataTable $places)
            {
               return $places->render('admin.places.index',['title'=>trans('admin.places')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.places.create',['title'=>trans('admin.create')]);
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
             'name'=>'required|string|max:250',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),

              ]);
		
              Place::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('places'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $places =  Place::find($id);
                return view('admin.places.show',['title'=>trans('admin.show'),'places'=>$places]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $places =  Place::find($id);
                return view('admin.places.edit',['title'=>trans('admin.edit'),'places'=>$places]);
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
             'name'=>'required|string|max:250',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
                   ]);
              Place::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('places'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $places = Place::find($id);


               @$places->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$places = Place::find($id);

                    	@$places->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $places = Place::find($data);
 

                    @$places->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}