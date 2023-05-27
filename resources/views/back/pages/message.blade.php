@extends('back.layouts.pages-layout')
@section('pageTitle',@isset($pageTitle) ? $pageTitle : 'Contact' )
@section('content')

@livewire('contact')

@endsection