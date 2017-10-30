@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Grocery List-Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    @if (count($grocery_items) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Current Grocery Items
                            </div>

                            <form action="{{ url('grocerlist')}}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <!-- Task Name -->
                                <div class="form-group">
                                    <label for="task-name" class="col-sm-3 control-label">add item to list</label>

                                    <div class="col-sm-6">
                                        <select name="id" size="4">
                                            @foreach ($grocery_items as $items)
                                                @if ($items->isActive == 0)
                                                    <option value={{ $items->id }}>{{ $items->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Add Task Button -->
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-btn fa-plus"></i>Add New Grocery Item
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="panel-body">
                                <table class="table table-striped task-table">
                                    <thead>
                                    <th>Current Grocery List:</th>
                                    <th>&nbsp;</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($grocery_items as $items)
                                        @if ($items->isActive == 1)
                                        <tr>
                                            <td class="table-text"><div>{{ $items->name }}</div></td>

                                            <!-- Task Delete Button -->
                                            <td>
                                                <form action="{{ url('grocerlist/'.$items->id) }}" method="POST">
                                                    {{ csrf_field() }}

                                                    <button type="submit" class="button">
                                                        Remove from List
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
