# Sistema de Exámenes Médicos

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![CakePHP](https://img.shields.io/badge/CakePHP_5-D33C43?style=flat-square&logo=cakephp&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)

Sistema web para la generación y gestión de exámenes médicos, desarrollado con CakePHP 5. Permite crear bancos de preguntas, generar exámenes aleatorios y gestionar el proceso de evaluación.

## Características

- Creación y administración de bancos de preguntas por especialidad médica
- Generación automática de exámenes con selección aleatoria de reactivos
- Gestión de usuarios y roles
- Panel de administración para configurar exámenes
- Validación de datos con CakePHP Validation
- Análisis estático con PHPStan y estilo de código con PHPCS

## Tecnologías

- **Backend:** PHP 8.x con CakePHP 5
- **Base de datos:** MySQL
- **Testing:** PHPUnit
- **Calidad de código:** PHPStan (nivel 8), PHPCS, Psalm

## Instalación

```bash
# Clonar el repositorio
git clone https://github.com/PabloIAIN/examenes-sistema-cakephp.git
cd examenes-sistema-cakephp

# Instalar dependencias
composer install

# Copiar archivo de entorno y configurar la base de datos
cp .env.example .env
# Editar .env con las credenciales de tu base de datos

# Ejecutar migraciones
bin/cake migrations migrate

# Iniciar el servidor de desarrollo
bin/cake server -p 8765
```

Visitar `http://localhost:8765` para acceder a la aplicación.

## Tests

```bash
# Ejecutar todos los tests
vendor/bin/phpunit

# Análisis estático
vendor/bin/phpstan analyse

# Verificar estilo de código
vendor/bin/phpcs
```

## Estructura del proyecto

```
src/
├── Controller/    # Controladores de la aplicación
├── Model/         # Entidades, tablas y validaciones
├── View/          # Helpers y lógica de presentación
templates/         # Vistas (plantillas .php)
tests/             # Tests unitarios y de integración
config/            # Configuración de la app y rutas
```

## Contexto

Proyecto desarrollado como parte del sistema de evaluación médica vinculado a la plataforma [Enarm360](https://github.com/PabloIAIN/Enarm360), enfocado en la preparación para el Examen Nacional de Residencias Médicas (ENARM) en México.
