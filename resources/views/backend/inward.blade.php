@extends('backend/header')
@section('backend')
<div class="body-wrapper">


    <!-- add modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Inward</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('inward.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputStatus" class="form-label">Select Product</label>
                            <select class="form-select" name="product_id" id="exampleInputStatus">
                                <option class="form-control" value="" selected> --- Select Product --- </option>
                                @foreach($product as $p)
                                <option value="{{$p->id}}"> {{$p->product_name}} </option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Add Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control">
                            @error('quantity')
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




    <div class="container-fluid">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">

                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Inward</button>
                    <h5 class="card-title fw-semibold mb-4">Inward Data</h5>
                    <div class="table-responsive">
                        <!-- asdasd -->
                        <table id="dtBasicExample" class="table table-bordered text-nowrap mb-0 align-middle" cellspacing="0" width="100%">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Product Name</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Quantity</h6>
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
                                @foreach($inward as $i)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{$i->id}}</h6>
                                    </td>
                                    @foreach($product as $p)
                                    @if($p->id == $i->product_id)
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{$p->product_name}}</h6>
                                    </td>
                                    @endif
                                    @endforeach
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{$i->quantity}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <form action="{{route('inward.destroy', $i->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                    <td class="border-bottom-0">
                                        <button class="btn btn-outline-success editbtn btn-sm" value="{{$i->id}}" data-bs-toggle="modal" data-bs-target="#editModal{{$i->id}}">edit</button>

                                    </td>
                                </tr>

                                <!-- Update Modal -->
                                <div class="modal fade" id="editModal{{$i->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('inward.update', $i->id)}}" id="editform" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Quantity</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="product_id" class="form-label">Product Name</label>
                                                        @foreach($product as $p)
                                                        @if($p->id == $i->product_id)
                                                        <input type="text" id="product_id" value="{{$p->product_name}}" name="product_id" class="form-control" readonly>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="quantity" class="form-label">Add Quantity</label>
                                                        <input type="number" name="quantity" value="{{$i->quantity}}" id="quantity" class="form-control">
                                                        
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
        $('.checkname').hide();
        $(".inputTextBox").keypress(function(event) {
            var inputValue = event.charCode;
            if (!(inputValue >= 65 && inputValue <= 122) && (inputValue != 32 && inputValue != 0)) {
                event.preventDefault();
                $('.checkname').show();
            } else {
                $('.checkname').hide();
            }
        });

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
<title>Inward</title>
@endsection