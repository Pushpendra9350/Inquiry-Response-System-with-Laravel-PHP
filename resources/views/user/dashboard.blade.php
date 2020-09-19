@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class='mb-3'><h4><strong>All Queries</strong><a href='dashboard/queryform' class='btn btn-primary float-right '>Create New Query</a><br></h4></div>
                
            
            @if(count($query)>0)
                @foreach($query as $qry)
                    <div class="card cardstyle">
                        <div class="card-header">
                            <h5>{{$qry->title}}</h5>
                            <p><strong> Query : </strong>{{ $qry->query}}<br><small>(Last Update : {{ $qry->updated_at}})</small></p>
                            
                            <div class="float-right">
                            <a href="delete-query/{{$qry->id}}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">Delete Query</a>
                                </div>
                        </div>

                        <div class="card-body">
                            <div >All Responses</div>
                            <br>
                            @foreach($qry->responses as $response)
                                <small style="color: rgb(0, 102, 255)"><strong>{{$response->response}}</strong>
                                    <br><small>(Last Update : {{ $response ->updated_at}})</small></small>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <br>
                @endforeach
            @else
                No Query Found
            @endif
            
        </div>
    </div>
</div>
@endsection
