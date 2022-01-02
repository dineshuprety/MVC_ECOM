@extends('layouts.base')

@section('body')

          <!--Navigation -->
            @include('includes.nav')
        @yield('content')
        <div class="notify text-center" ></div> 
        <div class="notifyerror text-center" ></div> 
@stop