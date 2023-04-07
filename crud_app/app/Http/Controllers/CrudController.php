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

        //return redirect()->route("form.create");
        return redirect('/');
    }

    function editData($id=null)
    {
        //  $editData = Crud::find($id);

        // return view('edit',compact('editData'));
        // return view('edit'.$editData);


        $editData=[];
        //$data['cruds']= DB::table('cruds')->get();
        $editData['crud'] = Crud::find($id);
        return view('edit',$editData);
    }

    function updateData(Request $request,$id)
    {
        $name = $request->post('name');
        $email = $request->post('email');
        $contact_no = $request->post('contact_no');
        $gender = $request->post('gender');
        $qualification = $request->post('qualification');
        $address = $request->post('address');


            $crud = Crud::find($id);
            $crud->name = $name;
            $crud->email = $email;
            $crud->contact_no = $contact_no;
            $crud->gender = $gender;
            $crud->qualification = $qualification;
            $crud->address = $address;
            $crud->save();


        // Crud::firstOrCreate(['name' => $name],['email' => $email],['contact_no' => $contact_no],['gender' => $gender],['qualification' => $qualification],['address' => $address]);

        return redirect('/');
    }


    function deleteData($id=null)
    {

         $deleteData = Crud::find($id);
         $deleteData->delete();
         return redirect('/');

    }


}
