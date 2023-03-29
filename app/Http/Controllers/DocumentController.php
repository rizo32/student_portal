<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Format;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


  public function store(Request $request)
  {
    $uploadedFile = $request->file('document');

    if (!$uploadedFile->isValid()) {
      return redirect()->back()->withErrors([__('lang.upload_failed')]);
    }

    $originalName = $uploadedFile->getClientOriginalName();
    $loggedUser = Auth::User()->id;

    if ($request->language_id === 1) {
      $title_en = $loggedUser . $request->title;
      if ($request->title_alt) {
        $title_fr = $loggedUser . $request->title_alt;
      }
    } else {
      $title_fr = $loggedUser . $request->title;
      if ($request->title_alt) {
        $title_en = $loggedUser . $request->title_alt;
      }
    }

    $title_en = $request->language_id === 1 ? ($loggedUser . $request->title) : ($request->title_alt ? ($loggedUser . $request->title_alt) : null);

    $title_fr = $request->language_id !== 1 ? ($loggedUser . $request->title) : ($request->title_alt ? ($loggedUser . $request->title_alt) : null);


    // $name = pathinfo($originalName, PATHINFO_FILENAME);
    $format = pathinfo($originalName, PATHINFO_EXTENSION);
    $permitted_formats = array('zip', 'pdf', 'doc');

    $format_id = array_search($format, $permitted_formats);

    if ($format_id === false) {
      return redirect()->back()->withInput()->withErrors(['format_error' => __('lang.bad_format')]);
    }

    $request->validate([
      'document' => 'required',
      'title' => 'required|unique:documents,title',
      'title_alt' => 'unique:documents,title',
    ]);

    $uploadedFile->storeAs('uploads', ($title . '.' . $format), 'public');

    $document = Document::create([
      'title' => $title,
      'user_id' => $loggedUser,
      'path' => 'storage/app/public/uploads/' . $title . '.' . $format,
      'format_id' => $format_id + 1,
      'language_id' => $request->language_id,
    ]);

    return redirect(route('document.userDocument'))->withSuccess('message', 'Upload successful');
  }

  public function userDocument()
  {
    $documents = Document::all();

    return view('document.userDocument', compact('formats', 'languages'));
  }
}