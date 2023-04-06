<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Crud;


class CrudController extends Controller
{
    function main()
    {
        return view('welcome');
    }

    function index()
    {
        return view('index');
    }

    function fetch()
    {
        $data=[];
        //$data['cruds']= DB::table('cruds')->get();
        $data['crud'] = Crud::all();
        return view('fetch',$data);
    }

    function showData()
    {
        return DB::table('cruds')->get();
    }

    function mTest()
    {
        $users = Crud::all();
        return $users;
    }

    function displayForm()
    {

        return view('form');
    }

    function saveForm(Request $request)
    {
        $name = $request->post('name');
        $email = $request->post('email');
        $contact_no = $request->post('contact_no');
        $gender = $request->post('gender');
        $qualification = $request->post('qualification');
        $address = $request->post('address');

        if (Crud::whereEmail($email)->count() == 0) {
            $crud = new Crud();
            $crud->name = $name;
            $crud->email = $email;
            $crud->contact_no = $contact_no;
            $crud->gender = $gender;
            $crud->qualification = $qualification;
            $crud->address = $address;
            $crud->save();
        }

        // Crud::firstOrCreate(['name' => $name],['email' => $email],['contact_no' => $contact_no],['gender' => $gender],['qualification' => $qualification],['address' => $address]);

        return redirect()->route("form.create");
    }
}
