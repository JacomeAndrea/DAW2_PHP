IMPLEMENTACIONES EN EjeMockaroo

1) Mostrar en detalles y en modificar la opción de siguiente y anterior:
  - se añade en detalles y modificacion del index.php el case "Siguiente"  y "Anterior" llamando a los métodos respectivos definidos en crudclientes.php que a su vez acceden al id del cliente seleccionado mediante el AccesoDatos.php

3) Mostrar en detalles una bandera del país asociado a la IP
  - en crudPostAlta() y crudPostModificar situado en crudclientes.php se llama a la función validarIp situada en AccesoDatos.php con el fin de que cuando se vayan a registrar o modificar los datos de un cliente, se valide su IP. Posteriorimente en detalles.php se llama a la función countryCode a la que se le pasa por parámetro el id del cliente. Esta función devuelve el código del país mediante el ip del cliente accediendo al contenido de geoplugin.net mediante código json

5) Mejorar las operaciones de Nuevo y Modificar para que chequee que los datos son correctos: correo electrónico no repetido, IP y teléfono con formato 999-999-999
- en el crudPostAlta() y crudPostModificar() se llama a las funciones requeridas para chequear que los datos son como se exige en el enunciado. Estas funciones están definidas en AccesoDatos.php

7) Mostrar una imagen asociada al cliente almacenada previamente en Uploads o una imagen por defecto aleatoria generada por https://robohaso.org si no existe. El nombre de as fotos tiene formato 00000XXX.jpg para el cliente con id XXX
  - En detalles.php se obtiene la foto del cliente mediante una función denominada getFoto(). Comprueba mediante el id del cliente si existe una foto en el directorio nombrada con el patrón establecido: 00000id, en caso negativo se le establce una imagen de robohas.org utilizando su id

9) Generar un PDF con todos los detalles de un cliente (incluir un botón que indique imprimir)
  - se añade en el proceso de navegación en detalles situado en el index.php el case"Descargar" que llama a la función en crudclientes.php pasándole el id para posteriormente obtener los datos del cliente


Para llevar a cabo dichas mejoras, se ha realizado lo siguiente:
index.php:
  - para las órdenes de navegación en detalles se ha incluido el case "Descargar"

*También se han realizado funciones que no se han llegado a implementar, tales como subirFoto a la que le passas por parámetro el id del cliente. Se comprueba si esta cumple con los requerimientos: menos de 125Kb
