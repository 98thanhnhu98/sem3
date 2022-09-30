@extends('books.layout')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">Book Management</h2>
    </div>
    <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
        <a class="btn btn-success" href="{{ route('books.index') }}">Back</a>
    </div>
</div>

@if($errors->any())
<div class="alert alert-danger">
    <strong>Oops!</strong>There were some problems with your input.<br>
    <ul>
        @foreach($errors->all() as $errors)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Authority:</strong>
                <input type="number" name="authorid" class="form-control" placeholder="authorid"> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>title:</strong>
                <input type="text" name="title" class="form-control" placeholder="title"> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ISBN :</strong>
                <input class="form-control" type="text" name="ISBN" placeholder="ISBN"/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>pub_year:</strong>
                <input type="number" class="form-control" name="pub_year" placeholder="pub_year">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>available:</strong>
                <input type="number" class="form-control" name="available" placeholder="available">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection