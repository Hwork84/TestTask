<?php

namespace App\Http\Controllers;

use App\Models\publication;
use App\Http\Requests\StorepublicationRequest;
use App\Http\Requests\UpdatepublicationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class PublicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepublicationRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function store(StorepublicationRequest $request)
    {

        if(Auth::user()->is_admin){
            if($request->input('id') != NULL) {
                DB::table('publications')
                    ->where('id', $request->input('id'))
                    ->limit(1)
                    ->update(array('publication_title' => $request->input('pub_title'),"publication_text" => $request->input('pub_text')));
                return redirect()->route('home');
            } else {
                $pub_title = $request->input('pub_title');
                $pub_text = $request->input('pub_text');
                $data = array('users_id' => Auth::user()->id, 'publication_title' => $pub_title, "publication_text" => $pub_text);
                DB::table('publications')->insert($data);
                return redirect()->route('home');
            }
        } else {
            return view('welcome');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Requests\  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $pub = DB::table('publications')->where('id', $id)->first();
        if ($pub === null) {
            return view('welcome');
        }
        return view('show')->with('posts', $pub);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Requests\  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->is_admin){
            $pub = DB::table('publications')->where('id', $id)->first();
            if ($pub === null) {
                return view('welcome');
            }
            return view('edit')->with('posts', $pub);
        } else {
            return view('welcome');
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\ $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(Auth::user()->is_admin){
            DB::table('publications')->where('id', $id)->delete();
        }
        return redirect()->route('home');
    }
}
