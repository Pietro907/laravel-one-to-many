@extends('layouts.admin')

@section('content')
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>

                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">IMAGE PROJ</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">AUTHORS</th>
                    <th scope="col">LINK</th>
                    <th scope="col">GITHUB</th>
                    <th scope="col"></th>
                    <th scope="col">TECH</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($projects as $project)
                    <tr class="text-center">
                        <td scope="row">{{ $project->id }}</td>
                        <td><b>{{ $project->title }}</b></td>
                        <td> 
                            @if ($project->thumb)
                                <img class="w-100 p-3" src="{{$project->thumb}}" alt="{{$project->thumb}}">
                            @else
                                N/A
                            @endif
                        </td>

                        <td><em style="font-size: xx-small">{{ $project->description }}</em></td>
                        <td><b>{{ $project->authors }}</b></td>
                        <td>{{ $project->link }}</td>
                        <td>{{ $project->github_link }}</td>
                        <td>
                            {{-- <a href="project/{project}">{{ $project->slug }}</a> --}}
                            
                            <form action="{{route("project.show", [$project->id])}}">
                                
                                <button type="submit" class="btn btn-primary text-white px-2 py-0 my-2 fs-6"><i class="fa-solid fa-eye"></i></button>
                            </form>

                            <form action="{{route("project.create", [$project->id])}}">
                                
                                <button type="submit" class="btn btn-secondary text-white px-2 py-0 my-2 fs-6"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>

                            <form action="{{route("project.destroy", [$project->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white px-2 py-0 my-2 fs-6"><i class="fa-solid fa-trash-can"></i></button>
                            </form>

                        </td>
                        <td>{{ $project->tech}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
