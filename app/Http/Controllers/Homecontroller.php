<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function news($cat,$id){
        
            echo 'category is :'.$cat;
            echo '<br>' ;
            echo 'ID is : '.$id;
            return view('others/news');
        
    }

    
}
