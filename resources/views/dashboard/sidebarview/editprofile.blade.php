@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{Auth::user()->name}}</h1>
</div>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
    <div class="row">
        <div class="col-xs-12 col-sm-9">
            <form action="/dashboard/profile/{{Auth::user()->id}}" method="post">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">User info</h4>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama Produk" value="{{auth()->user()->name}}">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" name="body" class="form-control" id="email" placeholder="email" value="{{auth()->user()->email}}">
                        <label for="email">email</label>

                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                        <label for="password">password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection