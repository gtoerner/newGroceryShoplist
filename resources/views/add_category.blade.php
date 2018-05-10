@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Grocery Category List - Dashboard
                    <div>
                        This page is the Master Category List & used only to add/delete items from the overall general list<br>
                        To create a new shopping list click <a href={{ url('/grocerylist')}}>HERE</a>
                    </div>
                    <div>
                        If you need to add/delete items from the master list,
                        then click <a href={{ url('/grocery')}}>HERE</a>
                    </div>
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                    <form action="{{ url('categ')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">new grocery category item</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('categ') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add New Category Item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($category_items) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Category Items
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Category Items:</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($category_items as $items)
                                <tr>
                                    <td class="table-text"><div>{{ $items->name }}</div></td>

                                    <!-- Task Delete Button -->
                                    <td>
                                        <form action="{{ url('categ/'.$items->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="button">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <br><br>
    <!--
    <input name="sex" type="radio" value="male">male<br>
    <input checked="checked" name="sex" type="radio" value="female">female<br>
    <br><br>
    <br><br>
    -->
@endsection
