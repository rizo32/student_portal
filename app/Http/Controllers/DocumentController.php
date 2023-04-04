<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Format;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Contracts\View\View
   */
  public function create()
  {
    $formats = Format::all();
    $languages = Language::all();

    return view('document.create', compact('formats', 'languages'));
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


  public function store(Request $request)
  {
    $uploadedFile = $request->file('document');

    if (!$uploadedFile->isValid()) {
      return redirect()->back()->withErrors([__('lang.upload_failed')]);
    }

    $originalName = $uploadedFile->getClientOriginalName();
    $loggedUser = Auth::User()->id;

    // Le nom est la concaténation de l'user id avec le titre qu'il a composé. Chaque utilisateur doit donc mettre des noms uniques
    $title = $loggedUser . ($request->title_en ?? $request->title_fr);

    // $name = pathinfo($originalName, PATHINFO_FILENAME);
    $format = pathinfo($originalName, PATHINFO_EXTENSION);
    $permitted_formats = array('zip', 'pdf', 'doc');

    $format_id = array_search($format, $permitted_formats);

    if ($format_id === false) {
      return redirect()->back()->withInput()->withErrors(['format_error' => __('lang.bad_format')]);
    }

    $request->validate([
      'document' => 'required',
      'title_en' => 'required_without:title_fr|unique:documents,title_en',
      'title_fr' => 'required_without:title_en|unique:documents,title_fr'
    ]);

    $uploadedFile->storeAs('uploads', $title . '.' . $format, 'public');

    $document = Document::create([
      'title_en' => $request->title_en,
      'title_fr' => $request->title_fr,
      'user_id' => $loggedUser,
      'path' => 'uploads/' . $title . '.' . $format,
      'format_id' => $format_id + 1,
      'language_id' => $request->language_id,
    ]);

    return redirect(route('document.userDocument'))->withSuccess(trans('lang.success'));
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
}