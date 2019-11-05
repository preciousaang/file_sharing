@extends('layouts.base')
@section('title', $file->name)
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card">   
                                         
                <div class="card-body">      
                        <a target="_blank" href="{{route('download-file', $file->id)}}" class="text-center list-group-item list-group-item-action active">Download File <i class="fa fa-download"></i></a>
                        <hr>
                        @can('delete', $file)
                            <a onclick="return confirm('Are You Sure?');" href="{{route('delete-file', $file->id)}}" class="text-center text-white list-group-item list-group-item-action bg-danger">Delete File <i class="fa fa-trash"></i></a>
                         @endcan      
                         <hr>                
                    Average Rating: <strong>{{$avg_rating}} out of 10</strong><br>
                   
                    <hr>                   
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h3 style="font-weight: bold;">{{ucfirst($file->name)}}</h3>
            <p class="small">Uploaded By: <strong>{{$file->user->profile->full_name}}</strong></p>
            <hr>            
            <div id="post-review" class="card">
                <div class="card-header">
                    <h4 class="text-center">Post A Review</h4>
                </div>
                <div class="card-body">
                    @auth
                    @include('partials.success')
                    @include('partials.errors')
                    <form action="{{route('add-comment', $file->id)}}" method="post">
                        @csrf @method('post')                        
                        <div class="row form-group">
                            <label for="" class="col-form-label col-md-3 text-right">Review</label>
                            <div class="col-md-8">
                                <textarea required class="form-control" name="body">{{old('body')}}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-form-label col-md-3 text-right">Rating</label>
                            <div class="col-md-8">
                                <select name="rating" id="" class="form-control">
                                    @for($i=1; $i<=10; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-8 offset-md-3">
                                <input type="submit" class="btn btn-outline-dark" value="Post Review">
                            </div>
                            
                        </div>
                    </form>
                    @else
                    <p>
                        You have to be logged in to post a review. Login <a href="{{route('login-form', ['prev'=>url()->current()])}}">here</a>.
                    </p>
                    @endauth
                </div>
            </div>
        </div>
    </div><hr>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Comments</h4>
                </div>
                <div class="card-body">
                    @forelse ($file->comments()->paginate(20) as $comment)
                        <div class="card">
                            <div class="card-header">
                                @if(auth()->user() && auth()->user()->id == $file->user->id)
                                <h5>You said</h5>
                                @else
                                <h5>{{$file->user->profile->full_name}} says </h5>
                                @endif
                            </div>
                            <div class="card-body">
                                <p>{{$comment->body}}</p>
                            </div>
                            <div class="card-footer"><b>{{$comment->rating}} of 10 stars</b></div>
                        </div>
                        <hr>
                        
                    @empty
                        No Comments for this book yet. Be the first to comment <a class="card-link" href="#post-review">here</a>
                    @endforelse
                </div>
                <div class="card-footer">
                    <div class="justify-content-center"> {{$file->comments()->paginate(20)->links()}}</div>                                           
                </div>
            </div>            
        </div>

    </div>
</div>
@endsection