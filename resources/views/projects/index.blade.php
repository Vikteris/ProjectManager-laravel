@extends('layouts.app')
@section('content')
<div class="card-body">

    @if($errors->any())
    <h4 style="color: rgb(0, 255, 128)">{{$errors->first()}}</h4>
    @endif
    
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Assigned workers</th>
            <th>Action</th>
        </tr>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->title }}</td>
            <td>
                @foreach ($project->workers as $worker)
                    {{ $worker->name }}
                    {{-- make commas without last one --}}
                    @if(!$loop->last)
                    , 
                    @endif
                @endforeach
            </td>
            <td>
                <form action={{ route('projects.destroy', $project->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('projects.edit', $project->id) }}>Update</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('projects.create') }}" class="btn btn-success">Add</a>
    </div>
</div>
@endsection