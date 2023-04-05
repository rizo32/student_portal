<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function index(Request $request)
  {
    // Use eager loading to reduce the number of database queries
    $documents = Document::paginate(20);

    // Use the `items()` method to get the items for the current page
    $currentPageItems = $documents->items();

    // Use the `appends()` method to add the query string parameters to the pagination links
    $pagination = $documents->appends($request->query());

    return view('document.index', compact('documents', 'currentPageItems', 'pagination', 'request'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Contracts\View\View
   */
  public function create()
  {
    return view('document.create');
  }

  public function edit(Document $document)
  {
    return view('document.edit', compact('document'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Student  $blogPost
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(Request $request, Document $document)
  {
    $document->update([
      'title_en' => $request->title_en,
      'title_fr' => $request->title_fr
    ]);

    return redirect(route('document.userDocument', $document->id))->withSuccess(trans('lang.success'));
  }

  public function show(Document $document)
  {
    $path = $document->path;

    if (!Storage::disk('public')->exists($path)) {
      return redirect()->back()->withErrors(['message' => __('lang.file_not_found')]);
    }

    // Open the file in the browser
    return response()->file(storage_path('app/public/' . $path));
  }

  public function store(CreateDocumentRequest $request)
  {
    $uploadedFile = $request->file('document');

    if (!$uploadedFile->isValid()) {
      return redirect()->back()->withErrors([__('lang.upload_failed')]);
    }

    $originalName = $uploadedFile->getClientOriginalName();

    $loggedUser = Auth::User()->id;

    // Le nom est la concaténation de l'user id avec le titre qu'il a composé. Chaque utilisateur doit donc mettre des noms uniques
    $title = $loggedUser . ($request->title_en ?? $request->title_fr);

    [$path, $format_id] = $this->upload($uploadedFile, $title);

    Document::create([
      'title_en' => $request->title_en,
      'title_fr' => $request->title_fr,
      'user_id' => $loggedUser,
      'path' => $path,
      'format_id' => $format_id,
      'language_id' => $request->language_id,
    ]);

    return redirect(route('document.userDocument'))->withSuccess(trans('lang.success'));
  }

  private function upload($uploadedFile, $title)
  {
    $format = $uploadedFile->getClientOriginalExtension();
    $permitted_formats = array('zip', 'pdf', 'doc');

    $format_id = array_search($format, $permitted_formats) + 1;

    if ($format_id === false) {
      return redirect()->back()->withInput()->withErrors(['format_error' => __('lang.bad_format')]);
    }

    $path = $uploadedFile->storeAs('uploads', $title . '.' . $format, 'public');

    return [$path, $format_id];
  }

  public function userDocument(Request $request)
  {
    $loggedUser = Auth::User()->id;
    $documents = Document::where('user_id', $loggedUser)->paginate(20);

    $currentPageItems = $documents->items();

    $pagination = $documents->appends($request->query());

    $iconHtml = '<i class="fa-solid fa-xmark text-danger"></i>';

    $url = Storage::disk('public')->url('uploads/file.pdf');

    return view('document.userDocument', [
      'documents' => $documents,
      'items' => $currentPageItems,
      'pagination' => $pagination,
      'icon' => $iconHtml
    ]);
  }

  public function download($document)
  {
    $document = Document::findOrFail($document);
    $path = $document->path;

    if (!Storage::disk('public')->exists($path)) {
      return redirect()->back()->withErrors(['message' => __('lang.file_not_found')]);
    }

    return Storage::disk('public')->download($path);
  }

  public function destroy(Document $document)
  {
    // Check if the logged in user is the owner of the document
    $loggedUser = Auth::User()->id;

    if ($document->user_id != $loggedUser) {
      return redirect()->back()->withErrors([__('lang.not_authorized')]);
    }

    // Delete the file from storage
    Storage::disk('public')->delete($document->path);

    // Delete the document from the database
    $document->delete();

    return redirect(route('document.userDocument'))->withSuccess(trans('lang.success'));
  }
}