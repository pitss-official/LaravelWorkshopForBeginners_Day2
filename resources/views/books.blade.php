@extends('master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Books</h1>
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

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Author</th>
                                        <th>Price</th>
                                        <th>Added By</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="books">
                                    @if(count($books)==0)
                                        <tr>
                                            <td colspan="7">No Books Found</td>
                                        </tr>
                                        @endif
                                    @foreach($books as $book)
                                        <tr id="book-{{$book->id}}">
                                            <td>{{$book->id}}</td>
                                            <td>{{$book->bookName}}</td>
                                            <td>{{$book->author}}</td>
                                            <td>{{$book->price}}</td>
                                            <td>{{\App\User::find($book->addedBy)->name}}</td>
                                            <td>{{$book->created_at}}</td>
                                            <td>
                                                <button class="m-0 btn btn-outline-danger" onclick="del({{$book->id}})"><i class="fas fa-trash"></i></button>
                                                <button class="ml-1 btn btn-outline-primary"><i class="fas fa-pen"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <script>
        function del(id) {
            axios.delete('/books/'+id).then(res=>{if(res.data.type=="success"){
                $('#book-'+id).remove();
                if($('#books').html().length<5)$('#books').html('<tr><td colspan="7">No More Books Found</td></tr>');
                toastr.info("Deleted Successfully")
            }else{
                toastr.error("Some error occurred")
            }
            }).catch(reason => {
                toastr.error(reason)
            })
        }
    </script>
@endsection
