<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
   public function home(){
    return "This is home method";
   }
   public function contact(){
    return "This is contact method";
   }
   public function about(){
    return "This is about method";
   } 
}
