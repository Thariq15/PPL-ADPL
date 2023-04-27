@extends('layouts.main')

@section('container')
<h1 class="mb-5">{{$post->title}} </h1>


{!! $post->body !!}

<a href="/posts">Kembali ke Produk</a>
@endsection