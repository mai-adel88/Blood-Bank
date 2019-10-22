@include('style.layouts.header')
@include('style.layouts.nav')


    
    

    <!-- Main content -->
    <section class="content">
    	{{-- @include('style.layouts.messages') --}}
    	@yield('page_title')
    	@yield('content') 
    </section>
  

@include('style.layouts.footer')