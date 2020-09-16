<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AboutDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\About;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class AboutController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(AboutDataTable $about)
            {
               return $about->render('admin.about.index',['title'=>trans('admin.about')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.about.create',['title'=>trans('admin.create')]);
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
             'des'=>'required|string',
             'photo'=>'required|'.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'des'=>trans('admin.des'),
             'photo'=>trans('admin.photo'),

              ]);
		
               if(request()->hasFile('photo')){
              $data['photo'] = it()->upload('photo','about');
              }
              About::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('about'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $about =  About::find($id);
                return view('admin.about.show',['title'=>trans('admin.show'),'about'=>$about]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $about =  About::find($id);
                return view('admin.about.edit',['title'=>trans('admin.edit'),'about'=>$about]);
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
             'des'=>'required|string',
             'photo'=>'nullable|sometimes|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'des'=>trans('admin.des'),
             'photo'=>trans('admin.photo'),
                   ]);
               if(request()->hasFile('photo')){
              it()->delete(About::find($id)->photo);
              $data['photo'] = it()->upload('photo','about');
               }
              About::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('about'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $about = About::find($id);

               it()->delete($about->photo);
               it()->delete('about',$id);

               @$about->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$about = About::find($id);

                    	it()->delete($about->photo);
                    	it()->delete('about',$id);
                    	@$about->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $about = About::find($data);
 
                    	it()->delete($about->photo);
                    	it()->delete('about',$data);

                    @$about->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}