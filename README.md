## OTAVO-web
### Web site of OTAVO interprise. <br>
[PAGINA WEB (tener xampp abierto)](http://localhost/OTAVO-web/2265974/)

### Versión:
**v1.6**

### Fecha 06/09
- **¿Qué hicimos?**
  - Hicimos inicio de sesión con validación de roles, además de comenzar la vista de productos con su respectivo procedimiento de compra, tambien la validación de roles para las paginas donde se requieran de estos..
- **¿Qué debemos hacer?**
  - Intentar hacer una validación de correos para evitar que se repitan en la base de datos mediante una consulta con un procedimiento, y en caso tal de que exista, no realizar el registro.
  - Aprender y emplear las consultas para el usuario que tenga la sesion activa (mediante el SESSION) para asi poder tomar datos como el nombre e imprimirlo en las vistas.
  - Continuar el proceso de compra de los productos, pero antes, organizar la manera en como el realizar una venta afectara a todas las tablas necesarias (tabla cliente donde se registre la compra, producto donde se agote existencias, venta donde se registre la venta y demas)
  - Arreglar la vista de catalogos (cuando se selecciona un producto) para la parte de descripcion, que no quede fuera de la vista.
- **Prioridades**
  - Empezar con la vista de cuenta cuando se tiene una sesión activa para que el usuario pueda ver todos sus datos, para ello se debe realizar el punto N°2 de cosas que debemos hacer.
  - Realizar un nuevo formulario para los productos donde se incluya la información que se trabaja en el otro sistema ([EJEMPLO](https://luisotavo9008.wixsite.com/otavo/product-page/bolso-guarda-casco-cb-08-8)) y asi mismo mostrarle estos datos cuando se seleccione un producto, para esto se debe editar tanto la base de datos, los modelos y procedimientos también.
