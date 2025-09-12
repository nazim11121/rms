@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Check In</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Form2</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Add</a>
                </li>
              </ul>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header bg-light">
                            <h4 class="mb-0">Add Check In Information</h4>
                        </div>
                        <div class="container">
                            <form method="POST" action="{{ route('admin.checkIn.page2.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $id }}">
                                <!-- Room Selection Section -->
                                @foreach($roomList as $roomType)
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h6><i class="bi bi-list"></i> {{ $roomType->name }} <span class="text-danger fw-bold"> {{ $roomType->base_price }}.00</span> / per room</h6>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Select</th>
                                                        <th>Room No.</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($roomType->rooms as $room)
                                                        <tr>
                                                            <td><input type="checkbox" name="room_id[]" value="{{ $room->id }}" {{$room->available_status == 1 ? 'disabled':''}}></td>
                                                            <td>{{ $room->room_no }}</td>
                                                            <td>
                                                                @if($room->available_status == 1)
                                                                    <span class="badge bg-secondary">Booked</span>
                                                                @else
                                                                    <span class="badge bg-success">Available</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Guest Information Section -->
                                <div class="card mt-4">
                                    <!-- <div class="card-header">
                                        <h5>Guest Type</h5>
                                        <div>
                                            <input type="radio" name="guestType" checked> New Guest
                                            <input type="radio" name="guestType"> Existing Guest
                                        </div>
                                    </div> -->
                                    <div class="card-body">
                                        <form>
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label">Full Name *</label>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter First Name" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Mobile No. *</label>
                                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile No." required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">E-mail</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter E-mail">
                                                </div>
                                            </div>
                                            <div class="row g-3 mt-2">
                                                <div class="col-md-2">
                                                    <label class="form-label">Age</label>
                                                    <input type="number" class="form-control" name="age" id="age" placeholder="Enter Age">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Gender *</label>
                                                    <select class="form-control" name="gender" id="gender" required>
                                                        <option value="">--Select--</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Address *</label>
                                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">NID No. *</label>
                                                    <input type="number" class="form-control" name="nid_no" id="nid_no">
                                                </div>
                                            </div>
                                            <div class="row g-3 mt-2">
                                                <div class="col-md-4">
                                                    <label class="form-label">Document</label>
                                                    <input type="file" class="form-control" name="file" id="file">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection