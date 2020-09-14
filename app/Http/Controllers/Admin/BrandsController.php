<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BrandsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Brand;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class BrandsController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BrandsDataTable $brands)
            {
               return $brands->render('admin.brands.index',['title'=>trans('admin.brands')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.brands.create',['title'=>trans('admin.create')]);
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
             'name'=>'nullable|sometimes|string',
             'logo'=>'required|'.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'logo'=>trans('admin.logo'),

              ]);
		
               if(request()->hasFile('logo')){
              $data['logo'] = it()->upload('logo','brands');
              }
              Brand::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('brands'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $brands =  Brand::find($id);
                return view('admin.brands.show',['title'=>trans('admin.show'),'brands'=>$brands]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $brands =  Brand::find($id);
                return view('admin.brands.edit',['title'=>trans('admin.edit'),'brands'=>$brands]);
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
             'name'=>'nullable|sometimes|string',
             'logo'=>'required|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'logo'=>trans('admin.logo'),
                   ]);
               if(request()->hasFile('logo')){
              it()->delete(Brand::find($id)->logo);
              $data['logo'] = it()->upload('logo','brands');
               }
              Brand::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('brands'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $brands = Brand::find($id);

               it()->delete($brands->logo);
               it()->delete('brand',$id);

               @$brands->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$brands = Brand::find($id);

                    	it()->delete($brands->logo);
                    	it()->delete('brand',$id);
                    	@$brands->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $brands = Brand::find($data);
 
                    	it()->delete($brands->logo);
                    	it()->delete('brand',$data);

                    @$brands->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}