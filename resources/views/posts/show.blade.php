@extends('layouts.app')

@section('title','Home Page')

@section('content')
<h1>Post Page</h1>


@booktype($booktype)
<h2>{{ $booktype }}</h2>
@endbooktype
@endsection