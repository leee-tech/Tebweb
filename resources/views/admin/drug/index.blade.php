@extends('admin.layout.app')
@section('section')
    @include('flash-message')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Admin</li>
                    <li>Drugs</li>
                </ul>
                <a href="{{route('drugs.create')}}"  class="button blue">
                    <span>Create</span>
                </a>

            </div>
        </section>

        <section class="section main-section">
            <table>
                <thead>
                <tr>
                    <th>Name</th>

                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($mohammad as $x)
                <tr>

                    <td data-label="Name">{{$x->name}}</td>
                    <td class="actions-cell">
                        <div class="buttons right nowrap">
                            <a href="{{route('drugs.edit',$x->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </a>
                            <a class="button small red --jb-modal" href="{{route('drugs.destroy',$x->id)}}"
                               onclick="event.preventDefault();
                                   document.getElementById('delete-form-{{$x->id}}').submit();">
                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </a>

                            <form id="delete-form-{{$x->id}}" action="{{route('drugs.destroy',$x->id)}}" method="POST" style="display: none;">
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </section>

    </div>
@endsection
