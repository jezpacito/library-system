@extends('layouts.master')
<style>
    * {
        box-sizing: border-box;
    }

    #myInput {
        /*background-image: url('/css/searchicon.png');*/
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    #myTable {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 18px;
    }

    #myTable th, #myTable td {
        text-align: left;
        padding: 12px;
    }

    #myTable tr {
        border-bottom: 1px solid #ddd;
    }

    #myTable tr.header, #myTable tr:hover {
        background-color: #f1f1f1;
    }
</style>
@section('content')
    <div class="card-body">
        <h2>List of Avalable Books</h2>
       <div>
           <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Click to Search  Book title" title="Type in a name">
       </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0" >
                <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Copy Right Year</th>
                    <th>Qty</th>
                    <th class="text-center">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->publisher}}</td>
                        <td>{{$book->copyright_year}}</td>
                        <td>{{$book->quantity}}</td>

                            @role('member')
                        <div class="text-center">
                            <td>
                              @if($book->quantity <= 0)

                                  @else
                                <a href="/borrow/{{$book->id}}" class="btn btn-outline-info">Reserve</a>
{{--                                <a href="#" class="btn btn-outline-info">Reserve</a>--}}
                            @endif
                                <td>
                            <td>
                                <a href="/books/{{$book->id}}" class="btn btn-outline-info">View</a>
                            </td>
                        </div>

                            @endrole

                        @role('admin')

                        <div class="text-center">
                        <td>
                            <a href="/books/{{$book->id}}" class="btn btn-outline-info">View</a>
                            <a href="{{route('books.edit',$book->id)}}" class="btn btn-outline-info">Edit</a>
                            <div>
                                <a href="/direct-borrow/{{$book->id}}" class="btn btn-outline-success">Borrow</a>

                            </div>
                        </td>
                        </div>
                        @endrole
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {{ $books->links() }}
    </div>
@endsection
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
