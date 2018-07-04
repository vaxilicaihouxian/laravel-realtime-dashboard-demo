@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Article Need To Approval
                    </div>
                    <div class="card-body">
                        @foreach($articles as $article)
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <form action="{{ route('approval') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <h2>{{ $article->title }}</h2>
                                                <p>Author:{{ $article->user->name }}</p>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $article->id }}">
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Approval
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection