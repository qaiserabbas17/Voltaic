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
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
              <div class="bg-skyblue">
                <p class="mt-2">Patients</p>
                <table id="order" class="table table-hover table-condensed">
                    <tbody>
                      <tr>
                        <td>Daniel Palsagar</td>
                        <td data-th="Subtotal" class="text-center">Active</td>
                      </tr>
                    </tbody>
                 </table>  
              </div>
            </div>
            <div class="col-md-3">
              <div class="bg-lightgreen">
                <p class="mt-2">Lab Results</p>
                <table id="order" class="table table-hover table-condensed">
                    <tbody>
                      <tr>
                        <td>Asif Shabbir</td>
                        <td data-th="Subtotal" class="text-center">Not Available</td>
                      </tr>
                      <tr>
                        <td>Daniel Palsagar</td>
                        <td data-th="Subtotal" class="text-center">Available</td>
                      </tr>                
                    </tbody>
                 </table>  
              </div>
            </div>
            <div class="col-md-3">
               <div class="bg-skyblue">
                <p class="mt-2">Orders</p>
                <table id="order" class="table table-hover table-condensed">
                    <tbody>
                      <tr>
                        <td>Rapid Test</td>
                        <td data-th="Subtotal" class="text-center">3 Patients</td>
                      </tr>
                      <tr>
                         <td>Antigen Test</td>
                         <td data-th="Subtotal" class="text-center">1 Patient</td>
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