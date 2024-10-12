// src/main.ts
import { createServer } from 'http';
import { parse } from 'url';
import * as dotenv from 'dotenv';

// Carregar variáveis de ambiente do arquivo .env
dotenv.config();

const hostname = process.env.HOSTNAME;
const port = parseInt(process.env.PORT, 10);

const server = createServer((req, res) => {
  const url = parse(req.url || '', true);

  if (url.pathname === '/' && req.method === 'GET') {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify({ message: 'Hello, world!' }));
  } else {
    res.statusCode = 404;
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify({ message: 'Not Found' }));
  }
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});

export { server };
