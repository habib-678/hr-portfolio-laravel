<form id="logoutForm" method="POST" action="{{ route('admin.logout') }}" style="z-index: 10000; position: absolute;">
    @csrf
    <button type="submit">Logout</button>
</form>
@extends('backend.layouts.backend-app')
@section('title', 'Dashboard')
