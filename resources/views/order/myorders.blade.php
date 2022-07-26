@extends('layouts.app')

@push('top-scripts')
<style>
  .hover-bg:hover {
    background: #d4d4d4;
  }

  .hover-bg.active {
    background: #d4d4d4;
  }
</style>
@endpush

@section('content')
@foreach ($orders as $order)
<div class="col-8 mx-auto p-1">
  <div class="card" style="border-radius: 10px;">
    <div class="card-body p-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
        <p class="small text-muted mb-0">Receipt Voucher : {{ $order->order_number }}</p>
      </div>
      @foreach ($order->orderItems as $item)

      <div class="card shadow-0 border mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-md-2">
              <img src="{{ $item->product->first_photo_url }}" class="img-fluid" alt="Phone">
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
              <p class="text-muted mb-0">{{$item->name}}</p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
              <p class="text-muted mb-0 small">{{ $item->description }}</p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
              <p class="text-muted mb-0 small">Qty: {{ $item->quantity }}</p>
            </div>
            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
              <p class="text-muted mb-0 small">${{ $item->price }}</p>
            </div>
          </div>
          <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
          <div class="row d-flex align-items-center">
            <div class="col-md-2">
              <p class="text-muted mb-0 small">Track Order</p>
            </div>
            <div class="col-md-10">
              <div class="progress" style="height: 6px; border-radius: 16px;">
                <div class="progress-bar" role="progressbar"
                  style="width: 65%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="d-flex justify-content-around mb-1">
                <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="d-flex justify-content-between pt-2">
        <p class="fw-bold mb-0">Order Details</p>
        <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> ${{
          number_format($order->orderItems->sum(function($q) {
                                                return $q->product->price * $q->quantity;
                                                }), 2) }} </p>
      </div>

      <div class="d-flex justify-content-between pt-2">
        <p class="text-muted mb-0">Invoice Number : {{ $order->order_number }}</p>
      </div>

      <div class="d-flex justify-content-between">
        <p class="text-muted mb-0">Invoice Date : {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y')
          }}</p>
        <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
      </div>

    </div>
    <div class="card-footer border-0 px-4 py-5 row"
      style="background-color: #f19001; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
      <div class="col-3">
        <span class="text-white p-2" style="background-color: {{ $order->status == "completed" ? '#98ad89' : '#3f3a3a' }}">{{ $order->status }}</span>
        @if ($order->status != "completed")
        <a href="{{ route('order.complete', $order->id) }}">mark as completed</a>
        @endif
      </div>
      <div class="text-right col-8">
        <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0 text-right"
          style="float: right">Total
          paid: <span class="h2 mb-0 ms-2">${{ number_format($order->orderItems->sum(function($q) {
                                                return $q->product->price * $q->quantity;
                                                }) + (
            $order->orderItems->sum(function($q) {
                                                return $q->product->price * $q->quantity;
                                                }) * 0.15 ), 2) }}</span></h5>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection