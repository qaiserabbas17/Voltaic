@extends('layouts.frontend')

@section('content')
    <section id="" class="section-bg">
      <div class="container">
        <div class="row mt-4">
          <div class="col-md-12 mt-5 dash-subheader" >
            <h2 class="align-self-center">Hello {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}! Welcome to your dashboard</h2> <img src="images/dash-user.svg">
          </div>
        </div>
        <div class="row mt-5">
            <div class="col-auto col-md-3 px-sm-2 px-0 ">
                <div class="d-flex flex-column bg-white align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                       
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item 1</span> </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item 1</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span><span class="orders">3</span></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Active Test</span> </a>
                        </li>
                       
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Lab Results</span> </a>
                                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                   
                </div>
            </div>
            <div class="col-md-9 py-3 mt-4">
              <h4>Order</h4>
                <table id="dash-order" class="table table-hover table-condensed bg-white">
                    <thead class="border-0">
                      <tr>
                        <th >Order Details</th>
                        <th >Dates</th>
                        <th >Quantity</th>
                        <th >Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>PCR Test</td>
                        <td >17-05-2021</td>
                        <td >5</td>
                        <td >£150</td>
                      </tr>   
                    </tbody>
                 </table>  
            </div>
          </div>
        </div>
      </div>
  </section>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
  
    