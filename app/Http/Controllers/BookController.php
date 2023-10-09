<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::OrderByDesc('id')->latest()->take(5)->get();
        return view('admin.books.index',compact('books'));
    }

    public function search(Request $request)
    {
        if(!empty($request->adv_name)){
            $books = Book::where('adv_name','like',"%$request->adv_name%")->get();
        }elseif(!empty($request->oab_number)){
            $books = Book::where('oab_number','like',"%$request->oab_number%")->get();
        }else{
            $books = Book::OrderByDesc('id')->latest()->take(5)->get();
        }
        return view('admin.books.index',compact('books'));
    }
    
    public function create()
    {
        return view('admin.books.create');
    }

    
    public function store(Request $request)
    {
        $books = $request->all();
        Book::create($books);

        return to_route('books.index')->with('info','Post cadastrado com sucesso');
    }

    
    public function edit(Book $book)
    {
        return view('admin.books.edit',compact('book'));
    }

   
    public function update(Request $request, Book $book)
    {
        $books = $request->all();
        Book::find($book->id)->update($books);
        
        return to_route('books.index')->with('info','Post editado com sucesso');;
    }

   
    public function destroy(Book $book)
    {
        $book->delete();
        return to_route('books.index')->with('error','Post excluído com sucesso');
    }
}
