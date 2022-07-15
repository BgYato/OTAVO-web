## OTAVO-web
### Web site of OTAVO interprise. <br>
[PAGINA WEB (tener xampp abierto)](http://localhost/OTAVO-web/2265974/)

### Versión:
**v1.0.0**

### Lista de cosas por hacer: <br>
- Cambiar la apariencia gráfica de varias de las tabulaciones. (**Tip 1**)
- Sugerir el cambio del **panel** administrativo por uno más accesible y comodo, lista de ideas:  (**Tip 2**)
  - Por cada modulo, realizar una botonera similar a la anterior para la CRUD y agregar algunos datos que no necesiten necesariamente de la crud.
  - Mejor la estetica de cada opción a desarrollarse para que no se vea una cosa encima de la otra.
  - Mejorar la vista de la tabla donde se muestran todos los datos en el modulo de "USUARIO"
- Realizar comprobacions con JavaScript o PHP para evitar el almacenamiento de varios datos similares [video](https://youtu.be/cbec05bEfwI?list=LL) o este [video](https://www.youtube.com/watch?v=e6HYpeYwagg&list=LL&index=2&t=339s) (**Tip 3**)
- Ventana modal para continuar con la inserción de datos (vista usuario) después de la comprobación, primer idea a realizar: (**Tip 4**)
  - Preguntar en la ventana modal si se desea continuar con los campos de cliente, si dice que sí, se envía a una página aparte donde se completa los datos. Campos como el nombre y demás se mostrarán en unos inputs bloqueados los cuales se llenan automaticamente al ser enviados desde un formulario con metodo POST, una vez se completen los datos se registran los mismos en la tabla de cliente
- Cambiar la vista que tendra el administrador desde el panel administrativo (**En desarrollo**) (**Tip 5**):
  - Utilizar un diferente footer y header para la pagina de dashboar y cambiar la apariencia de la misma, la primer idea base es realizar una barra lateral donde se ubicara el dato del administrador y la lista de opciones quienes se desplegaran según el modulo elegido (tipo cascada), mientras que el administrador no seleccione ningún modulo, en la pantalla se mostrará los datos de las últimas personas registradas y demás.
  -  Para ello, crear una carpeta de layers en cualquier lado y dejar el header y el footer aparte de la pagina de plantilla, se realizará el llamado (mediante include) a los layers pre-establecidos para cada uno de las vistas.

### Ejemplo código a desarollar
![Formulario y relación entre las tablas usuarios y clientes](https://github.com/BgYato/OTAVO-web/blob/BASE/diagrama2.png)

### Baul de ayuda
- [PDF, comandos básicos de GIT](https://docs.aws.amazon.com/es_es/codecommit/latest/userguide/codecommit-user.pdf#how-to-basic-git)
- CREAR UN NUEVO REPOSITORIO CON LOS COMANDOS
  - git init
  - git add README.md
  - git commit -m "first commit"
  - git branch -M main
  - git remote add origin https://github.com/BgYato/OTAVO-web.git
  - git push -u origin main
- O PUSHEAR UN REPOSITORIO EXISTENTE DESDE LOS COMANDOS
  - git remote add origin https://github.com/BgYato/OTAVO-web.git
  - git branch -M main
  - git push -u origin main
- DESCARGAR RAMAS DESDE GITHUB A OTRO PC
  - **Primer metodo**
    - git pull (para poder sincronizar todos los cambios)
    - *Se buscarán todas las ramas existentes y se mostrarán en los logs*
    -  git checkout **nombre de la rama que se quiere escojer**
  - **Segundo metodo**
    - **Se debe tener el nombre de la rama a la que deseamos descargar desde github**
    - git checkout -b *nombre de la rama* origin/*nombre de la rama*
    - **Se cambiará inmediatamente a la rama seleccionada, recomendable verificar nuevamente y realizar un pull**

> Debes hacer las cosas que piensas que no puedes hacer. - Eleanor Roosevelt
