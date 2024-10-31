{{--


@extends('layouts.admin')

@section('title','Creer un cours')
@section('content')

<div class="col-span-4">

     <table class="w-[50rem] h-[10rem] border-blue-500 border-4 mx-auto">

        <thead>
          <tr>
            <th>Cours</th>
            <th>Description</th>
            <th>Module</th>
            <th>Competence</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cours as $cour )

            <tr>
                <th>{{  $cour->nom  }}</th>
                <th>{{  $cour->description   }}</th>
                <th>
                    <select name="module" id=" module-list ">
                        @foreach ( $cour->modules as $module)
                        <option value="{{$module->id}}">{{$module->nom_module}}</option>

                        <a href="#" data-module-id="{{ $module->id }}">{{ $module->name }}</a>
                        @endforeach
                    </select>
                </th>
                <th id="competences-container" >
                        @foreach ( $cour->modules as $module)
             <option value="{{$module->id}}">{{$module->competence?->titre}}</option>
                        @endforeach
                </th>

                <td  class=" gap-5">

                    <a href="{{ route('cours.edit', $cour->id) }} "   class=" text-white mx-2  bg-[#5439c8] px-1 py-1 rounded-md ">Update</a>
                    <a href="{{ route('cours.delete', $cour->id) }} "   class=" text-white mx-2  bg-[#5439c8] px-1 py-1 rounded-md ">Delete</a>
                    <a href="{{ route('cours.show', $cour->id) }} "   class=" text-white mx-2  bg-[#5439c8] px-1 py-1 rounded-md ">voire</a>

                </td>
                
            </tr>
              @endforeach
        </tbody>
    </table>


</div>
@endsection

 --}}





 <div class="col-span-4">

    <table class="w-[50rem] h-[10rem] border-blue-500 border-4 mx-auto">

       <thead>
         <tr>
           <th>Cours</th>
           <th>Description</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($cours as $cour )

        <tr>
            <th>{{  $cour->nom  }}</th>
            <th>{{  $cour->description   }}</th>

    </tr>
      @endforeach
</tbody>
</table>
