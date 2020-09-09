@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create new project:</div>
               <div class="card-body">
                   <form action="{{ route('projects.store') }}" method="POST">
                       @csrf
                       @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       <div class="form-group">
                           <label>Name: </label>
                           <input type="text" name="title" class="form-control">
                       </div>
                       
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection