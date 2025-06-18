@extends('layouts.master')
@section('page')
<style>
 

    .form-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 40px;
        border-radius: 10px;
        border: 1px solid #ccc;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      font-size: 24px;
      color: #2e8b57;
      margin-bottom: 40px;
    }

    .section-title {
      font-size: 18px;
      font-weight: bold;
      padding: 10px 15px;
      margin-bottom: 20px;
      background-color: #e0f7e9;
      border-left: 5px solid #2e8b57;
      color: #2e8b57;
    }

    .form-row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 20px;
    }

    .form-group {
      flex: 1 1 45%;
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: 600;
      margin-bottom: 6px;
    }

    input,
    select,
    textarea {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }

    textarea {
      resize: vertical;
      min-height: 60px;
    }

  </style>

<div class="divbi">   
<a class="buttonbi" href="{{ url('books') }}"><span>Back </span></a> 
</div>

<div class="form-container">
    <h2>Edit Book</h2>
    <form action="{{ url('books/' . $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label for="title">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $book->title) }}" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input 
                    type="text" 
                    name="author" 
                    value="{{ old('author', $book->author) }}" 
                    required
                >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input 
                    type="text" 
                    name="isbn" 
                    value="{{ old('isbn', $book->isbn) }}"
                >
            </div>

            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input 
                    type="text" 
                    name="publisher" 
                    value="{{ old('publisher', $book->publisher) }}"
                >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="year_published">Published Year</label>
                <input 
                    type="number" 
                    name="year_published" 
                    min="1000" max="9999" 
                    value="{{ old('year_published', $book->year_published) }}"
                >
            </div>

            <div class="form-group">
                <label for="copies_total">Total Copies</label>
                <input 
                    type="number" 
                    name="copies_total" 
                    min="1" 
                    required 
                    value="{{ old('copies_total', $book->copies_total) }}"
                >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="copies_available">Copies Available</label>
                <input 
                    type="number" 
                    name="copies_available" 
                    min="0" 
                    required 
                    value="{{ old('copies_available', $book->copies_available) }}"
                >
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="buttonbis" value="save"><span>Update</span></button>
        </div>
    </form>
</div>

@endsection