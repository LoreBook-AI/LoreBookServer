import { describe, it, expect, beforeAll, afterAll } from 'vitest';
import request from 'supertest';
import { createServer } from 'http';
import { parse } from 'url';
import * as dotenv from 'dotenv';

// Carregar variáveis de ambiente do arquivo .env
dotenv.config();

const hostname = process.env.HOSTNAME || '127.0.0.1';
const port = parseInt(process.env.PORT || '3000', 10);

// Criar servidor para testes
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

describe('GET /', () => {
  beforeAll(async () => {
    return new Promise<void>((resolve) => {
      server.listen(port, hostname, resolve); // Listen with promise
    });
  });

  afterAll(async () => {
    return new Promise<void>((resolve, reject) => {
      server.close((err) => {
        if (err) {
          reject(err); // Reject if there's an error
        } else {
          resolve(); // Resolve if no error
        }
      });
    });
  });

  it('responds with json message "Hello, world!"', async () => {
    const response = await request(server).get('/');
    expect(response.status).toBe(200);
    expect(response.body).toEqual({ message: 'Hello, world!' });
  });

  it('responds with 404 for unknown routes', async () => {
    const response = await request(server).get('/unknown');
    expect(response.status).toBe(404);
    expect(response.body).toEqual({ message: 'Not Found' });
  });
});
