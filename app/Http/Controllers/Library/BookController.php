<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library\Book;

class BookController extends Controller
{
    
  

    public function index(Request $request)
        {
            
            $search = $request->input('title');

        
            $books = Book::query();

            if ($search) {
                $books = $books->where('title', 'like', '%' . $search . '%');
            }

            
            $books = $books->paginate(15)->appends(['title' => $search]);

            return view('pages.library.book.index', compact('books'));
        }
  
    public function create()
    {
        return view('pages.library.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'publisher' => $request->publisher,
            'year_published' => $request->year_published,
            'copies_total' => $request->copies_total,
            'copies_available' => $request->copies_available,
        ]);

        return redirect('books')->with('success', 'Book added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         
            $book = Book::findOrFail($id);

          
            return view('pages.library.book.show', compact('book'));
    }

   
    public function edit(string $id)
    {
          $book = Book::findOrFail($id);
         return view('pages.library.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $book = Book::findOrFail($id);

            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'isbn' => $request->isbn,
                'publisher' => $request->publisher,
                'year_published' => $request->year_published,
                'copies_total' => $request->copies_total,
                'copies_available' => $request->copies_available,
            ]);

            return redirect('books')->with('success', 'Book updated successfully!');
    }

    public function destroy(string $id)
    {
        $book=Book::find($id);
        $book->delete();
        return redirect('books');

    }
}
