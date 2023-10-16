@extends('backend/header')
@section('backend')
<div class="body-wrapper">


    <!-- add modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputCategory" class="form-label">Category</label>
                            <select class="form-select exampleInputCategory" name="cate" id="exampleInputCategory">
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
                            <label for="exampleInputSubcate" class="form-label">Sub-Category</label>
                            <select class="form-select exampleInputSubcate" name="subcate" id="exampleInputSubcate">
                                <option class="form-control" value="" selected> --- Select Sub-Category --- </option>

                            </select>
                            @error('subcate')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputSKUID" class="form-label">SKU ID</label>
                            <input type="text" name="skuid" class="form-control" id="exampleInputSKUID">
                            @error('skuid')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Product Name</label>
                            <input type="text" name="product" class="form-control" id="exampleInputName">
                            @error('product')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Select Image</label>
                            <input type="file" id="image" accept="image/png, image/gif, image/jpeg, image/jpg, image/webp" name="image[]" class="form-control" multiple>
                            @error('image')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDesc" class="form-label">Description</label>
                            <input type="text" name="desc" class="form-control" id="exampleInputDesc">
                            @error('desc')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputMRP" class="form-label">MRP</label>
                            <input type="number" name="mrp" class="form-control" id="exampleInputMRP">
                            @error('mrp')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputRetail" class="form-label">Retail Price</label>
                            <input type="number" name="retail" class="form-control" id="exampleInputRetail">
                            @error('retail')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputWholesale" class="form-label">Wholesale Price</label>
                            <input type="number" name="wholesale" class="form-control" id="exampleInputWholesale">
                            @error('wholesale')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputMaterial" class="form-label">Material</label>
                            <input type="text" name="material" class="form-control" id="exampleInputMaterial">
                            @error('material')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputWidth" class="form-label">Width</label>
                            <input type="text" name="width" class="form-control" id="exampleInputWidth">
                            @error('width')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputHeight" class="form-label">Height</label>
                            <input type="text" name="height" class="form-control" id="exampleInputHeight">
                            @error('height')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDepth" class="form-label">Depth</label>
                            <input type="text" name="depth" class="form-control" id="exampleInputDepth">
                            @error('depth')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputWeight" class="form-label">Weight</label>
                            <input type="text" name="weight" class="form-control" id="exampleInputWeight">
                            @error('weight')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputTags" class="form-label">Tags</label>
                            <input type="text" name="tags" class="form-control" id="exampleInputTags">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputKeywords" class="form-label">Shop Keywords</label>
                            <input type="text" name="keyword" class="form-control" id="exampleInputKeywords">
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

                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>
                    <h5 class="card-title fw-semibold mb-4">Products Data</h5>
                    <div class="table-responsive">
                        <!-- asdasd -->
                        <table id="dtBasicExample" class="table table-bordered mb-0 text-nowrap align-middle" cellspacing="0" width="100%">
                            <button class="btn btn-primary mt-3 float-end seemore" style="right:40px;position:fixed;float:right;top:90px;">Show More Columns</button>
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Category Name</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Subcategory Name</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">SKU ID</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Product Name</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Image</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Description</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">MRP</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Retail Price</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Wholesale Price</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Material</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Width</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Height</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Depth</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Weight</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Tags</h6>
                                    </th>
                                    <th class="th-sm border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-0">Shop Keywords</h6>
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
                                @foreach($product as $p)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{$p->id}}</h6>
                                    </td>
                                    @foreach($category as $c)
                                    @if($c->id == $p->category_id)
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$c->name}}</h6>
                                    </td>
                                    @endif
                                    @endforeach
                                    @foreach($subcate as $s)
                                    @if($s->id == $p->subcate_id)
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$s->name}}</h6>
                                    </td>
                                    @endif
                                    @endforeach
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->sku_id}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{$p->product_name}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        @php
                                        $images = explode(',',$p->product_image);
                                        @endphp
                                        @foreach($images as $image)
                                        <img src="images/products/{{$image}}" class="border border-primary rounded" alt="{{$p->product_image}}" width="80px" height="80px">
                                        @endforeach
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->description}}</h6>
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->mrp}}</h6>
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->retail_price}}</h6>
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->wholesale_price}}</h6>
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->material}}</h6>
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->width}}</h6>
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->height}}</h6>
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->depth}}</h6>
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->weight}}</h6>
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->tags}}</h6>
                                    </td>
                                    <td class="border-bottom-0 hide">
                                        <h6 class="fw-semibold mb-1">{{$p->shop_keywords}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <form action="{{route('product.destroy', $p->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                        <!-- <button type="submit" value="{{$p->id}}" class="btn btn-outline-danger btn-sm">Delete</button> -->
                                    </td>
                                    <td class="border-bottom-0">
                                        <button class="btn btn-outline-success editbtn btn-sm" value="{{$p->id}}" data-bs-toggle="modal" data-bs-target="#editModal{{$p->id}}">edit</button>
                                        <!-- <a href="{{route('subcategory.edit', $p->id)}}"><button type="submit" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button></a> -->

                                    </td>
                                </tr>

                                <!-- Update Modal -->
                                <div class="modal fade" id="editModal{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('product.update', $p->id)}}" id="editform" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="exampleInputCategory" class="form-label">Category</label>
                                                        <select class="form-select exampleInputCategory" name="cate" id="exampleInputCategory">
                                                            @foreach($category as $c)
                                                            <option value="{{$c->id}}" {{$c->id == $p->category_id ? 'selected' :''}}> {{$c->name}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputSub" class="form-label">Sub-Category</label>
                                                        <select class="form-select exampleInputSubcate" name="subcate" id="exampleInputSubcate">
                                                            @foreach($subcate as $s)
                                                            <option value="{{$s->id}}" {{$s->id == $p->subcate_id ? 'selected' :''}}> {{$s->name}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputName" class="form-label">SKU ID</label>
                                                        <input type="text" name="skuid" value="{{$p->sku_id}}" class="form-control" id="exampleInputName">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputName" class="form-label">Product Name</label>
                                                        <input type="text" name="product" value="{{$p->product_name}}" class="form-control inputTextBox" id="exampleInputName">
                                                    </div>
                                                    <div class="mb-3">
                                                        @php
                                                        $images = explode(',',$p->product_image);
                                                        @endphp
                                                        @foreach($images as $image)
                                                        <img src="images/products/{{$image}}" class="border border-primary rounded" alt="{{$image}}" width="80px" height="80px">
                                                        @endforeach
                                                        <br><label for="" class="form-label">Current Image</label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="uimage" class="form-label">Update Product Image</label>
                                                        <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg, image/webp" name="image[]" multiple>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputDesc" class="form-label">Description</label>
                                                        <textarea name="desc" id="exampleInputDesc" value="{{$p->description}}" class="form-control" cols="30" rows="3">{{$p->description}}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputMRP" class="form-label">MRP</label>
                                                        <input type="text" name="mrp" value="{{$p->mrp}}" class="form-control" id="exampleInputMRP">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputRetail" class="form-label">Retail Price</label>
                                                        <input type="text" name="retail" value="{{$p->retail_price}}" class="form-control" id="exampleInputRetail">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputRetail" class="form-label">Wholesale Price</label>
                                                        <input type="text" name="wholesale" value="{{$p->wholesale_price}}" class="form-control" id="exampleInputRetail">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputMaterial" class="form-label">Material</label>
                                                        <input type="text" name="material" value="{{$p->material}}" class="form-control" id="exampleInputMaterial">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputWidth" class="form-label">Width</label>
                                                        <input type="text" name="width" value="{{$p->width}}" class="form-control" id="exampleInputWidth">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputHeight" class="form-label">Height</label>
                                                        <input type="text" name="height" value="{{$p->height}}" class="form-control" id="exampleInputHeight">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputDepth" class="form-label">Depth</label>
                                                        <input type="text" name="depth" value="{{$p->depth}}" class="form-control" id="exampleInputDepth">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputWeight" class="form-label">Weight</label>
                                                        <input type="text" name="weight" value="{{$p->weight}}" class="form-control" id="exampleInputWeight">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputTags" class="form-label">Tags</label>
                                                        <input type="text" name="tags" value="{{$p->tags}}" class="form-control" id="exampleInputTags">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputKey" class="form-label">Shop Keywords</label>
                                                        <input type="text" name="keyword" value="{{$p->shop_keywords}}" class="form-control" id="exampleInputKey">
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
    $('.hide').hide();
    $('.seemore').click(function() {
        var $this = $(this);
        $this.toggleClass('seemore');
        if ($this.hasClass('seemore')) {
            $this.text('Show More Columns');
            $('.hide').hide();
        } else {
            $this.text('Hide Columns');
            $('.hide').show();
        }
    });
    $(document).ready(function() {


        // $('#exampleInputSubcate')
        $('.exampleInputCategory').on('change', function(e) {
            var id = e.target.value;
            $.ajax({
                type: 'POST',
                url: "api/getsubcate/" + id,
                success: function(res) {
                    $.each(res, function(index, subcatObj) {
                        $('.exampleInputSubcate').append('<option value ="' + subcatObj.id + '">' + subcatObj.name + '</option>');
                        // console.log(subcatObj.id);
                    });
                }
            });
            $('.exampleInputSubcate').empty();
            $('.exampleInputSubcate').append('<option class="form-control" value="" selected> --- Select Sub-Category --- </option>');
            // <option class="form-control" value="" selected> --- Select Sub-Category --- </option>
        });


        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');

        // alert 
        // window.setTimeout(function() {
        //     $(".alert").fadeTo(500, 0).slideUp(500, function() {
        //         $(this).remove();
        //     });
        // }, 2000);

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
<title>Products</title>
@endsection