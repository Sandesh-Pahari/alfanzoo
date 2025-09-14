@extends('template.template')

@section('pagecontent')
    <section id="hero" class="">
        @include('frontend.landing.hero')
    </section>
    <section id="about" class="">
        @include('frontend.landing.about')
    </section>
    <section id="facility" class="">
        @include('frontend.landing.facility')
    </section>
    <section id="facility" class="">
        @include('frontend.landing.room')
    </section>
    <section id="facility" class="">
        @include('frontend.landing.gallery')
    </section>
    

    
@endsection