#!/bin/bash

# Start PHP development server for localhost testing
# This ensures the same behavior as Vercel

echo "Starting PHP development server on localhost:8000"
echo "This will serve your site the same way as Vercel"
echo ""
echo "Your site will be available at:"
echo "  - http://localhost:8000/"
echo "  - http://localhost:8000/demo-consulting-company"
echo "  - http://localhost:8000/demo-consulting-contact"
echo "  - http://localhost:8000/demo-consulting-process"
echo "  - http://localhost:8000/demo-consulting-services"
echo ""
echo "Press Ctrl+C to stop the server"
echo ""

php -S localhost:8000 