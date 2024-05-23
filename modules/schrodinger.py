# modules/schrodinger.py
def calcular_energia_schrodinger(params):
    n = params['n']
    h = params['h']
    m = params['m']
    L = params['L']
    energia = (n**2 * h**2) / (8 * m * L**2)
    return energia