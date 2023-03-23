<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $articles = Article::select()->paginate(20);

    $currentPageItems = $articles->items();

    $pagination = $articles->appends($request->query());

    return view('article.index', [
      'articles' => $articles,
      'items' => $currentPageItems,
      'pagination' => $pagination,
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function userArticle(Request $request)
  {
    $loggedUser = Auth::User()->id;
    $articles = Article::where('user_id', $loggedUser)->paginate(20);

    $currentPageItems = $articles->items();

    $pagination = $articles->appends($request->query());

    $iconHtml = '<i class="fa-solid fa-xmark text-danger"></i>';


    return view('article.userArticle', [
      'articles' => $articles,
      'items' => $currentPageItems,
      'pagination' => $pagination,
      'icon' => $iconHtml
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('article.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $loggedUser = Auth::User()->id;

    $article = Article::create([
      'title' => $request->title,
      'body' => $request->body,
      'language' => $request->language,
      'user_id' => $loggedUser,
    ]);

    return redirect(route('article.userArticle'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Article $article)
  {
    // $loggedUser = Auth::User()->id;
    $loggedUser = 0;

    return view('article.show', ['article' => $article, 'loggedUser' => $loggedUser]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Article $article)
  {

    return view('article.edit', ['article' => $article]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Article $article)
  {
    $article->update([
      'title' => $request->title,
      'body' => $request->body,
      'language' => $request->language,
    ]);

    return redirect(route('article.userArticle'))->withSuccess('Article mis à jour avec success');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Article $article)
  {
    $article->delete();

    return redirect(route('article.userArticle'));
  }
}