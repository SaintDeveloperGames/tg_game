#!/bin/bash

# Обновление пакетов и установка зависимостей
echo "Обновление пакетов и установка зависимостей..."
sudo apt update
sudo apt install -y ca-certificates curl gnupg lsb-release

# Добавление ключа GPG для Docker
echo "Добавление официального ключа GPG Docker..."
sudo mkdir -p /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg

# Добавление репозитория Docker
echo "Добавление репозитория Docker в источники APT..."
echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

# Установка Docker Engine
echo "Установка Docker Engine..."
sudo apt update
sudo apt install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin

# Проверка установки Docker
echo "Проверка установки Docker..."
sudo docker --version

# Установка Docker Compose
echo "Установка Docker Compose..."
sudo apt install -y docker-compose

# Проверка установки Docker Compose
echo "Проверка установки Docker Compose..."
docker-compose --version

# Успешное завершение
echo "Установка Docker и Docker Compose завершена успешно."
