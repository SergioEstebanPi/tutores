<nav class="navbar navbar-default navbar-fixed-top bordeinferior">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">TUTORES</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li><a href="/noticias" class="btn-default">Noticias</a></li>
            @if(Auth::check())
              <li><a href="/publicacion" class="btn-default">Publicaciones</a></li>
              <li><a href="/cotizacion" class="btn-default">Cotizaciones</a></li>
              <li><a href="/transaccion" class="btn-default">Transacciones</a></li>
            @endif
            @if(!Auth::check())
              <li><a href="/registro" class="btn-default">Registro</a></li>
            @endif
            <li><a href="#" class="btn-default">Acerca de</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
              <li class="dropdown">
                <a class="btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">              
                    Notificaciones<span class="caret">
                </a>
                <ul  class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/publicacion">Recientes</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/cotizacion">Mis cotizaciones</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/puntuacion">Mi puntuación</a></li>
                </ul>
              </li>
              <li class="dropdown">
                  <a class="btn-default dropdown-toggle" type="button" id="menu2" data-toggle="dropdown">              
                    <span class="glyphicon glyphicon-user"></span>{{Auth::user()->email}}<span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/mi_perfil">Mi perfil</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/publicacion">Mis publicaciones</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/cotizacion">Mis cotizaciones</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/puntuacion">Mi puntuación</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/logout">Salir</a></li>
                  </ul>
              </li>
            @else
              <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span>Iniciar</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
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
            @if(!Auth::check())
              @include('alertas.mensaje')
              @include('principal.login.forms.index')
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>