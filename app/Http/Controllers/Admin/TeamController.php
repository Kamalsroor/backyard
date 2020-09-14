<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\TeamDataTable;
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
class TeamController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(TeamDataTable $team)
            {
               return $team->render('admin.team.index',['title'=>trans('admin.team')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.team.create',['title'=>trans('admin.create')]);
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
             'jop'=>'required|string',
             'phone'=>'required|string',
             'email'=>'nullable|sometimes',
             'facebook'=>'url|nullable|sometimes',
             'instgram'=>'url|nullable|sometimes',
             'linkedin'=>'url|nullable|sometimes',
             'image'=>'required|'.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'jop'=>trans('admin.jop'),
             'phone'=>trans('admin.phone'),
             'email'=>trans('admin.email'),
             'facebook'=>trans('admin.facebook'),
             'instgram'=>trans('admin.instgram'),
             'linkedin'=>trans('admin.linkedin'),
             'image'=>trans('admin.image'),

              ]);
		
               if(request()->hasFile('image')){
              $data['image'] = it()->upload('image','team');
              }
              Team::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('team'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $team =  Team::find($id);
                return view('admin.team.show',['title'=>trans('admin.show'),'team'=>$team]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $team =  Team::find($id);
                return view('admin.team.edit',['title'=>trans('admin.edit'),'team'=>$team]);
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
             'jop'=>'required|string',
             'phone'=>'required|string',
             'email'=>'nullable|sometimes',
             'facebook'=>'url|nullable|sometimes',
             'instgram'=>'url|nullable|sometimes',
             'linkedin'=>'url|nullable|sometimes',
             'image'=>'required|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'jop'=>trans('admin.jop'),
             'phone'=>trans('admin.phone'),
             'email'=>trans('admin.email'),
             'facebook'=>trans('admin.facebook'),
             'instgram'=>trans('admin.instgram'),
             'linkedin'=>trans('admin.linkedin'),
             'image'=>trans('admin.image'),
                   ]);
               if(request()->hasFile('image')){
              it()->delete(Team::find($id)->image);
              $data['image'] = it()->upload('image','team');
               }
              Team::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('team'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
               session()->flash('success',trans('admin.deleted'));
               return back();
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
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $team = Team::find($data);
 
                    	it()->delete($team->image);
                    	it()->delete('team',$data);

                    @$team->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}