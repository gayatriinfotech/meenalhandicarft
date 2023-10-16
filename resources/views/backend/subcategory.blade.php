@extends('backend/header')
@section('backend')
<div class="body-wrapper">
    

    <!-- add modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub-Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('subcategory.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputStatus" class="form-label">Category</label>
                            <select class="form-select" name="cate" id="exampleInputStatus">
                                <option class="form-control" value="" selected> --- Select Category --- </option>
                                @foreach($category as $c)
                                <option value="{{$c->id}}"> {{$c->name}} </option>
                                @endforeach
                            </select>
                            @error('cate')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Sub-Category Name</label>
                            <input type="text" name="subcate" class="form-control inputTextBox" id="exampleInputName">
                            @error('subcate')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Select Image</label>
                            <input type="file" id="image" accept="image/png, image/gif, image/jpeg, image/jpg, image/webp" name="subcate_image" class="form-control">
                            @error('subcate_image')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputStatus" class="form-label">Status</label>
                            <select class="form-select" name="status" id="exampleInputStatus">
                                <option class="form-control" value="" selected> --- Select Status --- </option>
                                <option value="active"> Active </option>
                                <option value="inactive"> Inactive </option>
                            </select>
                            @error('status')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal  -->

    <!-- Update Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/category" id="editform" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Sub-Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputStatus" class="form-label">Category</label>
                            <select class="form-select" name="cate" id="exampleInputStatus">
                                <option class="form-control" value="" selected> --- Select Category --- </option>
                                @foreach($category as $c)
                                <option value="{{$c->id}}" id="catname"> {{$c->category_name}} </option>
                                @endforeach
                            </select>
                            @error('status')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Sub-Category Name</label>
                            <input type="text" name="name" class="form-control inputTextBox" id="subcate">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputStatus" class="form-label">Status</label>
                            <select class="form-select" name="status" id="exampleInputStatus">
                                <option class="form-control" value="" id="select" selected> --- Select Status --- </option>
                                <option value="active"> Active </option>
                                <option value="inactive"> Inactive </option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Update Modal  -->


    <div class="container-fluid">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    @if(Session::has('add'))
                    <div class="alert alert-success" role="alert">
                        <span><strong>( {{ Session::get('add') }} ) Added</strong></span>
                    </div>
                    @endif

                    @if(Session::has('updated'))
                    <div class="alert alert-success" role="alert">
                        <span><strong>( {{ Session::get('updated') }} ) Updated</strong></span>
                    </div>
                    @endif

                    @if(Session::has('delete'))
                    <div class="alert alert-danger" role="alert">
                        <span><strong>( {{ Session::get('delete') }} ) Deleted</strong></span>
                    </div>
                    @endif

                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Sub-Category</button>
                    <h5 class="card-title fw-semibold mb-4">Sub-Category Data</h5>
                    <div class="table-responsive">
                        <!-- asdasd -->
                        <table id="dtBasicExample" class="table table-bordered text-nowrap mb-0 align-middle" cellspacing="0" width="100%">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Subcategory_Name</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Category_Name</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Image</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Delete</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Update</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sub_category as $s)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{$s->id}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{$s->name}}</h6>
                                    </td>
                                    @foreach($category as $c)
                                    @if($c->id == $s->parent_id)
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{$c->name}}</h6>
                                    </td>
                                    @endif
                                    @endforeach
                                    <td class="border-bottom-0">
                                        <img src="images/subcategory/{{$s->image}}" class="border border-primary rounded" alt="{{$s->image}}" width="80px" height="80px">
                                    </td>
                                    @php
                                    $status = 'danger';
                                    if($s->status == 'active')
                                    $status = 'success'
                                    @endphp
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-{{$status}} rounded-3 fw-semibold">{{$s->status}}</span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <form action="{{route('subcategory.destroy', $s->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                        <!-- <button type="submit" value="{{$s->id}}" class="btn btn-outline-danger btn-sm">Delete</button> -->
                                    </td>
                                    <td class="border-bottom-0">
                                        <button class="btn btn-outline-success editbtn btn-sm" value="{{$s->id}}" data-bs-toggle="modal" data-bs-target="#editModal{{$s->id}}">edit</button>
                                        <!-- <a href="{{route('subcategory.edit', $s->id)}}"><button type="submit" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button></a> -->

                                    </td>
                                </tr>

                                <!-- Update Modal -->
                                <div class="modal fade" id="editModal{{$s->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('subcategory.update', $s->id)}}" id="editform" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Sub-Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="exampleInputStatus" class="form-label">Category</label>
                                                        <select class="form-select" name="cate" id="exampleInputStatus">
                                                            @foreach($category as $c)
                                                            <option value="{{$c->id}}" {{$c->id == $s->parent_id ? 'selected' :''}}> {{$c->name}} </option>
                                                            @endforeach
                                                        </select>
                                                        @error('cate')
                                                        <p style="color:red;">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputName" class="form-label">Sub-Category Name</label>
                                                        <input type="text" name="subcate" value="{{$s->name}}" class="form-control inputTextBox" id="exampleInputName">
                                                        <label class="text-danger checkname">Numbers Not Allowed!</label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <img src="images/subcategory/{{$s->image}}" class="border border-primary rounded" alt="{{$s->image}}" width="80px" height="80px">
                                                        <label for="" class="form-label">Current Image</label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="uimage" class="form-label">Update Image</label>
                                                        <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg, image/webp" name="subcate_image">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputStatus" class="form-label">Status</label>
                                                        <select class="form-select" name="status" id="exampleInputStatus">
                                                            <option class="form-control" value="" id="select" selected> --- Select Status --- </option>
                                                            <option value="active" {{$s->status == 'active' ? 'selected' : ''}}> Active </option>
                                                            <option value="inactive" {{$s->status == 'inactive' ? 'selected' : ''}}> Inactive </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Update Modal  -->

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page level plugins -->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>
<script>
    $(document).ready(function() {

        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');

        // alert 
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);

        // only allow alphabets validation 
        // $('.checkname').hide();
        // $(".inputTextBox").keypress(function(event) {
        //     var inputValue = event.charCode;
        //     if (!(inputValue >= 65 && inputValue <= 122) && (inputValue != 32 && inputValue != 0)) {
        //         event.preventDefault();
        //         $('.checkname').show();
        //     } else {
        //         $('.checkname').hide();
        //     }
        // });

        // $(document).on('click', '.editbtn', function() {
        //     var id = $(this).val();
        //     // alert(id);
        //     $('#editModal').modal('show');
        //     $.ajax({
        //         type: "GET",
        //         url: "/subcategory/" + id,
        //         success: function(res) {
        //             var id = res.id;
        //             // console.log(res.id);
        //             $('#editform').attr('action', '/subcategory/' + res.id);
        //             $('#subcate').val(res.subcate_name);
        //             $('#catname').val(res.category_id);
        //             jQuery("select option[value=" + res.status + "]").attr('selected', 'selected');
        //         }
        //     })
        // })
    });
</script>
<title>Sub-Category</title>
@endsection