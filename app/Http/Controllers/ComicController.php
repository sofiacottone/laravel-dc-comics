<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        $data = [
            'comics' => $comics,
        ];
        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();

        // server-side data validation
        $validated = $request->validate(
            [
                'title' => 'required|min:5|max:90',
                'description' => 'required|min:5',
                'thumb' => 'required|url',
                'price' => 'required|decimal:2',
                'series' => 'required|max:90',
                'sale_date' => 'required|date',
                'type' => 'required|max:45',
            ],
            [
                'thumb.url' => 'The image url field must contain a valid URL.',
                'sale_date.required' => 'The sale date field is required.',
                'sale_date.date' => 'The sale date is not a valid date.',
            ]
        );

        $newComic = new Comic();

        // use fill() for mass assignment
        $newComic->fill($formData);

        // $newComic->title = $formData['title'];
        // $newComic->description = $formData['description'];
        // $newComic->thumb = $formData['thumb'];
        // $newComic->price = $formData['price'];
        // $newComic->series = $formData['series'];
        // $newComic->sale_date = $formData['sale_date'];
        // $newComic->type = $formData['type'];

        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        $data = [
            'comic' => $comic
        ];
        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        $data = [
            'comic' => $comic
        ];
        return view('comics.edit', $data);
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
        $comic = Comic::findOrFail($id);
        $formData = $request->all();

        // server-side data validation
        $validated = $request->validate(
            [
                'title' => 'required|min:5|max:90',
                'description' => 'required|min:5',
                'thumb' => 'required|url',
                'price' => 'required|decimal:2',
                'series' => 'required|max:90',
                'sale_date' => 'required|date',
                'type' => 'required|max:45',
            ],
            [
                'thumb.url' => 'The image url field must contain a valid URL.',
                'sale_date.required' => 'The sale date field is required.',
                'sale_date.date' => 'The sale date is not a valid date.',
            ]
        );

        $comic->update($formData);

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }

    /**
     * Display a listing of the deleted resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleted()
    {
        $comics = Comic::onlyTrashed()->get();
        $data = [
            'comics' => $comics
        ];
        return view('comics.deleted', $data);
    }

    /**
     * Restore a specified soft deleted resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Comic::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('comics.index');
    }

    /**
     * Permanently delete a specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        Comic::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('comics.index');
    }
}
