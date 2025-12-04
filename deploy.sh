#!/bin/bash

IMAGE="your-dockerhub-username/your-image-name:latest"
CONTAINER_NAME="phpapp"

echo "Pulling latest image..."
docker pull $IMAGE

echo "Stopping old container (if exists)..."
docker stop $CONTAINER_NAME || true
docker rm $CONTAINER_NAME || true

echo "Starting new container..."
docker run -d --name $CONTAINER_NAME -p 80:80 $IMAGE

echo "PHP App deployed successfully!"
