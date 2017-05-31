<nav class="navbar navbar navbar-fixed-top">
  <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand btn-primary" href="/">TUTORES</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="/publicacion" class="btn-default">Publicaciones</a></li>
        <li><a href="#" class="btn-default">Noticias</a></li>
        <li><a href="/registro" class="btn-default">Registro</a></li>
        <li><a href="#" class="btn-default">Acerca de</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
          <li><a href="#"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
        @else
          <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span>Iniciar</a></li>
        @endif
      </ul>
  </div>
</nav>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header btn-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Iniciar Sesión</h4>
        </div>
        <div class="modal-body">
          <div>
            @include('alertas.mensaje')
            @if(!Auth::check())
              @include('principal.login.forms.index')
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>