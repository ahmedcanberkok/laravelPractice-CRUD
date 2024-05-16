<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use Illuminate\View\View;
use function Symfony\Component\Translation\t;

class EmployeeController extends Controller
{
    protected $employee;

    public function __construct()
    {
        $this->employee = new Employee();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $response['employees'] = $this->employee->all();
        return view('pages.index')->with($response); /*with ile response değişkeni diziye dönüştürülür ve şablona gönderilir.*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response['employees'] = $this->employee->all(); /* tüm çalışan verileri employee'den çağrılır. */
        return view('pages.index')->with($response);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_firstname' => 'required | max:60 | min:3',
            'emp_lastname' => 'required',
            'emp_email' => 'required',
            'emp_phone' => 'required',
            'emp_title' => 'required',
        ]);



        $this->employee->create($request->all());
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $response['employee'] = $this ->employee->find($id);
        return view('pages.edit')->with($response);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employee = $this-> employee->find($id);
        $employee->update(array_merge($employee-> toArray(),$request->toArray()));
        return redirect('employee');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $employee = $this->employee->find($id); /*id bulundu*/
        if ($employee) {
            $employee->delete(); /*id silindi*/
            return redirect('employee'); /* employee ye geri döndü .*/
        } else {
            return back()->withErrors(['message'=>'Employee not found']);
        }

    }
}
