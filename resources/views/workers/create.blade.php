@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Worker:</div>
               {{-- Error validation  --}}
               {{-- @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p style="color: rgb(0, 255, 128)">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif --}}
                {{-- ------ --}}
               <div class="card-body">
                   <form action="{{ route('workers.store') }}" method="POST">
                       @csrf
                       {{-- Alert msg. galima det ir kaip atskiram inputui kad išmesti errorui jei inputas neužpildytas --}}
                       @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        {{-- ----------- --}}
                       <div class="form-group">
                            <label for="">Name: </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        @error('project_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       <div class="form-group">
                           <label>Assign project: </label>
                           <select name="project_id" id="" class="form-control">
                                <option value="" selected>Choose project</option>
                                @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                           </select>
                       </div>
                       
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection