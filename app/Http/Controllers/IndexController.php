<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;


class IndexController extends Controller
{


   public function index(){

      $user =  new User();
      $usersPerDistrict = $user->usersPerDistrict();

        $districtUsers = array();
        $districtLabels = array();
        $districtColors = array();

        foreach ($usersPerDistrict as $data) {
            $districtUsers[] = $data->total;
            $districtLabels[] = "Distrito " . $data->district;
            $districtColors[] = "rgba(" . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ")";

        }

        $districtsReport = app()->chartjs
            ->name('districtsReport')
            ->type('bar')
            ->labels($districtLabels)
            ->datasets([
                [
                    "backgroundColor" => $districtColors,
                    "data" => $districtUsers,
                ],
            ])
            ->options([
                "legend" => [
                    "display" => false,
                ],
                "title" =>
                [
                    "display" => true,
                    "text" => "¿Cuantas usuarios tenemos por distrito?",
                ],
                "scales" => [
                    "yAxes" => [[
                        "ticks" => [
                            "beginAtZero" => true,
                        ],
                    ]],
                ],
            ]);


        
        
        $reportByGender = $user->usersByGender();

        $genderLabels = array();
        $genderTotal = array();
        $genderColors = array();

        foreach ($reportByGender as $data) {
            $genderLabels[] = $data->gender;
            $genderTotal[] = $data->total;
            $genderColors[] = "rgba(" . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ")";

        }

        
        $genderReport = app()->chartjs
            ->name('genderReport')
            ->type('pie')
            ->labels($genderLabels)
            ->datasets([
                [
                    'backgroundColor' => $genderColors,
                    'data' => $genderTotal,
                ],
            ])
            ->optionsRaw("{
                title :{
                    display : true,
                    text : '¿Como estamos en genero?'
                }
            }");



        $specialties = $user->usersPerTypeOfCourse('specialties');

        $specialtiestUsers = array();
        $specialtiesLabels = array();
        $specialtiesColors = array();


        foreach ($specialties as $data) {
            $specialtiestUsers[] = $data->total;
            $specialtiesLabels[] = $data->name;
            $specialtiesColors[] = "rgba(" . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ")";

        }

        $specialtiesReport = app()->chartjs
            ->name('specialtiesReport')
            ->type('bar')
            ->labels($specialtiesLabels)
            ->datasets([
                [
                    "backgroundColor" => $specialtiesColors,
                    "data" => $specialtiestUsers,
                ],
            ])
            ->options([
                "legend" => [
                    "display" => false,
                ],
                "title" =>
                [
                    "display" => true,
                    "text" => "¿Cuantos usuarios tenemos por especialidad?",
                ],
                "scales" => [
                    "yAxes" => [[
                        "ticks" => [
                            "beginAtZero" => true,
                        ],
                    ]],
                ],
            ]);


        $short_courses = $user->usersPerTypeOfCourse('short_courses');

        $short_coursesUsers = array();
        $short_coursesLabels = array();
        $short_coursesColors = array();


        foreach ($short_courses as $data) {
            $short_coursesUsers[] = $data->total;
            $short_coursesLabels[] = $data->name;
            $short_coursesColors[] = "rgba(" . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ")";

        }

        $short_coursesReport = app()->chartjs
            ->name('short_coursesReport')
            ->type('bar')
            ->labels($short_coursesLabels)
            ->datasets([
                [
                    "backgroundColor" => $short_coursesColors,
                    "data" => $short_coursesUsers,
                ],
            ])
            ->options([
                "legend" => [
                    "display" => false,
                ],
                "title" =>
                [
                    "display" => true,
                    "text" => "¿Cuantos usuarios tenemos por cursos cortos?",
                ],
                "scales" => [
                    "yAxes" => [[
                        "ticks" => [
                            "beginAtZero" => true,
                        ],
                    ]],
                ],
            ]);



        $spe = (int) $user->usersTypeOfCourse('specialties')[0]->total;

        

        $sho = (int) $user->usersTypeOfCourse('short_courses')[0]->total;    
    
        $coursesTypeReport = app()->chartjs
            ->name('coursesTypeReport')
            ->type('bar')
            ->labels(['Especialidades', 'Cursos Cortos'])
            ->datasets([
                [
                    "backgroundColor" => [
                        "rgba(" . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ")",
                        "rgba(" . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ")"],
                    "data" => [$spe, $sho],
                ],
            ])
            ->options([
                "legend" => [
                    "display" => false,
                ],
                "title" =>
                [
                    "display" => true,
                    "text" => "¿Cuantos usuarios tenemos por tipo de curso?",
                ],
                "scales" => [
                    "yAxes" => [[
                        "ticks" => [
                            "beginAtZero" => true,
                        ],
                    ]],
                ],
            ]);






      
            return \View::make('home.index', compact('districtsReport', 'genderReport', 'specialtiesReport', 'short_coursesReport', 'coursesTypeReport'));
   }
    

}
