</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script("js/jquery.js")}}
    {{ HTML::script("js/transition.js")}}
    {{ HTML::script("js/alert.js")}}
    {{ HTML::script("js/modal.js")}}
    {{ HTML::script("js/dropdown.js")}}
    {{ HTML::script("js/scrollspy.js")}}
    {{ HTML::script("js/tab.js")}}
    {{ HTML::script("js/tooltip.js")}}
    {{ HTML::script("js/popover.js")}}
    {{ HTML::script("js/button.js")}}
    {{ HTML::script("js/collapse.js")}}
    {{ HTML::script("js/carousel.js")}}
    {{ HTML::script("js/app.v1.js")}}

    <script type="text/javascript">
      
      $("#menu-toggle").click(function(e){
        e.preventDefault();
        $('#wrapper').toggleClass("active");
      });

      window.setTimeout(function(){
        $(".alert-danger").fadeTo(500,0).slideUp(500, function(){
          $(this).remove();
        });
      }, 2000);

    </script>

  @yield('scripts')

  </body>
</html>
