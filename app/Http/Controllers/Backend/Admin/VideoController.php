<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.video.index');
    }

    /**
     * Show the form for creating a new resource.
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
        
        $video = Video::find($id);
        
              
            if ($request->hasFile('video')) {
               if ($request->file('video')->isValid()) {
                  $destinationPath = public_path('assets/images/videos/');
                  $extension = $request->file('video')->getClientOriginalExtension();
                  $fileName = time() . '0' . '.' . $extension;
                  $file_path_0 = 'assets/images/videos/' . $fileName;
                  $request->file('video')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }
            
            DB::beginTransaction();
            try {
                if(empty($video))
                {
                    $video = new Video();
                    if(!empty($file_path_0)){
                        $video->name = $file_path_0;                
                        }
                    $video->save();
                }else{
                    if(!empty($file_path_0)){
                    $video->name = $file_path_0;                
                   }
                   $video->save();
                }
               DB::commit();
               return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);

            } catch (\Exception $e) {
               DB::rollback();
               return response()->json(['type' => 'error', 'message' => $e->getMessage()]);
            }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
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
        //
    }
}
