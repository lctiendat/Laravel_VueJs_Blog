<?php

namespace App\Http\Controllers;

use App\Models\NewsType;
use Illuminate\Http\Request;

class NewsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        return response()->json(NewsType::all());
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
        $newsType = NewsType::create($request->all());
        return response()->json(
            [
                'message'=>'Newstype được tạo thành công. Chuyển hướng sau 2 giây',
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsType  $newsType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return response()->json(NewsType::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsType  $newsType
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsType $newsType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsType  $newsType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newsType = NewsType::find($id);
        $newsType->update($request->all());
        return response()->json([
            'message'=>'Cập nhật Newstype thành công. Chuyển hướng sau 2 giây .',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsType  $newsType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NewsType::find($id)->delete();
        return response()->json([
            'message' => 'Xoá Newstype thành công.',
        ]);
    }
}
