@extends('layouts.backend.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog <small>All Post</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <a href="{{route('backend.blog.create')}}" class="btn btn-sm btn-succes">
                  <i class="fa fa-plus"></i>Add New Post</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body ">
                @if(session("message"))
                    <div class="col-sm-12">
                        <div class="alert alert-info" style="width:100%">{{session('message')}}</div>
                    </div>
                  @endif
                    <table class="table table-border">
                    <thead>
                      <tr>
                        <th>Action</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($posts as $item)
                        <tr>
                        <td>
                          {!! Form::open (['method'=>'DELETE','route'=>['backend.blog.destroy',$item->id]])!!}
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</button>
                          <a href="{{route('backend.blog.edit', $item->id)}}" class="btn btn-info btn-sm">
                            <i class = "fa fa-edit"></i> Edit </a>
                          {!! Form::close()!!}                         
                        </td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->author->name}}</td>
                        <td>{{$item->created_at}}</td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                    </table>
                    {{$posts->links()}}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection