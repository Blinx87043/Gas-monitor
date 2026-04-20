<a id="readme-top"></a>

<!-- PROJECT SHIELDS -->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![License][license-shield]][license-url]

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h3 align="center">GasMonitor</h3>

  <p align="center">
    Sistema de monitoreo de gas con ESP32 y base de datos web
    <br />
    <br />
    <a href="#">Ver Demo</a>
    &middot;
    <a href="#">Reportar Bug</a>
    &middot;
    <a href="#">Solicitar Función</a>
  </p>
</div>

## Tabla de Contenidos

<details>
  <summary>Click para expandir</summary>
  <ol>
    <li><a href="#about-the-project">Acerca del Proyecto</a></li>
    <li><a href="#built-with">Tecnologías</a></li>
    <li><a href="#getting-started">Inicio</a></li>
    <li><a href="#usage">Uso</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contribuir</a></li>
    <li><a href="#license">Licencia</a></li>
    <li><a href="#contact">Contacto</a></li>
  </ol>
</details>



##  Acerca del Proyecto

GasMonitor es un proyecto desarrollado con el objetivo de comprender el manejo de bases de datos mediante una aplicación web, integrando hardware y software.

El sistema consiste en:

- Un sensor de gas MQ-9 conectado a una ESP32
- Indicadores físicos:
  - LED RGB
  - Buzzer
- Comunicación cliente-servidor
- Registro de datos en base de datos

###  Funcionamiento

- La ESP32 actúa como cliente
- Envía el valor del ratio de gas al servidor cuando:
  - Se supera el umbral de alarma
  - Se activa o desactiva la alerta
- El servidor:
  - Registra el valor del ratio
  - Guarda fecha y hora
  - Clasifica el evento como:
    - Alarma
    - Peligro

###  Interfaz Web

- Sistema de login
- Visualización de datos registrados
- Historial de eventos de gas

Este proyecto permite entender:
- Envío de datos desde dispositivos IoT
- Manejo de bases de datos
- Desarrollo web con backend



## Tecnologías Utilizadas

- ESP32
- Sensor MQ-9
- PHP
- HTML
- MySQL / Base de datos
- Comunicación HTTP


##  Inicio

### Prerrequisitos

- Arduino IDE o PlatformIO
- Servidor local (Laragon)
- Base de datos SQL (Laragon)

### Instalación

1. Clonar el repositorio

```sh
git clone https://github.com