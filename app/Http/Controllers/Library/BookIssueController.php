<?php

namespace App\Http\Controllers\Library;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library\BookIssue;
use App\Models\Library\Book;
use App\Models\Student\Student;
class BookIssueController extends Controller
{
    
    public function index()
    {
        $bookissues=BookIssue::with('book','student')->paginate(10);
        return view('pages.library.bookissue.index', compact('bookissues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
       $students=Student::all();
       $books=Book::all();
       return view('pages.library.bookissue.create',compact('students','books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                    
            BookIssue::create([
                'book_id' => $request->book_id,
                'student_id' => $request->student_id,
                'issue_date' => $request->issue_date,
                'due_date' => $request->due_date,
              
            ]);

            
            $book = Book::find($request->book_id);
            if ($book) {
                $book->decrement('copies_available');
            }

          
            return redirect('bookissues')->with('success', 'Book issued successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
                $bookIssue = BookIssue::findOrFail($id);
                $books = Book::all();
                $students = Student::all();

                return view('pages.library.bookissue.edit', compact('bookIssue', 'books', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book= BookIssue::find($id);
        $book->delete();
        return redirect('bookissues');
    }



   public function returnBook($id)
        {
            $bookIssue = BookIssue::findOrFail($id);

            // Only process if book not already returned
            if ($bookIssue->return_date === null) {
                // Set return date to today (start of day)
                $today = Carbon::now()->startOfDay();
                $bookIssue->return_date = $today;

                // Parse due date and set to start of day to avoid partial day issues
                $due = Carbon::parse($bookIssue->due_date)->startOfDay();

                // Calculate fine only if book is returned late
                if ($today->gt($due)) {
                    $daysLate = $due->diffInDays($today); // full days late
                    $bookIssue->fine = $daysLate * 10;    // 10 currency units per late day
                } else {
                    $bookIssue->fine = 0;
                }

                // Save updated book issue
                $bookIssue->save();

                // Increase available copies of the book by 1
                $book = Book::find($bookIssue->book_id);
                if ($book) {
                    $book->increment('copies_available');
                }
            }

            return redirect('bookissues')->with('success', 'Book returned successfully!');
        }
}
