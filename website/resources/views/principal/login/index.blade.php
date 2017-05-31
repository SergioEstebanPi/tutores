@extends('layouts.index')
@include('alertas.mensaje')
@if(!Auth::check())
  @include('principal.login.forms.index')
@endif  

