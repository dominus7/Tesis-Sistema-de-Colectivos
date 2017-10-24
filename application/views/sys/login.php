<link rel="stylesheet" type="text/css" href="css/login.css">
      <div id="login">          
          <div id="login-content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centerTable" style="height: 100%;padding-left: 35%;">            
            <table>
              <tr>
                  <td align="center">
                    <img id="avatarLogin" src="dist/img/avatar5.png" alt="Avatar Usuario Logueado" class="img-responsive img-circle">
                  </td>
              </tr>
              <tr>
                <td align="center">
                  <h1 class="saludo">Bienvenido</h1>
                </td>
              </tr>
              <tr>
                <td align="center">
                    <label id="userLogin"></label>
                    <input type="text" id="user" placeholder= "Usuario" style="text-align: center; width: 100%;">
                    <input type="password" id="pass" placeholder= "Contraseña" style="margin-top: 2%; text-align: center; width: 100%;" onkeyup = "if (event.keyCode == 13)
                                                  btn_conectar()">
                </td>
              </tr>
              <tr>
                <td align="center">           
                 <button id="conectar" class="btn btn-primary" style="text-align: center; width: 100%; margin-top: 2%;"><b>Ingresar</b></button>
                </td>
              </tr>     
            </table>                        
      </div>
</div>