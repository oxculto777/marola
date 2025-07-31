
PASSO A PASSO PARA SUBIR O SISTEMA MAROLA NO RENDER

1. Copie esses arquivos para a pasta raiz do seu projeto Laravel ("marola/"):
   - Dockerfile
   - .render.yaml
   - README.txt (opcional)

2. No GitHub Desktop:
   - Clique em "Changes", veja se os arquivos novos aparecem
   - Faça um commit: "Adicionando arquivos de deploy para Render"
   - Dê push para o GitHub

3. No Render:
   - Vá em https://dashboard.render.com/
   - Clique em "New" > "Blueprint"
   - Escolha seu repositório `marola`
   - Render vai detectar automaticamente o `.render.yaml` e configurar o serviço
   - Aguarde a criação do serviço

4. Depois que o serviço estiver criado:
   - Vá até o serviço
   - Acesse a aba "Environment"
   - Clique em "Add Environment Variable"
   - Preencha os dados que o Render forneceu do banco de dados PostgreSQL

   Exemplo:
     DB_CONNECTION = pgsql
     DB_HOST = dpg-blabla.onrender.com
     DB_PORT = 5432
     DB_DATABASE = marola
     DB_USERNAME = usuario
     DB_PASSWORD = senha

5. Gere chave do app Laravel:
   - Vá na aba "Shell" (ou use SSH do Render)
   - Rode: php artisan key:generate

6. Rode as migrations (opcional):
   - php artisan migrate

Pronto, o sistema vai estar rodando com backend Laravel + banco PostgreSQL no Render!
