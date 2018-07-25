<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Course;

use Datatables;

class UsersController extends Controller {

    public function index(){
      
      return \View::make('users.index');
   }
   public function loadData(){

    $user = new User();
    $ans = $user->getAllUser();
    

    return Datatables::of($ans)
            ->addColumn('action', function ($an) {
                $edit = '<a href="usuarios/editar/'.\Crypt::encrypt($an->id).')" class="btn btn-primary" role="button"><i class="far fa-edit"></i> Editar</a>';

                $delete = '<a href="usuarios/eliminar/'.\Crypt::encrypt($an->id).'" class="btn btn-danger" role="button"><i class="far fa-trash-alt"></i> Eliminar</a>';

                $assign = '<a href="usuarios/asignar/'.\Crypt::encrypt($an->id).'" class="btn btn-success" role="button"><i class="fas fa-clipboard-list"></i> Cursos</a>';
                return ($edit . $delete . $assign);
            })
            ->make(true);
}


   public function create(){
      
      return \View::make('users.create');
   }

   public function store(Request $request) {


        $data = $request->validate([
            'firstname' => 'required_without:lastname|nullable|min:3|max:30',
            'lastname' => 'required_without:firstname|nullable|min:3|max:30',
            'name' => 'required|min:3|max:30',
            'birth_country' => 'required|min:3|max:60',
            'birth_department'=>'required|min:3|max:60',
            'birth_province'=>'required|min:3|max:60',
            'birth_locality'=>'required|min:3|max:60',
            'ci'=>'required|unique:users|min:3|max:30',
            'birthdate'=>'required|date',
            'civil_status'=>'required',
            'gender'=>'required',
            'address_department'=>'required|min:3|max:60',
            'address_province'=>'required|min:3|max:60',
            'address_municipality'=>'required|min:3|max:60',
            'address_locality'=>'required|min:3|max:60',
            'address_zone'=>'required|min:3|max:60',
            'address_street'=>'required|min:3|max:60',
            'address_number'=>'required|min:1',
            'telephone'=>'required|min:3|max:30',
            'cellphone'=>'required|unique:users|min:3|max:30',
            'district'=>'required|min:1|max:30',
            'sons' => 'required|min:0',
            'reference_name'=>'required|min:3|max:120',
            'reference_cellphone'=>'required|min:3|max:30',
            'latitude'=>'required',
            'longitude'=>'required',
        ]);


        try {
            $user = new User();
            $ans = $user->storeNewUser($data);

            if ($ans === true) {
                return redirect('/usuarios');
            } else {
                return redirect()->back()->with('error', 'Ocurrio un error inesperado, re-intente');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrio un error inesperado, re-intente');
        }

    }



    public function edit($id_user) {
        $id_user = \Crypt::decrypt($id_user);
        $user = new User();
        $edit_user = $user->getUserById($id_user);
        return \View::make('users.edit', compact('edit_user'));
   }

   public function update(Request $request) {

        $id_user = \Crypt::decrypt($request->input('id_user'));

        $data = $request->validate([
            'id_user'=> 'required',
            'firstname' => 'required_without:lastname|nullable|min:3|max:30',
            'lastname' => 'required_without:firstname|nullable|min:3|max:30',
            'name' => 'required|min:3|max:30',
            'birth_country' => 'required|min:3|max:60',
            'birth_department'=>'required|min:3|max:60',
            'birth_province'=>'required|min:3|max:60',
            'birth_locality'=>'required|min:3|max:60',
            'ci'=>'required|min:3|max:30|unique:users,ci,' . $id_user,
            'birthdate'=>'required|date',
            'civil_status'=>'required',
            'gender'=>'required',
            'address_department'=>'required|min:3|max:60',
            'address_province'=>'required|min:3|max:60',
            'address_municipality'=>'required|min:3|max:60',
            'address_locality'=>'required|min:3|max:60',
            'address_zone'=>'required|min:3|max:60',
            'address_street'=>'required|min:3|max:60',
            'address_number'=>'required|min:1',
            'telephone'=>'required|min:3|max:30',
            'cellphone'=>'required|min:3|max:30|unique:users,cellphone,'. $id_user,
            'district'=>'required|min:1|max:30',
            'sons' => 'required|min:0',
            'reference_name'=>'required|min:3|max:120',
            'reference_cellphone'=>'required|min:3|max:30',
            'latitude'=>'required',
            'longitude'=>'required',
        ]);

       
        $data['id_user'] = $id_user;

        try {
            $user = new User();
            $ans = $user->updateUser($data);

            if ($ans === true) {
                return redirect('/usuarios');
            } else {
                return redirect()->back()->with('error', 'Ocurrio un error inesperado, re-intente');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrio un error inesperado, re-intente');
        }

    }

    public function destroy($id_user) {

        $id_user = \Crypt::decrypt($id_user);
    
        try {
            $user = new User();
            $ans = $user->deleteUser($id_user);

            if ($ans === true) {
                return redirect('/usuarios');
            } else {
                return redirect()->back()->with('error', 'Ocurrio un error inesperado, re-intente');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrio un error inesperado, re-intente');
        }

    }


    public function assign($id_user) {
        $id_user = \Crypt::decrypt($id_user);
        $course = new Course();

        $specialties = $course->coursesByIdUserAndType($id_user , 'specialties');
        $short_courses = $course->coursesByIdUserAndType($id_user , 'short_courses');


        return \View::make('users.assign', compact('id_user', 'specialties', 'short_courses'));
   }

   public function record(Request $request) {

        $id_user = \Crypt::decrypt($request->input('id_user'));

        $courses = $request->input('courses');


        try {
            $course = new Course();
            $ans = $course->assignCourses($id_user, $courses);
        
            if ($ans === true) {
                return redirect('/usuarios');
            } else {
                return redirect()->back()->with('error', 'Ocurrio un error inesperado, re-intente');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrio un error inesperado, re-intente');
        }

    }
    

}
