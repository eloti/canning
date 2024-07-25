<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth');

    }

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
      //validate the Data
      $this->validate($request, array(
        'comment' => 'required'
      ));

      //store in the Database
      $comment = new Comment;
      $comment->client_id = $request->client_id;
      $comment->comment = $request->comment;
      $comment->user_id = auth()->user()->id;

      $comment->save();

      $clientredirect = $comment->client_id;

      //redirect
      return redirect()->route('clients.show', ['client' => $clientredirect])->with([
        'success' => 'Comentario Agregado Correctamente.',
        'commentAdded' => true,
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::with('user')->findOrFail($id);
        //return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
 // app/Http/Controllers/CommentController.php

public function edit($id)
{
    $comment = Comment::findOrFail($id);
    return view('clients.comments.edit', compact('comment'));
}

public function destroy($id)
{
    $comment = Comment::findOrFail($id);
    $comment->delete();
    return redirect()->route('clients.show', $comment->client_id)->with('success', 'Comentario borrado exitosamente');
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->comment = $request->input('comment');
        $comment->save();
    
        return redirect()->route('clients.show', $comment->client_id)->with('success', 'Comentario actualizado exitosamente');
    }

}
