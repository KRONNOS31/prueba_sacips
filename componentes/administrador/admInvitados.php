<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="tab-movs">

        <div class="barra-botones">
            <p class="titulo-movs">Invitados</p>
    
            <div class="b-busqueda">
                <select name="tipo" id="tipo">
                    <option disabled selected>Buscar por</option>
                    <option value="">Fecha</option>
                    <option value="">Telefono</option>
                    <option value="">Cedula</option>
                    <option value="">Rif</option>
                  </select>
                <input type="text" name="buscar" placeholder="Buscar" id="buscar">
    
                <img src="img/buscar.png" alt="">
            </div>
    
        </div>
        <form action="">
    
            <table>
                <tr>
    
                    <th class="t-head">Nombre</th>
                    <th class="t-head">Cedula / Rif</th>
                    <th class="t-head">Fecha de Ingreso</th>
                    <th class="t-head">Correo</th>
                    <th class="t-head">Telefono</th>
                    <th class="t-head">Tipo</th>
                
                
                    <th class="t-head">Eliminar</th>
                </tr>
                <tr>
                    <td>Juan</td>
                    <td>V-00000000</td>
                    <td>00/00/0000</td>
                    <td>@ejemplo.com</td>
                    <td>(0000)-000000</td>
                    <td>Persona</td>
             
                    <td><button>Eliminar</button></td>
                </tr>
                <tr>
                    <td>Britani</td>
                    <td>V-00000000</td>
                    <td>01/01/0001</td>
                    <td>@ejemplo.com</td>
                    <td>(0000)-000000</td>
                    <td>Persona</td>

                    <td><button>Eliminar</button></td>
                </tr>
                <tr>
                    <td>Carnicas YARACUY</td>
                    <td>J-0000000-0</td>
                    <td>01/01/0001</td>
                    <td>@ejemplo.com</td>
                    <td>(0000)-000000</td>
                    <td>Empresa</td>
                   
                   
                    <td><button>Eliminar</button></td>
                </tr>
                <tr>
                    <td>Rosalia</td>
                    <td>V-00000000</td>
                    <td>02/02/0002</td>
                    <td>@ejemplo.com</td>
                    <td>(0000)-000000</td>
                    <td>Persona</td>
                   
                    
                    <td><button>Eliminar</button></td>
                </tr>
            </table>
            <div class="b-Nmovs">
                <a href="">&#60</a>
                <p>Pag 1</p><a href="">&#62</a>
            </div>
        </form>
    </div>
</body>
</html>