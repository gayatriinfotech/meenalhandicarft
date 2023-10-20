@extends('frontend/header1')
@section('frontend')
<div class="container rounded bg-white mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{$data->firstname}}</span></div>
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <form action="{{route('profileupdate', $data->id)}}" method="post">
                    @csrf
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Edit Profile</h4>
                    </div>
                    <div class="row mt-2 mb-3">
                        <div class="col-md-6"><label class="labels">Firstname</label><input type="text" name="fname" value="{{$data->firstname}}" class="form-control" placeholder="first name"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" name="lname" value="{{$data->lastname}}" class="form-control" placeholder="surname"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3"><label class="labels">Mobile Number</label><input type="text" name="mobileno" value="{{$data->mobileno}}" class="form-control" placeholder="enter phone number"></div>
                        <div class="col-md-12 mb-3"><label class="labels">Email ID</label><input type="email" name="email" value="{{$data->email}}" class="form-control" placeholder="enter email id" readonly></div>
                        <h5>Gender</h5>
                        <div class="form-check mx-3">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male" {{$data->gender == 'Male' ? 'checked' : ''}}>
                            <label class="form-check-label" for="exampleRadios1">Male</label>
                        </div>
                        <div class="form-check mx-3 mb-3">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female" {{$data->gender == 'Female' ? 'checked' : ''}}>
                            <label class="form-check-label" for="exampleRadios2">Female</label>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mt-3 mb-2">
                        <h4 class="text-right">Edit Address</h4>
                    </div>
                    <div class="col-md-12 mb-3"><label class="labels">Address (Area and Street)</label><input name="address" type="text" class="form-control" value="{{$data->address}}"></div>
                    <div class="col-md-12 mb-3"><label class="labels">Landmark</label><input type="text" name="landmark" class="form-control" value="{{$data->landmark}}"></div>
                    <div class="col-md-12 mb-3"><label class="labels">Postal Code</label><input type="text" name="pincode" id="pincode" class="form-control" value="{{$data->pincode}}"></div>
                    <div class="col-md-12 mb-3"><label class="labels">Country</label><input type="text" name="country" id="country" class="form-control" value="{{$data->country}}"></div>
                    <div class="col-md-12 mb-3"><label class="labels">State</label><input type="text" name="state" id="state" class="form-control" value="{{$data->state}}"></div>
                    <div class="col-md-12 mb-3"><label class="labels">City</label><input type="text" name="city" id="city" class="form-control" value="{{$data->city}}"></div>
                    <!-- https://api.postalpincode.in/pincode/413005 -->

                    <div class="mt-5 text-center"><input class="btn btn-warning profile-button" type="submit" value="Save"></div>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
    $('#pincode').keyup(function(e) {
        var pincode = e.target.value;
        if (pincode.length >= 6) {
            $.ajax({
                type: 'GET',
                url: "https://api.postalpincode.in/pincode/" + pincode,
                success: function(res) {
                    console.log(res[0].PostOffice[0].District);
                    $('#city').val(res[0].PostOffice[0].District);
                    $('#state').val(res[0].PostOffice[0].State);
                    $('#country').val(res[0].PostOffice[0].Country);
                }
            })

        } else {
            $('#city').val('');
            $('#state').val('');
            $('#country').val('');
        }
    });
</script>
@endsection