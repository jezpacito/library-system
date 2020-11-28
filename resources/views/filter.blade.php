@extends('layouts.app')
<style>
    .filterDiv {
        /*float: left;*/
        /*background-color: #2196F3;*/
        /*color: #ffffff;*/
        /*width: 100px;*/
        /*line-height: 100px;*/
        text-align: center;
        /*margin: 2px;*/
        display: none;
    }

    .show {
        display: block;
    }

    .container {
        margin-top: 20px;
        overflow: hidden;
    }

    /* Style the buttons */
    .btn {
        border: none;
        outline: none;
        padding: 12px 16px;
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #ddd;
    }

    .btn.active {
        background-color: #666;
        color: white;
    }
    * {
        box-sizing: border-box;
    }

    #myInput {
        background-image: url('/css/searchicon.png');
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


    <h2 class="text-center">Filter Books</h2>

    <div id="myBtnContainer" class="text-center">
        <button class="btn active" onclick="filterSelection('all')"> Show all</button>
        <button class="btn" onclick="filterSelection('nonfiction')"> Non-fiction</button>
        <button class="btn" onclick="filterSelection('biographies')"> Biographies</button>
        <button class="btn" onclick="filterSelection('novels')"> Novels</button>
        <button class="btn" onclick="filterSelection('history')"> History</button>
        <button class="btn" onclick="filterSelection('scifiction')"> Science-Fiction</button>
        <button class="btn" onclick="filterSelection('sports')"> Sports</button>
    </div>

    <div class="container">
        <div class="filterDiv nonfiction">
            <div class="container">
{{--                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search  Book title" title="Type in a name">--}}

                <h2>Non-Fiction </h2>
                <table class="table" id="myTable">
                    <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Available Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nonfiction    as $s)
                        <tr>
                            <td>{{$s->title}}</td>
                            <td>{{$s->author}}</td>
                            <td>{{$s->publisher}}</td>
                            <td>{{$s->quantity}}</td>
                            {{--                            <td>{{$s->category->name}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="filterDiv biographies ">
            <div class="container">
{{--                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search  Book title" title="Type in a name">--}}

                <h2>Biographies </h2>
                <table class="table" id="myTable">
                    <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Available Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($biographies as $s)
                        <tr>
                            <td>{{$s->title}}</td>
                            <td>{{$s->author}}</td>
                            <td>{{$s->publisher}}</td>
                            <td>{{$s->quantity}}</td>
                            {{--                            <td>{{$s->category->name}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
{{--        <div class="filterDiv novels">Cat</div>--}}
        <div class="filterDiv novels">
            <div class="container">
                <h2>Novels Books</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Available Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($novels as $s)
                        <tr>
                            <td>{{$s->title}}</td>
                            <td>{{$s->author}}</td>
                            <td>{{$s->publisher}}</td>
                            <td>{{$s->quantity}}</td>
                            {{--                            <td>{{$s->category->name}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="filterDiv history">
            <div class="container">
                <h2>History Books</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Available Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($history as $s)
                        <tr>
                            <td>{{$s->title}}</td>
                            <td>{{$s->author}}</td>
                            <td>{{$s->publisher}}</td>
                            <td>{{$s->quantity}}</td>
{{--                            <td>{{$s->category->name}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="filterDiv scifiction">
            <div class="container">
                <h2>Science Books</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Available Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($science as $s)
                        <tr>
                            <td>{{$s->title}}</td>
                            <td>{{$s->author}}</td>
                            <td>{{$s->publisher}}</td>
                            <td>{{$s->quantity}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
{{--            {{$science->links()}}--}}
        </div>


        <div class="filterDiv sports">
            <div class="container">
                <h2>Sports Books</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Available Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sports as $s)
                        <tr>
                            <td>{{$s->title}}</td>
                            <td>{{$s->author}}</td>
                            <td>{{$s->publisher}}</td>
                            <td>{{$s->quantity}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--    <div class="filterDiv novels">Cow</div>--}}

    </div>
@endsection

<script>
    filterSelection("all")
    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>


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
