<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; 

class EmployeeController extends Controller
{
    public function index()
{
    $employees = Employee::all();
    return view('employee', compact('employees'));
}

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|unique:employees,phone,',
            'role' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->role = $request->role;
        $employee->phone = $request->phone;


        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $employee->photo = $name;
        }

        $employee->save();

        return redirect()->route('employee')->with('success','Employee added successfully.');
    }


    public function destroy(Employee $employee)
        {
            $employee->delete();
            return redirect()->route('employee')->with('success', 'Employee deleted successfully.');
        }


        public function edit(Employee $employee)
        {
            return view('edit', compact('employee'));
        }
        
        public function update(Request $request, Employee $employee)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:employees,email,' . $employee->id,
                'role' => 'required',
                'phone' => 'required|unique:employees,phone,' . $employee->id,
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
            ], [
                'email.unique' => 'The email address has already been taken.',
                'phone.unique' => 'The phone number has already been taken.'
            ]);
            
        
            $data = $request->only(['name', 'email', 'role', 'phone']);
        
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $fileName);
                $data['photo'] = $fileName;
            }
        
            $employee->update($data);
        
            return redirect()->route('employee')->with('success', 'Employee updated successfully.');
        }
        

}
