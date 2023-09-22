<!DOCTYPE html>
    <html lang="en">
    
        @yield("head")

    <body>
        <div class="loader"></div>
       @include("admin-layout.header")
       @include('admin-layout.leftbar')
       @yield("content")
       
       
      @yield("footer_links")

</body>
</html>