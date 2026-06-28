# Guia paso a paso: crear y probar un MCP en Cursor

Este documento explica como crear un servidor MCP sencillo y conectarlo a Cursor para probarlo desde el chat.

> MCP significa **Model Context Protocol**. En la practica, un MCP permite agregar herramientas externas a Cursor para que el asistente pueda ejecutar acciones controladas, consultar informacion o conectarse con servicios propios.

## Objetivo

Crear un MCP local llamado `puntualpago-demo` con una herramienta de prueba llamada `estimar_proyecto`, que respondera una estimacion de tiempo para un proyecto tipo PuntualPago.

Al terminar, podras pedirle a Cursor algo como:

```text
Usa la herramienta estimar_proyecto del MCP puntualpago-demo con tipo "mvp".
```

## Requisitos

Necesitas tener instalado:

- Cursor.
- Node.js 18 o superior.
- npm.
- Una carpeta local donde guardar el proyecto MCP.

Puedes verificar Node.js con:

```bash
node --version
npm --version
```

Si `node --version` muestra una version menor a 18, actualiza Node antes de continuar.

## 1. Crear la carpeta del MCP

Desde una terminal, crea una carpeta para el ejemplo:

```bash
mkdir demo-mcp-puntualpago
cd demo-mcp-puntualpago
```

Inicializa el proyecto Node.js:

```bash
npm init -y
```

Instala las dependencias necesarias:

```bash
npm install @modelcontextprotocol/sdk zod
```

## 2. Configurar el proyecto como ES Modules

Abre el archivo `package.json` y agrega `"type": "module"`.

Debe quedar parecido a esto:

```json
{
  "name": "demo-mcp-puntualpago",
  "version": "1.0.0",
  "description": "",
  "main": "server.js",
  "type": "module",
  "scripts": {
    "start": "node server.js"
  },
  "keywords": [],
  "author": "",
  "license": "ISC"
}
```

> Nota: despues de ejecutar `npm install @modelcontextprotocol/sdk zod`, npm agregara automaticamente la seccion `dependencies` con las versiones instaladas.

## 3. Crear el servidor MCP

Crea un archivo llamado `server.js` dentro de la carpeta `demo-mcp-puntualpago`.

Contenido de `server.js`:

```js
import { McpServer } from "@modelcontextprotocol/sdk/server/mcp.js";
import { StdioServerTransport } from "@modelcontextprotocol/sdk/server/stdio.js";
import { z } from "zod";

const server = new McpServer({
  name: "puntualpago-demo",
  version: "1.0.0",
});

server.registerTool(
  "estimar_proyecto",
  {
    title: "Estimar proyecto",
    description: "Devuelve una estimacion de tiempo para el desarrollo de PuntualPago.",
    inputSchema: {
      tipo: z
        .enum(["mvp", "completo"])
        .describe("Tipo de estimacion solicitada: mvp o completo."),
    },
  },
  async ({ tipo }) => {
    const estimaciones = {
      mvp: "Un MVP funcional de PuntualPago puede tomar aproximadamente 4 a 5 meses con un equipo pequeno.",
      completo:
        "El sistema completo de PuntualPago puede tomar aproximadamente 8 a 12 meses, especialmente si incluye portales, liquidaciones avanzadas, automatizaciones y e-CF/DGII.",
    };

    return {
      content: [
        {
          type: "text",
          text: estimaciones[tipo],
        },
      ],
    };
  }
);

const transport = new StdioServerTransport();
await server.connect(transport);
```

## 4. Probar que el servidor arranca

Ejecuta:

```bash
npm start
```

Si todo esta bien, el comando quedara ejecutandose sin imprimir mucho en pantalla. Eso es normal en un servidor MCP por `stdio`.

Para detenerlo:

```text
Ctrl + C
```

## 5. Obtener la ruta absoluta del servidor

Cursor necesita la ruta absoluta del archivo `server.js`.

Desde la carpeta del MCP, ejecuta:

```bash
pwd
```

Ejemplo de resultado:

```text
/home/tuusuario/demo-mcp-puntualpago
```

Entonces la ruta absoluta del servidor seria:

```text
/home/tuusuario/demo-mcp-puntualpago/server.js
```

Guarda esa ruta porque la usaras en la configuracion de Cursor.

## 6. Configurar el MCP en Cursor

Dentro del proyecto donde estas trabajando con Cursor, crea la carpeta `.cursor` si no existe:

```bash
mkdir -p .cursor
```

Crea o edita el archivo:

```text
.cursor/mcp.json
```

Agrega esta configuracion:

```json
{
  "mcpServers": {
    "puntualpago-demo": {
      "command": "node",
      "args": ["/RUTA/ABSOLUTA/demo-mcp-puntualpago/server.js"]
    }
  }
}
```

Reemplaza `/RUTA/ABSOLUTA/demo-mcp-puntualpago/server.js` por la ruta real.

Ejemplo:

```json
{
  "mcpServers": {
    "puntualpago-demo": {
      "command": "node",
      "args": ["/home/tuusuario/demo-mcp-puntualpago/server.js"]
    }
  }
}
```

## 7. Reiniciar o refrescar Cursor

Despues de guardar `.cursor/mcp.json`, haz una de estas opciones:

1. Reinicia Cursor.
2. O abre la configuracion de MCP de Cursor y refresca los servidores.

Cuando Cursor detecte el servidor, el MCP `puntualpago-demo` deberia aparecer disponible.

## 8. Probar el MCP desde el chat de Cursor

Abre el chat de Cursor y escribe:

```text
Usa la herramienta estimar_proyecto del MCP puntualpago-demo con tipo "mvp".
```

Tambien puedes probar:

```text
Usa la herramienta estimar_proyecto del MCP puntualpago-demo con tipo "completo".
```

Respuesta esperada para `mvp`:

```text
Un MVP funcional de PuntualPago puede tomar aproximadamente 4 a 5 meses con un equipo pequeno.
```

Respuesta esperada para `completo`:

```text
El sistema completo de PuntualPago puede tomar aproximadamente 8 a 12 meses, especialmente si incluye portales, liquidaciones avanzadas, automatizaciones y e-CF/DGII.
```

## 9. Agregar otra herramienta de prueba

Puedes agregar mas herramientas dentro del mismo `server.js`.

Ejemplo:

```js
server.registerTool(
  "saludar_cliente",
  {
    title: "Saludar cliente",
    description: "Genera un saludo simple para un cliente.",
    inputSchema: {
      nombre: z.string().describe("Nombre del cliente."),
    },
  },
  async ({ nombre }) => {
    return {
      content: [
        {
          type: "text",
          text: `Hola ${nombre}, gracias por contactar a PuntualPago.`,
        },
      ],
    };
  }
);
```

Importante: coloca esa herramienta antes de estas lineas finales:

```js
const transport = new StdioServerTransport();
await server.connect(transport);
```

Luego reinicia Cursor o refresca los MCP.

## 10. Estructura final del proyecto MCP

Tu carpeta deberia verse asi:

```text
demo-mcp-puntualpago/
  package.json
  package-lock.json
  server.js
  node_modules/
```

## Problemas comunes

### Cursor no detecta el MCP

Revisa:

- Que `.cursor/mcp.json` tenga JSON valido.
- Que la ruta de `server.js` sea absoluta.
- Que Node.js este instalado.
- Que puedas ejecutar `node /ruta/absoluta/server.js` sin errores.
- Que hayas reiniciado o refrescado los MCP en Cursor.

### Error: Cannot find module

Probablemente no instalaste las dependencias o estas ejecutando desde otra carpeta.

Solucion:

```bash
cd demo-mcp-puntualpago
npm install
```

### Error relacionado con import/export

Verifica que `package.json` tenga:

```json
{
  "type": "module"
}
```

### El servidor se queda abierto y no imprime nada

Eso puede ser normal. Los MCP por `stdio` esperan comunicarse con Cursor por entrada/salida estandar.

Para detenerlo manualmente:

```text
Ctrl + C
```

## Recomendacion para proyectos reales

Para un MCP real, puedes crear herramientas que:

- Consulten una base de datos.
- Lean documentos internos.
- Calculen cotizaciones.
- Generen respuestas comerciales.
- Consulten APIs propias.
- Automaticen tareas repetitivas.

Ejemplo de herramientas utiles para PuntualPago:

- `estimar_proyecto`
- `calcular_mora`
- `generar_cotizacion`
- `consultar_propiedad`
- `resumir_contrato`
- `crear_tarea_operativa`

Empieza con herramientas pequenas y seguras. Luego puedes conectar servicios reales cuando el flujo basico este funcionando.
