@extends('backend/header')
@section('backend')

<!--  Main wrapper -->
<div class="body-wrapper">
    
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Category -->
                    <div class="card overflow-hidden border border-primary shadow">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Total Categories</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">Categories Count</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <!-- Product -->
                    <div class="card overflow-hidden border border-primary shadow">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Total Products</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">product_count</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <!-- Contact -->
                    <div class="card overflow-hidden border border-primary shadow">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Total Contacts</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">contact_count</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <!-- Feedback -->
                    <div class="card overflow-hidden border border-primary shadow">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Total Feedbacks</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">feedback_count</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <!-- Enquiry -->
                    <div class="card overflow-hidden border border-primary shadow">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Total Enquiries</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3">enquiry_count</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<title>Handcraft</title>
@endsection