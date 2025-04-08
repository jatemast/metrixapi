# 📘 Documentación de la API - Metrix

## 🚀 Introducción
Bienvenido a la API de **Metrix**. Aquí encontrarás toda la información necesaria para registrar usuarios, iniciar sesión y consumir los endpoints disponibles.  
Esta API sigue el estilo RESTful y utiliza tokens de autenticación para proteger las rutas.

> ⚠️ Todas las rutas tienen como base:  
**`http://127.0.0.1:8000`**

---

## 🔐 Autenticación

### 📥 Registro de Usuario

- **Método**: `POST`  
- **URL**: `http://127.0.0.1:8000/api/registro`  
- **Descripción**: Registra un nuevo usuario en la plataforma.

#### 📝 Cuerpo de la Solicitud

```json
{
  "name": "Juan Pérez",
  "email": "juan@example.com",
  "password": "tu_contraseña"
}







 Respuesta Exitosa
Código: 201 Created

Cuerpo:


{
  "user": {
    "id": 1,
    "name": "Juan Pérez",
    "email": "juan@example.com",
    "created_at": "2025-04-08T12:00:00.000000Z",
    "updated_at": "2025-04-08T12:00:00.000000Z"
  },
  "token": "token_de_acceso_generado"
}
