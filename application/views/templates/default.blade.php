@include('templates.header')
  <div class="page-content-wrapper">
  	<div class="content-header">
  		<a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
  	</div>
  	<div class="page-content inset">
  		@yield('conteudo')
  	</div>
  </div>
@include('templates.footer')