<?php
namespace ;
use App\Http\Controllers\Controller;
use App\DataTables\EventsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Event;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class EventsController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(EventsDataTable $events)
            {
               return $events->render('admin.events.index',['title'=>trans('admin.events')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.events.create',['title'=>trans('admin.create')]);
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
             'title'=>'required|string',
             'des'=>'required',
             'date'=>'required|date|date_format:d-m-Y|after:today',
             'time'=>'required',
             'img'=>'required|'.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'title'=>trans('admin.title'),
             'des'=>trans('admin.des'),
             'date'=>trans('admin.date'),
             'time'=>trans('admin.time'),
             'img'=>trans('admin.img'),

              ]);
		
               if(request()->hasFile('img')){
              $data['img'] = it()->upload('img','events');
              }
              Event::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('events'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $events =  Event::find($id);
                return view('admin.events.show',['title'=>trans('admin.show'),'events'=>$events]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $events =  Event::find($id);
                return view('admin.events.edit',['title'=>trans('admin.edit'),'events'=>$events]);
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
             'title'=>'required|string',
             'des'=>'required',
             'date'=>'required|date|date_format:d-m-Y|after:today',
             'time'=>'required',
             'img'=>'required|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'title'=>trans('admin.title'),
             'des'=>trans('admin.des'),
             'date'=>trans('admin.date'),
             'time'=>trans('admin.time'),
             'img'=>trans('admin.img'),
                   ]);
               if(request()->hasFile('img')){
              it()->delete(Event::find($id)->img);
              $data['img'] = it()->upload('img','events');
               }
              Event::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('events'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $events = Event::find($id);

               it()->delete($events->img);
               it()->delete('event',$id);

               @$events->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$events = Event::find($id);

                    	it()->delete($events->img);
                    	it()->delete('event',$id);
                    	@$events->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $events = Event::find($data);
 
                    	it()->delete($events->img);
                    	it()->delete('event',$data);

                    @$events->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}