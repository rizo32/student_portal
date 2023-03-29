<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditStudentRequest;
use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;

class StudentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function index(Request $request)
  {
    // Use eager loading to reduce the number of database queries
    $students = Student::with('user')->paginate(20);

    // Use the `items()` method to get the items for the current page
    $currentPageItems = $students->items();

    // Use the `appends()` method to add the query string parameters to the pagination links
    $pagination = $students->appends($request->query());

    // Use a string with the icon HTML instead of generating the HTML in the view
    $iconHtml = '<i class="fa-solid fa-xmark text-danger"></i>';

    return view('student.index', compact('students', 'currentPageItems', 'pagination', 'iconHtml', 'request'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Student  $blogPost
   * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function show(Student $student)
  {
    $student->load('city', 'user');

    return view('student.show', [
      'student' => $student,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Student  $blogPost
   * @return \Illuminate\Contracts\View\View
   */
  public function edit(Student $student)
  {
    $cities = City::all();

    return view('student.edit', [
        'student' => $student->load('city', 'user'),
        'cities' => $cities,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Student  $blogPost
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(EditStudentRequest $request, Student $student)
  {
    $student->update([
      'name' => $request->name,
      'city_id' => $request->city_id,
      'address' => $request->address,
      'birthday' => $request->birthday,
      'phone' => $request->phone
    ]);

    return redirect(route('student.show', $student->user_id))->withSuccess(trans('lang.success'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Student  $blogPost
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Student $student)
  {
    $student->delete();

    return redirect(route('student.index'));
  }
}