Okay, things took a turn, started out with a calendar site in mind.... ran into problems, let it rest for a bit, then my focus changed to LLM, and now, this is an LLM site... so.... pivot, and the reason why the folder is named calender

Sure, here's the README content in Markdown format, ready for you to copy and paste.

Project Description

This repository contains a web application that serves as a frontend for a large language model (LLM) based on oobabooga's Text-Generation-WebUI. The application is configured to run through a Caddy reverse proxy server and is designed to maintain context within a conversation.

Technologies Used

    Frontend: A Vue.js application that communicates with the backend via an API.

    Backend: Text-Generation-WebUI (oobabooga), a web interface for running and interacting with large language models locally. It functions as an OpenAI-compatible API.

    LLM Model: yarn-mistral-7b-128k.Q5_K_M.gguf

    Reverse Proxy: Caddy, which handles traffic, SSL certificates, and forwards requests from the frontend to the backend.

Caddy Server Configuration

Caddy is configured to handle the domain name ph-tech.dk and forward traffic to two primary backends: your LLM model and your Lumen backend.

Here is the Caddyfile used in the setup:
Kodestykke

ph-tech.dk {
    root * /var/www/vueproject/vue-frontend
    file_server

    handle_path /completion/* {
        header Access-Control-Allow-Origin *
        header Access-Control-Allow-Methods POST, OPTIONS
        header Access-Control-Allow-Headers Content-Type

        reverse_proxy http://192.168.0.120:5000
    }

    handle /api/* {
        root * /var/www/vueproject/lumen-backend/public
        php_fastcgi unix//run/php/php7.4-fpm.sock
        file_server
    }
}

http://192.168.0.24 {
    root * /var/www/vueproject/vue-frontend
    file_server
}

Important Notes

    Context Preservation: The LLM model uses the Mistral instruction template to ensure it can maintain context in a conversation. This is crucial for the chat function to work correctly.

    API Endpoint: The frontend application sends requests to /completion/v1/chat/completions, which Caddy forwards to the correct path (/v1/chat/completions) on the LLM server.

