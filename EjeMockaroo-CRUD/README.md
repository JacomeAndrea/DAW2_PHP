IMPLEMENTACIONES EN EjeMockaroo

1) Mostrar en detalles y en modificar la opción de siguiente y anterior:
  - se añade en detalles y modificacion del index.php el case "Siguiente"  y "Anterior" llamando a los métodos respectivos definidos en crudclientes.php que a su vez acceden al id del cliente seleccionado mediante el AccesoDatos.php

3) Mostrar en detalles una bandera del país asociado a la IP
  - en crudPostAlta() y crudPostModificar situado en crudclientes.php se llama a la función validarIp situada en AccesoDatos.php con el fin de que cuando se vayan a registrar o modificar los datos de un cliente, se valide su IP. Posteriorimente en detalles.php se llama a la función countryCode a la que se le pasa por parámetro el id del cliente. Esta función devuelve el código del país mediante el ip del cliente accediendo al contenido de geoplugin.net mediante código json

5) Mejorar las operaciones de Nuevo y Modificar para que chequee que los datos son correctos: correo electrónico no repetido, IP y teléfono con formato 999-999-999
- en el crudPostAlta() y crudPostModificar() se llama a las funciones requeridas para chequear que los datos son como se exige en el enunciado. Estas funciones están definidas en AccesoDatos.php. Se debe tener en cuenta el caso en el que el cliente modifica datos pero no el correo, pues este saldría repetido, para evitar esto, en la propia función de emailRepetido en AccesoDatos se comprueba si el email es igual al email de este cliente, en dicho caso hacemos que ese email retorne false, es decir, hacemos que no cuente como repetido


6) Permitir subir o cambiar la foto del cliente en modificar y en nuevo (La imagen no es obligatoria). Hay que controlar que el fichero subido sea una imagen jpg de un tamaño inferior a 1 Mbps.
  - en el index.php se pasa la orden, en le caso de que sea "Subir imagen" accedemos a la función pertinente desarrollada en crudClientes, donde le pasamos por parámetro el id. Dicha función se atiene a las premisas establecidas.

7) Mostrar una imagen asociada al cliente almacenada previamente en Uploads o una imagen por defecto aleatoria generada por https://robohaso.org si no existe. El nombre de as fotos tiene formato 00000XXX.jpg para el cliente con id XXX
  - En detalles.php se obtiene la foto del cliente mediante una función denominada getFoto(). Comprueba mediante el id del cliente si existe una foto en el directorio nombrada con el patrón establecido: 00000id, en caso negativo se le establce una imagen de robohas.org utilizando su id
  
 8) Crear una nueva tabla en la BD de usuarios de la aplicación (User) con tres campos: login, password( encriptada ) y rol (0/1), definir varios usuarios y controlar el acceso a la aplicación sólo si se introduce el login y el password correctos. Si se realizan más de tres intentos erróneos se solicitará que se reinicie el navegador.
  - en el index.php si no existe la sesión la creo y establezco los intentos a 0. Una vez exista la sesión proceso las órdenes, si no está logeado le paso por post la función logIn que como parámetro tiene el nombre y contraseña (esta función accede a otra llamada chechLogIn que comprueba en la base de daos Users.sql si los datos introducidos son correctos y te retorna true o false en funcion de ello), en caso contrario, sumo +1 a los intentos estableciendo que al llegar a tres o más te lleve a error.php y te muestre un mensaje que te diga que debes cerrar e navegador.
  - en crudclientes.php establezco las funciones de logIn (explicada en el apartado anterior), obtenerUserName y obtenerRol. Esta segunda servirá de cara al ejercicio 9 donde se hace uso del rol para acceder a ciertos privilegios.
  - en AccesoDatos.php se establece la función checkLogin que comprueba si el usuario y contraseña son correctos accediendo a los datos almacenados en Users.sql. También está la función getUser que como su propio nombre indica te retorna el usuario
  - Se ha creado una clase llamada User.php con los atributos user, pass y rol y lso métodos get y set respectivos

9) Generar un PDF con todos los detalles de un cliente (incluir un botón que indique imprimir)
  - se añade en el proceso de navegación en detalles situado en el index.php el case"Descargar" que llama a la función en crudclientes.php pasándole el id para posteriormente obtener los datos del cliente

