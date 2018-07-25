<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

   public function storeNewUser($data)
    {
        try {
            \DB::beginTransaction();

            $id_user = \DB::table('users')->insertGetId(
                [
                  'firstname' => $data['firstname'],
                  'lastname' => $data['lastname'],
                  'name' => $data['name'],
                  'birth_country' => $data['birth_country'],
                  'birth_department'=>$data['birth_department'],
                  'birth_province'=>$data['birth_province'],
                  'birth_locality'=>$data['birth_locality'],
                  'ci'=>$data['ci'],
                  'birthdate'=>$data['birthdate'],
                  'civil_status'=>$data['civil_status'],
                  'gender'=>$data['gender'],
                  'address_department'=>$data['address_department'],
                  'address_province'=>$data['address_province'],
                  'address_municipality'=>$data['address_municipality'],
                  'address_locality'=>$data['address_locality'],
                  'address_zone'=>$data['address_zone'],
                  'address_street'=>$data['address_street'],
                  'address_number'=>$data['address_number'],
                  'telephone'=>$data['telephone'],
                  'cellphone'=>$data['cellphone'],
                  'reference_name'=>$data['reference_name'],
                  'reference_cellphone'=>$data['reference_cellphone'],
                  'district'=>$data['district'],
                  'sons'=>$data['sons'],
                  'latitude'=>$data['latitude'],
                  'longitude'=>$data['longitude'],
                ]
            );

            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            return $e->getMessage();
        }

    }



    public function getAllUser()
    {
        try {
            $user = \DB::select(
                \DB::raw("select U.id, U.ci, (U.name ||' '|| COALESCE(U.firstname, '') ||' '|| COALESCE(U.lastname, '')) as name, U.cellphone, (select count(*) from users_courses where id_user = U.id) as total from users U;")
            );
            return collect($user);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function usersByGender()
    {
        try {
            $user = \DB::select(
                \DB::raw("select gender, count(*) as total from users group by gender;")
            );
            return collect($user);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function usersPerTypeOfCourse($type)
    {
        try {
            $user = \DB::select(
                \DB::raw("select C.name, (select count(UC.*) from users_courses UC where UC.id_course = C.id ) as total from courses C where C.type = '".$type."' and C.state = true;")
            );
            return collect($user);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }


    public function usersTypeOfCourse($type)
    {
        try {
            $user = \DB::select(
                \DB::raw("SELECT SUM( A.total ) as total FROM	(SELECT 	( SELECT COUNT ( UC.* ) AS total FROM users_courses UC WHERE id_course = C.ID)  FROM 	courses C  WHERE 	C.TYPE = '".$type."'  	AND C.STATE = TRUE 	) A;")
            );
            return collect($user);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }





    public function getUserById($id_user) {
        try {
            $user = \DB::select(
                \DB::raw("select U.* from users U where U.id = '".$id_user."';")
            );
            return collect($user);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function usersPerDistrict() {
        try {
            $user = \DB::select(
                \DB::raw("select district, count(*) as total from users group by district order by district asc;")
            );
            return collect($user);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    


    public function updateUser($data)
    {

        try {
            \DB::beginTransaction();

            \DB::table('users')
                ->where('id', $data['id_user'])
                ->update([
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'name' => $data['name'],
                    'birth_country' => $data['birth_country'],
                    'birth_department'=>$data['birth_department'],
                    'birth_province'=>$data['birth_province'],
                    'birth_locality'=>$data['birth_locality'],
                    'ci'=>$data['ci'],
                    'birthdate'=>$data['birthdate'],
                    'civil_status'=>$data['civil_status'],
                    'gender'=>$data['gender'],
                    'address_department'=>$data['address_department'],
                    'address_province'=>$data['address_province'],
                    'address_municipality'=>$data['address_municipality'],
                    'address_locality'=>$data['address_locality'],
                    'address_zone'=>$data['address_zone'],
                    'address_street'=>$data['address_street'],
                    'address_number'=>$data['address_number'],
                    'telephone'=>$data['telephone'],
                    'cellphone'=>$data['cellphone'],
                    'reference_name'=>$data['reference_name'],
                    'reference_cellphone'=>$data['reference_cellphone'],
                    'district'=>$data['district'],
                    'sons'=>$data['sons'],
                    'latitude'=>$data['latitude'],
                    'longitude'=>$data['longitude'],
                ]);

            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            return $e->getMessage();
        }
    }


    public function deleteUser($id_user)
    {
        try {
            \DB::beginTransaction();

            \DB::table('users')->where('id', '=', $id_user)->delete();

            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            return $e->getMessage();
        }

    }


}