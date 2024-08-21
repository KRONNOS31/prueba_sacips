<!DOCTYPE html>
<html lang="es">
<!--modulazo del p´causa gilberga-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

    <title>SACIPS | Egresos</title>
    <link rel="stylesheet" href="../style/admin.css">
</head>

<body class="bodyGstion">

    <header class="headerGestion">
        <div class="headerGeneral">

            <div class="buttonsHeader">

                <button id="btnGstUsuarios" class="headerButtons general">General</button>

                <button id="btnGstUsuarios" class="headerButtons">Afiliados</button>

                <button id="btnGstUsuarios" class="headerButtons">Invitados</button>

                <button id="btnGstUsuarios" class="headerButtons">Maestros</button>

                <button id="btnGstUsuarios" class="headerButtons">Vigilancia</button>

                <button id="gstModeradores" class="gstAdmins">Moderadores</button>


                <div class="inputs">

                   <select class="buscarpor" name="" id="">
                    <option value="">Nombre</option>
                    <option value="">Correo</option>
                    <option value="">Cedula</option>
                    <option value="">Rif</option>
                   </select>

                    <input class="busquedaHeader" type="text" placeholder="Busqueda">
                    <button class="btnBuscar">Buscar</button>
                </div>
            </div>

        </div>


        </div>
    </header>

    <section id="gstionBody" class="gstionBody">

        <div class="afiliados">


            <div class="datos">
                <div class="datosSeparacion">

                    <img src="img/UserGestion.png" alt="" class="iconGstion">


                    
                    <div class="listasSeparadas">

                        <div class="listSeparation">
                         
                            <p class="titleType">AFILIADO</p>
                        </div>
                        

                        <div class="listSeparation">
                            <p class="titleDatos">Estatuto</p>

                            <p class="estatuto">Pagado</p>
                        </div>
                    </div>
                </div>


                <div class="datosAfiliados">

                    <div class="listSeparation">
                        <p class="titleDatos">Tipo</p>
                        <p class="tipoAfiliado">Persona</p>
                    </div>

                    <div class="listSeparation">
                        <p class="titleDatos">Nombre</p>
                        <p class="nombre">Juan Biondi Paez</p>
                    </div>
                    
                    <div class="listSeparation">
                        <p class="titleDatos">Correo</p>
                        <p class="email">juanbiondi@gmail.com</p>
                    </div>

                

                    <div class="listSeparation">
                        <p class="titleDatos">Telefono</p>
                        <p class="telefono">0424-500-9703</p>
                    </div>




                    <div class="listSeparation">
                        <p class="titleDatos">Cedula/Rif</p>
                        <p class="cedula">V-00.000.00</p>
                    </div>


                    <div class="listSeparation">
                        <p class="titleDatos">Fecha de Ingreso</p>
                        <p class="fecha">00/00/0000</p>
                    </div>

                </div>
            </div>

            <div class="buttons">
                <button>Historial de Aportes</button>
                <button>Editar</button>
                <button class="eliminar">Eliminar</button>
            </div>
        </div>
        

        <!-- aqui otro cuadro -->

        <div class="afiliados">


            <div class="datos">
                <div class="datosSeparacion">

                    <img src="img/UserGestion.png" alt="" class="iconGstion">


                    
                    <div class="listasSeparadas">

                        <div class="listSeparation">
                         
                            <p class="titleType">INVITADO</p>
                        </div>
                        

                    </div>
                </div>


                <div class="datosAfiliados">

                    <div class="listSeparation">
                        <p class="titleDatos">Tipo</p>
                        <p class="tipoAfiliado">Servicio</p>
                    </div>

                    <div class="listSeparation">
                        <p class="titleDatos">Nombre</p>
                        <p class="nombre">Odontología Yaracuy</p>
                    </div>
                    
                    <div class="listSeparation">
                        <p class="titleDatos">Correo</p>
                        <p class="email">juanbiondi@gmail.com</p>
                    </div>

                

                    <div class="listSeparation">
                        <p class="titleDatos">Telefono</p>
                        <p class="telefono">0424-500-9703</p>
                    </div>




                    <div class="listSeparation">
                        <p class="titleDatos">Cedula/Rif</p>
                        <p class="cedula">V-00.000.00</p>
                    </div>


                    <div class="listSeparation">
                        <p class="titleDatos">Fecha de Ingreso</p>
                        <p class="fecha">00/00/0000</p>
                    </div>

                </div>
            </div>

            <div class="buttons">
                <button>Historial de Aportes</button>
                <button class="eliminar">Suspender</button>
            </div>
        </div>

       
    </section>
</body>

</html>