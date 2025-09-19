@extends('template.template')

@section('pagecontent')
    {{-- Notice Popup --}}
    @include('frontend.landing.notice')

    {{-- Sections --}}
    <section id="hero">
        @include('frontend.landing.hero')
    </section>

    <section id="about">
        @include('frontend.landing.about')
    </section>

    <section id="facility">
        @include('frontend.landing.facility')
    </section>

    <section id="events">
        @include('frontend.landing.events')
    </section>
    <section id="room">
        @include('frontend.landing.room')
    </section>

    <section id="gallery">
        @include('frontend.landing.gallery')
    </section>
    <section id="faq">
        @include('frontend.landing.faq')
    </section>
@endsection
@section('scripts')
    <script>
        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>