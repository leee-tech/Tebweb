<title>Type Management - List of types</title>

@extends('admin.layout.app')

@section('section')
    @include('flash-message')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Admin</li>
                    <li>Management Type</li>
                </ul>
                <a href="{{route('types.create')}}"  class="button blue">
                    <span>Create</span>
                </a>

            </div>
        </section>

        <header class="card-header">

            <div>
                <div class="mx-auto pull-right">
                    <div class="">
                        <form action="{{ route('types.index') }}" method="GET" role="search">

                            <div class="input-group">

                                <input type="text" class="input" name="term" placeholder="Search" id="term">
                                <a href="{{ route('types.index') }}" class=" mt-1">
                                           <span class="icon">

                        </span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <section class="section main-section">
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Created</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($types as $type)
                <tr>

                    <td data-label="Name">{{$type->name}}</td>
                    <td datatype="Created">{{$type->created_at}}</td>
                    <td class="actions-cell">
                        <div class="buttons right nowrap">
                            <a href="{{route('types.edit',$type->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </a>
                            <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </section>

    </div>
@endsection
