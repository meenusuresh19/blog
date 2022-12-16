<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Str;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $blogs = Blog::get();
        return view('blog.list',compact('blogs')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogs = Blog::get();
        return view('blog.add',compact('blogs')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'InputTitle' => 'required|regex:/^[a-zA-Z0-9 ]+$/i|string|min:3|max:250',
            'InputSubtitle' => 'required',
            'InputImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'InputDescription' => 'required',
        ], [
            'InputTitle.required' => 'Title required',
            'InputTitle.regex' => 'Only alphabets numbers and Spaces allowed',
            'InputSubtitle.required' => 'Subtitle is required',
            'InputImage.required' => 'Image required',
            'InputImage.mimes' => 'Only jpg,png,jpeg,gif,svg are allowed',
            'InputImage.max' => 'Image is too large',
            'InputDescription.required' => 'Description is required',

        ]);
        try {
            $image = $request->file('InputImage'); 
            $image_path = '';
            $i= Carbon::now()->timestamp;
            if (!empty($image)) {
                $new_name = $request->InputTitle.$i.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploaded/image/'), $new_name);
                $uploads_dir = 'public/uploaded/image/';
                $image_path = $new_name;
            }
                $blogs = new Blog();
                $blogs->title = $request->InputTitle;
                $blogs->sub_title = $request->InputSubtitle ;
                $blogs->image = $image_path;
                $blogs->description = $request->InputDescription;
                $blogs->save();
                
                return redirect()->route('admin.blog.index')->with('success','Added successfully.');
        }catch (\Exception $e) {
            
            return back()->with('error','somethingwrong');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Blog::find($id);
        return view('blog.edit',compact('data')) ; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $validated = $request->validate([
            'InputTitle' => 'required|regex:/^[a-zA-Z0-9 ]+$/i|string|min:3|max:250',
            'InputSubtitle' => 'required',
            'InputImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'InputDescription' => 'required',
        ], [
            'InputTitle.required' => 'Title required',
            'InputTitle.regex' => 'Only alphabets numbers and Spaces allowed',
            'InputSubtitle.required' => 'Subtitle is required',
            'InputImage.required' => 'Image required',
            'InputImage.mimes' => 'Only jpg,png,jpeg,gif,svg are allowed',
            'InputImage.max' => 'Image is too large',
            'InputDescription.required' => 'Description is required',

        ]);
        
        try {
                $image = $request->file('InputImage'); 
                $image_path = '';
                $blogs = Blog::find($request->InputId);
                $i= Carbon::now()->timestamp;
                if (!empty($image)) {
                    $new_name = $request->InputTitle.$i.'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('uploaded/image/'), $new_name);
                    $uploads_dir = 'public/uploaded/image/';
                    $image_path = $new_name;
                }
                $blogs->title = $request->InputTitle;
                $blogs->sub_title = $request->InputSubtitle ;
                $blogs->image = $image_path;
                $blogs->description = $request->InputDescription;
                $blogs->save();
                
                return redirect()->route('admin.blog.index')->with('success','Added successfully.');
        }catch (\Exception $e) {
            
            return back()->with('error','somethingwrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return redirect()->route('admin.blog.index')->with('success','Delete successfully.');
    }


    
}
