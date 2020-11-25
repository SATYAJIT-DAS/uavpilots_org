
</div>
<!-- build:js {{ asset('js/basik_js/site.min.js ') }} -->
<!-- jQuery -->
<script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- ajax page -->
<script src="{{ asset('libs/pjax/pjax.min.js ') }}"></script>
<script src="{{ asset('js/basik_js/ajax.js ') }}"></script>
<!-- lazyload plugin -->
<script src="{{ asset('js/basik_js/lazyload.config.js') }}"></script>
<script src="{{ asset('js/basik_js/lazyload.js') }}"></script>
<script src="{{ asset('js/basik_js/plugin.js') }}"></script>





<!-- feathericon -->
<script src="{{ asset('libs/feather-icons/dist/feather.min.js') }}"></script>
<script src="{{ asset('js/basik_js/plugins/feathericon.js') }}"></script>
<!-- theme -->
<script src="{{ asset('js/basik_js/theme.js') }}"></script>
<script src="{{ asset('js/basik_js/utils.js') }}"></script>
<!-- endbuild -->
{{-- custom js  for admin--}}
@if (Request::is('admin/*'))
<script src="{{asset('js/admin/script.js')}}"></script>
@endif
<script src="{{ asset('js/frontend/script.js') }}"></script>

@if(Request::is('/'))
@endif
<script src = "https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer ></script>
<script src = "https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" defer ></script>
<script src="{{asset('js/app.js')}}"></script>   
<script src="{{asset('js/update-profile-picture.js')}}"></script> 
<script src="{{asset('js/update-profilebyUser.js')}}"></script> 
    </body>
</html>



