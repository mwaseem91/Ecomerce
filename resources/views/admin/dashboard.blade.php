@extends('admin.layout.layout')
@section('contant')
<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
      <div class="count">{{ $total_user }}</div>
      <span class="count_bottom"><i class="green">4% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-clock-o"></i>Total Category</span>
      <div class="count">{{ $category }}</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="bi bi-gift-fill"></i> Total product</span>
      <div class="count green">{{  $products }}</div>
      <span class="count_bottom"><i class="green"><i class="bi bi-gift-fill"></i>34% </i> From last Week</span>
    </div>
  </div>    
@endsection
