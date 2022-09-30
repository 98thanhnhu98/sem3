<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class SearchController extends Controller
{
    public function search(Request $request){

        if($request->ajax()){
            // ->orwhere('title','like','%'.$request->search.'%')
            $book= Books::where('title','like','%'.$request->search.'%')->get();
            $output='';
            if(count($book)>0){
                $output ='
            <table class="table">
            <thead>
            <tr>    
                <th scope="col">Title</th>
                <th scope="col">Authorid</th>
                <th scope="col">ISBN</th>
                <th scope="col">Public Year</th>
                <th scope="col">Aviable</th>
            </tr>
            </thead>
            <tbody>';

                foreach($book as $books){
                    $output .='
                    <tr>
                    <td>'.$books->title.'</td>
                    <td>'.$books->authorid.'</td>
                    <td>'.$books->ISBN.'</td>
                    <td>'.$books->pub_year.'</td>
                    <td>'.$books->available.'</td>
                    </tr>
                    ';
                } 
                $output .= '
             </tbody>
            </table>';
            }
            else{
                $output .='No results';
            }
            return $output;
        }
    }
}
