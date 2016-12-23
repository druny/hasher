@extends('layouts.app')

@section('content')

    <style>
        .table-col:hover {
            background-color: #00695C;
            box-shadow: 2px 2px 2px #fff;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-xs-12" >
            <div class="panel " style="background-color: #009688; color: #fff; font-family: 'Book Antiqua'; padding: 10px 20px; ">
                <h1 class="panel-heading" style="text-align: center; text-shadow: 1px 2px  5px #eee; ">Current user</h1>
                <div class=""><strong style="text-transform: uppercase; display: block; color: #C2185B;">IP: </strong>
                    <p style="margin-left: 10px;">{{ $user->ip }}</p>
                </div>
                <div class=""><strong style="text-transform: uppercase; display: block; color: #C2185B;">Browser: </strong>
                    <p style="margin-left: 10px;">{{ $user->browser }}</p>
                </div>
                <div class=""><strong style="text-transform: uppercase; display: block; color: #C2185B;">Country: </strong>
                    <p style="margin-left: 10px;">{{ $user->country }}</p>
                </div>

            </div>
        </div>
        <div class="panel-body">
            <table class="table col-xs-12" style="background-color: #009688; color: #fff;">
                <thead>
                <th style="color: #C2185B;">Word</th>
                <th style="color: #C2185B;">Algorithm</th>
                <th style="color: #C2185B;">Hash</th>
                <th style="color: #C2185B;">Date</th>
                </thead>
                <tbody>
                @foreach($hashes as $hash)
                    <tr class='table-col'>
                        <td>{{ $hash->vocabulary->word }}</td>
                        <td>{{ $hash->hashAlgorithm->name }}</td>
                        <td>{{ $hash->hash }}</td>
                        <td>{{ $hash->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
@endsection
