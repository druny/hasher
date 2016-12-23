@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="padding: 20px 0;">
                    <div class="panel-heading" style="margin-bottom: 20px;">Create</div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        <form action="{{ route('hash.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="col-xs-6">
                                <h2 style="text-align: center;">Word</h2>
                                <select name="words[]" class="form-control"  style="height: 150px;" multiple>
                                    @foreach($vocabularies as $vocabulary)
                                        <option value="{{ $vocabulary->id }}">{{ $vocabulary->word }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <h2 style="text-align: center;">Algorithm</h2>
                                <select name="algorithms[]" class="form-control"  style="height: 150px;" multiple>
                                    @foreach($algorithms as $algorithm)
                                        <option value="{{ $algorithm->id }}">{{ $algorithm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p style="margin-left: 20px; font-size: 12px; color: #23527c; font-family: 'Casper Bold Italic';">
                                Use 'CTRL' for multyple selecting
                            </p>
                            <div class="col-xs-12">
                                <button style="margin: 20px 0;" class="btn btn-danger col-sm-12">
                                    Create
                                </button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection