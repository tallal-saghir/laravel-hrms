<?php

namespace App\Http\Controllers;

use App\Models\EmploymentType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeRequest;
use App\Models\Access;
use App\Models\Admin;
use App\Models\Log;
use App\Models\Menu;

class EmploymentTypeController extends Controller
{
    private $employment_type;

    public function __construct()
    {
        $this->middleware('auth');

        $this->employment_type = resolve(EmploymentType::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employment_type = $this->employment_type->paginate();
        return view('pages.employment-type', compact('employment_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employment-type_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreTypeRequest $request)
    {
        EmploymentType::create([
            'name' => $request->input('name'),
        ]);

        Log::create([
            'description' => auth()->user()->employee->name .
                " created an employment type named '" . $request->input('name') . "'"
        ]);

        return redirect()->route('employment-type')
            ->with('status', 'Successfully created an employment type.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmploymentType  $employmentType
     * @return \Illuminate\Http\Response
     */
    public function show(EmploymentType $employmentType)
    {
        return view('pages.employment-type_show', compact('employmentType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmploymentType  $employmentType
     * @return \Illuminate\Http\Response
     */
    public function edit(EmploymentType $employmentType)
    {
        return view('pages.employment-type_edit', compact('employmentType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmploymentType  $employmentType
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTypeRequest $request, EmploymentType $employmentType)
    {

        $employmentType->update([
            'name' => $request->input('name')
        ]);

        Log::create([
            'description' => auth()->user()->employee->name . " updated an employment type named '" . $employmentType->name . "'"
        ]);

        return redirect()->route('employment-type')->with('status', 'Successfully updated employment type.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmploymentType  $employmentType
     * @return \Illuminate\Http\Response
     */

    public function destroy(EmploymentType $employmentType)
    {
        $this->employment_type->where('id', $employmentType->id)->delete();

        Log::create([
            'description' => auth()->user()->employee->name . " deleted an employment type named '" . $employmentType->name . "'"
        ]);

        return redirect()->route('employment-type')
            ->with('status', 'Successfully deleted employment type.');
    }

    public function print()
    {
        $employmentTypes = $this->employment_type->all();
        return view('pages.employment-type_print', compact('employmentTypes'));
    }
}
