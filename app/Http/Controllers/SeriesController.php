<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeriesRequest;
use App\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all();
        return view('admin.series.index', compact('series'));
    }

    public function create()
    {
        return view('admin.series.create');
    }

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

    public function uploadSeriesImage(Request $request)
    {
        $uploadedImage = $request->image;

        $request->fileName = str_slug($request->title) . '.' . $uploadedImage->getClientOriginalExtension();

        $uploadedImage->storePubliclyAs(
            'public/series', $request->fileName
        );
    }


    public function show(Series $series)
    {
        return view('admin.series.show')
            ->withSeries($series);
    }

    public function edit(Series $series)
    {
        return view('admin.series.edit')->withSeries($series);
    }

    public function update(Request $request, Series $series)
    {
        if ($request->hasFile('image')) {
            $series->image_url = 'series/' . $this->uploadSeriesImage($request)->fileName;
        }
        $series->title = $request->title;
        $series->description = $request->description;
        $series->slug = str_slug($request->title);

        $series->save();

        session()->flash('success', 'Successfully updated series');
        return redirect()->route('series.index');
    }

    public function destroy(Series $series)
    {
        //
    }
}
