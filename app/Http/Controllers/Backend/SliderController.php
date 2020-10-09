<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all slider form database
        //$data['sliders']=Slider::all();
        //pagination
        $data['sliders']=Slider::paginate(10);
        //get all with order by
        //$data['sliders']=Slider::orderby('creatd_at','desc')->get();
        return view('backend.slider.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        if(!empty($request->file('slider_image'))){
            $path=base_path().'/public/images/slider';
            $image=$request->file('slider_image');
            $name=uniqid().'_'.$image->getClientOriginalName();
            if($image->move($path,$name)){
                $request->request->add(['image'=>$name]);
            }
        }
        $request->request->add(['created_by'=>Auth::user()->id]);
        $id=Slider::create($request->all());
        if ($id){
            $request->session()->flash('success_message','Slider Created Successfully');
            //redirect abck to tag index page
            return redirect()->route('slider.index');
        }else{
            $request->session()->flash('error_message','Slider Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('slider.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get slider by id
        $data['slider']=Slider::find($id);
        return view('backend.slider.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get slider by id
        $data['slider']=Slider::find($id);
        return view('backend.slider.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $slider=Slider::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        if(!empty($request->file('slider_image'))) {
            $path = public_path() . '/images/slider/';
            $image = $request->file('slider_image');
            $name = uniqid() . '_' . $image->getClientOriginalName();
            if ($image->move($path, $name)) {
                if (file_exists($path . $slider->image))
                    unlink($path . $slider->image);

                $request->request->add(['image' => $name]);
            }
        }


            $status=$slider->update($request->all());
        if ($status){
            $request->session()->flash('success_message','Slider Updated Successfully');
        }else{
            $request->session()->flash('error_message','Slider Updated Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get slider id
        $slider=Slider::find($id);
        //delete
        if ($slider->delete()){
            $request->session()->flash('success_message','Slider Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Slider Delete Failed');
        }
        //redirect abck to slider index page
        return redirect()->route('slider.index');
    }
}
