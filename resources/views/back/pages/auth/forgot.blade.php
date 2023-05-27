@extends('back.layouts.auth-layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : 'Forgot password')
@section('content')

<script src="./back/dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./back/static/logo.svg" height="36" alt=""></a>
        </div>
        @livewire('author-forgot-form')
        <div class="text-center text-muted mt-3">
          Forget it, <a href="{{  route('author.login') }}">send me back</a> to the sign in screen.
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./back/dist/js/tabler.min.js?1674944402" defer></script>
    <script src="./back/dist/js/demo.min.js?1674944402" defer></script>

@endsection