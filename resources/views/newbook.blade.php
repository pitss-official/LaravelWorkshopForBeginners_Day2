@extends('master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Book</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Responsive Hover Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form role="form" method="post" action="/books">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="bookname">Book Name</label>
                                            <input type="text" class="form-control" id="bookname" placeholder="Enter name of the book" name="bookName">
                                        </div>
                                        <div class="form-group">
                                            <label for="bookauthor">Author</label>
                                            <input type="text" class="form-control" id="bookauthor" placeholder="Author Name" name="author">
                                        </div>
                                        <div class="form-group">
                                            <label for="bookprice">Price</label>
                                            <input type="text" class="form-control" id="bookauthor" placeholder="Book Price" name="price">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
        <script>
            @if(Session::has('type'))
                @if(Session::get('type')=="success")
            document.addEventListener("DOMContentLoaded", function(event) {
                toastr.success('Book Added Successfully with ID {{Session::get('bookid')}}');
            });

                @endif
            @endif
        </script>
    </div>
@endsection
