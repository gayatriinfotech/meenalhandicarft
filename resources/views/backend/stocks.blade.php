@extends('backend/header')
@section('backend')
<div class="body-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">

                    <h5 class="card-title fw-semibold mb-4">Product Stocks</h5>
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
                                        <h6 class="fw-semibold mb-0">Stocks</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stock as $s)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{$s->id}}</h6>
                                    </td>
                                    @foreach($product as $p)
                                    @if($p->id == $s->product_id)
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{$p->product_name}}</h6>
                                    </td>
                                    @endif
                                    @endforeach
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{$s->stocks}}</h6>
                                    </td>
                                </tr>

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