<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\User;

class UserController extends Controller
{
    public function downloadExcel(){
    	$user = User::all()->toArray();
    	Excel::create('TestReport', function($excel) use ($user)  {

            // Set the title
            $excel->setTitle('My awesome report 2016');

            // Chain the setters
            $excel->setCreator('Me')->setCompany('Our Code World');

            $excel->setDescription('A demonstration to change the file properties');

            //$data = [12,"Hey",123,4234,5632435,"Nope",345,345,345,345];

            $excel->sheet('Sheet 1', function ($sheet) use ($user) {
                $sheet->setOrientation('landscape');
                $sheet->fromArray($user, NULL, 'A1');
            });

        })->download('xlsx');
    }
}
