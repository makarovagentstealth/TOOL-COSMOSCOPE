# api/jameswebbapi.py
import requests

def get_jwst_data(endpoint):
    base_url = "https://www.jwst.nasa.gov/content/webbLaunch/whereIsWebb.html"
    response = requests.get(base_url)
    if response.status_code == 200:
        # Extrair dados relevantes da resposta HTML (exemplo)
        data = {
            "status": "Em órbita",
            "position": "Latitude: 12.345, Longitude: -45.678"
        }
        return data
    else:
        return {"error": "Falha ao obter dados do James Webb Space Telescope"}