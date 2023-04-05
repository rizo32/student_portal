<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use App\Models\ArticleLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditArticleRequest;

class ArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function index(Request $request)
  {
    $articles = Article::paginate(20);

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
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function create()
  {
    return view('article.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse 
   */
  public function store(CreateArticleRequest $request)
  {
    $loggedUser = Auth::User()->id;

    $article = Article::create([
      'user_id' => $loggedUser,
    ]);

    if ($request->title_en) {
      ArticleLanguage::create([
        'title' => $request->title_en,
        'body' => $request->body_en,
        'language_id' => 1,
        'article_id' => $article['id']
      ]);
    }

    if ($request->title_fr) {
      ArticleLanguage::create([
        'title' => $request->title_fr,
        'body' => $request->body_fr,
        'language_id' => 2,
        'article_id' => $article['id']
      ]);
    }

    return redirect(route('article.userArticle'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function show(Article $article, $language_id)
  {

    $loggedUser = Auth::User()->id;

    return view('article.show', ['article' => $article, 'language_id' => $language_id, 'loggedUser' => $loggedUser]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function edit($article_id, $language_id)
  {
    // Find the ArticleLanguage model based on the article_id and language_id
    $articleLanguage = ArticleLanguage::where('article_id', $article_id)
      ->where('language_id', $language_id)
      ->first();

    return view('article.edit', compact('articleLanguage'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function update(EditArticleRequest $request, $article_id, $language_id)
  {
    $articleLanguage = ArticleLanguage::where('article_id', $article_id)
      ->where('language_id', $language_id);

    $articleLanguage->update([
      'title' => $request->title,
      'body' => $request->body,
    ], ['article_id' => $article_id, 'language_id' => $language_id]);

    return redirect(route('article.userArticle'))->withSuccess(trans('lang.success'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\RedirectResponse 
   */
  public function destroy(Article $article, $language_id)
  {
    $articleLanguage = ArticleLanguage::where('article_id', $article->id)
      ->where('language_id', $language_id);

    $articleLanguage->delete();

    return redirect(route('article.userArticle'));
  }
}