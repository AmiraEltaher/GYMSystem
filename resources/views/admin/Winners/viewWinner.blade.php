@extends('admin.Head')
@include('admin.Main-header')
@include('admin.Main-sidebar')



<div class="col-md-8" style="margin-top: 100px">
    <div>
        <h2 class="text-center"
            style="font-weight: bolder;background-color: black;color: white; padding: 10px 0px;border-radius: 15px">
            عرض جدول المنتجات</h2>
    </div>
    <hr style="width: 50%;border: solid 3px blue" />
</div>

<div class="col-md-8">
    <table class="table" border="1.5">
        <thead style="background-color: black; color: white; text-align: center">
            <tr>
                <th scope="col">اسم اللاعب</th>
                <th scope="col">عمر اللاعب</th>
                <th scope="col">اسم البطولة</th>

                <th scope="col">عرض </th>
                <th scope="col">تعديل </th>
                <th scope="col">حذف </th>


            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
                <tr style="text-align: center">

                    <td> {{ $player->namePlayer }}</td>
                    <td> {{ $player->agePlayer }}</td>
                    <td>
                        @foreach ($player->champions as $champion)
                            {{ $champion->championName }} -
                            {{-- trim --}}
                        @endforeach
                    </td>
                    <td><a href="{{ route('winners.show', $player->id) }}"><i class="fa-solid fa-house"
                                style="font-size: 2.5rem ; color: rgb(3, 157, 3)"></i></a></td>
                    <td><a href="{{ route('winners.edit', $player->id) }}"><i class="fa-solid fa-pen-to-square"
                                style="font-size: 2.5rem;color: blue"></i></a></td>

                    {{-- The delete action should not be linked directly via an anchor tag like the show and edit actions because clicking on a link will usually trigger a GET request,
                    which is not suitable for a delete operation as it could lead to accidental deletion if a search engine follows the link.
                    Instead, you should use a form with the POST method or a form with the DELETE method (via a hidden input or a method spoofing technique) to trigger the delete action.
                    <td><a href="{{route('players.destroy', ['player' => $player->id])}}"><i class="fa-solid fa-trash" style="font-size: 2.5rem;color: red"></i></a> </td>
                --}}

                    <td>
                        <form action="{{ route('winners.destroy', ['winner' => $player->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-solid fa-trash"
                                    style="font-size: 2.5rem;color: red"></i></button>
                        </form>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.Footerscripts')

{{-- @include('layouts.Footer') --}}
