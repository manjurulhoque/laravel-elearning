<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeriesRequest;
use App\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSeriesRequest $request)
    {
        $this->uploadSeriesImage($request);
        $series = $this->storeSeries($request);
        session()->flash('success', 'Series created successfully.');
        return redirect()->route('series.show', $series->slug);
    }

    public function storeSeries(CreateSeriesRequest $request)
    {
        $series = Series::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'image_url' => 'series/' . $request->fileName
        ]);
        return $series;
    }

    public function uploadSeriesImage(CreateSeriesRequest $request)
    {
        $uploadedImage = $request->image;

        $request->fileName = str_slug($request->title) . '.' . $uploadedImage->getClientOriginalExtension();

        $uploadedImage->storePubliclyAs(
            'public/series', $request->fileName
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
