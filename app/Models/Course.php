<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

   public function assignCourses($id_user, $courses)
    {
        try {
            \DB::beginTransaction();

            \DB::table('users_courses')->where('id_user', '=', $id_user)->delete();

            if(count($courses) > 0 ){
                foreach ($courses as $key => $course) {
               \DB::table('users_courses')->insert(
                  [
                     'id_user' => $id_user,
                     'id_course' => \Crypt::decrypt($course)
                  ]
               );
            }
            }

            

            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            return $e->getMessage();
        }

    }



    public function coursesByIdUserAndType($id_user, $type) {
        try {
            $user = \DB::select(
                \DB::raw("SELECT  C.id, C.name, C.center, (select exists(select id_course from users_courses where id_course = C.id and id_user = '".$id_user."')) assign FROM courses C WHERE C.type = '".$type."' AND C.state = true;")
            );
            return collect($user);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

   




}