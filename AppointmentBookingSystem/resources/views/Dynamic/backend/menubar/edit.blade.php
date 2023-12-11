@extends('layouts.app')

@section('content')

    <div class="errors" style="text-align: center">
        @if ($errors->any())
            @foreach ($errors->all() as $errors)
                <h4 class="text-danger " style="color:red;">{{ $errors }}
                </h4>
            @endforeach
        @endif
    </div>


    <div class="card card-secondary m-5 mt-2">
        <div class="card-header">
            <h3 class="card-title">Edit Menu</h3>
        </div>
        <div class="card-body">
            {!! Form::model($menu, ['method' => 'PUT', 'route' => ['menu.update', $menu]]) !!}
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('name', 'Name ') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) !!}
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('order', 'Order ') !!}
                        {!! Form::number('order', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Order',
                        ]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('type', 'Type') !!}
                        {!! Form::select('type', ['1' => 'Module', '2' => 'Page', '3' => 'External Link'], null, [
                            'class' => 'form-control',
                            'placeholder' => 'Select Type',
                            'id' => 'typeDropdown',
                        ]) !!}
                    </div>
                </div>
                <div class="col-6" id="moduleColumn" style="display: none;">
                    <div class="form-group">
                        {!! Form::label('module_id', 'Module Name') !!}
                        {!! Form::select('module_id', $module->pluck('name', 'id'), null, [
                            'class' => 'form-control',
                            'placeholder' => 'Select Name',
                        ]) !!}
                    </div>
                </div>
                <div class="col-6" id="pageColumn" style="display: none;">
                    <div class="form-group">
                        {!! Form::label('page_id', 'Page slug') !!}
                        {!! Form::select('page_id', $page->pluck('slug'), null, [
                            'class' => 'form-control',
                            'placeholder' => 'Select Name',
                        ]) !!}
                    </div>
                </div>
                <div class="col-6" id="externalLinkColumn" style="display: none;">
                    <div class="form-group">
                        {!! Form::label('external_link', 'External Link') !!}
                        {!! Form::text('external_link', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Enter External Link',
                        ]) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 text-left">
                    <div class="form-group">
                        {!! Form::label('status', 'Status') !!}
                        {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, [
                            'class' => 'form-control',
                            'placeholder' => 'Select Status',
                        ]) !!}
                    </div>
                </div>

                <div class="col text-right mt-4"> {!! Form::submit('Update ', ['class' => 'btn btn-success']) !!}</div>
            </div>


            {!! Form::close() !!}

        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var typeDropdown = document.getElementById('typeDropdown');
                var moduleColumn = document.getElementById('moduleColumn');
                var pageColumn = document.getElementById('pageColumn');
                var externalLinkColumn = document.getElementById('externalLinkColumn');

                // Event handler for the "Type" dropdown change
                typeDropdown.addEventListener('change', function() {
                    // Get the selected option value
                    var selectedOption = typeDropdown.value;

                    // Hide all columns
                    moduleColumn.style.display = 'none';
                    pageColumn.style.display = 'none';
                    externalLinkColumn.style.display = 'none';

                    // Show the selected column
                    if (selectedOption === '1') {
                        moduleColumn.style.display = 'block';
                    } else if (selectedOption === '2') {
                        pageColumn.style.display = 'block';
                    } else if (selectedOption === '3') {
                        externalLinkColumn.style.display = 'block';
                    }
                });

                // Trigger the change event to set the initial visibility based on the default selected option
                typeDropdown.dispatchEvent(new Event('change'));
            });
        </script>



    @endsection
