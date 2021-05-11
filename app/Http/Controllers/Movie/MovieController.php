<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Movie\BaseController;
use App\Models\MoviePage;
use App\Models\MovieCategory;
use Illuminate\Http\Request;

class MovieController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = [
            'id',
            'category_id',
            'title',
            'slug',
            'description',
            'link'
        ];

        $paginator = MoviePage::select($fields)
            ->orderBy('id', 'ASC')
            ->with(['category'])
            ->paginate(25);
        //$paginator = MoviePage::paginate();

        //$items = MoviePage::all();
        //dd($paginator);
        return view('movie.pages.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new MoviePage();
        $categoryList = MovieCategory::all();

        return view('movie.pages.edit', compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $item = new MoviePage($data);
        //dd($item);
        $item->save();

        if ($item) {
            return redirect()->route('movie.pages.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
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
        $item = MoviePage::findOrFail($id);
        $categoryList = MovieCategory::all();

        return view('movie.pages.edit',
            compact('item', 'categoryList'));
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
        //dd(__METHOD__,$request->all(),$id);

        $item = MoviePage::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        $result = $item->fill($data)->save();
        //$result = $item->update();

        if ($result) {
            return redirect()
                ->route('movie.pages.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
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
