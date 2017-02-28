<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    protected $view;

    public $model;

    public function __construct(News $model)
    {
        $this->view = 'backend.news.';
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = $this->model->all();
        return view($this->view.'index',[
            'lists'=>$lists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->model;
        $formMethod = '';
        $formRoute = 'news.store';
        return view($this->view.'form',[
            'model'=>$model,
            'formMethod'=>$formMethod,
            'formRoute'=>$formRoute,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Backend\NewsRequest $request)
    {
        $gambar = $request->file('gambar');
        $inputs = $request->all();
        if(!empty($gambar))
        {
            $path = public_path();
            $gambarName = str_random(6).'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path,$gambarName);
            $inputs['gambar']=$gambarName;
        }

        $insert = $this->model->create($inputs);

        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        $formMethod = 'PATCH';
        $formRoute = ['news.update',$model->id];
        return view($this->view.'form',[
            'model'=>$model,
            'formMethod'=>$formMethod,
            'formRoute'=>$formRoute,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\Backend\NewsRequest  $request, $id)
    {
        $model = $this->model->findOrFail($id);
        $gambar = $request->file('gambar');
        $inputs = $request->all();
        $gambarName = $model->gambar;
        if(!empty($gambar))
        {
            $path = public_path();
            $gambarName = str_random(6).'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path,$gambarName);
            $inputs['gambar']=$gambarName;
        }
        $inputs['gambar']=$gambarName;
        
        $insert = $model->update($inputs);

        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);

        @unlink(public_path($model->gambar));

        $model->delete();

        return redirect(route('news.index'));
    }
}
