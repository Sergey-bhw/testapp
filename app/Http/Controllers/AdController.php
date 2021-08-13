<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImageUploadController;
use App\Models\Ad as Ad;
use Illuminate\Support\Facades\Validator;
use DB;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        $order = $request->input('order');
        $order = ($order == 'desc' ? $order : 'asc');
        if($sort == 'title'){
            $ads = DB::table('ads')->orderBy('title', $order)->paginate(2);
        }else if($sort == 'date'){
            $ads = DB::table('ads')->orderBy('created_at', $order)->paginate(2);
        }else{ //default DATE ASC
            $ads = DB::table('ads')->orderBy('created_at', $order)->paginate(2);
        }
        $ads->appends(['sort' => $sort, 'order' => $order])->links();
        return view('home', compact('ads', 'sort', 'order'));
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
        if(!Auth::check()) abort(403, 'Unauthorized action.');
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:1023',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $id = Auth::id();
        $ad = new Ad;
        $ad->author_id = $id;
        $ad->title = $request->name;
        $ad->description = $request->description;
        $photos = [];
        if ($request->hasFile('photo1')) {
            $ext = $request->file('photo1')->extension();
            $photos[] = $request->file('photo1')->storeAs('public', uniqid('', true) . '.' . $ext);
        }
        if ($request->hasFile('photo2')) {
            $ext = $request->file('photo2')->extension();
            $photos[] = $request->file('photo2')->storeAs('public', uniqid('', true) . '.' . $ext);
        }
        if ($request->hasFile('photo3')) {
            $ext = $request->file('photo3')->extension();
            $photos[] = $request->file('photo3')->storeAs('public', uniqid('', true) . '.' . $ext);
        }
        $ad->photos = json_encode($photos);
        $ad->save();

        return redirect('/');
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
        $ad = DB::table('ads')->where('id', $id)->first();
        $user_id = Auth::id();
        if($user_id != $ad->author_id) abort(403, 'Unauthorized action.');
        return view('editad', [
            'ad' => $ad
        ]);
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
        if(!Auth::check()) abort(403, 'Unauthorized action.');
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:1023',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $user_id = Auth::id();
        $ad = Ad::find($id);
        if($user_id != $ad->author_id) abort(403, 'Unauthorized action.');
        $ad->title = $request->name;
        $ad->description = $request->description;
        $ad->save();

        return redirect('/');
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
