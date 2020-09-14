<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\AddLabelRequest;
use App\Label;
use danielme85\CConverter\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Lang;

class LabelsController extends Controller
{

    private $lang = '';
    private $file;
    private $key;
    private $value;
    private $pathEn;
    private $pathAr;
    private $arrayLang = array();
    private $arrayAr = array();
    private $arrayEn = array();


    public function __construct()
    {
        $this->file = 'admin';
        $this->pathEn = base_path().'/resources/lang/en/'.$this->file.'.php';
        // $this->pathAr = base_path().'/resources/lang/ar/'.$this->file.'.php';
        // $this->pathAr = resource_path("lang/ar/'.$this->file.'.php", 0777, true);
        // $this->pathEn = resource_path("lang/en/'.$this->file.'.php", 0777, true);
        
        // $this->file = 'labels';
        //  $this->middleware(['permission:translation'],['only'=>['index']]);
    }

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        //To convert a value
        //        $valueNOK = Currency::conv($from = 'USD', $to = 'NOK', $value = 10, $decimals = 2);
        //
        ////To convert a value based on historical data
        //        $valueNOK = Currency::conv($from = 'USD', $to = 'NOK', $value = 10, $decimals = 2, $date = '2018-12-24');
        //
        ////to get an array of all the rates associated to a base currency.
        //        $rates_usd = Currency::rates(); //defaults to USD
        //
        //        $rates_nok = Currency::rates('NOK');
        //
        ////Get historical rates
        //        $rates__nok_historical = Currency::rates('NOK', '2018-12-24');
        //
        //        $rates_usd = Currency::rates('NOK');
        //
        ////Get historical rates
        //        $rates_nok_historical = Currency::rates('NOK', '2018-12-24');
        //
        //        dd($valueNOK,$valueNOK,$rates_usd,$rates_nok,$rates_nok_historical);

        // shell_exec('chcon -R -t httpd_sys_rw_content_t lang
        //             sudo find ./lang -type f -exec chmod 666 {} \;
        //             sudo find ./lang -type d -exec chmod 777 {} \;');
        $labels = collect(trans('admin'));

        $locale = session()->get('locale');
        $this->setLocale('en');
        $this->read('en');

        // $this->setLocale('ar');
        // $this->read('ar');
        foreach ($this->arrayEn as $key => $value) {
            $this->arrayLang[$key] = [
                // 'ar' => isset($this->arrayAr[$key]) ? $this->arrayAr[$key] : ''  ,
                'en' => $value,
            ]  ;
        }
        $this->setLocale($locale);
        session()->put(['locale' => $locale]);
        // $this->arrayLang['key'] = 
        // dd( $this->arrayLang);
        unset($labels['new_label']);
        $arrayLang = $this->arrayLang;
        return view('admin.labels.index', compact('labels' , 'arrayLang') ,['title'=>trans('admin.translate')]);
    }
   


    //------------------------------------------------------------------------------
    // Read lang file content
    //------------------------------------------------------------------------------

    private function read($lang = 'en') 
    {
        
        if($lang == 'ar'){
            $this->arrayAr = Lang::get($this->file);
            if (gettype($this->arrayAr) == 'string') $this->arrayAr = array();
        }else{

            $this->arrayEn = Lang::get($this->file);
            if (gettype($this->arrayEn) == 'string') $this->arrayEn = array();
        }

    }

    private function setLocale($lang = 'en') 
    {
        app()->setLocale($lang);
        session()->put(['locale' => $lang]);

    }

    private function saveEn() 
    {
        $content = "<?php\n\nreturn\n[\n";

        foreach ($this->arrayLang as $key => $value) 
        {
            $content .= "\t'".$key."' => '".$value['en']."',\n";
        }

        $content .= "];";
        
        file_put_contents($this->pathEn, $content);
    }


    private function saveAr() 
    {
        $content = "<?php\n\nreturn\n[\n";

        foreach ($this->arrayLang as $key => $value) 
        {
            $content .= "\t'".$key."' => '".$value['ar']."',\n";
        }

        $content .= "];";
        
        file_put_contents($this->pathAr, $content);
    }
    

    /**
     * Show the form for creating a settings resource.
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
        $rules = [
            'name' => 'required',
            'value_en' => 'required',
            // 'value_ar' => 'required',
        ];
        $data = $this->validate(request(),$rules,[],[
            'value_en'=>trans('admin.value_en'),
            // 'value_ar'=>trans('admin.value_ar'),
            'name'=>trans('admin.name'),
        ]);
   


             // chmod($this->pathEn,0666);
        // chmod($this->pathEn,0777);
        // chmod($this->pathEn,0666);
        // chmod($this->pathAr,0777);
        $locale = session()->get('locale');
        $this->setLocale('en');
        $this->read('en');

        // $this->setLocale('ar');
        // $this->read('ar');
        foreach ($this->arrayEn as $key => $value) {
            $this->arrayLang[$key] = [
                // 'ar' => isset($this->arrayAr[$key]) ? $this->arrayAr[$key] : ''  ,
                'en' => $value,
            ]  ;
        }
        $this->setLocale($locale);

        $this->arrayLang[request()->name] = [
            // 'ar' => request()->value_ar ? request()->value_ar : '' ,
            'en' => request()->value_en ? request()->value_en : '',
        ];

        $this->saveEn();
        // $this->saveAr();

        // value_en
        // value_ar
        // $languages = [
        //     'en',
        //     'ar'
        // ];
        
        // foreach ($languages as $language) {

        //     $request_request = strtolower($request->name);
        //     $request_value = ucwords($request->value);

        //     file_put_contents(
                // resource_path("lang/" . $language . "/labels.php", 0777, true),

        //         str_replace(
        //             "'new_label'=>'new_label'",
        //             "'{$request_request}'=>'{$request_value}',\n'new_label'=>'new_label'",
        //             file_get_contents(resource_path("lang/" . $language . "/labels.php"))
        //         )
        //     );
        // }

        session()->flash('success', 'Label added successfully.');

        return back();
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
    public function edit($label_key)
    {
        // 

        
        $locale = session()->get('locale');
        $this->setLocale('en');
        $this->read('en');

        // $this->setLocale('ar');
        // $this->read('ar');
        foreach ($this->arrayEn as $key => $value) {
            $this->arrayLang[$key] = [
                // 'ar' => isset($this->arrayAr[$key]) ? $this->arrayAr[$key] : ''  ,
                'en' => $value,
            ]  ;
        }
        
        $this->setLocale($locale);
        $label_value = $this->arrayLang[$label_key];
        // dd($label_value);
        return response()->json([
            'name' => $label_key,
            // 'valueAr' => $label_value['ar'],
            'valueEn' => $label_value['en']
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddLabelRequest $request, $label_value)
    {

        $language = session()->get('locale');

        // dd($label_value , $request->value);
        file_put_contents(
            resource_path("lang/" . $language . "/labels.php"),

            str_replace(
                $label_value,
                $request->value,
                file_get_contents(resource_path("lang/" . $language . "/labels.php"))
            )
        );

        session()->flash('success', 'Label updated successfully.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        if ($label->delete()) {
            session()->flash('success', 'Label deleted successfully.');
        } else {
            session()->flash('error', 'error occurred with deleting label.');
        }
        return back();
    }
}
