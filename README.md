<a id="readme-top"></a>

<!-- PROJECT SHIELDS -->
<!--
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![License][license-shield]][license-url]
-->
<!-- PROJECT LOGO -->
<br />
<div align="center">
  <img src="public/images/logo_gasmonitor.png" alt="Logo" width="200" height="120">
  

  <p align="center">
    Sistema de monitoreo de gas con ESP32 e interfaz web
    <br />
    <br />
    <a href="#acerca-del-proyecto">Acerca del Proyecto</a>
    &middot;
    <a href="#esquematico">Esquematico</a>
    &middot;
     <a href="#tecnologías-utilizadas">Tecnologías utilizadas</a>
    &middot;
     <a href="#funcionamiento">Funcionamiento</a>
    &middot;
     <a href="#interfaz-web">Interfaz Web</a>
    &middot;
    <a href="#instalación">Instalación</a>
  </p>
</div>

<!--
## Tabla de Contenidos
<details>
  <summary>Click para expandir</summary>
  <ol>
    <li><a href="#acerca-del-proyecto">Acerca del Proyecto</a></li>
    <li><a href="#tecnologias">Esquematico</a></li>
    <li><a href="#inicio">Funcionamiento</a></li>
    <li><a href="#uso">Interfaz Web</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contribuir">Contribuir</a></li>
    <li><a href="#licencia">Licencia</a></li>
    <li><a href="#contacto">Contacto</a></li>
  </ol>
</details>
-->

##  Acerca del Proyecto

GasMonitor es un sistema inteligente para la detección y monitoreo de gases peligrosos, utilizando un microcontrolador ESP32 y una aplicación web para su monitoreo. 

### Esquematico
<div align="center">
  <img src="connection.png" alt="conexiones" width="400" height="400">
</div>

## Tecnologías Utilizadas

- ESP32
- Sensor MQ-9
- PHP
- AdminLTE
- MySQL

###  Funcionamiento

- La ESP32 actúa como cliente
- Envía el valor del ratio de gas al servidor cuando:
  - Se supera el umbral de alarma
  - Se activa o desactiva la alerta
- El servidor:
  - Registra el valor del ratio
  - Guarda fecha y hora
  - Clasifica el evento como:
    - Estable
    - Peligro

### modelo 3D
 <img src="mold.png" alt="modelo_3d" width="400" height="400">

###  Interfaz Web

- Sistema de login
- Historial de detecciones de gas

### Prerrequisitos

- Arduino IDE
- Servidor local (Ej: Laragon)
  
### Instalación

1. Clonar el repositorio

```sh
git clone https://github.com/Blinx87043/Gas-monitor

2. Gestionar librerías

```sh
composer install

3. Configurar el entorno

```sh
cp .env.example .env

4. Importa el archivo SQL "database.sql"
