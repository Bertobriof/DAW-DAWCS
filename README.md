# Boletín Tareas 

## Para qué es este repo?

Este repo plantea unos ejercicios sencillos sobre PHP y su sintaxis. 

## Concreciones sobre especificaciones

### Despliega tu entorno necesario

Para poder realizar los ejercicios es necesario tener realizar el despliegue del entorno. Utilizaremos como base el entorno Docker-Lamp. Por lo que puedes desplegarlo utilizando el comando: 

```bash
docker-compose up -d 
```
En el caso de que quieras para algún container debes usar el comando: 

```bash
docker-compose stop nombrecontainer
```
Y para levantar algún container: 
```bash
docker-compose start nombrecontainer 
```

En los [apuntes](https://sabela.pages.iessanclemente.net/dwcs/herramientas/1.docker/) tienes más información sobre el uso de docker. 

## Ejercicios

Los ejercicios en este caso estarán detallados en la carpeta [`ejercicios`](ejercicios). Se distribuye entre diferentes boletines con el fin de organizar el trabajo. 

## Especificificaciones, consejos y recomendaciones

- Antes de afrontar la tarea debes haber leído y comprendido el contenido de la unidad.
- No tienes porque estudiar toda la unidad para comenzar a realizar la tarea. Cada boletín va asociado a una parte de los apuntes. 

## Pre-requisitos

Como requisitos previos se asumen:

- Nociones básicas de GIT
- Nociones de Docker
- Selección de herramientas de edición. *Visual Code* o similares.

## Antes de ponerte a trabajar

### Haz un fork del repositorio original

Haz un fork del repositorio original y **configúralo de forma privada** (la actividad propuesta es individual ;)
Habilita las issues y **otorga permisos de escritura al profesor** en tu repo.

### Clona el repositorio en tu máquina de trabajo

```shell
git clone <url de tu fork>
```
**No modifiques** el fichero `README.md`.

Puedes crearte las ramas que necesites para el trabajo. Pero en el momento de la entrega se tendrá en cuenta lo que haya en la rama master.


### Revisa si se han producido actualizaciones en las especificaciones

Cada vez que retomes tu trabajo asegúrate tener la última versión de las especificaciones. Para ello:
0. En el caso de que hayas añadido la url remota con la unidad, primero bórrala: 
    `git remote rm profesor`
1. (*Sólo la primera vez*) Añade como repo remoto el repo del profesor desde el que has creado tu fork.

    `git remote add profesor <url-repoProfesor>`
    En este caso: 
    `git remote add profesor  https://gitlab.iessanclemente.net/dwcs1/dwcs_tareas` 

2. (C*ada vez que retomes trabajo*) Revisa novedades y obtenlas del repo del profesor

    `git fetch profesor main`

Si has seguido las indicaciones de este README no deberían producirse conflictos. Si se produjesen adviértelo al profesor.

    ```bash
    # Asegúrate primero de estar en tu rama de trabajo o release branch
    git checkout rama
    
    # Después mézclate en tu rama actual las novedades
    git merge profesor/main
    ```
En los [apuntes](https://sabela.pages.iessanclemente.net/dwcs/herramientas/2.git/) tienes más información sobre el uso de docker. 

## Trabajando en el día a día

A medida que vayas trabajando, debes ir subiendo el código que generes al repositorio. Para ello, debes ejecutar los siguientes comandos: 

    ```bash
    # Añade los cambios
    git add .
    
    # Confirma los cambios
    git commit -m "mensaje"

    # Sube los cambios a tu repositorio
    git push -u origin rama_de_trabajo
    ```
Si en algún momento tienes alguna duda utiliza el foro de dudas para comentarlo e indica el hash del último commit para que la profesora pueda ver el código generado.  
Para acceder a los ficheros php dentro de las carpetas que generamos tendremos que poner la ruta completa en el navegador. Por ejemplo: http://localhost/introduccion/tarea1.php

## Entrega de la tarea

Una vez termines todas las tareas asociadas a la unidad debes subir a la tarea de la plataforma de distancia la url del repositorio que hayáis generado.   

## Documenta tu trabajo

El repo contiene un fichero nombrada como `doc.md` en el que puedes introducir comentarios sobre la tarea en el caso de que sea necesario. Para documentar se recomienda el uso de [markdown](https://markdown.es/). 


## Guía de contribuciones

- Escribir tests
- Revisión de código

## Con quien hablo

- Propietario del repo
