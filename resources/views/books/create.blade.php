<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('books.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Book Title</label>
                        <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="ex. Java Edition III">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Author</label>
                        <input type="text" name="author" id="author" value="{{old('author')}}" class="form-control @error('author') is-invalid @enderror" placeholder="Enter Author">
                        @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Publisher</label>
                        <input type="text" name="publisher" id="publisher" value="{{old('publisher')}}" class="form-control @error('publisher') is-invalid @enderror" placeholder="Enter Publisher">
                        @error('publisher')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Copy Right Year</label>
                        <input type="date" name="copyright_year" id="copyright_year" value="{{old('publisher')}}" class="form-control @error('copyright_year') is-invalid @enderror" placeholder="Enter Copy Right Year">
                        @error('copyright_year')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Unit Price</label>
                        <input type="text" name="unit_price" id="unit_price" value="{{old('unit_price')}}" class="form-control @error('unit_price') is-invalid @enderror" placeholder="Enter Unit Price">
                        @error('unit_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">No. Of Books</label>
                        <input type="text" name="quantity" id="quantity" value="{{old('quantity')}}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Number of Books">
                        @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description"  value="{{old('description')}}" id="description" rows="3" placeholder="Book Description"></textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
