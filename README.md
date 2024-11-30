<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Sistema de Seguimiento Administrativo de Obras Públicas  

Este proyecto es un sistema web diseñado para el Departamento de Obras Públicas del H. Ayuntamiento Constitucional de Totutla, Veracruz. Su objetivo es gestionar, dar seguimiento y optimizar los procesos relacionados con las obras públicas, mejorando el control y agilizando la administración mediante una plataforma centralizada y segura.

## Funciones Generales del Producto

### 1. Captura de Solicitudes  
- Recepción de solicitudes de obras (calles, viviendas, electrificaciones, etc.).  
- Clasificación de solicitudes según las fuentes de financiamiento (FAISMUN, FORTAMUNDF).  
- Creación de un Programa General de Inversión (PGI) basado en las solicitudes.  

### 2. Generación de Reportes Iniciales  
- Reportes del Programa General de Inversión (PGI).  
- Reportes de beneficiarios e integración de comités.  
- Generación de reportes con datos de solicitudes, beneficiarios y documentos anexos.  

### 3. Módulos de Captura de Información  
- **Beneficiarios**: Información de solicitantes, documentos de solicitud y credenciales.  
- **Contratos**: Datos del contrato (fecha, contratista, etc.).  
- **Fianzas**: Información sobre fianzas (anticipo, cumplimiento, vicios ocultos) y validación de su autenticidad.  
- **Altas y Bajas en el IMSS**: Documentos relacionados con trabajadores.  

### 4. Reportes Avanzados  
- Reportes de avance físico semanales con descripción y fotografías.  
- Reportes trimestrales y de cierre de ejercicio.  
- Reportes concentrados en formato Excel para revisiones y presentaciones a autoridades.  

### 5. Facturación y Prefacturas  
- Generación de prefacturas con desglose de pagos.  
- Integración de facturas recibidas y generación de órdenes de pago.  

### 6. Interfaz de Usuario  
- Interfaz amigable y fácil de usar.  
- Creación de usuarios con roles específicos, como contratistas con permisos limitados.  

### 7. Seguridad  
- Protección de datos sensibles con medidas avanzadas de seguridad.  
- Prevención del acceso no autorizado y protección de la integridad de la información.  

---

## Tecnologías Utilizadas

- **Laravel**: v11.30.0  
- **PHP**: 8.3.13 (CLI) (compilado: Oct 22 2024)  
- **Tailwind CSS**: v3.4.1  

---

## Instalación  

1. Clona este repositorio:   
   git clone https://github.com/usuario/repositorio.git  

2. Instala las dependencias:
    composer install  
    npm install

3. Configura el archivo .env:
    cp .env.example .env
    php artisan key:generate

4. Ejecuta las migraciones:
   php artisan migrate:fresh --seed

## Estándar de Codificación
Este proyecto sigue los estándares de codificación PSR-1 y PSR-2 para mantener un código limpio, consistente y fácil de mantener.
- [PSR-1: Basic Coding Standard](https://bootcamp.laravel.com).
- [PSR-2: Coding Style Guide](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).

Se recomienda que todos los colaboradores sigan estos estándares para garantizar la coherencia del código.

## Licencia
Este proyecto es un software desarrollado bajo la [Licencia MIT](https://opensource.org/licenses/MIT).

