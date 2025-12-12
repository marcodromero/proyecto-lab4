# 🏫 Proyecto Instituto: Gestión de Cursos y Alumnos (Materia: Laboratorio 4) 💾

## ⚙️ Instrucciones de Ejecución Local
Para poner en marcha esta aplicación en tu entorno local, sigue los pasos detallados a continuación:

### 1. Configuración del Entorno 🖥️
Descargar e Instalar XAMPP

Abre el Panel de Control de XAMPP e inicia los siguientes módulos:
✅ Apache
✅ MySQL

### 2. Configuración del Proyecto 📂
Coloca la carpeta principal de este proyecto (proyecto-lab4) dentro del directorio de documentos web de XAMPP:xampp/htdocs/

Utilizando un editor de código (como VS Code), abre la carpeta del proyecto y elimina la 'x' del archivo llamado .htaccessx para renombrarlo a .htaccess.

### 3. Configuración de la Base de Datos 🗄️
Abre tu navegador y accede a http://localhost/phpmyadmin (o el puerto configurado en XAMPP).

Crear la Base de Datos: Crea una nueva base de datos con el nombre exacto: instituto.

Importar Tablas y Datos:Selecciona la base de datos instituto. Ve a la pestaña "Importar".

Selecciona el archivo .sql del proyecto y ejecútalo para cargar todas las tablas y datos iniciales.

### 4. Acceso a la Aplicación ▶️
Una vez completados los pasos anteriores, puedes acceder a la aplicación desde tu navegador:http://localhost/proyecto-lab4/login

⚠️ NOTA: Si configuraste XAMPP para usar un puerto distinto  asegúrate de incluirlo en la URL: http://localhost:8080/proyecto-lab4/login.

## 🔑 Credenciales de Acceso por Defecto

Utiliza estas credenciales para ingresar por primera vez a la aplicación:

usuario admin: marco@gmail.com
contraseña: 123456

💡 Importante: Estas credenciales son solo para desarrollo y pruebas locales. No representan un riesgo de seguridad.
