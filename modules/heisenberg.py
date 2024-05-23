# modules/heisenberg.py
def calcular_incerteza_heisenberg(params):
    delta_x = params['delta_x']
    h = params['h']
    incerteza = h / (4 * 3.141592653589793 * delta_x)
    return incerteza