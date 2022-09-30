@extends('books.layout')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">Edit Book</h2>
    </div>
    <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
        <a class="btn btn-primary" href="{{ route('books.index') }}">Back</a>
    </div>
</div>  

@if($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong>There were some problems with youor input.<br>
    <ul>    
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('books.update',$book->bookid) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Authority:</strong>
                <input type="number" name="authorid" class="form-control" value="{{$book->authorid}}" placeholder="authorid"> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" value="{{$book->title}}" placeholder="title"> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ISBN:</strong>
                <input class="form-control" type="text" name="ISBN" placeholder="ISBN"{{$book->ISBN}} />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>pub_year:</strong>
                <input type="number" value="{{$book->pub_year}}" class="form-control" name="pub_year" placeholder="pub_year">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>available:</strong>
                <input type="number" value="{{$book->available}}" class="form-control" name="available" placeholder="available">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection