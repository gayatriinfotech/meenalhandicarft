@extends('frontend/header1')
@section('frontend')
<div class="container">
    <div class="row">
        <div class="col-md-6 bg-light">
            <h4 class="text-center mt-3">Contact Us</h4><br>
            <form action="contact" method="POST">
                @csrf
                <div class="row mb-3 col-md-11 col-11 m-auto">
                    <div class="col">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                        <p style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Mobile No</label>
                        <input type="number" name="mobileno" class="form-control">
                        @error('mobileno')
                        <p style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row col-md-11 col-11 m-auto">

                    <div class="col">
                    <label for="name" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control mb-3">
                    @error('email')
                    <p style="color: red;">{{$message}}</p>
                    @enderror
                    </div>
                </div>
                <div class="row col-md-11 col-11 m-auto">
                    <div class="col">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" cols="57" rows="3"></textarea>
                    @error('message')
                    <p style="color: red;">{{$message}}</p>
                    @enderror
                    <input type="submit" class="mt-3 btn btn-danger">
                    </div>
                </div>
            </form>
            <br>
        </div>

        <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60826.110239669535!2d75.8525762216797!3d17.667585300000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc5da64017f2cad%3A0x9696761cef43dc11!2sVertex%20Technosys!5e0!3m2!1sen!2sin!4v1696161014822!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <div class="location-form">
                <i class="fa fa-location-dot" id="icon-form1"></i>
            </div>
            <span class="ms-5"><b>Address : </b>198 West 21th Street, Suite 721 New York NY 10016</span>
        </div>
        <div class="col-md-3">
            <div class="location-form">
                <i class="fa fa-phone" id="icon-form1"></i>
            </div>
            <span class="ms-5"><b>Phone : </b> + 1235 2355 98</span>
        </div>
        <div class="col-md-3">
            <div class="location-form">
                <i class="fa fa-paper-plane" id="icon-form1"></i>
            </div>
            <span class="ms-5"><b>Email : </b> info@yoursite.com</span>
        </div>
        <div class="col-md-3">
            <div class="location-form">
                <i class="fa-solid fa-globe" id="icon-form1"></i>
            </div>
            <span class="ms-5"><b>Website : </b>yoursite.com</span>
        </div>
    </div>
</div>
@endsection