@extends('admin.layouts.admin')
@section('title')
    Dashboard
@endsection
@section('body')
<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x " style="color: blue"></i>
                            <div class="ms-3">
                                <p class="mb-2">Active Hour</p>
                                <h6 class="mb-0">100</h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                           <i class="fa fa-chart-line fa-3x " style="color: blue"></i>
                            <div class="ms-3">
                               <p class="mb-2">Total Mentor</p></a>
                                <h6 class="mb-0">
                                   
                               
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                           <i class="fa fa-chart-line fa-3x " style="color: blue"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Customer</p>
                                <h6 class="mb-0">  
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Total Customer</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Active Hour</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->

            


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Customer</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Course</th>
                                   
                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2022</td>
                                    <td>INV-0123</td>
                                    <td>Anil Sharma</td>
                                    <td>123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-success" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2022</td>
                                    <td>INV-0123</td>
                                    <td>Anil Sharma</td>
                                    <td>123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-success" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2022</td>
                                    <td>INV-0123</td>
                                    <td>Anil Sharma</td>
                                    <td>123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-success" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>01 Jan 2022</td>
                                    <td>INV-0123</td>
                                    <td>Anil Sharma</td>
                                    <td>123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-success" href="">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
@endsection
