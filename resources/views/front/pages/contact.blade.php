@extends('front.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Contact')
@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="breadcrumbs mb-4"> <a href="{{route('home')}}">Home</a>
                <span class="mx-1">/</span>  <a href="#!">Contact</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="pr-0 pr-lg-4">
                <div class="content">
                    <div class="mt-5">
                        <p class="h3 mb-3 font-weight-normal"><a class="text-dark" href="mailto:hello@reporter.com">oueldbeyad.sara@gmail.com</a>
                        </p>
                        <p class="mb-3"><a class="text-dark" href="tel:+211234565523">+212 80008286</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0">
            <form method="POST" action="{{ route('contact.submit') }}" class="row" wire:submit.prevent='addContact()'>
                @csrf
                <div class="col-md-6">
                    <input type="text" class="form-control mb-4" placeholder="Name" name="name" id="name" wire:model='name'>
                </div>
                <div class="col-md-6">
                    <input type="email" class="form-control mb-4" placeholder="Email" name="email" id="email" wire:model='email'>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control mb-4" placeholder="Subject" name="subject" id="subject" wire:model='subject'>
                </div>
                <div class="col-12">
                    <textarea name="message" id="message" class="form-control mb-4" placeholder="Type You Message Here" rows="5" wire:model='message'></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-outline-primary" type="submit">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection