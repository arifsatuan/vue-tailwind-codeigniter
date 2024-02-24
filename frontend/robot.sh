#!/bin/bash

# Path to the build output directory
BUILD_DIR="./dist" # or "./build" depending on your project setup

# Create robots.txt
echo "User-agent: *
Disallow:" > "$BUILD_DIR/robots.txt"

echo "robots.txt created in $BUILD_DIR"

