@include("layouts.main_header")
@include("layouts.sidebar")
<div class="main-panel">
<!-- <div class="main-panel" style=" background: black; "> -->
    @include("layouts.header")
      <div class="container" >
        <div class="page-inner">
          @yield("page")
        </div>
      </div> 
    @include("layouts.footer")
</div>
@include("layouts.main_footer");      