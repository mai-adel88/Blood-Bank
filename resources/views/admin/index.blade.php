@include('admin.layouts.header')
@include('admin.layouts.nav')


    
    

    <!-- Main content -->
    <section class="content">
    	{{-- @include('admin.layouts.messages') --}}
    	@yield('page_title')
    	@yield('content') 
    </section>
  

@include('admin.layouts.footer')


