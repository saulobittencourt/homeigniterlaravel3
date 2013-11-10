@layout('templates.login')

@section('login')
<section id="content" class="m-t-lg wrapper-md animated fadeInDown" style="margin-top:100px"> 
    <div class="nav-brand">
        {{HTML::image('images/home_igniter.png','Home Igniter',array('style'=>'width:200px'))}}  
    </div> 
    <div class="row m-n"> 
        <div class="col-md-4 col-md-offset-4 m-t-lg"> 
            <section style="padding:8px">

                <!-- Se der erro mostrar alert -->
                @if(Session::has('flash_notice'))
                    <div id="flash_notice" class="alert alert-success"> 
                        <button type="button" class="close" data-dismiss="alert">
                           <i class="icon-remove"></i>
                        </button> 
                        <p>{{Session::get('flash_notice')}}</p> 
                    </div>
                @endif  
  
                @if(Session::has('flash_error'))
                  <div id="flash_error" class="alert alert-danger"> 
                      <button type="button" class="close" data-dismiss="alert">
                         <i class="icon-remove"></i>
                      </button> 
                      <p>{{Session::get('flash_error')}}</p> 
                  </div>
                @endif            
                <!-- Se der erro mostrar alert -->

                <form method="POST">
                    <div class="form-group"> 
                        <input REQUIRED autofocus type="text" id="username" name="username" placeholder="Usuário" class="form-control"> 
                    </div> 
                    <div class="form-group"> 
                        <input REQUIRED type="password" id="password" name="password" placeholder="Senha" class="form-control"> 
                    </div> 
                    <a href="#" class="pull-right m-t-xs">
                        <small>
                            Esqueceu a senha?
                        </small>
                    </a> 
                    <button type="submit" class="btn btn-default">
                        Acessar
                    </button> 
                </form>

                <div class="line line-dashed"></div> 
                <p>Acessar utizando:</p>

                <a href="{{URL::to_route('fblogin')}}" class="btn btn-rounded btn-facebook btn-icon">
                    <i class="icon-facebook"></i>
                </a>

                <a href="#" class="btn btn-rounded btn-twitter btn-icon">
                    <i class="icon-twitter"></i>
                </a>
                <a href="#" class="btn btn-rounded btn-gplus btn-icon">
                    <i class="icon-google-plus"></i>
                </a>
        </section> 
        </div> 
    </div> 
</section>
@endsection