<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;


class BooksController extends Controller
{
    public function index()
    {
        $books = Books::latest()->paginate(5);
        return view('books.index',compact('books'))->with('i',(request()->input('page',1)- 1) *5);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'authorid'=>'required',
            'title'=>'required',
            'ISBN'=>'required',
            'pub_year'=>'required',
            'available'=>'required',
        ]);

        Books::create($request->all());
        return redirect()->route('books.index')->with('success','created Successfully.');
    }

    public function show(Books $book)
    {
        return view('books.show',compact('book'));
    }

    public function edit(Books $book)
    {
        return view('books.edit',compact('book'));
    }

    public function update(Request $request, Books $book)
    {
        $request->validate([
            'authorid'=>'required',
            'title'=>'required',
            'ISBN'=>'required',
            'pub_year'=>'required',
            'available'=>'required',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success','Updated Successfully.');
    }
     
    public function destroy(Books $book)
    {   
        $book->delete();
        return redirect()->route('books.index')->with('success','Deleted Successfully.');
    }

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



