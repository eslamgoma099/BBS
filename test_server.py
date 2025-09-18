#!/usr/bin/env python3
import http.server
import socketserver
import sys
import os

class MyHandler(http.server.SimpleHTTPRequestHandler):
    def log_message(self, format, *args):
        sys.stdout.write(f"{self.log_date_time_string()} - {format%args}\n")
        sys.stdout.flush()
    
    def end_headers(self):
        # Add CORS headers if needed
        self.send_header('Access-Control-Allow-Origin', '*')
        self.send_header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
        self.send_header('Access-Control-Allow-Headers', 'Content-Type')
        super().end_headers()

if __name__ == "__main__":
    PORT = 8000
    
    # Change to the webapp directory
    os.chdir('/home/user/webapp')
    
    with socketserver.TCPServer(("0.0.0.0", PORT), MyHandler) as httpd:
        print(f"Server running at http://0.0.0.0:{PORT}/")
        print(f"Serving files from: {os.getcwd()}")
        print(f"Test the theme at: http://0.0.0.0:{PORT}/theme_test.html")
        sys.stdout.flush()
        httpd.serve_forever()