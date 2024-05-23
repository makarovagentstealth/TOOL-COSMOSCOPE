# modules/__init__.py
from .schrodinger import calcular_energia_schrodinger
from .heisenberg import calcular_incerteza_heisenberg
from .planck import calcular_energia_planck

def process_data(data):
    resultados = {}
    if 'schrodinger' in data:
        resultados['schrodinger'] = calcular_energia_schrodinger(data['schrodinger'])
    if 'heisenberg' in data:
        resultados['heisenberg'] = calcular_incerteza_heisenberg(data['heisenberg'])
    if 'planck' in data:
        resultados['planck'] = calcular_energia_planck(data['planck'])
    return resultados